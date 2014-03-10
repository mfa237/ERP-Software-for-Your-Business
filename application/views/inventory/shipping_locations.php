
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Data Master Gudang</title>
 
 </head>
 <body>
     <script>
//$(document).ready(function(){
//  $('#myform').submit(function(event) {
//    var form = $(this);
//    $.ajax({
//      type: form.attr('method'),
//      url: form.attr('action'),
//      data: form.serialize()
//    }).done(function(msg) {     
//      //$('#main_content').html(msg);
//      $('#dlg').dialog('close');
//      $.messager.alert('Info','Success !')
//    }).fail(function(jqXHR, textStatus, errorThrown) {
//        console.log(jqXHR.responseText);
//        $.messager.alert('Info','Error !')
//    });
//    event.preventDefault(); // Prevent the form from submitting via the browser.
//  });
//});         
 </script>
 <div id='containerx'>
   <?php echo validation_errors(); ?>
   <?php 
   		if($mode=='view'){
			echo form_open('shipping_locations/update','id=myform');
			$disabled='disable';
		} else {
			$disabled='';
   			echo form_open('shipping_locations/add','id=myform'); 
   		}
		
   ?>
   <div class='box6x'><h1>KODE GUDANG</h1>
   <table>
	<tr>
		<td>Gudang</td><td>
		<?php
		if($mode=='view'){
			echo $location_number;
			echo form_hidden('location_number',$location_number);
		} else { 
			echo form_input('location_number',$location_number);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Jenis Gudang</td><td><?php echo form_input('address_type',$address_type);?></td>
       </tr>
       <tr>
            <td>Alamat</td><td><?php echo form_input('street',$street);?></td>
       </tr>
       <tr>
            <td>Kota</td><td><?php echo form_input('city',$city);?></td>
       </tr>
       <tr>
            <td>Kontak Person</td><td><?php echo form_input('attention_name',$attention_name);?></td>
       </tr>
	 
        
	 <tr><td>
	 <input type="submit" value="Save" class="easyui-linkbutton" 
                   data-options="iconCls:'icon-save'" style="height:30px;width:60px"/>
	 
	 </td><td>&nbsp;</td></tr>
   </table>
   </form>
   </div>
 </body>
</html>

