<div><h4>PEMBAYARAN PIUTANG</H4><div class="thumbnail">
	<?
	echo link_button('Save', 'process()','save');		
	echo link_button('Print', 'print()','print');
	echo link_button('Add','','add','true',base_url().'index.php/payment/add');		
	echo link_button('Search','','search','true',base_url().'index.php/payment');
		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/delivery_order");
		}
	</script>
	
</div>
<div class="thumbnail">	
	<form id="myform" method="POST" action="<?=base_url()?>index.php/payment/save">
	<table style="width:600px">
		<tr>
			<td>Rekening: </td><td><?=form_dropdown('how_paid_acct_id',$account_list,$how_paid_acct_id,"id=how_paid_acct_id");?></td>
		</tr>
		<tr>
			<td>Pelanggan: </td><td><?=form_input('customer_number',$customer_number,"id=customer_number");?>
				<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
				onclick="select_customer()"></a>			
			</td>
			<td colspan="2"><div id="cust_info"></div></td>
		</tr>
		<tr>
			<td>Jenis Bayar: </td><td><?=form_dropdown('how_paid',array('Cash','Giro','Transfer'),$how_paid,"id=how_paid style='width:150px'");?></td>
		</tr>
		<tr>
			<td>Tanggal Bayar: </td><td><?=form_input('date_paid',$date_paid,'class="easyui-datetimebox"');?></td>
		</tr>
		<tr>
			<td>Jumlah Bayar: </td><td><?=form_input('amount_paid',$amount_paid);?></td>
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
					<th data-options="field:'invoice_number',width:80">Faktur</th>
					<th data-options="field:'invoice_date',width:80">Tanggal</th>
					<th data-options="field:'payment_terms',width:80">Termin</th>
					<th data-options="field:'due_date',width:80">Tempo</th>
					<th data-options="field:'amount',width:80,align:'right'">Jumlah</th>
					<th data-options="field:'saldo',width:80,align:'right'">Saldo</th>
					<th data-options="field:'bayar',width:'150'">Bayar</th>
				</tr>
			</thead>
		</table>
	</div>

	</form>
</div>

<?
	include_once 'customer_select.php';
	
?>

<script language='javascript'>
	function selected_customer(){
		var row = $('#dgSelectCust').datagrid('getSelected');
		if (row){
			$('#customer_number').val(row.customer_number);
			$('#company').val(row.company);
			$('#customer_info').html(row.company);
			$('#dlgSelectCust').dialog('close');
			
			select_invoice();
			
		} else {
			alert("Pilih salah satu nomor customer !");
		}
	}
	
	function select_customer(){
		$('#dlgSelectCust').dialog('open').dialog('setTitle','Cari nama pelanggan');
		search=$('#search_cust').val();
		$('#dgSelectCust').datagrid({url:'<?=base_url()?>index.php/customer/select/'+search});
		$('#dgSelectCust').datagrid('reload');
	};
	
	function select_invoice(){
 		if($('#customer_number').val()==''){alert('Pilih pelanggan !');return false;}
 		if($('#how_paid_acct_id').val()==''){alert('Pilih rekening !');return false;}
 		if($('#how_paid').val()==''){alert('Pilih jenis pembayaran !');return false;}

		$('#dgInvoice').datagrid({url:'<?=base_url()?>index.php/invoice/invoice_not_paid/'+$('#customer_number').val()});
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
 	