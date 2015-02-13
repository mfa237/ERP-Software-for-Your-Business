<?
if(!isset($cat)){
	$cat=$this->db->get("inventory_categories")->row();
}
$cat_sub=$this->db->select("parent_id")->where("parent_id",$cat->kode)
	->get("inventory_categories");
?>
<div class='box-cat'>
	<ul class="list-group">
	<? foreach($cat_sub->result() as $c) { ?>
	<li class="list-group-item"><a href="<?=base_url()?>index.php/eshop/categories/view/<?=$c->kode?>">
	<?=$c->category?></li>
	<? } ?>
	</ul>
</div>
