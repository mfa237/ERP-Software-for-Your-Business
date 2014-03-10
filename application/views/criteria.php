<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<div id='container'>";
echo '<div class="box6"><h1>'.$caption.'</H1>';
echo form_open();
if($select_date){
    echo "<p>Dari Tanggal :</p>
      <p>".form_input('txtDateFrom',$date_from)."</p>
      <p>Sampai Tanggal :</p>
      <p>".form_input('txtDateTo',$date_to)."</p>

    ";
}
if($criteria1){
    echo "<p>".$label1."</p>";
    echo "<p>".form_input('text1',$text1)."</p>";
}
if($criteria2){
    echo "<p>".$label2."</p>";
    echo "<p>".form_input('text1',$text2)."</p>";
    
}
if($criteria3){
    echo "<p>".$label3."</p>";
    echo "<p>".form_input('text1',$text3)."</p>";
    
}
echo form_submit('cmdPrint','Print');
echo form_close();
echo '</div></div>';
?>
