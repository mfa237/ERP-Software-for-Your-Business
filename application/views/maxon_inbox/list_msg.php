<div class='thumbnail'>
<?=link_button("Inbox","list_msg()","search")?>
</div>
<div class='table2'>
<?
echo $list_msg;
?>
</div>

<script language="javascript">
function list_msg(){
	window.open("<?=base_url()?>index.php/maxon_inbox/list_msg","_self");
}
</script>

<style>
</style>



