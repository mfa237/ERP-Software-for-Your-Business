<?
	if(!isset($_left_menu_caption))$_left_menu_caption='Left Menu';
?> 
<script type="text/javascript">
   		CI_ROOT = "<?=base_url()?>index.php/";
		CI_BASE = "<?=base_url()?>";   
</script>

<body>
<div id='user_info' style="position:absolute;width:100%;top:0px;left:0px;display:block;
border:solid 1px #000;background-color:black;height:20px;color:#fff;">
</div> 	
<div id='user_info2' style="position:absolute;top:0px;left:700px;width:600px
;height:40px;display:block;z-index:9000;border:solid 1px #000;background-color:black;
	text-shadow: -1px -1px 0 rgba(0,0,0,0.3);
    box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
    border-radius: 5px;color:#fff;padding:5px;
">
	 
	<?php
	echo $this->access->print_info();
	echo "<br/>".date("Y-m-d H:i a");
	?>
</div>
<div id="wrap">	 
<div class="easyui-layout" style="width:100%;height:1000px;
    box-shadow: 10px 10px 10px rgba(0,0,0,0.15);
	 border-radius: 5px;
">
		<div data-options="region:'north'" style="background-color:#CCCCCC;
			height:100px;padding-top:10px;background-image:url('<?=base_url()?>images/header2.jpg')">
                        <?=$_header?></div>
		<div data-options="region:'south',split:true" 
                     style="background-color:#ddd;height:100px;padding:5px;
                     background-image:url('<?=base_url()?>images/img01.jpg')">
                     <?=$_footer?></div>
		<div id="left_menu" data-options="region:'west',split:true" title="MENU // <?=$_left_menu_caption?>"
			
                     style="background-color: white-smoke;padding:5px;width:200px;
                      ">
                   <?=$_left_menu;?>
		</div>
		<div id="main_content" data-options="region:'center',title:'',iconCls:'icon-ok'" 
                     style="background-color:white-smoke;padding: 5px;width:80%;">
				<div  data-options="iconCls:'icon-help',closable:true" style="padding:10px">
                      <?php echo $_content;?>   
				</div>
		</div>
	</div>
      
 
</div>


 </div>
</body>

</html>
<?
	echo $library_src;
	echo $script_head;
?> 

