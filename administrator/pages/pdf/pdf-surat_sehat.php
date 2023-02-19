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
$query = $koneksi->query("SELECT * FROM (registrasi INNER JOIN pasien ON (`registrasi`.id_pasien=`pasien`.id_pasien)) INNER JOIN surat_sehat ON (`surat_sehat`.no_regis=`registrasi`.no_regis) WHERE `surat_sehat`.no_regis='$regis'");
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
    <title>' . 'Surat Sehat_' .  $data['nama_lengkap'] . '_' . date('d F Y', strtotime($data['tgl_regis'])) . '</title>
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
        <center><h6>SURAT KETERANGAN SEHAT</h6></center>
        <center><h6><i>MEDICAL CERTIFICATE<i></h6></center>
        <p style="margin-top: 40px; margin-bottom: -50px;">Dokter yang bertanda tangan di bawah ini menerangkan bahwa :<p>
        <p style="margin-bottom: -50px;"><i>The undersign doctor certy that :</i><p>
        <table class="table-borderless" style="margin-top: 25px; margin-left: 40px;">
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
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>' .  $data['gender'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Gender</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['gender'] . '</i></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>' .  $data['pekerjaan'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Profession</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['pekerjaan'] . '</i></td>
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
        <p style="margin-bottom: -50px;">Berdasarkan pemeriksaan hari ini :<p>
        <p style="margin-bottom: -50px;"><i>Based on today\'s inspection :</i><p>
        <table class="table-borderless" style="margin-top: 25px; margin-left: 40px;">
            <tbody>
                <tr>
                    <td style="padding-right: 50px;">Tinggi Badan</td>
                    <td style="padding-right: 10px;">:</td>
                    <td>' .  $data['tinggi_badan'] . ' Cm</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Height</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['tinggi_badan'] . ' Cm</i></td>
                </tr>
                <tr>
                <td>Berat Badan</td>
                    <td>:</td>
                    <td>' .  $data['berat_badan'] . ' Kg</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Weight</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['berat_badan'] . ' Kg</i></td>
                </tr>
                <tr>
                    <td>Tekanan Darah</td>
                    <td>:</td>
                    <td>' .  $data['tekanan_darah'] . ' mmHg</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Blood Pressure</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['tekanan_darah'] . ' mmHg</i></td>
                </tr>
                <tr>
                    <td>Denyut Nadi</td>
                    <td>:</td>
                    <td>' .  $data['bulse_of'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Pulse</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['bulse_of'] . '</i></td>
                </tr>
                <tr>
                    <td>VOS (Tajam Penglihatan Mata Kiri)</td>
                    <td>:</td>
                    <td>' .  $data['vos'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>VOS (Visus Oculi Sinistra)</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['vos'] . '</i></td>
                </tr>
                <tr>
                    <td>VOD (Tajam Penglihatan Mata Kanan)</td>
                    <td>:</td>
                    <td>' .  $data['vod'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>VOD (Visus Oculi Dextra)</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['vod'] . '</i></td>
                </tr>
                <tr>
                    <td>Golongan Darah</td>
                    <td>:</td>
                    <td>' .  $data['blood_group'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Blood Group</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['blood_group'] . '</i></td>
                </tr>
            </tbody>
                <tr>
                    <td>Buta Warna</td>
                    <td>:</td>
                    <td>' .  $data['color_blind'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Color Blind</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data['color_blind'] . '</i></td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <p style="margin-bottom: -50px;">Data Tersebut diatas dalam keadaan <b>SEHAT.</b><p>
        <p style="margin-bottom: -50px;"><i>The above data is in a <b>HEALTHY</b> state.</i><p>
        <br>
        <p style="margin-bottom: -50px;">Surat keterangan sehat ini dipergunakan untuk ' . $data['ket_surat'] . ',<p>
        <p style="margin-bottom: -50px;"><i>This health certificate is used for ' . $data['ket_surat'] . ',</i><p>
        <br>
        <p style="margin-bottom: -50px;">Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.<p>
        <p style="margin-bottom: -50px;"><i>Thus this certificate is made to be used properly.</i><p>
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
$dompdf->stream('Surat Sehat_' .  $data['nama_lengkap'] . '_' . date('d F Y', strtotime($data['tgl_regis'])), array('Attachment' => false));
