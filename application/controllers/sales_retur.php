<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Sales_retur extends CI_Controller {
    private $limit=10;
    private $sql="select i.invoice_number,i.invoice_date,i.amount,i.your_order__, 
            i.sold_to_customer,c.company,c.city,i.warehouse_code
            from invoice i
            left join customers c on c.customer_number=i.sold_to_customer
            where  invoice_type='R' ";
    private $controller='sales_retur';
    private $primary_key='invoice_number';
    private $file_view='sales/retur';
    private $table_name='invoice';
	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
        $this->load->library('sysvar');
        $this->load->library('javascript');
        $this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('invoice_model');
		$this->load->model('customer_model');
        $this->load->model('inventory_model');
        $this->load->model('type_of_payment_model');
		$this->load->model('salesman_model');
	}


	function index()
	{          
            $this->browse();
	}
	
    function browse($offset=0,$limit=50,$order_column='sales_order_number',$order_type='asc'){
		$data['controller']=$this->controller;
		$data['fields_caption']=array('Nomor Bukti','Tanggal','Jumlah','Faktur','Kode Cust','Nama Customer',
			'Salesman','Kota','Gudang');
		$data['fields']=array('invoice_number','invoice_date','amount', 'your_order__',
            'sold_to_customer','company','salesman','city','warehouse_code');
		$data['field_key']='invoice_number';
		$data['caption']='DAFTAR RETUR PENJUALAN';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor","sid_number");
		$faa[]=criteria("Pelanggan","sid_cust");
		$faa[]=criteria("Salesman","sid_salesman");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
    	$nama=$this->input->get('sid_cust');
		$no=$this->input->get('sid_number');
		$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
		$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));
        $sql=$this->sql;
		if($no!=''){
			$sql.=" and invoice_number='".$no."'";
		} else {
			$sql.=" and invoice_date between '$d1' and '$d2'";
			if($nama!='')$sql.=" and company like '$nama%'";	
			if($this->input->get('sid_salesman')!='')$sql.=" and salesman like '".$this->input->get('salesman')."%'";
		}
        $sql.=" limit $offset,$limit";
        echo datasource($sql);
    }	 
		
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data['invoice_number']=$this->nomor_bukti();
			$data['invoice_type']='I';
			$this->invoice_model->save($data);
			$this->nomor_bukti(true);
			$id=$data['invoice_number'];
            $this->view($id,'Finish');
   		} else {
			$data['mode']='add';
			$data['message']='';
            $data['sold_to_customer']=$this->input->post('sold_to_customer');
            $data['amount']=$this->input->post('amount');
			$data['comments']='';
			$data['your_order__']='';
			$this->template->display_form_input($this->file_view,$data,'');			
		}
	}

	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('invoice_number','Nomor Faktur', 'required|trim');
		 $this->form_validation->set_rules('invoice_date','Tanggal','callback_valid_date');
		 $this->form_validation->set_rules('sold_to_customer','Pelanggan', 'required|trim');
	}
	 // date_validation callback
	function valid_date($str){
		 if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str)) {
			 $this->form_validation->set_message('valid_date','Format tanggal salah, seharusnya yyyy-mm-dd');
			 return false;
		 } else {
		 	return true;
		 }
	}
	function set_defaults($record=NULL){
        $data['library_src'] = $this->jquery->script();
        $data['script_head'] = $this->jquery->_compile();
		$data['mode']='';
		$data['message']='';
        $data['warehouse_code']=$this->access->cid;
		$data['invoice_date']= date("Y-m-d");
		if($record==NULL)$data['invoice_number']=$this->nomor_bukti();
        $data['invoice_type']='R';
		return $data;
	}


	function nomor_bukti($add=false)
	{
		$key="Invoice Retur Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!JRE~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!JRE~$00001');
				$rst=$this->invoice_model->get_by_id($no)->row();
				if($rst){
				  	$this->sysvar->autonumber_inc($key);
				} else {
					break;					
				}
			}
			return $no;
		}
	}
	
	function save()
	{
			$this->load->model('invoice_lineitems_model');
			$this->load->model('invoice_model');
			$data['invoice_number']=$this->nomor_bukti();
			$data['invoice_date']=$this->input->post('invoice_date');
			$data['your_order__']=$this->input->post('your_order__');
			$data['invoice_type']='R';
			$data['sold_to_customer']=$this->input->post('sold_to_customer');
			$data['due_date']=$this->input->post('invoice_date');
			$data['comments']=$this->input->post('comments');
			 
			$ok=$this->invoice_model->save($data);
			$this->nomor_bukti(true);
			$id=$data['invoice_number'];
			if ($ok){
				echo json_encode(array('success'=>true,'invoice_number'=>$id));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
	}
	function delete($id){
		$this->load->model('invoice_model');
	 	$this->invoice_model->delete($id);
	}
	function view($id,$message=null){
		 $model=$this->invoice_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
         $data['message']=$message;
		 $data['sold_to_customer']=$model->sold_to_customer;
         $data['customer_info']=$this->customer_model->info($data['sold_to_customer']);
		 $data['comments']=$model->comments;
		 $data['invoice_number']=$id;
		 $data['your_order__']=$model->your_order__;
		 $this->invoice_model->recalc($id);
         $this->template->display('sales/retur',$data);                 
	}
		
}