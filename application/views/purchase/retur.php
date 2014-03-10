<link rel="stylesheet" type="text/css" href="<?=base_url();?>js/jquery-ui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>js/jquery-ui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>js/jquery-ui/themes/demo.css">
<script src="<?=base_url();?>js/jquery-ui/jquery.easyui.min.js"></script>

<h1>RETUR PEMBELIAN</H1>
<form id='frmReturItem' method="POST" name="frmReturItem" action="<?=base_url()?>index.php/purchase_retur/save"> 
<table>
	<tr>
		<td>Nomor Retur</td><td class='field'><strong><?=$purchase_order_number?></strong></td>
		<?="<input type='hidden' id='purchase_order_number' value='$purchase_order_number'>"?>
        <td>Tanggal</td><td class='field'><?php echo form_input('po_date',$po_date,'id=po_date');?></td>
    </tr>	 
    <tr>
        <td>Nomor Faktur</td><td class='field'><?=$po_ref?></td>
        <?=form_hidden("po_ref",$po_ref);?>
    </tr>
    <tr>
    	<?=form_hidden("supplier_number",$supplier_number);?> 
        <td>Supplier</td><td colspan="4" class='field'><?=$supplier_info?></td>
    </tr>
    <tr>
        <td>Keterangan</td><td colspan="3" class='field'>
        	<?php echo form_input('comments',$comments,'id=comments style="width:300px"');?>
        </td>
    </tr>	  
</table>
<H1></H1>
	<div id="divItemTool">
	    <a onclick="addnew_item();return false;" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" >Append</a>
	    <a onclick="remove_item();return false;" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" >Remove</a>
	    <a onclick="load_item();return false;"href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok',plain:true" >Refresh</a>
	</div>
<div id="divItem">
	<div id="divItemContent">*tekan tombol refresh apabila tidak tampil.</div>
</div> 
<script type="text/javascript">
$('document').ready(function(){
	void load_item();	
});
function load_item()
{
	$('#divItemContent').html('');
	var nomor=$("#purchase_order_number").val();
	var url=CI_ROOT+"purchase_retur/lineitems/"+nomor;
	void get_this(url,'','divItemContent');
};
function addnew_item()
{
	
}
function remove_item()
{
	
}
</script>

