<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// set waktu
date_default_timezone_set('Asia/Jakarta');

// ambil data
$id_pengguna    = $_POST['id_pengguna'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$password2      = $_POST['password2'];
$jabatan        = $_POST['jabatan'];
$nama           = $_POST['nama'];
$tempat_lahir   = $_POST['tempat_lahir'];
$tgl_lahir      = $_POST['tgl_lahir'];
$alamat         = $_POST['alamat'];
$no_tlp         = $_POST['no_tlp'];
$spesialis      = $_POST['spesialis'];
$gender         = $_POST['gender'];
$email          = $_POST['email'];
$updated_at     = date("Y-m-d H:i:s");
$today			= date("Ymd");

$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
$path = '../assets/image/'; // upload directory

// cek apakah mengganti photo
if ($_FILES['photo']['name'] === "") {
	//insert data ke tabel data_pengguna
	if ($password === "") {
		$sql1 = mysqli_query($koneksi, "UPDATE data_pengguna SET 
												nama = '$nama', 
												alamat = '$alamat', 
												tempat_lahir = '$tempat_lahir',
												tgl_lahir = '$tgl_lahir',
												no_telp = '$no_tlp',
												spesialis = '$spesialis',
												updated_at = '$updated_at',
												gender = '$gender'
												WHERE id_pengguna = $id_pengguna");

		$sql2 = mysqli_query($koneksi, "UPDATE login_user SET 
												email = '$email'
												WHERE id_pengguna = $id_pengguna");

		if ($sql1 === TRUE && $sql2 === TRUE) {
			$output = [
				'status' => 'success',
				'msg' => 'Data Berhasil Di Update Tanpa Merubah Password.'
			];
			echo json_encode($output);
		} else {
			$output = [
				'status' => 'error',
				'msg' => 'Data Gagal Di Update.'
			];
			echo json_encode($output);
		}
	} else {
		if ($password === $password2) {
			$md5password = md5($password);
			$sql1 = mysqli_query($koneksi, "UPDATE data_pengguna SET 
												nama = '$nama', 
												alamat = '$alamat', 
												tempat_lahir = '$tempat_lahir',
												tgl_lahir = '$tgl_lahir',
												no_telp = '$no_tlp',
												spesialis = '$spesialis',
												updated_at = '$updated_at',
												gender = '$gender'
												WHERE id_pengguna = $id_pengguna");

			$sql2 = mysqli_query($koneksi, "UPDATE login_user SET 
												email = '$email',
												password = '$md5password'
												WHERE id_pengguna = $id_pengguna");
			if ($sql1 === TRUE && $sql2 === TRUE) {
				$output = [
					'status' => 'success',
					'msg' => 'Data Berhasil Di Update.'
				];
				echo json_encode($output);
			} else {
				$output = [
					'status' => 'error',
					'msg' => 'Data Gagal Di Update.'
				];
				echo json_encode($output);
			}
		} else {
			$output = [
				'status' => 'error',
				'msg' => 'Password Tidak Sesuai, Data Gagal Di Update.'
			];
			echo json_encode($output);
		}
	}
} else {
	// jika mengganti photo
	$img = $_FILES['photo']['name'];
	$tmp = $_FILES['photo']['tmp_name'];

	// can upload same image using rand function
	$gantiNamaPhoto = 'img-' . $today . '-' . rand(000000, 999999) . $img;

	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

	// check's valid format
	if (in_array($ext, $valid_extensions)) {
		$path = $path . strtolower($gantiNamaPhoto);
		if (move_uploaded_file($tmp, $path)) {

			//insert data ke tabel data_pengguna
			if ($password === "") {
				$sql1 = mysqli_query($koneksi, "UPDATE data_pengguna SET 
													nama = '$nama', 
													alamat = '$alamat', 
													tempat_lahir = '$tempat_lahir',
													tgl_lahir = '$tgl_lahir',
													no_telp = '$no_tlp',
													spesialis = '$spesialis',
													updated_at = '$updated_at',
													gender = '$gender',
													photo = '$gantiNamaPhoto'
													WHERE id_pengguna = $id_pengguna");

				$sql2 = mysqli_query($koneksi, "UPDATE login_user SET 
													email = '$email'
													WHERE id_pengguna = $id_pengguna");

				if ($sql1 === TRUE && $sql2 === TRUE) {
					$output = [
						'status' => 'success',
						'msg' => 'Data Berhasil Di Update Tanpa Merubah Password.'
					];
					echo json_encode($output);
				} else {
					$output = [
						'status' => 'error',
						'msg' => 'Data Gagal Di Update.'
					];
					echo json_encode($output);
				}
			} else {
				if ($password === $password2) {
					$md5password = md5($password);
					$sql1 = mysqli_query($koneksi, "UPDATE data_pengguna SET 
													nama = '$nama', 
													alamat = '$alamat', 
													tempat_lahir = '$tempat_lahir',
													tgl_lahir = '$tgl_lahir',
													no_telp = '$no_tlp',
													spesialis = '$spesialis',
													updated_at = '$updated_at',
													gender = '$gender',
													photo = '$gantiNamaPhoto'
													WHERE id_pengguna = $id_pengguna");

					$sql2 = mysqli_query($koneksi, "UPDATE login_user SET 
													email = '$email',
													password = '$md5password'
													WHERE id_pengguna = $id_pengguna");
					if ($sql1 === TRUE && $sql2 === TRUE) {
						$output = [
							'status' => 'success',
							'msg' => 'Data Berhasil Di Update.'
						];
						echo json_encode($output);
					} else {
						$output = [
							'status' => 'error',
							'msg' => 'Data Gagal Di Update.'
						];
						echo json_encode($output);
					}
				} else {
					$output = [
						'status' => 'error',
						'msg' => 'Password Tidak Sesuai, Data Gagal Di Update.'
					];
					echo json_encode($output);
				}
			}
		}
	} else {
		$output = [
			'status' => 'error',
			'msg' => 'Extensi Photo Salah'
		];
		echo json_encode($output);
	}
}
