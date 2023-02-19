<?php

if (isset($_GET['regis'])) {
    $regis = $_GET['regis'];
}

require_once '../../assets/vendor/dompdf/autoload.inc.php';
include '../../../config/koneksi.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// query data pasien
$query = $koneksi->query("SELECT * FROM (registrasi INNER JOIN pasien ON (`registrasi`.id_pasien=`pasien`.id_pasien)) INNER JOIN resep ON (`resep`.no_regis=`registrasi`.no_regis) WHERE `resep`.no_regis='$regis'");
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
    <title>' . 'Administrasi_' .  $data['nama_lengkap'] . '_' . date('d F Y', strtotime($data['tgl_regis'])) . '</title>
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
        <center><h6>ADMINISTRASI</h6></center>
        <table class="table-borderless" style="margin-top: 30px;">
            <tbody>
                <tr>
                    <td style="padding-right: 50px;">Nama</td>
                    <td style="padding-right: 10px;">:</td>
                    <td>' .  $data['nama_lengkap'] . '</td>
                    <td style="padding-right: 100px;"></td>
                    <td style="padding-right: 50px;">Tanggal Regis</td>
                    <td style="padding-right: 10px;">:</td>
                    <td>' .  date('d F Y', strtotime($data['tgl_regis'])) . '</td>
                </tr>
                <tr>
                    <td>No Registrasi</td>
                    <td>:</td>
                    <td>' .  $data['no_regis'] . '</td>
                    <td style="padding-right: 100px;"></td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>' .  $data['alamat'] . '</td>
                </tr>
                <tr>
                    <td>No Rekam Medis</td>
                    <td>:</td>
                    <td>' .  $data['no_rekam_medis'] . '</td>
                </tr>
            </tbody>
        </table>
        <hr style="color: black; border-bottom: 3px solid black;">
        <table class="table m-b-0">
            <thead class="thead-dark">
                <tr>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>@Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>';

$resep = $koneksi->query("SELECT * FROM resep WHERE no_regis='$regis'");
while ($dataResep = $resep->fetch_object()) {
    $html .= '<tr>
                        <td><span>' . $dataResep->nama_barang . '</span></td>
                        <td><span>' . $dataResep->jumlah_barang . '</span></td>
                        <td><span> Rp. ' . number_format($dataResep->harga, 0, ',', '.') . '</span></td>
                        <td><span>Rp. ' . number_format($dataResep->total_harga, 0, ',', '.') . '</span></td>
                    </tr>';
}

$html .= '<tr>
            <td><span>Biaya Pemeriksaan</span></td>
            <td><span></span></td>
            <td><span>Rp. ' . number_format($data['biaya_pemeriksaan'], 0, ',', '.') . '</span></td>
            <td><span>Rp. ' . number_format($data['biaya_pemeriksaan'], 0, ',', '.') . '</span></td>
        </tr>
        <tr>
            <td><span>Biaya Konsultasi</span></td>
            <td><span></span></td>
            <td><span>Rp. ' . number_format($data['biaya_konsultasi'], 0, ',', '.') . '</span></td>
            <td><span>Rp. ' . number_format($data['biaya_konsultasi'], 0, ',', '.') . '</span></td>
        </tr>
        <tr>
            <td><span>Biaya Lain</span></td>
            <td><span></span></td>
            <td><span>Rp. ' . number_format($data['biaya_lain'], 0, ',', '.') . '</span></td>
            <td><span>Rp. ' . number_format($data['biaya_lain'], 0, ',', '.') . '</span></td>
        </tr>';

$amount = $koneksi->query("SELECT * FROM amount WHERE no_regis='$regis'");
$dataAmount = mysqli_fetch_assoc($amount);

$html .= '<tr>
            <td colspan="3"><center><b>Total Biaya</b></center></td>
            <td><span>Rp. ' . number_format($dataAmount['amount'], 0, ',', '.') . '</span></td>
        </tr>
        </body>
    </html>';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');
$dompdf->set_option('isHtml5ParserEnabled', true);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Administrasi_' .  $data['nama_lengkap'] . '_' . date('d F Y', strtotime($data['tgl_regis'])), array('Attachment' => false));
