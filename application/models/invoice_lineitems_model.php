<?php
class Invoice_lineitems_model extends CI_Model {

private $primary_key='line_number';
private $table_name='invoice_lineitems';

function __construct(){
	parent::__construct();
}
  
function count_all(){
	return $this->db->count_all($this->table_name);
}
function get_by_id($id){
	$this->db->where($this->primary_key,$id);
	return $this->db->get($this->table_name);
}
function get_by_nomor($nomor){
	$this->db->where("invoice_number",$nomor);
	return $this->db->get($this->table_name);
}

function save($data){
	if($data['discount']=='')$data['discount']=0;
	if($data['quantity']=='')$data['quantity']=0;
	if($data['amount']=='')$data['amount']=0;
	if($data['price']=='')$data['price']=0;
	$this->db->insert($this->table_name,$data);
	if($data['quantity']>"0"){
		return $this->db->insert_id();
	} else {
		return true;
	}
}
function update($id,$data){
	if($data['discount']=='')$data['discount']=0;
	if($data['quantity']=='')$data['quantity']=0;
	if($data['amount']=='')$data['amount']=0;
	if($data['price']=='')$data['price']=0;
	if($data['quantity']>"0"){
		$this->db->where($this->primary_key,$id);
		return $this->db->update($this->table_name,$data);
	} else {
		return true;
	}
}
function delete($id){
	$this->db->where($this->primary_key,$id);
	return $this->db->delete($this->table_name);
}
function lineitems($invoice_number){
	$this->db->where('invoice_number',$invoice_number);
	return $this->db->get($this->table_name);
}
function sum_total_price($nomor)
{
	return (double)$this->db->query("select sum(amount) as sum_total_price 
		from invoice_lineitems 
        where invoice_number='".$nomor."'")->row()->sum_total_price;
}
function check_revenue_acct($nomor,$type="I") {

	if($set=$this->db->query("select inventory_sales,inventory_cogs  from preferences 
		where not (inventory_sales='0' or inventory_sales is null)")->row()) {

		$sql="update invoice_lineitems 
		left join inventory i on i.item_number=invoice_lineitems.item_number 
		set revenue_acct_id=sales_account
		where  invoice_number='$nomor'
		and (revenue_acct_id is null or revenue_acct_id='0')";
		$this->db->query($sql);
		
		$sql="update invoice_lineitems set revenue_acct_id='".$set->inventory_sales."' 
			where invoice_number='$nomor' 
			and (revenue_acct_id is null or revenue_acct_id='0')";
			
		$this->db->query($sql);
	}
}

function browse($nomor)
{
	$sql="select p.item_number,i.description,p.quantity 
	,p.unit,p.price,p.discount,p.amount,coa.account,coa.account_description,p.line_number
	from invoice_lineitems p
	left join inventory i on i.item_number=p.item_number
	left join chart_of_accounts coa on coa.id=p.revenue_acct_id
	where invoice_number='$nomor'";
	$this->load->helper('browse_helper');
	return browse_simple($sql,"Data Barang / Jasa",700,null,"dgItem");
}
}
