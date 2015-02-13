<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 <script type="text/javascript">
   		CI_ROOT = "<?=base_url()?>index.php/";
		CI_BASE = "<?=base_url()?>"; 		
</script>

<head><title>MaxOn ERP Online Demo</title></head>
<body>
<?
date_default_timezone_set("Asia/Jakarta");
echo $library_src;
echo $script_head;
?>

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
	<div class="row thumbnail" style='background-color:lightgray'>
		<div class='col-md-12'>
		<?
			//if(!isset($file_content)){
				$this->load->view("slider");
			//}
		?></div>	
	</div>
	<div class="row col-md-9" style="padding-left:10px;padding-right:10px">
		<? 
			if(isset($file_content)){
				$this->load->view($file_content);
				if(!isset($id))$id=0;
			echo '<p>&nbsp;</p><p>&nbsp;</p>
				<div style="background-color:#FFFFFF;width:480px">
					<div class="fb-comments"
					data-href="'.base_url().'index.php/articles/view_article/'.$id.'"
					 data-width="470" data-num-posts="10">
					 </div>
				</div>';
				
			} else {
				$this->load->view("articles"); 
			}
			
		?>		   
	</div>
	<div class="col-md-3 thumbnail" style="margin-left:10px">
		<? 
			$this->load->view("login_panel");
			$this->load->view("article_cats");
			$this->load->view('google_ads');
		?>
	</div>
		   
<div class='clear'></div>
<div class="wrap box-gradient">
	<? $this->load->view("footer"); ?>
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

<script languange="javascript">

	if(top != self) top.location.replace(location);	//detect if run iframe

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
						window.open(CI_ROOT,"_self");
					} else {
						$("#lblMessage").show();
						$("#lblMessage").html(result.msg);
					}
				}
			});
    }
</script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	  $('.flexslider').flexslider({
	    animation: "slide"
	  });
});
//]]>
</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '379010302273216',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


