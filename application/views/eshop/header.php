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
 

    <!--header start-->
    <header class="head-section">
<nav class="navbar  " role="navigation" >
    <div class="navbar-header">
		<a class="border-hover" href="<?=base_url()?>index.php/eshop/home">		
			<div class='logo-wrapper logo-maxon' style='float:left'></h3>				
			</div>
		</a>
		<button type='button' class="btn btn-navbar navbar-toggle glyphicon glyphicon-align-justify" 
			data-toggle="collapse" 	data-target="#nav1"> 
		</button>
	</div> 
	<div class="  navbar-collapse col-lg-8" id='nav1' style='float:right;margin-right:10px' >	
		<? 
		$categories=$this->db->get("inventory_categories");
		if(isset($categories)){ ?>
		
			<ul class="nav navbar-nav " >
			 
			<li>
			<a href="<?=base_url()?>index.php/eshop/cart" 
			class="glyphicon glyphicon-shopping-cart"> Troly <span class='badge'><?=$current_cart?></span></a>
			</li>
			<?
			$is_login=$this->session->userdata('cust_login');
			if($is_login){
			?>
				<li>
				<a href="<?=base_url()?>index.php/eshop/setting" 
					class="glyphicon glyphicon-user glyphicon "> Account</a>
				</li>
				<li>
				<a href="<?=base_url()?>index.php/eshop/login/logout" 
					class="glyphicon glyphicon-off"> Logout</a>
				</li>	
			<? } else { ?>
				<li>
				<a href="<?=base_url()?>index.php/eshop/login/start" 
					class="glyphicon glyphicon-off"> Login</a>
				</li>
			<? } ?>
		   
		   
			 
			  
			</ul>   
		<? } ?>
	</div>    
</nav> 
    </header>
    <!--header end-->