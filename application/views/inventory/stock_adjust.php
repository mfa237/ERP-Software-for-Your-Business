
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Stock Adjustment</title>
 <script language='javascript'>
   $(document).ready(function(){
        $("#cmdPrint").click(function(){
            txtNo='<?=$shipment_id?>'; 
            window.open("<?=base_url().'index.php/stock_adjust/print_bukti/'?>"+txtNo,"new");
        });
    });
         
    function add_row(nRow,txtItem){
        txtQty=$('#txtQty'+nRow).val();
        txtNo='<?=$shipment_id?>';     
        param= 'cmd=add&item='+txtItem+'&qty='+txtQty;
        $.ajax({
            type : 'GET',
            url : '<?=base_url();?>index.php/stock_adjust/add_item/'+txtNo,
            data: param,
            success:function (data) {                
                $("#divItems").html(data);   
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert('Gagal pilih baris ini !');
            }
        });       

    }
    function del_row(nRow){
     
        txtNo='<?=$shipment_id?>';     
        $.ajax({
            type : 'GET',
            url : '<?=base_url();?>index.php/stock_adjust/del_item/'+nRow+'/'+txtNo,
            data: '',
            success: function (data) {                
                $("#divItems").html(data);              
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert('Gagal hapus baris ini !');
            }          
        });       
    }
    function b_search(){
        txtSearch=$('#txtSearch').val();
        txtLimit=$('#txtLimit').val();
        xurl='<?=base_url();?>index.php/inventory/lookup/0/'+txtLimit;
         
        $.ajax({
            type : 'GET',
            url : xurl,
            data: 'search='+txtSearch,
            success:function (data) {                
                $("#box_item_1").html(data);              
            }          
        });
         
    }
 </script>
 </head>
 <body>
 <div id='container'>
     <div class='box6' ><h1>ADJUSTMENT STOCK</H1>
   
   <h3>Formulir ini dipakai untuk proses adjustment atau penyesuaian stock
       item barang</h3>
 
 	<?php echo $message;?>
 
   <?php echo validation_errors(); ?>
   <?php 
   		if($mode=='view'){
			echo form_open('stock_adjust/update');
			$disabled='disable';
		} else {
			$disabled='';
   			echo form_open('stock_adjust/add'); 
   		}
		
   ?>
   
   <table>
	<tr>
		<td>Nomor</td><td><?php 
                    if($mode=='add'){
                        echo form_input('shipment_id',$shipment_id);
                    } else {
                        echo '<h2>'.$shipment_id.'</h2>';
                        echo form_hidden('shipment_id',$shipment_id);
                    }    
                ?></td>
	</tr>
       <tr>
		<td>Tanggal</td><td><?php  
                if($mode=='add')echo form_input('date_received',$date_received);
                else echo $date_received;
                ?></td>
       </tr>
	<tr>
		<td>Petugas</td><td><?php 
                if($mode=='add')echo form_input('supplier_number',$supplier_number);
                else echo $supplier_number;
                ?></td>
	</tr>
       <tr>
		<td>Referensi</td><td><?php 
                if($mode=='add')echo form_input('package_no',$package_no);
                else echo $package_no;
                ?></td>
       </tr>
	 <tr><td>&nbsp</td><td>&nbsp</td></tr>
	<tr><td>&nbsp</td><td>
         <?
            if($mode=='add') {
               echo '<input name="submit" type="submit" 
                       style="width:100px;height:30px" value="Simpan"/>';
            }   else {
               echo '<input type="button" name="cmdPrint" id="cmdPrint" 
                       style="width:100px;height:30px" value="Print"/>';
            }
            ?>
            </td></tr>
   
     <tr><td colspan='4'>
             <div id='divItems'>
             <?=$receive_items;?>
             </div>
         
         </td><td>&nbsp</td></tr>    
   </table>
   </form>
    </div>
     <? if($mode=='view') { ?>
     <div id='box_item' >
        
         <div id='box_item_1'  name='box_item_1' >
             <?
            echo $pagination;
            echo $select_items;                 
             ?>
         </div>
     </div>
     
     <? } ?>
   </div>
 </body>
</html>

