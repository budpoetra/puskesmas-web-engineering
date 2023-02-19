<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../../login.php");
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

    <!-- Data Table -->
    <link rel="stylesheet" href="../../assets/vendor/datatable/jquery.dataTables.min.css">
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
                    <img src="../../assets/images/admin.jpg" class="rounded-circle user-photo" alt="User Profile Picture">
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
                                <li class="active"><a href="#"><i class="icon-pin"></i>Data Pemeriksaan</a>
                                    <ul class="dropdown">
                                        <li><a href="data_poli_umum.php">Poli Umum</a></li>
                                        <li><a href="data_poli_lansia.php">Poli Lansia</a></li>
                                        <li><a href="data_poli_kia.php">Poli KIA</a></li>
                                    </ul>
                                </li>
                                <li><a href=""><i class="icon-docs"></i>Laporan</a>
                                    <ul class="dropdown">
                                        <li><a href="laporan_rekam_medis.php">Laporan Rekam Medis</a></li>
                                        <li><a href="laporan_rujukan.php">Laporan Rujukan</a></li>
                                    </ul>
                                </li>
                                <li><a href="data_pengguna.php"><i class="icon-user"></i>Data Pengguna</a></li>
                                <li><a href="#"><i class="icon-notebook"></i>Kefarmasian</a>
                                    <ul class="dropdown">
                                        <li><a href="data_barang.php">Data Barang</a></li>
                                        <li><a href="data_aturan_pakai.php">Data Aturan Pakai</a></li>
                                    </ul>
                                </li>
                                <li><a href="data_pasien.php"><i class="icon-users"></i>Data Pasien</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2>Poli Umum</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Data Pemeriksaan</li>
                            <li class="breadcrumb-item active">Poli Umum</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="body">
                            <p id="btnTambahDataPoli" class="float-md-left" data-poli="umum">
                                <a href="javascript:void(0)"><span class="badge badge-info">+ Tambah Data Poli</span></a>
                            </p>
                            <div class="table-responsive table_middel">
                                <table id="table" class="table m-b-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Pemeriksaan</th>
                                            <th>Tarif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../../config/koneksi.php';

                                        $no = 1;
                                        $query = $koneksi->query("SELECT * FROM pemeriksaan WHERE kategori = 'umum'");

                                        while ($data = $query->fetch_object()) {;
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><span><?php echo $data->pemeriksaan; ?></span></td>
                                                <td><span><?php echo 'Rp. ' . number_format($data->tarif, 0, ',', '.'); ?></span></td>
                                                <td>
                                                    <button type="button" id="btnEditDataPoli" class="btn btn-warning" data-poli="umum" data-id="<?php echo $data->id_pemeriksaan; ?>" data-pemeriksaan="<?php echo $data->pemeriksaan; ?>" data-tarif="<?php echo $data->tarif; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-square mt-1" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                    <button type="button" id="btnHapusDataPoli" class="btn btn-danger" data-poli="umum" data-id="<?php echo $data->id_pemeriksaan; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash mt-1" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
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

    <!-- Modal Box -->
    <?php include 'modal_admin.php'; ?>

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

    <script src="../../assets/bundles/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../../assets/vendor/datatable/jquery.dataTables.min.js"></script> <!-- Data Table -->
    <script src="../../assets/js/script.js"></script>
</body>

</html>