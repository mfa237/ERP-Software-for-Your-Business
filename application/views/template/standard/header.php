<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand glyphicon glyphicon-th" href="<?=base_url()?>index.php"> Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi <b class="caret"></b></a>
          <ul class="dropdown-menu">
		        <li><a onclick="load_menu('sales')" href="#" >Penjualan</a></li>
		        <li><a onclick="load_menu('purchase')"  href="#" >Pembelian</a></li>
		        <li><a onclick="load_menu('inventory')"  href="#">Inventory</a></li>
	            <li class="divider"></li>
		        <li><a onclick="load_menu('bank')" href="#">Kas-Bank</a></li>
		        <li><a onclick="load_menu('gl')" href="#">Akuntansi</a></li>
	            <li class="divider"></li>
		        <li><a onclick="load_menu('aktiva')" href="#">Aktiva Tetap</a></li>
		        <li><a onclick="load_menu('manuf')" href="#">Manufacture</a></li>
		        <li><a onclick="load_menu('payroll')" href="#">Payroll</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master<b class="caret"></b></a>
          <ul class="dropdown-menu">
				<li><a href="<?=base_url()?>index.php/customer" >Pelanggan</a></li>
				<li><a href="<?=base_url()?>index.php/supplier" >Supplier</a></li>
				<li><a href="<?=base_url()?>index.php/inventory" >Barang/Jasa</a></li>
				<li><a href="<?=base_url()?>index.php/banks">Rekening</a></li>
				<li><a href="<?=base_url()?>index.php/coa">Perkiraan</a></li>
          </ul>
        </li>
      </ul>


      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan<b class="caret"></b></a>
          <ul class="dropdown-menu">
				<li><a href="#" >Penjualan</a></li>
				<li><a href="#">Pembelian</a></li>
				<li><a href="#">Inventory</a></li>
				<li><a href="#">Kas-Bank</a></li>
				<li><a href="#">Aktiva Tetap</a></li>
				<li><a href="#">Manufacture</a></li>
				<li><a href="#">Akuntansi</a></li>
				<li><a href="#">Payroll</a></li>

          </ul>
        </li>
      </ul>
      
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=base_url()?>index.php/login/logout">Logout</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <b class="caret"></b></a>
          <ul class="dropdown-menu">
			<li><a href="<?=base_url()?>index.php/company" >Perusahaan</a></li>
			<li><a href="<?=base_url()?>index.php/user" >User Login</a></li>
			<li><a href="<?=base_url()?>index.php/jobs" >User Jobs</a></li>
			<li><a href="<?=base_url()?>index.php/company/sales">Penjualan</a></li>
			<li><a href="<?=base_url()?>index.php/company/purchase">Pembelian</a></li>
			<li><a href="<?=base_url()?>index.php/company/inventory">Inventory</a></li>
			<li><a href="<?=base_url()?>index.php/company/gl_link">Link Perkiraan</a></li>
			<li><a href="<?=base_url()?>index.php/nomor">Penomoran</a></li>
			<li><a href="<?=base_url()?>index.php/company/others">Lain-lain</a></li>
			<li><a href="<?=base_url()?>index.php/modules" >Modules</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?
function menu($title,$url,$func=false){
	if(!$func){
		echo "<div><a href='".base_url()."index.php/".$url."' class='easyui-linkbutton' data-options='plain:true'>".$title."</a></div>";	
	} else {
	    echo "<div><a href='#' onclick=\"load_menu('$url')\"  class='easyui-linkbutton' data-options='plain:true'>".$title."</a></div>";
	}
}
?> 
<script>
	$(document).ready(function(){
		$("#divMenu").show();	
	});
	 function load_menu(path){
	     xurl='<?=base_url()?>index.php/menu/load/'+path;
	     window.open(xurl,'_self');
	     return false;
	 }
</script>
