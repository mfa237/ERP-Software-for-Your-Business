<?php
class Invoice_model extends CI_Model {

private $primary_key='invoice_number';
private $table_name='invoice';

public $amount_paid=0;
public $retur_amount=0;
public $crdb_amount=0;
public $saldo=0;
public $amount=0;
public $sub_total=0;
public $warehouse_code='';
function __construct(){
	parent::__construct();
}
function recalc($nomor){
	
    $this->load->model('payment_model');
	$this->load->model('crdb_model');
	$this->load->model('invoice_lineitems_model');
	if($nomor=='undefined')$nomor=$this->session->userdata('invoice_number');
	
    $inv=$this->get_by_id($nomor)->row();
    if($inv) {
	    $this->sub_total=$this->invoice_lineitems_model->sum_total_price($nomor);
		
		$disc_amount=$inv->discount*$this->sub_total;
	    $this->amount=$this->sub_total-$disc_amount;
		$tax_amount=$inv->sales_tax_percent*$this->amount;
		$this->amount=$this->amount+$tax_amount;
		$this->amount=$this->amount+$inv->freight;
		$this->amount=$this->amount+$inv->other;
	
	    $this->amount_paid=$this->payment_model->total_amount($nomor);
		$this->retur_amount=$this->total_retur($nomor);
		$this->crdb_amount=$this->crdb_model->total_by_invoice($nomor);
		
	    $this->saldo=$inv->amount-$this->amount_paid
			-$this->retur_amount
			+$this->crdb_amount;
		
		$sql="update invoice set paid=";
		if($this->saldo==0){
			$sql.="true";
		} else {
			$sql.="false";
		}
		$sql.=",amount=".$this->amount.",subtotal=".$this->sub_total
		.",saldo_invoice=".$this->saldo." where invoice_number='$nomor'";
		$this->db->query($sql);

	}
    return $this->saldo;
}
function total_retur($nomor)
{
	$q=$this->db->query("select sum(amount) as sum_amt from invoice where invoice_type='R' 
		and sales_order_number='$nomor'")->row();
	if($q){
		return $q->sum_amt;
	} else {
		return 0;
	}
}
function get_paged_list($limit=10,$offset=0,
$order_column='',$order_type='asc')
{
    $nama='';
    if(isset($_GET['nama'])){
        $nama=$_GET['nama'];
    }
    $this->db->select('i.invoice_number,i.invoice_date,i.sold_to_customer,
        c.company,i.amount');
    $this->db->join('customers c','c.customer_number=i.sold_to_customer','left');
    $this->db->from('invoice i');
    if($nama!='') $this->db->where("c.company like '%$nama%' 
            or i.[invoice number] like '%$nama%'
            ");
    if (empty($order_column)||empty($order_type))
    { 
        $this->db->order_by($this->primary_key,'asc');
    } else {
        $this->db->order_by($order_column,$order_type);
    }
    return $this->db->get('',$limit,$offset);
}
function count_all(){
	return $this->db->count_all($this->table_name);
}
function get_by_id($id){
	$this->db->where($this->primary_key,$id);
	$r_item=$this->db->query("select warehouse_code from invoice_lineitems 
		where invoice_number='$id' limit 1")->row();
	 
	if($r_item){
		$this->warehouse_code=$r_item->warehouse_code;
	}
	return $this->db->get($this->table_name);
}
function save($data){
	$data['invoice_date']= date('Y-m-d H:i:s', strtotime($data['invoice_date']));
	$data['due_date']= date('Y-m-d H:i:s', strtotime($data['due_date']));
//	$this->db->insert($this->table_name,$data);
//	echo $this->db->_error_message();
//	return $this->db->insert_id();
	return $this->db->insert($this->table_name,$data);
}
function update($id,$data){
	$gudang=$data['warehouse_code'];	
	$this->db->query("update invoice_lineitems set warehouse_code='$gudang' 
	where invoice_number='$id'");			
	unset($data['warehouse_code']);
	$data['invoice_date']= date('Y-m-d H:i:s', strtotime($data['invoice_date']));
	$data['due_date']= date( 'Y-m-d H:i:s', strtotime($data['due_date']));
	$this->db->where($this->primary_key,$id);
	return $this->db->update($this->table_name,$data);
}
function delete($id){
   	$this->db->where($this->primary_key,$id);
	$this->db->delete('invoice_lineitems');
	        
	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}

    function add_item($id,$item,$qty){
        $sql="select description,retail,cost,unit_of_measure
            from inventory
            where item_number='".$item."'";
        
        $query=$this->db->query($sql);
        $row = $query->row_array(); 
         
        $data = array('invoice_number' => $id, 'item_number' => $item, 
            'quantity' => $qty,'description'=>$row['description'],
            'price' => $row['retail'],'amount'=>$row['retail']*$qty,
            'unit'=>$row['unit_of_measure']
            );
        $str = $this->db->insert_string('invoice_lineitems', $data);
        $query=$this->db->query($str);
    }
    function del_item($line){
        $query=$this->db->query("delete from invoice_lineitems
            where line_number=".$line);
    }
	function save_from_so_items($faktur,$qty_order,$from_so_line,$gudang){
		$this->load->model('sales_order_lineitems_model');
		$this->load->model('inventory_model');
		$this->load->model('invoice_lineitems_model');
		for($i=0;$i<=count($qty_order)-1;$i++){
			$line_number=$from_so_line[$i];
			if($line_number>0){
				$so=$this->sales_order_lineitems_model->get_by_id($line_number)->row();
		        $item=$this->inventory_model->get_by_id($so->item_number)->row();
				$data['invoice_number']=$faktur;
				$data['item_number']=$so->item_number;
				$data['description']=$so->description;
				$data['unit']=$so->unit;
				if($data['unit']=='')$data['unit']=$item->unit_of_measure;
				$data['quantity']=$so->quantity;
				$data['price']=$so->price;
				$data['discount']=$so->discount;
		        $data['amount']=$data['quantity']*$data['price'];
				$data['warehouse_code']=$gudang;
				$this->invoice_lineitems_model->save($data);
			}
		}
	}
	function un_posting($date_from,$date_to){
		$this->load->model('jurnal_model');
		$date_from=date('Y-m-d H:i:s', strtotime($date_from));
		$date_to=date('Y-m-d H:i:s', strtotime($date_to));
		$s="select invoice_number,invoice_date,account_id,amount,comments,disc_amount,tax,freight,other 
		from invoice where invoice_type='I' 
		and invoice_date between '$date_from' and '$date_to' and ifnull(posted,false)=false 
		order by invoice_number";
		$rst_inv_hdr=$this->db->query($s);
		if($rst_inv_hdr){
			foreach ($rst_inv_hdr->result() as $r_inv_hdr) {
				$this->jurnal_model->del_jurnal($r_inv_hdr->invoice_number);
				echo "<br>Delete Jurnal: ".$r_inv_hdr->invoice_number;
			}
		}
		echo "<br>Finish. Please back when ready."; 
	}
	function posting($date_from,$date_to){
		$this->load->model('jurnal_model');
		$this->load->model('chart_of_accounts_model');
		$this->load->model('company_model');
		$date_from=date('Y-m-d H:i:s', strtotime($date_from));
		$date_to=date('Y-m-d H:i:s', strtotime($date_to));
		$s="select invoice_number,invoice_date,account_id,amount,comments,disc_amount,tax,freight,other 
		from invoice where invoice_type='I' 
		and invoice_date between '$date_from' and '$date_to' and ifnull(posted,false)=false 
		order by invoice_number";
		$cid=$this->access->cid;
		$set=$this->company_model->get_by_id($cid)->row();
		$coa_sales=$set->inventory_sales;
		$coa_hpp=$set->inventory_cogs;
		$coa_stock=$set->inventory;
		$coa_tax=$set->so_tax;
		$coa_freight=$set->so_freight;
		$coa_other=$set->so_other;
		$coa_ar=$set->accounts_receivable;
		$coa_disc=$set->so_discounts_given;
		$rst_inv_hdr=$this->db->query($s);
		if($rst_inv_hdr){
			foreach ($rst_inv_hdr->result() as $r_inv_hdr) {
				
				echo "<br>Posting...".$r_inv_hdr->invoice_number;
				$coa_ar=$r_inv_hdr->account_id>0?$r_inv_hdr->account_id:$coa_ar;
				
				$s="select item_number,ifnull(revenue_acct_id,0) as coa_sales,quantity,price,
					cost,discount from invoice_lineitems 
					where invoice_number='".$r_inv_hdr->invoice_number."'";
				$rst_inv_dtl=$this->db->query($s);
				if($rst_inv_dtl){
					foreach ($rst_inv_dtl->result() as $r_inv_dtl) {
						//-- posting invoice_lineitems
						//-- ambil akun dari master barang
						$r_stok=$this->db->query("select sales_account,inventory_account,cogs_account 
							from inventory where item_number='".$r_inv_dtl->item_number."'")->row();
						if($r_stok){
							$coa_sales=$r_stok->sales_account>0?$r_stok->sales_account:$coa_sales;
							$coa_stock=$r_stok->inventory_account>0?$r_stok->inventory_account:$coa_stock;
							$coa_hpp=$r_stok->cogs_account>0?$r_stok->cogs_account:$coa_hpp;
						}
						
						$coa_sales=$r_inv_dtl->coa_sales>0?$r_inv_dtl->coa_sales:$coa_sales;
						
						$sales_amt=$r_inv_dtl->price*$r_inv_dtl->quantity;
						$disc_amt=$r_inv_dtl->discount*$sales_amt;
						$hpp_amt=$r_inv_dtl->cost*$r_inv_dtl->quantity;
						if($hpp_amt>0){
							//-- posting persediaan
							$this->jurnal_model->add_jurnal($r_inv_hdr->invoice_number,$coa_stock, 
								$r_inv_hdr->invoice_date,0,$hpp_amt,"Inventory",$r_inv_hdr->comments,$cid);
							//-- posting hpp
							$this->jurnal_model->add_jurnal($r_inv_hdr->invoice_number,$coa_hpp, 
								$r_inv_hdr->invoice_date,$hpp_amt,0,"Cogs",$r_inv_hdr->comments,$cid);
						}
						//-- posting penjualan
						if($sales_amt>0){
							$this->jurnal_model->add_jurnal($r_inv_hdr->invoice_number,$coa_sales, 
								$r_inv_hdr->invoice_date,0,$sales_amt,"Sales",$r_inv_hdr->comments,$cid);
						}
						//-- posting discount item
						if($disc_amt>0){
							$this->jurnal_model->add_jurnal($r_inv_hdr->invoice_number,$coa_disc, 
								$r_inv_hdr->invoice_date,$disc_amt,0,"Sales Discount",$r_inv_hdr->comments,$cid);
							
						}						
					} //foreach rst_inv_dtl
				} // if rst_inv_dtl
				//-- posting piutang
				$this->jurnal_model->add_jurnal($r_inv_hdr->invoice_number,$coa_ar, 
					$r_inv_hdr->invoice_date,$r_inv_hdr->amount,0,"Account Receivable",$r_inv_hdr->comments,$cid);
				if($r_inv_hdr->disc_amount>0){
					$this->jurnal_model->add_jurnal($r_inv_hdr->invoice_number,$coa_disc, 
						$r_inv_hdr->invoice_date,$r_inv_hdr->disc_amount,0,"Sales Discount",$r_inv_hdr->comments,$cid);
				}
				if($r_inv_hdr->tax>0){
					$this->jurnal_model->add_jurnal($r_inv_hdr->invoice_number,$coa_tax, 
						$r_inv_hdr->invoice_date,$r_inv_hdr->tax,0,"Sales Tax",$r_inv_hdr->comments,$cid);					
				}
				if($r_inv_hdr->freight!=0){
					$this->jurnal_model->add_jurnal($r_inv_hdr->invoice_number,$coa_freight, 
						$r_inv_hdr->invoice_date,0,$r_inv_hdr->freight,"Sales Freight",$r_inv_hdr->comments,$cid);					
				}
				if($r_inv_hdr->other!=0){
					$this->jurnal_model->add_jurnal($r_inv_hdr->invoice_number,$coa_other, 
						$r_inv_hdr->invoice_date,0,$r_inv_hdr->other,"Sales Other",$r_inv_hdr->comments,$cid);					
				}
						
			} // foreach rst_inv_hdr
		} // if rst_inv_hdr
		echo "<br>Finish. Please back when ready."; 
			
	} // posting
}
