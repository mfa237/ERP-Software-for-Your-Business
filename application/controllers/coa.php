<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Coa extends CI_Controller {
    private $sql="select account_type,group_type,account,account_description,db_or_cr,
    beginning_balance,id 
    from chart_of_accounts
    ";
    private $file_view='gl/coa';
	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
        $this->load->model('chart_of_accounts_model');
	} 
	function index()
	{	
        $this->browse();
	}
    function browse($offset=0,$limit=50,$order_column='sales_order_number',$order_type='asc'){
		$data['controller']='coa';
		$data['fields_caption']=array('Type Akun','Kelompk','Kode Akun','Nama Akun Perkiraan',
			'Db/Cr','Sald Awal');
		$data['fields']=array('account_type','group_type','account','account_description','db_or_cr'
			,'beginning_balance');
		$data['field_key']='account';
		$data['caption']='DAFTAR KODE AKUN / COA / PERKIRAAN';

		$this->load->library('search_criteria');
		$faa[]=criteria("Kode Akun","sid_no");
		$faa[]=criteria("Nama Akun","sid_nama");
		$faa[]=criteria("Kelompok","sid_kel");
		$data['criteria']=$faa;
        $this->template->display_browse($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
		$no=$this->input->get('sid_no');
        $sql=$this->sql.' where 1=1';
		if($no!=''){
			$sql.=" and account='".$no."'";
		} else {
			if($this->input->get('sid_nama')!='')$sql.=" and account_description like '".$this->input->get('sid_nama')."%'";
			if($this->input->get('sid_kel')!='')$sql.=" and group_type like '".$this->input->get('sid_kel')."%'";
		}
		$sql.=" order by account";
        echo datasource($sql);
    }	      
    
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$id=$this->chart_of_accounts_model->save($data);
            $data['message']='update success';
            $data['mode']='view';
            $this->browse();
		} else {
			$data['mode']='add';
	        $this->template->display_form_input($this->file_view,$data,'');
		}
	}
        
	function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
    	$data['account_type_list']=$this->chart_of_accounts_model->account_type_list();
		$data['group_type_list']=$this->chart_of_accounts_model->group_type_list();
        $data['account_type']='';
        $data['group_type']='';
        $data['h_or_d']='0';
		if($record==NULL){
			$data['account']='';
			$data['account_description']='';
			$data['db_or_cr']='';
			$data['h_or_d']='';
			$data['beginning_balance']='0';
		} else {
			$data['account']=$record->account;
			$data['account_description']=$record->account_description;
			$data['db_or_cr']=$record->db_or_cr;
			$data['beginning_balance']=$record->beginning_balance;
            $data['account_type']=$record->account_type;
            $data['group_type']=$record->group_type;
		}
		return $data;
	}
	function get_posts(){
		$data['mode']=$this->input->post('mode');
		$data['account_type']=$this->input->post('account_type');
		$data['group_type']=$this->input->post('group_type');
		$data['account']=$this->input->post('account');
		$data['account_description']=$this->input->post('account_description');
		$data['db_or_cr']=$this->input->post('db_or_cr');
		$data['h_or_d']=$this->input->post('h_or_d');
		$data['beginning_balance']=$this->input->post('beginning_balance');
        return $data;
	}        
    function _set_rules(){	
		 $this->form_validation->set_rules('account_type','Account Type', 'required|trim');
		 $this->form_validation->set_rules('group_type','Group Type', 'required');
		 $this->form_validation->set_rules('account','Account', 'required|trim');
	}
    function delete($id){
	 	$this->chart_of_accounts_model->delete($id);
	 	$this->browse();
	}
	function view($id,$message=null){
		 $data['id']=$id;
		 $rst=$this->chart_of_accounts_model->get_by_id($id)->row();
		 if(count($rst)){
            $data=$this->set_defaults($rst);
            $data['db_or_cr']=$rst->db_or_cr;
            $data['h_or_d']='1';
         }
		 $data['mode']='view';
         $data['message']=$message;
         $data['account_type_list']=$this->chart_of_accounts_model->account_type_list();
		 $data['group_type_list']=$this->chart_of_accounts_model->group_type_list();
         $this->template->display_form_input($this->file_view,$data,'');
	}        
	function update()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $id=$this->input->post('account');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts(); 
			unset($data['h_or_d']);                     
			$this->chart_of_accounts_model->update($id,$data);
            $message='Update Success';
            $this->browse();
		} else {
			$message='Error Update';
     		$this->view($id,$message);		
		}	  	
	}        
	function select($account=''){
		$sql="select account,account_description,id from chart_of_accounts where 1=1";
		if($account!="")$sql.=" and account like '$account%'";
		echo datasource($sql);	
	}
}
