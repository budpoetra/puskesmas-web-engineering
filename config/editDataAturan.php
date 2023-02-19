<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$id_aturan_pakai	= $_POST['id_aturan_pakai'];
$aturan_pakai		= $_POST['aturan_pakai'];

if ($aturan_pakai === '') {
	$output = [
		'status' => 'error',
		'msg' => 'Data Tidak Boleh Kosong'
	];
	echo json_encode($output);
} else {
	// update data ke database
	$sql = mysqli_query($koneksi, "UPDATE aturan_pakai SET aturan='$aturan_pakai' WHERE id_aturan_pakai = $id_aturan_pakai");

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
