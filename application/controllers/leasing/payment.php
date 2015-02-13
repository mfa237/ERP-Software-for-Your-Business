<?php 
if(!defined('BASEPATH')) exit('No direct script access allowd');

class Payment extends CI_Controller {
    private $limit=100;
    private $table_name='ls_invoice_header';
    private $file_view='leasing/payment';
    private $controller='leasing/payment';
    private $primary_key='invoice_number';
    private $sql="";
	private $title="DAFTAR PEMBAYARAN CICILAN";
	private $help="";

    function __construct()    {
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library(array('sysvar','template','form_validation'));
		if($this->controller=="")$this->controller=$this->file_view;
		if($this->sql=="")$this->sql="select * from ".$this->table_name;
		if($this->help=="")$this->help=$this->table_name;
		
		$this->load->model('leasing/loan_master_model');
    }
    function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
		$data=data_table($this->table_name,$record);
		return $data;
    }
    function index(){
		$this->add();
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
				$this->loan_master_model->save_payment($data);
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
		$id=$this->input->post("loan_id");
		$mode=$data["mode"];	unset($data['mode']);
		if($mode=="add"){ 
			$ok=$this->loan_master_model->save($data);
		} else {
			$ok=$this->loan_master_model->update($id,$data);				
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
		$model=$this->loan_master_model->get_by_id($id)->row();
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
		$data['fields']=array("loan_id","app_id","loan_date","loan_amount","max_mount","status","cust_id");
		$data['fields_caption']=array("Kode","AppId","Tanggal","Jumlah","Tenor","Status","Pelanggan");
		$data['field_key']=$this->primary_key;
		$data['caption']=$this->title;

		$this->load->library('search_criteria');
		$faa[]=criteria("Nama Pelanggan","sid_nama");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
        $sql=$this->sql.' where 1=1';
		if($this->input->get("sid_nama"))$sql .= " and description like '%".$this->input->get("sid_nama")."%'";
        echo datasource($sql);
    }	   
	function delete($id){
		$id=urldecode($id);
	 	$this->loan_master_model->delete($id);
		$this->browse();
	}
	function find($nomor){
		$nomor=urldecode($nomor);
		$query=$this->db->query("select * from $table_name where loan_id='$nomor'");
		echo json_encode($query->row_array());
 	}	
	function add_payment($faktur,$data){

		$this->load->model("leasing/invoice_header_model");
		$this->load->model("leasing/payment_model");

		$faktur=urldecode($faktur);

		$ok = $this->payment_model->save($data);
		
		$ok = $this->invoice_header_model->recalc_balance($faktur);
		if($ok){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error ".mysql_error()));
		}		
		
		
	}
	function import_csv(){
		if($this->input->post("submit")){
			 $filename=$_FILES["file_excel"]["tmp_name"];
			 $this->form_validation->set_rules('nomor','Jenis','required');
			 $this->form_validation->set_rules('jenis','Jenis','required');
			 $this->form_validation->set_rules('tanggal','Tanggal','required');
			 $this->form_validation->set_rules('jumlah','Jumlah','required');
			 $this->form_validation->set_rules('keterangan','Keterangan','required');
			 
			 if ($this->form_validation->run()=== TRUE AND $_FILES["file_excel"]["size"] > 0){
				$col=$this->input->post();
				$file = fopen($filename, "r");
				$i=0;
				$ok=false;
				$this->load->model("leasing/invoice_header_model");
				$this->load->model("leasing/payment_model");
				while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
				{
					$nomor=$emapData[$col['nomor']-1];
					$jenis=$emapData[$col['jenis']-1];
					$tanggal=$emapData[$col['tanggal']-1];
					$jumlah=$emapData[$col['jumlah']-1];
					$keterangan=$emapData[$col['keterangan']-1];
					if($i>0){	// baris pertama header
						$data=array("how_paid"=>$jenis,"date_paid"=>date("Y-m-d",strtotime($tanggal)),
							"amount_paid"=>$jumlah,"voucher_no"=>"IMPCSV".$nomor, 
							"invoice_number"=>$nomor,"pokok"=>0,"bunga"=>0);
						 $ok = $this->payment_model->save($data);
						 $ok = $this->invoice_header_model->recalc_balance($nomor);
						
					}
					$i=1;
				}
				fclose($file);
				if ($ok){echo json_encode(array("success"=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
			} else {
				$this->template->display("leasing/payment_import_csv");
			}
		} else {
			$this->template->display("leasing/payment_import_csv");
		}
	}
	
}
?>
