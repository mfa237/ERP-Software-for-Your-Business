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
	function save_from_so_items($faktur,$qty_order,$from_so_line){
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
				$this->invoice_lineitems_model->save($data);
			}
		}
	}
	
	
}
