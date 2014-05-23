<style>
.max-modules:hover, .hover-effect {
	-webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.2);
	-o-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.2);
	box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.2);
}
.max-modules .icon {
	margin: auto;
	text-align: center;
}
.max-modules .label {
	font-size: 90%;
	line-height: 1.1;
	text-shadow: 1px 1px 3px rgba(0, 0, 0, 1), 0px 3px 15px rgba(0, 0, 0, 0.5);
}
.max-modules {
	margin: 10px;
	width: 100px;
	height: 100px;
	float: left;
	border:1px solid #cdc;
	display: block;
	background-color: #cdc;
	cursor: pointer;
}
 

</style>
<?
function add_shortcut($label,$icon,$color='#cdc',$nomor='0') {
	echo "<div class='max-modules' style='background-color:$color' onclick='run_modul($nomor);'> 
		<div class='icon'>
			<img src='".base_url()."images/$icon'>
		</div>
		<div class='label'>$label</div>
	</div>";
}
add_shortcut('Pembelian','ico_purchase.png','#57CE57',1);
add_shortcut('Penjualan','ico_sales.png','#579CD1',2);
add_shortcut('Inventory','ico_inventory.png','#C87CDB',3);
add_shortcut('Buku Kas','ico_bank.png','#D8EC70',4);
add_shortcut('Aktiva Tetap','ico_asset.png','#EC9A73',5);
add_shortcut('Manufacture','ico_manuf.png','#A1A8DD',6);
add_shortcut('Payroll','ico_payroll.png','#DFABE9',7);
add_shortcut('Akuntansi','ico_bank.png','#D8EC70',10);
add_shortcut('Setting','ico_setting.png','#A2B1A2',8);

?>
<script>
	function run_modul(nomor) {
		var  url='purchase';
		switch(nomor){
		case 1:url='purchase';break;
		case 2:url='sales';
		case 3:url='inventory';break;
		case 4:url='bank';break;
		case 5:url='aktiva';break;
		case 6:url='manuf';break;
		case 7:url='payroll';break;
		case 8:url='admin';break;
		case 9:url='customer';break;
		case 10:url='gl';break;
		}
		if(url!='') load_menu(url);
	}
</script>
<div class="clearfix"></div>
	 
 
 