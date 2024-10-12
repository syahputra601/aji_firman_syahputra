<?php 
 
include 'koneksi.php';
$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$isbn = $_POST['isbn'];
$pengarang = $_POST['pengarang'];
 
mysql_query("UPDATE tbl_buku SET JUDUL='$judul', ISBN='$isbn', PENGARANG='$pengarang' WHERE ID_BUKU='$id_buku'");

if (mysql_error()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>";
  echo $error;
}else{
	// echo "Successd.";
	header("location:buku.php?pesan=update");
}
?>