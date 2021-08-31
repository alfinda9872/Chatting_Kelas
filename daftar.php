<?php
include "penyambung.php";
//proses input
if (isset($_POST['Daftar'])) {

	$nis = trim($_POST['nis']);
	$username =trim ($_POST['username']);
	$password =md5($_POST['password']);
	$nama = $_POST['nama'];
	$gender = $_POST['gender'];
	$tahun = $_POST['tahun'];
	$bulan = $_POST['bulan'];
	$tanggal = $_POST['tanggal'];
	$tanggal_lahir = $tahun."-".$tanggal."-".$bulan;
	$no_hp = $_POST['no_hp'];
	$gol_darah = $_POST['gol_darah'];
	$alamat = $_POST['alamat'];
	$filename=$_FILES['gambar']['name'];
	$filesize  = $_FILES['gambar']['size'];
	$explode    = explode('.',$filename);
    $extensi    = $explode[count($explode)-1];
	$move=move_uploaded_file($_FILES['gambar']['tmp_name'],'gambar/'.$filename);
	
	$cekuser = mysql_query("SELECT * FROM tb_pengguna where nis='$nis' || password='$password' ");

	if(mysql_num_rows($cekuser) <> 0) {
	echo"<script>alert('Nis Atau Password Sudah Terdaftar !',document.location.href='daftar.php')</script>";
	} else {

	$query = "INSERT INTO tb_pengguna (nis,username,password,nama,gender,tanggal_lahir,no_hp,gol_darah,alamat,judul_foto) VALUES('$nis','$username','$password','$nama','$gender','$tanggal_lahir','$no_hp','$gol_darah','$alamat','$filename')";
	$sql = mysql_query ($query) or die (mysql_error());
	if ($sql) {
			echo"<script>alert('Account telah ditambahkan !',document.location.href='index.php')</script>";
		}
	}
}
?>
<link rel="stylesheet" type="text/css" href="style/daftar.css" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style/bootstrap.css" rel="stylesheet">
<link href="style/bootstrap-responsive.css" rel="stylesheet">
<script src="style/jQuery.js"></script>
<script src="style/bootstrap.js"></script>
<div id="content">
<center>
	<h2 align="center">REGISTER</h2>
	<FORM ACTION="" METHOD="POST" NAME="Daftar" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" width="950">
			
			<tr>
				<td width="150">NIS</td>
				<td>: <input type="number" name="nis" size="30" maxlength="8"></td>
			</tr>
			<tr>
				<td>USERNAME</td>
				<td>: <input type="text" name="username" size="30" maxlength="30" pattern="[a-zA-Z]{5,10}"></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td>: <input type="password" name="password" size="30" maxlength="30" placeholder="Pass"></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>: <input type="text" name="nama" size="30" maxlength="30"></td>
			</tr>
			<tr>
				<td>GENDER</td>
				<td>: <input type="radio" name="gender" value="cowok" checked> Cowok &nbsp;&nbsp;
				<input type="radio" name="gender" value="cewek"> Cewek</td>
			</tr>
			<tr>
				<td>TANGGAL LAHIR</td>
				<td>: 
				<select name="tanggal">
				<?php
					for ($i=1; $i<=31; $i++) {
						$tanggal = ($i<10) ? "0$i" : $i;
						echo "<option value='$tanggal'>$tanggal</option>";	
					}
				?>
				</select> - 
				<select name="bulan">
				<?php
					for ($j=1; $j<=12; $j++) {
						$bulan = ($j<10) ? "0$j" : $j;
						echo "<option value='$bulan'>$bulan</option>";	
					}
				?>
				</select> - 
				<select name="tahun">
				<?php
					for ($tahun=1970; $tahun<=2000; $tahun++) {
						echo "<option value='$tahun'>$tahun</option>";	
					}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>NO HP/TELP</td>
				<td>: <input type="text" name="no_hp" size="30" maxlength="30"></td>
			</tr>
			<tr>
				><td>GOLONGAN DARAH</td>
				<td>: <input type="radio" name="gol_darah" value="A" checked> A &nbsp;&nbsp;
				<input type="radio" name="gol_darah" value="B"> B &nbsp;&nbsp;
				<input type="radio" name="gol_darah" value="AB"> AB &nbsp;&nbsp;
				<input type="radio" name="gol_darah" value="O"> O &nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td>ALAMAT</td>
				<td>: <textarea name="alamat" cols="40" rows="3"></textarea></td>
			</tr>
			<tr><td>AVATAR </td><td><input type="file" name="gambar" class="hover" /> </td></tr> 
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;&nbsp;
				<div class="controls">
				<input type="submit" name="Daftar" value=" REGISTER " class="btn">&nbsp;
				<input type="reset" name="reset" value=" REFRESH " class="btn">&nbsp;
				<a href="index.php"><input type="button" name="" value=" KEMBALI " class="btn btn-danger" /></a></td>
				</div>
			</tr>
		</table>
		</center>
	</FORM>
</div>