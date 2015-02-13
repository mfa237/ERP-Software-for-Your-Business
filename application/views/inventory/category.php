   <legend>KELOMPOK BARANG</legend>
   <?php 
   if(!isset($kode))$kode="";
   if(!isset($category))$category="";
   
   echo validation_errors(); 
   
   ?>
   <?php 
   		if($mode=='view'){
			echo form_open('category/update','id=myform');
			$disabled='disable';
		} else {
			$disabled='';
   			echo form_open('category/add','id=myform'); 
   		}
		
   ?>
   <div class='thumbnail box-gradient'><table width='100%' class='table2'>
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
		    <td>Kelompok</td><td><?php echo form_input('category',$category);?></td>
			 <td> <input type="submit" value="Save" class="easyui-linkbutton" 
		                   data-options="iconCls:'icon-save'" style="height:30px;width:60px"/>
			 
			 </td>
       </tr>
   		</table>
   </form>
	</div>