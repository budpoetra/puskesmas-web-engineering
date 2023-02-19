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
    <title>Dokter Puskesmas Medan Sunggal</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="../../../assets/Logo.png" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="../../../administrator/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../administrator/assets/vendor/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../../administrator/assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../../../administrator/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="../../../administrator/assets/vendor/toastr/toastr.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../../../administrator/assets/css/main.css">
    <link rel="stylesheet" href="../../../administrator/assets/css/color_skins.css">
</head>

<body class="theme-cyan">

    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="https://thememakker.com/templates//lucid/hospital/assets/images/logo-icon.svg" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>        
    </div>
</div> -->
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
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown" title="Pengaturan"><i class="icon-equalizer"></i></a>
                            <ul class="dropdown-menu user-menu menu-icon">
                                <li class="menu-heading">Pengaturan</li>
                                <li><a href=""><i class="icon-note"></i> <span>Ubah Profil</span></a></li>
                                 <li><a href="javascript:void(0);"><i class="icon-equalizer"></i> <span>Preferences</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-lock"></i> <span>Privacy</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-bell"></i> <span>Notifications</span></a></li> -->
                        
                        </li>
                        <li>
                            <a href="../../../config/logout.php" title="Logout" class="icon-menu"><i
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
                    <img src="../../../administrator/assets/images/user.png" class="rounded-circle user-photo"
                        alt="User Profile Picture">
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
                                <li><a href="pemeriksaan_pasien.php"><i class="icon-calendar"></i>Pemeriksaan Pasien</a>
                                </li>
                                <li><a href="rekam_medis_pasien.php"><i class="icon-list"></i>Rekam Medis Pasien</a>
                                </li>
                                
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
                            <h2>Pemeriksaan Pasien</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item"> Rekap Pasien</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Rekap Pasien</h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">

                                    <div class="col-sm-6">
                                        <?php
	include '../../../config/koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from registrasi_pasien where registrasi_pasien.id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>

                                        <form method="post" action="../../../config/rekap-pasien.php">
                                            <input type="hidden" name="t_id" value="<?php echo $id; ?>">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" id="t_nama_pasien" name="t_nama_pasien"
                                                    value="<?php echo $d['nama_pasien']; ?> " class="form-control"
                                                    placeholder="Nama Lengkap">
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Poli</label>
                                            <input type="text" id="t_poli" name="t_poli"
                                                class="form-control" value="<?php echo $d['tipe_poli']; ?>"
                                                placeholder="Tempat Lahir">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tanggal Berobat</label>
                                            <input type="" id="t_tglberobat" name="t_tglberobat" class="form-control"
                                                value="<?php echo $d['tgl_berobat']; ?>" placeholder="Tempat Lahir">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Keluhan</label>
                                            <textarea type="text" id="t_keluhan" name="t_keluhan" class="form-control"
                                                placeholder="Keluhan"><?php echo $d['keluhan']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Rekap Hari Ini</label>
                                            <textarea type="text" id="t_rekap" name="t_rekap" class="form-control"
                                                placeholder="Rekap Hari Ini"><?php echo $d['rekap']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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




    <!-- Javascript -->
    <script src="../../../administrator/assets/bundles/libscripts.bundle.js"></script>
    <script src="../../../administrator/assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../../../administrator/assets/bundles/chartist.bundle.js"></script>
    <script src="../../../administrator/assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
    <script src="../../../administrator/assets/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js -->
    <script src="../../../administrator/assets/vendor/toastr/toastr.js"></script>
    <script src="../../../administrator/assets/vendor/flot-charts/jquery.flot.selection.js"></script>

    <script src="../../../administrator/assets/bundles/mainscripts.bundle.js"></script>
    <script src="../../../administrator/assets/js/index.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates//lucid/hospital/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Aug 2018 12:22:26 GMT -->

</html>