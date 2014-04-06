<div class="col-sm-6 col-md-8"><h1>PEMBAYARAN HUTANG<div class="thumbnail">
	<?
	echo link_button('Save', 'save_pay()','save');		
	echo link_button('Print', 'print_pay()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/payables_payments/add');		
	echo link_button('Search','','search','true',base_url().'index.php/payables_payments');		
	
	?>
</div></H1>
<div class="thumbnail">	

<form id="myform" method="POST" action="<?=base_url()?>index.php/payment/save">
<table>
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
				<th data-options="field:'amount', align:'right',editor:'numberbox',
				formatter: function(value,row,index){
					return number_format(value,2,'.',',');
				}">Jumlah Faktur</th>
				<th data-options="field:'amount_paid', align:'right',editor:'numberbox',
				formatter: function(value,row,index){
					return number_format(value,2,'.',',');
				}">Jumlah Bayar</th>
			</tr>
		</thead>
	</table>

</form>

</div>
<script language='javascript'>

</script>
 	