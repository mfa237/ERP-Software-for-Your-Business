<div style="margin:10px 0;"></div>
	<ul class="easyui-tree">
		<li>
			<span>Accounting Modules</span>
			<ul>
				<li>
					<span>Operation</span>
					<ul>
			<li><?=anchor('salary','Slip Gaji','class="info_link"');?></li>
			<li><?=anchor('salary/generate','Generate Slip Gaji','class="info_link"');?></li>
			<li><?=anchor('pph21','Proses PPH 21','class="info_link"');?></li>
			<li><?=anchor('absensi','Absensi','class="info_link"');?></li>
			<li><?=anchor('overtime','Overtime','class="info_link"');?></li>
			<li><?=anchor('cuti','Cuti','class="info_link"');?></li>
			<li><?=anchor('pinjaman','Pinjaman','class="info_link"');?></li>
			<li><?=anchor('pengobatan','Pengobatan','class="info_link"');?></li>
					</ul>
				</li>
				<li   data-options="state:'closed'">
					<span>Report</span>
					<ul>
			<li><?=anchor('payroll/rpt/emp_list','Daftar Karyawan','class="info_link"')?></li>
			<li><?=anchor('payroll/rpt/slip_list','Daftar Slip Gaji','class="info_link"')?></li>
			<li><?=anchor('payroll/rpt/slip_print','Cetak Slip Gaji Massal','class="info_link"')?></li>
			<li><?=anchor('payroll/rpt/slip_bank','Rangkuman Gaji per Bank','class="info_link"')?></li>
			<li><?=anchor('payroll/rpt/absensi','Daftar Absensi','class="info_link"')?></li>
			<li><?=anchor('payroll/rpt/overtime','Daftar Overtime','class="info_link"')?></li>
					</ul>
				</li>
				<li  data-options="state:'closed'">
					<span>Master</span>
					<ul>
			<li><?=anchor('employee','Pegawai','class="info_link"')?></li>
			<li><?=anchor('employee/group','Level Group','class="info_link"')?></li>
			<li><?=anchor('ptkp','Status Kawin (PTKP)','class="info_link"')?></li>
			<li><?=anchor('employee/jenis','Jenis','class="info_link"')?></li>
			<li><?=anchor('pelamar','Calon Pegawai','class="info_link"')?></li>
			<li><?=anchor('payroll/income','Jenis Pendapatan','class="info_link"')?></li>
			<li><?=anchor('payroll/deduct','Jenis Potongan','class="info_link"')?></li>
			<li><?=anchor('payroll/level','Level Jabatan (Posisi)','class="info_link"')?></li>
			<li><?=anchor('payroll/holiday','Hari Libur','class="info_link"')?></li>
			<li><?=anchor('payroll/periode','Periode Penggajian','class="info_link"')?></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
