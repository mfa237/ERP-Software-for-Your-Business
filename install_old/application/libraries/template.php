<?php
class Template {
 protected $_ci;
 private $jquery='';
 private $bootstrap='';
 private $easyui='';
 private $mylib='';
 function __construct()
 {
    $this->_ci =&get_instance();

    $this->_ci->load->library(array('javascript'));
	
	$base=base_url();
	$this->bootstrap='';
	$this->bootstrap.='<link rel="stylesheet" type="text/css" href="'.$base.'../assets/bootstrap/css/bootstrap.css">';
    $this->bootstrap.=$this->_ci->jquery->script($base.'../assets/bootstrap/js/bootstrap.js',true);

	$this->jquery="";
	$this->jquery.=$this->_ci->jquery->script($base.'../js/jquery/jquery-1.9.min.js',true);

    $this->mylib=$this->_ci->jquery->script($base.'../js/lib.js',true);
	
	$themes="standard";
	$this->easyui='
 	<link rel="stylesheet" type="text/css" href="'.$base.'../js/jquery-ui/themes/$themes/easyui.css">
	<link rel="stylesheet" type="text/css" href="'.$base.'../js/jquery-ui/themes/icon.css">
	<script type="text/javascript" charset="utf-8" src="'.$base.'../js/jquery/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="'.$base.'../js/jquery-ui/jquery.easyui.min.js"></script>
	';
}

 function display($page,$data=null)
 {
	  	$data['jquery']=$this->jquery;
	  	$data['bootstrap']=$this->bootstrap;
		$data['mylib']=$this->mylib;
		
		$data['header']=$this->_ci->load->view('header',$data, true);
		$data['footer']=$this->_ci->load->view('footer',$data, true);
		$data['page']=$this->_ci->load->view($page,$data, true);
		$this->_ci->load->view('template',$data);              
 }
 
}
