<?php
if(!defined('BASEPATH')) exit('No direct script access allowd');

class Loan extends CI_Controller {
    private $limit=100;
    private $table_name='ls_loan_master';
    private $file_view='leasing/loan';
    private $controller='leasing/loan';
    private $primary_key='loan_id';
    private $sql="";
	private $title="DAFTAR KONTRAK KREDIT";
	private $help="";

    function __construct()    {
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library(array('sysvar','template','form_validation'));
		if($this->controller=="")$this->controller=$this->file_view;
		if($this->sql=="")$this->sql="select * from ".$this->table_name;
		if($this->help=="")$this->help=$this->table_name;
		
		$this->load->model('leasing/loan_master_model');
    }
    function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
		
		$data=data_table($this->table_name,$record);
		return $data;
    }
    function index(){
		$this->browse();
    }
    function get_posts(){
		$data=data_table_post($this->table_name);
		return $data;
    }
    function add()   {
		$data=$this->set_defaults();
		$this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
				$data=$this->get_posts();
				$this->loan_master_model->save($data);
				$data['message']='update success';
				$data['mode']='view';
				$this->browse();
		} else {
				$data['mode']='add';
				$data['message']='';
				$data['data']=$data;
				$data['title']=$this->title;
				$data['help']=$this->help;
				$data['form_controller']=$this->controller;
				$data['field_key']=$this->primary_key;
				$data['sales_name']='';
				$data['sales_id']='';
				
				$this->template->display_form_input($this->file_view,$data);			
		}
    }
	function save(){
		$data=$this->input->post();
		$id=$this->input->post("loan_id");
		$mode=$data["mode"];	unset($data['mode']);
		if($mode=="add"){ 
			
			$ok=$this->loan_master_model->save($data);
		} else {
			$app_id=$data['app_id'];
			$spk=$this->db->select('dp_amount,admin_amount')
				->where("app_id",$app_id)->get("ls_app_master")->row();
			$data['loan_id']=$id;
			if($spk){
				$data['adm_amount']=$spk->admin_amount;
				$data['dp_amount']=$spk->dp_amount;
			} else {
				$data['adm_amount']=0;
				$data['dp_amount']=0;			
			}
			unset($data['app_id']);
			$ok=$this->loan_master_model->update($id,$data);				
		}
		if($ok){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error atau loan_id sudah ada."));
		}
	}	
    function view($id,$message=null){
		$id=urldecode($id);
		$message=urldecode($message);
		$data[$this->primary_key]=$id;
		$model=$this->loan_master_model->get_by_id($id)->row();
		$data=$this->set_defaults($model);
		$data['data']=$data;
		
		$data['mode']='view';
		$data['message']=$message;
		$data['title']=$this->title;
		$data['help']=$this->help;
		$data['form_controller']=$this->controller;
		$data['sales_name']="";
		$data['sales_id']="";
		if($query=$this->db->query("select a.create_by,u.username from ls_app_master a 
			left join `user` u on a.create_by=u.user_id 
			where a.app_id='".$data['app_id']."'")){
			if($row=$query->row()){
				$data['sales_id']=$row->create_by;
				$data['sales_name']=$row->username;
			}
		}
		
		$data['field_key']=$this->primary_key;
		$this->loan_master_model->calc_hari_telat($id); 
		$this->template->display_form_input($this->file_view,$data);
    }
     // validation rules
    function _set_rules(){}
    function valid_date($str){
     if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str)){
             $this->form_validation->set_message('valid_date',
             'date format is not valid. yyyy-mm-dd');
             return false;
     } else {
            return true;
     }
    }
   function browse($offset=0,$limit=50,$order_column="",$order_type='asc'){
		if($order_column=="")$order_column=$this->primary_key;
		$data['controller']=$this->controller;
		$data['fields']=array("cust_name","loan_date","loan_id","loan_amount",
		"max_month","inst_amount","dealer_name","dealer_id","status");
		$data['fields_caption']=array("Pelanggan","Tanggal","Nomor Akad","Jumlah"
		,"Tenor","Angsuran","Counter","Counter Id","Status");
		$data['fields_format_numeric']=array("loan_amount","inst_amount");
		$data['field_key']=$this->primary_key;
		$data['caption']=$this->title;

		$this->load->library('search_criteria');
		$faa[]=criteria("Nama Pelanggan","sid_nama");
		$data['criteria']=$faa;
		$data['other_menu']="leasing/loan_menu";
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
		$s="select c.cust_name,l.loan_date,l.loan_id,l.loan_amount,l.max_month,
		l.inst_amount,l.dealer_name,l.dealer_id,l.status
		from ls_loan_master l 
		left join ls_cust_master c on c.cust_id=l.cust_id ";
        $s .= ' where 1=1';
		if($this->input->get("sid_nama"))$s .= " and c.cust_name like '%".$this->input->get("sid_nama")."%'";
        echo datasource($s);
    }	   
	function delete($id){
		$id=urldecode($id);
	 	$this->loan_master_model->delete($id);
		$this->browse();
	}
	function find($nomor){
		$nomor=urldecode($nomor);
		$query=$this->db->query("select * from $table_name where loan_id='$nomor'");
		echo json_encode($query->row_array());
 	}	
	function items($loan_id,$id=''){
		$cmd=$loan_id;
		if ($cmd=="save") {
			$this->add_item();
		} else if($cmd=="delete") {
			return $this->db->where("id",$id)->delete("ls_app_object_items");
		} else if ($cmd=="view") {
			if($row=$this->db->where("id",$id)
				->get("ls_app_object_items")->row()){
				$data=(array)$row;
				$data['success']=true;
				echo json_encode($data);
			}				
			
		} else {
			$sql="select * from ls_loan_obj_items where loan_id='".$loan_id."'";
			echo datasource($sql);
		}
	}	
	function proses(){
		$data['old_loan_id']=$this->input->post("frmLoanProses_loan_id");
		$data['new_loan_id']=$this->input->post("loan_id_new");
		$data['loan_date']=$this->input->post("tgl_tagih");
		if($this->db->where("loan_id",$data['new_loan_id'])->get("ls_loan_master")->num_rows()){
			echo json_encode(array("success"=>true,"exist"=>true));
		} else {
			$ok=$this->loan_master_model->proses_kredit($data);
			if($ok){
				echo json_encode(array("success"=>true));
			} else {
				echo json_encode(array("msg"=>"Error ".mysql_error()));
			}		
		}
	}
	function invoice($loan_id){
		echo datasource("select * from ls_invoice_header where loan_id='".$loan_id."' 
		order by invoice_date");
	}
	function list_all($search){
		$search=urldecode($search);
		$s="select c.cust_id,cust_name,i.invoice_number, i.invoice_date, 
		i.idx_month,i.amount,i.paid,i.voucher,i.amount_paid,i.payment_method,i.date_paid,i.hari_telat,
		i.bunga,i.pokok,i.bunga_paid,i.pokok_paid 
		from ls_invoice_header i left join ls_cust_master c on c.cust_id=i.cust_deal_id 
		where cust_name like '%".$search."%' 
		order by i.invoice_number";
		echo datasource($s);	
	}
	function list_not_paid($search){
		$search=urldecode($search);
		$s="select distinct loan_id from ls_invoice_header i 
		join ls_cust_master c on c.cust_id=i.cust_deal_id 
		where i.paid=0 and (c.cust_name like '%".$search."%' or i.loan_id='$search') ";
		//	and  month(invoice_date) = ".date("m")." 
		//	AND year(invoice_date) = ".date("Y");
		if($query=$this->db->query($s)){
			foreach($query->result() as $inv){
				$this->loan_master_model->calc_hari_telat($inv->loan_id); 				
			}
		}
		$s="select c.cust_id,cust_name,i.invoice_number, i.invoice_date, 
		i.idx_month,i.amount,i.paid,i.voucher,i.amount_paid,i.payment_method,i.date_paid,i.hari_telat,
		i.bunga,i.pokok,i.bunga_paid,i.pokok_paid 
		 from ls_invoice_header i left join ls_cust_master c on c.cust_id=i.cust_deal_id 
		where paid=0 and  (cust_name like '%".$search."%'  or i.loan_id='$search') 
		order by i.invoice_date 
		LIMIT 10";
		echo datasource($s);
	}
	function add_payment($faktur){
		$this->load->model("leasing/invoice_header_model");
		$this->load->model("leasing/payment_model");

		$faktur=urldecode($faktur);

		//masuk ke tabel ls_invoice_payment sekaligus update ls_invoice_header
		
		$data=array("invoice_number"=>$faktur,
			"amount_paid"=>$this->input->post('amount_paid'),
			"denda"=>$this->input->post("denda"),
			"pokok"=>$this->input->post("pokok"),
			"bunga"=>$this->input->post("bunga"));
		$data['date_paid']=$this->input->post('date_paid');
		$data['date_paid']=date("Y-m-d",strtotime($data['date_paid']));
		$data['how_paid']=$this->input->post('how_paid');
		$data['voucher_no']="P".$faktur.date("d",strtotime($data['date_paid']));
			
		$ok = $this->payment_model->save($data);
		
		$ok = $this->invoice_header_model->recalc_balance($faktur);
		if($ok){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error ".mysql_error()));
		}		
		
	
		
	}
	function tagih($invoice_no,$id){
		$invoice_no=urldecode($invoice_no);
		$data['invoice_no']=$invoice_no;
		if($this->input->post('submit')){
			$d1=$this->input->post("visit_date");
			$d1=date("Y-m-d H:i:s",strtotime($d1));	
			$data['visit_date']=$d1;
			$data['visit_notes']=$this->input->post("visit_notes");
			$data['visited']='1';
			$data['visit_ke']=$this->input->post("visit_ke");
			$this->db->where("invoice_no",$invoice_no)
					 ->where("id",$id)->update("ls_loan_col_sched",$data);
			//update ke visit_count billing
			$cnt=$this->db->query("select count(1) as cnt from ls_loan_col_sched 
				where invoice_no='".$invoice_no."'")->row()->cnt;
			$this->db->where("invoice_number",$invoice_no)->update("ls_invoice_header",
				array("visit_count"=>$cnt));
			$data['message']="Data sudah tersimpan silahkan close tab ini atau refresh.";
		} else {
			$data['message']="";
			$data['invoice_no']=$invoice_no;
			$lok=false;
			if($query=$this->db->query("select h.*,m.cust_name,m.street from ls_invoice_header h 
				left join ls_cust_master m on m.cust_id=h.cust_deal_id
				where invoice_number='$invoice_no'  and paid=0 ")){
				if($row=$query->row()){
					$data['invoice_date']=$row->invoice_date;
					$data['amount']=$row->amount;
					$data['cust_deal_id']=$row->cust_deal_id;
					$data['cust_name']=$row->cust_name;
					$data['street']=$row->street;
					$data['pokok']=$row->pokok;
					$data['bunga']=$row->bunga;
					$data['denda']=$row->denda;
					$data['idx_month']=$row->idx_month;
					$data['loan_id']=$row->loan_id;
					$data['hari_telat']=$row->hari_telat;
					$data['visit_ke']=$row->visit_count;
					$data['id']=$id;
					$lok=true;
				}
			}
			if(!$lok){
				$data['message']='Nomor faktur '.$invoice_no.' tidak ditemukan mungkin sudah bayar.';
			}
		}
		$this->template->display("leasing/kolektor_proses",$data);
	}
	function list_outstand($search_text){
		$search_text=urldecode($search_text);
		$s="select l.loan_id,l.loan_date,l.cust_id,c.cust_name,
		l.dealer_id,l.dealer_name,l.loan_amount,l.last_idx_month,
		l.last_amount_paid,l.total_amount_paid,l.ar_bal_amount
		from ls_loan_master l 
		left join ls_cust_master c on c.cust_id=l.cust_id 
		where (l.paid=0 or l.paid is null) and (l.status=1)";
		if($search_text!="")$s.=" and (l.loan_id='$search_text' 
		or c.cust_name like '%$search_text%') 
		"; 
		if($query=$this->db->query($s)){
			if($query->num_rows()){
				$t="<table class='table2'><thead><th>Loan Id</th>
				<th>Tanggal</th><th>Customer</th><th>Dealer</th>
				<th>Pinjaman Rp.</th><th>Bulan Ke</th><th>Pelunasan Rp.</th>
				<th>Saldo</th><th>Action</th></thead><tbody>";
				foreach($query->result() as $row){
					$t.="<tr><td>".$row->loan_id."</td>
					<td>".$row->loan_date."</td><td>".$row->cust_name."</td>
					<td>".$row->dealer_name."</td><td cellalgin='right'>".number_format($row->loan_amount)."</td>
					<td>".$row->last_idx_month."</td><td cellalign='right'>".number_format($row->total_amount_paid)."</td>
					<td cellalign='right'>".number_format($row->ar_bal_amount)."</td>
					<td><input style='width:100px'  type='button' class='btn btn-info' value='View'
					onclick=\"view_loan('".$row->loan_id."');return false;\" >
					<input style='width:100px' type='button' class='btn btn-warning' value='Bayar'
					onclick=\"dlgBayar_Show('".$row->loan_id."');return false;\" >					
					</tr>";
				}
				$t.="</tbody></table>";
				echo $t;
			} else {
				echo "Data tidak ditemukan !";
			}
		}
	}
	function view_summary($loan_id){
		$loan_id=urldecode($loan_id);
	}
	function unposting($loan_id) {
		$message=$this->loan_master_model->unposting($loan_id);
		$this->view($loan_id,$message);
	}
	function posting($loan_id) {
		$message=$this->loan_master_model->posting($loan_id);
		$this->view($loan_id,$message);
	}
	function tagih_view($invoice_no){
		$invoice_no=urldecode($invoice_no);
		$data['invoice_no']=$invoice_no;
		$data['message']="";
		$data['invoice_no']=$invoice_no;
		$lok=false;
		$sql="select lcs.*,h.*,m.cust_name,m.street from ls_invoice_header h 
			left join ls_cust_master m on m.cust_id=h.cust_deal_id 
			left join ls_loan_col_sched lcs on lcs.invoice_no=h.invoice_number
			where invoice_number='$invoice_no'";
		 
		if($query=$this->db->query($sql)){
			if($row=$query->row()){
				$data['invoice_date']=$row->invoice_date;
				$data['amount']=$row->amount;
				$data['cust_deal_id']=$row->cust_deal_id;
				$data['cust_name']=$row->cust_name;
				$data['street']=$row->street;
				$data['pokok']=$row->pokok;
				$data['bunga']=$row->bunga;
				$data['denda']=$row->denda;
				$data['idx_month']=$row->idx_month;
				$data['loan_id']=$row->loan_id;
				$data['hari_telat']=$row->hari_telat;
				$data['visit_ke']=$row->visit_ke;
				$data['visit_date']=$row->visit_date;
				$data['visit_notes']=$row->visit_notes;
				$data['amount_col']=$row->amount_col;
				$data['collected']=$row->collected;
				$data['promise_date']=$row->promise_date;
				$data['id']=$row->id;
				$lok=true;
			}
		}
		if(!$lok){
			$data['message']='Nomor faktur '.$invoice_no.' tidak ditemukan mungkin sudah bayar.';
		}
		
		$this->template->display("leasing/kolektor_view",$data);
	}
	
}
?>
