<div class="col-sm-6 col-md-8"><h1>MASTER BARANG<div class="thumbnail">
	<?
	echo link_button('Save', 'save()','save');		
	echo link_button('Print', 'print_item()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/inventory/add');		
	echo link_button('Search','','search','true',base_url().'index.php/inventory');		
	
	?>
</div></H1>
<div class="thumbnail">	
	<form id="frmBarang"  method="post">
	<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>

	     <div class='box6'>
	       <div id='box_section' class='section_show'>
		     <table>     
	    <tr><td>Item Number</td>
	        <td>:</td>
	        <td>  
	            <?php
	            if($mode=='add'){
	                    echo form_input('item_number',$item_number,"id=item_number");
	            } else { 
	                    echo $item_number;
	                    echo "<input type='hidden' name='item_number' id='item_number' value='".$item_number."'>";
	            }		
	            ?>        
	       </td>        
	
	       <td>Class</td>
	       <td>:</td>
	       <td><?php echo form_dropdown('class',$class_list,$class);?> </td>
			
	      </tr>
	     <tr><td>Description</td>
	       <td>:</td>
	       <td colspan=4><?php echo form_input('description',$description,
					'style="width:400px"');?></td>
	      </tr>
	     <tr>
	       <td>Supplier</td>
	       <td>:</td>
	       <td><?php echo form_dropdown('supplier_number',$supplier_list,$supplier_number);?> </td>
	
	
	       <td>Active</td>
	       <td>:</td>
	       <td><?=form_radio('active',1,$active=='1'?TRUE:FALSE);?>
	         Yes <?php echo form_radio('active',0,$active=='0'?TRUE:FALSE);?>No </td>
	
	
	      </tr>
	     <tr>
	
	      </tr>
	     <tr>
	       <td>Category</td>
	       <td>:</td>
	       <td><?php echo form_dropdown('category',$category_list,$category);?> </td>
	       <td>Sub Category </td>
	       <td>:</td>
	       <td><?php echo form_dropdown('sub_category',$category_list,$sub_category);?> </td>
	      </tr>
	</table>	
		</div>
			<div  class="easyui-tabs" style="width:auto;height:auto;min-height: 500px">
				<div title="Umum" id="box_section" style="padding:10px">
					<table>
				     <tr>
					       <td>Harga Jual</td>
					       <td>:</td>
					       <td><?php echo form_input('retail',$retail);?> </td>
					
					       <td>Harga Beli</td>
					       <td>:</td>
					       <td><?php echo form_input('cost_from_mfg',$cost_from_mfg);?> </td>
				      </tr>
				     <tr>
					       <td>Harga Pokok </td>
					       <td>:</td>
					       <td><?php echo form_input('cost',$cost);?> </td>
					
					       <td>Unit</td>
					       <td>:</td>
					       <td><?php echo form_input('unit_of_measure',$unit_of_measure);?> </td>

					       <td>Multi Unit </td>
					       <td>:</td>
					       <td><?=form_radio('multiple_pricing',1,$multiple_pricing=='1'?TRUE:FALSE);?>
					         Yes <?php echo form_radio('multiple_pricing',0,$multiple_pricing=='0'?TRUE:FALSE);?>No </td>

				      </tr>
				     <tr>
					       <td>Merk</td>
					       <td>:</td>
					       <td><?php echo form_input('manufacturer',$manufacturer);?> </td>
					
					       <td>Model</td>
					       <td>:</td>
					       <td><?php echo form_input('model',$model);?> </td>
					       <td>Multiple Style </td>
					       <td>:</td>
					       <td><?=form_radio('style',1,$style=='1'?TRUE:FALSE);?>
					         Yes <?php echo form_radio('style',0,$style=='0'?TRUE:FALSE);?>No </td>
				      </tr>
				     <tr>
					       <td>Maximum Qty</td>
					       <td>:</td>
					       <td><?php echo form_input('quantity_on_back_order',$quantity_on_back_order);?> </td>
					
					       <td>Minimum Qty</td>
					       <td>:</td>
					       <td><?php echo form_input('reorder_quantity',$reorder_quantity);?> </td>
				      </tr>
				     <tr>
					       <td>Quantity saat ini</td>
					       <td>:</td>
					       <td><?php echo form_input('quantity_in_stock',$quantity_in_stock);?> </td>
					
					       <td>Quantity dalam pesanan</td>
					       <td>:</td>
					       <td><?php echo form_input('quantity_on_order',$quantity_on_order);?> </td>
				      </tr>
				      <tr><td colspan="6">-</td></tr>
				      <tr><td colspan="6"><h3>Proses lainnya terhadap barang yang bersangkutan</h3></td></tr>
				      <tr>
				      		<td><a href="#" onclick="unit_price()">Multi Satuan (Unit Pricing)</a></td>
				      </tr>
				      <tr>
				      		<td><a href="#" onclick="item_assembly()">Seting Assembly (Item Part)</a></td>
				      </tr>
				      <tr>
				      		<td><a href="#" onclick="others_supplier()">Supplier lain (Supplier Alternate)</a></td>
				      </tr>
				      <tr>
				      		<td><a href="#" onclick="stock_movement()">Transaksi keluar masuk barang</a></td>
				      </tr>

					</table>
				</div>
				<div title="Akuntansi" id='box_section' style="padding:10px;" class='section_hide'>
				     <h3>General Ledger</h3>
				     <table>
			       <tr>
			         <td>Akun Persediaan </td>
			         <td>:</td>
			         <td><?php echo form_input('inventory_account',$inventory_account,"id='inventory_account' style='width:350px'");?>
			         	<?=link_button('',"lookup_coa('inventory_account')",'search')?>			         	
			         </td>
			       </tr>
			       <tr>
			         <td>Akun Penjualan </td>
			         <td>:</td>
			         <td><?php echo form_input('sales_account',$sales_account,"id='sales_account' style='width:350px'");?>
			         	<?=link_button('',"lookup_coa('sales_account')",'search')?>
			         	
			         </td>
			       </tr>
			       <tr>
			         <td>Akun Harga Pokok Persediaan </td>
			         <td>:</td>
			         <td><?php echo form_input('cogs_account',$cogs_account,"id='cogs_account' style='width:350px'");?>
			         	<?=link_button('',"lookup_coa('cogs_account')",'search')?>
			         </td>
			       </tr>
			       <tr>
			         <td>Akun Pajak Penjualan </td>
			         <td>:</td>
			         <td><?php echo form_input('tax_account',$tax_account,"id='tax_account' style='width:350px'");?>
			         	<?=link_button('',"lookup_coa('tax_account')",'search')?>			         	
			         </td>
			       </tr>
			       <tr>
			         <td>&nbsp;</td>
			         <td>&nbsp;</td>
			         <td>&nbsp;</td>
			       </tr>
			     </table>
			  
			   </div>
			 	<div  title="Lain-lain"  id='box_section' style="padding:10px;" class='section_hide'>
			   <table>
			     <tr>
			       <td>Kode Barang Supplier </td>
			       <td>:</td>
			       <td><?php echo form_input('manufacturer_item_number',$manufacturer_item_number);?></td>
			      </tr>
			     <tr>
			       <td>Fitur Khusus </td>
			       <td>:</td>
			       <td colspan="3"><?php echo form_input('special_features',$special_features,"style='width:400px'");?></td>
			      </tr>
			     <tr>
			       <td>Gambar Barang </td>
			       <td>:</td>
			       <td><?php echo form_input('item_picture',$item_picture,"style='width:200px'");?></td>
			       <td>
			       	
						<?php echo form_open_multipart('inventory/do_upload_picture');?>
						
						<input type="file" name="userfile" size="20" /><br>
						<input type="submit" value="upload" />
						
						</form>
			       	
			       	
			       </td>
			      </tr>
			     <tr>
			     <tr>
			       <td>Pakai Nomor Serial </td>
			       <td>:</td>
			       <td><?=form_radio('serialized',1,$serialized=='1'?TRUE:FALSE);?>
			         Yes <?php echo form_radio('serialized',0,$serialized=='0'?TRUE:FALSE);?>No </td>
			         
			       <td rowspan="6">
			       		<img src="" style="width:200px;height:200px;border:1px solid lightgray">
			       </td>  
			      </tr>
			     <tr>
			       <td>Item Assembly </td>
			       <td>:</td>
			       <td><?=form_radio('assembly',1,$assembly=='1'?TRUE:FALSE);?>
			         Yes <?php echo form_radio('assembly',0,$assembly=='0'?TRUE:FALSE);?>No </td>
			      </tr>
			     <tr>
			      </tr>
			     <tr>
			       <td>Weight</td>
			       <td>:</td>
			       <td><?php echo form_input('weight',$weight);?></td>
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
			       
			       <td>&nbsp;</td>
			       <td>&nbsp;</td>
			      </tr>
			   </table>
			 </div>
				<div title="Quantity" style="padding:10px">
						<?
						if(isset($qty_gudang))echo $qty_gudang;
						?>
				</div>
			</div>
		</div>  
	</form>
