<h1>ASSEMBLY ITEM NUMBER</h1>
<table class="table1x" style="width:500px">
	<tr>
		<td>Kode Barang</td><td><?=$item_number?></td>
	</tr>
	<tr>
		<td>Nama Barang</td><td><?=$description?></td>		
	</tr>
	<tr><td colspan="4">
		<div >
			<table id="tbl_unit" class="table1" style="width:500px">
				<thead>
					<tr>
						<td>Kode Barang</td><td>Nama barang / bahan</td><td>Qty</td><td>Catatan</td>
						<td>&nbsp;</td>
					</tr>
				</thead>
				<tbody>
					<?     			
					$CI =& get_instance();
					
					$sql="select a.assembly_item_number,s.description,a.quantity,a.comment
					 from inventory_assembly a 
					 left join inventory s on s.item_number=a.assembly_item_number
					  where a.item_number='$item_number'";
					$rst_item=$CI->db->query($sql);
					foreach($rst_item->result() as $row_item){
						echo "<tr><td>".$row_item->assembly_item_number."</td>
						<td>".$row_item->description."</td>
						<td>".$row_item->quantity."</td>
						<td>".$row_item->comment."</td>
						<td>".link_button('',"del_item('".$row_item->assembly_item_number."')","remove")."
												
						";
					}
					?>
					<tr></tr>
				</tbody>
			</table>
		</div>
		<div>
			<form id="frmNew" method="POST" class="box6">
				<h3>Silahkan input data barang bahan/penyusun dibawah ini kemudian tekan tombol simpan</h3>
				<table id="tbl">
					<tr>	
						<td>Kode Barang</td><td><input type="text" name="assembly_item_number" id="assembly_item_number">
							<?=link_button('','searchItem()','search');?>
						</td>
					</tr>
					<tr>	
						<td>Quantity</td><td><input type="text" name="quantity" id="quantity"></td>
					</tr>
					<tr>	
						<td>Keterangan</td><td><input type="text" name="comment" id="comment" style="width:400px"></td>
					</tr>
					<tr><td colspan="2"></td> </tr>
					 
				</table>
				<?=link_button("Tambah","add_unit()","save")?>
			</form>
		</div>
	</td></tr>
</table>
<?

?>
<div id='dlgSearchItem'class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
        closed="true" buttons="#dlg-buttons">
     <div id='divItemSearchResult'> 
		<table id="dgItemSearch" class="easyui-datagrid"  
			data-options="
				toolbar: '#tb_search',
				singleSelect: true,
				url: '<?=base_url()?>index.php/inventory/filter'
			">
			<thead>
				<tr>
					<th data-options="field:'description',width:150">Nama Barang</th>
					<th data-options="field:'item_number',width:80">Kode Barang</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>	   
<div id="tb_search" style="height:auto">
	Enter Text: <input  id="search_item" style='width:180' 
 	name="search_item">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
	onclick="searchItem()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selectSearchItem()">Select</a>
</div>

<script language="JavaScript">
	function add_unit(){
		url='<?=base_url()?>index.php/inventory/assembly_add/<?=$item_number?>';
			$('#frmNew').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
			            window.open(CI_ROOT+'inventory/assembly/<?=$item_number?>','_self');
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
 	}
 	function del_item(kode){
        xurl=CI_ROOT+'inventory/assembly_delete/<?=$item_number?>/'+kode;                             
        $.ajax({
            type: "GET",
            url: xurl,
            success: function(msg){
	            window.open(CI_ROOT+'inventory/assembly/<?=$item_number?>','_self');
            },
            error: function(msg){$.messager.alert('Info',msg);}
        });         
 	}
	function searchItem()	{
			$('#dlgSearchItem').dialog('open').dialog('setTitle','Cari data barang');
			nama=$('#search_item').val();
			xurl='<?=base_url()?>index.php/inventory/filter/'+nama;
			$('#dgItemSearch').datagrid({url:xurl});
			$('#dgItemSearch').datagrid('reload');
	}
	function selectSearchItem()
		{
			var row = $('#dgItemSearch').datagrid('getSelected');
			if (row){
				$('#assembly_item_number').val(row.item_number);
				$("#quantity").val(1);
				$('#dlgSearchItem').dialog('close');
			}
			
		}
	
</script>