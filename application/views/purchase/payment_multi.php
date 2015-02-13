<div><h3>PEMBAYARAN HUTANG</H3><div class="thumbnail box-gradient">
	<?
	echo link_button('Save', 'process()','save');		
	echo link_button('Print', 'print_pay()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/payables_payments/add');		
	echo link_button('Search','','search','true',base_url().'index.php/payables_payments');		
	echo link_button('Help', 'load_help(\'payables_payments\')','help');		
	
	?>
	
		<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help('payables_payments)">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
</div>
<div class="thumbnail">	
	<form id="myform" method="POST" action="<?=base_url()?>index.php/payables_payments/save">
	<table width="100%" class="table2">	
		<tr>
			<td>Rekening: </td><td><?=form_dropdown('how_paid_account_id',$account_list,$how_paid_account_id,"id=how_paid_account_id");?></td>
		</tr>
		<tr>
			<td>Supplier: </td><td><?=form_input('supplier_number',$supplier_number,"id=supplier_number");?>
				<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
				onclick="select_supplier();return false;"></a>			
			</td>
			<td colspan="2"><div id="supplier_info"></div></td>
		</tr>
		<tr>
			<td>Jenis Bayar: </td><td><?=form_dropdown('how_paid',array('Cash','Giro','Transfer'),$how_paid,"id=how_paid");?></td>
		</tr>
		<tr>
			<td>Tanggal Bayar: </td><td><?=form_input('date_paid',$date_paid,'class="easyui-datetimebox"');?></td>
		</tr>
		<tr>
			<td>Jumlah Bayar: </td><td><?=form_input('amount_paid',$amount_paid);?></td>
		</tr>
		<tr>
			<td colspan="4">
			</td>
		</tr>	
	</table>

	<div id="divItem" >
		<table id="dgInvoice" class="easyui-datagrid"  width="100%"
			data-options="
				toolbar: '', fitColumns: true,
				singleSelect: true,
				url: ''
			">
			<thead>
				<tr>
					<th data-options="field:'purchase_order_number',width:80">Faktur</th>
					<th data-options="field:'po_date',width:80">Tanggal</th>
					<th data-options="field:'terms',width:80">Termin</th>
					<th data-options="field:'due_date',width:80">Tempo</th>
					<th data-options="field:'amount',width:80,align:'right'">Jumlah</th>
					<th data-options="field:'saldo',width:80,align:'right'">Saldo</th>
					<th data-options="field:'bayar',width:'100'">Bayar</th>
				</tr>
			</thead>
		</table>
	</div>

	
	</form>
</div>
<?=load_view("purchase/supplier_select");?>

<script language='javascript'>
	function selected_supplier(){
		var row = $('#dgSelectSupp').datagrid('getSelected');
		if (row){
			$('#supplier_number').val(row.supplier_number);
			$('#supplier_name').val(row.supplier_name);
			$('#supplier_name').html(row.supplier_name);
			$('#dlgSelectSupp').dialog('close');
			
			select_invoice();
			
		} else {
			alert("Pilih salah satu nomor supplier !");
		}
	}	
	
	function select_invoice(){
 		if($('#supplier_number').val()==''){alert('Pilih supplier !');return false;}
 		if($('#how_paid_account_id').val()==''){alert('Pilih rekening !');return false;}
 		if($('#how_paid').val()==''){alert('Pilih jenis pembayaran !');return false;}
		$('#dgInvoice').datagrid({url:'<?=base_url()?>index.php/purchase_invoice/invoice_not_paid/'+$('#supplier_number').val()});
		$('#dgInvoice').datagrid('reload');
	}
	function process(){
		if($('#amount_paid').val()=='0' || $('#amount_paid').val()==''){
			alert('Input jumlah bayar !');
			return false;
		}
		$('#myform').submit();
	}
</script>
 	