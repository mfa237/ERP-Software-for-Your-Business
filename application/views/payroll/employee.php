<div><h1>PEGAWAI<div class="thumbnail">
	<?
	echo link_button('Save', 'save_this()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/employee/add');		
	echo link_button('Search','','search','true',base_url().'index.php/employee');		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/employee");
		}
	</script>
	
</div></H1>
<div class="thumbnail">	
<form id="frmEmployee"  method="post">
<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
<?php echo validation_errors(); ?>
   <table>
	<tr>
		<td>Kode Pegawai/NIP</td>
		<td><?php
		if($mode=='view'){
			echo "<strong>$nip</strong>";
			echo form_hidden('nip',$nip,"id=nip");
		} else { 
			echo form_input('nip',$nip,"id=nip");
		}		
		?></td>
		<td>Group</td><td><?=form_dropdown('emptype',$group_list,$emptype,"id=emptype");?>
		</td>
	</tr>	 
       <tr><td>Nama Pegawai</td><td colspan="4"><?=form_input('nama',$nama,"id=nama style='width:400px'");?></td></tr>
       <tr>
       		<td>Departemen</td><td><?=form_dropdown('dept',$dept_list,$dept,"id=dept");?>
       		</td>
       		<td>Level</td><td><?=form_dropdown('emplevel',$level_list,$emplevel,"id=emplevel");?>
       		</td>
       </tr>
       <tr>
       		<td>Divisi</td><td><?=form_dropdown('divisi',$div_list,$divisi,"id=divisi");?>
       		</td>
			<td>Posisi</td><td><?=form_input('position',$position,"id=position");?>
			</td>       
       </tr>
       <tr></tr>
       <tr>
       		<td>Status</td><td><?=form_dropdown('status',$status_list,$status,"id=status");?>
       		</td>
       		<td>ID Mesin</td><td><?=form_input('nip_id',$nip_id);?></td>
       </tr>
       <tr></tr>
       <tr></tr>

       <tr></tr>
       <tr>
       		<td>NPWP</td><td><?=form_input('npwp',$npwp);?></td>
       		<td>Nama Atasan</td><td><?=form_input('supervisor',$supervisor);?></td>
       </tr>
       <tr>
       		<td>Rekening</td><td><?=form_input('account',$account);?></td>
       		<td>Bank</td><td><?=form_input('bank_name',$bank_name,"id=bank_name");?>
       		</td>
       		
       	</tr>
       <tr><td>Alamat</td><td colspan="4"><?=form_input('alamat',$alamat,"style='width:400px'");?></td></tr>
       <tr>
       		<td>Kode Pos</td><td><?=form_input('kodepos',$kodepos);?></td>
       		<td>Telpon</td><td><?=form_input('telpon',$telpon);?></td>
       </tr>
       <tr>
       		<td>Pendidikan</td><td><?=form_input('pendidikan',$pendidikan,"id=pendidikan");?>
       		</td>
      		<td>Handphone</td><td><?=form_input('hp',$hp);?></td>
       </tr>
       <tr>
       		<td>Agama</td><td><?=form_input('agama',$agama,"id=agama");?>
       		</td>
       		<td>Tanggal Masuk</td><td><?=form_input('hireddate',$hireddate,"class='easyui-datetimebox' style='width:150px'");?></td>
   		</tr>
       <tr>
       		<td>Tempat Lahir</td><td><?=form_input('tempat_lahir',$tempat_lahir);?></td>
       		<td>Tanggal Lahir</td><td><?=form_input('tgllahir',$tgllahir,"class='easyui-datetimebox' style='width:150px'");?></td>
       </tr>

       <tr>
       		<td>Gol Darah</td><td><?=form_dropdown('gol_darah',
       			array("A"=>"A","B"=>"B","AB"=>"AB","O"=>"O"),$gol_darah);?>
       		</td>
			<td>Pria/Wanita</td><td><?=form_dropdown('kelamin',array("L"=>"Pria","P"=>"Wanita"),$kelamin);?></td>       	
       </tr>
       <tr><td>Nomor KTP/SIM</td><td><?=form_input('idktpno',$idktpno);?></td></tr>

       <tr><td>Foto</td><td><?=form_input('pathimage',$pathimage);?></td></tr>
       <tr></tr>
       <tr></tr>
   </table>
   </form>
    
</div>   
<script type="text/javascript">
    function save_this(){
        if($('#nip').val()===''){alert('Isi dulu NIP Karyawan !');return false;};
        if($('#nama').val()===''){alert('Isi dulu nama karyawan !');return false;};

		url='<?=base_url()?>index.php/employee/save';
			$('#frmEmployee').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#nip').val(result.nip);
						$('#mode').val('view');
						$.messager.show({
							title:'Success',msg:'Data sudah tersimpan.'
						});
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
        
        
        
    }
</script>  

 
 