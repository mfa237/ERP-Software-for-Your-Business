<div class="col-sm-6 col-md-8"><h1>SALESMAN<div class="thumbnail">
	<?
	echo link_button('Save', 'save_this()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/coa/add');		
	echo link_button('Search','','search','true',base_url().'index.php/coa');		
	
	?>
</div></H1>
<div class="thumbnail">	
<form id="myform"  method="post" action="<?=base_url()?>index.php/salesman/save">
<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
<?php echo validation_errors(); ?>
   <table>
	<tr>
		<td>Salesman</td><td>
		<?php
		if($mode=='view'){
			echo "<h3>$salesman</h3>";
			echo form_hidden('salesman',$salesman,"id=salesman");
		} else { 
			echo form_input('salesman',$salesman,"id=salesman");
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
   </table>
   </form>
    
  
</div>   
<script type="text/javascript">
    function save_this(){
        if($('#salesman').val()===''){alert('Isi dulu kode salesman !');return false;};
        $('#myform').submit();
    }
</script>  

 
 