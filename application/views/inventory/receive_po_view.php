<h1>PENERIMAAN BARANG DARI PO - [<?=link_button('Print','print_receive()','print');?>]</H1>

   <table >
       <tr>
           <td>Receipt No:</td><td><strong><?=$shipment_id?></strong>
                        
           </td>
           
                       
       </tr>
       <tr>
            <td>Nomor PO:</td><td><strong><?=$purchase_order_number?></strong></td>
                       
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
					<th data-options="field:'id',width:50">Id</th>
				</tr>
			</thead>
		</table>
		
<script language='javascript'>
	function print_receive(){
		url="<?=base_url()?>index.php/receive_po/print_bukti/<?=$shipment_id?>";
		window.open(url,'_blank');
	}
		
</script>		
