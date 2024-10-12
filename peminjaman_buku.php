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
			<td colspan="9" style="text-align: center;">
				<h2>DATA PEMINJAMAN BUKU</h2>
			</td>
		</tr>
		<tr>
			<th>ID PEMINJAMAN</th>
			<th>PINJAM</th>
			<th>BATAS</th>
			<th>KEMBALI</th>
			<th>STATUS</th>
			<th>SISWA</th>
			<th>BUKU</th>
			<th>EDIT</th>	
			<th>DELETE</th>		
		</tr>
		<?php 
		include "koneksi.php";
		// include "function.php";
		$query_mysql = mysql_query("SELECT * FROM tbl_peminjaman_buku as a INNER JOIN tbl_siswa as b ON a.NIS=b.NIS INNER JOIN tbl_buku as c ON a.ID_BUKU=c.ID_BUKU")or die(mysql_error());
		//$nomor = 1;
		while($data = mysql_fetch_array($query_mysql)){
			if($data['STATUS'] == '0'){
				$Status = 'Terpinjam';
			}elseif($data['STATUS'] == '1'){
				$Status = 'Kembali';
			}else{
				$Status = 'Undifined';
			}
		?>
		<tr>
			<!-- <td><?php echo $nomor++; ?></td> -->
			<td><?php echo $data['ID_PEMINJAMAN_BUKU']; ?></td>
			<td><?php echo $data['PINJAM']; ?></td>
			<td><?php echo $data['BATAS']; ?></td>
			<td><?php echo $data['KEMBALI']; ?></td>
			<td><?php echo $Status; ?></td>
			<td><?php echo $data['NIS']; ?></td>
			<td><?php echo $data['ID_BUKU']; ?></td>
			<td>
				<a class="edit" href="edit_peminjaman_buku.php?id_peminjaman_buku=<?php echo $data['ID_PEMINJAMAN_BUKU']; ?>">Edit</a>
			</td>
			<td>
				<a class="hapus" href="delete_peminjaman_buku.php?id_peminjaman_buku=<?php echo $data['ID_PEMINJAMAN_BUKU']; ?>">Hapus</a>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="7"></td>
			<td colspan="2" align="center">
				<a class="add" href="add_peminjaman_buku.php">ADD NEW</a>
			</td>
		</tr>
	</table>
</div>
<br/>
<br/>
<?php
include 'footer.php';
?>
</body>
</html>