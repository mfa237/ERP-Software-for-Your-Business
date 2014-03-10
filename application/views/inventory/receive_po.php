<script src="<?=base_url();?>js/lib.js"></script>
<form id='myform' method='post' action='<?=base_url()?>index.php/receive_po/proses'>
<h1>PENERIMAAN BARANG DARI PO</H1>
   <table>
       <tr>
            <td>Supplier:</td><td><?=form_dropdown('supplier_number',
            $supplier_list,$supplier_number,'id=supplier_number');?></td>
            <td>Nomor PO:</td>
            <td>
            <?
                echo form_input('purchase_order_number',$purchase_order_number,
                "id=purchase_order_number");
            ?>                
            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'" plain='true'
            onclick='list_po_number()'>&nbsp</a>
            </td>            
       </tr>
       <tr>
            <td>Tanggal:</td>
            <td><?=form_input('date_received',
                    $date_received,'id=date_received class="easyui-datetimebox" required');?>
            </td>
            <td>Gudang:</td><td><?php echo form_dropdown('warehouse_code',
                    $warehouse_list,$warehouse_code,'id=warehouse_code');?>
            </td>
       </tr>
       <tr>
            <td>Keterangan</td>
            <td colspan="4"><?=form_input('comments',$comments,
                    'id=comments style="width:300px"');?>
            </td>
       </tr>
       <tr>
           <td>Receipt By:</td>
           <td><?=form_input('receipt_by',$receipt_by,'id=receipt_by');?></td>
           <td>
                
           </td> 
       </tr>
       <tr>
           <td colspan="4">
           </td>
       </tr>
   </table>
<?php 
    echo form_hidden('shipment_id',$shipment_id);
?>
<div id='divPoListWrap'><div id='divPoList' style='display:none'><img src='../images/loading.gif'></div></div>
<div id='divPoItemWrap' style='display:none'><div id='divPoItem'><img src='../images/loading.gif'></div></div>              
<div id="divBtnProses" style="display:none">
               <a href="#" class="easyui-linkbutton" 
                    data-options="iconCls:'icon-save'"
                    onclick='proses()'>Proses</a>
                   *Isi kolom quantity terima terlebih dahulu dalam tabel dibawah ini, 
                    klik tombol [PROSES] apabila sudah selesai.
</div>
</form>

<script type="text/javascript">
    function cancel(){
        
    }
    function simpan(){
        if($('#shipment_id').val()==''){alert('Isi dulu nomor bukti !');return false;}
        $('#myform').submit();
    }

    function list_po_number()
    {
        supp=$('#supplier_number').val(); 
        if(supp==''){alert('Pilih supplier !');return false;}        
        //next_number('Receivement Numbering','shipment_id');
        uri=CI_ROOT+'purchase_order/list_open_po/'+supp;
        console.log(uri);
        $('#divPoList').fadeIn();
        get_this(uri,'','divPoList');
        $('#divPoListWrap').dialog({  
            title: 'Pilih Nomor PO',
            url: uri, 
            width: 500,height: 400,  closed: false, cache: false,
             buttons: [{
                             text:'Ok',iconCls:'icon-ok',
                             handler:function(){
                                select_po_number();
                                $('#divPoListWrap').dialog('close');
                             }
                     },{text:'Cancel',iconCls:'icon-cancel',
                     handler:function(){$('#divPoListWrap').dialog('close');}
                     }],

            modal: true  
        });
        $('#divPoListWrap').dialog('refresh');
        
    }
    function select_po_number()
    {
        row = $('#dgPoList').datagrid('getSelected');
        if (row){
            $('#purchase_order_number').val(row['purchase_order_number']);
        }
         $('#divPoItemWrap').fadeIn('slow'); 
         get_this(CI_ROOT+'purchase_order/list_item_receive/'+row['purchase_order_number']
            ,'','divPoItem');
         $('#divBtnProses').fadeIn('slow'); 
    }
    function proses()
    {
        $('#myform').submit();
    }
</script>    


