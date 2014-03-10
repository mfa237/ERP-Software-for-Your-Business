<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Supplier extends CI_Controller {

    private $limit=10;
    private $offset=0;
    private $sql="select supplier_number,supplier_name,
                first_name,street,suite,country,state,city
                from suppliers where 1=1";
    private $table_name='suppliers';
    private $file_view="purchase/supplier";
	private $controller="supplier";
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','browse_select','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('supplier_model');
        $this->load->model('chart_of_accounts_model');
		$this->load->model('type_of_payment_model');
		$this->load->model('sysvar_model');
                
	}
	function select($search=''){
		$sql="select supplier_name,supplier_number, city,country
		from suppliers 
		where supplier_name like '$search%'
		order by supplier_name limit 100";
		echo datasource($sql);
	}

	function set_defaults($record=NULL){
        $data=data_table($this->table_name,$record); 
		$data['mode']='';
		$data['message']='';
        $data['akun_list']=$this->chart_of_accounts_model->select_list();
        $data['terms_list']=$this->type_of_payment_model->select_list();
		$data['type_of_vendor_list']=$this->sysvar_model->value_list('type_of_vendor');
		$data['active']='1';
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
			$id=$this->supplier_model->save($data);
                        $data['mode']='view';
                        $this->browse();
		} else {
			$data['mode']='add';
            $this->template->display_form_input($this->file_view,$data,'');
		
		}
	}
	function update()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
 		 $id=$this->input->post('supplier_number');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$this->supplier_model->update($id,$data);
                        $message='Update Success';
                        $this->browse();
		} else {
			$message='Error Update';
         		$this->view($id,$message);		
		}	  
	}
	
	function view($id,$message=null){
		 $model=$this->supplier_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['id']=$id;
		 $data['mode']='view';
                 $data['message']=$message;
                 $this->template->display_form_input($this->file_view,$data,'');
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('supplier_number','Supplier Number', 'required|trim');
		 $this->form_validation->set_rules('supplier_name','Supplier Name',	 'required');
	}
	function browse($offset=0,$limit=10,$order_column='suppliers',$order_type='asc')
	{
        $data['caption']='DAFTAR MASTER SUPPLIER';
		$data['controller']=$this->controller;		
		$data['fields_caption']=array('Kode','Nama Supplier','Kontak','Alamat','Gedung','Negara','Provinsi','Kota');
		$data['fields']=array('supplier_number','supplier_name','first_name','street','suite','country','state','city');
		$data['field_key']='supplier_number';
		$this->load->library('search_criteria');
		
		$faa[]=criteria("Nama","sid_nama");
		$faa[]=criteria("Kota","sid_city");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
    	$sql=$this->sql;
		if($this->input->get('sid_nama'))$sql.=" and supplier_name like '".$this->input->get('sid_nama')."%'";
		if($this->input->get('sid_city'))$sql.=" and city='".$this->input->get('city')."'";		
        echo datasource($sql);		
    }
	function delete($id){
	 	$this->supplier_model->delete($id);
	 	$this->browse();
	}
	function grafik_saldo_hutang(){
/* create_graph($konfigurasi_grafik, $data, $tipe_grafik, $judul_pd_grafik, $nama_berkas) */		
		$phpgraph = $this->load->library('PhpGraph');		
		$cfg['width'] = 300;
		$cfg['height'] = 200;
		$cfg['compare'] = false;
		$cfg['disable-values']=1;
		$chart_type='vertical-simple-column-graph';
		$data=$this->supplier_model->saldo_hutang_summary();
		$file="tmp/".$chart_type.".png";
		$this->phpgraph->create_graph($cfg, $data,$chart_type,'Saldo Hutang Supplier',$file);
		echo '<img src="'.base_url().'/'.$file.'"/>';
		echo '*Display only top ten supplier';
	}
}
