<?php
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id 	= $_POST['t_id'];
$t_namalengkap 	= $_POST['t_namalengkap'];
$t_notelp 		= $_POST['t_notelp'];
$t_username 	= $_POST['t_username'];
$t_password 	= md5('password');
$t_email 		= $_POST['t_email'];
$t_jenkel 		= $_POST['t_jenkel'];
$t_alamat		= $_POST['t_alamat'];
$t_tgllahir		= $_POST['t_tgllahir'];
$t_tempatlahir		= $_POST['t_tempatlahir'];

// update data ke database
$sql1 = mysqli_query($koneksi,"update data_login set nama_user='$t_username',alamat='$t_alamat',no_hp='$t_notlp',jenis_kelamin='$t_jenkel' tempat_lahir='$t_tempat_lahir',tanggal_lahir='$t_tgllahir' where id='$id'");
$sql2 = mysqli_query($koneksi,"update login_user set id_user='$id',email='$t_email',username='$t_username',password='$t_password' where id_user='$id'");
// mengalihkan halaman kembali ke index.php

if($sql2 && $sql1 === TRUE){
	header("location:../views/admin/data_pasien.php?pesan=berhasil");
}else{
	header("location:../views/admin/data_pasien-tambah.php?pesan=gagal");
}
?>