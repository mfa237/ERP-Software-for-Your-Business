<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Customer extends CI_Controller {
    private $limit=10;
    private $offset=0;
    private $table_name='customers';
	private $sql="select customer_number,company,street,city,phone,fax,
	    email,country,suite,active,region,customer_record_type,
	    salesman,payment_terms,finance_charge_acct
	    from customers ";

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())header("location:".base_url());
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('customer_model');
        $this->load->model('chart_of_accounts_model');
        $this->load->model('type_of_payment_model');

	}
	function set_defaults($record=NULL){
        $data=data_table("select * from customers limit 1",$record,true); 
		$data['mode']='';
		$data['message']='';
        $data['termin_list']=$this->type_of_payment_model->select_list();
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
		$data['mode']='add';
        $this->template->display_form_input('sales/customer',$data);
	}
	function save(){
		$data=$this->input->post();
		$id=$this->input->post("customer_number");
		$mode=$data["mode"];
	 	unset($data['mode']);
		$data['finance_charge_acct']=$this->acc_id($data['finance_charge_acct']);	
		if($mode=="add"){ 
			$ok=$this->customer_model->save($data);
		} else {
			$ok=$this->customer_model->update($id,$data);				
		}
		if($ok){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error ".mysql_error()));
		}
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
        
	function update()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $id=$this->input->post('customer_number');
		$data['finance_charge_acct']=$this->acc_id($data['finance_charge_acct']);	
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$this->customer_model->update($id,$data);
            $message='Success';
            $this->browse();
		} else {
            $message='Error';
     		$this->view($id,$message);		
		}
	}
	
	function view($id,$message=null){
		 $id=urldecode($id);
		 $model=$this->customer_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['id']=$id;
		 $data['mode']='view';
		 $data['message']=$message;
		 $data['finance_charge_acct']=account($data['finance_charge_acct']);
		 $this->template->display_form_input('sales/customer',$data);
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('customer_number','Customer Number', 'required|trim');
		 $this->form_validation->set_rules('company','Customer Name',	 'required');
	}
 	function search(){$this->browse();}
 	       
	function browse($offset=0,$limit=10,$order_column='company',$order_type='asc')
	{
        $data['caption']='DAFTAR MASTER PELANGGAN';
		$data['controller']='customer';		
		$data['fields_caption']=array('Kode','Nama Pelanggan','Kota','Telp','Fax','Salesman','Kelompok');
		$data['fields']=array('customer_number','company','city','phone','fax','salesman','customer_record_type');
		$data['field_key']='customer_number';
		$this->load->library('search_criteria');
		
		$faa[]=criteria("Nama","sid_cust");
		$faa[]=criteria("Salesman","sid_sales");
		$faa[]=criteria("Kota","sid_city");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
		$sql=$this->sql." where 1=1";
		if($this->input->get('sid_cust')!='')$sql.=" and company like '".$this->input->get('sid_cust')."%'";
		if($this->input->get('sid_sales')!='')$sql.=" and salesman='".$this->input->get('salesman')."'";
		if($this->input->get('sid_city')!='')$sql.=" and city='".$this->input->get('city')."'";
		
        echo datasource($sql);		
    }
      
	function delete($id){
	 	$this->customer_model->delete($id);
	 	$this->browse();
	}
	function grafik_saldo(){
		$phpgraph = $this->load->library('PhpGraph');		
		$cfg['width'] = 800;
		$cfg['height'] = 200;
		$cfg['compare'] = false;
		$cfg['disable-values']=1;
		$chart_type='vertical-simple-column-graph';
		$data=$this->customer_model->saldo_piutang_summary();
		$file="tmp/".$chart_type.".png";
		$this->phpgraph->create_graph($cfg, $data,$chart_type,'Saldo Piutang Pelanggan',$file);
		echo '<img src="'.base_url().'/'.$file.'"/>';
		echo '*Display only top ten customer';
	}	
	function select($search=''){
		$sql="select company,customer_number, city,region,country
		from customers 
		where (company like '$search%' or customer_number like '$search%')
		order by company
		limit 100";
		$rs = mysql_query($sql); $result = array();
		while($row = mysql_fetch_object($rs)){array_push($result, $row);}			 
		echo json_encode($result);
	}
	function list_shipto($search=''){
		$sql="select *	from customer_shipto 
		where customer_code='$search'";
		echo datasource($sql);
	}
	function shipto_add($cust){
		$data=$this->input->post();
		$data['customer_code']=$cust;
		if($this->customer_model->shipto_add($data)){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error ".mysql_error()));
		}
	}
	function shipto_del(){
		$id=$this->input->post('line_number');
		if($this->customer_model->shipto_del($id)){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error ".mysql_error()));
		}
	}
	
}
