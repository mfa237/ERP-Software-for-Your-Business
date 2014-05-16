<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<head><title>MaxOn ERP Online Demo</title>
	<?php
date_default_timezone_set("Asia/Jakarta");
//date("Y-m-d H:i:s", mktime(date("H")-1, date("i"), date("s"), date("m"), date("d"), date("Y")));
//echo gmdate("Y-m-d H:i:s", time()+60*60*7);
?>
<?
echo $library_src;
echo $script_head;
if(!isset($visible_right))$visible_right="True";
if(!isset($_left_menu))$_left_menu="";
if(!isset($_right_menu))$_right_menu="";
?>
	
<?

	if(!isset($_left_menu_caption))$_left_menu_caption='Left Menu';
	if(!isset($message))$message="";
?> 
<script type="text/javascript">
   		CI_ROOT = "<?=base_url()?>index.php/";
		CI_BASE = "<?=base_url()?>"; 		
</script>
</head>
<body>
<div class="container" style="margin-left:15px;padding-left:5px;" >
	<? if(!$ajaxed) { ?> 
		<div class="row" style="background-repeat:no-repeat; background-image:url('<?=base_url()?>images/header2.jpg')">
			<img src="<?=base_url()?>images/logo_maxon.png">
			<div style="float:right;background:#428bca;">
				<a href="http://www.facebook.com/maxon51" target="_new" title="Follow Facebook">
						<img src="http://www.talagasoft.com/img/fb.png"></a>
				<a href="http://www.twitter.com/talagasoft" target="_new" title="Follow Twitter">
					<img src="http://www.talagasoft.com/img/twitter.png">
				</a>
			</div>
			<?=$_header?>
			
		</div>
		<div class="row" >
			<div class="col-md-9">
				<?php echo $_content;?>
			</div>
			
			<? if($visible_right!=""){?>
				<div id="__section_right" class="col-md-3" >
					<div class="thumbnail">
						<?
						echo $this->access->print_info();
						echo "</br>".date('l jS \of F Y h:i:s A');
						?>
					</div>
					<div class="thumbnail">
						<?=$_left_menu?>
					</div>
					<div class="thumbnail">
						<div id="help"></div>
					</div>
					<div class="thumbnail">
						<?=$sys_log_run?>
					</div>
					<div class="thumbnail">
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
					<div class="thumbnail"><div class="easyui-calendar" ></div></div>
				</div>	
			<? } ?>
			
		</div>
		<div class="row-fluid"><div class="thumbnail" style="margin:10px 10px;"><?=$_footer?></div></div>
	<? } else { ?>
		 
		<?php echo $_content;?>  
		 
	<? } ?>
</div>  
</body>

<script type="text/javascript">
		var index = 0;
		function add(title,url){
			if ($('#tt').tabs('exists', title)){ 
				$('#tt').tabs('select', title); 
			} else { 			
				index++;
				var content = '<iframe scrolling="auto" frameborder="0" src="'+url+'" style="width:100%;height:600px;"></iframe>'; 
				
				$('#tt').tabs('add',{
					title: title,
					content: content,
					closable: true
				});
			}	
		}
		function remove(){
			var tab = $('#tt').tabs('getSelected');
			if (tab){
				var index = $('#tt').tabs('getTabIndex', tab);
				$('#tt').tabs('close', index);
			}
		}
$(document).ready(function(){
	$(".info_link").click(function(event){
		  	event.preventDefault(); 
			var url = $(this).attr('href');
			var n = url.lastIndexOf("/");
		 
			var title=url.substr(n+1);
			if(title=='reports'){
				title=url.substr(n-10);
				title=title.substr(title.indexOf("/"));
			}
			if(url.indexOf("/menu")>5){
				window.open(url,"_self");
			} else {
				add(title,url);
			}
	});
});
</script>
