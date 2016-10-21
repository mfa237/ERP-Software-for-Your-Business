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
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('category_model');
		$this->load->model('syslog_model');
	}
	function set_defaults($record=NULL){
            $data=data_table($this->table_name,$record);
            $data['mode']='';
            $data['message']='';
            return $data;
	}
	function index()
	{	
		if(!allow_mod2('_80020'))return false;   
        $this->browse();
	}
	function get_posts(){
            $data=  data_table_post($this->table_name);
            return $data;
	}
	function add()
	{
		if(!allow_mod2('_80021'))return false;   
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$id=$this->category_model->save($data);
            $message='Data sudah disimpan.';
            $data['mode']='view';
            echo $message;

			$this->syslog_model->add($id,"category","add");			

		} else {
			$data['mode']='add';
	         $this->template->display_form_input($this->file_view,$data,'');
		}
	}
	function select($search=""){
		$search=urldecode($search);
		echo datasource("select kode,category from inventory_categories");
	}
	
	function update()
	{
	 
		 $data=$this->set_defaults();
 
		 $this->_set_rules();
 		 $id=$this->input->post('kode');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();                      
			$this->category_model->update($id,$data);
            $message='Data sudah disimpan.';
            echo $message;
			$this->syslog_model->add($id,"category","edit");			

		} else {
			$message='Error Update';
      		$this->view($id,$message);		
		}	  
	}
	
	function view($id,$message=null){
		if(!allow_mod2('_80020'))return false;   
		$id=urldecode($id);
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
		 
		
        $data['caption']='';
		$data['controller']='category';		
		$data['fields_caption']=array('Kode','Nama Kelompok Barang/Jasa');
		$data['fields']=array('kode','category');
		$data['field_key']='kode';
		$this->load->library('search_criteria');
		
		$faa[]=criteria("Nama","sid_nama");
		$data['criteria']=$faa;
		
		//$data['_form']=$this->file_view;
		
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
		$sql=$this->sql." where 1=1";
		if($this->input->get('sid_nama')!='')$sql.=" and category like '".$this->input->get('sid_nama')."%'";
        echo datasource($sql);		
    }
	 
        
	function delete($id){
		if(!allow_mod2('_80023'))return false;   
		$id=urldecode($id);
	 	$this->category_model->delete($id);
		$this->syslog_model->add($id,"category","delete");
	 	$this->browse();
	}
	function discount($cmd,$cust_no="")
	{
		$success=false;
		if ($cmd=="add") {
			if($data=$this->input->get()){
				if($this->category_model->discount_save($data)){
					$success=true;
				}
			}
			echo json_encode(array("success"=>$success,"message"=>"Unable save !"));
		}
		if ($cmd=="list") {
			if($cust_no!="")
			{
				$rows=$this->category_model->discount_list($cust_no);
				$success=true;
				//var_dump($rows);
				echo json_encode(array("success"=>$success,
				"rows"=>$rows));
			}
		} 
		if ($cmd=="delete") {
			if($row_id=$this->input->get("id"))
			{
				echo json_encode(array("success"=>$this->category_model->discount_delete($row_id)));				
			}
		}
		if ($cmd=="show"){
			if($cust_no!=""){
				$data['cust_no']=$cust_no;
				$data['cust_name']=$this->db->select("company")
					->where("customer_number",$cust_no)
					->get("customers")->row()->company;
				$data['cat_list']=$this->category_model->datalist();
				$this->template->display("sales/cust_disc_category",$data);
			}
		}
	}
}
