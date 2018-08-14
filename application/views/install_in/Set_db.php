<div class="row">
  <div class="col-sm-5 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>Urutan Install</h3>
        <li>1. Perjanjian Lisensi</li>
        <li>2. Persiapan Install</li>
        <li><strong>3. Setup Database</strong></li>
        <li>4. Setup Web Server</li>
        <li>5. Setup Data Master</li>
        <li>6. Selesai</li>
      </div>
    </div>
	<div class='thumbnail'>
	  <div id='loading' style='display:none'>
			<div id='loading_icon'>
				<img src='<?=base_url()?>images/loading.gif'>
			</div>
			<div id='loading_message'>
				<p>Loading Please Wait...</p>	  
			</div>
	  </div>
	
	</div>
  </div>
  <div class="col-sm-7 col-md-8 ">
	<div class='thumbnail'>
	   <div class='row'>
		   <div class='col-md-10'>
				<h1>Seting Database</h1>
			   <p>Database server adalah tempat menyimpan data master dan transaksi, 
			   seperti data barang, pelanggan, penjualan, pembelian dan data lainya.
			   </p>
			   <p>Silahkan isi awalan dengan kode perusahaan anda.</p>
		   </div>
	   </div>
	   <?php 
			
	   
	   
	   ?>
	   <div class='row'>
			<div class='col-md-10' id='divFrm'>
				<form id="frmSet" method='post' 
				action='<?=base_url()?>index.php/setup/create_company/cek_db_process'>
				
					<div class='form-group'>
					<label class='control-label ' for='company'>Company Code</label>
					<div><?=form_input("company",$cid,"id='company' 
					class='form-control '")?>
					<p><i>Kode perusahaan database anda.</i></p>
					</div></div>		

					<div class='form-group'>
					<label class='control-label ' for='server'>Username Admin</label>
					<div><?=form_input("user_id",$user_id,"id='user_id' 
					class='form-control'")?>
					<p><i>Username untuk login ke server sebagai admin.</i></p>
					</div></div>	

					<div class='form-group'>
					<label class='control-label ' for='server'>Password</label>
					<div><?=form_input("user_pass","","id='user_pass' 
					class='form-control'")?>
					<p><i>Password untuk user admin diatas.</i></p>
					</div></div>
					
					<div class='row'>
						<div class='col-md-10'>
						<a href="<?=base_url()?>index.php/setup/create_company/cancel_install" 
						class="btn btn-warning" role="button">Batal</a>
						<input type='submit'
						class="btn btn-primary" role="button" value='Teruskan'>
						</div>
					</div>	   

		
				</form>
			</div>
			<div class='col-md-10' id='divTableWrap' style='overflow:both;height:500px;display:none'>
				<div id='divTableMsg'></div>
				<div id='divTableCnt'>
					<div id='divTable' class='col-md-10'></div>
				</div>
			</div>
		
		</div>	
    </div> 
  </div>  
</div>
<script language="javascript">
$(document).ready(function() {
    $('#frmSetx').submit(function(event) { 
		//Trigger on form submit
		var url = "<?=base_url()?>index.php/setup/create_company/cek_db_process"; 
		// the script where you handle the form input.
		$("#loading_message").html("Please Wait");
		$.ajax({
			   type: "POST", url: url,
			   data: $("#frmSet").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   if(IsJsonString(data)){
					   result=eval('('+data+')'); // show response from the php script.
					   if(result.success){
						   $("#loading_message").html("<p>"+result.message+"</p>");
							$("#divFrm").fadeOut("slow");
							$("#loading_icon").fadeIn("slow");
						   setTimeout("create_tables()",2000);
					   } else {
							$("#loading_message").html("<p style='color:red'>"+result.message+"</p>");
					   }
						$("#loading_icon").fadeOut("slow");
				   } else {
						$("#loading_icon").fadeOut("slow");
						$("#loading_message").html('1. '+data);					   
				   }
			   },
				beforeSend: function()
                {
                   $("#loading").fadeIn("slow");
				}
			 });

		return false; // avoid to execute the actual submit of the form.
	});
})
function create_tables()
{
	$("#loading_icon").fadeIn("slow");
	$("#divTableWrap").fadeIn("slow");
	$("#divTableMsg").html("<p style='color:red'><i><strong>Creating tables and query, please wait...</strong></i></p>");
	url="<?=base_url()?>index.php/setup/create_company/cek_db_process_2";
		$.ajax({
			   type: "POST", url: url,
			   data: $("#frmSet").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   if(IsJsonString(data)){
					   result=eval('('+data+')'); // show response from the php script.
					   if(result.success){
						   $("#divTable").html("<p>"+result.finish+"</p>");
						   url="<?=base_url()?>index.php/setup/create_company/set_web";
							///window.open(url,"_self");
					   } else {
							$("#divTable").html("<p style='color:red'>"+result.message+"</p>");
					   }
						$("#loading_icon").fadeOut("slow");
				   } else {
						$("#loading_icon").fadeOut("slow");
						$("#divTable").html('1. '+data);					   
				   }
			   },
				beforeSend: function()
                {
                   $("#loading").fadeIn("slow");
				}
			 });

		return false; // avoid to execute the actual submit of the form.
	
}
</script>
