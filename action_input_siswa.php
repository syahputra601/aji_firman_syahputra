<?php

include 'koneksi.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$tgl = $_POST['tgl'];
$mnth = $_POST['mnth'];
$year = $_POST['year'];
$join_tgl_lahir = $tgl.'/'.$mnth.'/'.$year;
// print_r($join_tgl_lahir);
// die();
$jenis_kelamin = $_POST['jenis_kelamin'];
 
mysql_query("INSERT INTO tbl_siswa VALUES('$nis','$nama','$join_tgl_lahir','$jenis_kelamin')");
// print_r($x);
// die();
if (mysql_error()) {
  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>";
  // $log = mysql_query("INSERT INTO db_errors (error_page,error_text) VALUES ('$page','".escape_data($error)."')");
  echo $error;
}else{
	// echo "Successd.";
	header("location:siswa.php?pesan=input");
}

// function q($page,$query){
// // $page
// $result = mysql_query($query);
// 	if (mysql_errno()) {
// 	  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$query\n<br>";
// 	  $log = mysql_query("INSERT INTO db_errors (error_page,error_text) VALUES ('$page','00x00')");
// 	}
// }

// $query = "INSERT INTO tbl_siswa VALUES('$nis','$nama','$join_tgl_lahir','$jenis_kelamin')";
// $result = q("Sample Page Title",$query);
// echo $result;
// die();

?>