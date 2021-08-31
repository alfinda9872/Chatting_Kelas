<?php
include "penyambung.php";

if (isset($_GET['nama'])) {
	$nama = $_GET['nama'];
} else {
	die ("Error. No NIS Selected! ");	
}
$query = "SELECT * FROM tb_pengguna WHERE nama='$nama'";
$man = mysql_query ($query);
$k = mysql_fetch_array ($man);
$nis = $k['nis'];
$username = trim($k['username']);
$password = md5($k['password']);
$nama = $k['nama'];
$gender = $k['gender'];
list($thn,$bln,$tgl) = explode ("-",$k['tanggal_lahir']);
$no_hp = $k['no_hp'];
$tanggal_lahir = $k['tanggal_lahir'];
$gol_darah = $k['gol_darah'];
$alamat = $k['alamat'];
$judul_foto = $k['judul_foto'];
$gambar = $k['judul_foto'];
//proses input
if (isset($_POST['Ubah'])) {
	$nis = trim($_POST['nis']);
	$username =($_POST['username']);
	$password =md5($_POST['password']);
	$nama = $_POST['nama'];
	$gender = $_POST['gender'];
	$tanggal_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$no_hp = $_POST['no_hp'];
	$gol_darah = $_POST['gol_darah'];
	$alamat = $_POST['alamat'];
	$filename=$_FILES['gambar']['name'];
	$filesize  = $_FILES['gambar']['size'];
	$explode    = explode('.',$filename);
    $extensi    = $explode[count($explode)-1];
	$move=move_uploaded_file($_FILES['gambar']['tmp_name'],'gambar/'.$filename);

	if (strlen($filename)>0) {
		//upload
		if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
			move_uploaded_file ($_FILES['gambar']['tmp_name'], "gambar/".$filename);
			mysql_query ("UPDATE tb_pengguna SET judul_foto='$filename' WHERE nis='$nis'");
		}
	}

	//insert ke tabel
	$query = "UPDATE tb_pengguna SET username ='$username', password ='$password', nama = '$nama', gender ='$gender', tanggal_lahir ='$tanggal_lahir', no_hp ='$no_hp', gol_darah ='$gol_darah', alamat ='$alamat', judul_foto = '$filename' WHERE nis ='$nis'";
	$sql = mysql_query ($query) or die (mysql_error());
	if ($sql) {
			echo"<script>alert('Account Telah Di Ubah !',document.location.href='home.php')</script>";
	} else {
			echo"<script>alert('Account Gagal Di Ubah !',document.location.href='home.php')</script>";
	}
}
?>
<link rel="stylesheet" type="text/css" href="style/profil.css" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style/bootstrap.css" rel="stylesheet">
<link href="style/bootstrap-responsive.css" rel="stylesheet">
<script src="style/jQuery.js"></script>
<script src="style/bootstrap.js"></script>
<div id="content">
<center>
	<h2 align="center">Profil Account</h2>
	<FORM ACTION="" METHOD="POST" NAME="Daftar" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" width="950">
			
			<tr>
				<td width="150">NIS</td>
				<td width="463">:&nbsp&nbsp <?php echo $nis; ?></td>
				<td width="316">AVATAR</td>
			</tr>
			<tr>
				<td>USERNAME</td>
				<td>:&nbsp&nbsp <?php echo $username; ?></td>
				<td rowspan="6"><?php echo "<img src='gambar/$gambar' width='250' height='250'/>"; ?></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:&nbsp&nbsp <?php echo $nama; ?></td>
			</tr>
			<tr>
				<td>GENDER</td>
				<td>:&nbsp&nbsp <?php echo $gender; ?></td>
			</tr>
			<tr>
				<td>TANGGAL LAHIR</td>
				<td>: <?php echo $tanggal_lahir; ?></td>
			</tr>
			<tr>
				<td>NO HP/TELP</td>
				<td>:&nbsp&nbsp<?php echo $no_hp; ?></td>
			</tr>
			<tr>
				><td>GOLONGAN DARAH</td>
				<td>:&nbsp&nbsp <?php echo $gol_darah; ?></td>
			</tr>
			<tr>
				<td>ALAMAT</td>
				<td>:&nbsp&nbsp<?php echo $alamat; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;&nbsp;
				<div class="controls">
				<input type="hidden" name="nis" value="<?php echo $nis; ?>">
				<a href="talking.php"><input type="button" name="" value=" KEMBALI " class="btn btn-danger" /></a></td>
				<td>&nbsp;</td>
				</div>
			</tr>
		</table>
		</center>
	</FORM>
</div>