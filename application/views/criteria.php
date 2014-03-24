<form id='frmPrint' method='post' 
action="<?=base_url()?>index.php/<?=$rpt_controller?>" target="_blank_<?=$rpt_controller?>">
<?php
if(!isset($select_date))$select_date=false;
if(!isset($criteria1))$criteria1=false;
if(!isset($criteria2))$criteria2=false;
if(!isset($criteria3))$criteria3=false;

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
echo "<input type='submit' name='cmdPrint' value='Print'>";
echo form_close();
?>
