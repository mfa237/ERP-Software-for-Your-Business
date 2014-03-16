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
			$no=$this->sysvar->autonumber($key,0,'!CRDB~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!CRDB~$00001');
				$rst=$this->crdb_model->get_by_id($no)->row();
				if($rst){
				  	$this->sysvar->autonumber_inc($key);
				} else {
					break;					
				}
			}
			return $no;
			
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
		$invoice_number=$this->input->post('docnumber');
		if($invoice_number)
		{
			$id=$this->nomor_bukti();
			$data['kodecrdb']=$id;
			$data['tanggal']=$this->input->post('tanggal');
			$data['docnumber']=$invoice_number;
			$data['amount']=$this->input->post('amount');
			$data['keterangan']=$this->input->post('keterangan');
			$data['transtype']=$this->input->post('transtype');
			if ($this->crdb_model->save($data)){
				$this->nomor_bukti(true);
				echo json_encode(array('success'=>true,'kodecrdb'=>$id));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
		}
	}
	function items($kode,$type="json"){
		$sql="select c.account,c.account_description as description,d.amount,d.lineid as line_number 
		from crdb_memo_dtl d left join chart_of_accounts c 
		on c.id=d.accountid
		 where kodecrdb='$kode'";
		echo datasource($sql);
	}
	function save_item(){
		$acc=$this->input->post('account');
		$amt=$this->input->post("amount");
		$kode=$this->input->post('kodecrdb_no');
		if($amt=='')$amt=0;
		if($acc){
			$this->load->model('chart_of_accounts_model');
			$accid=$this->chart_of_accounts_model->get_by_id($acc)->row()->id;
			if($accid){
				$data['accountid']=$accid;
				$data['kodecrdb']=$kode;
				$data['amount']=$amt;
				if ($this->crdb_model->save_item($data)){
					$this->nomor_bukti(true);
					echo json_encode(array('success'=>true));
				} else {
					echo json_encode(array('msg'=>'Some errors occured.'));
				}
			}
		}
		
	}
    function delete_item(){
    	$id=$this->input->post('line_number');
        $this->load->model('crdb_model');
        return $this->crdb_model->delete_item($id);
    }        
}