<div><h1>EMPLOYEE GROUP</h1>
	<div class="thumbnail">
		<form id="frmNew" method="POST">
			<table width="400px">
				<tr>	
					<td>Kode</td><td><?=form_input('kode')?></td>
					<td>Keterangan</td><td><?=form_input('keterangan')?></td>
					<td><?=link_button("Tambah","add_group()","save")?></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="thumbnail" >
			<table class="table1" width="400px">
				<thead><tr><td>Kode</td><td>Keterangan</td><td>&nbsp;</td></tr></thead>
				<tbody>
					<?     			
					$CI =& get_instance();
					
					$sql="select * from employee_group";
					$rst_item=$CI->db->query($sql);
					foreach($rst_item->result() as $row_item){
						echo "
						<tr><td><a href='".base_url()."index.php/payroll/slip/".$row_item->kode."' 
						title='Edit Komponen Slip Gaji'>".$row_item->kode."</a></td>
						<td>".$row_item->keterangan."</td>
						<td>".link_button('',"del_group('".$row_item->kode."')","remove")."
						";
					}
					?>
					<tr></tr>
				</tbody>
			</table>
	</div>
</div>
<script language="JavaScript">
	function add_group(){
		url='<?=base_url()?>index.php/employee/group_add';
			$('#frmNew').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
			            window.open(CI_ROOT+'employee/group','_self');
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
 	}
 	function del_group(kode){
        xurl=CI_ROOT+'employee/group_delete/'+kode;                             
        $.ajax({
            type: "GET",
            url: xurl,
            success: function(msg){
	            window.open(CI_ROOT+'employee/group','_self');
            },
            error: function(msg){$.messager.alert('Info',msg);}
        });         
 	}
	
</script>