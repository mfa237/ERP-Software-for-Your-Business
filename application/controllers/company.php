<?php
if(!defined('BASEPATH')) exit('No direct script access allowd');

class Company extends CI_Controller {
    private $limit=10;
    private $table_name='preferences';
    private $sql="select company_code,company_name,street,city_state_zip_code,phone_number,
    	fax_number,email
                from preferences
                ";
    private $file_view='admin/company';
    private $primary_key='company_code';
    private $controller='company';

    function __construct()    {
            parent::__construct();
            $this->load->helper(array('url','form','mylib_helper'));
            $this->load->library('template');
            $this->load->library('form_validation');
            $this->load->model('company_model');
    }
    function set_defaults($record=NULL){
            $data['mode']='';
            $data['message']='';
            $data=data_table($this->table_name,$record);
             return $data;
    }
    function index()    {	
            $this->browse();
    }
    function get_posts(){
            $data=data_table_post($this->table_name);
            return $data;
    }
    function add()   {
             $data=$this->set_defaults();
             $this->_set_rules();
             if ($this->form_validation->run()=== TRUE){
                    $data=$this->get_posts();
                    $this->company_model->save($data);
		            $data['message']='update success';
		            $data['mode']='view';
		            $this->browse();
            } else {
                    $data['mode']='add';
                    $data['message']='';
                    $this->template->display_form_input($this->file_view,$data,'company_menu');			
            }
    }
    function update()   {

             $data=$this->set_defaults();
             $this->_set_rules();
             $id=$this->input->post('company_code');
             if ($this->form_validation->run()=== TRUE){
                    $data=$this->get_posts();
                    $this->company_model->update($id,$data);
                    $message='Update Success';
                    $this->browse();
            } else {
                    $message='Error Update';
		            $this->view($id,$message);		
            }
    }

    function view($id,$message=null)	{
             $data['id']=$id;
             $model=$this->company_model->get_by_id($id)->row();
             $data=$this->set_defaults($model);
             $data['mode']='view';
             $data['message']=$message;
            $this->template->display_form_input($this->file_view,$data,'company_menu');
    }
     // validation rules
    function _set_rules(){	
             $this->form_validation->set_rules('company_code','Kode', 'required|trim');
             $this->form_validation->set_rules('company_name','Nama',	 'required');
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
		$data['controller']='company';
		$data['fields_caption']=array('Kode','Nama Perusahaan','Alamat','Kota','Telp','Fax','Email');
		$data['fields']=array('company_code','company_name','street','city_state_zip_code','phone_number',
    	'fax_number','email');
		$data['field_key']='company_code';
		$data['caption']='DAFTAR KODE PERUSAHAAN';

		$this->load->library('search_criteria');
		$faa[]=criteria("Nama Perusahaan","sid_nama");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
        $sql=$this->sql.' where 1=1';
		if($this->input->get('sid_nama')!='')$sql.=" company_name like '".$this->input->get('sid_nama')."%'";
        echo datasource($sql);
    }	   
	function delete($id){
	 	$this->company_model->delete($id);
	 	$this->browse();
	}
	function find($nomor){
		$query=$this->db->query("select company_name from preferences where company_code='$nomor'");
		echo json_encode($query->row_array());
 	}
}
?>
