<div>
	<h1>KRITERIA<div class="thumbnail">
</div></H1>
<div class="thumbnail">		
	<?
if(!isset($target_window)){
	$target_window=" target='_blank_$rpt_controller'";
} else {
	$target_window="_self";
}
?>
<form id='frmPrint' method='post' 
action="<?=base_url()?>index.php/<?=$rpt_controller?>" <?=$target_window?>">
<?php
if(!isset($select_date))$select_date=false;
if(!isset($criteria1))$criteria1=false;
if(!isset($criteria2))$criteria2=false;
if(!isset($criteria3))$criteria3=false;
if(!isset($module))$module="";
if($select_date){
    echo "<p>Dari Tanggal :</p>
      <p>".form_input('txtDateFrom',$date_from,'id=date 
             class="easyui-datetimebox" required style="width:150px"')."</p>
      <p>Sampai Tanggal :</p>
      <p>".form_input('txtDateTo',$date_to,'id=date 
             class="easyui-datetimebox" required style="width:150px"')."</p>
    ";
}
if($criteria1){
    echo "<p>".$label1."</p>";
    echo "<p>".form_input('text1',$text1)."</p>";
}
if($criteria2){
    echo "<p>".$label2."</p>";
    echo "<p>".form_input('text2',$text2)."</p>";
    
}
if($criteria3){
    echo "<p>".$label3."</p>";
    echo "<p>".form_input('text3',$text3)."</p>";
    
}
if($module==""){
	echo "<input type='submit' name='cmdPrint' value='Print'>";
} 
if($module=="posting"){
	echo "<input type='submit' name='cmdPosting' value='Posting'>";
	echo "<input type='submit' name='cmdUnPosting' value='UnPosting'>";	
}
echo form_close();
?>
</div>