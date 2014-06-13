<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
<head><title>MaxOn ERP Online Demo</title>
<?
echo $library_src;
echo $script_head;
?>
<link rel="stylesheet" href="assets/flexslider/flexslider.css" type="text/css" media="screen">
<script type="text/javascript" src="assets/flexslider/jquery.flexslider-min.js"></script>

<script languange="javascript">

	if(top != self) top.location.replace(location);	//detect if run iframe

    function login(){
    	$("#lblMessage").html("Please wait...");
		url='<?=base_url()?>index.php/login/verify';
			$('#frmLogin').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						window.open("index.php","_self");
					} else {
						$("#lblMessage").show();
						$("#lblMessage").html(result.msg);
					}
				}
			});
    }
</script>
 
       
</head>
<body>
<div class="container">
	<div class="row" style="padding:10px">
		<div class="col-md-2">
			<img src="images/logo_maxon.png" style="float:left">
		</div>
		<div class="col-md-7">
			<p>MaxOn adalah sebuah software yang membantu anda 
			membuat transaksi-transaksi yang ada di perusahaan, meliputi transaksi penjualan, 
			pembelian, hutang, piutang, stock, aktiva, buku kas, akuntansi dan lain sebagainya.</p>
		</div>
	</div>
		<div class="welcome_line welcome_t"></div>
	
	<div class="row" style="padding-left:10px;padding-right:10px">
		<div class="row">
			<div class="col-md-7"  style="padding:10px" >
					  <? include "slider.php" ?>	
			</div>
			<div class="panel panel-primary col-md-5"  style="border:0px solid white">
					<div class="panel-heading">
						<h3 class="panel-title"  style="padding:10px;color:white">USER LOGIN</h3>
					</div>
					<div class="panel-body"   style="padding:10px;">
						<p>Untuk mulai menggunakan software ini anda diharuskan login terlebih dahulu, 
						silahkan isi userid dan password yang benar dibawah ini :</p>
						<form name="frmLogin" id="frmLogin" method="post" role="form">
							<div class="form-group">
								<label for="username">Username:</label>
								<input  class="form-control" type="text" size="20" id="user_id" name="user_id" placeholder="Enter Username">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input class="form-control" type="password" size="20" id="passowrd" name="password" placeholder="Enter Password"/>
								
								<i>Untuk mencoba gunakan login user : admin, password: admin</i>
							</div>
							<div class="form-group">
							<input class="btn btn-primary" type="button" value="Login" onclick="login()"   >
							
							
							<div id="lblMessage" class="alert alert-danger" style="display:none;margin-top:10px"></div>
						</form>      	
					</div>	
				</div>	 
			</div>
		</div>
			<div class=" " style="min-height:200px;">
					<div class="welcome_line welcome_t"></div>
					<img alt="..." src="<?=base_url()?>images/download.gif" 
					style="float:right;margin-right:10px;" width="200px">			
			<div class="caption">
				<p><strong>DOWNLOAD</strong></p>
				<p>
					Silahkan anda klik download dan gratis untuk dikembangkan lagi diperusahaan anda.
						<a href="http://sourceforge.net/projects/maxon/" target="_blank">
							Menuju TKP
						</a>
				</p>
				<p>
					Siapapun boleh memakai software ini, anda ingin mencoba demo aplikasi yang sudah 
					terpasang silahkan klik tautan ini.
					<a href="http://maxon5.intanhotel.com" target="_blank">
					Menuju TKP
						</a>
				</p>
	       </div>
	       </div>
			<div class="clearfix"></div>
			
			<div class=" " style="min-height:200px;">
					<div class="welcome_line welcome_t"></div>
					<img alt="..." src="<?=base_url()?>images/profle.png" 
					style="float:left;margin-right:10px;">			
			<div class="caption">
				<p><strong>KEAMANAN</strong></p>
				<p>
					MAXON menyediakan fitur keamanan dengan terlebih dahulu meminta userid dan password
					bagi yang menggunakan software ini, selain itu MAXON menyediakan keamanan terhadap
					modul-modul yang dapat digunakan oleh user tersebut.
				</p>
				<p>
					Setiap userid mempunyai hak akses terhadap modul yang telah ditentukan oleh administrator
					sesuai dengan user job masing-masing.
				</p>
	       </div>
	       </div>


			<?
				include_once "clients/index.php";
			?>

		<div class="clear"  style="min-height:200px;;padding:10px ">
				<div class="welcome_line welcome_t"></div>
				<img alt="..." src="<?=base_url()?>images/rocket.png" 
					style="float:left;margin-right:10px">			
			<div class="caption">
				<p><strong>RUNNING</strong></p>
				<p>MAXON dapat dijalankan hanya lewat browser dan bebas dari sistim operasi yang dipakai, 
					sehingga MAXON dapat dijalankan melalui Windows, Linux, Mac, Android dan lain sebagainya.
				</p>
	       </div>
	       </div>

   	
			<div class="clear"  style="min-height:200px; ;padding:10px">
			<div class="welcome_line welcome_t"></div>
				<img alt="..." src="<?=base_url()?>images/gear.png" 
					style="float:right;margin-right:10px;">			
					
			<div class="caption">
				<p><strong>MODULES</strong></p>
				<p>
					MAXON mempunyai modul-modul yang terintegrasi secara langsung ke jurnal,
					sehingga memudahkan perusahaan melihat laporan-laporan dari semua transaksi
					yang sudah dimasukan ke dalam sistim.
				</p>
				<p>
					Modul-modul yang tersedia meliputi transaksi penjualan, pembelian, hutang,
					piutang, stock, buku kas, aktiva tetap, pabrikasi, payroll dan akuntansi.
				</p>
	       </div>
	       </div>

			<?
				include_once "donate/index.php";
			?>
			
			<div class="clear"  style="min-height:200px;;padding:10px ">
			<div class="welcome_line welcome_t"></div>
				<img alt="..." src="<?=base_url()?>images/rocket.png" 
					style="float:left;margin-right:10px">			
				<div class="caption">
					<p><strong>MUDAH INSTALL</strong></p>
					<p>
						MAXON dapat diinstall layanan hosting sehingga memudahkan bagian IT untuk mengelola
						data-data transaksi dan dapat di akses dimana saja secara online asal tersedia 
						koneksi internet speedy atau lainnya.
					</p>
					<p>
						MAXON dapat diupdate secara langsung di webhosting dan langsung tersedia
						dan dapat dijalankan oleh pengguna.
					</p>
			   </div>
	       </div>
		   


		<div class="clear"  style="min-height:200px;padding:10px ">
		<div class="welcome_line welcome_t"></div>
				<img alt="..." src="<?=base_url()?>images/flame.png" 
					style="float:right;margin-right:10px">			
			<div class="caption">
				<p><strong>ONLINE HELP</strong></p>
				<p>
					MAXON dibuat oleh kelompok programmer yang telah berpengalaman, anda bisa berkomunikasi
					atau diskusi mengenai tata cara penggunaan software, masalah proses bisnis, 
					permintaan module dan modifikasi melalui forum online, facebook, twitter dan media
					sharing lainnya.
				</p>
	       </div>
	       </div>

		</div>
		
		
			<?
				include_once "team.php";
			?>


			<div class="clear"  style="min-height:200px;;padding:10px">
				<div class="welcome_line welcome_t"></div>
				<img alt="..." src="<?=base_url()?>images/frames.png" 
					style="float:right;margin-right:10px">			
				
			<div class="caption">
				<p><strong>LAPORAN</strong></p>
				<p>
					MAXON menyediakan lebih dari 100 buah laporan yang dikelompokkan berdasarkan
					modul masing-masing.
				</p>
				<p>
					Semua laporan MAXON diterbitkan secara akurat dan mudah dimengerti.
				</p>
	       </div>
	       </div>
		   
		   
</div>   

<div class="wrap">
            <div id="footer" class="footer">
            	<div >
                	<div class="row">
                		<div class="col-md-3">
                        	<div class="foot_logo"><a href="index.html"><img src="images/logo_maxon.png" alt=""></a></div>    
                        	<div class="copyright">© 2020 MaxOn Enterprise Resource Application. All Rights Reserved.</div>                        
                        </div>
                        <div class="col-md-7">
							<div style="float:right;">
								<a href="http://www.facebook.com/maxon51" target="_new" title="Follow Facebook">
										<img src="images/fb.png"></a>
								<a href="http://www.twitter.com/talagasoft" target="_new" title="Follow Twitter">
									<img src="images/twitter.png">
								</a>
							</div> 
                        </div>
                    </div>	
                </div>
            </div>
        </div>
		
		
</body>
<?
//echo $library_src;
//echo $script_head;
?>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	  $('.flexslider').flexslider({
	    animation: "slide"
	  });
});


//]]>
</script>

