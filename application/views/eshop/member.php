<div class="row-fluid" >
	<div class="col-sm-3 box-left  panel panel-primary">
		<ol class="breadcrumb box-bcum">
		  <li><a  class='glyphicon glyphicon-home'
		  href="<?=base_url()?>index.php/eshop/home"> Home</a></li>
		  <li class="active">Member</li>
		</ol>
	</div>
	<div class="col-sm-9">
		<h1><?=$caption?></h1>
		<p>Selamat datang dan selamat bergabung di toko online kami</p>
		<p>Silahkan isi informasi pendaftaran dibawah ini, sebelum anda 
		membuat transaksi pembelian dan pemesanan barang.</p>
		<?=load_view("eshop/member_form");?>		
	</div>
</div>
<script language='javascript'>
function frmMain_Save(){
  		if($('#customer_number').val()==''){alert('Isi username !');return false;}
  		if($('#company').val()==''){alert('Isi nama anda !');return false;}
		var cust_id=$('#customer_number').val();
		url='<?=base_url()?>index.php/eshop/member/save';
			$('#frmMain').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						alert("Terimakasih data keanggotaan sudah tersimpan, silahkan login.");
						window.open("<?=base_url()?>index.php/eshop/login","_self");
					} else {
						alert(result.message);
					}
				}
			});
	
}
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/eshop/eshop.css">
