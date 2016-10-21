<div style="margin:10px 0;"></div>
	<ul class="easyui-tree">
		<li>
			<span>Accounting Modules</span>
			<ul>
				<li>
					<span>Operation</span>
					<ul>
				<li><?=anchor('receive_po','Terima Barang PO','class="info_link"');?></li>
				<li><?=anchor('receive','Terima Barang Non PO','class="info_link"');?></li>
				<li><?=anchor('delivery','Pengeluaran Barang','class="info_link"');?></li>
				<li><?=anchor('stock_mutasi','Mutasi Stock','class="info_link"');?></li>
				<li><?=anchor('stock_adjust','Adjustment Stock','class="info_link"');?></li>
					</ul>
				</li>
				<li   data-options="state:'closed'">
					<span>Report</span>
					<ul>
			<li><?=anchor('inventory/rpt/cards_summary','Laporan Kartu Stock Summary','class="info_link"')?></li>
			<li><?=anchor('inventory/rpt/cards_detail','Laporan Kartu Stock Detail','class="info_link"')?></li>
			<li><?=anchor('inventory/rpt/cards_gudang','Laporan Kartu Stock Per Gudang','class="info_link"')?></li>
			<li><?=anchor('inventory/rpt/min_stock','Laporan Stock Minimum','class="info_link"')?></li>
			<li><?=anchor('inventory/rpt/max_stock','Laporan Stock Maximum','class="info_link"')?></li>
			<li><?=anchor('inventory/rpt/stock_value','Penilaian Persediaan','class="info_link"')?></li>
					</ul>
				</li>
				<li  data-options="state:'closed'">
					<span>Master</span>
					<ul>
				<li><?=anchor('inventory','Master Barang','class="info_link"')?></li>
				<li><?=anchor('category','Kategori Barang','class="info_link"')?></li>
				<li><?=anchor('inventory_class','Kelas Barang','class="info_link"')?></li>
				<li><?=anchor('shipping_locations','Master Gudang','class="info_link"')?></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
