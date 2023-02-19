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
$query = $koneksi->query("SELECT * FROM (registrasi INNER JOIN pasien ON (`registrasi`.id_pasien=`pasien`.id_pasien)) INNER JOIN surat_sakit ON (`surat_sakit`.no_regis=`registrasi`.no_regis) WHERE `surat_sakit`.no_regis='$regis'");
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
    <title>' . 'Surat Sakit_' .  $data['nama_lengkap'] . '_' . date('d F Y', strtotime($data['tgl_regis'])) . '</title>
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
        <center><h6>SURAT KETERANGAN SAKIT</h6></center>
        <center><h6><i>MEDICAL CERTIFICATE<i></h6></center>
        <p style="margin-top: 50px; margin-bottom: -50px;">Dokter yang bertanda tangan di bawah ini menerangkan bahwa :<p>
        <p style="margin-bottom: -50px;"><i>The undersign doctor certy that :</i><p>
        <table class="table-borderless" style="margin-top: 40px;">
            <tbody>
                <tr>
                    <td style="padding-right: 50px;">Nama</td>
                    <td style="padding-right: 10px;">:</td>
                    <td>' .  $data['nama_lengkap'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Name</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['nama_lengkap'] . '</i></td>
                </tr>
                <tr>
                <td>Umur</td>
                    <td>:</td>
                    <td>' .  $data['usia'] . ' Tahun</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Age</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['usia'] . ' Years</i></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>' .  $data['alamat'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Address</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['alamat'] . '</i></td>
                </tr>
            </tbody>
        </table>
        <table class="table-borderless" style="margin-top: 20px;">
            <tbody>
                <tr>
                    <td style="padding-right: 20px;">Berdasarkan pemeriksaan hari ini ternyata</td>
                    <td style="padding-right: 10px;">:</td>
                    <td>' .  $data['hasil_periksa'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 20px; padding-bottom: 10px;"><i>Based on today\'s examination, it turns out that</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['hasil_periksa'] . '</i></td>
                </tr>
                <tr>
                <td>Berdasarkan Sehat / Tidak Sehat</td>
                    <td>:</td>
                    <td>' .  $data['kondisi_badan'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 20px; padding-bottom: 10px;"><i>Based on Healthy / Unhealthy</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['kondisi_badan'] . '</i></td>
                </tr>
                <tr>
                    <td>Diberikan istirahat selama</td>
                    <td>:</td>
                    <td>' .  $data['keterangan_istirahat'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Given a break for</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['keterangan_istirahat'] . '</i></td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table style="padding-left: 525px;">
            <tbody>
                <tr>
                    <p>' .  date('d F Y') . '</p>
                    <br>
                    <br>
                    <br>
                    <p style="margin-bottom: -5px;">' .  $data['nama_dokter'] . '</p>
                    <p><i>Medical Docter</i></p>
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
$dompdf->stream('Surat Sakit_' .  $data['nama_lengkap'] . '_' . date('d F Y', strtotime($data['tgl_regis'])), array('Attachment' => false));
