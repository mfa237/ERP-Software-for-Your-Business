<legend>MUTASI STOCK ANTAR LOKASI</legend>
<div class="thumbnail box-gradient"> 
	<?
	echo link_button('Add','','add','true',base_url().'index.php/stock_mutasi/add');		
	echo link_button("Print","print_mutasi()","print");
	echo link_button('Search','','search','true',base_url().'index.php/stock_mutasi');		
	echo link_button('Help', 'load_help(\'stock_mutasi\')','help');		
		
	?>	
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help('stock_mutasi')">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>	
</div> 
<div class="thumbnail">	
<form id="frmItem" method='post' >
   <table class="table2" width="100%">
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
 
<!-- LINEITEMS -->	
	<div id='dgItem'><?=load_view('inventory/select_item_no_price.php')?></div>
	
	<div id='divItem' style='display:<?=$mode=="add"?"":""?>'>
		<table id="dg" class="easyui-datagrid"  
			data-options="
				iconCls: 'icon-edit',fitColumns:true,
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
	
</form>



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