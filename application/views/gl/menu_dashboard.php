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
<div id="p" class="easyui-panel box2" title="Saldo Akun"  style='width:900px'
	data-options="iconCls:'icon-help'" >
	<div id='divAkun'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>

<div class="box1" >
<div id="p" class="easyui-panel box2" title="Neraca Saldo"  style='width:900px'
	data-options="iconCls:'icon-help'" >
	<div id='divNeraca'><img src="<?=base_url()?>images/loading.gif"></div>
</div>
</div>
<script src="<?=base_url();?>js/jquery/jquery-1.8.0.min.js"></script>

<script  language="javascript">
$().ready(function(){
	void get_this(CI_ROOT+'gl/grafik_saldo_akun','','divAkun');
	void get_this(CI_ROOT+'gl/neraca_saldo','','divNeraca');
});
	
	
</script>

