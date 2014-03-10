<script src="<?=base_url();?>js/lib.js"></script>
<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('type_of_payment/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('type_of_payment/add','id=myform name=myform'); 
    }
?>

     <div class='box6x'><h1>KODE TERMIN PEMBAYARAN</H1>
     <table >
	<tr>
		<td>Termin Pembayaran</td>
		<td>
		<?php
		if($mode=='view'){
			echo "<h2>".$type_of_payment."</h2>";
			echo form_hidden('type_of_payment',$type_of_payment);
		} else { 
			echo form_input('type_of_payment',$type_of_payment);
		}		
		?></td>
       </tr>	 
       <tr>
         <td>Discount Percents</td>
         <td><?php echo form_input('discount_percent',$discount_percent);?></td>
       </tr>
       <tr>
         <td>Discount Day</td>
 
         <td><?php echo form_input('discount_days',$discount_days);?></td>
       </tr>
	   <tr>
 
         <td>Day</td>
         <td><?php echo form_input('days',$days);?></td>
	   </tr>
 	 <tr>
	   <td>	<input name="submit" type="submit" class="easyui-linkbutton" style="height:30px;width:60px" value="Save" 
                   data-options="iconCls:'icon-save'"/></td>
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
   

<script>
 