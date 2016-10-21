<?
include "koneksi.php";
$table=strtolower($_POST['table_name']);
$data=mx_table_desc($table);
$key_field=$data['key_field'];
$key_value=$data['key_value'];
$record=$data['record'];
$return=""; $cnt=0; $ret="";
if($key_field!=""){
    $cnt = mx_sql_rows($table, $key_field, $key_value);
}
if( $cnt ) {
    $ret = mx_sql_update($table,$record,$key_field,$key_value);
} else {
    $ret = mx_sql_insert($table, $record);
}
if($ret==""){
    if($key_field!="") $return = "OK : ".$key_value." - ".$table;
} else {
    $return = "ERR : ".$ret;
}

echo $return;

function mx_sql_update($table,$record,$key_field_name,$value){
    $values = array_values($record);
    $keys = array_keys($record);
    
    $s="UPDATE `".$table."` SET ";
    for($i=0;$i<count($keys);$i++){
        if($keys[$i]!=$key_field_name){
            $s=$s.'`'.$keys[$i]."`='".$values[$i]."',";
        }
    } 
    if(strrpos($s, ',',-1) ) {
        $s =  substr ($s,0, strlen ($s)-1);
    }
    $s = $s." WHERE `".$key_field_name."`='".$value."'";
    $ret=mysql_query($s);
    return mysql_error();
}
function mx_sql_insert($table, $inserts) {
    $values = array_map('mysql_real_escape_string', array_values( $inserts));
    $keys = array_keys($inserts);
    $sql='INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`)
    VALUES (\''.implode('\',\'', $values).'\')';
    
    $ret=mysql_query($sql);
    return mysql_error();
}
function mx_sql_rows($table,$key_field_name,$value){
    $cnt=0;
    $sql="select $key_field_name from $table where $key_field_name = '$value' limit 1";
    if ( $result=mysql_query($sql) ) $cnt = mysql_num_rows($result);
    return $cnt;
}
function mx_table_desc($table){
    if ($table=='')exit;
    $result = mysql_query("SHOW COLUMNS FROM ".$table);
    if (!$result) {
       echo 'ERR : Table ['.$table.'] Not Found Or Syntax Error';
       exit;
    }
    $key_field=""; $key_value="";
    $record=null;
    if (mysql_num_rows($result) > 0) {
       while ($row = mysql_fetch_assoc($result)) {
           $field=$row['Field'];
           $type=strtolower($row['Type']);
           if(isset($_POST[$field])){
               $value=$_POST[$field];
               if(strrpos($type, "bit")){
                   if(strtolower($value)=="0"){
                           $value=0;
                   } else {
                           $value=1;
                   }
               }
               if($value!="") {
                   $record[$field]=$value;
               }
               if($row['Key']=="PRI"){
                   $key_value=$value;
                   $key_field=$field;
               }
           }
       }
    }
   $data['key_field']=$key_field; 
   $data['key_value']=$key_value; 
   $data['record']=$record;
   return $data;
}
?>

