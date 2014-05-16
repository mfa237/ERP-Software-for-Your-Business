<div><h1>FINANCIAL PERIODS<div class="thumbnail">
	<?
	echo link_button('Save', 'save_periode()','save');		
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
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/periode");
		}
	</script>
	
</div></H1>
<div class="thumbnail">	<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('periode/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('periode/add','id=myform name=myform'); 
    }
?>

   
   <table>
	<tr>
		<td>Periode:</td><td>
		<?php
		if($mode=='view'){
			echo $period;
			echo form_hidden('period',$period);
		} else { 
			echo form_input('period',$period);
		}		
		?></td>
	</tr>	 
       <tr>
            <td>Tahun:</td><td><?php echo form_input('year_id',$year_id);?></td>
       </tr>
       <tr>
            <td>Urutan:</td><td><?php echo form_input('sequence',$sequence);?></td>
       </tr>
       <tr>
            <td>Tanggal Awal:</td><td><?php echo form_input('startdate',$startdate,'id=date 
             class="easyui-datetimebox" required style="width:150px"');?></td>
       </tr>
       <tr>
            <td>Tanggal Akhir:</td><td><?php echo form_input('enddate',$enddate,'id=date 
             class="easyui-datetimebox" required style="width:150px"');?></td>
       </tr>
       <tr>
            <td>Closed</td><td><?php echo form_radio('closed','No',$closed=='0'||$closed=='');?>No
                <?php echo form_radio('closed','Yes',!($closed=='0'||$closed==''));?>Yes
            </td>
       </tr>
 
   </table>
<?
echo form_close();
?>
</div>
<script type="text/javascript">
    function save_periode(){
        if($('#period').val()===''){alert('Isi dulu kode periode !');return false;};
        if($('#year_id').val()===''){alert('Isi dulu tahun !');return false;};
        $('#myform').submit();
    }
</script>  

 