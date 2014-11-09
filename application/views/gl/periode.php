<div><h4>FINANCIAL PERIODS</h4>
<div class="thumbnail">
	<?
	echo link_button('Save', 'save_periode()','save');		
	echo link_button('Closing', 'closing_periode()','save');		
	echo link_button('ReOpen', 'reopen_periode()','edit');		
	echo link_button('Refresh','','reload','true',base_url().'index.php/periode');		
	echo link_button('Help', 'load_help()','help');		
	?>
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
</div> 
<div class="thumbnail">	<?php echo validation_errors(); ?>
   
   <div class='row'>
	<div class='col-md-6'>
	<?php 
		if($mode=='view'){
			echo form_open('periode/update','id=myform name=myform class=form-horizontal role=form');
			$disabled='disable';
		} else {
			$disabled='';
			echo form_open('periode/add','id=myform name=myform  class=form-horizontal  role=form'); 
		}
	?>
		<div class="form-group">
			<div class='label' class="col-sm-2 control-label">Periode Id</div>
            <div class="col-sm-4 col-md-offset-1">
                <input id="period" name="period" type="text" value="<?=$period?>" class="form-control">
            </div>
        </div>	
		<div class="form-group">
			<div class='label' class="col-sm-2 control-label">Tahun</div>
            <div class="col-sm-4 col-md-offset-1">
                <input id="year_id" name="year_id" type="text" value="<?=$year_id?>" class="form-control">
            </div>
        </div>
		<div class="form-group">
			<div class='label' class="col-sm-2 control-label">Urutan</div>
            <div class="col-sm-4 col-md-offset-1">
                <input id="sequence" name="sequence" type="text" value="<?=$sequence?>" class="form-control">
            </div>
        </div>	
		<div class="form-group">
			<div class='label' class="col-sm-2 control-label">Tanggal Awal</div>
            <div class="col-sm-4 col-md-offset-1">
                <input id="startdate" name="startdate" type="text" value="<?=$startdate?>" class="form-control easyui-datetimebox" style="width:150px">
            </div>
        </div>	
		<div class="form-group">
			<div class='label' class="col-sm-2 control-label">Tanggal Akhir</div>
            <div class="col-sm-4 col-md-offset-1">
                <input id="enddate" name="enddate" type="text" value="<?=$enddate?>" class="form-control easyui-datetimebox" style="width:150px">
            </div>
        </div>	
		<div class="form-group">
			<div class='label' class="col-sm-2 control-label">Sudah Tutup Buku ?</div>
            <div class="col-sm-4 col-md-offset-1">
				    <?php echo form_radio('closed','No',$closed=='0'||$closed=='');?>No
					<?php echo form_radio('closed','Yes',!($closed=='0'||$closed==''));?>Yes
            </div>
        </div>	

		<? 	echo form_close(); 	?>
 
	</div>	 
   </div>
</div>
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
	
