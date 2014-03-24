<h1>|| RETUR PEMBELIAN  || 
	<?
	echo link_button("Save","save_retur()","save");
	echo link_button("Print","print_retur()","print");
	
	?>	
</H1>	
<form id='frmRetur' method="POST" name="frmRetur"> 
	<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
<table>
	<tr>
		<td>Nomor Retur</td><td class='field'>
			<?="<input type='text' id='purchase_order_number' name='purchase_order_number' value='$purchase_order_number'>"?>
		</td>
    </tr>	 
    <tr>		
        <td>Tanggal</td><td class='field'><?php echo form_input('po_date',$po_date,'id=po_date
           class="easyui-datetimebox"');?></td>
    </tr>	 
    <tr>
    <td>Supplier</td><td colspan="4" class='field'>
 	   		<?
 	   		echo form_input("supplier_number",$supplier_number,"id='supplier_number'");      	
			echo link_button('','select_supplier()',"search","true"); 
			?>
        </td>
        <td><?=$supplier_info?></td>
        
    </tr>
    <tr>
        <td>Nomor Faktur</td><td class='field'> 
        	<?
        	echo form_input("po_ref",$po_ref,"id='po_ref'");
        	echo link_button('','select_faktur()',"search","true"); 
        	?>
        </td>
    </tr>
    <tr>
        <td>Keterangan</td><td colspan="3" class='field'>
        	<?php echo form_input('comments',$comments,'id=comments style="width:300px"');?>
        </td>
    </tr>	  
</table>
</form>

<H1></H1>

<!-- PURCASE_ORDER_LINEITEMS -->	
<div id='divItem' style='display:<?=$mode=="add"?"none":""?>'>
	<h1>PURCHASE ORDER - SELECT ITEMS</H1>
	<div id='dgItem'>
		<? include_once "purchase_order_items.php"; ?>
	</div>
	<table id="dg" class="easyui-datagrid"  
		style="width:800px;min-height:800px"
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
				<th data-options="field:'line_number',width:30,align:'right'">Line</th>
			</tr>
		</thead>
	</table>
<!-- END PURCHASE_ORDER_LINEITEMS -->
	<h1>PURCHASE ORDER - TOTAL</H1>
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

<? include_once 'supplier_select.php' ?>
<? include_once 'faktur_select.php' ?>

<script type="text/javascript">
	var url;	
    function save_retur(){
        if($('#purchase_order_number').val()==''){alert('Isi nomor bukti retur !');return false;}
        if($('#supplier_number').val()==''){alert('Pilih kode supplier !');return false;}
        if($('#terms').val()==''){alert('Pilih termin !');return false;}        
		url='<?=base_url()?>index.php/purchase_retur/save';
			$('#frmRetur').form('submit',{
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
						$.messager.show({
							title:'Success',msg:'Data sudah tersimpan. Silahkan pilih nama barang.'
						});
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
    }
		function hitung_jumlah(){
		    url=CI_ROOT+'purchase_order/sub_total/'+$('#purchase_order_number').val();
		    if($('#disc_total_percent').val()=='')$('#disc_total_percent').val(0);
		    if($('#po_tax_percent').val()=='')$('#po_tax_percent').val(0);
		    if($('#freight').val()=='')$('#freight').val(0);
		    if($('#others').val()=='')$('#others').val(0);
		    $.ajax({
                type: "GET",
                url: url,
				contentType: 'application/json; charset=utf-8',
                data:{discount:$("#disc_total_percent").val(),tax:$("#po_tax_percent").val(),
                others:$("#others").val(),freight:$("#freight").val()}, 
                success: function(msg){
                    var obj=jQuery.parseJSON(msg);
                    $('#sub_total').val(obj.sub_total);
                    $('#total').val(obj.amount);
                },
                error: function(msg){alert(msg);}
		    });			
		}
		function print_retur(){
			nomor=$("#purchase_order_number").val();
			url="<?=base_url()?>index.php/purchase_retur/print_retur/"+nomor;
			window.open(url,'_blank');
		}

</script>

