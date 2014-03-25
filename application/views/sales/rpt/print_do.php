<?
         $CI =& get_instance();
         $CI->load->model('company_model');
         $model=$CI->company_model->get_by_id($CI->access->cid)->row();
         $CI->load->model('customer_model');
         $cst=$CI->customer_model->get_by_id($sold_to_customer)->row();

?>
<link href="<?php echo base_url();?>/themes/standard/style_print.css" rel="stylesheet">
<table cellspacing="0" cellpadding="1" border="0" width='800px'> 
     <tr>
     	<td colspan='2'><h2><?=$model->company_name?></h2></td><td colspan='2'><h2>DELIVERY ORDER</h2></td>     	
     </tr>
     <tr>
     	<td colspan='2'><?=$model->street?></td><td>Nomor: <?=$invoice_number?></td>     	
     </tr>
     <tr>
     	<td colspan='2'><?=$model->suite?></td>     	
     </tr>
     <tr>
     	<td colspan=4 style='border-bottom: black solid 1px'><?=$model->city_state_zip_code?> - Phone: <?=$model->phone_number?>
     	</td>     	
     	
     </tr>
     <tr>
     	<td>Tanggal</td><td><?=$invoice_date?></td>
     	<td colspan='2'><?=$sold_to_customer.' ('.$cst->company.')'?></td>
     </tr>
     <tr>
     	<td>Ref SO #</td><td><?=$sales_order_number?></td>
     	<td colspan='2'><?=$cst->street?></td>
     </tr>
     <tr>
     	<td>Tanggal Kirim</td><td><?=$due_date?></td>
     	<td colspan='2'><?=$cst->suite.' - '.$cst->city?></td>
     </tr>
     <tr>
     	<td></td><td></td>
     	<td colspan='2'><?='Phone: '.$cst->phone.' - Fax: '.$cst->fax?></td>
     </tr>
     <tr>
     	<td></td><td></td>
     	<td colspan='2'><?='Up: '.$cst->first_name?></td>
     </tr>
     <tr>
     	<td colspan="8">
     	<table class='titem'>
     		<thead>
     			<tr><td>Kode Barang</td><td>Nama Barang</td><td>Qty</td><td>Unit</td>
     			</tr>
     		</theadx>
     		<tbody>
     			<?
		       $sql="select item_number,description,quantity,unit,discount,price,amount 
		                from invoice_lineitems i
		                where invoice_number='".$invoice_number."'";
		        $query=$CI->db->query($sql);

     			$tbl="";
                 foreach($query->result() as $row){
                    $tbl.="<tr>";
                    $tbl.="<td>".$row->item_number."</td>";
                    $tbl.="<td>".$row->description."</td>";
                    $tbl.="<td align='right'>".number_format($row->quantity)."</td>";
                    $tbl.="<td>".$row->unit."</td>";
                    $tbl.="</tr>";
               };
			   echo $tbl;
    			?>
     		</tbody>
     	</table>
     	
     	
     	</td>
     </tr>
     <tr><td>Catatan: <?=$comments?></td><td></td><td></td><td></td></tr>
</table>
