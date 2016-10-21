<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Periode extends CI_Controller {
    private $limit=10;
    private $table_name='financial_periods';
    private $sql="select year_id,sequence,period,startdate,enddate,closed,month_name 
        from financial_periods";
    private $file_view='gl/periode';

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('periode_model');
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
		if (!allow_mod2('_30030'))  exit;
        $this->browse();
	}
	function get_posts(){
		$data=data_table_post($this->table_name);
		return $data;
	}
	function add()
	{
		if (!allow_mod2('_30031'))  exit;
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
            $data['closed']=$data['closed']=='No'?'0':'1';
			$id=$this->periode_model->save($data);
            $data['message']='update success';
            $data['mode']='view';
			$this->syslog_model->add($id,"periode","edit");

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
 		 $id=$this->input->post('period');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
            $data['closed']=$data['closed']=='No'?'0':'1';
            unset($data['id']);
			$this->periode_model->update($id,$data);
            $message='Update Success';
			$this->syslog_model->add($id,"periode","edit");

            $this->browse();
		} else {
			$message='Error Update';
     		$this->view($id,$message);		
		}	  	
	}
	
	function view($id,$message=null){           
		if (!allow_mod2('_30030'))  exit;
		$id=urldecode($id);
		 $data['period']=$id;
		 $model=$this->periode_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
         $data['message']=$message;
         $this->template->display_form_input($this->file_view,$data,'');
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('year_id','Tahun', 'required|trim');
		 $this->form_validation->set_rules('period','Periode Id', 'required|trim');
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
		$data['controller']='periode';
		$data['fields_caption']=array('Tahun','Urut','Periode','Month','Start','End','Closed');
		$data['fields']=array('year_id','sequence','period','month_name','startdate','enddate','closed');
		$data['field_key']='period';
		$data['caption']='DAFTAR PERIODE AKUNTANSI';
		$data['criteria']=array();

        $this->template->display_browse($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
		$sql=$this->sql." order by year_id,sequence";
        echo datasource($sql);
    }	      
	function delete($id){
		if (!allow_mod2('_30030'))  exit;
		$id=urldecode($id);
	 	$this->periode_model->delete($id);
		$this->syslog_model->add($id,"periode","delete");

	 	$this->browse();
	}
	function select($periode="") {
		$periode=urldecode($periode);
		$sql="select * from financial_periods";
		if($periode!="")$sql.=" where period like '$periode%'";
		
		echo datasource($sql);
	}
}
