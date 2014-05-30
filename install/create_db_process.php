<?
	$msg="";
	$success=true;
	error_reporting(1);
	if(isset($_POST['server'])){
		$server=$_POST['server'];
		$database=$_POST['database'];
		$user_id=$_POST['user_id'];
		$user_pass=$_POST['user_pass'];
		if($server=="" or $database=="" or $user_id==""){
			$msg.="<div class='error'>Isi nama server,database,userid !\n<br>";
			$msg.= "Silahkan kembali atau tekan tombol back browser.</div>";
			$success=false;
		}
		if($success){
				$link=mysql_connect($server,$user_id,$user_pass);
				if(!$link){
					$msg.="Tidak bisa konek ! <br>";
					$msg.= mysql_error();
					$success=false;
				}
		}
		
		$sql="DROP DATABASE ".$database;
		//	mysql_query($sql);
		//echo "<br>".mysql_error();
		/*
		if($success){
			$msg.="Konek ke server .. OK\n <br>";
			if(mysql_select_db($database)){
				$msg.="Database ". $database . " sudah ada! <br>
				Tidak bisa diteruskan, silahkan kembali dan ganti nama database.";
				$success=false;	// teruskan saja kalau sudah ada		
			}
		}
		if($success) {
			$sql = 'CREATE DATABASE '.$database;
			if (mysql_query($sql, $link)) {
				$msg.= "Membuat database baru $database ... OK\n <br>";
			} else {
				$msg.= "Database " . $database . " tidak bisa dibuat! <br>";
				$msg.= mysql_error();
				$success=false;		
			}		
			if(!mysql_select_db($database)){
				$msg.="Database ". $database . " belum ada! <br>
				Tidak bisa diteruskan, silahkan kembali dan ganti nama database.";
				$success=false;		
			}
		}
		*/
		if($success) {
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
			if (is_writable($filename)) {
			   if (!$handle = fopen($filename, 'w')) {
					$msg.="Cannot open file ($filename)";
					$success=false;
			   }
			   if($success){
				   if (fwrite($handle, $content) === FALSE) {
					   $msg.="Cannot write to file ($filename)";
						$success=false;
				   }
			   }
			   if($success){
					$msg.="<br>Success, wrote ($somecontent) to file ($filename)";
			   }
			   fclose($handle);
			
			} else {
			   $msg.="<br>The file $filename is not writable, check permission file or directory.";
			   $success=false;
			}
		
			$filename="../application/config/maxon_installed.php";
			$content="OK";
			if($success){
				if (is_writable($filename)) {
				   if (!$handle = fopen($filename, 'w')) {
						$msg.="Cannot open file ($filename)";
						$success=false;
				   }
				   if($success){
					   if (fwrite($handle, $content) === FALSE) {
						   $msg.="Cannot write to file ($filename)";
						   $success=false;
					   }
				   }
				   fclose($handle);
				} else {
				   $msg.="The file $filename is not writable";
				   $success=false;
				}
			}
		}
		if($success){
			$msg.="<br>Finish create database $database";
			$msg.="<br>Next step click link to create tables..";
		}
		// buat koneksi local
		$filename="./koneksi.php";
		if (is_writable($filename)) {
		   if (!$handle = fopen($filename, 'w')) {
				$msg.="Cannot open file ($filename)";
				$success=false;
		   }
		   if($success){
				$content="<?php mysql_connect($server,$user_id,$user_pass);mysql_select_db($database); ?>";
			   if (fwrite($handle, $content) === FALSE) {
				   $msg.="Cannot write to file ($filename)";
					$success=false;
			   }
		   }
		   fclose($handle);
		} else {
		   $msg.="<br>The file $filename is not writable, check permission file or directory.";
		   $success=false;
		}
		
		$data['success']=$success;
		$data['msg']=$msg;
		//echo $msg;
		echo json_encode($data);
	} else {
		include_once "create_db.php";
		$data['count']=0;
		$data['table']=$table;
		$data['sql']='';
		$data['msg']=$msg;
	
		//echo json_encode($data);
	};

	
			
		
?>
