<div><h4>PROSES PENERIMAAN BARANG PRODUKSI</H4><div class="thumbnail">
	<?
	echo link_button('print', 'print_receive()','print');		
	echo link_button('Search','','search','true',base_url().'index.php/receive_prod');		
	echo link_button('Help', 'load_help()','help');		
	?>
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	<script type="text/javascript">
		function load_help() {
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/receive_prod");
		}
	</script>
	
</div>
<div class="thumbnail">	
<form id="frmItem" method='post' >
   <table>
	<tr>
		<td>Nomor Bukti</td><td>
		<?php echo form_input('shipment_id',$shipment_id,"id=shipment_id"); ?>
                </td>
	</tr>	 
       <tr>
            <td>Tanggal</td><td><?php echo form_input('date_received',$date_received,'id=date_received ,
             class="easyui-datetimebox" required ');?>
            </td>
       </tr>
	<tr>
		<td>Gudang</td><td><?php 
                echo form_dropdown('warehouse_code',
                    $warehouse_list,$warehouse_code,'id=warehouse_code');
                ?></td>
	</tr>
       <tr>
            <td>WO Number</td><td><?php echo form_input('purchase_order_number',$purchase_order_number,'id=purchase_order_number');?>
				<?=link_button('','lookup_work_order()','search');?>			
			
			</td>
       </tr>
       <tr>
            <td>Catatan</td><td><?php echo form_input('comments',$comments,'id=comments style="width:400px"');?></td>
       </tr>
       <tr><td></td><td></td></tr>
       <tr>
           <td colspan="4">
           </td>
       </tr>
	 <tr><td> 
	 </td><td> 
        </td></tr>
   </table>
<!-- LINEITEMS -->	
<h5>ITEMS DETAIL</H5>
<div id='dgItem'><?=load_view('manuf/select_wo_items.php')?></div>
</form>

<div id='divItem' style='display:<?=$mode=="add"?"":""?>'>
	<table id="dg" class="easyui-datagrid"  
		style="width:600px;min-height:800px"
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
				<th data-options="field:'quantity_received',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
				<th data-options="field:'unit',width:50,align:'left',editor:'text'">Satuan</th>
				<th data-options="field:'cost',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Cost</th>
				<th data-options="field:'total_amount',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Total</th>
				<th data-options="field:'line_number',width:30,align:'right'">Line</th>
			</tr>
		</thead>
	</table>
</div>	
<!-- LINEITEMS -->
</div></div>

<div id='dlgWo'class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
		closed="true" buttons="#btnWo">
		<table id="dgWo" class="easyui-datagrid" data-options="singleSelect: true">
			<thead>
				<tr>
					<th data-options="field:'work_order_no',width:150">Nomor Work Order</th>
					<th data-options="field:'start_date',width:80">Tanggal Mulai</th>
					<th data-options="field:'expected_date',width:80">Tanggal Akhir</th>
					<th data-options="field:'wo_status',width:80">Status</th>
				</tr>
			</thead>
		</table>
</div>
<div id="btnWo"><?=link_button("Select","select_work_order();return false;","ok")?></div>	  



 <script language='javascript'>
 	var grid_output="dg";
	var url_save_item = '<?=base_url()?>index.php/receive_prod/save_item';
	var url_load_item = url_detail();
	var url_del_item  = '<?=base_url()?>index.php/receive_prod/del_item';

    function url_detail(){
	 	var nomor=$('#shipment_id').val();
    	$('#ref_number').val(nomor);
    	return ('<?=base_url()?>index.php/receive_prod/items/'+nomor+'/json');
    }
	function print_receive(){
		nomor=$("#shipment_id").val();
		url="<?=base_url()?>index.php/receive_prod/print_bukti/"+nomor;
		window.open(url,'_blank');
	}
	function lookup_work_order()
	{
		$('#dlgWo').dialog('open').dialog('setTitle','Cari nomor work order');
		$('#dgWo').datagrid({url:'<?=base_url()?>index.php/workorder/select_wo_open'});
		$('#dgWo').datagrid('reload');
	}
	function select_work_order()
	{
		var row = $('#dgWo').datagrid('getSelected');
		if (row){
			$('#purchase_order_number').val(row.work_order_no);
			$('#dlgWo').dialog('close');
		}
	}
	    
 </script>
