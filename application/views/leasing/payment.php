<div class='thumbnail box-gradient'>
	<?=link_button("Import CSV","import_csv()","csv")?>
	<?=link_button("Help","load_help('payment_leasing')","help")?>
</div>

<legend>Proses Pembayaran Cicilan</legend>


<div class='thumbnail box-gradient'>
<table class='table2' width='100%'>
<tr><td>Cari Nama atau nomor kontrak : </td>
<td><input type='text' name='txtSearch' id='txtSearch'></td>
<td><input type='button' class='btn btn-info' 
	onclick='cmdSearch_Click();return false' value='Cari Belum Lunas'>
<input type='button' class='btn btn-info' 
	onclick='cmdSearchBilling_Click();return false' value='Cari Billing'>
</td>
</tr>
</table>
<p><i>Dibawah ini adalah data tagihan berdasarkan pencarian diatas, silahkan isi kode pencarian.</i></p>
</div>
<div class='row' id="lstResult" style="display:none">
	<p><i>Silahkan klik pada nomor tagihan dibawah ini untuk melakukan pembayaran cicilan, kemudian klik tombol BAYAR </i></p>
	<table id="dgItems" class="easyui-datagrid"  style="width:auto;height:auto"
	data-options="iconCls: 'icon-edit',	singleSelect: true,	toolbar: '#tbItems',url: ''">
	<thead><tr>
		<th data-options="field:'cust_name'">Pelanggan</th>
		<th data-options="field:'cust_id'">Kode Pelanggan</th>
		<th data-options="field:'invoice_number'">Nomor Faktur</th>
		<th data-options="field:'invoice_date'">Tanggal</th>
		<th data-options="field:'idx_month'">Bulan Ke</th>
		<th data-options="field:'amount',width:100,align:'right',editor:'numberbox',
			formatter: function(value,row,index){
			return number_format(value,2,'.',',');}">Jumlah Tagihan</th>
		<th data-options="field:'paid'">Sudah Bayar</th>
		<th data-options="field:'date_paid'">Tanggal Bayar</th>
		<th data-options="field:'how_paid'">Jenis Bayar</th>
		<th data-options="field:'amount_paid',width:100,align:'right',editor:'numberbox',
			formatter: function(value,row,index){
			return number_format(value,2,'.',',');}">Jumlah Bayar</th>
		<th data-options="field:'hari_telat'">Hari Telat</th>
		<th data-options="field:'bunga',width:100,align:'right',editor:'numberbox',
			formatter: function(value,row,index){
			return number_format(value,2,'.',',');}">Bunga</th>
		<th data-options="field:'pokok',width:100,align:'right',editor:'numberbox',
			formatter: function(value,row,index){
			return number_format(value,2,'.',',');}">Pokok</th>
		<th data-options="field:'bunga_paid'">Bunga Paid</th>
		<th data-options="field:'pokok_paid'">Pokok Paid</th>
		
	</tr></thead></table>
</div>
<div id='tbItems'>
<input type='button' class='btn btn-info' 
	onclick='tbItems_Bayar_Click();return false' value='BAYAR'>
</div>
<div id='dlgBayar'class="easyui-dialog" style="width:600px;height:400px;padding:10px 20px" closed="true" 
	buttons="#tbBayar">
	<legend>Pembayaran Cicilan</legend>
	<?
		echo form_open('',array("action"=>"","name"=>"frmBayar","id"=>"frmBayar"));
		echo my_input_date("Tanggal Bayar : ","date_paid",date("m/d/Y"));
		echo my_input("Nomor Faktur : ","invoice_number","");
		echo my_input("Cara Bayar : ","how_paid","");
		echo my_input("Jumlah Bayar : ","amount_paid","");
		echo "<legend>Perhitungan</legend>";
		echo my_input("Denda : ","denda","")
			.my_input("Bunga : ","bunga","")
			.my_input("Pokok : ","pokok","");
		echo form_close();
		echo "<legend>Info</legend>";
		echo my_input("Tanggal Tagih : ","invoice_date","");
		echo my_input("Hari Telat    : ","hari_telat","");
	?>		
</div>

<!-- SEARCH BILLING -->
<div class='row' id="divResultBilling" style="display:none">
	<table id="divRbItems" class="easyui-datagrid"  style="width:auto;height:auto"
	data-options="iconCls: 'icon-edit',	singleSelect: true,	toolbar: '#divRbTool',url: ''">
	<thead><tr>
		<th data-options="field:'cust_name'">Pelanggan</th>
		<th data-options="field:'cust_id'">Kode Pelanggan</th>
		<th data-options="field:'invoice_number'">Nomor Faktur</th>
		<th data-options="field:'invoice_date'">Tanggal</th>
		<th data-options="field:'idx_month'">Bulan Ke</th>
		<th data-options="field:'amount',width:100,align:'right',editor:'numberbox',
			formatter: function(value,row,index){
			return number_format(value,2,'.',',');}">Jumlah Tagihan</th>
		<th data-options="field:'paid'">Sudah Bayar</th>
		<th data-options="field:'date_paid'">Tanggal Bayar</th>
		<th data-options="field:'how_paid'">Jenis Bayar</th>
		<th data-options="field:'amount_paid',width:100,align:'right',editor:'numberbox',
			formatter: function(value,row,index){
			return number_format(value,2,'.',',');}">Jumlah Bayar</th>
		<th data-options="field:'hari_telat'">Hari Telat</th>
		<th data-options="field:'bunga'">Bunga</th>
		<th data-options="field:'pokok'">Pokok</th>
		<th data-options="field:'bunga_paid'">Bunga Paid</th>
		<th data-options="field:'pokok_paid'">Pokok Paid</th>
		
	</tr></thead></table>
