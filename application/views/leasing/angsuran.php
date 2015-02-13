<div class='row'>
<div class='col-sm-6' >
<table>
	<tr><td>Total Harga Barang  </td><td><?=form_input('sub_total',number_format($sub_total),"id='sub_total' disabled");?></td></tr>
	<tr><td>Uang Muka </td><td>
		<?=form_input('dp_prc',$dp_prc,"id='dp_prc' style='width:50px'  disabled")?>
		<?=form_input('dp_amount',number_format($dp_amount),"id='dp_amount' style='width:100px' disabled")?>
	</td></tr>
	<tr><td>Pembiayaan &nbsp </td><td><?=form_input('loan_amount',number_format($loan_amount),"id='loan_amount' disabled");?></td></tr>
	<tr><td>Bunga </td><td>
		<?=form_input('rate_prc',$rate_prc,"id='rate_prc' style='width:50px' disabled");?>
		<?=form_input('rate_amount',number_format($rate_amount),"id='rate_amount' style='width:100px' disabled");?>	
	</td></tr>
</table>
</div>
<div class='col-sm-6'>
<table>
	<tr><td>Administrasi </td><td><?=form_input('admin_amount',number_format($admin_amount),"id='admin_amount' disabled");?></td></tr>
	<tr><td>Asuransi </td><td><?=form_input('insr_amount',number_format($insr_amount),"id='insr_amount' disabled");?></td></tr>
	<tr><td>Tenor X bulan </td><td><?=form_input('inst_month',$inst_month,"id='inst_month'")?></td></tr>
	<tr><td>Angsuran / bulan &nbsp</td>
		<td><?=form_input('inst_amount',number_format($inst_amount),"id='inst_amount' disabled");?>
	</td></tr>
	<? if($show_tool){ ?>
	<tr><td colspan=4><input style="margin-top:10px"type='button' class="btn btn-info" 
		onclick="calculate();return false;" value="RECALC"> * Tekan recalc untuk menghitung angsuran perbulan.</td></tr>
	<? } ?>
</table>
</div>
</div>

