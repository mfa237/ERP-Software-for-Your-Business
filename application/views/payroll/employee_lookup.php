<div id="tb_employee" style="height:auto">
	Enter Text: <input  id="search_emp" style='width:180' name="search_emp">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
	onclick="search_employee()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="select_employee()">Select</a>
</div>

<div id='dlg_employee'class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
        closed="true" buttons="#dlg_buttons_employee">
     <div id='div_employee_result'> 
		<table id="dg_employee" class="easyui-datagrid"  
			data-options="
				toolbar: '#tb_employee',
				singleSelect: true,
				url: '<?=base_url()?>index.php/employee/find'
			">
			<thead>
				<tr>
					<th data-options="field:'nama',width:250">Nama Pegawai</th>
					<th data-options="field:'nip',width:80">NIP</th>
					<th data-options="field:'dept',width:80">NIP</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>	   

<script language="JavaScript">
	function select_employee()	{
			var row = $('#dg_employee').datagrid('getSelected');
			if (row){
				$('#nip').val(row.nip);
				$('#nama').val(row.nama);
				$('#dlg_employee').dialog('close');
			}
	}
	function lookup_employee()	{
		$('#dlg_employee').dialog('open').dialog('setTitle','Cari nama pegawai');
		nama=$('#search_emp').val();
		xurl='<?=base_url()?>index.php/employee/find2/'+nama;
		$('#dg_employee').datagrid({url:xurl});
		$('#dg_employee').datagrid('reload');
	}
</script>