<div class='col-sm-6'>
<table>
	<tr><td>Nama Lengkap (Tanpa Singkatan)</td><td><?=form_input('first_name',$first_name);?></td></tr>
	<tr><td>Nama Panggilan</td><td><?=form_input('call_name',$call_name);?></td></tr>
	<tr><td>L/P</td><td><?=form_dropdown("gender",array("L"=>"Laki-laki","P"=>"Wanita"),$gender)?></td></tr>
	<tr><td>Tempat Lahir</td><td><?=form_input('birth_place',$birth_place);?></td></tr>
	<tr><td>Status Pernikahan</td>
		<td><?=form_dropdown('marital_status',array("Single","Menikah","Janda/Duda"),$marital_status);?></td></tr>
	<tr><td>Jumlah Tanggungan</td><td><?=form_input('no_of_dependents',$no_of_dependents,"style='width:50px'");?> Orang</td></tr>
	<tr><td>No. KTP</td><td><?=form_input('id_card_no',$id_card_no);?></td></tr>
	<tr><td>Masa Berlaku KTP</td><td><?=form_input('id_card_exp',$id_card_exp,"class='easyui-datetimebox'");?></td></tr>
	<tr><td>Status Tempat Tinggal</td><td><?=form_dropdown("house_status", 
		array('Sendiri','Dinas','Orang Tua','Saudara/Kerabat','Kontrak/Kos'),$house_status);?></td></tr>			
	<tr><td>Lama Menetap Tahun/Bulan</td><td><?=form_input('cs1_lama_thn',$cs1_lama_thn,"style='width:50px'");?></td></tr>
</table>
</div>
<div class='col-sm-6'>
<table>	
	<tr><td>Nama Ibu Kandung</td><td><?=form_input('mother_name',$mother_name);?></td></tr>					
	<tr><td colspan='2'><h4>Data Pasangan</h4></td></tr>
	<tr><td>Nama Pasangan</td><td><?=form_input('spouse_name',$spouse_name);?></td></tr>
	<tr><td>Tempat Lahir </td><td><?=form_input('spouse_birth_place',$spouse_birth_place);?></td></tr>
	<tr><td>No. Telp</td><td><?=form_input('cs2_phone',$cs2_phone);?></td></tr>
	<tr><td>Tanggal Lahir</td><td><?=form_input('spouse_birth_date',$spouse_birth_date,"class='easyui-datetimebox'");?></td></tr>
	<tr><td>No. HP</td><td><?=form_input('cs2_hp',$cs2_hp);?></td></tr>
</table>
</div>



