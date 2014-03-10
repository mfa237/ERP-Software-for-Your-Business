<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class sales_crmemo extends CI_Controller {
    private $limit=10;
    private $sql="select kodecrdb,tanggal,docnumber,amount,keterangan,c.account, c.account_description
     from crdb_memo cm left join chart_of_accounts c on c.id=cm.accountid where transtype='SO CREDIT MEMO'";
    private $controller='sales_crmemo';
    private $primary_key='kodecrdb';
    private $file_view='sales/credit_memo';
    private $table_name='crdb_memo';
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
        $this->load->library('sysvar');
        $this->load->library('javascript');
        $this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('crdb_model');
	}
	function nomor_bukti($add=false)
	{
		$key="Sales CrDB Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			return $this->sysvar->autonumber($key,0,'!CRDBS~$00001');
		}
	}
	function index()
	{	
            $this->browse();
	}
    function browse($offset=0,$limit=50,$order_column='',$order_type='asc'){
		$data['controller']=$this->controller;
		$data['fields_caption']=array('Nomor Bukti','Tanggal','Faktur','Jumlah','Keterangan','Kode Akun','Perkiraan');
		$data['fields']=array('kodecrdb','tanggal','docnumber','amount','keterangan','account','account_description');
		$data['field_key']='kodecrdb';
		$data['caption']='DAFTAR CREDIT MEMO';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor Bukti","sid_number");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
    	if($this->input->get('sid_number')){
    		$sql=$this->sql." and kodecrdb='".$this->input->get('sid_number')."'";
		} else {
			$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
			$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));
			$sql=$this->sql." and tanggal between '".$d1."' and '".$d2."'";
		}
        echo datasource($sql);
    }	 
	
	function add()
	{
		$data['kodecrdb']=$this->nomor_bukti();
		$data['tanggal']=date('Y-m-d');
		$data['docnumber']='';
		$data['amount']=0;
		$data['keterangan']="";
		$data['mode']='add';
		$this->template->display_form_input('sales/credit_memo',$data,'');			
		
	}
	function save()
	{
		 
		$docno=$this->input->post('docnumber');
		if($docno)
		{
			$data['kodecrdb']=$this->nomor_bukti();
			$data['tanggal']=$this->input->post('tanggal');
			$data['docnumber']=$invoice_number;
			$data['amount']=$this->input->post('amount');
			$data['keterangan']=$this->input->post('keterangan');
			$data['transtype']='SO CREDIT MEMO';
			$this->crdb_model->save($data);
			$this->nomor_bukti(true);
		} else {
			echo 'Pilih nomor faktur !';
		}
	
	}
	
}