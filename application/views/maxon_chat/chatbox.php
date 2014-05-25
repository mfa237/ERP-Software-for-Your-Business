<style>
.xchat {
	position: fixed;
	right: 10px;
	bottom: 2px;
	height: 300px;
	width: 200px;
	padding: 10px;
	background: #EFF5F7;
	border: 1px solid rgb(143, 143, 235);
	font-size: 10px;
}
.xchat-min {
	position: fixed;
	right: 10px;
	bottom: 2px;
	height: 30px;
	width: 200px;
	padding: 10px;
	background: #EFF5F7;
	border: 1px solid rgb(143, 143, 235);
	font-size: 10px;
}

.xchat-title {
	background: rgb(13,143,235);
	color: white;
	font-size: 15px;
	padding: 5px;
	width: auto;
	margin-left: -10px;
	margin-top: -10px;
	margin-bottom:10px;
	width: 200px;
}
.xchat-content {

}
.xchat-button {
	float:right;
	cursor:pointer;
}
.xchat-button:hover {
	color: black;
}
.xchat-content-user {
	margin-top:5px;
	border-top:1px solid rgb(143,143,235);
	padding:3px;
}
.xchat-content-chat {
	height:220px;
	width:180px;
	overflow:scroll;
}
.xchat-loading {
	background-image:url('<?=base_url()?>images/loading.gif');
	background-repeat: no-repeat;
}

</style>
<div class="xchat" id="xchat">
	<div class="xchat-title">NGOBROL
		<span class="xchat-button">+</span>
	</div>
	<div class="xchat-content">
		<div class="xchat-content-chat" id="xchat-content-chat">
			<p>
				Silahkan ngobrol dong disini yang lagi online ...
			</p>
		</div>
		<div class="xchat-content-user">
			<input  type="text" id="xchat-user" style="margin-left:-5px;width:50px;float:left;margin-right:3px;" value="Guest" placeholder="Guest">
			<input type="text" id="xchat-message" style="width:120px" placeholder="Enter your message">
		</div>
	</div>
</div>

<script>
	var xchat_state=0;
	var t=0;
	
	function load_chat_msg() {
		$('#xchat-content-chat').addClass("xchat-loading");
		t=setTimeout(function(){load_chat_msg()}, 18000);
		$.ajax({
                type: "GET",
                url: '<?=base_url();?>index.php/maxon_chat/load',
				contentType: 'application/json; charset=utf-8',
                success: function(msg){
					var result = $.parseJSON(msg);
					if(result.userid!=$("#xchat-user").val()) $("#xchat-user").val(result.userid);
					msg=replaceAll('{b}','<b>',result.msg);
					msg=replaceAll('{eb}','</b>',msg);
					$("#xchat-content-chat").html(msg);
					$('#xchat-content-chat').removeClass("xchat-loading");
                }
		});
	}
	function replaceAll(find, replace, str) {
		return str.replace(new RegExp(find, 'g'), replace);
	}
	$().ready(function(){

		load_chat_msg();

		$('.xchat-button').click(function(e){
			e.preventDefault();
			if(xchat_state==0) {
				xchat_state=1;
				$('#xchat').removeClass("xchat").addClass("xchat-min");
			} else {
				xchat_state=0;
				$('#xchat').removeClass("xchat-min").addClass("xchat");
			};
		});
		$('#xchat-message').bind('keypress', function(e) {
			var code = e.keyCode || e.which;
			var msg=$("#xchat-message").val();
			var usr=$("#xchat-user").val().substr(0,10);
			 if(code == 13) {  
				$('#xchat-content-chat').addClass("xchat-loading");
				$.ajax({
						type: "GET",
						url: '<?=base_url();?>index.php/maxon_chat/save',
						data:{u:usr,m:msg}, 
						contentType: 'application/json; charset=utf-8',
						success: function(ret){
							$("#xchat-message").val("");
						}
				});
			 }		
		});		
		
		
	});
</script>