 <script src="<?=base_url();?>js/lib.js"></script>

 <div id='containerz'>
   <?php echo validation_errors(); ?>
   <?php 
    if($mode=='view') {
            echo form_open('inventory/update','id=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('inventory/add','id=myform'); 
    }
   ?>
     <div class='box6x'>
         <h3>General Information</h3>
       <div id='box_section' class='section_show'>
	     <table>     
    <tr><td>Item Number</td>
        <td>:</td>
        <td>  
            <?php
            if($mode=='view'){
                    echo $item_number;
                    echo form_hidden('item_number',$item_number);
            } else { 
                    echo form_input('item_number',$item_number);
            }		
            ?>        </td>        
      </tr>
     <tr><td>Description</td>
       <td>:</td>
       <td><?php echo form_input('description',$description,
				'style="width:300px"');?></td>
      </tr>
     <tr>
       <td>Supplier</td>
       <td>:</td>
       <td><?php echo form_dropdown('supplier_number',$supplier_list,$supplier_number);?> </td>
      </tr>
     <tr>
       <td>Class</td>
       <td>:</td>
       <td><?php echo form_dropdown('class',$class_list,$class);?> </td>
      </tr>
     <tr>
       <td>Category</td>
       <td>:</td>
       <td><?php echo form_dropdown('category',$category_list,$category);?> </td>
      </tr>
     <tr>
       <td>Sub Category </td>
       <td>:</td>
       <td><?php echo form_dropdown('sub_category',$category_list,$sub_category);?> </td>
      </tr>
     <tr>
       <td>Unit</td>
       <td>:</td>
       <td><?php echo form_input('unit_of_measure',$unit_of_measure);?> </td>
      </tr>
     <tr>
       <td>Harga Jual</td>
       <td>:</td>
       <td><?php echo form_input('retail',$retail);?> </td>
      </tr>

     <tr>
       <td>Harga Beli</td>
       <td>:</td>
       <td><?php echo form_input('cost_from_mfg',$cost_from_mfg);?> </td>
      </tr>
     <tr>
       <td>Harga Pokok </td>
       <td>:</td>
       <td><?php echo form_input('cost',$cost);?> </td>
      </tr>
     <tr>
       <td>Active</td>
       <td>:</td>
       <td><?=form_radio('active',1,$active=='1'?TRUE:FALSE);?>
         Yes <?php echo form_radio('active',0,$active=='0'?TRUE:FALSE);?>No </td>
      </tr>
</table>	
	</div>

	   <div id='box_section' class='section_hide'>
	     <h3>General Ledger</h3>
	     <table>
       <tr>
         <td>Akun Persediaan </td>
         <td>:</td>
         <td><?php echo form_dropdown('inventory_account',
                 $akun_list,$inventory_account);?></td>
       </tr>
       <tr>
         <td>Akun Penjualan </td>
         <td>:</td>
         <td><?php echo form_dropdown('sales_account',$akun_list,$sales_account);?></td>
       </tr>
       <tr>
         <td>Akun Harga Pokok Persediaan </td>
         <td>:</td>
         <td><?php echo form_dropdown('inventory_account',$akun_list,$inventory_account);?></td>
       </tr>
       <tr>
         <td>Akun Pajak Penjualan </td>
         <td>:</td>
         <td><?php echo form_dropdown('tax_account',$akun_list,$tax_account);?></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
     </table>
  
   </div>
 <div id='box_section' class='section_hide'>
   <h3>Lain-Lain</h3>
   <table>
     <tr>
       <td>Kode Barang Supplier </td>
       <td>:</td>
       <td><?php echo form_input('manufacturer_item_number',$manufacturer_item_number);?></td>
      </tr>
     <tr>
       <td>Fitur Khusus </td>
       <td>:</td>
       <td><?php echo form_input('special_features',$special_features);?></td>
      </tr>
     <tr>
       <td>Gamabar Barang </td>
       <td>:</td>
       <td><?php echo form_input('item_picture',$item_picture);?></td>
      </tr>
     <tr>
       <td>Manufacturer</td>
       <td>:</td>
       <td><?php echo form_input('manufacturer',$manufacturer);?></td>
      </tr>
     <tr>
       <td>Model</td>
       <td>:</td>
       <td><?php echo form_input('model',$model);?></td>
      </tr>
     <tr>
       <td>Multiple Style </td>
       <td>:</td>
       <td><?=form_radio('style',1,$style=='1'?TRUE:FALSE);?>
         Yes <?php echo form_radio('style',0,$style=='0'?TRUE:FALSE);?>No </td>
      </tr>
     <tr>
       <td>Pakai Nomor Serial </td>
       <td>:</td>
       <td><?=form_radio('serialized',1,$serialized=='1'?TRUE:FALSE);?>
         Yes <?php echo form_radio('serialized',0,$serialized=='0'?TRUE:FALSE);?>No </td>
      </tr>
     <tr>
       <td>Item Assembly </td>
       <td>:</td>
       <td><?=form_radio('assembly',1,$assembly=='1'?TRUE:FALSE);?>
         Yes <?php echo form_radio('assembly',0,$assembly=='0'?TRUE:FALSE);?>No </td>
      </tr>
     <tr>
       <td>Multi Unit </td>
       <td>:</td>
       <td><?=form_radio('multiple_pricing',1,$multiple_pricing=='1'?TRUE:FALSE);?>
         Yes <?php echo form_radio('multiple_pricing',0,$multiple_pricing=='0'?TRUE:FALSE);?>No </td>
      </tr>
     <tr>
       <td>Weight</td>
       <td>:</td>
       <td><?php echo form_input('weight',$weight);?></td>
      </tr>
     <tr>
       <td>Weight Unit </td>
       <td>:</td>
       <td><?php echo form_input('weight_unit',$weight_unit);?></td>
      </tr>
     <tr>
       <td>Case Pack </td>
       <td>:</td>
       <td><?php echo form_input('case_pack',$case_pack);?></td>
      </tr>
     <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      </tr>
     <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      </tr>
     <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      </tr>
     <tr>
       <td><input name="submit" type="submit" style="width:100px;height:30px" value="Simpan"/></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
      </tr>
   </table>
 </div>

   </div></form>
  