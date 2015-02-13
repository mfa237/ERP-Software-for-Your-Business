<div class='thumbnail' style='margin-top:30px'>

<?
if(!isset($active_tab))$active_tab=1;
?>
<div class="row-fluid">
	<div class="col-sm-3 box-left  panel panel-primary">
		<ol class="breadcrumb box-bcum"'>
		  <li><a href="<?=base_url()?>index.php/eshop/home"> Home</a></li>
		  <li class="active">Pengaturan</li>
		</ol>
		<? include_once 'box_sub_cat.php' ?>
		<? include_once 'box_item.php' ?>
	</div>
	<div class="col-sm-9">
		<img src="<?=base_url()?>images/ico_setting.png" 
		style="float:left"><h1 class='glyphicon glyphicon-ok'> <?=$caption?></h1>
		<p>Dihalaman ini anda dipersilahkan untuk merubah data 
		keanggotan di sistim kami berikut ini</p>
		<p>Klik tab tagihan untuk melihat informasi tagihan 
		yang baru atau lama dan status tagihan</p>
		<ul class="nav nav-tabs" style='background-color:white'>
		  <li role="presentation" 
				class=" <?=$active_tab==1?"active":""?>">
				<a class='glyphicon glyphicon-user' 
				href='<?=base_url()?>index.php/eshop/setting/view/member_view/1'> UMUM</a></li>
		  <li role="presentation"class="<?=$active_tab==2?"active":""?>">
				<a class='glyphicon glyphicon-euro' 
				href='<?=base_url()?>index.php/eshop/setting/view/member_trans/2'> TAGIHAN</a></li>
			<?
				$is_admin=$this->session->userdata('user_admin');
				if($is_admin) {
				  $active="";
					if($active_tab==3)$active="active";
				  echo "<li role='presentation' class='$active'>
						<a class='glyphicon glyphicon-phone' 
						href='".base_url()."index.php/eshop/setting/view/items_mas/3'>
						PRODUCTS</a></li>";
				  $active="";
					if($active_tab==4)$active="active";
				  echo "<li role='presentation' class='$active'>
						<a class='glyphicon glyphicon-phone' 
						href='".base_url()."index.php/eshop/setting/view/items_cat/4'>
						CATEGORY</a></li>";
				}
			?>
		</ul>
		<? echo load_view("eshop/$file") ?>
	</div>
</div>
<script language='javascript'>

var cart=null;
$(document).ready(function() {
    $("#tblCart .deleteLink").on("click",function() {
        var tr = $(this).closest('tr');
        tr.css("background-color","#FF3700");
        tr.fadeOut(400, function(){
            tr.remove();
        });
		var idx=$(this).attr("value");
		var xurl="<?=base_url()?>index.php/eshop/item/del_cart/"+idx;
 		$.ajax({
			type: "GET", url: xurl,
			success: function(msg){
				console.log(msg);
			},
			error: function(msg){console.log(msg);}
		}); 
		
        return false;
    });
});

function edit_row(idx){
	alert(idx);
}
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/eshop/eshop.css">
