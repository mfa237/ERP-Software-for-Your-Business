<?php if(!defined('BASEPATH'))	exit('No direct script access allowd');
 
class Receive_po extends CI_Controller {
        private $limit=10;
        private $table_name='inventory_products';
        private $primary_key='shipment_id';
        private $controller='receive_po';
        private $file_view='inventory/receive_po';
        private $sql="select distinct ip.shipment_id, ip.date_received,ip.purchase_order_number, 
        	ip.supplier_number,  s.supplier_name,ip.comments            
            from inventory_products ip 
            left join suppliers s on s.supplier_number=ip.supplier_number 
            where ip.receipt_type='PO'";
        
	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
		$this->load->helper(array('url','form','browse_select','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
        $this->load->library('sysvar');
        $this->load->library('javascript');
        $this->load->model('supplier_model');
        $this->load->model('shipping_locations_model');
        $this->load->model('inventory_products_model');
	}
	function index()
	{
        $this->browse();
	}
	function nomor_bukti($add=false)
	{
		$key="Receivement Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!TRM~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!TRM~$00001');
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
	        
    function add()
    {
        $this->_set_rules();
        $data=$this->set_defaults(); 
        $data['mode']='add';
        $data['supplier_number']='';
        $data['date_received']= date("Y-m-d");
        $this->template->display_form_input($this->file_view,$data,''); 
    }
	function save(){
        $data['potype']='O';
        $id=$this->nomor_bukti();
		$data['purchase_order_number']=$id;
		$data['po_date']=$this->input->post('po_date');
        $data['supplier_number']=$this->input->post('supplier_number');
        $data['terms']=$this->input->post('terms');
        $data['due_date']=$this->input->post('due_date');
        $data['comments']=$this->input->post('comments');

		if ($this->purchase_order_model->save($data)){
			$this->nomor_bukti(true);
			echo json_encode(array('success'=>true,'purchase_order_number'=>$id));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
    	function set_defaults($record=NULL){
            $data=data_table($this->table_name,$record);
            $data['mode']='';
            $data['message']='';
            $data['supplier_list']=$this->supplier_model->select_list();
            $data['warehouse_list']=$this->shipping_locations_model->select_list();
            if($record==NULL)  {
                $data['date_received']= date("Y-m-d");
                $data['receipt_type']='PO';
                $data['shipment_id']=$this->sysvar->autonumber("Receivement Numbering",0,'!TRM~$00001');
            } 
            return $data;
	}	
	function get_posts(){
            $data=data_table_post($this->table_name);
            return $data;
	}

	function update()
	{
            $data=$this->set_defaults();
            $this->_set_rules();
            if ($this->form_validation->run()=== TRUE){
                   $data=$this->get_posts();
                   $id=$this->input->post('shipment_id');
                   $this->inventory_products_model->update($id,$data);
                   $message='Update Success';
           } else {
                   $message='Error Update';
           }
           $this->view($id,$message);		
	}
	
	function view($id,$message=null){
            $model=$this->inventory_products_model->get_by_id($id)->row();
            $data=$this->set_defaults($model);
            $data['mode']='view';
            $data['message']=$message;
            $data['supplier_info']=$this->supplier_model->info($data['supplier_number']);
//            $data['detail']=$this->receive_items($id);    
 
//	         $left='inventory/menu_receive_po';
//			 $this->session->set_userdata('_right_menu',$left);
//	         $this->session->set_userdata('shipment_id',$id);
           $this->template->display('inventory/receive_po_view',$data);
			
			
			
       }
         
    function receive_items($id){
        $sql="select i.item_number,s.description,i.quantity_received,
            i.unit,i.id
            from inventory_products i
            left join inventory s on s.item_number=i.item_number
            where shipment_id='".$id."'";
		echo datasource($sql);               
 //       return browse_simple($sql,'Daftar Barang diterima');
    }                 
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('shipment_id','Receive Number', 'required|trim');
		 $this->form_validation->set_rules('supplier_number','Supplier Number',	 'required');
		 $this->form_validation->set_rules('date_received','Tanggal', 'required|trim');
		 $this->form_validation->set_rules('purchase_order_number','Nomor PO', 'required|trim');
	}	
	 // date_validation callback
	function valid_date($str)
	{
	 if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/',$str))
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
        $data['caption']='DAFTAR PENERIMAAN BARANG ATAS NOMOR PURCHASE ORDER';
		$data['controller']='receive_po';		
		$data['fields_caption']=array('Nomor Bukti','Tanggal','Nomor PO','Kode Supplier','Nama Supplier','Keterangan','');
		$data['fields']=array('shipment_id', 'date_received', 'purchase_order_number', 
        	'supplier_number','supplier_name','comments');
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
	function delete_receive($shipment_id)
        {
            $this->inventory_products_model->delete($shipment_id);
        }
	function add_item($recv_id){                
                $data['shipment_id']=$recv_id;
                $data['quantity_received']=$_GET['qty'];
                $data['item_number']=$_GET['item'];
                $data['receipt_type']='ETC_IN';
                $data['warehouse_code']=$this->access->cid;
                $this->inventory_card_header_model->add_item($data);
                echo $this->receive_items($recv_id);
	}
	function del_item($id,$recv_id){
                $this->db->where('id',$id);
		$this->db->delete('inventory_products');
                echo $this->receive_items($recv_id);
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
				    <tr><td colspan="2"><h1>BUKTI TERIMA BARANG</H1></td></tr>
				    <tr><td width="90">Nomor</td><td width="310">'.$invoice->purchase_order_number.'</td></tr>
				     <tr><td>Tanggal</td><td>'.$invoice->date_received.'</td></tr>
				     <tr><td>Supplier</td><td>'.$data['supplier_info'].'</td></tr>
				     <tr><td colspan="2">'.$item.'</td></tr>
				</table>';	        
			$this->load->view('simple_print',$data);
        }        
        function proses()
        {
            $this->load->model('inventory_products_model');
            $this->load->model('inventory_model');
            $this->load->model('purchase_order_lineitems_model');
            $this->load->model('purchase_order_model');

			$po_number=$this->input->post('purchase_order_number');
			$po=$this->purchase_order_model->get_by_id($po_number)->row();
			
            $data['purchase_order_number']=$po_number;
            $data['shipment_id']=$this->nomor_bukti();
			
            $data['supplier_number']=$po->supplier_number;
            $data['date_received']=$this->input->post('date_received');
            $data['warehouse_code']=$this->input->post('warehouse_code');
            $data['comments']=$this->input->post('comments');
            $data['receipt_by']=$this->input->post('receipt_by');
            $data['receipt_type']='PO';
            
            $qty=$this->input->post('qty');
            $line=$this->input->post('line');
            //var_dump(count($qty));
            for($i=0;$i<count($qty);$i++){
                if($qty[$i]>0){
                    $poline=$this->purchase_order_lineitems_model->get_by_id($line[$i])->row();
                    $itemno=$poline->item_number;
                    $stock=$this->inventory_model->get_by_id($itemno)->row();
					
                    $data['item_number']=$stock->item_number;
                    $data['cost']=$stock->cost;
                    $data['quantity_received']=$qty[$i];
                    $data['unit']=$stock->unit_of_measure;
                    $data['total_amount']=$data['quantity_received']*$data['cost'];
                    $this->inventory_products_model->save($data);
					$this->purchase_order_lineitems_model->update_qty_received($line[$i],$qty[$i]);
                }
            }
			$this->nomor_bukti(true);
            header('location: '.base_url().'index.php/receive_po/view/'.$data['shipment_id']);
        }
        function add_with_po($purchase_order_number)
        {
            $this->load->model('purchase_order_model');
            $this->load->model('purchase_order_lineitems_model');
            $data=$this->set_defaults(); 
            $data['message']='update error';
            $data['mode']='add';
            $data['purchase_order_number']=$purchase_order_number;
            $po=$this->purchase_order_model->get_by_id($purchase_order_number)->row();
            $data['supplier_number']=$po->supplier_number;
            $data['supplier_info']=$this->supplier_model->info($po->supplier_number);
            $data['po_item']=$this->purchase_order_lineitems_model->lineitems($purchase_order_number);

            $this->template->display_form_input('inventory/receive_po_number',$data,''); 
            
        }
        
}
