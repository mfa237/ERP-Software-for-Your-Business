<h4>SALES ORDER </h4>
	<div class="thumbnail box-gradient">
		<?
			echo link_button("Save","save_so()","save");
			echo link_button('Print', 'print_so()','print');
			echo link_button('Add','','add','true',base_url().'index.php/sales_order/add');		
			echo link_button('Delete','delete()','cut');		
			echo link_button('Search','','search','true',base_url().'index.php/sales_order');		
			echo link_button('Refresh','','reload','true',base_url().'index.php/sales_order/view/'.$sales_order_number);		
			echo link_button('Help', 'load_help(\'sales_order\')','help');		
					
		?>	
		<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
		<div id="mmOptions" style="width:200px;">
			<div onclick="load_help('sales_order')">Help</div>
			<div>Update</div>
			<div>MaxOn Forum</div>
			<div>About</div>
		</div>
	</div>
	

<div class="thumbnail">

<form id="frmSo"  method="post">
	<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
   <table class='table2' width="100%">
	<tr>
		<td>Nomor Bukti SO</td>
			<td>
				<?php echo form_input('sales_order_number',
                        $sales_order_number,"id=sales_order_number"); ?>
            </td>
			<td rowspan="4" colspan='6'>
				<div class="thumbnail" id="customer_info" style="width:300px;height:100px"><?=$customer_info?></div>
			</td>
	</tr>
	<tr>
            <td>Tanggal</td><td><?php echo form_input('sales_date',$sales_date,'id=sales_date 
             class="easyui-datetimebox" required style="width:150px"');?>
            </td>

        </tr>	 
       <tr>
            <td>Pelanggan</td>
			<td><?php 
				echo form_input('sold_to_customer',$sold_to_customer,"id=sold_to_customer");
				echo link_button("","select_customer();return false;","search");
			?></td>
	</tr>
	<tr>
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
             
       </tr>
       <tr>
            <td>Keterangan</td><td colspan="6"><?php echo form_input('comments'
                    ,$comments,'id=comments style="width:400px"');?>
            </td>
       </tr>
       <tr><td colspan="4"> </td></tr>
   </table>
</form>


<!-- SALES_ORDER_LINEITEMS -->	
<div class="easyui-tabs" >
	<div id='divItem' title="Items" style="padding:10px">
		<div id='dgItem'>
			<table class='table2' width='100%'>
				<tr>
					<td>Kode Barang</td><td>Nama Barang</td><td>Qty</td><td>Unit</td>
					<td>Harga</td><td>Disc%</td><td>Jumlah</td><td></td>
				</tr>
				<tr>
					<form id="frmItem" method='post' >
						 <td><input onblur='find()' id="item_number" style='width:80px' 
							name="item_number"   class="easyui-validatebox" required="true">
							<?=link_button('','searchItem()','search');?>
						 </td>
						 <td><input id="description" name="description" style='width:180px'></td>
						 <td><input id="quantity"  style='width:40px'  name="quantity" onblur="hitung()"></td>
						 <td><input id="unit" name="unit"  style='width:30px' ></td>
						 <td><input id="price" name="price"  style='width:80px'   onblur="hitung()" class="easyui-validatebox" validType="numeric"></td>
						<td><input id="discount" name="discount"  style='width:30px'   onblur="hitung()" class="easyui-validatebox" validType="numeric"></td>
						<td><input id="amount" name="amount"  style='width:80px'  class="easyui-validatebox" validType="numeric"></td>
						<td>
							<?=link_button('Add Item','save_item()','save');?>
						</td> 
						<input type='hidden' id='so_number' name='so_number'>
						<input type='hidden' id='line_number' name='line_number'>
					</form>
					
				</tr>
			</table>
			
		</div>
		<table id="dg" class="easyui-datagrid"  width='100%'
			data-options="
				iconCls: 'icon-edit',fitColumns: true, 
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
					<th data-options="field:'price',width:80,align:'right',editor:{type:'numberbox',options:{precision:2}},
						formatter: function(value,row,index){
							return number_format(value,2,'.',',');}">Harga</th>
					<th data-options="field:'discount',width:50,editor:'numberbox'">Disc%</th>
					<th data-options="field:'amount',width:60,align:'right',editor:'numberbox',
						formatter: function(value,row,index){
							return number_format(value,2,'.',',');}">Jumlah</th>
					<th data-options="field:'ship_qty',width:50">Ship Qty</th>
					<th data-options="field:'ship_date',width:50">Ship Date</th>
					<th data-options="field:'line_number',width:30,align:'right'">Line</th>
				</tr>
			</thead>
		</table>
	<!-- END SALES_ORDER_LINEITEMS -->
		<div id='divTotal'> 
					<table class='table2' width='100%'>
						<tr>
							<td>Sub Total: </td><td><input id='sub_total' value='<?=number_format($subtotal)?>' style='width:100px'></td>				
							<td>Discount %: </td><td><input id='disc_total_percent' value='<?=$discount?>' style='width:50px'></td>
							<td>Discount  : </td><td><input id='disc_amount_1' value='<?=number_format($disc_amount_1)?>' style='width:100px'></td>
						</tr>
						<tr>
							<td>Ongkos Angkut: </td><td><input id='freight' value='<?=$freight?>' style='width:80px'></td>
							<td>Pajak PPN %: </td><td><input id='sales_tax_percent' value='<?=$sales_tax_percent?>' style='width:50px'></td>
							<td>Pajak PPN  : </td><td><input id='tax' value='<?=number_format($tax)?>' style='width:100px'></td>
						</tr>
						<tr>
							<td>Biaya Lain: </td><td><input id='others' value='<?=$other?>' style='width:80px'></td>
							<td>&nbsp</td><td>&nbsp</td>
							<td>JUMLAH: </td><td><input id='total' value='<?=number_format($amount)?>' style='width:100px'>
								 <a id='divHitung' href="#" class="easyui-linkbutton" data-options="iconCls:'icon-sum'"  
								   plain='true' title='Hitung ulang' onclick='hitung_jumlah()'></a>
								
							</td>
						
						</tr>

					</table>		
		</div>
	</div>
	<div title="Delivery" style="padding:10px">
		<table class='table2' width='100%'>
		   <tr>
				<td>        
					Barang Terkirim : 
				</td>
				<td><?=form_radio('delivered',1,$delivered=='1'?TRUE:FALSE);?>Yes 
				<?php echo form_radio('delivered',0,$delivered=='0'?TRUE:FALSE);?>No
				</td>
				<td>Tanggal Kirim : </td>
				<td><?=$ship_date?></td>
			</tr>
		</table>
		<table id="dgDo" class="easyui-datagrid"  width='100%'
			data-options="
				iconCls: 'icon-edit',fitColumns: true, 
				singleSelect: true,  
				url: '<?=base_url();?>index.php/sales_order/delivery/<?=$sales_order_number;?>',toolbar:'',
			">
			<thead>
				<tr>
					<th data-options="field:'invoice_number',width:100">Nomor</th>
					<th data-options="field:'invoice_date',width:80">Tanggal</th>
					<th data-options="field:'warehouse_code',width:80">Gudang</th>
					<th data-options="field:'item_number',width:80">Item</th>
					<th data-options="field:'description',width:180">Description</th>
					<th data-options="field:'quantity',width:80">Quantity</th>
					<th data-options="field:'unit',width:80">Unit</th>

				</tr>
			</thead>
		</table>
	</div>
</div>


</DIV>
</div>
<div id="tb" class='box-gradient'>
	<a href="#" class="easyui-linkbutton" iconCls="icon-edit" onclick="editItem()">Edit</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" onclick="deleteItem()">Delete</a>	
</div>

<?
	include_once 'customer_select.php';
	echo load_view('inventory/inventory_select');
?>

<script type="text/javascript">
	var url;	
    function save_so(){
	
        if($('#sales_order_number').val()==''){alert('Isi nomor sales order !');return false;}
        if($('#sold_to_customer').val()==''){alert('Pilih pelanggan !');return false;}
        if($('#salesman').val()==''){alert('Pilih salesman !');return false;}        
		hitung_jumlah();
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
						$('#mode').val('view');
						$('#dg').datagrid({url:'<?=base_url()?>index.php/sales_order/items/'+so+'/json'});
						$('#dg').datagrid('reload');
						log_msg('Data sudah tersimpan. Silahkan pilih nama barang');
					} else {
						log_err(result.msg);
					}
				}
			});

    }

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
		function hitung_jumlah(){
		    url=CI_ROOT+'sales_order/sub_total/'+$('#sales_order_number').val();
		    if($('#disc_total_percent').val()=='')$('#disc_total_percent').val(0);
		    disc_prc=$('#disc_total_percent').val();
	        if(disc_prc>1){
	        	disc_prc=disc_prc/100;
	        	$('#disc_total_percent').val(disc_prc);
	        }	
		    if($('#sales_tax_percent').val()=='')$('#sales_tax_percent').val(0);
		    tax_prc=$('#sales_tax_percent').val();
	        if(tax_prc>1){
	        	tax_prc=tax_prc/100;
	        	$('#sales_tax_percent').val(tax_prc);
	        }	
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
                    $('#disc_amount_1').val(obj.disc_amount_1);
                    $('#tax').val(obj.tax);
                },
                error: function(msg){alert(msg);}
		    });			
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
						$('#frmItem').form('clear');
						$('#item_number').val('');
						$('#discount').val('0');
						$('#unit').val('Pcs');
						$('#item_number').val('');
						$('#line_number').val('');
						$('#quantity').val(1);
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

  	function print_so(){
            so=$('#sales_order_number').val(); 
            window.open("<?=base_url().'index.php/sales_order/print_so/'?>"+so,"new");  		
  	}
 
</script>
