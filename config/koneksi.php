<?php 
 
$koneksi = mysqli_connect("localhost", "root", "", "2022_web_native_puskesmas_2");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>