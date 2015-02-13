<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Categories extends CI_Controller {
	private $success=false;
	private	$message="";

	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form'));
		$this->load->library('template');
	}
	function index() {	
		$data['message']='';
		$data['active_tab']=1;
		$this->template->display_eshop('eshop/category',$data);
	}
	function view($cat_id) {	
		$data['message']='';
		$data['cat_id']=$cat_id;
		$this->template->display_eshop('eshop/category',$data);
	}	
}