<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../login.php");
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
                    <img src="../../administrator/assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
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
<<<<<<< HEAD
                                <li class="active"><a href="laporan_rekam_medis.php"><i class="icon-calendar"></i>Laporan Rekam Medis</a></li>
                                <li><a href="index.php"><i class="icon-bell"></i>Registrasi Online</a></li>
=======
                                <li class="active"><a href="laporan_rekam_medis.php"><i class="icon-docs"></i>Laporan Rekam Medis</a></li>
                                <li><a href="index.php"><i class="icon-user"></i>Registrasi Online</a></li>
                                <li><a href="message.php"><i class="icon-paper-plane"></i>Message</a></li>
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
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>Laporan Rekam Medis</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Laporan Rekam Medis</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="row justify-content-end">
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
                                            <button type="button" class="btn btn-info" style="margin-top: -3px;">
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
                                                include '../../config/koneksi.php';
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