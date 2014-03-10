// $(document).ready(function(){
//	 $('.ajax').click(function(e){	  
//                e.preventDefault();
//                $.get($(this).attr('href'),function(Res){
//                $('#main_content').html(Res);
//            });
//	 })
//	 $('.ajax_popup').click(function(e){
//                e.preventDefault();
//                $.get($(this).attr('href'),function(Res){
//                $('#content_popup').html(Res);
//            });
//	 })
//        $('form').submit(function(event) {
//          event.preventDefault(); // Prevent the form from submitting via the browser.
//          var form = $(this);
//          param=form.serialize();
//          console.log(param);
//          $.ajax({
//            type: form.attr('method'),
//            url: form.attr('action'),
//            data: param
//          }).done(function(msg) {     
//            //$('#main_content').html(msg);
//            //$('#dlg').dialog('close');
//           
//            $.messager.alert('Info','Success !')
//          }).fail(function(jqXHR, textStatus, errorThrown) {
//              console.log(jqXHR.responseText);
//              $.messager.alert('Info','Error !')
//          });
//        });
//
// })
function run_menu(path){
     xurl=CI_ROOT+path;
     
     window.open(xurl,'_self');
    
 }
function post_this(xurl,param,divout){
    console.log(xurl);
    console.log(param);
	$.ajax({
		type: "POST",
		url: xurl,
		data: param,
		success: function(msg){
			if(divout!="") {
				$('#'+divout).html(msg);
			};
			//errmsg("Ready.");
		},
		error: function(msg){alert(msg);}
	}); 
        return false;
}
function get_this(xurl,param,divout){
		
		console.log(xurl);
        
        if(divout!=''){
			$('#'+divout).html("<img src='"+CI_BASE+"images/loading.gif'>");
        	event.preventDefault();
            $.ajax({
                    type: "GET",
                    url: xurl,
                    data: param,
                    success: function(msg){
                            if(divout!="") {
                                $('#'+divout).html(msg);
                            };
                            //errmsg("Ready.");
                    },
                    error: function(msg){alert(msg);}
            }); 
            return false;
        } else {
           
            window.open(xurl,'_self');
            return false;
        }
}

function myformatter(date){

        var y = date.getFullYear();

        var m = date.getMonth()+1;

        var d = date.getDate();

        return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);

}

function myparser(s){

        if (!s) return new Date();

        var ss = s.split('-');

        var y = parseInt(ss[0],10);

        var m = parseInt(ss[1],10);

        var d = parseInt(ss[2],10);

        if (!isNaN(y) && !isNaN(m) && !isNaN(d)){

                return new Date(y,m-1,d);

        } else {

                return new Date();

        }

}
function next_number(kode,divOutput)
{
    $.ajax({
        type: "GET",
        url: CI_ROOT+'autonumber',
        data: 'q='+kode,
        success: function(msg){
            $('#'+divOutput).html(msg);
        },
        error: function(msg){alert(msg);}
    }); 
}