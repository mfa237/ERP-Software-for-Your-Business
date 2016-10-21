<div class="thumbnail box-gradient">
	<?
	if(!isset($closed))$closed=false;
	if($closed=="")$closed=false;
	
	echo link_button('Add','','add','false',base_url().'index.php/jurnal/add');		
	echo link_button('Search','','search','false',base_url().'index.php/jurnal');		
	if($mode=="view") echo link_button('Refresh','','reload','false',base_url().'index.php/jurnal/view/'.$gl_id);		
	if($mode=="view") echo link_button('Delete','','cut','false',base_url().'index.php/jurnal/delete/'.$gl_id);		
	echo link_button('Print', 'print()','print');		
	
	echo "<div style='float:right'>";
	echo link_button('Help', 'load_help(\'jurnal\')','help');		
	?>
	<a href="#" class="easyui-splitbutton" data-options="plain:false,menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help('jurnal')">Help</div>
		<div onclick="show_syslog('jurnal','<?=$gl_id?>')">Log Aktifitas</div>

		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	</div>
</div>
<div class="thumbnail">

<?php if (validation_errors()) { ?>
	<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<h4>Terjadi Kesalahan!</h4> 
	<?php echo validation_errors(); ?>
	</div>
<?php } ?>
 <?php if($message!="") { ?>
<div class="alert alert-success"><? echo $message;?></div>
<? } ?>


<form id="frmItem" method='post' >
   <table class="table" width="100%">
	<tr>
		<td>Kode Jurnal</td><td>
		<?php echo form_input('gl_id',$gl_id,"id=gl_id"); ?>
                </td>
            <td>Jenis Transaksi</td><td><?php echo form_input('operation',$operation,'id=operation');?></td>
	</tr>	 
       <tr>
            <td>Tanggal</td><td><?php echo form_input('date',$date,'id=date 
             class="easyui-datetimebox" required style="width:150px"
			data-options="formatter:format_date,parser:parse_date"
			');?>
            </td>

            <td>Keterangan</td><td><?php echo form_input('source',$source,'id=source style="width:400px"');?></td>
			
       </tr>
   </table>
   <div id='divItem' >
		<table class="table" width="100%">
			<tr>
				<td>Kode Akun</td><td>Nama Akun</td><td>Debit</td><td>Credit</td><td>
			</tr>
			<tr>
			         <td><input id="account" style='width:80px' 
			         	name="account"   class="easyui-validatebox" required="true">
						<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="false" 
						onclick="lookup_coa();return false"></a>
			         </td>
			         <td><input id="description" name="description" style='width:180px'></td>
			        <td><input id="debit" name="debit"  style='width:80px'  class="easyui-validatebox" validType="numeric"></td>
			        <td><input id="credit" name="credit"  style='width:80px'  class="easyui-validatebox" validType="numeric"></td>
			        <td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'"  
             		   plain='false' onclick='save_item();return false;'>Add Item</a>
					</td>
			        <input type='hidden' id='transaction_id' name='transaction_id'>
			</tr>
		</table>   	
   </div>
</form>				
   	
	<table id="dgItemJurnal" class="easyui-datagrid" width="100%"  		
		data-options="
			iconCls: 'icon-edit',fitColumns:true,
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
	
</div></div>	
   
<?=load_view('gl/select_coa')?>   	
   
   
<script type="text/javascript">
    var closed='<?=$closed?>';
	
		function save_item(){
			if(closed){alert("Tidak bisa ubah jurnal ini karena sudah diclose!");return false;}
			
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
						log_msg('Data sudah tersimpan.');
					} else {
						log_err(result.msg);
					}
				}
			});
		}
		function deleteItem(){
			if(closed){alert("Tidak bisa ubah jurnal ini karena sudah diclose!");return false;}
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
			if(closed){alert("Tidak bisa ubah jurnal ini karena sudah diclose!");return false;}
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