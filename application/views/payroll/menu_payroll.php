<?php
	$invoice_number=$this->session->userdata('invoice_number');
?>
 
    <h3>Operation</h3>
 		<div class="thumbnail"> 
			<li><?=anchor('salary','Slip Gaji');?></li>
			<li><?=anchor('absensi','Absensi');?></li>
			<li><?=anchor('absensi/detail','Absensi Data');?></li>
			<li><?=anchor('overtime','Overtime');?></li>
			<li><?=anchor('cuti','Cuti');?></li>
			<li><?=anchor('pinjaman','Pinjaman');?></li>
			<li><?=anchor('pengobatan','Pengobatan');?></li>
 		</div>
 		<div class="thumbnail"> <h3>Master</h3>
			<li><?=anchor('employee','Pegawai')?></li>
			<li><?=anchor('employee_level','Level Group')?></li>
			<li><?=anchor('ptkp','Status Kawin (PTKP)')?></li>
			<li><?=anchor('employee_jenis','Jenis')?></li>
			<li><?=anchor('jenis_income','Jenis Pendapatan')?></li>
			<li><?=anchor('jenis_deduct','Jenis Potongan')?></li>
			<li><?=anchor('posisi_jabatan','Jabatan (Posisi)')?></li>
			<li><?=anchor('holiday','Hari Libur')?></li>
 		</div>
