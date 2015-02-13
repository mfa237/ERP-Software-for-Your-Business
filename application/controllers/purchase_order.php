<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Purchase_order extends CI_Controller {
        private $limit=10;
        private $sql="select purchase_order_number,po_date,amount, 
                i.supplier_number,c.supplier_name,c.city,i.warehouse_code,i.received
                from purchase_order i
                left join suppliers c on c.supplier_number=i.supplier_number
                where i.potype='O'";
        private $controller='purchase_order';
        private $primary_key='purchase_order_number';
        private $file_view='purchase/purchase_order';
        private $table_name='purchase_order';
	function __construct()
	{
		parent::__construct();
		
		if(!$this->access->is_login())redirect(base_url());
		
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
        $this->load->library('sysvar');
        $this->load->library('javascript');
        $this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('purchase_order_model');
		$this->load->model('supplier_model');
		$this->load->model('inventory_model');
		$this->load->model('type_of_payment_model');
		 
	}
	function set_defaults($record=NULL){
            $data=data_table($this->table_name,$record);
            $data['mode']='';
            $data['message']='';
            if($record==NULL){
				$data['purchase_order_number']=$this->nomor_bukti();
			}
			$data['has_receive']=false;
            return $data;
	}
	function index()
	{	
		if(!allow_mod2('_40040'))return false;
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
		$data['message']='';
        $data['supplier_number']='';
        $data['po_date']= date("Y-m-d");
		$data['supplier_info']='';
        $data['term_list']=$this->type_of_payment_model->select_list();
		$this->template->display_form_input($this->file_view,$data,'');			
	}
	function nomor_bukti($add=false)
	{
		$key="Purchase Order Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!PO~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!PO~$00001');
				$rst=$this->purchase_order_model->get_by_id($no)->row();
				if($rst){
				  	$this->sysvar->autonumber_inc($key);
				} else {
					break;					
				}
			}
			return $no;
		}
	}
	function save(){
		
		$mode=$this->input->post('mode');
		if($mode=="add"){
	        $id=$this->nomor_bukti();
		} else {
			$id=$this->input->post('purchase_order_number');			
		}
        $data['potype']='O';
		$data['purchase_order_number']=$id;
		$data['po_date']=$this->input->post('po_date');
        $data['supplier_number']=$this->input->post('supplier_number');
        $data['terms']=$this->input->post('terms');
        $data['due_date']=$this->input->post('due_date');
        $data['comments']=$this->input->post('comments');
		unset($data['has_receive']);
		if($id==""){
			$id=$this->session->userdata('purchase_order_number');
			$data['purchase_order_number']=$id;
		}
		if($data['supplier_number']=="") $data['supplier_number']=$this->session->userdata('supplier_number');
			
		if($mode=="add"){
			$ok=$this->purchase_order_model->save($data);
		} else {
			$ok=$this->purchase_order_model->update($id,$data);			
		}

		if ($ok){
			if($mode=="add") $this->nomor_bukti(true);
			echo json_encode(array('success'=>true,'purchase_order_number'=>$id));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'.mysql_error()));
		}
	}
	function items($nomor,$type='')
	{
		$nomor=urldecode($nomor);
		$sql="select p.item_number,i.description,p.quantity,p.qty_recvd 
		,p.unit,p.price,p.discount,p.total_price,p.line_number,p.from_line_doc
		from purchase_order_lineitems p
		left join inventory i on i.item_number=p.item_number
		where purchase_order_number='$nomor'";
		 
		echo datasource($sql);
	}
	function update()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $id=$this->input->post('purchase_order_number');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			unset($data['has_receive']);
			$this->purchase_order_model->update($id,$data);
                        $message='Update Success';
		} else {
			$message='Error Update';
		}
                
 		$this->view($id,$message);		
	}
	 
	function view($id,$mode="view"){
		$id=urldecode($id);
		 $data['id']=$id;
		 $model=$this->purchase_order_model->get_by_id($id)->row();
		 
		 $data=$this->set_defaults($model);
		 $data['purchase_order_number']=$id;
		 $data['id']=$id;
		 $data['mode']=$mode;
         $data['message']="";
         $data['supplier_list']=$this->supplier_model->select_list();  
         $data['supplier_info']=$this->supplier_model->info($data['supplier_number']);
         $data['term_list']=$this->type_of_payment_model->select_list();
		 $data['amount']=$model->amount;
		 $data['subtotal']=$model->subtotal;
		 $data['discount']=$model->discount;
		 $data['po_tax_percent']=$model->tax;
		 $data['has_receive']=$this->db->query("select count(1) as cnt from inventory_products 
				where purchase_order_number='$id'")->row()->cnt;
		 $this->purchase_order_model->recalc_qty_recvd($id);


         $this->session->set_userdata('purchase_order_number',$id);
         $this->session->set_userdata('supplier_number',$data['supplier_number']);
		 
		 $this->template->display_form_input($this->file_view,$data,'');			
		
	}
   
	function _set_rules(){	
		 $this->form_validation->set_rules('purchase_order_number','Nomor Faktur', 'required|trim');
		 $this->form_validation->set_rules('po_date','Tanggal','callback_valid_date');
	}
	 
	function valid_date($str)
	{
	 if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str))
	 {
		 $this->form_validation->set_message('valid_date',
		 'Format tanggal salah, seharusnya yyyy-mm-dd');
		 return false;
	 } else {
	 	return true;
	 }
	}
    function browse($offset=0,$limit=50,$order_column='purchase_order_number',$order_type='asc'){
		$data['controller']=$this->controller;
		$data['fields_caption']=array('Nomor PO','Tanggal','Jumlah','Kode Supplier','Nama Supplier','Kota','Gudang','Rcvd');
		$data['fields']=array('purchase_order_number','po_date','amount', 
                'supplier_number','supplier_name','city','warehouse_code','received');
		$data['field_key']='purchase_order_number';
		$data['caption']='DAFTAR PURCHASE ORDER';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor PO","sid_po_number");
		$faa[]=criteria("Supplier","sid_supplier");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
    	if($this->input->get('sid_po_number')){
    		$sql=$this->sql." and purchase_order_number='".$this->input->get('sid_po_number')."'";
		} else {
			$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
			$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));
			$sql=$this->sql." and po_date between '".$d1."' and '".$d2."'";
			if($this->input->get('sid_supplier'))$sql.=" and supplier_name like '".$this->input->get('sid_supplier')."%'";
		}
        echo datasource($sql);
    }	 
	function delete($id){	 	 
		if(!allow_mod('_40043')){
			echo json_encode(array("success"=>false,"msg"=>"Anda tidak diijinkan menjalankan proses module ini."));
			return false;
		};			
		if($this->purchase_order_model->validate_delete_po($id) and $this->purchase_order_model->delete($id) ){
			echo json_encode(array("success"=>true,"msg"=>"Berhasil nomor PO ini sudah dihapus."));
		} else {
			echo json_encode(array("success"=>false,"msg"=>"Nomor PO ini tidak bisa dihapus! <br>Sudah ada penerimaan."));
		}
	}
	function detail(){
		$data['purchase_order_number']=isset($_GET['purchase_order_number'])?$_GET['purchase_order_number']:'';
		$data['po_date']=isset($_GET['po_date'])?$_GET['po_date']:'';
		$data['supplier_number']=isset($_GET['supplier_number'])?$_GET['supplier_number']:'';
		$data['comments']=isset($_GET['comments'])?$_GET['comments']:'';
		$data['potype']='O';
		$this->purchase_order_model->save($data);
		$this->sysvar->autonumber_inc("Purchase Order Numbering");

		$data['supplier_info']=$this->supplier_model->info($data['supplier_number']);
		
		$this->template->display('purchase/purchase_order_detail',$data);
	}
	function view_detail($nomor){
		$nomor=urldecode($nomor);
		$sql="select p.item_number,i.description,p.quantity 
		,p.unit,p.price,p.total_price,p.line_number
		from purchase_order_lineitems p
		left join inventory i on i.item_number=p.item_number
		where purchase_order_number='$nomor'";
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
                $data['purchase_order_number']=$_GET['purchase_order_number'];
            } else {
                $data['purchase_order_number']='';
            }
           $this->load->model('inventory_model');
           $data['item_lookup']=$this->inventory_model->item_list();
            $this->load->view('purchase/purchase_order_add_item',$data);
        }   
        function delete_item($id){
			$id=urldecode($id);
            $this->load->model('purchase_order_lineitems_model');
            return $this->purchase_order_lineitems_model->delete($id);
        }        
        function print_po($nomor){
			$nomor=urldecode($nomor);
		    $this->load->helper('mylib');
			$this->load->helper('pdf_helper');		
			
            $invoice=$this->purchase_order_model->get_by_id($nomor)->row();
			$saldo=$this->purchase_order_model->recalc($nomor);
			$data['po_number']=$invoice->purchase_order_number;
			$data['tanggal']=$invoice->po_date;
			$data['supplier']=$invoice->supplier_number;
			$data['terms']=$invoice->terms;
			$data['amount']=$invoice->amount;
			$data['sub_total']=$invoice->subtotal;
			$data['discount']=$invoice->discount;
			$data['disc_amount']=$invoice->subtotal*$invoice->discount;
			$data['freight']=$invoice->freight;
			$data['others']=$invoice->other;
			$data['tax']=$invoice->tax;
			$data['tax_amount']=$invoice->tax*($data['sub_total']-$data['disc_amount']);
			$data['comments']=$invoice->comments;
			$this->load->view('purchase/print_po',$data);

		}
        function sum_info(){
			$nomor=urldecode($nomor);
            $nomor=$_GET['nomor'];
            $saldo=$this->purchase_order_model->recalc($nomor);
            echo 'Jumlah Faktur: Rp. '.  number_format($this->purchase_order_model->amount);
            echo '<br/>Jumlah Bayar : Rp. '.  number_format($this->purchase_order_model->amount_paid);
            echo '<br/>Jumlah Sisa  : Rp. '.  number_format($saldo);            
        }
        function list_open_po($supplier)
        {
			$supplier=urldecode($supplier);
            $sql="select p.purchase_order_number,p.po_date,p.due_date,p.terms 
            from purchase_order  p
            where p.supplier_number='$supplier' and p.potype='O'";
            $s="
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/default/easyui.css\">
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/icon.css\">
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/demo.css\">
                <script src=\"".base_url()."js/jquery-ui/jquery.easyui.min.js\"></script>                
            ";
            echo $s." ".browse_simple($sql,'',500,300,'dgPoList');

        }
		function select_open_po($supplier){
			$supplier=urldecode($supplier);
            $sql="select p.purchase_order_number,p.po_date,p.due_date,p.terms 
            from purchase_order  p
            where p.supplier_number='$supplier' and p.potype='O'  and ifnull(received,false)=false";
			echo datasource($sql);
		}
        function list_item_receive($nomor){
			$nomor=urldecode($nomor);
            $this->load->model('purchase_order_lineitems_model');
            $data['po_item']=$this->purchase_order_lineitems_model->lineitems($nomor);
            $this->load->view('inventory/receive_po_item',$data);
            
        }
		function items_not_received($nomor){
			$nomor=urldecode($nomor);
			if($nomor){

				$sql="select item_number,description,quantity,unit,qty_recvd,line_number 
				from purchase_order_lineitems where purchase_order_number='$nomor' and ifnull(received,false)=false ";				 
				 
				$query=$this->db->query($sql);
				$i=0;
				$rows[0]='';
				if($query){ 
					foreach($query->result_array() as $row){
						$row['qty']=form_input("qty[]","","style='width:50px'");
						$row['line']=$row['line_number'].form_hidden("line[]",$row['line_number']);
						$rows[$i++]=$row;
					};
				}
				$data['total']=$i;
				$data['rows']=$rows;
							
				echo json_encode($data);

			}
		}
        function view_receive($purchase_order_number){
			$purchase_order_number=urldecode($purchase_order_number);             
            $this->load->model('inventory_products_model');
            $sql="select distinct shipment_id,
                date_received,warehouse_code,receipt_by 
                from inventory_products
                where receipt_type='PO' 
                and purchase_order_number='$purchase_order_number'"; 
            //$data['list_receive']=$this->inventory_products_model->list_receive($purchase_order_number);
            $data['list_receive']=browse_simple($sql, 
                    "Daftar Penerimaan atas nomor po [".$purchase_order_number."]"
                    , 400, 0, "dgItem", "cmdButtons");
            $po=$this->purchase_order_model->get_by_id($purchase_order_number)->row();
            $data['supplier_number']=$po->supplier_number;
            $data['supplier_info']=$this->supplier_model->info($po->supplier_number);
            $data['purchase_order_number']=$purchase_order_number;
            $this->template->display('purchase/list_receive',$data);            
        }
	function create_invoice($nomor_po)
	{
		$nomor_po=urldecode($nomor_po);
		//-- tampilkan nomor penerimaan
            $this->load->model('inventory_products_model');
            $sql="select distinct shipment_id,
                date_received,warehouse_code,receipt_by,ipp.supplier_number,
       			s.supplier_name,ipp.purchase_order_number
                from inventory_products ipp left join suppliers s on s.supplier_number=ipp.supplier_number
                where receipt_type='PO' 
                and purchase_order_number='$nomor_po'"; 
			$rst=$this->db->query($sql);
			$table='
				<table class="table1">
				<tr><td colspan="7"><h3>Silahkan pilih nomor bukti penerimaan yang akan dibuatkan faktur
				dibawah ini: </h3></td></tr>
				<thead><tr><td>#</td><td>Nomor</td><td>Tanggal</td><td>Gudang</td>
				<td>Nomor PO</td><td>Supplier</td><td>Pilih</td></tr>
				</thead>
				<tbody>';
		    $i=1;
		    foreach($rst->result() as $row){
		        $table.= "<tr>
		            <td>".$i++."</td>
		            <td>".$row->shipment_id."</td>
		            <td>".$row->date_received."</td>
		            <td>".$row->warehouse_code."</td>
		            <td>".$row->purchase_order_number."</td>
		            <td>".$row->supplier_name."</td>		            		         
		            <td><input type='checkbox' name='pilih[]' value='".$row->shipment_id."'>
		            </td>
		        </tr>";
		    }
			$table.='
				</tbody>
				</table>        ';

			$data['list_receive']=$table;
            $po=$this->purchase_order_model->get_by_id($nomor_po)->row();
            $data['supplier_number']=$po->supplier_number;
            $data['supplier_info']=$this->supplier_model->info($po->supplier_number);
            $data['purchase_order_number']=$nomor_po;
            $this->template->display('purchase/list_receive_not_invoiced',$data);            
	}
	function sub_total($nomor){
		$nomor=urldecode($nomor);
		if($this->input->get()){
			$sql="update purchase_order set discount=".$_GET['discount'].",tax=".$_GET['tax']
			.",freight=".$_GET['freight'].",other=".$_GET['others']." where purchase_order_number='$nomor'";
			$rs=mysql_query($sql);
		} 
		$saldo=$this->purchase_order_model->recalc($nomor);
		$sub_total=$this->purchase_order_model->sub_total;
		$data=array('sub_total'=>$sub_total,'amount'=>$this->purchase_order_model->amount,"msg"=>mysql_error());
		
		echo json_encode($data);				
	}
    function save_item(){
    	 
        $item_no=$this->input->post('item_number');
		$po=$this->input->post('po_number_item');
        $data['purchase_order_number']=$po;
        $data['item_number']=$item_no;
        $data['quantity']=$this->input->post('quantity');
        $data['unit']=$this->input->post('unit');
        $data['price']=$this->input->post('price');
		$data['discount']=$this->input->post('discount');
		$data['warehouse_code']=$this->input->post('gudang_item');
		if($data['discount']=='')$data['discount']=0;
		$data['total_price']=$this->input->post('amount');			
		$id=$this->input->post('line_number');
		if($id!='')$data['line_number']=$id;
        $item=$this->inventory_model->get_by_id($data['item_number'])->row();
		if($item){
            $data['description']=$item->description;
		}
		if($data['unit']=='')$data['unit']=$item->unit_of_measure;
		if($data['total_price']==0){
	        $gross=($data['quantity']*$data['price']);
			$disc_amt=$gross*$data['discount'];
			$data['total_price']=$gross-$disc_amt;
		}
        $this->load->model('purchase_order_lineitems_model');
        
		if($id!=''){
			$ok=$this->purchase_order_lineitems_model->update($id,$data);
		} else {
        	$ok=$this->purchase_order_lineitems_model->save($data);
		}
		$this->purchase_order_model->recalc($po);
		 
		if ($ok){
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
    }        
	function recalc($nomor){
		$nomor=urldecode($nomor);
		$this->purchase_order_model->recalc($nomor);
	}
				
}
