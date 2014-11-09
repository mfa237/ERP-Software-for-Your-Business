<h4 class="thumbnail">ASSEMBLY ITEM NUMBER</h4>
	<div class="thumbnail">
		Kode Barang : <strong>
		<? 
		   echo link_button($item_number,'','reload','true',base_url().'index.php/product/view/'.$item_number);		
		?>
		
		</strong>  Nama Barang Jadi: <strong><?=$description?></strong>
	</div>

	<div class="thumbnail">
		<h5>Silahkan input data barang bahan/penyusun dibawah ini kemudian tekan tombol simpan</h5>
		<form id="frmNew" method="POST" >
			<table id="tbl">
				<tr>	
					<td>Kode Barang</td>
					<td>
						<input type="text" name="assembly_item_number" id="assembly_item_number" style="width:100px" placeholder="Item Number">
							<?=link_button('','searchItem()','search');?>						
					</td>
					<td>
						<?=link_button("Simpan","add_unit()","save")?>
					</td>
				</tr>
				<tr>	
					<td>Quantity</td> 
					<td>
						<input type="text" name="quantity" id="quantity" placeholder="Qty" style="width:50px">
					</td>
				</tr>
				<tr>	
					<td>Keterangan</td> 
					<td colspan='6'>
						<input type="text" name="comment" id="comment" style="width:100%" placeholder="Comment">
					</td>
				</tr>
			</table>
		</form>
	</div>
		<div class="thumbnail">
			<table id="tbl_unit" class="table" >
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
					<tr>
						
						
						
					</tr>
				</tbody>
			</table>
		</div>
<?

?>
<div id='dlgSearchItem'class="easyui-dialog" 
		style="width:500px;height:380px;padding:10px 20px"
        closed="true" buttons="#tb_search">
     <div id='divItemSearchResult'> 
		<table id="dgItemSearch" class="easyui-datagrid"  
			data-options="
				toolbar: '',
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