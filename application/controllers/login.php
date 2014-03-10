<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Login extends CI_Controller {
 private $library_src='';
 private $script_head='';
 private $data; 
 function __construct()
 {
   parent::__construct();
    $this->load->library('javascript');
    $this->load->library('template');
    $this->load->helper('form');
   $this->load->model('user','',TRUE);
   $this->load->library('form_validation');


	$this->library_src=$this->jquery->script(base_url().'js/jquery/jquery-1.8.0.min.js',true);
    $this->library_src.=$this->jquery->script(base_url().'js/jquery-ui/jquery.easyui.min.js',true);
    $this->library_src.=$this->jquery->script(base_url().'js/lib.js',true);
	
    $this->script_head=$this->jquery->_compile();
	$this->script_head.='
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/demo.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'/themes/standard/style.css">"
	';




 }

 function index()
 {
    $data['message']='';
	$user_id = $this->input->post('user_id');
	if($user_id) {
	   $this->form_validation->set_rules('user_id', 'User Id', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	   if($this->form_validation->run()) {
			$data=$this->session->userdata('logged_in');
		    $data['message']='welcome';
		    $data['_content']='';
		  	$data['library_src']=$this->library_src;
		  	$data['script_head']=$this->script_head;
		    $this->template->display('welcome_message',$data);
			return true;
	   } else {
	   		$data['message']='<div style="color:red">User atau password salah !</div>';
	   }
	}
  $data['library_src']=$this->library_src;
  $data['script_head']=$this->script_head;
  $this->load->view('login_view',$data);
 }
 function logout(){
 	$this->session->set_userdata('_left_menu','');
    $this->session->set_userdata('_right_menu','');
	
    $this->session->unset_userdata('logged_in');
    $this->load->helper(array('form'));
    redirect(base_url());
 }
 function check_database($password)  {
   $user_id = $this->input->post('user_id');
   $result = $this->user->login($user_id, $password);
   if($result)  {
     $sess_array = array();
     foreach($result as $row) {
       $sess_array = array(
         'user_id' => $row->user_id,
         'username' => $row->username,
         'cid'=>$row->cid  
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return true;
   } else {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 
 
}

