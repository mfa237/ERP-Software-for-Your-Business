<?php
class Payment_model extends CI_Model {

private $primary_key='no_bukti';
private $table_name='payments';

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
		$faktur=$data['invoice_number'];
		$data['date_paid']= date('Y-m-d H:i:s', strtotime($data['date_paid']));
		
		$this->db->insert($this->table_name,$data);
		$id=$this->db->insert_id();
		$this->load->model('invoice_model');
		$this->invoice_model->recalc($faktur);
		return $id;
	}
	function update($id,$data){
		$this->db->where($this->primary_key,$id);
		return $this->db->update($this->table_name,$data);
	}
	function update_id($id,$data){
		$this->db->where("line_number",$id);
		return $this->db->update($this->table_name,$data);
	}
	function delete($id){
		$this->db->query("update invoice set paid=false 
			where invoice_number in (select invoice_number from payments 
				where no_bukti='$id')");
		$this->db->where($this->primary_key,$id);
		return $this->db->delete($this->table_name);
	}
	function delete_id($id){
		$this->db->where("line_number",$id);
		return $this->db->delete($this->table_name);
	}
    function total_amount($faktur){
        $this->db->select("sum(amount_paid) as total_amount");
        $this->db->where("invoice_number",$faktur);
        $this->db->from("payments");
        $row=$this->db->get();
        $r=$row->row();
        return $r->total_amount;
    }
	function nomor_bukti($add=false){
		if($add){
			$this->sysvar->autonumber_inc("AR Payment Numbering");
		} else {
			return $this->sysvar->autonumber("AR Payment Numbering",0,'!ARP~$00001');
		}
	}
}
