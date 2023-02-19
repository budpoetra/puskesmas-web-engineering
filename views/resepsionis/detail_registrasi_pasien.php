<?php 
    session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:index.php?pesan=gagal");
	}
?>

<!doctype html>
<html lang="en">


<!-- Mirrored from thememakker.com/templates//lucid/hospital/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Aug 2018 12:21:47 GMT -->

<head>
    <title>Resepsionis Puskesmas Medan Sunggal</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="../../assets/Logo.png" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="../../assets/admin/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/admin/vendor/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../assets/admin/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../../assets/admin/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="../../assets/admin/vendor/toastr/toastr.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../../assets/admin/css/main.css">
    <link rel="stylesheet" href="../../assets/admin/css/color_skins.css">
</head>

<body class="theme-cyan">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="https://thememakker.com/templates//lucid/hospital/assets/images/logo-icon.svg"
                    width="48" height="48" alt="Lucid"></div>
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
                            <!-- <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"
                                    title="Pengaturan"><i class="icon-equalizer"></i></a>
                                <ul class="dropdown-menu user-menu menu-icon">
                                    <li class="menu-heading">Pengaturan</li>
                                    <li><a href=""><i class="icon-note"></i> <span>Ubah Profil</span></a></li>
                                   <li><a href="javascript:void(0);"><i class="icon-equalizer"></i> <span>Preferences</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-lock"></i> <span>Privacy</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-bell"></i> <span>Notifications</span></a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="../../config/logout.php" title="Logout" class="icon-menu"><i
                                        class="icon-login"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div id="left-sidebar" class="sidebar">
            <div class="sidebar-scroll">
                <div class="user-account">
                    <img src="../../assets/admin/images/user.png" class="rounded-circle user-photo"
                        alt="User Profile Picture">
                    <div class="dropdown">
                        <span>Selamat Datang,</span>
                        <p>Halo <b><?php echo $_SESSION['username']; ?></b> </p>
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
                                <li><a href="pendaftaran_pasien.php"><i class="icon-calendar"></i>Pendaftaran Pasien</a>
                                </li>
                                <li class="active"><a href="registrasi_pasien.php"><i class="icon-list"></i>Registrasi
                                        Pasien</a></li>
                                </li>
                                <li><a href="data_pasien.php"><i class="icon-list"></i>Data Pasien</a></li>
                                <li><a href="pembayaran.php"><i class="icon-list"></i>Pembayaran</a></li>
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
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"></a>
                                Registrasi Pasien</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Registrasi</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Registrasi Pasien</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">

                                        <div class="col-sm-6">
                                            <?php
	include '../../config/koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from registrasi_pasien where registrasi_pasien.id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
                                            <form method="post" action="../../config/registrasi-pasien.php">
                                                <input type="hidden" name="t_id" value="<?php echo $id; ?>">
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" id="t_nama_pasien" name="t_nama_pasien"
                                                        value="<?php echo $d['nama_pasien']; ?>" class="form-control"
                                                        placeholder="Nama Lengkap" readonly>
                                                </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" id="t_alamat" name="t_alamat" class="form-control"
                                                    placeholder="Masukkan Alamat" value="<?php echo $d['alamat']; ?>"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tipe Poli</label>
                                                <input id="t_poli" name="t_poli" class="form-control show-tick"
                                                    value="<?php echo $d['tipe_poli']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Dokter</label>
                                                <input id="t_dokter" name="t_dokter" class="form-control show-tick"
                                                    value="<?php echo $d['nama_dr']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Keluhan</label>
                                                <input type="text" id="t_keluhan" name="t_keluhan" class="form-control"
                                                    placeholder="Masukkan Keluhan" value="<?php echo $d['keluhan']; ?>"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tanggal Berobat</label>
                                            <input  id="t_tgl_berobat" name="t_tgl_berobat"
                                                class="form-control" placeholder="Tanggal Berobat" value="<?php echo $d['tgl_berobat']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <a onclick="history.back()" class="btn btn-outline-secondary">Kembali</a>
                                        </div>
                                    </div>
                                    </form>
                                    <?php

}
?>
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
    <script src="../../assets/admin/bundles/libscripts.bundle.js"></script>
    <script src="../../assets/admin/bundles/vendorscripts.bundle.js"></script>

    <script src="../../assets/admin/bundles/chartist.bundle.js"></script>
    <script src="../../assets/admin/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
    <script src="../../assets/admin/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js -->
    <script src="../../assets/admin/vendor/toastr/toastr.js"></script>
    <script src="../../assets/admin/vendor/flot-charts/jquery.flot.selection.js"></script>

    <script src="../../assets/admin/bundles/mainscripts.bundle.js"></script>
    <script src="../../assets/admin/js/index.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates//lucid/hospital/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Aug 2018 12:22:26 GMT -->

</html>