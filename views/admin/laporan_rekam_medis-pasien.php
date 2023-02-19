<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../login.php");
}

if ($_GET['id']) {
    $id_pasien = $_GET['id'];
} else {
    header("location:laporan_rekam_medis.php");
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
                                <li class="active"><a href="#"><i class="icon-list"></i>Laporan</a>
=======
                                <li class="active"><a href="#"><i class="icon-docs"></i>Laporan</a>
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
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>
                                Pasien Atas Nama : <?php
                                                    include '../../config/koneksi.php';

                                                    $nama_lengkap = $koneksi->query("SELECT * FROM pasien WHERE id_pasien = $id_pasien");
                                                    while ($d = $nama_lengkap->fetch_object()) {
                                                        echo $d->nama_lengkap;
                                                    }
                                                    ?>
                            </h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Laporan</li>
                                <li class="breadcrumb-item active">Laporan Rekam Medis</li>
                                <li class="breadcrumb-item active">Pasien</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col-4">
                                        <a href="laporan_rekam_medis.php">
                                            <button type="button" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-circle mt-1" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="../../administrator/pages/pdf/pdf-laporan_rekam_medis.php?id_pasien=<?= $id_pasien ?>" target="_blank">
                                            <button type="button" class="btn btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-printer mt-1" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-5">
                                        <!-- Serching By Date -->
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" id="id" value="<?= $id_pasien; ?>">
                                            <div class="col-5 d-inline-block">
                                                <b>From :</b>
                                                <div class="input-group">
                                                    <input type="date" name="dateFrom" id="dateFrom" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-5 d-inline-block">
                                                <b>To :</b>
                                                <div class="input-group">
                                                    <input type="date" name="dateTo" id="dateTo" class="form-control">
                                                </div>
                                            </div>
                                            <button type="button" id="btnInfo" class="btn btn-info" style="margin-top: -3px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-search mt-1" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="table-responsive table_middel">
                                        <table id="table" class="table m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>No Registrasi</th>
                                                    <th>Poli</th>
                                                    <th>Tanggal Registrasi</th>
                                                    <th>Cara Masuk</th>
                                                    <th>Nama Dokter</th>
                                                    <th>Diagnosa</th>
                                                    <th>Lingkar Perut</th>
                                                    <th>IMT</th>
                                                    <th>Sistole</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;

                                                $query = $koneksi->query("SELECT * FROM registrasi WHERE id_pasien = $id_pasien AND stts='Done' ORDER BY id_registrasi DESC");
                                                while ($data = $query->fetch_object()) {;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data->no_regis; ?></td>
                                                        <td><?php echo $data->poli; ?></td>
                                                        <td><?php echo date('d F Y', strtotime($data->tgl_regis)); ?></td>
                                                        <td><?php echo $data->cara_masuk; ?></td>
                                                        <td><?php echo $data->nama_dokter; ?></td>
                                                        <td><?php echo $data->diagnosa; ?></td>
                                                        <td><?php echo $data->lingkar_perut; ?></td>
                                                        <td><?php echo $data->imt; ?></td>
                                                        <td><?php echo $data->sistole; ?></td>
                                                        <td>
                                                            <a href="laporan_rekam_medis-detail.php?id=<?php echo $data->id_registrasi; ?>">
                                                                <button type="button" class="btn btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye-fill mt-1" viewBox="0 0 16 16">
                                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                    </svg>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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