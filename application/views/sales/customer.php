<div class=""><h4>MASTER PELANGGAN</H4><div class="thumbnail">
	<?
	echo link_button('Save', 'save()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/customer/add');		
	echo link_button('Refresh','','reload','true',base_url().'index.php/customer/view/'.$customer_number);		
	echo link_button('Search','','search','true',base_url().'index.php/customer');		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/customer");
		}
	</script>
	
</div>
<div class="thumbnail">	
<form id="myform"  method="post" role="form">
<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
<?php echo validation_errors(); ?>
<table >
	<tr>
		<td style="width:50px">Kode</td> 
		<td  style="width:100px"><?php
			if($mode=='view'){
				echo "<h4>".$customer_number."</h4>";
				echo form_hidden('customer_number',$customer_number,"id=customer_number");
			} else { 
				echo form_input('customer_number',$customer_number,"id=customer_number");
			}?>
		</td>
         <td  style="width:50px">Nama </td>       
         <td colspan="2"><?=form_input('company',$company,'style="width:250px" id=company');?>
         	Aktif <?=form_radio('active',1,$active=='1'?TRUE:FALSE);?>Yes 
		  	<?php echo form_radio('active',0,$active=='0'?TRUE:FALSE);?>No
         </td>
  </tr>
</table>
<div class="easyui-tabs" style="height:350px">
	<div title="General" style="padding:10px">
		<table>
       <tr>
         <td>Alamat</td>
         <td colspan="6"><?php echo form_input('street',
                        $street,'style="width:350px"');?></td>
       </tr>
	   <tr>
	     <td>&nbsp;</td>
	   
	     <td colspan="6"><?php echo form_input('suite',
                        $suite,'style="width:350px"');?></td>
       </tr>
	<tr><td>Kontak</td><td colspan=3>
         	<?=form_input("salutation",$salutation,"style='width:40px'")
         	.form_input("first_name",$first_name)
			.form_input("middle_initial",$middle_initial,"style='width:50px'")
			.form_input("last_name",$last_name);?></td>
	</tr>
	<tr>
         <td>Email</td><td colspan=3><?=form_input('email',$email,'style="width:350px"');?></td>
  	</tr>
  	<tr>
         <td>Kota</td><td><?php echo form_input('city',$city);?></td>
         <td>Kode Pos</td><td><?php echo form_input('zip_postal_code',$zip_postal_code);?></td>
       </tr>
       <tr>
         <td>Telphon</td>
         <td><?php echo form_input('phone',$phone);?></td>
         <td>Faximile</td>
         <td><?php echo form_input('fax',$fax);?></td>
  		</tr>
  		<tr>
         <td>Wilayah</td><td><?php echo form_input('region',$region);?></td>
         <td>Negara</td><td><?php echo form_input('country',$country);?></td>
       </tr>
      </table>
      </div>
	<div title="Sales" style="padding:10px">
		<table>
			<tr><td>Kelompok </td>
			 <td><?php echo form_input('customer_record_type',$customer_record_type);?></td>
			 <td>Sales Type/Price List</td><td><?=form_input('pricing_type',$pricing_type);?></td>
			</tr>
			<tr><td>Salesman</td><td>
			<? 
				echo form_dropdown('salesman',$salesman_list,$salesman);
			?></td>
			 <td>Termin Jual</td><td><?=form_dropdown('payment_terms',$termin_list,$payment_terms);?></td>
			 </tr>
			 <tr>
				<td>Credit Limit</td><td><?=form_input('credit_limit',$credit_limit);?></td>
			 <td>Credit Balance</td><td><?=form_input('credit_balance',$credit_balance);?></td>
		   </tr>
		   <tr>
			<td>Discount %</td><td><?=form_input('discount_percent',$discount_percent);?></td>
			<td>Mark Up %</td><td><?=form_input('markup_percent',$markup_percent);?></td>
		   </tr>
		   <tr>
			 <td>Akun Piutang </td>
			 <td colspan="6"><?=form_input('finance_charge_acct',$finance_charge_acct,"id='finance_charge_acct' style='width:300px'");?>
				<?=link_button("","lookup_coa('finance_charge_acct')","search")?>
			 </td>
		   </tr>
		   <tr>
			<td>Catatan</td><td colspan='6'><?=form_input('comments',$comments,"style='width:300px'");?></td>
		   </tr>
		   <tr>
			<td>Kirim Via</td><td><?=form_input('shipped_via',$shipped_via);?></td>
			<td>NPWP</td><td><?=form_input('npwp',$npwp);?></td>
			</tr>       	
		</table>
	</div>

   </form>

