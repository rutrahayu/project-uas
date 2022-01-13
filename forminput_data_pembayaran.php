<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<center>
	<h2 style="padding: 1px 20px;">Tambah Data Pembayaran</h2>
	<form action="" method="POST">
		<table style="padding: 1px 20px">
			<tr>
				<td>Nim</td>
				<td>:</td>
				<td><input type="text" name="nim" placeholder="nim" required=""></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" placeholder="nama" required=""></td>
			</tr>
			<tr>
				<td>Semester</td>
				<td>:</td>
				<td><select name="semester">
					<option value="">--Pilih--</option>
					<option value="1">Semester 1</option>
					<option value="2">Semester 2</option>
					<option value="3">Semester 3</option>
					<option value="4">Semester 4</option>
					<option value="5">Semester 5</option>
					<option value="6">Semester 6</option>
				</select></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td><select name="jurusan">
					<option value="">--Pilih--</option>
					<option value="Teknik Informatika">Teknik Informatika</option>
					<option value="Sistem Informasi">Sistem Informasi</option>
				</select></td>
			</tr>
			<tr>
				<td>Jumlah pembayaran</td>
				<td>:</td>
				<td><select name="jumlah_bayar">
					<option value="">--Pilih--</option>
					<option value="Rp. 1.500.000">Rp. 1.500.000</option>
					<option value="Rp. 1.700.000">Rp. 1.700.000</option>
					<option value="Rp. 2.000.000">Rp. 2.000.000</option>
					<option value="Rp. 2.100.000">Rp. 2.100.000</option>
					<option value="Rp. 2.500.000">Rp. 2.500.000</option>
					<option value="Rp. 3.000.000">Rp. 3.000.000</option>
				</select></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="simpan" value="Tambah Data Mahasiswa" class="btn btn-primary"></td>
			</tr>
			
		</table>
	</form>
	<?php
	include'koneksi.php';
	if (isset($_POST["simpan"])) {
		$nim = $_POST["nim"];
		$nama = $_POST["nama"];
		$semester = $_POST["semester"];
		$jurusan = $_POST["jurusan"];
		$jumlah_bayar = $_POST["jumlah_bayar"];
		  $input = "INSERT INTO t_pembayaran values ('$nim', '$nama', '$semester', '$jurusan', '$jumlah_bayar')";
		  mysqli_query($connection, $input);
		  header('location:tampil_data_pembayaran.php');
	}
	?>
</center>
</body>
</html>