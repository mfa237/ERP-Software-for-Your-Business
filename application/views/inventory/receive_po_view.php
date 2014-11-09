<div><h4>RECEIVE P.O. ITEMS</H4>
<div class="thumbnail">
	<?
	echo link_button('Add','','add','true',base_url().'index.php/receive_po/add');		
	echo link_button('Print', 'print_receive()','print');		
	echo link_button('Delete', 'delete_receive()','remove');	
	echo link_button('Search','','search','true',base_url().'index.php/receive_po');		
	if($mode=="view") echo link_button('Refresh','','reload','true',base_url().'index.php/receive_po/view/'.$shipment_id);		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/receive_po");
		}
	</script>
</div>
<div class="thumbnail">	
   <table >
       <tr>
           <td>Receipt No:</td><td><strong><?=$shipment_id?></strong>                        
           </td>
       </tr>
       <tr>
            <td>Nomor PO:</td><td><strong><a href="<?=base_url()?>index.php/purchase_order/view/<?=$purchase_order_number?>"><?=$purchase_order_number?></a></strong></td>
       </tr>
       <tr>
            <td>Tanggal:</td><td><?=$date_received?></td>
       </tr>
       <tr>
            <td>Gudang:</td><td><?=$warehouse_code?></td>
       </tr>
       <tr>
            <td>Supplier:</td><td colspan='4'><?=$supplier_info?></td>            
       </tr>
       <tr>
            <td>Keterangan</td>
            <td colspan="4"><?=$comments?>
            </td>
       </tr>
       <tr>
           <td>Receipt By:</td><td><?=$receipt_by?></td>
       </tr>

   </table>

		<table id="dgItems" class="easyui-datagrid"  
			data-options="
				toolbar: '#toolbar-search-faktur',
				singleSelect: true,
				url: '<?=base_url()?>index.php/receive_po/receive_items/<?=$shipment_id?>'
			">
			<thead>
				<tr>
					<th data-options="field:'item_number',width:80">Item</th>
					<th data-options="field:'description',width:180">Description</th>
					<th data-options="field:'quantity_received',width:80">Qty</th>
					<th data-options="field:'unit',width:50">Unit</th>
					<th data-options="field:'cost',width:50">Cost</th>
					<th data-options="field:'total_amount',width:50">Total</th>
					
					<th data-options="field:'id',width:50">Id</th>
				</tr>
			</thead>
		</table>
</div>		
<script language='javascript'>
	function print_receive(){
		url="<?=base_url()?>index.php/receive_po/print_bukti/<?=$shipment_id?>";
		window.open(url,'_blank');
	}
	function delete_receive()
	{
		$.ajax({
				type: "GET",
				url: "<?=base_url()?>/index.php/receive_po/delete/<?=$shipment_id?>",
				data: "",
				success: function(result){
					var result = eval('('+result+')');
					if(result.success){
						$.messager.show({
							title:'Success',msg:result.msg
						});	
						window.open('<?=base_url()?>index.php/receive_po','_self');
					} else {
						$.messager.show({
							title:'Error',msg:result.msg
						});							
					};
				},
				error: function(msg){alert(msg);}
		}); 				
		
		
	}
		
</script>		
