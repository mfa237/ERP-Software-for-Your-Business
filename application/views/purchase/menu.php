    <div class="col-sm-6 col-md-4"><h2>Operations</h2>
 		<div class="thumbnail">  
			<li><?=anchor('purchase_order','Purchase Order');?></li>
			<li><?=anchor('purchase_invoice','Faktur Pembelian');?></li>
			<li><?=anchor('payables_payments','Pembayaran');?></li>
			<li><?=anchor('purchase_retur','Retur Pembelian');?></li>
			<li><?=anchor('purchase_dbmemo','Debit Memo');?></li>
			<li><?=anchor('purchase_crmemo','Credit Memo');?></li>
		</div>
	</div>
    <div class="col-sm-6 col-md-4"><h2>Master</h2>
 		<div class="thumbnail">  
			<li><?=anchor('supplier/add','Tambah Kode Supplier')?></li>
			<li><?=anchor('supplier','Cari Master Supplier')?></li>
		</div>
	</div>
    <div class="col-sm-6 col-md-4"><h2>Report</h2>
 		<div class="thumbnail">  
			<li><?=anchor('purchase/rpt/po_list','Purchase Order Summary')?></li>
			<li><?=anchor('purchase/rpt/cards_sum','Kartu Hutang Summary')?></li>
			<li><?=anchor('purchase/rpt/cards_detail','Kartu Hutang Detail')?></li>
			<li><?=anchor('purchase/rpt/aging_sum','Umur Hutang Summary')?></li>
			<li><?=anchor('purchase/rpt/agin_detail','Umur Hutang Detail')?></li>
		</div>
	</div>
