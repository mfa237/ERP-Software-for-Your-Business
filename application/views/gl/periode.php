<script src="<?=base_url();?>js/lib.js"></script>
<?php echo validation_errors(); ?>
<?php 
    if($mode=='view'){
            echo form_open('periode/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('periode/add','id=myform name=myform'); 
    }
?>

   <div class='box6x'><h1>FINANCIAL PERIODS</h1>
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
            <td>Tanggal Awal:</td><td><?php echo form_input('startdate',$startdate);?></td>
       </tr>
       <tr>
            <td>Tanggal Akhir:</td><td><?php echo form_input('enddate',$enddate);?></td>
       </tr>
       <tr>
            <td>Status</td><td><?php echo form_radio('closed','No',$closed=='0'||$closed=='');?>No
                <?php echo form_radio('closed','Yes',!($closed=='0'||$closed==''));?>Yes
            </td>
       </tr>
 	 
	 <tr><td>
            <a href="#" class="easyui-linkbutton" 
                  data-options="iconCls:'icon-save'"
                  onclick='save_periode()'
                  >Save</a>	 
	 </td><td>&nbsp;</td></tr>
   </table>
<?
echo form_close();
?>
<script type="text/javascript">
    function save_periode(){
        if($('#period').val()===''){alert('Isi dulu kode periode !');return false;};
        if($('#year_id').val()===''){alert('Isi dulu tahun !');return false;};
        $('#myform').submit();
    }
</script>  

 