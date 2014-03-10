<h1>FAKTUR PEMBELIAN</H1>
   <table>
	<tr>
		<td>Nomor Faktur</td><td>
		<?php echo form_input('purchase_order_number',
                        $purchase_order_number,"id=purchase_order_number"); ?>
                </td>
        </tr>	 
       <tr>
            <td>Tanggal</td><td><?php echo form_input('po_date',$po_date,'id=po_date   class="easyui-datetimebox" required');?>
            </td>

        </tr>	 
       <tr>
            <td>Supplier</td><td><?php echo form_dropdown('supplier_number'
                    ,$supplier_list,$supplier_number,"id=supplier_number");?>
            </td>
        </tr>	 
       <tr>
            <td>Termin</td><td><?php echo form_dropdown('terms'
                    ,$terms_list,$terms,"id=terms");?>
            </td>

       </tr>
       <tr>
            <td>Keterangan</td><td colspan="3"><?php echo form_input('comments'
                    ,$comments,'id=comments style="width:300px"');?></td>
       </tr>	  
   </table>
<H1></H1>
<a href="#" class="easyui-linkbutton"   data-options="iconCls:'icon-save'"
  onclick='next()'>Save</a>

<script type="text/javascript">
 
    function next(){
        if($('#purchase_order_number').val()==''){alert('Isi dulu nomor faktur !');return false;}
        if($('#supplier_number').val()==''){alert('Pilih supplier !');return false;}
        param='purchase_order_number='+$('#purchase_order_number').val()
        +'&po_date='+$('#po_date').val()+'&terms='+$('#terms').val()
        +'&supplier_number='+$('#supplier_number').val()
        +'&comments='+$("#comments").val();
        xurl='<?=base_url()?>index.php/purchase_invoice/detail?'+param;
        window.open(xurl,'_self');
    }
</script>
    
