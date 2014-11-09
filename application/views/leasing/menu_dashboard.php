 <?
  $CI =& get_instance();
 ?>
<div class="easyui-tabs" id="tt">	 

	<div title="HOME"><? include_once __DIR__."/../home.php";?></div>
	<script>$().ready(function(){$("#tt").tabs("select","DASHBOARD");});</script>

	<div title="DASHBOARD" style="padding:10px">
		<div class="col-md-12 thumbnail">
			<?
				add_button_menu("Pengajuan Kredit","leasing/app_master","rocket.png",
					"Pencatatan formulir pengajuan kredit pelanggan.");
				add_button_menu("Items Code","leasing/item_master","rocket.png",
					"Data master kode barang atau object kredit");
				add_button_menu("Pembelian","leasing/purchase","rocket.png",
					"Proses pembelian motor,mobil dan kendaraan lainnya");
				add_button_menu("Debitur","leasing/cust_master","rocket.png",
					"Pendaftar nama debitur atau data master pelanggan leasing");
				add_button_menu("Formulir Kredit","leasing/loan","rocket.png",
					"Pencatatan formulir kredit pelanggan dan schedule cicilan kredit dan agunan.");
				add_button_menu("Bayar Cicilan","leasing/payment","rocket.png",
					"Pembayaran cicilan kredit oleh pelanggan");
				add_button_menu("Penutupan","leasing/loan_close","rocket.png",
					"Proses penutupan cicilan kredit pelanggan");
			?>
		</div>
	</div>
</div>
