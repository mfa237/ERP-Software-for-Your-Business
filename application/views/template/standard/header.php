<script>
 function load_menu(path){
     xurl='<?=base_url()?>index.php/menu/load/'+path;
//     get_this(xurl,'','');
     window.open(xurl,'_self');
     return false;
 }
</script>
<?php $CI =& get_instance();?>
<div >
    <img src='<?php echo base_url().'images/logo_maxon.png';?>' 
       height="50px" style="float:left"/>
</div>
  <a href="#" onclick="load_menu('sales');" class="button"  plain="true" style="height:30px;padding:1px"
   "><img src="<?=base_url().'images/comments.png'?>"  width="20" height="20">Penjualan</a>
   <a href="#"  onclick="load_menu('purchase');" class="button"  plain="true" style="height:30px;padding:1px"
   "><img src="<?=base_url().'images/action_call.png'?>"  width="20" height="20">Pembelian</a>
   <a href="#"  onclick="load_menu('inventory');" class="button"  plain="true" style="height:30px;padding:1px"
   "><img src="<?=base_url().'images/stock.png'?>" width="20" height="20">Inventory</a>
   <a href="#"  onclick="load_menu('bank');" class="button"  plain="true" style="height:30px;padding:1px"
   "><img src="<?=base_url().'images/bank.png'?>"  width="20" height="20">Kas Bank</a>
   <a href="#"  onclick="load_menu('gl');" class="button"  plain="true" style="height:30px;padding:1px"
   "><img src="<?=base_url().'images/accounts.png'?>"  width="20" height="20">Akuntansi</a>
   <a href="#"  onclick="load_menu('admin');" class="button"  plain="true" style="height:30px;padding:1px"
   "><img src="<?=base_url().'images/setup.png'?>"  width="20" height="20">Setup</a>
   <a href="#"  onclick="load_menu('help');" class="button"  plain="true" style="height:30px;padding:1px"
   "><img src="<?=base_url().'images/actions.png'?>" width="20" height="20">Help&nbsp&nbsp</a>

<div style='margin:5px;left:300px;height:25px;display: block'>
    <img src='<?=base_url()?>images/lightbulb.gif' align='left'>
    <div id='message'><?=$message?></div>
</div>
<!-- 
<div style="position:relative;padding:3px;top:5px">
		<a href="#" class="easyui-linkbutton" data-options="plain:true">Home</a>
		<a id="btn-edit" href="#" class="easyui-menubutton" data-options="menu:'#mm1',iconCls:'icon-comments'">Edit</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm2',iconCls:'icon-help'">Help</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm3'">About</a>
	</div>
	<div id="mm1" style="width:150px;">
		<div data-options="iconCls:'icon-undo'">Undo</div>
		<div data-options="iconCls:'icon-redo'">Redo</div>
		<div class="menu-sep"></div>
		<div>Cut</div>
		<div>Copy</div>
		<div>Paste</div>
		<div class="menu-sep"></div>
		<div>
			<span>Toolbar</span>
			<div style="width:150px;">
				<div>Address</div>
				<div>Link</div>
				<div>Navigation Toolbar</div>
				<div>Bookmark Toolbar</div>
				<div class="menu-sep"></div>
				<div>New Toolbar...</div>
			</div>
		</div>
		<div data-options="iconCls:'icon-remove'">Delete</div>
		<div>Select All</div>
	</div>
	<div id="mm2" style="width:100px;">
		<div>Help</div>
		<div>Update</div>
		<div>About</div>
	</div>
	<div id="mm3" class="menu-content" style="background:#f0f0f0;padding:10px;text-align:left">
		<img src="http://www.jeasyui.com/images/logo1.png" style="width:150px;height:50px">
		<p style="font-size:14px;color:#444;">Try jQuery EasyUI to build your modem, interactive, javascript applications.</p>
	</div>
 
-->


 

