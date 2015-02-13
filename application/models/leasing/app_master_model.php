<?php
class App_master_model extends CI_Model {

	private $primary_key='app_id';
	private $table_name='ls_app_master';

	function __construct(){
		parent::__construct();
		
	}
	function get_paged_list($limit=10,$offset=0,$order_column='',$order_type='asc')	{
		$nama='';
		if(isset($_GET['cust_name']))$nama=$_GET['cust_name'];
		if($nama!='')$this->db->where("cust_name like '%$nama%'");

		if (empty($order_column)||empty($order_type))
			$this->db->order_by($this->primary_key,'asc');
		else
			$this->db->order_by($order_column,$order_type);
			
		return $this->db->get($this->table_name,$limit,$offset);
	}
	function count_all(){
		return $this->db->count_all($this->table_name);
	}
	function get_by_id($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
	function save($data){
		$data['app_date']=date('Y-m-d H:i:s', strtotime($data['app_date']));
		$data['create_by']=$this->access->user_id();
		$data['create_date']=date('Y-m-d H:i:s', strtotime($data['create_date']));
		return $this->db->insert($this->table_name,$data);            
	}
	function update($id,$data){
		$data['app_date']=date('Y-m-d H:i:s', strtotime($data['app_date']));
		$data['update_by']=$this->access->user_id();
		$this->db->where($this->primary_key,$id);
		return  $this->db->update($this->table_name,$data);
	}
	function delete($id){
		$numrow=$this->db->count_all("ls_loan_master where app_id='$id'");
		if($numrow>0){
			return false;
		}
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table_name);
		$this->db->where("app_id",$id)->delete("ls_app_object_items");
		return true;
	}

