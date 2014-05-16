<?php
class Inventory_products_model extends CI_Model {

private $primary_key='shipment_id';
private $table_name='inventory_products';

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
		$data['date_received']= date( 'Y-m-d H:i:s', strtotime($data['date_received']));
		
		$this->db->insert($this->table_name,$data);
		return $this->db->insert_id();
	}
	function update($id,$data){
		$data['date_received']= date( 'Y-m-d H:i:s', strtotime($data['date_received']));
		$this->db->where($this->primary_key,$id);
		$this->db->update($this->table_name,$data);
	}
	function validate_delete_receive_po($nomor_receive)
	{
		$cnt=$this->db->query("select count(1) as cnt from purchase_order_lineitems pol
			join inventory_products ip on ip.id=pol.from_line_number
			where ip.shipment_id='$nomor_receive'")->row()->cnt;
		if($cnt) return false;
	
		return true;

	}
	function delete($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->delete($this->table_name);
	}
	function delete_by_id($id){
		$this->db->where('id',$id);
		$this->db->delete($this->table_name);
	}
	function delete_item($id){
		$this->db->where('id',$id);
		return $this->db->delete($this->table_name);
	}
        function list_receive($purchase_order_number)
        {
            $query=$this->db->query("select distinct shipment_id,
                date_received,warehouse_code,receipt_by 
                from inventory_products
                where receipt_type='PO' 
                and purchase_order_number='$purchase_order_number'");
            return $query;
        }

}
?>