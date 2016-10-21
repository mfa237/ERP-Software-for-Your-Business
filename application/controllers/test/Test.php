<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Test extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		echo $this->config->item('base_url');	
           echo " <h1>HALOO TEST</h1>";
            echo "<br>POST<br>";
            var_dump($_POST);
            echo "<br>GET<br>";
            var_dump($_GET);
            echo "<br>SESSION<br>";
            var_dump($_SESSION);
	}
	function test_eval(){
		$G=10000;
		eval('echo $G*2;');
		eval('$G_POKOK=200000;');
		eval('echo $G_POKOK*0.5;');
	}
 	function recalc(){
		if($com_list=$this->db->query("select c.salary_com_code,c.org_value,
			c.calc_value,e.formula_string 
			from hr_paycheck_sal_comp c 
			left join hr_emp_level_com e on e.salary_com_code=c.salary_com_code
			where e.level_code='GROUP1' and c.pay_no='SL00001'
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

}
