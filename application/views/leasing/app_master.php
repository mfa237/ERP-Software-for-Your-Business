<style type="text/css">
<!--
.style1 {font-size: 9px}
-->
</style>
<h4>FORMULIR PENGAJUAN KREDIT</h4>
<div class="thumbnail">
	<?
	echo link_button('Save', 'save()','save');		
	echo link_button('Print', 'print_item()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/leasing/app_master/add');		
	echo link_button('Search','','search','true',base_url().'index.php/leasing/app_master');		
	if($mode=="view") echo link_button('Refresh','','reload','true',base_url().'index.php/leasing/app_master/view/'.$app_id);		
	echo link_button('Delete', 'delete_tour()','remove');		
	echo link_button('Help', 'load_help()','help');	
	$mode=="view"?$readonly=" readonly":$readonly="";
	$mode=="view"?$disable=" disable":$disable="";
	
	?>
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
</div>
<div class="thumbnail" >	
	<form id="frmMain" method="post">
		<div class='thumbnail'>
				<?=form_checkbox('verified','')?> Verified 
				<?=form_checkbox('confirmed','')?> Confirmed 
				<?=form_checkbox('gm_approved','')?> GM Approved 
				<?=form_checkbox('risk_approved','')?> Risk Approved 
				<?=form_checkbox('survey','')?> Survey 
				<?=form_checkbox('recomended','')?> Recomended 		
		</div>
		<table>
			<tr><td colspan='4'>
			
			</td></tr>
			<tr><td>Nomor</td><td><?=form_input('app_id',$app_id)?></td>
			<td>Tanggal</td><td><?=form_input('app_date',$app_date,"class='easyui-datetimebox'")?></td></tr>
			<tr><td>Nama Lengkap</td><td><?=form_input('cust_name',$cust_name)?></td>
				<td>Score </td><td><?=form_dropdown('score',array('0'=>'None','1'=>'Tidak Sesuai','2'=>'Sesuai'),$score);?></td></tr> 
			<tr><td>Kode Counter </td><td><?=form_input('dealer_id',$dealer_id);?></td>
				<td>Nama Counter </td><td><?=form_input('dealer_name',$dealer_name);?></td></tr> 
		</table>
		<div class="easyui-tabs" >
			<div title='DATA PRIBADI'><? include_once "personal.php" ?></div>
			<div title="ITEMS"> <? include_once "items.php" ?></div>
			<div title="ALAMAT"><? include_once "alamat.php" ?></div>
			<div title='PERHITUNGAN'><? include_once "angsuran.php" ?></div>
			<div title='KARTU KREDIT'><? include_once "kartukredit.php" ?></div>
			<div title='PEKERJAAN'><? include_once "pekerjaan.php" ?></div>
			<div title='PENGHASILAN'><? include_once "penghasilan.php" ?></div>
		</div>
		<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
	</form>
</div>

 

<script language='javascript'>
  	function save(){
  		if($('#app_id').val()==''){alert('Isi kode aplikasi !');return false;}
		url='<?=base_url()?>index.php/leasing/app_master/save';
		$('#frmMain').form('submit',{
			url: url, onSubmit: function(){	return $(this).form('validate'); },
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					$('#mode').val('view');
					log_msg('Data sudah tersimpan.');
					
				} else {
					log_err(result.msg);
				}
			}
		});
  	}
	 
	function load_help() {
		window.parent.$("#help").load("<?=base_url()?>index.php/help/load/tour");
	}
	 
</script>