</div>
<div id='divRbTool'>
<input type='button' class='btn btn-info' 
	onclick='divRbToolView_Click();return false' value='VIEW'>
</div>


<div id="tbBayar">
	<?=link_button("Hitung","dlgBayar_Recalc()","reload","false")?>
	<?=link_button("Keluar","dlgBayar_Close()","remove","false")?>
	<?=link_button("Proses","dlgBayar_Save()","save","false")?>
</div>
<script language='javascript'>
	var denda_hari=<?=getvar("denda_hari",7)?>;
	var denda_prc=<?=getvar("denda_prc",5)?>;
	var def_denda=0;
	var def_bunga=0;
	var def_pokok=0;
	if(denda_prc>=1)denda_prc=denda_prc/100;
	function cmdSearch_Click() {
		$("#divResultBilling").fadeOut();
		if($("#txtSearch").val()==""){alert("Isi nomor atau nama debitur !");return false};
		var xurl='<?=base_url()?>index.php/leasing/loan/list_not_paid/'+$('#txtSearch').val();
		$('#lstResult').fadeIn();
		$('#dgItems').datagrid({url:xurl});
		$('#dgItems').datagrid('reload');		
	}
	function tbItems_Bayar_Click() {
		var row = $('#dgItems').datagrid('getSelected');
		if (row){
			$('#dlgBayar').dialog('open').dialog('setTitle','Proses Bayar Cicilan');
			$('#invoice_number').val(row.invoice_number);
			$('#how_paid').val("Cash");
			$("#invoice_date").val(row.invoice_date);
			$("#hari_telat").val(row.hari_telat);
			var denda=0;
			var amount=row.amount;
			if(row.hari_telat>0){
				denda=Math.round(denda_prc*row.amount);
				amount=denda+Number(row.amount);
			} 
			def_denda=denda;
			def_bunga=row.bunga-row.bunga_paid;
			def_pokok=row.pokok-row.pokok_paid;
			$("#denda").val(number_format(denda));
			$("#bunga").val(number_format(def_bunga));
			$("#pokok").val(number_format(def_pokok));
			amount=denda+def_bunga+def_pokok;
			$("#amount_paid").val(number_format(amount));
			
		}
	}
	function tbItems_Edit_Click() {
		alert("edit");
	}
	function tbItems_Hapus_Click(){
		alert("hapus");
	}
	function dlgBayar_Close(){
		$("#dlgBayar").dialog("close");
	}
	function dlgBayar_Save(){
		var invoice_number=$("#invoice_number").val();
		if(invoice_number==""){alert("Isi kode faktur ");return false};
		url='<?=base_url()?>index.php/leasing/loan/add_payment/'+invoice_number;
		$('#frmBayar').form('submit',{
			url: url, param: "", onSubmit: function(){	return $(this).form('validate'); },
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					cmdSearch_Click();
					log_msg('Data sudah tersimpan.');
					dlgBayar_Close();
				} else {
					log_err(result.msg);
				}
			}
		});			
	}
	function cmdSearchBilling_Click() {
		$("#lstResult").fadeOut();
		if($("#txtSearch").val()==""){alert("Isi nomor atau nama debitur !");return false};
		var xurl='<?=base_url()?>index.php/leasing/loan/list_all/'+$('#txtSearch').val();
		$('#divResultBilling').fadeIn();
		$('#divRbItems').datagrid({url:xurl});
		$('#divRbItems').datagrid('reload');		
	}
	function  divRbToolView_Click() {
		var row = $('#divRbItems').datagrid('getSelected');
		if (row){
			var url="<?=base_url()?>index.php/leasing/invoice_header/view/"+row.invoice_number;
			add_tab_parent("ViewInvoice_"+row.invoice_number,url);
		}
	}
	function import_csv(){
		var url='<?=base_url()?>index.php/leasing/payment/import_csv';
		add_tab_parent('import_csv',url);
	}
	function dlgBayar_Recalc(){
		var jumlah=parseInt($("#amount_paid").val());
		var denda=Number(def_denda);
		var bunga=Number(def_bunga);
		var pokok=Number(def_pokok);
		var hari_telat=parseInt($("#hari_telat").val());
		if(jumlah<denda){
			$("#denda").val(number_format(jumlah));	
			jumlah=0;
		} else {
			jumlah=jumlah-denda;
		}
		if(jumlah<bunga){
			$("#bunga").val(number_format(jumlah));
			jumlah=0;
		} else {
			jumlah=jumlah-bunga;
		}
		if(jumlah<pokok){
			$("#pokok").val(number_format(jumlah));
			jumlah=0;
		} else {
			jumlah=jumlah-pokok;
		}
	}
	
</script>