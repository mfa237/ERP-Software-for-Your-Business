<?php
class Loan_master_model extends CI_Model {

	private $primary_key='loan_id';
	private $table_name='ls_loan_master';

	function __construct(){
		parent::__construct();
	}
	function get_paged_list($limit=10,$offset=0,$order_column='',$order_type='asc')	{
		$nama='';
		if(isset($_GET['cust_name']))$nama=$_GET['cust_name'];
		if($nama!='')$this->db->where("cust_name like '%$nama%'");

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
		$loan_id=$data['loan_id'];
		$app_id=$data['app_id'];
		$loan_date=$data['loan_date'];
		$ok=false;
		$query=$this->db->where("loan_id",$loan_id)->get("ls_loan_master");
		if($query->num_rows()==0){	
		
			$this->load->model('leasing/app_master_model');
			$loan['loan_id']=$loan_id;
			$loan['loan_date']=$loan_date;
			$loan['app_id']=$app_id;
			$ok=$this->app_master_model->copy_to_loan($app_id, $loan);
		}
		return $ok;
	}
	function update($id,$data){
		// tidak bisa update, yg bisa hanya loan_date d update dp_amount fie
		//unset($data['loan_date']);
		if(isset($data['loan_date']))$data['loan_date']=date("Y-m-d H:i:s",strtotime($data['loan_date']));
		return $this->db->where("loan_id",$id)->update("ls_loan_master",$data);
	}
	function delete($id){
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
		$this->db->where("loan_id",$id)->delete("ls_loan_obj_items");
	}
	function proses_kredit($data){
		$data['old_loan_id']=$this->input->post("frmLoan_Proses_loan_id");
		$data['new_loan_id']=$this->input->post("loan_id_new");
		$data['loan_date']=$this->input->post("tgl_tagih");
		return proses_kredit_save($data);
	}
	function proses_kredit_save($data){
		//param $data['old_loan_id'], $data['new_loan_id'], $data['loan_date']
		$this->load->model("leasing/invoice_header_model");
		$ok=false;
		$old=$data['old_loan_id'];
		$data['loan_date']=date('Y-m-d H:i:s', strtotime($data['loan_date']));
		if($data['new_loan_id']==""){
			$data['new_loan_id']="01630".substr($old,-6);
		}
		$rs_loan['loan_id']=$data['new_loan_id'];
		$rs_loan['loan_date']=$data['loan_date'];
		$rs_loan['loan_date']=$data['loan_date'];
		$rs_loan['status']=1;
		
		if($query=$this->db->where("loan_id",$data['old_loan_id'])
			->update("ls_loan_master",$rs_loan)){
			$this->db->query("update ls_loan_obj_items 
				set loan_id='".$data['new_loan_id']."' 
				where loan_id='".$data['old_loan_id']."'");
			if($query=$this->db->query("select * from ls_loan_master lm
				where lm.loan_id='".$data['new_loan_id']."'")){
				if($row_loan=$query->row()){
					$qspk=$this->db->query("select * from ls_app_master  
					where app_id='".$row_loan->app_id."'");
					$spk=$qspk->row();
					$rs_invoice=null;
					// hapus dulu data invoice yg ada
					$this->db->where("loan_id",$data['new_loan_id'])
						->delete("ls_invoice_header");
						
					$tgl_tagih=date('Y-m-d H:i:s', strtotime($data['loan_date']));
					for($tenor=0;$tenor<$row_loan->max_month;$tenor++){
						$faktur=$row_loan->loan_id."-".strzero($tenor+1,2);
						
						$rs_invoice['loan_id']=$row_loan->loan_id;
						$rs_invoice['app_id']=$spk->app_id;
						$rs_invoice['idx_month']=strzero($tenor+1,2);
						$rs_invoice['invoice_number']=$faktur;
						$rs_invoice['invoice_date']=add_date($tgl_tagih,0,$tenor+1);
						$rs_invoice['invoice_type']="I";
						$rs_invoice['amount']=$spk->inst_amount;
						$rs_invoice['cust_deal_id']=$row_loan->cust_id;
						$rs_invoice['cust_deal_ship_id']=$spk->counter_id;
						$rs_invoice['gross_amount']=$spk->inst_amount;
						$rs_invoice['insr_amount']=$spk->insr_amount;
						$rs_invoice['pokok']=$spk->inst_amount-$spk->rate_amount;
						$rs_invoice['bunga']=$spk->rate_amount;
						$rs_invoice['disc_amount']=0;
						$rs_invoice['paid']=0;
						$rs_invoice['admin_amount']=0;
						$ok=$this->invoice_header_model->save($rs_invoice);
					}
					$this->db->where("app_id",$spk->app_id)->update("ls_app_master",
						array("status"=>"Finish","contract_id"=>$row_loan->loan_id));
				}
			} else {
				echo mysql_error();
			}
		}
		return $ok;
	}
	function recalc($loan_id){
		if($loan_id == NULL ) return false;
		$pay=null;
		if($q=$this->db->query("select i.idx_month,p.date_paid,p.amount_paid 
			from ls_invoice_payments p 
			left join ls_invoice_header i on i.invoice_number=p.invoice_number 
			where i.loan_id='$loan_id' order by p.date_paid desc limit 1 ")){
			$pay=$q->row();
		}
		if($pay != NULL  ){
			if( $pay->amount_paid > 0 ) {
				$loan1['last_idx_month']=$pay->idx_month;
				$loan1['last_date_paid']=$pay->date_paid;
				$loan1['last_amount_paid']=$pay->amount_paid;
				$this->update($this->primary_key,$loan1);
			}
		}
		$this->db->query("update ls_loan_master set total_amount_paid=
			(select sum(pokok_paid+bunga_paid)  as z_amt 
			from ls_invoice_header where loan_id='".$loan_id."') 
			where loan_id='".$loan_id."'");
		$loan=$this->get_by_id($loan_id)->row();
		$ar_bal_amount=$loan->loan_amount-$loan->total_amount_paid;
		$paid=$loan->ar_bal_amount < 0 ? 1 : 0;
		return $this->update($loan_id,array("ar_bal_amount"=>$loan->ar_bal_amount,"paid"=>$paid));
	}
	function calc_hari_telat($loan_id){
		$s="update ls_invoice_header
			set hari_telat=datediff(curdate(),invoice_date) 
			WHERE paid=0 
			AND loan_id = '".$loan_id."' 
			and month(invoice_date) <= ".date("m")." and year(invoice_date)<=".date("Y")."
			order by invoice_date 
			limit 10
			";
		$this->db->query($s);
		$this->db->query("update ls_invoice_header set hari_telat=0 where hari_telat<0 
		and loan_id='".$loan_id."'");
	}	
	function posting($loan_id) {
		$this->load->model("periode_model");
		$gl_id=$loan_id;
		$this->load->model('jurnal_model');
		if($this->jurnal_model->exist_gl_id($gl_id)){
			echo "ERR_EXIST_GLID";
			return false;
		}
		if($q=$this->get_by_id($loan_id)) {
			if($rec=$q->row()) {
				if($this->periode_model->closed($rec->loan_date)){
					echo "ERR_PERIOD";
					return false;
				}
				$this->load->model('chart_of_accounts_model');
				$this->load->model('company_model');
				$this->load->model('bank_accounts_model');
				$default_account_hutang=$this->company_model->setting('accounts_payable');
				$app=$this->db->where("app_id",$rec->app_id)->get("ls_app_master")->row();
				
				$gl_id=$loan_id;
				$date=$rec->loan_date;
				$debit=$rec->loan_amount;$credit=0;
				$operation="Akad Kredit";
				$source="piutang usaha";
				$custsuppbank=$rec->cust_name;				
				//-- piutang usaha = sub total barang - dp
				$coa_piutang=$this->company_model->setting('accounts_receivable');			
				$this->jurnal_model->add_jurnal($gl_id,$coa_piutang,$date,
					$debit,$credit,$operation,$source,'',$custsuppbank);
 				//-- rekening kas untuk dp_amount
				if($rec->dp_amount==null)$rec->dp_amount=$app->dp_amount;
				$debit=$rec->dp_amount; $credit=0;
				$coa_kas=0;
				if($q=$this->bank_accounts_model->get_by_id("KAS")){
					if($q2=$q->row())$coa_kas=$q2->account_id;
				}
				 
				$this->jurnal_model->add_jurnal($gl_id,$coa_kas,$date,
					$debit,$credit,$operation,"down payment",'',$custsuppbank);
				//-- persediaan barang yg dijual
				$debit=0; $credit=$rec->loan_amount+$rec->dp_amount;  
				$coa_stock=getvar('COA Persediaan Leasing');
				$this->jurnal_model->add_jurnal($gl_id,$coa_stock,$date,
					$debit,$credit,$operation,"inventory",'',$custsuppbank);
				// piutang bunga dan pendapatan bunga
				$rate_amount=$app->rate_amount*$app->inst_month;
				if($rate_amount > 0){
					$debit=$rate_amount; $credit=0;
					$coa_piutang_bunga=getvar('COA Piutang Bunga');
					$this->jurnal_model->add_jurnal($gl_id,$coa_piutang_bunga,$date,
						$debit,$credit,$operation,"piutang bunga",'',$custsuppbank);
					$debit=0; $credit=$rate_amount;
					$coa_dapat_bunga=getvar('COA Pendapatan Bunga');
					$this->jurnal_model->add_jurnal($gl_id,$coa_dapat_bunga,$date,
						$debit,$credit,$operation,"pendapatan bunga",'',$custsuppbank);
				
				}
				//--jurnal biaya administrasi
				if($app->admin_amount > 0){
					$debit=$app->admin_amount; $credit=0;
					$this->jurnal_model->add_jurnal($gl_id,$coa_kas,$date,
						$debit,$credit,$operation,"cash receive admin",'',$custsuppbank);
					$debit=0; $credit=$app->admin_amount;
					$coa_dapat_admin=getvar('COA Pendapatan Admin');
					$this->jurnal_model->add_jurnal($gl_id,$coa_dapat_admin,$date,
						$debit,$credit,$operation,"pendapatan admin",'',$custsuppbank);
					
				}
					
				
			}
		}
		// validate jurnal
		if($this->jurnal_model->validate($loan_id,true)) {
			$data['posted']=true;	} else {$data['posted']=false;};
		
		$this->update($loan_id,$data);
	}
	function unposting($loan_id) {
		$rec=$this->get_by_id($loan_id)->row();

		$this->load->model("periode_model");
		if($this->periode_model->closed($rec->loan_date)){
			echo "ERR_PERIOD";
			return false;
		}
		// validate jurnal
		$this->load->model('jurnal_model');
		if($this->jurnal_model->del_jurnal($loan_id)) {
			$data['posted']=false;
		} else {
			$data['posted']=true;
		}
		$this->update($loan_id,$data);
		
	}
	function new_contract_list($with_date_aggr=false){
		if($with_date_aggr){
				$wh_date_aggr=" and (year(llm.loan_date_aggr)>2014
					or llm.loan_date_aggr is not null)"; 
		} else {
				$wh_date_aggr=" and (year(llm.loan_date_aggr)<2014 
					or llm.loan_date_aggr is null)";
		}
		$sql="select distinct lam.app_id,lam.app_date,lam.cust_id,c.cust_name,cn.area
			,las.survey_by,lam.status,llm.loan_id,lam.create_by,llm.loan_date_aggr 
			from ls_app_master lam 
			left join ls_cust_master c on c.cust_id=lam.cust_id
			left join ls_counter cn on cn.counter_id=lam.counter_id
			left join ls_app_survey las on las.app_id=lam.app_id
			left join ls_loan_master llm on llm.app_id=lam.app_id 
			where lam.approved=1   and lam.status='Wait Contract' $wh_date_aggr";
		return $this->db->query($sql);
	}
	function save_schedule($data){
		$tanggal=$data['loan_date'];
		$loan_id=$data['loan_id'];
		$ok=true;
		for($i=0;$i<count($loan_id);$i++){
			
			$ok=$this->db->where("loan_id",$loan_id[$i])->update("ls_loan_master", 
				array("loan_date_aggr"=>date("Y-m-d 00:00:00",strtotime($tanggal[$i]))));
			//ngasih inbox ke admls sudah dibuat jadwal antara sa dan debitur
			$from=user_id();
			$to_user='admls';
			$loan=null; $cust_name="Unknown";
			if($q=$this->db->select("cust_id")->where("loan_id",$loan_id[$i])
				->get("ls_loan_master")) {
				if($q->row())	$loan=$q->row();
			}
			if($loan){
				$cust=$this->db->select("cust_name")->where("cust_id",$loan->cust_id)
				->get("ls_cust_master")->row();
				$cust_name=$cust->cust_name;
			}
			$subject=$loan_id[$i]." - Sudah dibuatkan schedule 
				tanggal ".$tanggal[$i].", Debitur: $cust_name";
			$message=$subject;
			inbox_send($from,$to_user,$subject,$message);
			
		}
		return $ok;
	}
	function process_schedule($data){
		$tanggal=$data['loan_date'];
		$loan_id=$data['loan_id'];
		$ok=true;
		for($i=0;$i<count($loan_id);$i++){
			$dt['old_loan_id']=$loan_id[$i];
			$dt['new_loan_id']="";
			$dt['loan_date']=$tanggal[$i];
			$this->proses_kredit_save($dt);
		}
		return $ok;
		
	}
}
?>