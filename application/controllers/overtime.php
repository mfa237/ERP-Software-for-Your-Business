<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Overtime extends CI_Controller {
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
		$this->load->library('template');
		if(!$this->access->is_login())redirect(base_url());
	}
	function index()
	{	
        $data['message']='';
		$data['tanggal']= date("Y-m-d H:i:s");	
        $this->template->display('payroll/overtime',$data,'');
	}
	
  	function save(){
	 	$this->load->model("overtime_model");
		$data=$this->input->post();
		 
		$id=$data['id'];
		 
		
		if($id==0 or $id==''){
			unset($data['id']);
			$ok=$this->overtime_model->save($data);				
		} else {
			$ok=$this->overtime_model->update($id,$data);
		}
		if($ok){echo json_encode(array("success"=>true));} 
		else {echo json_encode(array("msg"=>"Error ".mysql_error()));}
	}
	function data(){
		$sql="select e.nip,e.nama,a.time_in,a.time_out,a.id,a.time_total,a.supervisor,a.keterangan,
			ttc_1x,ttc_2x,ttc_3x,ttc_4x,a.time_total_calc,a.salary_no,a.hari_libur,a.add_to_slip
		from employee e left join overtime_detail a 
		on a.nip=e.nip and year(tanggal)=".date("Y")." and month(tanggal)=".date('m')." and day(tanggal)=".date('d');
		echo datasource($sql);
	}
	function get_id($id){
		$id=urldecode($id);
		$sql="select e.nip,e.nama,a.time_in,a.time_out,a.id,a.time_total,a.supervisor,a.keterangan,
			ttc_1x,ttc_2x,ttc_3x,ttc_4x,a.time_total_calc,a.salary_no,a.hari_libur,a.add_to_slip,e.dept,e.divisi,e.emptype
		from  overtime_detail a  join employee e on e.nip=a.nip
		where a.id='$id'";
		 
		echo json_encode($this->db->query($sql)->row());
	}
  	function delete($id){
		$id=urldecode($id);
	 	$this->load->model("overtime_model");
		$ok=$this->overtime_model->delete($id);
		if($ok){echo json_encode(array("success"=>true));} 
		else {echo json_encode(array("msg"=>"Error ".mysql_error()));}
	}

}
