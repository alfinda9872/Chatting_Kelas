<?php
	session_start();
		include "penyambung.php";
		$hime=$_REQUEST['username'];
		$hime3=mysql_query("update tb_pengguna set status='off' where username='$_SESSION[username]'");

		session_start();

		session_unset();

		session_destroy();

		header('location:index.php');

?>