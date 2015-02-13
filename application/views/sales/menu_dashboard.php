<script type="text/javascript" src="<?=base_url()?>assets/maphilight-master/jquery.maphilight.min.js"></script>

 <?
  $CI =& get_instance();
 ?>
<div class="easyui-tabs" id="tt">	 
	<div title="HOME"><? include_once __DIR__."/../home.php";?></div>
	<script>$().ready(function(){$("#tt").tabs("select","DASHBOARD");});</script>
	<div title="DASHBOARD" style="padding:10px">
		<div class="thumbnail">

 
<div style="margin:10px 0;"></div>
	<div title="Sales Dashboard" style="padding:10px">
		<div class='row'>
		<div class='thumbnail col-md-9'  style='margin:5px'>
			<img src="<?=base_url()?>images/sales.png" usemap="#sales" class="map">
			<map id="sales" name="sales">
			<area shape="circle" alt="Customer" coords="70,56,31" href="<?=base_url()?>index.php/customer" class="info_link" title="Customer" />
			<area shape="circle" alt="" coords="172,55,29" href="<?=base_url()?>index.php/sales_order" class="info_link" title="Sales Order"  />
			<area shape="circle" alt="" coords="275,55,30" href="<?=base_url()?>index.php/delivery_order" class="info_link"  title="Delivery" />
			<area shape="circle" alt="" coords="368,55,29"href="<?=base_url()?>index.php/invoice" class="info_link"  title="Invoice" />
			<area shape="circle" alt="" coords="471,53,30" href="<?=base_url()?>index.php/payment" class="info_link"  title="Payment" />
			<area shape="circle" alt="" coords="163,212,31"href="<?=base_url()?>index.php/sales_retur" class="info_link"  title="Retur" />
			<area shape="circle" alt="" coords="271,212,31" href="<?=base_url()?>index.php/sales_crmemo" class="info_link"  title="Credit Memo" />
			<area shape="circle" alt="" coords="92,323,30" href="<?=base_url()?>index.php/inventory" class="info_link"  title="Inventory" />
			<area shape="circle" alt="" coords="221,322,29" href="<?=base_url()?>index.php/shipping_locations" class="info_link"  title="Warehouse" />
			<area shape="circle" alt="" coords="354,321,28" href="<?=base_url()?>index.php/salesman" class="info_link"  title="Salesman" />
			<area shape="circle" alt="" coords="470,317,29" href="<?=base_url()?>index.php/jurnal" class="info_link" title="General Ledger" />
			<area shape="default" nohref="nohref" alt="" />
			</map>
			 
		</div>
		</div>
		<div class="row">
			<div class="thumbnail col-md-6 " >
				<div id="p" class="thumbnail" title="Saldo Piutang Pelanggan"  
					data-options="iconCls:'icon-help'" >
					<div id='divCustomer' style="height:200px;padding:5px;">
						 <img src="<?=base_url()?>images/loading.gif">		
					</div>
				</div>
			</div>
			
			<div class="thumbnail col-md-6 " >
				<div id="p" class="thumbnail" title="Total Penjualan"  
					data-options="iconCls:'icon-help'" >
					<div id='divSales'  style="height:200px;padding:5px;"><img src="<?=base_url()?>images/loading.gif"></div>
				</div>
			</div>
			<div class="thumbnail col-md-6 " >
					<div id='divFaktur'  style="height:200px;padding:5px;">
						<table id="dgRetur" class="easyui-datagrid"  
							style="width:400px;min-height:300px"
							data-options="title: 'Faktur Jatuh Tempo',
								iconCls: 'icon-tip',
								singleSelect: true,
								toolbar: '',
								url: '<?=base_url()?>index.php/invoice/daftar_saldo_faktur'
							">
							<thead>
								<tr>
									<th data-options="field:'invoice_number',width:60">Faktur</th>
									<th data-options="field:'invoice_date',width:70">Tanggal</th>
									<th data-options="field:'due_date',width:70">Jth Tempo</th>
									<th data-options="field:'company',width:80">Pelanggan</th>
									<th data-options="field:'amount',width:80,align:'right',editor:'numberbox',
										formatter: function(value,row,index){
											return number_format(value,2,'.',',');}">Jumlah</th>
								</tr>
							</thead>
						</table>					
				</div>
			</div>
			<div class="thumbnail col-md-6 " >
					<div id='divFaktur'  style="height:200px;padding:5px;">
						<table id="dgRetur" class="easyui-datagrid"  
							style="width:400px;min-height:300px"
							data-options="title: 'Omzet Salesman',
								iconCls: 'icon-tip',
								singleSelect: true,
								toolbar: '',
								url: '<?=base_url()?>index.php/invoice/omzet_salesman'
							">
							<thead>
								<tr>
									<th data-options="field:'salesman',width:180">Nama Salesman</th>
									<th data-options="field:'jumlah',width:80,align:'right',editor:'numberbox',
										formatter: function(value,row,index){
											return number_format(value,2,'.',',');}">Jumlah</th>
								</tr>
							</thead>
						</table>					
				</div>
			</div>

		</div>
	</div>
</div>


	</div>
</div>


<script  language="javascript">

$().ready(function(){
	$("#tt").tabs("select","DASHBOARD");
		$('.map').maphilight({fade: false});
	
		//void get_this(CI_ROOT+'customer/grafik_saldo','','divCustomer');
		//void get_this(CI_ROOT+'invoice/grafik_penjualam','','divSales');
		 
		//void get_this(CI_ROOT+'customer/daftar_umur','','divUmur');
		//void get_this(CI_ROOT+'invoice/daftar_umur_faktur','','divUmurFaktur');
		//void get_this(CI_ROOT+'purchase_invoice/daftar_kartu_gl','','divGL');
	});
</script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/excanvas.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.categories.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/flot/jquery.flot.pie.js"></script>


<script type="text/javascript">

	var alreadyFetched = {};
	var dataurl=CI_ROOT+'customer/grafik_saldo3';
	var data = [], series = Math.floor(Math.random() * 6) + 3;
	var i=0;
	 
	$.ajax({
				url: dataurl,
				type: "GET",
				dataType: "json",
				success: onDataReceived
	});
	function onDataReceived(series) {
		if (!alreadyFetched[series.label]) {
			alreadyFetched[series.label] = true;
			for(j=0;j<series.length;j++){
				data[i]={label:series[j][0], data:series[j][1]};
				i++;
			}
		}
		 

		$.plot('#divCustomer', data, {
				series: {
					pie: { show: true}
				},
				legend: {
					show: false
				}
			});
	}
	


	var options2 = {
			lines: {
				show: true,
				barWidth: 0.6,
				align: "center"
			},
			points: {
				show: true
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
	};	
	var data2 = [];
	var alreadyFetched2 = {};
	var dataurl2=CI_ROOT+'invoice/grafik_penjualan';
 
	$.ajax({
				url: dataurl2,
				type: "GET",
				dataType: "json",
				success: onDataReceived2
	});
	

	function onDataReceived2(series) {
		if (!alreadyFetched2[series.label]) {
			alreadyFetched2[series.label] = true;
			data2.push(series);
		}
		$.plot("#divSales", data2, options2);
	}
			
			
			
	</script>
