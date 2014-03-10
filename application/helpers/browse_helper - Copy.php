 

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if ( ! function_exists('browse'))
{
    function browse($sql,$caption,$class,$offset=0,$limit=50
            ,$order_column='',$order_type='asc',$header='')
    {
        echo '<script language="javascript">
            M_BROWSE=\''.base_url().'index.php/'.$class.'/browse/\';    
            M_VIEW=\''.base_url().'index.php/'.$class.'/view/\';    
            M_DELETE=\''.base_url().'index.php/'.$class.'/delete/\';                
        </script>';    
        echo '<script src="'.base_url().'public/js/browse.js"></script>';
        echo '<script src="'.base_url().'public/ui/jquery-1.8.0.min.js"></script>';
        $CI =& get_instance();
        $CI->load->library('template');
        $CI->load->library('table');
        $i=0+$offset;
        //$sql=$sql.' ORDER BY '.$order_column.' '.$order_type;
        //$sql=$sql.' limit 1'.$offset*$limit.', '.$limit;
         
        $query=$CI->db->query($sql.' limit 1');
        $flds=$query->list_fields();
        $filter='<table>';
        $filter_header='<tr>';
        $filter_input=$filter_header;
        $where='';
        for($i=0;$i<count($flds);$i++){
            $fld=$flds[$i];
            $fld=str_replace('_',' ',$fld);
            $flds2[$i]=$fld;
            if(isset($_GET[$flds[$i]])){
                $val=$_GET[$flds[$i]];
            } else {
                $val='';
            }
            $fld_alias=$flds[$i];
            $flds_input[$i]='<input id="'.$flds[$i].'"/>';
            $filter_header=$filter_header.'<td>'.$fld.'</td>';
            $filter_input=$filter_input.'<td>
                <input id="txtFilter['.$i.']" tag="'.$fld_alias.'" value="'.$val.'" 
                style="width:'.(strlen($fld)*7).'" /></td>';
            if(isset($_GET[$flds[$i]])){
                $where=$where.' '.$flds[$i].' like \''.$_GET[$flds[$i]].'%\' and ';
            }
        }
        //echo $where;
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
        $filter_header=$filter_header.'</tr>';
        $filter_header=$filter_header.'</tr>';
        $filter_input=$filter_input.'<td>
            <a href="#"  onclick="b_refresh();return false">Refresh</a> | 
            <a href="#" onclick="b_clear();return false">Clear</a>
            
        </td>';
        if($header!=''){            
            if(is_array($header)){                
                $filter_header='<tr>';
                for($j=0;$j<count($header);$j++){
                    $filter_header.='<td>'.$header[$j].'</td>';
                    $flds2[$j]=$header[$j];
                }                 
                $filter_header.='</tr>';
            }
        }
        $filter=$filter.$filter_header.$filter_input.'</table>';
        $flds2[$i++]='Action';
        $CI->table->set_heading($flds2);
        $i=0;
        //$CI->table->add_row($flds_input);
        foreach($query->result_array() as $row){
            for($i=0;$i<count($flds);$i++){
                $fld=$flds[$i];
                $newrow[$i]=$row[$fld];
            }
            $key=$row[$flds[0]];
            $url_edit='<a href="#" onclick="b_edit_row(\''.$key.'\');return false">Edit</a>';
            $url_del='<a href="#" onclick="b_del_row(\''.$key.'\');return false">Delete</a>';
            $newrow[$i++]='<img src="'.base_url().'images/success.gif"/>'.$url_edit.'
                <img src="'.base_url().'images/warning.gif"/>'.$url_del;
            $CI->table->add_row($newrow);
                
            $i++;
        };
        $tmpl=$CI->template->template_table('table1');
        $CI->table->set_template($tmpl);
        $retval=$CI->table->generate();
        
        $CI->load->library('pagination');
        $config['base_url']=site_url('browse');
        $config['total_rows']=$i;
        $config['per_page']=10;
        $config['uri_segment']=3;
        $CI->pagination->initialize($config);
        $link=$CI->pagination->create_links();
        $s='
    <form  id="div_b_search" method="POST">    
        <div id="divBrowse">
        <strong>'.$caption.'</strong>&nbsp|&nbsp '
        .$link.' 
        <img src="'. base_url().'images/filenew.png"/>
            <a href=\''.base_url().'\index.php\\'.$class.'\add\'>Tambah</a> |      
        <img src="'. base_url().'images/filter.png"/>
            <a href="#" onclick="b_filter();return false;">Filter</a> | 
        Rows <input type="text" style="width:50px" id="txtRows" value="'.$limit.'"/> |
        <a href="#" onclick="b_prev();return false;">
            <img src="'. base_url().'images/ar_left.png"/></a>  |
        Page<input type="text"  style="width:30px;float:center" id="txtGo" value="'.$offset.'"/> |
        <a href="#" onclick="b_next();return false;">
            <img src="'. base_url().'images/ar_right.png"/></a>  |
        <img src="'. base_url().'images/success.gif"/>
            <a href="#" onclick="b_refresh();return false;">Refresh</a> |
            

         <br/>    
        </div>
        <div id="divBFilter">'.$filter.'

        </div>
   </form>    
        ';
        
        return $s.$retval;
    }
}

?>
