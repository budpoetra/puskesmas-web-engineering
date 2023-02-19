<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$poli 			= $_POST['poli'];
$pemeriksaan	= $_POST['pemeriksaan'];
$tarif	 	    = $_POST['tarif'];

// time
date_default_timezone_set('Asia/Jakarta');
$create_at = date("Y-m-d H:i:s");

if ($pemeriksaan === '' || $tarif === '') {
	$output = [
		'status' => 'error',
		'msg' => 'Data Tidak Boleh Kosong'
	];
	echo json_encode($output);
} else {
	$data	= "INSERT INTO pemeriksaan VALUES(NULL, '$pemeriksaan', $tarif, '$poli', '$create_at', '$create_at')";

	$sql	= $koneksi->query($data);

	if ($sql) {
		$output = [
			'status' => 'success',
			'msg' => 'Data Berhasil Ditambahkan'
		];
		echo json_encode($output);
	} else {
		$output = [
			'status' => 'error',
			'msg' => 'Data Gagal Ditambahkan'
		];
		echo json_encode($output);
	}
}
