<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if ( ! function_exists('browse_select'))
{
    function browse_select($sql_array,$caption='',$class='',
            $field_key='',$offset=0,$limit=20
            ,$order_column='',$order_type='asc',$show_action=true)
    {
        $fields_input='';
        $sql=$sql_array;
        $action_button='<input type="button" value="Del" 
                 onclick="del_row(\'#'.$field_key.'\');return false;"/>';
        $hidden=''; 
		$fields_sum='';
        if(is_array($sql_array)){
           $sql=$sql_array['sql'];
           if(isset($sql_array['caption']))$caption=$sql_array['caption'];
           if(isset($sql_array['class']))$class=$sql_array['class'];
           if(isset($sql_array['field_key']))$field_key=$sql_array['field_key'];
           if(isset($sql_array['offset']))$offset=$sql_array['offset'];
           if(isset($sql_array['limit']))$limit=$sql_array['limit'];
           if(isset($sql_array['order_column']))$order_column=$sql_array['order_column'];
           if(isset($sql_array['order_type']))$order_type=$sql_array['order_type'];
           if(isset($sql_array['show_action']))$show_action=$sql_array['show_action'];
           if(isset($sql_array['action_button']))$action_button=$sql_array['action_button'];
           if(isset($sql_array['fields_input']))$fields_input=$sql_array['fields_input'];
           if(isset($sql_array['hidden']))$hidden=$sql_array['hidden']; 
           if(isset($sql_array['fields_sum']))$fields_sum=$sql_array['fields_sum']; 
           if(isset($sql_array['group_by']))$group_by=$sql_array['group_by']; 
		   
        };
        
        //echo '<script src="'.base_url().'public/js/browse.js"></script>';
        //echo '<script src="'.base_url().'public/ui/jquery-1.8.0.min.js"></script>';
        $CI =& get_instance();
        $CI->load->library('template');
        $CI->load->library('table');
        $i=0+$offset;        
        $query=$CI->db->query($sql.' limit 1');
        $result = mysql_query($sql.' limit 1');
        $count = mysql_num_fields($result);
        $type[0]='';$flds[0]='';            
        for ($i=0; $i < $count; $i++) {
            $type[$i]  = mysql_field_type($result, $i);
            $flds[$i]  = mysql_field_name($result, $i);
            $len   = mysql_field_len($result, $i);
            $flags = mysql_field_flags($result, $i);
            //echo $type . " " . $name . " " . $len . " " . $flags . "\n";
        }

        $where='';
        for($i=0;$i<$count;$i++){
            $fld=$flds[$i];
			$lhide=false;
			if(is_array($hidden)){
				for($j=0;$j<count($hidden);$j++){
					if(strcasecmp($hidden[$j], $fld)==0 ){
						$lhide=true;
					}
				}
			}
            
            $fld=ucfirst(str_replace('_',' ',$fld));
            
            if(!$lhide)  $flds2[$i]=$fld;
            
            
            if(isset($_GET[$flds[$i]])){
                $val=$_GET[$flds[$i]];
            } else {
                $val='';
            }
            
            $flds_input[$i]='<input id="'.$flds[$i].'"/>';
             
            if(isset($_GET[$flds[$i]])){
                $where=$where.' '.$flds[$i].' like \''.$_GET[$flds[$i]].'%\' and ';
            }
        }
        //echo $where;
        if($caption=='')$where='';
        if($where!=''){
            $where=substr($where,0,strlen($where)-4);
            if(preg_match('/ where /',$sql)){
                $sql=$sql.' AND '.$where;
            } else {
                $sql=$sql.' WHERE '.$where;                
            }
            if($order_column!='') $sql=$sql.' ORDER BY '.$order_column.' '.$order_type;
            $sql=$sql.' limit '.$offset*$limit.', '.$limit;
            $query=$CI->db->query($sql);
        } else {
            if($order_column!='') $sql=$sql.' ORDER BY '.$order_column.' '.$order_type;
            $sql=$sql.' limit '.$offset*$limit.', '.$limit;
            $query=$CI->db->query($sql);
            
        }
        //echo $sql;
        if($show_action){ 
            if($caption!='')$flds2[$i++]='Action';else $flds2[$i++]='Act';
        }
        $CI->table->set_heading($flds2);
        $j=0;
		if(is_array($fields_sum)){
			for($j=0;$j<count($fields_sum);$j++){
				$fields_sum_value[$fields_sum[$j]]=0;
			}
		}
      
        foreach($query->result_array() as $row){
             
            for($i=0;$i<$count;$i++){
                $fld=$flds[$i];
                $lhide=false;
                if(is_array($hidden)){
                    for($j=0;$j<count($hidden);$j++){
                        if(strcasecmp($hidden[$j], $fld)==0 ){
                            $lhide=true;
                            break;
                        }
                    }
                }
                if(!$lhide){
                    if($type[$i]=='real'){
                        $newrow[$i]= '<div align="right">'.number_format($row[$fld]).'</div>';
                    } else {
                        $newrow[$i]=$row[$fld];
                    }
                    if(is_array($fields_input)){
                       for($j=0;$j<count($fields_input);$j++){                            
                           if($fld==$fields_input[$j]){
                              $newrow[$i]='<input id="'.$fld.$i.'" value="'.$row[$fld].'" style="width:50px"/>';
                           }
                       }
                    }
                }
				if(is_array($fields_sum)){
					for($j=0;$j<count($fields_sum);$j++){
						if(strcasecmp($fields_sum[$j],$fld)==0){
							$fields_sum_value[$fld]=$fields_sum_value[$fld]+$row[$fld];
							break;
						}
					}
				}
            }
            if($field_key=='') $key=$row[$flds[0]];else $key=$row[$field_key];

           if($caption!=''){
                $newrow[$i++]='
                <input id="txtQty'.$j.'" style="width:30px" value="1"/>    
                <input type="button" value="Add" 
                onclick="add_row(\''.$j.'\',\''.$key.'\');return false;"/>';
           } else {
               if($show_action){
                    $button=str_replace('#'.$field_key,$key, $action_button);
                    $button=str_replace('#',$key, $action_button);
                   
                    $newrow[$i++]=$button;
               }
           }
            
            $CI->table->add_row($newrow);
            $j++;    
            $i++;
        };
		$s="";
		for($i=0;$i<$count;$i++){
			$fld=$flds[$i];
			if(isset($fields_sum_value[$fld])){
				$s[$i]='<div align="right"><strong>'.number_format($fields_sum_value[$fld]).'</strong></div>';
			} else {
				$s[$i]="";
			}
		}
        $CI->table->add_row($s);
		
		
        $tmpl=$CI->template->template_table('titem');
        $CI->table->set_template($tmpl);
        $retval=$CI->table->generate();
        
        $CI->load->library('pagination');
        $config['base_url']=site_url('browse');
        $config['total_rows']=$i;
        $config['per_page']=10;
        $config['uri_segment']=3;
        $CI->pagination->initialize($config);
        $link=$CI->pagination->create_links();
        if($caption==''){
            $s='';
        } else {
        $s='
            <div id="divBrowse" >
            Rows <input id="txtLimit" value="'.$limit.'" style="width:50px"/>
            <strong>Search</strong>&nbsp
            <input id="txtSearch" name="txtSearch"/>
            <input type="button" onclick="b_search();return false;" value="Search"/>
            </div>
            ';
        }
        return $s.$retval;
    }
}