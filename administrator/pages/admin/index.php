<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../../login.php");
}
?>

<!doctype html>
<html lang="en">


<!-- Mirrored from thememakker.com/templates//lucid/hospital/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Aug 2018 12:21:47 GMT -->

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
                                <li class="active"><a href="index.php"><i class="icon-home"></i><span>Dashboard</span></a></li>
                                <li><a href="#"><i class="icon-pin"></i>Data Pemeriksaan</a>
                                    <ul class="dropdown">
                                        <li><a href="data_poli_umum.php">Poli Umum</a></li>
                                        <li><a href="data_poli_lansia.php">Poli Lansia</a></li>
                                        <li><a href="data_poli_kia.php">Poli KIA</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="icon-docs"></i>Laporan</a>
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

        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>Dashboard</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6">
                        <div class="card shadow" style="width: 35rem;">
                            <div class="card-header">
                                <b>PENDAPATAN</b>
                            </div>
                            <?php
                            include '../../../config/koneksi.php';

                            date_default_timezone_set('Asia/Jakarta');
                            $tahun = date("Y");
                            $bulan = date("m");
                            $hari = date("d");
                            $tahunan = $koneksi->query("SELECT SUM(amount) AS total_amount FROM amount WHERE YEAR(updated_at) = $tahun");
                            $bulanan = $koneksi->query("SELECT SUM(amount) AS total_amount FROM amount WHERE MONTH(updated_at) = $bulan");
                            $harian = $koneksi->query("SELECT SUM(amount) AS total_amount FROM amount WHERE DAY(updated_at) = $hari");
                            ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p>Tahun ini</p>
                                    <p><b>Rp. <?php while ($data = $tahunan->fetch_object()) {
                                                    echo number_format($data->total_amount, 0, ',', '.');
                                                } ?></b></p>
                                </li>
                                <li class="list-group-item">
                                    <p>Bulan ini</p>
                                    <p><b>Rp. <?php while ($data = $bulanan->fetch_object()) {
                                                    echo number_format($data->total_amount, 0, ',', '.');
                                                } ?></b></p>
                                </li>
                                <li class="list-group-item">
                                    <p>Hari ini</p>
                                    <p><b>Rp. <?php while ($data = $harian->fetch_object()) {
                                                    echo number_format($data->total_amount, 0, ',', '.');
                                                } ?></b></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow" style="width: 35rem;">
                            <div class="card-header">
                                <b>PASIEN</b>
                            </div>
                            <?php
                            $pasien = $koneksi->query("SELECT * FROM pasien");
                            $pemeriksaan = $koneksi->query("SELECT * FROM registrasi");
                            $dalam_penanganan = $koneksi->query("SELECT * FROM registrasi WHERE stts = \"Open\"");
                            $penanganan_selesai = $koneksi->query("SELECT * FROM registrasi WHERE stts = \"Close\"");
                            ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p>Jumlah Pasien</p>
                                    <p><b><?= mysqli_num_rows($pasien); ?> Orang</b></p>
                                </li>
                                <li class="list-group-item">
                                    <p>Total Pemeriksaan</p>
                                    <p><b><?= mysqli_num_rows($pemeriksaan); ?> Orang</b></p>
                                </li>
                                <li class="list-group-item">
                                    <p>Dalam Penanganan</p>
                                    <p><b><?= mysqli_num_rows($dalam_penanganan); ?> Orang</b></p>
                                </li>
                                <li class="list-group-item">
                                    <p>Penangan Selesai</p>
                                    <p><b><?= mysqli_num_rows($penanganan_selesai); ?> Orang</b></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card shadow" style="width: 74rem;">
                            <div class="card-header">
                                <b>PEMERIKSAAN TERBARU</b>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="table-responsive table_middel">
                                        <table id="table" class="table m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>No Registrasi</th>
                                                    <th>No Identitas</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>TTL</th>
                                                    <th>BPJS</th>
                                                    <th>Gender</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $query = $koneksi->query("SELECT `registrasi`.no_regis, `pasien`.* FROM `registrasi` INNER JOIN `pasien` ON `registrasi`.id_pasien = `pasien`.id_pasien");

                                                while ($data = $query->fetch_object()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data->no_regis; ?></td>
                                                        <td><?php echo $data->no_identitas; ?></td>
                                                        <td><?php echo $data->nama_lengkap; ?></td>
                                                        <td><?php echo $data->tempat_lahir . ", " . date('d F Y', strtotime($data->tgl_lahir)); ?></td>
                                                        <td><?php echo $data->bpjs; ?></td>
                                                        <td><?php echo $data->gender; ?></td>
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
    <script src="../../assets/bundles/libscripts.bundle.js"></script>
    <script src="../../assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../../assets/bundles/chartist.bundle.js"></script>
    <script src="../../assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
    <script src="../../assets/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js -->
    <script src="../../assets/vendor/toastr/toastr.js"></script>
    <script src="../../assets/vendor/flot-charts/jquery.flot.selection.js"></script>

    <script src="../../assets/bundles/mainscripts.bundle.js"></script>
    <script src="../../assets/js/index.js"></script>

    <script src="../../assets/vendor/datatable/jquery.dataTables.min.js"></script> <!-- Data Table -->
    <script src="../../assets/js/script.js"></script>
</body>

</html>
