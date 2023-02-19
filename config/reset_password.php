<?php
include 'koneksi.php';

$id = $_POST['id'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password === $password2) {
    $md5password = md5($password);
    $query = $koneksi->query("UPDATE login_user SET password='$md5password' WHERE id=$id");
    $output = [
        'status' => 'success',
        'msg' => 'Password Telah Diubah, Silahkan Login.'
    ];
    echo json_encode($output);
} else {
    $output = [
        'status' => 'warning',
        'msg' => 'Password Tidak Sesuai'
    ];
    echo json_encode($output);
}
