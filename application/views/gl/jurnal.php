<form id="frmItem" method='post' >
   <table>
	<tr>
		<td>Kode Jurnal</td><td>
		<?php echo form_input('gl_id',$gl_id,"id=gl_id"); ?>
                </td>
	</tr>	 
       <tr>
            <td>Tanggal</td><td><?php echo form_input('date',$date,'id=date 
             class="easyui-datetimebox" required style="width:150px"');?>
            </td>
       </tr>
       <tr>
            <td>Jenis Transaksi</td><td><?php echo form_input('operation',$operation,'id=operation');?></td>
       </tr>
       <tr>
            <td>Keterangan</td><td><?php echo form_input('source',$source,'id=source style="width:400px"');?></td>
       </tr>
       <tr><td></td><td></td></tr>
       <tr>
           <td colspan="4" align="left"> 
           </td>
       </tr>
	 <tr><td> 
	 </td><td>&nbsp;</td></tr>
   </table>
   <div id='divItem' >
		<table>
			<tr>
				<td>Kode Akun</td><td>Nama Akun</td><td>Debit</td><td>Credit</td><td>
			</tr>
			<tr>
			         <td><input id="account" style='width:80' 
			         	name="account"   class="easyui-validatebox" required="true">
						<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
						onclick="lookup_coa()"></a>
			         </td>
			         <td><input id="description" name="description" style='width:280'></td>
			        <td><input id="debit" name="debit"  style='width:80'  class="easyui-validatebox" validType="numeric"></td>
			        <td><input id="credit" name="credit"  style='width:80'  class="easyui-validatebox" validType="numeric"></td>
			        <td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'"  
             		   plain='true'	onclick='save_item()'></a>
					</td>
			        <input type='hidden' id='transaction_id' name='transaction_id'>
			</tr>
		</table>   	
   </div>
</form>				
   	
	<table id="dgItemJurnal" class="easyui-datagrid"  		
		style="width:800px;min-height:800px"
		data-options="
			iconCls: 'icon-edit',
			singleSelect: true,
			toolbar: '#tb',
			url: '<?=base_url()?>index.php/jurnal/items/<?=$gl_id?>'
		">
		<thead>
			<tr>
				<th data-options="field:'account',width:80">Kode Akun</th>
				<th data-options="field:'account_description',width:150">Nama Perkiraan</th>
				<th data-options="field:'debit',width:60,align:'right'">Debit</th>
				<th data-options="field:'credit',width:60,align:'right'">Credit</th>
				<th data-options="field:'source',width:150">Source</th>
				<th data-options="field:'operation',width:150">Operation</th>
				<th data-options="field:'transaction_id',width:30,align:'right'">Line</th>
			</tr>
		</thead>
	</table>
	<div id="tb" style="height:auto">
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editItem()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteItem()">Delete</a>	
	</div>
	
	
   
<?=load_view('gl/select_coa')?>   	
   
   
<script type="text/javascript">
    
		function save_item(){
			url = '<?=base_url()?>index.php/jurnal/save_item';
			$('#frmItem').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						gl_id=$('#gl_id').val();
						url='<?=base_url()?>index.php/jurnal/items/'+gl_id;
						$('#dgItemJurnal').datagrid('reload');
						$('#account').val('');
						$('#description').val('');
						$('#debit').val('0');
						$('#credit').val('0');
						$('#transaction_id').val('');
						$.messager.show({
							title: 'Success',
							msg: 'Success'
						});
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		function deleteItem(){
			var row = $('#dgItemJurnal').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this line?',function(r){
					if (r){
						url='<?=base_url()?>index.php/jurnal/delete_item/'+row.transaction_id;
						$.post(url,function(result){
							if (result.success){
								$('#dgItemJurnal').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			$('#dgItemJurnal').datagrid('reload');
			}
		}
		function editItem(){
			var row = $('#dgItemJurnal').datagrid('getSelected');
			if (row){
				$('#frmItem').form('load',row);
				$('#account').val(row.account);
				$('#account_description').val(row.account_description);
				$('#debit').val(row.debit);
				$('#credit').val(row.credit);
				$('#transaction_id').val(row.transaction_id);
			}
		}
    
</script>
    
