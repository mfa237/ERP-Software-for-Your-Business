<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class User extends CI_Controller {
	private $limit=10;
   	private $table_name='user';
    private $sql="select user_id,username,cid from user";
    private $file_view='admin/user';
	private $controller="user";
	private $primary_key="user_id";

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('user_jobs_model');
		$this->load->model('modules_groups_model');
		//$this->load->model('user_group_modul_model');
	}
	function set_defaults($record=NULL){
            $data=data_table($this->table_name,$record);
            $data['mode']='';
            $data['message']='';
            return $data;
	}
	function index()
	{	
		$this->list_info();
	}
	function get_posts(){
        $data=data_table_post($this->table_name);
		return $data;
	}
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$groups=$this->input->post('groups');
			$pilih=$this->input->post('pilih');
			unset($data['groups']);
			unset($data['pilih']);
			$user_id=$data['user_id'];
			$this->user_model->save($data);
			$data['jobs']=$pilih;
			$this->user_jobs_model->update($user_id,$data);
            $message='update success';
            $data['mode']='view';
            $this->browse();
		} else {
			$data['mode']='add';
		    $data['joblist']=$this->modules_groups_model->get_all();
		 	$data['userjobs']="";
            $this->template->display_form_input($this->file_view,$data,'');
		}
	}
	function update(){ 
		 $data=$this->set_defaults(); 
		 $this->_set_rules();
 		 $id=$this->input->post('user_id');
		 $user_id=$id;
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$data['jobs']=$this->input->post('jobs');
			$this->user_model->update($id,$data);
            $message='Update Success';
            $this->browse();
		} else {
			$message='Error Update';
			$this->view($id,$message);
		}	  
	}
 	function view($id,$message=null){
		 $id=urldecode($id);
		 $data['id']=$id;
		 $model=$this->user_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
         $data['message']=$message;
		 $data['joblist']=$this->modules_groups_model->get_all();
		 $data['userjobs']=$this->user_jobs_model->list_jobs($id);
         $this->template->display_form_input($this->file_view,$data,'');
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('user_id','User ID', 'required|trim');
		 $this->form_validation->set_rules('username','User Name', 'required|trim');
         $this->form_validation->set_rules('password','Password', 'required|trim');
         $this->form_validation->set_rules('cid','CID', 'required|trim');
	}
	
	 // date_validation callback
	function valid_date($str)
	{
	 if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str))
	 {
		 $this->form_validation->set_message('valid_date',
		 'date format is not valid. yyyy-mm-dd');
		 return false;
	 } else {
	 	return true;
	 }
	}
   function browse($offset=0,$limit=50,$order_column='sales_order_number',$order_type='asc'){
		$data['controller']='user';
		$data['fields_caption']=array('User ID','Nama User','Kelompok');
		$data['fields']=array('user_id','username','cid');
		$data['field_key']='user_id';
		$data['list_info_visible']=true;
		$data['caption']='DAFTAR USER LOGIN';

		$this->load->library('search_criteria');
		$faa[]=criteria("Nama user","sid_nama");
		$faa[]=criteria("Kelompok","sid_kel");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
        $sql=$this->sql.' where 1=1';
		if($this->input->get('sid_nama')!='')$sql.=" username like '".$this->input->get('sid_nama')."%'";
		if($this->input->get('sid_kel')!='')$sql.=" cid like '".$this->input->get('sid_kel')."%'";
        echo datasource($sql);
    }	      
    
	function delete($id){
		$id=urldecode($id);
	 	$this->user_model->delete($id);
	 	$this->browse();
	}
	function list_info($offset=0){
		if(isset($_GET['offset'])){
			$offset=$_GET['offset'];
		}
		$data['offset']=$offset;
		$this->load->library('search_criteria');

		$faa[]=criteria("Nama","sid_nama");
		$faa[]=criteria("Kelompok","sid_kel");
	
		$data['criteria']=$faa;
		$data['criteria_text']=criteria_text($faa);
		$data['sid_nama']=$this->session->userdata('sid_nama');
		$data['sid_kel']=$this->session->userdata('sid_kel');
		
		$this->template->display_form_input('admin/info_list',$data);	
	}	
	function save()
	{   
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $id=$this->input->post('user_id');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$mode=$this->input->post("mode");
			unset($data["mode"]);
			unset($data['path_image']);
			if($mode=="view"){
				$ok=$this->user_model->update($id,$data);			
			} else {
				$ok=$this->user_model->save($data);
			}
		} else {
			$ok=false;
		}	
		if ($ok){
			echo json_encode(array('success'=>true,'user_id'=>$id));
		} else {
			echo json_encode(array('msg'=>"Ada kesalahan input !"));
		}
	}	
	function list_job($user_id) {
		$user_id=urldecode($user_id);
		$s="select uj.group_id,mg.user_group_name
		from user_job uj
		join modules_groups mg on uj.group_id=mg.user_group_id
		where uj.user_id='$user_id'";
		echo datasource($s);
	}
	function add_job(){
		$user_id=$this->input->get('user_id');
		$group_id=$this->input->get('job');
		$this->load->model('user_jobs_model');
		$this->user_jobs_model->add_job($user_id,$group_id);
	}
	function del_job($user_id,$group_id) {
		$user_id=urldecode($user_id);
		$group_id=urldecode($group_id);
		$this->db->query("delete from user_job where user_id='$user_id' and group_id='$group_id'");
	}
	function do_upload_picture()
	{
		//var_dump($_POST);
		//var_dump($_GET);
		//var_dump($_FILES);
		$user_id=$this->input->post('user_id_image');
		
		$config['upload_path'] = './tmp/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$userfile=$this->input->get('userfile');

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' =>'Error upload !! Maximum size gambar 100kb');
		    echo json_encode($error);
		} else {
			$data=$this->upload->data();
			$this->db->query("update user set path_image='".$data['file_name']."' 
				where user_id='$user_id'");
			$data = array('success'=>'Sukses','upload_data' => $this->upload->data());
			echo json_encode($data);
		}
	}
	
}
