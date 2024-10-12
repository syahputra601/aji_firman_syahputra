<?php ob_start(); ?>
<html>
<head>
	<title>Created by Aji Firman Syahputra</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
<h1 style="text-align: center;">Data Buku yang Tersedia</h1>
<table border="1" width="100%" align="center" style="font-size: 14px;">
<tr align="center">
	<th>ID BUKU</th>
	<th>JUDUL</th>
	<th>ISBN</th>
	<th>PENGARANG</th>
</tr>
<?php
// Load file koneksi.php
include "koneksi.php";
$query_mysql = mysql_query("SELECT * FROM tbl_peminjaman_buku as a INNER JOIN tbl_siswa as b ON a.NIS=b.NIS INNER JOIN tbl_buku as c ON a.ID_BUKU=c.ID_BUKU WHERE a.STATUS='1'")or die(mysql_error());
	// while($data = mysql_fetch_array($query_mysql)){
$row = mysql_num_rows($query_mysql); // Ambil jumlah data dari hasil eksekusi $sql

if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    // while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	while($data = mysql_fetch_array($query_mysql)){
        echo "<tr align='center'>";
        echo "<td>".$data['ID_BUKU']."</td>";
        echo "<td>".$data['JUDUL']."</td>";
        echo "<td>".$data['ISBN']."</td>";
        echo "<td>".$data['PENGARANG']."</td>";
        echo "</tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>
<?php
// die();
?>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require 'html2pdf/autoload.php';

$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan_buku_tersedia.pdf');
header("location:javascript://history.go(-1)");
?>
