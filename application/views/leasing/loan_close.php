<legend>Proses Penutupan Kredit</legend> 
<div class='thumbnail box-gradient'>
<? 	echo my_input("Cari nomor kredit atau nama","txtSearch","","col-sm-4",'col-sm-3');
	echo "<input onclick='cmdSearch_Click();return false;' type='button' name='cmdSearch' id='cmdSearch' value='Search' class='btn btn-info'>";
?>
<p><i>Dibawah ini adalah data tagihan berdasarkan pencarian diatas.</i></p>
<p><i>*Pelunasan dipercepat dikenakan penalty potongan 2% dari sisa angsuran</i></p>
</div>
<div class='thumbnail'>
	<div id='divOutStand'></div>
	<div id='divLoanDetail'></div>
</div>
<div id='dlgBayar'class="easyui-dialog" style="width:400px;height:450px;padding:10px 20px" closed="true" 
	buttons="#tbBayar">
	<legend>Pembayaran Cicilan</legend>
	<?
		echo form_open('',array("action"=>"","name"=>"frmBayar","id"=>"frmBayar"));
		echo "<table class='table2' style='width:100%'>";
		echo "<tr><td>Tanggal Bayar</td><td>".form_input('date_paid',date("m/d/Y"),"class='easyui-datetimebox'")."</td>";
		echo "<tr><td>Cara Bayar</td><td>".form_input('how_paid','Cash')."</td>";
		echo "<tr><td>Potongan Rp.</td><td>".form_input('discount',0)."</td>";
		echo "<tr><td>Jumlah Bayar Rp.</td><td>".form_input('amount_paid',0)."</td>";
		echo "<tr><td>Keterangan</td><td>".form_textarea('comment')."</td>";
		echo "</table>";
		echo form_close();
	?>		
</div>
<div id="tbBayar">
	<?=link_button("Keluar","dlgBayar_Close()","remove")?>
	<?=link_button("Proses","dlgBayar_Save()","save")?>
	
</div>

<script language='javascript'>
	var m_loan_id='';
	function cmdSearch_Click() {
		if($("#txtSearch").val()==""){alert("Isi nomor atau nama debitur !");return false};
		var url='<?=base_url()?>index.php/leasing/loan/list_outstand/'+$('#txtSearch').val();
		get_this(url,'','divOutStand');
	}
	function view_loan(loan_id){		
		var url="<?=base_url()?>index.php/leasing/loan/view/"+loan_id+'/false';
		add_tab_parent("loan_"+loan_id,url);
	}
	function dlgBayar_Show(loan_id){
		m_loan_id=loan_id;
		$("#dlgBayar").dialog("open").dialog('setTitle','Proses Pelunasan Kredit');		
	}
	function dlgBayar_Close(){
		$("#dlgBayar").dialog("close");		
	}
	function dlgBayar_Save(){
		if(m_loan_id==""){alert("Isi nomor kredit");return false};
		url='<?=base_url()?>index.php/leasing/loan_close/save/'+m_loan_id;
		$('#frmBayar').form('submit',{
			url: url, param: "", onSubmit: function(){	return $(this).form('validate'); },
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					log_msg('Data sudah tersimpan.');
					dlgBayar_Close();
					cmdSearch_Click();
				} else {
					log_err(result.msg);
				}
			}
		});	
		
	}
</script>