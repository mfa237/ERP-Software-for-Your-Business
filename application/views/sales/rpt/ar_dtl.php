<?
//var_dump($_POST);
?>
<?
     $CI =& get_instance();
     $CI->load->model('company_model');
     $model=$CI->company_model->get_by_id($CI->access->cid)->row();
	$date1= date('Y-m-d H:i:s', strtotime($CI->input->post('txtDateFrom')));
	$date2= date('Y-m-d H:i:s', strtotime($CI->input->post('txtDateTo')));
	$kode=$CI->input->post('text1');
    $CI->load->model('sales_order_model');
?>
<link href="<?php echo base_url();?>/themes/standard/style_print.css" rel="stylesheet">
<table cellspacing="0" cellpadding="1" border="0" width='800px'> 
     <tr>
     	<td colspan='2'><h2><?=$model->company_name?></h2></td><td colspan='2'><h2>KARTU PIUTANG PELANGGAN</h2></td>     	
     </tr>
     <tr>
     	<td colspan='2'><?=$model->street?></td><td></td>     	
     </tr>
     <tr>
     	<td colspan='2'><?=$model->suite?></td>     	
     </tr>
     <tr>
     	<td>
     		<?=$model->city_state_zip_code?> - Phone: <?=$model->phone_number?>
     	</td>
     </tr>
     <tr>
     	<td>
     		Criteria: Dari Tanggal: <?=$date1?> s/d : <?=$date2?>
     	</td>
     </tr>
     <tr><td colspan=4 style='border-bottom: black solid 1px'></td></tr>
     <tr>
     	<td colspan="8">
	     		<table class='titem'>
	     		<thead>
	     			<tr><td>Kode</td><td>Pelanggan</td><td>Tanggal</td><td>Jenis</td>
	     				<td>No Bukti</td><td>Ref</td><td>Jumlah</td>
	     			</tr>
	     		</thead>
	     		<tbody>
     			<?
     			$sql="select i.customer_number,c.company,i.tanggal,i.jenis,i.ref,jumlah,i.no_bukti
     			 from qry_kartu_piutang i left join customers c on c.customer_number=i.customer_number
	            where i.tanggal between '$date1' and '$date2'"; 
				if($kode!="")$sql.=" and i.customer_number='$kode'";
				$sql.=" order by i.customer_number,i.tanggal";
     			$rst_so=$CI->db->query($sql);
     			$tbl="";
                 foreach($rst_so->result() as $row){
                    $tbl.="<tr>";
                    $tbl.="<td>".$row->customer_number."</td>";
                    $tbl.="<td>".$row->company."</td>";
                    $tbl.="<td>".$row->tanggal."</td>";
                    $tbl.="<td>".$row->jenis."</td>";
                    $tbl.="<td>".$row->no_bukti."</td>";
                    $tbl.="<td>".$row->ref."</td>";
                    $tbl.="<td align='right'>".number_format($row->jumlah)."</td>";
                    $tbl.="</tr>";
               };
			   echo $tbl;
				   				   				   
			?>	
				</tbody>
     		</table>
     	
     	</td>
     </tr>
</table>
