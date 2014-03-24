<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('coa_group/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('coa_group/add','id=myform name=myform'); 
    }
?>

   <div><h1>KODE KELOMPOK PERKIRAAN</h1>
   <table>
	<tr>
		<td>Kode Group</td><td>
		<?php
		if($mode=='view'){
			echo $group_type;
			echo form_hidden('group_type',$group_type);
		} else { 
			echo form_input('group_type',$group_type);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Nama Kelompok Perkiraan</td><td><?php echo form_input('group_name',$group_name);?></td>
       </tr>
       <tr>
            <td>Parent Kode Group</td><td><?php echo form_input('parent_group_type',$parent_group_type);?>
            </td>
       </tr>
       <tr>
            <td>Jenis</td><td><?php echo form_dropdown( 'account_type',$account_type_list,$account_type);?></td>
       </tr>
	 <tr><td>
		 <input type="submit" value="Save" class="easyui-linkbutton" 
         data-options="iconCls:'icon-save'" style="height:30px;width:60px"/>
	 </td><td>&nbsp;</td></tr>
   </table>
</form>
    

 