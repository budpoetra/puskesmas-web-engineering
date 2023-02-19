<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../../login.php");
} else {
    $nama = $_SESSION['nama'];
}

if (isset($_GET['id'])) {
    $id_pasien = $_GET['id'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Resepsionis Puskesmas Medan Sunggal</title>
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
                    <img src="../../assets/images/resepsionis.png" class="rounded-circle user-photo" alt="User Profile Picture">
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
                                <li class="active"><a href="registrasi.php"><i class="icon-users"></i>Registrasi Ulang</a></li>
                                <li><a href="pemeriksaan_pasien.php"><i class="icon-folder"></i>Pemeriksaan Pasien</a></li>
                                <li><a href="administrasi.php"><i class="icon-credit-card"></i>Administrasi</a></li>
                                <li><a href="message.php"><i class="icon-paper-plane"></i>Message</a></li>
                                </li>
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
                            <h2>Registrasi Ulang</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Registrasi</li>
                                <li class="breadcrumb-item active">Registrasi Ulang</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <a href="registrasi.php">
                                    <button type="button" class="btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-circle mt-1" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                            <div class="body">
                                <?php
                                include '../../../config/koneksi.php';

                                // set waktu
                                date_default_timezone_set('Asia/Jakarta');
                                $today = date('Y/m/d');

                                $query = $koneksi->query("SELECT * FROM pasien INNER JOIN registrasi ON (`pasien`.id_pasien=`registrasi`.id_pasien) WHERE `pasien`.id_pasien = $id_pasien AND `registrasi`.created_at BETWEEN '$today 00:00:00' AND '$today 23:59:59' ORDER BY `registrasi`.`id_registrasi` DESC LIMIT 1");
                                while ($data = $query->fetch_object()) {
                                ?>
                                    <form id="formRegistrastiUlang" action="../../../config/registrasi-ulang.php" method="post">
                                        <div class="row clearfix">
                                            <input type="hidden" name="id_registrasi" id="id_registrasi" value="<?= $data->id_registrasi ?>">
                                            <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $data->id_pasien ?>">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="no_identitas">No Identitas</label>
                                                    <input type="text" id="no_identitas" name="no_identitas" class="form-control" value="<?= $data->no_identitas ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $data->nama_lengkap ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="usia">Usia</label>
                                                    <input type="number" min="0" id="usia" name="usia" class="form-control" placeholder="Usia" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="tinggi_badan">Tinggi Badan</label>
                                                    <input type="text" id="tinggi_badan" name="tinggi_badan" class="form-control" placeholder="Tinggi Badan" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="berat_badan">Berat Badan</label>
                                                    <input type="text" id="berat_badan" name="berat_badan" class="form-control" placeholder="Berat Badan" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="lingkar_perut">Lingkar Perut</label>
                                                    <input type="text" id="lingkar_perut" name="lingkar_perut" class="form-control" placeholder="Lingkar Perut" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="jenis_kunjungan">Jenis Kunjungan</label>
                                                    <select id="jenis_kunjungan" name="jenis_kunjungan" class="form-control show-tick">
                                                        <option value="" selected disabled>~ Pilih Jenis Kunjungan ~</option>
                                                        <option value="Kunjungan Sehat">Kunjungan Sehat</option>
                                                        <option value="Kunjungan Sakit">Kunjungan Sakit</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="poli">Jenis Poli</label>
                                                    <select id="poli" name="poli" class="form-control show-tick">
                                                        <option <?php if ($data->poli == 'Umum') {
                                                                    echo 'selected';
                                                                } ?> value="Umum">Umum</option>
                                                        <option <?php if ($data->poli == 'Lansia') {
                                                                    echo 'selected';
                                                                } ?> value="Lansia">Lansia</option>
                                                        <option <?php if ($data->poli == 'KIA') {
                                                                    echo 'selected';
                                                                } ?> value="KIA">KIA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="cara_masuk">Cara Masuk</label>
                                                    <select id="cara_masuk" name="cara_masuk" class="form-control show-tick">
                                                        <option value="" selected disabled>~ Pilih Cara Masuk ~</option>
                                                        <option value="DATANG SENDIRI">DATANG SENDIRI</option>
                                                        <option value="RUMAH SAKIT">RUMAH SAKIT</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_dokter">Nama Dokter</label>
                                                    <select id="nama_dokter" name="nama_dokter" class="form-control show-tick">
                                                        <option value="" selected disabled>~ Pilih Nama Dokter ~</option>
                                                        <?php
                                                        $dokter = $koneksi->query("SELECT * FROM data_pengguna WHERE jabatan = \"dokter\"");
                                                        while ($d = $dokter->fetch_object()) {
                                                        ?>
                                                            <option value="<?= $d->nama; ?>"><?= $d->nama; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ket">Keterangan</label>
                                                    <textarea type="text" id="ket" name="ket" class="form-control" placeholder="Masukkan Keterangan Jika Diperlukan"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-primary">Registrasi</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
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
    <script src="../../assets/bundles/bootstrap.bundle.min.js"></script>

    <script src="../../assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../../assets/js/script.js"></script>
</body>

</html>