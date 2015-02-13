<div class='thumbnail box-gradient'>
	<?=link_button("Help","load_help()","help")?>
</div>
<? $CI =& get_instance(); ?>
<legend>PROSES PERSETUJUAN KREDIT</legend>
<p>Sebelum menyetujui silahkan review terlebih dahulu data-data 
pengajuan kredit dibawah ini, meliputi data pelanggan, pengajuan 
dan hasil survey.</p>
<p></p>

<?
	if(isset($mode)){
		$disabled=$mode=="view"?" disabled ":"";
	}
	include_once "cust_master_form_top.php";
	
?>
<legend>DATA-DATA</legend>
<li><a href="#" onclick="view_cust();return false">Data Pelanggan Lengkap</a></li>
<li><a href="#" onclick="view_spk();return false">Data Pengajuan Kredit</a>
<li><a href="#" onclick="view_survey();return false">Data Hasil Survey</a>
<li><a href="#" onclick="view_scoring();return false">Data Hasil Scoring</a>
<p></p>
<p>Tekan tombol <strong>APPROVED</strong> untuk mulai menyimpan data 
dan menyetujui nomor tersebut dibuatkan akad kredit.</p>
<div class='thumbnail'>
	<button type="button" onclick="save()" class="btn btn-info">APPROVED</button>
	<div id='save_output'></div>
</div>	

<p>Tekan tombol <strong>NO APPROVED</strong> untuk tidak menyetujui nomor tersebut dibuatkan akad kredit.</p>
<div class='row'>
	<button type="button" onclick="save_not_approved()" class="btn btn-warning">NOT Approved</button>
	<input type='text' name='reason' id='reason' placeholder="Tulis alasannya" style="width:450px">
	<div id='div_reason_msg' style='color:red'></div>
</div>	

<script language="javascript">
function view_cust(){
	var cust_id="<?=$cust_id?>";
	var url="<?=base_url()?>index.php/leasing/cust_master/view/"+cust_id+'/view/false';
	add_tab_parent("view_cust_"+cust_id,url);
}
function view_spk(){
	var app_id="<?=$app_id?>";
	var url="<?=base_url()?>index.php/leasing/app_master/view/"+app_id+'/false';
	add_tab_parent("view_spk_detail_"+app_id,url);

}
function view_survey(){
	var app_id="<?=$app_id?>";
	var url="<?=base_url()?>index.php/leasing/survey/view_spk/"+app_id+'/false';
	add_tab_parent("view_survey_"+app_id,url);

}
function view_scoring(){
	var app_id="<?=$app_id?>";
	var url="<?=base_url()?>index.php/leasing/scoring/view_result/"+app_id;
	add_tab_parent("view_score_"+app_id,url);

}

function save(){
	if(!confirm('Data sudah benar ? Yakin mau disimpan ?')) return false;
	url='<?=base_url()?>index.php/leasing/app_master/approve/<?=$app_id?>';
	get_this(url,'','save_output');
}
function save_not_approved(){
	var app_id="<?=$app_id?>";
	var reason=$("#reason").val();
	if(!reason!=""){
		$("#div_reason_msg").html('').html("<i>Isi alasan tidak direkomendasikan.</i>");
		return false
	};
	$.ajax({type: "GET",
		url: '<?=base_url()?>index.php/leasing/app_master/not_recomended',
		data: {"reason":reason,"app_id":app_id},
		success: function(msg){parseScript(msg);$('#div_reason_msg').html(msg);						
		},error: function(msg){log_err(msg);}
	}); 
}
	function load_help() {
		window.parent.$("#help").load("<?=base_url()?>index.php/help/load/approve_process");
	}

</script>