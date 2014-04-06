<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Purchase_invoice extends CI_Controller {
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
			$data['purchase_order_number']=$this->nomor_bukti();
            $data['po_date']= date("Y-m-d");
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
	function nomor_bukti($add=false)
	{
		$key="Purchase Invoice Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!PI~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!PI~$00001');
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

	function add()
	{
	 	$data=$this->set_defaults();
		$this->_set_rules();
		$data['mode']='add';
		$data['message']='';
        $data['supplier_number']='';
        $data['po_date']= date("Y-m-d");
        $data['potype']='I';
        $data['amount']=0;
        $data['supplier_info']=$this->supplier_model->info($data['supplier_number']);
        $data['terms_list']=$this->type_of_payment_model->select_list();
		$this->template->display_form_input($this->file_view,$data,'');			                 
	}
	function save(){
		$mode=$this->input->post('mode');
        $data['potype']='I';
		if($mode=="add"){
	        $id=$this->nomor_bukti();
		} else {
			$id=$this->input->post('purchase_order_number');			
		}
		$data['purchase_order_number']=$id;
		$data['po_date']=$this->input->post('po_date');
        $data['supplier_number']=$this->input->post('supplier_number');
        $data['terms']=$this->input->post('terms');
        $data['due_date']=$this->input->post('due_date');
        $data['comments']=$this->input->post('comments');
		if($mode=="add"){
			$ok=$this->purchase_order_model->save($data);
		} else {
			$ok=$this->purchase_order_model->update($id,$data);			
		}

		if ($ok){
			if($mode=="add") $this->nomor_bukti(true);
			echo json_encode(array('success'=>true,'purchase_order_number'=>$id));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function items($nomor,$type='')
	{
            $sql="select p.item_number,i.description,p.quantity 
            ,p.unit,p.price,p.discount,p.total_price,p.line_number
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
			$this->purchase_order_model->update($id,$data);
			//simpan juga ke table payables
			//this->payables_model->update($id,$data);
            $message='Update Success';
		} else {
			$message='Error Update';
		}
                
 		$this->view($id,$message);		
	}
	 
        
	function view($id,$message=null){
		 $data['id']=$id;
		 $this->purchase_order_model->recalc($id);
		 $model=$this->purchase_order_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['id']=$id;
		 $data['purchase_order_number']=$id;
		 $data['mode']='view';
         $data['message']=$message;
         $data['supplier_info']=$this->supplier_model->info($data['supplier_number']);
         $data['terms_list']=$this->type_of_payment_model->select_list();
         $left='purchase/menu_purchase_invoice';
		 $this->session->set_userdata('_right_menu',$left);
         $this->session->set_userdata('purchase_order_number',$id);
         $this->template->display('purchase/purchase_invoice',$data);
                 
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
    	if($this->input->get('sid_po_number')!=''){
    		$sql=$this->sql." and purchase_order_number='".$this->input->get('sid_po_number')."'";
		} else {
			$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
			$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));
			$sql=$this->sql." and po_date between '".$d1."' and '".$d2."'";
			if($this->input->get('sid_supplier')!='')$sql.=" and supplier_name like '".$this->input->get('sid_supplier')."%'";
		}
        echo datasource($sql);
    }	 
	function delete($id){
	 	$this->purchase_order_model->delete($id);
        $this->browse();
	}
        function detail(){
            $data['purchase_order_number']=isset($_GET['purchase_order_number'])?$_GET['purchase_order_number']:'';
            $data['po_date']=isset($_GET['po_date'])?$_GET['po_date']:'';
            $data['supplier_number']=isset($_GET['supplier_number'])?$_GET['supplier_number']:'';
            $data['comments']=isset($_GET['comments'])?$_GET['comments']:'';
            $data['potype']='I';
            $data['terms']=isset($_GET['terms'])?$_GET['terms']:'';
            $this->purchase_order_model->save($data);
            $this->sysvar->autonumber_inc("Purchase Invoice Numbering");
            $data['supplier_info']=$this->supplier_model->info($data['supplier_number']);            
            $this->template->display('purchase/purchase_invoice_detail',$data);
        }
	function view_detail($nomor){
		$this->load->model('purchase_order_lineitems_model');
		echo $this->purchase_order_lineitems_model->browse($nomor);
    }
        function add_item(){            
            if(isset($_GET)){
                $data['purchase_order_number']=$_GET['purchase_order_number'];
            } else {
                $data['purchase_order_number']='';
            }
           $this->load->model('inventory_model');
           $data['item_lookup']=$this->inventory_model->item_list();
            $this->load->view('purchase/purchase_invoice_add_item',$data);
        }   
        function save_item(){ 
            $this->load->model('purchase_order_lineitems_model');
            $item_no=$this->input->post('item_number');
            $data['purchase_order_number']=$this->input->post('purchase_order_number');
            $data['item_number']=$item_no;
            $data['quantity']=$this->input->post('quantity');
            $data['description']=$this->inventory_model->get_by_id($data['item_number'])->row()->description;
            $data['unit']=$this->input->post('unit');
            $data['price']=$this->input->post('price');
            $data['total_price']=$data['quantity']*$data['price'];
            $this->purchase_order_lineitems_model->save($data);
        }        
        function delete_item($id){
            $this->load->model('purchase_order_lineitems_model');
            return $this->purchase_order_lineitems_model->delete($id);
        }        
        function print_faktur($nomor){
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
			$this->load->view('purchase/print_faktur',$data);
        }
        function summary_info($nomor){
            //$nomor=$_GET['nomor'];
            $saldo=$this->purchase_order_model->recalc($nomor);
            echo 'Jumlah Faktur: Rp. '.  number_format($this->purchase_order_model->amount);
            echo '<br/>Jumlah Bayar : Rp. '.  number_format($this->purchase_order_model->amount_paid);
            echo '<br/>Jumlah Sisa  : Rp. '.  number_format($saldo);            
        }
        function payments($purchase_order_number)
        {
        	 $model=$this->purchase_order_model->get_by_id($purchase_order_number)->row();
			 $data=$this->set_defaults($model);
	         $data['supplier_info']=$this->supplier_model->info($data['supplier_number']);
	         $this->template->display('purchase/payments',$data);
        }
/*
		function add_payment($purchase_order_number)
		{
			$url='payables_payments/add?purchase_order_number='.$purchase_order_number;
			$result=file_get_contents(site_url($url));
			echo $result;
		}
		function save_payment()
		{
		 
			var_dump($_POST);
			 
			
		}
 *  * 
 */
		function delete_payment($purchase_order_number)
		{
			
		}
		function list_payment($purchase_order_number)
		{
			$this->load->model('payables_payments_model');
			echo $this->payables_payments_model->browse($purchase_order_number);				
		}
		function add_retur($purchase_order_number)
		{
			
		}
		function delete_retur($purchase_order_number)
		{
			
		}
		function list_retur($purchase_order_number)
		{
			$sql="select purchase_order_number as nomor,po_date as tanggal, amount, 
                i.supplier_number,c.supplier_name,c.city,i.warehouse_code
                from purchase_order i
                left join suppliers c on c.supplier_number=i.supplier_number
                where i.potype='R' and po_ref='$purchase_order_number'";
			echo browse_simple($sql);				
			
		}
		function save_retur($purchase_order_number)
		{
			
		}
		function add_crdb($purchase_order_number)
		{
			
		}
		function delete_crdb($nomor_bukti)
		{
			
		}
		function list_crdb($purchase_order_number)
		{
			
		}
		function save_crdb($purchase_order_number)
		{
			
		}
		function add_jurnal($purchase_order_number)
		{
			
		}
		function delete_jurnal($purchase_order_number)
		{
			
		}
		function list_jurnal($purchase_order_number)
		{
			
		}
		function save_jurnal($purchase_order_number)
		{
			
		}
	function grafik_pembelian(){
/* create_graph($konfigurasi_grafik, $data, $tipe_grafik, $judul_pd_grafik, $nama_berkas) */		
		$phpgraph = $this->load->library('PhpGraph');		
		$cfg['width'] = 300;
		$cfg['height'] = 200;
		$cfg['compare'] = false;
		$cfg['disable-values']=1;
		$chart_type='vertical-line-graph';
		$data=$this->trend_pembelian();
		//var_dump($data);
		$file="tmp/".$chart_type.".png";
		$this->phpgraph->create_graph($cfg, $data,$chart_type,'Trend Pembelian',$file);
		echo '<img src="'.base_url().'/'.$file.'"/>';
		echo '*Display only this year';
	}
	function trend_pembelian()
	{
		$sql="select DATE_FORMAT(`po_date`,'%Y-%m') as prd,
		sum(p.amount) as sum_amount 
		from purchase_order p
		where potype='I' and year(p.po_date)=".date('Y')."
		group by DATE_FORMAT(`po_date`,'%Y-%m')
		order by p.po_date asc
		limit 0,10";
		$query=$this->db->query($sql);
		$data[0]=0;
		foreach($query->result() as $row){
			$prd=$row->prd;
			if($prd=="")$prd="00-00";
			$amount=$row->sum_amount;
			if($amount==null)$amount=0;
			if($amount>0)$amount=round($amount/1000);
			$data[$prd]=$amount;
		}
		//var_dump($data);
		return $data;
	}
	function daftar_saldo_faktur()
	{
		$sql="select p.purchase_order_number as faktur, p.po_date as tanggal,
		s.supplier_name,p.terms,p.amount,0 as payment,0 as retur,0 as crdb,0 as saldo
		from purchase_order p
		left join suppliers s on s.supplier_number=p.supplier_number
		where potype='I' and year(p.po_date)=".date('Y')."
		order by p.po_date asc";
		
		$query=$this->db->query($sql);
		$flds=$query->list_fields();
		$i=0;
		$data[0]=0;
		foreach($query->result_array() as $row){
			$amount=$row['amount'];
			if($amount==null)$amount=0;
			$saldo=$amount;
			if($saldo<>0){
				$data[$i]=$row;
				$faktur=$row['faktur'];
				$data[$i]['payment']=$this->amount_paid($faktur);
				$data[$i]['retur']=$this->amount_retur($faktur);
				$data[$i]['crdb']=$this->amount_crdb($faktur);
				$data[$i]['saldo']=$amount;
				$i++;
			}
		}
		 
		echo browse_data($data,$flds);
	}
	function amount_paid($faktur){return 0;}
	function amount_retur($faktur){return 0;}
	function amount_crdb($faktur){return 0;}
	
	function select_list(){
		
		$q=$this->input->get('q');
		$cst=$this->input->get('supp');
		if($q){
			if($q=='not_paid'){				
				$sql="select purchase_order_number,po_date,due_date,amount,terms 
				from purchase_order 
				where potype='I' and (paid=false or isnull(paid))
				and supplier_number='$cst'";
				 
				$query=$this->db->query($sql);
				$i=0;
				$this->load->model('purchase_order_model');
				$data='';
				foreach($query->result() as $row){
					$saldo=$this->purchase_order_model->recalc($row->purchase_order_number);
					if($saldo!=0){
						$data[$i][]=$row->purchase_order_number;
						$data[$i][]=$row->po_date;
						$data[$i][]=$row->due_date;
						$data[$i][]=$row->terms;
						$data[$i][]=number_format($row->amount);
						$data[$i][]=number_format($saldo);
						$data[$i][]=form_input('bayar[]');
						$data[$i][]=form_hidden('faktur[]',$row->purchase_order_number);
						$i++;
					}
				}
				
				$this->load->library('browse');
				$header=array('Faktur','Tanggal','Jth Tempo','Termin','Jumlah','Saldo','Bayar');
				$this->browse->set_header($header);
				$this->browse->data($data);
				echo $this->browse->refresh();
			}
		}
	}
	function select($supplier=''){
		$s="select purchase_order_number,po_date,terms from purchase_order 
		where potype='I'";
		if($supplier!="")$s.=" and supplier_number='".$supplier."'";
	 
		echo datasource($s);
	}

}
