<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class CrDb extends CI_Controller {
    private $limit=10;
    private $sql="select kodecrdb,docnumber,tanggal,amount from crdb_memo";
    private $controller='CrDb';
    private $primary_key='kodecrdb';
    private $file_view='sales/crdb';
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
		$key="CrDB Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			return $this->sysvar->autonumber($key,0,'!CRDB~$00001');
		}
	}
	function add()
	{
		$docnumber=$this->input->get('docnumber');
		if(!$docnumber){
			echo 'Salah nomor faktur, atau faktur tidak ada ! ';
		} else {
			$data['kodecrdb']=$this->nomor_bukti();
			$data['tanggal']=date('Y-m-d');
			$data['docnumber']=$docnumber;
			$data['amount']=0;
			$data['keterangan']="";
			$data['mode']='add';
			$this->load->view('sales/crdb',$data);
		}
	}
	function save()
	{
		 var_dump($_POST);
		 var_dump($_GET);
		 
		$invoice_number=$this->input->post('docnumber');
		if($invoice_number)
		{
			$data['kodecrdbx']=$this->nomor_bukti();
			$data['tanggal']=$this->input->post('tanggal');
			$data['docnumber']=$invoice_number;
			$data['amount']=$this->input->post('amount');
			$data['keterangan']=$this->input->post('keterangan');
			$this->crdb_model->save($data);
			$this->nomor_bukti(true);
		} else {echo 'Save: Invalid Invoice Number';}
	
	}
	function items($kode,$type="json"){
		$sql="select c.account,c.account_description,d.amount,d.lineid 
		from crdb_memo_dtl d left join chart_of_accounts c 
		on c.id=d.accountid
		 where kodecrdb='$kode'";
		echo datasource($sql);
	}
	
}