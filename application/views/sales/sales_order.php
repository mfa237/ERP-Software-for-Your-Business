<?
if($mode=='view'){
	echo link_button('Print', 'print_so()','print','false');		
	echo link_button('Delete', 'delete()','remove','false');		
	echo link_button('Edit', 'edit()','edit','false');		
}
?>

<h1>SALES ORDER - GENERAL</H1>
<form id="frmSo"  method="post">
   <table>
	<tr>
		<td>Nomor Bukti SO</td>
			<td>
				<?php echo form_input('sales_order_number',
                        $sales_order_number,"id=sales_order_number"); ?>
            </td>
            <td>Tanggal</td><td><?php echo form_input('sales_date',$sales_date,'id=sales_date 
             class="easyui-datetimebox" required style="width:150px"');?>
            </td>

        </tr>	 
       <tr>
            <td>Pelanggan</td><td><?php echo form_dropdown('sold_to_customer'
                    ,$customer_list,$sold_to_customer,"id=sold_to_customer");?>
            </td>
            <td>Rencana Dikirim</td>
            <td><?=form_input('due_date',$due_date,'id=due_date class="easyui-datetimebox" required style="width:150px"');?></td>
       </tr>
       <tr>
       		<td>Salesman: </td>
       		<td><?php echo form_dropdown('salesman',$salesman_list,$salesman,'id=salesman');?></td>
            <td>Termin</td><td><?php echo form_dropdown('payment_terms'
                    ,$payment_terms_list,$payment_terms,"id=payment_terms");?>
            </td>
       	</tr>
       <tr>
             
       </tr>
       <tr>
            <td>Keterangan</td><td colspan="6"><?php echo form_input('comments'
                    ,$comments,'id=comments style="width:300px"');?>
            </td>
            <td>        
            </td>
       </tr>
       <tr><td colspan="4">
       	<? if($mode=='add'){ ?>      		
			<div id='cmdSaveSo'>
		            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'"  
		            plain='true' onclick='save_so()'>Simpan</a>
            </div>        
		<? } ?>
       </td></tr>
   </table>
</form>

<!-- SALES_ORDER_LINEITEMS -->	
<h1>SALES ORDER - SELECT ITEMS</H1>
<div id='divItem' style=''>
	<div id='dgItem'>
		<table>
			<tr>
				<td>Kode Barang</td><td>Nama Barang</td><td>Qty</td><td>Unit</td>
				<td>Harga</td><td>Disc%</td><td>Jumlah</td><td></td>
			</tr>
			<tr>
			    <form id="frmItem" method='post' >
			         <td><input onblur='find()' id="item_number" style='width:80' 
			         	name="item_number"   class="easyui-validatebox" required="true">
						<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
						onclick="searchItem()"></a>
			         </td>
			         <td><input id="description" name="description" style='width:280'></td>
			         <td><input id="quantity"  style='width:30'  name="quantity" onblur="hitung()"></td>
			         <td><input id="unit" name="unit"  style='width:30' ></td>
			         <td><input id="price" name="price"  style='width:80'   onblur="hitung()" class="easyui-validatebox" validType="numeric"></td>
			        <td><input id="discount" name="discount"  style='width:30'   onblur="hitung()" class="easyui-validatebox" validType="numeric"></td>
			        <td><input id="amount" name="amount"  style='width:80'  class="easyui-validatebox" validType="numeric"></td>
			        <td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'"  
             		   plain='true'	onclick='save_item()'></a>
					</td>
			        <input type='hidden' id='so_number' name='so_number'>
			        <input type='hidden' id='line_number' name='line_number'>
			    </form>
				
			</tr>
		</table>
		
	</div>
	<table id="dg" class="easyui-datagrid"  
		style="width:800px;min-height:800px"
		data-options="
			iconCls: 'icon-edit',
			singleSelect: true,
			toolbar: '#tb',
			url: '<?=base_url()?>index.php/sales_order/items/<?=$sales_order_number?>/json'
		">
		<thead>
			<tr>
				<th data-options="field:'item_number',width:80">Kode Barang</th>
				<th data-options="field:'description',width:150">Nama Barang</th>
				<th data-options="field:'quantity',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
				<th data-options="field:'unit',width:50,align:'left',editor:'text'">Satuan</th>
				<th data-options="field:'price',width:80,align:'right',editor:{type:'numberbox',options:{precision:2}}">Harga</th>
				<th data-options="field:'discount',width:50,editor:'numberbox'">Disc%</th>
				<th data-options="field:'amount',width:60,align:'right',editor:'numberbox'">Jumlah</th>
				<th data-options="field:'line_number',width:30,align:'right'">Line</th>
			</tr>
		</thead>
	</table>
<!-- END SALES_ORDER_LINEITEMS -->
	
	<h1>SALES ORDER - TOTAL</H1>
	<div id='divTotal'> 
				<table>
					<tr>
						<td>Sub Total: </td><td><input id='sub_total' value='<?=$subtotal?>' style='width:100px'></td>				
						<td>Discount %: </td><td><input id='disc_total_percent' value='<?=$discount?>' style='width:50px'></td>
						<td>Pajak PPN %: </td><td><input id='sales_tax_percent' value='<?=$sales_tax_percent?>' style='width:50px'></td>
					</tr><tr>
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


<h1>SALES ORDER - PAYMENTS</H1>


<div id="tb" style="height:auto">
	<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editItem()">Edit</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteItem()">Delete</a>	
</div>
<div id="tb_search" style="height:auto">
	Enter Text: <input  id="search_item" style='width:180' 
 	name="search_item">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
	onclick="searchItem()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selectSearchItem()">Select</a>
</div>

<div id='dlgSearchItem'class="easyui-dialog" style="width:400px;height:380px;padding:10px 20px"
        closed="true" buttons="#dlg-buttons">
     <div id='divItemSearchResult'> 
		<table id="dgItemSearch" class="easyui-datagrid"  
			data-options="
				toolbar: '#tb_search',
				singleSelect: true,
				url: '<?=base_url()?>index.php/inventory/filter'
			">
			<thead>
				<tr>
					<th data-options="field:'description',width:150">Nama Barang</th>
					<th data-options="field:'item_number',width:80">Kode Barang</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>
<script type="text/javascript">
	var url;	
    function save_so(){
        if($('#sales_order_number').val()==''){alert('Isi nomor sales order !');return false;}
        if($('#sold_to_customer').val()==''){alert('Pilih pelanggan !');return false;}
        if($('#salesman').val()==''){alert('Pilih salesman !');return false;}        
		url='<?=base_url()?>index.php/sales_order/save';
			$('#frmSo').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#sales_order_number').val(result.sales_order_number);
						var so=$('#sales_order_number').val();
						$('#cmdSaveSo').hide();
						$('#dg').datagrid({url:'<?=base_url()?>index.php/sales_order/items/'+so+'/json'});
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
    

		function find(){
		    xurl=CI_ROOT+'inventory/find/'+$('#item_number').val();
		    console.log(xurl);
		    $.ajax({
		                type: "GET",
		                url: xurl,
		                data:'item_no='+$('#item_number').val(),
		                success: function(msg){
		                    var obj=jQuery.parseJSON(msg);
		                    $('#item_number').val(obj.item_number);
		                    $('#price').val(obj.retail);
		                    //$('#cost').val(obj.cost);
		                    //$('#unit').val(obj.unit_of_measure);
		                    $('#description').val(obj.description);
		                    hitung();
		                },
		                error: function(msg){alert(msg);}
		    });
		};
		function hitung(){
	        if($('#quantity').val()==0)$('#quantity').val(1);
	        gross=$('#quantity').val()*$('#price').val();
	        disc_prc=$('#discount').val();
	        if(disc_prc>1){
	        	disc_prc=disc_prc/100;
	        	$('#discount').val(disc_prc);
	        }	
	        disc_amt=Math.round(gross*disc_prc,2);
	        $('#amount').val(gross-disc_amt);			
		}
		function hitung_jumlah(){
		    url=CI_ROOT+'sales_order/sub_total/'+$('#sales_order_number').val();
		    if($('#disc_total_percent').val()=='')$('#disc_total_percent').val(0);
		    if($('#sales_tax_percent').val()=='')$('#sales_tax_percent').val(0);
		    if($('#freight').val()=='')$('#freight').val(0);
		    if($('#others').val()=='')$('#others').val(0);
		    $.ajax({
                type: "GET",
                url: url,
				contentType: 'application/json; charset=utf-8',
                data:{discount:$("#disc_total_percent").val(),tax:$("#sales_tax_percent").val(),
                others:$("#others").val(),freight:$("#freight").val()}, 
                success: function(msg){
                    var obj=jQuery.parseJSON(msg);
                    $('#sub_total').val(obj.sub_total);
                    $('#total').val(obj.amount);
                },
                error: function(msg){alert(msg);}
		    });			
		}
		function save_item(){
			url = '<?=base_url()?>index.php/sales_order/save_item';
			$('#so_number').val($('#sales_order_number').val());
						 
			$('#frmItem').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dg').datagrid('reload');
						$('#frmItem').form('clear');
						$('#item_number').val('');
						$('#discount').val('0');
						$('#unit').val('Pcs');
						$('#item_number').val('');
						$('#line_number').val('');
						
						find();
						hitung();
						
						$.messager.show({
							title: 'Success',
							msg: 'Success'
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
		
		function deleteItem(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this line?',function(r){
					if (r){
						url='<?=base_url()?>index.php/sales_order/delete_item';
						$.post(url,{line_number:row.line_number},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}
		function editItem(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				console.log(row);
				$('#frmItem').form('load',row);
				$('#item_number').val(row.item_number);
				$('#description').val(row.description);
				$('#quantity').val(row.quantity);
				$('#unit').val(row.unit);
				$('#price').val(row.price);
				$('#discount').val(row.discount);
				$('#amount').val(row.amount);
				$('#line_number').val(row.line_number);
				$('#so_number').val(row.so_number);
			}
		}
		function selectSearchItem()
		{
			var row = $('#dgItemSearch').datagrid('getSelected');
			if (row){
				$('#item_number').val(row.item_number);
				$('#description').val(row.description);
				find();
				$('#dlgSearchItem').dialog('close');
			}
			
		}
		function searchItem()
		{
			$('#dlgSearchItem').dialog('open').dialog('setTitle','Cari data barang');
			nama=$('#search_item').val();
			$('#dgItemSearch').datagrid({url:'<?=base_url()?>index.php/inventory/filter/'+nama});
			$('#dgItemSearch').datagrid('reload');

		}
  	function print_so(){
            so=$('#sales_order_number').val(); 
            window.open("<?=base_url().'index.php/sales_order/print_so/'?>"+so,"new");  		
  	}
    
</script>
