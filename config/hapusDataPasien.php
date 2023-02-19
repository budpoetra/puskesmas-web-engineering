<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$id_pasien 	= $_POST['id_pasien'];

$data	= "DELETE FROM pasien WHERE id_pasien = $id_pasien";
$data2	= "DELETE FROM login_user WHERE id_pasien = $id_pasien";

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
