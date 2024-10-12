<!DOCTYPE html>
<html>
<head>
	<title>Created by Aji Firman Syahputra</title>
</head>
<body>
<?php
include 'header.php';
include 'koneksi.php';
?>
<br/>
<br/>
<div align="center">
	<h3>Input Data Baru Peminjaman Buku</h3>
	<form action="action_input_peminjaman_buku.php" method="post">	
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><input type="text" name="id_peminjaman_buku"></td>					
			</tr>
			<tr>
				<td>Tgl Pinjam</td>
				<td>:</td>
				<td>
					<select name="tgl_pinjam" id="tgl_pinjam" required="" onchange="get_batas_pinjam()">
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
					<select name="mnth_pinjam" id="mnth_pinjam" required="" onchange="get_batas_pinjam()">
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
					<select name="year_pinjam" id="year_pinjam" required="" onchange="get_batas_pinjam()">
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
				<td>Tgl Batas Pinjam</td>
				<td>:</td>
				<td>
					<!-- <a href="javascript:test()">Click Here</a>  -->
					<input type="text" name="tgl_batas_pinjam" id="tgl_batas_pinjam" readonly="">
				</td>						
			</tr>
			<tr>
				<td>Tgl Kembali</td>
				<td>:</td>
				<td>
					<select name="tgl_kembali" id="tgl_kembali" required="" >
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
					<select name="mnth_kembali" id="mnth_kembali" required="" >
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
					<select name="year_kembali" id="year_kembali" required="" >
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
				<td>Status</td>
				<td>:</td>
				<td>
					<select name="status" id="status" required="">
						<option value="0">Terpinjam</option>
						<option value="1">Kembali</option>
					</select>
					<label>0 = Terpinjam, 1 = Kembali</label>
				</td>						
			</tr>
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td>
					<select name="nis" id="nis" required="">
					<?php 
					$sql=mysql_query("SELECT * FROM tbl_siswa");
					while ($data=mysql_fetch_array($sql)) {
					?>
					<option value="<?=$data['NIS']?>"><?=$data['NIS'].' - '.$data['NAMA']?></option> 
					<?php
					}
					?>
					</select>
				</td>						
			</tr>	
			<tr>
				<td>ID BUKU</td>
				<td>:</td>
				<td>
					<select name="id_buku" id="id_buku" required="">
					<?php 
					$sql=mysql_query("SELECT * FROM tbl_buku");
					while ($data=mysql_fetch_array($sql)) {
					?>
					<option value="<?=$data['ID_BUKU']?>"><?=$data['ID_BUKU'].' - '.$data['JUDUL']?></option> 
					<?php
					}
					?>
					</select>
				</td>						
			</tr>	
			<tr>
				<td>
					<a href="peminjaman_buku.php" style="text-decoration:none; color: inherit;" title="Tampilan List Siswa">
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

<script type="text/javascript">
	function myAjax() {
		// alert('Test');
		var pinjam_tgl = document.getElementsByTagName('tgl_pinjam');
		var pinjam_month = document.getElementsByTagName('mnth_pinjam');
		var pinjam_year = document.getElementsByTagName('year_pinjam');
		var join_tgl_pinjam = pinjam_tgl + '-' + pinjam_month + '-' + pinjam_year;
	    $.ajax({
	           type: "POST",//http://localhost/aji_firman_syahputra/add_peminjaman_buku.php
	           url: 'http://localhost/aji_firman_syahputra/function_ajax_peminjman.php',
	           data:{action:join_tgl_pinjam},
	           success:function(date_fix) {
	             alert(date_fix);
	           }

	    });
 	}

	function get_batas_pinjam(){
		// var Date_test = "2010-09-17";
		// <?php
		// $date_x = date('Y-m-d', strtotime('2010-09-17'. ' + 2 days'));
		// echo $date_x;
		// ?>

		// var date = new Date('2010-09-17');
		// // add a day
		// date.setDate(date.getDate() + 2);
		// var x = date.toLocaleDateString();
		// document.getElementById('tgl_batas_pinjam').value = x;
		
		// var today = new Date('12/31/2015');
		// var tomorrow = new Date(today);
		// tomorrow.setDate(today.getDate()+1);
		// var x = tomorrow.toLocaleDateString();
		// document.getElementById('tgl_batas_pinjam').value = x;

		// var days = 2;
		// var newDate = new Date(Date.now()+days*24*60*60*1000);

		// document.write('Today: <em>');
		// document.write(new Date());
		// document.write('</em><br/> New: <strong>');
		// document.write(newDate);

		var pinjam_tgl = document.getElementById('tgl_pinjam').value;
		var pinjam_month = document.getElementById('mnth_pinjam').value;
		var pinjam_year = document.getElementById('year_pinjam').value;
		var join_tgl_pinjam = pinjam_year + '-' + pinjam_month + '-' + pinjam_tgl;
		// var dateStr = '2021-02-12';
		var dateStr = join_tgl_pinjam;
		var days = 7;

		var result = new Date(new Date(dateStr).setDate(new Date(dateStr).getDate() + days));

		// document.write('Date: ', result); // Wed Jan 02 2019 09:00:00 GMT+0900 (Japan Standard Time)
		// document.write('<br />');
		// document.write('Trimmed Date: ', result.toISOString().substr(0, 10)); // 2019-01-02
		document.getElementById('tgl_batas_pinjam').value = result.toISOString().substr(0, 10);
	}
</script>

</html>