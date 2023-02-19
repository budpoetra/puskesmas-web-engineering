<?php

//panggil koneksi database
include "koneksi.php";

//enkripsi inputan password lama
$password_lama = md5($_POST['pass_lama']);

//panggil username
$username = $_POST['username'];

//uji jika password lama sesuai
$tampil = mysqli_query($koneksi, "SELECT * FROM login_user WHERE username = '$username' and password = '$password_lama'");
$data = mysqli_fetch_array($tampil);
//jika data ditemukan, maka password sesuai
if ($data) {
    //uji jika password baru dan konfirmasi password sama
    $password_baru = $_POST['pass_baru'];
    $konfirmasi_password = $_POST['konfirmasi_pass'];

    if ($password_baru == $konfirmasi_password) {
        //proses ganti password
        //enkripsi password baru
        $pass_ok = md5($konfirmasi_password);
        $ubah = mysqli_query($koneksi, "UPDATE login_user set password = '$pass_ok'  
                                        WHERE id = '$data[id]' ");
        if ($ubah) {
            $output = [
                'status' => 'success',
                'msg' => 'Password Berhasil Diubah'
            ];
            echo json_encode($output);
        }
    } else {
        $output = [
            'status' => 'warning',
            'msg' => 'Password Baru & Konfirmasi Password Tidak Sama'
        ];
        echo json_encode($output);
    }
} else {
    $output = [
        'status' => 'error',
        'msg' => 'Password Lama anda Tidak Sesuai/Tidak Terdaftar!'
    ];
    echo json_encode($output);
}
