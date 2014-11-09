<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Employee extends CI_Controller {
    private $limit=10;
    private $offset=0;
    private $table_name='employee';
	private $sql="select nip,nama,dept from employee ";

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())header("location:".base_url());
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
	}
	function set_defaults($record=NULL){
		$data=data_table($this->table_name,$record);
        $data['mode']='';
        $data['message']='';
        return $data;
	}
	function index(){$this->browse();}

	function add()	{
		$data=$this->set_defaults();           
	 	$this->_set_rules();
		$data['mode']='add';
		$data['_right_menu']="payroll/menu_payroll";
		$this->load->model('company_model');

		$this->load->model('employee_group_model');
		$data['group_list']=$this->employee_group_model->lookup();
		$this->load->model('department_model');
		$data['dept_list']=$this->department_model->lookup();
		$this->load->model('division_model');
		$data['div_list']=$this->division_model->lookup();
		$this->load->model('employee_level_model');
		$data['level_list']=$this->employee_level_model->lookup();
		$this->load->model('employee_type_model');
		$data['type_list']=$this->employee_type_model->lookup();
		$this->load->model('ptkp_model');
		$data['status_list']=$this->ptkp_model->lookup();
				
        $this->template->display_form_input('payroll/employee',$data);
	}
	function save(){
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
		 	$this->load->model("employee_model");
			$data=$this->input->post();
			$id=$this->input->post("nip");
			$mode=$data["mode"];
		 	unset($data['mode']);
			if($mode=="add"){ 
				$ok=$this->employee_model->save($data);
			} else {
				$ok=$this->employee_model->update($id,$data);				
			}
			if($ok){echo json_encode(array("success"=>true,"nip"=>$id));} 
			else {echo json_encode(array("msg"=>"Error ".mysql_error()));}
		 }  
		 else {echo json_encode(array("msg"=>"Error ".validation_errors()));}
	}
	function view($id,$message=null){

	 	 $this->load->model("employee_model");
		 $id=urldecode($id);
		 $model=$this->employee_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);

		$this->load->model('employee_group_model');
		$data['group_list']=$this->employee_group_model->lookup();
		$this->load->model('department_model');
		$data['dept_list']=$this->department_model->lookup();
		$this->load->model('division_model');
		$data['div_list']=$this->division_model->lookup();
		$this->load->model('employee_level_model');
		$data['level_list']=$this->employee_level_model->lookup();
		$this->load->model('employee_type_model');
		$data['type_list']=$this->employee_type_model->lookup();
		$this->load->model('ptkp_model');
		$data['status_list']=$this->ptkp_model->lookup();

		 $data['id']=$id;
		 $data['mode']='view';
		 $data['message']=$message;
		 $this->template->display_form_input('payroll/employee',$data);
	}
	function _set_rules(){	
		 $this->form_validation->set_rules('nip','Isi NIP Pegawai', 'required|trim');
		 $this->form_validation->set_rules('nama','Isi nama pegawai', 'required');
	}
 	function search(){$this->browse();}
 	       
	function browse($offset=0,$limit=10,$order_column='company',$order_type='asc')	{
        $data['caption']='DAFTAR MASTER PEGAWAI';
		$data['controller']='employee';		
		$data['fields_caption']=array('Kode','Nama Pegawai','Dept','Divisi','Jabatan','Kelompok');
		$data['fields']=array('nip','nama','dept','divisi','position','emptype');
		$data['field_key']='nip';
		$this->load->library('search_criteria');
		
		$faa[]=criteria("NIP","sid");
		$faa[]=criteria("Nama","sid_nama");
		$faa[]=criteria("Dept","sid_dept");
		$faa[]=criteria("Divisi","sid_div");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
		$sql="select nip,nama,dept,divisi,position,emptype from employee where 1=1";
		$s=$this->input->get('sid');		
		if($s!=''){
			$sql.=" and nip='$s'";
		} else {
			$s=$this->input->get('sid_nama');if($s!='')$sql.=" and nama like '$s%'";
			$s=$this->input->get('sid_dept');if($s!='')$sql.=" and dept like '$s%'";
			$s=$this->input->get('sid_div');if($s!='')$sql.=" and divisi like '$s%'";
		}			
        echo datasource($sql);		
    }
      
	function delete($id){
		$id=urldecode($id);
	 	$this->load->model("employee_model");
	 	$this->employee_model->delete($id);
	 	$this->browse();
	}
	function select($search=''){
		$search=urldecode($search);
		$sql="select nama,nip,dept,divisi	from employee 
		where nama like '$search%')
		order by nama limit 100";
		echo datasource($sql);
	}
	function find($nip=""){
		$nip=urldecode($nip);
		$sql="select nama,nip,dept,divisi,emptype,nip_id	from employee";
		if($nip!="")$sql.=" where nip='$nip'";
		$query=$this->db->query($sql);	
		echo json_encode($query->row_array());
	}
	function find2($nip=""){
		$nip=urldecode($nip);
		$sql="select nama,nip,dept,divisi,emptype,nip_id	from employee";
		if($nip!="")$sql.=" where nip='$nip'";
		echo datasource($sql);
	}	
	function level(){
		$data['caption']="LEVEL PEGAWAI";		
		$this->template->display("payroll/level",$data);
	}
   function level_add(){
		$this->load->model('employee_level_model');
		$data = $this->input->post(NULL, TRUE); //getallpost			
		$ok=$this->employee_level_model->save($data);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function level_delete($kode){
		$kode=urldecode($kode);
   		$kode=htmlspecialchars_decode($kode);
		$this->load->model('employee_level_model');
		$ok=$this->employee_level_model->delete($kode);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
	function jenis(){
		$data['caption']="JENIS PEGAWAI";		
		$this->template->display("payroll/type",$data);
	}
   function jenis_add(){
		$this->load->model('employee_type_model');
		$data = $this->input->post(NULL, TRUE); //getallpost			
		$ok=$this->employee_type_model->save($data);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function jenis_delete($kode){
		$kode=urldecode($kode);
		$this->load->model('employee_type_model');
		$ok=$this->employee_type_model->delete($kode);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
	function group(){
		$data['caption']="GROUP PEGAWAI";		
		$this->template->display("payroll/group",$data);
	}
   function group_add(){
		$this->load->model('employee_group_model');
		$data = $this->input->post(NULL, TRUE); //getallpost			
		$ok=$this->employee_group_model->save($data);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function group_delete($kode){
		$kode=urldecode($kode);
		$this->load->model('employee_group_model');
		$ok=$this->employee_group_model->delete($kode);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
	function experience($cmd,$id=''){
		$id=urldecode($id);
		if($cmd=="save"){
			 
			$data=$this->input->post();
			if(isset($data['startdate']))$data['startdate']= date('Y-m-d H:i:s', strtotime($data['startdate']));
			if(isset($data['finishdate']))$data['finishdate']= date('Y-m-d H:i:s', strtotime($data['finishdate']));
			 
			
			if($data['id']=="" or $data['id']=="0") {
				unset($data['id']);
				$ok=$this->db->insert("employeeexperience",$data);
			} else {
				$id=$data['id'];
				$this->db->where("id",$id);
				$ok=$this->db->update("employeeexperience",$data);
			}
			if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
		}
		if($cmd=="load") {
			$sql="select * from employeeexperience where employeeid='$id'";
			echo datasource($sql);
		}
		if($cmd=="delete") {
			$this->db->where("id",$id);
			$ok=$this->db->delete("employeeexperience");
			if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
		}
	}
	function education($cmd,$id=''){
		$id=urldecode($id);
		if($cmd=="save"){
			 
			$data=$this->input->post();
			if($data['id']=="" or $data['id']=="0") {
				unset($data['id']);
				$ok=$this->db->insert("employeeeducations",$data);
			} else {
				$id=$data['id'];
				$this->db->where("id",$id);
				$ok=$this->db->update("employeeeducations",$data);
			}
			if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'.mysql_error()));}   	
		}
		if($cmd=="load") {
			$sql="select * from employeeeducations where employeeid='$id'";
			echo datasource($sql);
		}
		if($cmd=="delete") {
			$this->db->where("id",$id);
			$ok=$this->db->delete("employeeeducations");
			if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
		}
	}	
}
