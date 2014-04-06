<div class="col-sm-6 col-md-8"><h1>MASTER REKENING<div class="thumbnail">
	<?
	echo link_button('Save', 'save_this()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/banks/add');		
	echo link_button('Search','','search','true',base_url().'index.php/banks');		
	
	?>
</div></H1>
<div class="thumbnail">	
<form id="myform"  method="post" action="<?=base_url()?>index.php/banks/save">
<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
<?php echo validation_errors(); ?>
<table>
	<tr>
		<td>Kode/Nomor Rekening Bank</td><td>
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
            <td>Jenis Bank</td><td><?php echo form_dropdown('type_bank',array("Bank","Kas"),$type_bank);?></td>
       </tr>
       <tr>
            <td>Alamat</td><td><?php echo form_input('street',$street,"style='width:400px;'");?></td>
       </tr>
       <tr>
            <td>Kota</td><td><?php echo form_input('city',$city);?></td>
       </tr>
       <tr>
            <td>Telp</td><td><?php echo form_input('phone_number',$phone_number);?></td>
       </tr>

   </table>
</form>
</div>   
<script type="text/javascript">
    function save_this(){
        if($('#bank_account_number').val()===''){alert('Isi dulu kode bank !');return false;};
        if($('#bank_name').val()===''){alert('Isi dulu nama bank !');return false;};
        $('#myform').submit();
    }
</script>  

 