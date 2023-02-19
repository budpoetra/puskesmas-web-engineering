<?php
include 'koneksi.php';

$username   = $_POST['username'];
$password   = $_POST['password'];
$password2  = $_POST['password2'];

if ($username === '' || $password === '' || $password2 === '') {
    $output = [
        "msg" => 'Data Tidak Boleh Kosong',
        "icon" => 'error'

    ];
    echo json_encode($output);
} else {
    // cek kesediaan username
    $user = $koneksi->query("SELECT username FROM login_user WHERE username = '$username'");
    if (mysqli_num_rows($user) > 0) {
        $output = [
            "msg" => 'Username Sudah Tersedia',
            "icon" => 'error'

        ];
        echo json_encode($output);
    } else {
        // cek password
        if ($password !== $password2) {
            $output = [
                "msg" => 'Password Tidak Sesuai',
                "icon" => 'error'
            ];
            echo json_encode($output);
        } else {
            $output = [
                "msg" => 'Dapat Digunakan, Silahkan Melanjukan Pengisian Data.',
                "icon" => 'success'
            ];
            echo json_encode($output);
        }
    }
}
