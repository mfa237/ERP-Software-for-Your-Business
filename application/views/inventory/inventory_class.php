 <script src="<?=base_url();?>js/lib.js"></script>

 <div id='containerx'>
   <?php echo validation_errors(); ?>
   <?php 
   		if($mode=='view'){
			echo form_open('inventory_class/update','id=myform');
			$disabled='disable';
		} else {
			$disabled='';
   			echo form_open('inventory_class/add','id=myform'); 
   		}
		
   ?>
   <div class='box6x'><h1>KELAS BARANG</h1>
   <table>
	<tr>
		<td>Kode</td><td>
		<?php
		if($mode=='view'){
			echo $kode;
			echo form_hidden('kode',$kode);
		} else { 
			echo form_input('kode',$kode);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Kelas</td><td><?php echo form_input('class',$class);?></td>

       </tr>
	 
        
	 <tr><td>
	 <input type="submit" value="Save" class="easyui-linkbutton" 
                   data-options="iconCls:'icon-save'" style="height:30px;width:60px"/>
	 
	 </td><td>&nbsp;</td></tr>
   </table>
   </form>
   </div>
  