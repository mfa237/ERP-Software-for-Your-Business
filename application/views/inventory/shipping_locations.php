<div><legend>MASTER GUDANG</legend>
<div class="thumbnail box-gradient">
	<?
	echo link_button('Add','','add','true',base_url().'index.php/shipping_locations/add');		
	echo link_button('Save', 'simpan()','save');		
	echo link_button('Search','','search','true',base_url().'index.php/shipping_locations');		
	echo link_button('Help', 'load_help(\'shipping_locations\')','help');		
	?>
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help('shipping_locations')">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
</div>
<div class="thumbnail">	
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
 
   <table class="table2" width="100%">
	<tr>
		<td>Gudang</td><td>
		<?php
		if($mode=='view'){
			echo $location_number;
			echo form_hidden('location_number',$location_number,"id=location_number");
		} else { 
			echo form_input('location_number',$location_number,"id=location_number");
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Jenis Gudang</td><td><?php echo form_input('address_type',$address_type);?></td>
       </tr>
       <tr>
            <td>Alamat</td><td><?php echo form_input('street',$street,"style='width:400px'");?></td>
       </tr>
       <tr>
            <td>Kota</td><td><?php echo form_input('city',$city);?></td>
       </tr>
       <tr>
            <td>Kontak Person</td><td><?php echo form_input('attention_name',$attention_name);?></td>
       </tr>
	 
   </table>
 </div>
 
 <script language="JavaScript">
 	function simpan(){
 		if($("#location_number")=="")alert("Isi kode gudang !");
 		$("#myform").submit();
 		
 	}
 </script>
 