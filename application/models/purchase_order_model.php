<?php
class Purchase_order_model extends CI_Model {

private $primary_key='purchase_order_number';
private $table_name='purchase_order';
public $amount_paid=0;
public $saldo=0;
public $amount=0;
public $sub_total=0;
	function __construct(){
		parent::__construct();
	}
	  
	function recalc($nomor){
	     
	    $this->load->model('payables_payments_model');
		$this->load->model('purchase_order_lineitems_model');
	    $this->amount=$this->purchase_order_lineitems_model->sum_total_price($nomor);
		$this->sub_total=$this->amount;
		$this->update($nomor,array('amount'=>$this->amount));
		$this->add_payables($nomor);
	    $this->amount_paid=$this->payables_payments_model->total_amount($nomor);
	    $this->saldo= $this->amount-$this->amount_paid;
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
		$this->db->where($this->primary_key,$id);
		return $this->db->update($this->table_name,$data);
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
  	 
}	 
