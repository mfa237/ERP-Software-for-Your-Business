<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('customer/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('customer/add','id=myform name=myform'); 
    }
?>

     <div class='box6x'><h1>DATA MASTER PELANGGAN</H1>
     <table >
	<tr>
		<td>Kode Pelanggan</td>
 
		<td>
		<?php
		if($mode=='view'){
			echo "<h2>".$customer_number."</h2>";
			echo form_hidden('customer_number',$customer_number);
		} else { 
			echo form_input('customer_number',$customer_number);
		}		
		?></td>
  </tr><tr>
         <td>Nama / Perusahaan </td>
       
         <td colspan="4"><?=form_input('company',$company,'style="width:250px"');?></td>
       </tr>
       <tr>
         <td>Alamat</td>
        
         <td colspan="6"><?php echo form_input('street',
                        $street,'style="width:250px"');?></td>
       </tr>
	   <tr>
	     <td>&nbsp;</td>
	   
	     <td colspan="6"><?php echo form_input('suite',
                        $suite,'style="width:250px"');?></td>
       </tr>
     <tr>
	  <td>Aktif</td>
	 
	  <td><?=form_radio('active',1,$active=='1'?TRUE:FALSE);?>
Yes <?php echo form_radio('active',0,$active=='0'?TRUE:FALSE);?>No </td>
	  
  </tr><tr>
         <td>Email</td>
         
         <td><?php echo form_input('email',$email);?></td>
	  
  </tr><tr>
         <td>Kota</td>
        
         <td><?php echo form_input('city',$city);?></td>
       </tr>
       <tr>
         <td>Telphon</td>
         <td><?php echo form_input('phone',$phone);?></td>
  </tr><tr>
         <td>Faximile</td>
         <td><?php echo form_input('fax',$fax);?></td>
  </tr><tr>
         <td>Wilayah</td>        
         <td><?php echo form_input('region',$region);?></td>

       </tr>
       <tr>
         <td>Kelompok </td>
      
         <td><?php echo form_input('customer_record_type',$customer_record_type);?></td>
  </tr><tr>
         <td>Salesman</td>
         
         <td><?php echo form_input('salesman',$salesman);?></td>
    
  </tr><tr>
         <td>Termin </td>
    
         <td><?php echo form_dropdown('payment_terms',$termin_list,$payment_terms);?></td>
       </tr>
       <tr>
         <td>Akun Piutang </td>
        
         <td colspan="6"><?php echo form_dropdown('finance_charge_acct',
                 $akun_list,$finance_charge_acct);?></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>	
	 <tr>
	   <td><input  name="submit" type="submit" 
	      class="easyui-linkbutton"
	   	  style="height:30px;width:60px" value="Save" 
                   data-options="iconCls:'icon-save'"/></td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
	 <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
   </table>
   </form>
   
 
 