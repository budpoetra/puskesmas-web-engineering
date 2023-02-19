<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$no_rekam_medis = "NORM-" . date('dmY') . "-" . rand(000000, 999999);
$username 		= $_POST['username'];
$password 		= md5($_POST['password']);
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
$create_at = date("Y-m-d H:i:s");

$data	= "INSERT INTO pasien VALUES (NULL, '$no_rekam_medis', '$nama', '$nama_ortu', '$tempat_lahir', '$tgl_lahir', '$gender', '$agama', '$alamat', '-', '$bpjs', '$create_at', '$create_at', '$no_identitas', '-', '$goldar')";

if ($koneksi->query($data) === TRUE) {
	$query = $koneksi->query("SELECT * FROM pasien WHERE no_rekam_medis = '$no_rekam_medis'");
	while ($d = $query->fetch_object()) {
		$data2 = "INSERT INTO login_user VALUES(NULL, " . intval(0) . ", " . intval($d->id_pasien) . ", '$email', '$username', '$password', '$jabatan')";
		if ($koneksi->query($data2) === TRUE) {
			$output = [
				'status' => 'success',
				'msg' => 'Data Berhasil Di Input.'
			];
			echo json_encode($output);
		} else {
			$output = [
				'status' => 'error',
				'msg' => 'Ada Kesalahan Saat Menginput Login User.'
			];
			echo json_encode($output);
		}
	}
} else {
	$output = [
		'status' => 'error',
		'msg' => 'Ada Kesalahan Saat Menginput Data Pasien.'
	];
	echo json_encode($output);
}
