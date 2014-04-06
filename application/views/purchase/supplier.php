<div class="col-sm-6 col-md-8"><h1>MASTER SUPPLIER<div class="thumbnail">
	<?
	echo link_button('Save', 'save()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/supplier/add');		
	echo link_button('Search','','search','true',base_url().'index.php/supplier');		
	
	?>
</div></H1>
<div class="thumbnail">	
<form id="myform"  method="post">
<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
<?php echo validation_errors(); ?>
<table>
	<tr>
		<td >Supplier Number</td><td >
		<?php
		if($mode=='view'){
			echo $supplier_number;
			echo form_hidden('supplier_number',$supplier_number,"id=supplier_number");
		} else { 
			echo form_input('supplier_number',$supplier_number,"id=supplier_number");
		}		
		?></td>
	</tr>	 
	<tr>
	  <td>Supplier Name</td>
	  <td><?php echo form_input('supplier_name',$supplier_name,'style="width:150px"');?></td>
	</tr>
	<tr>
	  <td>Alamat</td>
	  <td><?php echo form_input('street',$street,'style="width:300px"');?></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><?php echo form_input('suite',$suite,'style="width:300px"');?></td>
	</tr>
	<tr>
	  <td>Aktif</td>
	  <td><?=form_radio('active',1,$active=='1'?TRUE:FALSE);?>
	    Yes <?php echo form_radio('active',0,$active=='0'?TRUE:FALSE);?> No </td>
	</tr>
	<tr>
	  <td>Email</td>
	  <td><?php echo form_input('email',$email);?></td>
	</tr>
	<tr>
	  <td>Kota</td>
	  <td><?php echo form_input('city',$city);?></td>
	</tr>
	<tr>
	  <td>Telpon</td>
	  <td><?php echo form_input('phone',$phone);?></td>
	</tr>
	<tr>
	  <td>Fax</td>
	  <td><?php echo form_input('fax',$fax);?></td>
	</tr>
	<tr>
	  <td>Kelompok Supplier </td>
	  <td><?php echo form_dropdown('type_of_vendor',$type_of_vendor_list,$type_of_vendor);?></td>
	</tr>
	<tr>
	  <td>Akun Hutang </td>
	  <td><?php echo form_dropdown('supplier_account_number',
                 $akun_list,$supplier_account_number);?></td>
	</tr>
	<tr>
	  <td>Akun Biaya </td>
	  <td><?php echo form_dropdown('acc_biaya',$akun_list,$acc_biaya);?></td>
	</tr>
	<tr>
	  <td>Termin</td>
	  <td><?php echo form_dropdown('payment_terms',$terms_list,$payment_terms);?></td>
	</tr>	 
   </table>
   </form>
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
</script>	
     