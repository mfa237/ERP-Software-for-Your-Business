<? 
if(!isset($gdg)){
	$gdg=$this->db->get("shipping_locations");
}
if(!isset($has_receive))$has_receive=false;

if(($mode=="add" or $mode=="edit" or $mode=="view")) { ?>

	<div id='dgItemForm' class="easyui-dialog" 
	style="width:750px;height:460px;padding:5px 5px"
    closed="true" buttons="#tbItemForm" >
	
	<?php if (!$has_receive) { ?>
	    <form id="frmItem" method='post' >
	        <input type='hidden' id='po_number_item' name='po_number_item'>
	        <input type='hidden' id='line_number' name='line_number'>
	        <input type='hidden' id='gudang_item' name='gudang_item'>
				<table class='table' style='width:250px;float:left'>
				 <tr><td >Kode Barang</td><td colspan='3'><input onblur='find()' id="item_number" style='width:180px' 
					name="item_number"   class="easyui-validatebox" required="true">
					<a href="#" class="easyui-linkbutton" iconCls="icon-search" data-options="plain:false" 
					onclick="searchItem();return false;"></a>
				 </td>
				 
				 </tr>
				 <tr><td>Nama Barang</td><td colspan='3'><input id="description" name="description" style='width:300px'></td></tr>
				 <tr><td>Qty</td><td><input id="quantity"  style='width:60px'  name="quantity" onblur="hitung()">
				 Unit <input id="unit" name="unit"  style='width:60px' >
				<a href="#" class="easyui-linkbutton" iconCls="icon-search" data-options="plain:false" 
					onclick="searchUnit();return false;" 
					style='display:none' id='cmdLovUnit'></a> 
				 </td></tr>
				 <tr><td colspan=2>
				     <div  class='thumbnail'>
                     <p>
                         Hr Beli <input id="price" name="price"  style='width:80px'>
                         Hr Jual <input id="retail" name="retail" style='width:80px'>
                         Margin% <input id="margin" name="margin" style='width:40px'>
                     </p>
                     <p>Hr Jual Real <input id="retail_real" name="retail_real" style='width:80px'> 
                         Margin Real <input id="margin_real" name="margin_real" style='width:40px'>
                     </p>
                     <p> <?=link_button("Hitung HJ", "calc_price(1);return false;","sum")?>
                         <?=link_button("Hitung MG", "calc_price(2);return false;","sum")?>
                         <?=link_button("Hitung HB", "calc_price(3);return false;","sum")?>
                     </p>
				     </div>
				    </td>
				 </tr>
                 
				 
				 <tr><td>Disc%1</td><td><input id="discount" name="discount"  style='width:50px'   onblur="hitung();return false;" class="easyui-validatebox" validType="numeric">
				 Disc%2 <input id="disc_2" name="disc_2"  style='width:50px'   onblur="hitung();return false;" class="easyui-validatebox" validType="numeric">
				 Disc%3 <input id="disc_3" name="disc_3"  style='width:50px'   onblur="hitung();return false;" class="easyui-validatebox" validType="numeric"></td></tr>
				 <tr><td>Jumlah</td><td colspan='3'><input id="amount" name="amount"  style='width:80px'  class="easyui-validatebox" validType="numeric"></td></tr>
				</table>
				<table class='table' style='width:200px'>
					<p><strong>*Quantity allocation for warehouse</strong></p>
					<thead><tr><th>Gudang</th><th>Qty</th><tr></thead>
					 <tbody>
					 <?php 
						$i=0;
						$gdg_count=0;
						foreach($gdg->result() as $rGdg){
							echo "<input type='hidden' name=gdg[] id='gdg$i' value='$rGdg->location_number'>";
							echo "<tr><td>$rGdg->location_number</td>
							<td>".form_input("qty_alloc[]","","id='qty_alloc_$i'   onblur='calc_qty_alloc();return false;'")."</td>
							</tr>";		
                            $i++;
						}			
						echo "<tr><td>Total</td><td>".form_input("total_qty_alloc",0," disabled id='total_qty_alloc'");
						
						echo "</td></tr>";
						$gdg_count=$i;
					?>
					</tbody>				
				</table>
				 
	    </form>
	<?php } ?>	
	</div>
	
<? } ?>
	
