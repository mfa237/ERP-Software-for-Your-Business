<h1>MODULE DEFINITION</h1> 
<?php
echo form_open(base_url().'index.php/modules/add',"id='myform'");
if($mode=='add'){
	echo "<div class='fld'><div class='label'>Modul Id</div>".form_input('module_id',$module_id,"id='module_id'")."</div>";	
} else {
	echo "<div class='fld'><div class='label'>Modul Id</div>$module_id";
	echo form_hidden('module_id',$module_id,"id='module_id'");	
	echo "</div>";	
}
echo "<div class='fld'><div class='label'>Modul Name</div>".form_input('module_name',$module_name)."</div>";
echo "<div class='fld'><div class='label'>Description</div>".form_input('description',$description,'style=\'width:300px\'')."</div>";
echo "<div class='fld'><div class='label'>Type</div>".form_input('type',$type)."</div>";
echo "<div class='fld'><div class='label'>Form Name</div>".form_input('form_name',$form_name)."</div>";
echo "<div class='fld'><div class='label'>Parent Modul ID</div>".form_input('parentid',$parentid)."</div>";
echo "<div class='fld'><div class='label'>Sequence</div>".form_input('sequence',$sequence)."</div>";
echo "<div class='fld'><div class='label'>Controller</div>".form_input('controller',$controller)."</div>";
echo form_hidden('mode',$mode);
echo "<div>";
echo link_button("Simpan", "simpan()","save");
echo "</div>";
echo form_close();           
?>
<div class='message'><?=$message?></div>

<script>
	function simpan(){
		$('#myform').submit();
	}
</script>