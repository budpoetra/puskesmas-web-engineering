<?php

if ($_GET['id']) {
    $id = $_GET['id'];
} else {
    header('Location: ../../index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Pendaftaran Lanjutan</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="../../assets/Logo.png" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/color_skins.css">
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
                    <a href="index.php">Puskesmas</a>
                </div>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-lg-9">
                    <div class="card shadow">
                        <div class="card-header">
                            <b>Forget Password</b>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row clearfix">
                                    <?php
                                    include '../../config/koneksi.php';
                                    $query = $koneksi->query("SELECT * FROM login_user WHERE id=$id");
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                    <input type="hidden" name="id" id="id" value="<?= $id ?>">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" name="username" class="form-control" value="<?= $data['username'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="password" id="password" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password2">Konfirmasi Password Baru</label>
                                            <input type="password" id="password2" name="password2" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <button type="button" id="btnSubmitForgetPassword" class="btn btn-primary">Submit</button>
                                    </div>
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
    <script src="../assets/bundles/libscripts.bundle.js"></script>
    <script src="../assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../assets/bundles/chartist.bundle.js"></script>
    <script src="../assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
    <script src="../assets/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js -->
    <script src="../assets/vendor/toastr/toastr.js"></script>
    <script src="../assets/vendor/flot-charts/jquery.flot.selection.js"></script>

    <script src="../assets/bundles/mainscripts.bundle.js"></script>
    <script src="../assets/js/index.js"></script>

    <script src="../assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>