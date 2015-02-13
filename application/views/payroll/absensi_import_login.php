<legend>Import Data Absensi dari Login</legend>
<p>Silahkan isi tanggal awal dan tanggal akhir dibawah ini untuk mengkonversi data 
login user sebagai data absensi</p>
<form id="frmMain" name="frmMain" method="post">
<p>Tanggal Awal <input type='text' name='date_from' id='date_from' value='<?=$date_from?>' class='easyui-datetimebox'></p>
<p>Tanggal Akhir <input type='text' name='date_to' id='date_to' value='<?=$date_to?>' class='easyui-datetimebox'></p>
<input type='submit' class='btn btn-info' name='submit'>
</form>

<?
if(isset($message)){
	echo "<p>".$message."</p>";
}
if(isset($absen_list)){
	echo "<table class='table2'><thead><th>NIP</th><th>Tanggal</th>
	<th>Time In</th><th>Time Out</th></thead>
	<tbody>";
	foreach($absen_list->result() as $row){
		echo "<tr><td>".$row->nip."</td><td>".$row->tanggal
		."</td><td>".$row->time_in."</td><td>".$row->time_out
		."</td></tr>";
	}
	echo "</tbody></table>";
}

?>
