<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$aturan_pakai 	= $_POST['aturan_pakai'];

if ($aturan_pakai === '') {
	$output = [
		'status' => 'error',
		'msg' => 'Data Tidak Boleh Kosong'
	];
	echo json_encode($output);
} else {
	$data	= "INSERT INTO aturan_pakai VALUES (NULL, '$aturan_pakai')";

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
