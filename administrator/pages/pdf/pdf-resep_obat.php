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
    <title>' . 'Resep Obat_' .  $data['nama_lengkap'] . '_' . date('d F Y', strtotime($data['tgl_regis'])) . '</title>
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
        <table class="table-borderless">
            <tbody>
                <tr>
                    <td style="padding-right: 25px">Nama Dokter</td>
                    <td style="padding-right: 10px">:</td>
                    <td>' .  $data['nama_dokter'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 25px">Nama Pasien</td>
                    <td style="padding-right: 10px">:</td>
                    <td>' .  $data['nama_lengkap'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 25px">Poli</td>
                    <td style="padding-right: 10px">:</td>
                    <td>' .  $data['poli'] . '</td>
                </tr>
            </tbody>
        </table>
        <hr style="color: black; border-bottom: 3px solid black;">
        <h6>RESEP OBAT</h6>
        <table class="table" style="border: 1px solid black; border-collapse: collapse;">
                <thead class="text-light bg-secondary">
                    <tr>
                        <th style="border: 1px solid black; border-collapse: collapse;">No</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Nama Obat</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Aturan Pakai</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Jumlah</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>';
$no = 1;
$query2 = $koneksi->query("SELECT * FROM (registrasi INNER JOIN pasien ON (`registrasi`.id_pasien=`pasien`.id_pasien)) INNER JOIN resep ON (`resep`.no_regis=`registrasi`.no_regis) WHERE `resep`.no_regis='$regis'");
while ($d = $query2->fetch_object()) {
    $html .= '<tr><td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' . $no++ . '</td>' .
        '<td style="border: 1px solid black; border-collapse: collapse;">' . $d->nama_barang . '</td>' .
        '<td style="border: 1px solid black;">' . $d->aturan_pakai . '</td>' .
        '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' . $d->jumlah_barang . '</td>' .
        '<td style="border: 1px solid black; text-align: center;"> - </td></tr>';
};

$html .= '</tbody>
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
$dompdf->stream('Resep Obat_' .  $data['nama_lengkap'] . '_' . date('d F Y', strtotime($data['tgl_regis'])), array('Attachment' => false));
