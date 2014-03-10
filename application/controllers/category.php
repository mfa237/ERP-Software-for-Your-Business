<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Category extends CI_Controller {
    private $limit=10;
    private $table_name='inventory_categories';
    private $sql="select kode,category
                from inventory_categories
                ";
    private $file_view='inventory/category';
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('category_model');
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
			$id=$this->category_model->save($data);
                        $message='update success';
                        $data['mode']='view';
                        $this->browse();
		} else {
			$data['mode']='add';
                         $this->template->display_form_input($this->file_view,$data,'');
		}
	}
	function update()
	{
	 
		 $data=$this->set_defaults();
 
		 $this->_set_rules();
 		 $id=$this->input->post('kode');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();                      
			$this->category_model->update($id,$data);
                        $message='Update Success';
                        $this->browse();
		} else {
			$message='Error Update';
         		$this->view($id,$message);		
		}	  
	}
	
	function view($id,$message=null){
		 $data['id']=$id;
		 $model=$this->category_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
                 $data['message']=$message;
                 $this->template->display_form_input('inventory/category',$data,'');

	
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('kode','Kode', 'required|trim');
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
	function browse($offset=0,$limit=10,$order_column='company',$order_type='asc')
	{
        $data['caption']='DAFTAR KELOMPOK BARANG DAN JASA';
		$data['controller']='category';		
		$data['fields_caption']=array('Kode','Nama Kelompok Barang/Jasa');
		$data['fields']=array('kode','category');
		$data['field_key']='kode';
		$this->load->library('search_criteria');
		
		$faa[]=criteria("Nama","sid_nama");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
		$sql=$this->sql." where 1=1";
		if($this->input->get('sid_nama')!='')$sql.=" and category like '".$this->input->get('sid_nama')."%'";
        echo datasource($sql);		
    }
	 
        
	function delete($id){
	 	$this->category_model->delete($id);
	 	$this->browse();
	}
	
}
