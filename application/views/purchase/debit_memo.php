<h1>PROSES DEBIT MEMO - HEADER  </H1>
<form id="frmCrDb"  method="post">
   <table>
		<tr>
		<td>Nomor Bukti</td>
			<td>
				<?php echo form_input('kodecrdb',$kodecrdb,"id=kodecrdb"); ?>
            </td>
        </tr>	 
        <tr>
            <td>Tanggal</td><td><?php echo form_input('tanggal',$tanggal,'id=tanggal 
             class="easyui-datetimebox" required style="width:150px"');?>
            </td>
        </tr>
       <tr>
            <td>Faktur</td>
            <td><?=form_input('docnumber',$docnumber,'id=docnumber"');?>
            	<?=link_button("",'cari_faktur()','search','true')?>
            </td>
       </tr>
       <tr>
       		<td>Jumlah: </td>
       		<td><?php echo form_input('amount',$amount,'id=amount');?></td>
      </tr>
       <tr>
            <td>Keterangan</td>
            <td colspan="6">
            	<?php echo form_input('keterangan',$keterangan,'id=keterangan style="width:300px"');?>
            </td>
       </tr>
       <tr><td colspan="4">
       	<? if($mode=='add'){  echo link_button("Save",'save()','save','true'); } ?>
       </td></tr>
   </table>
</form>
<h1>DEBIT MEMO - PILIH KODE PERKIRAAN</H1>
<div id='divItem' style=''>
	<div id='dgItem'>
		<table>
			<tr>
				<td>Kode Akun</td><td>Nama Akun</td><td>Jumlah</td><td>
			</tr>
			<tr>
			    <form id="frmItem" method='post' >
			         <td><input id="account" style='width:80' 
			         	name="account"   class="easyui-validatebox" required="true">
						<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
						onclick="lookup_coa()"></a>
			         </td>
			         <td><input id="description" name="description" style='width:280'></td>
			        <td><input id="amount" name="amount"  style='width:80'  class="easyui-validatebox" validType="numeric"></td>
			        <td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'"  
             		   plain='true'	onclick='save_item()'></a>
					</td>
			        <input type='hidden' id='kodecrdb_no' name='kodecrdb_no'>
			        <input type='hidden' id='line_number' name='line_number'>
			    </form>				
			</tr>
		</table>		
	</div>
	<table id="dg" class="easyui-datagrid"  
		data-options="
			iconCls: 'icon-edit',
			singleSelect: true,
			toolbar: '#tb',
			url: '<?=base_url()?>index.php/crdb/items/<?=$kodecrdb?>/json'
		">
		<thead>
			<tr>
				<th data-options="field:'account',width:80">Kode Akun</th>
				<th data-options="field:'description',width:150">Nama Perkiraan</th>
				<th data-options="field:'amount',width:60,align:'right',editor:'numberbox'">Jumlah</th>
				<th data-options="field:'line_number',width:30,align:'right'">Line</th>
			</tr>
		</thead>
	</table>
</div>

<!-- DIALOG KODE PERKIRAAN -->
<div id='dlgCoa' class="easyui-dialog"  style="width:400px;height:380px;padding:10px 20px" closed="true">
		<table id="dgCoa" class="easyui-datagrid"  
		data-options="toolbar: '#tbCoa', singleSelect: true,
			url: '<?=base_url()?>index.php/coa/filter'">
			<thead>
				<tr>
					<th data-options="field:'account',width:80">Kode Barang</th>
					<th data-options="field:'description_description',width:150">Nama Barang</th>
					<th data-options="field:'id',width:30">ID</th>
				</tr>
			</thead>
		</table>
</div>
<div id="tbCoa" style="height:auto">
	Enter Text: <input  id="search_coa" style='width:180' name="search_coa">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
	onclick="search_coa()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="select_coa()">Select</a>
</div>
<script type="text/javascript">
	function lookup_coa() {
		$('#dgCoa').dialog('open').dialog('setTitle','Cari kode perkiraan');
		coa=$('#search_coa').val();
		$('#dgCoa').datagrid({url:'<?=base_url()?>index.php/coa/filter/'+coa});
		$('#dgCoa').datagrid('reload');
	}
	function select_coa() {
		var row = $('#dgCoa').datagrid('getSelected');
		if (row){
			$('#account').val(row.account);
			$('#description').val(row.description);
			$('#dgCoa').dialog('close');
		}			
	}
</script>
<!-- END DIALOG KODE PERKIRAAN -->


<script type="text/javascript">
	var url;	
    function save(){
        if($('#kodecrdb').val()==''){alert('Isi nomor bukti !');return false;}
        if($('#docnumber').val()==''){alert('Isi nomor faktur !');return false;}
		url='<?=base_url()?>index.php/crdb/save';
		$('#frmCrDb').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					$('#kodecrdb').val(result.kodecrdb);
					$.messager.show({
						title:'Success',msg:'Data sudah tersimpan. Silahkan pilih kode perkiraan.'
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
		function save_item(){
			url = '<?=base_url()?>index.php/sales_order/save_item';
			$('#so_number').val($('#sales_order_number').val());
						 
			$('#frmItem').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dg').datagrid('reload');
						$('#frmCrDb').form('clear');
						$('#account').val('');
						$('#description').val('');
						$('#linenumber').val('');
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
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this line?',function(r){
					if (r){
						url='<?=base_url()?>index.php/crdb/delete_item';
						$.post(url,{linenumber:row.linenumber},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}
		function editItem(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				console.log(row);
				$('#frmCrDb').form('load',row);
				$('#account').val(row.account);
				$('#description').val(row.description);
				$('#amount').val(row.amount);
				$('#linenumber').val(row.line_number);
				$('#kodecrdb_id').val(row.kodecrdb);
			}
		}
    
</script>
