<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Delivery extends CI_Controller {
    private $limit=10;
    private $table_name='inventory_products';
    private $sql="select shipment_id as nomor_bukti,ip.item_number,i.description
        ,date_received,quantity_received,ip.unit,ip.cost,ip.warehouse_code
                from inventory_products ip left join inventory i
                on ip.item_number=i.item_number
                where receipt_type='etc_out' 
                ";
    private $file_view='inventory/delivery';
    private $primary_key='nomor_bukti';
    private $controller='delivery';
    
	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form','mylib_helper','browse_select'));
        $this->load->library('sysvar');
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('inventory_products_model');
		$this->load->model('inventory_model');
	}
	function nomor_bukti($add=false)
	{
		$key="Other Delivery Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!EOUT~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!EOUT~$00001');
				$rst=$this->inventory_products_model->get_by_id($no)->row();
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
            $data['item_number_list']=$this->inventory_model->item_list();
			$data['date_received']=date("Y-m-d H:i:s");
			if($record==NULL)$data['shipment_id']=$this->nomor_bukti();			
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
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
            $data['receipt_type']='etc_out';
			$data['shipment_id']=$this->nomor_bukti();
			$id=$this->inventory_products_model->save($data);
			$this->nomor_bukti(true);
	        $data['message']='update success';
	        $data['mode']='view';
	        $this->browse();
		} else {
			$data['mode']='add';
                         $this->template->display_form_input($this->file_view,$data,'');
		}
	}
	function update()
	{
	 
		 $data=$this->set_defaults();
 
		 $this->_set_rules();
 		 $id=$this->input->post($this->primary_key);
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();                    
                        unset($data['id']);
                        $this->inventory_products_model->update($id,$data);
                        $message='Update Success';
                        $this->browse();
		} else {
			$message='Error Update';
         		$this->view($id,$message);		
		}		
	}
	
	function view($id,$message=null){
		 $data['id']=$id;
		 $model=$this->inventory_products_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
		 $data['message']=$message;
		 $left='inventory/menu_delivery';
		 $this->session->set_userdata('_right_menu',$left);
		 $this->session->set_userdata('shipment_id',$id);
		 $this->template->display('inventory/delivery_detail',$data);

	
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules($this->primary_key,'Nomor Bukti', 'required|trim');
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
	function browse($offset=0,$limit=10,$order_column='shipment_id',$order_type='asc')
	{
        $data['caption']='DAFTAR PENGELURAN BARANG NON SALES ORDER';
		$data['controller']='delivery';		
		$data['fields_caption']=array('Nomor Bukti','Kode Barang','Nama Barang','Tanggal',
		'Qty','Unit','Cost','Gudang','');
		$data['fields']=array('shipment_id','item_number','description'
        ,'date_received','quantity_received','unit','cost','warehouse_code');
		$data['field_key']='shipment_id';
		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor","sid_nomor");
		$faa[]=criteria("Supplier","sid_supplier");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
		$sql=$this->sql;
    	$nama=$this->input->get('sid_supplier');
		$no=$this->input->get('sid_nomor');
		$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
		$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));

		if($no!=''){
			$sql.=" and shipment_id='".$no."'";
		} else {
			$sql.=" and date_received between '$d1' and '$d2'";
			if($nama!='')$sql.=" and supplier_name like '$nama%'";	
		}
        $sql.=" limit $offset,$limit";
        echo datasource($sql);
    }
	function delete($id){
	 	$this->inventory_products_model->delete($id);
	 	$this->browse();
	}
        function detail(){
            $data['shipment_id']=isset($_GET['shipment_id'])?$_GET['shipment_id']:'';
			$data['shipment_id']=$this->nomor_bukti();
			$this->nomor_bukti(true);
            $data['date_received']=isset($_GET['date_received'])?$_GET['date_received']:'';
            $data['supplier_number']=isset($_GET['supplier_number'])?$_GET['supplier_number']:'';
            $data['comments']=isset($_GET['comments'])?$_GET['comments']:'';
            $this->template->display('inventory/delivery_detail',$data);
        }
	function view_detail($nomor){
            $sql="select ip.item_number,i.description,ip.quantity_received as qty
            ,ip.unit,ip.cost,ip.id
            from inventory_products ip
            left join inventory i on i.item_number=ip.item_number
            where shipment_id='$nomor'";
            $s="
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/default/easyui.css\">
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/icon.css\">
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/demo.css\">
                <script src=\"".base_url()."js/jquery-ui/jquery.easyui.min.js\"></script>                
            ";
            echo $s." ".browse_simple($sql);
        }
        function add_item(){            
            if(isset($_GET)){
                $data['shipment_id']=$_GET['shipment_id'];
                $data['date_received']=$_GET['date_received'];
                $data['supplier_number']=$_GET['supplier_number'];
                $data['comments']=$_GET['comments'];
            } else {
                $data['shipment_id']='';
                $data['date_received']=date('YY-mm-dd');
                $data['supplier_number']='';
                $data['comments']='';                
            }
             
           $this->load->model('inventory_model');
           $data['item_lookup']=$this->inventory_model->item_list();
            $this->load->view('inventory/delivery_add_item',$data);
        }   
        function save_item(){ 
            $item_no=$this->input->post('item_number');
            $data['shipment_id']=$this->input->post('shipment_id');
            $data['date_received']=$this->input->post('date_received');
            $data['supplier_number']=$this->input->post('supplier_number');
            $data['comments']=$this->input->post('comments');
            $data['item_number']=$item_no;
            $data['quantity_received']=$this->input->post('quantity_received');
            $data['receipt_type']='etc_out';
            $rst=$this->inventory_model->get_by_id($item_no)->row();
            $data['cost']=$rst->cost;
            $data['unit']=$rst->unit_of_measure;
            $this->inventory_products_model->save($data);
        }        
        function delete_item($id){
            return $this->inventory_products_model->delete_item($id);
        }        
		function print_bukti($nomor){
   	        $this->load->helper('mylib');
			$this->load->helper('pdf_helper');			
            $this->load->model('supplier_model');
			$this->load->model('inventory_products_model');
            $invoice=$this->inventory_products_model->get_by_id($nomor)->row();
            $caption='';
            $sql="select ipm.item_number,i.description,ipm.quantity_received,ipm.unit,ipm.cost
                from inventory_products ipm left join inventory i on i.item_number=ipm.item_number
                where shipment_id='".$nomor."'";
            $caption='';$class='';$field_key='';$offset='0';$limit=100;
            $order_column='';$order_type='asc';
            $item=browse_select($sql, $caption, $class, $field_key, $offset, $limit, 
                        $order_column, $order_type,false);
            $data['supplier_info']=$this->supplier_model->info($invoice->supplier_number);
			$data['header']=company_header();
			$data['caption']='';
			$data['content']='
				<table cellspacing="0" cellpadding="1" border="1" style="width:100%"> 
				    <tr><td colspan="2"><h1>BUKTI KELUAR BARANG</H1></td></tr>
				    <tr><td width="90">Nomor</td><td width="310">'.$invoice->purchase_order_number.'</td></tr>
				     <tr><td>Tanggal</td><td>'.$invoice->date_received.'</td></tr>
				     <tr><td>Supplier</td><td>'.$data['supplier_info'].'</td></tr>
				     <tr><td colspan="2">'.$item.'</td></tr>
				</table>';	        
			$this->load->view('simple_print',$data);
        }        
		
}
