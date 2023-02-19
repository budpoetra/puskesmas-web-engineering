<?php
// ================ PDF REPORTING ================ //
if (isset($_POST['regis'])) {
    $regis = $_POST['regis'];
}

require_once '../../assets/vendor/dompdf/autoload.inc.php';
include '../../../config/koneksi.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// Set Waktu
date_default_timezone_set('Asia/Jakarta');
$today = date('Y-m-d');

// Varible True Latter
$adaAdministrasi    = "";
$adaSuratSakit      = "";
$adaSuratSehat      = "";
$adaSuratRujukan    = "";

$queryResep = $koneksi->query("SELECT * FROM resep WHERE no_regis='$regis' AND (created_at BETWEEN '$today 00:00:00' AND '$today 23:59:00')");
if (mysqli_num_rows($queryResep) > 0) {
    $adaAdministrasi = "Yes";

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
    $output = $dompdf->output();
    $file_to_save = "../../../assets/latter/Administrasi_" .  $data['nama_lengkap'] . "_" . date('d F Y', strtotime($data['tgl_regis'])) . ".pdf";
    file_put_contents($file_to_save, $output);
} else {
    $adaAdministrasi = "Yes";

    // query data pasien
    $query = $koneksi->query("SELECT * FROM (registrasi INNER JOIN pasien ON (`registrasi`.id_pasien=`pasien`.id_pasien)) WHERE `registrasi`.no_regis='$regis'");
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
    $output = $dompdf->output();
    $file_to_save = "../../../assets/latter/Administrasi_" .  $data['nama_lengkap'] . "_" . date('d F Y', strtotime($data['tgl_regis'])) . ".pdf";
    file_put_contents($file_to_save, $output);
}

