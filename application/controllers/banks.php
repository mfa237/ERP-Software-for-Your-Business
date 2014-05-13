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

		if(!$this->access->is_login())redirect(base_url());
		
 		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('bank_accounts_model');
		$this->load->model('chart_of_accounts_model');
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
			$data['account_id']=$this->acc_id($data['account_id']);
			$id=$this->bank_accounts_model->save($data);
            $data['message']='update success';
            $data['mode']='view';
            $this->browse();
		} else {
			$data['mode']='add';
            $this->template->display_form_input($this->file_view,$data,'');
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
 		 $id=$this->input->post($this->primary_key);
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();                      
			$data['account_id']=$this->acc_id($data['account_id']);
            $this->bank_accounts_model->update($id,$data);
            $message='Update Success';
            $this->browse();
		} else {
			$message='Error Update';
     		$this->view($id,$message);		
		}	  
	}
	function save(){
		$mode=$this->input->post("mode");
		if($mode=="add"){
			$this->add();
		} else {
			$this->update();
		}
	}
	function view($id,$message=null){
		$id=urldecode($id);
		 $data['id']=$id;
		 $model=$this->bank_accounts_model->get_by_id($id)->row();
		 $data=$this->set_defaults($model);
		 $data['mode']='view';
         $data['message']=$message;
		 $data['account_id']=account($data['account_id']);

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
		header('Content-type: application/json');
		$data['label']="SALDO REKENING";
		$data['data']=$this->bank_accounts_model->saldo_rekening();
		echo json_encode($data);
		
	}
	function grafik_saldo_old()
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
    function rpt($id){
		 $data['date_from']=date('Y-m-d 00:00:00');
		 $data['date_to']=date('Y-m-d 23:59:59');
		 $data['select_date']=true;		 
    	 switch ($id) {
			 case 'mutasi':
				 $data['criteria1']=true;
				 $data['label1']='Rekening';
				 $data['text1']='';
				 break;			 
			 default:
				 break;
		 }
		 $rpt='banks/rpt/'.$id;
		 $data['rpt_controller']=$rpt;
		 
		if(!$this->input->post('cmdPrint')){
			$this->template->display_form_input('criteria',$data,'');
		} else {
			$this->load->view('bank/rpt/'.$id);
		}
   }	
   function reports(){
		$this->template->display('bank/menu_reports');
	}
	function list_trans($bank_account_number) {
		$bank_account_number=urldecode($bank_account_number);
		$date_from= $this->input->get('d1');
		$date_from=  date('Y-m-d H:i:s', strtotime($date_from));
		$date_to= $this->input->get('d2');
		$date_to = date('Y-m-d H:i:s', strtotime($date_to));

		$sql="select sum(deposit_amount) as z_deposit, sum(payment_amount) as z_payment
			from check_writer where account_number='$bank_account_number' 
			and check_date<'$date_from'";
		 
		
        $query=$this->db->query($sql)->row();
		$awal=$query->z_deposit-$query->z_payment;
		
		$rows[0]=array("voucher"=>"SALDO","check_date"=>"SALDO","trans_type"=>"SALDO"
			,"deposit_amount"=>number_format($query->z_deposit)
			,"payment_amount"=>number_format($query->z_payment)
			,"saldo"=>number_format($awal)
			,"supplier_number"=>"","payee"=>"","memo"=>"");

		$sql="select voucher,check_date,deposit_amount,payment_amount,supplier_number,
			payee,memo,trans_type 
			from check_writer 
			where account_number='$bank_account_number' 
			and check_date between '$date_from' and '$date_to' 
			order by check_date
			
			";
		


        $query=$this->db->query($sql);
		 
        $i=1;
		if($query)foreach($query->result_array() as $row) {
			$awal=$awal+$row['deposit_amount']-$row['payment_amount'];
			$row['deposit_amount']=number_format($row['deposit_amount']);
			$row['payment_amount']=number_format($row['payment_amount']);
			$row["saldo"]=number_format($awal);
			$rows[$i++]=$row;
		};	
        $data['total']=$i;
        $data['rows']=$rows;
                    
        echo json_encode($data);

	}
 

}
