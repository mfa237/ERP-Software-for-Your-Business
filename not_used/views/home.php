<?

function add_shortcut($label,$icon,$color='#cdc',$url='',$content='',$app_id='') {
	echo "<div class='mxmod col-md-5 col-sm-6 col-xs-6' 
		onclick='load_menu(\"$url\");'> 
		<div class='mxicon'>
			<img src='".base_url()."images/$icon' width='90' height='90'>
		</div>
		<div class='mxlabel'>$label</div>
		<div class='mxdesc'>$content [<i>$app_id</i>]</div>
	</div>";
}
if($qapp=$this->db->where("is_active",1)->get("maxon_apps")){
	foreach($qapp->result() as $app){
		if(allow_mod($app->app_id)){
			add_shortcut($app->app_name,$app->app_ico,'#cdc',$app->app_controller,
			$app->app_desc,$app->app_id);
		}
	}
}
	
?>
