<?php if(!defined('BASEPATH')) exit('No direct script access allowd');
class Sales_order extends CI_Controller {
    private $limit=10;
    private $sql="select i.sales_order_number,i.sales_date,i.due_date,i.amount, 
            i.sold_to_customer,c.company,i.salesman,c.city,i.warehouse_code
            from sales_order i
            left join customers c on c.customer_number=i.sold_to_customer";
    private $controller='sales_order';
    private $primary_key='sales_order_number';
    private $file_view='sales/sales_order';
    private $table_name='sales_order';
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
        $this->load->library('sysvar');
        $this->load->library('javascript');
        $this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('sales_order_model');
		$this->load->model('customer_model');
		$this->load->model('inventory_model');
        $this->load->model('type_of_payment_model');
		$this->load->model('salesman_model');
		 
	}
	function nomor_bukti($add=false)
	{
		$key="Sales Order Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!SO~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!SO~$00001');
				$rst=$this->sales_order_model->get_by_id($no)->row();
				if($rst){
				  	$this->sysvar->autonumber_inc($key);
				} else {
					break;					
				}
			}
			return $no;
					}
	}
	
	function set_defaults($record=NULL)
	{
            $data=data_table($this->table_name,$record);
            $data['mode']='';
            $data['message']='';
            if($record==NULL)$data['sales_order_number']=$this->nomor_bukti();
			if($data['sales_date']=='')$data['sales_date']= date("Y-m-d H:i:s");
			if($data['due_date']=='')$data['due_date']= date("Y-m-d H:i:s");
							
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
			$data['sales_order_number']=$this->nomor_bukti(); 
			$this->sales_order_model->save($data);
			$this->nomor_bukti(true);
            //redirect('/sales_order/view/'.$$data['purchase_order_number'], 'refresh');
		} else {
			$data['mode']='add';
			$data['message']='';
            $data['sold_to_customer']=$this->input->post('sold_to_customer');
            $data['customer_list']=$this->customer_model->select_list();
			$data['salesman_list']=$this->salesman_model->select_list();
            $data['amount']=$this->input->post('amount');
            $data['payment_terms_list']=$this->type_of_payment_model->select_list();
			$data['mode']='add';			
			$this->template->display_form_input($this->file_view,$data,'');			
		}        
	}
	function save()
	{
		 //$data=$this->set_defaults();
		 //$this->_set_rules();
		 //if ($this->form_validation->run()=== TRUE){
///			$data['sales_order_number']=$this->input->get('sales_order_number');
			$data['sales_date']=$this->input->post('sales_date');
			$data['sold_to_customer']=$this->input->post('sold_to_customer');
			$data['salesman']=$this->input->post('salesman');
			$data['payment_terms']=$this->input->post('payment_terms');
			$data['due_date']=$this->input->post('due_date');
			$data['comments']=$this->input->post('comments');			
			$id=$this->nomor_bukti();
			$data['sales_order_number']=$id;

	        $this->session->set_userdata('sales_order_number',$id);
			 
			$ok=$this->sales_order_model->save($data);
			$this->nomor_bukti(true);
			if ($ok){
				echo json_encode(array('success'=>true,'sales_order_number'=>$id));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
		//} else {
		//		echo json_encode(array('msg'=>'Some errors occured.'));			
		//} 
	}
	function update()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $id=$this->input->post('sales_order_number');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$this->sales_order_model->update($id,$data);
            $message='Update Success';
		} else {
			$message='Error Update';
		}                
 		$this->view($id,$message);		
	}
	function view($id,$message=null){
		 $data['id']=$id;
		 $model=$this->sales_order_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
         $data['message']=$message;
         $data['customer_list']=$this->customer_model->select_list();  
         $data['customer_info']=$this->customer_model->info($data['sold_to_customer']);
		 $data['salesman_list']=$this->salesman_model->select_list();
		 $data['mode']='view';
		 $data['amount']=$model->amount;
		 $data['subtotal']=$model->subtotal;
		 $data['discount']=$model->discount;
		 $data['sales_tax_percent']=$model->sales_tax_percent;


         $menu='sales/menu_sales_order';
		 $this->session->set_userdata('_right_menu',$menu);
         $this->session->set_userdata('sales_order_number',$id);
         $data['payment_terms_list']=$this->type_of_payment_model->select_list();
		 $this->template->display_form_input($this->file_view,$data,'');			
	}
   
	function _set_rules(){	
		 $this->form_validation->set_rules('sales_order_number','Nomor Sales Order', 'required|trim');
		 $this->form_validation->set_rules('sales_date','Tanggal','callback_valid_date');
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
	function search(){$this->browse();}
    function browse($offset=0,$limit=50,$order_column='sales_order_number',$order_type='asc'){
		$data['controller']=$this->controller;
		$data['_left_menu_caption']='Search';
		$data['fields_caption']=array('Nomor SO','Tanggal','Tgl Kirim','Jumlah','Kode Cust','Nama Customer','Salesman','Kota','Gudang');
		$data['fields']=array('sales_order_number','sales_date','due_date','amount','sold_to_customer'
			,'company','salesman','city','warehouse_code');
		$data['field_key']='sales_order_number';
		$data['caption']='DAFTAR SALES ORDER';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor SO","sid_so_number");
		$faa[]=criteria("Pelanggan","sid_cust");
		$faa[]=criteria("Salesman","sid_date_salesman");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
    	$nama=$this->input->get('sid_cust');
		$no=$this->input->get('sid_so_number');
		$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
		$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));
        $sql=$this->sql." where 1=1";
		if($no!=''){
			$sql.=" and sales_order_number='".$no."'";
		} else {
			$sql.=" and sales_date between '$d1' and '$d2'";
			if($nama!='')$sql.=" and company like '$nama%'";	
		}
        $sql.=" limit $offset,$limit";
        echo datasource($sql);
    }	 
	function delete($id){
	 	$this->sales_order_model->delete($id);
        $this->browse();
	}
    function detail(){
        $data['sales_date']=$this->input->get('sales_date');
        $data['sold_to_customer']=$this->input->get('sold_to_customer');
        $data['payment_terms']=$this->input->get('payment_terms');
        $data['comments']=$this->input->get('comments');
		$data['salesman']=$this->input->get('salesman');
		$data['due_date']=$this->input->get('due_date');
		$data['sales_order_number']=$this->nomor_bukti();	// ambil nomor terbaru
        $this->sales_order_model->save($data);
        $this->nomor_bukti(true);
		header("location: ".base_url()."index.php/sales_order/view/".$data['sales_order_number']);
    }
	function view_detail($nomor){
            $sql="select p.item_number,i.description,p.quantity 
            ,p.unit,p.price,p.amount,p.line_number
            from sales_order_lineitems p
            left join inventory i on i.item_number=p.item_number
            where sales_order_number='$nomor'";
            echo browse_simple($sql);
    }
	function items($nomor,$type='')
	{
            $sql="select p.item_number,i.description,p.quantity 
            ,p.unit,p.price,p.discount,p.amount,p.line_number
            from sales_order_lineitems p
            left join inventory i on i.item_number=p.item_number
            where sales_order_number='$nomor'";

			$rs = mysql_query($sql);
			$result = array();
			while($row = mysql_fetch_object($rs)){
			    array_push($result, $row);
			}
			 
			echo json_encode($result);

//			$q=$this->db->query($sql)->result_array();
//			$s=json_encode($q);
//			$s='{"total":'.count($q).',"rows":'.$s.'}';
///			echo  $s;
		
	}
    function add_item(){
    	$nomor=$this->input->get('sales_order_number');            
        if(!$nomor){
            $data['message']='Nomor SO tidak diisi.!';
			return false;
        }
        $data['sales_order_number']=$nomor;
        
        $this->load->model('inventory_model');
        $data['item_lookup']=$this->inventory_model->item_list();
        $this->load->view('sales/sales_order_add_item',$data);
    }
    function save_item(){
        $item_no=$this->input->post('item_number');
		$so=$this->input->post('so_number');
        $data['sales_order_number']=$so;
        $data['item_number']=$item_no;
        $data['quantity']=$this->input->post('quantity');
        $data['unit']=$this->input->post('unit');
        $data['price']=$this->input->post('price');
        $data['cost']=$this->input->post('cost');
		$data['discount']=$this->input->post('discount');
		if($data['discount']=='')$data['discount']=0;
		$data['amount']=$this->input->post('amount');			
		$id=$this->input->post('line_number');
		if($id!='')$data['line_number']=$id;
        $item=$this->inventory_model->get_by_id($data['item_number'])->row();
		if($item){
            $data['description']=$item->description;
		}
		if($data['unit']=='')$data['unit']=$item->unit_of_measure;
		if($data['amount']==0){
	        $gross=($data['quantity']*$data['price']);
			$disc_amt=$gross*$data['discount'];
			$data['amount']=$gross-$disc_amt;
		}
        $this->load->model('sales_order_lineitems_model');
        
		if($id!=''){
			$ok=$this->sales_order_lineitems_model->update($id,$data);
		} else {
        	$ok=$this->sales_order_lineitems_model->save($data);
		}
		$this->sales_order_model->recalc($so);
		 
		if ($ok){
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
    }        
	function recalc($nomor){
		$this->sales_order_model->recalc($nomor);
	}
    function delete_item($id=0){
    	if($id==0)$id=$this->input->post('line_number');
        $this->load->model('sales_order_lineitems_model');
        if($this->sales_order_lineitems_model->delete($id)) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
    }        
    function print_so($nomor){
        $this->load->helper('mylib');
		$this->load->helper('pdf_helper');

        $so=$this->sales_order_model->get_by_id($nomor)->row();

		$query=$this->db->query("select item_number,description,quantity,unit,price,amount 
			from sales_order_lineitems where sales_order_number='$nomor'");

		$items='<table cellspacing="0" cellpadding="1" border="1" >
			<tr><td>Item No</td><td>Description</td><td>Qty</td><td>Unit</td><td>Price</td><td>Amount</td></tr>';
		foreach($query->result() as $row){
			$items.='<tr><td>'.$row->item_number.'</td><td>'.$row->description.'</td>
				<td>'.$row->quantity.'</td><td>'.$row->unit.'</td><td align="right">'.number_format($row->price)
				.'</td><td align="right">'.number_format($row->amount).'</td></tr>
				
			';		
		}	
		$items.='</table>';

        $this->load->model('customer_model');

        $content='<table cellspacing="0" cellpadding="0" border="0" style="width:400px"> 
			    <tr><td colspan="2" align="center"><h1>SALES ORDER</H1></td></tr>
			    <tr><td width="90">Nomor</td><td width="310">'.$so->sales_order_number.'</td></tr>
			     <tr><td>Tanggal</td><td>'.$so->sales_date.'</td></tr>
			     <tr><td>Customer</td><td>'.$this->customer_model->info($so->sold_to_customer).'</td></tr>
			     <tr><td>Salesman</td><td>'.$so->salesman.'</td></tr>
			     <tr><td>Renc. Kirim</td><td>'.$so->due_date.'</td></tr>
  			     <tr><td colspan="2">'.$items.'</td></tr>
  			     <tr><td><h2>Total</h2></td><td><h2>'.number_format($so->amount).'</h2></td></tr>
		</table>
		';
		$data['header']='PT. TalagaSoft Indonesia';	
        $data['content']=$content;
        $this->load->view('pdf_print',$data);
    	}
        function list_open_so($customer)
        {
            $sql="select p.sales_order_number,p.sales_date,p.due_date,p.payment_terms,p.salesman 
            from sales_order  p
            where p.sold_to_customer='$customer'";
            echo browse_simple($sql,'',500,300,'dgSoList');

        }
		function select_so_open($search=''){
			$search=urldecode($search);
			$sql="select sales_order_number,sales_date,sold_to_customer,company
			 from sales_order so left join customers c on c.customer_number=so.sold_to_customer
			 where sold_to_customer like '$search%'";
			 $sql.=" limit 100";
			 
			  
			$rs = mysql_query($sql); $result = array();
			while($row = mysql_fetch_object($rs)){array_push($result, $row);}			 
			echo json_encode($result);
		}

        function list_item_delivery($nomor){
            $this->load->model('sales_order_lineitems_model');
			$query=$this->db->query("select * from sales_order_lineitems where sales_order_number='$nomor'");
			$table="<table class='table1' style='width:500px'>
			<thead><tr><th>Item Number</th>
				<th>Description</th>
				<th>Qty Order</th>
				<th>Unit</th>
				<th>Qty Kirim</th>
			</tr></thead>";
			
			$table.="
			<tbody>";
			foreach($query->result() as $row){
				$table.="<tr><td>".$row->item_number."</td><td>".$row->description."</td><td>"
				.$row->quantity."</td><td>".$row->unit."</td>
				<td><input type='text' name='qty_order[]' style='width:50px' value='0'</td>
				<input type='hidden' name='line_number[]' value='".$row->line_number."'>
				</tr>";
			}
			$table.="</tbody>
			</table>";
			echo $table;			 

        }
        function view_delivery($sales_order_number)
        {             
            $this->load->model('invoice_model');
            $sql="select distinct invoice_number as nomor_surat_jalan,
                invoice_date as tanggal,sales_order_number,warehouse_code 
                from invoice
                where invoice_type='D' 
                and sales_order_number='$sales_order_number'";
            $data['list_delivery']=browse_simple($sql, 
                    "Daftar Pengiriman atas nomor sales order [".$sales_order_number."]"
                    , 400, 0, "dgItem", "cmdButtons");
            $sales=$this->sales_order_model->get_by_id($sales_order_number)->row();
            $data['sold_to_customer']=$sales->sold_to_customer;
            $data['customer_info']=$this->customer_model->info($sales->sold_to_customer);
            $data['sales_order_number']=$sales_order_number;
            $this->template->display('sales/list_delivery',$data);            
        }
		function sub_total($nomor){
			if(($_GET['discount'])){
				$sql="update sales_order set discount=".$_GET['discount'].",sales_tax_percent=".$_GET['tax']
				.",freight=".$_GET['freight'].",other=".$_GET['others']." where sales_order_number='$nomor'";
				$rs=mysql_query($sql);
			}
			$saldo=$this->sales_order_model->recalc($nomor);
			$sub_total=$this->sales_order_model->sub_total;
			$data=array('sub_total'=>$sub_total,'amount'=>$this->sales_order_model->amount);
			echo json_encode($data);				
		}
	function find($sales_order_number=''){
		$query=$this->db->query("select s.sales_order_number,s.sales_date,s.sold_to_customer,
		c.company from sales_order s left join customers c on s.sold_to_customer=c.customer_number");
		echo json_encode($query->row_array());
 	}
				
		
		
}