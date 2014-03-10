<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Banks extends CI_Controller {
    private $limit=10;
    private $table_name='bank_accounts';
    private $sql="select bank_account_number,bank_name,street,suite,city,country
            ,phone_number,fax_number
                from bank_accounts
                ";
    private $file_view='bank/bank_accounts';
    private $primary_key='bank_account_number';
    private $controller='banks';
    
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('bank_accounts_model');
	}
	function set_defaults($record=NULL){
            $data=data_table($this->table_name,$record);
            $data['mode']='';
            $data['message']='';
            return $data;
	}
	function index()
	{	
            $this->browse();
	}
	function get_posts(){
            $data=  data_table_post($this->table_name);
            return $data;
	}
	function add()
	{
		 $data=$this->set_defaults();
		 $this->_set_rules();
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();
			$id=$this->bank_accounts_model->save($data);
            $data['message']='update success';
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
 		 $id=$this->input->post($this->primary_key);
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();                      
                        $this->bank_accounts_model->update($id,$data);
                        $message='Update Success';
                        $this->browse();
		} else {
			$message='Error Update';
         		$this->view($id,$message);		
		}	  
	}
	
	function view($id,$message=null){
		 $data['id']=$id;
		 $model=$this->bank_accounts_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
         $data['message']=$message;
         $this->template->display_form_input($this->file_view,$data,'');
	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules($this->primary_key,'Kode', 'required|trim');
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
		$data['controller']=$this->controller;
		$data['fields_caption']=array('Nomor Rekening','Nama Bank','Alamat','Gedung','Kota'
		,'Negara','Telpon','Fax');
		$data['fields']=array( 'bank_account_number','bank_name','street','suite','city','country'
            ,'phone_number','fax_number');
		$data['field_key']='bank_account_number';
		$data['caption']='DAFTAR REKENING KAS / BANK';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Nomor Rekening","sid_number");
		$faa[]=criteria("Nama Bank","sid_bank");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
    	$sql=$this->sql." where 1=1";
		if($this->input->get('sid_number')!='')$sql.=" and bank_account_number like '".$this->input->get('sid_number')."%'";	
		if($this->input->get('sid_bank')!='')$sql.=" bank_name like '".$this->input->get('sid_bank')."%'";
        $sql.=" limit $offset,$limit";
        echo datasource($sql);
    }	 
	function delete($id){
	 	$this->bank_accounts_model->delete($id);
	 	$this->browse();
	}
	function find($nomor){
		$query=$this->db->query("select bank_name from bank_accounts where bank_account_number='$nomor'");
		echo json_encode($query->row_array());
 	}
	function grafik_saldo()
	{
		/* create_graph($konfigurasi_grafik, $data, $tipe_grafik, $judul_pd_grafik, $nama_berkas) */		
		$phpgraph = $this->load->library('PhpGraph');		
		$cfg['width'] = 300;
		$cfg['height'] = 200;
		$cfg['compare'] = false;
		$cfg['disable-values']=1;
		$chart_type='vertical-simple-column-graph';
		$data=$this->bank_accounts_model->saldo_rekening();
		$file="tmp/".$chart_type.".png";
		$this->phpgraph->create_graph($cfg, $data,$chart_type,'Grafik Saldo Rekening',$file);
		echo '<img src="'.base_url().'/'.$file.'"/>';
		echo '*Display only top ten data.';
		
	}
	function daftar_giro_gantung()
	{
		$sql="select cw.voucher,cw.check_date,cw.check_number,cw.trans_type,cw.deposit_amount,cw.payment_amount  
		from check_writer cw";		
		$query=$this->db->query($sql);
		$flds=$query->list_fields();
		$data=$query->result_array();
		echo browse_data($data,$flds);
		
	}
}
