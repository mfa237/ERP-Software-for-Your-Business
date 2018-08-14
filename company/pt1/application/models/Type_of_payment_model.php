<?php
class Type_of_payment_model extends CI_Model {

private $primary_key='type_of_payment';
private $table_name='type_of_payment';

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
	function select_list(){
        $query=$this->db->query("select type_of_payment from type_of_payment");
        $ret=array();
        $ret['']='- Select -';
        foreach ($query->result() as $row)
        {
                $ret[$row->type_of_payment]=$row->type_of_payment;
        }		 
        return $ret;
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
	function default_terms(){
		return "KREDIT";
	}
	function due_date($terms,$curdate){
		$due_date=date("Y-m-d");
		if($q=$this->get_by_id($terms)){
			if($r=$q->row()){
				$d=$r->days;
				if($d==null)$d=0;
				$due_date=add_date($curdate,$d);
			}
		}
		return $due_date;
	}
					
}
