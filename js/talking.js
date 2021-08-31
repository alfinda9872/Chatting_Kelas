//membuat document jquery
$(document).ready(function(){
	//variable yg dibaca dengan ajax untuk di kirim
	$("#message-submit").click(function(){
		var clientmsg = $("#message-input").val();
		$.post("post-message.php", {text: clientmsg});
		$("#message-input").attr("value", "");
		return false;
	});
	//load ajax message
	function loadLog()
	{
		$("#chatbox").load("message-line.php");
				var con = document.getElementById("chatbox");
				con.scrollTop = con.scrollHeight;
	}
	function loadlog(){
		var oldscrolHeight = $("#online").attr("scrollHeight") - 20;
		$.ajax({
			url : "online.php",
			cache : false,
			success : function(html){
				$("#online").html(html); //load ke <div chatbox>
				var newscrollHeight = $("#online").attr("scrollHeight") - 20;
				if(newscrollHeight < oldscrollHeight){
					$("#online").animate({scrollTop: newscrollHeight}, 'normal'); //scrol otomatisnya
				}
			},
		});
	}
	
	setInterval (loadLog, 2500);
	setInterval (loadlog, 2500);
});