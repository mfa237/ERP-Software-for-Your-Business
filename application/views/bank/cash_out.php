<legend>KAS KELUAR</legend>
<div class="thumbnail box-gradient">
	<?
	if($posted=="")$posted=0;
	if($closed=="")$closed=0;
	
	echo link_button('Save', 'save_this()','save');	
	echo link_button('Print', 'print_voucher()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/cash_out/add');		
	echo link_button('Search','','search','true',base_url().'index.php/cash_out');		
	if($mode=="view") echo link_button('Refresh','','reload','true',base_url().'index.php/cash_out/view/'.$voucher);		
	if($mode=="view") echo link_button('Delete','','remove','true',base_url().'index.php/cash_out/delete/'.$voucher);		
	
	if($posted) {
		echo link_button('UnPosting','','cut','true',base_url().'index.php/cash_out/unposting/'.$voucher);		
	} else {
		echo link_button('Posting','','ok','true',base_url().'index.php/cash_out/posting/'.$voucher);		
	}
	
	echo link_button('Help', 'load_help(\'cash_out\')','help');		
	?>
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help('cash_out')">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
</div>
<div class="thumbnail">
<?php if (validation_errors()) { ?>
	<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<h4>Terjadi Kesalahan!</h4> 
	<?php echo validation_errors(); ?>
	</div>
<?php } ?>
 <?php if($message!="") { ?>
	<div class="alert alert-success"><? echo $message;?></div>
<? } ?>

<?php 
    if($mode=='view'){
            echo form_open('cash_out/update','id=myform name=myform');
            $disabled='disable';
    } else {
            $disabled='';
            echo form_open('cash_out/save','id=myform name=myform'); 
    }
?>

