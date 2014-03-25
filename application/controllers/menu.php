<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Menu extends CI_Controller {
   
	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
             
	}
	function index(){
    }
        function load($m){
            $url=$m.'/menu';
			$this->session->set_userdata('_left_menu_caption',$m);
            $this->session->set_userdata('_left_menu', $url);
            $this->session->set_userdata('_right_menu','');
            if(is_ajax()){
                echo $this->load->view($url);
            } else {
                $data['_left_menu']=$this->load->view($url,'',true);
                $data['_content']=$url;
                $this->template->display($url,$data);
            }
        }
}
