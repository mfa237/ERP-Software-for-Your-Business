<?php
class Purchase_invoice_model extends CI_Model {

private $primary_key='purchase_order_number';
private $table_name='purchase_order';
public $amount_paid=0;
public $saldo=0;
public $amount=0;
public $sub_total=0;
	function __construct(){
		parent::__construct();
	}
	function retur_amount($purchase_order_number) {
		$sql="select sum(amount) as z_amount 
			from purchase_order i
			where i.potype='R' and po_ref='$purchase_order_number'";
		return $this->db->query($sql)->row()->z_amount;
	}
	function crdb_amount($purchase_order_number) {
		$sql="select (case transtype 
				when 'PO-DEBIT MEMO' then -1*sum(amount) 
				else sum(amount) end) as z_amount 
			from crdb_memo i
			where docnumber='$purchase_order_number'";
		return $this->db->query($sql)->row()->z_amount;
	}
	function paid_amount($nomor){
	    $this->load->model('payables_payments_model');
		return $this->payables_payments_model->total_amount($nomor);
	}

	function recalc($nomor){
	    $this->load->model('payables_payments_model');
		$this->load->model('purchase_order_lineitems_model');
	    $this->amount=$this->purchase_order_lineitems_model->sum_total_price($nomor);
		$this->sub_total=$this->amount;
    	$po=$this->get_by_id($nomor)->row();
		if(count($po)==0){
			return 0;
		}
		$disc_amount=$po->discount*$this->sub_total;
	    $this->amount=$this->sub_total-$disc_amount;
		$tax_amount=$po->tax*$this->amount;
		$this->amount=$this->amount+$tax_amount;
		$this->amount=$this->amount+$po->freight;
		$this->amount=$this->amount+$po->other;

		$this->db->where($this->primary_key,$nomor);
		$this->db->update($this->table_name,array('amount'=>$this->amount,
		'tax_amount'=>$tax_amount,'subtotal'=>$this->sub_total));
		
		$this->add_payables($nomor);
	    $this->amount_paid=$this->payables_payments_model->total_amount($nomor);
		
	    $this->saldo= $this->amount-$this->amount_paid+$this->retur_amount($nomor)+$this->crdb_amount($nomor);

	    return $this->saldo;
	}
	
	function add_payables($nomor)
	{
		$this->load->model('payables_model');
		$faktur=$this->get_by_id($nomor)->row();
		$bill_id=$this->payables_model->get_bill_id($nomor);
		$data['purchase_order']=1;
		$data['purchase_order_number']=$nomor;
		$data['expense_type']='Purchase Order';
		$data['invoice_number']=$nomor;
		$data['invoice_date']=$faktur->po_date;
		$data['supplier_number']=$faktur->supplier_number;
		$data['amount']=$faktur->amount;
		$data['due_date']=$faktur->due_date;
		$data['terms']=$faktur->terms;
		$data['purpose_of_expense']='Purchase Order';
		
		if($bill_id==0){
			$this->payables_model->save($data);
		} else {
			$this->payables_model->update($bill_id,$data);		
		}
		
		
	}
	function get_paged_list($limit=10,$offset=0,
	$order_column='',$order_type='asc')
	{
	    $nama='';
	    if(isset($_GET['nama'])){
	        $nama=$_GET['nama'];
	    }
	    $this->db->select('i.purchase_order_number,i.po_date,i.supplier_number,
	        c.supplier_name,i.amount');
	    $this->db->join('suppliers c','c.supplier_number=i.supplier_number','left');
	    $this->db->from('purchase_order i');
	    if($nama!='') $this->db->where("c.supplier_number like '%$nama%' 
	            or i.purchase_order_number like '%$nama%'
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
		if($data['po_date'])$data['po_date']= date('Y-m-d H:i:s', strtotime($data['po_date']));
		if(isset($data['due_date']))$data['due_date']= date('Y-m-d H:i:s', strtotime($data['due_date']));
		return $this->db->insert($this->table_name,$data);
//		return $this->db->insert_id();
	}
	function update($id,$data){
		if(isset($data['po_date']))$data['po_date']= date('Y-m-d H:i:s', strtotime($data['po_date']));
		if(isset($data['due_date']))$data['due_date']= date('Y-m-d H:i:s', strtotime($data['due_date']));
		if(isset($data['warehouse_code'])){
			if($data['warehouse_code']!=""){
				$this->db->query("update purchase_order_lineitems 
					set warehouse_code='".$data['warehouse_code']."' 
					where purchase_order_number='$id'");
			}
		}
		$this->db->where($this->primary_key,$id);
		return $this->db->update($this->table_name,$data);
	}
	function validate_delete_po($po_number)
	{
		// check receive from po
		$cnt=$this->db->query("select count(1) as cnt from inventory_products 
			where purchase_order_number='$po_number'")->row()->cnt;
		if($cnt) return false;
	
		return true;
	}
	function delete($id){
	
		$this->db->where($this->primary_key,$id);
		$this->db->delete('purchase_order_lineitems'); 
       
		$this->db->where($this->primary_key,$id);
		return $this->db->delete($this->table_name);
	}
     function add_item($id,$item,$qty){
        $sql="select description,retail,cost,unit_of_measure
            from inventory
            where item_number='".$item."'";
        
        $query=$this->db->query($sql);
        $row = $query->row_array(); 
         
        $data = array('purchase_order_number' => $id, 'item_number' => $item, 
            'quantity' => $qty,'description'=>$row['description'],
            'price' => $row['retail'],'total_price'=>$row['retail']*$qty,
            'unit'=>$row['unit_of_measure']
            );
        $str = $this->db->insert_string('purchase_order_lineitems', $data);
        $query=$this->db->query($str);
    }
    function del_item($line){
        $query=$this->db->query("delete from purchase_order_lineitems
            where line_number=".$line);
    }
	function get_bill_id($invoice)
	{
		$row=$this->db->query("select bill_id from payables where purchase_order_number='".$invoice."'");
		if($row){
			return $row->row()->bill_id;
		} else {
			return 0;
		}
	}
	function posting($nomor)
	{
		$this->load->model('purchase_order_model');
		$this->recalc($nomor);
		$faktur=$this->purchase_order_model->get_by_id($nomor)->row();

		$this->load->model("periode_model");
		if($this->periode_model->closed($faktur->po_date)){
			echo "ERR_PERIOD";
			return false;
		}
		$this->load->model('purchase_order_lineitems_model');
		$this->load->model('jurnal_model');
		$this->load->model('chart_of_accounts_model');
		$this->load->model('company_model');
		$this->load->model('supplier_model');
		$this->load->model('inventory_model');
		
		$date=$faktur->po_date;
		$supplier=$this->supplier_model->get_by_id($faktur->supplier_number)->row();
		$akun_hutang=$faktur->account_id;
		$gl_id=$nomor;
		$debit=0; $credit=0;$operation="";$source="";
		// posting hutang / ap
		if($akun_hutang=="")$akun_hutang=$supplier->supplier_account_number;
		if($akun_hutang=="")$akun_hutang=$this->company_model->setting("accounts_payable");
		
		$account_id=$akun_hutang; $debit=0; $credit=$faktur->amount;
		$operation="AP Posting"; $source=$faktur->comments;
		
		$this->jurnal_model->add_jurnal($gl_id,$account_id,$date,$debit,$credit,$operation,$source);
		
		// posting persediaan
		$items=$this->purchase_order_lineitems_model->get_by_nomor($nomor);
		foreach($items->result() as $row) {
			if($item=$this->inventory_model->get_by_id($row->item_number)->row()){
				$account_id=$item->inventory_account; 
			}
			if(!$account_id)$account_id=$this->company_model->setting('inventory');
			
			$debit=$row->total_price; $credit=0;
			$operation="Inventory Posting"; $source=$row->description;
			$custsuppbank=$row->item_number;
			$this->jurnal_model->add_jurnal($gl_id,$account_id,$date,$debit,$credit,$operation,$source,'',$custsuppbank);
			
		}
		
		// validate jurnal
		if($this->jurnal_model->validate($nomor)) {
			$data['posted']=true;
		} else {
			$data['posted']=false;
		}
		$this->purchase_order_model->update($nomor,$data);
	}	
}	 
