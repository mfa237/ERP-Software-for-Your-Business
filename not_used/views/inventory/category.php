<div class='row'>
   <legend>Inventory Categories</legend>
   	<?php 
		$error=validation_errors();
	    if($error)echo "<p class='alert alert-warning'>$error</p>";    
   		if($mode=='view'){
			echo form_open('category/update','id=myform');
			$disabled='disable';
		} else {
			$disabled='';
   			echo form_open('category/add','id=myform'); 
   		}
		if($mode=='view'){
			echo $kode;
			echo form_hidden('kode',$kode);
		} else { 
			echo my_input_2("Kode","kode",$kode);
		}
		echo my_input_2("Category","category",$category);
		echo my_input_2("Sales Disc %","sales_disc_prc",$sales_disc_prc);
		echo my_button_submit();
		echo form_close();
	?>
</div>