<style type="text/css">
<!--
.box1z {
	font-family: "Arial Narrow";
	font-size: 9px;
	width:360px;
	height:200px;
	float:left;
	margin:5px;
	padding:5px;
}
 
.box2 {
	width:200px;
	height:200px;
	margin:5px;
	padding:5px;
}
-->
</style>
<div class="box1">
<div id="p" class="easyui-panel box2" title="Total Penjualan Barang" 
	data-options="iconCls:'icon-help'" >
	<div id='divSales'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>

<div class="box1" >
<div id="p" class="easyui-panel box2" title="Stock Minimum" 
	data-options="iconCls:'icon-help'" >
	<div id='divStockMin'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>
<div  class="box1">
<div id="p" class="easyui-panel box2" title="Barang Yang Belum Diterima"
	data-options="iconCls:'icon-help'">
	<div id='divPoReceive'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>
<div  class="box1">
<div id="p" class="easyui-panel box2" title="Sisa Stock"
	data-options="iconCls:'icon-help'">
	<div id='divStockSisa'><img src="<?=base_url()?>images/loadingx.gif"></div>
</div>
</div>
<script src="<?=base_url();?>js/jquery/jquery-1.8.0.min.js"></script>

<script  language="javascript">
$().ready(function(){
	void get_this(CI_ROOT+'inventory/grafik_jual','','divSales');
	void get_this(CI_ROOT+'inventory/grafik_stock_min','','divStockMin');
	void get_this(CI_ROOT+'inventory/daftar_po_receive','','divPoReceive');
	void get_this(CI_ROOT+'inventory/daftar_stock_sisa','','divStockSisa');
});
	
	
</script>

