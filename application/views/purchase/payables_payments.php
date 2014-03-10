 
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
?>
<div id='divPayment'></div>
<div  >
<? 
 
$action="";
echo form_open($action,"id='frmAddPay' ");?>    
<table >
    <?=form_hidden('purchase_order_number',$purchase_order_number,'id="purchase_order_number"')?>
    <tr><td colspan="2"><h1>Silahkan input pembayaran untuk faktur: <?=$purchase_order_number?></h1></td></tr>
    <tr><td>Nomor: </td><td><?=form_input('no_bukti',$no_bukti)?>*nomor sementara</td></tr>
    <tr><td>Tanggal: </td><td><?=form_input('date_paid',$date_paid)?></td></tr>
    <tr><td>Jenis Bayar:</td><td><?=form_dropdown('how_paid',
            array('Cash'=>'Cash','Giro'=>'Giro','Transfer'=>'Transfer'),$how_paid)?></td></tr>
    <tr><td>Jumlah Bayar: </td><td><?=form_input('amount_paid',$amount_paid)?></td></tr>
    <tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>
    <tr><td>Saldo Tagihan Rp.</td><td><strong><?=number_format($saldo)?></strong></td></tr>
    <tr><td>&nbsp;</td><td><?=form_hidden('mode',$mode)?></td></tr>
    
</table>
<? echo form_close(); ?>    
</div>