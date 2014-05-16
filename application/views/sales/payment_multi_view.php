<div><h4>PEMBAYARAN PIUTANG</H4><div class="thumbnail">
	<?
	if($posted=="")$posted=0;
	if($closed=="")$closed=0;	
	echo link_button('Print', 'print_pay()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/payment/add');		
	echo link_button('Search','','search','true',base_url().'index.php/payment');		
	echo link_button('Refresh','','reload','true',base_url().'index.php/payment/view/'.$voucher);		
	
	echo link_button('Delete','','cut','true',base_url().'index.php/payment/delete_no_bukti/'.$voucher);		

	if($posted) {
		echo link_button('UnPosting','','cut','true',base_url().'index.php/payment/unposting/'.$voucher);		
	} else {
		echo link_button('Posting','','ok','true',base_url().'index.php/payment/posting/'.$voucher);		
	}
	echo link_button('Help', 'load_help()','help');		
	
	?>
	
		<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	<script type="text/javascript">
		function load_help() {
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/payment");
		}
	</script>


</div>

<?php if (validation_errors()) { ?>
	<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<h4>Terjadi Kesalahan!</h4> 
	<?php echo validation_errors(); ?>
	</div>
<?php } ?>
 <?php if($message!="") { ?>
<div class="alert alert-success"><? echo $message;?></div>
<? } ?>

<div class="thumbnail">	

<form id="myform" method="POST" action="<?=base_url()?>index.php/payment/save">
	<table style="width:600px">
		<tr>
			<td>Nomor Bukti: </td><td><?=$voucher?></td>
		</tr>
		<tr>
			<td>Pelanggan: </td><td><?=$cust_info?></td>
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
			<td>Jumlah Bayar: </td><td><?=number_format($amount_paid);?></td>
		</tr>
	</table>
	
	<div class="easyui-tabs" style="width:700px;height:550px">
		<div title="Nomor Faktur" style="padding:10px">
		<table id="dgItems" class="easyui-datagrid" 
			data-options="
				toolbar: '#tbItems',singleSelect: true,
				url: '<?=base_url()?>index.php/payment/load_nomor/<?=$voucher?>'
			"  >
			<thead>
				<tr>
					<th data-options="field:'invoice_number'">Nomor Faktur</th>
					<th data-options="field:'invoice_date'">Tanggal Faktur</th>
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
		</div>

	<!-- JURNAL -->
		<DIV title="Jurnal" style="padding:10px">
			<div id='divJurnal' class='thumbnail'>
			<table id="dgCrdb" class="easyui-datagrid"  
				style="width:700px;min-height:700px"
				data-options="
					iconCls: 'icon-edit',
					singleSelect: true,toolbar:'#tbCrdb',
					url: '<?=base_url()?>index.php/jurnal/items/<?=$voucher?>'
				">
				<thead>
					<tr>
						<th data-options="field:'account',width:80">Akun</th>
						<th data-options="field:'account_description',width:150">Nama Akun</th>
						<th data-options="field:'debit',width:80,align:'right'">Debit</th>
						<th data-options="field:'credit',width:80,align:'right'">Credit</th>
						<th data-options="field:'custsuppbank',width:50">Ref</th>
						<th data-options="field:'operation',width:50">Operasi</th>
						<th data-options="field:'source',width:50">Keterangan</th>
						<th data-options="field:'transaction_id',width:50">Id</th>
					</tr>
				</thead>
			</table>
			</div>
				
		</DIV>
	</div>
</form>


<script language='javascript'></script>
 	