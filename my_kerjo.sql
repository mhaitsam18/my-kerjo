-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 02:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_kerjo`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pegawai` int(11) UNSIGNED NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status_kehadiran` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pekerjaan` int(11) UNSIGNED NOT NULL,
  `plat_mobil` varchar(100) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `id_pekerjaan`, `plat_mobil`, `nama_mobil`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'B 1234 B', 'Toyota Avanza', 0, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(2, 2, 'B 1234 B', 'Honda Brio', 0, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(3, 3, 'B 1234 B', 'Toyota Yaris', 1, '2022-08-12 11:11:27', '2022-08-12 17:01:58'),
(4, 4, 'B 1234 B', 'Daihatsu Xenia', 1, '2022-08-12 11:11:27', '2022-08-12 17:11:33'),
(5, 5, 'B 1234 B', 'Toyota Corolla', 0, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(6, 2, 'T 1462 RFH', 'BMW i532', 0, '2022-08-12 19:54:25', '2022-08-12 19:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `bagian_pegawai`
--

CREATE TABLE `bagian_pegawai` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pegawai` int(11) UNSIGNED NOT NULL,
  `id_bagian` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bagian_pegawai`
--

INSERT INTO `bagian_pegawai` (`id`, `id_pegawai`, `id_bagian`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pegawai` int(11) UNSIGNED NOT NULL,
  `tahun` int(4) UNSIGNED NOT NULL,
  `bulan` int(2) UNSIGNED NOT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `durasi_cuti` int(11) DEFAULT NULL,
  `alasan` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `bukti_pendukung` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `id_pegawai`, `tahun`, `bulan`, `tanggal_mulai`, `tanggal_selesai`, `durasi_cuti`, `alasan`, `keterangan`, `bukti_pendukung`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2022, 8, '2022-08-13 00:00:00', '2022-08-19 00:00:00', 6, 'Percobaan', 'coba', '1660331422_c131f57529ab9876c24c.jpg', 2, '2022-08-12 14:10:22', '2022-08-12 14:11:52'),
(2, 1, 2022, 8, '2022-08-18 00:00:00', '2022-08-30 00:00:00', 12, 'Percobaan kedua', 'Percobaan kedua', '1660339523_66d890f377ac529c5799.jpg', 0, '2022-08-12 16:25:23', '2022-08-12 16:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pekerjaan`
--

CREATE TABLE `detail_pekerjaan` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pekerjaan` int(11) UNSIGNED NOT NULL,
  `detail_pekerjaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_pekerjaan`
--

INSERT INTO `detail_pekerjaan` (`id`, `id_pekerjaan`, `detail_pekerjaan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Membersihkan permukaan dengan amplas', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(2, 1, 'Aplikasikan dempul', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(3, 1, 'Pengamplasan permukaan dempul yang tidak rata setelah kering', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(4, 1, 'Masking permukaan mobil yang tidak di cat', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(5, 1, 'Penyemprotan cat dasar', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(6, 1, 'Pengecatan warna cat akhir', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(7, 1, 'Polishing dan pengilapan', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(8, 2, 'Pembersihan dan penggantian saringan udara', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(9, 2, 'Penggantian saringan Oli', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(10, 2, 'Pemeriksaan dan penyetelan kekencangan tali kipas', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(11, 2, 'Penyetelan Pengapian (Busi, Kabel busi, Koil dan distributor)', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(12, 2, 'Pengukuran tekanan kompresi', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(13, 3, 'Pelepasan bodi panel', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(14, 3, 'Perbaiki body yang rusak/penyok', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(15, 3, 'Pengamplasan', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(16, 3, 'Pelapisan antikarat', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(17, 3, 'Efoksi cat dasar', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(18, 3, 'Poles Finishing', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(19, 4, 'Cleaning kotoran pada mobil', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(20, 4, 'Memperbaiki cat yang tergores', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(21, 4, 'Mengoleskan Wax pada mobil', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(22, 4, 'Poles Finishing', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(23, 5, 'Menghilangkan baret mobil', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(24, 5, 'Poles sisa baret mobil', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(25, 5, 'Oleskan Obat poles', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(26, 5, 'Cat body ', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(27, 5, 'Pelapisan cat dengan Wax', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(28, 5, 'Poles Finishing', '2022-08-12 04:11:27', '2022-08-12 04:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penilaian`
--

CREATE TABLE `detail_penilaian` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_penilaian` int(11) UNSIGNED NOT NULL,
  `id_tugas` int(11) UNSIGNED NOT NULL,
  `status` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_penilaian`
--

INSERT INTO `detail_penilaian` (`id`, `id_penilaian`, `id_tugas`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 0, NULL, NULL),
(2, 1, 14, 0, NULL, NULL),
(3, 1, 15, 0, NULL, NULL),
(4, 1, 16, 0, NULL, NULL),
(5, 1, 17, 0, NULL, NULL),
(6, 1, 18, 0, NULL, NULL),
(7, 2, 19, 1, NULL, NULL),
(8, 2, 20, 0, NULL, NULL),
(9, 2, 21, 0, NULL, NULL),
(10, 2, 22, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_penilai` int(11) UNSIGNED DEFAULT NULL,
  `judul_informasi` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `isi_informasi` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pegawai` int(11) UNSIGNED NOT NULL,
  `tahun` int(4) UNSIGNED NOT NULL,
  `bulan` int(2) UNSIGNED NOT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `durasi_izin` int(11) DEFAULT NULL,
  `alasan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `bukti_pendukung` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(189, '2022-02-20-134405', 'App\\Database\\Migrations\\PenggunaTable', 'default', 'App', 1660320683, 1),
(190, '2022-02-20-135844', 'App\\Database\\Migrations\\PegawaiTable', 'default', 'App', 1660320683, 1),
(191, '2022-02-20-142502', 'App\\Database\\Migrations\\PenilaiTable', 'default', 'App', 1660320683, 1),
(192, '2022-02-20-142701', 'App\\Database\\Migrations\\BagianTable', 'default', 'App', 1660320683, 1),
(193, '2022-02-20-142832', 'App\\Database\\Migrations\\Tugas', 'default', 'App', 1660320683, 1),
(194, '2022-02-20-143919', 'App\\Database\\Migrations\\PenilaianTable', 'default', 'App', 1660320683, 1),
(195, '2022-02-20-144314', 'App\\Database\\Migrations\\InformasiTable', 'default', 'App', 1660320683, 1),
(196, '2022-02-20-145206', 'App\\Database\\Migrations\\AbsensiTable', 'default', 'App', 1660320683, 1),
(197, '2022-02-20-145333', 'App\\Database\\Migrations\\IzinTable', 'default', 'App', 1660320683, 1),
(198, '2022-02-20-145748', 'App\\Database\\Migrations\\CutiTable', 'default', 'App', 1660320683, 1),
(199, '2022-02-20-160750', 'App\\Database\\Migrations\\DetailPenilaian', 'default', 'App', 1660320683, 1),
(200, '2022-08-12-112806', 'App\\Database\\Migrations\\Pekerjaan', 'default', 'App', 1660320683, 1),
(201, '2022-08-12-112822', 'App\\Database\\Migrations\\DetailPekerjaan', 'default', 'App', 1660320683, 1),
(202, '2022-08-12-145031', 'App\\Database\\Migrations\\BagianPegawai', 'default', 'App', 1660320684, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pengguna` int(11) UNSIGNED NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `pas_foto` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `id_pengguna`, `nik`, `nama_lengkap`, `alamat`, `no_telepon`, `pas_foto`, `created_at`, `updated_at`) VALUES
(1, 2, '9658653761361763', 'Akun Pegawai', 'Jl. Bunga Matahari, No.11', '085156031903', 'default.jpg', '2022-08-12 11:11:27', '2022-08-12 11:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama_pekerjaan`, `created_at`, `updated_at`) VALUES
(1, 'Cat Mobil', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(2, 'Tune Up mobil', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(3, 'Body Repair', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(4, 'Detailing Mobil', '2022-08-12 04:11:27', '2022-08-12 04:11:27'),
(5, 'Poles Mobil', '2022-08-12 04:11:27', '2022-08-12 04:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'penilai@mail.com', '$2y$10$wGa/ljPs8Jgsmwaz9DckDeXZ0MrYl5kuKCuu00El6u3Brh2Ruup/G', 1, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(2, 'pegawai@mail.com', '$2y$10$xHJ5U/VmlQf9pKA9Cm3F2.bnGbejv1zgGJCzTG4pHFPYiOrkDPsHW', 0, '2022-08-12 11:11:27', '2022-08-12 11:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `penilai`
--

CREATE TABLE `penilai` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pengguna` int(11) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `pas_foto` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penilai`
--

INSERT INTO `penilai` (`id`, `id_pengguna`, `nama_lengkap`, `alamat`, `no_telepon`, `pas_foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'Akun Penilai', 'Jl. Bunga Matahari, No.11', '081939448487', 'default.jpg', '2022-08-12 11:11:27', '2022-08-12 11:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_penilai` int(11) UNSIGNED DEFAULT NULL,
  `id_pegawai` int(11) UNSIGNED DEFAULT NULL,
  `id_bagian` int(11) UNSIGNED DEFAULT NULL,
  `tanggal_penilaian` date DEFAULT NULL,
  `masukan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_penilai`, `id_pegawai`, `id_bagian`, `tanggal_penilaian`, `masukan`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 3, '2022-08-12', '', '2022-08-12 16:59:34', '2022-08-12 16:59:34'),
(2, 1, 1, 4, '2022-08-12', 'mantep', '2022-08-12 17:11:33', '2022-08-12 18:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_bagian` int(11) UNSIGNED NOT NULL,
  `id_detail_pekerjaan` int(11) NOT NULL,
  `penilaian` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `id_bagian`, `id_detail_pekerjaan`, `penilaian`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(2, 1, 2, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(3, 1, 3, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(4, 1, 4, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(5, 1, 5, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(6, 1, 6, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(7, 1, 7, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(8, 2, 8, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(9, 2, 9, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(10, 2, 10, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(11, 2, 11, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(12, 2, 12, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(13, 3, 13, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(14, 3, 14, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(15, 3, 15, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(16, 3, 16, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(17, 3, 17, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(18, 3, 18, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(19, 4, 19, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(20, 4, 20, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(21, 4, 21, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(22, 4, 22, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(23, 5, 23, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(24, 5, 24, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(25, 5, 25, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(26, 5, 26, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(27, 5, 27, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(28, 5, 28, NULL, '2022-08-12 11:11:27', '2022-08-12 11:11:27'),
(29, 6, 8, NULL, '2022-08-12 19:54:26', '2022-08-12 19:54:26'),
(30, 6, 9, NULL, '2022-08-12 19:54:26', '2022-08-12 19:54:26'),
(31, 6, 10, NULL, '2022-08-12 19:54:26', '2022-08-12 19:54:26'),
(32, 6, 11, NULL, '2022-08-12 19:54:26', '2022-08-12 19:54:26'),
(33, 6, 12, NULL, '2022-08-12 19:54:26', '2022-08-12 19:54:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_id_pegawai_foreign` (`id_pegawai`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bagian_pegawai`
--
ALTER TABLE `bagian_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bagian_pegawai_id_pegawai_foreign` (`id_pegawai`),
  ADD KEY `bagian_pegawai_id_bagian_foreign` (`id_bagian`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuti_id_pegawai_foreign` (`id_pegawai`);

--
-- Indexes for table `detail_pekerjaan`
--
ALTER TABLE `detail_pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pekerjaan_id_pekerjaan_foreign` (`id_pekerjaan`);

--
-- Indexes for table `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_penilaian_id_penilaian_foreign` (`id_penilaian`),
  ADD KEY `detail_penilaian_id_tugas_foreign` (`id_tugas`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_id_penilai_foreign` (`id_penilai`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `izin_id_pegawai_foreign` (`id_pegawai`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilai`
--
ALTER TABLE `penilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilai_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_id_penilai_foreign` (`id_penilai`),
  ADD KEY `penilaian_id_pegawai_foreign` (`id_pegawai`),
  ADD KEY `penilaian_id_bagian_foreign` (`id_bagian`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_id_bagian_foreign` (`id_bagian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bagian_pegawai`
--
ALTER TABLE `bagian_pegawai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_pekerjaan`
--
ALTER TABLE `detail_pekerjaan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penilai`
--
ALTER TABLE `penilai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bagian_pegawai`
--
ALTER TABLE `bagian_pegawai`
  ADD CONSTRAINT `bagian_pegawai_id_bagian_foreign` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bagian_pegawai_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pekerjaan`
--
ALTER TABLE `detail_pekerjaan`
  ADD CONSTRAINT `detail_pekerjaan_id_pekerjaan_foreign` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  ADD CONSTRAINT `detail_penilaian_id_penilaian_foreign` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penilaian_id_tugas_foreign` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_id_penilai_foreign` FOREIGN KEY (`id_penilai`) REFERENCES `penilai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilai`
--
ALTER TABLE `penilai`
  ADD CONSTRAINT `penilai_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_id_bagian_foreign` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_id_penilai_foreign` FOREIGN KEY (`id_penilai`) REFERENCES `penilai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_id_bagian_foreign` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
