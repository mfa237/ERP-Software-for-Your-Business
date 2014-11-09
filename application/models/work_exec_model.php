<?php
class Work_exec_model extends CI_Model {

private $primary_key='work_exec_no';
private $table_name='work_exec';

function __construct(){
	parent::__construct();
}
	function get_paged_list($limit=10,$offset=0,
	$order_column='work_exec_no',$order_type='asc')
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
		return $this->db->get($this->table_name);
	}
	function save($data){
		$data['start_date']= date( 'Y-m-d H:i:s', strtotime($data['start_date']));
		$data['expected_date']= date( 'Y-m-d H:i:s', strtotime($data['expected_date']));
		return $this->db->insert($this->table_name,$data);
	}
	function update($id,$data){
		$this->load->model('work_exec_detail_model');
		$this->work_exec_detail_model->update_items($id);
		$data['start_date']= date( 'Y-m-d H:i:s', strtotime($data['start_date']));
		$data['expected_date']= date( 'Y-m-d H:i:s', strtotime($data['expected_date']));
		
		$this->db->where($this->primary_key,$id);
		return $this->db->update($this->table_name,$data);
	}
	function delete($id){

		$this->db->where("work_exec_no",$id);
		$this->db->delete("work_exec_detail");

		$this->db->where($this->primary_key,$id);
		return $this->db->delete($this->table_name);
		
	}

}
