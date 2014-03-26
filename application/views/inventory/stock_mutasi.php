<h1>MUTASI STOCK ANTAR LOKASI - [ 
	<?echo link_button("Print","print_mutasi()","print");?>	
]</H1>
<form id="frmItem" method='post' >
   <table>
	<tr>
		<td>Nomor</td><td><?php 
                echo form_input('transfer_id',$transfer_id,'id=transfer_id');
        ?></td>
	</tr>
       <tr>
		<td>Tanggal</td><td><?php  
                echo form_input('date_trans',$date_trans
				,"id='date_trans' class='easyui-datetimebox' required");
                
        ?></td>
       </tr>
	<tr>
		<td>Gudang Sumber</td><td><?php 
                echo form_dropdown('from_location',$warehouse_list,$from_location,'id=from_location');
        ?></td>
	</tr>
	<tr>
		<td>Gudang Tujuan</td><td><?php 
                echo form_dropdown('to_location',$warehouse_list,$to_location,'id=to_location');
        ?></td>
	</tr>
    <tr>
		<td>Catatan</td>
		<td><?php 
                	echo form_input('comments',$comments,'style="width:400px"');
        ?></td>
     </tr>
	 <tr><td>&nbsp</td><td>&nbsp</td></tr>
   </table>
<H1></H1>
<!-- LINEITEMS -->	
<h1>ITEMS DETAIL</H1>
<div id='dgItem'><?=load_view('inventory/select_item_no_price.php')?></div>
</form>


<div id='divItem' style='display:<?=$mode=="add"?"":""?>'>
	<table id="dg" class="easyui-datagrid"  
		style="width:800px;min-height:800px"
		data-options="
			iconCls: 'icon-edit',
			singleSelect: true,
			toolbar: '#tb',
			url: url_load_item
		">
		<thead>
			<tr>
				<th data-options="field:'item_number',width:80">Kode Barang</th>
				<th data-options="field:'description',width:150">Nama Barang</th>
				<th data-options="field:'from_qty',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
				<th data-options="field:'unit',width:50,align:'left',editor:'text'">Satuan</th>
				<th data-options="field:'line_number',width:30,align:'right'">Line</th>
			</tr>
		</thead>
	</table>
</div>	
<!-- LINEITEMS -->

 <script language='javascript'>
 	var grid_output="dg";
	var url_save_item = '<?=base_url()?>index.php/stock_mutasi/save_item';
	var url_load_item = url_detail();
	var url_del_item  = '<?=base_url()?>index.php/stock_mutasi/del_item';

    function url_detail(){
	 	var nomor=$('#transfer_id').val();
    	$('#ref_number').val(nomor);
    	return ('<?=base_url()?>index.php/stock_mutasi/items/'+nomor+'/json');
    }
	function print_mutasi(){
		nomor=$("#transfer_id").val();
		url="<?=base_url()?>index.php/stock_mutasi/print_bukti/"+nomor;
		window.open(url,'_blank');
	}
    
 </script>
