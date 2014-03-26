<?php
class Inventory_moving_model extends CI_Model {

private $primary_key='transfer_id';
private $table_name='inventory_moving';
public $amount=0;

function __construct(){
	parent::__construct();
}
	function get_paged_list($limit=10,$offset=0,
	$order_column='',$order_type='asc')
	{
		if (empty($order_column)||empty($order_type))
		$this->db->order_by($this->primary_key,'asc');
		else
		$this->db->order_by($order_column,$order_type);
		return $this->db->get($this->table_name,$limit,$offset);
	}
	function count_all(){
		return $this->db->count_all($this->table_name);
	}
	function get_by_id($id){
        $this->transfer_id=$id;
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
	function save($data){
		$data['date_trans']= date( 'Y-m-d H:i:s', strtotime($data['date_trans']));
		$this->db->insert($this->table_name,$data);
		return $this->db->insert_id();
	}
	function update($id,$data){
		$data['date_trans']= date( 'Y-m-d H:i:s', strtotime($data['date_trans']));
		$this->db->where($this->primary_key,$id);
		$this->db->update($this->table_name,$data);
	}
	function delete($id){
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
		$this->db->where('transfer_id',$id);
		$this->db->delete('inventory_moving');
	}
	function add_item($data){
            $this->db->insert('inventory_moving',$data);
            return $this->db->insert_id();
        } 		

}
