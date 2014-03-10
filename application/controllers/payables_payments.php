<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Payables_payments extends CI_Controller {
    private $limit=10;
    private $sql="select purchase_order_number,i.terms,po_date,amount, 
            i.supplier_number,c.supplier_name,c.city,i.warehouse_code
            from purchase_order i
            left join suppliers c on c.supplier_number=i.supplier_number
            where i.potype='I'";
    private $controller='purchase_invoice';
    private $primary_key='purchase_order_number';
    private $file_view='purchase/purchase_invoice';
    private $table_name='purchase_order';
    function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','browse_helper'));
		$this->load->library(array('form_validation','sysvar'));
		$this->load->model('payables_payments_model');
                
	}
    function browse($offset=0,$limit=50,$order_column='purchase_order_number',$order_type='asc'){
		$data['controller']=$this->controller;
		$data['fields_caption']=array('Nomor Faktur','Tanggal','Jumlah','Kode Supplier','Nama Supplier','Kota','Gudang');
		$data['fields']=array('purchase_order_number','po_date','amount', 
                'supplier_number','supplier_name','city','warehouse_code');
		$data['field_key']='purchase_order_number';
		$data['caption']='DAFTAR FAKTUR PEMBELIAN';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor PO","sid_po_number");
		$faa[]=criteria("Supplier","sid_supplier");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
 		$sql="select p.date_paid,p.invoice_number,p.no_bukti,p.how_paid,
 			p.amount_paid,i.sold_to_customer,c.company
 	 		from payments p
 	 		left join invoice i on i.invoice_number=p.invoice_number 
 	 		left join customers c on c.customer_number=i.sold_to_customer 
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
			if($nama!='')$sql.=" and company like '$nama%'";	
			if($no_faktur!='')$sql.=" and invoice_number='$no_faktur'";	
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
		$this->load->model('payables_model');
		$this->_set_rules();
		$data['no_bukti']=$this->input->post('no_bukti');
		$data['date_paid']=$this->input->post('date_paid');
		$data['how_paid']=$this->input->post('how_paid');
		$data['amount_paid']=$this->input->post('amount_paid');
		$data['purchase_order_number']=$this->input->post('purchase_order_number');
		$data['bill_id']=$this->payables_model->get_bill_id($data['purchase_order_number']);
		if ($this->form_validation->run()=== TRUE){               
		    $this->payables_payments_model->save($data);
		    if($this->input->post('mode')=='add')$this->sysvar->autonumber_inc("AP Payment Numbering");
			//header('location:'.base_url().'index.php/purchase_invoice/payments/'.$data['purchase_order_number']);
		} else {
		      echo validation_errors();
		};
	}
    function add(){
    	 
        $this->load->model('purchase_order_model');
    	$nomor=$this->input->get('purchase_order_number');
        $data['mode']='add';
        $data['no_bukti']=$this->sysvar
            ->autonumber("AP Payment Numbering",0,'!APP~$00001');        
        $data['date_paid']=date('Y-m-d');
        $data['how_paid']='Cash';
        $data['saldo']=$this->purchase_order_model->recalc($nomor);
        $data['purchase_order_number']=$nomor;
        $data['amount_paid']=$data['saldo'];
        $this->load->view('purchase/payables_payments',$data);
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
    
}
 
?>
