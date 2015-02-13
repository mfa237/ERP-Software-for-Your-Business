<?php
 if(!defined('BASEPATH')) exit('No direct script access allowd');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Reports extends CI_Controller {
                

	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
        $this->load->helper(array('url','form','browse_select'));
        $this->load->library('sysvar');
        $this->load->library('javascript');
        $this->load->library('template');
		$this->load->library('form_validation');
	}
    function index(){	
		$this->template->display("leasing/reports");
	}
	function loan($id){
		$this->load->helper('mylib');
		$data['message']='';
		$data['date_from']=date('Y-m-d');
		$data['date_to']=date('Y-m-d');
		$data['select_date']=true;
		$data['criteria1']=false;
		$data['label1']='Counter ';
		$data['text1']='';
		$data['criteria2']=false;
		$data['label2']='Status';
		$data['text2']='1';
		$data['criteria3']=false;
		$data['label3']='';
		$data['text3']='';
		$data['header']= $data['header']=company_header();
		$data['rpt_controller']="leasing/reports/loan/".$id;
		 
		if(isset($_POST['cmdPrint'])){
			$d1=$this->input->post('txtDateFrom');
			$d1=date("Y-m-d",strtotime($d1));
			$d2=$this->input->post('txtDateTo');
			$d2=date("Y-m-d H:n:s",strtotime($d2));
		}
		switch ($id) {
		case '001':
			$data['caption']='DAFTAR KONTRAK KREDIT';
			$data['criteria1']=true;
			$data['criteria2']=true;
			if(isset($_POST['cmdPrint'])){
				$sql="select distinct l.loan_id,l.loan_date,l.cust_id,c.cust_name,l.loan_amount,
					l.inst_amount,l.max_month,l.dealer_id,l.dealer_name,l.status,
					l.last_idx_month,l.last_date_paid,l.total_amount_paid,l.ar_bal_amount
					from ls_loan_master l
					left join ls_cust_master c on c.cust_id=l.cust_id
					where 1=1";
				$sql.=" and l.loan_date between '".$d1."' and '".$d2."'";
				$counter_id=$this->input->post("text1");
				if($counter_id!="")$sql.=" and dealer_id='".$counter_id."'";
				$status=$this->input->post("text2");
				if($status!="")$sql.=" and l.status='".$status."'";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false,"fields_sum"=>array("loan_amount","total_amount_paid",
				"ar_bal_amount")
				));
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '002':
			$data['caption']='DAFTAR KONTRAK KREDIT SUMMARY';
			$data['criteria1']=true;
			$data['criteria2']=true;
			if(isset($_POST['cmdPrint'])){
				$sql="select l.dealer_id,l.dealer_name,sum(l.loan_amount) as loan_amount_sum,
					sum(l.total_amount_paid) as total_amount_paid_sum,
					sum(l.ar_bal_amount) as ar_bal_amount_sum
					from ls_loan_master l
					left join ls_cust_master c on c.cust_id=l.cust_id
					where 1=1";
				$sql.=" and l.loan_date between '".$d1."' and '".$d2."'";
				$counter_id=$this->input->post("text1");
				if($counter_id!="")$sql.=" and dealer_id='".$counter_id."'";
				$status=$this->input->post("text2");
				if($status!="")$sql.=" and l.status='".$status."'";
				$sql.=" group by l.dealer_id,l.dealer_name";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false,"fields_sum"=>array("loan_amount_sum","total_amount_paid_sum",
				"ar_bal_amount_sum")
				));
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '003':
			$data['caption']='DAFTAR TAGIHAN';
			$data['criteria1']=true;
			if(isset($_POST['cmdPrint'])){
				$sql="select h.invoice_number,h.invoice_date,h.idx_month, 
					h.amount,h.amount_paid,h.amount-h.amount_paid as amount_saldo,
					h.pokok,h.bunga,h.pokok_paid,h.bunga_paid,h.denda,
					h.pokok-h.pokok_paid as pokok_saldo,
					h.bunga-h.bunga_paid as bunga_saldo,
					h.paid,c.cust_name ,l.dealer_name, h.date_paid,h.payment_method,
					h.loan_id, 
					l.dealer_id,h.cust_deal_id,h.hari_telat
					from ls_invoice_header h 
					left join ls_loan_master l on l.loan_id=h.loan_id
					left join ls_cust_master c on c.cust_id=l.cust_id
					where 1=1";
				$sql.=" and h.invoice_date between '".$d1."' and '".$d2."'";
				$counter_id=$this->input->post("text1");
				if($counter_id!="")$sql.=" and dealer_id='".$counter_id."'";
				$sql.=" order by h.loan_id,h.invoice_date";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false,"fields_sum"=>array("amount","amount_paid",
				"ar_bal_amount_sum"),"group_by"=>array("loan_id")
				));	
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '004':
			$data['caption']='LAPORAN CASH LOAN';
			$data['criteria1']=false;
			if(isset($_POST['cmdPrint'])){
				$sql="select * from qry_loan_by_counter
					where 1=1";
//				$sql.=" and h.invoice_date between '".$d1."' and '".$d2."'";
//				$counter_id=$this->input->post("text1");
//				if($counter_id!="")$sql.=" and dealer_id='".$counter_id."'";
//				$sql.=" order by h.loan_id,h.invoice_date";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false,"fields_sum"=>array("z_loan","z_balance",
				"z_payment","z_noa") 
				));	
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '005':
			$data['caption']='LAPORAN KOLEKTIBILITAS';
			$data['criteria1']=false;
			if(isset($_POST['cmdPrint'])){
				$sql="select * from qry_loan_by_counter
					where 1=1";
//				$sql.=" and h.invoice_date between '".$d1."' and '".$d2."'";
//				$counter_id=$this->input->post("text1");
//				if($counter_id!="")$sql.=" and dealer_id='".$counter_id."'";
//				$sql.=" order by h.loan_id,h.invoice_date";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false,"fields_sum"=>array("z_loan","z_balance",
				"z_payment","z_noa") 
				));	
				$this->load->view('simple_print.php',$data);    
			}
			break;
		default:
			break;
		}
		if(!isset($_POST['cmdPrint'])){
			$this->template->display_form_input('criteria',$data,'');
		}		

	}
	function cust_master($id){
		$this->load->helper('mylib');
		$data['message']='';
		$data['date_from']=date('Y-m-d');
		$data['date_to']=date('Y-m-d');
		$data['select_date']=true;
		$data['criteria1']=false;
		$data['label1']='Counter ';
		$data['text1']='';
		$data['criteria2']=false;
		$data['label2']='Status';
		$data['text2']='1';
		$data['criteria3']=false;
		$data['label3']='';
		$data['text3']='';
		$data['header']= $data['header']=company_header();
		$data['rpt_controller']="leasing/reports/cust_master/".$id;
		 
		if(isset($_POST['cmdPrint'])){
			$d1=$this->input->post('txtDateFrom');
			$d1=date("Y-m-d",strtotime($d1));
			$d2=$this->input->post('txtDateTo');
			$d2=date("Y-m-d H:n:s",strtotime($d2));
		}
		switch ($id) {
		case '001':
			$data['select_date']=false;
			$data['label1']='City ';
			$data['text1']='';
			$data['criteria1']=true;
			$data['caption']='DAFTAR DEBITUR / CUSTOMER';
			if(isset($_POST['cmdPrint'])){
				$sql="select *
					from ls_cust_master c
					where 1=1";
				$city=$this->input->post("text1");
				if($city!="")$sql.=" and c.city like '%".$city."%'";
				$sql.=" order by c.city";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false,"group_by"=>array("city"))
				);
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '002':
			$data['select_date']=false;
			$data['criteria1']=false;
			$data['caption']='DAFTAR DEBITUR SUMMARY';
			if(isset($_POST['cmdPrint'])){
				$sql="select *
					from ls_cust_master c
					where 1=1";
				$city=$this->input->post("text1");
				if($city!="")$sql.=" and c.city like '%".$city."%'";
				$sql.=" order by c.city";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false));
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '003':
		default:
			break;
		}
		if(!isset($_POST['cmdPrint'])){
			$this->template->display_form_input('criteria',$data,'');
		}		
	}