<input type='hidden' id='posted' name='posted' value='<?=$posted?>'>    
   <table class='table2' width='100%'>
		<tr><td>Jenis Transaksi </td><td	>
			<?php echo form_radio('trans_type','cash out',$trans_type=='cash out'," checked ");?> Cash
			<?php echo form_radio('trans_type','cheque out',$trans_type=='cheque out');?> Giro atau Cek
            <?php echo form_radio('trans_type','trans out',$trans_type=='trans out');?> Transfer
		</td>
		<td>Voucher </td><td>
			<?php
				echo "<input type='hidden' name='mode' id='mode' value='$mode'>";
			if($mode=='view'){
				echo "<h3>".$voucher."</h3>";
				echo "<input type='hidden' name='voucher' id='voucher' value='$voucher'>";
			} else { 
				echo form_input('voucher',$voucher);
			}		
			?>
		</td>
       <tr>
            <td>Rekening Keluar</td><td><?php echo form_dropdown( 'account_number',$account_number_list,$account_number);?></td>
            <td>Tanggal</td><td><?php echo form_input('check_date',$check_date,'id=check_date 
             class="easyui-datetimebox"  style="width:150px;height:30px"');?></td>
			 
       </tr>
       <tr>
            <td>Jumlah</td>
			<td>
                <?php echo form_input('payment_amount',$payment_amount);?>
            </td>
            <td>Nomor Giro</td><td><?php echo form_input('check_number',$check_number);?></td>
       <tr>
       <tr>
            <td>Pembayaran Hutang</td>
			<td>
				<?php echo form_checkbox('bill_payment',$bill_payment);?>                
            </td>
            <td>Cleared</td><td><?php echo form_checkbox('cleared',$cleared);?></td>
       <tr>
       <tr>
            <td>Kode Supplier </td>
			<td><?php echo form_input('supplier_number',$supplier_number,"id='supplier_number'");?>
			<?=link_button("","select_supplier();return false","search");?>
            </td>
           
            <td>Cleared Date</td><td><?php echo form_input('cleared_date',$cleared_date,'id=cleared_date 
             class="easyui-datetimebox"   style="width:150px;height:30px"');?></td>
       <tr>
		<tr>
            <td>Dikeluarkan Untuk </td><td><?php echo form_input('payee',$payee,"id='supplier_name'");?></td>
            <td>Giro Batal</td><td><?php echo form_checkbox('void',$void);?></td>
       </tr>
       <tr>
            <td></td><td>
			</td>
            <td></td><td></td>
       </tr>
       <tr>
       </tr>
		<tr>
			<td></td><td></td>
            <td></td><td></td>
		</tr>	 
		<tr>
            <td>Nomor Transfer </td><td><?php echo form_input('bank_tran_id',$bank_tran_id);?></td>
            <td>Nama Bank Penerima</td><td><?php echo form_input('from_bank',$from_bank);?></td>
		</tr>
       <tr>
            <td>Keterangan</td><td colspan='6'><?php echo form_input('memo',$memo,"style='width:500px'");?></td>
       </tr>
   </table>
 </form>

	<div class="easyui-tabs">
		<div title="Perkiraan" style="padding:10px">
			<table id="dgItemCoa" class="easyui-datagrid"  	width='100%'	
				data-options="
					iconCls: 'icon-edit', fitColumns: true, 
					singleSelect: true,
					toolbar: '#tb',  
					url: '<?=base_url()?>index.php/cash_out/items/<?=$voucher?>'
				">
				<thead>
					<tr>
						<th data-options="field:'account',editor:'text',width:'80'">Kode Akun</th>
						<th data-options="field:'description',editor:'text',width:'200'">Nama Perkiraan</th>
						<th data-options="field:'amount',width:'80',editor:'text',align:'right'">Amount</th>
						<th data-options="field:'invoice',width:'80',editor:'text'">Invoice</th>
						<th data-options="field:'comments',width:'100',editor:'text'">Comments</th>
						<th data-options="field:'line_number',width:'30'">Line</th>
					</tr>
				</thead>
			</table>
		</div>

		<? 
		$data['gl_id']=$voucher;
		echo load_view("gl/jurnal_view",$data); 
		?> 
	</div>


</div>
<div id="tb" style="height:auto">
	<form method='post' id='frmItem'>
	<input type='hidden' id='line_number' name='line_number'>
	<input type='hidden' id='voucher_item' name='voucher_item'>
	<table class='table2' width='100%'>
		<thead>
		<tr>
			<td>Kode</td><td>Nama Perkiraan</td><td>Jumlah</td><td>Catatan</td><td>Action</td>
		</tr>
		</thead>
		<tbody><tr>
			<td><input type='text' id='account' name='account' style='width:80px'>
				<?=link_button('','lookup_coa()','search')?></td>
			<td><input type='text' id='description' name='description'></td>
			<td><input type='text' id='amount' name='amount' style='width:80px'></td>
			<td><input type='text' id='comments' name='comments'></td>
			<td><?=link_button('Add Item','save_item()','save')?></td>
			</tr>
		</tbody>
	</table>
	</form>
</div>

<?=load_view('gl/select_coa')?>
<?=load_view('purchase/supplier_select')?>

<script type="text/javascript">
    function save_this(){
        if($('#voucher').val()===''){alert('Isi kode voucher !');return false;};
        if($('#trans_type').val()===''){alert('Isi jenis penerimaan !');return false;};
       $('#myform').submit();
    }
	function save_item(){
		var mode=$("#mode").val();
		if(mode=="add"){alert("Simpan dulu bagian header !");return false;}
		
		var url = '<?=base_url()?>index.php/cash_out/save_item';
		console.log(url);
		$('#voucher_item').val($('#voucher').val());
					 
		$('#frmItem').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					$('#dgItemCoa').datagrid('reload');
					$('#frmItem').form('clear');
					$('#account').val('');
					$('#description').val('');
					$('#line_number').val('');
					$('#amount').val('0');
					$.messager.show({
						title: 'Success',
						msg:  result.msg
					});
				} else {
					$.messager.show({
						title: 'Error',
						msg: result.msg
					});
				}
			}
		});
	}
</script>  
