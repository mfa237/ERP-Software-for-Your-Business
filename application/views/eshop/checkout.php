<div class="row-fluid" >
	<div class="col-sm-3 box-left  panel panel-primary">
		<ol class="breadcrumb box-bcum">
		  <li><a  class='glyphicon glyphicon-home' 
		  href="<?=base_url()?>index.php/eshop/home"> Home</a></li>
		  <li class="active">Confirm</li>
		</ol>
		<? include_once 'box_sub_cat.php' ?>
		<? include_once 'box_item.php' ?>
	</div>
	<div class="col-sm-9">
		<? if($so_number == "") { ?>
			<div class="alert alert-warning" role="alert">Belum ada item yang dibeli.</div>
		<? } else { ?>
			<h1>CHECKOUT PROSES</h1>
			<p>Terimakasih anda sudah melakukan transaksi pembelian atas barang-barang 
			dibawah ini.</p>
			<p>Silahkan lakukan pembayaran ke rekening berikut ini 
			dalam waktu kurang dari 1 jam, lewat dari jam tersebut 
			sistim akan menghapus data belanja anda.</p>
			<p>Nomor tagihan yang baru dibuat adalah <h1><?=$so_number?></h1>
			Silahkan input nomor ini pada saat melakukan pembayaran di ATM/Bank</p>
			<? 	
				$so=$this->session->userdata("so");
				$so_detail=$this->session->userdata("so_detail");
				$cust_name=$this->session->userdata("cust_name");
			?>
			<p></p>
			<p>Tanggal : <?=$so['sales_date']?></p>
			<p></p>
			<h4>Alamat Pengiriman </h4>
			<p>Nama : <?=$cust_name?></p>
			<p>Alamat : <?=$cust->street?></p>
			<p>Kota / Kode Pos : <?=$cust->city." / ".$cust->zip_postal_code ?></p>
			<p>Email / Phone : <?=$cust->email." / ".$cust->phone?></p>
			<p><a href='' class='btn btn-default'>Ganti Alamat</a></p>
			<p></p>
			<h4>Item Barang yang dibeli</h4>
			<table class="table col-md-4" id='tblCart'>
			<head><th>Kode</th><th>Nama Barang</th><th>Qty</th>
			<th>Harga</th><th>Jumlah</th></thead>
			<tbody>
		<?
			$total=0;
			for($i=0;$i<count($so_detail);$i++){
				$qty=$so_detail[$i]['quantity'];
				$item_id=$so_detail[$i]['item_number'];
				$item_name=$so_detail[$i]['description'];
				$price=$so_detail[$i]['price'];
				$jumlah=$so_detail[$i]['amount'];
				$total=$total+$jumlah;
				echo "<tr><td>$item_id</td><td>$item_name</td><td>$qty</td>
				<td align='right'>".number_format($price)."</td>
				<td align='right'>".number_format($jumlah)."</td>
				</tr>";
			}
			echo "<tr><td><strong>TOTAL</strong></td><td></td><td></td><td></td>
				<td align='right'><strong>".number_format($total)."</strong>
				</td></tr>";
			echo "</tbody>";
		?>
			</table>
			<h4>Total Tagihan Rp. <?=number_format($total)?></h4>
			<h4>Transfer Ke Rekening </h4>
			<p>BCA ANDRI ANDIANA</p>
			<p>BCA ANDRI ANDIANA</p>
			<p>BCA ANDRI ANDIANA</p>
			<p>BCA ANDRI ANDIANA</p>
			<a href='<?=base_url()?>index.php/eshop/cart/confirm' 
				class='btn btn-primary'>Konfirmasi</a>
			<p>
			<i>Klik tombol konfirmasi apabila anda sudah membayar</i>
			<i>Barang akan kami kirim dalam waktu kurang dari dua hari, 
			setelah pembayaran anda masuk ke rekening kami.</i>
			</p>
		<? } ?>
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
