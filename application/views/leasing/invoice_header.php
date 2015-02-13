<?	if($mode=='view'){ 	$disabled='disable';} else {$disabled='';}
	if(!isset($show_tool))$show_tool="true";
	$show=$show_tool=="true"?true:false;
	if($show){
		require_once(__DIR__.'../../aed_button.php');	
	}
	echo validation_errors(); 
	if(isset($mode)){
		$disabled=$mode=="view"?" readonly ":"";
	}
?>
	<div class='thumbnail box-gradient'>
	<form id="frmMain"  method="post" role='form' class="form-horizontal">
		<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
		<table  style='width:100%' class="table2">
			<tr><td colspan='4'><strong>TAGIHAN</strong></td></tr>
			<tr>
				<td>Nomor Faktur </td><td><?=form_input(array("name"=>"invoice_number","id"=>"invoice_number"),$invoice_number,$disabled)?></td>
				<td>Tanggal</td><td><?=form_input('invoice_date',$invoice_date,$disabled)?></td>
			</tr>
			<tr>
				<td>Kode Customer</td><td><?=form_input('cust_deal_id',$cust_deal_id, $disabled)?></td>
				<td>Nama Customer</td><td><?=form_input('cust_name',$cust_name, $disabled)?></td>			
			</tr>
			<tr>
				<td>Tagihan Ke</td><td><?=form_input('idx_month',$idx_month, $disabled);?></td>
				<td>Jumlah Tagihan</td><td><?=form_input('amount',number_format($amount), $disabled);?></td>
			</tr>
			<tr>
				<td>Pokok</td><td><?=form_input('pokok',number_format($pokok), $disabled)?></td>				
				<td>Bunga</td><td><?=form_input('bunga',number_format($bunga), $disabled)?></td>
			</tr>
			<tr><td>Lunas ?</td><td><?=form_input(array("name"=>'paid',"id"=>"paid"),$paid, $disabled)?></td>
				<td>Posted</td><td><?=form_input('posted',$posted, $disabled)?></td>
			<tr><td colspan='4'><strong>PEMBAYARAN</strong></td></tr>
			</tr>
			<tr><td>Tanggal Bayar</td><td><?=form_input('date_paid',$date_paid, $disabled)?></td>
				<td>Voucher</td><td><?=form_input('voucher',$voucher, $disabled)?></td>
			</tr>
			<tr><td>Cara Bayar</td><td><?=form_input('payment_method',$payment_method, $disabled)?></td>
				<td>Jumlah Bayar</td><td><?=form_input('amount_paid',number_format($amount_paid), $disabled)?></td>
			</tr>
			<tr>
				<td>Hari Telat</td><td><?=form_input('hari_telat',$hari_telat, $disabled)?></td>
				<td>Admin</td><td><?=form_input('admin_amount',number_format($admin_amount), $disabled)?></td>
			</tr>
			<tr><td>Bayar Pokok</td><td><?=form_input('pokok_paid',number_format($pokok_paid), $disabled)?></td>
				<td>Bayar Bunga</td><td><?=form_input('bunga_paid',number_format($bunga_paid), $disabled)?></td>
			</tr>
			<tr><td>Denda</td><td><?=form_input('denda',number_format($denda), $disabled)?></td>
				<td>Bunga Finalty</td><td><?=form_input('bunga_finalty',number_format($bunga_finalty), $disabled)?></td>
			</tr>
			</tr>
		</table>
	</form>
	</div>	 
	<? 
		$gl_id=$invoice_number;
		require_once(__DIR__.'../../gl/jurnal_view.php');	
	?>
	
 <script language='javascript'>
	function edit_aed(){
		var url="<?=base_url()?>index.php/<?=$form_controller?>/edit/<?=$invoice_number?>";	
		window.open(url,"_self");
	}
	function refresh_aed() {
		var url="<?=base_url()?>index.php/<?=$form_controller?>/view/<?=$invoice_number?>";	
		window.open(url,"_self");
	}
	function search_aed() {
		var url="<?=base_url()?>index.php/<?=$form_controller?>";	
		window.open(url,"_self");
	}
	function add_aed() {
		var url="<?=base_url()?>index.php/<?=$form_controller?>/add";	
		window.open(url,"_self");
	}
  	function save_aed(){
		if(!valid())return false;
		if(!validnum())return false;
		url='<?=base_url()?>index.php/<?=$form_controller?>/save';
		$('#frmMain').form('submit',{
			url: url, onSubmit: function(){	return $(this).form('validate'); },
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					$('#mode').val('view');
					log_msg('Data sudah tersimpan.');
					var invoice_number=$("#invoice_number").val();
					url='<?=base_url()?>index.php/<?=$form_controller?>/view/'+invoice_number;
					window.open(url,"_self");
				} else {
					log_err(result.msg);
				}
			}
		});
  	}
	function delete_aed() {
		$.messager.confirm('Confirm','Are you sure you want to remove this ?',function(r){
			if (r){
				var url="<?=base_url()?>index.php/<?=$form_controller?>/delete/<?=$invoice_number?>";	
				window.open(url,"_self");
			}
		})
	}
	function posting_aed(){
		var paid=$("#paid").val();
		if(paid=="0" || paid==""){alert("Tidak bisa posting karena belum dibayar !");return false}
		var url="<?=base_url()?>index.php/<?=$form_controller?>/posting/<?=$invoice_number?>";	
		window.open(url,"_self");	
	}
	function unposting_aed(){
		var url="<?=base_url()?>index.php/<?=$form_controller?>/unposting/<?=$invoice_number?>";	
		window.open(url,"_self");	
	}
	function print_aed(){
		var url="<?=base_url()?>index.php/<?=$form_controller?>/print/<?=$invoice_number?>";	
		window.open(url,"_self");
	}
</script>