 <?
         $CI =& get_instance();
         $CI->load->model('supplier_model');
         $sup=$CI->supplier_model->get_by_id($supplier)->row();

?>
<link href="<?php echo base_url();?>/themes/standard/style_print.css" rel="stylesheet">
<table>
<tbody>
<tr><td colspan='5' align='center'><h1>PURCHASE ORDER</h1></td><td></td></tr>
<tr><td>Nomor: </td><td><h2><?=$po_number?></h2></td></tr>      	
<tr><td>Tanggal </td><td><?=$tanggal?></td></tr>
<tr><td></td><td></td></tr>
<tr><td><h1>Kepada Yth,</h1></td><td></td></tr>
 <tr><td><?=$sup->supplier_name.' ('.$sup->supplier_number.')'?></td><td></td></tr> 
<tr><td>Termin <?=$terms?></td><td></td></tr> 
<tr><td><?=$sup->street?></td><td></td></tr> 
<tr><td><?=$sup->suite.' - '.$sup->city?></td><td></td></tr> 
<tr><td><?='Phone: '.$sup->phone.' - Fax: '.$sup->fax?></td><td></td></tr> 
<tr><td><?='Up: '.$sup->first_name?></td><td></td></tr> 
<tr><td></td><td></td></tr>
</tbody>
</table>
<table cellspacing="0" cellpadding="1" >
	<thead>
		<tr><td>Kode Barang</td><td>Nama Barang</td><td>Qty</td><td>Unit</td><td>Harga</td>
			<td>Disc%</td><td>Jumlah</td>
		</tr>
	</thead>
	<tbody>
		<?
	   $sql="select item_number,description,quantity,unit,discount,price,total_price 
				from purchase_order_lineitems i
				where purchase_order_number='".$po_number."'";
		$query=$CI->db->query($sql);

		$tbl="";
		 foreach($query->result() as $row){
			$tbl.="<tr>";
			$tbl.="<td>".$row->item_number."</td>";
			$tbl.="<td>".$row->description."</td>";
			$tbl.="<td align='right'>".number_format($row->quantity)."</td>";
			$tbl.="<td>".$row->unit."</td>";
			$tbl.="<td align='right'>".number_format($row->price)."</td>";
			$tbl.="<td align='right'>".number_format($row->discount)."</td>";
			$tbl.="<td align='right'>".number_format($row->total_price)."</td>";
			$tbl.="</tr>";
	   };
	   echo $tbl;
		?>
	</tbody>
</table>

<table>     	     	
<tr><td></td><td></td></tr>
     <tr><td>Catatan</td><td> <?=$comments?></td></tr>
	 <tr><td>Sub Total </td><td><?=number_format($sub_total)?></td></tr>
     <tr><td>Discount </td><td><?=$discount?> &nbsp <?=number_format($disc_amount)?></td></tr>
     <tr><td>Pajak <?=$tax?> </td><td><?=number_format($tax_amount)?></td></tr>
     <tr><td>Ongkos </td><td><?=number_format($freight)?></td></tr>
     <tr><td>Lain-lain </td><td><?=number_format($others)?></td></tr>
     <tr><td>Jumlah </td><td><?=number_format($amount)?></td></tr>
 </table>