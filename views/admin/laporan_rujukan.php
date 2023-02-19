<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin Puskesmas Medan Sunggal</title>
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
                    <img src="../../administrator/assets/images/admin.jpg" class="rounded-circle user-photo" alt="User Profile Picture">
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
                    <div class="dropdown">
                        <span>Selamat Datang,</span>
                        <p>Halo <b><?php echo $_SESSION['username']; ?></b></p>
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
                                <li><a href="#"><i class="icon-list"></i>Data Pemeriksaan</a>
=======
                                <li><a href="#"><i class="icon-pin"></i>Data Pemeriksaan</a>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
                                    <ul class="dropdown">
                                        <li><a href="data_poli_umum.php">Poli Umum</a></li>
                                        <li><a href="data_poli_lansia.php">Poli Lansia</a></li>
                                        <li><a href="data_poli_kia.php">Poli KIA</a></li>
                                    </ul>
                                </li>
<<<<<<< HEAD
                                <li class="active"><a href=""><i class="icon-list"></i>Laporan</a>
=======
                                <li class="active"><a href=""><i class="icon-docs"></i>Laporan</a>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
                                    <ul class="dropdown">
                                        <li><a href="laporan_rekam_medis.php">Laporan Rekam Medis</a></li>
                                        <li><a href="laporan_rujukan.php">Laporan Rujukan</a></li>
                                    </ul>
                                </li>
<<<<<<< HEAD
                                <li><a href="data_pengguna.php"><i class="icon-calendar"></i>Data Pengguna</a></li>
                                <li><a href="#"><i class="icon-list"></i>Kefarmasian</a>
=======
                                <li><a href="data_pengguna.php"><i class="icon-user"></i>Data Pengguna</a></li>
                                <li><a href="#"><i class="icon-notebook"></i>Kefarmasian</a>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
                                    <ul class="dropdown">
                                        <li><a href="data_barang.php">Data Barang</a></li>
                                        <li><a href="data_aturan_pakai.php">Data Aturan Pakai</a></li>
                                    </ul>
                                </li>
<<<<<<< HEAD
                                <li><a href="data_pasien.php"><i class="icon-home"></i>Data Pasien</a></li>
=======
                                <li><a href="data_pasien.php"><i class="icon-users"></i>Data Pasien</a></li>
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
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>Laporan Rujukan</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Laporan</li>
                                <li class="breadcrumb-item active">Laporan Rujukan</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="table-responsive table_middel">
                                        <table id="table" class="table m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>No Registrasi</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>RS Rujukan</th>
                                                    <th>BPJS</th>
                                                    <th>Gender</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include '../../config/koneksi.php';

                                                $no =  1;
                                                $query = $koneksi->query("SELECT `registrasi`.*, `rujukan`.*, `pasien`.`nama_lengkap`, `pasien`.`bpjs`, `pasien`.`gender` FROM `rujukan`, `registrasi` INNER JOIN `pasien` WHERE `rujukan`.`id_pasien`=`pasien`.`id_pasien` AND `rujukan`.`no_regis`=`registrasi`.`no_regis` AND `registrasi`.`status_pulang`='Rujuk'");
                                                while ($data = $query->fetch_object()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data->no_regis; ?></td>
                                                        <td><?php echo $data->nama_lengkap; ?></td>
                                                        <td><?php echo $data->hold_in; ?></td>
                                                        <td><?php echo $data->bpjs; ?></td>
                                                        <td><?php echo $data->gender; ?></td>
                                                        <td>
                                                            <a href="../../administrator/pages/pdf/pdf-rujukan.php?id_registrasi=<?= $data->id_registrasi ?>" target="_blank">
                                                                <button type="button" class="btn btn-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-printer mt-1" viewBox="0 0 16 16">
                                                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                                                    </svg>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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

    <script src="../../administrator/assets/vendor/datatable/jquery.dataTables.min.js"></script> <!-- Data Table -->
    <script src="../../administrator/assets/js/script2.js"></script>
</body>

</html>