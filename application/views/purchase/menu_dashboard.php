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
<div id="p" class="easyui-panel box2" title="Saldo Hutang Supplier" 
	data-options="iconCls:'icon-help'" >
	<div id='divSupplier'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>

<div class="box1" >
<div id="p" class="easyui-panel box2" title="Total Pembelian" 
	data-options="iconCls:'icon-help'" >
	<div id='divPurchase'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>
<div  class="box1">
<div id="p" class="easyui-panel box2" title="Daftar Saldo Faktur"
	data-options="iconCls:'icon-help'">
	<div id='divFaktur'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>
<script src="<?=base_url();?>js/jquery/jquery-1.8.0.min.js"></script>

<script  language="javascript">
$().ready(function(){
	void get_this(CI_ROOT+'supplier/grafik_saldo_hutang','','divSupplier');
	void get_this(CI_ROOT+'purchase_invoice/grafik_pembelian','','divPurchase');
	void get_this(CI_ROOT+'purchase_invoice/daftar_saldo_faktur','','divFaktur');
	//void get_this(CI_ROOT+'supplier/daftar_umur_hutang','','divUmurHutangSupp');
	//void get_this(CI_ROOT+'purchase_invoice/daftar_umur_hutang_detail','','divUmurHutangDetail');
	//void get_this(CI_ROOT+'purchase_invoice/daftar_kartu_gl','','divGL');
});
	
	
</script>

