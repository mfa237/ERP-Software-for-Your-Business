<div class=""><h4>MASTER BARANG JADI</h4><div class="thumbnail">
	<?
	echo link_button('Save', 'save()','save');		
	echo link_button('Print', 'print_item()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/product/add');		
	echo link_button('Search','','search','true',base_url().'index.php/product');		
	echo link_button('Material','','edit','true',base_url().'index.php/inventory/assembly/'.$item_number);		
	echo link_button('Help', 'load_help()','help');		
	?>
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	<script type="text/javascript">
		function load_help() {
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/assembly");
		}
	</script>
	
</div>
<div class="thumbnail">	
	<form id="frmBarang"  method="post">
	<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
	<table>
		<tbody>
			<tr><td>Item Number</td><td><?=form_input("item_number",$item_number,"id='item_number'")?></td>
				<td>Aktif <?=form_radio('active',1,$active=='1'?TRUE:FALSE).' Yes '
					.form_radio('active',0,$active=='0'?TRUE:FALSE).' No'?>
				</td>
			</tr>
			<tr><td>Nama Barang</td>
			<td><?=form_input("description",$description,"id='description' style='width:200px'")?>
			</td>
			</tr>
			<tr><td>Category</td><td><?=form_dropdown('category',$category_list,$category);?></td>
			</tr>
			<tr><td>Sub Category</td><td><?=form_dropdown('sub_category',$category_list,$sub_category);?></td></tr>
			<tr><td>Satuan</td><td><?=form_input("unit_of_measure",$unit_of_measure,"id='unit_of_measure'")?></td></tr>
			<tr><td>Harga Jual</td><td><?=form_input("retail",$retail,"id='retail'")?></td></tr>
			<tr><td>Cost</td><td><?=form_input("cost",$cost,"id='cost'")?></td></tr>
			
			<tr><td>Akun Persediaan</td><td><?=form_input('inventory_account',$inventory_account,"id='inventory_account' style='width:200px'");?>
	         	<?=link_button('',"lookup_coa('inventory_account')",'search')?>
			</td></tr>
		    <tr>
				 <td>Akun Penjualan </td>
				 <td><?php echo form_input('sales_account',$sales_account,"id='sales_account' style='width:200px'");?>
					<?=link_button('',"lookup_coa('sales_account')",'search')?>
				 </td>
		    </tr>
		    <tr>
				 <td>Akun Harga Pokok Persediaan </td>
				 <td><?php echo form_input('cogs_account',$cogs_account,"id='cogs_account' style='width:200px'");?>
					<?=link_button('',"lookup_coa('cogs_account')",'search')?>
				</td>
		    </tr>
		    <tr>
				 <td>Akun Pajak Penjualan </td>
				 <td><?php echo form_input('tax_account',$tax_account,"id='tax_account' style='width:200px'");?>
					<?=link_button('',"lookup_coa('tax_account')",'search')?>			         	
				 </td>
		    </tr>
			 <tr>
			   <td>Pakai Nomor Serial </td>
			   <td><?=form_radio('serialized',1,$serialized=='1'?TRUE:FALSE);?>
				 Yes <?php echo form_radio('serialized',0,$serialized=='0'?TRUE:FALSE);?>No </td>
			  </tr>
			     <tr>
			       <td>Fitur Khusus </td>
			       <td colspan="3"><?php echo form_input('special_features',$special_features,"style='width:200px'");?> 
				   </td>
			      </tr>
			     <tr>
			<tr>
			   <td>Gambar <?php echo form_hidden('item_picture',$item_picture,"id='item_picture'");?>
					<?php echo form_open_multipart('inventory/do_upload_picture');?>
					<input type="file" name="userfile" size="20" /><br>
					<input type="submit" value="upload" />
					</form>
			   </td>
			</tr>
			<tr>
			   <td>
					<img src="" style="width:200px;height:200px;border:1px solid lightgray">
			   </td>  
			</tr>
			
			
			
		</tbody>
	</table>
	</form>
</div>	

<div title="Quantity" style="padding:10px">
	<? if(isset($qty_gudang))echo $qty_gudang; ?>
</div>

<?=load_view('gl/select_coa_link')?>   	

 <script language='javascript'>
	var url;	
 
  	function save(){
  		if($('#item_number').val()==''){alert('Isi kode barang !');return false;}
  		if($('#description').val()==''){alert('Isi nama barang !');return false;}
  		if($('#unit_of_measure').val()==''){alert('Isi satuan !');return false;}
		url='<?=base_url()?>index.php/product/save';
			$('#frmBarang').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#mode').val('view');
						log_msg('Data sudah tersimpan.');
					} else {
						log_err(result.msg);
					}
				}
			});
  	}
  	function item_assembly(){
            txtNo=$("#item_number").val(); 
			if(txtNo==""){alert("Isi kode barang produksi dulu.");return false};
			add("Bill Material","<?=base_url().'index.php/inventory/assembly/'?>"+txtNo);
  	} 	
	

</script>


<script type="text/javascript">
		var index = 0;
		function add(title,url){
			if ($('#tt').tabs('exists', title)){ 
				$('#tt').tabs('select', title); 
			} else { 			
				index++;
				var content = '<iframe scrolling="auto" frameborder="0" src="'+url+'" style="width:100%;height:600px;"></iframe>'; 
				
				$('#tt').tabs('add',{
					title: title,
					content: content,
					closable: true
				});
			}	
		}
		function remove(){
			var tab = $('#tt').tabs('getSelected');
			if (tab){
				var index = $('#tt').tabs('getTabIndex', tab);
				$('#tt').tabs('close', index);
			}
		}
</script>
