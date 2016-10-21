	
	<div class="thumbnail box-gradient">
	<?
	echo link_button('Save', 'save()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','false',base_url().'index.php/supplier/add');		
	echo link_button('Search','','search','false',base_url().'index.php/supplier');		
	echo link_button('Refresh','','reload','false',base_url().'index.php/supplier/view/'.$supplier_number);		
	echo link_button('Delete', 'delete_supplier()','cut');		
	echo "<div style='float:right'>";
	?>

	<a href="#" class="easyui-splitbutton" data-options="plain:false,menu:'#mmOptions',iconCls:'icon-tip',flat:false">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help('supplier')">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	
	<?php 
	
		echo link_button('Help', 'load_help(\'supplier\')','help');		
		echo "</div>";
	?>
</div>
 

<div class="easyui-tabs" style="height:auto">
	<div title="General" style="padding:10px">
		<form id="myform"  method="post">
		<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
		<?php echo validation_errors(); ?>
		<table class='table' width="100%">
			<tr>
				<td >Supplier Number</td><td >
				<?php
				if($mode=='view'){
					echo "<strong>$supplier_number</strong>";
					echo "<input type='hidden' name='supplier_number' id='supplier_number' value='$supplier_number'>";
				} else { 
					echo form_input('supplier_number',$supplier_number,"id=supplier_number");
				}		
				?></td>
			  <td>Supplier Name</td>
			  <td><?php echo form_input('supplier_name',$supplier_name,'style="width:150px"');?></td>


			</tr>	 

			<tr>
			  <td>Alamat</td>
			  <td colspan="3"><?php echo form_input('street',$street,'style="width:400px"');?></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="3"><?php echo form_input('suite',$suite,'style="width:400px"');?></td>
			</tr>
			<tr>
			  <td>Email</td>
			  <td><?php echo form_input('email',$email);?></td>
			  <td>Kota</td>
			  <td><?php echo form_input('city',$city);?></td>

			</tr>
			<tr>
			  <td>Telpon</td>
			  <td><?php echo form_input('phone',$phone);?></td>
			  <td>Fax</td>
			  <td><?php echo form_input('fax',$fax);?></td>
			</tr>
			<tr>
			  <td>Akun Hutang </td>
			  <td colspan="3"><?php echo form_input('supplier_account_number',
						 $supplier_account_number,"id='supplier_account_number' style='width:300px'");?>
					 <a href='#' onclick='lookup_coa("supplier_account_number");return false'
						class='btn btn-default glyphicon glyphicon-search'
						title='Cari kode perkiraan hutang'>
					 </a>
				</td>
			</tr>
			<tr>
			  <td>Akun Biaya </td>
			  <td colspan="3"><?php echo form_input('acc_biaya',
						 $acc_biaya,"id='acc_biaya' style='width:300px'");?>
					 <a href='#' onclick='lookup_coa("acc_biaya");return false'
						class='btn btn-default glyphicon glyphicon-search'
						title='Cari kode perkiraan biaya untuk supplier'>
					 </a>
				</td>
			</tr>
			<tr>
			  <td>Kelompok Supplier </td>
			 <td><?php echo form_input('type_of_vendor',$type_of_vendor,"id=type_of_vendor");?>
				 <a href='#' onclick='dlgtype_of_vendor_show();return false'
					class='btn btn-default glyphicon glyphicon-search'
					title='Cari kode kelompok '>
				 </a>
				 <a href='<?=base_url()?>index.php/supplier/kelompok/add' 
				 class='btn btn-default glyphicon glyphicon-plus info_link' 
				 title='Tambah kelompok'></a>		 
			 
			 </td>

			  <td>Termin</td>
			  <td colspan="3">
				<?=form_input('payment_terms',$payment_terms,"id='payment_terms'");?>
				 <a href='#' onclick='dlgpayment_terms_show();return false'
					class='btn btn-default glyphicon glyphicon-search'
					title='Cari kode termin pembayaran'>
				 </a>
				 <a href='<?=base_url()?>index.php/type_of_payment/add' 
				 class='btn btn-default glyphicon glyphicon-plus info_link' 
				 title='Tambah termin pembayaran'></a>			  
			  </td>
			</tr>	 
			<tr>
			  <td>Saldo Hutang</td>
			  <td><strong>Rp. <?=number_format($saldo);?></strong></td>
			  <td>Aktif</td>
			  <td><?=form_radio('active',1,$active=='1'?TRUE:FALSE);?>
				Yes <?php echo form_radio('active',0,$active=='0'?TRUE:FALSE);?> No </td>
		  </tr>	 
		   </table>
		   </form>
	</div>  

	<div title="Cards" style="padding:10px">
		<div class='thumbnail box-gradient'>
			<form method="post">
			<table width="100%">
			<tr><td>Date From</td>
			<td><?=form_input('d1',date("Y-m-d"),'id=d1 class="easyui-datetimebox" ');?></td>
			<td>Date To</td>
			<td><?=form_input('d2',date("Y-m-d"),'id=d2  class="easyui-datetimebox" ');?></td>
			<td><?=link_button('Search','search_cards()','search');?></td>
			</tr>
			</table>
			</form>
		</div>
		<table id="dgCard" class="easyui-datagrid"  width="100%"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,  
				url: '',toolbar:'#tbCard',
			">
			<thead>
				<tr>
					<th data-options="field:'no_bukti',width:80">Nomor</th>
					<th data-options="field:'tanggal',width:150">Tanggal</th>
					<th data-options="field:'jenis',width:100,align:'left',editor:'text'">Jenis</th>
					<th data-options="field:'amount',width:100,align:'right',editor:{type:'numberbox',options:{precision:2}}">Jumlah</th>
					<th data-options="field:'saldo',width:100,align:'right'">Saldo</th>
				</tr>
			</thead>
		</table>
		
	</div>
	<div title="Purchase Order" style="padding:10px">
		<div class='thumbnail box-gradient'>
			<form method="post">
			<table width="100%">
			<tr><td>Date From</td>
			<td><?=form_input('date_from_po',date("Y-m-d"),'id=date_from_po class="easyui-datetimebox" ');?></td>
			<td>Date To</td>
			<td><?=form_input('date_to_po',date("Y-m-d"),'id=date_to_po  class="easyui-datetimebox" ');?></td>
			<td><?=link_button('Search','search_po()','search');?></td>
			</tr>
			</table>
			</form>
		</div>
		<table id="dgPo" class="easyui-datagrid"  width="100%"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,  
				url: '',toolbar:'#tbPo',
			">
			<thead>
				<tr>
					<th data-options="field:'purchase_order_number',width:80">Nomor PO</th>
					<th data-options="field:'po_date',width:150">Tanggal</th>
					<th data-options="field:'due_date',width:100,align:'left',editor:'text'">Due Date</th>
					<th data-options="field:'amount',width:100,align:'right',editor:{type:'numberbox',options:{precision:2}}">Jumlah</th>
					<th data-options="field:'status',width:100,align:'right'">Status</th>
				</tr>
			</thead>
		</table>
		
	</div>
	<div title="Invoice" style="padding:10px">
		<div class='thumbnail box-gradient'>
			<form method="post">
			<table width="100%">
			<tr><td>Date From</td>
			<td><?=form_input('date_from_inv',date("Y-m-d"),'id=date_from_inv class="easyui-datetimebox" ');?></td>
			<td>Date To</td>
			<td><?=form_input('date_to_inv',date("Y-m-d"),'id=date_to_inv  class="easyui-datetimebox" ');?></td>
			<td><?=link_button('Search','search_invoice()','search');?></td>
			</tr>
			</table>
			</form>
		</div>
		<table id="dgInvoice" class="easyui-datagrid"  width="100%"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,  
				url: '',toolbar:'#tbInvoice',
			">
			<thead>
				<tr>
					<th data-options="field:'invoice',width:80">Nomor Faktur</th>
					<th data-options="field:'po_date',width:150">Tanggal</th>
					<th data-options="field:'due_date',width:100,align:'left',editor:'text'">Jatuh Tempo</th>
					<th data-options="field:'amount',width:100,align:'right',editor:{type:'numberbox',options:{precision:2}}">Jumlah</th>
					<th data-options="field:'paid',width:100,align:'right'">Paid</th>
					<th data-options="field:'saldo_invoice',width:100,align:'right',editor:{type:'numberbox',options:{precision:2}}">Saldo</th>
				</tr>
			</thead>
		</table>
		
	</div>
	
