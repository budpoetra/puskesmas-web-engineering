<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$no_identitas = $_POST['no_identitas'];

// cek username
$cekUsername = $koneksi->query("SELECT username FROM login_user WHERE username = '$username'");
if (mysqli_num_rows($cekUsername) > 0) {
    $output = [
        "status" => 'warning',
        "msg" => 'Username Sudah Tersedia'
    ];
    echo json_encode($output);
} else {
    // cek kesamaan password
    if ($password != $password2) {
        $output = [
            "status" => 'warning',
            "msg" => 'Password Tidak Sesuai'
        ];
        echo json_encode($output);
    } else {
        // Enkripsi Password
        $md5password = md5($password);

        // cek no identitas
        $cekNoIdentitas = $koneksi->query("SELECT no_identitas FROM pasien WHERE no_identitas = '$no_identitas'");
        if (mysqli_num_rows($cekNoIdentitas) > 0) {
            $output = [
                "status" => 'warning',
                "msg" => 'Anda tidak dapat mendaftar dengan No Identitas yang telah terdaftar. Hubungi Pihak Berwenang.'
            ];
            echo json_encode($output);
        } else {
            $query = $koneksi->query("INSERT INTO pasien(no_identitas) VALUES('$no_identitas')");
            if ($query) {
                $data = $koneksi->query("SELECT * FROM pasien WHERE no_identitas = '$no_identitas'");
                $data_id_pasien = mysqli_fetch_assoc($data);
                $id_pasien = intval($data_id_pasien['id_pasien']);
                $query2 = $koneksi->query("INSERT INTO login_user VALUES(NULL, 0, $id_pasien, '$email', '$username', '$md5password', 'customer')");
                if ($query2) {
                    $output = [
                        "status" => 'success',
                        "msg" => 'Akun berhasil dibuat, silahkan melanjutkan proses pengisian data.',
                        "id_pasien" => $id_pasien
                    ];
                    echo json_encode($output);
                } else {
                    $output = [
                        "status" => 'error',
                        "msg" => 'Ada kesalahan pada penginputan login user.'
                    ];
                    echo json_encode($output);
                }
            } else {
                $output = [
                    "status" => 'error',
                    "msg" => 'Ada kesalahan pada penginputan data pasien.'
                ];
                echo json_encode($output);
            }
        }
    }
}
