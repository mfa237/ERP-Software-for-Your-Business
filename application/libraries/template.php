<?php
class Template {
 protected $_ci;
 private $library_src='';
 private $script_head='';
 private $jquery_easyui='';
 function __construct()
 {
    $this->_ci =&get_instance();

    $this->_ci->load->library('javascript');
	$this->library_src=$this->_ci->jquery->script(base_url().'js/jquery/jquery-1.8.0.min.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'js/jquery-ui/jquery.easyui.min.js',true);

  
    $this->library_src.=$this->_ci->jquery->script(base_url().'js/autocomplete/jquery.autocomplete.min.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'js/lib.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'js/jquery.formatNumber.js',true);
    $this->library_src.=$this->_ci->jquery->script(base_url().'assets/bootstrap/js/bootstrap.min.js',true);
	
	
  /// $this->script_head=$this->_ci->jquery->_compile();
	$this->script_head='
	
	<link rel="stylesheet" type="text/css" href="'.base_url().'assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/autocomplete/jquery.autocomplete.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'themes/standard/style.css">

	
	';
	
	$this->jquery_easyui='
 	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="'.base_url().'js/jquery-ui/themes/icon.css">
	<script type="text/javascript" charset="utf-8" src="'.base_url().'js/jquery/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="'.base_url().'js/jquery-ui/jquery.easyui.min.js"></script>
	';
	$s='
	
	
	';


}

 function display($template,$data=null)
 {
    $data['message']='Ready';
	  
	 if(!$this->is_ajax())
	 {	
	  	$data['library_src']=$this->library_src;
	  	$data['script_head']=$this->script_head;
        $data['_left_menu']='';
        $data['_right_menu']='';
    	$fm=$this->_ci->session->userdata('_right_menu');
        //if($fm!='')$data['_right_menu']=$this->_ci->load->view($fm,$data, true);
    	$fm=$this->_ci->session->userdata('_left_menu');
        //if($fm!='')$data['_left_menu']=$this->_ci->load->view($fm,$data, true);
		$data['_left_menu_caption']=$this->_ci->session->userdata('_left_menu_caption');
		if($template==$fm){
			$dashboard=$fm."_dashboard";
			if(file_exists(APPPATH."views/$dashboard.php")){
				//$data['_content']=$this->_ci->load->view($dashboard,$data, true);						
			} else {
				$data['_content']="Dashboard view not found! <br>".$dashboard;
			}
		} else {
		}
		$data['_header']=$this->_ci->load->view('template/standard/header',$data, true);
		$data['_footer']=$this->_ci->load->view('template/standard/footer',$data, true);
        $data['_content']=$this->_ci->load->view($template,$data, true);				
		$this->_ci->load->view('template/standard/template',$data);              
	 } else {
		 $this->_ci->load->view($template,$data);
	 }
 }
 function display_single($template,$data=null) {
  	$data['library_src']=$this->library_src;
  	$data['script_head']=$this->script_head;
	$this->_ci->load->view($template,$data);
 }
 function display_form_input($template,$data=null,$template_right=null)
 {
    $data['message']='Ready';
  	$data['library_src']=$this->library_src;
  	$data['script_head']=$this->script_head;
 	$data['jquery_easyui']=$this->jquery_easyui;
	 if(!$this->is_ajax()) {	
        $this->display($template,$data);
	 } else {
		 $this->_ci->load->view($template,$data);
	 }
 }
 function display_browse($data=null)
 {
 	$data['jquery_easyui']=$this->jquery_easyui;
    $this->display_browse2($data);
 }
 function display_browse2($data)
 {
     $data['search']='';
     if(isset($_GET['search']))$data['search']=$_GET['search'];
     $data['message']='Ready';
 	$data['jquery_easyui']=$this->jquery_easyui;
  
	 if(!$this->is_ajax())
	 {
        $data['library_src']=$this->library_src;
        $data['script_head']=$this->script_head;
//     	$fm=$this->_ci->session->userdata('_left_menu');
//        $data['_left_menu']=$fm==''?'':$this->_ci->load->view($fm,$data, true);
 //    	$fm=$this->_ci->session->userdata('_right_menu');
//        $data['_right_menu']=$fm==''?'':$this->_ci->load->view($fm,$data, true);
		$data['_header']=$this->_ci->load->view('template/standard/header',$data, true);
		$data['_content']=$this->_ci->load->view('template/standard/template_browse',$data, true);
		$data['_footer']=$this->_ci->load->view('template/standard/footer',$data, true);
		$this->_ci->load->view('template/standard/template',$data);
	 } 	 else 	 {
        $data['library_src']=$this->library_src;
        $data['script_head']=$this->script_head;
	    $this->_ci->load->view('template/standard/template_browse',$data);
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
            'table_open'          => '<table id="'.$class.'" border="0" cellpadding="4" cellspacing="0">',

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


}