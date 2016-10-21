<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<head><title>MaxOn ERP Online Demo</title>
</head>
<script type="text/javascript">
   		CI_ROOT = "<?=base_url()?>index.php/";
		CI_BASE = "<?=base_url()?>"; 		
</script>

<BODY style='background-image:url("<?=base_url()?>images/back2.jpg")'> 
<div class="container " >
	<div class="row ">		 
			<div class="panel panel-primary"  style="margin:5px;border:0px solid white">
				<div class="panel-heading">
					<h3 class="panel-title   glyphicon glyphicon-bookmark"  style="padding:10px;color:white"> USER LOGIN</h3>
				</div>
				<div class="panel-body"  >
						<p>Untuk mulai menggunakan software ini anda diharuskan login terlebih dahulu, 
						silahkan isi userid dan password yang benar dibawah ini :</p>
						<form name="frmLogin" id="frmLogin" method="post" role="form" 
						action="<?=base_url()?>index.php/login/verify">
							<div class="form-group glyphicon glyphicon-user">
								<label for="username">Username:</label>
								<input  class="form-control" type="text" id="user_id" name="user_id" placeholder="Username">
							</div>
							<div class="form-group glyphicon glyphicon-qrcode">
								<label for="password">Password:</label>								 
								<input class="form-control" type="password" id="password" name="password" placeholder="Password"/>
								 
							</div>
							<div>
								<i  class="small" >Untuk mencoba gunakan login user : admin, password: admin</i>
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit" value="Login" style="height:30px">
								<?php if ($message!="") { ?>
								<div id="lblMessage" class="alert alert-danger" style="margin-top:10px">
									<?php echo $message; ?>
								</div>
								<?php }; ?>
							</div>
						</form>      	
				</div>	 
			</div>
		 
    </div>
 
	<div class="row">
		<div class="panel panel-primary"  style="margin:5px;border:0px solid white">
		<div class='panel-body'>
		<img src="<?=base_url()?>images/logo_maxon.png" style="float:left">
		<div class="copyright" style='font-size:12px'>Copyright © 2000-2020 <br>MaxOn Enterprise Resource Application. 
		<br>All Rights Reserved.<br>http://www.talagasoft.com</div>                        
		</div>
		</div>
	</div>	
</div>   
   
		
</BODY>
<style>
 
.container {
	max-width: 430px;
	padding-top: 5%;
	margin: auto auto;
}
</style> 
<?
//echo $library_src;
//echo $script_head;
?>
<script type="text/javascript" charset="utf-8" src="<?=base_url()?>/assets/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url()?>/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/bootstrap-3.3.5/css/bootstrap.min.css">

<script languange="javascript">

	if(top != self) top.location.replace(location);	//detect if run iframe

    function loginx(){
    	$("#lblMessage").html("Please wait...");
//		loading();
		url='<?=base_url()?>index.php/login/verify';
			$('#frmLogin').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
//					loading_close();
					var result = eval('('+result+')');
					
					if (result.success){
						window.open("<?=base_url()?>index.php","_self");
					} else {
						$("#lblMessage").show();
						$("#lblMessage").html(result.msg);
					}
				}
			});
    }
</script>