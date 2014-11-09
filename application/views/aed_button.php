<div class="thumbnail">
	<?
	
	echo link_button('Add','add_aed()','add');		
	echo link_button('Edit','edit_aed()','edit');		
	echo link_button('Save', 'save_aed()','save');		
	echo link_button('Search','search_aed()','search');		
	if($mode=="view") {
		echo link_button('Print', 'print_aed();return false;','print');		
		echo link_button('Refresh','refresh_aed();return false;','reload');
		echo link_button('Delete', 'delete_aed();return false;','remove');		
	}
	echo link_button('Posting','posting_aed()','ok');		
	echo link_button('Help', 'load_help()','help');		
	?>
	<a href="#" class="easyui-splitbutton" 
	data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
</div>
<script language="javascript">
	function load_help() {
		window.parent.$("#help").load("<?=base_url()?>index.php/help/load/<?=$help?>");
	}
</script>