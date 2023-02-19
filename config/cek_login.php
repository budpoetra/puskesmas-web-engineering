<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password_user = $_POST['password_user'];
$md5password_user = md5($password_user);


// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "SELECT * FROM login_user WHERE username='$username' AND password='$md5password_user'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {

	$data = mysqli_fetch_assoc($data);

	if ($data['jabatan'] == "admistrator") {

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "admistrator";
		// alihkan ke halaman dashboard admin
		header("location:../administrator/pages/admin/index.php");

		// cek jika user login sebagai pegawai
	} else if ($data['jabatan'] == "resepsionis") {
		// query nama
		$nama = mysqli_query($koneksi, "SELECT * FROM data_pengguna WHERE username = '$username'");
		$data = mysqli_fetch_assoc($nama);
		$_SESSION['username'] = $username;
		$_SESSION['id_pengguna'] = $data['id_pengguna'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['jabatan'] = "resepsionis";
		// alihkan ke halaman dashboard pegawai
		header("location:../administrator/pages/resepsionis/index.php");
	} else if ($data['jabatan'] == "dokter") {
		// query nama
		$nama = mysqli_query($koneksi, "SELECT * FROM data_pengguna WHERE username = '$username'");
		$data = mysqli_fetch_assoc($nama);
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['jabatan'] = "dokter";
		// alihkan ke halaman dashboard pengurus
		header("location:../administrator/pages/dokter/index.php");
	} else if ($data['jabatan'] == "customer") {
		// query nama
		$id_pasien = mysqli_query($koneksi, "SELECT * FROM login_user WHERE username = '$username'");
		$data = mysqli_fetch_assoc($id_pasien);
		$nama = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien = " . $data['id_pasien']);
		$data2 = mysqli_fetch_assoc($nama);
		$_SESSION['username'] = $username;
		$_SESSION['id_pasien'] = $data['id_pasien'];
		$_SESSION['nama'] = $data2['nama_lengkap'];
		$_SESSION['jabatan'] = "customer";
		// alihkan ke halaman dashboard pengurus
		header("location:../administrator/pages/pasien/index.php");
	} else {

		// alihkan ke halaman login kembali
		header("location:../login.php?pesan=gagal");
	}
} else {

	// alihkan ke halaman login kembali
	header("location:../login.php?pesan=gagal");
}
