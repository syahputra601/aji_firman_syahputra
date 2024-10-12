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
				<h2>DATA SISWA</h2>
			</td>
		</tr>
		<tr>
			<th>NIS</th>
			<th>NAMA</th>
			<th>TGL LAHIR</th>
			<th>KELAMIN</th>
			<th>EDIT</th>	
			<th>DELETE</th>		
		</tr>
		<?php 
		include "koneksi.php";
		include "function.php";
		$query_mysql = mysql_query("SELECT * FROM tbl_siswa")or die(mysql_error());
		//$nomor = 1;
		while($data = mysql_fetch_array($query_mysql)){
			if($data['KELAMIN'] == 'L'){
				$Gender = "Laki-Laki";
			}elseif($data['KELAMIN'] == 'P'){
				$Gender = "Perempuan";
			}else{
				$Gender = "Undifined";
			}
			$rplc_tgl_lahir = str_replace("/", "-", $data['TGL_LAHIR']);
			$get_tgl = substr($data['TGL_LAHIR'], 0,2);
			$get_month = substr($data['TGL_LAHIR'], 3,2);
			$get_year = substr($data['TGL_LAHIR'], 6,4);
			$name_month = get_name_month($get_month);
			$join_fix_tgl_lahir = $get_tgl.'-'.$name_month.'-'.$get_year;
		?>
		<tr>
			<!-- <td><?php echo $nomor++; ?></td> -->
			<td><?php echo $data['NIS']; ?></td>
			<td><?php echo $data['NAMA']; ?></td>
			<td><?php echo $join_fix_tgl_lahir; ?></td>
			<td><?php echo $Gender; ?></td>
			<td>
				<a class="edit" href="edit_siswa.php?nis=<?php echo $data['NIS']; ?>">Edit</a>	
			</td>
			<td>
				<a class="hapus" href="delete_siswa.php?nis=<?php echo $data['NIS']; ?>">Hapus</a>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="4"></td>
			<td colspan="2" align="center">
				<a class="add" href="add_siswa.php">ADD NEW</a>
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