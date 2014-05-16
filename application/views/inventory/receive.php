<div><h3>PROSES PENERIMAAN BARANG NON PO <div class="thumbnail">
	<?
	echo link_button('print', 'print_receive()','print');		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/receive_non_po");
		}
	</script>
	
</div></H1>
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
            <td>Pengirim</td><td><?php echo form_input('supplier_number',$supplier_number,'id=supplier_number');?></td>
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
<div id='dgItem'><?=load_view('inventory/select_item_no_price.php')?></div>
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
				<th data-options="field:'line_number',width:30,align:'right'">Line</th>
			</tr>
		</thead>
	</table>
</div>	
<!-- LINEITEMS -->
</div></div>
 <script language='javascript'>
 	var grid_output="dg";
	var url_save_item = '<?=base_url()?>index.php/receive/save_item';
	var url_load_item = url_detail();
	var url_del_item  = '<?=base_url()?>index.php/receive/del_item';

    function url_detail(){
	 	var nomor=$('#shipment_id').val();
    	$('#ref_number').val(nomor);
    	return ('<?=base_url()?>index.php/receive/items/'+nomor+'/json');
    }
	function print_receive(){
		nomor=$("#shipment_id").val();
		url="<?=base_url()?>index.php/receive/print_bukti/"+nomor;
		window.open(url,'_blank');
	}
    
 </script>
