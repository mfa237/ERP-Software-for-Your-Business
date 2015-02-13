<?php
if(!defined('BASEPATH')) exit('No direct script access allowd');

class App_master extends CI_Controller {
    private $limit=100;
    private $table_name='ls_app_master';
    private $file_view='leasing/app_master';
    private $controller='leasing/app_master';
    private $primary_key='app_id';
    private $sql="";
	private $title="DAFTAR PENGAJUAN KREDIT";
	private $help="";

    function __construct()    {
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
		$this->load->helper(array('url','form','mylib_helper'));
		$this->load->library(array('sysvar','template','form_validation'));
		if($this->controller=="")$this->controller=$this->file_view;
		if($this->sql=="")$this->sql="select am.*,c.cust_name,am.status from ls_app_master am 
			left join ls_cust_master c on c.cust_id=am.cust_id";
		if($this->help=="")$this->help=$this->table_name;
		$this->load->model('leasing/app_master_model');
    }
	function nomor_bukti($add=false) {
		$key="AppMaster Numbering";
		if($add){
		  	$this->sysvar->autonumber_inc($key);
		} else {			
			$no=$this->sysvar->autonumber($key,0,'!SPK~$000001');
			for($i=0;$i<100;$i++){			
				$no=$this->sysvar->autonumber($key,0,'!SPK~$000001');
				$rst=$this->app_master_model->get_by_id($no)->row();
				if($rst){
				  	$this->sysvar->autonumber_inc($key);
				} else {
					break;					
				}
			}
			return $no;
		}
	}

	
    function set_defaults($record=NULL){
		$data['mode']='';
		$data['message']='';
		$data=data_table($this->table_name,$record);
		if($record==NULL)$data['app_id']=$this->nomor_bukti();
		$data['score']='';
		$data['cust_name']='';
		$data['counter_name']='';
		$data['loan_id']='';
		if($record==NULL) {
			$data['app_date']=date("Y-m-d");
			$data['create_date']=date("Y-m-d");
			$data['create_by']=user_id();
		}
		$data['username']=user_name();
		if(!$record==NULL){
			if($query=$this->db->select('cust_name')
			->where('cust_id',$data['cust_id'])
			->get('ls_cust_master')){
				if($query->row()){
					$data['cust_name']=$query->row()->cust_name;
				} 
			}
			if($query=$this->db->select('counter_name')
			->where('counter_id',$data['counter_id'])
			->get('ls_counter')){
				if($query->row()){
					$data['counter_name']=$query->row()->counter_name;
				}
			}
		} else {
			$data['cust_name']='';
			$data['counter_name']='';
		}
		return $data;
    }
    function index(){
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
				$this->app_master_model->save($data);
				$data['message']='update success';
				$data['mode']='view';
				$this->browse();
		} else {
				$data['mode']='add';
				$data['message']='';
				$data['data']=$data;
				$data['title']=$this->title;
				$data['help']=$this->help;
				$data['form_controller']=$this->controller;
				$data['field_key']=$this->primary_key;
				
				$this->template->display_form_input($this->file_view,$data);			
		}
    }
	function save(){
		$data=$this->input->post();
		 
		$id=$this->input->post("app_id");
		$mode=$data["mode"];	unset($data['mode']);
		if($mode=="add"){ 
			$ok=$this->app_master_model->save($data);	
		} else {
			$ok=$this->app_master_model->update($id,$data);				
		}
		if($ok){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error ".mysql_error()));
		}
		
	}	
    function view($id,$show_tool=true)	{
		$id=urldecode($id);
//		$message=urldecode($message);
			
		
		$data[$this->primary_key]=$id;
		$model=$this->app_master_model->get_by_id($id)->row();
		$data=$this->set_defaults($model);
		
		$data['mode']='view';
		$data['message']="";
		$data['title']=$this->title;
		$data['help']=$this->help;
		$data['form_controller']=$this->controller;
		$data['field_key']=$this->primary_key;
		$data['risk_approved']="";
		if($query=$this->db->select("recomended")
			->where("app_id",$id)
			->get("ls_app_survey")){
				if($query->row()){
					$risk=$query->row()->recomended;
					$data['risk_approved']=$risk;		
				}
		}
		$data['show_tool']=$show_tool;
		$loan_id="";
		if($q=$this->db->select("loan_id")->where("app_id",$id)->get("ls_loan_master")){
			if($row=$q->row()){
				$loan_id=$row->loan_id;
			}
		}
		$data['loan_id']=$loan_id;
		$this->template->display_form_input($this->file_view,$data);
    }
     // validation rules
    function _set_rules(){}
    function valid_date($str){
     if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str)){
             $this->form_validation->set_message('valid_date',
             'date format is not valid. yyyy-mm-dd');
             return false;
     } else {
            return true;
     }
    }
   function browse($offset=0,$limit=50,$order_column="",$order_type='asc'){
		if($order_column=="")$order_column=$this->primary_key;
		$data['controller']=$this->controller;
		$data['field_key']=$this->primary_key;
		$data['caption']=$this->title;

		$this->load->library('search_criteria');
		$faa[]=criteria("Nama Pemohon","sid_nama");
		$data['criteria']=$faa;
		$data['fields_caption']=array('Nomor','Tanggal','Nama Debitur','Status');
		$data['fields']=array('app_id','app_date','cust_name','status');
		$data['other_menu']="leasing/app_master_menu";
		
        $this->template->display_browse2($data);            
    }
    function browse_data($offset=0,$limit=100,$nama=''){
        $sql=$this->sql." where am.create_by='".user_id()."'";
		if($this->input->get("sid_nama"))$sql .= " and cust_name like '%".$this->input->get("sid_nama")."%'";
        echo datasource($sql);
    }	   
	function delete($id){
		$id=urldecode($id);
		if($this->app_master_model->delete($id)){
			$this->browse();
		} else {
			show_error("Tidak bisa dihapus, 
			mungkin masih ada data kredit untuk nomor ini. !");		
		}		
	}
	function find($nomor){
		$nomor=urldecode($nomor);
		$query=$this->db->query("select * from $table_name where app_id='$nomor'");
		echo json_encode($query->row_array());
 	}	
	function items($app_id,$id=''){
		$cmd=$app_id;
		if ($cmd=="save") {
			$this->add_item();
		} else if($cmd=="delete") {
			return $this->db->where("id",$id)->delete("ls_app_object_items");
		} else if ($cmd=="view") {
			if($row=$this->db->where("id",$id)
				->get("ls_app_object_items")->row()){
				$data=(array)$row;
				$data['success']=true;
				echo json_encode($data);
			}				
			
		} else {
			$sql="select * from ls_app_object_items where app_id='".$app_id."'";
			echo datasource($sql);
		}
	}
	function add_item(){
		$data=$this->input->post();
		
		$id=$data['frmAddItem_Id'];
		$dt['app_id']=$data['frmAddItem_AppId'];
		$dt['obj_id']=$data['item_no'];
		$dt['description']=$data['desc'];
		$dt['qty']=$data['qty'];
		$dt['price']=$data['price'];
		$dt['amount']=$data['qty']*$data['price'];
		if($id==""){
			$ok=$this->db->insert('ls_app_object_items',$dt);
		} else {
			$ok=$this->db->where("id",$id)->update('ls_app_object_items',$dt);
		}
		if($ok){
			echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("msg"=>"Error ".mysql_error()));
		}
	}
	function calc_loan(){
		$price=$this->input->get("price");
		$tenor=$this->input->get("tenor");
		if($tenor==0)$tenor=3;
		if($price>0){
			$dp=$this->get_dp_percent($price);
			$dp_amount=(double)round($price*$dp);
			$aft_dp=$price-$dp_amount;
			$bunga=$this->get_bunga_percent($aft_dp);
			$bunga_amount=(double)round($bunga*$aft_dp);
			$loan_amount=$aft_dp/$tenor;
			$aft_tenor=$aft_dp*$bunga;
			$angsuran=$aft_tenor+$loan_amount;
			$admin=100000;
			$asuransi=0;
			$data=array("success"=>true,"dp"=>$dp,"dp_amount"=>$dp_amount,"bunga"=>$bunga,
				"bunga_amount"=>$bunga_amount,"admin"=>$admin,
				"asuransi"=>$asuransi,"angsuran"=>$angsuran);
			echo json_encode($data);
		} else {
			echo json_encode(array("success"=>false,"dp"=>0,"dp_amount"=>0,
			"bunga"=>0,"bunga_amount"=>0,"admin"=>0,"asuransi"=>0,"angsuran"=>0));
		}
	}
	function _recalc($nomor=''){
		$nomor=urldecode($nomor);
		if($nomor!=''){
			//-- hitungan dari tiap barang
			$jenis_hitungan=1;	//hitungan dari total, 0-hitungan dari baris barang
			if($jenis_hitungan==0) {
				$sub_total=0;$total_loan_amount=0;
				$total_dp_amount=0;$total_bunga_amount=0;$total_cicilan=0;
				$sama_bunga=true;$old_bunga=0;
				$sama_dp=true;$old_dp=0;
				$dp=0; $bunga=0;
				$pertama=0;
				if($q=$this->db->where("app_id",$nomor)->get("ls_app_object_items")){
					foreach($q->result() as $item){
						$sub_total=$sub_total+$item->amount;
						$old_dp=$dp;
						$dp=$this->get_dp_percent($item->amount);
						if($pertama>0)$sama_dp=$old_dp==$dp;						
						$dp_amount=(double)round($item->amount*$dp);
						$aft_dp=$item->amount-$dp_amount;
						$old_bunga=$bunga;
						$bunga=$this->get_bunga_percent($aft_dp);
						if($pertama>0)$sama_bunga=$old_bunga==$bunga;
						$pertama++;
						$tenor=$this->input->get('inst_month');
						if(!$tenor)$tenor=3;
						$bunga_amount=(double)round($bunga*$aft_dp);
						$loan_amount=$aft_dp/$tenor;
						$aft_tenor=$aft_dp*$bunga;
						$cicilan=$aft_tenor+$loan_amount;
						$loan_amount=$loan_amount*$tenor;
						
						$this->db->where("id",$item->id)->update("ls_app_object_items", 
							array("dp"=>$dp,"dp_amount"=>$dp_amount,"aft_dp_amount"=>$aft_dp,
							"bunga"=>$bunga,"bunga_amount"=>$bunga_amount,
							"loan_amount"=>$loan_amount,"tenor"=>$tenor,
							"aft_tenor"=>$aft_tenor,"angsuran"=>$cicilan));
							
						$total_loan_amount=$total_loan_amount+$loan_amount;	
						$total_dp_amount=$total_dp_amount+$dp_amount;
						$total_cicilan=$total_cicilan+$cicilan;
						$total_bunga_amount=$total_bunga_amount+$bunga_amount;
					}
					$admin=getvar("admin",100000);
					$insr_amount=$this->input->get("insr_amount");
					if(!$insr_amount)$insr_amount=0;
					$data=array('sub_total'=>$sub_total,'loan_amount'=>$total_loan_amount,
					'dp_amount'=>$total_dp_amount, 
					'admin_amount'=>$admin,'inst_month'=>$tenor,'inst_amount'=>$total_cicilan,
					'insr_amount'=>$insr_amount,'rate_prc'=>$sama_bunga==true?$bunga:0,
					'rate_amount'=>$total_bunga_amount,
					'dp_prc'=>$sama_dp==true?$dp:0);
					$this->db->where("app_id",$nomor)->update("ls_app_master",$data);
					
					return $data;
					
				}
			}
			if($jenis_hitungan==1) {
				//-- hitungan dari total
				$q=$this->db->query("select sum(amount) as z_amt 
				from ls_app_object_items where app_id='".$nomor."'");		
				$sub_total=0;
				$loan_amount=0;
				if($q) $sub_total=(double)$q->row()->z_amt;	
				//--- range down payment
				$dp=$this->get_dp_percent($sub_total);
				$dp_amount=(double)round($dp*$sub_total);
				
				$loan_amount=(double)round($sub_total-$dp_amount);
				$admin=getvar("admin",100000);
				//--- bunga
				$bunga=$this->get_bunga_percent($loan_amount);
				//-- tenor
				$tenor=$this->input->get('inst_month');
				if(!$tenor)$tenor=3;
				
				$bunga_amount=round($loan_amount*$bunga);
				$loan_amount2=round($loan_amount/$tenor);
				$loan_amount2=$loan_amount+$bunga_amount;
				
				$insr_amount=$this->input->get("insr_amount");
				if(!$insr_amount)$insr_amount=0;
				
	//			$loan_amount2=$loan_amount2+$insr_amount;
				$inst_amount=$loan_amount/$tenor;
				$inst_amount=$inst_amount+$bunga_amount;
				
				$data=array('sub_total'=>$sub_total,'loan_amount'=>$loan_amount,'dp_amount'=>$dp_amount, 
				'admin_amount'=>$admin,'inst_month'=>$tenor,'inst_amount'=>$inst_amount,
				'insr_amount'=>$insr_amount,'rate_prc'=>$bunga,'rate_amount'=>$bunga_amount,
				'dp_prc'=>$dp);
				$this->db->where("app_id",$nomor)->update("ls_app_master",$data);
				
				return $data;
			}
		}
	}
	function recalc($nomor){
		$data=$this->_recalc($nomor);
		echo json_encode($data);
	}
	function print_app($app_id){
		$this->load->helper("pdf_helper");
		$obj_pdf=tcpdf();
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$obj_pdf->SetCreator(PDF_CREATOR);
//		$title = "PDF Report";
//		$obj_pdf->SetTitle($title);
//		$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
		$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$obj_pdf->SetDefaultMonospacedFont('helvetica');
		$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$obj_pdf->SetFont('helvetica', '', 9);
		$obj_pdf->setFontSubsetting(false);
		$obj_pdf->AddPage();
		ob_start();
			// we can have any view part here like HTML, PHP etc
		$data="";
        $this->load->view("leasing/rpt/app_form",$data);    	
		$content = ob_get_contents();
		ob_end_clean();
		$obj_pdf->writeHTML($content, true, false, true, false, '');
		$obj_pdf->Output('output.pdf', 'I');
	}
	function approve($app_id){
		$data['approved']='1';
		$data['status']='Wait Contract';
		$ok=$this->db->where("app_id",$app_id)->update($this->table_name,$data);
		if($ok){
			$message="Sukses nomor aplikasi $app_id sudah di setujui untuk dibuatkan akad kredit.";
			$from=user_id();
			$app=$this->db->select("create_by,cust_id")->where("app_id",$app_id)
				->get("ls_app_master")->row();
			$to_user=$app->create_by;
			$cust=$this->db->where("cust_id",$app->cust_id)->get("ls_cust_master")->row();
			inbox_send($from,$to_user,$app_id." - Approved, Debitur: $cust->cust_name",$message);
			echo $message;
			
		} else {
			echo "Ada kesalahan update data aplikasi";
		}
	
	}
	function filter($id=""){
		$sql="select a.app_id,a.app_date,b.cust_name,a.status, b.cust_id,b.kec,b.kel
		,a.counter_id,c.counter_name,a.loan_amount,a.inst_month
		,a.create_by as sales_id,u.username as sales_name
		from ls_app_master a left join ls_cust_master b on b.cust_id=a.cust_id 
		left join ls_counter c on c.counter_id=a.counter_id 
		left join `user` u on u.user_id=a.create_by
		where a.approved=1 and a.status not in ('Finish','Close')";
		if($id!=""){
			$sql.=" and (a.app_id like '".$id."%' or b.cust_name like '%".$id."%')";
		}
		$sql.= " order by a.app_date";
		echo datasource($sql);	
	}
	function not_recomended(){
		$app_id=$this->input->get("app_id");
		$reason=$this->input->get("reason");
		$data['status']='Not Recomended';
		if($this->db->where("app_id",$app_id)->update("ls_app_master",$data)){
			$from=user_id();
			$to_user=$this->db->select("create_by")->where("app_id",$app_id)
				->get("ls_app_master")->row()->create_by;
			inbox_send($from,$to_user,$app_id." - Not Recomended",
				"Nomor Aplikasi: $app_id tidak setujui $from , dengan alasan $reason"); 
			echo "Sukses, status aplikasi sudah diberitahukan ke sales agentnya. Silahkan close dan refresh.";
		} else {
			echo "Ada kesalahan !";
		}	
	}
	function get_dp_percent($amount){
		//--- range down payment
		if($query=$this->db->query("select * from ls_dp_range order by dp_from")){
			$dp=0;
			foreach($query->result() as $row){
				if($amount > $row->dp_from and $amount <= $row->dp_to){
					$dp=$row->dp_prc;
					break;
				}
			}
			if($dp>0)$dp=$dp/100;
		} 
/* 		if($amount>=500000 and $amount<=1500000){
			$dp=0.1;
		} else if ($amount>1500000 and $amount<=3000000) {
			$dp=0.15;
		} else if ($amount>3000000) {
			$dp=0.2;
		} else {
			$dp=0;
		}; */
		return $dp;
	}
	function get_bunga_percent($loan_amount){
/* 		if($loan_amount>=500000 and $loan_amount<=1500000) {
			$bunga=0.03;
		} else if ($loan_amount>1500000 and $loan_amount<=3000000) {
			$bunga=0.0325;
		} else if ($loan_amount>3000000) {
			$bunga=0.035;
		} else {
			$bunga=0;
		}
		
 */		
		if($query=$this->db->query("select * from ls_bunga_range order by amount_from")){
			$bunga=0;
			foreach($query->result() as $row){
				if($loan_amount >= $row->amount_from and $loan_amount < $row->amount_to){
					$bunga=$row->bunga_prc;
					break;
				}
			}
			if($bunga>0)$bunga=$bunga/100;
		} 
 
		return $bunga;
	
	}
	
}
?>
