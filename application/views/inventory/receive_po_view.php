<script src="<?=base_url();?>js/lib.js"></script>
<script src="<?=base_url();?>js/jquery-ui/jquery.easyui.min.js"></script>

 
<h1>PENERIMAAN BARANG DARI PO</H1>

   <table style="width:100%">
       <tr>
           <td>Receipt No:</td><td><strong><?=$shipment_id?></strong>
                        
           </td>
           
            <td>Nomor PO:</td><td><strong><?=$purchase_order_number?></strong></td>
                       
       </tr>
       <tr>
            <td>Tanggal:</td><td><?=$date_received?></td>
            <td>Gudang:</td><td><?=$warehouse_code?></td>
       </tr>
       <tr>
            
            <td colspan='4'><?=$supplier_info?></td>            
       </tr>
       <tr>
            <td>Keterangan</td>
            <td colspan="4"><?=$comments?>
            </td>
       </tr>
       <tr>
           <td>Receipt By:</td><td><?=$receipt_by?></td>
       </tr>

   </table>

<div id='divPoItemWrap'><div id='divPoItem'><?=$detail?></div></div>              
