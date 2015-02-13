<div><h1>JENIS PENDAPATAN</h1>
	<div class="thumbnail">
		<form id="frmNew" method="POST">
			<table width="400px">
				<tr>	
					<td>Kode</td><td><?=form_input('kode')?></td>
					<td>Keterangan</td><td colspan='4'><?=form_input('keterangan','',"style='width:400px;'")?></td>
				</tr><tr>	
					<td>Sifat</td><td><?=form_input('sifat')?></td>
					<td>Rumus?</td><td><?=form_input('is_variable','',"style='width:100px;'")?></td>
					<td>Ref Kolom PPh</td><td><?=form_input('ref_column')?></td>
					<td><?=link_button("Tambah","add_income()","save")?></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="thumbnail" >
			<table class="table1" width="400px">
				<thead><tr><td>Kode</td><td>Keterangan</td>
					<td>Sifat</td><td>Rumus</td>
					<td>Ref</td>
					<td>&nbsp;</td></tr></thead>
				<tbody>
					<?     			
					$CI =& get_instance();
					
					$sql="select * from jenis_tunjangan";
					$rst_item=$CI->db->query($sql);
					foreach($rst_item->result() as $row_item){
						echo "
						<tr><td>".$row_item->kode."</td>
						<td>".$row_item->keterangan."</td>
						<td>".$row_item->sifat."</td>
						<td>".$row_item->is_variable."</td>
						<td>".$row_item->ref_column."</td>
						<td>".link_button('',"del_income('".$row_item->kode."')","remove")."
						";
					}
					?>
					<tr></tr>
				</tbody>
			</table>
	</div>
</div>
<script language="JavaScript">
	function add_income(){
		url='<?=base_url()?>index.php/payroll/payroll/income_add';
			$('#frmNew').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
			            window.open(CI_ROOT+'payroll/income','_self');
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
 	}
 	function del_income(kode){
        xurl=CI_ROOT+'payroll/income_delete/'+kode;                             
        $.ajax({
            type: "GET",
            url: xurl,
            success: function(msg){
	            window.open(CI_ROOT+'payroll/income','_self');
            },
            error: function(msg){$.messager.alert('Info',msg);}
        });         
 	}
	
</script>