<div><div class="thumbnail">
<legend>WORK ORDER</legend>

	<?
	echo link_button('Save', 'save_this()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/workorder/add');		
	echo link_button('Search','','search','true',base_url().'index.php/workorder');		
	echo link_button('Help', 'load_help()','help');		
	
	?>
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	<script type="text/javascript">
		function load_help() {
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/employee");
		}
	</script>
	
</div></H1>


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


<form id="frmWo" method='post'>
	<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
	<table>
		<tbody>
			<tr><td>WO Number</td><td><?=form_input("work_order_no",$work_order_no,"id='work_order_no'")?></td></tr>
			<tr><td>Start Date</td><td><?=form_input("start_date",$start_date,"id='start_date' class='easyui-datetimebox' style='width:150px'")?></td></tr>
			<tr><td>Expect Date</td><td><?=form_input("expected_date",$expected_date,"id='expected_date' class='easyui-datetimebox' style='width:150px'")?></td></tr>
			<tr><td>Customer</td><td><?=form_input("customer_number",$customer_number,"id='customer_number'")?>
				<?=link_button('','lookup_customer()','search');?>
				<?=form_input("company",$company,"id='company'");?>
			</td></tr>
			<tr><td>SO Number</td><td><?=form_input("sales_order_number",$sales_order_number,"id='sales_order_number'")?>
				<?=link_button('','lookup_sales_order()','search');?>
			</td></tr>
			<tr><td>Status</td><td><?=form_input("wo_status",$wo_status,"id='wo_status'")?></td></tr>
			<tr><td>Special Order</td><td><?=form_input("special_order",$special_order,"id='special_order'")?></td></tr>
		</tbody>
	</table>
</form> 

<!-- ITEM TO PROCESS -->
<h5>ITEMS</H5>
<div id='divItem'>
	<div id='dgItem'>
		<table>
			<thead>
				<tr><td>Item Number</td><td>Description</td><td>Qty</td><td>Unit</td></tr>
			</thead>
			<tbody>
				<tr>
					<form id="frmItem" method='post' >
						 <td><input id="item_number" style='width:80px' 
							name="item_number"   class="easyui-validatebox" required="true">
							<?=link_button('','searchItem()','search');?>
						 </td>
						 <td><input id="description" name="description" style='width:200px'></td>
						 <td><input id="quantity"  style='width:50px'  name="quantity"></td>
						 <td><input id="unit" name="unit"  style='width:50px' ></td>
						<td>
							<?=link_button('Add Item','save_item()','save');?>
						</td> 
						<input type='hidden' id='work_order_no_item' name='work_order_no_item'>
						<input type='hidden' id='line_number' name='line_number'>
					</form>
				</tr>
			</tbody>
		</table>
	</div>	
</div>
<table id="dg" class="easyui-datagrid"  
	style="width:auto;min-height:auto"
	data-options="
		iconCls: 'icon-edit',
		singleSelect: true,
		toolbar: '#tb',
		url: '<?=base_url()?>index.php/workorder/items/<?=$work_order_no?>'
	">
	<thead>
		<tr>
			<th data-options="field:'item_number',width:80">Kode Barang</th>
			<th data-options="field:'description',width:150">Nama Barang</th>
			<th data-options="field:'quantity',width:50,align:'right',editor:{type:'numberbox',options:{precision:2}}">Qty</th>
			<th data-options="field:'unit',width:50,align:'left',editor:'text'">Satuan</th>
			<th data-options="field:'line_number',width:30,align:'right'">Line</th>
		</tr>
	</thead>
</table>
</div>
<!-- END ITEMS -->

</div>
<div id="tb" style="height:auto">
	<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editItem()">Edit</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteItem()">Delete</a>	
</div>

<div id="tb_search" style="height:auto">
	Enter Text: <input  id="search_item" style='width:180' 
 	name="search_item">
	<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" 
	onclick="searchItem()"></a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="selectSearchItem()">Select</a>
</div>

<div id='dlgSearchItem'class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
        closed="true" buttons="#dlg-buttons">
     <div id='divItemSearchResult'> 
		<table id="dgItemSearch" class="easyui-datagrid"  
			data-options="
				toolbar: '#tb_search',
				singleSelect: true,
				url: ''
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

