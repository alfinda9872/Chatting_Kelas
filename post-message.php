<?php
	session_start();
	$date= date('Ymd');
	include "penyambung.php";
	$draig=mysql_query("insert into tb_chattingrpl (username, message, date, judul_foto)values('$_SESSION[username]', '$_POST[text]', '$date','$_SESSION[judul_foto]')");
?>