<?php
class Payment_model extends CI_Model {

	private $primary_key='id';
	private $table_name='ls_invoice_payments';

	function __construct(){
		parent::__construct();
	}
	function get_paged_list($limit=10,$offset=0,$order_column='',$order_type='asc')	{
		$nama='';
		if(isset($_GET['voucher_no']))$nama=$_GET['voucher_no'];
		if($nama!='')$this->db->where("voucher_no like '%$nama%'");

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
		$data['date_paid']=date("Y-m-d H:i:s",strtotime($data['date_paid']));
		$ok = $this->db->insert($this->table_name, $data);
		// update ls_invoice_header
		$this->load->model('invoice_header_model');
		$this->invoice_header_model->update($data['invoice_number'], 
			array("date_paid"=>$data['date_paid'],"payment_method"=>$data['how_paid'],
			"amount_paid"=>$data['amount_paid'],'voucher'=>$data['voucher_no'],
			"pokok_paid"=>$data['pokok'],"bunga_paid"=>$data['bunga']));
		return $ok;
	}
	function update($id,$data){
		if(isset($data['date_paid']))$data['date_paid']=date("Y-m-d H:i:s",strtotime($data['date_paid']));
		return $this->db->where($this->primary_key,$id)->update($this->table_name,$data);
	}
	function delete($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->delete($this->table_name);
	}
	function recalc($id){
		$this->db->query("update ls_loan_master set total_amount_paid=(
			select sum(amount_paid)  
			from ls_invoice_header where loan_id='".$loan_id."')");
		$this->db->query("update ls_loan_master set ar_bal_amount=loan_amount-total_amount_paid 
		where loan_id='".$loan_id."'");
		$this->db->query("update ls_loan_master set paid=1 where ar_bal_amount<=0 
		and loan_id='".$loan_id."'");		
	}
}
?>