 <?
  $CI =& get_instance();
 ?>
<div class="easyui-tabs" id="tt">	 
	<div title="HOME"><? include_once __DIR__."/../home.php";?></div>
	<script>$().ready(function(){$("#tt").tabs("select","DASHBOARD");});</script>
	<div title="DASHBOARD" style="padding:10px">
		<div class="col-md-12 thumbnail">
		
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/company">
				<div class='photo'><img src='<?=base_url()?>images/ico_asset.png'/></div>
				<div class='detail'>
					<h4>Perusahaan</h4>
					</br>Pengaturan nama dan alamat perusahaan
				</div>
			</div>

			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/user">
				<div class='photo'><img src='<?=base_url()?>images/ico_customer.png'/></div>
				<div class='detail'>
					<h4>User Login</h4>
					</br>Pengaturan User ID Login dan password
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/jobs">
				<div class='photo'><img src='<?=base_url()?>images/ico_forum.png'/></div>
				<div class='detail'>
					<h4>Kelompok User</h4>
					</br>Pengaturan Job User/Kelompok untuk pembatasan modul yang dijalankan
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/periode">
				<div class='photo'><img src='<?=base_url()?>images/ico_purchase.png'/></div>
				<div class='detail'>
					<h4>Periode Akuntansi</h4>
					</br>Proses tutup bulanan periode akuntansi
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/gl_link">
				<div class='photo'><img src='<?=base_url()?>images/ico_setting.png'/></div>
				<div class='detail'>
					<h4>Link Akun</h4>
					</br>Setting kode perkiraan penghubung untuk default transaksi
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/nomor">
				<div class='photo'><img src='<?=base_url()?>images/ico_inventory.png'/></div>
				<div class='detail'>
					<h4>Penomoran</h4>
					</br>Setting nomor bukti semua transaksi
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/company/sales">
				<div class='photo'><img src='<?=base_url()?>images/ico_sales.png'/></div>
				<div class='detail'>
					<h4>Penjualan</h4>
					</br>Setting untuk semua transaksi penjualan
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/company/purchase">
				<div class='photo'><img src='<?=base_url()?>images/ico_sales.png'/></div>
				<div class='detail'>
					<h4>Pembelian</h4>
					</br>Setting untuk semua transaksi pembelian
				</div>
			</div>
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/company/inventory">
				<div class='photo'><img src='<?=base_url()?>images/ico_items.png'/></div>
				<div class='detail'>
					<h4>Inventory</h4>
					</br>Setting untuk semua transaksi inventory
				</div>
			</div>
			
			<div class="box1">
			<div id="p" class="easyui-panel box2" title="Log Aktifitas"  style='width:900px'
				data-options="iconCls:'icon-help'" >
				<div id='divCustomer'><img src=""></div>
			</div>
			</div>

			<div class="box1" >
			<div id="p" class="easyui-panel box2" title="Statistik Data"  style='width:900px'
				data-options="iconCls:'icon-help'" >
				<div id='divSales'><img src=""></div>
			</div>
			</div>

		</div>
	</div>
</div>



<script  language="javascript">
$().ready(function(){
	//void get_this(CI_ROOT+'purchase_invoice/daftar_kartu_gl','','divGL');
});
	
	
</script>

