
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Data Nama Perusahaan</title>
 
 </head>
 <body>
 <div id='container'>
  
   <?php echo validation_errors(); ?>
   <?php 
   		if($mode=='view'){
			echo form_open('company/update');
			$disabled='disable';
		} else {
			$disabled='';
   			echo form_open('company/add'); 
   		}
		
   ?> 
     <div class='box6'><h1>DATA MASTER PERUSAHAAN</H1>
   <table>
	<tr>
		<td>Kode</td><td>
		<?php
		if($mode=='view'){
			echo $company_code;
			echo form_hidden('company_code',$company_code);
		} else { 
			echo form_input('company_code',$company_code);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Nama</td><td><?php echo form_input('company_name',$company_name,
            'style="width:200px"');?></td>

       </tr>
	<tr>	 
		<td>Alamat</td><td><?php echo form_input('street',
                        $street,'style="width:300px"');?></td>		 
	</tr>
	<tr><td>Kota</td><td><?php echo form_input('city_state_zip_code',
                        $city_state_zip_code,'style="width:300px"');?></td></tr>
	<tr><td>Telp</td><td><?php echo form_input('phone_number',
                        $phone_number);?></td></tr>
	<tr><td>Fax</td><td><?php echo form_input('fax_number',
                        $fax_number);?></td></tr>
	<tr><td>Email</td><td><?php echo form_input('email',
                        $email);?></td></tr>
      	
	 <tr><td><input type="submit" value="Save"/></td><td>&nbsp;</td></tr>
   </table>
   </form>
   </div>
 </body>
</html>

