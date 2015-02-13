 <div class='clear'></div>
	<div class="row" style="padding:10px">
		<div class="col-md-6 ">
			<h1>Mengapa Belanja di Toko kami?</h1>
			<p>Jutaan produk tersedia dari berbagai online shop.
			Temukan Produk dari Ribuan Toko / Online Shop terpercaya se Indonesia, dan baca review nya.
			</p>
			<a href='<?=base_url()?>index.php/eshop/member/add' class='btn btn-info'>Daftar Sekarang!</a>
			<a href='<?=base_url()?>index.php/eshop/help'  class='btn btn-default'> Pelajari Lebih Lanjut</a>
		</div>
		<div class="col-md-5">
			<h1>Transparan</h1>
			<p>Bandingkan review untuk berbagai online shop terpercaya se-Indonesia
			Belanja Online Aman, Bebas Penipuan.
			</p>
		</div>
		<div class="col-md-5">
			<h1>Aman</h1>
			<p>Pembayaran Anda baru diteruskan ke penjual setelah barang Anda terima.</p>		
		</div>
	</div>
	<div class="row-fluid " style='background-color:lightgray'>
		<div class='col-md-12'>
			<? $this->load->view("slider"); ?>
		</div>	
	</div>
	<div class='clear'></div>
	<div class='row-fluid col-md-12' style='margin-bottom:20px'>
		<div class="panel panel-primary">
		  <div class='panel-header '><span class='glyphicon glyphicon-th-large'>
		  </span> CATEGORY</div>
		  <div class="panel-body">
				<?
				$i=0;
				echo "<div class='clear'></div>";
				echo "<div class='col-md-2 box-cat'>";
				echo "<div class='list-group'>";
				foreach($categories->result() as $cat) {
					$i++;
					echo "
					<a class='list-group-item' href='".base_url()."index.php/eshop/categories/view/$cat->kode'>".$cat->category."</a>";
					if($i % 4==0){
						echo "</div></div><div class='col-md-2 box-cat'><div class='list-group'>";
					}
				}
				echo "<a class='list-group-item' href='".base_url()."index.php/eshop/categories/view/all'>ALL</a>";
				echo "</div></div>";
				?>
		  </div>
		</div>
	</div>
	<div class='clear'></div>
	
	<div class="row-fluid col-md-8" style="padding-left:10px;padding-right:10px">
		<ul class="nav nav-tabs">
		  <li role="presentation" class="<?=$active_tab==1?"active":""?>">
				<a class='glyphicon glyphicon-plus' 
				href='<?=base_url()?>index.php/eshop/home'> TERBARU</a></li>
		  <li role="presentation"class="<?=$active_tab==2?"active":""?>">
				<a class='glyphicon glyphicon-heart' 
				href='<?=base_url()?>index.php/eshop/home/popular'> POPULAR</a></li>
		  <li role="presentation"class="<?=$active_tab==3?"active":""?>">
				<a class='glyphicon glyphicon-star' 
				href='<?=base_url()?>index.php/eshop/home/hot'> TERLARIS</a></li>
		</ul>
		<?
			switch($active_tab){
			case 1: $flag=1; break;
			case 2: $flag=2; break;
			case 3: $flag=3; break;
			default: $flag=0;
			}
			if($q=$this->db->select("item_number,description,category,
				item_picture,retail")->limit(9)
				->get("inventory")){
				foreach($q->result() as $item){
					echo "<div onclick='view_item(\"$item->item_number\");return false;' class='box_item col-md-3 thumbnail' align='center'>";
		?>
					<div class='foto'>
						<img width='100px' height='100px' src='<?=base_url()."tmp/".$item->item_picture?>'>
					</div>
					<div class='content'><?=$item->description?></div>
					<div class='item-footer'>
						<div class='item_no'><?=$item->item_number?></div>
						<div class='price'>Rp. <?=number_format($item->retail)?></div>
					</div>
		<?
					echo "</div>";
				}
			}
		
		?>
	</div>
	<div class="col-md-3 thumbnail" style="margin-left:10px">
		<? 
			$this->load->view('google_ads');
		?>
	</div>
 
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/eshop/eshop.css">
<script language="javascript">
function view_item(id){
	var url="<?=base_url()?>index.php/eshop/item/view/"+id;
	window.open(url,"_self");
}
</script>