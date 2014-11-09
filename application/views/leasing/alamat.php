<table id="dgAlamat" class="easyui-datagrid"  
	style="width:auto;min-height:200px"
	data-options="
		iconCls: 'icon-edit',
		singleSelect: true,
		toolbar: '#tb',
		url: '<?=base_url()?>index.php/leasing/app_master/alamat/<?=$app_id?>'
	">
	jenis alamat: alamat penagihan, alamat ktp, family
	<thead>
		<tr>
			<th data-options="field:'jenis_alamat'">Jenis ALamat</th>
			<th data-options="field:'contact'">Contact</th>
			<th data-options="field:'relation'">Hubungan</th>
			<th data-options="field:'phone'">Telpon</th>
			<th data-options="field:'city'">Kota</th>
			<th data-options="field:'kec'">Kecamatan</th>
			<th data-options="field:'kel'">Kelurahaan</th>
			<th data-options="field:'zip_pos'">Kode Pos</th>
			<th data-options="field:'rtrw'">RT/RW</th>
			<th data-options="field:'street'">Alamat</th>
			<th data-options="field:'id',align:'right'">id</th>
		</tr>
	</thead>
</table>
