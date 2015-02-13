<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Sales extends CI_Controller {
	private $success=false;
	private	$message="";

	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form'));
		$this->load->library('template');
	}
	function index() {	
	}
	function view($so_number) {
		$cust_id=$this->session->userdata("cust_id");
		$so=$this->db->where("sales_order_number",$so_number)
			->get("sales_order")->row();
		$so_item=$this->db->where("sales_order_number",$so_number)
			->get("sales_order_lineitems");
		$so_pay=$this->db->where("invoice_number",$so_number)->get("payments")->row();
		$data['cust']=$this->db->where("customer_number",$cust_id)->get("customers")->row();
		$data['so']=$so;
		$data['so_detail']=$so_item;
		$data['so_pay']=$so_pay;
		$data['caption']="TAGIHAN";
		$this->template->display_eshop("eshop/sales",$data);
	}
}
?>