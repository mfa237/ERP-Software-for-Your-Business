<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Member extends CI_Controller {
	private $success=false;
	private	$message="";

	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form'));
		$this->load->library('template');
	}
	function index() {	
		$data['caption']="Member List";
		//$this->template->display_eshop("eshop/login",$data);
	}
	function add() {
		$data['caption']="Member Registration";
		$data['customer_number']="";
		$data['company']="";
		$data['street']="";
		$data['city']="";
		$data['phone']="";
		$data['email']="";
		$data['password']="";
		$data['zip_postal_code']="";		
		$this->template->display_eshop("eshop/member",$data);
	}
	function save($mode='add') {
		$data=$this->input->post();
		if($mode=="add"){
			$ok=$this->db->insert("customers",$data);
		} else {
			$cust_id=$data['customer_number'];
			unset($data['customer_number']);
			$ok=$this->db->where("customer_number",$cust_id)->update("customers",$data);
		}
		$message="Ada kesalahan saat menyimpan data !";
		echo json_encode(array("success"=>$ok,"message"=>$message));
	}
}
?>