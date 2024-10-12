<?php 
include 'koneksi.php';
$id_buku = $_GET['id_buku'];
mysql_query("DELETE FROM tbl_buku WHERE ID_BUKU='$id_buku'")or die(mysql_error());

if (mysql_error()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>";
  echo $error;
}else{
	// echo "Successd.";
	header("location:buku.php?pesan=delete");
}
?>