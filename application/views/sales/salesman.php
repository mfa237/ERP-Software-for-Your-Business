<script src="<?=base_url();?>js/lib.js"></script>
<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('salesman/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('salesman/add','id=myform name=myform'); 
    }
?>

   <div class='box6x'><h1>DAFTAR SALESMAN</h1>
   <table>
	<tr>
		<td>Salesman</td><td>
		<?php
		if($mode=='view'){
			echo $salesman;
			echo form_hidden('salesman',$salesman);
		} else { 
			echo form_input('salesman',$salesman);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Kelompok</td><td><?php echo form_input('salestype',$salestype);?></td>
       </tr>
       <tr>
            <td>Comision Rate 1</td><td><?php echo form_input('commission_rate_1',$commission_rate_1);?></td>
       </tr>
       <tr>
            <td>Commision Rate 2</td><td><?php echo form_input('commission_rate_2',$commission_rate_2);?></td>
       </tr>
 	 
	 <tr><td>
	 <input type="submit" value="Save" class="easyui-linkbutton" 
                   data-options="iconCls:'icon-save'" style="height:30px;width:60px"/>
	 
	 </td><td>&nbsp;</td></tr>
   </table>
   </form>
    

 