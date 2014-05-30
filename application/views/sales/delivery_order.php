<div><h4>SURAT JALAN </H4>
<div class="thumbnail">
	<? 
		echo link_button('Save', 'save()','save');		
		echo link_button('Print', 'print()','print');		
		echo link_button('Add','','add','true',base_url().'index.php/delivery_order/add');		
		if($mode=="view") echo link_button('Delete','','cut','true',base_url().'index.php/delivery_order/delete/'.$invoice_number);		
		echo link_button('Search','','search','true',base_url().'index.php/delivery_order');		
		if($mode=="view") echo link_button('Refresh','','reload','true',base_url().'index.php/delivery_order/view/'.$invoice_number);		
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
			event.preventDefault(); 
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/invoice");
		}
	</script>
</div>

<div class="thumbnail">	
<form id="frmDo"  method="post">
	<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
	<table>     
	<tr><td>Nomor</td>
        <td>  
            <?php
             echo form_input('invoice_number',$invoice_number,"id='invoice_number'");
            		
            ?>
        </td> 
        <td rowspan="4" style="vertical-align: top;">
			<div id="customer_info" class="thumbnail" style="padding:10px;width:300px;height:100px">
				<?=$customer_info?>
			</div>
        </td>       
    </tr>
     <tr>
	     <td>Pelanggan</td><td><?
    	    echo form_input('sold_to_customer',$sold_to_customer,'id=sold_to_customer');?>
        	<? if($mode=='add') { ?>
			<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
			onclick="select_customer();return false;"></a>
			<? } ?>
        </td>
    </tr>
     <tr>
     	<td>Tanggal</td><td><?         
         echo form_input('invoice_date',$invoice_date,' class="easyui-datetimebox" required ');                 
         ?>
         </td>
    </tr>
     <tr>
	     <td>Nomor SO</td><td><?         
	        echo form_input('sales_order_number',$sales_order_number,'id=sales_order_number');?>

        	<? if($mode=='add') { ?>

			<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
			onclick="select_so_open();return false;"></a>

			<? } ?>


	     </td>
         
     </tr>
	 <tr><td>Gudang</td><td><? 
	     echo form_dropdown('warehouse_code',$warehouse_list,$warehouse_code,'id=warehouse_code');
	    ?></td></tr>
	 <tr><td>Tanggal Kirim</td><td><? 
	     echo form_input('due_date',$due_date,'id=due_date  class="easyui-datetimebox"  ');
	    ?></td></tr>
     <tr><td>Keterangan</td><td colspan="6">
        <?   echo form_input('comments',$comments,'id=comments style="width:300px"');
		?>
		</td>
       </tr>
       
		</table>
		<h5>SELECT ITEMS</h5>
		<div id='divItem'>
				<table id="dgItem" class="easyui-datagrid"  
					data-options="
						iconCls: 'icon-edit',
						singleSelect: true,
						toolbar: '#tb',
						url: '<?=base_url()?>index.php/delivery_order/items/<?=$invoice_number?>/json'
					">
					<thead>
						<tr>
							<th data-options="field:'item_number',width:80">Kode Barang</th>
							<th data-options="field:'description',width:200">Nama Barang</th>
							<th data-options="field:'quantity',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
							<th data-options="field:'unit',width:50,align:'left',editor:'text'">Satuan</th>
							<th data-options="field:'line_number',width:30,align:'right'">Line</th>
						</tr>
					</thead>
				</table>
		</div>
	   </form>
</div> 
    

<div id='dlgSelectSo'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-so">
     <div id='divSelectSoResult'> 
		<table id="dgSelectSo" class="easyui-datagrid"  
			data-options="
				toolbar: '',
				singleSelect: true,
				url: ''
			">
			<thead>
				<tr>
					<th data-options="field:'sales_order_number',width:80">SO Number</th>
					<th data-options="field:'sold_to_customer',width:80">Kode Pelanggan</th>
					<th data-options="field:'company',width:180">Nama Pelanggan</th>
					<th data-options="field:'sales_date',width:80">Tanggal SO</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>
<div id="button-select-so" style="height:auto">
	Enter Text: <input  id="search_so" style='width:180' name="search_so">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="select_so_open()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selected_so_number()">Select</a>
