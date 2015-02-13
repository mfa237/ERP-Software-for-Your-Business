<h4>FORMULIR AKAD KREDIT</h4>  
<div class="thumbnail">
	<?
	echo link_button('Save', 'loan_save()','save');		
	echo link_button('Print', 'loan_print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/leasing/loan/add');		
	echo link_button('Search','','search','true',base_url().'index.php/leasing/loan');		
	if($mode=="view") echo link_button('Refresh','','reload','true',base_url().'index.php/leasing/loan/view/'.$loan_id);		
	echo link_button('Delete', 'loan_delete()','remove');		
	if($posted) {
		echo link_button('UnPosting','','cut','true',base_url().'index.php/leasing/loan/unposting/'.$loan_id);		
	} else {
		echo link_button('Posting','','ok','true',base_url().'index.php/leasing/loan/posting/'.$loan_id);		
	}
	echo link_button('Help', 'loan_help()','help');
	$mode=="view"?$readonly=" readonly":$readonly="";
	$mode=="view"?$disable=" disabled":$disable="";
	
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
	<form id="frmLoan" method="post">
		<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
		<table style='width:100%' class='table2'>
			<tr><td>Nomor Kredit</td><td><?=form_input('loan_id',$loan_id,"id='loan_id' readonly")?></td>
				<td>Tanggal</td><td><?=form_input('loan_date',$loan_date,"id='loan_date' class='easyui-datetimebox'")?></td></tr>
			<tr><td>Nomor Permohonan </td>
				<td colspan='3'><?=form_input('app_id',$app_id,"id='app_id' ".$readonly);?> 
					<? if($mode=="add"){ ?>
						<input type='button' class='btn btn-info' onclick='cmdPilihSpk()' value='Pilih'>
						<input type='button' class='btn btn-info' onclick='cmdViewSpk()' value='View'>
					<?  } ?>					
				</td>
			</tr> 
			<tr><td>Kode Pelanggan </td><td><?=form_input('cust_id',$cust_id,'id="cust_id" disabled');?></td>
				<td>Nama Pelanggan </td><td><?=form_input('cust_name',$cust_name,'id="cust_name" disabled');?></td>
					</tr> 
			<tr><td>Jumlah Pinjaman</td><td><?=form_input('loan_amount',number_format($loan_amount),'id="loan_amount" disabled');?></td>
				<td>Tenor</td><td><?=form_input('max_month',$max_month,'id="max_month" disabled');?> bulan</td>
				</tr> 
			<tr><td>Angsuran Per Bulan</td><td><?=form_input('inst_amount',number_format($inst_amount),'id="inst_amount" disabled');?></td>
				<td>Status</td>
					<td><?=form_dropdown("status",array("0"=>"0 - Draft","1"=>"1 - Open","2"=>"2 - Close"),$status,"id='status' disabled")?>
					<? if($mode=="view" and $status==0){ ?>
					<input type='button' class='btn btn-info' onclick='frmLoanProses_Show()' value='Proses'>
					<? } ?>
				</td>
				</tr> 
			<tr><td>Nama Sales Agent (SA) </td><td><?=form_input('sales_name',$sales_name,'id="sales_name" disabled');?></td>
				<td>Kode Sales Agent </td><td><?=form_input('sales_id',$sales_id,'id="sales_id" disabled');?></td></tr> 
			<tr><td>Kode Counter </td><td><?=form_input('dealer_id',$dealer_id,'id="dealer_id" disabled');?></td>
				<td>Nama Counter </td><td><?=form_input('dealer_name',$dealer_name,'id="dealer_name" disabled');?></td></tr> 
		</table>
		
		<div class="easyui-tabs" >
			<div title="OBJECT ITEMS"> <? include_once "loan_items.php" ?></div>			 
			<? 
			if($mode=="view"){
				echo '<div title="SCHEDULE TAGIHAN">';
				include_once "invoice.php" ;
				echo '</div>';
			    include_once "jurnal_loan.php";
			}
			?>
		</div>
	</form>
</div>

<?
	include_once "loan_item_form.php";
	include_once "app_master_list.php";
	include_once "invoice_form.php";
?>

