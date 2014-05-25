<div style="margin:10px 0;"></div>
	<ul class="easyui-tree">
		<li>
			<span>Manufactur Modules</span>
			<ul>
				<li>
					<span>Operation</span>
					<ul>
						<li><?=anchor('workorder','Work Order (WO)','class="info_link"');?></li>
						<li><?=anchor('mat_release','Material Release (MR)','class="info_link"');?></li>
						<li><?=anchor('work_exec','Work Execute (WOE/SPK)','class="info_link"');?></li>
						<li><?=anchor('receive_prod','Receive Products','class="info_link"');?></li>
						<li><?=anchor('cancel_prod','Cancel Production','class="info_link"');?></li>
						<li><?=anchor('assembly','Assembly','class="info_link"');?></li>
						<li><?=anchor('disassembly','DisAssembly','class="info_link"');?></li>
					</ul>
				</li>
				<li   data-options="state:'closed'">
					<span>Report</span>
					<ul>
						<li><?=anchor('manuf/rpt/wo','Daftar Work Order','class="info_link"')?></li>
						<li><?=anchor('manuf/rpt/mr','Daftar Material Release','class="info_link"')?></li>
						<li><?=anchor('manuf/rpt/woe','Daftar Work Execute','class="info_link"')?></li>
					</ul>
				</li>
				<li  data-options="state:'closed'">
					<span>Master</span>
					<ul>
						<li><?=anchor('product','Barang Produksi (Products)','class="info_link"')?></li>
						<li><?=anchor('material','Bahan Baku (Materials)','class="info_link"')?></li>
						<li><?=anchor('product_cost','Tenaga Kerja','class="info_link"')?></li>
						<li><?=anchor('dept_prod','Department Produksi','class="info_link"')?></li>
						<li><?=anchor('product_person','Pelaksana','class="info_link"')?></li>
						<li><?=anchor('machine','Mesin Produksi','class="info_link"')?></li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
