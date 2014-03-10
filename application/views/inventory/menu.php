   <ul class="easyui-tree">
<li><span><strong>Operation</strong></span>
	<ul>
		<li ><span>Terima Barang Atas PO</span>
			<ul>
				<li><?=anchor('receive_po/add','Tambah Terima Barang PO');?></li>
				<li><?=anchor('receive_po','Cari Terima Barang PO');?></li>
			</ul>
		</li>
		<li ><span>Terima Barang Non PO</span>
			<ul>
				<li><?=anchor('receive/add','Tambah Terima Barang Non PO');?></li>
				<li><?=anchor('receive','Cari Terima Barang Non PO');?></li>
			</ul>
		</li>
		<li ><span>Pengeluaran Barang Lainnya</span>
			<ul>
				<li><?=anchor('delivery/add','Pengeluaran Barang Lainnya');?></li>
				<li><?=anchor('delivery','Cari Pengeluaran Barang');?></li>
			</ul>
		</li>
	</ul>
</li>
<li><span><strong>Setting</strong></span>
	<ul>
		<li ><span>Master Barang/Jasa</span>
			<ul>
				<li><?=anchor('inventory/add','Tambah Master Barang')?></li>
				<li><?=anchor('inventory','Cari Master Barang')?></li>
			</ul>				
		</li>
		<li ><span>Master Kategori Barang/Jasa</span>
			<ul>
				<li><?=anchor('category/add','Tambah Kategori Barang')?></li>
				<li><?=anchor('category','Cari Kategori Barang')?></li>
			</ul>				
		</li>
		<li ><span>Master Kelas Barang/Jasa</span>
			<ul>
				<li><?=anchor('inventory_class/add','Tambah Kelas Barang')?></li>
				<li><?=anchor('inventory_class','Cari Kelas Barang')?></li>
			</ul>				
		</li>
		<li ><span>Master Gudang</span>
			<ul>
				<li><?=anchor('shipping_locations/add','Tambah Master Gudang')?></li>
				<li><?=anchor('shipping_locations','Cari Master Gudang')?></li>
			</ul>				
		</li>
	</ul>
</li>

<li><span><strong>Reports</strong></span><ul>
	<li><?=anchor('inventory/rpt/cards_summary','Laporan Kartu Stock Summary')?></li>
	<li><?=anchor('inventory/rpt/cards_detail','Laporan Kartu Stock Detail')?></li>
	<li><?=anchor('inventory/rpt/cards_gudang','Laporan Kartu Stock Per Gudang')?></li>
	<li><?=anchor('inventory/rpt/min_stock','Laporan Stock Minimum')?></li>
</ul></li>
