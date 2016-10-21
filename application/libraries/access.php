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
		   $this->log_text("LOGOUT","");
   }
    function print_info(){
    	echo "<img src='".base_url()."images/administrator.png'	align='left'>"; 
        echo ' Welcome [<strong>'.$this->username.'</strong>]';
        echo "&nbsp&nbsp";
        echo '<a href="'.base_url().'index.php/login/logout"
		class="easyui-linkbutton" 
		data-options="iconCls:\'icon-no\',
		plain:false" style=\'text-color:red;\' ">Logout</a>';
//            .'<br/>CID: '.$this->cid; 
    }
	function user_id(){
		return $this->user_id;		
	}
	function user_name(){ return $this->username; }
	function cid(){ return $this->cid; }
	
	function user_with_job($group_id=null)
	{
		if(!$group_id) return $this->user_id;
		$sql="";
		if( !is_array($group_id) ) {
			$sql="select user_id from user_job where group_id='$group_id'";
		} else {
			$in="";
			for($i=0;$i<count($group_id);$i++)
			{
				$in .= "'".$group_id[$i]."',";
			}
			if(substr($in,-1)==",")$in=substr($in,0,strlen($in)-1);
			if($in=="") {
				$sql="select user_id from user_job where group_id='$group_id' ";				
			} else {
				$sql="select user_id from user_job where group_id in ($in) ";				
			}
		}
		
        $query=$this->CI->db->query($sql);

		return $query->result_array();
	}
}
