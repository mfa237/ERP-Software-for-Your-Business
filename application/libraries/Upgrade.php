<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upgrade
 {
 function __construct()
 {
	$this->CI =& get_instance();	 
 }
 function process(){
	$key="Flag [system_variables] change size";
	if( ! $this->CI->sysvar->getvar($key)){
		$s="delete from system_variables where varname like 'Flag [%';";
		$this->CI->db->query($s);
		
		$s="ALTER TABLE `system_variables`
			CHANGE COLUMN `varname` `varname` VARCHAR(250) NULL 
			DEFAULT NULL COLLATE 'utf8_general_ci' FIRST;";
			
		$this->CI->db->query($s);
			 
		$this->CI->sysvar->update($key,"1");			
	}
	
	$this->add_field("user","branch_code"); 
	$this->add_field("salesman","lock_report","INT NOT NULL DEFAULT '0' ");
	$this->create_unit_of_measure();
	$this->create_inventory_price_customers();
	$this->user_roles();
	$this->add_field("inventory","division"); 
	$this->add_field("inventory_moving","status"); 
	$this->add_field("inventory_moving","verify_by"); 
	$this->add_field("inventory_moving","verify_date","DATETIME"); 
	$this->add_field("inventory_categories","sales_disc_prc","double"); 
	$this->add_field("customers","disc_min_qty","double"); 
	$this->add_field("customers","markup_amount","double"); 
	$this->add_field("customers","discount_amount","double"); 
	$this->add_field("customers","disc_prc_2","double"); 
	$this->add_field("customers","disc_prc_3","double"); 
	
	$this->add_field("inventory_price_customers","cust_no"); 
	$this->add_field("inventory_price_customers","category"); 
	$this->add_field("inventory_price_customers","disc_amount","double"); 
	$this->add_field("inventory_price_customers","disc_prc_2","double"); 
	$this->add_field("inventory_price_customers","disc_prc_3","double"); 


	$this->add_field("fa_asset_group","warranty_date","datetime"); 

	$this->create_com_list();
	
	$this->add_field("promosi_item","from_date","datetime"); 
	$this->add_field("promosi_item","to_date","datetime"); 
	$this->add_field("promosi_item","disc_prc_1","double"); 
	$this->add_field("promosi_item","disc_prc_2","double"); 
	$this->add_field("promosi_item","disc_prc_3","double"); 
	$this->add_field("promosi_item","disc_type","int"); 
	$this->add_field("promosi_item","min_qty","double"); 

	$key="Flag [hr_shift] change time_in,time_out";
	if( ! $this->CI->sysvar->getvar($key)){
		$s="ALTER TABLE `hr_shift`
			CHANGE COLUMN `time_in` `time_in` VARCHAR(50) NULL, 
			CHANGE COLUMN `time_out` `time_out` VARCHAR(50) NULL 
			DEFAULT NULL COLLATE 'utf8_general_ci' FIRST;";
			
		$this->CI->db->query($s);
			 
		$this->CI->sysvar->update($key,"1");			
	}

	$this->add_field("promosi_item","extra_items","nvarchar(250)"); 
	$this->add_field("promosi_item","item_type","nvarchar(50)"); 
	$this->add_field("syslog","no_bukti","nvarchar(50)"); 
	$this->add_field("syslog","id","INT NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (id)"); 
	$this->add_field("syslog","jenis_cmd","nvarchar(50)"); 
	
	$this->add_field("shipping_locations","no_urut","int"); 
	
 }
 function create_com_list(){
 	$fields[]="com_code varchar(50)";
 	$fields[]="com_db_name varchar(50)";
 	$fields[]="com_url varchar(150)";
 	$fields[]="com_short_desc varchar(250)";
 	$fields[]="com_long_desc varchar(550)";
 	$fields[]="com_logo varchar(150)";
	$this->create_table("com_list",$fields);
}
	   
 function user_roles(){
 	$fields[]="user_id varchar(50)";
	$fields[]="roles_type varchar(50)";
	$fields[]="roles_item varchar(50)";
	$fields[]="roles_value1 double";
	$fields[]="roles_value2 double";
	$fields[]="description varchar(250)";
	$this->create_table("user_roles",$fields);
 }
 function create_inventory_price_customers()
 {
	$fields[]="item_no varchar(50)";
	$fields[]="cust_type varchar(50)";
	$fields[]="sales_price double";
	$fields[]="disc_prc_from double";
	$fields[]="min_qty double";
	$fields[]="disc_prc_to double";
	$fields[]="description varchar(200)";
	$this->create_table("inventory_price_customers",$fields);
 }
 function create_unit_of_measure(){
 	$fields[]="from_unit varchar(50)";
	$fields[]="to_unit varchar(50)";
	$fields[]="unit_value double";
	$this->create_table("unit_of_measure",$fields);
 }
 function create_table($table,$fields)
 {
	$key="Flag [$table] add table";
	$ok=false;
	$ok=$this->CI->sysvar->getvar($key);
	if($ok=="")$ok=false;
	if( !$ok ){
		$this->CI->load->dbforge();
		for($i=0;$i<count($fields);$i++)
		{
			$fields2[]=$fields[$i];
		}
		$this->CI->dbforge->add_field($fields2);
		$this->CI->dbforge->add_field("id");
		$this->CI->dbforge->create_table($table,TRUE);
		$this->CI->sysvar->update($key,"1");		
	}
 }
 function add_field($table,$field,$type="varchar(50)")
 {
	$key="Flag [$table] add field [$field]";
	if( ! $this->CI->sysvar->getvar($key)){
		$fields=$this->CI->db->query("DESCRIBE ".$table)->result();
		$exist=false;
		for($i=0;$i<count($fields);$i++)
		{
			if($fields[$i]->Field==$field){
				$exist=true;
			}
		}
		if(!$exist){
			$s="ALTER TABLE `$table` ADD COLUMN `$field` $type ; "; 
			if($this->CI->db->query($s)){
				$this->CI->sysvar->update($key,"1");
			}
		} else {
			 
			$this->CI->sysvar->update($key,"1");			
		}
	} else {
		 
	}
 }
}
