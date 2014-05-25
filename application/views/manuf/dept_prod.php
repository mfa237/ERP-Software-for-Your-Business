<div><div class="thumbnail">
<legend>DEPARTEMENT PRODUKSI</legend>

	<?
	echo link_button('Save', 'save_this()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/dept_prod/add');		
	echo link_button('Search','','search','true',base_url().'index.php/dept_prod');		
	echo link_button('Help', 'load_help()','help');		
	
	?>
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	<script type="text/javascript">
		function load_help() {
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/dept_prod");
		}
	</script>
	
</div></H1>
<div class="thumbnail">	

<?php if (validation_errors()) { ?>
	<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<h4>Terjadi Kesalahan!</h4> 
	<?php echo validation_errors(); ?>
	</div>
<?php } ?>
 <?php if($message!="") { ?>
<div class="alert alert-success"><? echo $message;?></div>
<? } ?>


<form id="myform" role="form" method="post" action="<?=base_url()?>index.php/dept_prod/save"  class="form-horizontal" >
	<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
	<div class="form-group">
	<label for="dept_code" class="col-sm-3 control-label">Kode Department</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="dept_code" name="dept_code" value="<?=$dept_code?>" placeholder="">
		</div>
	</div>

	<div class="form-group">
	<label for="dept_name" class="col-sm-3 control-label">Nama Department</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="dept_name" name="dept_name" value="<?=$dept_name?>" placeholder="dept_name">
		</div>
	</div>

	</form>
</div>

<script type="text/javascript">
    function save_this(){
        if($('#dept_code').val()===''){alert('Isi dulu kode departments !');return false;};
        $('#myform').submit();
    }
</script>  

 