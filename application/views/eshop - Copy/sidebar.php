<?php 
	echo "<!-- $google_ads >";
	echo load_view($folder_view."/".$google_ads);
	echo "<!-- $category_list >";
	echo load_view($folder_view."/".$category_list);
	if($widget_brand!=''){
		echo "<!-- $widget_brand >";
		echo load_view($folder_view."/".$widget_brand);
	}
?>