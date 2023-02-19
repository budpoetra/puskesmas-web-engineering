<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$t_namalengkap 	= $_POST['t_namalengkap'];
$t_notelp 		= $_POST['t_notelp'];
$t_username 	= $_POST['t_username'];
$t_password 	= md5('password');
$t_email 		= $_POST['t_email'];
$t_jenkel 		= $_POST['t_jenkel'];
$t_alamat		= $_POST['t_alamat'];
$t_tgllahir		= $_POST['t_tgllahir'];
$t_tempatlahir		= $_POST['t_tempatlahir'];


// $getID = "SELECT AUTO_INCREMENT FROM id.data_login WHERE id"
 
// menyeleksi data admin dengan username dan password yang sesuai
// $data1	= "INSERT INTO login_user VALUES (NULL,'1111','$t_email','$t_username','$t_password','customer')";
// $data1	= "INSERT INTO login_user VALUES (NULL,'$lastID','$t_email','$t_username','$t_password','customer')";
// $lastID = "SELECT id FROM data_login ORDER BY id desc limit 1";

$data2	= "INSERT INTO data_login VALUES (NULL,'$t_namalengkap','$t_alamat','$t_notelp','$t_jenkel','$t_tempatlahir','$t_tgllahir')";
// $sql2	= $koneksi->query($data2);


if($koneksi->query($data2) === TRUE){
	$idbaru = $koneksi->insert_id;
	// echo "New record created successfully. Last inserted ID is: " . $idbaru;
	$data1	= "INSERT INTO login_user VALUES (NULL,'$idbaru','$t_email','$t_username','$t_password','customer')";
	$koneksi->query($data1);
		header("location:../index.php?pesan=berhasil".$idbaru);
}else{
	header("location:../index.php??pesan=gagal".$idbaru);
	// echo "Error: " . $data2 . "<br>" . $koneksi->error;

}

?>