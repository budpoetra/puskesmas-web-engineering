<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
session_start();
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../../../config/koneksi.php";

  // set waktu
  date_default_timezone_set('Asia/Jakarta');
  $tanggal = date("Y-m-d");

  // ambil data post
  $id_pasien = $_POST['id_pasien'];
  $poli = $_POST['poli'];

  // membuat "no_antrian"
  // sql statement untuk menampilkan data "no_antrian" terakhir pada tabel "tbl_antrian" berdasarkan "tanggal"
  $query = mysqli_query($koneksi, "SELECT max(no_antrian) as nomor FROM tbl_antrian WHERE tanggal='$tanggal' AND poli='$poli'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
  // ambil jumlah baris data hasil query
  $rows = mysqli_num_rows($query);

  // cek hasil query
  // jika "no_antrian" sudah ada
  if ($rows <> 0) {
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // "no_antrian" = "no_antrian" yang terakhir + 1
    $no_antrian = $data['nomor'] + 1;
  }
  // jika "no_antrian" belum ada
  else {
    // "no_antrian" = 1
    $no_antrian = 1;
  }
  try {
    // sql statement untuk insert data ke tabel "tbl_antrian"
    $insert = mysqli_query($koneksi, "INSERT INTO tbl_antrian(tanggal, no_antrian, poli, id_pasien) VALUES('$tanggal', '$no_antrian', '$poli', '$id_pasien')") or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
    $output = array(
      'status' => 'success'
    );
    echo json_encode($output);
  } catch (Exception $e) {
    $output = [
      'status' => 'Failed',
      'msg' => $e->getMessage()
    ];
    echo json_encode($output);
  }
}
