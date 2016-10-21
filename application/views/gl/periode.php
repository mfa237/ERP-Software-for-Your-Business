 <h4>FINANCIAL PERIODS</h4>
<div class="thumbnail box-gradient">
	<?
	echo link_button('Add','','add','false',base_url().'index.php/periode/add');		
	echo link_button('Search','','search','false',base_url().'index.php/periode');		
	echo link_button('Save', 'save_periode()','save');		
	echo link_button('Closing', 'closing_periode()','edit');		
	echo link_button('ReOpen', 'reopen_periode()','edit');		
	echo "<div style='float:right'>";
	echo link_button('Help', 'load_help(\'periode\')','help');		
	?>
	<a href="#" class="easyui-splitbutton" data-options="plain:false,menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help('periode')">Help</div>
		<div onclick="show_syslog('periode','<?=$period?>')">Log Aktifitas</div>

		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	</div>
</div> 
<?php 
	echo validation_errors();
	if($mode=='view'){
		echo form_open('periode/update','id=\'myform\' name=\'myform\' class=\'form-horizontal\' role=form');
		$disabled='disable';
	} else {
		$disabled='';
		echo form_open('periode/add','id=myform name=myform  class=form-horizontal  role=form'); 
	}
?>
<table class='table' width='100%'>
<? 
	echo my_input_tr("Periode Id",'period',$period);
	echo my_input_tr("Periode Month",'month_name',$month_name);
	echo my_input_tr("Year",'year_id',$year_id);
	echo my_input_tr("Sequence",'sequence',$sequence);
	echo my_input_tr("Start Dtae",'startdate',$startdate);
	echo my_input_tr("End Date",'enddate',$enddate);
	echo "<tr><td>Sudah Tutup Buku ?</td>
		<td colspan='2'>".form_radio('closed','No',$closed=='0'||$closed=='')
		." &nbsp No ".form_radio('closed','Yes',!($closed=='0'||$closed==''))
		." &nbsp Yes </td></tr>";
	echo form_close();
?>
<script type="text/javascript">
    function save_periode(){
        if($('#period').val()===''){alert('Isi dulu kode periode !');return false;};
        if($('#year_id').val()===''){alert('Isi dulu tahun !');return false;};
        $('#myform').submit();
    }
</script>  

 	<script type="text/javascript">
		function load_help() {
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/periode");
		}
	</script>
	
