
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head><title>MaxOn ERP Online Demo</title>
<?
	echo $library_src;
	echo $script_head;
?> 
<script languange="javascript">
    $(document).ready(function(){
    	/*
        $('#frmLogin').submit(function () {
        	$('#lblMessage').html("<h1>Please Wait...</h1>");
            url= 'index.php/login/verify';
            $.post(url, $('#frmLogin').serialize(), 
            function (data, textStatus) {
            	alert(data);
                if($.trim(data)=='error'){
                    $('#lblMessage').html('</br><div style="color:red">User atau password salah !</div>');
                } else {
                    $('#lblMessage').html('</br>Success');
                    window.open('index.php/login/welcome','_self');
                }
            });
            return false;
        });
        */ 
    });
    function login(){
     	$('#lblMessage').html('');
     	$("form#frmLogin").submit();
    }
</script>
 
       
 </head>

 <div id='divlogin' class="easyui-dialog"  title="Form Login" 
            data-options="iconCls:'icon-save',
                buttons: [{
                        text:'Login',
                        iconCls:'icon-ok',
                        handler:function(){
                                login();
                        }
                }]",
            style="width:400px;height:350px;padding:10px"  >
   <h1>Silahkan Login</h1>
   
   <h4>Untuk memulai menggunakan software ini anda diharuskan untuk 
       mengisi userid dan password yang telah diberikan 
       oleh administrator</h4>
   <h3>
       <?php echo form_open('','id="frmLogin"')?>
           <img src="<?=base_url()?>/images/login_logo.png" style="margin:5px"
                width="50" height="50" align="left">
       <div  >
            <label for="username">Username:</label><br/>
            <input type="text" size="20" id="user_id" name="user_id"/>
            <br/>
            <label for="password">Password:</label><br/>
            <input type="password" size="20" id="passowrd" name="password"/>
       </div>
               
     <div id="lblMessage">
      <?php 
        echo $message;
      	echo form_close()
      	
     ?>
     </div>
     
   </h3>
 
 </div>

