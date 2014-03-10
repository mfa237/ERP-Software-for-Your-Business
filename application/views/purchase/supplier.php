<script src="<?=base_url();?>js/lib.js"></script>
<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('supplier/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('supplier/add','id=myform name=myform'); 
    }
?>
   <h1>MASTER SUPPLIER</H1>

   <table width="100%">
	<tr>
		<td >Supplier Number</td><td >
		<?php
		if($mode=='view'){
			echo $supplier_number;
			echo form_hidden('supplier_number',$supplier_number);
		} else { 
			echo form_input('supplier_number',$supplier_number);
		}		
		?></td>
	</tr>	 
	<tr>
	  <td>Supplier Name</td>
	  <td><?php echo form_input('supplier_name',$supplier_name,
		'style="width:150px"');?></td>
	 
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
	 <tr><td> 
	   <input name="submit" type="submit" class="easyui-linkbutton" style="height:30px;width:60px" value="Save" 
                   data-options="iconCls:'icon-save'"/>
	 </a></td><td>&nbsp;</td></tr>
   </table>
   </form>
  
   
  