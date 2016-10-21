<div class='col-md-4' style='width:100px;float:left'>
<table width='300px'> 
<tr><td colspan='5' align='center'><h1>SLIP GAJI</h1></td><td></td></tr>
<tr><td>Nomor</td><td><h3><?=$pay->pay_no?></h3></td><td></td></tr>      	
<tr><td>Tanggal</td><td><?=$pay->pay_date?></td><td></td></tr>
<tr><td>Periode</td><td><?=$pay->pay_period?></td><td></td></tr>
<tr><td>From Date</td><td><?=$pay->from_date?></td><td></td></tr>
<tr><td>To Date</td><td><?=$pay->to_date?></td><td></td></tr>
</table>
</div>

<div class='col-md-4' style='width:100px;float:left'>
<table width='300px'>
<tr><td><h2>NIP</h2></td><td>[<?=$emp->nip?>]</td></tr>
 <tr><td>Nama</td><td><?=$emp->nama?></td></tr> 
<tr><td>Jabatan</td><td><?=$emp->position?></td></tr> 
<tr><td>Departement</td><td><?=$emp->dept?></td></tr> 
<tr><td>Divisi</td><td><?=$emp->divisi?></td></tr> 
<tr><td></td><td></td></tr>
</table> 
</div>

<div class='col-md-4'>
<table cellspacing="0" cellpadding="1" border="0" >
		<tr><td><h1>ABSENSI</h1></td><td></td></tr>
		<?
		$tbl="";
		 for($i=0;$i<count($absensi);$i++){
			$row=$absensi[$i];
			$tbl.="<tr>";
			$tbl.="<td>".$row['salary_com_name']."</td>";
			$tbl.="<td >".number_format($row['amount'])."</td>";
			$tbl.="</tr>";
	   };
	   echo $tbl;
		?>	 
</table> 
</div>

<div class='col-md-4'>
<table cellspacing="0" cellpadding="1" border="0" >
		<tr><td><h1>PENDAPATAN</h1></td><td></td></tr>
		<?
		$tot_dapat=0;
		$tbl="";
		 for($i=0;$i<count($pendapatan);$i++){
			 $row=$pendapatan[$i];
			$tbl.="<tr>";
			$tbl.="<td>".$row['salary_com_name']."</td>";
			$tbl.="<td align=\"right\">".number_format($row['amount'])."</td>";
			$tbl.="</tr>";
			$tot_dapat=$tot_dapat+$row['amount'];
	   };
	   echo $tbl;
		?>	 
</table> 
</div>

<div class='col-md-4'>
<table cellspacing="0" cellpadding="1" border="0" >
		<tr><td><h1>POTONGAN</h1></td><td></td></tr>
		<?
		$tbl="";
		$tot_potong=0;
		 for($i=0;$i<count($potongan);$i++){
			 $row=$potongan[$i];
			 
			$tbl.="<tr>";
			$tbl.="<td>".$row['salary_com_name']."</td>";
			$tbl.="<td align=\"right\">".number_format($row['amount'])."</td>";
			$tbl.="</tr>";
			$tot_potong=$tot_potong+$row['amount'];
	   };
	   echo $tbl;
		?>	 
</table> 
</div>



<table>
     <tr><td><h1><strong>Jumlah </strong></h1></td>
	 <td align=\"right\"><h1><strong><?=number_format($tot_dapat-$tot_potong)?></strong></h1></td></tr>
</table> 