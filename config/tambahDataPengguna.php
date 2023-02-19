<?php
// menghubungkan dengan koneksi
include 'koneksi.php';
// time
date_default_timezone_set('Asia/Jakarta');
$today = date("dmY");

$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
$path = '../assets/image/'; // upload directory
if ($_FILES['photo']) {
	$img = $_FILES['photo']['name'];
	$tmp = $_FILES['photo']['tmp_name'];
	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

	// can upload same image using rand function
	$gantiNamaPhoto = 'img-' . $today . '-' . rand(000000, 999999) . $img;

	// check's valid format
	if (in_array($ext, $valid_extensions)) {
		$path = $path . strtolower($gantiNamaPhoto);
		if (move_uploaded_file($tmp, $path)) {
			$username       = $_POST['username'];
			$password       = md5($_POST['password']);
			$jabatan        = $_POST['jabatan'];
			$nama           = $_POST['nama'];
			$tempat_lahir   = $_POST['tempat_lahir'];
			$tgl_lahir      = $_POST['tgl_lahir'];
			$alamat         = $_POST['alamat'];
			$no_tlp         = $_POST['no_tlp'];
			$spesialis      = $_POST['spesialis'];
			$gender         = $_POST['gender'];
			$email          = $_POST['email'];
			$create_at      = date("Y-m-d H:i:s");

			//insert data ke tabel data_pengguna
			$data = "INSERT INTO data_pengguna VALUES(NULL, '$username', '$nama', '$alamat', '$tempat_lahir', '$tgl_lahir', '$no_tlp', '$spesialis', '$create_at', '$create_at', '$gantiNamaPhoto', '$gender', '$jabatan')";

			if ($koneksi->query($data) === TRUE) {
				$query = $koneksi->query("SELECT * FROM data_pengguna WHERE username = '$username'");
				while ($d = $query->fetch_object()) {
					$data2 = "INSERT INTO login_user VALUES(NULL, " . intval($d->id_pengguna) . ", " . intval(0) . ", '$email', '$username', '$password', '$jabatan')";
					if ($koneksi->query($data2) === TRUE) {
						$output = [
							'status' => 'success',
							'msg' => 'Data Berhasil Di Input.'
						];
						echo json_encode($output);
					} else {
						$output = [
							'status' => 'error',
							'msg' => 'Ada Kesalahan Saat Menginput Login User.'
						];
						echo json_encode($output);
					}
				}
			} else {
				$output = [
					'status' => 'error',
					'msg' => 'Ada Kesalahan Saat Menginput Data Pengguna.'
				];
				echo json_encode($output);
			}
		}
	} else {
		$output = [
			'status' => 'error',
			'msg' => 'Extensi Photo Salah'
		];
		echo json_encode($output);
	}
}
