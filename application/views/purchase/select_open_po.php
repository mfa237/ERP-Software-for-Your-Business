<!-- PILIH FAKTUR --> 
<div id='dlgSelectFaktur'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-faktur">
     <div id='divSelectFaktur'> 
		<table id="dgSelectFaktur" class="easyui-datagrid"  
			data-options="
				toolbar: '#toolbar-search-faktur',
				singleSelect: true,
				url: '<?=base_url()?>index.php/purchase_order/select_open_po'
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
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="select_po()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selected_po()">Select</a>
</div>
<SCRIPT language="javascript">
	function select_po(){
			$('#dlgSelectFaktur').dialog('open').dialog('setTitle','Cari nomor PO');
			supp=$('#supplier_number').val();
			$('#dgSelectFaktur').datagrid({url:'<?=base_url()?>index.php/purchase_order/select_open_po/'+supp});
			$('#dgSelectaktur').datagrid('reload');
	};	
	function selected_po(){
		var row = $('#dgSelectFaktur').datagrid('getSelected');
		if (row){
			var nomor=row.purchase_order_number;
			$('#purchase_order_number').val(nomor);
			$('#dlgSelectFaktur').dialog('close');
	 		$("#divItem").fadeIn("slow");
	 		url=CI_ROOT+"purchase_order/items_not_received/"+nomor;
	 		void get_this(url,'','divItem');
		} else {
			alert("Pilih salah satu nomor purchase order !");
		}
	}	
	
</SCRIPT>
<!-- END PILIH FAKTUR -->

