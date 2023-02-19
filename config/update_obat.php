<?php
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id 	        = $_POST['t_id'];
$t_namaobat 	= $_POST['t_namaobat'];
$t_tipeobat 	= $_POST['t_tipeobat'];
$t_tglexp 		= $_POST['t_tglexp'];
$t_tglmsk 		= $_POST['t_tglmsk'];


// update data ke database
$sql1 = mysqli_query($koneksi,"update data_obat set nama_obat='$t_namaobat',tipe_obat='$t_tipeobat',tgl_exp='$t_tglexp',tgl_masuk='$t_tglmsk'  where id='$id'");

// mengalihkan halaman kembali ke index.php

if($sql1 === TRUE){
	header("location:../views/admin/data_obat.php?pesan=berhasil");
}else{
	header("location:../views/admin/data_obat-tambah.php?pesan=gagal");
}
?>