<?php
include 'koneksi.php';
$aksi = $_GET['aksi'];
date_default_timezone_set('Asia/Jakarta');

// Pemeriksaan
if ($aksi == "menuPemeriksaan") {
    $no_regis = $_POST['no_regis'];
    $query = $koneksi->query("SELECT * FROM registrasi WHERE no_regis = '$no_regis'");
    $data = mysqli_fetch_assoc($query);
    $output = [
        "suhu" => $data['suhu'],
        "alergi_makanan" => $data['alergi_makanan'],
        "alergi_obat" => $data['alergi_obat'],
        "alergi_udara" => $data['alergi_udara'],
        "sistole" => $data['sistole'],
        "diastole" => $data['diastole'],
        "respi_rate" => $data['respi_rate'],
        "heart_rate" => $data['heart_rate'],
        "kesadaran" => $data['kesadaran'],
        "keluhan" => $data['keluhan'],
        "diagnosa" => $data['diagnosa'],
        "perawatan" => $data['perawatan'],
        "tindakan" => $data['tindakan']
    ];
    echo json_encode($output);
} elseif ($aksi == "simpanPemeriksaan") {
    $no_regis       = $_POST['no_regis_pemeriksaan'];
    $suhu           = $_POST['suhu_pemeriksaan'];
    $alergi_makanan = $_POST['alergi_makanan_pemeriksaan'];
    $alergi_obat    = $_POST['alergi_obat_pemeriksaan'];
    $alergi_udara   = $_POST['alergi_udara_pemeriksaan'];
    $sistole        = $_POST['sistole_pemeriksaan'];
    $diastole       = $_POST['diastole_pemeriksaan'];
    $respi_rate     = $_POST['respi_rate_pemeriksaan'];
    $heart_rate     = $_POST['heart_rate_pemeriksaan'];
    $kesadaran      = $_POST['kesadaran_pemeriksaan'];
    $keluhan        = $_POST['keluhan_pemeriksaan'];
    $diagnosa       = $_POST['diagnosa_pemeriksaan'];
    $perawatan      = $_POST['perawatan_pemeriksaan'];
    $tindakan       = $_POST['tindakan_pemeriksaan'];

    $query = $koneksi->query("UPDATE registrasi SET suhu='$suhu', alergi_makanan='$alergi_makanan', alergi_obat='$alergi_obat', alergi_udara='$alergi_udara', sistole='$sistole', diastole='$diastole', respi_rate='$respi_rate', heart_rate='$heart_rate', kesadaran='$kesadaran', keluhan='$keluhan', diagnosa='$diagnosa', perawatan='$perawatan', tindakan='$tindakan' WHERE no_regis = '$no_regis'");
    $output = [
        "msg" => 'Data Berhasil Disimpan'
    ];
    echo json_encode($output);
}

// Resep Obat
elseif ($aksi == "menuResepObat") {
    $no_regis = $_POST['no_regis'];
    $query = $koneksi->query("SELECT * FROM registrasi WHERE no_regis = '$no_regis'");
    $data = mysqli_fetch_assoc($query);
    $output = [
        "dokter" => $data['nama_dokter']
    ];
    echo json_encode($output);
} else if ($aksi == "dataResepObat") {
    $no_regis = $_GET['no_regis'];
    $query = $koneksi->query("SELECT * FROM resep WHERE no_regis = '$no_regis' ");
    $resep['data'] = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $dataResep =
            [
                'id' => $row['id_resep'],
                'nama_barang' => $row['nama_barang'],
                'jumlah_barang' => $row['jumlah_barang'],
                'harga' => $row['harga'],
                'aturan_pakai' => $row['aturan_pakai']
            ];
        array_push($resep['data'], $dataResep);
    }
    echo json_encode($resep);
} elseif ($aksi == "inputObat") {
    $no_regis = $_POST['no_regis'];
    $kodeBarang = $_POST['kodeBarang'];
    $aturanPakai = $_POST['aturanPakai'];
    $jumlahObat = $_POST['jumlahObat'];

    $ambilData = $koneksi->query("SELECT * FROM barang WHERE kode_barang = '$kodeBarang'");
    $data = mysqli_fetch_assoc($ambilData);
    $namaBarang = $data['nama_barang'];
    $harga = $data['harga_jual'];
    $totalHarga = intval($harga) * intval($jumlahObat);
    $created_at = date('Y-m-d H:i:s');

    $no_resep = "RES-" . date('dmY') . "-" . rand(000000, 999999);

    $query = $koneksi->query("INSERT INTO resep VALUES(NULL, '$no_regis', '$aturanPakai', '$jumlahObat', '$kodeBarang', '$namaBarang', '$harga', $totalHarga, '$created_at', NULL, '$no_resep')");

    $output = [
        "msg" => 'Resep Berhasil Di Input'
    ];
    echo json_encode($output);
} elseif ($aksi == "hapusResepObat") {
    $id_resep = $_POST['id_resep'];
    $query = $koneksi->query("DELETE FROM resep WHERE id_resep = '$id_resep'");
    $output = [
        "msg" => 'Resep Berhasil Dihapus'
    ];
    echo json_encode($output);
} elseif ($aksi == 'totalHargaResepObat') {
    $no_regis = $_POST['no_regis'];
    $query = $koneksi->query("SELECT SUM(total_harga) AS total_harga FROM `resep` WHERE `no_regis` = '$no_regis'");
    $data = mysqli_fetch_assoc($query);
    $output = [
        "total_harga" => $data['total_harga']
    ];
    echo json_encode($output);
}