</div>	

<?=load_view('gl/select_coa_link')?>   	

 <script language='javascript'>
	var url;	
 
  	function save(){
  		if($('#item_number').val()==''){alert('Isi kode barang !');return false;}
  		if($('#description').val()==''){alert('Isi nama barang !');return false;}
  		if($('#unit_of_measure').val()==''){alert('Isi satuan !');return false;}
		url='<?=base_url()?>index.php/inventory/save';
			$('#frmBarang').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#mode').val('view');
						$.messager.show({
							title:'Success',msg:'Data sudah tersimpan.'
						});
					} else {
						$.messager.show({
							title:'Error',msg:result.msg
						});
					}
				}
			});
  	}
  	function print_item(){
            txtNo=$("#item_number").val(); 
            window.open("<?=base_url().'index.php/inventory/print_item/'?>"+txtNo,"new");  		
  	}
  	function unit_price(){
            txtNo=$("#item_number").val(); 
            window.open("<?=base_url().'index.php/inventory/unit_price/'?>"+txtNo,"_self");  		
  	}
  	function item_assembly(){
            txtNo=$("#item_number").val(); 
            window.open("<?=base_url().'index.php/inventory/assembly/'?>"+txtNo,"_self");  		
  	}
  	function others_supplier(){
            txtNo=$("#item_number").val(); 
            window.open("<?=base_url().'index.php/inventory/supplier/'?>"+txtNo,"_self");  		
  	}
  	function qty_gudang(){
            txtNo=$("#item_number").val(); 
            window.open("<?=base_url().'index.php/inventory/qty_gudang/'?>"+txtNo,"_self");  		
  	}
  	

</script>