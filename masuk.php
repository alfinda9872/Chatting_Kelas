<?php
include "penyambung.php";
$password=md5(trim("$_POST[password]"));

$login=mysql_query("Select * from tb_pengguna where password='$password'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
					
if($ketemu > 0 ){
$q2="update tb_pengguna set status='on' where password='$password'";
$h2=mysql_query($q2);
session_start();
$_SESSION['judul_foto'] =$r['judul_foto'];
$_SESSION['id'] =$r['id'];
$_SESSION['nis'] =$r['nis'];
$_SESSION['username']=$r['username'];
$_SESSION['password']=$r['password'];
$_SESSION['nama']=$r['nama'];
$_SESSION['status']=$r['status'];
$_SESSION['akses_sebagai']=$r['akses_sebagai'];
$_SESSION['gender']=$r['gender'];
$_SESSION['tanggal_lahir']=$r['tanggal_lahir'];
$_SESSION['no_hp']=$r['no_hp'];
$_SESSION['gol_darah']=$r['gol_darah'];
header("location:home.php");
}

else{
	echo"<script type='text/javascript'>alert('Password Anda Salah Atau Belum Terdaftar Di Database Kami Silahkan Ingat-Ingat Kembali');</script>";
   	include "index.php";
}
?>