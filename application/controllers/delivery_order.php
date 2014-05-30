<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Delivery_order extends CI_Controller {
    private $limit=10;
    private $controller='delivery_order';
    private $primary_key='invoice_number';
    private $file_view='sales/delivery_order';
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
	function nomor_bukti($add=false)
	{
		$key="Delivery Order Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!SJ~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!SJ~$00001');
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

	function set_defaults($record=NULL){
		$data=data_table($this->table_name,$record);
        $data['library_src'] = $this->jquery->script();
        $data['script_head'] = $this->jquery->_compile();
		$data['mode']='';
		$data['message']='';
        $data['warehouse_code']=$this->access->cid;
		$data['invoice_date']= date("Y-m-d H:i:s");
		if($record==NULL)$data['invoice_number']=$this->nomor_bukti();
        $data['invoice_type']='D';
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
		$this->load->model('invoice_lineitems_model');        
		$this->load->model('sales_order_model');               
		$this->load->model('shipping_locations_model');
		$data['mode']='add';
		$data['message']='';
        //$data['customer_list']=$this->customer_model->select_list();
		//$data['salesman_list']=$this->salesman_model->select_list();
		//$data['so_list']=$this->sales_order_model->select_list_not_delivered();
        $data['sold_to_customer']="";
        $data['amount']=$this->input->post('amount');
        $data['payment_terms_list']=$this->type_of_payment_model->select_list();
        $data['customer_info']=$this->customer_model->info($data['sold_to_customer']);
        $data['warehouse_list']=$this->shipping_locations_model->select_list();
		 
		$this->template->display_form_input($this->file_view,$data,'');			
	}
	function save()
	{
		$mode=$this->input->post('mode');
		if($mode=="add"){
	        $id=$this->nomor_bukti();
		} else {
			$id=$this->input->post('invoice_number');			
		}
		$data['invoice_type']='D';
		$data['invoice_number']=$id;
		$data['sold_to_customer']=$this->input->post('sold_to_customer');
		$data['invoice_date']=$this->input->post('invoice_date');
		$data['sales_order_number']=$this->input->post('sales_order_number');
		$data['due_date']=$this->input->post('due_date');
		$data['comments']=$this->input->post('comments');
		$data['warehouse_code']=$this->input->post('warehouse_code');	 
		
		
		if($mode=="add"){
			$ok=$this->invoice_model->save($data);
			$this->invoice_model->save_from_so_items($data['invoice_number'],
			$this->input->post('qty_order'),
			$this->input->post('line_number'),$this->input->post('warehouse_code'));
		} else {
			$ok=$this->invoice_model->update($id,$data);
		}
		
		$this->load->model('sales_order_model');
		$this->sales_order_model->recalc_ship_qty($data['sales_order_number']);
		
		if ($ok){
			if($mode=="add") $this->nomor_bukti(true);
			echo json_encode(array('success'=>true,'invoice_number'=>$id));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function sales_order_not_delivered(){
		$this->load->model('sales_order_model');
		var_dump($this->sales_order_model->select_list_not_delivered());
		return true;
	}
	function updatex()
	{
		 $data=$this->set_defaults();              
		 $this->_set_rules();
 		 $id=$this->input->post('invoice_number');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$data['invoice_type']='D'; 
			$this->invoice_model->update($id,$data);
            $message='Update Success';
		} else {
			$message='Error Update';
		}
                
 		$this->view($id,$message);		
	}
	function add_item(){
        	$nomor=$this->input->get('invoice_number');            
            if(!$nomor){
                $data['message']='Nomor faktur tidak diisi.!';
				echo $data['message'];
				return false;
            }
            $data['invoice_number']=$nomor;
            $data['item_lookup']=$this->inventory_model->item_list();
            $this->load->view('sales/invoice_add_item',$data);
   }
    function save_item(){ 
        $item_no=$this->input->post('item_number');
		$faktur=$this->input->post('invoice_number');
		$data['warehouse_code']=$this->input->post('warehouse_code');
        if(!($item_no||$faktur)){
        	$data['message']='Kode barang atau nomor faktur tidak diisi !';
        	echo $data['message'];
        	return false;
        }
        $data['invoice_number']=$faktur;
        $data['item_number']=$item_no;
        $data['quantity']=$this->input->post('quantity');
        $data['unit']=$this->input->post('unit');
        $data['price']=$this->input->post('price');
        $data['cost']=$this->input->post('cost');			

        $item=$this->inventory_model->get_by_id($data['item_number'])->row();
		if($item){
            $data['description']=$item->description;
		}
        $data['amount']=$data['quantity']*$data['price'];

        $this->load->model('invoice_lineitems_model');
        return $this->invoice_lineitems_model->save($data);
    }        
    function delete_item($id){
        $this->load->model('invoice_lineitems_model');
        return $this->invoice_lineitems_model->delete($id);
    }        
	function view($id,$message=null){
		$this->load->model('invoice_lineitems_model');
		$this->load->model('shipping_locations_model');
		 $data['id']=$id;
		 $model=$this->invoice_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['warehouse_code']=$this->invoice_model->warehouse_code;
		 $data['mode']='view';
         $data['message']=$message;
		 $cst=$this->invoice_model->get_by_id($data['sold_to_customer'])->row();
		 if($cst){
		 	
		 } else {
		 	
		 }
         $data['customer_info']=$this->customer_model->info($data['sold_to_customer']);
        $data['warehouse_list']=$this->shipping_locations_model->select_list();
         $menu='';
		 $this->session->set_userdata('_right_menu',$menu);
         $this->session->set_userdata('invoice_number',$id);
         $this->template->display($this->file_view,$data);                 
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('invoice_number','Nomor Faktur', 'required|trim');
		 //$this->form_validation->set_rules('invoice_date','Tanggal','callback_valid_date');
		 $this->form_validation->set_rules('sold_to_customer','Pelanggan', 'required|trim');
	}
	 // date_validation callback
	function valid_date($str)
	{
	 if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str))
	 {
		 $this->form_validation->set_message('valid_date','Format tanggal salah, seharusnya yyyy-mm-dd');
		 return false;
	 } else {
	 	return true;
	 }
	}
	function search(){$this->browse();}
	
    function browse($offset=0,$limit=50,$order_column='invoice_number',$order_type='asc'){
        $data['caption']='DAFTAR BUKTI PENGIRIMAN';
		$data['controller']=$this->controller;		
		$data['_left_menu_caption']='Search';
		$data['fields_caption']=array('Nomor DO','Tanggal','Nomor SO','Kode Cust','Nama Customer','Kota','Gudang');
		$data['fields']=array('invoice_number','invoice_date','sales_order_number','sold_to_customer'
			,'company','city','warehouse_code');
		$data['field_key']='invoice_number';
		
		$this->load->library('search_criteria');
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor DO","sid_do_number");
		$faa[]=criteria("Pelanggan","sid_cust");
		$faa[]=criteria("Nomor SO","sid_so_number");
		$data['criteria']=$faa;

        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
    	$nama=$this->input->get('sid_cust');
		$no=$this->input->get('sid_do_number');
		$so=$this->input->get('sid_so_number');
		$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
		$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));
		
     	$sql="select i.invoice_number,i.invoice_date,i.sales_order_number, 
            i.sold_to_customer,c.company,c.city,i.warehouse_code
            from invoice i
            left join customers c on c.customer_number=i.sold_to_customer
            where   invoice_type='D'";
		if($no!=''){
			$sql.=" and invoice_number='".$no."'";
		} else {
			$sql.=" and invoice_date between '$d1' and '$d2'";
			if($nama!='')$sql.=" and company like '$nama%'";	
			if($so!='')$sql.=" and sales_order_number='$so'";
		}
        $sql.=" limit $offset,$limit";
		
        echo datasource($sql);
    }	 
	function delete($id){
		$so=$this->invoice_model->get_by_id($id)->row()->sales_order_number;
	 	$this->invoice_model->delete($id);

		$this->load->model('sales_order_model');
		$this->sales_order_model->recalc_ship_qty($so);
        $this->browse();

	}
    function detail(){
        $data['invoice_date']=isset($_GET['invoice_date'])?$_GET['invoice_date']:'';
        $data['sold_to_customer']=isset($_GET['sold_to_customer'])?$_GET['sold_to_customer']:'';
        $data['payment_terms']=isset($_GET['payment_terms'])?$_GET['payment_terms']:'';
        $data['comments']=isset($_GET['comments'])?$_GET['comments']:'';
		$data['salesman']=isset($_GET['salesman'])?$_GET['salesman']:'';
		$data['invoice_number']=$this->nomor_bukti();	// ambil nomor terbaru
        $this->invoice_model->save($data);
        $this->nomor_bukti(true);
		redirect("/delivery_order/view/".$data['invoice_number']);
    }
	function view_detail($nomor){
        $sql="select p.item_number,i.description,p.quantity 
        ,p.unit,p.price,p.amount,p.line_number
        from invoice_lineitems p
        left join inventory i on i.item_number=p.item_number
        where invoice_number='$nomor'";
        echo browse_simple($sql);
   }
    function print_faktur($nomor){
        $invoice=$this->invoice_model->get_by_id($nomor)->row();
		$saldo=$this->invoice_model->recalc($nomor);
		$data['invoice_number']=$invoice->invoice_number;
		$data['invoice_date']=$invoice->invoice_date;
		$data['sold_to_customer']=$invoice->sold_to_customer;
		$data['comments']=$invoice->comments;
		$data['sales_order_number']=$invoice->sales_order_number;
		$data['due_date']=$invoice->due_date;
        $this->load->view('sales/rpt/print_do',$data);
    }    
	function items($nomor,$type='')
	{
            $sql="select p.item_number,i.description,p.quantity 
            ,p.unit,p.price,p.discount,p.amount,p.line_number
            from invoice_lineitems p
            left join inventory i on i.item_number=p.item_number
            where invoice_number='$nomor'";
			$rs = mysql_query($sql);
			$result = array();
			while($row = mysql_fetch_object($rs)){
			    array_push($result, $row);
			}
			echo json_encode($result);
	}
	function select_do_open($cust) {
		$sql="select invoice_number,invoice_date,salesman,shipped_via,warehouse_code,due_date
		from invoice where invoice_type='D'
		and sold_to_customer='$cust' and (do_invoiced is null or do_invoiced=0)";
		echo datasource($sql);
	}
	function insert_invoice($nomor_do,$nomor_faktur) {
		$sql="insert into invoice_lineitems(invoice_number,item_number,description,quantity,unit,
		warehouse_code,from_line_number,from_line_type,from_line_doc,price,discount,cost,amount)
		
		select '$nomor_faktur',item_number,description,quantity,unit,
		warehouse_code,line_number,'DO',invoice_number,price,discount,cost,amount 
		from invoice_lineitems 
		where invoice_number='$nomor_do'";
		
//		echo $sql;
		
		$this->db->query($sql);
		
		$sql="update invoice set do_invoiced=true where invoice_number='$nomor_do'";
		$this->db->query($sql);
		
	}

}


?>
