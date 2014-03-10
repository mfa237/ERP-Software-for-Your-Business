<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>     
    <link href="<?php echo base_url();?>/themes/standard/style_print.css" rel="stylesheet">
   <title><?php  echo $caption; ?></title>
 </head>
 
 <body>
 <div id='container'>
   <div class='box6'>
    <?=$header?> 
   <h1 style="text-align: center"><?php echo $caption?></H1>
   <?php echo $content?>	
	  
    </div>
      
   </div>
     
 </body>
</html>

