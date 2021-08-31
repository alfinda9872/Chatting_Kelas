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
			<link rel="stylesheet" type="text/css" href="style/home.css" media="screen">
			<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
			<script type="text/javascript" src="js/jquery.form.js"></script>
			<script type="text/javascript" src="js/upload.js"></script>
			<title> RPL State (Private) </title>
		<script language="JavaScript">
			var txt="RPL State (Private)..........";
			var kecepatan=400;var segarkan=null;function bergerak() { document.title=txt;
			txt=txt.substring(1,txt.length)+txt.charAt(0);
			segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
		</script>
				<link href='gambar/1.png' rel='shortcut icon'>
		</head>
		<body>
		<div id="content">
			<h2>Selamat Datang Agen <?=$_SESSION[username]?></h2>
			<?php
		if ($_SESSION[akses_sebagai] == "pengguna") {echo "<p> Anda Masuk Sebagai Pengguna..!</p>";}
		if ($_SESSION[akses_sebagai] == "pemilik") {echo "<p> Anda Masuk Sebagai Pemilik..!";}
		if ($_SESSION[akses_sebagai] == "") {echo "<p> Anda Tidak Memliki Akses Pada Saat Ini..!</p>";}
		?>
		<p style="float:center;">
		<p style="font-size:20px;"><img src='gambar/<?=$_SESSION[judul_foto]?>' width='400px' height='200px'></p>
		<h2>Account Ke&nbsp &nbsp &nbsp &nbsp:&nbsp&nbsp <?=$_SESSION[id]?></p>
		<p style="font-size:20px;">Nama Lengkap &nbsp &nbsp &nbsp &nbsp  :&nbsp&nbsp <?=$_SESSION[nama]?></p>
		<p style="font-size:20px;">Gender&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?=$_SESSION[gender]?></p>
		<p style="font-size:20px;">Tanggal Lahir&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?=$_SESSION[tanggal_lahir]?></p>
		<p style="font-size:20px;">No HP&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?=$_SESSION[no_hp]?></p>
		<p style="font-size:20px;">Gol Darah &nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?=$_SESSION[gol_darah]?></p>
		<p><button onClick="window.location='ubah.php?nis=<?php echo $_SESSION[nis] ?>'" class="button3"><a>Setting Account</button></p>
	</div>
	
		<button onClick="window.location='talking.php'" class="button"><a>Go to Chatting</button>
	</body>
	</html>
	<?php } ?>