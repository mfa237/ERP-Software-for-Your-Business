<div><h1>KOMPONEN GAJI</h1><h2>UNTUK GROUP: <?=$kode_group?></h2>
	<div class="thumbnail" >
		<table id="dg" class="easyui-datagrid"  
				style="width:700px;min-height:800px"
				data-options="
					iconCls: 'icon-edit',
					singleSelect: true,
					toolbar: '#tb',
					url: '<?=base_url()?>index.php/payroll/slip_komponen/<?=$kode_group?>'
				">
				<thead>
					<tr>
						<th data-options="field:'jenis'">Jenis</th>
						<th data-options="field:'no_urut'">No Urut</th>
						<th data-options="field:'salary_com_code'">Kode</th>
						<th data-options="field:'salary_com_name'">Nama Komponen</th>
						<th data-options="field:'formula_string'">Rumus</th>
						<th data-options="field:'id',align:'right'">Line</th>
					</tr>
				</thead>
		</table>
	</div>
</div>
<div id="tb">
    <form id="frmItem" method='post' >
	<div class="thumbnail">
		<?=link_button('Add Item','add_item()','save')?>
		<?=link_button('Edit','edit_item()','edit')?>
		<?=link_button('Remove','del_item()','remove')?>
	</div>
	<div class="thumbnail">
			<table>
				<tr><td>Komponen</td><td>Rumus</td><td>No Urut</td></tr>
				<tr><td><?=form_dropdown('salary_com_code',$com_list,$salary_com_code)?></td>
					<td><?=form_input('formula_string',$formula_string,"style='width:350px'")?></td>
					<td><?=form_input('no_urut',$no_urut,"style='width:50px'")?></td>
				</tr>
				<tr>
					<td><?=form_hidden('level_code',$kode_group)?></td>
					<td><?=form_hidden('id',$id)?></td>
				</tr>
			</table>		
	</div>
    </form>

</div>
<script language="JavaScript">
	function add_item(){
		url='<?=base_url()?>index.php/payroll/slip_komponen/<?=$kode_group?>/save';
	 
			$('#frmItem').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dg').datagrid({url:'<?=base_url()?>index.php/payroll/slip_komponen/<?=$kode_group?>'});
						$('#dg').datagrid('reload');
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
 	}
 	function del_item(){
		var row = $('#dg').datagrid('getSelected');
		if (row){
			$.messager.confirm('Confirm','Are you sure you want to remove this line?',function(r){
				if (r){
					url='<?=base_url()?>index.php/payroll/slip_komponen/<?=$kode_group?>/delete';
					$.post(url,{line_number:row.id},function(result){
						if (result.success){
							$('#dg').datagrid('reload');	// reload the user data
						} else {
							$.messager.show({	// show error message
								title: 'Error',
								msg: result.msg
							});
						}
					},'json');
				}
			});
		}
	}
 	function edit_item(){
		var row = $('#dg').datagrid('getSelected');
		if (row){
			$('#frmItem').form('load',row);
		}
 	}
	
</script>