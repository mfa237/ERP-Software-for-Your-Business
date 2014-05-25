<script type="text/javascript" src="<?=base_url()?>assets/maphilight-master/jquery.maphilight.min.js"></script>

 <?
  $CI =& get_instance();
 ?>
<div class="easyui-tabs" id="tt">	 
	<div title="DASHBOARD" style="padding:10px">
		<div class="thumbnail">

 
<div style="margin:10px 0;"></div>
	<div title="Sales Dashboard" style="padding:10px">
		<div class="thumbnail">
			<img src="<?=base_url()?>images/payroll.png" usemap="#sales" class="map">
			<map id="sales" name="sales">
			<area shape="circle" alt="Pegawai" coords="70,56,31" href="<?=base_url()?>index.php/employee" class="info_link" title="Pegawai" />
			<area shape="circle" alt="Absensi" coords="172,55,29" href="<?=base_url()?>index.php/absensi" class="info_link" title="Absensi"  />
			<area shape="circle" alt="Slip Gaji" coords="275,55,30" href="<?=base_url()?>index.php/salary" class="info_link"  title="Slip Gaji" />
			<area shape="circle" alt="" coords="368,55,29"href="<?=base_url()?>index.php/overtime" class="info_link"  title="Overtime" />
			<area shape="circle" alt="" coords="471,53,30" href="<?=base_url()?>index.php/pinjaman" class="info_link"  title="Pinjaman" />
			<area shape="circle" alt="" coords="163,212,31"href="<?=base_url()?>index.php/salary/generate" class="info_link"  title="Generate Slip Gaji Bulanan" />
			<area shape="circle" alt="" coords="271,212,31" href="<?=base_url()?>index.php/payroll/periode" class="info_link"  title="Seting Periode Penggajian" />
			<area shape="circle" alt="" coords="92,323,30" href="<?=base_url()?>index.php/pph21" class="info_link"  title="Proses PPH 21" />
			<area shape="circle" alt="" coords="221,322,29" href="<?=base_url()?>index.php/pengobatan" class="info_link"  title="Pengobatan" />
			<area shape="circle" alt="" coords="354,321,28" href="<?=base_url()?>index.php/payroll/level" class="info_link"  title="Group Level Penggajian" />
			<area shape="circle" alt="" coords="470,317,29" href="<?=base_url()?>index.php/cuti" class="info_link" title="Data Cuti Karyawan" />
			<area shape="default" nohref="nohref" alt="" />
			</map>
			 
		</div>
		<div class="row">
			<div class="thumbnail col-md-6 " >
				 
			</div>
			
			<div class="thumbnail col-md-6 " >
				 
			</div>
			<div class="thumbnail col-md-6 " >
					 
			</div>
			<div class="thumbnail col-md-6 " >
					 
			</div>

		</div>
	</div>
</div>


	</div>
</div>


<script  language="javascript">

$().ready(function(){

		$('.map').maphilight({fade: false});
	 
	});
</script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/excanvas.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.categories.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.pie.js"></script>


<script type="text/javascript">

	var alreadyFetched = {};
	var dataurl=CI_ROOT+'customer/grafik_saldo3';
	var data = [], series = Math.floor(Math.random() * 6) + 3;
	var i=0;
	 
	$.ajax({
				url: dataurl,
				type: "GET",
				dataType: "json",
				success: onDataReceived
	});
	function onDataReceived(series) {
		if (!alreadyFetched[series.label]) {
			alreadyFetched[series.label] = true;
			for(j=0;j<5;j++){
				data[i]={label:series[j][0], data:series[j][1]};
				i++;
			}
		}
		 

		$.plot('#divCustomer', data, {
				series: {
					pie: { 
						show: true			
				}
				},
				legend: {
					show: false
				}
			});
	}
	


	var options2 = {
			lines: {
				show: true,
				barWidth: 0.6,
				align: "center"
			},
			points: {
				show: true
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
	};	
	var data2 = [];
	var alreadyFetched2 = {};
	var dataurl2=CI_ROOT+'invoice/grafik_penjualan';
 
	$.ajax({
				url: dataurl2,
				type: "GET",
				dataType: "json",
				success: onDataReceived2
	});
	

	function onDataReceived2(series) {
		if (!alreadyFetched2[series.label]) {
			alreadyFetched2[series.label] = true;
			data2.push(series);
		}
		$.plot("#divSales", data2, options2);
	}
			
			
			
	</script>
