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
			<h2>Nomor Tagihan : <?=$so->sales_order_number?></h2>
			<table style='border:0' width='100%'>
			<tr><td>Tanggal : </td><td><?=$so->sales_date?></td></tr>
			<tr><td>Nama : </td><td><?=$cust->company?></td></tr>
			<tr><td>Alamat : </td><td><?=$cust->street?></td></tr>
			<tr><td>Kota / Kode Pos : </td><td><?=$cust->city." / ".$cust->zip_postal_code ?></td></tr>
			<tr><td>Email / Phone : </td><td><?=$cust->email." / ".$cust->phone?></td></tr>
			</table>
			<h4>Item Barang yang dibeli</h4>
			<table class="table col-md-4" id='tblCart'>
			<head><th>Kode</th><th>Nama Barang</th><th>Qty</th>
			<th>Harga</th><th>Jumlah</th></thead>
			<tbody>
		<?
			$total=0;
			foreach($so_detail->result() as $detail){
				echo "<tr><td>$detail->item_number</td>
				<td>$detail->description</td><td>$detail->quantity</td>
				<td align='right'>".number_format($detail->price)."</td>
				<td align='right'>".number_format($detail->amount)."</td>
				</tr>";
				$total=$total+$detail->amount;
			}
			echo "<tr><td><strong>TOTAL</strong></td><td></td><td></td><td></td>
				<td align='right'><strong>".number_format($total)."</strong>
				</td></tr>";
			echo "</tbody>";
		?>
			</table>
			<? if(! $so_pay) { 	?>
			<p>Anda belum melakukan pembayaran untuk tagihan ini:</p>
			<h3>Tagihan Rp. <?=number_format($total)?></h3>
			<h3>Transfer Ke Rekening </h3>
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
			<? } else { 
				echo "<h3>Data Pembayaran</h3>";
				echo "<table style='border:0px' width='100%'><tr><td>Tanggal Bayar : </td><td>$so_pay->date_paid</td></tr>
				<tr><td>Cara Bayar : </td><td>$so_pay->how_paid</td></tr>
				<tr><td>Jumlah Bayar </td><td>Rp. : ".number_format($so_pay->amount_paid)."</td></tr>
				<tr><td>Dari Bank : </td><td>$so_pay->from_bank</td></tr>
				<tr><td>Dari Rekening : </td><td>$so_pay->from_account</td></tr>
				<tr><td>Atas Nama: </td><td>$so_pay->authorization</td></tr>
				<tr><td>Rekening Tujuan : </td><td>$so_pay->account_number</td></tr>
				</table>
				";
			}
			?>
			
			
	</div>
</div>
<script language='javascript'>
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/eshop/eshop.css">
