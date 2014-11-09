<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Login extends CI_Controller {
 private $library_src='';
 private $script_head='';
 private $data; 
 function __construct()
 {
   parent::__construct();
    $this->load->library('template');
    $this->load->helper(array('url','form','mylib_helper'));
   $this->load->model('user','',TRUE);
   $this->load->library('form_validation');

 }

 function index() {
 	// cek file maxon_installed.php
 	$login_view="login_view";
	$login_view="login_view_simple";
	$filename="./application/config/maxon_installed.php";
	$handle = fopen($filename, "r");
	$contents = fread($handle, filesize($filename));
    fclose($handle);
 	if($contents==""){
 		header("location:install");
		exit;
 	} 	
	if($this->access->is_login()){
		$this->welcome();		
	} else {
		$data['message']='';
		$this->template->display_single($login_view,$data);
	}
 }
 
function verify(){
	   $this->form_validation->set_rules('user_id', 'User Id', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	   if($this->form_validation->run()) {
			echo json_encode(array('success'=>true));
	   } else {
	   		echo json_encode(array('msg'=>'User atau password salah !'));
	   }
}
function welcome(){
		$data=$this->session->userdata('logged_in');
	    $data['message']='welcome';
	    $data['_content']='';
		$data['visible_right']='';
		$data['ajaxed']=false;
	    $this->template->display('welcome_message',$data);
}
	
 function logout(){
 	$this->session->set_userdata('_left_menu','');
    $this->session->set_userdata('_right_menu','');
	
    $this->session->unset_userdata('logged_in');
    $this->load->helper(array('form'));
    redirect(base_url());
 }
 function check_database($password)  {
	$password=urldecode($password);
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

