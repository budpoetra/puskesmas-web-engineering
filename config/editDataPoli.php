<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id_pemeriksaan = $_POST['id_pemeriksaan'];
$pemeriksaan	= $_POST['pemeriksaan'];
$tarif	 	    = $_POST['tarif'];

// time
date_default_timezone_set('Asia/Jakarta');
$updated_at = date("Y-m-d H:i:s");

if ($pemeriksaan === '' || $tarif === '') {
	$output = [
		'status' => 'error',
		'msg' => 'Data Tidak Boleh Kosong'
	];
	echo json_encode($output);
} else {
	// update data ke database
	$sql = mysqli_query($koneksi, "UPDATE pemeriksaan SET pemeriksaan='$pemeriksaan', tarif='$tarif', updated_at='$updated_at' WHERE id_pemeriksaan=$id_pemeriksaan");

	if ($sql) {
		$output = [
			'status' => 'success',
			'msg' => 'Data Berhasil Diubah'
		];
		echo json_encode($output);
	} else {
		$output = [
			'status' => 'error',
			'msg' => 'Data Gagal Diubah'
		];
		echo json_encode($output);
	}
}
