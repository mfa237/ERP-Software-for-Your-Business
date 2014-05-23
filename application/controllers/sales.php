<?php
 if(!defined('BASEPATH')) exit('No direct script access allowd');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Sales extends CI_Controller {
                

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
    function rpt($id){
		 $data['date_from']=date('Y-m-d 00:00:00');
		 $data['date_to']=date('Y-m-d 23:59:59');
		 $data['select_date']=true;		 
    	 switch ($id) {
			 case 'ar_dtl':
				 $data['criteria1']=true;
				 $data['label1']='Kode Pelanggan';
				 $data['text1']='';
				 $data['output1']="text1";
				 $data['key1']="customer_number";
				 $data['fields1'][]=array("company","180","Nama");
				 $data['fields1'][]=array("customer_number","80","Kode");
				 $data['fields1'][]=array("street","180","Alamat");
				 $data['ctr1']='customer/select';
				 break;			 
			 case 'faktur_slsman':
				 $data['criteria1']=true;
				 $data['label1']='Kode Salesman';
				 $data['text1']='';
				 $data['output1']="text1";
				 $data['key1']="salesman";
				 $data['fields1'][]=array("salesman","180","Salesman");
				 $data['ctr1']='salesman/select';

				 $data['criteria2']=true;
				 $data['label2']='Kode Pelanggan';
				 $data['text2']='';
				 $data['output2']="text2";
				 $data['key2']="customer_number";
				 $data['fields2'][]=array("company","180","Nama");
				 $data['fields2'][]=array("customer_number","80","Kode");
				 $data['fields2'][]=array("street","180","Alamat");
				 $data['ctr2']='customer/select';

				 break;			 
			 case 'faktur_cust':
			 case 'age_dtl':
				 $data['criteria1']=true;
				 $data['label1']='Kode Pelanggan';
				 $data['text1']='';
				 $data['output1']="text1";
				 $data['key1']="customer_number";
				 $data['fields1'][]=array("company","180","Nama");
				 $data['fields1'][]=array("customer_number","80","Kode");
				 $data['fields1'][]=array("street","180","Alamat");
				 $data['ctr1']='customer/select';

				 break;			 

			 default:
				 break;
		 }
		 $rpt='sales/rpt/'.$id;
		 $data['rpt_controller']=$rpt;
		 
		if(!$this->input->post('cmdPrint')){
			$this->template->display_form_input('criteria',$data,'');
		} else {
			$this->load->view($rpt);
		}
   }
	function reports(){
		$this->template->display('sales/menu_reports');
	}
}
?>
