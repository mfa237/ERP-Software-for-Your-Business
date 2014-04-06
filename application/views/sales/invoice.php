<div class="col-sm-6 col-md-8"><h1>FAKTUR PENJUALAN  <div class="thumbnail">
	<?
	echo link_button('Save', 'save()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/invoice/add');		
	echo link_button('Search','','search','true',base_url().'index.php/invoice');		
	
	?>
</div></H1>
<div class="thumbnail">	
<form id="frmInvoice"  method="post">
<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
<table>
    <tr>
     	<td>Pelanggan</td><td><?
        echo form_input('sold_to_customer',$sold_to_customer,'id=sold_to_customer'); 
        ?>
        	<? if($mode=='add') { ?>
			<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
			onclick="select_customer()"></a>
			<? } ?>     
		</td>

		<td>Nomor</td>
        <td>  			
            <? 
            	echo form_input('invoice_number',$invoice_number,'id=invoice_number');
            ?>
        </td>
		        
    </tr>
     <tr><td>Tanggal</td><td><?         
			  echo form_input('invoice_date',$invoice_date,'id=invoice_date
             class="easyui-datetimebox" required style="width:150px"');                 
         ?></td>
		 <td>Salesman</td><td><?
			 echo form_dropdown('salesman',$salesman_list,$salesman); 
        ?></td> 
	</tr>
     <tr>
     	<td>Termin</td><td><?
			echo form_dropdown('payment_terms',$payment_terms_list,$payment_terms,"id=payment_terms"); 
        ?></td>
     	
		<td>Jatuh Tempo</td><td><? 
	     echo form_input('due_date',$due_date,'id=due_date 
             class="easyui-datetimebox" required style="width:150px"');
	    ?></td>
		
	</tr>
	<tr>
		<td>Nomor SO</td>
		<td><?         
			echo form_input('sales_order_number',$sales_order_number,'id=sales_order_number');                 
         ?></td>		
	</tr>
     <tr>
		<td>Keterangan</td><td colspan="4">
			<?
         echo form_input('comments',$comments,'id=comments style="width:300px"');
		 	?>
		</td>
    </tr>
	</table>	
</form>
    
<div id='divItem' >
<h5>SELECT ITEMS</H5>
	<div id='dgItem'>
		<? include_once "invoice_add_item_simple.php"; ?>
	</div>
    
	<table id="dg" class="easyui-datagrid"  
		style="width:600px;min-height:800px"
		data-options="
			iconCls: 'icon-edit',
			singleSelect: true,
			toolbar: '#tb',
			url: '<?=base_url()?>index.php/invoice/items/<?=$invoice_number?>/json'
		">
		<thead>
			<tr>
				<th data-options="field:'item_number'">Kode Barang</th>
				<th data-options="field:'description'">Nama Barang</th>
				<th data-options="field:'quantity',align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
				<th data-options="field:'unit',align:'left',editor:'text'">Satuan</th>
				<th data-options="field:'price',align:'right',editor:{type:'numberbox',options:{precision:2}}">Harga</th>
				<th data-options="field:'discount',editor:'numberbox'">Disc%</th>
				<th data-options="field:'amount',align:'right',editor:'numberbox'">Jumlah</th>
				<th data-options="field:'line_number',align:'right'">Line</th>
			</tr>
		</thead>
	</table>
	
			<h5>INVOICE - TOTAL</H5>
			<div id='divTotal'> 
				<table>
					<tr>
						<td>Sub Total: </td><td><input id='sub_total' value='<?=$subtotal?>' style='width:100px'></td>				
						<td>Discount %: </td><td><input id='disc_total_percent' value='<?=$discount?>' style='width:50px'></td>
						<td>Pajak PPN %: </td><td><input id='sales_tax_percent' value='<?=$sales_tax_percent?>' style='width:50px'></td>
					</tr>
					<tr>
						<td>Ongkos Angkut: </td><td><input id='freight' value='<?=$freight?>' style='width:80px'></td>
						<td>Biaya Lain: </td><td><input id='others' value='<?=$other?>' style='width:80px'></td>
						<td>JUMLAH: </td><td><input id='total' value='<?=$amount?>' style='width:100px'>
							 <a id='divHitung' href="#" class="easyui-linkbutton" data-options="iconCls:'icon-sum'"  
		             		   plain='true' title='Hitung ulang' onclick='hitung_jumlah()'></a>
		             		
						</td>
					</tr>
					<tr>
						<td>Total Payment: </td><td><input id='total_payment'  style='width:80px'></td>				
						<td>Total Retur: </td><td><input id='total_retur'  style='width:80px'></td>
						<td>Total CrDB Memo: </td><td><input id='total_crdb'  style='width:80px'></td>
						<td>Saldo Faktur: </td><td><input id='saldo'  style='width:80px'></td>
					</tr>
				</table>		
			</div>
	
</div>

<div id='divPay' style='display:none'>
<h5>PAYMENTS</H5>
<?
	include_once "payment_list.php";
?>
</div>
<? include_once 'customer_select.php' ?>


</div> 

 <script language='javascript'>
	var url;	
 
  	function save(){
  		if($('#invoice_number').val()==''){alert('Isi nomor bukti !');return false;}
  		if($('#sold_to_customer').val()==''){alert('Isi pelanggan !');return false;}
  		if($('#salesman').val()==''){alert('Isi salesman; !');return false;}
  		if($('#payment_terms').val()==''){alert('Isi termin pembayaran !');return false;}
		url='<?=base_url()?>index.php/invoice/save';
			$('#frmInvoice').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#invoice_number').val(result.invoice_number);
						var invoice=$('#invoice_number').val();
						$('#mode').val('view');
						$('#divItem').show('slow');
						$('#dg').datagrid({url:'<?=base_url()?>index.php/invoice/items/'+invoice+'/json'});
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
  	function print(){
            txtNo='<?=$invoice_number?>'; 
            window.open("<?=base_url().'index.php/invoice/print_faktur/'?>"+txtNo,"new");  		
  	}
  	function payment(){
            txtNo='<?=$invoice_number?>';     
             
            $.ajax({
                type : 'GET',
                url : '<?=base_url();?>index.php/payment/add/'+txtNo,
                data: '',
                success: function (data) {                
                    $("#divPayment").html(data);
                }
            })
  	}
  	function recalc(){
            txtNo='<?=$invoice_number?>';     
            $.ajax({
                type : 'GET',
                url : '<?=base_url();?>index.php/invoice/sum_info',
                data: 'nomor='+txtNo,
                success: function (data) {                
                    $("#divPayment").html(data);
                }
            })
  		
  	}
		
      function addnew_retur(){
			var param="invoice_number=<?=$invoice_number?>";
	        var xurl='<?=base_url()?>index.php/sales_retur/add';
	        $.ajax({
	                type: "GET",
	                url: xurl,
	                data: param,
	                success: function(msg){
	                    $('#dlgItem').dialog({  
	                       title: 'Tambah Retur Penjualan',  
	                       width: 500,height: 400,  closed: false, cache: false,
	                       modal: true,
	                        buttons: [{
	                                        text:'Ok',
	                                        iconCls:'icon-ok',
	                                        handler:function(){
	                                           void save_retur();
	                                           void refresh_retur();
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
      function remove_retur(){
            row = $('#dgRetur').datagrid('getSelected');
            if (row){
                xurl=CI_ROOT+'sales_retur/delete/'+row['no_retur'];                             
                console.log(xurl);
                xparam='';
                $.ajax({
                    type: "GET",
                    url: xurl,
                    param: xparam,
                    success: function(msg){
                        void refresh_retur();
                    },
                    error: function(msg){$.messager.alert('Info',msg);}
                });         
			}
      }
      function refresh_retur(){
         param="";
         get_this('<?=base_url()?>index.php/invoice/retur/list/<?=$invoice_number?>'
         ,param,'divDgRetur');
         return false;
      }
      function save_retur(){
        var url="<?=base_url()?>index.php/sales_retur/save";
        var param=$('#frmAddRetur').serialize();
        void post_this(url,param,'message');
        //void refresh_retur();
        return false;
      }
      function addnew_payment(faktur){
	 
			var param="invoice_number=<?=$invoice_number?>";
	        var xurl='<?=base_url()?>index.php/payment/add_invoice';
			
			if(faktur!="")param="invoice_number="+faktur;
			
	        $.ajax({
	                type: "GET",
	                url: xurl,
	                data: param,
	                success: function(msg){
	                    $('#dlgItem').dialog({  
	                       title: 'Data Pembayaran',  
	                       width: 400,height: 400,  closed: false, cache: false,
	                       modal: true,
	                        buttons: [{
	                                        text:'Ok',
	                                        iconCls:'icon-ok',
	                                        handler:function(){
	                                           void save_payment();
	                                           void refresh_payment();
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
      function remove_payment(){
            row = $('#dgPay').datagrid('getSelected');
            if (row){
                xurl=CI_ROOT+'payment/delete/'+row['no_bukti'];                             
                console.log(xurl);
                xparam='';
                $.ajax({
                    type: "GET",
                    url: xurl,
                    param: xparam,
                    success: function(msg){
                        void refresh_payment();
                    },
                    error: function(msg){$.messager.alert('Info',msg);}
                });         
			}
      }
      function refresh_payment(){
         param="";
         get_this('<?=base_url()?>index.php/invoice/payment/list/<?=$invoice_number?>'
         ,param,'divDgPay');
         xurl='<?=base_url()?>index.php/invoice/payment/list/<?=$invoice_number?>';
      }
      function save_payment(){
        var url="<?=base_url()?>index.php/payment/save_invoice";
        var param=$('#frmAddPay').serialize();
        void post_this(url,param,'message');
        void refresh_payment();
        return false;
      }	  
      function addnew_crdb(){
			var param="invoice_number=<?=$invoice_number?>";
	        var xurl='<?=base_url()?>index.php/crdb/add';
	        $.ajax({
	                type: "GET",
	                url: xurl,
	                data: param,
	                success: function(msg){
	                    $('#dlgItem').dialog({  
	                       title: 'Data Credit/Debit Memo',  
	                       width: 400,height: 400,  closed: false, cache: false,
	                       modal: true,
	                        buttons: [{
	                                        text:'Ok',
	                                        iconCls:'icon-ok',
	                                        handler:function(){
	                                           void save_crdb();
	                                           void refresh_crdb();
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
      function remove_crdb(){
            row = $('#dgCrDb').datagrid('getSelected');
            if (row){
                xurl=CI_ROOT+'crdb/delete/'+row['kodecrdb'];                             
                console.log(xurl);
                xparam='';
                $.ajax({
                    type: "GET",
                    url: xurl,
                    param: xparam,
                    success: function(msg){
                        void refresh_crdb();
                    },
                    error: function(msg){$.messager.alert('Info',msg);}
                });         
			}
      }
      function refresh_crdb(){
         param="";
         get_this('<?=base_url()?>index.php/invoice/crdb/list/<?=$invoice_number?>'
         ,param,'divDgCrDb');
         return false;
      }
      function save_crdb(){
        var url="<?=base_url()?>index.php/crdb/save";
        var param=$('#frmAddCrDb').serialize();
        void post_this(url,param,'msglog');
        void refresh_crdb();
        return false;
      }
		function hitung_jumlah(){
		    url=CI_ROOT+'invoice/recalc/'+$('#invoice_number').val();
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
                    $('#total_retur').val(obj.retur);
                    $('#total_crdb').val(obj.crdb);
                    $('#total_payment').val(obj.payment);
                    $('#saldo').val(obj.saldo);
                },
                error: function(msg){alert(msg);}
		    });
			
		}

      
      
        
 </script>
     
 </body>
</html>

