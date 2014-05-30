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
      <a class="navbar-brand glyphicon glyphicon-home border-hover" href="<?=base_url()?>index.php"> Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav border-hover" >
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

      <ul class="nav navbar-nav  border-hover">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master<b class="caret"></b></a>
          <ul class="dropdown-menu">
				<li><a href="<?=base_url()?>index.php/customer" class="info_link" >Pelanggan</a></li>
				<li><a href="<?=base_url()?>index.php/supplier"  class="info_link" >Supplier</a></li>
				<li><a href="<?=base_url()?>index.php/inventory"  class="info_link" >Barang/Jasa</a></li>
				<li><a href="<?=base_url()?>index.php/banks" class="info_link" >Rekening</a></li>
				<li><a href="<?=base_url()?>index.php/coa" class="info_link" >Perkiraan</a></li>
          </ul>
        </li>
      </ul>


      <ul class="nav navbar-nav  border-hover">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan<b class="caret"></b></a>
          <ul class="dropdown-menu">
				<li><a href="<?=base_url()?>index.php/sales/reports"  class="info_link">Penjualan</a></li>
				<li><a href="<?=base_url()?>index.php/purchase/reports" class="info_link">Pembelian</a></li>
				<li><a href="<?=base_url()?>index.php/inventory/reports" class="info_link">Inventory</a></li>
				<li><a href="<?=base_url()?>index.php/banks/reports" class="info_link">Kas-Bank</a></li>
				<li><a href="<?=base_url()?>index.php/aktiva/reports" class="info_link">Aktiva Tetap</a></li>
				<li><a href="<?=base_url()?>index.php/manuf/reports" class="info_link">Manufacture</a></li>
				<li><a href="<?=base_url()?>index.php/gl/reports" class="info_link">Akuntansi</a></li>
				<li><a href="<?=base_url()?>index.php/payroll/reports" class="info_link">Payroll</a></li>

          </ul>
        </li>
      </ul>
      
      <form class="navbar-form navbar-right " role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-info">Search</button>
      </form>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=base_url()?>index.php/login/logout" class="glyphicon glyphicon-log-in"> Logout</a></li>
        <li class="dropdown  border-hover">
          <a href="#" class="dropdown-toggle glyphicon glyphicon-wrench" data-toggle="dropdown"> Setting <b class="caret"></b></a>
          <ul class="dropdown-menu">
			<li><a href="<?=base_url()?>index.php/company"  class="info_link" >Perusahaan</a></li>
			<li><a href="<?=base_url()?>index.php/user"  class="info_link" >User Login</a></li>
			<li><a href="<?=base_url()?>index.php/jobs"  class="info_link"  >User Jobs</a></li>
			<li><a  onclick="load_menu('admin')" href="#"  class="info_link" >Administration</a></li>
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
		//$("#divMenu").show();
/* 			$('ul.nav li.dropdown').hover(function() {
			  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
			}, function() {
			  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
			}); */
		
	});
	 function load_menu(path){
	     xurl='<?=base_url()?>index.php/menu/load/'+path;
	     window.open(xurl,'_self');
	     return false;
	 }
</script>
