<?php
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id 	        = $_POST['t_id'];
$t_tipepoli 	= $_POST['t_tipepoli'];
$t_namadr 	    = $_POST['t_namadr'];
$t_status 		= $_POST['t_status'];
$t_jmpraktek 	= $_POST['t_jmpraktek'];


// update data ke database
$sql1 = mysqli_query($koneksi,"update data_poli set tipe_poli='$t_tipepoli',nama_dr='$t_namadr',status='$t_status',jam_praktek='$t_jmpraktek'  where id='$id'");

// mengalihkan halaman kembali ke index.php

if($sql1 === TRUE){
	header("location:../views/admin/data_poli.php?pesan=berhasil");
}else{
	header("location:../views/admin/data_poli-tambah.php?pesan=gagal");
}
?>