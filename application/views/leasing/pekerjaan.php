<div class='col-sm-6'>
<table>
	<tr><td>Nama Perusahaan</td><td><?=form_input('comp_name',$comp_name);?></td></tr>
	<tr><td>Status Pekerjaan</td><td><?=form_dropdown('job_status',
		array("Karyawan","Non-Karyawan","Lainnya"),$job_status);?></td></tr>
	<tr><td>Lainnya</td><td><?=form_input('job_status_etc',$job_status_etc);?></td></tr>
	<tr><td>Bidang Pekerjaan</td><td><?=form_input('bussiness_type',$bussiness_type);?></td></tr>
	<tr><td>Masa Kerja Tahun/Bulan</td><td><?=form_input('since_year',$since_year);?></td></tr>
	<tr><td>Jabatan</td><td><?=form_input('job_level',$job_level);?></td></tr>
	<tr><td>Tipe Pekerjaan</td><td><?=form_dropdown('job_type',array('PNS/BUMN','Kary. Swasta',
			'Aparat Hukum','Wiraswasta','Lainnya'),$job_type);?></td></tr>
	<tr><td>Lainnya</td><td><?=form_input("job_type_etc",$job_type_etc)?></td><tr>
	<tr><td>Alamat Perusahaan</td><td><?=form_input('com_street',$com_street);?></td></tr>
	<tr><td>RT/RW</td><td><?=form_input('com_rtrw',$com_rtrw);?></td></tr>
	<tr><td>Kelurahan</td><td><?=form_input('com_kel',$com_kel);?></td></tr>
</table>
</div>
<div class='col-sm-6'>
<table>
	<tr><td>Rincian Pekerjaan</td><td><?=form_input('comp_desc',$comp_desc);?></td></tr>
	<tr><td>Kecamatan</td><td><?=form_input('com_kec',$com_kec);?></td></tr>
	<tr><td>Status Karyawan</td><td><?=form_dropdown('emp_status',
		array('Tetap','Kontrak','Lainnya'),$emp_status);?></td></tr>
	<tr><td>Lainnya</td><td><?=form_input('emp_status_etc',$emp_status_etc);?></td></tr>
	<tr><td>Kota</td><td><?=form_input('com_city',$com_city);?></td></tr>
	<tr><td>Kode Pos</td><td><?=form_input('com_zip_pos',$com_zip_pos);?></td></tr>
	<tr><td>Jumlah Karyawan</td><td><?=form_dropdown('total_employee',
		array('<50 orang','50-100 orang','>100 orang'),$total_employee);?></td></tr>
	<tr><td>No. Telp</td><td><?=form_input('com_contact_phone',$com_contact_phone);?></td></tr>
	<tr><td>Kepemilikan Usaha</td><td><?=form_dropdown('office_status',
		array('Sendiri','Perusahaan','Keluarga','Lainnya'),$office_status);?></td></tr>
	<tr><td>Lainnya</td><td><?=form_input('office_status_etc',$office_status_etc);?></td></tr>
	<tr><td>No. Ext</td><td><?=form_input('phone_ext',$phone_ext);?></td></tr>
	<tr><td>Nama Atasan / HRD</td><td><?=form_input('spv_name',$spv_name);?></td></tr>
</table>
</div>

