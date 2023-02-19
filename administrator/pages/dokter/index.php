<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../../login.php");
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
                    <img src="../../assets/images/dokter.jpg" class="rounded-circle user-photo" alt="User Profile Picture">
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
                                <li class="active"><a href="index.php"><i class="icon-home"></i><span>Dashboard</span></a></li>
                                <li><a href="#"><i class="icon-users"></i>Pasien</a>
                                    <ul class="dropdown">
                                        <li><a href="dalam_penanganan.php">Dalam Penanganan</a></li>
                                        <li><a href="selesai.php">Selesai</a></li>
                                    </ul>
                                </li>
                                <li><a href="riwayat_pemeriksaan.php"><i class="icon-docs"></i>Riwayat Pemeriksaan</a></li>
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
                    <div class="col-lg-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <b>PASIEN HARI INI</b>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p>Pasien Poli Umum</p>
                                    <p id="jumlah-antrian-umum" class="font-weight-bold"></p>
                                </li>
                                <li class="list-group-item">
                                    <p>Pasien Poli Lansia</p>
                                    <p id="jumlah-antrian-lansia" class="font-weight-bold"></p>
                                </li>
                                <li class="list-group-item">
                                    <p>Pasien Poli KIA</p>
                                    <p id="jumlah-antrian-kia" class="font-weight-bold"></p>
                                    <br>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card shadow">
                            <div class="card-header">
                                <b>DATA PASIEN YANG AKAN DIPERIKSA</b>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <?php
                                    include '../../../config/koneksi.php';

                                    $query = $koneksi->query("SELECT * FROM `registrasi` INNER JOIN `pasien` ON (`registrasi`.`id_pasien` = `pasien`.`id_pasien`) INNER JOIN `data_pengguna` ON (`registrasi`.`nama_dokter` = `data_pengguna`.`nama`) WHERE `data_pengguna`.`nama` = '$nama' AND `registrasi`.`stts` = 'Open' LIMIT 1");
                                    $data = mysqli_fetch_assoc($query);
                                    if ($data == NULL) {
                                    ?>
                                        <div class="table-responsive table_middel">
                                            <table class="table">
                                                <tr>
                                                    <td>Nama pasien</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                    <td>Nomor Identitas</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>No Rekam Medis</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                    <td>No Registrasi</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>Keluhan</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                    <td>Diagnosa</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>Alergi Makanan</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                    <td>Alergi Udara</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>Alergi Obat</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>Tinggi Badan</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                    <td>Berat Badan</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="table-responsive table_middel">
                                            <table class="table">
                                                <tr>
                                                    <td>Nama pasien</td>
                                                    <td>:</td>
                                                    <td><?= $data['nama_lengkap'] ?></td>
                                                    <td>Nomor Identitas</td>
                                                    <td>:</td>
                                                    <td><?= $data['no_identitas'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No Rekam Medis</td>
                                                    <td>:</td>
                                                    <td><?= $data['no_rekam_medis'] ?></td>
                                                    <td>No Registrasi</td>
                                                    <td>:</td>
                                                    <td><?= $data['no_regis'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Keluhan</td>
                                                    <td>:</td>
                                                    <td><?= $data['keluhan'] ?></td>
                                                    <td>Diagnosa</td>
                                                    <td>:</td>
                                                    <td><?= $data['diagnosa'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alergi Makanan</td>
                                                    <td>:</td>
                                                    <td><?= $data['alergi_makanan'] ?></td>
                                                    <td>Alergi Udara</td>
                                                    <td>:</td>
                                                    <td><?= $data['alergi_udara'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alergi Obat</td>
                                                    <td>:</td>
                                                    <td><?= $data['alergi_obat'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tinggi Badan</td>
                                                    <td>:</td>
                                                    <td><?= $data['tinggi_badan'] ?></td>
                                                    <td>Berat Badan</td>
                                                    <td>:</td>
                                                    <td><?= $data['berat_badan'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php
                                    }
                                    ?>
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

    <script src="../../assets/bundles/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../../assets/js/script.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // tampilkan informasi antrian
            $('#jumlah-antrian-umum').load('../panggilan-antrian/get_jumlah_antrian.php?poli=Umum');

            $('#jumlah-antrian-lansia').load('../panggilan-antrian/get_jumlah_antrian.php?poli=Lansia');

            $('#jumlah-antrian-kia').load('../panggilan-antrian/get_jumlah_antrian.php?poli=KIA');
        });
    </script>
</body>

</html>
