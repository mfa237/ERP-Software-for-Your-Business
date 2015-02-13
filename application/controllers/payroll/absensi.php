<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Absensi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		if(!$this->access->is_login())redirect(base_url());
		
	}
	function index()
	{
		$data['title']='DATA ABSENSI';
		$data['tanggal']= date("Y-m-d H:i:s");	
        $this->template->display_form_input('payroll/absensi',$data,'');
	}
	function data(){
		$sql="select e.nip,e.nama,a.time_in,a.time_out,a.id 
		from employee e left join time_card_detail a 
		on a.nip=e.nip and year(tanggal)=".date("Y")." and month(tanggal)=".date('m')." and day(tanggal)=".date('d');
		echo datasource($sql);
	}
	function data_nip($nip,$periode){
		 $nip=urldecode($nip);
		 $periode=urldecode($periode);
		
		$this->load->model('periode_model');
		$periode=$this->periode_model->get_by_id($periode)->row();
		$sql="select a.tanggal,e.nip,e.nama,a.time_in,a.time_out,a.id,a.ot_in,a.ot_out 
		from employee e left join time_card_detail a 
		on a.nip=e.nip where a.nip='".$nip."' and a.tanggal between '"
			.$periode->startdate."' and '".$periode->enddate."'";
		echo datasource($sql);
		
	}
 	function save($vdata=null){
	 	$this->load->model("payroll/time_card_detail_model");
		if($vdata){
			$data=$vdata;
		} else {
			$data=$this->input->post();
		}
		$data['salary_no']=0;
		$sql="select time_in,time_out,id from time_card_detail where nip='".$data['nip'].
		"' and  year(tanggal)=".date("Y")." and month(tanggal)=".date('m')." and day(tanggal)=".date('d');

		$query=$this->db->query($sql);
		if($query->num_rows()){
			unset($data['tanggal']);
			unset($data['time_in']);
			$ok=$this->time_card_detail_model->update($query->row()->id,$data);
		} else {
			$ok=$this->time_card_detail_model->save($data);			
		}
		if(!$vdata){
			if($ok){echo json_encode(array("success"=>true));} 
			else {echo json_encode(array("msg"=>"Error ".mysql_error()));}
		}
	}
	function detail($nip=''){
		 $nip=urldecode($nip);
		$data['nip']=$nip;
		$this->load->model('periode_model');
		$data['periode']=date("Y-m");	///$this->periode_model->current_periode();
		$data['periode_list']=$this->periode_model->dropdown();
		$this->load->model('employee_model');

		$data['nama']='Not Found !';
		$data['dept']='';
		$data['divisi']='';

		$q=$this->employee_model->get_by_id($nip);
		if($q){
			if($emp=$q->row()){
				$data['nama']=$emp->nama;
				$data['dept']=$emp->dept;
				$data['divisi']=$emp->divisi;		
			}
		}
		$this->template->display('payroll/absensi_data',$data);
	}
	function import_from_user_login($date_from,$date_to){
		if($query=$this->db->query("select * from syslog where jenis in ('LOGIN','LOGOUT') 
			and tgljam between '".date("Y-m-d",strtotime($date_from))."' 
				and '".date("Y-m-d",strtotime($date_to))." 23:59:59'")) { 
			foreach($query->result() as $row){
				$nip="";
				if($quser=$this->db->query("select nip from `user` 
					where user_id='".$row->userid."'")){
					if($ruser=$quser->row()){
						$nip=$ruser->nip;
						if($nip==null)$nip="";
					}
				}
				if($nip==null)$nip="";
				if($nip=="")$nip=$row->userid;
				if($nip){
					$data['time_in']=date("H:i",strtotime($row->tgljam));
					$data['time_out']=date("H:i",strtotime($row->tgljam));
					$data['nip']=$nip;
					$data['tanggal']=date("Y-m-d",strtotime($row->tgljam));
					$this->save($data);
				}
			}
		}
	}
	function convert_login_absen(){
		if($this->input->post('date_from')){
			$data=$this->input->post();
			$d1=date("Y-m-d H:i:s",strtotime($data['date_from']));
			$d2=date("Y-m-d H:i:s",strtotime($data['date_to']));
			$this->import_from_user_login($d1,$d2);
				$data['message']="Data absensi sudah dibuatkan berdasarkan periode tanggal tersebut.";
				if($query=$this->db->query("select nip,tanggal,time_in,time_out  
					from time_card_detail where tanggal between '$d1' and '$d2' 
					order by tanggal")){
					$data['absen_list']=$query;
				}
		} else {
			$data['date_from']=date("m/d/Y");
			$data['date_to']=date("m/d/Y");		
		}
		$this->template->display("payroll/absensi_import_login",$data);
	}
	 
}
