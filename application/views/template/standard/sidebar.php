<div class="easyui-panel " title="USER LOGIN">
    <?php
    if($company_code=="")$this->session->userdata('session_company_code','');    
    if($company_code=="")$this->session->userdata('company_code','');    
    if($company_code=="ALL")$this->session->userdata('company_code','');    
    
    echo $this->access->print_info();
    echo "</br>".date('l jS \of F Y h:i:s A');
    echo "<div class='alert alert-info'>";
    $disabled="disabled";
    if(user_id()=="admin")$disabled="";
        
        echo "<i>* Sebelum transaksi pastikan anda telah memilih data perusahaan dan outlet/gudang yang aktif dibawah ini.</i></br>";
        echo form_open(base_url("index.php/user/session"));
        echo "<label>Outlet: </label><br>".form_dropdown("shipping_location",$shipping_location_list,$shipping_location,"style='width:200px' $disabled");
        echo "</br><label>Company:</label><br> ".form_dropdown("company_code",$company_list,$company_code,"style='width:200px' $disabled");
        echo form_submit("submit",'Submit',"class='btn btn-primary small' 
             title='Save Company Sesssion' $disabled style='margin:5px'");
        echo form_close();
        echo "</div>";
    
    ?>
</div>
<div class="easyui-panel " title="MENU">
    <?php echo $_left_menu; ?>
</div>
<div class="easyui-panel " title="HELP">
    <div id="help">Untuk bantuan anda bisa tekan tombol help atau panduan 
        secara lengkap silahkan kunjungi 
        <a href='http://help.maxonerp.com' target='_new'>Online Help</a>
    </div>
</div>
<?php 
if($this->session->userdata('last_running_visible'))include_once "syslog.php";
//if($this->session->userdata('donate_visible'))
if($this->config->item('donate_visible')==true) include_once "donate.php";
if($this->config->item('google_ads_visible')==true) $this->load->view('google_ads');
?>
