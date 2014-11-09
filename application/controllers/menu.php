<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Menu extends CI_Controller {
   
	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','mylib_helper','path_helper'));
		$this->load->library('template');
             
	}
	function index(){
    }
        function load($m){
            $url=$m.'/menu';
			$table_model=APPPATH.'models/'. $m . '/table_model.php';
			if ( file_exists($table_model)){
				$this->load->model($m . '/table_model');
				$this->table_model->check_tables();
			}
			$this->session->set_userdata('_left_menu_caption',$m);
            $this->session->set_userdata('_left_menu', $url);
            $this->session->set_userdata('_right_menu','');
            if(is_ajax()){
                echo $this->load->view($url,$data);
            } else {
                $data['_content']=$url;
				$data['ajaxed']=false;
                $this->template->display($url,$data);
            }
        }
}
