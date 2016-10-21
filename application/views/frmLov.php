<!-- DIALOG FOR LOOKUP -->
<div id='dlg<?=$dlgId?>' class="easyui-dialog"  background='black'
style="width:<?=$dlgWidth?>;height:<?=$dlgHeight?>;padding:5px 5px"
closed="true"  toolbar="#<?=$dlgTool?>"
>
	<table id="dg<?=$dlgId?>" class="easyui-datagrid"  
	data-options="toolbar: '', singleSelect: true, fitColumns: true,
		url: '<?=$dlgUrlQuery?>'">
		<thead>
			<tr>
			<?php foreach($dlgCols as $col) { 
				$fieldname=$col["fieldname"];
				$width=$col["width"];
				$caption=$col["caption"];
			?> 
				<th data-options="field:'<?=$fieldname?>',
				width:'<?=$width?>'"><?=$caption?></th>
			<?php } ?>
			</tr>
		</thead>
	</table>
</div>
<div id="<?=$dlgTool?>" class='box-gradient'>
	Enter Text: <input  id="dlg<?=$dlgId?>_search_id" style='width:180' 
	name="dlg<?=$dlgId?>_search_id">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search"  
		onclick="dlg<?=$dlgId?>_search();return false;">Filter</a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok"   
		onclick="dlg<?=$dlgId?>_select();return false;">Select</a>
</div>

<script type="text/javascript">
	var idd='';
	function dlg<?=$dlgId?>_show() {
		idd="<?=$dlgBindId?>";
		$('#dlg<?=$dlgId?>').dialog('open').dialog('setTitle','<?=$dlgTitle?>');
		search_id=$('#dlg<?=$dlgId?>_search_id').val();
		$('#dg<?=$dlgId?>').datagrid({url:'<?=$dlgUrlQuery?>'+search_id});
		$('#dg<?=$dlgId?>').datagrid('reload');
	}
	function dlg<?=$dlgId?>_select() {
		var row = $('#dg<?=$dlgId?>').datagrid('getSelected');
		if (row){
			<?=$dlgRetFunc?>
			$('#dlg<?=$dlgId?>').dialog('close');
		}			
	}
	function dlg<?=$dlgId?>_search(){
		search_id=$('#dlg<?=$dlgId?>_search_id').val();
		$('#dg<?=$dlgId?>').datagrid({url:'<?=$dlgUrlQuery?>'+search_id});
	}
</script>
<!-- END DIALOG -->