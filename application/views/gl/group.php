<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 
<div id='dlg_group' style='padding:10px'>
    <?=$message?>
<div>Account Type</div><div><input type='input' id='account_type' name="account_type" value="<?=$account_type?>"/></div>    
<div>Group Type</div><div><input type='input' id='group_type' value="<?=$group_type?>"/></div>
<div>Group Name</div><div><input type='input' id='group_name' value="<?=$group_name?>"/></div>
<div>Parent Group Type</div><div><input type='input' id='parent_group_type' value="<?=$parent_group_type?>"/></div>
<div><a onclick="save_group();" href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'">Save</a></div>
</div>
<div id="output" name="output"></div>
<script>
 $(document).ready(function(){
    
     
 });

    function save_group(){
        xurl=CI_ROOT+'coa/group_save';
        param='account_type='+$("#account_type").val()
        +'&group_name='+$("#group_name").val()
        +'&group_type='+$("#group_type").val()
        +'&parent_group_type='+$("#parent_group_type").val();
        console.log(param);
     	console.log(xurl); 
        divout='output';
        get_this(xurl,param,divout);      
    }
</script>