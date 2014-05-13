<?php
if(!defined('BASEPATH')) exit('No direct script access allowd');

class Company extends CI_Controller {
    private $limit=10;
    private $table_name='preferences';
    private $sql="select company_code,company_name,street,city_state_zip_code,phone_number,
    	fax_number,email
                from preferences
                ";
    private $file_view='admin/company';
    private $primary_key='company_code';
    private $controller='company';

    function __construct()    {
            parent::__construct();
			if(!$this->access->is_login())redirect(base_url());
            $this->load->helper(array('url','form','mylib_helper'));
	        $this->load->library('sysvar');
            $this->load->library('template');
            $this->load->library('form_validation');
            $this->load->model('company_model');
            $this->load->model('chart_of_accounts_model');
    }
    function set_defaults($record=NULL){
            $data['mode']='';
            $data['message']='';
            $data=data_table($this->table_name,$record);
             return $data;
    }
    function index()    {	
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
                    $this->company_model->save($data);
		            $data['message']='update success';
		            $data['mode']='view';
		            $this->browse();
            } else {
                    $data['mode']='add';
                    $data['message']='';
                    $this->template->display_form_input($this->file_view,$data,'company_menu');			
            }
    }
    function update()   {

             $data=$this->set_defaults();
             $this->_set_rules();
             $id=$this->input->post('company_code');
             if ($this->form_validation->run()=== TRUE){
                    $data=$this->get_posts();
                    $this->company_model->update($id,$data);
                    $message='Update Success';
                    $this->browse();
            } else {
                    $message='Error Update';
		            $this->view($id,$message);		
            }
    }

    function view($id,$message=null)	{
             $data['id']=$id;
             $model=$this->company_model->get_by_id($id)->row();
             $data=$this->set_defaults($model);
             $data['mode']='view';
             $data['message']=$message;
            $this->template->display_form_input($this->file_view,$data,'company_menu');
    }
     // validation rules
    function _set_rules(){	
             $this->form_validation->set_rules('company_code','Kode', 'required|trim');
             $this->form_validation->set_rules('company_name','Nama', 'required');
    }

     // date_validation callback
    function valid_date($str)
    {
     if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str))
     {
             $this->form_validation->set_message('valid_date',
             'date format is not valid. yyyy-mm-dd');
             return false;
     } else {
            return true;
     }
    }
   function browse($offset=0,$limit=50,$order_column='sales_order_number',$order_type='asc'){
		$data['controller']='company';
		$data['fields_caption']=array('Kode','Nama Perusahaan','Alamat','Kota','Telp','Fax','Email');
		$data['fields']=array('company_code','company_name','street','city_state_zip_code','phone_number',
    	'fax_number','email');
		$data['field_key']='company_code';
		$data['caption']='DAFTAR KODE PERUSAHAAN';

		$this->load->library('search_criteria');
		$faa[]=criteria("Nama Perusahaan","sid_nama");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
        $sql=$this->sql.' where 1=1';
		if($this->input->get('sid_nama')!='')$sql.=" company_name like '".$this->input->get('sid_nama')."%'";
        echo datasource($sql);
    }	   
	function delete($id){
	 	$this->company_model->delete($id);
	 	$this->browse();
	}
	function find($nomor){
		$query=$this->db->query("select company_name from preferences where company_code='$nomor'");
		echo json_encode($query->row_array());
 	}
	function acc_id($account){
		$data=explode(" - ", $account);
		$coa=$this->chart_of_accounts_model->get_by_id($data[0])->row();
		if($coa){
			return $coa->id;
		} else {
			return 0;
		}
	}
	function gl_link(){
		if($this->input->post('cmdSave')){

			$data['accounts_payable']=$this->acc_id($this->input->post('accounts_payable'));
			$data['po_freight']=$this->acc_id($this->input->post('po_freight'));
			$data['po_other']=$this->acc_id($this->input->post('po_other'));
			$data['po_tax']=$this->acc_id($this->input->post('po_tax'));
			$data['po_discounts_taken']=$this->acc_id($this->input->post('po_discounts_taken'));
			$data['supplier_credit_account_number']=$this->acc_id($this->input->post('supplier_credit_account_number'));
			$data['inventory_sales']=$this->acc_id($this->input->post('inventory_sales'));
			$data['inventory']=$this->acc_id($this->input->post('inventory'));
			$data['inventory_cogs']=$this->acc_id($this->input->post('inventory_cogs'));
			$data['accounts_receivable']=$this->acc_id($this->input->post('accounts_receivable'));
			$data['so_freight']=$this->acc_id($this->input->post('so_freight'));
			$data['so_other']=$this->acc_id($this->input->post('so_other'));
			$data['so_tax']=$this->acc_id($this->input->post('so_tax'));
			$data['so_discounts_given']=$this->acc_id($this->input->post('so_discounts_given'));
			$data['customer_credit_account_number']=$this->acc_id($this->input->post('customer_credit_account_number'));
			$data['default_cash_payment_account']=$this->acc_id($this->input->post('default_cash_payment_account'));
			$data['earning_account']=$this->acc_id($this->input->post('earning_account'));
			$data['year_earning_account']=$this->acc_id($this->input->post('year_earning_account'));
			$data['historical_balance_account']=$this->acc_id($this->input->post('historical_balance_account'));
			$data['default_bank_account_number']=$this->acc_id($this->input->post('default_bank_account_number'));
			$data['default_credit_card_account']=$this->acc_id($this->input->post('default_credit_card_account'));
			
			$this->company_model->update($this->access->cid,$data);


			$this->sysvar->save('COA Uang Muka Pembelian',$this->acc_id($this->input->post('txtUangMukaBeli')));
			$this->sysvar->save('COA Retur Penjualan',$this->acc_id($this->input->post('txtReturJual')));
			$this->sysvar->save('COA Item Out Others',$this->acc_id($this->input->post('txtCoaItemOut')));
			$this->sysvar->save('COA Item In Others',$this->acc_id($this->input->post('txtCoaItemIn')));
			$this->sysvar->save('COA Item Adjustment',$this->acc_id($this->input->post('txtCoaItemAdj')));
			$this->sysvar->save('COA Uang Muka Penjualan',$this->acc_id($this->input->post('txtUangMukaJual')));
			$this->sysvar->save('CoaChargeCreditCard',$this->acc_id($this->input->post('txtChargeCC')));
			$this->sysvar->save('CoaPromo',$this->acc_id($this->input->post('txtPromo')));
			$this->sysvar->save('CoaGift',$this->acc_id($this->input->post('txtGift')));

		}	
		$set=$this->company_model->get_by_id($this->access->cid)->row();
	 
		$data['accounts_payable']=account($set->accounts_payable);
		$data['po_freight']=account($set->po_freight);
		$data['po_other']=account($set->po_other);
		$data['po_tax']=account($set->po_tax);
		$data['po_discounts_taken']=account($set->po_discounts_taken);
		$data['supplier_credit_account_number']=account($set->supplier_credit_account_number);
		$data['inventory_sales']=account($set->inventory_sales);
		$data['inventory']=account($set->inventory);
		$data['inventory_cogs']=account($set->inventory_cogs);
		$data['accounts_receivable']=account($set->accounts_receivable);
		$data['so_freight']=account($set->so_freight);
		$data['so_other']=account($set->so_other);
		$data['so_tax']=account($set->so_tax);
		$data['so_discounts_given']=account($set->so_discounts_given);
		$data['customer_credit_account_number']=account($set->customer_credit_account_number);
		$data['default_cash_payment_account']=account($set->default_cash_payment_account);
		$data['earning_account']=account($set->earning_account);
		$data['year_earning_account']=account($set->year_earning_account);
		$data['historical_balance_account']=account($set->historical_balance_account);
		$data['default_bank_account_number']=account($set->default_bank_account_number);
		$data['default_credit_card_account']=account($set->default_credit_card_account);

		$data['txtUangMukaBeli']=account($this->sysvar->getvar('COA Uang Muka Pembelian'));
		$data['txtReturJual']=account($this->sysvar->getvar('COA Retur Penjualan'));
		$data['txtCoaItemOut']=account($this->sysvar->getvar('COA Item Out Others'));
		$data['txtCoaItemIn']=account($this->sysvar->getvar('COA Item In Others'));
		$data['txtCoaItemAdj']=account($this->sysvar->getvar('COA Item Adjustment'));
		$data['txtUangMukaJual']=account($this->sysvar->getvar('COA Uang Muka Penjualan'));
		$data['txtChargeCC']=account($this->sysvar->getvar('CoaChargeCreditCard'));
		$data['txtPromo']=account($this->sysvar->getvar('CoaPromo'));
		$data['txtGift']=account($this->sysvar->getvar('CoaGift'));
		
        $this->template->display_form_input('admin/gl_link',$data);		
	   			
	}
	function purchase(){
		$data['a']='';
        $this->template->display_form_input('admin/purchase',$data);		
	}
	function sales(){
		$data['a']='';
        $this->template->display_form_input('admin/sales',$data);		
	}
	function inventory(){
		$data['a']='';
        $this->template->display_form_input('admin/inventory',$data);		
	}
	function others(){
		$data['a']='';
        $this->template->display_form_input('admin/others',$data);		
	}
	function department(){
		$data['caption']="DEPARTMENTS";		
		$this->template->display("admin/department",$data);
	}
   function department_add(){
		$this->load->model('department_model');
		$data = $this->input->post(NULL, TRUE); //getallpost			
		$ok=$this->department_model->save($data);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function department_delete($kode){
   		$kode=htmlspecialchars_decode($kode);
		$this->load->model('department_model');
		$ok=$this->department_model->delete($kode);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }

	function division(){
		$data['caption']="DIVISI";		
		$this->template->display("admin/division",$data);
	}
   function division_add(){
		$this->load->model('division_model');
		$data = $this->input->post(NULL, TRUE); //getallpost			
		$ok=$this->division_model->save($data);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
   function division_delete($kode){
   		$kode=htmlspecialchars_decode($kode);
		$this->load->model('division_model');
		$ok=$this->division_model->delete($kode);
		if ($ok){echo json_encode(array('success'=>true));} else {echo json_encode(array('msg'=>'Some errors occured.'));}   	
   }
	
}
?>
