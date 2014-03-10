<script src="<?=base_url();?>js/lib.js"></script>
<h1>PURCHASE ORDER</H1>
<form id='frmPo' method="post">	
   <table>
		<tr>
			<td>Nomor PO</td><td><?php echo form_input('purchase_order_number',
			$purchase_order_number,"id='purchase_order_number' 
			class='easyui-validatebox' 
			data-options='required:true,
			validType:length[3,30]'"); 
			?></td>
       </tr>	 
       <tr>
        	<td>Tanggal</td><td><?php echo form_input('po_date',$po_date,'id=po_date  
        	class="easyui-datetimebox" required:true');?></td>
       </tr>	 
       <tr>
            <td>Supplier</td><td><?php 
            echo form_input('supplier_number',$supplier_number,
            "id=supplier_number class='easyui-validatebox' data-options='required:true,
			validType:length[3,30]'");
			echo link_button('','select_supplier()',"search","true"); 
            ?></td>
       </tr>	 
       <tr>
            <td>Termin</td><td><?php echo form_dropdown('terms',$term_list,$terms,"id=terms 
			class='easyui-validatebox' data-options='required:true,
			validType:length[3,30]'            
            ");?></td>
       </tr>
       <tr>
            <td>Rencana Diterima</td>
            <td><?=form_input('due_date',$po_date,'id=due_date  class="easyui-datetimebox" required');?></td>
       </tr>
       <tr>
            <td>Keterangan</td><td colspan="3"><?php echo form_input('comments',$comments,'id=comments style="width:300px"');?></td>
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
<H1></H1>
<? if($mode=='add'){ ?>
	<span id='cmdSavePo'><?=link_button("Save","save_po()","save","false")?></span>
<? } ?>

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
	
	
<? include_once 'supplier_select.php' ?>

<script type="text/javascript">
	var url;	
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
						$('#cmdSavePo').hide();
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
</script>
    
