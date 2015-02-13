<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Setting extends CI_Controller {
	private $success=false;
	private	$message="";

	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form'));
		$this->load->library('template');
	}
	function index() {	
		$data['file']="member_view";
		$this->view($data['file']);
	}
	function view($file,$active_tab=1,$page=0) {
		$data['file']=$file;		
		$data['active_tab']=$active_tab;
		$data['caption']="PENGATURAN";
		$data['customer_number']="";
		$data['company']="";
		$data['street']="";
		$data['city']="";
		$data['phone']="";
		$data['email']="";
		$data['password']="";
		$data['zip_postal_code']="";
		if($page<0)$page=0;
		$max_page=$this->db->count_all("inventory");
		if($max_page>0)$max_page=$max_page/10;
		if($page>$max_page)$page=$max_page;
		
		$data['item_page_max']=$max_page;
		$cust_id=$this->session->userdata("cust_id");
		$data['page']=$page;
		if($q=$this->db->where("customer_number",$cust_id)
			->get("customers")){
			$cst=$q->row();
			$data['customer_number']=$cst->customer_number;
			$data['company']=$cst->company;
			$data['street']=$cst->street;
			$data['city']=$cst->city;
			$data['phone']=$cst->phone;
			$data['email']=$cst->email;
			$data['password']=$cst->password;
			$data['zip_postal_code']=$cst->zip_postal_code;
		}
	
		$this->template->display_eshop("eshop/setting",$data);
	}
}
?>