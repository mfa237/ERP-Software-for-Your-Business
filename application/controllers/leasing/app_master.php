<?php
if(!defined('BASEPATH')) exit('No direct script access allowd');

class App_master extends CI_Controller {
    private $limit=100;
    private $table_name='ls_app_master';
    private $file_view='leasing/app_master';
    private $controller='leasing/app_master';
    private $primary_key='app_id';
    private $sql="";
	private $title="DAFTAR PENGAJUAN KREDIT";
	private $help="";

    function __construct()    {
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library(array('sysvar','template','form_validation'));
		if($this->controller=="")$this->controller=$this->file_view;
		if($this->sql=="")$this->sql="select * from ".$this->table_name;
		if($this->help=="")$this->help=$this->table_name;
		$this->load->model('leasing/app_master_model');
    }
    function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
		$data=data_table($this->table_name,$record);
		
		$data=array_merge(data_table('ls_cust_personal'),data_table('ls_cust_ship_to'),
			data_table('ls_cust_company'),data_table('ls_cust_crcard'),
			data_table('ls_cust_master'),data_table('ls_app_object_items'));
		$data['score']='';
		$data['app_date']='';
		$data['cs1_street']='';
		$data['cs1_rtrw']='';
		$data['cs1_kel']='';
		$data['cs1_city']='';
		$data['cs1_kec']='';
		$data['cs1_zip_pos']='';
		$data['cs2_street']='';
		$data['cs2_rtrw']='';
		$data['cs2_kel']='';
		$data['cs2_city']='';
		$data['cs2_kec']='';
		$data['cs2_zip_pos']='';
		$data['cs2_phone']='';
		$data['cs2_hp']='';
		$data['com_street']='';
		$data['com_rtrw']='';
		$data['com_kel']='';
		$data['com_city']='';
		$data['com_kec']='';
		$data['com_zip_pos']='';
		$data['com_contact_phone']='';
		$data['deduct']='';
		$data['cd1_card_no']='';
		$data['cd1_card_bank']='';
		$data['cd1_card_exp']='';
		$data['cd1_card_type']='';
		$data['cd1_card_type_etc']='';
		$data['cd1_card_limit']='';
		$data['dealer_name']='';
		$data['dealer_id']='';
		$data['oid']='';
		$data['obj_merk']='';
		$data['obj_name']='';
		$data['cs1_lama_thn']='';
		$data['cs1_lama_bln']='';
		$data['fam_first_name']='';
		$data['fam_relation']='';
		$data['fam_street']='';
		$data['fam_kel']='';
		$data['fam_kec']='';
		$data['fam_zip_pos']='';
		$data['fam_contact_phone']='';
		$data['cd2_card_no']='';
		$data['cd2_card_bank']='';
		$data['cd2_card_exp']='';
		$data['cd2_card_type']='';
		$data['cd2_card_type_etc']='';
		$data['cd2_card_limit']='';
		$data['loan_amount']='';
		$data['dp_amount']='';
		$data['insr_amount']='';
		$data['obj_amount']='';
		$data['admin_amount']='';
		$data['inst_amount']='';
		$data['fam_city']='';
 		$data['inst_month']='';
 
		return $data;
    }
    function index(){
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
				$this->app_master_model->save($data);
				$data['message']='update success';
				$data['mode']='view';
				$this->browse();
		} else {
				$data['mode']='add';
				$data['message']='';
				$data['data']=$data;
				$data['title']=$this->title;
				$data['help']=$this->help;
				$data['form_controller']=$this->controller;
				$data['field_key']=$this->primary_key;
				
				$this->template->display_form_input($this->file_view,$data);			
		}
    }
	function save(){
		$data=$this->input->post();
		$id=$this->input->post("app_id");
		$mode=$data["mode"];	unset($data['mode']);
		if($mode=="add"){ 
			$ok=$this->app_master_model->save($data);	
		} else {
			$ok=$this->app_master_model->update($id,$data);				
		}
		if($ok){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error ".mysql_error()));
		}
	}	
    function view($id,$message=null)	{
		$id=urldecode($id);
		$message=urldecode($message);
		$data[$this->primary_key]=$id;
		$model=$this->app_master_model->get_by_id($id)->row();
		$data=$this->set_defaults($model);
		$data['data']=$data;
		
		$data['mode']='view';
		$data['message']=$message;
		$data['title']=$this->title;
		$data['help']=$this->help;
		$data['form_controller']=$this->controller;
		$data['field_key']=$this->primary_key;
		 
		$this->template->display_form_input($this->file_view,$data);
    }
     // validation rules
    function _set_rules(){}
    function valid_date($str){
     if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str)){
             $this->form_validation->set_message('valid_date',
             'date format is not valid. yyyy-mm-dd');
             return false;
     } else {
            return true;
     }
    }
   function browse($offset=0,$limit=50,$order_column="",$order_type='asc'){
		if($order_column=="")$order_column=$this->primary_key;
		$data['controller']=$this->controller;
		$data['field_key']=$this->primary_key;
		$data['caption']=$this->title;

		$this->load->library('search_criteria');
		$faa[]=criteria("Nama Pemohon","sid_nama");
		$data['criteria']=$faa;
		$data['fields_caption']=array('Nomor','Tanggal','Nama Anggota','Kelompok','Alamat','Kota');
		$data['fields']=array('no_simpanan','tanggal','nama','group_type','street','city');
		
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
        $sql=$this->sql.' where 1=1';
		if($this->input->get("sid_nama"))$sql .= " and company like '%".$this->input->get("sid_nama")."%'";
        echo datasource($sql);
    }	   
	function delete($id){
		$id=urldecode($id);
	 	$this->app_master_model->delete($id);
		$this->browse();
	}
	function find($nomor){
		$nomor=urldecode($nomor);
		$query=$this->db->query("select * from $table_name where app_id='$nomor'");
		echo json_encode($query->row_array());
 	}	
}
?>
