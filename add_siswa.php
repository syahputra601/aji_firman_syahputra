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
	<h3>Input Data Baru Siswa</h3>
	<form action="action_input_siswa.php" method="post">	
		<table>
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td><input type="text" name="nis" required=""></td>					
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" required=""></td>					
			</tr>	
			<tr>
				<td>Tgl Lahir</td>
				<td>:</td>
				<td>
					<select name="tgl" required="">
						<?php
						for ($i = 1; $i <= 31; $i++) {
							if($i <= 9){
								$i = "0".$i;
							}
						?>
						<option value="<?php echo $i; ?>"><?= $i; ?></option>
						<?php
						}
						?>
					</select>
					<select name="mnth" required="">
						<?php
						$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
						$jlh_bln=count($bulan);
						for($c=1; $c<$jlh_bln; $c+=1){
							if($c <= 9){
								$d = "0".$c;
							}else{
								$d = $c;
							}
						?>
						<option value="<?php echo $d; ?>"> <?php echo $bulan[$c]; ?> </option>
						<?php
						}
						?>
					</select>
					<select name="year" required="">
						<?php
						$now=date('Y');
						for ($a=1970;$a<=$now;$a++){
						?>
						<option value="<?php echo $a; ?>"> <?= $a; ?> </option>
						<?php
						}
						?>
					</select>
				</td>					
			</tr>	
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<select name="jenis_kelamin" required>
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</td>					
			</tr>	
			<tr>
				<td>
					<a href="siswa.php" style="text-decoration:none; color: inherit;" title="Tampilan List Siswa">
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