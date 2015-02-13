<?php
if(!defined('BASEPATH')) exit('No direct script access allowd');

class Loan_close extends CI_Controller {
    private $limit=100;
    private $table_name='ls_loan_master';
    private $file_view='leasing/loan';
    private $controller='leasing/loan';
    private $primary_key='loan_id';
    private $sql="";
	private $title="PROSES PENUTUPAN AKAD KREDIT PELANGGAN";
	private $help="";

    function __construct()    {
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library(array('sysvar','template','form_validation'));
		if($this->controller=="")$this->controller=$this->file_view;
		if($this->sql=="")$this->sql="select * from ".$this->table_name;
		if($this->help=="")$this->help=$this->table_name;
		
		$this->load->model('leasing/loan_master_model');
    }
    function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
		
		$data=data_table($this->table_name,$record);
		return $data;
    }
    function index(){
		$this->add();
    }
    function get_posts(){
		$data=data_table_post($this->table_name);
		return $data;
    }
    function add()   {
		$data=$this->set_defaults();
		$this->_set_rules();
		$this->template->display_form_input("leasing/loan_close",$data);			
    }
	function save($loan_id){
		$data=$this->input->post();
		$amt_paid=$data['amount_paid'];
		$amt_disc=$data['discount'];
		$method=$data['how_paid'];
		//load semua invoice yg belum dibayar
		$ok=$query=$this->db->where("loan_id",$loan_id)
			->where("paid",0)
			->order_by("idx_month","ASC")
			->get("ls_invoice_header");
		if($ok){
			foreach($query->result() as $faktur){
				if($amt_paid<0)$amt_paid=0;
				if($this->db->where("invoice_number",$faktur->invoice_number)
					->update("ls_invoice_header",array("paid"=>1,
						"date_paid"=>$faktur->invoice_date,
						"payment_method"=>$method,"amount_paid"=>$faktur->pokok+$faktur->bunga,
						"pokok_paid"=>$faktur->pokok,"bunga_finalty"=>$faktur->bunga)))
				{
				}							
			}
		}
		$this->load->model('leasing/loan_master_model');
		$this->loan_master_model->recalc($loan_id);
		if($ok){
			$this->db->where("loan_id",$loan_id)->update("ls_loan_master",array("status"=>'2'));
			$this->db->query("update ls_app_master set status='Close' 
				where app_id=(select app_id from ls_loan_master where loan_id='$loan_id' limit 1)");
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error."));
		}
 	}	
    function _set_rules(){}
    function valid_date($str){
     if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str)){
             $this->form_validation->set_message('valid_date',
             'date format is not valid. yyyy-mm-dd');
             return false;
     } else {
            return true;
     }
    }
}
?>
