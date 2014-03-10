<!-- PILIH PELANGGAN --> 
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
<SCRIPT language="javascript">
	function select_customer(){
			$('#dlgSelectCust').dialog('open').dialog('setTitle','Cari nama pelanggan');
			search=$('#search_cust').val();
			$('#dgSelectCust').datagrid({url:'<?=base_url()?>index.php/customer/select/'+search});
			$('#dgSelectCust').datagrid('reload');
	};	
	function selected_customer(){
		var row = $('#dgSelectCust').datagrid('getSelected');
		if (row){
			$('#sold_to_customer').val(row.customer_number);
			//$('#company').val(row.company);
			$('#dlgSelectCust').dialog('close');
		} else {
			alert("Pilih salah satu nomor customer !");
		}
	}	
</SCRIPT>
<!-- END PILIH PELANGGAN -->

