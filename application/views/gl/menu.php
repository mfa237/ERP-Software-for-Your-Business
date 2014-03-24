   <ul class="easyui-tree">
 	<li><span><strong>Operation</strong></span>
 		<ul>
 			<li ><span>Jurnal Transaksi</span>
 				<ul>
 					<li><?=anchor('jurnal/add','Tambah Jurnal Umum');?></li>
 					<li><?=anchor('jurnal','Cari Jurnal Umum');?></li>
 				</ul>
 			</li>
 		</ul>
 	</li>
 	<li><span><strong>Setting</strong></span>
 		<ul>
			<li ><span>Kode Perkiraan</span>
 				<ul>
 					<li><?=anchor('coa/add','Tambah Perkiraan')?></li>
 					<li><?=anchor('coa','Cari Perkiraan')?></li>
 				</ul>				
			</li>
			<li><span>Kelompok Perkiraan</span>
 				<ul>
 					<li><?=anchor('coa_group/add','Tambah Kelompok Perkiraan')?></li>
 					<li><?=anchor('coa_group','Cari Kelompok Perkiraan')?></li>
 				</ul>				
			</li>
			<li><span>Periode Keuangan</span>
 				<ul>
 					<li><?=anchor('periode/add','Tambah Periode')?></li>
 					<li><?=anchor('periode','Cari Periode')?></li>
 				</ul>				
			</li>
		</ul>
 	</li>
 	
 	<li><span><strong>Reports</strong></span><ul>
		<li><?=anchor('gl/rpt/cards','Laporan Kartu GL')?></li>
		<li><?=anchor('gl/rpt/jurnal','Laporan Jurnal Transaksi')?></li>
		<li><?=anchor('gl/rpt/neraca','Laporan Neraca')?></li>
		<li><?=anchor('gl/rpt/rugi_laba','Laporan Rugi Laba')?></li>
		<li><?=anchor('gl/rpt/neraca_saldo','Laporan Neraca Saldo')?></li>
 	</ul></li>