// ================ Query Surat Sakit ================ //
$querySuratSakit = $koneksi->query("SELECT * FROM surat_sakit WHERE no_regis='$regis' AND (created_at BETWEEN '$today 00:00:00' AND '$today 23:59:00')");
if (mysqli_num_rows($querySuratSakit) > 0) {
    $adaSuratSakit = "Yes";
    // query data pasien
    $query2 = $koneksi->query("SELECT * FROM (registrasi INNER JOIN pasien ON (`registrasi`.id_pasien=`pasien`.id_pasien)) INNER JOIN surat_sakit ON (`surat_sakit`.no_regis=`registrasi`.no_regis) WHERE `surat_sakit`.no_regis='$regis'");
    $data2 = mysqli_fetch_assoc($query2);

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
    <title>' . 'Surat Sakit_' .  $data2['nama_lengkap'] . '_' . date('d F Y', strtotime($data2['tgl_regis'])) . '</title>
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
                    <td>' .  $data2['nama_lengkap'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Name</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data2['nama_lengkap'] . '</i></td>
                </tr>
                <tr>
                <td>Umur</td>
                    <td>:</td>
                    <td>' .  $data2['usia'] . ' Tahun</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Age</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data2['usia'] . ' Years</i></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>' .  $data2['alamat'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Address</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data2['alamat'] . '</i></td>
                </tr>
            </tbody>
        </table>
        <table class="table-borderless" style="margin-top: 20px;">
            <tbody>
                <tr>
                    <td style="padding-right: 20px;">Berdasarkan pemeriksaan hari ini ternyata</td>
                    <td style="padding-right: 10px;">:</td>
                    <td>' .  $data2['hasil_periksa'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 20px; padding-bottom: 10px;"><i>Based on today\'s examination, it turns out that</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data2['hasil_periksa'] . '</i></td>
                </tr>
                <tr>
                <td>Berdasarkan Sehat / Tidak Sehat</td>
                    <td>:</td>
                    <td>' .  $data2['kondisi_badan'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 20px; padding-bottom: 10px;"><i>Based on Healthy / Unhealthy</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data2['kondisi_badan'] . '</i></td>
                </tr>
                <tr>
                    <td>Diberikan istirahat selama</td>
                    <td>:</td>
                    <td>' .  $data2['keterangan_istirahat'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Given a break for</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data2['keterangan_istirahat'] . '</i></td>
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
                    <p style="margin-bottom: -5px;">' .  $data2['nama_dokter'] . '</p>
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
    $output = $dompdf->output();
    $file_to_save = "../../../assets/latter/Surat Sakit_" .  $data2['nama_lengkap'] . "_" . date('d F Y', strtotime($data2['tgl_regis'])) . ".pdf";
    file_put_contents($file_to_save, $output);
}

// ================ Query Surat Sehat ================ //
$querySuratSehat = $koneksi->query("SELECT * FROM surat_sehat WHERE no_regis='$regis' AND (created_at BETWEEN '$today 00:00:00' AND '$today 23:59:00')");
if (mysqli_num_rows($querySuratSehat) > 0) {
    $adaSuratSehat = "Yes";

    // query data pasien
    $query3 = $koneksi->query("SELECT * FROM (registrasi INNER JOIN pasien ON (`registrasi`.id_pasien=`pasien`.id_pasien)) INNER JOIN surat_sehat ON (`surat_sehat`.no_regis=`registrasi`.no_regis) WHERE `surat_sehat`.no_regis='$regis'");
    $data3 = mysqli_fetch_assoc($query3);

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
    <title>' . 'Surat Sehat_' .  $data3['nama_lengkap'] . '_' . date('d F Y', strtotime($data3['tgl_regis'])) . '</title>
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
                    <td>' .  $data3['nama_lengkap'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Name</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['nama_lengkap'] . '</i></td>
                </tr>
                <tr>
                <td>Umur</td>
                    <td>:</td>
                    <td>' .  $data3['usia'] . ' Tahun</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Age</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['usia'] . ' Years</i></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>' .  $data3['gender'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Gender</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['gender'] . '</i></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>' .  $data3['pekerjaan'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Profession</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['pekerjaan'] . '</i></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>' .  $data3['alamat'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Address</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['alamat'] . '</i></td>
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
                    <td>' .  $data3['tinggi_badan'] . ' Cm</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Height</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['tinggi_badan'] . ' Cm</i></td>
                </tr>
                <tr>
                <td>Berat Badan</td>
                    <td>:</td>
                    <td>' .  $data3['berat_badan'] . ' Kg</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Weight</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['berat_badan'] . ' Kg</i></td>
                </tr>
                <tr>
                    <td>Tekanan Darah</td>
                    <td>:</td>
                    <td>' .  $data3['tekanan_darah'] . ' mmHg</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Blood Pressure</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['tekanan_darah'] . ' mmHg</i></td>
                </tr>
                <tr>
                    <td>Denyut Nadi</td>
                    <td>:</td>
                    <td>' .  $data3['bulse_of'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Pulse</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['bulse_of'] . '</i></td>
                </tr>
                <tr>
                    <td>VOS (Tajam Penglihatan Mata Kiri)</td>
                    <td>:</td>
                    <td>' .  $data3['vos'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>VOS (Visus Oculi Sinistra)</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['vos'] . '</i></td>
                </tr>
                <tr>
                    <td>VOD (Tajam Penglihatan Mata Kanan)</td>
                    <td>:</td>
                    <td>' .  $data3['vod'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>VOD (Visus Oculi Dextra)</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['vod'] . '</i></td>
                </tr>
                <tr>
                    <td>Golongan Darah</td>
                    <td>:</td>
                    <td>' .  $data3['blood_group'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Blood Group</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['blood_group'] . '</i></td>
                </tr>
            </tbody>
                <tr>
                    <td>Buta Warna</td>
                    <td>:</td>
                    <td>' .  $data3['color_blind'] . '</td>
                </tr>
                <tr>
                    <td style="padding-right: 50px; padding-bottom: 10px;"><i>Color Blind</i></td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>:</i</td>
                    <td style="padding-right: 10px; padding-bottom: 10px;"><i>' .  $data3['color_blind'] . '</i></td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <p style="margin-bottom: -50px;">Data Tersebut diatas dalam keadaan <b>SEHAT.</b><p>
        <p style="margin-bottom: -50px;"><i>The above data is in a <b>HEALTHY</b> state.</i><p>
        <br>
        <p style="margin-bottom: -50px;">Surat keterangan sehat ini dipergunakan untuk ' . $data3['ket_surat'] . ',<p>
        <p style="margin-bottom: -50px;"><i>This health certificate is used for ' . $data3['ket_surat'] . ',</i><p>
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
                    <p style="margin-bottom: -5px;">' .  $data3['nama_dokter'] . '</p>
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
    $output = $dompdf->output();
    $file_to_save = "../../../assets/latter/Surat Sehat_" .  $data3['nama_lengkap'] . "_" . date('d F Y', strtotime($data3['tgl_regis'])) . ".pdf";
    file_put_contents($file_to_save, $output);
}

// ================ Query Surat Rujukan ================ //
$querySuratRujukan = $koneksi->query("SELECT * FROM rujukan WHERE no_regis='$regis' AND (created_at BETWEEN '$today 00:00:00' AND '$today 23:59:00')");
$querySuratRujukan2 = $koneksi->query("SELECT * FROM registrasi WHERE no_regis='$regis' AND status_pulang='Rujuk'");
if (mysqli_num_rows($querySuratRujukan) > 0 and mysqli_num_rows($querySuratRujukan2) > 0) {
    $adaSuratRujukan = "Yes";

    // query data pasien
    $query4 = $koneksi->query("SELECT * FROM registrasi INNER JOIN pasien ON `registrasi`.id_pasien = `pasien`.id_pasien WHERE `registrasi`.no_regis = '$regis'");
    $data4 = mysqli_fetch_assoc($query4);

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
    <title>' . 'Rujukan_' .  $data4['nama_lengkap'] . '_' . date('d F Y', strtotime($data4['tgl_regis'])) . '</title>
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
                    <td>Rumah Sakit Rujukan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['rs_rujukan'] . '</td>
                </tr>
                <tr>
                    <td colspan="9"><hr style="color: black; border-bottom: 3px solid black;"></td>
                </tr>
                <tr>
                    <td>Nomor Registrasi</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['no_regis'] . '</td>
                    <td>Golongan Darah</td>
                    <td>:</td>
                    <td>' .  $data4['goldar'] . '</td>
                </tr>
                <tr>
                <td>Tanggal Registrasi</td>
                    <td>:</td>
                    <td colspan="4">' . date('d F Y', strtotime($data4['tgl_regis'])) . '</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>' .  $data4['alamat'] . '</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['nama_lengkap'] . '</td>
                    <td>BPJS</td>
                    <td>:</td>
                    <td>' .  $data4['bpjs'] . '</td>
                </tr>
                <tr>
                    <td>Tempat Tgl Lahir</td>
                    <td>:</td>
                    <td colspan="4">' . $data4['tempat_lahir'] . ', ' . date('d F Y', strtotime($data4['tgl_lahir'])) . '</td>
                    <td>No. Rekam Medis</td>
                    <td>:</td>
                    <td>' .  $data4['no_rekam_medis'] . '</td>
                </tr>
                <tr>
                    <td colspan="9"><hr style="color: black; border-bottom: 3px solid black;"></td>
                </tr>
                <tr>
                    <td>Cara Masuk</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['cara_masuk'] . '</td>
                    <td>Nama Dokter</td>
                    <td>:</td>
                    <td>' .  $data4['nama_dokter'] . '</td>
                </tr>
                <tr>
                    <td>Usia</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['usia'] . ' Tahun</td>
                    <td>Alergi Makanan</td>
                    <td>:</td>
                    <td>' .  $data4['alergi_makanan'] . '</td>
                </tr>
                <tr>
                    <td>Alergi Udara</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['alergi_udara'] . '</td>
                    <td>Alergi Obat</td>
                    <td>:</td>
                    <td>' .  $data4['alergi_obat'] . '</td>
                </tr>
                <tr>
                    <td>Tinggi Badan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['tinggi_badan'] . ' Cm</td>
                    <td>Berat Badan</td>
                    <td>:</td>
                    <td>' .  $data4['berat_badan'] . ' Kg</td>
                </tr>
                <tr>
                    <td>Lingkar Perut</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['lingkar_perut'] . ' Cm</td>
                    <td>IMT</td>
                    <td>:</td>
                    <td>' .  $data4['imt'] . '</td>
                </tr>
                <tr>
                    <td>Sistole</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['sistole'] . ' mmHg</td>
                    <td>Diastole</td>
                    <td>:</td>
                    <td>' .  $data4['diastole'] . ' mmHg</td>
                </tr>
                <tr>
                    <td>Respi Rate</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['respi_rate'] . '</td>
                    <td>Heart Rate</td>
                    <td>:</td>
                    <td>' .  $data4['heart_rate'] . '</td>
                </tr>
                <tr>
                    <td>Kesadaran</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['kesadaran'] . '</td>
                    <td>Suhu</td>
                    <td>:</td>
                    <td>' .  $data4['suhu'] . '&deg;</td>
                </tr>
                <tr>
                    <td>Jenis Kunjungan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['jenis_kunjungan'] . '</td>
                    <td>Status Pulang</td>
                    <td>:</td>
                    <td>' .  $data4['status_pulang'] . '</td>
                </tr>
                <tr>
                    <td colspan="9"><hr style="color: black; border-bottom: 3px solid black;"></td>
                </tr>
                <tr>
                    <td>Poli</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['poli'] . '</td>
                </tr>
                <tr>
                    <td>Keluhan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['keluhan'] . '</td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['diagnosa'] . '</td>
                </tr>
                <tr>
                    <td>Perawatan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['perawatan'] . '</td>
                </tr>
                <tr>
                    <td>Tindakan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['tindakan'] . '</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td colspan="4">' .  $data4['ket'] . '</td>
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
    $dompdf->stream('Rujukan_' .  $data4['nama_lengkap'] . '_' . date('d F Y', strtotime($data4['tgl_regis'])), array('Attachment' => false));

    // Output the generated PDF to Browser
    $output = $dompdf->output();
    $file_to_save = "../../../assets/latter/Rujukan_" .  $data4['nama_lengkap'] . "_" . date('d F Y', strtotime($data4['tgl_regis'])) . ".pdf";
    file_put_contents($file_to_save, $output);
}

// ================ MAILER SENDER ================ //
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../assets/vendor/PHPMailer/src/Exception.php';
require '../../assets/vendor/PHPMailer/src/PHPMailer.php';
require '../../assets/vendor/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                                //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
    $mail->Username   = 'puskesmasmedansunggal@gmail.com';          //SMTP username
    $mail->Password   = 'vqnolfiymkilrkfh';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                //Enable implicit TLS encryption
    $mail->Port       = 465;                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('puskesmasmedansunggal@gmail.com', 'Puskesmas Medan Sunggal');
    $mail->addReplyTo('puskesmasmedansunggal@gmail.com', 'Puskesmas Medan Sunggal');

    // Query Email Penerima
    $penerima       = $koneksi->query("SELECT * FROM `registrasi` INNER JOIN `login_user` ON (`registrasi`.`id_pasien`=`login_user`.`id_pasien`) WHERE `registrasi`.`no_regis`='$regis'");
    $dataPenerima   = mysqli_fetch_assoc($penerima);

    $mail->addAddress($dataPenerima['email']);     //Add a recipient

    //Attachments
    // Cek Surat Sakit
    if ($adaAdministrasi === "Yes") {
        $mail->addAttachment("../../../assets/latter/Administrasi_" .  $data['nama_lengkap'] . "_" . date('d F Y', strtotime($data['tgl_regis'])) . ".pdf");
    } else {
    }

    // Cek Surat Sakit
    if ($adaSuratSakit === "Yes") {
        $mail->addAttachment("../../../assets/latter/Surat Sakit_" .  $data2['nama_lengkap'] . "_" . date('d F Y', strtotime($data2['tgl_regis'])) . ".pdf");
    } else {
    }

    // Cek Surat Sehat
    if ($adaSuratSehat === "Yes") {
        $mail->addAttachment("../../../assets/latter/Surat Sehat_" .  $data3['nama_lengkap'] . "_" . date('d F Y', strtotime($data3['tgl_regis'])) . ".pdf");
    } else {
    }

    // Cek Surat Rujukan
    if ($adaSuratRujukan === "Yes") {
        $mail->addAttachment("../../../assets/latter/Rujukan_" .  $data4['nama_lengkap'] . "_" . date('d F Y', strtotime($data4['tgl_regis'])) . ".pdf");
    } else {
    }

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'PUSKESMAS MEDAN SUNGGAL';
    $mail->Body    = 'Kepada Pasien Puskesmas Medan Sunggal yang <b>Terhormat.</b><br>Abaikan Email ini Jika <b>Bukan</b> Data Anda.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
