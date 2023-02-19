<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['jabatan'] == "") {
    header("location:../../login.php");
}
?>

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
                                <li><a href=""><i class="icon-list"></i>Laporan</a>
=======
                                <li><a href=""><i class="icon-docs"></i>Laporan</a>
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
                                <li class="active"><a href="data_pasien.php"><i class="icon-home"></i>Data Pasien</a></li>
=======
                                <li class="active"><a href="data_pasien.php"><i class="icon-users"></i>Data Pasien</a></li>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
                            </ul>
                        </nav>
                    </div>
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
                        <h2>Tambah Data Pasien</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Data Pasien</li>
                            <li class="breadcrumb-item active">Tambah Data Pasien</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <a href="data_pasien.php">
                                <button type="button" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="23" fill="white" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <form id="formTambahDataPasien" method="post" action="../../config/tambahDataPasien.php">
                            <div class="body">
                                <div class="login_user">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required autocomplete="off" required>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password2">Confirmation Password</label>
                                                <input type="password" id="password2" name="password2" class="form-control" placeholder="Enter Confirmation Password" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 mb-5">
                                            <button type="button" id="btnCheck" class="btn btn-primary">Check</button>
                                        </div>
                                        <div class="col-lg-11 check">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4>Data Pasien</h4>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="no_identitas">No Identitas</label>
                                            <input type="number" min="0" id="no_identitas" name="no_identitas" class="form-control" placeholder="No Identitas" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama_ortu">Nama Orang Tua</label>
                                            <input type="text" id="nama_ortu" name="nama_ortu" class="form-control" placeholder="Nama Orang Tua" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select id="agama" name="agama" class="form-control show-tick" required>
                                                <option value="" selected disabled>Pilih Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Khonghucu">Khonghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bpjs">BPJS</label>
                                            <input type="text" id="bpjs" name="bpjs" class="form-control" placeholder="Kosongkan jika tidak memiliki BPJS">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="goldar">Golongan Darah</label>
                                            <input type="text" id="goldar" name="goldar" class="form-control" placeholder="Golongan Darah" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <select id="gender" name="gender" class="form-control show-tick">
                                                <option value="" selected disabled>Jenis Kelamin</option>
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" id="btnTambahDataPasien" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <script src="../../administrator/assets/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js -->
    <script src="../../administrator/assets/vendor/toastr/toastr.js"></script>
    <script src="../../administrator/assets/vendor/flot-charts/jquery.flot.selection.js"></script>

    <script src="../../administrator/assets/bundles/mainscripts.bundle.js"></script>
    <script src="../../administrator/assets/js/index.js"></script>

    <script src="../../administrator/assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../../administrator/assets/js/script2.js"></script>
</body>

</html>