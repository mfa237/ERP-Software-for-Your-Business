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
                        // ajax strip out <script>???    	
						//		$("#"+divout).get(0).innerHTML = msg;
								parseScript(msg);
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
// this function create an Array that contains the JS code of every <script> tag in parameter
// then apply the eval() to execute the code in every script collected
function parseScript(strcode) {
  var scripts = new Array();         // Array which will store the script's code
  // Strip out tags
  while(strcode.indexOf("<script") > -1 || strcode.indexOf("</script") > -1) {
    var s = strcode.indexOf("<script");
    var s_e = strcode.indexOf(">", s);
    var e = strcode.indexOf("</script", s);
    var e_e = strcode.indexOf(">", e);
    // Add to scripts array
    scripts.push(strcode.substring(s_e+1, e));
    // Strip from strcode
    strcode = strcode.substring(0, s) + strcode.substring(e_e+1);
  }
  
  // Loop through every script collected and eval it
  for(var i=0; i<scripts.length; i++) {
    try {
      eval(scripts[i]);
    }
    catch(ex) {
      // do what you want here when a script fails
    }
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
// this function create an Array that contains the JS code of every <script> tag in parameter
// then apply the eval() to execute the code in every script collected
function parseScript(strcode) {
  var scripts = new Array();         // Array which will store the script's code
  
  // Strip out tags
  while(strcode.indexOf("<script") > -1 || strcode.indexOf("</script") > -1) {
    var s = strcode.indexOf("<script");
    var s_e = strcode.indexOf(">", s);
    var e = strcode.indexOf("</script", s);
    var e_e = strcode.indexOf(">", e);
    
    // Add to scripts array
    scripts.push(strcode.substring(s_e+1, e));
    // Strip from strcode
    strcode = strcode.substring(0, s) + strcode.substring(e_e+1);
  }
  
  // Loop through every script collected and eval it
  for(var i=0; i<scripts.length; i++) {
    try {
      eval(scripts[i]);
    }
    catch(ex) {
      // do what you want here when a script fails
    }
  }
}

function number_format(num,dig,dec,sep) {
  x=new Array();
  s=(num<0?"-":"");
  num=Math.abs(num).toFixed(dig).split(".");
  r=num[0].split("").reverse();
  for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
  return s+x.join("")+(num[1]?dec+num[1]:"");
}		
