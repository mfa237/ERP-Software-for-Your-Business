<div class='thumbnail' style='margin-top:30px'>
<div class="btn-group" role="group" aria-label="...">
  <button onclick="list_item(0);return false;" type="button" class="btn btn-default">First</button>
  <button onclick="list_item(<?=$page-1?>);return false;" type="button" class="btn btn-default">Previous</button>
  <button onclick="list_item(<?=$page+1?>);return false;" type="button" class="btn btn-default">Next</button>
  <button onclick="list_item(<?=$item_page_max-10?>);return false;" type="button" class="btn btn-default">Last</button>
</div>
<?
if($q=$this->db->limit(10,$page*10)->get("inventory_categories")){
	echo "<table class='table'><thead><th>Kode#</th><th>Nama Kategori</th>
	<th>Parent</th></thead>
	<tbody>";
	foreach($q->result() as $item) {
		echo "<tr><td>$item->kode</td><td>$item->category</td>
		<td>$item->parent_id</td>
		<td><input type='button' kode='$item->kode' 
			value='View' class='btn btn-primary' onclick='view_item(this);return false;'>
			<input type='button' kode_del='$item->kode' 
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
	var kode=t.getAttribute("kode");
	if(kode==""){alert("Nomor tidak dipilih !");return false;}
	var url="<?=base_url()?>index.php/eshop/categories/view_edit/"+kode;
	window.open(url,"_self");
}
function delete_item(t){
	var kode=t.getAttribute("kode_del");
	if(item_number==""){alert("Nomor tidak dipilih !");return false;}
	var url="<?=base_url()?>index.php/eshop/categories/delete/"+kode;
	window.open(url,"_self");
}
function list_item(idx) {
	var url="<?=base_url()?>index.php/eshop/setting/view/items_cat/4/"+idx;
	window.open(url,"_self");	
}
</script>