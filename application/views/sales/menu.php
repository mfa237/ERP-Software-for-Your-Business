<script language="javascript">
///--- gak jalan kalao pakai .info_link.on cuma klik pertama kali, klik kedua gak jalan
//     ubha menjadi clickme
//$(function(){
//$(document).on('click', '.info_link', function(){
//$('.info_link').on('click',function(e){
	function cetak_faktur(){
		faktur=$('#invoice_number').val();
		if(faktur!='undefined'){
			window.open('<?=base_url()?>index.php/invoice/print_faktur/'+faktur,"_new");
		}
	}
</script>


 <ul class="easyui-tree">
 	<li><span><strong>Operation</strong></span>
 		<ul>
 			<li ><span>Sales Order</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/sales_order/add','Tambah Nomor SO','class="info_link"');?></li>
 					<li><?=anchor(base_url().'index.php/sales_order','Cari Nomor SO','class="info_link"');?></li>
 				</ul>
 			</li>
 			<li  >
 				<span>Delivery Order</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/delivery_order/add','Tambah Nomor DO','class="info_link"')?></li>
 					<li><?=anchor(base_url().'index.php/delivery_order','Cari Nomor DO','class="info_link"');?></li>
 				</ul>
 			</li>
 			<li  >
 				<span>Faktur Penjualan</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/invoice/add','Tambah Faktur Penjualan','class="info_link"')?></li>
 					<li><?=anchor(base_url().'index.php/invoice','Cari Nomor Faktur','class="info_link"');?></li>
 					<li><?=anchor('#','Cetak Faktur','onclick="cetak_faktur();return false;"');?></li>
 				</ul>
 			</li>
 			<li>
 				<span>Payments</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/payment/add','Terima Piutang Pelanggan','class="info_link"')?></li>
 					<li><?=anchor(base_url().'index.php/payment','Cari Penerimaan Piutang','class="info_link"');?></li>
 				</ul>
 			</li>
 			<li>
 				<span>Retur</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/sales_retur/add','Tambah Retur Penjualan','class="info_link"')?></li>
 					<li><?=anchor(base_url().'index.php/sales_retur','Cari Retur Penjualan','class="info_link"');?></li>
 				</ul>
 			</li>
 			<li>
 				<span>Credit Memo</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/sales_crmemo/add','Tambah Kredit Memo','class="info_link"')?></li>
 					<li><?=anchor(base_url().'index.php/sales_crmemo','Cari Kredit Memo','class="info_link"');?></li>
 				</ul>
 			</li>
 			<li>
 				<span>Debit Memo</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/sales_dbmemo/add','Tambah Debit Memo','class="info_link"')?></li>
 					<li><?=anchor(base_url().'index.php/sales_dbmemo','Cari Debit Memo','class="info_link"');?></li>
 				</ul>
 			</li>
 		</ul>
 		
 	</li>
 	<li><span><strong>Setting</strong></span>
 		<ul>
			<li ><span>Customers</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/customer/add','Create New Customer','class="info_link"')?></li>
 					<li><?=anchor(base_url().'index.php/customer','Search Customer Number','class="info_link"');?></li>
 				</ul>				
			</li>
			<li ><span>Salesmans</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/salesman/add','Create New Salesman','class="info_link"')?></li>
 					<li><?=anchor(base_url().'index.php/salesman','Search Salesman Number','class="info_link"');?></li>
 				</ul>				
			</li>
			<li ><span>Payment Terms</span>
 				<ul>
 					<li><?=anchor(base_url().'index.php/type_of_payment/add','Create New Terms','class="info_link"')?></li>
 					<li><?=anchor(base_url().'index.php/type_of_payment','Search Payment Terms','class="info_link"');?></li>
 				</ul>				
			</li>
		</ul>
 	</li>
 	
 	<li><span><strong>Reports</strong></span><ul>
 		<li>Outstanding Sales Order</li>
 		<li>Outstanding Sales Order1</li>
 	</ul></li>
