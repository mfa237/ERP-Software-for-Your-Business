<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
		// $setting['dlgCols']=array( 
			// array("fieldname"=>"city_id","caption"=>"Kode","width"=>"80px"),
			// array("fieldname"=>"city_name","caption"=>"Kota","width"=>"200px")
		// );
		// $setting['dlgRetFunc']="$('#'+idd).val(row.city_id+' - '+row.city_name);";

class List_of_values
{
	function __construct(){
	 $this->CI =& get_instance();
	 $this->CI->load->helper('mylib');	 
	}
	function render($setting){
		$bind_id=$setting['dlgBindId'];
		//$setting['dlgCols']
		if(!isset($setting['dlgTitle'])) $setting['dlgTitle']="Daftar Pilihan";
		if(!isset($setting['dlgId'])) $setting['dlgId']=$bind_id;
		if(!isset($setting['dlgWidth'])) $setting['dlgWidth']="450px";
		if(!isset($setting['dlgHeight'])) $setting['dlgHeight']="300px";
		if(!isset($setting['dlgTool'])) $setting['dlgTool']="tb".$bind_id;		
		$dlgId=$setting['dlgId'];
		if(!isset($setting['dlgUrlQuery']))$setting['dlgUrlQuery']=base_url()."index.php/lookup/query/$dlgId/";
		return load_view('frmLov',$setting);
	}
}
?>