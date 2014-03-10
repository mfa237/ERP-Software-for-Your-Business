
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>User Login</title>
 
 </head>
 <body>
 <div id='container'>
  
   <?php echo validation_errors(); ?>
   <?php 
   		if($mode=='view'){
			echo form_open('user/update');
			$disabled='disable';
		} else {
			$disabled='';
   			echo form_open('user/add'); 
   		}
		
   ?> 
   <div class='box6' style='width:300px;float:left;'><h1>USER LOGIN</H1>
   <table>
	<tr>
		<td>Kode</td><td>
		<?php
		if($mode=='view'){
			echo '<strong>'.$user_id.'</strong>'; 
			echo form_hidden('user_id',$user_id);
		} else { 
			echo form_input('user_id',$user_id);
		}		
		?></td>
		<td><input type="submit" value="Save" style='height:30px;width:50px'/>
	</tr>	 
    <tr><td>Nama</td><td><?php echo form_input('username',$username);?></td></tr>
	<tr><td>Password</td><td><?php echo form_input('password',$password);?></td></tr> 
	<tr><td>CID</td><td><?php echo form_input('cid',$cid);?></td></tr>       	
	 <tr></td><td>&nbsp;</td></tr>
   </table>
   <?php if($mode=='view') { ?>
   		<table class='table1'><thead><tr><td>Pilih</td><td>Kelompok</td><td>Keterangan</td></tr></thead>
   			<tbody>
	   		<?php
	   		$i=0;
			$myjobs[]='';
				if($userjobs){
				foreach($userjobs->result() as $myjob){
					$myjobs[$i++]=$myjob->group_id;
				}
			}
	   		foreach($joblist->result() as $job) {
	   			$checked="";
				$found=false;
				for($i=0;$i<count($myjobs);$i++){
					if($found==false){
						if($myjobs[$i]==$job->user_group_id){
							$found=true;
							$checked="checked";
						}	
					}
				}
	   			echo "<tr>
	   			<td><input type='checkbox' name='jobs[]' value='".$job->user_group_id."' $checked ></td>
	   			<td>".$job->user_group_name."</td><td>".$job->description."</td>
	   			
	   			</tr>";
	   			
	   		}
			
			?>
			</tbody>
		</table>
		
	<?php } ?>		
   </div>
   

   </form>
 </body>
</html>

