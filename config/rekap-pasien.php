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





$sql1 = mysqli_query($koneksi,"update registrasi_pasien set nama_pasien='$t_nama_pasien',alamat='$t_alamat',tipe_poli='$t_poli',nama_dr='$t_namadr',tgl_berobat='$t_tglberobat',keluhan='$t_keluhan',rekap='$t_rekap'  where id='$id'");

if($sql1 === TRUE){

	header("location:../administrator/pages/dokter/pemeriksaan_pasien.php?pesan=berhasil");
}else{
	header("location:../../administrator/pages/dokter/rekap_pasien.php?pesan=gagal");
}
?>