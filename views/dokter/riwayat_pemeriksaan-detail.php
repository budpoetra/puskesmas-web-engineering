<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../login.php");
} else {
    $nama = $_SESSION['nama'];
}

if ($_GET['id']) {
    $id_registrasi = $_GET['id'];
} else {
    header("location:riwayat_pemeriksaan.php");
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
                                <li><a href="#"><i class="icon-list"></i>Pasien</a>
=======
                                <li><a href="#"><i class="icon-users"></i>Pasien</a>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
                                    <ul class="dropdown">
                                        <li><a href="dalam_penanganan.php">Dalam Penanganan</a></li>
                                        <li><a href="selesai.php">Selesai</a></li>
                                    </ul>
                                </li>
<<<<<<< HEAD
                                <li class="active"><a href="riwayat_pemeriksaan.php"><i class="icon-calendar"></i>Riwayat Pemeriksaan</a></li>
=======
                                <li class="active"><a href="riwayat_pemeriksaan.php"><i class="icon-docs"></i>Riwayat Pemeriksaan</a></li>
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

                                                    $query = $koneksi->query("SELECT `registrasi`.id_registrasi, `pasien`.nama_lengkap FROM registrasi INNER JOIN pasien ON `registrasi`.id_pasien = `pasien`.id_pasien WHERE `registrasi`.id_registrasi = $id_registrasi AND `registrasi`.stts='Done'");
                                                    while ($data = $query->fetch_object()) {
                                                        echo $data->nama_lengkap;
                                                    }
                                                    ?>
                            </h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Riwayat Pemeriksaan</li>
                                <li class="breadcrumb-item active">Pasien</li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <button type="button" id="btnKembali" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-circle mt-1" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                    </svg>
                                </button>
                                <a href="">
                                    <button type="button" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-printer mt-1" viewBox="0 0 16 16">
                                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                            <br>
                            <?php
                            $query2 = $koneksi->query("SELECT * FROM registrasi INNER JOIN pasien ON `registrasi`.id_pasien = `pasien`.id_pasien WHERE id_registrasi = $id_registrasi AND `registrasi`.stts='Done'");
                            while ($data = $query2->fetch_object()) {
                            ?>
                                <div class="col-lg-12">
                                    <table class="table">
                                        <thead class="text-light bg-secondary">
                                            <tr>
                                                <th colspan="9" class="text-center">LAPORAN REKAM MEDIS PASIEN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nomor Registrasi</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->no_regis; ?></td>
                                                <td>Golongan Darah</td>
                                                <td>:</td>
                                                <td><?php echo $data->goldar; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Registrasi</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo date('d F Y', strtotime($data->tgl_regis)); ?></td>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?php echo $data->alamat; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->nama_lengkap; ?></td>
                                                <td>BPJS</td>
                                                <td>:</td>
                                                <td><?php echo $data->bpjs; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Tgl Lahir</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->tempat_lahir . ", " . date('d F Y', strtotime($data->tgl_lahir)); ?></td>
                                                <td>No. Rekam Medis</td>
                                                <td>:</td>
                                                <td>
                                                    <?php echo $data->no_rekam_medis; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="9" class="bg-secondary"></th>
                                            </tr>
                                            <tr>
                                                <td>Cara Masuk</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->cara_masuk; ?></td>
                                                <td>Nama Dokter</td>
                                                <td>:</td>
                                                <td><?php echo $data->nama_dokter; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Usia</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->usia; ?> Tahun</td>
                                                <td>Alergi Makanan</td>
                                                <td>:</td>
                                                <td><?php echo $data->alergi_makanan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alergi Udara</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->alergi_udara; ?></td>
                                                <td>Alergi Obat</td>
                                                <td>:</td>
                                                <td><?php echo $data->alergi_obat; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi Badan</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->tinggi_badan; ?> Cm</td>
                                                <td>Berat Badan</td>
                                                <td>:</td>
                                                <td><?php echo $data->berat_badan; ?> Kg</td>
                                            </tr>
                                            <tr>
                                                <td>Lingkar Perut</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->lingkar_perut; ?> Cm</td>
                                                <td>IMT</td>
                                                <td>:</td>
                                                <td><?php echo $data->imt; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sistole</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->sistole; ?> mmHg</td>
                                                <td>Diastole</td>
                                                <td>:</td>
                                                <td><?php echo $data->diastole; ?> mmHg</td>
                                            </tr>
                                            <tr>
                                                <td>Respi Rate</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->respi_rate; ?></td>
                                                <td>Heart Rate</td>
                                                <td>:</td>
                                                <td><?php echo $data->heart_rate; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kesadaran</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->kesadaran; ?></td>
                                                <td>Suhu</td>
                                                <td>:</td>
                                                <td><?php echo $data->suhu; ?>&deg;</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kunjungan</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->jenis_kunjungan; ?></td>
                                                <td>Status Pulang</td>
                                                <td>:</td>
                                                <td><?php echo $data->status_pulang; ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="9" class="bg-secondary"></th>
                                            </tr>
                                            <tr>
                                                <td>Poli</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->poli; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Keluhan</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->keluhan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Diagnosa</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->diagnosa; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Perawatan</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->perawatan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tindakan</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->tindakan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td colspan="4"><?php echo $data->ket; ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="9" class="bg-secondary"></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            }
                            ?>
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

    <script src="../../administrator/assets/js/script2.js"></script>
</body>

</html>