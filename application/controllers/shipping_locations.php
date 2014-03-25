<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Shipping_locations extends CI_Controller {
    private $limit=10;
    private $table_name='shipping_locations';
    private $sql="select location_number,address_type,street,city,attention_name
                from shipping_locations";
    private $file_view='inventory/shipping_locations';

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('shipping_locations_model');
	}
	function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
		if($record==NULL){
			$data['location_number']='';
			$data['address_type']='';
			$data['street']='';
			$data['city']='';
			$data['attention_name']='';
		} else {
			$data['location_number']=$record->location_number;
			$data['address_type']=$record->address_type;
			$data['street']=$record->street;
			$data['city']=$record->city;
			$data['attention_name']=$record->attention_name;
		}
		return $data;
	}
	function index()
	{	
            $this->browse();
	}
	function get_posts(){
		$data['location_number']=$this->input->post('location_number');
		$data['address_type']=$this->input->post('address_type');
		$data['street']=$this->input->post('street');
		$data['city']=$this->input->post('city');
		$data['attention_name']=$this->input->post('attention_name');
		return $data;
	}
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$id=$this->shipping_locations_model->save($data);
                        $data['message']='update success';
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
 		 $id=$this->input->post('location_number');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();                      
			$this->shipping_locations_model->update($id,$data);
                        $message='Update Success';
                        $this->browse();
		} else {
			$message='Error Update';
         		$this->view($id,$message);		
		}	  		
	}
	
	function view($id,$message=null){
		 $data['id']=$id;
		 $model=$this->shipping_locations_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
                 $data['message']=$message;
                 $this->template->display_form_input($this->file_view,$data,'');

	
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('location_number','location_number', 'required|trim');
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
        $data['caption']='DAFTAR GUDANG';
		$data['controller']='shipping_locations';		
		$data['fields_caption']=array('Kode Gudang','Jenis Gudang','Alamat','Kota','Kontak Person');
		$data['fields']=array('location_number','address_type','street','city','attention_name');
		$data['field_key']='location_number';
		$this->load->library('search_criteria');
		
		$faa[]=criteria("Nama","sid_nama");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
		$sql=$this->sql." where 1=1";
		if($this->input->get('sid_nama')!='')$sql.=" and location_number like '".$this->input->get('sid_nama')."%'";
        echo datasource($sql);		
    }
	function delete($id){
	 	$this->shipping_locations_model->delete($id);
	 	$this->browse();
	}
	
}
