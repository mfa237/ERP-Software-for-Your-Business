<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access
 {
 public $user;
 public $user_id='';
 public $username='';
 public $cid='';
 
 
 /**
 * Constructor
 */
 function __construct()
 {
	 $this->CI =& get_instance();
	 $auth = $this->CI->config->item('auth');
	
	 $this->CI->load->helper('cookie');
	 $this->CI->load->library('session');
	 $this->CI->load->model('user_model');
	
	 $this->users_model =& $this->CI->users_model;
     $data=$this->CI->session->userdata('logged_in');
     $this->user_id=$data['user_id'];
     $this->username=$data['username'];
     $this->cid=$data['cid'];         
 }

 /**
 * Cek login user
 */

 function login($username, $password)
 {

	 $result = $this->users_model->get_login_info($username);
	 if ($result) // Result Found
	 {	
//		 $password = md5($password);
		 if ($password === $result->password)
		 {
			 // Start session
			 $this->CI->session->set_userdata('user_id',$result->user_id);
			 return TRUE;
		 }
	 }
	 return FALSE;
 }


 /**
 * cek apakah udah login
 */
    function is_login ()
    {
           return ($this->user_id!='' ? TRUE :FALSE);
    }
 /**
 * Logout
 *
 */
    function logout ()
   {
           $this->CI->session->unset_userdata('logged_in');
   }
    function print_info(){
    	echo "<img src='".base_url()."images/administrator.png'
    	 width='30' height='20' align='left'>"; 
        echo 'Selamant Datang: '.$this->username;
		echo '<a href="'.base_url().'index.php/login/logout"
		class="easyui-linkbutton" style="color:white"
		data-options="iconCls:\'icon-help\',
		plain:true">Logout</a>';
//            .'<br/>CID: '.$this->cid; 
    }
}
