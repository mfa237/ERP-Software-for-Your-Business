<?
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
?>
<script type="text/javascript">    
    CI_CONTROL='<?=$controller?>';
    FIELD_KEY='<?=$field_key?>';
    CI_CAPTION='<?=$caption?>';
    CI_WIDTH='<?=$width?>';
    CI_HEIGHT='<?=$height?>';
</script>

<table id="dg_<?=$controller?>" class="easyui-datagrid", title="<?=$caption?>"
      style="height:'<?=$height?>';width:'<?=$width?>'", 
      data-options="rownumbers:true,pagination:true,pageSize:100,
      loadFilter:pagerFilter_<?=$controller?>,
      singleSelect:true,collapsible:true,
      url:'<?=site_url()?>/<?=$controller?>/browse_data',
      toolbar:'#tb_<?=$controller?>'">
      
      <?=$table_head?>
      
</table>
         
 <div id="tb_<?=$controller?>" style="padding:5px;height:auto">
		<div>
			<?=link_button("Add", "addnew_$controller()","add","true");?>
			<?=link_button("Edit", "edit_$controller()","edit","true");?>
			<?=link_button("Del", "del_$controller()","remove","true");?>
		</div>
		<div>
			<form id='frmSearch_<?=$controller?>'>
			<?
//			var_dump($faa);

			foreach($criteria as $fa){
				if($fa->field_class=="easyui-datetimebox"){
					$val=date("Y-m-d 00:00:00");
					if(strpos($fa->field_id,"date_to"))$val=date("Y-m-d 23:59:59");
				} else {
					$val="";
				}
				echo $fa->caption.' : <input value="'.$val.'" id="'.$fa->field_id.'"  name="'.$fa->field_id.'" class="'.$fa->field_class.'">';
				$i++;
			}
			
			?>
			<a href="#" onclick="cari_<?=$controller?>();return false;" class="easyui-linkbutton" iconCls="icon-search">Search</a>
			</form>
		</div>
</div>
<script type="text/javascript">
    function pagerFilter_<?=$controller?>(data){
            if (typeof data.length == 'number' && typeof data.splice == 'function'){	// is array
                    data = {
                            total: data.length,
                            rows: data,
                            search: $('#search_<?=$controller?>').val()
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
    function addnew_<?=$controller?>(){
        xurl=CI_ROOT+CI_CONTROL+'/add';
        window.open(xurl,"_self");
    };
    function edit_<?=$controller?>(){
        var row = $('#dg_<?=$controller?>').datagrid('getSelected');
        if (row){
            xurl=CI_ROOT+CI_CONTROL+'/view/'+row[FIELD_KEY];
        	window.open(xurl,"_self");
        }
    }
    function del_row_<?=$controller?>(){
			var row = $('#dg_<?=$controller?>').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this line?',function(r){
	                xurl=CI_ROOT+CI_CONTROL+'/delete/'+row[FIELD_KEY];                             
	                xparam='';
	                $.ajax({
	                        type: "GET",
	                        url: xurl,
	                        param: xparam,
	                        success: function(msg){
								$('#dg_<?=$controller?>').datagrid('reload');	// reload the user data
	                        },
	                        error: function(msg){$.messager.alert('Info',msg);}
	                });         
				});
		}
	}
    function cari_<?=$controller?>(){
    	xsearch=$('#frmSearch_<?=$controller?>').serialize();
	    xurl=CI_ROOT+CI_CONTROL+'/browse_data?'+xsearch;
        $('#dg_<?=$controller?>').datagrid({url:xurl});
        $('#dg_<?=$controller?>').datagrid('reload');
    }
    
</script>
