<script type="text/javascript">
   		CI_ROOT = "<?=base_url()?>index.php/";
		CI_BASE = "<?=base_url()?>"; 		
</script>
<div id='__section_left_content' class="col-md-9">
<?
echo $library_src;
echo $script_head;

$width=isset($width)?$width." px":"auto";
$height=isset($height)?$height." px":"auto";
$caption=isset($caption)?$caption:$controller;
$offset=0;
$limit=100;
$table_head="<thead><tr>";
for($i=0;$i<count($fields);$i++){
    $table_head.='<th data-options="field:\''.$fields[$i].'\'">'.$fields_caption[$i].'</th>';
}
$table_head.="</tr></thead>";

if(isset($_form)){
	echo load_view($_form,array('mode'=>'add'));
}

$controller_name=str_replace("/","_",$controller);

?>
<script type="text/javascript">    
    CI_CONTROL='<?=$controller?>';
    FIELD_KEY='<?=$field_key?>';
    CI_CAPTION='<?=$caption?>';
    CI_WIDTH='<?=$width?>';
    CI_HEIGHT='<?=$height?>';
</script>

<table id="dg_<?=$controller_name?>" class="easyui-datagrid", title="<?=$caption?>"
      style="height:'<?=$height?>';width:'<?=$width?>'", 
      data-options="rownumbers:true,pagination:true,pageSize:100,
      loadFilter:pagerFilter_<?=$controller_name?>,
      singleSelect:true,collapsible:true,
      url:'',
      toolbar:'#tb_<?=$controller_name?>'">
      
      <?=$table_head?>
      
</table>
       
 <div id="tb_<?=$controller_name?>" style="padding:5px;height:auto" class='thumbnail'>
		<div class='thumbnail'>
			<?=link_button("Add", "addnew_$controller_name();return false;","add","true");?>
			<?=link_button("Edit", "edit_$controller_name();return false;","edit","true");?>
			<?=link_button("Del", "del_row_$controller_name();return false;","remove","true");?>
			<?=link_button('Cari','cari_'.$controller_name."();return false;",'search');?>
		</div>
		<div>
			<form id='frmSearch_<?=$controller_name?>'>
			<?
//			var_dump($faa);
			$i=0;
			 
			foreach($criteria as $fa){
				$type="text";
				$val="";
				if($fa->field_class=="easyui-datetimebox"){
					$val=date("Y-m-d 00:00:00");
					if(strpos($fa->field_id,"date_to"))$val=date("Y-m-d 23:59:59");
					echo " ".$fa->caption.'
					<input type="'.$type.'" value="'.$val.'" id="'.$fa->field_id.'"  name="'.$fa->field_id.'" 
					class="'.$fa->field_class.'" style="width:80px">';
					echo " ";
				} else if($fa->field_class=="checkbox"){
					echo " 
					<input type='checkbox' value='$val' id='".$fa->field_id."'  name='".$fa->field_id."' 
					> ".$fa->caption;
					echo " ";

				} else {
					echo " ".$fa->caption.'
					<input type="'.$type.'" value="'.$val.'" id="'.$fa->field_id.'"  name="'.$fa->field_id.'" 
					class="'.$fa->field_class.'" style="width:80px">';
					echo " ";

				}
				 
				$i++;
			}
			?>
			 
			</form>
		</div>
</div>

</div>

	
<script type="text/javascript">
    function pagerFilter_<?=$controller_name?>(data){
            if (typeof data.length == 'number' && typeof data.splice == 'function'){	// is array
                    data = {
                            total: data.length,
                            rows: data,
                            search: $('#search_<?=$controller_name?>').val()
                    }
            }
            var dg = $(this);
            var opts = dg.datagrid('options');
            var pager = dg.datagrid('getPager');
            pager.pagination({
                    onSelectPage:function(pageNum, pageSize){
                            opts.pageNumber = pageNum;
                            opts.pageSize = pageSize;
                            pager.pagination('refresh',{
                                    pageNumber:pageNum,
                                    pageSize:pageSize
                            });
                            dg.datagrid('loadData',data);
                    }
            });
            if (!data.originalRows){
                    data.originalRows = (data.rows);
            }
            var start = (opts.pageNumber-1)*parseInt(opts.pageSize);
            var end = start + parseInt(opts.pageSize);
            data.rows = (data.originalRows.slice(start, end));
            return data;
    }
    function addnew_<?=$controller_name?>(){
        xurl=CI_ROOT+CI_CONTROL+'/add';
        window.open(xurl,"_self");
		

    };
    function edit_<?=$controller_name?>(){
        var row = $('#dg_<?=$controller_name?>').datagrid('getSelected');
        if (row){
            xurl=CI_ROOT+CI_CONTROL+'/view/'+row[FIELD_KEY];
	        window.open(xurl,"_self");
        }
    }
    function del_row_<?=$controller_name?>(){
			var row = $('#dg_<?=$controller_name?>').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this line?',function(r){
	                xurl=CI_ROOT+CI_CONTROL+'/delete/'+row[FIELD_KEY];                             
	                xparam='';
	                $.ajax({
	                        type: "GET",
	                        url: xurl,
	                        param: xparam,
	                        success: function(result){
							try {
									var result = eval('('+result+')');
									if(result.success){
										$.messager.show({
											title:'Success',msg:result.msg
										});
										$('#dg_<?=$controller_name?>').datagrid('reload');	 
									} else {
										$.messager.show({
											title:'Error',msg:result.msg
										});
									};
								} catch (exception) {		
									// reload kalau output bukan json
									$('#dg_<?=$controller_name?>').datagrid('reload');	 
								}
	                        },
	                        error: function(msg){$.messager.alert('Info',msg);}
	                });         
				});
		}
	}
    function cari_<?=$controller_name?>(){
    	xsearch=$('#frmSearch_<?=$controller_name?>').serialize();
	    xurl=CI_ROOT+CI_CONTROL+'/browse_data?'+xsearch;
        $('#dg_<?=$controller_name?>').datagrid({url:xurl});
        //$('#dg_<?=$controller?>').datagrid('reload');
    }
		

</script>