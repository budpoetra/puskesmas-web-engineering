-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2023 at 07:05 AM
-- Server version: 10.5.4-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2022_web_native_puskesmas_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

DROP TABLE IF EXISTS `amount`;
CREATE TABLE IF NOT EXISTS `amount` (
  `id_amount` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_regis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id_amount`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`id_amount`, `no_regis`, `created_at`, `updated_at`, `amount`) VALUES
(1, 'NOPM-30062022-115540', '2022-06-30 05:02:15', '2022-06-30 05:02:15', 25000),
(2, 'NOPM-30062022-123704', '2022-06-30 05:45:25', '2022-06-30 05:45:25', 37000),
(3, 'NOPM-30062022-131801', '2022-06-30 06:36:37', '2022-06-30 06:36:37', 85000),
(4, 'NOPM-22072022-153650', '2022-07-22 08:43:59', '2022-07-22 08:43:59', 520000),
(5, 'NOPM-06072022-133208', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'NOPM-06072022-133208', '2022-08-05 11:02:02', '2022-08-05 11:02:02', 0),
(7, 'NOPM-07072022-014223', '2022-08-28 17:50:07', '2022-08-28 17:50:07', 85000),
(8, 'NOPM-30082022-710882', '2022-08-30 15:27:23', '2022-08-30 15:27:23', 25000),
(9, 'NOPM-31082022-576514', '2022-08-31 11:06:10', '2022-08-31 11:06:10', 70000),
(10, 'NOPM-31082022-848511', '2022-08-31 15:39:29', '2022-08-31 15:39:29', 35000),
(11, 'NOPM-01092022-668055', '2022-09-01 07:06:00', '2022-09-01 07:06:00', 30000),
(12, 'NOPM-11092022-817847', '2022-09-10 18:28:33', '2022-09-10 18:28:33', 70000),
(13, 'NOPM-11092022-817847', '2022-09-10 18:30:34', '2022-09-10 18:30:34', 70000),
(14, 'NOPM-11092022-817847', '2022-09-10 18:34:09', '2022-09-10 18:34:09', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `aturan_pakai`
--

DROP TABLE IF EXISTS `aturan_pakai`;
CREATE TABLE IF NOT EXISTS `aturan_pakai` (
  `id_aturan_pakai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aturan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_aturan_pakai`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aturan_pakai`
--

INSERT INTO `aturan_pakai` (`id_aturan_pakai`, `aturan`) VALUES
(1, ' /  /  / '),
(2, '1 X 1 /  /  / '),
(3, '1 X 1 /  / Malam / '),
(4, '1 X 1 /  / Pagi / '),
(5, '1 X 1 / Bungkus / Malam / Sesudah Makan'),
(6, '1 X 1 / Kapsul / Malam / Sesudah Makan'),
(7, '1 X 1 / Kapsul / Pagi / Sesudah Makan'),
(8, '1 X 1 / Kapsul / Sore / Sebelum Makan'),
(9, '1 X 1 / Tablet / Malam / '),
(10, '1 X 1 / Tablet / Malam / Saat Makan'),
(11, '1 X 1 / Tablet / Malam / Sebelum Makan'),
(12, '1 X 1 / Tablet / Malam / Sesaat Makan'),
(13, '1 X 1 / Tablet / Malam / Sesudah Makan'),
(14, '1 X 1 / Tablet / Pagi - Malam / Sesudah Makan'),
(15, '1 X 1 / Tablet / Pagi / Sesudah Makan'),
(16, '1 X 1 / Tablet / Sore - Malam / Sesudah Makan'),
(17, '1 X 1 / Tablet / Sore / Sebelum Makan'),
(18, '1 X 1 / Tablet / Sore / Sesudah Makan'),
(19, '1 X 1 Â½ /  /  / '),
(20, '1 X 2 / Kapsul / Sore / Sebelum Makan'),
(21, '1 X 2 / Tablet / Malam / Sesudah Makan'),
(22, '1 X 2 / Tablet / Pagi - Malam / Sesudah Makan'),
(23, '1 X 2 / Tablet / Sore / Sebelum Makan'),
(24, '1 X 2 / Tablet / Sore / Sesudah Makan'),
(25, '1 X Â¼ /  /  / '),
(26, '1 X Â½ /  /  / '),
(27, '1 X Â½ /  / Malam / '),
(28, '1 X Â½ / Tablet / Malam / Sesudah Makan'),
(29, '2 X 1 /  /  / '),
(30, '2 X 1 /  / Pagi - Malam / '),
(31, '2 X 1 / Bungkus / Pagi - Malam / Sesudah Makan'),
(32, '2 X 1 / Tablet / Malam / Sesudah Makan'),
(33, '2 X 1 / Tablet / Pagi - Malam / '),
(34, '2 X 1 / Tablet / Pagi - Malam / Sebelum Makan'),
(35, '2 X 1 / Tablet / Pagi - Malam / Sesudah Makan'),
(36, '2 X 1 / Tablet / Pagi - Sore / Sesudah Makan'),
(37, '2 X 1 Â½ /  /  / '),
(38, '2 X 1 Â½ / Tablet / Pagi - Malam / Sesudah Makan'),
(39, '2 X 2 / Tablet / Pagi - Malam / Sesudah Makan'),
(40, '2 X Â½ /  / Pagi - Malam / '),
(41, '2 X Â½ / Tablet / Malam / Sesudah Makan'),
(42, '2 X Â½ / Tablet / Pagi - Malam / Sesudah Makan'),
(43, '3 X 1 / Tablet / Pagi - Malam / Sesudah Makan'),
(44, '3 X 1 / Tablet / Pagi - Siang - Malam / Sebelum Makan'),
(45, '3 X 1 / Tablet / Pagi - Siang - Malam / Sesudah Makan'),
(46, '3 X 1 / Tablet / Pagi - Siang - Sore / Sebelum Makan'),
(47, '3 X 1 / Tablet / Pagi - Siang - Sore / Sesudah Makan'),
(48, '3 X Â¼ / Tablet / Pagi - Siang - Malam / Sesudah Makan'),
(49, '3 X Â½ / Tablet / Malam / Sesudah Makan'),
(50, '3 X Â½ / Tablet / Pagi - Siang - Malam / Sesudah Makan');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 'BRG-30062022-131159', 'antimo', 5000, '2022-06-30 06:13:57', '2022-06-30 06:13:57'),
(2, 'BRG-22072022-153431', 'Paracetamol', 50000, '2022-07-22 08:35:26', '2022-07-22 08:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengguna`
--

DROP TABLE IF EXISTS `data_pengguna`;
CREATE TABLE IF NOT EXISTS `data_pengguna` (
  `id_pengguna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL DEFAULT current_timestamp(),
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_pengguna`
--

INSERT INTO `data_pengguna` (`id_pengguna`, `username`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `spesialis`, `created_at`, `updated_at`, `photo`, `gender`, `jabatan`) VALUES
(14, 'dradmin', 'Dr. Admin. Ph.D', 'Jl. Jalan, Medan.', 'Medan', '1986-10-16', '0987', 'Jantung', '2022-08-31 15:26:58', '2022-09-10 18:50:05', 'img-20220911-980343admin.jpg', 'Laki - Laki', 'dokter'),
(15, 'resepsionis', 'Resepsionis', 'Jl. Jalan, Medan.', 'Medan', '1978-06-06', '09876', '', '2022-08-31 15:29:29', '2022-08-31 15:29:29', 'img-31082022-302425user-small.png', 'Perempuan', 'resepsionis'),
(18, 'sakibmartin', 'Dr. Sakib Martin Sp.A', 'Jl. Murai', 'Medan', '1990-03-22', '0987654321', 'Anak', '2022-09-10 18:43:47', '2022-09-10 18:43:47', 'img-11092022-204054dokter.jpg', 'Laki - Laki', 'dokter'),
(19, 'marianainggolan', 'Dr. Maria Nainggolan Sp.PD', 'Jl. Merdeka', 'Binjai', '1970-10-21', '0987654321', 'Penyakit Dalam', '2022-09-10 18:45:23', '2022-09-10 18:45:23', 'img-11092022-507359dokter.jpg', 'Perempuan', 'dokter'),
(20, 'aldaharianzapasaribu', 'Dr. Alda Harianza Pasaribu', 'Jl. Garuda', 'Medan', '1987-02-24', '0987654321', 'Dokter Umum', '2022-09-10 18:47:23', '2022-09-10 18:47:23', 'img-11092022-704981dokter.jpg', 'Perempuan', 'dokter'),
(21, 'alpian', 'Dr. Alpian Sp.KK', 'Jl. Cendrawasih', 'Pekanbaru', '1977-07-23', '0987654321', 'Kulit dan Kelamin', '2022-09-10 18:48:57', '2022-09-10 18:48:57', 'img-11092022-894515dokter.jpg', 'Laki - Laki', 'dokter');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

DROP TABLE IF EXISTS `login_user`;
CREATE TABLE IF NOT EXISTS `login_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `id_pengguna`, `id_pasien`, `email`, `username`, `password`, `jabatan`) VALUES
(1, 0, 0, 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admistrator'),
(60, 0, 10, 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'customer'),
(58, 0, 9, '123@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 'customer'),
(57, 0, 8, 'pasien@gmail.com', 'pasien', 'f5c25a0082eb0748faedca1ecdcfb131', 'customer'),
(56, 15, 0, 'resepsionis@gmail.com', 'resepsionis', '3aeff485f68b360d076de3d73f9247ad', 'resepsionis'),
(55, 14, 0, 'dradmin@gmail.com', 'dradmin', 'c3ca4800424e539f861a51a86b8b13ed', 'dokter'),
(62, 0, 11, 'bsahputra12333@gmail.com', 'bsahputra', '64c718a963e0db62f4a9277f6581c864', 'customer'),
(63, 18, 0, 'sakibmartin@gmail.com', 'sakibmartin', '5f4dcc3b5aa765d61d8327deb882cf99', 'dokter'),
(64, 19, 0, 'marianainggolan@gmail.com', 'marianainggolan', '5f4dcc3b5aa765d61d8327deb882cf99', 'dokter'),
(65, 20, 0, 'aldaharianzapasaribu@gmail.com', 'aldaharianzapasaribu', '5f4dcc3b5aa765d61d8327deb882cf99', 'dokter'),
(66, 21, 0, 'alpian@gmail.com', 'alpian', '5f4dcc3b5aa765d61d8327deb882cf99', 'dokter');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_message`, `id_pengirim`, `id_penerima`, `message`, `date`) VALUES
(1, 8, 15, 'hai', '2022-09-10 08:35:56'),
(2, 15, 8, 'Hai Juga', '2022-09-10 08:35:56'),
(3, 8, 15, 'Kamu lagi apa?', '2022-09-10 09:17:41'),
(4, 8, 15, 'Gabut nii', '2022-09-10 09:18:17'),
(5, 8, 15, 'hai', '2022-09-10 17:03:50'),
(6, 8, 15, '?', '2022-09-10 17:04:34'),
(7, 8, 15, 'test', '2022-09-10 17:04:43'),
(8, 8, 15, 'hai', '2022-09-10 17:23:15'),
(9, 15, 8, 'hai', '2022-09-10 17:30:28'),
(10, 8, 15, 'test', '2022-09-10 17:31:24'),
(11, 15, 8, 'oke nyambung', '2022-09-10 17:31:34'),
(12, 9, 15, 'test', '2022-09-09 17:31:24'),
(13, 8, 15, 'oke', '2022-09-10 18:16:35'),
(14, 15, 8, 'oke', '2022-09-10 18:20:47'),
(15, 8, 15, 'tes', '2022-09-13 09:57:40'),
(16, 8, 15, 'testing', '2022-09-13 09:58:04'),
(17, 15, 8, 'oke', '2022-09-13 09:58:21'),
(18, 15, 8, 'asdads', '2022-09-13 10:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_rekam_medis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_orang_tua` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bpjs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_identitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stts` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goldar` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `no_identitas_2` (`no_identitas`),
  KEY `no_identitas_3` (`no_identitas`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_rekam_medis`, `nama_lengkap`, `nama_orang_tua`, `tempat_lahir`, `tgl_lahir`, `gender`, `agama`, `alamat`, `keterangan`, `bpjs`, `created_at`, `updated_at`, `no_identitas`, `stts`, `goldar`) VALUES
(8, 'NORM-31082022-339911', 'Pasien Puskesmas', 'Puskesmas', 'Medan', '1983-06-13', 'Laki - Laki', 'Islam', 'Jl. Jalan, Medan.', NULL, '', '2022-08-31 15:31:11', '2022-08-31 16:53:31', '1234567890', 'No Regis', 'AB'),
(9, 'NORM-31082022-771365', '123', '123', 'Medan', '2022-08-04', 'Laki - Laki', '1', '123', NULL, '12', '2022-08-31 16:56:06', '2022-08-31 16:56:21', '123', 'No Regis', 'A'),
(10, 'NORM-01092022-747532', 'user', 'user', 'Medan', '2022-08-31', 'Laki - Laki', 'Islam', 'jl. medan', NULL, '', '2022-09-01 06:56:50', '2022-09-01 07:07:31', '123456', 'No Regis', 'AB'),
(11, 'NORM-11092022-720360', 'Budi Sahputra', 'Up Gan', 'Medan', '2002-06-30', 'Laki - Laki', 'Islam', 'Jl. Murai', NULL, '', '2022-09-10 18:23:16', '2022-09-10 18:23:51', '123123124', 'No Regis', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

DROP TABLE IF EXISTS `pemeriksaan`;
CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `id_pemeriksaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemeriksaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` double NOT NULL,
  `kategori` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemeriksaan`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `pemeriksaan`, `tarif`, `kategori`, `created_at`, `updated_at`) VALUES
(6, 'Cek Up', 20000, 'kia', NULL, NULL),
(7, 'Cek Up Ibu Hamil', 50000, 'kia', NULL, NULL),
(8, 'Cek Up', 20000, 'lansia', NULL, NULL),
(9, 'Cek Up', 20000, 'umum', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

DROP TABLE IF EXISTS `registrasi`;
CREATE TABLE IF NOT EXISTS `registrasi` (
  `id_registrasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `poli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cara_masuk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_dokter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pasien` int(11) NOT NULL,
  `tgl_regis` date DEFAULT NULL,
  `no_regis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_pemeriksaan` int(11) DEFAULT NULL,
  `biaya_konsultasi` int(11) DEFAULT NULL,
  `biaya_lain` int(11) DEFAULT NULL,
  `usia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergi_makanan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alergi_udara` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alergi_obat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lingkar_perut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sistole` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diastole` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respi_rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heart_rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kesadaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suhu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kunjungan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pulang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_surat_meninggal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rs_rujukan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_rs_rujukan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_pem_rujukan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosa_rujukan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terapi_rujukan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_dokter_rujukan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_obat_rujukan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perawatan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindakan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stts` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_registrasi`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `poli`, `cara_masuk`, `nama_dokter`, `keluhan`, `diagnosa`, `id_pasien`, `tgl_regis`, `no_regis`, `biaya_pemeriksaan`, `biaya_konsultasi`, `biaya_lain`, `usia`, `alergi_makanan`, `alergi_udara`, `alergi_obat`, `tinggi_badan`, `berat_badan`, `lingkar_perut`, `imt`, `sistole`, `diastole`, `respi_rate`, `heart_rate`, `kesadaran`, `suhu`, `jenis_kunjungan`, `status_pulang`, `no_surat_meninggal`, `rs_rujukan`, `jenis_rs_rujukan`, `hasil_pem_rujukan`, `diagnosa_rujukan`, `terapi_rujukan`, `biaya_dokter_rujukan`, `biaya_obat_rujukan`, `perawatan`, `tindakan`, `ket`, `created_at`, `updated_at`, `stts`) VALUES
(23, 'Umum', 'DATANG SENDIRI', 'Dr. Admin. Ph.D', 'Sakit Perut', 'Diare', 8, '2022-08-31', 'NOPM-31082022-848511', 10000, 10000, 0, '21', '-', '-', '-', '167', '50', '35', '14.97', '-', '-', '-', '-', 'Sadar', '29', 'Kunjungan Sehat', 'Rawat Jalan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Disuntik', 'Istirahat', '', '2022-08-31 15:34:12', '2022-08-31 15:39:29', 'Done'),
(24, 'Umum', 'DATANG SENDIRI', 'Dr. Admin. Ph.D', 'Sakit Perut', 'Diare', 8, '2022-08-31', 'NOPM-31082022-767306', NULL, NULL, NULL, '21', '-', '-', '-', '167', '50', '35', '14.97', '-', '-', '-', '-', 'Sadar', '29', 'Kunjungan Sakit', 'Rujuk', NULL, 'RS Royal Prima', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2022-08-31 15:44:09', '2022-08-31 15:50:53', 'Close'),
(25, 'Umum', 'DATANG SENDIRI', 'Dr. Admin. Ph.D', 'Sakit Perut', 'Diare', 8, '2022-08-31', 'NOPM-31082022-2866', NULL, NULL, NULL, '21', '-', '-', '-', '167', '50', '35', '14.97', '-', '-', '-', '-', 'Sadar', '29', 'Kunjungan Sehat', 'Rawat Jalan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2022-08-31 16:54:25', '2022-08-31 16:57:26', 'Close'),
(27, 'Umum', 'DATANG SENDIRI', 'Dr. Admin. Ph.D', 'Sakit Perut', 'Diare', 10, '2022-09-01', 'NOPM-01092022-668055', 10000, 10000, 0, '21', 'Udang', '-', '-', '167', '50', '35', '14.97', '-', '-', '-', '-', 'Sadar', '29', 'Kunjungan Sehat', 'Rawat Jalan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Disuntik', 'Istirahat', '-', '2022-09-01 06:59:32', '2022-09-01 07:06:00', 'Done'),
(28, 'Umum', 'DATANG SENDIRI', 'Dr. Admin. Ph.D', 'Sakit', 'Sakit', 10, '2022-09-01', 'NOPM-01092022-6055', NULL, NULL, NULL, '21', '-', '-', '-', '167', '50', '35', '14.97', '-', '-', '-', '-', 'Sadar', '29', 'Kunjungan Sehat', 'Rujuk', NULL, 'RS Royal Prima', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '2022-09-01 07:08:22', '2022-09-01 07:12:08', 'Close'),
(29, 'Umum', 'DATANG SENDIRI', 'Dr. Admin. Ph.D', 'Sakit Perut', 'Diare', 11, '2022-09-11', 'NOPM-11092022-817847', 10000, 10000, 0, '20', 'kepiting', 'tidak ada', 'tidak ada', '167', '78', '46', '23.35', '70', '80', '60', '40', 'Sadar', '36', 'Kunjungan Sehat', 'Rawat Jalan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Disuntik', 'Minum Obat', '-', '2022-09-10 18:23:51', '2022-09-10 18:34:09', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

DROP TABLE IF EXISTS `resep`;
CREATE TABLE IF NOT EXISTS `resep` (
  `id_resep` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_regis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aturan_pakai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `kode_barang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_resep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `no_regis`, `aturan_pakai`, `jumlah_barang`, `kode_barang`, `nama_barang`, `harga`, `total_harga`, `created_at`, `updated_at`, `no_resep`) VALUES
(9, 'NOPM-31082022-848511', '1 X 1 /  / Malam / ', 3, 'BRG-30062022-131159', 'antimo', '5000', 15000, '2022-08-31 15:36:03', NULL, 'RES-31082022-266138'),
(10, 'NOPM-01092022-668055', '1 X 1 / Bungkus / Malam / Sesudah Makan', 2, 'BRG-30062022-131159', 'antimo', '5000', 10000, '2022-09-01 07:02:00', NULL, 'RES-01092022-984956'),
(11, 'NOPM-11092022-817847', '1 X 1 /  / Pagi / ', 1, 'BRG-22072022-153431', 'Paracetamol', '50000', 50000, '2022-09-10 18:26:45', NULL, 'RES-11092022-332216');

-- --------------------------------------------------------

--
-- Table structure for table `rujukan`
--

DROP TABLE IF EXISTS `rujukan`;
CREATE TABLE IF NOT EXISTS `rujukan` (
  `id_rujukan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hold_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_regis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rujukan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rujukan`
--

INSERT INTO `rujukan` (`id_rujukan`, `id_pasien`, `hold_in`, `no_regis`, `created_at`, `updated_at`) VALUES
(5, '8', 'RS Royal Prima', 'NOPM-31082022-767306', '2022-08-31 15:49:24', '2022-08-31 15:49:24'),
(6, '10', 'RS Royal Prima', 'NOPM-01092022-6055', '2022-09-01 07:11:45', '2022-09-01 07:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `surat_sakit`
--

DROP TABLE IF EXISTS `surat_sakit`;
CREATE TABLE IF NOT EXISTS `surat_sakit` (
  `id_surat_sakit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_regis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_periksa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_badan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_istirahat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat_sakit`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_sakit`
--

INSERT INTO `surat_sakit` (`id_surat_sakit`, `nomor_surat`, `no_regis`, `hasil_periksa`, `kondisi_badan`, `keterangan_istirahat`, `created_at`, `updated_at`) VALUES
(5, 'SKT-00001', 'NOPM-31082022-848511', 'Sakit', 'Sangat Sakit', '-', '2022-08-31 15:36:48', '2022-08-31 15:36:48'),
(6, 'SKT-00002', 'NOPM-01092022-668055', 'Sakit', 'Sangat Sakit', '-', '2022-09-01 07:02:48', '2022-09-01 07:02:48'),
(7, 'SKT-00003', 'NOPM-11092022-817847', 'Sakit', 'Parah', 'Harus Istirahat', '2022-09-10 18:27:14', '2022-09-10 18:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `surat_sehat`
--

DROP TABLE IF EXISTS `surat_sehat`;
CREATE TABLE IF NOT EXISTS `surat_sehat` (
  `id_surat_sehat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_regis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_badan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggi_badan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekanan_darah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulse_of` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_blind` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat_sehat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_sehat`
--

INSERT INTO `surat_sehat` (`id_surat_sehat`, `no_regis`, `no_surat`, `ket_surat`, `pekerjaan`, `berat_badan`, `tinggi_badan`, `tekanan_darah`, `bulse_of`, `vos`, `vod`, `blood_group`, `color_blind`, `created_at`, `updated_at`) VALUES
(3, 'NOPM-31082022-848511', 'SHT-00001', 'Untuk Liburan', 'Kurir', '50', '167', '- / -', '-', '-', '-', 'AB', 'Tidak Buta Warna', '2022-08-31 15:37:16', '2022-08-31 15:37:16'),
(4, 'NOPM-01092022-668055', 'SHT-00002', 'cuti', 'Kurir', '50', '167', '- / -', '-', '-', '-', 'AB', 'Tidak Buta Warna', '2022-09-01 07:03:23', '2022-09-01 07:03:23'),
(5, 'NOPM-11092022-817847', 'SHT-00003', 'Perjalanan Kerja', 'Freelance', '78', '167', '70 / 80', '123', '6', '6', 'O', 'Tidak Buta Warna', '2022-09-10 18:28:10', '2022-09-10 18:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_antrian`
--

DROP TABLE IF EXISTS `tbl_antrian`;
CREATE TABLE IF NOT EXISTS `tbl_antrian` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `no_antrian` smallint(6) NOT NULL,
  `poli` varchar(191) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_antrian`
--

INSERT INTO `tbl_antrian` (`id`, `tanggal`, `no_antrian`, `poli`, `id_pasien`, `status`, `updated_date`) VALUES
(69, '2022-08-31', 1, 'Umum', 8, '1', '2022-08-31 15:34:54'),
(70, '2022-08-31', 2, 'Umum', 8, '0', '2022-08-31 15:44:14'),
(71, '2022-08-31', 3, 'Umum', 8, '0', '2022-08-31 16:54:28'),
(72, '2022-08-31', 4, 'Umum', 9, '0', '2022-08-31 16:57:05'),
(73, '2022-09-01', 1, 'Umum', 10, '1', '2022-09-01 07:00:13'),
(74, '2022-09-01', 2, 'Umum', 10, '1', '2022-09-01 07:08:35'),
(75, '2022-09-11', 1, 'Umum', 11, '0', '2022-09-10 18:24:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
