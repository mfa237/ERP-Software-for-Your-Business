<? 
if(($mode=="add" or $mode=="edit" or $mode=="view")) { ?>

<table class='table2 box-gradient' width="100%">
	<thead>
		<th>Kode Barang</th><th>Nama Barang</th><th>Qty</th><th>Unit</th>
		<th>Harga</th><th>Disc%</th><th>Jumlah</th><th></th>
	</thead>
	<tbody>
	<tr>

	    <form id="frmItem" method='post' >
	         <td><input onblur='find()' id="item_number" style='width:80px' 
	         	name="item_number"   class="easyui-validatebox" required="true">
				<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
				onclick="searchItem();return false;"></a>
	         </td>
	         <td><input id="description" name="description" style='width:200px'></td>
	         <td><input id="quantity"  style='width:40px'  name="quantity" onblur="hitung()"></td>
	         <td><input id="unit" name="unit"  style='width:30px' ></td>
	         <td><input id="price" name="price"  style='width:80px'   onblur="hitung();return false;" class="easyui-validatebox" validType="numeric"></td>
	        <td><input id="discount" name="discount"  style='width:30px'   onblur="hitung();return false;" class="easyui-validatebox" validType="numeric"></td>
	        <td><input id="amount" name="amount"  style='width:80px'  class="easyui-validatebox" validType="numeric"></td>
	        
			<td>

				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'"  
				   plain='true'	onclick='save_item();return false;'></a>
				
			</td>
	        <input type='hidden' id='po_number_item' name='po_number_item'>
	        <input type='hidden' id='line_number' name='line_number'>
	        <input type='hidden' id='gudang_item' name='gudang_item'>
	    </form>
		
	</tr>
	</tbody>
</table>

<? } ?>


<div id="tb" style="height:auto">
	<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editItem()">Edit</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteItem()">Delete</a>	
</div>

<?=load_view("inventory/inventory_select");?>
<script language="JavaScript">
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
		                    $('#cost').val(obj.cost);
		                    $('#unit').val(obj.unit_of_measure);
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
	        hitung_jumlah();			
		}
		function save_item(){
			var gudang=$("#warehouse_code").val();
			var url = '<?=base_url()?>index.php/purchase_order/save_item';
			var po=$('#purchase_order_number').val();

			if($("#mode").val()=="add"){alert("Simpan dulu nomor ini.");return false;};
			if(gudang==""){alert("Pilih dulu kode gudang !");return false;};
//			if(has_receive>0){alert("Nomor PO ini sudah ada penerimaan, tidak bisa diubah.");return false;};
			$('#po_number_item').val(po);
			$("#gudang_item").val(gudang);			 
			$('#frmItem').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dg').datagrid({url:'<?=base_url()?>index.php/purchase_order/items/'+po+'/json'});
						$('#dg').datagrid('reload');
						$('#frmItem').form('clear');
						$('#item_number').val('');
						$('#discount').val('0');
						$('#unit').val('Pcs');
						$('#description').val('');
						$('#line_number').val('');
						$('#quantity').val(1);
						$('#price').val('0');
						$('#amount').val('0');
						
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
						url='<?=base_url()?>index.php/purchase_order/delete_item';
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
			}
		}
		
</script>
