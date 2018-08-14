<?php
class Rekening_model extends CI_Model {

private $primary_key='no_simpanan';
private $table_name='kop_tabungan';

	function __construct(){
		parent::__construct();        
        $multi_company=$this->config->item('multi_company');
       if($multi_company){
            $company_code=$this->session->userdata("company_code","");
            if($company_code!=""){
               $this->db = $this->load->database($company_code, TRUE);
           }
       }         
        
        
	}
	function get_by_id($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}

	function save($data){
		if($data['tanggal'])$data['tanggal']= date('Y-m-d H:i:s', strtotime($data['tanggal']));		
		$id=$this->db->insert($this->table_name,$data);
		return $id;
	}
	function update($id,$data){
		if($data['tanggal'])$data['tanggal']= date('Y-m-d H:i:s', strtotime($data['tanggal']));		
		$this->db->where($this->primary_key,$id);
		$id=$this->db->update($this->table_name,$data);
		return $id;
	}
	function delete($kode){
		$this->db->where($this->primary_key,$kode);
		return $this->db->delete($this->table_name);
	}
}
