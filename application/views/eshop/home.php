	<?
		if($q=$this->db->select("item_number,description,category,
			item_picture,retail")->limit(20)->order_by("sales_count desc")
			->get("inventory")){
			$row=0;
			$col=0;
			foreach($q->result() as $item){
				//if($col==0) echo "<div class='rowx'>";
				if($row==0) {
					echo "<div class='col-md-3 col-sm-4 '>";
				}
				
				echo "<div onclick='view_item(\"$item->item_number\");return false;' 
				class='box_item   ' align='center'>";
	?>
				<div class='foto thumbnail'>
					<img  src='<?=load_picture($item->item_picture)?>'>
				</div>
				<div class='content'><?=$item->description?> 
				</div>
				<div class='item-footer'>
					<div class='item_no'><?=$item->item_number?></div>
					<div class='price'><?php 
						echo "Row: ".$row." Col: ".$col;
					?></div>
				</div>
				
				<div style='font-size:24px'>
					<a href='<?=base_url();?>index.php/eshop/item/view/<?=$item->item_number?>'>
						<span class='glyphicon glyphicon-search' style="border:1px solid lightgray;padding:5px"></span>
					</a>
					<a href='<?=base_url();?>index.php/eshop/item/like/<?=$item->item_number?>'>
					<span class='glyphicon glyphicon-heart' style="border:1px solid lightgray;padding:5px"></span>
					</a>
					<a href='<?=base_url();?>index.php/eshop/item/download/<?=$item->item_number?>'>
					<span class='glyphicon glyphicon-save' style="border:1px solid lightgray;padding:5px"></span>
					</a>
					<a href='<?=base_url();?>index.php/eshop/item/buy/<?=$item->item_number?>'>
					<span class='glyphicon glyphicon glyphicon-shopping-cart' style="border:1px solid lightgray;padding:5px"></span>
					</a>
				</div>
	<?
				echo "</div>";
				
				$row++;
				if($row>4){
					$row=0;
					echo "</div>";
					
					$col++;
					if($col==4){
						//$row=0;
						$col=0;
						//echo "</div>";
					}
						
				}
			}
			 echo "</div>";
		}
	?>
 
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/eshop/eshop.css">
<script language="javascript">
function view_item(id){
	var url="<?=base_url()?>index.php/<?=$folder_view;?>/item/view/"+id;
	window.open(url,"_self");
}
</script>