	function save_cust_master($data){
		$cm['cust_id']='';	
		$cm['cust_name']='';
		$cm['street']='';
		$cm['first_name']='';
		$cm['rtrw']='';
		$cm['call_name']='';
		$cm['kel']='';
		$cm['kec']='';
		$cm['id_card_no']='';
		$cm['id_card_exp']='';
		$cm['city']='';
		$cm['zip_pos']='';
		$data['mother_name']='';
		$data['spouse_name']='';
		$data['spouse_birth_date']='';
		$data['spouse_phone']='';
		$data['spouse_birth_place']='';

		$this->db->insert('ls_cust_master',$card1);
		$cm['cust_id']='';
		$data['gender']='';
		$data['birth_place']='';
		$data['house_status']='';
		$data['marital_status']='';
		$data['no_of_dependents']='';
		$this->db->insert('ls_cust_personal',$card1);


		$cm['cust_id']='';
		$data['cs1_street']='';
		$data['cs1_rtrw']='';
		$data['cs1_kel']='';
		$data['cs1_kec']='';
		$data['cs1_city']='';
		$data['cs1_zip_pos']='';
		$data['cs1_lama_thn']='';
		$data['cs1_lama_bln']='';
		$this->db->insert('ls_cust_ship_to',$card1);

		$cm['cust_id']='';
		$data['cs2_street']='';
		$data['cs2_rtrw']='';
		$data['cs2_kel']='';
		$data['cs2_kec']='';
		$data['cs2_city']='';
		$data['cs2_zip_pos']='';
		$data['cs2_phone']='';
		$data['cs2_hp']='';
		$this->db->insert('ls_cust_ship_to',$card1);

		$data['comp_name']='';
		$data['job_status']='';
		$data['bussiness_type']='';
		$data['job_status_etc']='';
		$data['since_year']='';
		$data['job_level']='';
		$data['com_street']='';
		$data['job_type']='';
		$data['com_rtrw']='';
		$data['job_type_etc']='';
		$data['com_kel']='';
		$data['comp_desc']='';
		$data['com_kec']='';
		$data['emp_status']='';
		$data['com_city']='';
		$data['emp_status_etc']='';
		$data['total_employee']='';
		$data['com_contact_phone']='';
		$data['office_status']='';
		$data['phone_ext']='';
		$data['office_status_etc']='';
		$data['spv_name']='';

		$data['salary']='';
		$data['com_zip_pos']='';
		$this->db->insert('ls_cust_company',$card1);

		$data['fam_first_name']='';
		$data['salary_source']='';
		$data['fam_relation']='';
		$data['spouse_salary']='';
		$data['fam_street']='';
		$data['spouse_salary_source']='';
		$data['fam_city']='';
		$data['other_income']='';
		$data['fam_kel']='';
		$data['other_income_source']='';
		$data['fam_kec']='';
		$data['deduct']='';
		$data['fam_zip_pos']='';
		$data['deduct_source']='';
		$data['fam_contact_phone']='';
		$this->db->insert('ls_cust_family',$card1);

		$card1['cd1_card_no']='';
		$card1['cd1_card_bank']='';
		$card1['cd1_card_exp']='';
		$card1['cd1_card_type']='';
		$card1['cd1_card_type_etc']='';
		$card1['cd1_card_limit']='';
		$card1['cust_id']='';
		$this->db->insert('ls_cust_crcard',$card1);

		$card2['cd2_card_no']='';
		$card2['cd2_card_bank']='';
		$card2['cd2_card_exp']='';
		$card2['cd2_card_type']='';
		$card2['cd2_card_type_etc']='';
		$card2['cd2_card_limit']='';
		$card2['cust_id']='';
		$this->db->insert('ls_cust_crcard',$card2);

		$data['app_id']='';
		$data['dealer_name']='';
		$data['dealer_id']='';
		$data['dp_amount']='';
		$data['insr_amount']='';
		$data['admin_amount']='';
		$data['inst_amount']='';
		$data['inst_month']='';

		$data['loan_amount']='';
		$this->db->insert('ls_cust_crcard',$card2);

		$data['app_id']='';
		$data['oid']='';
		$data['obj_id']='';
		$data['obj_name']='';
		$data['obj_amount']='';
		$data['obj_merk']='';
		$this->db->insert('ls_app_object_items',$card2);
		
	}
	function not_verified(){
		$sql="select lam.app_id,lam.app_date,lam.cust_id,c.cust_name
			from ls_app_master lam 
			left join ls_cust_master c on c.cust_id=lam.cust_id
			where lam.verified='0'";
		$s="";	
		if($q=$this->db->query($sql)){
			$s="<table class='table2' style='width:100%'>
				<thead><tr>
				<th>Nomor</th><th>Tanggal</th><th>Kode</th><th>Debitur</th>
				</tr></thead>
				<tbody>
			";
			foreach($q->result() as $row){
				$s.="<tr><td>
					<a href='#' onclick=\"step1('".$row->app_id."');
					return false\" >".$row->app_id."</a></td>
				
				<td>".$row->app_date."</td>
				<td>".$row->cust_id."</td><td>".$row->cust_name."</td></tr>";
			}
			$s.="</tbody></table>";
			
		}
		return $s;
	}
	function not_scored(){
		$sql="select lam.app_id,lam.app_date,lam.cust_id,c.cust_name
			from ls_app_master lam 
			left join ls_cust_master c on c.cust_id=lam.cust_id
			where lam.scored='0' and lam.verified=1";
		$s="";	
		if($q=$this->db->query($sql)){
			$s="<table class='table2' style='width:100%'>
				<thead><tr>
				<th>Nomor</th><th>Tanggal</th><th>Kode</th><th>Debitur</th>
				<th>View SPK</th><th>View CST</th>
				</tr></thead>
				<tbody>
			";
			foreach($q->result() as $row){
				$s.="<tr><td>
					<a href='#' onclick=\"step1('".$row->app_id."');
					return false\" >".$row->app_id."</a></td>
				
				<td>".$row->app_date."</td>
				<td>".$row->cust_id."</td><td>".$row->cust_name."</td>
				<td>
					<a href='#' onclick=\"view_spk('".$row->app_id."');
					return false\" >View App</a>
				</td>				
				<td>
					<a href='#' onclick=\"view_cust('".$row->cust_id."');
					return false\" >View Cust</a>
				</td>				
				
				</tr>";
			}
			$s.="</tbody></table>";
			
		}
		return $s;
	}
	function not_surveyed(){
		$sql="select lam.app_id,lam.app_date,lam.cust_id,c.cust_name,cn.area
			from ls_app_master lam 
			left join ls_cust_master c on c.cust_id=lam.cust_id
			left join ls_counter cn on cn.counter_id=lam.counter_id
			where lam.status<>'' and lam.score_value>75 and lam.verified=1 and lam.surveyed=0";
		$s="";	
		if($q=$this->db->query($sql)){
			$s="<table class='table2' style='width:100%'>
				<thead><tr>
				<th>Pilih</th><th>Tanggal</th><th>Nomor SPK</th><th>Kode</th><th>Debitur</th>
				<th>Area</th><th>Tgl Survey</th><th>Surveyor</th>
				</tr></thead>
				<tbody>
			";
			$surveyor_list=array(""=>"- Pilih -");
			if($qs=$this->db->query("select user_id,username from user order by username")){
				foreach($qs->result() as $surv){
					$surveyor_list[$surv->user_id]=$surv->username;
				}
			}
			$i=0;
			foreach($q->result() as $row){
				$s.="<tr><td>
					<input type='checkbox' value='".$row->app_id."' name='pilih[".$i++."]'></td>
				<td>".$row->app_id."</td>
				<td>".$row->app_date."</td>
				<td>".$row->cust_id."</td><td>".$row->cust_name."</td>
				<td>".$row->area."</td>
				<td><input type='text' value='".date('Y-m-d H:i:s')."' name='tanggal[]' class='easyui-datetimebox'></td>
				<td>".form_dropdown("surveyor[]",$surveyor_list)."</td>
				</tr>";
			}
			$s.="</tbody></table>";
			
		}
		return $s;
	}
	function surveyed(){
		$sql="select distinct lam.app_id,lam.app_date,lam.cust_id,c.cust_name,cn.area
			,las.survey_by
			from ls_app_master lam 
			left join ls_cust_master c on c.cust_id=lam.cust_id
			left join ls_counter cn on cn.counter_id=lam.counter_id
			left join ls_app_survey las on las.app_id=lam.app_id
			where lam.score_value>50 and lam.verified=1 
			and lam.surveyed=1 and las.recomended=0";
		$s="";	
		if($q=$this->db->query($sql)){
			$s="<table class='table2' style='width:100%'>
				<thead><tr>
				<th>Nomor SPK</th><th>Tanggal</th><th>Kode</th><th>Debitur</th>
				<th>Area</th><th>Surveyor<th>Pilih?</th>
				</tr></thead>
				<tbody>
			";
			foreach($q->result() as $row){
				$s.="<tr>
				<td><a href='#' onclick=\"view_spk('".$row->app_id."');return false;\" >".$row->app_id."</a></td>
				<td>".$row->app_date."</td>
				<td>".$row->cust_id."</td><td>".$row->cust_name."</td>
				<td>".$row->area."</td>
				<td>".$row->survey_by."</td>
				<td><input type='checkbox' value='".$row->app_id."' name='pilih[]' ></td>
				</tr>";
			}
			$s.="</tbody></table>";
			
		}
		return $s;
	}	
	function not_approved($show_checkbox=true){
		$sql="select distinct lam.app_id,lam.app_date,lam.cust_id,c.cust_name,cn.area
			,las.survey_by
			from ls_app_master lam 
			left join ls_cust_master c on c.cust_id=lam.cust_id
			left join ls_counter cn on cn.counter_id=lam.counter_id
			left join ls_app_survey las on las.app_id=lam.app_id
			where lam.score_value>50 and lam.verified=1 
			and lam.surveyed=1 and las.recomended=1 and lam.approved=0";
		$s="";	
		if($q=$this->db->query($sql)){
			$s1="<table class='table2' style='width:100%'>
				<thead><tr>
				<th>Nomor SPK</th><th>Tanggal</th><th>Kode</th><th>Debitur</th>
				<th>Area</th><th>Surveyor</th>";
			if($show_checkbox) $s1.="<th>Approve ?</th>";
			$s1.="</tr></thead>
				<tbody>
			";
			$s2="";
			foreach($q->result() as $row){
				$s2.="<tr>
				<td><a href='#' onclick=\"view_spk('".$row->app_id."');return false;\" >".$row->app_id."</a></td>
				<td>".$row->app_date."</td>
				<td>".$row->cust_id."</td><td>".$row->cust_name."</td>
				<td>".$row->area."</td>
				<td>".$row->survey_by."</td>";
				if($show_checkbox){
					$s2.="<td><input type='checkbox' value='".$row->app_id."' name='pilih[]' ></td>";
				}
				$s2.="</tr>";
			}
			$s3 ="</tbody></table>";
			if($s2==""){
				$s="<strong><i>Belum ada nomor SPK yang akan 
				diproses selanjutnya.</i></strong>";
			} else {
				$s .= $s1 . $s2 . $s3;
			}
			
		}
		return $s;
	}		
	function copy_to_loan($app_id,$data){
		$loan_id=$data['loan_id'];
		$loan_date=date('Y-m-d H:i:s', strtotime($data['loan_date']));
		$app_id=$data['app_id'];
		$s="insert into ls_loan_master(
			loan_id,loan_date,app_id,
			cust_id,cust_name,loan_amount,max_month,inst_amount,
			first_dealer_id,interest_percent,dp_percent,dealer_id,
			dealer_name) 
		select '$loan_id' as loan_id,'$loan_date' as loan_date, lam.app_id,
		lam.cust_id,cm.cust_name,lam.loan_amount,lam.inst_month,lam.inst_amount,
		lam.counter_id,lam.rate_prc,lam.dp_prc,lam.counter_id,
		lc.counter_name 
		from ls_app_master lam 
		left join ls_cust_master cm on cm.cust_id=lam.cust_id 
		left join ls_counter lc on lc.counter_id=lam.counter_id 
		where lam.app_id='$app_id'";
		$ok=$this->db->query($s);
		
