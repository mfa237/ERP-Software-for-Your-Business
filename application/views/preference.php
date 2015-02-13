<div class='col-md-8'>
	<div id="p" class="easyui-panel" title="Themes" 
			data-options="iconCls:'icon-save',closable:true,
			collapsible:true,minimizable:true,maximizable:true">
			<form id="" method="post">
				<div class="row">
					<label class="control-label col-sm-5" for="sidebar">Sidebar Position</label>
					<div class="col-sm-5">
						<?=form_radio("sidebar_position","left",$sidebar_position_left);?> Left
						<?=form_radio("sidebar_position","right",$sidebar_position_right);?> Right
					</div>
				</div>
				<div class="row">
					<label class="control-label col-sm-5" for="sidebar">Show Last Runing Box</label>
					<div class="col-sm-5"><?=form_checkbox("last_running_visible",true,$last_running_visible)?></div>
				</div>
				<div class="row">
					<label class="control-label col-sm-5" for="sidebar">Show Donate Box</label>
					<div class="col-sm-5"><?=form_checkbox("donate_visible",true,$donate_visible)?></div>
				</div>
				<div class="row">
					<label class="control-label col-sm-5" for="sidebar">Display Google Ads</label>
					<div class="col-sm-5"><?=form_checkbox("google_ads_visible",true,$google_ads_visible)?></div>
				</div>


				<div class="row thumbnail">
					<?=form_submit("submit","Submit");?>
				</div>
			</form>
	</div>
</div>
