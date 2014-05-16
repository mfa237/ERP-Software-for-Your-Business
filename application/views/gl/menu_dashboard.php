 <?
  $CI =& get_instance();
 ?>
 <script type="text/javascript" src="<?=base_url()?>assets/flot/excanvas.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.categories.js"></script>
 <script type="text/javascript" src="<?=base_url()?>assets/maphilight-master/jquery.maphilight.min.js"></script>
<div class="easyui-tabs" id="tt">	 
	<div title="DASHBOARD" style="padding:10px">
		<div class="col-md-12 thumbnail">

 		<div class="thumbnail">
			<img src="<?=base_url()?>images/gl.png" usemap="#mapdata" class="map">
			<map id="mapdata" name="mapdata">
<area shape="circle" alt="Jurnal Umum" coords="120,92,29" href="<?=base_url()?>index.php/jurnal"  class="info_link" title="Jurnal Umum" />
<area shape="circle" alt="Chart of Accounts" coords="264,94,29" href="<?=base_url()?>index.php/coa"  class="info_link" title="Chart of Accounts" />
<area shape="circle" alt="Financial Periods" coords="412,98,29" href="<?=base_url()?>index.php/periode"  class="info_link" title="Financial Periods" />
<area shape="circle" alt="Neraca" coords="134,251,28" href="<?=base_url()?>index.php/gl/rpt/neraca" class="info_link"  title="Laporan Neraca" />
<area shape="circle" alt="Income Statement" coords="406,261,30" href="<?=base_url()?>index.php/gl/rpt/laba_rugi" class="info_link"  title="Income Statement" />
<area shape="circle" alt="Kartu GL" coords="263,304,30" href="<?=base_url()?>index.php/gl/rpt/cards" class="info_link"  title="Kartu GL" />
			<area shape="default" nohref="nohref" alt="" />
			</map>
		</div>

<div class="box1">
<div id="p" class="easyui-panel box2" title="Saldo Akun"  style='width:900px'
	data-options="iconCls:'icon-help'" >
	<div id='divAkun'   style="width:90%;height:200px;padding:5px;"></div>
</div>
</div>

<div class="box1" >
<div id="p" class="easyui-panel box2" title="Neraca Saldo"  style='width:900px'
	data-options="iconCls:'icon-help'" >
	<div id='divNeraca'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>


		</div>
	</div>
</div>




<script  language="javascript">
$().ready(function(){
//	void get_this(CI_ROOT+'gl/grafik_saldo_akun','','divAkun');
	void get_this(CI_ROOT+'gl/neraca_saldo','','divNeraca');
	$('.map').maphilight({fade: false});
});
	
	
</script>
<script type="text/javascript">

	var data = [];
	var alreadyFetched = {};
	var dataurl=CI_ROOT+'gl/grafik_saldo_akun';
 
	
	var options = {
		bars: {
			show: true,
			barWidth: 0.6,
			align: "center"
		},
		xaxis: {
			mode: "categories",
			tickLength: 0
		}
	};	
	$.ajax({
				url: dataurl,
				type: "GET",
				dataType: "json",
				success: onDataReceived
	});
	function onDataReceived(series) {
		if (!alreadyFetched[series.label]) {
			alreadyFetched[series.label] = true;
			data.push(series);
		}
		$.plot("#divAkun", data, options);
	}
	
			
</script>


