<!DOCTYPE html>

<?php
    include 'koneksi.php';
    session_start();

      $antrian = '';
      $namaPasien = '';
      $usiaPasien = '';
      $jenis_kelamin = '';
      $keluhanPasien = '';
      $alamatPasien = '';

    if(isset($_GET['ubah'])){
      $antrian = $_GET['ubah'];
      
      $query = "SELECT * FROM tb_pasien WHERE antrian = '$antrian';";
      $sql = mysqli_query($conn, $query);

      $result = mysqli_fetch_assoc($sql);

      $namaPasien = $result['nama_pasien'];
      $usiaPasien = $result['usia'];
      $jenis_kelamin = $result['jenis_kelamin'];
      $keluhanPasien = $result['keluhan'];
      $alamatPasien = $result['alamat'];

      // var_dump($result);

      // die();
    }
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- BOOTSTRAP -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- FONT -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" />

    <title>RS Cemara</title>
  </head>
  <body>
    <!-- NAVBAR START -->
    <nav class="navbar bg-body-tertiary mb-5">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <img
            src="assets/images.jpeg"
            alt="Logo"
            width="50"
            height="50"
            class="d-inline-block align-text-top me-2"
          />
          <span class="fw-bold fs-4">RS Cemara</span>
        </a>
      </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- FORM START -->
    <div class="container">
        <form method="POST" action="proses.php">
          <input type="hidden" value="<?php echo $antrian; ?>" name="antrian">
          <div class="mb-3 row">
            <label for="namaPasien" class="col-sm-2 col-form-label"
              >Nama Pasien</label
            >
            <div class="col-sm-10">
              <input
                type="text"
                name="namaPasien"
                class="form-control"
                id="namaPasien"
                placeholder="Masukkan Nama Pasien"
                value="<?php echo $namaPasien; ?>"
                required
              />
            </div>
          </div>

          <div class="mb-3 row">
            <label for="usiaPasien" class="col-sm-2 col-form-label"
              >Usia Pasien</label
            >
            <div class="col-sm-10">
              <input
                type="text"
                name="usia"
                class="form-control"
                id="usiaPasien"
                placeholder="Masukkan Usia Pasien"
                value="<?php echo $usiaPasien; ?>"
                required
              />
            </div>
          </div>

          <div class="mb-3 row">
            <label for="jenisKelamin" class="col-sm-2 col-form-label"
              >Jenis Kelamin</label
            >
            <div class="col-sm-10">
              <select class="form-select" id="jenisKelamin" name="jenis_kelamin" required>
                <option selected>Pilih Jenis Kelamin</option>
                <option <?php if($jenis_kelamin == 'Laki-laki'){echo "selected";}?> value="Laki-laki">Laki-laki</option>
                <option <?php if($jenis_kelamin == 'Perempuan'){echo "selected";}?> value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="keluhanPasien" class="col-sm-2 col-form-label"
              >Keluhan</label
            >
            <div class="col-sm-10">
              <input
                type="text"
                name="keluhan"
                class="form-control"
                id="keluhanPasien"
                placeholder="Keluhan Pasien"
                value="<?php echo $keluhanPasien; ?>"
                required
              />
            </div>
          </div>

          <div class="mb-3 row">
            <label for="alamatPasien" class="col-sm-2 col-form-label"
              >Alamat Lengkap</label
            >
            <div class="col-sm-10">
              <textarea class="form-control" id="alamatPasien" name="alamat" rows="3" required><?php echo $alamatPasien; ?></textarea>
            </div>
          </div>

          <div class="mb-3 row mt-5">
            <div class="col text-center">
              <?php
                  if(isset($_GET['ubah'])){
              ?>
              <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                <i class="fa fa-floppy-o"></i> Simpan
              </button>
              <?php
                  } else {
              ?>
              <button type="submit" name="aksi" value="add" class="btn btn-primary">
                <i class="fa fa-floppy-o"></i> Tambahkan
              </button>
              <?php
                  } 
              ?>
              <a href="index.php" type="button" class="btn btn-danger"
                ><i class="fa fa-reply-all"></i> Batal</a
              >
            </div>
          </div>
        </form>
    </div>
    <!-- FORM END -->
  </body>
</html>
