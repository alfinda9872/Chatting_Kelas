<?php
	session_start();
	include "penyambung.php";
	if($_SESSION['username'] == "") {
		header('location:index.php');
	}else{
?>

<html>
	<head>
		<title>RPL State Chat (Private)</title>
			<link href='gambar/1.png' rel='shortcut icon'>
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="style/talking.css">
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	</head>
	<body>
		<div id='wrapper'>
			<div id='menu'>
				<h2>RPL Chat Room (Beta)</h2>
				<p class='welcome'>Selamat Datang <?=$_SESSION['nama']?></p>
				<p><button onClick="window.location='logout.php?id<?=$_SESSION['username']?>'" class="logout">Logout</a></p></button>
				<p><button onClick="window.location='home.php'" class="logout">Profil</a></p></button>

						<div style="clear:both"></div>
				</div>
					<did id="chatline">
					<div id="chatbox">
					<? include "message-line.php";?>
				</div>
			<div id="input">
			<form name="message" action="">
			<input type="text" name="message-input" id="message-input" />
			<input type="submit" name="message-submit" id="message-submit" value="Enter" />
			</form>

		</div>
	</div>

	<div id="online">
		<? include ("online.php"); ?>
	</div>

	<!--Ajax-->
	
	<script languange="javascript" type="text/javascript" src="js/talking.js"></script>
	
	</body>
	</html>

<?php }  ?>