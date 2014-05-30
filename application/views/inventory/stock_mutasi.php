<div><h4>MUTASI STOCK ANTAR LOKASI</h4><div class="thumbnail"> 
	<?
	echo link_button("Print","print_mutasi()","print");
	echo link_button('Help', 'load_help()','help');		
		
	?>	
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	
	
</div> 
<div class="thumbnail">	
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
 
<!-- LINEITEMS -->	
<h5>ITEMS DETAIL</H5>
<div id='dgItem'><?=load_view('inventory/select_item_no_price.php')?></div>
</form>


<div id='divItem' style='display:<?=$mode=="add"?"":""?>'>
	<table id="dg" class="easyui-datagrid"  
		style="width:500px;min-height:800px"
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
 <script type="text/javascript">
		function load_help() {
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/stock_mutasi");
		}
	</script>
	
