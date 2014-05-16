<div class="col-sm-8"><h1>MODULE DEFINITION</h1> 
	<?=form_open(base_url().'index.php/modules/add',"id='myform'");?>
	<div class="thumbnail">
		<?=link_button("Simpan", "simpan()","save");?>
	</div>	
	<table>
		<tr>
			<? if($mode=='add'){ ?>
				<td>Modul Id</td><td><?=form_input('module_id',$module_id,"id='module_id'")?></td>
			<? } else { ?>
				<td>Module Id</td><td><?=$module_id?></td>
				<?=form_hidden('module_id',$module_id,"id='module_id'");?>	
			<? } ?>	
		</tr>
		<tr><td>Modul Name</td><td><?=form_input('module_name',$module_name)?></td></tr>
		<tr><td>Description</td><td><?=form_input('description',$description,'style=\'width:300px\'')?></td></tr>
		<tr><td>Type</td><td><?=form_input('type',$type)?></td></tr>
		<tr><td>Form Name</td><td><?=form_input('form_name',$form_name)?></td></tr>
		<tr><td>Parent Modul ID</td><td><?=form_input('parentid',$parentid)?></td></tr>
		<tr><td>Sequence</td><td><?=form_input('sequence',$sequence)?></td></tr>
		<tr><td>Controller</td><td><?=form_input('controller',$controller)?></td></tr>
	<?=form_hidden('mode',$mode);?>
	</table>
	<?=form_close();?>
	
</div>

<script>
	function simpan(){
		$('#myform').submit();
	}
</script>