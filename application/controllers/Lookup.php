<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Lookup extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("mylib_helper");
	}
	function index(){	
	}
	function query($what,$search=''){
		$sql="";
		switch($what){
			case ("user_id"):
				$sql="select user_id,username from user";
				if($search!="")$sql.=" where username like '%$search%'";
				break;
			case ("salestype"):
				$sql="select groupid,komisiprc,remarks from salesman_group";
				if($search!="")$sql.=" where groupid like '%$search%'";
				break;
			
			case('city'):
				$sql="select city_id,city_name from city";
				if($search!="")$sql.=" where city_name like '%$search%'";
				break;
			case('salesman'):
				$sql="select salesman from salesman";
				if($search!="")$sql.=" where salesman like '%$search%'";
				break;
			case('payment_terms'):
				$sql="select type_of_payment from type_of_payment";
				if($search!="")$sql.=" where type_of_payment like '%$search%'";
				break;
			case('country'):
				$sql="select country_id,country_name from country";
				if($search!="")$sql.=" where country_name like '%$search%'";
				break;
			case('region'):
				$sql="select region_id,region_name from region";
				if($search!="")$sql.=" where region_name like '%$search%'";
				break;
			case('customer_record_type'):
				$sql="select type_id,type_name from customer_type";
				if($search!="")$sql.=" where type_name like '%$search%'";
				break;
			case('divisions'):
				$sql="select div_code,div_name from divisions";
				if($search!="")$sql.=" where div_name like '%$search%'";
				break;
			case('inventory'):
				$sql="select description,item_number from inventory";
				if($search!="")$sql.=" where description like '%$search%'";
				$sql.=" order by description";
				break;
			case("warehouse"):
				$sql="select location_number,address_type from shipping_locations";
				if($search!="")$sql.=" where location_number like '%$search%'";
				$sql.=" order by location_number";
				break;		
			case("inventory_sub_categories"):
			case("inventory_categories"):
				$sql="select kode,category from inventory_categories";
				if($search!="")$sql.=" where kode like '%$search%'";
				$sql.=" order by kode";
				break;		

			}
		if($sql==""){
			echo "<div class='alert alert-warning'>Invalid Query Check Controller Lookup.php !!!</div>";
		} else {
			echo datasource($sql);
		}
	}
 
}

?>