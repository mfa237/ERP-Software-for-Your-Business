<div id="tb_search" style="height:auto">
	<div style="float:left">
	Enter Text: <input  id="search_item" style='width:180' name="search_item">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="false" 
	onclick="searchItem();return false;">Search</a>        
	</div>
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="false" onclick="selectSearchItem();return false;">Select</a>
</div>

<div id='dlgSearchItem'class="easyui-dialog" style="width:500px;height:380px;"
        closed="true" buttons="#tb_search">
     <div id='divItemSearchResult'> 
		<table id="dgItemSearch" class="easyui-datagrid"  
			data-options="
				toolbar: '',
				singleSelect: true,
				url: ''
			">
			<thead>
				<tr>
					<th data-options="field:'description',width:150">Nama Barang</th>
					<th data-options="field:'item_number',width:80">Kode Barang</th>
					<th data-options="field:'category',width:80">Kelompok</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>


<script type="text/javascript">


		function find(){
		    xurl=CI_ROOT+'inventory/find/'+$('#item_number').val();
		    console.log(xurl);
		    $.ajax({
		                type: "GET",
		                url: xurl,
		                data:'item_no='+$('#item_number').val(),
		                success: function(msg){
		                    var obj=jQuery.parseJSON(msg);
		                    $('#item_number').val(obj.item_number);
		                    $('#price').val(obj.retail);
		                    //$('#cost').val(obj.cost);
		                    //$('#unit').val(obj.unit_of_measure);
		                    $('#description').val(obj.description);
		                    hitung();
		                },
		                error: function(msg){alert(msg);}
		    });
		};
		function selectSearchItem()
		{
			var row = $('#dgItemSearch').datagrid('getSelected');
			if (row){
				$('#item_number').val(row.item_number);
				$('#description').val(row.description);
				find();
				$('#dlgSearchItem').dialog('close');
			}
			
		}
		function searchItem()
		{
			$('#dlgSearchItem').dialog('open').dialog('setTitle','Cari data barang');
			nama=$('#search_item').val();
			$('#dgItemSearch').datagrid({url:'<?=base_url()?>index.php/inventory/filter/'+nama});
			$('#dgItemSearch').datagrid('reload');

		}

		
</script>