<div id="tbItemForm">
	<a href="#" class="easyui-linkbutton" data-options="plain:false,iconCls:'icon-cancel'"  
		onclick='close_item();return false;' title='Close'>Cancel</a>
	<a href="#" class="easyui-linkbutton" data-options="plain:false,iconCls:'icon-save'"  
		onclick='save_item();return false;' title='Save Item'>Submit</a>
</div>
<div id="tb" style="height:auto">
<?php if (!$has_receive) { ?>	<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="false" onclick="addItem()" data-options="plain:false">Add</a> <?php } ?>
<?php if (!$has_receive) { ?>   <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="false" onclick="addItemAll()" data-options="plain:false">Add2</a> <?php } ?>
<?php if (!$has_receive) { ?>	<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="false" onclick="editItem()" data-options="plain:false">Edit</a> <?php } ?>
<?php if (!$has_receive) { ?>	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="false" onclick="deleteItem()" data-options="plain:false">Delete</a>	 <?php } ?>
<a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="false" onclick="reloadItem()" data-options="plain:false">Refresh</a>	
</div>
 
<?php 
	echo load_view("inventory/inventory_select");
	echo load_view("inventory/select_unit");
	echo load_view("inventory/inventory_select_checkbox");
?>
 
<script language="JavaScript">

	var gdg_count=<?=$gdg_count?>;
	
	function addItem(){
		var mode=$('#mode').val();
		if(mode=="add"){
			alert("Simpan dulu sebelum tambah item barang !");
			return false;
		}
		//$('#dgItemForm').window({left:10,top:window.event.clientY-350});
		$("#dgItemForm").dialog("open").dialog('title','Input barang');
	}
    function addItemAll(){
        var mode=$('#mode').val();
        if(mode=="add"){
            alert("Simpan dulu sebelum tambah item barang !");
            return false;
        }
        //$('#dlgSearchItemIsc').window({left:10,top:window.event.clientY*0.5});
        $("#dlgSearchItemIsc").dialog("open").dialog('setTitle','Pilih barang');
    }
	
	function close_item(){
		clear_input();
		$("#dgItemForm").dialog("close");	
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
						if(obj.cost==0){
							$('#price').val(obj.cost_from_mfg);
						} else {
							$('#price').val(obj.cost);
						}
						$('#cost').val(obj.cost);
						$('#unit').val(obj.unit_of_measure);
						$('#description').val(obj.description);
                        $('#retail').val(obj.retail);
                        $('#margin').val(obj.margin);
                        
						if(obj.multiple_pricing){
							$("#cmdLovUnit").show();
						} else {
							$("#cmdLovUnit").hide();
						}
						hitung();
						
					},
					error: function(msg){alert(msg);}
		});
	};
	function hitung(){
		if($('#quantity').val()==0)$('#quantity').val(1);
		gross=$('#quantity').val()*$('#price').val();
		disc_1=$('#discount').val(); if(disc_1>1)disc_1=disc_1/100;
		disc_2=$('#disc_2').val();  if(disc_2>1)disc_2=disc_2/100;
		disc_3=$('#disc_3').val(); if(disc_3>1)disc_3=disc_3/100;
		gross=gross-(gross*disc_1);
		gross=gross-(gross*disc_2);
		gross=gross-(gross*disc_3);
		$('#amount').val(gross);			

		hitung_jumlah();			
	}
	

    
