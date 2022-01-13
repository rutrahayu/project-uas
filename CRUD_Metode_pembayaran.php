<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "akademik";

$koneksi  = mysqli_connect($host, $user,$pass,$db);
if(!$koneksi){ //cek koneksi
  die("Tidak bisa terkoneksi ke database");
}
$nim    ="";
$nama     ="";
$jurusan   ="";
$metode_bayar ="";
$sukses   ="";
$error    ="";

if(isset($_GET['op'])){
  $op = $_GET['op'];
}else{
  $op = "";
}

if($op == 'delete'){
  $id    =$_GET['id'];
  $sql1  = "delete from metode_bayar where id='$id'";
  $q1    = mysqli_query($koneksi,$sql1);
  if($q1){
    $sukses = "Berhasil hapus data";
  }else{
    $error = "Gagal menghapus data";
  }
}

if($op == 'edit'){
  $id       = $_GET['id'];
  $sql1   = "select * from metode_bayar where id = '$id'";
  $q1       = mysqli_query($koneksi,$sql1);
  $r1       = mysqli_fetch_array($q1);
  $nim      = $r1['nim'];
  $nama     = $r1['nama'];
  $alamat   = $r1['jurusan'];
  $fakultas   = $r1['metode_bayar'];

  if($nim == ''){
    $error = "Data tidak ditemukan";
  }
  
}


if(isset($_POST['simpan'])){//untuk create
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $alamat= $_POST['jurusan'];
  $fakultas = $_POST['metode_bayar'];

  if($nim && $nama && $alamat && $fakultas){
    if($op == 'edit') { //untuk update
      $sql1  = "update metode_bayar set nim='$nim',nama='$nama',jurusan='$jurusan',metode_bayar='$metode_bayar' where id ='id'";
      $q1    = mysqli_query($koneksi,$sql1);
      if($q1){
        $sukses = "Data berhasil diupdate";
      }else {
          $error  = "Data gagal diupdate";
      }
    

  }else{ //untuk insert
    $sql1 = "insert into metode_bayar(nim, nama, jurusan, metode_bayar) values ('$nim','$nama','$jurusan','$metode_bayar')";
        $q1   = mysqli_query($koneksi, $sql1);
        if($q1){
          $sukses  = "Berhasil memasukkan data baru";
        }else{
          $error   = "Gagal memasukkan data";
        } 
    }

  }else{
    $error = "Silahkan masukkan semua data";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Metode Bayar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		.mx-auto { width 	   : 800px }
		.card    { margin-top  : 10px }
	</style>
</head>
<body>
	<div class="mx-auto">
		<!-- untuk menambah data -->
		<div class="card">
  			<div class="card-header">
    			Create/Edit Data
  			</div>
  			<div class="card-body">
  				<?php
  				if($error){
  					?>
  					<div class="alert alert-danger" role="alert">
  						<?php echo $error ?>
					</div>
					<?php
					
  				}
  				?>
  				<?php
  				if($sukses){
  					?>
  					<div class="alert alert-success" role="alert">
  						<?php echo $sukses ?>
					</div>
					<?php
					
  				}
  				?>
    			<form action="" method="POST">
    				<div class="mb-3 row">
    					<label for="nim" class="col-sm-2 col-form-label">NIM</label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
    					</div>
  					</div>
  					<div class="mb-3 row">
    					<label for="nama" class="col-sm-2 col-form-label">NAMA</label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
    					</div>
  					</div>
  					<div class="mb-3 row">
    					<label for="alamat" class="col-sm-2 col-form-label">JURUSAN</label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $jurusan?>">
    					</div>
  					</div>
  					<div class="mb-3 row">
    					<label for="metode_bayar" class="col-sm-2 col-form-label">FAKULTAS</label>
    					<div class="col-sm-10">
      						<select class="form-control" name="metode_bayar"id="metode_bayar">
      							<option value=""> -Pilih METODE- </option>
      							<option value="Langsung" <?php if($metode_bayar == "Langsung") echo "selected" ?>>LANGSUNG</option>
      							<option value="ATM"<?php if($metode_bayar == "ATM") echo "selected" ?>>ATM</option>
      						</select>
    					</div>
  					</div>
  					<div class="col-12">
  						<input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
  					</div>
    			</form>
 			 </div>
		</div>
		<!-- untuk mengeluarkan data -->
		<div class="card">
  			<div class="card-header text-white bg-secondary">
    			METODE BAYAR
  			</div>
  			<div class="card-body">
  				<table class="table">
  					<thead>
  						<tr>
  							<th scope="col">#</th>
  							<th scope="col">NIM</th>
  							<th scope="col">Nama</th>
  							<th scope="col">JURUSAN</th>
  							<th scope="col">METODE BAYAR</th>
  							<th scope="col">Aksi</th>
  						</tr>
  					</thead>
  						<tbody>
  							<?php
  							$sql2 = "select * from metode_bayar order by id desc";
  							$q2   = mysqli_query($koneksi,$sql2);
  							$urut = 1;
  							while($r2 = mysqli_fetch_array($q2)){
  								$id = $r2['id'];
  								$nim = $r2['nim'];
  								$nama = $r2['nama'];
  								$alamat = $r2['jurusan'];
  								$fakultas = $r2['metode_bayar'];

  								?>
  								<tr>
  									<th scope="row"><?php echo $urut++ ?></th>
  									<td scope="row"><?php echo $nim++ ?></td>
  									<td scope="row"><?php echo $nama++ ?></td>
  									<td scope="row"><?php echo $jurusan++ ?></td>
  									<td scope="row"><?php echo $metode_bayar++ ?></td>
  									<td scope="row">
  										<a href="index.php?op=edit&id=<?php echo $id ?>">
  										<button type="button" class="btn btn-warning">Edit</button></a>
  										<a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
  										<button type="button" class="btn btn-danger">Hapus</button></a>
										
  									</td>
  								</tr>
  								<?php
  							}
  							?>
  						</tbody>
  				</table>

 			</div>
		</div>
	</div>
</body>
</html>