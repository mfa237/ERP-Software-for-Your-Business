<?php
class CrDb_model extends CI_Model {

private $primary_key='kodecrdb';
private $table_name='crdb_memo';

	function __construct(){
		parent::__construct();
	}
	function total_by_invoice($faktur)
	{
		$q=$this->db->query("select sum(amount) as sum_amt from crdb_memo where docnumber='$faktur'")->row();
		if($q){
			return $q->sum_amt;
		} else {
			return 0;
		}
	}
	function count_all(){
		return $this->db->count_all($this->table_name);
	}
	function get_by_id($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
	function save($data){
		if(isset($data['tanggal']))$data['tanggal']= date('Y-m-d H:i:s', strtotime($data['tanggal']));
		$ok=$this->db->insert($this->table_name,$data);
//		$id=$this->db->insert_id();
		$faktur=$data['docnumber'];
		$this->load->model('invoice_model');
		$this->invoice_model->recalc($faktur);
		return $ok;
	}
	function update($id,$data){
		$faktur=$data['docnumber'];
		if(isset($data['tanggal']))$data['tanggal']= date('Y-m-d H:i:s', strtotime($data['tanggal']));
		$this->db->where($this->primary_key,$id);
		$this->db->update($this->table_name,$data);
		$this->load->model('invoice_model');
		$this->invoice_model->recalc($faktur);
	}
	function delete($id){
		$faktur=$data['docnumber'];
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
		$this->load->model('invoice_model');
		$this->invoice_model->recalc($faktur);
	}
	function save_item($data){
		return $this->db->insert('crdb_memo_dtl',$data);
	}
	function delete_item($id){
		$this->db->where("lineid",$id);
		return $this->db->delete("crdb_memo_dtl");
	}
	
}