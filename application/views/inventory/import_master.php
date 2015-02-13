<legend>
<?php 
	echo form_open_multipart(base_url()."index.php/inventory/import_excel","id='frmImport'");
?>
	<input type="file" name="file_excel" id="file_excel" size="150" stye="float:left" />
	<input type="button" value="Submit" onclick="dlgExcelSubmit()">  
	</form>
	<p class="help-block">Only Excel/CSV File Import.</p>
 <script language='javascript'>
	function import_excel(){
		$("#dlgExcel").dialog("open");
	}
	function dlgExcelSubmit(){
		var xurl='<?=base_url()?>index.php/inventory/import_excel';
		$('#dlgExcelForm').form('submit',{
			url: url, onSubmit: function(){
				return $(this).form('validate');
			},
			success: function(result){
				console.log(result);
				var result = eval('('+result+')');
				if (result.success){
					$('#dlgExcel').dialog('close')
					log_msg("Data sudah diimport, periksa data table search.");
				} else {
					log_err(result.msg);
				}
			}
		});
	}
</script>
