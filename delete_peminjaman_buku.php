<?php 
include 'koneksi.php';
$id_peminjaman_buku = $_GET['id_peminjaman_buku'];
mysql_query("DELETE FROM tbl_peminjaman_buku WHERE ID_PEMINJAMAN_BUKU='$id_peminjaman_buku'")or die(mysql_error());

if (mysql_error()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>";
  echo $error;
}else{
	// echo "Successd.";
	header("location:peminjaman_buku.php?pesan=delete");
}
?>