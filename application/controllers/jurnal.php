<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Jurnal extends CI_Controller {
    private $limit=10;
    private $table_name='gl_transactions';
    private $sql="select gl_id,date,account,account_description
        ,debit,credit,source,operation,custsuppbank,account_id
        ,transaction_id
        from gl_transactions g
        left join chart_of_accounts c on c.id=g.account_id ";
    private $primary_key='transaction_id';
    private $file_view='gl/jurnal';
	private $controller='jurnal';
	
	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form','mylib_helper'));
        $this->load->library('sysvar');
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('jurnal_model');
		$this->load->model('chart_of_accounts_model');
	}
	function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
		if($record==NULL){
			$data['operation']='';
			$data['gl_id']='';
			$data['date']=date("Y-m-d");
			$data['source']='';
			$data['debit']='0';
			$data['credit']='0';
                        
		} else {
			$data['operation']=$record->operation;
			$data['gl_id']=$record->gl_id;
			$data['date']=$record->date;
			$data['source']=$record->source;
			$data['debit']=$record->debit;
			$data['credit']=$record->credit;
		}
		return $data;
	}
	function index()
	{	
       $this->browse();     
	}
	function get_posts(){
		$data['operation']=$this->input->post('operation');
		$data['gl_id']=$this->input->post('gl_id');
		$data['date']=$this->input->post('date');
		$data['source']=$this->input->post('source');
		$data['debit']=$this->input->post('debit');
		$data['credit']=$this->input->post('credit');
		return $data;
	}
	function nomor_bukti($add=false)
	{
		$key="GL Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!GL~$00001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!GL~$00001');
				$rst=$this->jurnal_model->get_by_id($no)->row();
				if($rst){
				  	$this->sysvar->autonumber_inc($key);
				} else {
					break;					
				}
			}
			return $no;
		}
	}

	function add()
	{
	 	$data=$this->set_defaults();
		$this->_set_rules();
		$data['mode']='add';
		$data['gl_id']=$this->nomor_bukti();
		$this->nomor_bukti(true);	//langsung tambah satu
	    $this->template->display_form_input($this->file_view,$data,'');
	}
	function save(){
		$data=$this->get_posts();
		$id=$this->jurnal_model->save($data);
        $message='update success';		
	}
	function view($gl_id)
	{
            $data=$this->set_defaults();
            $this->_set_rules();
            $data['mode']='view';
            $this->db->select("gl_id,date,source,operation");
            $this->db->from('gl_transactions');
            $this->db->where('gl_id',$gl_id);
            $this->db->limit(1);
            $query=$this->db->get();
            //var_dump($gl_id);
            $param='';
            foreach($query->result_array() as $r){
                $param="gl_id=".$gl_id."&date=".$r['date']."&source=".$r['source']
                        ."&operation=".$r['operation'];
                $data['gl_id']=$r['gl_id'];
                $data['date']=$r['date'];
                $data['source']=$r['source'];
                $data['operation']=$r['operation'];
            }
            //var_dump($param);
           
          
            $xurl=base_url().'index.php/jurnal/next?'.$param;
            //$this->template->display('gl/jurnal_next',$data);
           // header('location: '.$xurl);
            echo "<script>window.open('".$xurl."','_self')</script>";
	}
	function update()
	{
	 
		 $data=$this->set_defaults();
 
		 $this->_set_rules();
 		 $id=$this->input->post('gl_id');
		 if ($this->form_validation->run()=== TRUE){
			$data=$this->get_posts();                      
			$this->jurnal_model->update($id,$data);
                        $message='Update Success';
		} else {
			$message='Error Update';
		}	  
 		$this->view($id,$message);		
	}
	
	function view_jurnal($gl_id){
            $sql="select account,account_description
            ,debit,credit,custsuppbank as ref,org_id,transaction_id as id from gl_transactions g
            left join chart_of_accounts c on c.id=g.account_id
            where gl_id='$gl_id'";
            $s="
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/default/easyui.css\">
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/icon.css\">
                <link rel=\"stylesheet\" type=\"text/css\" href=\"".base_url()."js/jquery-ui/themes/demo.css\">
                <script src=\"".base_url()."js/jquery-ui/jquery.easyui.min.js\"></script>                
            ";
            echo $s." ".browse_simple($sql);

	}
	 // validation rules
	function _set_rules(){	
		 $this->form_validation->set_rules('gl_id','gl_id', 'required|trim');
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
		$data['fields_caption']=array('Nomor Bukti','Tanggal','Kode Akun','Nama Akun','Debit'
		,'Kredit','Source','Jenis','Ref','account_id','ID');
		$data['fields']=array('gl_id','date','account','account_description'
        ,'debit','credit','source','operation','custsuppbank','account_id'
        ,'transaction_id');
		$data['field_key']='gl_id';
		$data['caption']='DAFTAR TRANSAKSI JURNAL';

		$this->load->library('search_criteria');
		
		$faa[]=criteria("Dari","sid_date_from","easyui-datetimebox");
		$faa[]=criteria("S/d","sid_date_to","easyui-datetimebox");
		$faa[]=criteria("Nomor Bukti","sid_number");
		$faa[]=criteria("Jenis","sid_opr");
		$data['criteria']=$faa;
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
		$no=$this->input->get('sid_number');
		$d1= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_from')));
		$d2= date( 'Y-m-d H:i:s', strtotime($this->input->get('sid_date_to')));
        $sql=$this->sql.' where 1=1';
		if($no!=''){
			$sql.=" and gl_id='".$no."'";
		} else {
			$sql.=" and date between '$d1' and '$d2'";
			if($this->input->get('sid_opr')!='')$sql.=" operation like '".$this->input->get('sid_opr')."%'";
		}
        //$sql.=" limit $offset,$limit";
        ///echo $sql;
        echo datasource($sql);
    }	      
	function delete($id){
	 	$this->jurnal_model->delete($id);
	 	$this->browse();
	}
    function delete_item($id){
        if($this->jurnal_model->delete_item($id)){
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
    }
	function add_item(){
            
            if(isset($_GET)){
                $data['gl_id']=$_GET['gl_id'];
                $data['date']=$_GET['date'];
                $data['operation']=$_GET['operation'];
                $data['source']=$_GET['source'];
            } else {
                $data['gl_id']='';
                $data['date']='';
                $data['operation']='';
                $data['source']='';                
            }
             
           $this->load->model('chart_of_accounts_model');
           $data['account_lookup']=$this->chart_of_accounts_model->select_list();
            $this->load->view('gl/add_account',$data);
        }
        function save_item(){
			$account=$this->input->post('account');
			$accid=$this->chart_of_accounts_model->get_by_id($account)->row()->id;
            $data['gl_id']=$this->input->post('gl_id');
            $data['date']=$this->input->post('date');
            $data['account_id']=$accid;
            $data['debit']=$this->input->post('debit');
			if($data['debit']=='')$data['debit']='0';
            $data['credit']=$this->input->post('credit');
			if($data['credit']=='')$data['credit']='0';
            $data['source']=$this->input->post('source');
            $data['operation']=$this->input->post('operation');
            if($this->jurnal_model->save($data)){
				echo json_encode(array('success'=>true));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
        }
	function items($kode){
		$sql="select c.account,c.account_description,g.debit,g.credit,
		g.source,g.operation,g.transaction_id 
		from gl_transactions g left join chart_of_accounts c 
		on c.id=g.account_id
		 where gl_id='$kode'";
		echo datasource($sql);
	}
}
