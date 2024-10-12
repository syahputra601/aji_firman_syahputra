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
<?php 
if(isset($_GET['pesan'])){
	$pesan = $_GET['pesan'];
	if($pesan == "input"){
		echo "Data berhasil di input.";
	}else if($pesan == "update"){
		echo "Data berhasil di update.";
	}else if($pesan == "delete"){
		echo "Data berhasil di hapus.";
	}
}
?>
<br>
<div align="center">
	<table border="1">
		<tr>
			<td colspan="6" style="text-align: center;">
				<h2>DATA BUKU</h2>
			</td>
		</tr>
		<tr>
			<th>ID BUKU</th>
			<th>JUDUL</th>
			<th>ISBN</th>
			<th>PENGARANG</th>
			<th>EDIT</th>	
			<th>DELETE</th>		
		</tr>
		<?php 
		include "koneksi.php";
		// include "function.php";
		$query_mysql = mysql_query("SELECT * FROM tbl_buku")or die(mysql_error());
		//$nomor = 1;
		while($data = mysql_fetch_array($query_mysql)){
		?>
		<tr>
			<!-- <td><?php echo $nomor++; ?></td> -->
			<td><?php echo $data['ID_BUKU']; ?></td>
			<td><?php echo $data['JUDUL']; ?></td>
			<td><?php echo $data['ISBN']; ?></td>
			<td><?php echo $data['PENGARANG']; ?></td>
			<td>
				<a class="edit" href="edit_buku.php?id_buku=<?php echo $data['ID_BUKU']; ?>">Edit</a>	
			</td>
			<td>
				<a class="hapus" href="delete_buku.php?id_buku=<?php echo $data['ID_BUKU']; ?>">Hapus</a>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="4"></td>
			<td colspan="2" align="center">
				<a class="add" href="add_buku.php">ADD NEW</a>
			</td>
		</tr>
	</table>
</div>
<br>
<br>
<?php
include 'footer.php';
?>
</body>
</html>