<div id='divLoan_Proses' name='divLoan_Proses' class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px" closed="true" 
	buttons="#tbProses">
	<legend>Proses Kontrak Kredit</legend>
	<p>Proses ini akan mengubah statur kontrak kredit dan membuatkan nomor 
	kontrak sebagai pengganti Draft Kontrak ini</p>
	<p>Silahkan isi tanggal penagihan tiap bulannya, maka setelah anda tekan 
	tombol SIMPAN program akan secara otomatis membuat daftar schedule 
	angsuran berdasarkan tenor yang telah disetujui dalam aplikasi kredit.</p>
	<p></p>
	<form method='post' id="frmLoan_Proses" name="frmLoan_Proses">
	<p>
		<?=my_input_date("Mulai Tanggal : ","tgl_tagih",$loan_date);?>
	<p></p>
		<?=my_input("Isi nomor kontrak : ","loan_id_new","01630");?>
	</p>
	<div class='clear'></div>
	<p>*tanggal yang dipilih akan menjadi tanggal penagihan bulan-bulan berikutnya</p>
	<p>*5 digit pertama harap diisi dengan 01630</p>
	<input type='hidden' id='frmLoan_Proses_loan_id' name='frmLoan_Proses_loan_id'>
	</form>
</div>
<div id="tbProses">
	<?=link_button("Batal","frmLoan_Proses_Close()","cancel");?>
	<?=link_button("Simpan","frmLoan_Proses_Save()","save");?>
</div>
<script language="javascript">
	function frmLoanProses_Show(){
		var loan_id=$('#loan_id').val();
		$("#loan_id_new").val("01630"+loan_id.substr(loan_id.length-6));
		$("#divLoan_Proses").dialog("open");
	}
	function frmLoan_Proses_Close(){
		$("#divLoan_Proses").dialog("close");		
	}	
	function frmLoan_Proses_Save(){
		var loan_id=$('#loan_id_new').val();
  		if(loan_id==''){alert('Isi nomor kontrak kredit !');return false;} 
		if(loan_id.length<5){alert("isi nomor kontrak kurang dari 5 digit !");return false}
		$("#frmLoan_Proses_loan_id").val($("#loan_id").val());
		
		
		url='<?=base_url()?>index.php/leasing/loan/proses';
		$('#frmLoan_Proses').form('submit',{
			url: url, onSubmit: function(){	return $(this).form('validate'); },
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					if(result.exist){
						alert("Nomor bill tersebut sudah ada, silahkan ganti dengan nomor lain.");
						$("#loan_id_new").val("");
					} else {
						log_msg('Data sudah tersimpan.');					
						var loan_id=$("#loan_id_new").val();
						window.open("<?=base_url()?>index.php/leasing/loan/view/"+loan_id,"_self");
					}
				} else {
					log_err(result.msg);
				}
			}
		});	
	}
</script>
<script language='javascript'>
  	function loan_save(){
  		if($('#loan_id').val()==''){alert('Isi nomor kontrak kredit !');return false;}
		url='<?=base_url()?>index.php/leasing/loan/save';
		$('#frmLoan').form('submit',{
			url: url, onSubmit: function(){	return $(this).form('validate'); },
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					$('#mode').val('view');
					log_msg('Data sudah tersimpan.');					
					window.open("<?=base_url()?>index.php/leasing/loan/view/"+$("#loan_id").val(),"_self");
				} else {
					//log_err(result.msg);
				}
			}
		});
  	}
	 
	function loan_help() {
		window.parent.$("#help").load("<?=base_url()?>index.php/help/load/loan");
	}
	function cmdPilihSpk(){
		dlgAppMaster_Show();		
	}
	function cmdViewSpk(){
		var app_id=$("#app_id").val();
		if(app_id==""){alert("Isi nomor SPK terlebih dahulu !");return false};
		var url="<?=base_url()?>index.php/leasing/app_master/view/"+app_id;
		add_tab_parent('ViewSpk_'+app_id,url);
	}
	function dlgAppMaster_Ok(){
		var mode="<?=$mode?>";
		if(mode!="add"){alert("Harus mode nambah !");return false};
		var row = $('#dgFindAppMaster').datagrid('getSelected');
		if (row){
			$("#loan_id").removeAttr('disabled');
			$("#loan_id").val("Draft-"+row.app_id);
			$('#app_id').val(row.app_id);
			$('#cust_name').val(row.cust_name);
			$('#cust_id').val(row.cust_id);
			$('#dealer_id').val(row.counter_id);
			$('#dealer_name').val(row.counter_name);
			$('#loan_amount').val(row.loan_amount);
			$('#max_month').val(row.inst_month);
			$('#sales_name').val(row.sales_name);
			$('#sales_id').val(row.sales_id);
			$('#dlgAppMaster').dialog('close');
		}
	}

</script>