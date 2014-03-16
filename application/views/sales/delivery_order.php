<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Transaksi Surat Jalan</title>
 </head>
 <body>
 <div>
   <div>
	<?
	if($mode=='view'){
		echo link_button('Print', 'print()','print','false');		
		echo link_button('Delete', 'delete()','remove','false');		
		echo link_button('Edit', 'edit()','edit','false');		
	}
	?>
   	
   	<h1>SURAT JALAN</H1>
   <?php echo validation_errors(); ?>
   <?php 
        if($mode=='view') 
        {
                echo form_open(base_url().'index.php/delivery_order/update',"id=myform");
                $disabled='disable';
        } else {
                $disabled='';
                echo form_open(base_url().'index.php/delivery_order/add',"id=myform"); 
        }
		
   ?>
<table>     
	<tr><td>Nomor</td>
        <td>  
            <?php
             echo form_input('invoice_number',$invoice_number);
            		
            ?>
        </td>        
    </tr>
     <tr>
	     <td>Pelanggan</td><td><?
    	    echo form_input('sold_to_customer',$sold_to_customer,'id=sold_to_customer');?>
        	<? if($mode=='add') { ?>
			<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
			onclick="select_customer()"></a>
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
			onclick="select_so_open()"></a>

			<? } ?>


	     </td>
         
     </tr>
	 <tr><td>Tanggal Kirim</td><td><? 
	     echo form_input('due_date',$due_date,'id=due_date  class="easyui-datetimebox"  ');
	    ?></td></tr>
     <tr><td>Keterangan</td><td colspan="6">
        <?   echo form_input('comments',$comments,'id=comments style="width:300px"');
		?>
		</td>
       </tr>
		</table>
		<h1>SELECT ITEMS</h1>
		<div id='divItem'>
			<? if($mode=='view'){ ?>
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
							<th data-options="field:'description',width:150">Nama Barang</th>
							<th data-options="field:'quantity',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
							<th data-options="field:'unit',width:50,align:'left',editor:'text'">Satuan</th>
							<th data-options="field:'line_number',width:30,align:'right'">Line</th>
						</tr>
					</thead>
				</table>
			<? } ?>
		</div>
         <? if($mode=='add'){ ?>
				<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'" onclick='save()'>Simpan</a>
		 <? } ?>			
	   </form>
    </div>
    

<div id='dlgSelectSo'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-so">
     <div id='divSelectSoResult'> 
		<table id="dgSelectSo" class="easyui-datagrid"  
			data-options="
				toolbar: '#toolbar-search-so',
				singleSelect: true,
				url: '<?=base_url()?>index.php/sales_order/select_so_open'
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
<div id="toolbar-search-so" style="height:auto">
	Enter Text: <input  id="search_so" style='width:180' name="search_so">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="select_so_open()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selected_so_number()">Select</a>
</div>

<div id='dlgSelectCust'class="easyui-dialog" style="width:600px;height:380px;padding:10px 20px"
     closed="true" buttons="#button-select-so">
     <div id='divSelectCust'> 
		<table id="dgSelectCust" class="easyui-datagrid"  
			data-options="
				toolbar: '#toolbar-search-cust',
				singleSelect: true,
				url: '<?=base_url()?>index.php/customer/select'
			">
			<thead>
				<tr>
					<th data-options="field:'company',width:80">Pelanggan</th>
					<th data-options="field:'customer_number',width:80">Kode</th>
					<th data-options="field:'city',width:180">Kota</th>
					<th data-options="field:'region',width:80">Wilayah</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>
<div id="toolbar-search-cust" style="height:auto">
	Enter Text: <input  id="search_cust" style='width:180' name="search_cust">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="select_customer()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selected_customer()">Select</a>
</div>

 <script language='javascript'>
	$(document).ready(function(){

//       	void refresh_items();

//		$('#sales_order_number').blur(function() {
//  			void selected_so();
//		});
	})		
  	function save(){
  		if($('#invoice_number').val()==''){alert('Isi nomor bukti !');return false;}
  		if($('#sold_to_customer').val()==''){alert('Isi pelanggan !');return false;}
  		$("#myform").submit();
  		return false;
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

//-- search customer
	function selected_customer(){
		var row = $('#dgSelectCust').datagrid('getSelected');
		if (row){
			$('#sold_to_customer').val(row.customer_number);
			//$('#company').val(row.company);
			$('#dlgSelectCust').dialog('close');
		} else {
			alert("Pilih salah satu nomor customer !");
		}
	}
	
	function select_customer(){
			$('#dlgSelectCust').dialog('open').dialog('setTitle','Cari nama pelanggan');
			search=$('#search_cust').val();
			$('#dgSelectCust').datagrid({url:'<?=base_url()?>index.php/customer/select/'+search});
			$('#dgSelectCust').datagrid('reload');
	};

 </script>
     
 </body>
</html>