</div>
<div id='tbCard'>
	<?=link_button('Delete', 'delete_card()','cut');?>		
</div>
<div id='tbPo'>
	<?=link_button('View', 'view_po()','edit');?>		
</div>
<div id='tbInvoice'>
	<?=link_button('View', 'view_invoice()','edit');?>		
</div>
   
<script>
  	function save(){  		 
  		if($('#supplier_number').val()==''){alert('Isi kode supplier !');return false;}
  		if($('#supplier_name').val()==''){alert('Isi nama supplier !');return false;}
		url='<?=base_url()?>index.php/supplier/save';
			$('#myform').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$("#mode").val("view");
						log_msg('Data sudah tersimpan. ');
					} else {
						log_err(result.msg);
					}
				}
			});
  	}	
	function delete_supplier()
	{
	 
		var supp=$("#supplier_number").val();
		 
		
		$.ajax({
				type: "GET",
				url: "<?=base_url()?>/index.php/supplier/delete/"+supp,
				data: "",
				success: function(result){
					var result = eval('('+result+')');
					if(result.success){
						$.messager.show({
							title:'Success',msg:result.msg,
							style:{bottom:''}
						});	
					} else {
						$.messager.show({
							title:'Error',msg:result.msg,
							style:{bottom:''}
						});							
					};
				},
				error: function(msg){alert(msg);}
		}); 				
	}
	function search_cards()
	{
		var d1=$("#d1").datebox('getValue');
		var d2=$("#d2").datebox('getValue');
		var xurl='<?=base_url()?>index.php/supplier/kartu_hutang/<?=$supplier_number?>?d1='+d1+'&d2='+d2;
		$('#dgCard').datagrid({url:xurl});
		$('#dgCard').datagrid('reload');
	}
	function delete_card()
	{
		row = $('#dgCard').datagrid('getSelected');
		
        if (row){
            xurl=CI_ROOT+'purchase_invoice/delete/'+row['no_bukti'];                             
            $.ajax({
                type: "GET",url: xurl, 
                success: function(result){
					var result = eval('('+result+')');
					if(result.success){
						$('#dgCard').datagrid('reload');
						$.messager.show({title:'Success',msg:result.msg});	
					} else {
						$.messager.show({title:'Error',msg:result.msg})							
					};
                },
                error: function(msg){$.messager.alert('Info',msg);}
			});
		};
	}
	function search_po()
	{
		var d1=$("#date_from_po").datebox('getValue');
		var d2=$("#date_to_po").datebox('getValue');
		var xurl='<?=base_url()?>index.php/supplier/po_list/<?=$supplier_number?>?d1='+d1+'&d2='+d2;
		$('#dgPo').datagrid({url:xurl});
		$('#dgPo').datagrid('reload');
	}

	function view_po(){
        var row=$('#dgPo').datagrid('getSelected');
        if (row){
			var purchase_order_number=row.purchase_order_number;
			var url="<?=base_url()?>index.php/purchase_order/view/"+purchase_order_number;
			add_tab_parent("view_po_"+purchase_order_number,url);
		}
	}
	function search_invoice()
	{
		var d1=$("#date_from_inv").datebox('getValue');
		var d2=$("#date_to_inv").datebox('getValue');
		var xurl='<?=base_url()?>index.php/supplier/invoice_list/<?=$supplier_number?>?d1='+d1+'&d2='+d2;
		$('#dgInvoice').datagrid({url:xurl});
		$('#dgInvoice').datagrid('reload');
	}

	function view_invoice(){
        var row=$('#dgInvoice').datagrid('getSelected');
        if (row){
			var purchase_order_number=row.invoice;
			var url="<?=base_url()?>index.php/purchase_invoice/view/"+purchase_order_number;
			add_tab_parent("view_invoice_"+purchase_order_number,url);
		}
	}
		
</script>	
<?=$lookup_payment_terms?>  	
<?=$lookup_type_of_vendor?>   
<?=load_view('gl/select_coa_link')?> 
      