// Biaya
elseif ($aksi == "menuBiaya") {
    $no_regis = $_POST['no_regis'];
    $query = $koneksi->query("SELECT * FROM registrasi WHERE no_regis = '$no_regis'");
    $data = mysqli_fetch_assoc($query);
    $output = [
        "biayaPemeriksaan" => $data['biaya_pemeriksaan'],
        "biayaKonsultasi" => $data['biaya_konsultasi'],
        "biayaLain" => $data['biaya_lain']
    ];
    echo json_encode($output);
} elseif ($aksi == "simpanBiaya") {
    $no_regis = $_POST['no_regis'];
    $biayaPemeriksaan = $_POST['biayaPemeriksaan'];
    $biayaKonsultasi = $_POST['biayaKonsultasi'];
    $biayaLain = $_POST['biayaLain'];
    $query = $koneksi->query("UPDATE registrasi SET biaya_pemeriksaan=$biayaPemeriksaan, biaya_konsultasi=$biayaKonsultasi, biaya_lain=$biayaLain WHERE no_regis = '$no_regis'");
    $output = [
        "msg" => 'Data Berhasil Disimpan'
    ];
    echo json_encode($output);
}

// Surat Sakit
elseif ($aksi == "menuSuratSakit") {
    $id_pasien = $_POST['id_pasien'];
    $query = $koneksi->query("SELECT * FROM registrasi INNER JOIN pasien ON (`registrasi`.id_pasien=`pasien`.id_pasien) WHERE `pasien`.id_pasien='$id_pasien' ORDER BY `registrasi`.id_registrasi DESC");
    $data = mysqli_fetch_assoc($query);

    $no_regis = $data['no_regis'];

    if (mysqli_num_rows($koneksi->query("SELECT * FROM surat_sakit WHERE no_regis='$no_regis'")) == NULL) {
        // Nomor Surat
        $query2 = $koneksi->query("SELECT COUNT(nomor_surat) AS jumlah FROM surat_sakit");
        $data2 = mysqli_fetch_assoc($query2);
        if ($data2['jumlah'] == 0) {
            $skt = 'SKT-00001';
        } else {
            $nomor = ++$data2['jumlah'];
            $skt = 'SKT-' . sprintf("%05d", $nomor);
        }

        $output = [
            "no_regis" => $data['no_regis'],
            "usia" => $data['usia'],
            "alamat" => $data['alamat'],
            "nomor_surat" => $skt,
            "hasil" => '',
            "kondisi" => '',
            "ket" => ''
        ];
        echo json_encode($output);
    } else {
        $query3 = $koneksi->query("SELECT * FROM surat_sakit WHERE no_regis='$no_regis'");
        $data3 = mysqli_fetch_assoc($query3);

        $output = [
            "no_regis" => $data['no_regis'],
            "usia" => $data['usia'],
            "alamat" => $data['alamat'],
            "nomor_surat" => $data3['nomor_surat'],
            "hasil" => $data3['hasil_periksa'],
            "kondisi" => $data3['kondisi_badan'],
            "ket" => $data3['keterangan_istirahat']
        ];
        echo json_encode($output);
    }
} elseif ($aksi == "simpanSuratSakit") {
    $no_regis = $_POST['no_regis'];
    $nomor_surat = $_POST['nomor_surat'];
    $hasil = $_POST['hasil'];
    $kondisi = $_POST['kondisi'];
    $ket = $_POST['ket'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    if (mysqli_num_rows($koneksi->query("SELECT * FROM surat_sakit WHERE nomor_surat='$nomor_surat'")) == NULL) {
        $query = $koneksi->query("INSERT INTO surat_sakit VALUES(NULL, '$nomor_surat', '$no_regis', '$hasil', '$kondisi', '$ket', '$created_at', '$created_at')");

        $output = [
            'msg' => 'Data Berhasil Disimpan'
        ];
        echo json_encode($output);
    } else {
        $query = $koneksi->query("UPDATE surat_sakit SET hasil_periksa='$hasil', kondisi_badan='$kondisi', keterangan_istirahat='$ket', updated_at='$updated_at' WHERE no_regis='$no_regis'");

        $output = [
            'msg' => 'Data Berhasil Diubah'
        ];
        echo json_encode($output);
    }
} elseif ($aksi == "cetakSuratSakit") {
    $no_regis = $_POST['no_regis'];
    if (mysqli_num_rows($koneksi->query("SELECT * FROM surat_sakit WHERE no_regis='$no_regis'")) == NULL) {
        $output = [
            'status' => 'error',
            'msg' => 'Simpan Terlebih Dahulu'
        ];
        echo json_encode($output);
    } else {
        $output = [
            'status' => 'success',
            'msg' => '../pdf/pdf-surat_sakit.php?regis=' . $no_regis
        ];
        echo json_encode($output);
    }
}

// Surat Sehat
elseif ($aksi == "menuSuratSehat") {
    $id_pasien = $_POST['id_pasien'];
    $query = $koneksi->query("SELECT * FROM registrasi INNER JOIN pasien ON (`registrasi`.id_pasien=`pasien`.id_pasien) WHERE `pasien`.id_pasien='$id_pasien' ORDER BY `registrasi`.id_registrasi DESC");
    $data = mysqli_fetch_assoc($query);

    $no_regis = $data['no_regis'];

    if (mysqli_num_rows($koneksi->query("SELECT * FROM surat_sehat WHERE no_regis='$no_regis'")) == NULL) {
        // Nomor Surat
        $query2 = $koneksi->query("SELECT COUNT(no_surat) AS jumlah FROM surat_sehat");
        $data2 = mysqli_fetch_assoc($query2);
        if ($data2['jumlah'] == 0) {
            $sht = 'SHT-00001';
        } else {
            $nomor = ++$data2['jumlah'];
            $sht = 'SHT-' . sprintf("%05d", $nomor);
        }

        $output = [
            "no_regis" => $data['no_regis'],
            "usia" => $data['usia'],
            "alamat" => $data['alamat'],
            "gender" => $data['gender'],
            "berat_badan" => $data['berat_badan'],
            "tinggi_badan" => $data['tinggi_badan'],
            "goldar" => $data['goldar'],
            "tekanan_darah" => $data['sistole'] . ' / ' . $data['diastole'],
            "nomor_surat" => $sht,
            "pekerjaan" => '',
            "ket" => '',
            "denyut_nadi" => '',
            "vos" => '',
            "vod" => '',
            "buta_warna" => ''
        ];
        echo json_encode($output);
    } else {
        $query3 = $koneksi->query("SELECT * FROM surat_sehat WHERE no_regis='$no_regis'");
        $data3 = mysqli_fetch_assoc($query3);

        $output = [
            "no_regis" => $data['no_regis'],
            "usia" => $data['usia'],
            "alamat" => $data['alamat'],
            "gender" => $data['gender'],
            "berat_badan" => $data3['berat_badan'],
            "tinggi_badan" => $data3['tinggi_badan'],
            "goldar" => $data['goldar'],
            "tekanan_darah" => $data3['tekanan_darah'],
            "nomor_surat" => $data3['no_surat'],
            "pekerjaan" => $data3['pekerjaan'],
            "ket" => $data3['ket_surat'],
            "denyut_nadi" => $data3['bulse_of'],
            "vos" => $data3['vos'],
            "vod" => $data3['vod'],
            "buta_warna" => $data3['color_blind']
        ];
        echo json_encode($output);
    }
} elseif ($aksi == "cetakSuratSehat") {
    $no_regis = $_POST['no_regis'];
    if (mysqli_num_rows($koneksi->query("SELECT * FROM surat_sehat WHERE no_regis='$no_regis'")) == NULL) {
        $output = [
            'status' => 'error',
            'msg' => 'Simpan Terlebih Dahulu'
        ];
        echo json_encode($output);
    } else {
        $output = [
            'status' => 'success',
            'msg' => '../pdf/pdf-surat_sehat.php?regis=' . $no_regis
        ];
        echo json_encode($output);
    }
} elseif ($aksi == "simpanSuratSehat") {
    $no_regis = $_POST['no_regis'];
    $nomor_surat = $_POST['nomor_surat'];
    $ket = $_POST['ket'];
    $pekerjaan = $_POST['pekerjaan'];
    $berat_badan = $_POST['berat_badan'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $tekanan_darah = $_POST['darah'];
    $denyut_nadi = $_POST['denyut'];
    $vos = $_POST['vos'];
    $vod = $_POST['vod'];
    $goldar = $_POST['goldar'];
    $buta_warna = $_POST['buta_warna'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    if (mysqli_num_rows($koneksi->query("SELECT * FROM surat_sehat WHERE no_surat='$nomor_surat'")) == NULL) {
        $query = $koneksi->query("INSERT INTO surat_sehat VALUES(NULL, '$no_regis', '$nomor_surat', '$ket', '$pekerjaan', '$berat_badan', '$tinggi_badan', '$tekanan_darah', '$denyut_nadi', '$vos', '$vod', '$goldar', '$buta_warna', '$created_at', '$created_at')");

        $output = [
            'msg' => 'Data Berhasil Disimpan'
        ];
        echo json_encode($output);
    } else {
        $query = $koneksi->query("UPDATE surat_sehat SET ket_surat='$ket', pekerjaan='$pekerjaan', berat_badan='$berat_badan', tinggi_badan='$tinggi_badan', tekanan_darah='$tekanan_darah', bulse_of='$denyut_nadi', vos='$vos', vod='$vod', blood_group='$goldar', color_blind='$buta_warna', updated_at='$updated_at' WHERE no_regis='$no_regis'");

        $output = [
            'msg' => 'Data Berhasil Diubah'
        ];
        echo json_encode($output);
    }
}

// Rujukan
elseif ($aksi == "menuRujukan") {
    $no_regis = $_POST['no_regis'];
    $query = $koneksi->query("SELECT * FROM registrasi WHERE no_regis = '$no_regis'");
    $data = mysqli_fetch_assoc($query);
    $output = [
        "id_pasien" => $data['id_pasien'],
        "keluhan" => $data['keluhan'],
        "rs_rujukan" => $data['rs_rujukan']
    ];
    echo json_encode($output);
} elseif ($aksi == "simpanRujukan") {
    $id_pasien = $_POST['id_pasien'];
    $no_regis = $_POST['no_regis'];
    $rs_rujukan = $_POST['rs_rujukan'];
    $created_at = date('Y-m-d H:i:s');
    $query = $koneksi->query("UPDATE registrasi SET rs_rujukan='$rs_rujukan' WHERE no_regis='$no_regis'");
    $query2 = $koneksi->query("INSERT INTO rujukan VALUES(NULL, $id_pasien, '$rs_rujukan', '$no_regis', '$created_at', '$created_at')");
    $output = [
        "msg" => 'Data Berhasil Disimpan'
    ];
    echo json_encode($output);
}

// Hapus Pemeriksaan
elseif ($aksi == "hapusPemeriksaan") {
    $no_regis = $_POST['no_regis'];
    $query = $koneksi->query("DELETE FROM registrasi WHERE no_regis='$no_regis'");
    $output = [
        "msg" => 'Data Berhasil Dihapus'
    ];
    echo json_encode($output);
}

// Ubah Pemeriksaan
elseif ($aksi == "menuUbahPemeriksaan") {
    $no_regis = $_POST['no_regis'];
    $query = $koneksi->query("SELECT * FROM registrasi WHERE no_regis='$no_regis'");
    $data = mysqli_fetch_assoc($query);
    $output = [
        "poli" => $data['poli'],
        "jenis_kunjungan" => $data['jenis_kunjungan'],
        "cara_masuk" => $data['cara_masuk'],
        "tanggal_pemeriksaan" => date('Y-m-d', strtotime($data['updated_at'])),
        "kesadaran" => $data['kesadaran'],
        "tinggi_badan" => $data['tinggi_badan'],
        "berat_badan" => $data['berat_badan'],
        "lingkar_perut" => $data['lingkar_perut'],
        "imt" => $data['imt'],
        "suhu" => $data['suhu'],
        "alergi_makanan" => $data['alergi_makanan'],
        "alergi_udara" => $data['alergi_udara'],
        "alergi_obat" => $data['alergi_obat'],
        "sistole" => $data['sistole'],
        "diastole" => $data['diastole'],
        "respi_rate" => $data['respi_rate'],
        "heart_rate" => $data['heart_rate'],
    ];
    echo json_encode($output);
} elseif ($aksi == "simpanUbahPemeriksaan") {
    $no_regis = $_POST['no_regis_ubahPemeriksaan'];
    $poli = $_POST['poli'];
    $jenis_kunjungan = $_POST['jenis_kunjungan'];
    $cara_masuk = $_POST['cara_masuk'];
    $tanggal_pemeriksaan = $_POST['tanggal_pemeriksaan'];
    $tanggal_pemeriksaan .= date(' H:i:s');
    $kesadaran = $_POST['kesadaran'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $lingkar_perut = $_POST['lingkar_perut'];
    $suhu = $_POST['suhu'];
    $imt = round(floatval($berat_badan) / ((floatval($tinggi_badan) * 2) / 100), 2);
    $alergi_makanan = $_POST['alergi_makanan'];
    $alergi_udara = $_POST['alergi_udara'];
    $alergi_obat = $_POST['alergi_obat'];
    $sistole = $_POST['sistole'];
    $diastole = $_POST['diastole'];
    $respi_rate = $_POST['respi_rate'];
    $heart_rate = $_POST['heart_rate'];

    $query = $koneksi->query("UPDATE registrasi SET poli='$poli', jenis_kunjungan='$jenis_kunjungan', cara_masuk='$cara_masuk', updated_at='$tanggal_pemeriksaan', kesadaran='$kesadaran', tinggi_badan='$tinggi_badan', berat_badan='$berat_badan', lingkar_perut='$lingkar_perut', suhu='$suhu', imt='$imt', alergi_makanan='$alergi_makanan', alergi_udara='$alergi_udara', alergi_obat='$alergi_obat', sistole='$sistole', diastole='$diastole', respi_rate='$respi_rate', heart_rate='$heart_rate' WHERE no_regis='$no_regis'");

    if ($query) {
        $output = [
            'status' => 'success',
            'msg' => 'Data Pemeriksaan Berhasil Diubah'
        ];
        echo json_encode($output);
    } else {
        $output = [
            'status' => 'orror',
            'msg' => 'Data Pemeriksaan Gagal Diubah'
        ];
        echo json_encode($output);
    }
}

// Selesai Pemeriksaan
elseif ($aksi == "selesaiPemeriksaan") {
    $no_regis = $_POST['no_regis'];
    $status_pulang = $_POST['status_pulang'];

    // set waktu
    date_default_timezone_set('Asia/Jakarta');
    $updated_at = date('Y/m/d H:i:s');
    $query = $koneksi->query("UPDATE registrasi SET status_pulang='$status_pulang', updated_at='$updated_at', stts='Close' WHERE no_regis='$no_regis'");
    $output = [
        "msg" => 'Data Berhasil Diselesaikan'
    ];
    echo json_encode($output);
}

// Detail Pemeriksaan
elseif ($aksi == "menuDetailPemeriksaan") {
    $id_registrasi = $_POST['id_registrasi'];
    $query = $koneksi->query("SELECT * FROM registrasi WHERE id_registrasi=$id_registrasi");
    $data = mysqli_fetch_assoc($query);
    $output = [
        'keluhan' => $data['keluhan'],
        'diagnosa' => $data['diagnosa'],
        'perawatan' => $data['perawatan'],
        'tindakan' => $data['tindakan'],
        'biaya_pemeriksaan' => $data['biaya_pemeriksaan'],
        'biaya_konsultasi' => $data['biaya_konsultasi'],
        'biaya_lain' => $data['biaya_lain']
    ];
    echo json_encode($output);
}
