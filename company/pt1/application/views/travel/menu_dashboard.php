 <?php
  $CI =& get_instance();
  $fld=base_url().$CI->config->item("parent_folder"); 
  
 ?>
<div class="easyui-tabs" id="tt">	 
	<div title="HOME"><? include_once __DIR__."/../home.php";?></div>
	<script>$().ready(function(){$("#tt").tabs("select","DASHBOARD");});</script>

	<div title="DASHBOARD" style="padding:10px">
		<div class="col-md-12 thumbnail">
		
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/travel/tour">
				<div class='photo'><img src='<?=$fld?>images/applets-screenshooter.png'/></div>
				<div class='detail'>
					<h4>Paket Tour</h4>
					Pemesanan paket tour dan seting data master paket.
				</div>
			</div>

			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/travel/pesawat">
				<div class='photo'><img src='<?=$fld?>images/rocket.png'/></div>
				<div class='detail'>
					<h4>Tiket Pesawat</h4>
					Pembuatan invoice untuk tiket pesawat dan rute kota tujuan
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/travel/kereta">
				<div class='photo'><img src='<?=$fld?>images/tor-icon.png'/></div>
				<div class='detail'>
					<h4>Ticket Kereta</h4>
					Pembuatan invoice untuk pemesanan tiket kereta api
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/travel/bus">
				<div class='photo'><img src='<?=$fld?>images/desktop.png'/></div>
				<div class='detail'>
					<h4>Ticket Bus</h4>
					Pembuatan invoice untuk pemesanan tiket bus atau kendaraan
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/travel/hotel">
				<div class='photo'><img src='<?=$fld?>images/scribus.png'/></div>
				<div class='detail'>
					<h4>Voucher Hotel</h4>
					Pembuatan invoice untuk pemesanan hotel
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/travel/airline">
				<div class='photo'><img src='<?=$fld?>images/rocket.png'/></div>
				<div class='detail'>
					<h4>Airlines</h4>
					Data master airline maskapai penerbangan
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/city">
				<div class='photo'><img src='<?=$fld?>images/ico_setting.png'/></div>
				<div class='detail'>
					<h4>Data Master Kota</h4>
					Data master kota keberangkatan atau kota tujuan
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/customer">
				<div class='photo'><img src='<?=$fld?>images/ico_setting.png'/></div>
				<div class='detail'>
					<h4>Data Master Pelanggan</h4>
					Data master pelanggan
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/country">
				<div class='photo'><img src='<?=$fld?>images/ico_setting.png'/></div>
				<div class='detail'>
					<h4>Data Master Negara</h4>
					Data master negara
				</div>
			</div>
		</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/province">
				<div class='photo'><img src='<?=$fld?>images/ico_setting.png'/></div>
				<div class='detail'>
					<h4>Data Master Provinsi</h4>
					Data master province
				</div>
			</div>
	</div>
</div>



<script  language="javascript">
$().ready(function(){
	//void get_this(CI_ROOT+'purchase_invoice/daftar_kartu_gl','','divGL');
});
	
	
</script>

