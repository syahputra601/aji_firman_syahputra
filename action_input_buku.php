<?php

include 'koneksi.php';
$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$isbn = $_POST['isbn'];
$pengarang = $_POST['pengarang'];
 
mysql_query("INSERT INTO tbl_buku VALUES('$id_buku','$judul','$isbn','$pengarang')");
if (mysql_error()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>";
  echo $error;
}else{
	// echo "Successd.";
	header("location:buku.php?pesan=input");
}
?>