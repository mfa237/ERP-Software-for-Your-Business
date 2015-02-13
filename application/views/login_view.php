<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
<head><title>MaxOn ERP Online Demo</title>
<?
echo $library_src;
echo $script_head;
?>
<script languange="javascript">

	if(top != self) top.location.replace(location);	//detect if run iframe

    function login(){
    	$("#lblMessage").html('<?=lang("wait")?>');
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
						$("#lblMessage").show();
						$("#lblMessage").html(result.msg);
					}
				}
			});
    }
</script>
 
       
</head>
<body>
 
<div class="container-fluid">
	<div class="row" style="padding:10px">
		<div class="col-md-2">
			<a href='<?=base_url()?>index.php'>
			<img src="<?=base_url()?>images/logo_maxon.png" style="float:left"></a>
		</div>
		<div class="col-md-10">
			<p>MaxOn adalah sebuah software yang membantu anda 
			membuat transaksi-transaksi yang ada di perusahaan, meliputi transaksi penjualan, 
			pembelian, hutang, piutang, stock, aktiva, buku kas, akuntansi dan lain sebagainya.</p>
		</div>
	</div>
	<div class="row thumbnail" style='background-color:black'>
		<div class='col-md-12'><? include "slider.php" ?></div>	
	</div>
	<div class="row col-md-8" style="padding-left:10px;padding-right:10px">
		<?
			$category="home";
			$found_article=false;
			include_once "articles.php";
			if(! $found_article) {
				include_once "home_default.php";
			}
		?>
		   
	</div>
	<div class="row col-md-4 thumbnail" style="margin-left:10px">
		<? include_once "login_panel.php"; ?>
		<? include_once "article_cats.php"; ?>			
		<? $this->load->view('google_ads'); ?>

	</div>
		   
<div class='clear'></div>
<div class="wrap box-gradient">
            <div id="footer" class="footer box-gradient">
            	<div >
                	<div class="row">
                		<div class="col-md-3">
                        	<div class="foot_logo"><a href="index.html"><img src="images/logo_maxon.png" alt=""></a></div>    
                        	<div class="copyright">© 2020 MaxOn Enterprise Resource Application. All Rights Reserved.</div>                        
                        </div>
                        <div class="col-md-7">
							<div style="float:right;">
								<a href="http://www.facebook.com/maxon51" target="_new" title="Follow Facebook">
										<img src="images/fb.png"></a>
								<a href="http://www.twitter.com/talagasoft" target="_new" title="Follow Twitter">
									<img src="images/twitter.png">
								</a>
							</div> 
                        </div>
                    </div>	
                </div>
            </div>
</div>
		
</div>   
  
		
</body>
<style>
.footer {
	
}
body {
	background-color: white;
}
</style>
<?
//echo $library_src;
//echo $script_head;
?>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	  $('.flexslider').flexslider({
	    animation: "slide"
	  });
});


//]]>
</script>

