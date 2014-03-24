<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>     
   <link href="<?php echo base_url();?>/themes/standard/style_print.css" rel="stylesheet">
   <title><?php  echo $caption; ?></title>
 </head>
 
 <body>
 	<div id='hd' style="border-bottom:#95B8E7 5px solid;height:100px">
	   	<div id='hd_left' style="float:left;margin:10px;width:50%">
	    	<?=$header?> 
	    </div>
	    <div id='hd_right' style="float:left;margin:10px">
	   		<h1><?php echo $caption?></H1>
	   	</div>
   	</div>
   	<div>
   		<?php echo $content?>		  
    </div>      
 </body>
</html>

