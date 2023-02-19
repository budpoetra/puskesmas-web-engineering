<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../login.php");
} else {
    $nama = $_SESSION['nama'];
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Dokter Puskesmas Medan Sunggal</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="../../assets/Logo.png" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="../../administrator/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.css">

    <link rel="stylesheet" href="../../administrator/assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../../administrator/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="../../administrator/assets/vendor/toastr/toastr.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../../administrator/assets/css/main.css">
    <link rel="stylesheet" href="../../administrator/assets/css/color_skins.css">

    <!-- Data Table -->
    <link rel="stylesheet" href="../../administrator/assets/vendor/datatable/jquery.dataTables.min.css">

    <style>
        .bg-hapus {
            background-color: #fcd2d2;
        }

        .bg-ubah {
            background-color: #ffeeb3;
        }

        .bg-selesai {
            background-color: #98fc92;
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
                    <a href="#">Puskesmas</a>
                </div>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="../../config/logout.php" title="Logout" class="icon-menu"><i class="icon-login"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div id="left-sidebar" class="sidebar">
            <div class="sidebar-scroll">
                <div class="user-account">
<<<<<<< HEAD
                    <img src="../../administrator/assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
=======
                    <img src="../../administrator/assets/images/dokter.jpg" class="rounded-circle user-photo" alt="User Profile Picture">
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
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
                                <li><a href="index.php"><i class="icon-home"></i><span>Dashboard</span></a></li>
<<<<<<< HEAD
                                <li class="active"><a href="#"><i class="icon-list"></i>Pasien</a>
=======
                                <li class="active"><a href="#"><i class="icon-users"></i>Pasien</a>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
                                    <ul class="dropdown">
                                        <li><a href="dalam_penanganan.php">Dalam Penanganan</a></li>
                                        <li><a href="selesai.php">Selesai</a></li>
                                    </ul>
                                </li>
<<<<<<< HEAD
                                <li><a href="riwayat_pemeriksaan.php"><i class="icon-calendar"></i>Riwayat Pemeriksaan</a></li>
=======
                                <li><a href="riwayat_pemeriksaan.php"><i class="icon-docs"></i>Riwayat Pemeriksaan</a></li>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
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
                            <h2>Dalam Penanganan</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Pasien</li>
                                <li class="breadcrumb-item active">Dalam Penanganan</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div class="table-responsive table_middel">
                                    <table id="table" class="table m-b-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No.</th>
                                                <th>No Registrasi</th>
                                                <th>Poli</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kunjungan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../config/koneksi.php';

                                            $no = 1;
                                            $query = $koneksi->query("SELECT `registrasi`.*, `pasien`.`nama_lengkap`, `data_pengguna`.`nama`, `data_pengguna`.`jabatan` FROM `registrasi`, `pasien` INNER JOIN `data_pengguna` WHERE `registrasi`.`id_pasien` = `pasien`.`id_pasien` AND `registrasi`.`nama_dokter` = `data_pengguna`.`nama` AND `data_pengguna`.`nama` = '$nama' AND `registrasi`.`stts` = 'Open'");

                                            while ($data = $query->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><span><?php echo $data->no_regis; ?></span></td>
                                                    <td><span><?php echo $data->poli; ?></span></td>
                                                    <td><span><?php echo $data->nama_lengkap; ?></span></td>
                                                    <td><span><?php echo $data->jenis_kunjungan; ?></span></td>
                                                    <td>
                                                        <button type="button" id="btnPeriksa" data-id="<?php echo $data->id_pasien; ?>" data-regis="<?= $data->no_regis; ?>" data-nama="<?= $data->nama_lengkap; ?>" class="btn btn-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people mt-1" viewBox="0 0 16 16">
                                                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Box -->
    <?php include "modal_dokter.php" ?>

    <!-- Javascript -->
    <script src="../../administrator/assets/bundles/libscripts.bundle.js"></script>
    <script src="../../administrator/assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../../administrator/assets/bundles/chartist.bundle.js"></script>
    <script src="../../administrator/assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
    <script src="../../administrator/assets/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js -->
    <script src="../../administrator/assets/vendor/toastr/toastr.js"></script>
    <script src="../../administrator/assets/vendor/flot-charts/jquery.flot.selection.js"></script>

    <script src="../../administrator/assets/bundles/mainscripts.bundle.js"></script>
    <script src="../../administrator/assets/js/index.js"></script>

    <script src="../../administrator/assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../../administrator/assets/vendor/datatable/jquery.dataTables.min.js"></script> <!-- Data Table -->
    <script src="../../administrator/assets/js/script2.js"></script>
</body>

</html>