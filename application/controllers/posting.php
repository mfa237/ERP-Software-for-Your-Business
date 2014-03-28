<?php
 if(!defined('BASEPATH')) exit('No direct script access allowd');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Posting extends CI_Controller {
                

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
        $this->load->helper(array('url','form','browse_select'));
        $this->load->library('sysvar');
        $this->load->library('javascript');
        $this->load->library('template');
		$this->load->library('form_validation');
	}
    function index(){	
   }
	function sales_invoice(){
		 $data['date_from']=date('Y-m-d 00:00:00');
		 $data['date_to']=date('Y-m-d 23:59:59');
		 $data['rpt_controller']='posting/sales_invoice';
		 $data['select_date']=true;
		 $data['target_window']=false;
		 $data['module']='posting';
		 $postcode=$this->input->post('cmdPosting');
		 if($postcode=="")$postcode=$this->input->post('cmdUnPosting');
		if($postcode==""){
			$this->template->display_form_input('criteria',$data,'');
		} else {
			$this->load->model('invoice_model');
			if($postcode=="Posting"){
				$this->invoice_model->posting($this->input->post('txtDateFrom'),$this->input->post('txtDateTo'));
			} else {
				$this->invoice_model->un_posting($this->input->post('txtDateFrom'),$this->input->post('txtDateTo'));				
			}
		}
		
	}

}
?>
