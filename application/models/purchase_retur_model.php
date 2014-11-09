<?php
class Purchase_retur_model extends CI_Model {

private $primary_key='purchase_order_number';
private $table_name='purchase_order';
	function __construct(){
		parent::__construct();
		$this->load->model('purchase_order_model');
	}
	
	function posting($nomor)	{
		$this->purchase_order_model->recalc($nomor);
		$faktur=$this->purchase_order_model->get_by_id($nomor)->row();

		$this->load->model("periode_model");
		if($this->periode_model->closed($faktur->po_date)){
			echo "ERR_PERIOD";
			return false;
		}
		$this->load->model('purchase_order_lineitems_model');
		$this->load->model('jurnal_model');
		$this->load->model('chart_of_accounts_model');
		$this->load->model('company_model');
		$this->load->model('supplier_model');
		$this->load->model('inventory_model');
			
		$date=$faktur->po_date;
		$supplier=$this->supplier_model->get_by_id($faktur->supplier_number)->row();
		$akun_hutang=$faktur->account_id;
		$gl_id=$nomor;
		$debit=0; $credit=0;$operation="";$source="";
		// posting hutang / ap
		if($akun_hutang=="" or $akun_hutang=="0")$akun_hutang=$supplier->supplier_account_number;
		if($akun_hutang==""  or $akun_hutang=="0")$akun_hutang=$this->company_model->setting("accounts_payable");
		if($akun_hutang=="0"){
			echo "Akun Hutang: ".$akun_hutang;
		}
		$account_id=$akun_hutang; $debit=$faktur->amount; $credit=0;
		$operation="AP Posting"; $source=$faktur->comments;
		$this->jurnal_model->add_jurnal($gl_id,$account_id,$date,$debit,$credit,$operation,$source);
		
		// posting tax amount
		$tax_amount=$faktur->tax_amount;
		if($tax_amount>0){
			$akun_ppn=$this->company_model->setting("po_tax");
			$account_id=$akun_ppn; $debit=0; $credit=$tax_amount;
			$operation="AP Tax Posting"; $source=$faktur->comments;
			$this->jurnal_model->add_jurnal($gl_id,$account_id,$date,$debit,$credit,$operation,$source);
		}
			
		// posting persediaan
		$items=$this->purchase_order_lineitems_model->get_by_nomor($nomor);
		foreach($items->result() as $row) {
			$item=$this->inventory_model->get_by_id($row->item_number)->row();
			
			$account_id=$item->inventory_account; 
			if(!$account_id)$account_id=$this->company_model->setting('inventory');
			
			$debit=0; $credit=$row->total_price;
			$operation="Inventory Posting"; $source=$row->description;
			$custsuppbank=$row->item_number;
			$this->jurnal_model->add_jurnal($gl_id,$account_id,$date,$debit,$credit,$operation,$source,'',$custsuppbank);
			
		}
		
		// validate jurnal
		if($this->jurnal_model->validate($nomor)) {
			$data['posted']=true;
		} else {
			$data['posted']=false;
		}
		$this->purchase_order_model->update($nomor,$data);
	}
	function unposting($nomor) {
		$this->purchase_order_model->recalc($nomor);
		$faktur=$this->purchase_order_model->get_by_id($nomor)->row();

		$this->load->model("periode_model");
		if($this->periode_model->closed($faktur->po_date)){
			echo "ERR_PERIOD";
			return false;
		}
		// validate jurnal
		$this->load->model('jurnal_model');
		if($this->jurnal_model->del_jurnal($nomor)) {
			$data['posted']=false;
		} else {
			$data['posted']=true;
		}
		$this->purchase_order_model->update($nomor,$data);
	}
	
}
