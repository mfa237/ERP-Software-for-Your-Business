<!-- PILIH PELANGGAN --> 
<div id='dlgSelectSupp'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-cust">
     <div id='divSelectSupp'> 
		<div id="toolbar-search-supp" class="thumbnail" style="height:auto">
			Enter Text: <input id="search_supp_lov" style='width:180' name="search_supp_lov">
			<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="select_supplier()"></a>        
			<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selected_supplier()">Select</a>
		</div>
	 
		<table id="dgSelectSupp" class="easyui-datagrid"  
			data-options="
				toolbar: '',
				singleSelect: true,
				url: ''
			">
			<thead>
				<tr>
					<th data-options="field:'supplier_name',width:180">Supplier</th>
					<th data-options="field:'supplier_number',width:80">Kode</th>
					<th data-options="field:'city',width:80">Kota</th>
					<th data-options="field:'region',width:80">Wilayah</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>
<SCRIPT language="javascript">
	function select_supplier(){
			$('#dlgSelectSupp').dialog('open').dialog('setTitle','Cari nama supplier');
			var search=$('#search_supp_lov').val();
			var xurl='<?=base_url()?>index.php/supplier/select/'+search;
			console.log(xurl);
			$('#dgSelectSupp').datagrid({url:xurl});
			$('#dgSelectSupp').datagrid('reload');
	};	
	function selected_supplier(){
		var row = $('#dgSelectSupp').datagrid('getSelected');
		if (row){
			$('#supplier_number').val(row.supplier_number);
			$('#supplier_name').val(row.supplier_name);
			$('#supplier_name').html(row.supplier_name);
			$('#dlgSelectSupp').dialog('close');
		} else {
			alert("Pilih salah satu nomor supplier !");
		}
	}	
</SCRIPT>
<!-- END PILIH PELANGGAN -->

