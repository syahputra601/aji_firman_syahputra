<?php 
 
include 'koneksi.php';
$id_peminjaman_buku = $_POST['id_peminjaman_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$mnth_pinjam = $_POST['mnth_pinjam'];
$year_pinjam = $_POST['year_pinjam'];
$join_tgl_pinjam = $tgl_pinjam.'/'.$mnth_pinjam.'/'.$year_pinjam;


$tgl_batas_pinjam = $_POST['tgl_batas_pinjam'];
$get_slash = substr($tgl_batas_pinjam, 2,1);
if($get_slash == '/'){
	$join_tgl_batas = $tgl_batas_pinjam;
}else{
	$get_year = substr($tgl_batas_pinjam, 0,4);
	$get_month = substr($tgl_batas_pinjam, 5,2);
	$get_tgl = substr($tgl_batas_pinjam, 8,2);
	$join_tgl_batas = $get_tgl.'/'.$get_month.'/'.$get_year;
}


$tgl_kembali = $_POST['tgl_kembali'];
$mnth_kembali = $_POST['mnth_kembali'];
$year_kembali = $_POST['year_kembali'];
$join_tgl_kembali = $tgl_kembali.'/'.$mnth_kembali.'/'.$year_kembali;
$status = $_POST['status'];
$nis = $_POST['nis'];
$id_buku = $_POST['id_buku'];
 
mysql_query("UPDATE tbl_peminjaman_buku SET PINJAM='$join_tgl_pinjam', BATAS='$join_tgl_batas', KEMBALI='$join_tgl_kembali', STATUS='$status', NIS='$nis', ID_BUKU='$id_buku' WHERE ID_PEMINJAMAN_BUKU='$id_peminjaman_buku'");

if (mysql_error()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>";
  echo $error;
}else{
	// echo "Successd.";
	header("location:peminjaman_buku.php?pesan=update");
}
?>