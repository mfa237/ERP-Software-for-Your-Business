<?php
class Inventory_assembly_model extends CI_Model {

private $primary_key='item_number';
private $table_name='inventory_assembly';

function __construct(){
	parent::__construct();
}
	function save($data){
		return $this->db->insert($this->table_name,$data);
	}
	function update($id,$data){
		$this->db->where($this->primary_key,$id);
		$this->db->update($this->table_name,$data);
	}
	function delete($item_number,$kode){
		$this->db->query("delete from inventory_assembly where item_number='".$item_number."' 
		and assembly_item_number='".$kode."'");
		return true;
	}
	function get_by_id($id){
		$this->db->where($this->primary_key,$id);
		$ok=$this->db->get($this->table_name);
		return $ok;
	}
	

}
