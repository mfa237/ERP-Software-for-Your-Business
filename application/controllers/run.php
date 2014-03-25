<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Run extends CI_Controller {
    private $sql='';
	function __construct()
	{
		parent::__construct();
		if(!$this->access->is_login())redirect(base_url());
 		$this->load->helper(array('url','form'));
		$this->load->library('template');
        $this->load->model('table_model');
	}
	function index()
	{	
            echo 'Enter table name';
	}
        function table($table_name,$field_key='',$field_val=''){
                 $caption=$table_name;
                 $offset=1; $limit=50;
                  
                     $data['_content']=browse_table($table_name,$field_key,$field_val);
                     $data['table_name']=$table_name;
                     $data['field_key']=$field_key;
                     $data['field_val']=$field_val;
                     $this->load->view('template/standard/template_browse3',$data);
                 
//                 $data['table_name']=$table_name;
//                 $data['field_key']=$field_key;
//                 $data['field_val']=$field_val;
        }
         function browse($table_name,$field_key='',$field_val=''){
            $sql="select * from ".$table_name;
           
            if($field_val<>"")$sql.=" where ".$field_key." like '%".$field_val."%'";
            $query=$this->db->query($sql);
            $i=0; 
            foreach($query->result_array() as $row){
                $rows[$i++]=$row;
            };
            $data['total']=$i;
            $data['rows']=$rows;
           
             echo json_encode($data);
           
        }
        function add($table_name){
            $sql="select * from ".$table_name;
            $query=$this->db->query($sql.' limit 1');
            $flds=$query->list_fields();
            echo "<table>";
            for($i=0;$i<count($flds);$i++){
                $fld=$flds[$i];
                $fld=str_replace('_',' ',$fld);
                echo '<tr><td>'.$fld.'</td><td>
                    <input type="text" id="'.$fld.'"></fieldset>
                        </td>
                     </tr>   ';
            }
            echo "</table>";
        }
}
	 
