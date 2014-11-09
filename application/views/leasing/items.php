<table id="dgItems" class="easyui-datagrid"  
	style="width:auto;min-height:200px"
	data-options="
		iconCls: 'icon-edit',
		singleSelect: true,
		toolbar: '#tb',
		url: '<?=base_url()?>index.php/leasing/app_master/items/<?=$app_id?>'
	">
	<thead>
		<tr>
			<th data-options="field:'obj_id'">Kode Barang</th>
			<th data-options="field:'description',width:200">Nama Barang</th>
			<th data-options="field:'qty',align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
			<th data-options="field:'unit',align:'left',editor:'text'">Satuan</th>
			<th data-options="field:'price',width:60,align:'right',editor:'numberbox',
				formatter: function(value,row,index){
					return number_format(value,2,'.',',');}">Harga</th>

			<th data-options="field:'discount',editor:'numberbox'">Disc%</th>
			<th data-options="field:'amount',width:60,align:'right',editor:'numberbox',
				formatter: function(value,row,index){
					return number_format(value,2,'.',',');}">Jumlah</th>
			<th data-options="field:'id',align:'right'">id</th>
		</tr>
	</thead>
</table>
