<?
include "koneksi.php";
	$table=strtolower($_POST['table_name']);
	$result = mysql_query("SHOW COLUMNS FROM ".$table);
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	$keyfield="";
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
					$data[$field]=$value;
				}
				if($row['Key']=="PRI"){
					$keyfield=$value;
				}
				
			}
		}
	}

	mysql_insert($table, $data);
	$ret=mysql_error();
	if($ret==""){
		if($keyfield!="") $value=$keyfield;
		echo "OK ".$value." - ".$table;
	} else {
		echo "ERR : ".$ret;
	}
	function mysql_insert($table, $inserts) {
		$values = array_map('mysql_real_escape_string', array_values($inserts));
		$keys = array_keys($inserts);
		return mysql_query('INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`)
		VALUES (\''.implode('\',\'', $values).'\')');
	}
	
	
	
?>

