<?
		$url=base_url()."/index.php/".$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
///		add_log_run($url);
?>
<div style="float:none;clear:both;"></div>
<div id='footer' name='footer'>
<img src='<?=base_url()?>images/logo_maxon.png' style='float:left;margin:5px'>
<p>Copyright &copy;2000-2013 Talagasoft Indonesia - Developed & Design by www.talagasoft.com - <?=$url?></p>
 
    <?php
       
		echo "
			 
		
		<li><a href='http://www.facebook.com/maxon51'  target='_new'>Facebook MaxOn ERP</a></li>
			<li><a href='http://www.twitter.com/talagasoft'  target='_new'>Twitter MaxOn ERP</a></li>
			<li><a href='http://forum.maxonerp.com/' target='_new'>Forum MaxOn ERP</a></li>
			<li><a href='http://www.talagasoft.com/' >Talagasoft Indonesia</a></li>
			";
    ?>

			<div style="float:right;">
				<a href="http://www.facebook.com/maxon51" target="_new" title="Follow Facebook">
						<img src="http://www.talagasoft.com/img/fb.png"></a>
				<a href="http://www.twitter.com/talagasoft" target="_new" title="Follow Twitter">
					<img src="http://www.talagasoft.com/img/twitter.png">
				</a>
			</div>
			
			
</div>
<?
include_once "statusbar.php";
echo load_view("maxon_chat/chatbox"); 
?>