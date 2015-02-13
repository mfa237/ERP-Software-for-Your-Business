<?php
class Invoice_header_model extends CI_Model {

	private $primary_key='invoice_number';
	private $table_name='ls_invoice_header';

	function __construct(){
		parent::__construct();
	}
	function get_paged_list($limit=10,$offset=0,$order_column='',$order_type='asc')	{
		$nama='';
		if(isset($_GET['cust_deal_id']))$nama=$_GET['cust_deal_id'];
		if($nama!='')$this->db->where("cust_deal_id like '%$nama%'");

		if (empty($order_column)||empty($order_type))
			$this->db->order_by($this->primary_key,'asc');
		else
			$this->db->order_by($order_column,$order_type);
			
		return $this->db->get($this->table_name,$limit,$offset);
	}
	function count_all(){
		return $this->db->count_all($this->table_name);
	}
	function get_by_id($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
	function save($data){
		$data['invoice_date']=date('Y-m-d H:i:s', strtotime($data['invoice_date']));
		$ok=$this->db->insert($this->table_name,$data);            
		return $ok;
	}
	function update($id,$data){
		if(isset($data['invoice_date'])){
			$data['invoice_date']=date('Y-m-d H:i:s', strtotime($data['invoice_date']));
		}
		$this->db->where($this->primary_key,$id);
		return  $this->db->update($this->table_name,$data);
	}
	function delete($id){
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
	}
	function list_not_paid_today(){
		$s="select c.cust_id,cust_name,i.invoice_number, i.invoice_date, 
		i.idx_month,i.amount,i.paid,i.voucher,i.amount_paid,i.payment_method,i.date_paid,
		i.hari_telat,i.loan_id,i.app_id,i.visit_count
		from ls_invoice_header i left join ls_cust_master c on c.cust_id=i.cust_deal_id 
		where paid=0 and year(i.invoice_date)<=".date("Y")." and month(i.invoice_date)<=".date("m");
		$s.=" and i.hari_telat>0";
		$day=getvar("hari_telat",14);
		if(user_job_exist("SA")){
			$s.=" and i.hari_telat<=".$day;
		} else if(user_job_exist("COL")){
			$s.=" and i.hari_telat>".$day;
		};
		return $this->db->query($s);
	}
function posting($invoice_number) {
		$this->load->model("periode_model");
		$gl_id=$invoice_number;
		$this->load->model('jurnal_model');
		if($this->jurnal_model->exist_gl_id($gl_id)){
			echo "ERR_EXIST_GLID";
			return false;
		}
		if($q=$this->get_by_id($invoice_number)) {
			if($rec=$q->row()) {
				if($this->periode_model->closed($rec->invoice_date)){
					echo "ERR_PERIOD";
					return false;
				}
				$this->load->model('chart_of_accounts_model');
				$this->load->model('company_model');
				$this->load->model('bank_accounts_model');
				$default_account_hutang=$this->company_model->setting('accounts_payable');
				
				$date=$rec->invoice_date;
				$operation="Angsuran";
				$custsuppbank=$rec->cust_deal_id;				
 				//-- rekening kas untuk dp_amount
				$debit=$rec->amount+$rec->denda; $credit=0;
				$coa_kas=0;
				if($q=$this->bank_accounts_model->get_by_id("KAS")){
					if($q2=$q->row())$coa_kas=$q2->account_id;
				}
				$this->jurnal_model->add_jurnal($gl_id,$coa_kas,$date,
					$debit,$credit,$operation,"angsuran",'',$custsuppbank);
				//-- piutang usaha = sub total barang - dp
				$debit=0;$credit=$rec->pokok;
				$source="piutang usaha";
				$coa_piutang=$this->company_model->setting('accounts_receivable');			
				$this->jurnal_model->add_jurnal($gl_id,$coa_piutang,$date,
					$debit,$credit,$operation,$source,'',$custsuppbank);
				//-- jurnal bunga
				$debit=0;$credit=$rec->bunga;
				$source="pendapatan bunga";
				$coa_dapat_bunga=getvar('COA Pendapatan Bunga');			
				$this->jurnal_model->add_jurnal($gl_id,$coa_dapat_bunga,$date,
					$debit,$credit,$operation,$source,'',$custsuppbank);
				//-- jurnal denda
				if($rec->denda > 0){
					$debit=0;$credit=$rec->denda;
					$source="pendapatan denda";
					$coa_dapat_denda=getvar('COA Pendapatan denda');			
					$this->jurnal_model->add_jurnal($gl_id,$coa_dapat_denda,$date,
					$debit,$credit,$operation,$source,'',$custsuppbank);
				}
					
			}
		}
		// validate jurnal
		if($this->jurnal_model->validate($invoice_number,true)) {
			$data['posted']=true;	} else {$data['posted']=false;};
		
		$this->update($invoice_number,$data);
	}
	function unposting($invoice_number) {
		$rec=$this->get_by_id($invoice_number)->row();

		$this->load->model("periode_model");
		if($this->periode_model->closed($rec->invoice_date)){
			echo "ERR_PERIOD";
			return false;
		}
		// validate jurnal
		$this->load->model('jurnal_model');
		if($this->jurnal_model->del_jurnal($invoice_number)) {
			$data['posted']=false;
		} else {
			$data['posted']=true;
		}
		$this->update($invoice_number,$data);
	}	
	function recalc_balance($faktur){
		$this->load->model("leasing/loan_master_model");
		$inv_amount=0;
		$loan_id=0;
		if($q=$this->db->select("loan_id,amount")->where("invoice_number",$faktur)->get("ls_invoice_header")){
			if($invoice=$q->row()){
				$inv_amount=$invoice->amount;
				$loan_id=$invoice->loan_id;
			}
		}
		$pay=null;
		if($q=$this->db->query("select invoice_number,sum(amount_paid) as z_amount,
			sum(bunga) as z_bunga,sum(denda) as z_denda,sum(pokok) as z_pokok
			from ls_invoice_payments
			where invoice_number='$faktur'")){
				$pay=$q->row();
		}
		if($pay != NULL) {
			$data['bunga_paid']=$pay->z_bunga;
			$data['pokok_paid']=$pay->z_pokok;
			$data['amount_paid']=$pay->z_amount;
			$data['denda']=$pay->z_denda;
			$data['paid']=$pay->z_amount>=$inv_amount?1:0;
			
			$ok=$this->db->where('invoice_number',$faktur)->update("ls_invoice_header",$data);
		}
		$ok=$this->loan_master_model->recalc($loan_id);
		
		
		return $ok;	
	}
}