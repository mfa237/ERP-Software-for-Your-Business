<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
<head><title>MaxOn ERP Online Demo</title>
<?
echo $library_src;
echo $script_head;
?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>themes/standard/style_login.css" />
<script languange="javascript">
    function login(){
    	$("#lblMessage").html("Please wait...");
		url='<?=base_url()?>index.php/login/verify';
			$('#frmLogin').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						window.open("index.php","_self");
					} else {
						$("#lblMessage").html(result.msg);
					}
				}
			});
    }
</script>
 
       
</head>
<body>
<div class="container">
	<div class="row">    
			       <form name="frmLogin" id="frmLogin" method="post">
			            <label for="username">Username:</label>
			            <input type="text" size="20" id="user_id" name="user_id" style="width:220px"/>
			            <div class="clear"></div>
			            <label for="password">Password:</label>
			            <input type="password" size="20" id="passowrd" name="password"/>
			            <div class="clear"></div>
			            
			            <div class="clear"></div>
			            
			            <br>
			            <input type="button" value="Submit" onclick="login()" style="margin: -20px 0 0 287px;" class="button" >
			            
					    <div id="lblMessage" style="color:red"></div>
		      	 </form>      	
			      	
 
 	</div>
</div>   
</body>
<?
//echo $library_src;
//echo $script_head;
?>
