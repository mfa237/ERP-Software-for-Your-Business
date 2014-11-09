<div class="panel panel-primary " style="margin-bottom:10px">
	<div class="panel-heading"> 
		<h3 class="panel-title   glyphicon glyphicon-log-in "  style="padding:10px;color:white"> USER LOGIN</h3>
		 
	</div>
	<div class="panel-body"   style="padding:10px;">
		<?
		echo $this->access->print_info();
		echo "</br>".date('l jS \of F Y h:i:s A');
		?>
	</div>	
</div>
<div class="panel panel-primary "  style="margin-bottom:10px" >
	<div class="panel-heading">
		<h3 class="panel-title glyphicon glyphicon-th"  style="padding:10px;color:white"> MAIN MENU</h3>
	</div>
	<div class="panel-body"   style="padding:10px;">
		<?=$_left_menu?>
	</div>
</div>

<div class="panel panel-primary "  style="margin-bottom:10px">
	<div class="panel-heading">
		<h3 class="panel-title glyphicon glyphicon-question-sign"  style="padding:10px;color:white"> HELP BOX</h3>
	</div>
	<div class="panel-body"   style="padding:10px;">
		<div id="help"></div>
	</div>	
</div>
<div class="panel panel-primary "  style="margin-bottom:10px">
	<div class="panel-heading">
		<h3 class="panel-title glyphicon glyphicon-facetime-video"  style="padding:10px;color:white"> LAST RUNING</h3>
	</div>
	<div class="panel-body"   style="padding:10px;">
		<?=$sys_log_run?>
	</div>
</div>

<div class="panel panel-primary "  style="margin-bottom:10px">
	<div class="panel-heading">
		<h3 class="panel-title glyphicon glyphicon-euro"  style="padding:10px;color:white"> DONATE</h3>
	</div>
	<div class="panel-body"   style="padding:10px;">
		 <h4>DONASI</h4>
		 <li><strong>BANK BCA</strong></li>
			<I>ANDRI ANDIANA - 2400 0920 98</I>						 
		 <li><strong>PAYPAL</strong><i>Click Cofee ;)</i></li>	
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="3B2BALTFG7KWQ">
			<input type="image" src="<?=base_url()?>images/donation.png" style="width:165px!important;" width="165px" 
			height="auto" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="10" height="10">
		</form>
	</div>	
</div>

