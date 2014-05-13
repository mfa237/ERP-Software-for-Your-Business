<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Jobs extends CI_Controller {
	private $limit=10;
   	private $table_name='modules_groups';
    private $sql="select user_group_id,user_group_name,description from modules_groups";
    private $file_view='admin/user_jobs';
	private $controller="jobs";
	private $primary_key="user_group_id";

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('user_jobs_model');
        $this->load->model('modules_groups_model');
	}
	function set_defaults($record=NULL){
            $data=data_table($this->table_name,$record);
            $data['mode']='';
            $data['message']='';
            return $data;
	}
	function index()
	{	
            $this->browse();
	}
	function get_posts(){
        $data=  data_table_post($this->table_name);
		return $data;
	}
	function add()
	{
		 
		
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
		 	$modules=$this->input->post('modules');
		 	$group_id=$this->input->post('user_group_id');
			$this->modules_groups_model->save($data);		
			 
			if($modules)$this->modules_groups_model->save_modules($group_id,$modules);
            $message='Update Success';
            $data['mode']='view';
            $this->browse();
		} else {
			$data['mode']='add';
			$data['message']='';
			$data['modules']='';
            $this->template->display_form_input($this->file_view,$data,'');
		}
	}
	 
	function view($id,$message=null){
		 $id=urldecode($id);
		 $data['id']=$id;
		 $model=$this->modules_groups_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
         $data['message']=$message;
		 $data['modules']=$this->list_modules($id);
         $this->template->display_form_input($this->file_view,$data,'');
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('user_group_id','User Group Id', 'required|trim');
		 $this->form_validation->set_rules('user_group_name','User Group Name',	 'required');
	}
   function browse($offset=0,$limit=50,$order_column='sales_order_number',$order_type='asc'){
		$data['controller']='jobs';
		$data['fields_caption']=array('User Group','Nama User Group','Keterangan');
		$data['fields']=array('user_group_id','user_group_name','description');
		$data['field_key']='user_group_id';
		$data['caption']='DAFTAR USER JOB';

		$this->load->library('search_criteria');
		$faa[]=criteria("Nama user","sid_nama");
		$faa[]=criteria("Kelompok","sid_kel");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
        $sql=$this->sql.' where 1=1';
		if($this->input->get('sid_nama')!='')$sql.=" user_group_id like '".$this->input->get('sid_nama')."%'";
		if($this->input->get('sid_kel')!='')$sql.=" user_group_name like '".$this->input->get('sid_kel')."%'";
        echo datasource($sql);
    }	      
    
	function delete($id){
	 	$this->user_model->delete($id);
	 	$this->browse();
	}
	function list_modules($group_id){
		$modules=$this->db->query("select * from modules where parentid like '___000'");
		$tbl="<table class='table1', data-options='singleSelect:true'>
			<thead><th>Cek</th><th data-options=\"field:'0'\">Module Name</th>
			<th data-options=\"field:'1'\">Description</th>
			<th data-options=\"field:'2'\">ID</th>
			<th data-options=\"field:'3'\">ParentID</th></thead>
			<tbody>";
			 
			foreach($modules->result() as $row){
				$checked="";
				if($this->modules_groups_model->exist($group_id,$row->module_id))$checked='checked';
				$tbl.="
				<tr><td><input type='checkbox' name='modules[]' value='".$row->module_id."' $checked></td>
				<td>".$row->module_name."</td>
				<td>".$row->description."</td>
				<td>".$row->module_id."</td>
				<td>".$row->parentid."</td>
				</tr>
				";				
			}
		$tbl.="
				<tr>
			</tbody>		
		</table>"; 
	   $s="
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/default/easyui.css\">
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/icon.css\">
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/demo.css\">
                <script src=\"".base_url()."js/jquery-ui/jquery.easyui.min.js\"></script>                
            ";
		return $tbl;	
	}
}