</div>


<?
	include_once 'customer_select.php';
	echo load_view('inventory/inventory_select');
?>

 <script language='javascript'>
  	function save(){
  		if($('#invoice_number').val()==''){alert('Isi nomor bukti !');return false;}
  		if($('#sold_to_customer').val()==''){alert('Isi pelanggan !');return false;}
		url='<?=base_url()?>index.php/delivery_order/save';
			$('#frmDo').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#invoice_number').val(result.invoice_number);
						var nomor=$('#invoice_number').val();
						$('#mode').val('view');
						window.open("<?=base_url()?>index.php/delivery_order/view/"+nomor,"_self");  		
						
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
  	}
  	function print(){
            txtNo='<?=$invoice_number?>'; 
            window.open("<?=base_url().'index.php/delivery_order/print_faktur/'?>"+txtNo,"new");  		
  	}
  	function recalc(){
            txtNo='<?=$invoice_number?>';     
            $.ajax({
                type : 'GET',
                url : '<?=base_url();?>index.php/delivery_order/sum_info',
                data: 'nomor='+txtNo,
                success: function (data) {                
                    $("#divPayment").html(data);
                }
            })
  		
  	}
   function append()
    {
        var param="invoice_number=<?=$invoice_number?>";
        var xurl='<?=base_url()?>index.php/delivery_order/add_item';
        $.ajax({
                    type: "GET",
                    url: xurl,
                    data: param,
                    success: function(msg){
                        $('#dlgItem').dialog({  
                           title: 'Pilih Nama Barang',  
                           width: 400,height: 400,  closed: false, cache: false,
                           modal: true,
                            buttons: [{
                                            text:'Ok',
                                            iconCls:'icon-ok',
                                            handler:function(){
                                               void save_item();
                                               void refresh_items();
                                               $('#dlgItem').dialog('close');
                                            }
                                    },{
                                            text:'Cancel',
                                            iconCls:'icon-cancel',
                                            handler:function(){
                                                $('#dlgItem').dialog('close');
                                            }
                                    }],

                           modal: true  
                       });
                        $('#divItem').html(msg);
                    },
                    error: function(msg){
                        alert(msg);
                    }
            }); 
         

          

     }
     function remove_item(){
            row = $('#dg').datagrid('getSelected');
            if (row){
                xurl=CI_ROOT+'delivery_order/delete_item/'+row['line_number'];                             
                console.log(xurl);
                xparam='';
                $.ajax({
                    type: "GET",
                    url: xurl,
                    param: xparam,
                    success: function(msg){
                        void refresh_items();
                    },
                    error: function(msg){$.messager.alert('Info',msg);}
                });         
			}
     }
     function refresh_items(){
         param="";
         get_this('<?=base_url()?>index.php/delivery_order/view_detail/<?=$invoice_number?>'
         ,param,'dgItem');
         return false;
     }   
      function save_item(){
        var url="<?=base_url()?>index.php/delivery_order/save_item";
        var param=$('#frmItem').serialize();
        void post_this(url,param,'message');
        void refresh_items();
      }     

//-- search open sales order number 
	function load_so(nomor_so){
         get_this('<?=base_url()?>index.php/sales_order/list_item_delivery/'+nomor_so,'','divItem');					
	}
	function selected_so_number(){
		var row = $('#dgSelectSo').datagrid('getSelected');
		if (row){
			$('#sales_order_number').val(row.sales_order_number);
			$('#sold_to_customer').val(row.sold_to_customer);
			$('#dlgSelectSo').dialog('close');
			load_so($('#sales_order_number').val());
		} else {
			alert("Pilih salah satu nomor SO !");
		}
	}
	
	function select_so_open(){
			search_so=$('#search_so').val();
			cust=$('#sold_to_customer').val();
			if(cust!=''){
				$('#dlgSelectSo').dialog('open').dialog('setTitle','Cari nomor sales order');
				$('#dgSelectSo').datagrid({url:'<?=base_url()?>index.php/sales_order/select_so_open/'+search_so+'/'+cust});
				$('#dgSelectSo').datagrid('reload');
			} else {
				alert("Pilih kode pelanggan terlebih dahulu !");
			}
	};
 </script>
