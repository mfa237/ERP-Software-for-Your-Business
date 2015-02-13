 <?
  $CI =& get_instance();
 ?>
<div class="easyui-tabs" id="tt">	 
	<div title="HOME"><? include __DIR__."/../home.php";?></div>
	<script>$().ready(function(){$("#tt").tabs("select","DASHBOARD");});</script>
	<div title="DASHBOARD" style="padding:10px">
		<div class="col-md-12 thumbnail">
			<div class='info thumbnail info_link' href="<?=base_url()?>index.php/articles">
				<div class='photo'><img src='<?=base_url()?>images/ico_sales.png'/></div>
				<div class='detail'>
					<h4>Articles</h4>
					</br>Daftar artikel untuk website perusahaan
				</div>
			</div>
		</div>


	</div>
	
	
</div>
