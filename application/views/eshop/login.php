<div class="row-fluid" >
	<div class="col-sm-3 box-left panel panel-primary">
		<ol class="breadcrumb box-bcum">
		  <li><a  class='glyphicon glyphicon-home'
		  href="<?=base_url()?>index.php/eshop/home"> Home</a></li>
		  <li class="active">Login</li>
		</ol>
	</div>
	<div class="col-sm-9">
		<h1>USER LOGIN</h1>
		<p>Sebelum memasukan data transaksi kedalam sistim silahkan isi 
		username dan password anda dengan benar dibawah ini.</p>
		  <form class="form" id='frmLogin' method='post'>
			<div class="form-group">
			  <label>Username</label>
			  <input name='cust_id' id='cust_id' type="text" class="form-control" placeholder="Enter your username">
			</div>
			<div class="form-group">
			  <label>Password</label>
			  <input name='cust_pass' id='cust_pass' type="password" class="form-control" placeholder="Enter your password">
			</div>
		  </form>
		
		<a href="#" onclick='login3();return false;' 
		class='btn btn-primary'>LOGIN</a>
		
		<div id='message'></div>
	</div>
</div>
<script language='javascript'>
function login3(){
  		if($('#cust_id').val()==''){alert('Isi username !');return false;}
  		if($('#cust_pass').val()==''){alert('Isi password !');return false;}
		url='<?=base_url()?>index.php/eshop/login/verify';
			$('#frmLogin').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						window.open("<?=base_url()?>index.php/eshop/cart","_self");
					} else {
						alert(result.message);
					}
				}
			});
	
}
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/eshop/eshop.css">
