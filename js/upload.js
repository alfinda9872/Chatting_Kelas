 $(document).ready(function() { 
	$('#bgrn').live('change', function(){ 
		$("#displayBg").html('');
		$("#displayBg").html('<img src="./gambar/loader1.gif">');
	$("#fBg").ajaxForm({
				target: '#displayBg'
	}).submit();

	});
 });

$(document).ready(function(){
$("#kirimBg").click(function() 
{
var file = $("#file").val();
var dataString='file='+file;
if(file=='')
{
alert("Gambar belum ada");
}
else
{
$.ajax({
type: "POST",
url: "insert.php",
data: dataString,
cache: true,
success: function(html)
{	
$("#bgrn").val('');
alert("Gambar berhasil diunggah");

  }
 });
}
return false;
	});
});