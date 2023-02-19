<?php

if (isset($_GET['id_registrasi'])) {
    $id_registrasi = $_GET['id_registrasi'];
}

require_once '../../assets/vendor/dompdf/autoload.inc.php';
include '../../../config/koneksi.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// query data pasien
$query = $koneksi->query("SELECT * FROM registrasi INNER JOIN pasien ON `registrasi`.id_pasien = `pasien`.id_pasien WHERE id_registrasi = $id_registrasi");
$data = mysqli_fetch_assoc($query);

// Converter Image to Base64
$path = '../../assets/images/Logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$image = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);

// instantiate and use the dompdf class
$options = new Options();
$dompdf = new Dompdf($options);


$html =
    '<html>
    <head>
    <title>' . 'Rekam Medis Pasien_' .  $data['no_rekam_medis'] . '_' . date('d F Y', strtotime($data['tgl_regis'])) . '</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="' . $base64 . '" type="image/x-icon">
    <style>' . file_get_contents("../../assets/vendor/bootstrap/css/bootstrap.min.css") . '</style>
    <style>
        body {
            font-size: 12px;
        }
    </style>
    </head>
    <body>
        <center><img src="' . $base64 . '" width="150px""></center>
        <h5>PUSKESMAS MEDAN SUNGGAL</h5>
        <div>Telepon : +(061) 2278</div>
        <div>E-mail : puskesmasmedansunggal@gmail.com</div>
        <hr style="color: black; border-bottom: 3px solid black;">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Nomor Registrasi</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['no_regis'] . '</td>
                    <td>Golongan Darah</td>
                    <td>:</td>
                    <td>' .  $data['goldar'] . '</td>
                </tr>
                <tr>
                <td>Tanggal Registrasi</td>
                    <td>:</td>
                    <td colspan="4">' . date('d F Y', strtotime($data['tgl_regis'])) . '</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>' .  $data['alamat'] . '</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['nama_lengkap'] . '</td>
                    <td>BPJS</td>
                    <td>:</td>
                    <td>' .  $data['bpjs'] . '</td>
                </tr>
                <tr>
                    <td>Tempat Tgl Lahir</td>
                    <td>:</td>
                    <td colspan="4">' . $data['tempat_lahir'] . ', ' . date('d F Y', strtotime($data['tgl_lahir'])) . '</td>
                    <td>No. Rekam Medis</td>
                    <td>:</td>
                    <td>' .  $data['no_rekam_medis'] . '</td>
                </tr>
                <tr>
                    <td colspan="9"><hr style="color: black; border-bottom: 3px solid black;"></td>
                </tr>
                <tr>
                    <td>Cara Masuk</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['cara_masuk'] . '</td>
                    <td>Nama Dokter</td>
                    <td>:</td>
                    <td>' .  $data['nama_dokter'] . '</td>
                </tr>
                <tr>
                    <td>Usia</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['usia'] . ' Tahun</td>
                    <td>Alergi Makanan</td>
                    <td>:</td>
                    <td>' .  $data['alergi_makanan'] . '</td>
                </tr>
                <tr>
                    <td>Alergi Udara</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['alergi_udara'] . '</td>
                    <td>Alergi Obat</td>
                    <td>:</td>
                    <td>' .  $data['alergi_obat'] . '</td>
                </tr>
                <tr>
                    <td>Tinggi Badan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['tinggi_badan'] . ' Cm</td>
                    <td>Berat Badan</td>
                    <td>:</td>
                    <td>' .  $data['berat_badan'] . ' Kg</td>
                </tr>
                <tr>
                    <td>Lingkar Perut</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['lingkar_perut'] . ' Cm</td>
                    <td>IMT</td>
                    <td>:</td>
                    <td>' .  $data['imt'] . '</td>
                </tr>
                <tr>
                    <td>Sistole</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['sistole'] . ' mmHg</td>
                    <td>Diastole</td>
                    <td>:</td>
                    <td>' .  $data['diastole'] . ' mmHg</td>
                </tr>
                <tr>
                    <td>Respi Rate</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['respi_rate'] . '</td>
                    <td>Heart Rate</td>
                    <td>:</td>
                    <td>' .  $data['heart_rate'] . '</td>
                </tr>
                <tr>
                    <td>Kesadaran</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['kesadaran'] . '</td>
                    <td>Suhu</td>
                    <td>:</td>
                    <td>' .  $data['suhu'] . '&deg;</td>
                </tr>
                <tr>
                    <td>Jenis Kunjungan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['jenis_kunjungan'] . '</td>
                    <td>Status Pulang</td>
                    <td>:</td>
                    <td>' .  $data['status_pulang'] . '</td>
                </tr>
                <tr>
                    <td colspan="9"><hr style="color: black; border-bottom: 3px solid black;"></td>
                </tr>
                <tr>
                    <td>Poli</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['poli'] . '</td>
                </tr>
                <tr>
                    <td>Keluhan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['keluhan'] . '</td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['diagnosa'] . '</td>
                </tr>
                <tr>
                    <td>Perawatan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['perawatan'] . '</td>
                </tr>
                <tr>
                    <td>Tindakan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['tindakan'] . '</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data['ket'] . '</td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');
$dompdf->set_option('isHtml5ParserEnabled', true);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Rekam Medis Pasien_' .  $data['no_rekam_medis'] . '_' . date('d F Y', strtotime($data['tgl_regis'])), array('Attachment' => false));
