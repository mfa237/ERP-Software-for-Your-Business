<div><h3>PEMBAYARAN HUTANG</H3><div class="thumbnail">
	<?
	echo link_button('Save', 'process()','save');		
	echo link_button('Print', 'print_pay()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/payables_payments/add');		
	echo link_button('Search','','search','true',base_url().'index.php/payables_payments');		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/payables_payments");
		}
	</script>

</div>
<div class="thumbnail">	
	<form id="myform" method="POST" action="<?=base_url()?>index.php/payables_payments/save">
	<table>
	
		<tr>
			<td>Rekening: </td><td><?=form_dropdown('how_paid_account_id',$account_list,$how_paid_account_id,"id=how_paid_account_id");?></td>
		</tr>
		<tr>
			<td>Supplier: </td><td><?=form_input('supplier_number',$supplier_number,"id=supplier_number");?>
				<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
				onclick="select_supplier()"></a>			
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
		<table id="dgInvoice" class="easyui-datagrid"  
			data-options="
				toolbar: '',
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
<div id='dlgSelectCust'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-cust">
     <div id='divSelectCust'> 
		<table id="dgSelectCust" class="easyui-datagrid"  
			data-options="
				toolbar: '#toolbar-search-cust',
				singleSelect: true,
				url: ''
			">
			<thead>
				<tr>
					<th data-options="field:'supplier_name',width:80">Supplier</th>
					<th data-options="field:'supplier_number',width:80">Kode</th>
					<th data-options="field:'city',width:180">Kota</th>
					<th data-options="field:'region',width:80">Wilayah</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>
<div id="toolbar-search-cust" style="height:auto">
	Enter Text: <input  id="search_cust" style='width:180' name="search_cust">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="select_customer()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selected_customer()">Select</a>
</div>

<script language='javascript'>
	function selected_customer(){
		var row = $('#dgSelectCust').datagrid('getSelected');
		if (row){
			$('#supplier_number').val(row.supplier_number);
			//$('#supplier_name').val(row.supplier_name);
			$('#dlgSelectCust').dialog('close');
			select_invoice();
			
		} else {
			alert("Pilih salah satu nomor supplier !");
		}
	}
	
	function select_supplier(){
			$('#dlgSelectCust').dialog('open').dialog('setTitle','Cari nama pelanggan');
			search=$('#search_cust').val();
			$('#dgSelectCust').datagrid({url:'<?=base_url()?>index.php/supplier/select/'+search});
			$('#dgSelectCust').datagrid('reload');
	};
	
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
 	