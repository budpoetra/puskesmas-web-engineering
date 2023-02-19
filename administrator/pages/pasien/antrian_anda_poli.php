<?php
$id_pasien = $_GET['id_pasien'];
include '../../../config/koneksi.php';
// set waktu
date_default_timezone_set('Asia/Jakarta');
$today = date('Y-m-d');

$query = $koneksi->query("SELECT * FROM tbl_antrian WHERE id_pasien='$id_pasien' AND (tanggal = '$today') AND (status = '0')");
$data = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
    $msg = 'success';
} else {
    $msg = 'error';
}

if ($msg == 'success') {
    echo $data['poli'];
} else {
    echo 'Lakukan Registrasi Ulang Terlebih Dahulu.';
}
