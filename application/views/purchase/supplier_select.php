<!-- PILIH PELANGGAN --> 
<div id='dlgSelectSupp'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-cust">
     <div id='divSelectSupp'> 
		<table id="dgSelectSupp" class="easyui-datagrid"  
			data-options="
				toolbar: '#toolbar-search-supp',
				singleSelect: true,
				url: '<?=base_url()?>index.php/supplier/select'
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
<div id="toolbar-search-supp" style="height:auto">
	Enter Text: <input  id="search_supp" style='width:180' name="search_supp">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="select_supplier()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selected_supplier()">Select</a>
</div>
<SCRIPT language="javascript">
	function select_supplier(){
			$('#dlgSelectSupp').dialog('open').dialog('setTitle','Cari nama supplier');
			search=$('#search_supp').val();
			$('#dgSelectSupp').datagrid({url:'<?=base_url()?>index.php/supplier/select/'+search});
			$('#dgSelectSupp').datagrid('reload');
	};	
	function selected_supplier(){
		var row = $('#dgSelectSupp').datagrid('getSelected');
		if (row){
			$('#supplier_number').val(row.supplier_number);
			//$('#company').val(row.company);
			$('#dlgSelectSupp').dialog('close');
		} else {
			alert("Pilih salah satu nomor supplier !");
		}
	}	
</SCRIPT>
<!-- END PILIH PELANGGAN -->

