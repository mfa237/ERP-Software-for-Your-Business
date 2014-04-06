    <div class="col-sm-6 col-md-4"><h2>Operation</h2>
 		<div class="thumbnail"> 
				<li><?=anchor('receive_po','Terima Barang PO');?></li>
				<li><?=anchor('receive','Cari Terima Barang Non PO');?></li>
				<li><?=anchor('delivery','Cari Pengeluaran Barang');?></li>
				<li><?=anchor('stock_mutasi','Cari Mutasi Stock');?></li>
				<li><?=anchor('stock_adjust','Cari Adjustment Stock');?></li>
		</div>
	</div>
    <div class="col-sm-6 col-md-4"><h2>Master</h2>
 		<div class="thumbnail">  
				<li><?=anchor('inventory','Cari Master Barang')?></li>
				<li><?=anchor('category','Cari Kategori Barang')?></li>
				<li><?=anchor('inventory_class','Cari Kelas Barang')?></li>
				<li><?=anchor('shipping_locations','Cari Master Gudang')?></li>
		</div>
	</div>

    <div class="col-sm-6 col-md-4"><h2>Operation</h2>
 		<div class="thumbnail"> 
			<li><?=anchor('inventory/rpt/cards_summary','Laporan Kartu Stock Summary')?></li>
			<li><?=anchor('inventory/rpt/cards_detail','Laporan Kartu Stock Detail')?></li>
			<li><?=anchor('inventory/rpt/cards_gudang','Laporan Kartu Stock Per Gudang')?></li>
			<li><?=anchor('inventory/rpt/min_stock','Laporan Stock Minimum')?></li>
			<li><?=anchor('inventory/rpt/max_stock','Laporan Stock Maximum')?></li>
			<li><?=anchor('inventory/rpt/stock_value','Penilaian Persediaan')?></li>
		</div>
	</div>
