<?php
class Template {
 protected $_ci;
 private $library_src='';
 private $script_head='';
 private $jquery_easyui='';
 private $bootstrap='';
 function __construct()
 {
    $this->_ci =&get_instance();

    $this->_ci->load->library(array('javascript',"sysvar"));
	
	$this->bootstrap='
	<link rel="stylesheet" type="text/css" href="'.base_url().'assets/bootstrap/css/bootstrap.css">
	
	
	';
	$this->library_src=$this->_ci->jquery->script(base_url().'js/jquery/jquery-1.9.min.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'assets/bootstrap/js/bootstrap.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'assets/datepicker/bootstrap-datepicker.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'js/jquery-ui/jquery.easyui.min.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'js/autocomplete/jquery.autocomplete.min.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'js/lib.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'js/jquery.formatNumber.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'assets/flexslider/jquery.flexslider.js',true);
	
	
  /// $this->script_head=$this->_ci->jquery->_compile();
	$themes=$this->_ci->sysvar->getvar('themes','standard');
	$this->script_head='
	
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/autocomplete/jquery.autocomplete.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/'.$themes.'/easyui.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'themes/'.$themes.'/style.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'assets/datepicker/datepicker.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'assets/bootstrap/css/bootstrap.css">

	
	';
//	<link rel="stylesheet" type="text/css" href="'.base_url().'assets/flexslider/flexslider.css">
	
	$this->jquery_easyui='
 	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/'.$themes.'/easyui.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/icon.css">
	<script type="text/javascript" charset="utf-8" src="'.base_url().'js/jquery/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="'.base_url().'js/jquery-ui/jquery.easyui.min.js"></script>
	';
	$s='
	
	
	';
}

 function display($template,$data=null)
 {
    //$data['message']='';
	  
	 if(!$this->is_ajax())
	 {
		$data['user_id']=$this->_ci->access->user_id();
	  	$data['library_src']=$this->library_src;
	  	$data['script_head']=$this->script_head;
		if(!isset($data['ajaxed']))$data['ajaxed']=true;
		$data['_header']=$this->_ci->load->view('template/standard/header',$data, true);
		$data['_footer']=$this->_ci->load->view('template/standard/footer',$data, true);

		$sql="select distinct controller,method,param1 from sys_log_run where user_id='".$this->_ci->access->user_id()."' order by id desc limit 10 ";
		$url=base_url()."/index.php/".$template;

		add_log_run($url);
		$data['sys_log_run']=view_syslog();

		if($template=="pos/menu")$data['sidebar_show']=false;

		if(isset($data['_right_menu'])){
			$fm=$data['_right_menu'];
			$data['_right_menu']=$this->_ci->load->view($fm,$data, true);
		} else {
			$data['_right_menu']='';
		}				
		$fm=$this->_ci->session->userdata('_right_menu');
		if($fm!=''){	
			$data['_right_menu']=$this->_ci->load->view($fm,$data, true);
		}
		$fm=$this->_ci->session->userdata('_left_menu');
		if($fm!='') {
			//echo $fm;
			$data['_left_menu']=$this->_ci->load->view($fm,$data, true);
		}
		$data['_left_menu_caption']=$this->_ci->session->userdata('_left_menu_caption');

		if($template==$fm){
			$dashboard=$fm."_dashboard";
			if(file_exists(APPPATH."views/$dashboard.php")){
				$data['_content']=$this->_ci->load->view($dashboard,$data, true);						
			} else {
				$data['_content']="Dashboard view not found! <br>".$dashboard;
			}
			$data['body_class']='bodyx';
		} else {
			if($template=="welcome_message"){
				$data["sidebar_show"]=false;
				$data['body_class']='bodyx';
			} else {
				$data['body_class']='';
			}
			$data['_content']=$this->_ci->load->view($template,$data, true);
		} 			
		$data['google_ads_visible']=$this->_ci->sysvar->getvar('google_ads_visible','true');
		$this->_ci->load->view('template/standard/template',$data);              
	 } else  {
		$data['google_ads_visible']=$this->_ci->sysvar->getvar('google_ads_visible','true');
		$this->_ci->load->view($template,$data);
	 }
 }
 function display_single($template,$data=null) {
  	$data['library_src']=$this->library_src;
  	$data['script_head']=$this->script_head;
	$this->_ci->load->view($template,$data);
 }
 function display_website($template,$data=null){
  	$data['library_src']=$this->library_src;
  	$data['script_head']=$this->script_head;
	$data['file_content']=$template;	
	$this->_ci->load->view("template/standard/template_articles",$data);	
 }
 function display_eshop($template,$data=null){
  	$data['library_src']=$this->library_src;
  	$data['script_head']=$this->script_head;
	$data['file_content']=$template;
	$data['categories']=$this->_ci->db->get('inventory_categories');
	$this->_ci->load->view("template/eshop/page",$data);		 
 }
  function display_login($template,$data=null) {
	$library_src='
		<script type="text/javascript" charset="utf-8" 
		src="'.base_url().'js/jquery/jquery-1.9.min.js"></script>
		<script type="text/javascript" charset="utf-8" 
		src="'.base_url().'js/jquery-ui/jquery.easyui.min.js"></script>
	';
	
	$script_head='
	<link rel="stylesheet" type="text/css" href="'.base_url().'assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'themes/standard/style.css">
	';

		
  	$data['library_src']=$library_src;
  	$data['script_head']=$script_head;
	$this->_ci->load->view($template,$data);
 }

 function display_form_input($template,$data=null,$template_right=null)
 {
    //$data['message']='Ready';
  	$data['library_src']=$this->library_src;
  	$data['script_head']=$this->script_head;
 	$data['jquery_easyui']=$this->jquery_easyui;
	$data['ajaxed']=true;
	 if(!$this->is_ajax()) {	
        $this->display($template,$data);
	 } else {
		 $this->_ci->load->view($template,$data);
	 }
 }
 function display_browse2($data=null){
        $data['library_src']=$this->library_src;
        $data['script_head']=$this->script_head;
		if(isset($data['view_mode'])){
			$view_mode=$data['view_mode'];
		} else {
			$view_mode="";
		}
		if($view_mode<>""){
			$this->_ci->load->view('/'.$view_mode,$data);	
		} else {
			$this->_ci->load->view('template/standard/template_browse',$data);				
		}
 }
 function display_browse($data=null)
 {
 	$data['jquery_easyui']=$this->jquery_easyui;
    $this->display_browse2($data);
 }
 function display_browse2_old($data)
 {
     $data['search']='';
     if(isset($_GET['search']))$data['search']=$_GET['search'];
     $data['message']='Ready';
 	 $data['jquery_easyui']=$this->jquery_easyui;
  
	 if(!$this->is_ajax())
	 {
        $data['library_src']=$this->library_src;
        $data['script_head']=$this->script_head;
		$data['_header']=$this->_ci->load->view('template/standard/header',$data, true);
		$data['_content']=$this->_ci->load->view('template/standard/template_browse',$data, true);
		$data['_footer']=$this->_ci->load->view('template/standard/footer',$data, true);
		$data['sys_log_run']=syslog();		
		$this->_ci->load->view('template/standard/template',$data);
	 } 	 else 	 {
        $data['library_src']=$this->library_src;
        $data['script_head']=$this->script_head;
	    $this->_ci->load->view('template/standard/template_browse',$data);
	 }
 }
 function display_table($data=null) {
    $data['message']='Ready';
	  
	 if(!$this->is_ajax())
	 {	
	  	$data['library_src']=$this->library_src;
	  	$data['script_head']=$this->script_head;
        $data['_left_menu']='';
		if(isset($data['_right_menu'])){
			$fm=$data['_right_menu'];
			$data['_right_menu']=$this->_ci->load->view($fm,$data, true);
		} else {
		   $data['_right_menu']='';
		}				
    	$fm=$this->_ci->session->userdata('_right_menu');
        if($fm!='')$data['_right_menu']=$this->_ci->load->view($fm,$data, true);
		$data['_header']=$this->_ci->load->view('template/standard/header',$data, true);
		$data['_footer']=$this->_ci->load->view('template/standard/footer',$data, true);
		$this->_ci->load->view('template/standard/browse',$data);              
	 } else {
		 $this->_ci->load->view($template,$data);
	 }
 }
 function print_out($template,$data=null){
    $this->_ci->load->view('simple_print.php',$data);
 }
 function is_ajax()
 {
 	return (
	 $this->_ci->input->server('HTTP_X_REQUESTED_WITH')&&
	 ($this->_ci->input->server('HTTP_X_REQUESTED_WITH')=='XMLHttpRequest'));
 }
function template_table($class='hor-minimalist-b'){
$tmpl = array (
            'table_open'          => '<table class="'.$class.'" border="0" cellpadding="4" cellspacing="0">',

            'heading_row_start'   => '<tr>',
            'heading_row_end'     => '</tr>',
            'heading_cell_start'  => '<th>',
            'heading_cell_end'    => '</th>',

            'row_start'           => '<tr>',
            'row_end'             => '</tr>',
            'cell_start'          => '<td>',
            'cell_end'            => '</td>',

            'row_alt_start'       => '<tr>',
            'row_alt_end'         => '</tr>',
            'cell_alt_start'      => '<td>',
            'cell_alt_end'        => '</td>',

            'table_close'         => '</table>'
      );
        return $tmpl;

}
function browse_sql($sql){
	$data['message']='';
    $data['library_src']=$this->library_src;
    $data['script_head']=$this->script_head;
 	$fm=$this->_ci->session->userdata('_left_menu');
    $data['_left_menu']=$fm==''?'':$this->_ci->load->view($fm,$data, true);
 	$fm=$this->_ci->session->userdata('_right_menu');
    $data['_right_menu']=$fm==''?'':$this->_ci->load->view($fm,$data, true);
	$data['_header']=$this->_ci->load->view('template/standard/header',$data, true);
	$data['_footer']=$this->_ci->load->view('template/standard/footer',$data, true);
	$data['_content']=browse_simple($sql);
	$this->_ci->load->view('template/standard/template.php',$data);
}

 function pos($template,$data=null)
 {
	  	$data['library_src']=$this->library_src;
	  	$data['script_head']=$this->script_head;
		$data['_header']=$this->_ci->load->view('template/pos/header',$data, true);
		$data['_footer']=$this->_ci->load->view('template/pos/footer',$data, true);
		$this->_ci->load->view('template/pos/template',$data);              
	 
 }
 
 
}
