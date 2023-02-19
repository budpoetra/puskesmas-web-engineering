<!doctype html>
<html lang="en">

<head>
    <title>Puskesmas</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="../../assets/admin/favicon.ico" type="image/x-icon">
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
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="https://thememakker.com/templates//lucid/hospital/assets/images/logo-icon.svg"
                    width="48" height="48" alt="Lucid"></div>
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
                                <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"
                                    title="Pengaturan"><i class="icon-equalizer"></i></a>
                                <ul class="dropdown-menu user-menu menu-icon">
                                    <li class="menu-heading">Pengaturan</li>
                                    <li><a href=""><i class="icon-note"></i> <span>Ubah Profil</span></a></li>
                                </ul> -->
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
                        <a href="#" class="dropdown user-name"><strong>Dr. Chandler Bing</strong></a>
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
                                <li><a href="data_poli.php"><i class="icon-calendar"></i>Data Poli</a></li>
                                <li><a href="data_obat.php"><i class="icon-list"></i>Data Obat</a></li>
                                <li><a href="data_pasien.php"><i class="icon-home"></i>Data Pasien</a>
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
                            <h2>Resepsionis</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item ">Data User</li>
                                <li class="breadcrumb-item active">Resepsionis</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Resepsionis</h2>
                            </div>
                            <div class="body">
                                <p class="float-md-left">
                                    <a href="data_resepsionis-tambah.php"><span class="badge badge-info">+ Tambah Data
                                            Resepsionis</span></a>
                                </p>
                                <div class="table-responsive table_middel">
                                    <table class="table m-b-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Pasien</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include '../../config/koneksi.php';

                                            $no = 1;
                                            $query = $koneksi->query("SELECT * FROM login_user INNER JOIN data_login ON login_user.id = data_login.id_user");
                                            
                                            while($data = $query->result()){; 
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><span><?php echo $data->nama_user; ?></span></td>
                                                <td><span><?php echo $data->alamat; ?></span></td>
                                                <td><span><?php echo $data->no_hp; ?></span></td>
                                                <td><a href="edit.php">Edit</a><a href="edit.php"> Detail</a></td>
                                            </tr>
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