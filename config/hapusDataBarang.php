<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$id_barang = $_POST['id_barang'];

$data	= "DELETE FROM barang WHERE id_barang = $id_barang";

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
