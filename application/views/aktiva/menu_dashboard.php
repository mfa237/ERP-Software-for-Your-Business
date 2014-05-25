 <?
  $CI =& get_instance();
 ?>
 <script type="text/javascript" src="<?=base_url()?>assets/maphilight-master/jquery.maphilight.min.js"></script>
<div class="easyui-tabs" id="tt">	 
	<div title="DASHBOARD" style="padding:10px">
		<div class="col-md-12 thumbnail">

		<div class="thumbnail">
			<img src="<?=base_url()?>images/aktiva.png" usemap="#mapdata" class="map">
			<map id="mapdata" name="mapdata">
<area shape="circle" alt="Aktiva Tetap" coords="120,92,29" href="<?=base_url()?>index.php/aktiva"  
		class="info_link" title="Aktiva Tetap" />
<area shape="circle" alt="Kelompok" coords="412,98,29" href="<?=base_url()?>index.php/aktiva_group"  class="info_link" title="Kelompok" />
<area shape="circle" alt="Proses Bulanan" coords="264,94,29" href="<?=base_url()?>index.php/aktiva_proses"  class="info_link" title="Proses Bulanan" />
<area shape="circle" alt="Penjualan Aktiva" coords="134,251,28" href="<?=base_url()?>index.php/aktiva_sale" class="info_link"  title="Penjualan Aktiva" />
<area shape="circle" alt="Pembelian" coords="406,261,30" href="<?=base_url()?>index.php/aktiva_purchase" class="info_link"  title="Pembelian" />
<area shape="circle" alt="Jurnal Umum"" coords="263,358,29" href="<?=base_url()?>index.php/jurnal" class="info_link"  title="Jurnal Umum" />
			<area shape="default" nohref="nohref" alt="" />
			</map>
		</div>



		</div>
	</div>
</div>



<script  language="javascript">
$().ready(function(){
	//void get_this(CI_ROOT+'banks/grafik_saldo','','divRek');
	//void get_this(CI_ROOT+'banks/daftar_giro_gantung','','divGiro');
	$('.map').maphilight({fade: false});
});
	
	
</script>

