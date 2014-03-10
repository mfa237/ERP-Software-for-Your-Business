  <ul class="easyui-tree">
 	<li><span><strong>Operation</strong></span>
 		<ul>
 			<li ><span>User Login</span>
 				<ul>
 					<li><?=anchor('user/add','New User ID');?></li>
 					<li><?=anchor('user','Search User ID');?></li>
 				</ul>
 			</li>
 			<li  >
 				<span>User Group</span>
 				<ul>
 					<li><?=anchor('jobs/add','New User Group')?></li>
 					<li><?=anchor('jobs','Search User Group');?></li>
 				</ul>
 			</li>
 		</ul>
 		
 	</li>
 	<li><span><strong>Setting</strong></span>
 		<ul>
			<li ><span>Company</span>
 				<ul>
 					<li><?=anchor('company','Nama Perusahaan')?></li>
 				</ul>				
			</li>
			<li ><span>Global</span>
 				<ul>
 					<li><?=anchor('company/gl_link','Setting Accounts Link');?></li>
 					<li><?=anchor('company/sales','Setting Penjualan');?></li>
 					<li><?=anchor('company/purchase','Setting Pembelian');?></li>
 					<li><?=anchor('company/inventory','Setting Inventory');?></li>
 					<li><?=anchor('company/others','Setting Lain-lain');?></li>
 				</ul>				
			</li>
			<li ><span>Modules</span>
 				<ul>
 					<li><?=anchor('modules/add','New Module')?></li>
 					<li><?=anchor('modules','Search Module');?></li>
 				</ul>				
			</li>
		</ul>
 	</li>
 	
 	<li><span><strong>Reports</strong></span><ul>
 	</ul></li>
