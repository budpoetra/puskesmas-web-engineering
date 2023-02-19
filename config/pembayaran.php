<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// set waktu
date_default_timezone_set('Asia/Jakarta');

// menangkap data yang dikirim dari form
$id_registrasi	= $_POST['id_registrasi'];
$no_regis		= $_POST['no_regis'];
$total			= $_POST['totalBiaya'];
$created_at		= date('Y-m-d H:i:s');

$sql = mysqli_query($koneksi, "UPDATE registrasi SET stts='Done', updated_at='$created_at' WHERE id_registrasi = $id_registrasi");

if ($sql) {
	$data	= "INSERT INTO amount VALUES (NULL, '$no_regis', '$created_at', '$created_at', '$total')";
	$sql2	= $koneksi->query($data);
	if ($sql2) {
		$output = [
			'status' => 'success',
			'msg' => 'Pembayaran Berhasil',
			'regis' => $no_regis
		];
		echo json_encode($output);
	} else {
		$output = [
			'status' => 'error',
			'msg' => 'Pembayaran Gagal'
		];
		echo json_encode($output);
	}
} else {
	$output = [
		'status' => 'error',
		'msg' => 'Pembayaran Gagal'
	];
	echo json_encode($output);
}
