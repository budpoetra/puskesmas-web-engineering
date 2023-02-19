<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$id_pemeriksaan = $_POST['id_pemeriksaan'];

$data	= "DELETE FROM pemeriksaan WHERE id_pemeriksaan=$id_pemeriksaan";

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
