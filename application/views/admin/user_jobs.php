<h1>KELOMPOK USER</h1> 
<?php
		error_reporting(E_ALL);

echo form_open(base_url().'index.php/jobs/add',"id='myform'");
echo "<div class='fld'><div class='label'>Group Id</div>".form_input('user_group_id',$user_group_id,"id='user_group_id'")."</div>";
echo "<div class='fld'><div class='label'>Group Name</div>".form_input('user_group_name',$user_group_name)."</div>";
echo "<div class='fld'><div class='label'>Description</div>".form_input('description',$description,'style=\'width:300px\'')."</div>";
echo "<div>";
echo link_button("Simpan", "simpan()","save");
echo "<div id='divDetail'>$modules</div>";
echo "</div>";
echo form_close();           
?>
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