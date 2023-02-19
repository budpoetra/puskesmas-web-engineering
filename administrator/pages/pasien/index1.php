<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
  header("location:../../../login.php");
} else {
  $nama = $_SESSION['nama'];
  $id_pasien = $_SESSION['id_pasien'];
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Puskesmas Medan Sunggal</title>
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

  <style>
    .poli {
      text-align: center;
      font-size: large;
    }
  </style>
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
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown" title="Pengaturan"><i class="icon-equalizer"></i></a>
                <ul class="dropdown-menu user-menu menu-icon">
                  <li class="menu-heading">Pengaturan</li>
                  <li><a href="reset_password.php"><i class="icon-note"></i> <span>Ganti Password</span></a></li>
                </ul>
              </li>
              <li>
                <a href="../../../config/logout.php" title="Logout" class="icon-menu"><i class="icon-login"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div id="left-sidebar" class="sidebar">
      <div class="sidebar-scroll">
        <div class="user-account">
          <img src="../../assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
          <div class="dropdown">
            <span>Selamat Datang,</span>
            <p>Halo <b><?php echo $nama; ?></b></p>
          </div>
          <hr>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
          <div class="tab-pane active" id="menu">
            <nav class="sidebar-nav">
              <ul class="main-menu metismenu">
                <li class="active"><a href="index1.php"><i class="icon-home"></i><span>Dashboard</span></a></li>
                <li><a href="laporan_rekam_medis.php"><i class="icon-docs"></i>Laporan Rekam Medis</a></li>
                <li><a href="index.php"><i class="icon-users"></i>Registrasi Online</a></li>
                <li><a href="message.php"><i class="icon-paper-plane"></i>Message</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div id="main-content">
      <div class="container-fluid">
        <div class="block-header">
          <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
              <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>Dashboard</h2>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index1.php"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ul>
            </div>
          </div>
          <div class="row clearfix">
            <input type="hidden" id="id_pasien" value="<?= $id_pasien ?>">
            <div class="col-lg-4">
              <div class="card shadow">
                <div class="card-header">
                  <b>POLI UMUM</b>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <p>Banyak Pasien</p>
                    <p id="sisa-antrian-umum" class="font-weight-bold poli"></p>
                  </li>
                  <li class="list-group-item">
                    <p>Antrian Sekarang</p>
                    <p id="antrian-sekarang-umum" class="font-weight-bold poli"></p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card shadow">
                <div class="card-header">
                  <b>POLI LANSIA</b>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <p>Jumlah Pasien</p>
                    <p id="sisa-antrian-lansia" class="font-weight-bold poli"></p>
                  </li>
                  <li class="list-group-item">
                    <p>Antrian Sekarang</p>
                    <p id="antrian-sekarang-lansia" class="font-weight-bold poli"></p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card shadow">
                <div class="card-header">
                  <b>POLI KIA</b>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <p>Jumlah Pasien</p>
                    <p id="sisa-antrian-kia" class="font-weight-bold poli"></p>
                  </li>
                  <li class="list-group-item">
                    <p>Antrian Sekarang</p>
                    <p id="antrian-sekarang-kia" class="font-weight-bold poli"></p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div id="antrianAnda" class="col-lg-4">
              <div class="card shadow">
                <div class="card-header">
                  <b>ANTRIAN ANDA</b>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <p>Nomor</p>
                    <p id="antrianAndaNomor" class="font-weight-bold poli">
                    </p>
                  </li>
                  <li class="list-group-item">
                    <p>Poli</p>
                    <p id="antrianAndaPoli" class="font-weight-bold poli">
                    </p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4">
            </div>
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

  <script type="text/javascript">
    $(document).ready(function() {
      let id_pasien = $('#id_pasien').val();

      // tampilkan informasi antrian
      $('#antrian-sekarang-umum').load('../panggilan-antrian/get_antrian_sekarang.php?poli=Umum');
      $('#sisa-antrian-umum').load('../panggilan-antrian/get_sisa_antrian.php?poli=Umum');

      $('#antrian-sekarang-lansia').load('../panggilan-antrian/get_antrian_sekarang.php?poli=Lansia');
      $('#sisa-antrian-lansia').load('../panggilan-antrian/get_sisa_antrian.php?poli=Lansia');

      $('#antrian-sekarang-kia').load('../panggilan-antrian/get_antrian_sekarang.php?poli=KIA');
      $('#sisa-antrian-kia').load('../panggilan-antrian/get_sisa_antrian.php?poli=KIA');

      $('#antrianAndaNomor').load('antrian_anda_nomor.php?id_pasien=' + id_pasien);
      $('#antrianAndaPoli').load('antrian_anda_poli.php?id_pasien=' + id_pasien);

      setInterval(() => {
        $('#antrian-sekarang-umum').load('../panggilan-antrian/get_antrian_sekarang.php?poli=Umum');
        $('#sisa-antrian-umum').load('../panggilan-antrian/get_sisa_antrian.php?poli=Umum');

        $('#antrian-sekarang-lansia').load('../panggilan-antrian/get_antrian_sekarang.php?poli=Lansia');
        $('#sisa-antrian-lansia').load('../panggilan-antrian/get_sisa_antrian.php?poli=Lansia');

        $('#antrian-sekarang-kia').load('../panggilan-antrian/get_antrian_sekarang.php?poli=KIA');
        $('#sisa-antrian-kia').load('../panggilan-antrian/get_sisa_antrian.php?poli=KIA');

        $('#antrianAndaNomor').load('antrian_anda_nomor.php?id_pasien=' + id_pasien);
        $('#antrianAndaPoli').load('antrian_anda_poli.php?id_pasien=' + id_pasien);
      }, 1000);
    });
  </script>
</body>

</html>