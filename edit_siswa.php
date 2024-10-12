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
$nis = $_GET['nis'];
$query_mysql = mysql_query("SELECT * FROM tbl_siswa WHERE NIS='$nis'")or die(mysql_error());
// $nomor = 1;
while($data = mysql_fetch_array($query_mysql)){
	$get_tgl = substr($data['TGL_LAHIR'], 0,2);
	$get_month = substr($data['TGL_LAHIR'], 3,2);
	$get_year = substr($data['TGL_LAHIR'], 6,4);
?>
<div align="Center">
	<h3>Edit Data Siswa</h3>
	<form action="action_update_siswa.php" method="post">		
		<table>
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td>
					<input type="text" name="nis" value="<?php echo $data['NIS'] ?>" readonly>
				</td>					
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<input type="text" name="nama" value="<?php echo $data['NAMA'] ?>">
				</td>					
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
						<option value="<?php echo $i; ?>" <?php if($i == $get_tgl){echo "selected";} ?> ><?= $i; ?></option>
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
						<option value="<?php echo $d; ?>" <?php if($d == $get_month){echo "selected";} ?> > <?php echo $bulan[$c]; ?> </option>
						<?php
						}
						?>
					</select>
					<select name="year" required="">
						<?php
						$now=date('Y');
						for ($a=1970;$a<=$now;$a++){
						?>
						<option value="<?php echo $a; ?>" <?php if($a == $get_year){echo "selected";} ?> > <?= $a; ?> </option>
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
						<?php
						if($data['KELAMIN'] == 'P'){
						?>
						<option value="L">Laki-Laki</option>
						<option value="P" selected="">Perempuan</option>
						<?php
						}else{
						?>
						<option value="L" selected="">Laki-Laki</option>
						<option value="P">Perempuan</option>
						<?php
						}
						?>
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
	<?php } ?>
</div>
</body>
</html>