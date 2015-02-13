<div><h1>DATA ABSENSI</h1>
	<div class="thumbnail">
		<form name="frmCariAbsen">
		<table>
			 
			<tr><td>Periode</td><td><?=form_dropdown('periode',$periode_list,$periode,"id='periode'")?>
			</td></tr>
			<tr><td>NIP</td><td colspan="3"><?=form_input('nip',$nip,"id='nip'") 
			. link_button('','lookup_employee()','search')
			. link_button('Refresh','load_absen()',"reload") ?></td></tr>
			<tr><td>Nama</td><td><?=form_input('nama',$nama,'id=nama disabled')?></td>
			<td>Department</td><td><?=form_input('dept',$dept,'id=dept disabled')?></td>
			<td>Divisi</td><td><?=form_input('divisi',$divisi,'id=divisi disabled')?></td></tr>
			<tr><td></td></tr>
		</table>
		</form>
	</div>
	<div class="thumbnail" >
		<table id="dg" class="easyui-datagrid"  
				style="width:700px;min-height:800px"
				data-options="
					iconCls: 'icon-edit',
					singleSelect: true,
					toolbar: '#tb',
					url: '<?=base_url()?>index.php/payroll/absensi/data_nip/<?=$nip?>/<?=$periode?>'
				">
				<thead>
					<tr>
						<th data-options="field:'tanggal'">Tanggal</th>
						<th data-options="field:'time_in'">TimeIn</th>
						<th data-options="field:'time_out'">TimeOut</th>
						<th data-options="field:'ot_in'">OT In</th>
						<th data-options="field:'ot_out'">OT Out</th>
						<th data-options="field:'id',align:'right'">Line</th>
					</tr>
				</thead>
		</table>
	</div>
</div>
<div id="tb">
	<div class="thumbnail">
		<?=link_button('Add Item','add_item()','save')?>
		<?=link_button('Edit','edit_item()','edit')?>
		<?=link_button('Remove','del_item()','remove')?>
	</div>
</div>
<?=load_view('payroll/employee_lookup')?>
<script language="JavaScript">
	function add_item(){
 	}
 	function del_item(){
	}
 	function edit_item(){
 	}
 	function load_absen(){
 		var nip=$("#nip").val();
 		var periode=$("#periode").val();
		$('#dg').datagrid({url:'<?=base_url()?>index.php/payroll/absensi/data_nip/'+nip+'/'+periode});
		$('#dg').datagrid('reload');
 	}
	
</script>