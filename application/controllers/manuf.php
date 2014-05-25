<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Manuf extends CI_Controller {
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form'));
		$this->load->library('template');
	}
	function index(){	
            $this->template->display_table();
	}
	function reports(){
		$this->template->display('manuf/menu_reports');
	}
 
}
