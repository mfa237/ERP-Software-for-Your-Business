<h1>PENERIMAAN BARANG DARI PO -[  
<?=link_button('Simpan','simpan()','save');?>
]</H1>

<form id='myform' method='post' action='<?=base_url()?>index.php/receive_po/proses'>
   <table>
       <tr>
            <td>Supplier:</td><td><?            
            echo form_input('supplier_number',$supplier_number,'id=supplier_number');
			echo link_button('','select_supplier()',"search","true"); 
            ?></td>
       </tr>
       <tr>
            <td>Nomor PO:</td>
            <td>
            <?
                echo form_input('purchase_order_number',$purchase_order_number,
                "id=purchase_order_number");
				echo link_button('','select_po()',"search","true"); 
            ?>                
            </td>            
       </tr>
       <tr>
            <td>Tanggal:</td>
            <td><?=form_input('date_received',
                    $date_received,'id=date_received class="easyui-datetimebox" required');?>
            </td>
       </tr>
       <tr>
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
            <td>Nomor Bukti:</td><td><?            
            echo form_input('shipment_id',$shipment_id,'id=shipment_id');
            ?></td>
       </tr>
       <tr>
           <td colspan="6">
				<div id='divItem'>
				</div>	
           </td>
       </tr>
       <tr>
           <td colspan="6" align="right">
           </td>
       </tr>
   </table>
</form>
<?
echo load_view('purchase/supplier_select');
echo load_view('purchase/select_open_po');
?>

<script type="text/javascript">
    function cancel(){
        
    }
    function simpan(){
        if($('#shipment_id').val()==''){alert('Isi dulu nomor bukti !');return false;}
        $('#myform').submit();
    }

    function proses()
    {
        $('#myform').submit();
    }
    function load_po_items(){
    	$po=$("#purchase_order_number").val();
    	if($po!=""){
    		
    	}
    }
</script>    


