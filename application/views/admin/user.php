<h4>USER MANAGEMENT</h4>
<div class="thumbnail">
	<?
	echo link_button('Save', 'save()','save');		
	echo link_button('Print', 'print_item()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/user/add');		
	echo link_button('Search','','search','true',base_url().'index.php/user');		
	if($mode=="view") echo link_button('Refresh','','reload','true',base_url().'index.php/user/view/'.$user_id);		
	echo link_button('Delete', 'delete_user()','remove');		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/user");
		}
	</script>
	
</div>
		

<?php echo validation_errors(); ?>
<div class="col-sm-4 col-md-5" >	
	<form id="frmUser"  method="post">
	<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
   <?php 
   		if($mode=='view'){
			$disabled='disable';
		} else {
			$disabled='';
   		}
   ?> 
   <table>
	<tr><td>User ID </td>
		<td>
			<?php
			if($mode=='view'){
				echo form_input('user_id',$user_id,"id='user_id' readonly");
			} else { 
				echo form_input('user_id',$user_id,"id='user_id'");
			}		
		?></td>
	</tr>	 
    <tr><td>Username &nbsp&nbsp</td><td><?php echo form_input('username',$username,"id=username");?></td></tr>
	<tr><td>Password </td><td><?php echo form_input('password',$password,"id=password");?></td></tr> 
	<tr><td>CID</td><td><?php echo form_input('cid',$cid,"id=cid");?></td></tr>       	
	 <tr><td>&nbsp;</td></tr>
	<tr><td colspan='6'>
		</td>
	</tr>
   </table>	
	</form>
	<div class='thumbnail' style='min-height:100px;min-width:200px'>
		<h5>User Icon</h5>
		<?=form_open_multipart(base_url()."index.php/user/do_upload_picture","id='frmUpload'");?>
		<input type='hidden' id='user_id_image'  name='user_id_image'  value='<?=$user_id?>'>
		<input type="file" name="userfile" id="userfile" size="20" title="Pilih Gambar" stye="float:left" />
		<input type="button" value="Submit" onclick="do_upload()">  
		<?="</form>"?>
		<div id='error_upload'></div>
		<div id='divGambar'>
			<img src='<?=base_url()?>tmp/<?=$path_image?>'/>
			<? echo $path_image ?>
		</div>
	</div>
</div>
<div class='col-sm-6 thumbnail'>
  <p><i>Silahkan cari job yang diinginkan dengan tombol search, 
  kemudian tekan tombol add job untuk menambahkan job untuk user 
  yang bersangkutan.</i></p>
  Pilih Job : <input type='text' name='txtJob' id='txtJob' style='width:100px'>
  <?=link_button('','lookup_job()','search');?>
  <?=link_button('Add','add_job()','save');?>
		<table id="dgJob" class="easyui-datagrid"  
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,  
				url: '<?=base_url()?>index.php/user/list_job/<?=$user_id?>',toolbar:'#cmdJobUser',
			">
			<thead>
				<tr>
					<th data-options="field:'group_id',width:80">Kode</th>
					<th data-options="field:'user_group_name',width:200">Nama Job</th>
				</tr>
			</thead>
		</table>  
</div>
<div id='cmdJobUser'>
 <?=link_button('Remove','delete_job()','remove');?>
</div>
<?=load_view('admin/select_job')?>   	

    <script language='javascript'>
	var url;	
 
  	function save(){
  		if($('#user_id').val()==''){alert('Isi user id !');return false;}
  		if($('#username').val()==''){alert('Isi user name !');return false;}
  		if($('#password').val()==''){alert('Isi password !');return false;}
		url='<?=base_url()?>index.php/user/save';
			$('#frmUser').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#mode').val('view');
						log_msg('Data sudah tersimpan.');
						url='<?=base_url()?>index.php/user/view/'+$('#user_id').val();
						window.open(url,"_self");
					} else {
						log_err(result.msg);
					}
				}
			});
  	}
  	function do_upload()
	{
		var xurl='<?=base_url()?>index.php/user/do_upload_picture';
		$('#frmUpload').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success: function(result){
				console.log(result);
				var result = eval('('+result+')');
				if (result.success){
					
					//$.messager.show({
					//	title:'Success',msg:'Data sudah tersimpan. Silahkan simpan formulir ini.'
					//});
					
					var upload_data=result.upload_data;
					$('#divGambar').html("<img src='<?=base_url()?>tmp/"+upload_data['file_name']+"'>");
				} else {
					$('#error_upload').html(result.error);
				}
			}
		});
	}
	function add_job() {
		var user_id=$("#user_id").val();
		var job=$("#txtJob").val();
		var url='<?=base_url()?>index.php/user/add_job';
		if(user_id==""){alert('Isi user id dulu.');return false;}
		if(job==""){alert('Pilih job terlebih dahulu.');return false;}
		$.ajax({
			type: "GET",
			url: url,
			data:'user_id='+user_id+'&job='+job,
			success: function(msg){
				$('#dgJob').datagrid('reload');
				$('#txtJob').val('');
			},
			error: function(msg){alert(msg);}
		});
	}
	function delete_job(){
		var user_id=$("#user_id").val();
		row = $('#dgJob').datagrid('getSelected');
		if (row){
			xurl=CI_ROOT+'user/del_job/'+user_id+'/'+row['group_id'];                             
			console.log(xurl);
			xparam='';
			$.ajax({
				type: "GET",
				url: xurl,
				param: xparam,
				success: function(msg){
					$('#dgJob').datagrid('reload');
				},
				error: function(msg){$.messager.alert('Info',msg);}
			});         
		}
	}
	function delete_user(){
		
	}

</script>
   
