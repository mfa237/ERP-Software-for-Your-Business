<script type="text/javascript" src="<?=base_url()?>assets/maphilight-master/jquery.maphilight.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/excanvas.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.categories.js"></script>
 <?
  $CI =& get_instance();
 ?>
<div class="easyui-tabs" id="tt">	 
	<div title="DASHBOARD" style="padding:10px">
		<div class="thumbnail">


		<div class="thumbnail">
			<img src="<?=base_url()?>images/purchase.png" usemap="#mapdata" class="map">
			<map id="mapdata" name="mapdata">
			<area shape="circle" alt="Supplier" coords="70,56,31" href="<?=base_url()?>index.php/supplier" class="info_link" title="Supplier" />
			<area shape="circle" alt="" coords="172,55,29" href="<?=base_url()?>index.php/purchase_order" class="info_link" title="Purchase Order"  />
			<area shape="circle" alt="" coords="275,55,30" href="<?=base_url()?>index.php/receive_po" class="info_link"  title="Receive Item PO" />
			<area shape="circle" alt="" coords="368,55,29"href="<?=base_url()?>index.php/purchase_invoice" class="info_link"  title="Invoice" />
			<area shape="circle" alt="" coords="471,53,30" href="<?=base_url()?>index.php/payables_payments" class="info_link"  title="Payment" />
			<area shape="circle" alt="" coords="163,212,31"href="<?=base_url()?>index.php/purchase_retur" class="info_link"  title="Retur" />
			<area shape="circle" alt="" coords="271,212,31" href="<?=base_url()?>index.php/purchase_dbmemo" class="info_link"  title="Debit Memo" />
			<area shape="circle" alt="" coords="92,323,30" href="<?=base_url()?>index.php/inventory" class="info_link"  title="Inventory" />
			<area shape="circle" alt="" coords="221,322,29" href="<?=base_url()?>index.php/shipping_locations" class="info_link"  title="Warehouse" />
			<area shape="circle" alt="" coords="470,317,29" href="<?=base_url()?>index.php/jurnal" class="info_link" title="General Ledger" />
			<area shape="default" nohref="nohref" alt="" />
			</map>
		</div>
 
<div class="box1">
<div id="p" class="thumbnail" title="Saldo Hutang Supplier" 
	data-options="iconCls:'icon-help'" >
	<div id='divSupplier'  style="width:90%;height:200px;padding:5px;"></div>
</div>
</div>

<div class="box1" >
<div id="p" class="thumbnail" title="Total Pembelian" 
	data-options="iconCls:'icon-help'" >
	<div id='divPurchase'></div>
</div>
</div>


		</div>
	</div>
</div>


<script  language="javascript">
$().ready(function(){

		$('.map').maphilight({fade: false});

	///void get_this(CI_ROOT+'supplier/grafik_saldo_hutang','','divSupplier');
	//void get_this(CI_ROOT+'purchase_invoice/grafik_pembelian','','divPurchase');
	//	void get_this(CI_ROOT+'purchase_invoice/daftar_saldo_faktur','','divFaktur');
	//void get_this(CI_ROOT+'supplier/daftar_umur_hutang','','divUmurHutangSupp');
	//void get_this(CI_ROOT+'purchase_invoice/daftar_umur_hutang_detail','','divUmurHutangDetail');
	//void get_this(CI_ROOT+'purchase_invoice/daftar_kartu_gl','','divGL');



});
	
	
</script>

<script type="text/javascript">

	var data = [];
	var alreadyFetched = {};
	var dataurl=CI_ROOT+'supplier/grafik_saldo_hutang';
 
	
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
		$.plot("#divSupplier", data, options);
	}
	
			
	</script>

