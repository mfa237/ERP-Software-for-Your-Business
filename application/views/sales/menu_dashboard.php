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
<div id="p" class="easyui-panel box2" title="Saldo Piutang Pelanggan"  style='width:900px'
	data-options="iconCls:'icon-help'" >
	<div id='divCustomer'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>

<div class="box1" >
<div id="p" class="easyui-panel box2" title="Total Penjualan"  style='width:900px'
	data-options="iconCls:'icon-help'" >
	<div id='divSales'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>
<div  class="box1">
<div id="p" class="easyui-panel box2" title="Daftar Saldo Faktur" style='width:900px'
	data-options="iconCls:'icon-help'">
	<div id='divFaktur'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>
<script  language="javascript">
$().ready(function(){
	void get_this(CI_ROOT+'customer/grafik_saldo','','divCustomer');
	void get_this(CI_ROOT+'invoice/grafik_penjualam','','divSales');
	void get_this(CI_ROOT+'invoice/daftar_saldo_faktur','','divFaktur');
	//void get_this(CI_ROOT+'customer/daftar_umur','','divUmur');
	//void get_this(CI_ROOT+'invoice/daftar_umur_faktur','','divUmurFaktur');
	//void get_this(CI_ROOT+'purchase_invoice/daftar_kartu_gl','','divGL');
});
	
	
</script>

