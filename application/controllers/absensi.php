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
		$this->load->model('periode_model');
		$periode=$this->periode_model->get_by_id($periode)->row();
		$sql="select a.tanggal,e.nip,e.nama,a.time_in,a.time_out,a.id,a.ot_in,a.ot_out 
		from employee e left join time_card_detail a 
		on a.nip=e.nip where a.nip='".$nip."' and a.tanggal between '"
			.$periode->startdate."' and '".$periode->enddate."'";
		echo datasource($sql);
		
	}
 	function save(){
	 	$this->load->model("time_card_detail_model");
		$data=$this->input->post();
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
		if($ok){echo json_encode(array("success"=>true));} 
		else {echo json_encode(array("msg"=>"Error ".mysql_error()));}
	}
	function detail($nip){
		$data['nip']=$nip;
		$this->load->model('periode_model');
		$data['periode']=date("Y-m");	///$this->periode_model->current_periode();
		$data['periode_list']=$this->periode_model->dropdown();
		$this->load->model('employee_model');
		$q=$this->employee_model->get_by_id($nip);
		if($q){
			$emp=$q->row();
			$data['nama']=$emp->nama;
			$data['dept']=$emp->dept;
			$data['divisi']=$emp->divisi;			
		} else {
			$data['nama']='Not Found !';
			$data['dept']='';
			$data['divisi']='';
		}	
		$this->template->display('payroll/absensi_data',$data);
	}
}
