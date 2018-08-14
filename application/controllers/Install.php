<?php 
class Install extends CI_Controller {
function __construct()
{
	 parent::__construct();
	 $this->load->helper(array('url','form'));
	 $this->load->library('template_install');
	}

	function index()
	{
		$this->template_install->display('welcome_message');
	}
	function check_dir() 
	{
		$this->template_install->display("check_dir");
	}
	function cancel_install()
	{
		echo "<h1>See you next time !</h1>";
	}
	function set_db()
	{
		
		$this->template_install->display("set_db");
		
	}
	function cek_db_process(){
		$dpost=$this->input->post();
		$server=$dpost['server'];
		$database=$dpost['database'];
		$user_id=$dpost['user_id'];
		$user_pass=$dpost['user_pass'];
		$ok=false;
		$msg="";
		// cek connection
		$link=mysql_connect($server,$user_id,$user_pass);
		if( !$link ){
			$msg="Error connecting server!";
			$ok=false;
		} else {
			$msg="Connecting server success.";
			$ok=true;			
		}
		// cek database if already canot continue
		if($ok){
			$ok=mysql_select_db($database);
			if( $ok ){
				$ok=false;
				$msg.="<br>Invalid Database: [".$database."] already exist cannot continue.";
			} else {
				$ok=true;
			}
		}
		if( $ok ) {
			// create new database
			$ok=mysql_query('CREATE DATABASE '.$database, $link);
			if ( !$ok ) {
				$msg.="<br>Error creating new database [".$database."], cannot continue.";
			} else {
				$msg.="<br>Create new database ".$database." success.";
			}
			if ( $ok ) {
				// select with new database
				$ok=mysql_select_db($database);
				if(!$ok){
					$msg.="<br>Error opening new database [".$database."].";
					mysql_query("DROP DATABASE ".$database,$link);
				}
			}
		}	
		if( $ok ) {
			// write ../application/config/database.php
			$content="<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');			 
\$active_group = 'default';
\$active_record = TRUE;
\$db['default']['hostname'] = '$server';
\$db['default']['username'] = '$user_id';
\$db['default']['password'] = '$user_pass';
\$db['default']['database'] = '$database';
\$db['default']['dbdriver'] = 'mysql';
\$db['default']['dbprefix'] = '';
\$db['default']['pconnect'] = TRUE;
\$db['default']['db_debug'] = TRUE;
\$db['default']['cache_on'] = FALSE;
\$db['default']['cachedir'] = '';
\$db['default']['char_set'] = 'utf8';
\$db['default']['dbcollat'] = 'utf8_general_ci';
\$db['default']['swap_pre'] = '';
\$db['default']['autoinit'] = TRUE;
\$db['default']['stricton'] = FALSE;
";

			$filename="../application/config/database.php";
			if ($ok = is_writable($filename)) {
			   if (!$handle = fopen($filename, 'w')) {
					$msg.="<br>Tidak bisa buka file ($filename)<br>";
					$ok=false;
			   }
			   if( $ok ){
				   if (fwrite($handle, $content) === FALSE) {
						$msg.="<br>Tidak bisa menulis ke file ($filename) <br> 
						Periksa seting folder application config <br>>";
						$ok = false;
				   }
			   }
			   if( $ok ){
					$msg.="<br>Success, dapat menulis isi ke file configurasi ($filename)";
					$ok=true;
			   }
			   fclose($handle);
			
			} else {
			   $msg.="<br>The file $filename is not writable, check permission file or directory. <br>";
			   $ok=false;
			}
			if( !$ok )	mysql_query("DROP DATABASE ".$database,$link);
		}
		// create flag file maxon_installed
		if($ok){
			$filename="../application/config/maxon_installed.php";
			$content="OK";
			if ($ok = is_writable($filename)) {
			   if (!$handle = fopen($filename, 'w')) {
					$msg.="<br>Cannot open file ($filename)";
					$ok=false;
			   }
			   if($ok){
				   if (fwrite($handle, $content) === FALSE) {
					   $msg.="<br>Cannot write to file ($filename)";
					   $ok=false;
				   }
			   }
			   if( $ok ){
					$msg.="<br>Success, dapat menulis isi ke file configurasi ($filename)";
					$ok=true;
			   }
			   fclose($handle);
			} else {
			   $msg.="<br>The file $filename is not writable";
			   $ok=false;
			}
			if( !$ok )	mysql_query("DROP DATABASE ".$database,$link);

		}
		
		$data=array("success"=>$ok,"message"=>$msg);
		echo json_encode($data);
	}
	function cek_db_process_2(){
		$dpost=$this->input->post();
		$server=$dpost['server'];
		$database=$dpost['database'];
		$user_id=$dpost['user_id'];
		$user_pass=$dpost['user_pass'];
		$this->session->set_userdata('setserver',$dpost);
		// cek connection
		$link=mysql_connect($server,$user_id,$user_pass);
		$ok=mysql_select_db($database);
		$ok=true;
		$msg="Creating tables and queries";
		$path=realpath(dirname(__FILE__));
		include $path."/../views/sql/create_db.php";
		$finish="<h1>Finish.</h1><p>Congratulation you have new application, next button 
		setting your company data master.</p>
		<a href='".base_url()."../index.php' 
		class='btn btn-warning' role='button'>Lanjutkan Login</a>		
		";
		///welcome/set_web next release
		$data=array("success"=>$ok,"message"=>$msg,"finish"=>$finish);
		echo json_encode($data);
	}
	function set_web(){
		$this->template_install->display("set_web");		
	}
	function set_web_process(){
		$dpost=$this->session->userdata("setserver");
		if(!$dpost){
			$msg="<p>Unable get session server !</p>";
			$ok=false;
		} else {
			$link=mysql_connect($dpost['server'],$dpost['user_id'],$dpost['user_pass']);
			$ok=mysql_select_db($dpost['database']);
			if( !$ok ) {
				$msg="<p>Unable opening database ".$dpost['database']." !</p>";
			} else {
				$dpost2=$this->db->post();
				$company['company_name']=$dpost2['company_name'];
				$company['company_name']=$dpost2['company_name'];
			}			
		}
		$data=array("success"=>$ok,"message"=>$msg,"finish"=>$finish);
		echo json_encode($data);
	}
	
	
}