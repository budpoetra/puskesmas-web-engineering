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
                <li><a href="index1.php"><i class="icon-home"></i><span>Dashboard</span></a></li>
                <li><a href="laporan_rekam_medis.php"><i class="icon-docs"></i>Laporan Rekam Medis</a></li>
                <li><a href="index.php"><i class="icon-user"></i>Registrasi Online</a></li>
                <li class="active"><a href="message.php"><i class="icon-paper-plane"></i>Message</a></li>
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
              <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>Message</h2>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index1.php"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active">Message</li>
              </ul>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-lg-12 mt-3">
              <div class="card shadow">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <div class="row clearfix" style="height: 32rem;">
                      <div class="col-sm-3">
                        <?php
                        include '../../../config/koneksi.php';
                        $query = $koneksi->query("SELECT * FROM data_pengguna WHERE jabatan='resepsionis'");
                        while ($data = $query->fetch_object()) {
                        ?>
                          <a href="javascript:void(0)" data-id="<?= $data->id_pengguna ?>" data-user="<?= $id_pasien ?>" id="btnMessageUser" style="color: black;">
                            <div class="col-sm-12">
                              <img src="../../assets/images/resepsionis.png" class="rounded-circle user-photo" alt="User Profile Picture" width="50">
                              <span class="ml-3"><b><?= $data->nama ?></b></span>
                            </div>
                          </a>
                          <hr>
                        <?php
                        }
                        ?>
                      </div>
                      <input type="hidden" name="id_pasien_message" id="id_pasien_message">
                      <input type="hidden" name="id_pengguna_message" id="id_pengguna_message">
                      <div id="chat_box" class="col-sm-9 p-4" style="overflow-y: auto; background-color: #f4f7f6; height: 28rem;">
                      </div>
                      <div class="col-sm-3">
                      </div>
                      <div class="col-sm-9">
                        <div class="row clearfix">
                          <div class="col-sm-11 mt-2">
                            <div id="formMessage" class="form-group">
                              <input type="text" class="form-control" id="message" aria-describedby="emailHelp" placeholder="Send a Message...">
                            </div>
                          </div>
                          <div class="col-sm-1 mt-2">
                            <button id="btnSendMessage" class="btn btn-light">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill mt-1" viewBox="0 0 16 16">
                                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                              </svg>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
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

  <script src="../../assets/js/script.js"></script>
  <script>
    setInterval(() => {
      let id_pasien = $('#id_pasien_message').val();
      let id_pengguna = $('#id_pengguna_message').val();
      if (id_pasien != '' && id_pengguna != '') {
        $('#chat_box').load('chat_box.php?pengirim=' + id_pasien + '&penerima=' + id_pengguna);
      }
    }, 1000);
  </script>
</body>

</html>