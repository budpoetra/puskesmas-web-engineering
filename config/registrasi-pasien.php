<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$t_nama_pasien 	= $_POST['t_nama_pasien'];
$t_alamat 	    = $_POST['t_alamat'];
$t_poli 	    = $_POST['t_poli'];
$t_namadr 	    = $_POST['t_dokter'];
$t_tglberobat 	= $_POST['t_tglberobat'];
$t_keluhan 	    = $_POST['t_keluhan'];
$t_rekap 	    = $_POST['t_rekap'];



$data1	= "INSERT INTO registrasi_pasien VALUES (NULL,'$t_nama_pasien','$t_alamat','$t_poli','$t_namadr','$t_tglberobat','$t_keluhan','$t_rekap')";

$sql2	= $koneksi->query($data1);

if($sql2){

	header("location:../views/resepsionis/registrasi_pasien.php?pesan=berhasil");
}else{
	header("location:../views/resepsionis/registrasi_pasien-tambah.php?pesan=gagal");
}
?>