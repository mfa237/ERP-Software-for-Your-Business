<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('add_date')){	
	function add_date($givendate,$day=0,$mth=0,$yr=0) {
		  $cd = strtotime($givendate);
		  $newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
		date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
		date('d',$cd)+$day, date('Y',$cd)+$yr));
		  return $newdate;
	}
}
if(!function_exists('add_log_run')){	
	function add_log_run($url){
        $CI =& get_instance();
		$data['user_id']=$CI->access->user_id();
		$data['url']=$url;
		$data['controller']=$CI->uri->segment(1);
		$data['method']=$CI->uri->segment(2);
		$data['param1']=$CI->uri->segment(3);
		$CI->db->insert("sys_log_run",$data);
		//var_dump(mysql_error());
	}
}



if(!function_exists('account')){	
	function account($account_id){
        $CI =& get_instance();
        $query=$CI->db->query("select account,account_description from chart_of_accounts 
        where id='$account_id'")->row();
		if($query){
			return $query->account." - ".$query->account_description;
		} else {
			return "";
		}
	}
}

if(!function_exists('criteria')){	
	function criteria($capt,$fld,$cls='easyui-input'){
		$fnc=new search_criteria();
		$fnc->caption=$capt;
		$fnc->field_id=$fld;
		$fnc->field_class=$cls;
		return $fnc;
	}
}
if(!function_exists('link_button')){
    function link_button($caption,$func,$icon='',$plain='true',$url='',$title=''){
    	if($url==''){
	        return '<a href="#" class="easyui-linkbutton" 
	        data-options="iconCls:\'icon-'.$icon.'\', 
	        plain: '.$plain.'" onclick="'.$func.';return false;">'.$caption.'</a>';
		} else {
	        return '<a href="'.$url.'" class="easyui-linkbutton" 
	        data-options="iconCls:\'icon-'.$icon.'\', 
	        plain: '.$plain.'"  " >'.$caption.'</a>';			
		}
    }
}

if(!function_exists('datasource')){
    function datasource($sql){
        $CI =& get_instance();
        $query=$CI->db->query($sql);
		$rows=null;
		if($query){ 
	        foreach($query->result_array() as $row){
	            $rows[]=$row;
	        };
		}
        $data['total']=count($rows);
        $data['rows']=$rows;
                    
        return json_encode($data);
    }
}
if(!function_exists('is_ajax')){ 
function is_ajax()
 {
    $CI =& get_instance();
 	return (
	 $CI->input->server('HTTP_X_REQUESTED_WITH')&&
	 ($CI->input->server('HTTP_X_REQUESTED_WITH')=='XMLHttpRequest'));
 }
}
if ( ! function_exists('valid_date')) {
	function valid_date($str)
	{
         $CI =& get_instance();
	 if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',$str))
	 {
		 $CI->form_validation->set_message('valid_date',
		 'date format is not valid. yyyy-mm-dd');
		 return false;
	 } else {
	 	return true;
	 }
	}
}  
if ( ! function_exists('strzero')) {
	function strzero($input,$len){
		return str_pad($input,$len, "0", STR_PAD_LEFT );  
	}
}
if(!function_exists('company_header')){
    function company_header(){
         $CI =& get_instance();
         $CI->load->model('company_model');
         $model=$CI->company_model->get_by_id($CI->access->cid)->row();
		 $data='';
		 if($model){
         	$data='<div id="divHeader"><h1>'.$model->company_name."</h1><h3>".$model->street
                 ."<br/>".$model->suite." ".$model->city_state_zip_code
                 ." - Phone: ".$model->phone_number.'</h3>
                     </div>';
         };
        return $data;
    }
}
if(!function_exists('getColoumn')){
function getColoumn($table) { 
     $result = mysql_query("SHOW COLUMNS FROM ". $table); 
      if (!$result) { 
        echo 'Could not run query: ' . mysql_error(); 
      } 
      $fieldnames=array(); 
      if (mysql_num_rows($result) > 0) { 
        while ($row = mysql_fetch_assoc($result)) { 
          $fieldnames[] = $row['Field']; 
        } 
      } 

      return $fieldnames; 
} 
}
if(!function_exists('data_table')){
function data_table($table,$record=null,$is_sql=false){
    $CI =& get_instance();
	$data='';
    if($record){
        foreach ($record as $key => $value) {
            $data[$key]=$value;
        }
    } else {
		$result_id=0;
        if($is_sql){
			$q=$CI->db->query($table);
			if($q)$result_id=$q->result_id;
        } else {
//			$fields=getColoumn($table);
//			var_dump($fields);
			$q=$CI->db->get($table,1);
			echo mysql_error();
			if($q)$result_id=$q->result_id;
        }
		if($result_id){	
			$count = mysql_num_fields($result_id);
			for($i=0;$i<=$count-1;$i++){
				$type=mysql_field_type($result_id, $i);
				$name=mysql_field_name($result_id, $i);
				$len=mysql_field_len($result_id, $i);
		//            $flags = mysql_field_flags($result, $i);
					switch ($type) {
						case 'datetime':
							$val=date('Y-m-d');
							break;
						case 'string':
							$val='';
							break;
						default:
							$val=0;
							break;
					}
				$data[$name]=$val;    
			}   
		}
    }
        
    return $data;
}
if(!function_exists('data_table_post')){
function data_table_post($table,$is_sql=false){
    $CI =& get_instance();

        if($is_sql){
            $result_id=$CI->db->query($table)->result_id;                
        } else {
            $result_id=$CI->db->get($table,1)->result_id;
        }
    
    $count = mysql_num_fields($result_id);
    for($i=0;$i<=$count-1;$i++){
        $type=mysql_field_type($result_id, $i);
        $name=mysql_field_name($result_id, $i);
        $len=mysql_field_len($result_id, $i);
//            $flags = mysql_field_flags($result, $i);
            switch ($type) {
                case 'datetime':
                    $val=date('Y-m-d');
                    if(isset($_POST[$name])){
                        $data[$name]=$CI->input->post($name);
                    } else {
                        $data[$name]=$val;
                    }
                    break;
                case 'string':
                    $val='';
                    if(isset($_POST[$name])){
                        $data[$name]=$CI->input->post($name);    
                    } else {
                        $data[$name]='';
                    }
                    break;
                default:
                    $val=0;
                    if(isset($_POST[$name])){
                    	if($_POST[$name]!="") $val=$data[$name]=$CI->input->post($name);
                    }
                    $data[$name]=$val;
                    break;
            }
    }   
    return $data;
}}

                
if(!function_exists('data_table_get')){
function data_table_get($table,$is_sql=false){
    $CI =& get_instance();
    
        if($is_sql){
            $result_id=$CI->db->query($table)->result_id;
                
        } else {
            $result_id=$CI->db->get($table,1)->result_id;
        }

    $count = mysql_num_fields($result_id);
    for($i=0;$i<=$count-1;$i++){
        $type=mysql_field_type($result_id, $i);
        $name=mysql_field_name($result_id, $i);
        $len=mysql_field_len($result_id, $i);
//            $flags = mysql_field_flags($result, $i);
            switch ($type) {
                case 'datetime':
                    $val=date('Y-m-d');
                    if(isset($_GET[$name])){
                        $data[$name]=$CI->input->post($name);
                    } else {
                        $data[$name]=$val;
                    }
                    break;
                case 'string':
                    $val='';
                    if(isset($_GET[$name])){
                        $data[$name]=$CI->input->post($name);    
                    } else {
                        $data[$name]='';
                    }
                    break;
                default:
                    $val=0;
                    if(isset($_GET[$name])){
                        $data[$name]= (int)$CI->input->post($name);    
                    } else {
                        $data[$name]=$val;
                    }
                    break;
            }
    }   
    return $data;
}}
if (!function_exists("load_view")){
    function load_view($viewName,$data = array()){
 
        $CI = & get_instance();
 
        $content = $CI->load->view($viewName,$data,true);
 
        return $content;
    }
}
}                    
?>
