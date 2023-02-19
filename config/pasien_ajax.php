<?php
include 'koneksi.php';
$aksi = $_GET['aksi'];

// set waktu
date_default_timezone_set('Asia/Jakarta');

// Pendaftaran Lanjutan
if ($aksi == 'pendaftaranLanjutan') {
    $id_pasien      = $_POST['id_pasien'];
    $nama_lengkap   = $_POST['nama_lengkap'];
    $nama_ortu      = $_POST['nama_ortu'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $gender         = $_POST['gender'];
    $alamat         = $_POST['alamat'];
    $agama          = $_POST['agama'];
    $bpjs           = $_POST['bpjs'];
    $goldar         = $_POST['goldar'];

    $no_rekam_medis = "NORM-" . date('dmY') . "-" . rand(000000, 999999);
    $created_at     = date('Y/m/d H:i:s');

    $query = $koneksi->query("UPDATE pasien SET nama_lengkap='$nama_lengkap', nama_orang_tua='$nama_ortu', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', gender='$gender', alamat='$alamat', agama='$agama', bpjs='$bpjs', goldar='$goldar', no_rekam_medis='$no_rekam_medis', created_at='$created_at' WHERE id_pasien='$id_pasien'");

    $output = [
        'status' => 'success',
        'msg' => 'Berhasil Melakukan Proses Pendaftaran, Silahkan Login Terlebih Dahulu.',
    ];
    echo json_encode($output);
}

// Registrasi Online
elseif ($aksi == 'registrasiOnline') {
    $id_pasien      = $_POST['id_pasien'];
    $poli           = $_POST['poli'];
    $updated_at     = date('Y/m/d H:i:s');

    $query = $koneksi->query("UPDATE pasien SET updated_at='$updated_at', stts='Regis' WHERE id_pasien='$id_pasien'");
    $query2 = $koneksi->query("INSERT INTO registrasi(id_registrasi, poli, id_pasien, created_at) VALUE(NULL, '$poli', $id_pasien, '$updated_at')");

    if ($query && $query2) {
        $output = [
            'status' => 'success',
            'msg' => 'Berhasil Melakukan Registrasi Online, Silahkan Datang dan Melakukan Registrasi Ulang Pada Resepsionis.',
        ];
        echo json_encode($output);
    }
}
