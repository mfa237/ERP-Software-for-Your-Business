
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
		<p>Silahkan lakukan konfirmasi pembayaran anda disini</p>

		<form class="form" id='frmMain' method='post'>
			<div class="form-group">
			  <label>Transfer ke rekening</label>
			  <input name='account_number' id='account_number' type="text" class="form-control" placeholder="Isi nomor rekening kami">
			</div>
			<div class="form-group">
			  <label>Tanggal</label><div class='clear'></div>
			  <input value="<?=Date("Y-m-d H:i:s")?>" 
				name='date_paid' id='date_paid' type="text" 
				class="form-control easyui-datetimebox " 
				style='width:200px;height:30px'
				placeholder="Isi tanggal pembayaran">
			  <i>tanggal anda melakukan pembayaran diteller atau atm</i>
			</div>
			<div class="form-group">
			  <label>Jumlah</label>
			  <input name='amount_paid' id='amount_paid' type="text" class="form-control" placeholder="Isi jumlah bayar">
			</div>
			<div class="form-group">
			  <label>Dari Bank</label>
			  <input name='from_bank' id='from_bank' type="text" class="form-control" placeholder="Isi bank anda">
			</div>
			<div class="form-group">
			  <label>Nomor Rekening</label>
			  <input name='from_account' id='from_account' type="text" class="form-control" placeholder="Isi nomor rekening anda">
			  <i>rekening sumber anda, kosongkan bila anda bayar lewat teller</i>
			</div>
			<div class="form-group">
			  <label>Atas Nama</label>
			  <input name='authorization' id='authorization' type="text" class="form-control" >
			</div>
			<div class="form-group">
			  <label>Cabang</label>
			  <input name='credit_card_number' id='credit_card_number' type="text" class="form-control" >
			</div>
		</form>
		
		<a href="#" onclick='frmMain_Save();return false;' 
		class='btn btn-primary'>Submit</a>
		
		<div id='message'></div>
	</div>
</div>
<script language='javascript'>
function frmMain_Save(){
  		if($('#account_number').val()==''){alert('Isi account_number !');return false;}
  		if($('#from_account').val()==''){alert('Isi from_account !');return false;}
		var account_number=$('#account_number').val();
		url='<?=base_url()?>index.php/eshop/cart/confirm_save';
			$('#frmMain').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						alert("Terimakasih data data sudah disimpan. Segera akan kami periksa.");
						window.open("<?=base_url()?>index.php/eshop/home","_self");
					} else {
						alert(result.message);
					}
				}
			});
	
}
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/eshop/eshop.css">
