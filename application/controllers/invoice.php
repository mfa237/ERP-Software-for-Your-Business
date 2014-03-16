<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Invoice extends CI_Controller {
    private $limit=10;
    private $sql="select i.invoice_number,i.invoice_date,i.amount, 
            i.sold_to_customer,c.company,i.salesman,c.city,i.warehouse_code
            from invoice i
            left join customers c on c.customer_number=i.sold_to_customer
            where  invoice_type='i' ";
    private $controller='invoice';
    private $primary_key='invoice_number';
    private $file_view='sales/invoice';
    private $table_name='invoice';
	function __construct()
	{
		parent::__construct();
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
		$key="Invoice Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!FJ~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!FJ~$00001');
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
		$data['invoice_date']= date("Y-m-d");
		if($record==NULL)$data['invoice_number']=$this->nomor_bukti();
        $data['invoice_type']='I';
		return $data;
	}
	function index()
	{          
		if(!$this->access->is_login()){
		    redirect(base_url());
			exit;
		}				
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
			$data['invoice_number']=$this->nomor_bukti();
			$data['invoice_type']='I';
			$this->invoice_model->save($data);
			$this->nomor_bukti(true);
			$id=$data['invoice_number'];
            $this->view($id,'Finish');
   		} else {
			$this->load->model('invoice_lineitems_model');                       
			$data['mode']='add';
			$data['message']='';
            $data['sold_to_customer']=$this->input->post('sold_to_customer');
//            $data['customer_list']=$this->customer_model->select_list();
			$data['salesman_list']=$this->salesman_model->select_list();
            $data['amount']=$this->input->post('amount');
            $data['payment_terms_list']=$this->type_of_payment_model->select_list();
			$this->template->display_form_input($this->file_view,$data,'');			
		}
	}
	function save()
	{
			$data['invoice_date']=$this->input->post('invoice_date');
			$data['sold_to_customer']=$this->input->post('sold_to_customer');
			$data['salesman']=$this->input->post('salesman');
			$data['payment_terms']=$this->input->post('payment_terms');
			$data['due_date']=$this->input->post('due_date');
			$data['comments']=$this->input->post('comments');			
			$data['sales_order_number']=$this->input->post('sales_order_number');
			$id=$this->nomor_bukti();
			$data['invoice_number']=$id;
			$data['invoice_type']='I';
			$data['type_of_invoice']='Simple';

	        $this->session->set_userdata('invoice_number',$id);
			 
			$ok=$this->invoice_model->save($data);
			$this->nomor_bukti(true);
			if ($ok){
				echo json_encode(array('success'=>true,'invoice_number'=>$id));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
	}
	function update()
	{
		 $data=$this->set_defaults();              
		 $this->_set_rules();
 		 $id=$this->input->post('invoice_number');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$data['invoice_type']='I'; 
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
		$faktur=$this->input->post('invoice_number_item');
        if(!($item_no||$faktur)){
        	$msg='Kode barang atau nomor faktur tidak diisi !';
        }

		$id=$this->input->post('line_number');
		if($id!='')$data['line_number']=$id;

        $data['invoice_number']=$faktur;
        $data['item_number']=$item_no;
        $data['quantity']=$this->input->post('quantity');
        $data['unit']=$this->input->post('unit');
        $data['price']=$this->input->post('price');
        $data['cost']=$this->input->post('cost');			
        $data['discount']=$this->input->post('discount');			

        $item=$this->inventory_model->get_by_id($data['item_number'])->row();
		if($item){
            $data['description']=$item->description;
		}
		if($data['cost']==0)$data['cost']=$item->cost;
        $gross=$data['quantity']*$data['price'];
		$disc_amount=$data['discount']*$gross;
		$data['amount']=$gross-$disc_amount;
	
        $this->load->model('invoice_lineitems_model');
		
		if($id!=''){
			$ok=$this->invoice_lineitems_model->update($id,$data);
		} else {
        	$ok=$this->invoice_lineitems_model->save($data);
		}
//		$msg=var_dump($data);
		//$this->invoice_model->recalc($faktur);
		 
		if ($ok){
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
    }        
    function delete_item($id=0){
    	if($id==0)$id=$this->input->post('line_number');
        $this->load->model('invoice_lineitems_model');
        if($this->invoice_lineitems_model->delete($id)) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
    }        
	function view($id,$message=null){
		 $data['id']=$id;
		 $model=$this->invoice_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
         $data['message']=$message;
         $data['customer_list']=$this->customer_model->select_list();  
         $data['customer_info']=$this->customer_model->info($data['sold_to_customer']);
		 $data['salesman_list']=$this->salesman_model->select_list();
		 $this->invoice_model->recalc($id);
		 $data['payment_amount']=$this->invoice_model->amount_paid;
		 $data['retur_amount']=$this->invoice_model->retur_amount;
		 $data['crdb_amount']=$this->invoice_model->crdb_amount;
		 $data['saldo']=$this->invoice_model->saldo;
		 $data['amount']=$model->amount;
		 $data['subtotal']=$model->subtotal;
		 $data['discount']=$model->discount;
		 $data['sales_tax_percent']=$model->sales_tax_percent;
		 
		$data['salesman_list']=$this->salesman_model->select_list();
        $data['payment_terms_list']=$this->type_of_payment_model->select_list();
			
         $menu='sales/menu_invoice';
		 $this->session->set_userdata('_right_menu',$menu);
         $this->session->set_userdata('invoice_number',$id);
         $this->template->display('sales/invoice',$data);                 
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('invoice_number','Nomor Faktur', 'required|trim');
		 $this->form_validation->set_rules('invoice_date','Tanggal','callback_valid_date');
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
	function search()
	{
		$this->browse();
		
	}
	
    function browse($offset=0,$limit=50,$order_column='sales_order_number',$order_type='asc'){
		$data['controller']=$this->controller;
		$data['fields_caption']=array('Nomor Faktur','Tanggal','Jumlah','Kode Cust','Nama Customer',
			'Salesman','Kota','Gudang');
		$data['fields']=array('invoice_number','invoice_date','amount', 
            'sold_to_customer','company','salesman','city','warehouse_code');
		$data['field_key']='invoice_number';
		$data['caption']='DAFTAR FAKTUR PENJUALAN';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor Faktur","sid_number");
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
	function delete($id){
	 	$this->invoice_model->delete($id);
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
		header("location: ".base_url()."index.php/invoice/view/".$data['invoice_number']);
    }
	function view_detail($nomor){
        $sql="select p.item_number,i.description,p.quantity 
        ,p.unit,p.price,p.amount,p.line_number
        from invoice_lineitems p
        left join inventory i on i.item_number=p.item_number
        where invoice_number='$nomor'";
        $table=browse_simple($sql);
		$btn=link_button("Addnew", "addnew_item()","edit");
		$btn.=link_button("Remove", "remove_item()","remove");
		$btn.=link_button("Refresh", "refresh_items()","ok");
		$scr="
			<script src=\"".base_url()."js/jquery/jquery-1.8.0.min.js\"></script>
			<script src=\"".base_url()."js/jquery-ui/jquery.easyui.min.js\"></script>
		";
		echo $btn.$table;
		
   }
    function print_faktur($nomor){
    	
        $this->load->helper('mylib');
		$this->load->helper('pdf_helper');			
        $this->load->model('customer_model');
        $invoice=$this->invoice_model->get_by_id($nomor)->row();
		if(!$invoice){
			echo "<h1>Nomor faktur tidak ditemukan.!</h1>";
			return false;
		}
		$saldo=$this->invoice_model->recalc($nomor);
		
		$sum_info='Jumlah Faktur: Rp. '.  number_format($invoice->amount)
        .'<br/>Jumlah Bayar : Rp. '.  number_format($this->invoice_model->amount_paid)
        .'<br/>Jumlah Sisa  : Rp. '.  number_format($saldo);
		
        $caption='';
		$sql="select item_number,description,quantity,unit,price,amount 
			from invoice_lineitems where invoice_number='$nomor'";
        $caption='';$class='';$field_key='';$offset='0';$limit=100;
        $order_column='';$order_type='asc';
        $item=browse_select($sql, $caption, $class, $field_key, $offset, $limit, 
                    $order_column, $order_type,false);
        $data['supplier_info']=$this->customer_model->info($invoice->sold_to_customer);
		$data['header']=company_header();
		$data['caption']='';
		$data['content']='
			<table cellspacing="0" cellpadding="1" border="1" style="width:100%"> 
			    <tr><td colspan="2"><h1>FAKTUR PENJUALAN</H1></td></tr>
			    <tr><td width="90">Nomor</td><td width="310">'.$invoice->invoice_number.'</td></tr>
			     <tr><td>Tanggal</td><td>'.$invoice->invoice_date.'</td></tr>
			     <tr><td>Customer</td><td>'.$this->customer_model->info($invoice->sold_to_customer).'</td></tr>
			     <tr><td>Salesman</td><td>'.$invoice->salesman.'</td></tr>
			     <tr><td colspan="2">'.$item.'</td></tr>
			     
			     <tr><td colspan="2">'.$sum_info.'</td></tr>
			</table>';	        
		$this->load->view('simple_print',$data);
    }
	function select_list(){
		
		$q=$this->input->get('q');
		$cst=$this->input->get('cust');
		if($q){
			if($q=='not_paid'){				
				$sql="select invoice_number,invoice_date,due_date,amount,payment_terms
				from invoice 
				where invoice_type='I' and (paid=false or isnull(paid))
				and sold_to_customer='$cst'";
				$query=$this->db->query($sql);
				$i=0;
				$this->load->model('invoice_model');
				$data='';
				foreach($query->result() as $row){
					$saldo=$this->invoice_model->recalc($row->invoice_number);
					$data[$i][]=$row->invoice_number;
					$data[$i][]=$row->invoice_date;
					$data[$i][]=$row->due_date;
					$data[$i][]=$row->payment_terms;
					$data[$i][]=$row->amount;
					$data[$i][]=$saldo;
					$data[$i][]=form_input('bayar[]');
					$data[$i][]=form_hidden('faktur[]',$row->invoice_number);
					$i++;
				}
				
				$this->load->library('browse');
				$header=array('Faktur','Tanggal','Jth Tempo','Termin','Jumlah','Saldo','Bayar');
				$this->browse->set_header($header);
				$this->browse->data($data);
//				$this->browse->add_row(array($row->invoice_number,
//					$row->invoice_date,$row->due_date,$row->payment_terms));
				echo $this->browse->refresh();
			}
		}
	}
	function payment($cmd,$faktur){
		//echo "cmd=".$cmd." faktur=".$faktur;
		if($cmd=="list"){
	        $sql="select p.no_bukti,p.date_paid,p.how_paid,p.amount_paid 
	        from payments p
	        where p.invoice_number='$faktur'";
	        $table=browse_simple($sql,'Daftar Pembayaran',600,600,'dgPay'); 
			$btn=link_button("Addnew", "addnew_payment()","edit");
			$btn.=link_button("Remove", "remove_payment()","remove");
			$btn.=link_button("Refresh", "refresh_payment()","ok");
			$scr="
				<script src=\"".base_url()."js/jquery/jquery-1.8.0.min.js\"></script>
				<script src=\"".base_url()."js/jquery-ui/jquery.easyui.min.js\"></script>
			";
			echo $btn.$table;
		}
			
	}
	function retur($cmd,$faktur){
		if($cmd=="list"){
	        $sql="select i.invoice_number as no_retur,i.invoice_date as tanggal,il.item_number,il.description,
	        il.quantity,il.unit,il.line_number
	        from invoice i left join invoice_lineitems il on il.invoice_number=i.invoice_number
	        where i.invoice_type='R' and i.sales_order_number='$faktur'";
	        $table=browse_simple($sql,'Daftar Retur',600,600,'dgRetur'); 
			$btn=link_button("Addnew", "addnew_retur()","edit");
			$btn.=link_button("Remove", "remove_retur()","remove");
			$btn.=link_button("Refresh", "refresh_retur()","ok");
			$scr="
				<script src=\"".base_url()."js/jquery/jquery-1.8.0.min.js\"></script>
				<script src=\"".base_url()."js/jquery-ui/jquery.easyui.min.js\"></script>
			";
			echo $btn.$table;
		}
	}
	function crdb($cmd,$faktur){
		if($cmd=="list"){
	        $sql="select c.kodecrdb,c.tanggal,c.transtype,c.amount,c.keterangan
	        from crdb_memo c
	        where c.docnumber='$faktur'";
	        $table=browse_simple($sql,'Daftar Cr Dr Memo',600,600,'dgCrDb'); 
			$btn=link_button("Addnew", "addnew_crdb()","edit");
			$btn.=link_button("Remove", "remove_crdb()","remove");
			$btn.=link_button("Refresh", "refresh_crdb()","ok");
			$scr="
				<script src=\"".base_url()."js/jquery/jquery-1.8.0.min.js\"></script>
				<script src=\"".base_url()."js/jquery-ui/jquery.easyui.min.js\"></script>
			";
			echo $btn.$table;
		}
	}
	function jurnal($cmd,$faktur){
		echo "cmd=".$cmd." faktur=".$faktur;	
	}
	function summary($faktur){
		//echo "cmd=".$cmd." faktur=".$faktur;	
		$this->load->model('invoice_model');
		$this->invoice_model->recalc($faktur);
		echo "<table><tr><td>Invoice Amount: </td><td>".number_format($this->invoice_model->amount)."</td></tr>"
			."<tr><td>Payment Amount: </td><td>".number_format($this->invoice_model->amount_paid)."</td></tr>"
			."<tr><td>Retur Amount: </td><td>".number_format($this->invoice_model->retur_amount)."</td></tr>"
			."<tr><td>CrDb Amount: </td><td>".number_format($this->invoice_model->crdb_amount)."</td></tr>"
			."<tr><td>Balance Amount: </td><td>".number_format($this->invoice_model->saldo)."</td></tr></table>"; 
	}
	function grafik_penjualam(){
		$phpgraph = $this->load->library('PhpGraph');		
		$cfg['width'] = 300;
		$cfg['height'] = 200;
		$cfg['compare'] = false;
		$cfg['disable-values']=1;
		$chart_type='vertical-line-graph';
		$data=$this->trend_penjualan();
		$file="tmp/".$chart_type.".png";
		$this->phpgraph->create_graph($cfg, $data,$chart_type,'Trend Penjualan',$file);
		echo '<img src="'.base_url().'/'.$file.'"/>';
		echo '*Display only this year';
	}
	function trend_penjualan()
	{
		$sql="select DATE_FORMAT(`invoice_date`,'%Y-%m') as prd,
		sum(p.amount) as sum_amount 
		from invoice p
		where invoice_type='I' and year(p.invoice_date)=".date('Y')."
		group by DATE_FORMAT(`invoice_date`,'%Y-%m')
		order by p.invoice_date asc
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
		return $data;
	}
	function daftar_saldo_faktur()
	{
		$this->load->model('invoice_model');
		$sql="select p.invoice_number as faktur, p.invoice_date as tanggal,
		s.company,p.payment_terms,p.amount,0 as payment,0 as retur,0 as crdb,0 as saldo
		from invoice p
		left join customers s on s.customer_number=p.sold_to_customer
		where invoice_type='I' and year(p.invoice_date)=".date('Y')."
		order by p.invoice_date asc";
		
		$query=$this->db->query($sql);
		$flds=$query->list_fields();
		$i=0;
		$data[0]=0;
		foreach($query->result_array() as $row){
		    $faktur=$row['faktur'];
			$amount=$row['amount'];
			if($amount==null)$amount=0;
			$saldo=$this->invoice_model->recalc($faktur);
			$data[$i]=$row;
			$data[$i]['amount']=$this->invoice_model->amount;
			$data[$i]['payment']=$this->invoice_model->amount_paid;
			$data[$i]['retur']=$this->invoice_model->retur_amount;
			$data[$i]['crdb']=$this->invoice_model->crdb_amount;
			$data[$i]['saldo']=$saldo;
			$i++;
		}
		 
		echo browse_data($data,$flds);
	}
	function items($nomor,$type='')
	{
            $sql="select p.item_number,i.description,p.quantity 
            ,p.unit,p.price,p.discount,p.amount,p.line_number
            from invoice_lineitems p
            left join inventory i on i.item_number=p.item_number
            where invoice_number='$nomor'";
			 
			echo datasource($sql);
	}
	function recalc($nomor=''){
		if($nomor!=''){
			if(($_GET['discount'])){
				$sql="update invoice set discount=".$_GET['discount'].",sales_tax_percent=".$_GET['tax']
				.",freight=".$_GET['freight'].",other=".$_GET['others']." where invoice_number='$nomor'";
				$rs=mysql_query($sql);
			}
			$saldo=$this->invoice_model->recalc($nomor);
			$sub_total=$this->invoice_model->sub_total;
			$data=array('sub_total'=>$sub_total,'amount'=>$this->invoice_model->amount,
			"retur"=>$this->invoice_model->retur_amount,"crdb"=>$this->invoice_model->crdb_amount,
			"payment"=>$this->invoice_model->amount_paid,"saldo"=>$this->invoice_model->saldo);
			echo json_encode($data);				
			
		}
	}
	function customer($cust){
		$sql="select invoice_number,invoice_date,salesman,payment_terms,amount
		from invoice where invoice_type='I' and sold_to_customer='$cust'";
		echo datasource($sql);
	}
	function select($customer=''){
		$s="select invoice_number,invoice_date,payment_terms from invoice 
		where invoice_type='I'";
		if($customer!="")$s.=" and sold_to_customer='".$customer."'";
	 
		echo datasource($s);
	}
		
}	
	
	
	