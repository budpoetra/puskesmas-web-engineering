<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// set waktu
date_default_timezone_set('Asia/Jakarta');

// menangkap data yang dikirim dari form
$id_registrasi 		= $_POST['id_registrasi'];
$id_pasien 			= $_POST['id_pasien'];
$poli 	    		= $_POST['poli'];
$cara_masuk	    	= $_POST['cara_masuk'];
$nama_dokter 		= $_POST['nama_dokter'];
$tgl_regis 			= date('Y/m/d');
$no_regis 			= "NOPM-" . date('dmY') . "-" . rand(000000, 999999);
$tinggi_badan 		= $_POST['tinggi_badan'];
$berat_badan 		= $_POST['berat_badan'];
$lingkar_perut 		= $_POST['lingkar_perut'];
$imt 				= round(floatval($berat_badan) / ((floatval($tinggi_badan) * 2) / 100), 2);
$usia 	    		= $_POST['usia'];
$jenis_kunjungan	= $_POST['jenis_kunjungan'];
$ket				= $_POST['ket'];
$updated_at 	    = date('Y/m/d H:i:s');
$stts		 	    = "Open";


$data	= "UPDATE registrasi SET poli='$poli', cara_masuk='$cara_masuk', nama_dokter='$nama_dokter', tgl_regis='$tgl_regis', no_regis='$no_regis', usia='$usia', tinggi_badan='$tinggi_badan', berat_badan='$berat_badan', lingkar_perut='$lingkar_perut', imt='$imt', jenis_kunjungan='$jenis_kunjungan', ket='$ket', updated_at='$updated_at', stts='$stts' WHERE id_registrasi=$id_registrasi";
$sql	= $koneksi->query($data);

$data2	= "UPDATE pasien SET stts = 'No Regis' WHERE id_pasien = $id_pasien";
$sql2	= $koneksi->query($data2);

if ($sql && $sql2) {
	$output = [
		'status' => 'success',
		'msg' => 'Pasien Berhasil Melakukan Registrasi Ulang',
		'id_pasien' => $id_pasien,
		'poli' => $poli
	];
	echo json_encode($output);
} else {
	$output = [
		'status' => 'error',
		'msg' => 'Pasien Gagal Melakukan Registrasi Ulang'
	];
	echo json_encode($output);
}
