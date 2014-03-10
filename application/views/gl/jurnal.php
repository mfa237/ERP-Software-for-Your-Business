<script src="<?=base_url();?>js/lib.js"></script>

   <table>
	<tr>
		<td>Kode Jurnal</td><td>
		<?php echo form_input('gl_id',$gl_id,"id=gl_id"); ?>
                </td>
	</tr>	 
       <tr>
            <td>Tanggal</td><td><?php echo form_input('date',$date,'id=date');?>
            </td>
       </tr>
       <tr>
            <td>Jenis Transaksi</td><td><?php echo form_input('operation',$operation,'id=operation');?></td>
       </tr>
       <tr>
            <td>Keterangan</td><td><?php echo form_input('source',$source,'id=source');?></td>
       </tr>
       <tr><td></td><td></td></tr>
       <tr>
           <td colspan="4">
               <a href="#" class="easyui-linkbutton" 
                  data-options="iconCls:'icon-ok'"
                  onclick='next()'
                  >Next</a>
               <a href="#" class="easyui-linkbutton" 
                  data-options="iconCls:'icon-cancel'"
                  onclick='cancel()'
                  >Cancel</a>
 
           </td>
       </tr>
	 <tr><td> 
	 </td><td>&nbsp;</td></tr>
   </table>
<div id="dlgJurnal" ><div id="dlgJurnal2"></div></div>
<script type="text/javascript">
    function cancel(){
        $('#dlg').dialog('close');
    }
    function next(){
        if($('#gl_id').val()==''){alert('Isi dulu kode jurnal !');return false;}
        if($('#source').val()==''){alert('Isi dulu keterangan !');return false;}
        if($('#operation').val()==''){alert('Isi dulu jenis  jurnal !');return false;}
        param='gl_id='+$('#gl_id').val()+'&date='+$('#date').val()
        +'&source='+$('#source').val()+'&operation='+$("#operation").val();
        xurl='<?=base_url()?>index.php/jurnal/next?'+param;
        window.open(xurl,'_self');
    }
</script>
    
