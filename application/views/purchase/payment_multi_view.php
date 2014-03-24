<form id="myform" method="POST" action="<?=base_url()?>index.php/payment/save">
<table>
	<tr>
		<td colspan='4'><strong><h1>PEMBAYARAN BANYAK FAKTUR</h1></strong></td>
	</tr>
	<tr>
		<td>Nomor Bukti: </td><td><?=$voucher?></td>
	</tr>
	<tr>
		<td>Supplier: </td><td><?=$supplier_info?></td>
	</tr>
	<tr>
		<td>Tanggal Bayar: </td><td><?=$date_paid?></td>
	</tr>
	<tr>
		<td>Rekening: </td><td><?=$account_number?></td>
	</tr>
	<tr>
		<td>Jenis Bayar: </td><td><?=$trans_type?></td>
	</tr>
	<tr>
		<td>Jumlah Bayar: </td><td><?=$amount_paid;?></td>
	</tr>
	 
</table>

	<table id="dgItems" class="easyui-datagrid"  
		data-options="
			toolbar: '#tbItems',singleSelect: true,
			url: '<?=base_url()?>index.php/payables_payments/load_nomor/<?=$voucher?>'
		"  >
		<thead>
			<tr>
				<th data-options="field:'purchase_order_number'">Nomor Faktur</th>
				<th data-options="field:'po_date'">Tanggal Faktur</th>
				<th data-options="field:'date_paid'">Tanggal Bayar</th>
				<th data-options="field:'amount'">Jumlah Faktur</th>
				<th data-options="field:'amount_paid'">Jumlah Bayar</th>
			</tr>
		</thead>
	</table>

</form>
<script language='javascript'></script>
 	