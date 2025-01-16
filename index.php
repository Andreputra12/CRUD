<?php
    include 'koneksi.php';
    session_start();

    $query = "SELECT * FROM tb_pasien;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- BOOTSTRAP -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- FONT -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" />

    <!-- Data Tables -->
     <link rel="stylesheet" type="text/css" href="datatables/datatables.css" />
     <script type="text/javascript" src="datatables/datatables.js"></script>

    <title>RS Cemara</title>
  </head>

  <script type="text/javascript">
      $(document).ready(function() {
        $('#dt').DataTable();
      });
  </script>

  <body>
    <!-- NAVBAR START -->
    <nav id="navbar" class="navbar ">
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

    <style>
      #navbar {
        background-color: #4DA1A9;
      }
    </style>
    <!-- NAVBAR END -->

    <!-- HEADER START -->
    <div id="main" class="container-fluid">
      <h1 class="pt-2">Rumah Sakit Cemara</h1>
      <figure>
        <blockquote class="blockquote">
          <p>Data Antrian Kunjungan Pasien</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          Mari Hidup Sehat <cite title="Source Title">Demi Masa Depan.</cite>
        </figcaption>
      </figure>
      <a href="kelola.php" type="button" class="btn btn-primary">
        <i class="fa fa-plus-circle me-2"></i>Tambah Data
      </a>

      <?php
          if (isset($_SESSION['eksekusi'])):
      ?>

      <!-- ALERT -->
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
          <?php
              echo $_SESSION['eksekusi'];
          ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <?php
          session_destroy();
          endif;
      ?>

      <!-- Table -->
      <div class="table-responsive mt-4">
        <table
          id="dt" class="table align-middle table-bordered text-center table-hover"
        >
          <thead>
            <tr>
              <th>Antrian</th>
              <th>Nama Pasien</th>
              <th>Usia</th>
              <th>Jenis Kelamin</th>
              <th>Keluhan</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($result = mysqli_fetch_assoc($sql)){
            ?>
            <tr>
              <td>
                <?php echo ++$no; ?>.
              </td>
              <td><?php echo $result['nama_pasien']; ?></td>
              <td><?php echo $result['usia']; ?></td>
              <td><?php echo $result['jenis_kelamin']; ?></td>
              <td><?php echo $result['keluhan']; ?></td>
              <td><?php echo $result['alamat']; ?></td>
              <td>
                <a
                  href="kelola.php?ubah=<?php echo $result['antrian']; ?>"
                  type="button"
                  class="btn btn-success btn-sm"
                >
                  <i class="fa fa-pencil"></i>
                </a>
                <a href="proses.php?hapus=<?php echo $result['antrian']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <style>
      #main {
        background-color: #add8e6;
      }
    </style>
    <!-- HEADER END -->

    <footer class="text-center text-lg-start" style="background-color: #4DA1A9;">
      <div class="d-flex align-items-center justify-content-center p-4 gap-5">
        <!-- Logo -->
        <img
          src="assets/images.jpeg"
          alt="Logo"
          width="250"
          height="250"
          class="rounded-circle"
        />
        <!-- Text Section -->
        <div>
          <h1 class="text-center pt-3 mb-4">Rumah Sakit Cemara</h1>
          <figcaption class="blockquote-footer text-center">
            Mari Hidup Sehat <cite title="Source Title">Demi Masa Depan.</cite>
          </figcaption>
          <div class="text-center mt-2">© 2025</div>
        </div>
      </div>
    </footer>
  </body>
</html>
