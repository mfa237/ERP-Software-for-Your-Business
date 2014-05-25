
<!-- DIALOG KODE PERKIRAAN -->
<div id='dlgCoa' class="easyui-dialog"  style="width:600px;height:380px;padding:5px 5px"
closed="true"  toolbar="#tbCoa"
>
		<table id="dgCoa" class="easyui-datagrid"  
		data-options="toolbar: '', singleSelect: true,
			url: '<?=base_url()?>index.php/coa/select'">
			<thead>
				<tr>
					<th data-options="field:'account',width:80">Kode Akun</th>
					<th data-options="field:'account_description',width:250">Nama Perkiraan</th>
					<th data-options="field:'id',width:30">ID</th>
				</tr>
			</thead>
		</table>
</div>
<div id="tbCoa" style="height:auto">
	Enter Text: <input  id="search_coa" style='width:180' name="search_coa">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
	onclick="search_coa()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="select_coa()">Select</a>
</div>

<script type="text/javascript">
	var idd='';
	function lookup_coa(id) {
		idd=id;
		$('#dlgCoa').dialog('open').dialog('setTitle','Cari kode perkiraan');
		coa=$('#search_coa').val();
		$('#dgCoa').datagrid({url:'<?=base_url()?>index.php/coa/select/'+coa});
		$('#dgCoa').datagrid('reload');
	}
	function select_coa() {
		var row = $('#dgCoa').datagrid('getSelected');
		if (row){
			$('#'+idd).val(row.account+' - '+row.account_description);
			$('#dlgCoa').dialog('close');
		}			
	}
	function search_coa(){
		coa=$('#search_coa').val();
		$('#dgCoa').datagrid({url:'<?=base_url()?>index.php/coa/select/'+coa});
		$('#dgCoa').datagrid('reload');		
	}
</script>
<!-- END DIALOG KODE PERKIRAAN -->
