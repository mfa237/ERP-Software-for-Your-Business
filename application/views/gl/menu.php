    <div class="col-sm-6 col-md-4"><h2>Operation</h2>
 		<div class="thumbnail"> 
			<li><?=anchor('jurnal','Cari Jurnal Umum');?></li>
 			<h4>Posting</h4>
			<li><?=anchor('posting/sales_invoice','Faktur Penjualan');?></li>
			<li><?=anchor('posting/sales_retur','Retur Penjualan');?></li>
			<li><?=anchor('posting/sales_memo','Kredit Memo Penjualan');?></li>
			<li><?=anchor('posting/purchase_invoice','Faktur Pembelian');?></li>
			<li><?=anchor('posting/purchase_retur','Retur Pembelian');?></li>
			<li><?=anchor('posting/purchase_memo','Kredit Memo Pembelian');?></li>
			<li><?=anchor('posting/cash','Kas Masuk/Keluar');?></li>
			<li><?=anchor('posting/inventory','Persediaan');?></li>
			<li><?=anchor('posting/asset','Aktiva Tetap');?></li>
			<li><?=anchor('posting/all','Semua Transaksi');?></li>
 		</div>
 	</div>	
    <div class="col-sm-6 col-md-4"><h2>Master</h2>
 		<div class="thumbnail"> 
			<li><?=anchor('coa','Cari Perkiraan')?></li>
			<li><?=anchor('coa_group','Cari Kelompok Perkiraan')?></li>
			<li><?=anchor('periode','Cari Periode')?></li>
			<li><?=anchor('periode/close','Closing Periode')?></li>
 		</div>
 	</div>			
     <div class="col-sm-6 col-md-4"><h2>Reports</h2>
 		<div class="thumbnail"> 
			<li><?=anchor('gl/rpt/cards','Laporan Kartu GL')?></li>
			<li><?=anchor('gl/rpt/jurnal','Laporan Jurnal Transaksi')?></li>
			<li><?=anchor('gl/rpt/neraca','Laporan Neraca')?></li>
			<li><?=anchor('gl/rpt/rugi_laba','Laporan Rugi Laba')?></li>
			<li><?=anchor('gl/rpt/neraca_saldo','Laporan Neraca Saldo')?></li>
 		</div>
 	</div>	
