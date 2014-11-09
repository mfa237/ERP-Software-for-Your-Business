<legend><?=$title?></legend>
<?	if($mode=='view'){ 	$disabled='disable';} else {$disabled='';}
	require_once(__DIR__.'../../aed_button.php');	
	echo validation_errors(); 
?>
	<form id="frmMain"  method="post" role='form' class="form-horizontal">
	
		to zuldi: ubah baris 12 s/d 56 seperti baris 10
				  
		<?=my_input('Kode Pelanggan','cust_id',$cust_id)?>
		<?=my_input('Nama Pelanggan','cust_name',$cust_name)?>
		$fields[]=array('name'=>'cust_id','type'=>'nvarchar','size'=>50,'caption'=>'cust_id','control'=>'text');
		$fields[]=array('name'=>'cust_name','type'=>'nvarchar','size'=>50,'caption'=>'cust_name','control'=>'text');
		$fields[]=array('name'=>'first_name','type'=>'nvarchar','size'=>50,'caption'=>'first_name','control'=>'text');
		$fields[]=array('name'=>'last_name','type'=>'nvarchar','size'=>50,'caption'=>'last_name','control'=>'text');
		$fields[]=array('name'=>'street','type'=>'nvarchar','size'=>50,'caption'=>'street','control'=>'text');
		$fields[]=array('name'=>'suite','type'=>'nvarchar','size'=>50,'caption'=>'suite','control'=>'text');
		$fields[]=array('name'=>'city','type'=>'nvarchar','size'=>50,'caption'=>'city','control'=>'text');
		$fields[]=array('name'=>'zip_pos','type'=>'nvarchar','size'=>50,'caption'=>'zip_pos','control'=>'text');
		$fields[]=array('name'=>'region','type'=>'nvarchar','size'=>50,'caption'=>'region','control'=>'text');
		$fields[]=array('name'=>'province','type'=>'nvarchar','size'=>50,'caption'=>'province','control'=>'text');
		$fields[]=array('name'=>'country','type'=>'nvarchar','size'=>50,'caption'=>'country','control'=>'text');
		$fields[]=array('name'=>'phone','type'=>'nvarchar','size'=>50,'caption'=>'phone','control'=>'text');
		$fields[]=array('name'=>'fax','type'=>'nvarchar','size'=>50,'caption'=>'fax','control'=>'text');
		$fields[]=array('name'=>'email','type'=>'nvarchar','size'=>50,'caption'=>'email','control'=>'text');
		$fields[]=array('name'=>'bank_name','type'=>'nvarchar','size'=>50,'caption'=>'bank_name','control'=>'text');
		$fields[]=array('name'=>'bank_acc_number','type'=>'nvarchar','size'=>50,'caption'=>'bank_acc_number','control'=>'text');
		$fields[]=array('name'=>'credit_card_number','type'=>'nvarchar','size'=>50,'caption'=>'credit_card_number','control'=>'text');
		$fields[]=array('name'=>'is_send_email','type'=>'nvarchar','size'=>50,'caption'=>'is_send_email','control'=>'text');
		$fields[]=array('name'=>'is_active','type'=>'nvarchar','size'=>50,'caption'=>'is_active','control'=>'text');
		$fields[]=array('name'=>'balance_amount','type'=>'nvarchar','size'=>50,'caption'=>'balance_amount','control'=>'text');
		$fields[]=array('name'=>'credit_amount','type'=>'nvarchar','size'=>50,'caption'=>'credit_amount','control'=>'text');
		$fields[]=array('name'=>'credit_balance','type'=>'nvarchar','size'=>50,'caption'=>'credit_balance','control'=>'text');
		$fields[]=array('name'=>'credit_limit','type'=>'nvarchar','size'=>50,'caption'=>'credit_limit','control'=>'text');
		$fields[]=array('name'=>'status','type'=>'nvarchar','size'=>50,'caption'=>'status','control'=>'text');
		$fields[]=array('name'=>'ref_doc_id','type'=>'nvarchar','size'=>50,'caption'=>'ref_doc_id','control'=>'text');
		$fields[]=array('name'=>'cust_type','type'=>'nvarchar','size'=>50,'caption'=>'cust_type','control'=>'text');
		$fields[]=array('name'=>'parent_cust_id','type'=>'nvarchar','size'=>50,'caption'=>'parent_cust_id','control'=>'text');
		$fields[]=array('name'=>'call_name','type'=>'nvarchar','size'=>50,'caption'=>'call_name','control'=>'text');
		$fields[]=array('name'=>'id_card_no','type'=>'nvarchar','size'=>50,'caption'=>'id_card_no','control'=>'text');
		$fields[]=array('name'=>'id_card_exp','type'=>'nvarchar','size'=>50,'caption'=>'id_card_exp','control'=>'text');
		$fields[]=array('name'=>'rtrw','type'=>'nvarchar','size'=>50,'caption'=>'rtrw','control'=>'text');
		$fields[]=array('name'=>'kel','type'=>'nvarchar','size'=>50,'caption'=>'kel','control'=>'text');
		$fields[]=array('name'=>'kec','type'=>'nvarchar','size'=>50,'caption'=>'kec','control'=>'text');
		$fields[]=array('name'=>'lama_thn','type'=>'nvarchar','size'=>50,'caption'=>'lama_thn','control'=>'text');
		$fields[]=array('name'=>'lama_bln','type'=>'nvarchar','size'=>50,'caption'=>'lama_bln','control'=>'text');
		$fields[]=array('name'=>'mother_name','type'=>'nvarchar','size'=>50,'caption'=>'mother_name','control'=>'text');
		$fields[]=array('name'=>'spouse_name','type'=>'nvarchar','size'=>50,'caption'=>'spouse_name','control'=>'text');
		$fields[]=array('name'=>'spouse_birth_place','type'=>'nvarchar','size'=>50,'caption'=>'spouse_birth_place','control'=>'text');
		$fields[]=array('name'=>'spouse_birth_date','type'=>'nvarchar','size'=>50,'caption'=>'spouse_birth_date','control'=>'text');
		$fields[]=array('name'=>'spouse_phone','type'=>'nvarchar','size'=>50,'caption'=>'spouse_phone','control'=>'text');
		$fields[]=array('name'=>'salary_source','type'=>'nvarchar','size'=>50,'caption'=>'salary_source','control'=>'text');
		$fields[]=array('name'=>'spouse_salary_source','type'=>'nvarchar','size'=>50,'caption'=>'spouse_salary_source','control'=>'text');
		$fields[]=array('name'=>'other_income_source','type'=>'nvarchar','size'=>50,'caption'=>'other_income_source','control'=>'text');
		$fields[]=array('name'=>'deduct_source','type'=>'nvarchar','size'=>50,'caption'=>'deduct_source','control'=>'text');
		$fields[]=array('name'=>'id','type'=>'int','size'=>0,'caption'=>"Id",'control'=>'text');

		
				  
		<input type='hidden' name='mode' id='mode'	value='<?=$mode?>'>
	</form>
		 


	
 <script language='javascript'>
	function refresh_aed() {
		var url="<?=base_url()?>index.php/<?=$form_controller?>/view/<?=$field_key_value?>";	
		window.open(url,"_self");
	}
	function search_aed() {
		var url="<?=base_url()?>index.php/<?=$form_controller?>";	
		window.open(url,"_self");
	}
	function add_aed() {
		var url="<?=base_url()?>index.php/<?=$form_controller?>/add";	
		window.open(url,"_self");
	}
  	function save_aed(){
		url='<?=base_url()?>index.php/<?=$form_controller?>/save';
		$('#frmMain').form('submit',{
			url: url, onSubmit: function(){	return $(this).form('validate'); },
			success: function(result){
				var result = eval('('+result+')');
				if (result.success){
					$('#mode').val('view');
					log_msg('Data sudah tersimpan.');
					url='<?=base_url()?>index.php/<?=$form_controller?>/view/'+$field_key_value;
					window.open(url,"_self");
				} else {
					log_err(result.msg);
				}
			}
		});
  	}
	function delete_aed() {
		$.messager.confirm('Confirm','Are you sure you want to remove this ?',function(r){
			if (r){
				var url="<?=base_url()?>index.php/<?=$form_controller?>/delete/<?=$field_key_value?>";	
				window.open(url,"_self");
			}
		})
	}
	function posting_aed(){
		var url="<?=base_url()?>index.php/<?=$form_controller?>/posting/<?=$field_key_value?>";	
		window.open(url,"_self");	
	}
	function print_aed(){
		var url="<?=base_url()?>index.php/<?=$form_controller?>/print/<?=$field_key_value?>";	
		window.open(url,"_self");
	}
	
</script>