function app_master($id){
		$this->load->helper('mylib');
		$data['message']='';
		$data['date_from']=date('Y-m-d');
		$data['date_to']=date('Y-m-d');
		$data['select_date']=true;
		$data['criteria1']=false;
		$data['label1']='Counter ';
		$data['text1']='';
		$data['criteria2']=false;
		$data['label2']='Status';
		$data['text2']='1';
		$data['criteria3']=false;
		$data['label3']='';
		$data['text3']='';
		$data['header']= $data['header']=company_header();
		$data['rpt_controller']="leasing/reports/app_master/".$id;
		 
		if(isset($_POST['cmdPrint'])){
			$d1=$this->input->post('txtDateFrom');
			$d1=date("Y-m-d",strtotime($d1));
			$d2=$this->input->post('txtDateTo');
			$d2=date("Y-m-d H:n:s",strtotime($d2));
		}
		switch ($id) {
		case '001':
			$data['caption']='DAFTAR APLIKASI KREDIT';
			if(isset($_POST['cmdPrint'])){
				$sql="select lam.app_id,lam.app_date,lam.cust_id,cm.cust_name,
					lam.counter_id,lam.status,lam.dp_amount,lam.admin_amount, 
					lam.inst_amount,lam.inst_month,lam.loan_amount, 
					lam.verified,lam.scored, lam.score_value, 
					lam.confirmed,lam.surveyed, lam.approved, lam.risk_approved
					from ls_app_master lam
					left join ls_cust_master cm on cm.cust_id=lam.cust_id 
					where 1=1";
				$sql.=" and lam.app_date between '".$d1."' and '".$d2."'";
				$sql.=" order by lam.app_date";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false)
				);
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '002':
			$data['caption']='DAFTAR APLIKASI SUMMARY';
			break;
		case '003':
		default:
			break;
		}
		if(!isset($_POST['cmdPrint'])){
			$this->template->display_form_input('criteria',$data,'');
		}		
	}	 
	function survey($id){
		$this->load->helper('mylib');
		$data['message']='';
		$data['date_from']=date('Y-m-d');
		$data['date_to']=date('Y-m-d');
		$data['select_date']=true;
		$data['criteria1']=false;
		$data['label1']='Counter ';
		$data['text1']='';
		$data['criteria2']=false;
		$data['label2']='Status';
		$data['text2']='1';
		$data['criteria3']=false;
		$data['label3']='';
		$data['text3']='';
		$data['header']= $data['header']=company_header();
		$data['rpt_controller']="leasing/reports/survey/".$id;
		 
		if(isset($_POST['cmdPrint'])){
			$d1=$this->input->post('txtDateFrom');
			$d1=date("Y-m-d",strtotime($d1));
			$d2=$this->input->post('txtDateTo');
			$d2=date("Y-m-d H:n:s",strtotime($d2));
		}
		switch ($id) {
		case '001':
			$data['select_date']=true;
			$data['label1']='Surveyor ';
			$data['text1']='';
			$data['criteria1']=true;
			$data['caption']='DAFTAR SURVEY';
			if(isset($_POST['cmdPrint'])){
				$sql="select survey_date,survey_by,area,status,hasil,comments
					from ls_app_survey c
					where 1=1";
				$sql.=" and c.survey_date between '".$d1."' and '".$d2."'";
				$city=$this->input->post("text1");
				if($city!="")$sql.=" and c.survey_by like '%".$city."%'";
				$sql.=" order by survey_by";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false,"group_by"=>array("survey_by")
				)
				);
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '002':
			$data['caption']='DAFTAR DEBITUR SUMMARY';
			break;
		case '003':
		default:
			break;
		}
		if(!isset($_POST['cmdPrint'])){
			$this->template->display_form_input('criteria',$data,'');
		}		
	}
	function invoice($id){
		$this->load->helper('mylib');
		$data['message']='';
		$data['date_from']=date('Y-m-d');
		$data['date_to']=date('Y-m-d');
		$data['select_date']=true;
		$data['criteria1']=false;
		$data['label1']='Counter ';
		$data['text1']='';
		$data['criteria2']=false;
		$data['label2']='Status';
		$data['text2']='1';
		$data['criteria3']=false;
		$data['label3']='';
		$data['text3']='';
		$data['header']= $data['header']=company_header();
		$data['rpt_controller']="leasing/reports/invoice/".$id;
		 
		if(isset($_POST['cmdPrint'])){
			$d1=$this->input->post('txtDateFrom');
			$d1=date("Y-m-d",strtotime($d1));
			$d2=$this->input->post('txtDateTo');
			$d2=date("Y-m-d H:n:s",strtotime($d2));
		}
		switch ($id) {
		case '001':
			$data['select_date']=true;
			$data['label1']='Debitur: ';
			$data['text1']='';
			$data['criteria1']=true;
			$data['caption']='DAFTAR TAGIHAN';
			if(isset($_POST['cmdPrint'])){
				$sql="select h.loan_id,h.app_id,h.invoice_date,h.idx_month,
				h.invoice_number,h.amount,h.paid,h.date_paid,h.amount_paid,
				h.cust_deal_id,c.cust_name,h.pokok,h.bunga,h.hari_telat,h.pokok_paid,
				h.bunga_paid,h.denda,h.bunga_finalty
					from ls_invoice_header h
					left join ls_cust_master c on c.cust_id=h.cust_deal_id
					where 1=1";
				$sql.=" and h.invoice_date between '".$d1."' and '".$d2."'";
				$par1=$this->input->post("text1");
				if($par1!="")$sql.=" and c.cust_name like '%".$par1."%'";
				$sql.=" order by c.cust_name,h.loan_id,h.idx_month";
				$data['content']=browse_select(	array('sql'=>$sql,
				'show_action'=>false,"group_by"=>array("cust_name"),
				"fields_sum"=>array("amount","amount_paid","pokok","bunga",
				"pokok_paid","bunga_paid","bunga_finalty","denda"))
				);
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '002':
			$data['caption']='DAFTAR DEBITUR SUMMARY';
			break;
		case '003':
		default:
			break;
		}
		if(!isset($_POST['cmdPrint'])){
			$this->template->display_form_input('criteria',$data,'');
		}		
	}
	function cash($id){
		$this->load->helper('mylib');
		$data['message']='';
		$data['date_from']=date('Y-m-d');
		$data['date_to']=date('Y-m-d');
		$data['select_date']=true;
		$data['criteria1']=false;
		$data['label1']='Counter ';
		$data['text1']='';
		$data['criteria2']=false;
		$data['label2']='Status';
		$data['text2']='1';
		$data['criteria3']=false;
		$data['label3']='';
		$data['text3']='';
		$data['header']= $data['header']=company_header();
		$data['rpt_controller']="leasing/reports/cash/".$id;
		 
		if(isset($_POST['cmdPrint'])){
			$d1=$this->input->post('txtDateFrom');
			$d1=date("Y-m-d",strtotime($d1));
			$d2=$this->input->post('txtDateTo');
			$d2=date("Y-m-d H:n:s",strtotime($d2));
		}
		switch ($id) {
		case '001':
			$data['select_date']=true;
			$data['label1']='Debitur: ';
			$data['text1']='';
			$data['criteria1']=true;
			$data['caption']='DAFTAR PENERIMAAN CASH';
			if(isset($_POST['cmdPrint'])){
				$sql="select * from qry_ls_cash_receive ";
				$sql.=" where tanggal between '".$d1."' and '".$d2."'";
				$par1=$this->input->post("text1");
				if($par1!="")$sql.=" and cust_name like '%".$par1."%'";
				$sql.=" order by tanggal";
				$data['content']=browse_select(array('sql'=>$sql,
				'show_action'=>false, 
				"fields_sum"=>array("amount_recv"))
				);
				$this->load->view('simple_print.php',$data);    
			}
			break;
		case '002':
			$data['caption']='DAFTAR DEBITUR SUMMARY';
			break;
		case '003':
		default:
			break;
		}
		if(!isset($_POST['cmdPrint'])){
			$this->template->display_form_input('criteria',$data,'');
		}		
	}
		
}
?>
