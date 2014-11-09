<table id="dgCards" class="easyui-datagrid"  
	style="width:auto;min-height:200px"
	data-options="
		iconCls: 'icon-edit',
		singleSelect: true,
		toolbar: '#tb',
		url: '<?=base_url()?>index.php/leasing/app_master/kartukredit/<?=$app_id?>'
	">
	<thead>
		<tr>
			<th data-options="field:'card_no'">Nomor</th>
			<th data-options="field:'card_bank',width:200">Nama Bank</th>
			<th data-options="field:'card_expire',align:'left',editor:'text'">Expire</th>
			<th data-options="field:'card_type',width:200">Card Type</th>
			<th data-options="field:'card_limit',width:200">Card Limit</th>
			<th data-options="field:'id',align:'right'">id</th>
		</tr>
	</thead>
</table>
