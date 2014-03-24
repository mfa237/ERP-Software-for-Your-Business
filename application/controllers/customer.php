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
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('customer_model');
        $this->load->model('chart_of_accounts_model');
        $this->load->model('type_of_payment_model');

	}
	function set_defaults($record=NULL){
        $data=data_table($this->sql,$record,true); 
		$data['mode']='';
		$data['message']='';
        $data['akun_list']=$this->chart_of_accounts_model->select_list();
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
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$this->customer_model->save($data);
            $this->browse();
		} else {
			$data['mode']='add';
            $this->template->display_form_input('sales/customer',$data);
		}
	}
        
	function update()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $id=$this->input->post('customer_number');
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
		$cfg['width'] = 300;
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
	
}
