 
   <ul class="easyui-tree">
 	<li><span><strong>Operation</strong></span>
 		<ul>
 			<li ><span>Kas/Bank Masuk</span>
 				<ul>
 					<li><?=anchor('cash_in/add','Tambah Kas/Bank Masuk');?></li>
 					<li><?=anchor('cash_in','Cari Kas/Bank Masuk');?></li>
 				</ul>
 			</li>
 			<li><span>Kas/Bank Keluar</span>
 				<ul>
 					<li><?=anchor('cash_out/add','Tambah Kas/Bank Keluar')?></li>
 					<li><?=anchor('cash_out','Cari Kas/Bank Keluar');?></li>
 				</ul>
 			</li>
 			<li><span>Mutasi Antar Rekening</span>
 				<ul>
 					<li><?=anchor('cash_mutasi/add','Tambah Mutasi Rekening')?></li>
 					<li><?=anchor('cash_mutasi','Cari Mutasi Rekening');?></li>
 				</ul>
 			</li>
 		</ul>
 		
 	</li>
 	<li><span><strong>Setting</strong></span>
 		<ul>
			<li ><span>Rekening Kas/Bank</span>
 				<ul>
 					<li><?=anchor('banks/add','Tambah Nomor Rekeing Kas/Bank')?></li>
 					<li><?=anchor('banks','Cari Nomor Rekeing Kas/Bank')?></li>
 				</ul>				
			</li>
		</ul>
 	</li>
 	
 	<li><span><strong>Reports</strong></span><ul>
 	</ul></li>
