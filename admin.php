<?php
	session_start();
	include "penyambung.php";
	error_reporting(0);

	if(empty($_SESSION['password'])) {include "index.php";}

	else{
		?>
		<!DOCTYPE>
		<html>
		<head>
			<link rel="stylesheet" type="text/css" href="style/index.css" media="screen">
			<title> RPL State (Private) </title>
		<script language="JavaScript">
			var txt="RPL State (Private)..........";
			var kecepatan=400;var segarkan=null;function bergerak() { document.title=txt;
			txt=txt.substring(1,txt.length)+txt.charAt(0);
			segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
		</script>
				<link href='gambar/tune.png' rel='shortcut icon'>
		</head>
		<body>
		<div id="pass">
			<h2>Selamat Datang Agen <?=$_SESSION[username]?></h2>
		<?php
		if ($_SESSION[akses_sebagai] == "pengguna") {echo "<p> Anda Masuk Sebagai Pengguna..! <a href='index.php'title='Logout!'>Logout</a></p>";}
		if ($_SESSION[akses_sebagai] == "pemilik") {echo "<p> Anda Masuk Sebagai Pemilik..! <a href='index.php'title='Logout!'>Logout</a></p>";}
		if ($_SESSION[akses_sebagai] == "") {echo "<p> Anda Tidak Memliki Akses Pada Saat Ini..! <a href='index.php'title='Logout!'>Logout</a></p>";}
		?>
		</div>
	</body>
	</html>
	<?php } ?>