<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Salesman extends CI_Controller {
    private $limit=10;
    private $table_name='salesman';
    private $sql="select salesman,salestype,commission_rate_1,commission_rate_2 from salesman";

	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('salesman_model');
	}
	function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
		if($record==NULL){
			$data['salesman']='';
			$data['salestype']='';
			$data['commission_rate_1']='0';
			$data['commission_rate_2']='0';
                        
		} else {
			$data['salesman']=$record->salesman;
			$data['salestype']=$record->salestype;
			$data['commission_rate_1']=$record->commission_rate_1;
			$data['commission_rate_2']=$record->commission_rate_2;
		}
		return $data;
	}
	function index()
	{	
            $this->browse();
	}
	function get_posts(){
		$data['salesman']=$this->input->post('salesman');
		$data['salestype']=$this->input->post('salestype');
		$data['commission_rate_1']=$this->input->post('commission_rate_1');
		$data['commission_rate_2']=$this->input->post('commission_rate_2');
		return $data;
	}
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$id=$this->salesman_model->save($data);
                        $message='update success';
                        $this->browse();		 
		} else {
			$data['mode']='add';
                         $this->template->display_form_input('sales/salesman',$data,'');
		}
	}
	function update()
	{
	 
		 $data=$this->set_defaults();
 
		 $this->_set_rules();
 		 $id=$this->input->post('salesman');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();                      
			$this->salesman_model->update($id,$data);
                        $message='Update Success';
                        $this->browse();
		} else {
			$message='Error Update';
                        $this->view($id,$message);		
		}	  
	}
	
	function view($id,$message=null){
		 $data['id']=$id;
		 $model=$this->salesman_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
                 $data['message']=$message;
                 $this->template->display_form_input('sales/salesman',$data,'');
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('salesman','Salesman', 'required|trim');
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
	
	function search(){$this->browse();}
	
	function browse($offset=0,$limit=10,$order_column='salesman',$order_type='asc')
	{
        $data['caption']="DAFTAR SALESMAN";
		$data['controller']='salesman';
		$data['fields_caption']=array('Salesman','Kelompok','Komisi');
		$data['fields']=array('salesman','salestype','commission_rate_1',',commission_rate_2');
		$data['field_key']='salesman';
		
		$this->load->library('search_criteria');
		$faa[]=criteria("Nama","sid_salesman");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);
    }
    function browse_data($offset=0,$limit=10,$nama=''){
        $sql=$this->sql." where salesman like '".$this->input->get('sid_salesman')."%'";
        echo datasource($sql);       
    }        
	function delete($id){
	 	$this->salesman_model->delete($id);
	 	$this->browse();
	}
	
}