function roundNumber(num, scale) {
  if(!("" + num).includes("e")) {
    return +(Math.round(num + "e+" + scale)  + "e-" + scale);
  } else {
    var arr = ("" + num).split("e");
    var sig = ""
    if(+arr[1] + scale > 0) {
      sig = "+";
    }
    return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + scale)) + "e-" + scale);
  }
}	
	function calc_price(method){
        var beli=0,jual=0,margin=0,jual_real2=0,jual_real=0;
 
        beli=parseFloat($("#price").val());
        if(isNaN(beli))beli=0;

        jual=parseFloat($("#retail").val());
        if(isNaN(jual))jual=0;
        
        jual_real=parseFloat($("#retail_real").val());
        if(isNaN(jual_real))jual_real=0;

        margin=parseFloat($("#margin").val());
        if(isNaN(margin))margin=0;
        if(margin>1)margin=margin/100;

        margin_real=parseFloat($("#margin_real").val());
        if(isNaN(margin_real))margin_real=0;
        if(margin_real>1)margin_real=margin_real/100;
        
        if(method==1){
            jual=roundNumber(beli+(beli*margin),2);
            jual_real2=roundNumber(jual+(jual*margin),2);
            if(jual_real2==0)jual_real2=1;
            if(jual_real!=jual_real2){
                margin_real=roundNumber(beli/jual_real2,2);
                jual_real=jual_real2;
            }
        }else if(method==2){
            margin_real=0;
            jual_real=0;
            margin=roundNumber(1-(beli/jual),2);
        }else{
            margin_real=0;
            jual_real=0;
            beli=jual-(margin*jual);
        }
        $("#price").val(beli);
        $("#retail").val(jual);
        $("#margin").val(margin);
        $("#retail_real").val(jual_real);
        $("#margin_real").val(margin_real);
	    
	    hitung();
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
					
					hitung();
					
					$.messager.show({
						title: 'Success',
						msg: 'Success'
					});
					close_item();
					
				} else {
					$.messager.show({
						title: 'Error',
						msg: result.msg
					});
				}
			}
		});
	}
	function clear_input(){
		//$('#frmItem').form('clear');
		$('#item_number').val('');
		$('#discount').val('0');
		$('#disc_2').val('0');
		$('#disc_3').val('0');
		$('#unit').val('Pcs');
		$('#description').val('');
		$('#line_number').val('');
		$('#quantity').val(1);
		$('#price').val('0');
		$('#amount').val('0');                    
        $('#retail').val('0');                  
        $('#margin').val('0');                  
        $('#retail_real').val('0');                  
        $('#margin_real').val('0');                  
        clear_input_alloc();        	
	}
	function reloadItem(){
		var po=$('#purchase_order_number').val();
		var xurl='<?=base_url()?>index.php/purchase_order/items/'+po+'/json';
		$('#dg').datagrid({url: xurl});
		$('#dg').datagrid('reload');	// reload the user data
	}
	function deleteItem(){
		var po=$('#purchase_order_number').val();
		var row = $('#dg').datagrid('getSelected');
		if (row){
			$.messager.confirm('Confirm','Are you sure you want to remove this line?',function(r){
				if (r){
					url='<?=base_url()?>index.php/purchase_order/delete_item/'+row.line_number;
					$.ajax({
						type: "GET",url: url,param: '',
						success: function(result){
							var result = eval('('+result+')');
							if (result.success)	void reloadItem();
						},
						error: function(msg){$.messager.alert('Info',msg);}
				});
					
				}
			})
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
			$('#disc_2').val(row.disc_2);
			$('#disc_3').val(row.disc_3);
			$('#amount').val(row.total_price);
			$('#line_number').val(row.line_number);
		}
		//$('#dgItemForm').window({left:100,top:window.event.clientY-350});
		$("#dgItemForm").dialog("open");
		load_input_alloc();
	}
	function clear_input_alloc(){
		for(i=0;i<gdg_count;i++){
			$("#qty_alloc_"+(i+1)).val('');
		}
	}
	function calc_qty_alloc(){
		var total=0,t=0;
		for(i=0;i<gdg_count;i++){
			t=$("#qty_alloc_"+(i+1)).val();
			tt=parseInt(t);
			if(!isNaN(tt)){
				total=total+tt;
			}
		}
		console.log("total: "+total);
		$("#total_qty_alloc").val(total);
	}
	function load_input_alloc(){
		var row = $('#dg').datagrid('getSelected');		
		
		if (row){
			var line_number=row.line_number;
			url='<?=base_url()?>index.php/purchase_order/load_qty_alloc/'+line_number;
			loading();
			$.ajax({
				type: "GET",url: url,param: '',
				success: function(result){
				    loading_close();
					var result = eval('('+result+')');
					if (result.success)	{
						qty=result.qty;
						ii=0;
						//console.log(qty.length);
						for(i=0;i<qty.length;i++){
							q=qty[i].qty;
							g=qty[i].gudang;
							//console.log(qty[i+1].gudang);
							idqty="#qty_alloc_"+get_index_gudang(g);
							console.log(idqty);
							$(idqty).val(q);
						}
						calc_qty_alloc();
					}
				},
				error: function(msg){$.messager.alert('Info',msg);}
			});		
		}
	}
	function get_index_gudang(gudang){
	    ret=0;
	    console.log(gdg_count);
	    
	    for(j=0;j<gdg_count;j++){
	        gdg=$("#gdg"+j).val();
	        if(gdg==gudang){
	            ret=j;
	            break;
	        }
	    }
	    return ret;
	}
</script>
