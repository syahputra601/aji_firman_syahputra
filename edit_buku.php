<!DOCTYPE html>
<html>
<head>
	<title>Created by Aji Firman Syahputra</title>
</head>
<body>
<?php
include 'header.php';
?>
<br/>
<br/>
<?php 
include "koneksi.php";
$id_buku = $_GET['id_buku'];
$query_mysql = mysql_query("SELECT * FROM tbl_buku WHERE ID_BUKU='$id_buku'")or die(mysql_error());
// $nomor = 1;
while($data = mysql_fetch_array($query_mysql)){
?>
<div align="center">
	<h3>Edit Data Buku</h3>
	<form action="action_update_buku.php" method="post">		
		<table>
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td>
					<input type="text" name="id_buku" value="<?php echo $data['ID_BUKU'] ?>" readonly>
				</td>					
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<input type="text" name="judul" value="<?php echo $data['JUDUL'] ?>">
				</td>					
			</tr>
			<tr>
				<td>ISBN</td>
				<td>:</td>
				<td>
					<input type="text" name="isbn" value="<?php echo $data['ISBN'] ?>">
				</td>					
			</tr>	
			<tr>
				<td>Pengarang</td>
				<td>:</td>
				<td>
					<input type="text" name="pengarang" value="<?php echo $data['PENGARANG'] ?>">
				</td>					
			</tr>	
			<tr>
				<td>
					<a href="buku.php" style="text-decoration:none; color: inherit;" title="Tampilan List Siswa">
					<button type="button">Close</button>
					</a>
				</td>
				<td></td>
				<td><input type="submit" value="Save"></td>					
			</tr>				
		</table>
	</form>
	<?php } ?>
</div>
</body>
</html>