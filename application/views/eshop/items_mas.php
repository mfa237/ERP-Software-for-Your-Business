
<div class="btn-group" role="group" aria-label="...">
  <button onclick="list_item(0);return false;" type="button" class="btn btn-default">First</button>
  <button onclick="list_item(<?=$page-1?>);return false;" type="button" class="btn btn-default">Previous</button>
  <button onclick="list_item(<?=$page+1?>);return false;" type="button" class="btn btn-default">Next</button>
  <button onclick="list_item(<?=$item_page_max-10?>);return false;" type="button" class="btn btn-default">Last</button>
</div>
<?
if($q=$this->db->limit(10,$page*10)->get("inventory")){
	echo "<table class='table'><thead><th>Kode#</th><th>Nama Barang</th>
	<th>Category</th><th>Sub Category</th><th>Satuan</th><th>Harga Jual</th>
	<th>Harga Beli</th><th>Exec</th></thead>
	<tbody>";
	foreach($q->result() as $item) {
		echo "<tr><td>$item->item_number</td><td>$item->description</td>
		<td>$item->category</td><td>$item->sub_category</td><td>$item->unit_of_measure</td>
		<td align='right'>".number_format($item->retail)."</td>
		<td align='right'>".number_format($item->cost)."</td>
		<td><input type='button' kode='$item->item_number' 
			value='View' class='btn btn-primary'  data-toggle='modal'   
			data-target='#myModal'
			onclick='view_item(this);return false;'>
			<input type='button' kode_del='$item->item_number' 
			value='Delete' class='btn btn-warning' onclick='delete_item(this);return false;'>
		</td></tr>";
	}
	echo "</tbody></table>";
}
?>
<div class="btn-group" role="group" aria-label="...">
  <button onclick="list_item(0);return false;" type="button" class="btn btn-default">First</button>
  <button onclick="list_item(<?=$page-1?>);return false;" type="button" class="btn btn-default">Previous</button>
  <button onclick="list_item(<?=$page+1?>);return false;" type="button" class="btn btn-default">Next</button>
  <button onclick="list_item(<?=$item_page_max?>);return false;" type="button" class="btn btn-default">Last</button>
</div>
</div>
<script language='javascript'>
function view_item(t){
	var item_number=t.getAttribute("kode");
	if(item_number==""){alert("Nomor tidak dipilih !");return false;}
	var url="<?=base_url()?>index.php/eshop/item/load_json/"+item_number;
	$("#item_number").val(item_number);
	$.ajax({type: "GET", url: url, 
		success: function(result){
			var result = eval('('+result+')');
			if (result.success){
				console.log(result);
				$("#description").val(result.description);
				$("#unit_of_measure").val(result.unit_of_measure);
				$("#category").val(result.category);
				$("#sub_category").val(result.sub_category);
				$("#retail").val(result.retail);
				$("#cost").val(result.cost);
				$("#item_picture").val(result.item_picture);
			} else {
				alert(result.message);
			}
				
		},
		error: function(msg){alert(result);}
	}); 	
}
function delete_item(t){
	var item_number=t.getAttribute("kode_del");
	if(item_number==""){alert("Nomor tidak dipilih !");return false;}
	var url="<?=base_url()?>index.php/eshop/item/delete/"+item_number;
	window.open(url,"_self");
}
function list_item(idx) {
	var url="<?=base_url()?>index.php/eshop/setting/view/items_mas/3/"+idx;
	window.open(url,"_self");	
}
function save_item(){
	var url="<?=base_url()?>index.php/eshop/item/save/view";
	$('#frmBarang').form('submit',{
		url: url,
		onSubmit: function(){
			return $(this).form('validate');
		},
		success: function(result){
			var result = eval('('+result+')');
			if (result.success){
				$('#myModal').modal('hide');
				log_msg('Data sudah tersimpan.');
			} else {
				alert(result.message);
			}
		}
	});
	
};
</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
	aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
      </div>
      <div class="modal-body">
			<form class="form-horizontal" id='frmBarang' method='post'>
				<?=my_input("Kode Barang","item_number",'','col-sm-4','col-sm-5','readonly')?>
				<?=my_input("Nama Barang","description")?>
				<?=my_input("Category","category")?>
				<?=my_input("Sub Category","sub_category")?>
				<?=my_input("Satuan","unit_of_measure")?>
				<?=my_input("Harga Jual","retail")?>
				<?=my_input("Harga Beli","cost")?>
				<?=my_input("Item Picture","item_picture")?>				
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick='save_item();return false'>Save changes</button>
      </div>
    </div>
  </div>
</div>