<script>
 function load_menu(path){
     xurl='<?=base_url()?>index.php/menu/load/'+path;
//     get_this(xurl,'','');
     window.open(xurl,'_self');
     return false;
 }
</script>
<?php $CI =& get_instance();?>
<span >
    <img src='<?php echo base_url().'images/logo_maxon.png';?>' 
       height="50px" style="float:left"/>
</span>
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
