<?php
include 'koneksi.php';

date_default_timezone_set('Asia/Jakarta');

$id_pengirim = $_POST['id_pengirim'];
$id_penerima = $_POST['id_penerima'];
$message = $_POST['message'];
$date = date('Y-m-d H:i:s');

$query = $koneksi->query("INSERT INTO `message` VALUES(NULL, $id_pengirim, $id_penerima, '$message', '$date')");

if ($query) {
    $output = [
        'status' => 'success'
    ];
    echo json_encode($output);
} else {
    $output = [
        'status' => 'error'
    ];
    echo json_encode($output);
}
