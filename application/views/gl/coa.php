<div class="col-sm-6 col-md-8"><h1>KODE PERKIRAAN AKUNTANSI<div class="thumbnail">
	<?
	echo link_button('Save', 'save_this()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/coa/add');		
	echo link_button('Search','','search','true',base_url().'index.php/coa');		
	
	?>
</div></H1>
<div class="thumbnail">	
<form id="myform"  method="post" action="<?=base_url()?>index.php/coa/save">
<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
<?php echo validation_errors(); ?>
   <table>
	<tr>
		<td>Kode Perkiraan</td><td>
		<?php
		if($mode=='view'){
			echo "<strong>$account</strong>";
			echo form_hidden('account',$account);
		} else { 
			echo form_input('account',$account);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Nama Perkiraan</td><td><?php echo form_input('account_description',$account_description,"style='width:400px'");?></td>
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
            <td>Jenis Akun</td><td><?php echo form_dropdown( 'account_type',$account_type_list,$account_type);?></td>
       </tr>
       <tr>
            <td>Kelompok Akun</td><td><?php echo form_dropdown( 'group_type',$group_type_list,$group_type);?></td>
       </tr>
       <tr>
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

 
 