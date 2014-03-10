<script src="<?=base_url();?>js/lib.js"></script>
<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('banks/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('banks/add','id=myform name=myform'); 
    }
?>

   <div class='box6x'><h1>BANK ACCOUNTS</h1>
   <table>
	<tr>
		<td>Rekening</td><td>
		<?php
		if($mode=='view'){
			echo $bank_account_number;
			echo form_hidden('bank_account_number',$bank_account_number);
		} else { 
			echo form_input('bank_account_number',$bank_account_number);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Nama Bank</td><td><?php echo form_input('bank_name',$bank_name);?></td>
       </tr>
       <tr>
            <td>Jenis_bank</td><td><?php echo form_input('type_bank',$type_bank);?></td>
       </tr>
       <tr>
            <td>Alamat</td><td><?php echo form_input('street',$street);?></td>
       </tr>
       <tr>
            <td>Kota</td><td><?php echo form_input('city',$city);?></td>
       </tr>
       <tr>
            <td>Telp</td><td><?php echo form_input('phone_number',$phone_number);?></td>
       </tr>
 	 
	 <tr><td>
            <a href="#" class="easyui-linkbutton" 
                  data-options="iconCls:'icon-save'"
                  onclick='save_this()'
                  >Save</a>	 
	 </td><td>&nbsp;</td></tr>
   </table>
<?
echo form_close();
?>
<script type="text/javascript">
    function save_this(){
        if($('#bank_account_number').val()===''){alert('Isi dulu kode bank !');return false;};
        if($('#bank_name').val()===''){alert('Isi dulu nama bank !');return false;};
        $('#myform').submit();
    }
</script>  

 