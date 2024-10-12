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
<div align="center">
	<h3>Input Data Baru Buku</h3>
	<form action="action_input_buku.php" method="post">	
		<table>
			<tr>
				<td>ID Buku</td>
				<td>:</td>
				<td><input type="text" name="id_buku"></td>					
			</tr>
			<tr>
				<td>Judul</td>
				<td>:</td>
				<td><input type="text" name="judul"></td>					
			</tr>	
			<tr>
				<td>ISBN</td>
				<td>:</td>
				<td><input type="text" name="isbn"></td>						
			</tr>	
			<tr>
				<td>Pengarang</td>
				<td>:</td>
				<td><input type="text" name="pengarang"></td>					
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
</div>
</body>
</html>