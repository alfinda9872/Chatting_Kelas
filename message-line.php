<?php
include "penyambung.php";
$date = date('Ymd');
$hime=mysql_query('select * from tb_chattingrpl where date='.$date.' order by date');
	while($kun=mysql_fetch_array($hime)){
		echo "<div class='message-line'><img src='gambar/$kun[judul_foto]' width='50px' height='50px'>&nbsp &nbsp<b>$kun[username]</b><div id='pesan'><p>$kun[message]</p></div><b> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp</b> <div id='date'>$kun[date]</div></div>";
	}
?>