<?php
class Paycheck_sal_com_model extends CI_Model {

	private $primary_key='id';
	private $table_name='hr_paycheck_sal_comp';
	public $employee_id="";
	public $paycheck_no="";
	private $group="";
	private $gaji_pokok=0;
	
	function __construct(){
		parent::__construct();
		$this->load->model('payroll/employee_model');
	}
	function get_by_id($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
	function get_id($pay_no,$kode){
		$id=null;
		$this->db->select("id")->where("pay_no",$pay_no);
		$this->db->where("salary_com_code",$kode);
		if($rec=$this->db->get($this->table_name)) {
			if($row=$rec->row()){
				$id=$row->id;
			}
		}
		return $id;
	}

	function save($data){
		$this->pay_no=$data['pay_no'];
		$id=$this->db->insert($this->table_name,$data);
		return $id;
	}
	function update($id,$data){
		$this->pay_no=$data['pay_no'];
		$id=$this->db->where("id",$id);
		$this->db->update($this->table_name,$data);
		return $id;
	}
	function delete($kode){
		$this->db->where($this->primary_key,$kode);
		return $this->db->delete($this->table_name);
	}
	function init(){
		if($this->group==""){
			if($emp=$this->employee_model->get_by_id($this->employee_id)->row()){
				$this->group=$emp->emptype;
				$this->gaji_pokok=$emp->gp;
			}
		}		
	}
	function com_list($jenis,$is_absensi=0){
		$sql="select c.no_urut,c.salary_com_code,c.formula_string,
		c.take_home_pay,t.keterangan  as salary_com_name,c.id
		from hr_emp_level_com c
		left join hr_jenis_".$jenis." t on t.kode=c.salary_com_code
		where c.level_code='".$this->group."' and t.keterangan is not null 
		and t.is_absensi=$is_absensi
		order by c.no_urut";
		$data=null;
		if($q=$this->db->query($sql)){
			foreach($q->result() as $row){
				if($row->salary_com_code!=""){
				$data[]=array('no_urut'=>$row->no_urut,
					'salary_com_code'=>$row->salary_com_code,
					'salary_com_name'=>$row->salary_com_name,
					'formula_string'=>$row->formula_string,
					'take_home_pay'=>$row->take_home_pay,
					'id'=>$row->id,
					'amount'=>$this->value($row->salary_com_code)
					);
				}
			}
		}
		return $data;		
	}
	function tunjangan_list(){ return $this->com_list('tunjangan',0); }
	function potongan_list(){ return $this->com_list('potongan',0); }
	function absensi_list(){  return $this->com_list('tunjangan',1); }
	function value($com_code){
		if($this->paycheck_no<>""){
			$this->db->select("org_value")->where("pay_no",$this->paycheck_no);
			$this->db->where("salary_com_code",$com_code);
			if($rec=$this->db->get($this->table_name)->row()) {
				$val= $rec->org_value;
			} else {
				$val= 0;
			}			
			if($val==0 && $com_code=='G_POKOK')$val=$this->gaji_pokok;
			return $val;
		} 
	}
	function recalc($pay_no="",$group=''){		
		if($pay_no<>"")$this->paycheck_no=$pay_no;
		if($group<>"")$this->group=$group;
		$vars=null;
		if($this->paycheck_no<>"" and $this->group<>""){
			if($com_list=$this->db->query("select c.salary_com_code,c.org_value,
				c.calc_value,e.formula_string 
				from hr_paycheck_sal_comp c 
				left join hr_emp_level_com e on e.salary_com_code=c.salary_com_code
				where e.level_code='$this->group' and c.pay_no='$this->paycheck_no'
				order by e.no_urut")) {
				foreach($com_list->result() as $com){
					$formula_string=$com->formula_string;
					$tmp="$$com->salary_com_code=$com->org_value;";
					eval($tmp);
					if($formula_string<>""){
						eval("$$com->salary_com_code=$formula_string;");
					}
					$tmp="return $$com->salary_com_code;";
					$vars[$com->salary_com_code]=eval($tmp);
				}	
			}
		}
		if($vars){
			foreach ($vars as $key => $value) {
				$this->db->query("update hr_paycheck_sal_comp 
				set org_value=".$value." where salary_com_code='".$key."' 
				and pay_no='$this->paycheck_no'");
			}
		}
	}
}