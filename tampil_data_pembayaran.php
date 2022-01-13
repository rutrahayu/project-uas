
<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
	
	<div style="margin: 0 auto; width: 80%;">
		<h2 align="center">Data Mahasiswa</h2>
		<table border="1" cellspacing="0" width="100%">
			<tr style="text-align: center; font-weight: bold; background-color: #eee; font-family: sans-serif;">
				<br>
				<th>NO</th>
				<th>NIM</th>
				<th>NAMA</th>
				<th>Semester</th>
				<th>Jurusan</th>
				<th>Jumlah Bayar</th>
				<th>Aksi</th>
			</tr>

			<?php
			include 'koneksi.php';
			$no = 1;
			$tampil = mysqli_query($connection, "SELECT * FROM t_pembayaran");
			if (mysqli_num_rows($tampil)>0){
				while($hasil = mysqli_fetch_array($tampil)){
					?>

					<tr style="text-align: center; font-family: sans-serif;">
						<td><?php echo $no++ ?></td>
						<td><?php echo $hasil['nim'] ?></td>
						<td><?php echo $hasil['nama'] ?></td>
						<td><?php echo $hasil['semester'] ?></td>
						<td><?php echo $hasil['jurusan'] ?></td>
						<td><?php echo $hasil['jumlah_bayar'] ?></td>
						<td style="font-weight: bold; color: #000000">
							<a href="edit_pembayaran.php?nim=<?=$hasil['nim']?>" onclick="return confirm('Apakah anda yakin mengubah data ini?')" class="btn btn-success">Ubah</a> | <a href="hapus_data_pembayaran.php?id_mhs=<?=$hasil['nim']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
				<?php }}else{
					?>
					<tr>
						<td colspan="7" align="center">Data Kosong</td>
					</tr>
				<?php } ?>
</table>
<be>
	<br>
	<a href="forminput_data_pembayaran.php" onclick="return confirm('Apakah anda yakin menambah data ini?')" class="btn btn-success">Tambah</a> 

	<a href="cetak.php" target="_blank" onclick="return confirm('Apakah anda yakin mencetak data ini?')" class="btn btn-success">Cetak</a> 

	<a href="index.php" class="btn btn-success">Kembali </a>
	
	</div>
</body>
</html>