<div id='dlgCustomer'class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
		closed="true" buttons="#btnCustomer">
		<table id="dgCustomer" class="easyui-datagrid" data-options="singleSelect: true">
			<thead>
				<tr>
					<th data-options="field:'company',width:150">Nama Customer</th>
					<th data-options="field:'customer_number',width:80">Kode Customer</th>
				</tr>
			</thead>
		</table>
</div>
<div id="btnCustomer"><?=link_button("Select","select_customer();return false;","ok")?></div>	   

<div id='dlgSo'class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
		closed="true" buttons="#btnSo">
		<table id="dgSo" class="easyui-datagrid" data-options="singleSelect: true">
			<thead>
				<tr>
					<th data-options="field:'sales_order_number',width:150">Nomor SO</th>
					<th data-options="field:'sales_date',width:80">Tanggal</th>
				</tr>
			</thead>
		</table>
</div>
<div id="btnSo"><?=link_button("Select","select_sales_order();return false;","ok")?></div>	   


<script type="text/javascript">
    function save_this(){
  		if($('#work_order_no').val()==''){alert('Isi nomor bukti !');return false;}
  		if($('#customer_number').val()==''){alert('Isi pelanggan !');return false;}
  		if($('#sales_order_number').val()==''){alert('Isi nomor sales order !');return false;}
		url='<?=base_url()?>index.php/workorder/save';
			$('#frmWo').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#work_order_no').val(result.work_order_no);
						var no=$('#work_order_no').val();
						$('#mode').val('view');
						$('#divItem').show('slow');
						$('#dg').datagrid({url:'<?=base_url()?>index.php/workorder/items/'+no});
						$('#dg').datagrid('reload');
						$.messager.show({
							title:'Success',msg:'Data sudah tersimpan. Silahkan pilih nama barang.'
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
</script>  
<script language="JavaScript">
		function save_item(){
			if($('#item_number').val()==''){alert('Pilih kode barang !');return false;}
			if($('#quantity').val()==''){alert('Isi Quantity !');return false;}
			url = '<?=base_url()?>index.php/workorder/save_item';
			$('#work_order_no_item').val($('#work_order_no').val());
						 
			$('#frmItem').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dg').datagrid('reload');
						$('#frmItem').form('clear');
						$('#item_number').val('');
						$('#unit').val('Pcs');
						$('#item_number').val('');
						$('#line_number').val('');
						$('#quantity').val(1);
						$('#description').val('');
						$('#unit').val('');
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
			xurl='<?=base_url()?>index.php/inventory/filter/'+nama;
			$('#dgItemSearch').datagrid({url:xurl});
			$('#dgItemSearch').datagrid('reload');
		}
		function deleteItem(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this line?',function(r){
					if (r){
						url='<?=base_url()?>index.php/workorder/delete_item';
						$.post(url,{line_number:row.line_number},function(result){
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
				$('#frmItem').form('load',row);
				$('#item_number').val(row.item_number);
				$('#description').val(row.description);
				$('#quantity').val(row.quantity);
				$('#unit').val(row.unit);
				$('#line_number').val(row.line_number);
				$('#work_order_no_item').val(row.work_order_no);
			}
		}
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
		                    $('#unit').val(obj.unit_of_measure);
		                    $('#description').val(obj.description);
		                },
		                error: function(msg){alert(msg);}
		    });
		};
		function lookup_customer()
		{
			$('#dlgCustomer').dialog('open').dialog('setTitle','Cari data pelanggan');
			$('#dgCustomer').datagrid({url:'<?=base_url()?>index.php/customer/select'});
			$('#dgCustomer').datagrid('reload');
		}
		function select_customer()
		{
			var row = $('#dgCustomer').datagrid('getSelected');
			if (row){
				$('#customer_number').val(row.customer_number);
				$('#company').val(row.company);
				$('#dlgCustomer').dialog('close');
			}
			
		}
		function lookup_sales_order()
		{
			var customer=$("#customer_number").val();
			if(customer==""){alert("Pilih kode customer dulu !");return false;};
			$('#dlgSo').dialog('open').dialog('setTitle','Cari nomor sales order pelanggan');
			$('#dgSo').datagrid({url:'<?=base_url()?>index.php/sales_order/select_so_open/'+customer});
			$('#dgSo').datagrid('reload');
		}
		function select_sales_order()
		{
			var row = $('#dgSo').datagrid('getSelected');
			if (row){
				$('#sales_order_number').val(row.sales_order_number);
				$('#dlgSo').dialog('close');
			}
			
		}
		
</script>

 