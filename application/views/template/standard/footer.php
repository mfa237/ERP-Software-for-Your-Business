<div style="float:none;clear:both;"></div>
<div id='footerx' name='footexr'>
<p>Copyright &copy;2000-2013 Talagasoft Indonesia 
- Developed & Design by <a href="http://www.talagasoft.com">www.talagasoft.com</a>
- 
    <?php
        $this->load->library('access');
        $this->access->print_info();
		$url=base_url()."/index.php/".$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
///		add_log_run($url);
		echo "<br>Controller: ".$url; 
		
    ?>
</p>
</div>
 