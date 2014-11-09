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
		if(!$this->access->is_login())redirect(base_url());
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
		//var_dump($sql);
	}

	function set_defaults($record=NULL){
        $data=data_table($this->table_name,$record); 
		$data['mode']='';
		$data['message']='';
        $data['akun_list']=$this->chart_of_accounts_model->select_list();
        $data['terms_list']=$this->type_of_payment_model->select_list();
		$data['type_of_vendor_list']=$this->sysvar_model->value_list('type_of_vendor');
		$data['active']='1';
		$data['saldo']=0;
		return $data;
	}
	function index()
	{	
		if(!allow_mod2('_40010'))return false;
		$this->browse();		 
	}
	function get_posts(){
        $data=data_table_post($this->table_name);
		return $data;
	}
	function add()
	{
		if(!allow_mod('_40011')){
			echo "<span class='not_access'>Anda tidak diijinkan menjalankan proses module ini.</span>";
			return false;
		};			
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
	function save(){
		$data=$this->input->post();
		$id=$this->input->post("supplier_number");
		$mode=$data["mode"];
	 	unset($data['mode']);
		if($mode=="add"){ 
			$ok=$this->supplier_model->save($data);
		} else {
			$ok=$this->supplier_model->update($id,$data);				
		}
		if($ok){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("success"=>false,"msg"=>"Error ".mysql_error()));
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
	
	function view($id="",$message=null){
		$id=urldecode($id);
		if($id=="") { 
			echo "Supplier Number not found !";
			return false;
		}
		 $id=urldecode($id);
		 $model=$this->supplier_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['saldo']=$this->supplier_model->saldo($id);
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
		$data['list_info_visible']=true;
		
		$this->load->library('search_criteria');
		
		$faa[]=criteria("Kode","sid_kode");
		$faa[]=criteria("Nama","sid_nama");
		$faa[]=criteria("Kota","sid_city");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=10,$nama=''){
    	$sql=$this->sql;
		if($this->input->get('sid_kode'))$sql.=" and supplier_number like '".$this->input->get('sid_kode')."%'";
		if($this->input->get('sid_nama'))$sql.=" and supplier_name like '".$this->input->get('sid_nama')."%'";
		if($this->input->get('sid_city'))$sql.=" and city='".$this->input->get('city')."'";		
        echo datasource($sql);		
    }
	function delete($id){
		$id=urldecode($id);
		if(!allow_mod('_40013')){
			echo json_encode(array("success"=>false,"msg"=>"Anda tidak diijinkan menjalankan proses module ini."));
			return false;
		};			
	 	$cnt=$this->supplier_model->delete($id);
		if($cnt){
			echo json_encode(array("success"=>false,"msg"=>"Masih ada transaksi tidak bisa dihapus"));
		} else {
			echo json_encode(array("success"=>true,"msg"=>"Berhasil hapus supplier ini."));
		}
	}
	function grafik_saldo_hutang(){
		header('Content-type: application/json');
		$data['label']="Saldo Hutang";
		$data['data']=$this->supplier_model->saldo_hutang_summary();
		echo json_encode($data);
	}	
	function grafik_saldo_hutang_old(){
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
	function kartu_hutang($supplier_number)
	{
		$supplier_number=urldecode($supplier_number);
		$date_from= $this->input->get('d1');
		$date_from=  date('Y-m-d H:i:s', strtotime($date_from));
		$date_to= $this->input->get('d2');
		$date_to = date('Y-m-d H:i:s', strtotime($date_to));
		
		$sql="select sum(amount) as z_amt from qry_kartu_hutang where supplier_number='$supplier_number' 
			and tanggal<'$date_from'";

        $query=$this->db->query($sql);
		$awal=$query->row()->z_amt;
		$rows[0]=array("no_bukti"=>"SALDO","tanggal"=>"SALDO","jenis"=>"SALDO","amount"=>number_format($awal),"saldo"=>number_format($awal));

		$sql="select no_bukti,tanggal,jenis,amount from qry_kartu_hutang where supplier_number='$supplier_number' 
			and tanggal between '$date_from' and '$date_to' order by tanggal";

        $query=$this->db->query($sql);
		 
        $i=1;
		if($query)foreach($query->result_array() as $row) {
			$awal=$awal+$row['amount'];
			$row['amount']=number_format($row['amount']);
			$row["saldo"]=number_format($awal);
			$rows[$i++]=$row;
		};	
        $data['total']=$i;
        $data['rows']=$rows;
                    
        echo json_encode($data);

	}
	function list_info($offset=0){
		if(isset($_GET['offset'])){
			$offset=$_GET['offset'];
		}
		$data['offset']=$offset;
		$this->load->library('search_criteria');
		if($this->input->get('sid_nama') or $this->input->get('sid_nama')==''){
			$sid_nama=$this->input->get('sid_nama');
			$this->session->set_userdata('sid_nama',$sid_nama);
		} else {
			$sid_nama=$this->session->userdata('sid_nama');		
		}
		if($this->input->get('sid_city')  or $this->input->get('sid_city')==''){
			$sid_city=$this->input->get('sid_city');
			$this->session->set_userdata('sid_city',$sid_city);
		} else {
			$sid_city=$this->session->userdata('sid_city');
		}
	
		$faa[]=criteria("Nama","sid_nama",null,$sid_nama);
		$faa[]=criteria("Kota","sid_city",null,$sid_city);
		$data['criteria']=$faa;
		$data['criteria_text']=criteria_text($faa);
		$data['sid_nama']=$sid_nama;
		$data['sid_city']=$sid_city;
		
		$this->template->display_form_input('purchase/supplier_info_list',$data);	
	}
}
