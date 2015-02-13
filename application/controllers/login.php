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
   $this->load->helper("language");
   $this->lang->load("common");

 }

 function index() {
	// cek file maxon_installed.php, if no content install maxon
	// maxon_installed.php should containt text after install
	
	$filename="./application/config/maxon_installed.php";
	$handle = fopen($filename, "r");
	$contents = fread($handle, filesize($filename));
    fclose($handle);
 	if($contents==""){
 		header("location:install");
		exit;
 	}
	if(website_activated()){
		// website view when table maxon_apps contain _20000 text
		$login_view="login_view";
	} else {
		// default view
		$login_view="login_view_simple";
	}
	if(eshop_activated()){
		// e-commerce view when table maxon_apps contain 'eshop' text
		$this->eshop();
	} else {
		// default view
		if($this->access->is_login()){
			$this->welcome();		
		} else {
			$this->load->model('article_model');
			$data['message']='';
			$data['article_cats']=$this->article_model->categories();
			$this->template->display_login($login_view,$data);
		}
	}
 }
function eshop(){
	header("location:".base_url()."index.php/eshop/home");

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
	$this->session->set_userdata('_left_menu_caption',"");
	$this->session->set_userdata('_left_menu', "");
	$this->session->set_userdata('_right_menu','');
	
	$this->template->display('welcome_message',$data);
}
	
 function logout(){

	my_log("LOGOUT","");			
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
	 my_log("LOGIN","",$user_id);			
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
     $this->form_validation->set_message('check_database', lang('login_error'));
     return false;
   }
 }
 
 
}

