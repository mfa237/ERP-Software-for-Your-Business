<script type="text/javascript" src="<?=base_url()?>assets/flot/excanvas.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.categories.js"></script>
 <?
  $CI =& get_instance();
 ?>
 <script type="text/javascript" src="<?=base_url()?>assets/maphilight-master/jquery.maphilight.min.js"></script>
<div class="easyui-tabs" id="tt">	 
	<div title="HOME"><? include_once __DIR__."/../home.php";?></div>
	<script>$().ready(function(){$("#tt").tabs("select","DASHBOARD");});</script>

	<div title="DASHBOARD" style="padding:10px">
		<div class="col-md-12 thumbnail">


		<div class="thumbnail">
			<img src="<?=base_url()?>images/inventory.png" usemap="#mapdata" class="map">
			<map id="mapdata" name="mapdata">
<area shape="circle" alt="Receive Purchase Order" coords="120,95,30" href="<?=base_url()?>index.php/receive_po"  class="info_link" title="Receive Purchase Order" />
<area shape="circle" alt="Inventory" coords="266,95,28" href="<?=base_url()?>index.php/inventory"  class="info_link" title="Inventory" />
<area shape="circle" alt="Delivery" coords="411,98,30" href="<?=base_url()?>index.php/delivery"  class="info_link" title="Delivery" />
<area shape="circle" alt="Transfer Item Between Warehouse" coords="134,252,29" href="<?=base_url()?>index.php/stock_mutasi" class="info_link"  title="Transfer Item Between Warehouse" />
<area shape="circle" alt="Stock Adjustment" coords="265,250,30" href="<?=base_url()?>index.php/stock_adjust" class="info_link"  title="Stock Adjustment" />
<area shape="circle" alt="Stock Card" coords="401,247,29" href="<?=base_url()?>index.php/stock_mutasi" class="info_link"  title="Stock Card" />
<area shape="circle" alt="Manage Warehouse" coords="117,362,29" href="<?=base_url()?>index.php/shipping_locations"  class="info_link" title="Manage Warehouse" />
<area shape="circle" alt="Jurnal Umum" coords="263,357,31" href="<?=base_url()?>index.php/jurnal" class="info_link"  title="Jurnal Umum" />
			<area shape="default" nohref="nohref" alt="" />
			</map>
		</div>
 

 
<div class="box1">
	<div id="p" class="easyui-panel box2" title="Top Ten Sales" 
		data-options="iconCls:'icon-help'" >
		<div id='divSales'   style="width:90%;height:200px;padding:5px;"></div>
	</div>
</div>


		</div>
	</div>
</div>




<script  language="javascript">
$().ready(function(){
	//void get_this(CI_ROOT+'inventory/grafik_jual','','divSales');
	//void get_this(CI_ROOT+'inventory/grafik_stock_min','','divStockMin');
	//void get_this(CI_ROOT+'inventory/daftar_po_receive','','divPoReceive');
	//void get_this(CI_ROOT+'inventory/daftar_stock_sisa','','divStockSisa');
		$('.map').maphilight({fade: false});
});
	
	
</script>
<script type="text/javascript">

	var data = [];
	var alreadyFetched = {};
	var dataurl=CI_ROOT+'inventory/grafik_jual';
 
	
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
		$.plot("#divSales", data, options);
	}
	
			
</script>

