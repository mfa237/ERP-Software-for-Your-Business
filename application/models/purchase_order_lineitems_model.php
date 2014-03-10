<?php
class Purchase_order_lineitems_model extends CI_Model {

private $primary_key='line_number';
private $table_name='purchase_order_lineitems';

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
function save($data){
	$this->db->insert($this->table_name,$data);
	return $this->db->insert_id();
}
function update($id,$data){
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$data);
}
function delete($id){
	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}
function lineitems($po_number){
	$this->db->where('purchase_order_number',$po_number);
	return $this->db->get($this->table_name);
}
function sum_total_price($nomor)
{
	return (double)$this->db->query("select sum(total_price) as sum_total_price 
		from purchase_order_lineitems 
        where purchase_order_number='".$nomor."'")->row()->sum_total_price;
}
function browse($nomor)
{
	$sql="select p.item_number,i.description,p.quantity 
	,p.unit,p.price,p.discount,p.total_price,coa.account,coa.account_description,p.line_number
	from purchase_order_lineitems p
	left join inventory i on i.item_number=p.item_number
	left join chart_of_accounts coa on coa.id=p.inventory_account
	where purchase_order_number='$nomor'";
	$this->load->helper('browse_helper');
	return browse_simple($sql,"Data Barang / Jasa",500,300,"dgItem");
}
}
