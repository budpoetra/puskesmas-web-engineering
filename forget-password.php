<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
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
							<p class="lead">Forgot Password</p>
						</div>
						<div class="body">
							<?php
							if (isset($_GET['pesan']) == 'gagal') {
							?>
								<p style="color: red;"><i>Username atau Email Tidak Terdaftar</i></p>
							<?php
							}
							?>
							<form action="config/forget_password.php" method="POST">
								<div class="form-group">
									<label class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Anda">
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Selanjutnya</button>
								<a onclick="history.back()" class="btn btn-primary btn-lg btn-block text-white">Kembali</a>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>