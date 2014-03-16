<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Payables_payments extends CI_Controller {
    private $limit=10;
    private $sql="select purchase_order_number,i.terms,po_date,amount, 
            i.supplier_number,c.supplier_name,c.city,i.warehouse_code
            from purchase_order i
            left join suppliers c on c.supplier_number=i.supplier_number
            where i.potype='I'";
    private $controller='payables_payments';
    private $primary_key='no_bukti';
    private $file_view='purchase/payables_payments';
    private $table_name='payables';
    function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library(array('form_validation','sysvar'));
        $this->load->library('template');
		$this->load->model('payables_payments_model');
                
	}
    function browse($offset=0,$limit=50,$order_column='purchase_order_number',$order_type='asc'){
		$data['controller']=$this->controller;
		$data['fields_caption']=array('Nomor Bukri','Tgl Bayar','Faktur','Tgl Faktur','Jenis','Jumlah Faktur',
			'Jumlah Bayar','Kode Supplier','Nama Supplier','Kota');
		$data['fields']=array('no_bukti','date_paid','purchase_order_number','po_date','how_paid','amount',
				'amount_paid', 'supplier_number','supplier_name','city');
		$data['field_key']='no_bukti';
		$data['caption']='DAFTAR PEMBAYARAN FAKTUR PEMBELIAN';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor PO","sid_po_number");
		$faa[]=criteria("Supplier","sid_supplier");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
 		$sql="select p.no_bukti, p.date_paid,p.purchase_order_number,i.po_date,p.how_paid,
 			i.amount,p.amount_paid,i.supplier_number,c.supplier_name,c.city
 	 		from payables_payments p
 	 		left join purchase_order i on i.purchase_order_number=p.purchase_order_number 
 	 		left join suppliers c on c.supplier_number=i.supplier_number 
 	 		where  1=1";
    	$nama=$this->input->get('sid_cust');
		$no_bukti=$this->input->get('no_bukti');
		$no_faktur=$this->input->get('invoice_number');
		$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
		$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));
 		if($no_bukti!=''){
 			$sql.=" and how_paid='$no_bukti'";	
		} else {
 	 		$sql.=" and date_paid between'$d1' and '$d2'";
			if($nama!='')$sql.=" and supplier_name like '$nama%'";	
			if($no_faktur!='')$sql.=" and purchase_order_number='$no_faktur'";	
 	 	}
        echo datasource($sql);
    }	 
	
   function index(){
   
       $this->browse();
   }
    function _set_rules(){	
		 $this->form_validation->set_rules('no_bukti','Nomor Bukti','required');
		 $this->form_validation->set_rules('purchase_order_number','Nomor Faktur', 'required|trim');
		 $this->form_validation->set_rules('date_paid','Tanggal','required');
		 $this->form_validation->set_rules('amount_paid','Jumlah','required');
		 $this->form_validation->set_rules('how_paid','Jenis Bayar','required');
	}
	function save()
	{
   		$this->load->model('bank_accounts_model');
		$this->load->model('supplier_model');
		$this->load->model('purchase_order_model');
		
		$faktur=$this->input->post("faktur");
   		$no_bukti=$this->nomor_bukti();
   		$bayar=$this->input->post("bayar");
		$total_paid=0;
		$account=$this->input->post('how_paid_account_id');
		$bank=$this->bank_accounts_model->get_by_id($account)->row();
		$account_id=$bank->account_id;
		$how_paid=strtolower($this->input->post('how_paid'));
		$trtype='cash in';
		$cust="";
		$cust_name="";
		switch ($how_paid) {
			case 'trans in':
				$trtype='trans in';
				break;
			case 'giro':
				$trtype='cheque in';
				break;
			default:
				$trtype='cash in';
				break;
		}
		for($i=0;$i<count($bayar);$i++){
			if(intval($bayar[$i])<>0){
				$amount_paid=$bayar[$i];
				$no_faktur=$faktur[$i];
				$rfaktur=$this->purchase_order_model->get_by_id($no_faktur)->row();
				if($cust==""){
					$rcust=$this->supplier_model->get_by_id($rfaktur->supplier_number)->row();		
					$cust=$rcust->supplier_number;
					$cust_name=$rcust->supplier_name;
				}
                $data['no_bukti']=$no_bukti;
                $data['date_paid']=$this->input->post('date_paid');
                $data['how_paid']=$how_paid;
                $data['amount_paid']=$amount_paid;
                $data['purchase_order_number']=$no_faktur;
				$data['how_paid_account_id']=$account_id;
				 
                $this->payables_payments_model->save($data);
				$total_paid=$total_paid+$amount_paid;
			}	
		}
		//-- simpan juga bukti pembayaran di module kas masuk
		$rkas['voucher']=$no_bukti;
		$rkas['check_date']=$this->input->post('date_paid');
		$rkas['deposit_amount']=0;
		$rkas['payment_amount']=$total_paid;
		$rkas['account_number']=$account;
		$rkas['trans_type']=$trtype;
		$rkas['payee']=$cust_name;
		$rkas['supplier_number']=$cust;
		$rkas['memo']="Pelunasan hutang supplier ".$cust_name;
		$this->load->model('check_writer_model');
		$this->check_writer_model->save($rkas); 	 	
		$this->nomor_bukti(true);
		redirect(base_url().'index.php/payables_payments/view/'.$no_bukti);
	}
    function add(){
    	 
        $this->load->model('bank_accounts_model');
		
        $data['mode']='add';
        $data['no_bukti']=$this->nomor_bukti();        
        $data['date_paid']=date('Y-m-d');
        $data['how_paid']='Cash';
		$data['account_list']=$this->bank_accounts_model->account_number_list();
		$data['supplier_number']='';
        $data['amount_paid']=0;
		$data['how_paid_account_id']='';
		
		$this->template->display_form_input('purchase/payment_multi',$data,'');			                 
   }
	function nomor_bukti($add=false)
	{
		$key="AP Payment Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!APP~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!APP~$00001');
				$rst=$this->payables_payments_model->get_by_id($no)->row();
				if($rst){
				  	$this->sysvar->autonumber_inc($key);
				} else {
					break;					
				}
			}
			return $no;
			
		}
	}
	
   function delete($line_number)
   {
   		$this->payables_payments_model->delete_line($line_number);
   }
   function delete_no_bukti($no_bukti)
   {
   		$this->payables_payments_model->delete($no_bukti);
   }
   function list_by_invoice($invoice)
   {
		$s="
		<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/default/easyui.css\">
		<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/icon.css\">
		<link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/demo.css\">
		<script src=\"".base_url()."js/jquery-ui/jquery.easyui.min.js\"></script>                
		";

   		$this->load->model('payables_model');
   		$bill_id=$this->payables_model->get_bill_id($invoice);
		 
   		echo $s.browse_simple('select no_bukti,date_paid,how_paid,how_paid_account_id,
   		amount_paid,line_number,bill_id from payables_payments where bill_id='.$bill_id);
   }
        
   function view($no_bukti){
   		$this->load->model('check_writer_model');
		$rcek=$this->check_writer_model->get_by_id($no_bukti)->row();
		if($rcek){
			$data['voucher']=$rcek->voucher;
			$data['date_paid']=$rcek->check_date;
			$data['amount_paid']=$rcek->deposit_amount;
			$data['account_number']=$rcek->account_number;
			$data['trans_type']=$rcek->trans_type;
			$data['supplier_info']=$rcek->supplier_number.' - '.$rcek->payee;
  		
			$this->template->display_form_input('purchase/payment_multi_view',$data,'');
						
		} else {
			echo 'Nomor voucher tidak ditemukan ! </br>Atau tidak terdaftar di kas masuk ! </br>Nomor Bukti: '.$no_bukti;
		}
   }
    function load_nomor($voucher){
		$sql="select i.purchase_order_number,i.po_date,p.date_paid,i.amount,
		p.amount_paid from payables_payments p left join purchase_order i 
		on i.purchase_order_number=p.purchase_order_number
		where p.no_bukti='$voucher'";
        echo datasource($sql);
    }

      
    
}
 
?>
