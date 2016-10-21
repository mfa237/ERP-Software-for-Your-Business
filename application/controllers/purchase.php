<?php
 if(!defined('BASEPATH')) exit('No direct script access allowd');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Purchase extends CI_Controller {
                

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
        $this->load->helper(array('url','form','browse_select'));
        $this->load->library('sysvar');
        $this->load->library('javascript');
        $this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('syslog_model');
	}
    function index(){	
	}
    function rpt($id){
		$id=urldecode($id);
    	 switch ($id) {
			 case 'po_list':
			 default:
				 
				 break;
		 }
		 $rpt='purchase/rpt/'.$id;
		 $data['rpt_controller']=$rpt;
		 
		if(!$this->input->post('cmdPrint')){
			$this->template->display_form_input('criteria',$data,'');
		} else {
			$this->load->view($rpt);
		}
   }
	function reports(){
		$this->template->display('purchase/menu_reports');
	}
	
}
?>
