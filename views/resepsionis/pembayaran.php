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
    header('Location: administrasi.php');
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
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown" title="Pengaturan"><i class="icon-equalizer"></i></a>
                            </li>
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
                    <img src="../../administrator/assets/images/resepsionis.png" class="rounded-circle user-photo" alt="User Profile Picture">
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
                                <li><a href="registrasi.php"><i class="icon-calendar"></i>Registrasi Ulang</a></li>
                                <li><a href="pemeriksaan_pasien.php"><i class="icon-calendar"></i>Pemeriksaan Pasien</a></li>
                                <li class="active"><a href="administrasi.php"><i class="icon-list"></i>Administrasi</a></li>
=======
                                <li><a href="registrasi.php"><i class="icon-users"></i>Registrasi Ulang</a></li>
                                <li><a href="pemeriksaan_pasien.php"><i class="icon-folder"></i>Pemeriksaan Pasien</a></li>
                                <li class="active"><a href="administrasi.php"><i class="icon-credit-card"></i>Administrasi</a></li>
                                <li><a href="message.php"><i class="icon-paper-plane"></i>Message</a></li>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
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
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>Pembayaran</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Administrasi</li>
                                <li class="breadcrumb-item active">Pembayaran</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <a href="administrasi.php">
                                    <button type="button" class="btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-circle mt-1" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                            <div class="body">
                                <?php
                                include '../../config/koneksi.php';

                                $no = 1;
                                $query = $koneksi->query("SELECT `registrasi`.*, `pasien`.`nama_lengkap` FROM `registrasi` INNER JOIN `pasien` WHERE `registrasi`.`id_pasien` = `pasien`.`id_pasien` AND `registrasi`.`stts` = 'Close' AND `registrasi`.`id_registrasi` = $id_registrasi");

                                while ($data = $query->fetch_object()) {
                                    $no_regis = $data->no_regis;
                                ?>
                                    <form id="formPembayaran" action="../../config/pembayaran.php" method="POST">
                                        <input type="hidden" id="id_registrasi" name="id_registrasi" value="<?= $data->id_registrasi; ?>">
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="no_regis">No Registrasi</label>
                                                    <input type="text" id="no_regis" name="no_regis" class="form-control" value="<?= $data->no_regis; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $data->nama_lengkap; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="usia">Usia</label>
                                                    <input type="number" min="0" id="usia" name="usia" class="form-control" value="<?= $data->usia; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="waktu_regis">Waktu Registrasi</label>
                                                    <input type="text" id="waktu_regis" name="waktu_regis" class="form-control" value="<?= date('d F Y / H:i:s', strtotime($data->created_at)); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="keluhan">Keluhan</label>
                                                    <input type="text" id="keluhan" name="keluhan" class="form-control" value="<?= $data->keluhan; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="poli">Jenis Poli</label>
                                                    <input type="text" id="poli" name="poli" class="form-control" value="<?= $data->poli; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_dokter">Nama Dokter Pemeriksa</label>
                                                    <input type="text" id="nama_dokter" name="nama_dokter" class="form-control" value="<?= $data->nama_dokter; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <hr style="color: black; border-bottom: 3px solid black; margin-bottom: 25px;">
                                            </div>
                                            <div class="col-sm-12 table-responsive table_middel">
                                                <table class="table m-b-0">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Keterangan</th>
                                                            <th>Jumlah</th>
                                                            <th>@Harga</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $resep = $koneksi->query("SELECT * FROM resep WHERE no_regis='$no_regis'");

                                                        while ($dataResep = $resep->fetch_object()) {
                                                        ?>
                                                            <tr>
                                                                <td><span><?php echo $dataResep->nama_barang; ?></span></td>
                                                                <td><span><?php echo $dataResep->jumlah_barang; ?></span></td>
                                                                <td><span><?php echo 'Rp. ' . number_format($dataResep->harga, 0, ',', '.'); ?></span></td>
                                                                <td><span>
                                                                        <input type="hidden" name="totalHargaBarang" id="totalHargaBarang" value="<?= $dataResep->total_harga; ?>">
                                                                        <?php echo 'Rp. ' . number_format($dataResep->total_harga, 0, ',', '.'); ?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <td><span>Biaya Pemeriksaan</span></td>
                                                            <td><span></span></td>
                                                            <td><span><?php echo 'Rp. ' . number_format($data->biaya_pemeriksaan, 0, ',', '.'); ?></span></td>
                                                            <td><span>
                                                                    <input type="hidden" name="biayaPemeriksaan" id="biayaPemeriksaan" value="<?= $data->biaya_pemeriksaan; ?>">
                                                                    <?php echo 'Rp. ' . number_format($data->biaya_pemeriksaan, 0, ',', '.'); ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Biaya Konsultasi</span></td>
                                                            <td><span></span></td>
                                                            <td><span><?php echo 'Rp. ' . number_format($data->biaya_konsultasi, 0, ',', '.'); ?></span></td>
                                                            <td>
                                                                <input type="hidden" name="biayaKonsultasi" id="biayaKonsultasi" value="<?= $data->biaya_konsultasi; ?>">
                                                                <span><?php echo 'Rp. ' . number_format($data->biaya_konsultasi, 0, ',', '.'); ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Biaya Lain</span></td>
                                                            <td><span></span></td>
                                                            <td><span><?php echo 'Rp. ' . number_format($data->biaya_lain, 0, ',', '.'); ?></span></td>
                                                            <td>
                                                                <input type="hidden" name="biayaLain" id="biayaLain" value="<?= $data->biaya_lain; ?>">
                                                                <span><?php echo 'Rp. ' . number_format($data->biaya_lain, 0, ',', '.'); ?>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <center><b>Total Biaya</b></center>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="totalBiaya" name="totalBiaya" class="form-control" readonly>
                                                                <input type="text" id="totalBiayaFormat" name="totalBiayaFormat" class="form-control" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <center><b>Pembayaran</b></center>
                                                            </td>
                                                            <td><input type="text" id="bayar" name="bayar" class="form-control" autocomplete="off"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <center><b>Kembalian</b></center>
                                                            </td>
                                                            <td><input type="text" id="kembalian" name="kembalian" class="form-control" readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }
                                ?>
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
    <!-- Javascript -->
    <script src="../../administrator/assets/bundles/libscripts.bundle.js"></script>
    <script src="../../administrator/assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../../administrator/assets/bundles/chartist.bundle.js"></script>
    <script src="../../administrator/assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
    <script src="../../administrator/assets/bundles/flotscripts.bundle.js"></script>
    <!-- flot charts Plugin Js -->
    <script src="../../administrator/assets/vendor/toastr/toastr.js"></script>
    <script src="../../administrator/assets/vendor/flot-charts/jquery.flot.selection.js"></script>

    <script src="../../administrator/assets/bundles/mainscripts.bundle.js"></script>
    <script src="../../administrator/assets/js/index.js"></script>
    <script>
        $(document).ready(function() {
            let biayaPemeriksaan = parseInt($('#biaya_pemeriksaan').val());
            let biayaKonsultasi = parseInt($('#biaya_konsultasi').val());
            let biayaLain = parseInt($('#biaya_lain').val());

            $('#biaya_tambahan').on('keyup', function() {
                let biayaTambahan = parseInt($('#biaya_tambahan').val());
                let total = biayaPemeriksaan + biayaKonsultasi + biayaLain + biayaTambahan;

                $('#total').attr('value', total);
            });

            $('#bayar').on('keyup', function() {
                let total = parseInt($('#total').val());
                let bayar = parseInt($('#bayar').val());
                let kembalian = bayar - total;
                if (kembalian < 0) {
                    $('#kembalian').attr('value', 'PERIKSA KEMBALI INPUTAN');
                } else {
                    $('#kembalian').attr('value', kembalian);
                }
            });
        });
    </script>
    <script src="../../administrator/assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../../administrator/assets/js/script2.js"></script>
</body>

<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
