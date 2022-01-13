<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div style="margin: 0 auto; width: 80%;">
		<h2 align= "center">Data Mahasiswa</h2>
		<table border="1" cellspacing="0" width="100%">
			<tr style="text-align: center; font-weight: bold; background-color: #eee; font-family: sans_serif;">
				<td>No</td>
				<td>Nim</td>
				<td>Nama</td>
				<td>Semester</td>
				<td>Jurusan</td>
				<td>Jumlah Bayar</td>
				<td>Aksi</td>
			</tr>

			<?php
			include'koneksi.php';
			$no = 1;
			$tampil = mysqli_query($connection, "SELECT * FORM t_pembayaran");
			if (mysqli_num_rows($tampil)>0) {
				while ( $hasil = mysqli_fetch_array($tampil)) {
					?>

					<tr style="text-align: center; font-family: sans-serif;">
						<td><?php echo $no++ ?></td>
						<td><?php echo $hasil['nim'] ?></td>
						<td><?php echo $hasil['nama'] ?></td>
						<td><?php echo $hasil['semester'] ?></td>
						<td><?php echo $hasil['jurusan'] ?></td>
						<td><?php echo $hasil['jumlah_bayar'] ?></td>
						<td style="font-weight: bold; color: #000000">
						</td>
					</tr>
					<?php }}else{ ?>
						<tr>
							<td colspan="7" align="center"> Data Kosong </td>
						</tr>
						<?php
					}
					?>
		</table>
		<script>
			window.print();
		</script>
	</div>

</body>
</html>