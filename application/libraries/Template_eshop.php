<?php
class Template_eshop {
 protected $_ci;
 private $library_src='';
 private $script_head='';
 private $bootstrap_only='';
 private $flexslider='';
 public $folder_view="eshop";		//view folder default
  //public $folder_view="eshop_soft";		//view folder default
 function __construct()
 {
    $this->_ci =&get_instance();
    $this->_ci->load->library(array('javascript','sysvar'));
	$base=base_url();
	$this->bootstrap_only="<link rel='stylesheet' type='text/css' href='$base//assets/bootstrap/css/bootstrap.css'>";
	$this->bootstrap_only.=$this->_ci->jquery->script(base_url().'assets/jquery/jquery-1.11.3.min.js',true);
    $this->bootstrap_only.=$this->_ci->jquery->script(base_url().'assets/bootstrap/js/bootstrap.js',true);
    $this->bootstrap_only.=$this->_ci->jquery->script(base_url().'js/lib.js',true);
    $this->flexslider=$this->_ci->jquery->script(base_url().'assets/flexslider/jquery.flexslider.js',true);
	$themes=$this->_ci->sysvar->getvar('themes','standard');	
	add_log_ip_address();
}

 function display($template,$data){
	$data['folder_view']=$this->folder_view; 
  	$data['library_src']=$this->bootstrap_only;
  	$data['script_head']=$this->flexslider;
	$data['file_content']=$template;
	$data['content']=true;
	$data['footer']='footer';
	$this->_ci->load->view($this->folder_view."/layout",$data);		 
 }
 function item($item_id){
	 
 }
 function filter(){
	 
 }
 
 
 
}
