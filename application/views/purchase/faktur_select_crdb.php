<!-- PILIH FAKTUR --> 
<div id='dlgSelectFaktur'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-faktur">
     <div id='divSelectFaktur'> 
		<table id="dgSelectFaktur" class="easyui-datagrid"  
			data-options="
				toolbar: '#toolbar-search-faktur',
				singleSelect: true,
				url: '<?=base_url()?>index.php/purchase_invoice/select'
			">
			<thead>
				<tr>
					<th data-options="field:'purchase_order_number',width:80">Faktur</th>
					<th data-options="field:'po_date',width:80">Tanggal</th>
					<th data-options="field:'terms',width:180">Termin</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>
<div id="toolbar-search-faktur" style="height:auto">
	Enter Text: <input  id="search_supp" style='width:180' name="search_supp">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="select_faktur()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selected_faktur()">Select</a>
</div>
<SCRIPT language="javascript">
	function select_faktur(){
			$('#dlgSelectFaktur').dialog('open').dialog('setTitle','Cari nomor faktur');
			$('#dgSelectFaktur').datagrid({url:'<?=base_url()?>index.php/purchase_invoice/select'});
			$('#dgSelectaktur').datagrid('reload');
	};	
	function selected_faktur(){
		var row = $('#dgSelectFaktur').datagrid('getSelected');
		if (row){
			$('#docnumber').val(row.purchase_order_number);
			//$('#company').val(row.company);
			$('#dlgSelectFaktur').dialog('close');
		} else {
			alert("Pilih salah satu nomor faktur !");
		}
	}	
</SCRIPT>
<!-- END PILIH PELANGGAN -->

