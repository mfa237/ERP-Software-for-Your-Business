<script src="<?=base_url();?>js/lib.js"></script>
<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('coa/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('coa/add','id=myform name=myform'); 
    }
?>

   <div class='box6x'><h1>KODE PERKIRAAN</h1>
   <table>
	<tr>
		<td>Kode</td><td>
		<?php
		if($mode=='view'){
			echo $account;
			echo form_hidden('account',$account);
		} else { 
			echo form_input('account',$account);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Nama Perkiraan</td><td><?php echo form_input('account_description',$account_description);?></td>
       </tr>
       <tr>
            <td>Posisi</td><td><?php echo form_radio('db_or_cr','D',$db_or_cr=='0'||$db_or_cr=='');?>Debet
                <?php echo form_radio('db_or_cr','C',!($db_or_cr=='0'||$db_or_cr==''));?>Kredit
            </td>
       </tr>
       <tr>
            <td>Saldo Awal</td><td><?php echo form_input('beginning_balance',$beginning_balance);?></td>
       </tr>
       <tr>
            <td>Jenis</td><td><?php echo form_dropdown( 'account_type',$account_type_list,$account_type);?></td>
       </tr>
       <tr>
            <td>Kelompok</td><td><?php echo form_dropdown( 'group_type',$group_type_list,$group_type);?></td>
       </tr>
       <tr>
            <td>Header/Detail</td><td><?php echo form_radio('h_or_d','H',$h_or_d=='0'||$h_or_d=='');?>Header
                <?php echo form_radio('h_or_d','D',!($h_or_d=='0'||$h_or_d==''));?>Detail
            </td>
       </tr>
 	 
	 <tr><td>
	 <input type="submit" value="Save" class="easyui-linkbutton" 
                   data-options="iconCls:'icon-save'" style="height:30px;width:60px"/>
	 
	 </td><td>&nbsp;</td></tr>
   </table>
   </form>
    

 