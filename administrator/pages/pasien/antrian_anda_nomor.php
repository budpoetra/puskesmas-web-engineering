<?php
$id_pasien = $_GET['id_pasien'];
include '../../../config/koneksi.php';
// set waktu
date_default_timezone_set('Asia/Jakarta');
$today = date('Y-m-d');

$query = $koneksi->query("SELECT * FROM tbl_antrian WHERE id_pasien='$id_pasien' AND (tanggal = '$today') AND (status = '0')");
if (mysqli_num_rows($query) > 0) {
    $msg = 'success';
} else {
    $msg = 'error';
}

if ($msg == 'success') {
    $data = mysqli_fetch_assoc($query);
    echo $data['no_antrian'];
} else {
    echo '-';
}
