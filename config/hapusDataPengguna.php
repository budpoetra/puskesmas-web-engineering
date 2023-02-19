<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$id_pengguna 	= $_POST['id_pengguna'];

$data	= "DELETE FROM data_pengguna WHERE id_pengguna = $id_pengguna";
$data2	= "DELETE FROM login_user WHERE id_pengguna = $id_pengguna";

$sql	= $koneksi->query($data);
$sql2	= $koneksi->query($data2);

if ($sql && $sql2) {
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
