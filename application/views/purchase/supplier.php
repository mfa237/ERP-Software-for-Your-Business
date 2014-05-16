<div><h3>MASTER SUPPLIER</H3><div class="thumbnail">
	<?
	echo link_button('Save', 'save()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/supplier/add');		
	echo link_button('Search','','search','true',base_url().'index.php/supplier');		
	echo link_button('Refresh','','reload','true',base_url().'index.php/supplier/view/'.$supplier_number);		
	echo link_button('Delete', 'delete_supplier()','cut');		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/supplier");
		}
	</script>
	
</div>
<div class="thumbnail">	

<div class="easyui-tabs" style="width:700px;height:auto">
	<div title="General" style="padding:10px">
		<form id="myform"  method="post">
		<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
		<?php echo validation_errors(); ?>
		<table>
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


			  <td>Aktif</td>
			  <td><?=form_radio('active',1,$active=='1'?TRUE:FALSE);?>
				Yes <?php echo form_radio('active',0,$active=='0'?TRUE:FALSE);?> No </td>
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
			  <td colspan="3"><?php echo form_dropdown('supplier_account_number',
						 $akun_list,$supplier_account_number);?></td>
			</tr>
			<tr>
			  <td>Akun Biaya </td>
			  <td colspan="3"><?php echo form_dropdown('acc_biaya',$akun_list,$acc_biaya);?></td>
			</tr>
			<tr>
			  <td>Kelompok Supplier </td>
			  <td><?php echo form_dropdown('type_of_vendor',$type_of_vendor_list,$type_of_vendor);?></td>

			  <td>Termin</td>
			  <td colspan="3"><?php echo form_dropdown('payment_terms',$terms_list,$payment_terms);?></td>
			</tr>	 
			<tr>
			  <td>Saldo Hutang</td>
			  <td>Rp. <?=number_format($saldo);?></td>
			</tr>	 

		   </table>
		   </form>
	</div>  

	<div title="Cards" style="padding:10px">
		<div class='thumbnail'>
			<form method="post">
			<table>
			<tr><td>Date From</td>
			<td><?=form_input('date_from',date("Y-m-d"),'id=date_from class="easyui-datetimebox" ');?></td>
			<td>Date To</td>
			<td><?=form_input('date_to',date("Y-m-d"),'id=date_to  class="easyui-datetimebox" ');?></td>
			<td><?=link_button('Search','search_cards()','search');?></td>
			</tr>
			</table>
			</form>
		</div>
		<table id="dgCard" class="easyui-datagrid"  
			style="width:700px;min-height:700px"
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
	
</div>
<div id='tbCard'>
	<?=link_button('Delete', 'delete_card()','cut');?>		
</div>
   
<script>
  	function save(){  		 
		event.preventDefault(); 
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
						$.messager.show({
							title:'Success',msg:'Data sudah tersimpan.'
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
							title:'Success',msg:result.msg
						});	
					} else {
						$.messager.show({
							title:'Error',msg:result.msg
						});							
					};
				},
				error: function(msg){alert(msg);}
		}); 				
	}
	function search_cards()
	{
		var d1=$("#date_from").datebox('getValue');
		var d2=$("#date_to").datebox('getValue');
	 
		var xurl='<?=base_url()?>index.php/supplier/kartu_hutang/<?=$supplier_number?>?d1='+d1+'&d2='+d2;
		console.log(xurl);
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
</script>	
     