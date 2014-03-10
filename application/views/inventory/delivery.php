<script src="<?=base_url();?>js/lib.js"></script>

   <table>
	<tr>
		<td>Nomor Bukti</td><td>
		<?php echo form_input('shipment_id',$shipment_id,"id=shipment_id"); ?>
                </td>
	</tr>	 
       <tr>
            <td>Tanggal</td><td><?php echo form_input('date_received',$date_received,'id=date_received 
            class="easyui-datetimebox" required ');?>
            </td>
       </tr>
       <tr>
            <td>Pengirim</td><td><?php echo form_input('supplier_number',$supplier_number,'id=supplier_number');?></td>
       </tr>
       <tr>
            <td>Keterangan</td><td><?php echo form_input('comments',$comments,'id=comments style="width:400px"');?></td>
       </tr>
       <tr><td></td><td></td></tr>
       <tr>
           <td colspan="4">
               <a href="#" class="easyui-linkbutton" 
                  data-options="iconCls:'icon-ok'"
                  onclick='next()'
                  >Next</a>
              
 
           </td>
       </tr>
	 <tr><td> 
	 </td><td>&nbsp;</td></tr>
   </table>
 
<script type="text/javascript">
    function cancel(){
        
    }
    function next(){
        if($('#shipment_id').val()==''){alert('Isi dulu nomor bukti !');return false;}
        param='shipment_id='+$('#shipment_id').val()+'&date_received='+$('#date_received').val()
        +'&supplier_number='+$('#supplier_number').val()+'&comments='+$("#comments").val();
        xurl='<?=base_url()?>index.php/delivery/detail?'+param;
        window.open(xurl,'_self');
    }
</script>
    
