<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Cuti extends CI_Controller {
    private $limit=10;
    private $offset=0;
    private $table_name='hr_leaves';
	private $sql="select * from hr_leaves";

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())header("location:".base_url());
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
        $this->load->library('javascript');
        $this->load->library('template');
		$this->load->library('form_validation');
        $this->load->library('sysvar');
		$this->load->library('list_of_values');
		$this->load->model('payroll/employee_model');
		$this->load->model('payroll/leaves_model');
		$this->load->library('search_criteria');
	}
	function set_defaults($record=NULL){
		$data=data_table($this->table_name,$record);
		$id=$data['id'];
        $data['mode']='';
        $data['message']='';
		$data['nama_pegawai']='';
		$data['from_date']= date('Y-m-d H:i:s', strtotime($data['from_date']));
		if(date('Y',strtotime($data['from_date'])<2000))$data["from_date"]=date("Y-m-d");
		$data['to_date']= date('Y-m-d H:i:s', strtotime($data['to_date']));
		if(date('Y',strtotime($data['to_date'])<2000))$data["to_date"]=date("Y-m-d");
		$data['nama_pegawai']=$this->employee_model->info($data['nip']);
		$data['lookup_employee']=$this->list_of_values->render(array(
				"dlgBindId"=>"nip","dlgId"=>"LovEmployee",
				"dlgUrlQuery"=>base_url()."index.php/payroll/employee/browse_data/",
				"dlgCols"=>array(
					array("fieldname"=>"nip","caption"=>"Nip","width"=>"80px"),
					array("fieldname"=>"nama","caption"=>"Nama","width"=>"200px")
				),
				"dlgRetFunc"=>"$('#nip').val(row.nip);
				$('#nama_pegawai').val(row.nama);"
			));
		
        return $data;
		
	}
	function index(){$this->browse();}

	function add()	{
		$data=$this->set_defaults();        
	 	$this->_set_rules();
		$data['mode']='add';
        $this->template->display_form_input('payroll/leaves',$data);
	}
	function save(){
		$data=$this->input->post();
		$id=$this->input->post("id");
		$mode=$data["mode"];
		unset($data['mode']);
		if($mode=="add"){ 
			$ok=$this->leaves_model->save($data);
		} else {
			$ok=$this->leaves_model->update($id,$data);				
		}
		if($ok){echo json_encode(array("success"=>true,"period"=>$id));} 
		else {echo json_encode(array("msg"=>"Error ".mysql_error()));}
	}
	function view($id,$message=null){
		 $id=urldecode($id);
		 $model=$this->leaves_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
		 $data['message']=$message;
		 $this->template->display_form_input('payroll/leaves',$data);
	}
	function _set_rules(){	
		 $this->form_validation->set_rules('from_date','Isi tanggal', 'required');
		 $this->form_validation->set_rules('to_date','Isi tanggal', 'required');
	}
 	function search(){$this->browse();}
 	       
	function browse($offset=0,$limit=10,$order_column='nip',$order_type='asc')	{
        $data['caption']='DAFTAR CUTI KARYAWAN';
		$data['controller']='payroll/cuti';		
		$data['fields_caption']=array('NIP','Nama Karyawan','Dari','Sampai','Alasan','Id');
		$data['fields']=array('nip','nama','from_date','to_date','reason','id');
		$data['field_key']='id';
		
		$faa[]=criteria("NIP","sid_nip");
		$faa[]=criteria("Nama","sid_nama");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
		$sql="select o.nip,e.nama, o.from_date,o.to_date,o.reason,o.id 
		from hr_leaves o left join employee e on e.nip=o.nip ";
        echo datasource($sql);		
    }
      
	function delete($id){
		$id=urldecode($id);
	 	$this->leaves_model->delete($id);
	 	$this->browse();
	}
}
