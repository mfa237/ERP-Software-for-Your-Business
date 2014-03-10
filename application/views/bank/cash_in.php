<script src="<?=base_url();?>js/lib.js"></script>
<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('cash_in/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('cash_in/add','id=myform name=myform'); 
    }
?>

   <div class='box6x'><h1>KAS / BANK MASUK</h1>
   <table>
	<tr>
		<td>Voucher</td><td>
		<?php
		if($mode=='view'){
			echo $voucher;
			echo form_hidden('voucher',$voucher);
		} else { 
			echo form_input('voucher',$voucher);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Jenis</td><td>
                <?php echo form_radio('trans_type','cash in',$trans_type=='cash in');?>Cash
                <?php echo form_radio('trans_type','cheque in',$trans_type=='cheque in');?>Giro/Cek
                <?php echo form_radio('trans_type','trans in',$trans_type=='trans in');?>Transfer
            </td>
       </tr>
       <tr>
            <td>Tanggal</td><td><?php echo form_input('check_date',$check_date);?></td>
       </tr>
       <tr>
            <td>Rekening</td><td><?php echo form_dropdown( 'account_number',$account_number_list,$account_number);?></td>
       </tr>
       <tr>
            <td>Terima dari</td><td><?php echo form_input('payee',$payee);?></td>
       </tr>
       <tr>
            <td>Jumlah</td><td><?php echo form_input('deposit_amount',$deposit_amount);?></td>
       </tr>
       <tr>
            <td>Keterangan</td><td><?php echo form_input('memo',$memo,"style='width:300px'");?></td>
       </tr>
 	 
	 <tr><td>
            <a href="#" class="easyui-linkbutton" 
                  data-options="iconCls:'icon-save'"
                  onclick='save_this()'
                  >Save</a>	 
	 </td><td>&nbsp;</td></tr>
   </table>
<?
echo form_close();
?>
<script type="text/javascript">
    function save_this(){
        if($('#voucher').val()===''){alert('Isi kode voucher !');return false;};
        if($('#trans_type').val()===''){alert('Isi jenis penerimaan !');return false;};
       $('#myform').submit();
//        $('#myform').submit(function(event) {
//          
//          event.preventDefault(); // Prevent the form from submitting via the browser.
//          var form = $(this);
//          param=form.serialize();
//          console.log(param);
//          $.ajax({
//            type: form.attr('method'),
//            url: form.attr('action'),
//            data: param
//          }).done(function(msg) {     
//            //$('#main_content').html(msg);
//            $('#dlg').dialog('close');
//            $.messager.alert('Info','Success !')
//          }).fail(function(jqXHR, textStatus, errorThrown) {
//              console.log(jqXHR.responseText);
//              $.messager.alert('Info','Error !')
//          });
//        });
    }
</script>  

 