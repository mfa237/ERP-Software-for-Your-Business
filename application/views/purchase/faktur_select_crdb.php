<!-- PILIH FAKTUR --> 
<div id='dlgSelectFaktur'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-faktur">
     <div id='divSelectFaktur'> 
		<table id="dgSelectFaktur" class="easyui-datagrid"  
			data-options="
				toolbar: '#toolbar-search-faktur',
				singleSelect: true,
				url: ''
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
		var supp=$("#supplier_number").val();
		if(supp==""){alert("Pilih supplier dulu.");return false;}
		var xurl='<?=base_url()?>index.php/purchase_invoice/select/'+supp;
		console.log(xurl);
		$('#dlgSelectFaktur').dialog('open').dialog('setTitle','Cari nomor faktur');
		$('#dgSelectFaktur').datagrid({url:xurl});
		$('#dgSelectaktur').datagrid('reload');
	};	
	function selected_faktur(){
		var row = $('#dgSelectFaktur').datagrid('getSelected');
		if (row){
			$('#docnumber').val(row.purchase_order_number);
			$('#dlgSelectFaktur').dialog('close');
			find_faktur();
		} else {
			alert("Pilih salah satu nomor faktur !");
		}
	}	
	function find_faktur(){
		var nomor=$('#docnumber').val();
		if(nomor=="")return false;
		xurl=CI_ROOT+'purchase_invoice/find/'+nomor;
		$.ajax({
					type: "GET",
					url: xurl,
					data:'invoice_number='+nomor,
					success: function(msg){
						var obj=jQuery.parseJSON(msg);
						$('#faktur_info').html('Tanggal: '+obj.po_date+', Jumlah: '+obj.amount+', Saldo: '+obj.saldo);
					},
					error: function(msg){alert(msg);}
		});
	};

</SCRIPT>
<!-- END PILIH PELANGGAN -->

