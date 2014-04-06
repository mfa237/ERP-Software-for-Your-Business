<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<head><title>MaxOn ERP Online Demo</title>
<?
echo $library_src;
echo $script_head;
?>
	
<?
	if(!isset($_left_menu_caption))$_left_menu_caption='Left Menu';
	if(!isset($message))$message="";
?> 
<script type="text/javascript">
   		CI_ROOT = "<?=base_url()?>index.php/";
		CI_BASE = "<?=base_url()?>"; 		
</script>
</head>
<body>
<div class="container">
	<div class="row" style="background-repeat:no-repeat; background-image:url('<?=base_url()?>images/header2.jpg')">
		<img src="<?=base_url()?>images/logo_maxon.png">
		<?=$_header?>

	</div>
	<div class="row">
		<div class="col-md-15"style="padding:5px">  
	    <?php echo $_content;?>   
    	</div>
	</div>
</div>  
</body>
