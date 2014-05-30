<div style="float:none;clear:both;"></div>
<div id='footer' name='footer'>
<p>Copyright &copy;2000-2013 Talagasoft Indonesia 
- Developed & Design by www.talagasoft.com
- 
    <?php
       
		$url=base_url()."/index.php/".$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
///		add_log_run($url);
		echo "<br>Controller: ".$url; 
		
    ?>
</p>
			<div style="float:right;">
				<a href="http://www.facebook.com/maxon51" target="_new" title="Follow Facebook">
						<img src="http://www.talagasoft.com/img/fb.png"></a>
				<a href="http://www.twitter.com/talagasoft" target="_new" title="Follow Twitter">
					<img src="http://www.talagasoft.com/img/twitter.png">
				</a>
			</div>
			
<? echo load_view("maxon_chat/chatbox"); ?>  
			
</div>
 