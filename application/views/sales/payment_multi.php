<form id="myform" method="POST" action="<?=base_url()?>index.php/payment/save">
<table style="width:90%">
	<tr>
		<td colspan=4><strong><h1>PROSES PEMBAYARAN BANYAK FAKTUR</h1></strong></td>
	</tr>
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
			<div id="divItem" style="display:none">
				<div id="divItemTop"></div>
				<div id="divItemBtm">
					<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'" 
					onclick="process();">Proses</a>
				</div>
			</div>
		</td>
	</tr>	
</table>
</form>

<div id='dlgSelectCust'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-cust">
     <div id='divSelectCust'> 
		<table id="dgSelectCust" class="easyui-datagrid"  
			data-options="
				toolbar: '#toolbar-search-cust',
				singleSelect: true,
				url: '<?=base_url()?>index.php/customer/select'
			">
			<thead>
				<tr>
					<th data-options="field:'company',width:80">Pelanggan</th>
					<th data-options="field:'customer_number',width:80">Kode</th>
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
			$('#customer_number').val(row.customer_number);
			//$('#company').val(row.company);
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
 		$("#divItem").fadeIn("slow");
 		url=CI_ROOT+"invoice/select_list";
 		param="q=not_paid&cust="+$('#customer_number').val();
 		void get_this(url,param,'divItemTop');
	}
	function process(){
		if($('#amount_paid').val()=='0' || $('#amount_paid').val()==''){
			alert('Input jumlah bayar !');
			return false;
		}
		$('#myform').submit();
	}
</script>
 	