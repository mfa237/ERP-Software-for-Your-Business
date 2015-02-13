
	<div class="row-fluid" >
		<div class="col-sm-3   box-left  panel panel-primary">
			<ol class="breadcrumb">
			  <li><a  class='glyphicon glyphicon-home' 
			  href="<?=base_url()?>index.php/eshop/home"> Home</a></li>
			  <li class="active"><?=$cat_id?></li>
			</ol>
			<div class='box-cat'>
				<h4><?=$cat_id?></h4>
				<?
					$cat_sub=$this->db->select("kode,category")->where("parent_id",$cat_id)
					->get("inventory_categories");
					 foreach($cat_sub->result() as $c) {
						$url=base_url()."index.php/eshop/categories/view/$c->kode";
						echo '<li class="list-group-item">
						<a href="$url">$c->category</li>';
					 } 
				?>
			</div>
			<div class='box-cat'>
				<h4>Range Harga</h4>
				<li>0 - 2,000</li>
				<li>2,000 - 10,000</li>
				<li>10,000 Lebih</li>
			</div>
			<div class='box-cat'>
				<h4>Jenis Item</h4>
				<li>Item Baru</li>
				<li>Populer</li>
				<li>Terlaris</li>
			</div>
		</div>
		<div class="col-sm-9">
			 
			<div class='div-item'>
				<?
					if($q=$this->db->select("item_number,description,
						item_picture,retail")->where('category',$cat_id)
						->get("inventory")){
						foreach($q->result() as $item){
							echo "<div style='color:black' onclick='view_item(\"$item->item_number\");return false;' 
							class='box_item col-sm-4 ' align='center'>";
				?>
							<div class='foto'>
								<img width='100px' height='100px' src='<?=base_url()."tmp/".$item->item_picture?>'>
							</div>
							<div class='content'><?=$item->description?></div>
							<div class='item-footer'>
								<div class='item_no'>Kode: <?=$item->item_number?></div>
								<div class='price'>Rp. <?=number_format($item->retail)?></div>
							</div>
				<?
							echo "</div>";
						}
					}
				?>
			
			
			</div>
		</div>
	</div>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/eshop/eshop.css">
<script language="javascript">
function view_item(id){
	var url="<?=base_url()?>index.php/eshop/item/view/"+id;
	window.open(url,"_self");
}
</script>	
