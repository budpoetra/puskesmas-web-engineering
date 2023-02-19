<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$id_aturan_pakai 		= $_POST['id_aturan_pakai'];

$data	= "DELETE FROM aturan_pakai WHERE id_aturan_pakai = $id_aturan_pakai";

$sql	= $koneksi->query($data);

if ($sql) {
	$output = [
		'status' => 'success',
		'msg' => 'Data Berhasil Dihapus'
	];
	echo json_encode($output);
} else {
	$output = [
		'status' => 'error',
		'msg' => 'Data Gagal Dihapus'
	];
	echo json_encode($output);
}
