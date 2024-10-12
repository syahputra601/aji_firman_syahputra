<?php 
include 'koneksi.php';
$nis = $_GET['nis'];
mysql_query("DELETE FROM tbl_siswa WHERE NIS='$nis'")or die(mysql_error());

if (mysql_error()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>";
  echo $error;
}else{
	// echo "Successd.";
	header("location:siswa.php?pesan=delete");
}
?>