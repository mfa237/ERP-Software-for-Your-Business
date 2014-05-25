<div><div class="thumbnail">
<legend>WORK ORDER EXECUTION</legend>

	<?
	echo link_button('Save', 'save_this()','save');		
	echo link_button('Print', 'print()','print');		
	echo link_button('Add','','add','true',base_url().'index.php/work_exec/add');		
	echo link_button('Search','','search','true',base_url().'index.php/work_exec');		
	echo link_button('Help', 'load_help()','help');		
	
	?>
	<a href="#" class="easyui-splitbutton" data-options="menu:'#mmOptions',iconCls:'icon-tip'">Options</a>
	<div id="mmOptions" style="width:200px;">
		<div onclick="load_help()">Help</div>
		<div>Update</div>
		<div>MaxOn Forum</div>
		<div>About</div>
	</div>
	<script type="text/javascript">
		function load_help() {
			window.parent.$("#help").load("<?=base_url()?>index.php/help/load/work_exec");
		}
	</script>
	
</div></H1>
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


<form id="frmWoe" method="post" >
	<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
	<table>
		<tbody>
			<tr><td>WOE Number</td><td><?=form_input("work_exec_no",$work_exec_no,"id='work_exec_no'")?></td></tr>
			<tr><td>WO Number</td><td><?=form_input("wo_number",$wo_number,"id='wo_number'")?>
				<?=link_button('','lookup_work_order()','search');?>
			</td></tr>
			<tr><td>Start Date</td><td><?=form_input("start_date",$start_date,"id='start_date' class='easyui-datetimebox' style='width:150px'")?></td></tr>
			<tr><td>Expect Date</td><td><?=form_input("expected_date",$expected_date,"id='expected_date' class='easyui-datetimebox' style='width:150px'")?></td></tr>
			<tr><td>Department</td><td><?=form_input("dept_code",$dept_code,"id='dept_code'")?></td></tr>
			<tr><td>Person</td><td><?=form_input("person_in_charge",$person_in_charge,"id='person_in_charge'")?></td></tr>
			<tr><td>Comments</td><td><?=form_input("comments",$comments,"id='comments'")?></td></tr>
		</tbody>
	</table>
	<div id="divWoItem"><?=$detail?></div>
<!-- WORK ORDER PRODUCT - kode,nama barang, wo_qty, unit, exe_qty, saldo_qty, warehouse -->
<!-- MATERIAL USE - kode,nama barang, qty,unit,cost,total_cost,number,tanggal,id -->
<!-- PRODUCT RESULT - kode,nama,qty,unit,cost,total,number,tanggal,id -->
<!-- TOTAL COST - calculate summary class kode barang -->
<!-- ADD MATERIAL USE, ADD FINISHED PRODUCT RESULTS, ADD DELIVERY PRODUCT -->
	</form>
</div>
<div id='dlgWo'class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
		closed="true" buttons="#btnWo">
		<table id="dgWo" class="easyui-datagrid" data-options="singleSelect: true">
			<thead>
				<tr>
					<th data-options="field:'work_order_no',width:150">Nomor Work Order</th>
					<th data-options="field:'start_date',width:80">Tanggal Mulai</th>
					<th data-options="field:'expected_date',width:80">Tanggal Akhir</th>
					<th data-options="field:'wo_status',width:80">Status</th>
				</tr>
			</thead>
		</table>
</div>
<div id="btnWo"><?=link_button("Select","select_work_order();return false;","ok")?></div>	   

<script type="text/javascript">
    function save_this(){
  		if($('#work_exec_no').val()==''){alert('Isi nomor bukti !');return false;}
  		if($('#work_order_no').val()==''){alert('Isi nomor work order !');return false;}
		url='<?=base_url()?>index.php/work_exec/save';
			$('#frmWoe').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#work_exec_no').val(result.work_exec_no);
						var no=$('#work_exec_no').val();
						window.open("<?=base_url()?>index.php/work_exec/view/"+no,"_self");
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
    }
	function lookup_work_order()
	{
		$('#dlgWo').dialog('open').dialog('setTitle','Cari nomor work order');
		$('#dgWo').datagrid({url:'<?=base_url()?>index.php/workorder/select_wo_open'});
		$('#dgWo').datagrid('reload');
	}
	function select_work_order()
	{
		var row = $('#dgWo').datagrid('getSelected');
		if (row){
			$('#wo_number').val(row.work_order_no);
			load_work_order();
			$('#dlgWo').dialog('close');
		}
	}
	function load_work_order(){
 		if($('#wo_number').val()==''){alert('Pilih nomor work order !');return false;}
 		$("#divWoItem").fadeIn("slow");
 		url=CI_ROOT+"workorder/load_item_exec";
 		param="q=open&wo="+$('#wo_number').val();
 		void get_this(url,param,'divWoItem');
	}
	
</script>  

 