		$s="insert into ls_loan_obj_items(
		loan_id,obj_item_id,qty,unit,price,amount,
		obj_desc,dp,dp_amount,aft_dp_amount,
		bunga,bunga_amount,loan_amount,tenor,aft_tenor,angsuran) 
		select '$loan_id' as loan_id,i.obj_id,i.qty,'Pcs' as unit,
		i.price,i.amount,i.description,i.dp,i.dp_amount,i.aft_dp_amount,
		i.bunga,i.bunga_amount,i.loan_amount,i.tenor,i.aft_tenor,i.angsuran
		from ls_app_object_items i 
		where i.app_id='$app_id'";
		$ok=$this->db->query($s);
		if(!$ok)var_dump(mysql_error());
		return $ok;
	}
	function list_scored_result() {
		$sql="select lam.app_id,lam.app_date,lam.cust_id,c.cust_name,cn.area,lam.score_value,lam.status
			from ls_app_master lam 
			left join ls_cust_master c on c.cust_id=lam.cust_id
			left join ls_counter cn on cn.counter_id=lam.counter_id
			where lam.status<>'' and lam.verified=1 and lam.scored=1 and lam.confirmed=0 and lam.surveyed=0";
		$s="";	
		if($q=$this->db->query($sql)){
			$s="<table class='table2' style='width:100%'>
				<thead><tr>
				<th>Pilih</th><th>Nomor SPK</th><th>Tanggal</th><th>Kode</th><th>Debitur</th>
				<th>Area</th><th>Score</th><th>Status</th>
				</tr></thead>
				<tbody>
			";
			foreach($q->result() as $row){
				$s.="<tr><td>
					<input type='checkbox' value='".$row->app_id."' name='pilih[]'></td>
				<td><a href='#' onclick='view_spk(\"".$row->app_id."\");return false;'>".$row->app_id."</a></td>
				<td>".$row->app_date."</td>
				<td>".$row->cust_id."</td><td>".$row->cust_name."</td>
				<td>".$row->area."</td>
				<td><a href='#' onclick='view_score(\"".$row->app_id."\");return false;'>".$row->score_value."</a></td>
				<td>".$row->status."</td>
				</tr>";
			}
			$s.="</tbody></table>";
			
		}
		return $s;	
	
	}
	
}
?>