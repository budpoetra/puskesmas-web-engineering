<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$id_pasien		= $_POST['id_pasien'];
$password		= $_POST['password'];
$password2		= $_POST['password2'];
$jabatan 		= 'customer';
$no_identitas 	= $_POST['no_identitas'];
$nama 			= $_POST['nama'];
$nama_ortu 		= $_POST['nama_ortu'];
$tempat_lahir 	= $_POST['tempat_lahir'];
$tgl_lahir 		= $_POST['tgl_lahir'];
$agama			= $_POST['agama'];
$alamat			= $_POST['alamat'];
$bpjs			= $_POST['bpjs'];
$goldar			= $_POST['goldar'];
$gender			= $_POST['gender'];
$email			= $_POST['email'];

// time
date_default_timezone_set('Asia/Jakarta');
$updated_at = date("Y-m-d H:i:s");

if ($password == "") {
	$sql = mysqli_query($koneksi, "UPDATE pasien SET 
										no_identitas = '$no_identitas',
										nama_lengkap = '$nama', 
										nama_orang_tua = '$nama_ortu', 
										tempat_lahir = '$tempat_lahir',
										tgl_lahir = '$tgl_lahir',
										agama = '$agama',
										alamat = '$alamat', 
										bpjs = '$bpjs',
										goldar = '$goldar',
										gender = '$gender',
										updated_at = '$updated_at'
										WHERE id_pasien = $id_pasien");

	$sql2 = mysqli_query($koneksi, "UPDATE login_user SET 
										email = '$email'
										WHERE id_pasien = $id_pasien");

	if ($sql === TRUE && $sql2 === TRUE) {
		$output = [
			'status' => 'success',
			'msg' => 'Data Berhasil Di Edit Tanpa Merubah Password.'
		];
		echo json_encode($output);
	} else {
		$output = [
			'status' => 'error',
			'msg' => 'Data Gagal Di Edit.'
		];
		echo json_encode($output);
	}
} else {
	if ($password === $password2) {
		$md5password = md5($password);
		$sql = mysqli_query($koneksi, "UPDATE pasien SET 
										no_identitas = '$no_identitas',
										nama_lengkap = '$nama', 
										nama_orang_tua = '$nama_ortu', 
										tempat_lahir = '$tempat_lahir',
										tgl_lahir = '$tgl_lahir',
										agama = '$agama',
										alamat = '$alamat', 
										bpjs = '$bpjs',
										goldar = '$goldar',
										gender = '$gender',
										updated_at = '$updated_at'
										WHERE id_pasien = $id_pasien");

		$sql2 = mysqli_query($koneksi, "UPDATE login_user SET 
										email = '$email',
										password = '$password'
										WHERE id_pasien = $id_pasien");
		if ($sql === TRUE && $sql2 === TRUE) {
			$output = [
				'status' => 'success',
				'msg' => 'Data Berhasil Di Edit.'
			];
			echo json_encode($output);
		} else {
			$output = [
				'status' => 'error',
				'msg' => 'Data Gagal Di Edit.'
			];
			echo json_encode($output);
		}
	} else {
		$output = [
			'status' => 'error',
			'msg' => 'Password Tidak Sesuai, Data Gagal Di Edit.'
		];
		echo json_encode($output);
	}
}
