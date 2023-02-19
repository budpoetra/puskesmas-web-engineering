<?php
session_start();

if (!isset($_SESSION['jabatan'])) {
	echo "";
} else if ($_SESSION['jabatan'] == "admistrator") {
	header("location: administrator/pages/admin/index.php");
} else if ($_SESSION['jabatan'] == "resepsionis") {
	header("location: administrator/pages/resepsionis/index.php");
} else if ($_SESSION['jabatan'] == "dokter") {
	header("location: administrator/pages/dokter/index.php");
} else if ($_SESSION['jabatan'] == "customer") {
	header("location: administrator/pages/pasien/index.php");
} else {
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login Puskesmas Medan Sunggal</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
	<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

	<link rel="icon" href="assets/logo.png" type="image/x-icon">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/admin/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/admin/css/main.css">
	<link rel="stylesheet" href="assets/admin/css/color_skins.css">
</head>

<body class="theme-cyan">
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
					<div class="top">
					</div>
					<div class="card">
						<div class="header">
							<p class="lead">Silahkan Login Terlebih Dahulu</p>
						</div>
						<div class="body">
							<?php
							if (isset($_GET['pesan']) == 'gagal') {
							?>
								<p style="color: red;"><i>Username atau Password Salah</i></p>
							<?php
							}
							?>
							<form class="form-auth-small" method="post" action="config/cek_login.php">
								<div class="form-group">
									<label class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="password_user" name="password_user" placeholder="Password">
								</div>
								<button type="submit" value="LOGIN" class="btn btn-primary btn-lg btn-block mb-2">LOGIN</button>
								<span class="helper-text m-b-10"><i class="fa fa-eye-slash mr-1"></i> <a href="forget-password.php">Lupa Password</a></span>
								<span class="helper-text m-b-10"><i class="fa fa-arrow-left mr-1"></i> <a href="index.php">Kembali</a></span>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>