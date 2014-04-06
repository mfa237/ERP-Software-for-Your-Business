<h1>SUPPLIER ALTERNATIF</h1>
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
						<td>Kode Supplier</td><td>Nama Supplier</td>
						<td>Lead Time</td><td>Harga Beli</td>
						<td>&nbsp;</td>
					</tr>
				</thead>
				<tbody>
					<?     			
					$CI =& get_instance();
					
					$sql="select a.supplier_number,s.supplier_name,a.supplier_item_number,a.lead_time,a.cost
					 from inventory_suppliers a 
					 left join suppliers s on s.supplier_number=a.supplier_number
					  where a.item_number='$item_number'";
					$rst_item=$CI->db->query($sql);
					foreach($rst_item->result() as $row_item){
						echo "<tr><td>".$row_item->supplier_number."</td>
						<td>".$row_item->supplier_name."</td>
						<td>".$row_item->lead_time."</td>
						<td>".$row_item->cost."</td>
						<td>".link_button('',"del_item('".$row_item->supplier_number."')","remove")."
												
						";
					}
					?>
					<tr></tr>
				</tbody>
			</table>
		</div>
		<div>
			<form id="frmNew" method="POST" class="box6">
				<h3>Silahkan input data supplier alternatif dibawah ini kemudian tekan tombol simpan</h3>
				<table id="tbl">
					<tr>	
						<td>Kode Supplier</td><td><input type="text" name="supplier_number" id="supplier_number">
							<?=link_button('','searchItem()','search');?>
						</td>
					</tr>
					<tr>	
						<td>Lead Time (Day)</td><td><input type="text" name="lead_time" id="lead_time"></td>
					</tr>
					<tr>	
						<td>Harga Beli</td><td><input type="text" name="cost" id="cost"></td>
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
				url: '<?=base_url()?>index.php/supplier/select'
			">
			<thead>
				<tr>
					<th data-options="field:'supplier_name',width:150">Nama Supplier</th>
					<th data-options="field:'supplier_number',width:80">Kode Supplier</th>
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
		url='<?=base_url()?>index.php/inventory/supplier_add/<?=$item_number?>';
			$('#frmNew').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
			            window.open(CI_ROOT+'inventory/supplier/<?=$item_number?>','_self');
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
        xurl=CI_ROOT+'inventory/supplier_delete/<?=$item_number?>/'+kode;                             
        $.ajax({
            type: "GET",
            url: xurl,
            success: function(msg){
	            window.open(CI_ROOT+'inventory/supplier/<?=$item_number?>','_self');
            },
            error: function(msg){$.messager.alert('Info',msg);}
        });         
 	}
	function searchItem()	{
			$('#dlgSearchItem').dialog('open').dialog('setTitle','Cari data supplier');
			nama=$('#search_item').val();
			xurl='<?=base_url()?>index.php/supplier/select/'+nama;
			$('#dgItemSearch').datagrid({url:xurl});
			$('#dgItemSearch').datagrid('reload');
	}
	function selectSearchItem()
		{
			var row = $('#dgItemSearch').datagrid('getSelected');
			if (row){
				$('#supplier_number').val(row.supplier_number);
				$('#dlgSearchItem').dialog('close');
			}
			
		}
	
</script>