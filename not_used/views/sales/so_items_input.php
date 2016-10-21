<div id='dgItem' class="easyui-dialog" style="width:600px;height:380px;padding:5px 5px"
    closed="true" buttons="#tbItem" >
	<form id="frmItem" method='post' >
	<table class='table2' width="100%">
		<tr>
			<td>Kode Barang</td>
			 <td><input onblur='find()' id="item_number"  
				name="item_number"   class="easyui-validatebox" required="true">
				<?=link_button('','searchItem()','search');?>
			 </td>
		</tr>
		<tr><td>Nama Barang</td>
			 <td><input id="description" name="description" ></td>
		</tr>
		<tr><td>Qty</td>
			 <td><input id="quantity"  name="quantity" 
			 onblur="qty_change_hitung()"></td>
		
		</tr>
		<tr><td>Unit</td>
			 <td><input id="unit" name="unit"    ></td>
		
		</tr>
		<tr>
			<td>Harga</td>
			 <td><input id="price" name="price"     onblur="hitung()" class="easyui-validatebox" validType="numeric"></td>
		</tr>
		<tr><td>Disc%1</td>
			<td><input id="discount" name="discount"    onblur="hitung()" class="easyui-validatebox" validType="numeric"></td>
		
		</tr>
		<tr><td>Disc%2</td>
			<td><input id="disc_2" name="disc_2"    onblur="hitung()" class="easyui-validatebox" validType="numeric"></td>
		
		</tr>
		<tr><td>Disc%3</td>
			<td><input id="disc_3" name="disc_3"   onblur="hitung()" class="easyui-validatebox" validType="numeric"></td>
		
		</tr>
		<tr><td>Jumlah</td>
			<td><input id="amount" name="amount"  class="easyui-validatebox" validType="numeric"></td>
		
		</tr>
		<tr><td></td>
		</tr>
	</table>
	<input type='hidden' id='so_number' name='so_number'>
	<input type='hidden' id='line_number' name='line_number'>
	</form>
				
		
</div>
<div id="tbItem">
	<?=link_button('CLOSE','close_item()','cancel');?>
	<?=link_button('SUBMIT','save_item()','save');?>
</div>
<div id="tb">
	<a href="#" onclick="addItem();return false;" class="easyui-linkbutton" iconCls="icon-add">Add</a>
	<a href="#" onclick="editItem();return false;" class="easyui-linkbutton" iconCls="icon-edit" >Edit</a>
	<a href="#" onclick="deleteItem();return false;" class="easyui-linkbutton" iconCls="icon-remove" >Delete</a>	
</div>

<script type="text/javascript">
function addItem(){
	var mode=$('#mode').val();
	if(mode=="add"){
		alert("Simpan dulu sebelum tambah item barang !");
		return false;
	}
	$("#dgItem").dialog("open").dialog('setTitle','Input barang');
}
function close_item(){
	clear_input();
	$("#dgItem").dialog("close");	
}
function clear_input(){
	$('#frmItem').form('clear');
	$('#item_number').val('');
	$('#discount').val('0');
	$('#disc_2').val('0');
	$('#disc_3').val('0');
	$('#unit').val('');
	$('#description').val('');
	$('#line_number').val('');
	$('#quantity').val(1);
	$('#price').val(0);	
}
function save_item(){
	var mode=$('#mode').val();
	if(mode=="add"){
		alert("Simpan dulu sebelum tambah item barang !");
		return false;
	}
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
				clear_input();
				find();
				hitung();
				$("#dgItem").dialog("close");
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
		$('#frmItem').form('load',row);
		$('#item_number').val(row.item_number);
		$('#description').val(row.description);
		$('#quantity').val(row.quantity);
		$('#unit').val(row.unit);
		$('#price').val(row.price);
		$('#discount').val(row.discount);
		$('#disc_2').val(row.disc_2);
		$('#disc_3').val(row.disc_3);
		$('#amount').val(row.amount);
		$('#line_number').val(row.line_number);
		$('#so_number').val(row.so_number);
	}
	$("#dgItem").dialog("open");
}

function hitung(){
	if($('#quantity').val()==0)$('#quantity').val(1);
	gross=$('#quantity').val()*$('#price').val();
	
	        d=$('#discount').val();
			d2=d.split("+");
			for(i=0;i<d2.length;i++){
				disc_prc=d2[i];
				if(disc_prc>1){
					disc_prc=disc_prc/100;
				}	
				if(i==0){
					$("#discount").val(disc_prc);
				} else {
					$("#disc_"+(i+1)).val(disc_prc);
				}
			}
	
	disc_1=$('#discount').val(); if(disc_1>1)disc_1=disc_1/100;
	disc_2=$('#disc_2').val();  if(disc_2>1)disc_2=disc_2/100;
	disc_3=$('#disc_3').val(); if(disc_3>1)disc_3=disc_3/100;
	gross=gross-(gross*disc_1);
	gross=gross-(gross*disc_2);
	gross=gross-(gross*disc_3);
	$('#amount').val(gross);			
	hitung_jumlah();
}
function qty_change_hitung(){
	var item=$("#item_number").val();
	var qty=$("#quantity").val();
	if($('#quantity').val()==0)$('#quantity').val(1);
	var cust_no=$("#sold_to_customer").val();
	if( item=="" || item=="undefined")return false;
		
			 
	xurl=CI_ROOT+'inventory/sales_discount/'+item+'/'+cust_no+'/'+qty ;
	 
	$.ajax({
		type: "GET",
		url: xurl,
		 
		success: function(msg){
			var obj=jQuery.parseJSON(msg);
			if(obj.discount!="") {
				$("#discount").val(obj.discount);
				hitung();
			}
		},
		error: function(msg){alert(msg);}
	});	
	 
}

</script>