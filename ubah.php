<?php
include "penyambung.php";

if (isset($_GET['nis'])) {
	$nis = $_GET['nis'];
} else {
	die ("Error. No NIS Selected! ");	
}
$query = "SELECT * FROM tb_pengguna WHERE nis='$nis'";
$man = mysql_query ($query);
$k = mysql_fetch_array ($man);
$nis = $k['nis'];
$username = trim($k['username']);
$password = md5($k['password']);
$nama = $k['nama'];
$gender = $k['gender'];
list($thn,$bln,$tgl) = explode ("-",$k['tanggal_lahir']);
$no_hp = $k['no_hp'];
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
			echo"<script>alert('Account Telah Di Ubah, Silahkan Relogin Kembali !',document.location.href='index.php')</script>";
	} else {
			echo"<script>alert('Account Gagal Di Ubah !',document.location.href='home.php')</script>";
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
	<h2 align="center">SETTING ACCOUNT</h2>
	<FORM ACTION="" METHOD="POST" NAME="Daftar" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" width="950">
			
			<tr>
				<td width="150">NIS</td>
				<td width="463">:<?php echo $nis; ?></td>
				<td width="216">Foto</td>
			</tr>
			<tr>
				<td>USERNAME</td>
				<td>: <input type="text" name="username" size="30" maxlength="30" value="<?php echo $username; ?>"></td>
				<td rowspan="4"><?php echo "<img src='gambar/$gambar' width='180' height='180'/>"; ?></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td>: <input type="password" name="password" size="30" maxlength="30" value="<?php echo $password; ?>"></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>: <input type="text" name="nama" size="30" maxlength="30" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr>
				<td>GENDER</td>
				<td>: <input type="radio" name="gender" value="cowok" <?php echo ($gender=='cowok')?"checked":""?>> Cowok &nbsp;&nbsp;
				<input type="radio" name="gender" value="cewek"  <?php echo ($gender=='cewek')?"checked":""?>> Cewek</td>
			</tr>
			<tr>
				<td>TANGGAL LAHIR</td>
				<td>: 
				<select name="tgl">
				<?php
					for ($i=1; $i<=31; $i++) {
						$tanggal = ($i<10) ? "0$i" : $i;
						$pilih = ($tanggal==$tgl)? "selected" : "";
						echo "<option value='$tanggal' $pilih>$tanggal</option>";	
					}
				?>
				</select> - 
				<select name="bln">
				<?php
					for ($j=1; $j<=12; $j++) {
						$bulan = ($j<10) ? "0$j" : $j;
						$pilih = ($bulan==$bln)? "selected" : "";
						echo "<option value='$bulan' $pilih>$bulan</option>";	
					}
				?>
				</select> - 
				<select name="thn">
				<?php
					for ($tahun=1970; $tahun<=2000; $tahun++) {
						$pilih = ($tahun==$thn)?"selected" : "";
						echo "<option value='$tahun' $pilih>$tahun</option>";	
					}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>NO HP/TELP</td>
				<td>: <input type="text" name="no_hp" size="30" maxlength="30" value="<?php echo $no_hp; ?>"></td>
			</tr>
			<tr>
				><td>GOLONGAN DARAH</td>
				<td>: <input type="radio" name="gol_darah" value="A" <?php echo ($gol_darah=='A')?"checked":""; ?> > A &nbsp;&nbsp;
				<input type="radio" name="gol_darah" value="B" <?php echo ($gol_darah=='B')?"checked":""; ?>> B &nbsp;&nbsp;
				<input type="radio" name="gol_darah" value="AB" <?php echo ($gol_darah=='AB')?"checked":""; ?>> AB &nbsp;&nbsp;
				<input type="radio" name="gol_darah" value="O" <?php echo ($gol_darah=='O')?"checked":""; ?>> O &nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td>ALAMAT</td>
				<td>: <textarea name="alamat" cols="40" rows="3" ><?php echo $alamat; ?></textarea></td>
			</tr>
			<tr><td>AVATAR </td><td><input type="file" name="gambar" value="<?php echo $gambar; ?>"/> </td></tr> 
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;&nbsp;
				<div class="controls">
				<input type="hidden" name="nis" value="<?php echo $nis; ?>">
				<input type="submit" name="Ubah" value=" APPLY " class="btn">&nbsp;
				<a href="home.php"><input type="button" name="" value=" KEMBALI " class="btn btn-danger" /></a></td>
				<td>&nbsp;</td>
				</div>
			</tr>
		</table>
		</center>
	</FORM>
</div>