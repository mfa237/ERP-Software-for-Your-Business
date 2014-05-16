<div><h1>KELOMPOK USER<div class="thumbnail">
	<?=link_button('Save', 'simpan()','save');?>
</div></H1>
<div class="thumbnail">
	<?php	
		echo form_open(base_url().'index.php/jobs/add',"id='myform'");
	?>
	<table>	
	<tr><td>Group Id</td><td><?=form_input('user_group_id',$user_group_id,"id='user_group_id'")?></td></tr>
	<tr><td>Group Name</td><td><?=form_input('user_group_name',$user_group_name,"id='user_group_name'")?></td></tr>
	<tr><td>Description</td><td><?=form_input('description',$description,"id='description'")?></td></tr>
	</table>

	<div id='divDetail'><?=$modules?></div>

	<?=form_close();?>

</div>	
<script>
	function simpan(){
		$('#myform').submit();
	}
	function load_modules(){
		if($('#user_group_id').val()==""){alert("Isi Kode kelompok !");return false};
		url=CI_ROOT+'jobs/list_modules/'+$('#user_group_id').val();
		get_this(url,'','divDetail');
		return true;
	}
</script>