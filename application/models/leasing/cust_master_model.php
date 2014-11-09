<?php
class Cust_master_model extends CI_Model {

	private $primary_key='cust_id';
	private $table_name='ls_cust_master';

	function __construct(){
		parent::__construct();
	}
	function get_paged_list($limit=10,$offset=0,$order_column='',$order_type='asc')	{
		$nama='';
		if(isset($_GET['cust_name']))$nama=$_GET['cust_name'];
		if($nama!='')$this->db->where("cust_name like '%$nama%'");

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
		$cm['cust_id']='';	
		$cm['cust_name']='';
		$cm['street']='';
		$cm['first_name']='';
		$cm['rtrw']='';
		$cm['call_name']='';
		$cm['kel']='';
		$cm['kec']='';
		$cm['id_card_no']='';
		$cm['id_card_exp']='';
		$cm['city']='';
		$cm['zip_pos']='';
		$data['mother_name']='';
		$data['spouse_name']='';
		$data['spouse_birth_date']='';
		$data['spouse_phone']='';
		$data['spouse_birth_place']='';

		$this->db->insert('ls_cust_master',$card1);

		$cm['cust_id']='';
		$data['gender']='';
		$data['birth_place']='';
		$data['house_status']='';
		$data['marital_status']='';
		$data['no_of_dependents']='';
		$this->db->insert('ls_cust_personal',$card1);


		$cm['cust_id']='';
		$data['cs1_street']='';
		$data['cs1_rtrw']='';
		$data['cs1_kel']='';
		$data['cs1_kec']='';
		$data['cs1_city']='';
		$data['cs1_zip_pos']='';
		$data['cs1_lama_thn']='';
		$data['cs1_lama_bln']='';
		$this->db->insert('ls_cust_ship_to',$card1);


		$data['comp_name']='';
		$data['job_status']='';
		$data['bussiness_type']='';
		$data['job_status_etc']='';
		$data['since_year']='';
		$data['job_level']='';
		$data['com_street']='';
		$data['job_type']='';
		$data['com_rtrw']='';
		$data['job_type_etc']='';
		$data['com_kel']='';
		$data['comp_desc']='';
		$data['com_kec']='';
		$data['emp_status']='';
		$data['com_city']='';
		$data['emp_status_etc']='';
		$data['total_employee']='';
		$data['com_contact_phone']='';
		$data['office_status']='';
		$data['phone_ext']='';
		$data['office_status_etc']='';
		$data['spv_name']='';

		$data['salary']='';
		$data['com_zip_pos']='';
		$this->db->insert('ls_cust_company',$card1);

		return $this->db->insert($this->table_name,$data);            
	}
	function update($id,$data){
//		$data['start']=date('Y-m-d H:i:s', strtotime($data['start']));
		$this->db->where($this->primary_key,$id);
		return  $this->db->update($this->table_name,$data);
	}
	function delete($id){
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
	}
}