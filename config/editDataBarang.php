<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$kode_barang	= $_POST['kode_barang'];
$nama_barang 	= $_POST['nama_barang'];
$harga_jual 	= $_POST['harga_jual'];

// time
date_default_timezone_set('Asia/Jakarta');
$updated_at = date("Y-m-d H:i:s");

if ($nama_barang === '' || $harga_jual === '') {
	$output = [
		'status' => 'error',
		'msg' => 'Data Tidak Boleh Kosong'
	];
	echo json_encode($output);
} else {
	// update data ke database
	$sql = mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama_barang', harga_jual=$harga_jual, updated_at='$updated_at' WHERE kode_barang = '$kode_barang'");

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
