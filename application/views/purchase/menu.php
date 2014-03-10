   <ul class="easyui-tree">
 	<li><span><strong>Operation</strong></span>
 		<ul>
 			<li ><span>Purchase Order</span>
 				<ul>
 					<li><?=anchor('purchase_order/add','Tambah Purchase Order (PO)');?></li>
 					<li><?=anchor('purchase_order','Cari Nomor PO');?></li>
 				</ul>
 			</li>
 			<li ><span>Faktur Pembelian</span>
 				<ul>
 					<li><?=anchor('purchase_invoice/add','Tambah Faktur Pembelian');?></li>
 					<li><?=anchor('purchase_invoice','Cari Nomor Faktur');?></li>
 				</ul>
 			</li>
 			<li ><span>Pembayaran Hutang</span>
 				<ul>
 					<li><?=anchor('payables_payments/add','Tambah Pembayaran');?></li>
 					<li><?=anchor('payables_payments','Cari Nomor Pembayaran');?></li>
 				</ul>
 			</li>
 			<li ><span>Retur Pembelian</span>
 				<ul>
 					<li><?=anchor('purchase_retur/add','Tambah Retur Pembelian');?></li>
 					<li><?=anchor('purchase_retur','Cari Nomor Retur');?></li>
 				</ul>
 			</li>
 			<li ><span>Debit Memo</span>
 				<ul>
 					<li><?=anchor('purchase_dbmemo/add','Tambah Debit Memo');?></li>
 					<li><?=anchor('purchase_dbmemo','Cari Nomor Debit Memo');?></li>
 				</ul>
 			</li>
 			<li ><span>Credit Memo</span>
 				<ul>
 					<li><?=anchor('purchase_crmemo/add','Tambah Credit Memo');?></li>
 					<li><?=anchor('purchase_crmemo','Cari Nomor Credit Memo');?></li>
 				</ul>
 			</li>
 		</ul>
 	</li>
 	<li><span><strong>Setting</strong></span>
 		<ul>
			<li ><span>Master Supplier</span>
 				<ul>
 					<li><?=anchor('supplier/add','Tambah Kode Supplier')?></li>
 					<li><?=anchor('supplier','Cari Master Supplier')?></li>
 					<li><?=anchor('supplier/change','Ubah Kode Supplier')?></li>
 				</ul>				
			</li>
		</ul>
 	</li>
 	
 	<li><span><strong>Reports</strong></span><ul>
		<li><?=anchor('purchase/rpt/cards_sum','Laporan Kartu Hutang Summary')?></li>
		<li><?=anchor('purchase/rpt/cards_detail','Laporan Kartu Hutang Detail')?></li>
		<li><?=anchor('purchase/rpt/aging_sum','Laporan Umur Hutang Summary')?></li>
		<li><?=anchor('purchase/rpt/agin_detail','Laporan Umur Hutang Detail')?></li>
 	</ul></li>
