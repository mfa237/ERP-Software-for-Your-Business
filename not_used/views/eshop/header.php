<?
if( !isset($search_items) )$search_items='';
if( !isset($search_category)) $search_category='';
$current_cart=($this->session->userdata('cart')==true)?count($this->session->userdata('cart')):0;
$phone="(0264)2020202";
$workhour="Mon - Fri [10:00 - 19:00] ,  Sat [10:00 - 17:00],  Sun [12:00 - 17:00]";
$email="contact@talagasoft.com";
?>
<style>
</style>
<div class='container collapse navbar-collapse ' id='nv-header'>
	<li><span class='mx_phone'><span class='mx_img_phone'>&nbsp<?=$phone?></span></span></li>
	<li><span class='mx_workhour'><span class='mx_img_workhour'>&nbsp<?=$workhour?></span></span></li>
	<li><span class='mx_email'><span class='mx_img_email'>&nbsp <?=$email?></span></span></li>
	<li>&nbsp How To Buy</li>
	<li>&nbsp Order Tracking</li>
	<li>&nbsp Service Center</li>
	<li>&nbsp View Our Store</li>
	<li>&nbsp Like</li>
	<li>&nbsp Follow</li>
</div>
<nav class="navbar container" role="navigation" >
    <div class="navbar-header">
		<a class="border-hover" href="<?=base_url()?>index.php/eshop/home">		
			<div class='logo-wrapper logo-maxon' style='float:left'></h3>				
			</div>
		</a>
		<button type='button' class="btn btn-navbar navbar-toggle glyphicon glyphicon-align-justify" 
			data-toggle="collapse" 	data-target="#nav1"> 
		</button>
	</div> 
	<div class="collapse navbar-collapse col-lg-8" id='nav1'>	
		<? 
		$categories=$this->db->get("inventory_categories");
		if(isset($categories)){ ?>
		
			<ul class="nav navbar-nav  "  >
			  <form class="navbar-form " role="search" method='post' 			  
				action='<?=base_url()?>index.php/eshop/item/search'>
			
				
				<div class="form-group">
				  <input value='<?=$search_items?>' name='search_items' type="text" class="form-control col-md-1 col-sm-2" placeholder="Search">
				</div>
				<div class="form-group">
					<select class='form-control' name="search_category" id="search_category" 
					class="cat-select absolute">
					<option value="">Semua Kategori</option>
					<? foreach($categories->result() as $cat) { ?>
						<option <?=$search_category==$cat->kode?'selected':''?> class="ml-10" value="<?=$cat->kode?>"><?=$cat->category?></option>
					<? } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-default glyphicon glyphicon-search"> Cari</button>


			<a href="<?=base_url()?>index.php/eshop/cart" 
			class="btn btn-default glyphicon glyphicon-shopping-cart"> Troly <span class='badge'><?=$current_cart?></span></a>
			<?
			$is_login=$this->session->userdata('cust_login');
			if($is_login){
			?>
				<a href="<?=base_url()?>index.php/eshop/setting" 
					class="btn btn-default glyphicon glyphicon-user glyphicon "> Account</a>
				<a href="<?=base_url()?>index.php/eshop/login/logout" 
					class="btn btn-warning glyphicon glyphicon-off"> Logout</a>
			<? } else { ?>
				<a href="<?=base_url()?>index.php/eshop/login/start" 
					class="btn btn-default glyphicon glyphicon-off"> Login</a>
			<? } ?>
		   
		   
			  </form> 
			  
			</ul>   
		<? } ?>
	</div>    
</nav> 