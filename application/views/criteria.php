<legend>Kriteria pencetakan</legend>
<div class="thumbnail box-gradient">
	<p><strong><?if(isset($caption))echo $caption?></strong></p>
	<p><i>Silahkan isi kriteria pencetakan untuk laporan [<?=$rpt_controller?>] di halaman ini dengan benar,
		kemudian tekan tombol print.</i>
	</p>
</div>

<div class=" ">		
	<?
if(!isset($target_window)){
	$target_window=" target='_blank_$rpt_controller'";
} else {
	$target_window="_self";
}
?>
<div class="row">
	<form id='frmPrint' method='post' 
	action="<?=base_url()?>index.php/<?=$rpt_controller?>" <?=$target_window?>">
	<div class="col-md-5">
		<?php
			if(!isset($select_date))$select_date=false;
			if(!isset($criteria1))$criteria1=false;
			if(!isset($criteria2))$criteria2=false;
			if(!isset($criteria3))$criteria3=false;
			if(!isset($module))$module="";
			if($select_date){
				echo "<strong>Dari Tanggal :</strong>
				  <p>".form_input('txtDateFrom',$date_from,'id=date 
						 class="easyui-datetimebox" required style="width:150px"')."</p>
				  <strong>Sampai Tanggal :</strong>
				  <p>".form_input('txtDateTo',$date_to,'id=date 
						 class="easyui-datetimebox" required style="width:150px"')."</p>
				";
			}
			if($criteria1){
				echo "<strong>".$label1."</strong>";
				echo "<p>".form_input('text1',$text1,"id='text1'");
				if(isset($ctr1))echo link_button("","lov1()","search"); 
				echo "</p>";
			}
			if($criteria2){
				echo "<strong>".$label2."</strong>";
				echo "<p>".form_input('text2',$text2,"id='text2'");
				if(isset($ctr2))echo link_button("","lov2()","search"); 
				echo "</p>";
				
			}
			if($criteria3){
				echo "<strong>".$label3."</strong>";
				echo "<p>".form_input('text3',$text3,"id='text3'");
				if(isset($ctr3))echo link_button("","lov3()","search"); 
				echo "</p>";
			}
		?>
	</div>
	<div class="col-md-3">
		<?	
			if($module==""){
				echo "<input type='submit' name='cmdPrint' value='Print'>";
			} 
			if($module=="posting"){
				echo "<input type='submit' name='cmdPosting' value='Posting'>";
				echo "<input type='submit' name='cmdUnPosting' value='UnPosting'>";	
			}
		?>
	</div>
	</form>

</div>
<!-- PILIHAN LOV 1 --> 

<? if(isset($ctr1)){ ?>

<div id='dlg1'class="easyui-dialog" style="width:600px;height:380px;padding:5px 5px"
     closed="true" buttons="#btn1">
		<table id="dg1" class="easyui-datagrid" data-options="singleSelect: true">
			<thead>	<tr> <? for($i=0;$i<count($fields1);$i++){ $field=$fields1[$i];
				echo "<th data-options=\"field:'".$field[0]."',width:'".$field[1]."'\">".$field[2]."</th>";
			}?>	</tr></thead>
		</table>
</div>
<div id="btn1" name="btn1" style="height:auto">
	<input  id="search1" style='width:100' name="search1" placeholder='Search'>
	<?=link_button("Cari","lov1()","search")?>
	<?=link_button("Pilih","lov1_ok()","ok")?>
</div>
<SCRIPT language="javascript">
	function lov1(){
		search=$('#search1').val(); $('#dlg1').dialog('open').dialog('setTitle','Pilihan');
		$('#dg1').datagrid({url:'<?=base_url()?>index.php/<?=$ctr1?>/'+search});
		$('#dg1').datagrid('reload');
	};	
	function lov1_ok(){
		var row = $('#dg1').datagrid('getSelected');
		if (row){
			$('#<?=$output1?>').val(row.<?=$key1?>); $('#dlg1').dialog('close');
		} else { alert("Pilih salah satu !"); }
	}	
</SCRIPT>

<? } ?>

<!-- END LOV1 -->

<!-- PILIHAN LOV 2 --> 
<? if(isset($ctr2)){ ?>

<div id='dlg2'class="easyui-dialog" style="width:600px;height:380px;padding:5px 5px"
     closed="true" buttons="#btn2">
		<table id="dg2" class="easyui-datagrid" data-options="singleSelect: true">
			<thead>	<tr> <? for($i=0;$i<count($fields2);$i++){ $field=$fields2[$i];
				echo "<th data-options=\"field:'".$field[0]."',width:'".$field[1]."'\">".$field[2]."</th>";
			}?>	</tr></thead>
		</table>
</div>
<div id="btn2" name="btn2" style="height:auto">
	<input  id="search2" style='width:100' name="search2" placeholder='Search'>
	<?=link_button("Cari","lov2()","search")?>
	<?=link_button("Pilih","lov2_ok()","ok")?>
</div>
<SCRIPT language="javascript">
	function lov2(){
		search=$('#search2').val(); $('#dlg2').dialog('open').dialog('setTitle','Pilihan');
		$('#dg2').datagrid({url:'<?=base_url()?>index.php/<?=$ctr2?>/'+search});
		$('#dg2').datagrid('reload');
	};	
	function lov2_ok(){
		var row = $('#dg2').datagrid('getSelected');
		if (row){
			$('#<?=$output2?>').val(row.<?=$key2?>); $('#dlg2').dialog('close');
		} else { alert("Pilih salah satu !"); }
	}	
</SCRIPT>

<? } ?>
<!-- END LOV2 -->

<!-- PILIHAN LOV 3 --> 
<? if(isset($ctr3)){ ?>

<div id='dlg3'class="easyui-dialog" style="width:600px;height:380px;padding:5px 5px"
     closed="true" buttons="#btn3">
		<table id="dg3" class="easyui-datagrid" data-options="singleSelect: true">
			<thead>	<tr> <? for($i=0;$i<count($fields3);$i++){ $field=$fields3[$i];
				echo "<th data-options=\"field:'".$field[0]."',width:'".$field[1]."'\">".$field[2]."</th>";
			}?>	</tr></thead>
		</table>
</div>
<div id="btn3" name="btn3" style="height:auto">
	<input  id="search3" style='width:100' name="search3" placeholder='Search'>
	<?=link_button("Cari","lov3()","search")?>
	<?=link_button("Pilih","lov3_ok()","ok")?>
</div>
<SCRIPT language="javascript">
	function lov3(){
		search=$('#search3').val(); $('#dlg3').dialog('open').dialog('setTitle','Pilihan');
		$('#dg3').datagrid({url:'<?=base_url()?>index.php/<?=$ctr3?>/'+search});
		$('#dg3').datagrid('reload');
	};	
	function lov3_ok(){
		var row = $('#dg3').datagrid('getSelected');
		if (row){
			$('#<?=$output3?>').val(row.<?=$key3?>); $('#dlg3').dialog('close');
		} else { alert("Pilih salah satu !"); }
	}	
</SCRIPT>

<? } ?>
<!-- END LOV2 -->


