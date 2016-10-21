<?php
if(!defined('BASEPATH')) exit('No direct script access allowd');

class Promosi extends CI_Controller {
    private $limit=10;
    private $table_name='promosi_item';
    private $sql="select * from promosi_item";
    private $file_view='sales/promosi';
    private $primary_key='id';
    private $controller='so/promosi';

    function __construct()    {
            parent::__construct();
			if(!$this->access->is_login())redirect(base_url());
            $this->load->helper(array('url','form','mylib_helper'));
	        $this->load->library('sysvar');
            $this->load->library('template');
            $this->load->library('form_validation');
            $this->load->model('sales/promosi_model');
    }
    function index()    {	
		$data['caption']="Promosi Item Discount";
        $this->template->display_form_input($this->file_view,$data);			
    }
	function delete_items($id){
		$data['success']=true;
		if($this->db->where("id",$id)->delete($this->table_name)){
			$data['message']="Sukses.";
		} else {
			$data['success']=false;
			$data['message']=mysql_error();
		}
		echo json_encode($data);
	}
    function load_items($page=0){
		$data['success']=true;
		$item_number=$this->input->get('item_number');
		$from_date=$this->input->get('from_date');
		$to_date=$this->input->get('to_date');
		$this->db->limit(100,$page*100);
		if($item_number!="")$this->db->where('item_number',$item_number);
		if($q=$this->db->get($this->table_name)){
			$data['data']=$q->result_array();
		} else {
			$data['success']=false;
			$data['message']=$this->db->display_error();
		}
		echo json_encode($data);
    }
    function save()   {
		$data=$this->input->get();
		$result['success']=true;
		if($q=$this->db->insert($this->table_name,$data)){
			$result['message']="Data sudah tersimpan.";
			$result['id']=$this->db->insert_id();
		} else {
			$result['success']=false;
			$result['message']=$this->db->display_error();
		}
		echo json_encode($result);
    }
}
?>
