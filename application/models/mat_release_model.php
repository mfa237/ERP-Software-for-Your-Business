<?php
class Mat_release_model extends CI_Model {

private $primary_key='mat_rel_no';
private $table_name='mat_release_header';

function __construct(){
	parent::__construct();
}
	function get_paged_list($limit=10,$offset=0,
	$order_column='mat_rel_no',$order_type='asc')
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
		$this->db->where($this->primary_key,$id);
		$ok=$this->db->get($this->table_name);
		
		return $ok;
	}
	function save($data){
		$data['date_rel']= date( 'Y-m-d H:i:s', strtotime($data['date_rel']));
		return $this->db->insert($this->table_name,$data);
	}
	function update($id,$data){
		$data['date_rel']= date( 'Y-m-d H:i:s', strtotime($data['date_rel']));
		$this->db->where($this->primary_key,$id);
		return $this->db->update($this->table_name,$data);
	}
	function delete($id){

		$this->db->where("mat_rel_no",$id);
		$this->db->delete("mat_release_detail");

		$this->db->where($this->primary_key,$id);
		return $this->db->delete($this->table_name);
		
	}

}
