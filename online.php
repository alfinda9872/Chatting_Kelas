<h3>RPL On Login:</h3>
<?php
	include('penyambung.php');

	$q1="select * from tb_pengguna where status='on'";
	$h1=mysql_query($q1);
	while($row=mysql_fetch_array($h1)){
?>
<a href="home2.php?nama=<?php echo "$row[nama]"; ?>">	
<div class=online><img src='gambar/<?php echo "$row[judul_foto]"; ?>' width='50px' height='50px'> : <?php echo"$row[nama]"; ?></div>
</a>
<?php
	}
?>