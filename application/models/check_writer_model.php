<?php
class Check_writer_model extends CI_Model {

private $primary_key='voucher';
private $table_name='check_writer';

function __construct(){
	parent::__construct();
}
	function get_paged_list($limit=10,$offset=0,
	$order_column='',$order_type='asc')
	{
                $nama='';
                if(isset($_GET['nama'])){
                    $nama=$_GET['nama'];
                }
                if($nama!='')$this->db->where("voucher like '%$nama%'");

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
		if(isset($data['check_date']))$data['check_date']= date('Y-m-d H:i:s', strtotime($data['check_date'])); 
		if(isset($data['cleared_date']))$data['cleared_date']= date('Y-m-d H:i:s', strtotime($data['cleared_date'])); 
		$this->db->insert($this->table_name,$data);
		return $this->db->insert_id();
		echo mysql_error();
	}
	function update($id,$data){
		 
		if(isset($data['check_date']))$data['check_date']= date('Y-m-d H:i:s', strtotime($data['check_date'])); 
		if(isset($data['cleared_date']))$data['cleared_date']= date('Y-m-d H:i:s', strtotime($data['cleared_date'])); 
		$this->db->where($this->primary_key,$id);
		$this->db->update($this->table_name,$data);
		echo mysql_error();
	}
	function delete($id){

		$this->load->model('jurnal_model');
		$rec=$this->get_by_id($id)->row();
		if($rec->posted) {
			return "Tidak bisa dihapus karena sudah dijurnal !";
		}

		$this->load->model("periode_model");
		if($this->periode_model->closed($rec->check_date)){
			return "Tidak bisa dihapus karena periode sudah close !";
		}

		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
		
	}
	function recalc($voucher,$type='payment_amount') {
		$sql="update check_writer 
			left join (select trans_id,sum(amount) as z_amount 
					from check_writer_items 
					group by trans_id) i on i.trans_id=check_writer.trans_id
			set $type=z_amount 
			where voucher='$voucher'";
		$q=$this->db->query($sql);
	}
	function posting($voucher) {
		$this->load->model("periode_model");
		$gl_id=$voucher;
		$this->load->model('jurnal_model');
		if($q=$this->get_by_id($voucher)) {
			if($rec=$q->row()) {
				$this->load->model('chart_of_accounts_model');
				$this->load->model('bank_accounts_model');
				$how_paid = strtolower($rec->trans_type); 
				if(strpos($how_paid,' in')) {
						$this->recalc($voucher,'deposit_amount');
						$debit=$rec->deposit_amount;
						$credit=0;
				} else if(strpos($how_paid,' trx')) {
						$debit=0;
						$credit=$rec->deposit_amount;
				} else {
						$this->recalc($voucher,'payment_amount');
						$credit=$rec->payment_amount;
						$debit=0;
				}
				$account_id=$this->bank_accounts_model->get_by_id($rec->account_number)->row()->account_id;
				echo mysql_error();
				
				if($account_id=="0" or $account_id==""){
					echo "Nomor Rekening ".$rec->account_number.' belum ada link ke perkiraan.';
				}
				if($this->periode_model->closed($rec->check_date)){
					echo "ERR_PERIOD";
					return false;
				}
				$operation=$rec->trans_type." Posting"; $source=$rec->memo;
				$custsuppbank=$rec->account_number;
				$date=$rec->check_date;
				$this->jurnal_model->add_jurnal($gl_id,$account_id,$date,$debit,$credit,$operation,$source,'',$custsuppbank);

				if(strpos($how_paid,' trx')) {
					// posting for mutasi antar rekening
					$credit=0;
					$debit=$rec->deposit_amount;
					$account_id=$this->bank_accounts_model->get_by_id($rec->supplier_number)->row()->account_id;
					echo mysql_error();
					$custsuppbank=$rec->supplier_number;
					$this->jurnal_model->add_jurnal($gl_id,$account_id,$date,$debit,$credit,$operation,$source,'',$custsuppbank);
				} else {
					// posting checkwriter items
					$this->load->model('check_writer_items_model');
					$this->load->model('company_model');
					$default_account_hutang=$this->company_model->setting('accounts_payable');
					$default_account_piutang=$this->company_model->setting('accounts_receivable');
					
					if($qi=$this->check_writer_items_model->get_by_trans_id($rec->trans_id)) {
						foreach($qi->result() as $cwi) {
							$operation=$rec->trans_type." Posting"; $source=$cwi->invoice_number;
							$debit=$cwi->amount; $credit=0;
							$default_account=$default_account_hutang;
							switch ($how_paid) {
								case 'trans in':
								case 'cash in':
								case 'cheque in':
									$debit=0;
									$credit=$cwi->amount;
									$default_account=$default_account_piutang;
									break;
							}
							$account_id=$cwi->account_id;
							if($account_id=="" or $account_id=="0") {
								$account_id=$default_account;
								$this->db->query("update check_writer_items set account_id='".$account_id."' 
									where line_number='".$cwi->line_number."'");
							}
							if($account_id!=""){
								$this->jurnal_model->add_jurnal($gl_id,$account_id,$date,$debit,$credit
									,$operation,$source,'',$custsuppbank);
							}
						}
					}
				}
			}
		}
		// validate jurnal
		if($this->jurnal_model->validate($voucher)) {$data['posted']=true;	} else {$data['posted']=false;};
		$this->update($voucher,$data);
	}
	function unposting($voucher) {
		$rec=$this->get_by_id($voucher)->row();

		$this->load->model("periode_model");
		if($this->periode_model->closed($rec->check_date)){
			echo "ERR_PERIOD";
			return false;
		}
		// validate jurnal
		$this->load->model('jurnal_model');
		if($this->jurnal_model->del_jurnal($voucher)) {
			$data['posted']=false;
		} else {
			$data['posted']=true;
		}
		$this->update($voucher,$data);
		
	}

}
