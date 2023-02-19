<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$kode_barang	= "BRG-" . date('dmY') . "-" . rand(000000, 999999);
$nama_barang 	= $_POST['nama_barang'];
$harga_jual 	= $_POST['harga_jual'];


// time
date_default_timezone_set('Asia/Jakarta');
$created_at = date("Y-m-d H:i:s");

if ($nama_barang === '' || $harga_jual === '') {
	$output = [
		'status' => 'error',
		'msg' => 'Data Tidak Boleh Kosong'
	];
	echo json_encode($output);
} else {

	$data	= "INSERT INTO barang VALUES(NULL, '$kode_barang', '$nama_barang', '$harga_jual', '$created_at', '$created_at')";

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
