<?php

if (isset($_GET['id_pasien'])) {
    $id_pasien = $_GET['id_pasien'];
}

require_once '../../assets/vendor/dompdf/autoload.inc.php';
include '../../../config/koneksi.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// query data pasien
$query = $koneksi->query("SELECT * FROM `registrasi` INNER JOIN `pasien` WHERE (`registrasi`.`id_pasien`=`pasien`.`id_pasien`) AND `pasien`.`id_pasien` = $id_pasien AND `registrasi`.`stts`='Done' ORDER BY `registrasi`.`id_registrasi` DESC");
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
    <title>' . 'Rekam Medis Pasien_' .  $data['no_rekam_medis'] . '</title>
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
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td colspan="4">' . $data['nama_lengkap'] . '</td>
                        <td>Golongan Darah</td>
                        <td>:</td>
                        <td>' . $data['goldar'] . '</td>
                    </tr>
                    <tr>
                        <td>Tempat Tgl Lahir</td>
                        <td>:</td>
                        <td colspan="4">' . $data['tempat_lahir'] . ', ' . date('d F Y', strtotime($data['tgl_lahir'])) . '</td>
                        <td>BPJS</td>
                        <td>:</td>
                        <td>' . $data['bpjs'] . '</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td colspan="4">' . $data['alamat'] . '</td>
                        <td>No Rekam Medis</td>
                        <td>:</td>
                        <td>' . $data['no_rekam_medis'] . '</td>
                    </tr>
                </tbody>
            </table>
        <hr style="color: black; border-bottom: 3px solid black;">
            <table class="table" style="border: 1px solid black; border-collapse: collapse;">
                <thead class="text-light bg-secondary">
                    <tr>
                        <th style="border: 1px solid black; border-collapse: collapse;">Tanggal Registrasi</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">No Registrasi</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Cara Masuk</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Nama Dokter</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Diagnosa</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Berat Badan</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Lingkar Perut</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">IMT</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Sistole</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Diastole</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Respi Rate</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Heart Rate</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Alergi Makanan</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Alergi Obat</th>
                        <th style="border: 1px solid black; border-collapse: collapse;">Suhu</th>
                    </tr>
                </thead>
                <tbody>';

// query for table
$query2 = $koneksi->query("SELECT * FROM `registrasi` INNER JOIN `pasien` WHERE (`registrasi`.`id_pasien`=`pasien`.`id_pasien`) AND `pasien`.`id_pasien` = $id_pasien AND `registrasi`.`stts`='Done' ORDER BY `registrasi`.`id_registrasi` DESC");
while ($d = $query2->fetch_object()) {
    $html .= '<tr><td style="border: 1px solid black; border-collapse: collapse;">' . date('d F Y', strtotime($d->tgl_regis)) . '</td>' .
        '<td style="border: 1px solid black; border-collapse: collapse;">' . $d->no_regis . '</td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->cara_masuk . '</td>' .
        '<td style="border: 1px solid black; border-collapse: collapse;">' . $d->nama_dokter . '</td>' .
        '<td style="border: 1px solid black; border-collapse: collapse;">' . $d->diagnosa . '</td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->berat_badan . ' Kg </td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->lingkar_perut . ' Cm </td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->imt . '</td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->sistole . ' mmHg </td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->diastole . ' mmHg </td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->respi_rate . '</td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->heart_rate . '</td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->alergi_makanan . '</td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->alergi_obat . '</td>' .
        '<td style="border: 1px solid black; text-align: center;">' . $d->suhu . '&deg;</td></tr>';
}


$html .= '</tbody>
            </table>
    </body>
    </html>';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
$dompdf->set_option('isHtml5ParserEnabled', true);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Rekam Medis Pasien_' .  $data['no_rekam_medis'], array('Attachment' => false));
