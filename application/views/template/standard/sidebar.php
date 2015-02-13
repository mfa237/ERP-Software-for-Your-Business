<div class="easyui-panel " title="USER LOGIN">
	<?
	echo $this->access->print_info();
	echo "</br>".date('l jS \of F Y h:i:s A');
	?>
</div>
<div class="easyui-panel " title="MENU">
	<?
	echo $_left_menu;
	?>
</div>
<div class="easyui-panel " title="HELP">
	<div id="help"></div>
</div>
<? 
if($this->session->userdata('last_running_visible'))include_once "syslog.php";
if($this->session->userdata('donate_visible'))include_once "donate.php"; 
$google_ads_visible=false;
if($google_ads_visible) $this->load->view('google_ads');

?>



