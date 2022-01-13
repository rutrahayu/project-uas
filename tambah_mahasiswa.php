<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .mx-auto { width     : 800px }
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
              <label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="fakultas" class="col-sm-2 col-form-label">FAKULTAS</label>
              <div class="col-sm-10">
                  <select class="form-control" name="fakultas"id="fakultas">
                    <option value=""> -Pilih Fakultas- </option>
                    <option value="saintek" <?php if($fakultas == "saintek") echo "selected" ?>>SAINTEK</option>
                    <option value="soshum"<?php if($fakultas == "soshum") echo "selected" ?>>SOSHUM</option>
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
          Data Mahasiswa
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
              <tbody>
                <?php
                $sql2 = "select * from mahasiswa order by id desc";
                $q2   = mysqli_query($koneksi,$sql2);
                $urut = 1;
                while($r2 = mysqli_fetch_array($q2)){
                  $id = $r2['id'];
                  $nim = $r2['nim'];
                  $nama = $r2['nama'];
                  $alamat = $r2['alamat'];
                  $fakultas = $r2['fakultas'];

                  ?>
                  <tr>
                    <th scope="row"><?php echo $urut++ ?></th>
                    <td scope="row"><?php echo $nim++ ?></td>
                    <td scope="row"><?php echo $nama++ ?></td>
                    <td scope="row"><?php echo $alamat++ ?></td>
                    <td scope="row"><?php echo $fakultas++ ?></td>
                    <td scope="row">
                      <a href="index.php?op=edit&id=<?php echo $id ?>">
                      <button type="button" class="btn btn-warning">Edit</button></a>
                      <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                      <button type="button" class="btn btn-danger">Delete</button></a>
                    
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