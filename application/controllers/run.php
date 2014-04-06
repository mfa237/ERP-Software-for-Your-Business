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
        function test(){
			$sql="
			CREATE  VIEW `qry_coa` AS select `chart_of_accounts`.`account` AS `account`,
			`chart_of_accounts`.`account_description` AS `account_description`,_utf8'D' AS `jenis`,
			`chart_of_accounts`.`db_or_cr` AS `db_or_cr`,`chart_of_accounts`.`beginning_balance` AS `saldo_awal`,
			`chart_of_accounts`.`group_type` AS `parent` from `chart_of_accounts` 
			union all 
			select `gl_report_groups`.`group_type` AS `group_type`,`gl_report_groups`.`group_name` AS `group_name`,
			_utf8'H' AS `jenis`,_utf8'' AS `db_or_cr`,NULL AS `0`,`gl_report_groups`.`parent_group_type` AS `parent_group_type` 
			from `gl_report_groups`;
			";
			if(mysql_query($sql))echo "..OK<br>";else echo "<div class='error'>" . mysql_error()."<br>".$sql."</div>";
        	
        }
 }
	 
