<?php
if (isset($_GET['id_pasien'])) {
  $id_pasien = $_GET['id_pasien'];
} else {
  header("location:../../../index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Pendaftaran Lanjutan</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
  <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

  <link rel="icon" href="../../../assets/Logo.png" type="image/x-icon">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../assets/font-awesome/css/font-awesome.css">

  <link rel="stylesheet" href="../../assets/vendor/chartist/css/chartist.min.css">
  <link rel="stylesheet" href="../../assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
  <link rel="stylesheet" href="../../assets/vendor/toastr/toastr.min.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="../../assets/css/main.css">
  <link rel="stylesheet" href="../../assets/css/color_skins.css">
</head>

<body class="theme-cyan">

  <!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="m-t-30"><img src="https://thememakker.com/templates//lucid/hospital/assets/images/logo-icon.svg" width="48" height="48" alt="Lucid"></div>
      <p>Please wait...</p>
    </div>
  </div>
  <!-- Overlay For Sidebars -->

  <div id="wrapper">

    <nav class="navbar navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>

        <div class="navbar-brand">
          <a href="index.php">Puskesmas</a>
        </div>

        <div class="navbar-right">
          <div id="navbar-menu">
            <ul class="nav navbar-nav">
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <div id="main-content">
    <div class="container-fluid">
      <div class="block-header">
      </div>
      <div class="row clearfix">
        <div class="col-lg-9">
          <div class="card shadow">
            <div class="card-header">
              <b>Pendaftaran Lanjutan</b>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row clearfix">
                  <?php
                  include '../../../config/koneksi.php';
                  $query = $koneksi->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
                  $data = mysqli_fetch_assoc($query);
                  ?>
                  <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $id_pasien ?>">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="no_identitas">No Identitas</label>
                      <input type="text" id="no_identitas" name="no_identitas" class="form-control" value="<?= $data['no_identitas'] ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap</label>
                      <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="nama_ortu">Nama Orang Tua</label>
                      <input type="text" id="nama_ortu" name="nama_ortu" class="form-control" placeholder="Masukkan Nama Orang Tua" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="tempat_lahir">Tempat Lahir</label>
                      <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="gender">Jenis Kelamin</label>
                      <select id="gender" name="gender" class="form-control show-tick" required>
                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="alamat">Alamat Lengkap</label>
                      <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap" required></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="agama">Agama</label>
                      <select id="agama" name="agama" class="form-control show-tick" required>
                        <option value="" selected disabled>Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="bpjs">BPJS</label>
                      <input type="text" id="bpjs" name="bpjs" class="form-control" placeholder="Kosongkan jika tidak memiliki BPJS">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="goldar">Golongan Darah</label>
                      <select id="goldar" name="goldar" class="form-control show-tick" required>
                        <option value="" selected disabled>Pilih Golongan Darah</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <button type="button" id="btnSubmitPendaftaranLanjutan" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascript -->
  <script src="../../assets/bundles/libscripts.bundle.js"></script>
  <script src="../../assets/bundles/vendorscripts.bundle.js"></script>

  <script src="../../assets/bundles/chartist.bundle.js"></script>
  <script src="../../assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
  <script src="../../assets/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js -->
  <script src="../../assets/vendor/toastr/toastr.js"></script>
  <script src="../../assets/vendor/flot-charts/jquery.flot.selection.js"></script>

  <script src="../../assets/bundles/mainscripts.bundle.js"></script>
  <script src="../../assets/js/index.js"></script>

  <script src="../../assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
  <script src="../../assets/js/script.js"></script>
</body>

</html>