<!-- SHIPTO -->
	<div title="Ship To" style="padding:10px">
		<table id="dgShipTo" class="easyui-datagrid" 
			data-options="iconCls: 'icon-edit',singleSelect: true,width: '100%',toolbar: '#tbShipTo',
				url: '<?=base_url()?>index.php/customer/list_shipto/<?=$customer_number?>'">
			<thead>
				<tr>
					<th data-options="field:'location_code', width:'80'">Kode</th>
					<th data-options="field:'alamat', width:'200'">Alamat</th>
					<th data-options="field:'kota', width:'80'">Kota</th>
					<th data-options="field:'kode_pos', width:'80'">Kode Pos</th>
					<th data-options="field:'telp', width:'80'">Telp</th>
					<th data-options="field:'fax', width:'80'">Fax</th>
					<th data-options="field:'contact', width:'80'">Kontak</th>
					<th data-options="field:'id',align:'right', width:'80'">Line</th>
				</tr>
			</thead>
		</table>
	</div>
<!-- CARDS -->				
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
			style="min-height:700px"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,  width: '100%',
				url: '',toolbar:'',
			">
			<thead>
				<tr>
					<th data-options="field:'no_bukti',width:100">Nomor</th>
					<th data-options="field:'tanggal',width:80">Tanggal</th>
					<th data-options="field:'jenis',width:80,align:'left',editor:'text'">Jenis</th>
					<th data-options="field:'jumlah',width:80,align:'right',editor:{type:'numberbox',options:{precision:2}}">Jumlah</th>
					<th data-options="field:'saldo',width:80,align:'right',editor:{type:'numberbox',options:{precision:2}}">Saldo</th>
				</tr>
			</thead>
		</table>
		
	</div>

    
</div>   

 
<div id="tbShipTo">
	<?=link_button('','add_shipto()','add')?>
	<?=link_button('','edit_shipto()','edit')?>
	<?=link_button('','del_shipto()','remove')?>
</div>

<?=load_view('gl/select_coa_link')?> 
 
  	
<div id='divShipTo'class="easyui-dialog" style="width:400px;padding: 10px" 
	closed="true" buttons="#divShipToButtons">
	<form id='frmShipTo' method='post'><table>
		<tr><td>Location Code</td><td><input type='text' name='location_code' id='location_code'></td></tr>
		<tr><td>Alamat</td><td><input type='text' name='alamat' style="width:300px"></td></tr>
		<tr><td>Kota</td><td><input type='text' name='kota'></td></tr>
		<tr><td>Kode Pos</td><td><input type='text' name='kode_pos'></td></tr>
		<tr><td>Telp</td><td><input type='text' name='telp'></td></tr>
		<tr><td>Fax</td><td><input type='text' name='fax'></td></tr>
		<tr><td>Kontak</td><td><input type='text' name='contact'></td></tr>
	</form></table>
</div>
<div id="divShipToButtons">
	<?=link_button('Save','add_shipto_save()','save')?>
	<?=link_button('Close','add_shipto_close()','back')?>
</div>   

<script>
	function add_shipto(){
		$('#divShipTo').dialog('open').dialog('setTitle','Tambah Ship To');
	}
	function add_shipto_close(){
		$('#divShipTo').dialog('close');
	}
	function add_shipto_save(){
  		if($('#customer_number').val()==''){alert('Isi kode pelanggan !');return false;}
  		url='<?=base_url()?>index.php/customer/shipto_add/<?=$customer_number?>';
  		$("#frmShipTo").form('submit',{
  			url:url,
  			onSubmit:function(){return $(this).form('validate');},
  			success:function(result){
  				var result=eval('('+result+')');
		  		if(result.success){
		  			add_shipto_close();
		  			$('#dgShipTo').datagrid('reload'); 
		  		} else {$.messager.show({title:'Error',msg:result.msg});}
	  		}
  		});	
	}
	function del_shipto(){
			var row = $('#dgShipTo').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this line?',function(r){
					if (r){
						url='<?=base_url()?>index.php/customer/shipto_del';
						$.post(url,{line_number:row.id},function(result){
							if (result.success){
								$('#dgShipTo').datagrid('reload');	// reload the user data
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
  	function save(){
  		 
		event.preventDefault(); 
  		if($('#customer_number').val()==''){alert('Isi kode pelanggan !');return false;}
  		if($('#company').val()==''){alert('Isi nama pelanggan !');return false;}
		url='<?=base_url()?>index.php/customer/save';
			$('#myform').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$("#mode").val("view");
						log_msg('Data sudah tersimpan.');
					} else {
						log_err(result.msg);
					}
				}
			});
  	}	
	function search_cards()
	{
		var d1=$("#date_from").datebox('getValue');
		var d2=$("#date_to").datebox('getValue');
	 
		var xurl='<?=base_url()?>index.php/customer/kartu_piutang/<?=$customer_number?>?d1='+d1+'&d2='+d2;
		console.log(xurl);
		$('#dgCard').datagrid({url:xurl});
		$('#dgCard').datagrid('reload');
	}
	
</script>	
   