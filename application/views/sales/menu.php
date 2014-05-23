<div style="margin:10px 0;"></div>
	<ul class="easyui-tree">
		<li>
			<span>Sales Modules</span>
			<ul>
				<li>
					<span>Operation</span>
					<ul>
 			<li><?=anchor(base_url().'index.php/sales_order','Sales Order','class="info_link"  ');?></li>
			<li><?=anchor(base_url().'index.php/delivery_order','Surat Jalan','class="info_link" ');?></li>
			<li><?=anchor(base_url().'index.php/invoice','Faktur Penjualan','class="info_link"');?></li>
			<li><?=anchor(base_url().'index.php/payment','Pembayaran Piutang','class="info_link"');?></li>
			<li><?=anchor(base_url().'index.php/sales_retur','Retur Penjualan','class="info_link"');?></li>
			<li><?=anchor(base_url().'index.php/sales_crmemo','Kredit Memo','class="info_link"');?></li>
			<li><?=anchor(base_url().'index.php/sales_dbmemo','Debit Memo','class="info_link"');?></li>
					</ul>
				</li>
				<li   data-options="state:'closed'">
					<span>Report</span>
					<ul>
			<li><?=anchor('sales/rpt/so_otstand','Open Sales Order','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/do_list','Daftar Pengiriman','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/faktur_sum','Penjualan Summary','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/faktur_slsman','Penjualan Per Salesman','class="info_link" ')?></li>
			<li><?=anchor('sales/rpt/faktur_cust','Penjualan per Pelanggan','class="info_link" ')?></li>
			<li><?=anchor('sales/rpt/sls_item','Penjualan per Item','class="info_link" ')?></li>
			<li><?=anchor('sales/rpt/sls_cat','Penjualan per Item Kategori','class="info_link" ')?></li>
			<li><?=anchor('sales/rpt/ar_sum','Kartu Piutang Summary','class="info_link" ')?></li>
			<li><?=anchor('sales/rpt/ar_dtl','Kartu Piutang Detail','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/age_sum','Umur Piutang Summary','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/age_dtl','Umur Piutang Detail','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/retur_list','Daftar Retur Penjualan','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/memo_list','Daftar Kredit/Debit Memo','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/pay_list','Daftar Pembayaran','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/pay_type','Pembayaran Per Jenis Bayar','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/cust_list','Daftar Pelanggan','class="info_link"' )?></li>
			<li><?=anchor('sales/rpt/slsman_list','Daftar Salesman','class="info_link"' )?></li>
					</ul>
				</li>
				<li  data-options="state:'closed'">
					<span>Master</span>
					<ul>
			<li><?=anchor(base_url().'index.php/customer','Pelanggan','class="info_link"');?></li>
			<li><?=anchor(base_url().'index.php/salesman','Salesman','class="info_link"');?></li>
			<li><?=anchor(base_url().'index.php/type_of_payment','Termin','class="info_link"');?></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>

