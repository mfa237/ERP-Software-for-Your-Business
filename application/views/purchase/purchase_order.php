 
<div class="max-tool"><h4>PURCHASE ORDER</h4><div class="thumbnail tool">
	<?
	$disabled="";$disabled_edit="";
	if(!($mode=="add" or $mode=="edit"))$disabled=" disabled";
	if($mode=="edit")$disabled_edit=" disabled";
	if($mode=="edit" or $mode=="add") echo link_button('Save', 'save_po()','save');		
	if($mode=="view") {
		echo link_button('Edit', '','edit','true',base_url().'index.php/purchase_order/view/'.$purchase_order_number.'/edit');		
		echo link_button('Add','','add','true',base_url().'index.php/purchase_order/add');		
		echo link_button('Refresh','','reload','true',base_url().'index.php/purchase_order/view/'.$purchase_order_number);		
		echo link_button('Delete', 'delete_nomor()','cut');		
	}
	echo link_button('Print', 'print_po()','print');		
	echo link_button('Search','','search','true',base_url().'index.php/purchase_order');		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/purchase_order");
		}
	</script>
	
</div>
<div class="thumbnail">	
<form id='frmPo' method="post">
<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
<?php echo validation_errors(); ?>
   <table>
		<tr>
			<td>Nomor PO</td>
			<td><?php
				 echo form_input('purchase_order_number',
				$purchase_order_number,"id='purchase_order_number' 
				class='easyui-validatebox' data-options='required:true,	validType:length[3,30]' ".$disabled.$disabled_edit); 
			?></td>
			<td rowspan='4'>
				<span id='supplier_name' name='supplier_name' class='thumbnail' style='height:100px;width:300px'><?=$supplier_info?></span>
			</td>
       </tr>	 
       <tr>
        	<td>Tanggal</td><td><?php echo form_input('po_date',$po_date,'id=po_date  
        	class="easyui-datetimebox" required:true '.$disabled);?></td>
       </tr>	 
       <tr>
            <td>Supplier</td><td colspan=4><?php 
            echo form_input('supplier_number',$supplier_number,
            "id=supplier_number class='easyui-validatebox' data-options='required:true,
			validType:length[3,30]'".$disabled.$disabled_edit);
			if($mode=="add") echo link_button('','select_supplier()',"search","true"); 
			 
            ?>
			</td>
            
       </tr>	 
       <tr>
            <td>Termin</td><td><?php echo form_dropdown('terms',$term_list,$terms,"id=terms 
			class='easyui-validatebox' data-options='required:true,
			validType:length[3,30]'            
            ".$disabled);?></td>
       </tr>
       <tr>
            <td>Rencana Diterima</td>
            <td><?=form_input('due_date',$po_date,'id=due_date  class="easyui-datetimebox" required'.$disabled);?></td>
       </tr>
       <tr>
            <td>Keterangan</td><td colspan="3"><?php echo form_input('comments',$comments,'id=comments style="width:300px"'.$disabled);?></td>
       </tr>
       <tr><td></td><td></td></tr>
       <tr>
           <td colspan="4">
           </td>
       </tr>
	 <tr><td> 
	 </td><td>&nbsp;</td></tr>
   </table>
</form>
</div> 
 
<div class="easyui-tabs" style="height:550px">
	<div title="Items" style="padding:10px">
	<!-- PURCASE_ORDER_LINEITEMS -->	
	<div id='divItem'>
		 
		<div id='dgItem'>
			<? include_once "purchase_order_items.php"; ?>
		</div>
		<table id="dg" class="easyui-datagrid"  
			style="min-height:800px"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,
				toolbar: '#tb',
				url: '<?=base_url()?>index.php/purchase_order/items/<?=$purchase_order_number?>/json'
			">
			<thead>
				<tr>
					<th data-options="field:'item_number',width:80">Kode Barang</th>
					<th data-options="field:'description',width:150">Nama Barang</th>
					<th data-options="field:'quantity',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
					<th data-options="field:'unit',width:50,align:'left',editor:'text'">Satuan</th>
					<th data-options="field:'price',width:80,align:'right',editor:{type:'numberbox',options:{precision:2}}">Harga</th>
					<th data-options="field:'discount',width:50,editor:'numberbox'">Disc%</th>
					<th data-options="field:'total_price',width:60,align:'right',editor:'numberbox'">Jumlah</th>
					<th data-options="field:'qty_recvd',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty Recvd</th>
					<th data-options="field:'line_number',width:30,align:'right'">Line</th>
				</tr>
			</thead>
		</table>
	<!-- END PURCHASE_ORDER_LINEITEMS -->
		<h5>TOTAL</H5>
		<div id='divTotal'> 
			<table>
				<tr>
					<td>Sub Total: </td><td><input id='sub_total' value='<?=$subtotal?>' style='width:100px'></td>				
					<td>Discount %: </td><td><input id='disc_total_percent' value='<?=$discount?>' style='width:50px'></td>
					<td>Pajak PPN %: </td><td><input id='po_tax_percent' value='<?=$tax?>' style='width:50px'></td>
				</tr>
				<tr>
					<td>Ongkos Angkut: </td><td><input id='freight' value='<?=$freight?>' style='width:80px'></td>
					<td>Biaya Lain: </td><td><input id='others' value='<?=$other?>' style='width:80px'></td>
					<td>JUMLAH: </td><td><input id='total' value='<?=$amount?>' style='width:100px'>
						 <a id='divHitung' href="#" class="easyui-linkbutton" data-options="iconCls:'icon-sum'"  
						   plain='true' title='Hitung ulang' onclick='hitung_jumlah()'></a>
					</td>
				</tr>
			</table>		
		</div>
		
	</div>	
	</div>
	<div title='Receive' style="padding:10px">
		<table id="dgRcv" class="easyui-datagrid"  
			style="min-height:700px"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true, toolbar: '#tbRcv',
				url: '<?=base_url()?>index.php/receive_po/list_by_po/<?=$purchase_order_number?>'
			">
			<thead>
				<tr>
					<th data-options="field:'shipment_id',width:100">Nomor</th>
					<th data-options="field:'date_received',width:100">Tanggal</th>
					<th data-options="field:'warehouse_code',width:100">Gudang</th>
					<th data-options="field:'item_number',width:100">Item Number</th>
					<th data-options="field:'description',width:100">Description</th>
					<th data-options="field:'quantity_received',width:100">Quantity</th>
					<th data-options="field:'receipt_by',width:100">Petugas</th>
					<th data-options="field:'selected',width:100">Invoiced</th>
				</tr>
			</thead>
		</table>
		
	</div>

	<div title='Invoice' style="padding:10px">
		<table id="dgInvoice" class="easyui-datagrid"  
			style="min-height:700px"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true, toolbar: '#tbInvoice',
				url: '<?=base_url()?>index.php/purchase_invoice/list_by_po/<?=$purchase_order_number?>'
			">
			<thead>
				<tr>
					<th data-options="field:'purchase_order_number',width:100">Nomor</th>
					<th data-options="field:'po_date',width:100">Tanggal</th>
					<th data-options="field:'terms',width:100">Terms</th>
					<th data-options="field:'amount',width:100">Amount</th>
				</tr>
			</thead>
		</table>
	
	</div>

</div>


<? include_once 'supplier_select.php' ?>
<div id="tbRcv">
	<?=link_button('Add','','add','true',base_url().'index.php/receive_po/add/'.$purchase_order_number);	?>	
	<?=link_button('Refresh','load_receive()','reload');	?>	
	<?=link_button('View','view_receive()','edit');	?>	
</div>
<script type="text/javascript">
	var url;	
	var has_receive='<?=$has_receive?>';
    function save_po(){
        if($('#purchase_order_number').val()==''){alert('Isi nomor purchase order !');return false;}
        if($('#supplier_number').val()==''){alert('Pilih kode supplier !');return false;}
        if($('#terms').val()==''){alert('Pilih termin !');return false;}        
		url='<?=base_url()?>index.php/purchase_order/save';
			$('#frmPo').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#divItem').show('slow');
						$('#purchase_order_number').val(result.purchase_order_number);
						var nomor=$('#purchase_order_number').val();
						$('#mode').val('view');
						$('#dg').datagrid({url:'<?=base_url()?>index.php/purchase_order/items/'+nomor+'/json'});
						$('#dg').datagrid('reload');
						log_msg('Data sudah tersimpan. Silahkan pilih nama barang.');
					} else {
						log_err(result.msg);
					}
				}
			});
    }
		function hitung_jumlah(){
		    url=CI_ROOT+'purchase_order/sub_total/'+$('#purchase_order_number').val();

		    if($('#disc_total_percent').val()=='')$('#disc_total_percent').val(0);
		    disc_prc=$('#disc_total_percent').val();
	        if(disc_prc>1){
	        	disc_prc=disc_prc/100;
	        	$('#disc_total_percent').val(disc_prc);
	        }	

		    if($('#po_tax_percent').val()=='')$('#po_tax_percent').val(0);
		    tax_prc=$('#po_tax_percent').val();
	        if(tax_prc>1){
	        	tax_prc=tax_prc/100;
	        	$('#po_tax_percent').val(tax_prc);
	        }	
		    
		    if($('#freight').val()=='')$('#freight').val(0);
		    if($('#others').val()=='')$('#others').val(0);
		    $.ajax({
                type: "GET",
                url: url,
				contentType: 'application/json; charset=utf-8',
                data:{discount:disc_prc,tax:tax_prc,
                others:$("#others").val(),freight:$("#freight").val()}, 
                success: function(msg){
                    var obj=jQuery.parseJSON(msg);
                    $('#sub_total').val(obj.sub_total);
                    $('#total').val(obj.amount);
                },
                error: function(msg){alert(msg);}
		    });			
		}
		function print_po(){
			po_number=$("#purchase_order_number").val();
			url="<?=base_url()?>index.php/purchase_order/print_po/"+po_number;
			window.open(url,'_blank');
		}
		
	function delete_nomor()
	{
		$.ajax({
				type: "GET",
				url: "<?=base_url()?>/index.php/purchase_order/delete/"+$('#purchase_order_number').val(),
				data: "",
				success: function(result){
					var result = eval('('+result+')');
					if(result.success){
						$.messager.show({
							title:'Success',msg:result.msg
						});	
						//window.open('<?=base_url()?>index.php/purchase_order','_self');
					} else {
						$.messager.show({
							title:'Error',msg:result.msg
						});							
					};
				},
				error: function(msg){alert(msg);}
		}); 				
	}		
	function load_receive()
	{
		var url='<?=base_url()?>index.php/receive_po/list_by_po/<?=$purchase_order_number?>';
		$('#dgRcv').datagrid({url:url});
		$('#dgRcv').datagrid('reload');
	}
	function view_receive()
	{
        row = $('#dgRcv').datagrid('getSelected');
        if (row){
			shipment_id=row['shipment_id'];
			url="<?=base_url()?>index.php/receive_po/view/"+shipment_id;
			window.open(url,"_self");
		}
	
	}
		
</script>
    
