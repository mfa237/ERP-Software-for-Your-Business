<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Cash_mutasi extends CI_Controller {
    private $limit=10;
    private $table_name='check_writer';
    private $sql="select voucher,check_date,payment_amount
            ,account_number,payee,supplier_number
            ,trans_type,check_number,memo,trans_id
                from check_writer
                where trans_type in ('cash trx','trans trx','cheque trx')
                ";
    private $file_view='bank/cash_mutasi';
    private $primary_key='voucher';
    private $controller='cash_mutasi';
    
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','mylib_helper'));
        $this->load->library('sysvar');
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('check_writer_model');
		$this->load->model('bank_accounts_model');
	}
	function nomor_bukti($add=false)
	{
		$key="Cash Trx Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!KT~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!KT~$00001');
				$rst=$this->check_writer_model->get_by_id($no)->row();
				if($rst){
				  	$this->sysvar->autonumber_inc($key);
				} else {
					break;					
				}
			}
			return $no;
		}
	}
	function set_defaults($record=NULL){
            
            $data=data_table($this->table_name,$record);
            $data['mode']='';
            $data['message']='';
            $data['account_number_list']=$this->bank_accounts_model->account_number_list();
            return $data;
	}
	function index()
	{	
            $this->browse();
	}
	function get_posts(){
            $data=data_table_post($this->table_name);
            return $data;
	}
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $data['mode']='add';
		 $data['voucher']=$this->nomor_bukti();
	     $this->template->display_form_input($this->file_view,$data,'');
	}
	function save(){
		$data=$this->get_posts();
		$data['voucher']=$this->nomor_bukti();
        $data['deposit_amount']=$data['payment_amount'];
		$id=$this->check_writer_model->save($data);
        $message='update success';
		$this->nomor_bukti(true);
        header('location: '.base_url().'index.php/cash_mutasi');
	}
	
	function update()
	{
	 
		 $data=$this->set_defaults();
 
		 $this->_set_rules();
 		 $id=$this->input->post($this->primary_key);
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();                    
            $data['deposit_amount']=$data['payment_amount'];
            unset($data['trans_id']);
            $this->check_writer_model->update($id,$data);
            $message='Update Success';
		} else {
			$message='Error Update';
		}	  
        header('location: '.base_url().'index.php/cash_mutasi');
	}
	
	function view($id,$message=null){
		 $data['id']=$id;
		 $model=$this->check_writer_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
                 $data['message']=$message;
                 $this->template->display_form_input($this->file_view,$data,'');

	
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules($this->primary_key,'Kode', 'required|trim');
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
     function browse($offset=0,$limit=50,$order_column='voucher',$order_type='asc'){
		$data['controller']=$this->controller;
		$data['fields_caption']=array('Nomor Bukti','Tanggal','Jumlah','Rekening Sumber','Untuk'
		,'Rekening Tujuan','Jenis Transaksi','Nomor Giro','Keterangan','Trans Id');
		$data['fields']=array('voucher','check_date','payment_amount'
            ,'account_number','payee','supplier_number'
            ,'trans_type','check_number','memo','trans_id');
		$data['field_key']='voucher';
		$data['caption']='DAFTAR TRANSAKSI MUTASI ANTAR REKENING';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor Bukti","sid_number");
		$faa[]=criteria("Rekening","sid_rek");
		$faa[]=criteria("Jenis","sid_type");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
    	$rek=$this->input->get('sid_rek');
		$no=$this->input->get('sid_number');
		$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
		$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));
        $sql=$this->sql;
		if($no!=''){
			$sql.=" and voucher='".$no."'";
		} else {
			$sql.=" and check_date between '$d1' and '$d2'";
			if($rek!='')$sql.=" and account_number like '$rek%'";	
			if($this->input->get('sid_type')!='')$sql.=" trans_type='".$this->input->get('sid_type')."'";
		}
        $sql.=" limit $offset,$limit";
        echo datasource($sql);
    }	 
	
}
