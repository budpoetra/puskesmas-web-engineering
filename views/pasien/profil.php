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
<title>Admin Puskesmas Medan Sunggal</title>
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
                                <li><a href=""><i class="icon-note"></i> <span>Ubah Profil</span></a></li>
                                <!-- <li><a href="javascript:void(0);"><i class="icon-equalizer"></i> <span>Preferences</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-lock"></i> <span>Privacy</span></a></li>
                                <li><a href="javascript:void(0);"><i class="icon-bell"></i> <span>Notifications</span></a></li> -->
                            </ul>
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
                <img src="../../assets/admin/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
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
                            <li><a href="profil.php"><i class="icon-calendar"></i>Profil</a></li>
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
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"></a> Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>            
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card member-card">
                        <div class="header l-coral">
                            <h4 class="m-t-10 text-light"><?php echo $_SESSION['username']; ?></h4>
                        </div>
                        <div class="member-img">
                            <a href="patient-invoice.html">
                            <img src="../../assets/admin/images/sm/avatar2.jpg" class="rounded-circle" alt="profile-image">
                            </a>
                        </div>
                        <div class="body">
                            <div class="col-12">
                                <ul class="social-links list-unstyled">
                                    <li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a title="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>                            
                            </div>
                            <hr>
                            <strong>Occupation</strong>
                            <p>UI UX Design</p>
                            <strong>Email ID</strong>
                            <p>will.smith@info.com</p>
                            <strong>Phone</strong>
                            <p>+123 456 789</p>
                            <hr>
                            <strong>Address</strong>
                            <address>85 Bay Drive, New Port Richey, FL 34653</address>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>General Report</h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled">
                                <li>
                                    <div>Blood Pressure</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div>Heart Beat</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div>Haemoglobin</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div>Sugar</div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs-new2">                                
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#activity">Activity</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#billings">Billings</a></li>
                            </ul>                        
                            <div class="tab-content mt-3">
        
                                <div class="tab-pane active" id="activity">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                                    <div class="timeline-item green">
                                        <span class="date">Just now</span>
                                        <h5>Discharge</h5>
                                    </div>        
                                    <div class="timeline-item warning   ">
                                        <span class="date">02 Jun 2018</span>
                                        <h6>Spinal Osteomyelitis Surgery</h6>
                                        <span><a href="javascript:void(0);" title="">Dr. Chandler Bing</a></span>
                                        <div class="msg">
                                            <p>web by far While that's mock-ups and this is politics, are they really so different? I think the only card she has is the Lorem card.</p>
                                            <ul class="list-unstyled team-info">
                                                <li><img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" data-original-title="Dr. Chris Fox"></li>
                                                <li><img src="../assets/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" data-original-title="Dr. Joge Lucky"></li>
                                                <li><img src="../assets/images/xs/avatar5.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" data-original-title="Isabella" aria-describedby="tooltip698705"></li>
                                            </ul>
                                            <div class="timeline_img m-b-20">
                                                <img class="w-25" src="../assets/images/blog/blog-page-4.jpg" alt="Awesome Image">
                                                <img class="w-25" src="../assets/images/blog/blog-page-2.jpg" alt="Awesome Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item danger">
                                        <span class="date">01 Jun 2018</span>
                                        <h6>Blood Report</h6>
                                        <div class="msg">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <strong>Analysis IDFB-3</strong>
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td>Down Cluster</td>
                                                                <td>90.9% </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Down Fiber</td>
                                                                <td>1.8%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Waterfowl Feathers </td>
                                                                <td>1.7%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quill</td>
                                                                <td>0.0%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Landfowl</td>
                                                                <td>0.1%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total</td>
                                                                <td>100.0%</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong>Species IDFB-12</strong>
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td>Goose Down </td>
                                                                <td>90.9% </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Duck Down</td>
                                                                <td>1.8%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Goose Feathers</td>
                                                                <td>1.7%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Duck Feathers</td>
                                                                <td>0.0%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Duck</td>
                                                                <td>0.1%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Goose</td>
                                                                <td>100.0%</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>        
                                    <div class="timeline-item danger">
                                        <span class="date">01 Jun 2018</span>
                                        <h6>Blood checkup test</h6>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                    <div class="timeline-item dark pb-0">
                                        <span class="date">01 Jun 2018</span>
                                        <h6>Admit patient ward no. 21</h6>
                                        <span><a href="javascript:void(0);" title="">Katherine Lumaad</a> Oakland, CA</span>
                                        <div class="msg">                                            
                                            <div class="timeline_img m-b-20">
                                                <img class="w-25" src="../assets/images/image-gallery/10.jpg" alt="Awesome Image">                                                
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
        
                                <div class="tab-pane" id="billings">                                    
                                    <div>
                                        <h6>Payment Method</h6>
                                        <div class="payment-info">
                                            <h3 class="payment-name"><i class="fa fa-paypal"></i> PayPal ****2222</h3>
                                            <span>Next billing charged $29</span>
                                            <br>
                                            <em class="text-muted">Autopay on May 12, 2018</em>
                                            <a href="javascript:void(0);" class="edit-payment-info">Edit Payment Info</a>
                                        </div>
                                        <p class="margin-top-30"><a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add Payment Info</a></p>
                                    </div>

                                    <div>
                                        <h6>Billing History</h6>
                                        <table class="table billing-history">
                                            <thead class="sr-only">
                                                <tr>
                                                    <th>Plan</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h3 class="billing-title">Basic Plan <span class="invoice-number">#LA35628</span></h3>
                                                        <span class="text-muted">Charged at April 17, 2018</span>
                                                    </td>
                                                    <td class="amount">$29</td>
                                                    <td class="action"><a href="javascript:void(0);">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3 class="billing-title">Pro Plan <span class="invoice-number">#LA3599</span></h3>
                                                        <span class="text-muted">Charged at March 18, 2018</span>
                                                    </td>
                                                    <td class="amount">$59</td>
                                                    <td class="action"><a href="javascript:void(0);">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3 class="billing-title">Platinum Plan <span class="invoice-number">#LA1245</span></h3>
                                                        <span class="text-muted">Charged at Feb 02, 2018</span>
                                                    </td>
                                                    <td class="amount">$89</td>
                                                    <td class="action"><a href="javascript:void(0);">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
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
