<?php 
 
include 'koneksi.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$tgl = $_POST['tgl'];
$mnth = $_POST['mnth'];
$year = $_POST['year'];
$join_tgl_lahir = $tgl.'/'.$mnth.'/'.$year;
$jenis_kelamin = $_POST['jenis_kelamin'];
 
mysql_query("UPDATE tbl_siswa SET NAMA='$nama', TGL_LAHIR='$join_tgl_lahir', KELAMIN='$jenis_kelamin' WHERE NIS='$nis'");

if (mysql_error()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>";
  echo $error;
}else{
	// echo "Successd.";
	header("location:siswa.php?pesan=update");
}
?>