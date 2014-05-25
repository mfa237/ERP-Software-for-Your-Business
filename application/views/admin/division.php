<div><h1>DIVISI</h1>
	<div class="thumbnail">
		<form id="frmNew" method="POST">
			<table width="400px">
				<tr>	
					<td>Kode</td><td><?=form_input('div_code')?></td>
					<td>Nama</td><td colspan='4'><?=form_input('div_name')?></td>
					<td><?=link_button("Tambah","add_divisi()","save")?></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="thumbnail" >
			<table class="table1" width="400px">
				<thead><tr><td>Kode</td><td>Nama Divisi</td>
					<td>&nbsp;</td></tr></thead>
				<tbody>
					<?     			
					$CI =& get_instance();
					
					$sql="select * from divisions";
					$rst_item=$CI->db->query($sql);
					foreach($rst_item->result() as $row_item){
						echo "
						<tr><td>".$row_item->div_code."</td>
						<td>".$row_item->div_name."</td>
						<td>".link_button('',"del_divisi('".$row_item->div_code."')","remove")."
						";
					}
					?>
					<tr></tr>
				</tbody>
			</table>
	</div>
</div>
<script language="JavaScript">
	function add_divisi(){
		url='<?=base_url()?>index.php/company/division_add';
			$('#frmNew').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
			            window.open(CI_ROOT+'company/division','_self');
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
 	}
 	function del_divisi(kode){
        xurl=CI_ROOT+'company/division_delete/'+kode;                             
        $.ajax({
            type: "GET",
            url: xurl,
            success: function(msg){
	            window.open(CI_ROOT+'company/division','_self');
            },
            error: function(msg){$.messager.alert('Info',msg);}
        });         
 	}
	
</script>