<legend>Laporan Debitur</legend>
<ul>
	<li><a href='#' onclick="on_print('cust_master/001');return false">001. Daftar Debitur</a></li>
	<li><a href="#" onclick="on_print('cust_master/002');return false">002. Daftar Debitur Summary</a></li>
</ul>

<legend>Laporan Aplikasi</legend>
<ul>
	<li><a href='#' onclick="on_print('app_master/001');return false">001. Daftar Aplikasi Kredit</a></li>
	<li><a href="#" onclick="on_print('app_master/002');return false">002. Daftar Aplikasi Kredit Summary</a></li>
</ul>

<legend>Laporan Survey</legend>
<ul>
	<li><a href='#' onclick="on_print('survey/001');return false">001. Daftar Survey</a></li>
</ul>
<legend>Laporan Kontrak Kredit</legend>
<ul>
	<li><a href='#' onclick="on_print('loan/001');return false">001. Daftar Kontrak Kredit Detail</a></li>
	<li><a href="#" onclick="on_print('loan/002');return false">002. Daftar Kontrak Kredit Summary</a></li>
	<li><a href="#" onclick="on_print('loan/004');return false">003. Laporan Cash Loan</a></li>
	<li><a href="#" onclick="on_print('loan/005');return false">003. Laporan Kolektibilitas</a></li>
</ul>

<legend>Laporan Angsuran</legend>
<ul>
	<li><a href='#' onclick="on_print('invoice/001');return false">001. Daftar Angsuran</a></li>
</ul>
<legend>Laporan Tagihan</legend>
<ul>
	<li><a href="#" onclick="on_print('loan/003');return false">003. Daftar Tagihan</a></li>
</ul>
<legend>Laporan Kas</legend>
<ul>
	<li><a href="#" onclick="on_print('cash/001');return false">001. Daftar Penerimaan Kas</a></li>
</ul>

<script language="javascript">
	function on_print(id){
		var url='<?=base_url()?>index.php/leasing/reports/'+id;
		add_tab_parent("Print_"+id,url);
	}	
</script>