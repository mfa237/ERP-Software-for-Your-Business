<div><h1>UNIT PRICE</h1>
<table class="table1" style="width:500px">
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
						<td>Kode Unit</td><td>Harga Jual</td>
						<td>Qty From</td><td>Qty To</td>
						<td>Date From</td><td>Date To</td>
						<td>&nbsp;</td>
					</tr>
				</thead>
				<tbody>
					<?     			
					$CI =& get_instance();
					
					$sql="select * from inventory_prices where item_number='$item_number'";
					$rst_item=$CI->db->query($sql);
					foreach($rst_item->result() as $row_item){
						echo "<tr><td>".$row_item->customer_pricing_code."</td>
						<td>".$row_item->retail."</td>
						<td>".$row_item->quantity_high."</td>
						<td>".$row_item->quantity_low."</td>
						<td>".$row_item->date_from."</td>
						<td>".$row_item->date_to."</td>
						<td>".link_button('',"del_item('".$row_item->customer_pricing_code."')","remove")."
												
						";
					}
					?>
					<tr></tr>
				</tbody>
			</table>
		</div>
		<div>
			<form id="frmNew" method="POST" class="box6">
				<h5>Silahkan input data untuk kode unit baru dibawah ini kemudian tekan tombol simpan</h5>
				<table id="tbl">
					<tr>	<td>Kode</td><td><input type="text" name="customer_pricing_code" id="customer_pricing_code"></td>
						<td>Harga Jual</td><td><input type="text" name="retail" id="retail"></td>
					</tr>
					<tr>	<td>From Qty</td><td><input type="text" name="quantity_high" id="quantity_high"></td>
						<td>To Qty</td><td><input type="text" name="quantity_low" id="quantity_low"></td>
					</tr>
					<tr>	<td>From Date</td><td><input type="text" name="date_from" id="date_from"></td>
						<td>To Date</td><td><input type="text" name="date_to" id="date_to"></td>
					</tr>
					<tr><td colspan="2"></td> </tr>
					 
				</table>
				<?=link_button("Tambah","add_unit()","save")?>
			</form>
		</div>
	</td></tr>
</table>

</div>
<script language="JavaScript">
	function add_unit(){
		url='<?=base_url()?>index.php/inventory/unit_price_add/<?=$item_number?>';
			$('#frmNew').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
			            window.open(CI_ROOT+'inventory/unit_price/<?=$item_number?>','_self');
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
        xurl=CI_ROOT+'inventory/delete_price/<?=$item_number?>/'+kode;                             
        $.ajax({
            type: "GET",
            url: xurl,
            success: function(msg){
	            window.open(CI_ROOT+'inventory/unit_price/<?=$item_number?>','_self');
            },
            error: function(msg){$.messager.alert('Info',msg);}
        });         
 	}
	
</script>