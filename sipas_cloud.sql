-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2020 at 05:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipas_cloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `authsrc`
--

CREATE TABLE `authsrc` (
  `auth_src_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_src_usr` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_src_provider` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_src_prop` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jab`
--

CREATE TABLE `jab` (
  `jab_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jab_nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jab_kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jab_isaktif` int(11) NOT NULL,
  `jab_isnomor` int(11) NOT NULL,
  `jab_org` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jab_induk` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jab_ishapus` int(11) NOT NULL,
  `jab_level` int(11) NOT NULL,
  `jab_path` int(11) NOT NULL,
  `jab_prop` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jab`
--

INSERT INTO `jab` (`jab_id`, `jab_nama`, `jab_kode`, `jab_isaktif`, `jab_isnomor`, `jab_org`, `jab_induk`, `jab_ishapus`, `jab_level`, `jab_path`, `jab_prop`) VALUES
('1', 'Administrasi Aplikasi', '5619412', 1, 157, '1', '1659124912641', 0, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `org`
--

CREATE TABLE `org` (
  `org_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_nama` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_kode` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_usr` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_ishapus` int(11) DEFAULT NULL,
  `org_isaktif` int(11) DEFAULT NULL,
  `org_aktif_akhir_tgl` date DEFAULT NULL,
  `org_tenggang_akhir_tgl` date DEFAULT NULL,
  `org_status` int(11) DEFAULT NULL,
  `org_tipe` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_bidang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_provinsi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_kota` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_induk` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_paket` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_prop` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `org`
--

INSERT INTO `org` (`org_id`, `org_nama`, `org_kode`, `org_alamat`, `org_telp`, `org_usr`, `org_ishapus`, `org_isaktif`, `org_aktif_akhir_tgl`, `org_tenggang_akhir_tgl`, `org_status`, `org_tipe`, `org_bidang`, `org_provinsi`, `org_kota`, `org_induk`, `org_paket`, `org_prop`) VALUES
('1', 'Sekawan Media Informatika', 'SM', 'Jl. Maninjau Raya No.29, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139', '03413021661', '1', 0, 1, '2020-08-02', '2020-08-05', 1, 'POLTEKOM', 'KOMINFO', 'Jawa Timur', 'Malang', NULL, '1', NULL),
('2', 'Sekawan Media', 'SM', 'Jl. Maninjau Raya No.29, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139', '03413021661', '3', 0, 1, '2020-08-02', '2020-08-05', 1, '-', 'KOMINFO', 'Jawa Timur', 'Malang', NULL, '3', NULL),
('3', 'Sekawan Media', 'SM', 'Jl. Maninjau Raya No.29, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139', '03413021661', '2', 0, 1, '2020-08-02', '2020-08-05', 1, '-', 'KOMINFO', 'Jawa Timur', 'Malang', NULL, '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orgadm`
--

CREATE TABLE `orgadm` (
  `org_adm_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_adm_user` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_adm_org` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_adm_isaktif` int(11) NOT NULL,
  `org_adm_ishapus` int(11) NOT NULL,
  `org_adm_role` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_adm_prop` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orgadm`
--

INSERT INTO `orgadm` (`org_adm_id`, `org_adm_user`, `org_adm_org`, `org_adm_isaktif`, `org_adm_ishapus`, `org_adm_role`, `org_adm_prop`) VALUES
('1', '1', '1', 1, 0, 'Owner', '471381'),
('2', '2', '2', 1, 0, 'Moderator', '881731'),
('3', '3', '3', 1, 0, 'Admin', '77562');

-- --------------------------------------------------------

--
-- Table structure for table `orgrole`
--

CREATE TABLE `orgrole` (
  `org_role_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_role_nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_role_isaktif` int(11) NOT NULL,
  `org_role_akses` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_role_ishapus` int(11) NOT NULL,
  `org_role_prop` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orgrole`
--

INSERT INTO `orgrole` (`org_role_id`, `org_role_nama`, `org_role_isaktif`, `org_role_akses`, `org_role_ishapus`, `org_role_prop`) VALUES
('1', 'Owner', 1, 'Divisi Sekretaris', 0, '88571');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `paket_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_tipe` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_ishapus` int(11) NOT NULL,
  `paket_isaktif` int(11) NOT NULL,
  `paket_nominal` int(11) NOT NULL,
  `paket_prop` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paket_id`, `paket_nama`, `paket_tipe`, `paket_ishapus`, `paket_isaktif`, `paket_nominal`, `paket_prop`) VALUES
('1', 'Paket 1', 'Paket 1', 0, 2, 7500000, '573811'),
('2', 'Paket 2', 'Paket 2', 0, 0, 4500000, '51847'),
('3', 'Paket 3', 'Paket 3', 0, 0, 7500000, '18195'),
('4', 'Paket 4', 'Paket 4', 0, 0, 7500000, '99412'),
('5', 'Paket 5', 'Paket 5', 0, 1, 7500000, '99471');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_nomor` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_user` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_tgl` datetime NOT NULL,
  `payment_nominal` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_org` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_subslog` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_prop` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_nomor`, `payment_user`, `payment_tgl`, `payment_nominal`, `payment_status`, `payment_org`, `payment_subslog`, `payment_prop`) VALUES
('1', '84542', '1', '2020-09-03 10:36:19', 2500000, 1, '1', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `profil_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_staf` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_staf_nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_unit` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_unit_nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_jab` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_jab_nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_buat_tgl` datetime NOT NULL,
  `profil_prop` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`profil_id`, `profil_staf`, `profil_staf_nama`, `profil_unit`, `profil_unit_nama`, `profil_jab`, `profil_jab_nama`, `profil_buat_tgl`, `profil_prop`) VALUES
('1', '1', 'Asri Ayu', '1', 'Divisi Sekretaris', '1', 'Administrasi Aplikasi', '2020-09-03 08:44:34', '1');

-- --------------------------------------------------------

--
-- Table structure for table `prop`
--

CREATE TABLE `prop` (
  `prop_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prop_buat_staf` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prop_buat_tgl` datetime DEFAULT NULL,
  `prop_ubah_staf` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prop_ubah_tgl` datetime DEFAULT NULL,
  `prop_hapus_staf` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prop_hapus_tgl` datetime DEFAULT NULL,
  `prop_entitas_id` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prop_entitas` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prop_slug` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prop`
--

INSERT INTO `prop` (`prop_id`, `prop_buat_staf`, `prop_buat_tgl`, `prop_ubah_staf`, `prop_ubah_tgl`, `prop_hapus_staf`, `prop_hapus_tgl`, `prop_entitas_id`, `prop_entitas`, `prop_slug`) VALUES
('1', '1', '2020-09-04 09:45:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `propbuatdata`
--

CREATE TABLE `propbuatdata` (
  `prop_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prop_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `propbuatdata`
--

INSERT INTO `propbuatdata` (`prop_id`, `prop_data`) VALUES
('1', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `prophapusdata`
--

CREATE TABLE `prophapusdata` (
  `prop_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prop_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `propubahdata`
--

CREATE TABLE `propubahdata` (
  `prop_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prop_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `staf_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_peran` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_isaktif` int(11) NOT NULL,
  `staf_kelamin` int(11) NOT NULL,
  `staf_ishapus` int(11) NOT NULL,
  `staf_org` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_unit` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_jab` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_usr` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_profil` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staf_prop` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`staf_id`, `staf_nama`, `staf_peran`, `staf_kode`, `staf_isaktif`, `staf_kelamin`, `staf_ishapus`, `staf_org`, `staf_unit`, `staf_jab`, `staf_usr`, `staf_profil`, `staf_prop`) VALUES
('1', 'Administrasi Server', 'Divisi Teknis', '163812', 1, 1, 0, '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subslog`
--

CREATE TABLE `subslog` (
  `subslog_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subslog_paket_nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subslog_paket_storage` int(11) NOT NULL,
  `subslog_jumlah_user` int(11) NOT NULL,
  `subslog_org` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subslog_jumlah_unit` int(11) NOT NULL,
  `subslog_jabatan` int(11) NOT NULL,
  `subslog_payment_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subslog_jumlah_surat` int(11) NOT NULL,
  `subslog_jumlah_disposisi` int(11) NOT NULL,
  `subslog_jumlah_arsip` int(11) NOT NULL,
  `subslog_jumlah_dokumen` int(11) NOT NULL,
  `subslog_payment_tgl` date NOT NULL,
  `subslog_prop` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subslog`
--

INSERT INTO `subslog` (`subslog_id`, `subslog_paket_nama`, `subslog_paket_storage`, `subslog_jumlah_user`, `subslog_org`, `subslog_jumlah_unit`, `subslog_jabatan`, `subslog_payment_id`, `subslog_jumlah_surat`, `subslog_jumlah_disposisi`, `subslog_jumlah_arsip`, `subslog_jumlah_dokumen`, `subslog_payment_tgl`, `subslog_prop`) VALUES
('1', '1', 15, 55, '1', 15, 1, '1', 1, 1, 1, 1, '2020-09-03', '1');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_rubrik` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_isaktif` int(11) NOT NULL,
  `unit_org` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_induk` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_ishapus` int(11) NOT NULL,
  `unit_manager` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_prop` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_nama`, `unit_kode`, `unit_rubrik`, `unit_isaktif`, `unit_org`, `unit_induk`, `unit_ishapus`, `unit_manager`, `unit_level`, `unit_path`, `unit_prop`) VALUES
('1', 'Divisi Kesekretariatan', '5712128', '-', 1, '1', '58819992612', 0, 'Atasan', 'hiuashiashdzxnczxnckahsdl', 'ahschakshcjkahckjac', '1');

-- --------------------------------------------------------

--
-- Table structure for table `unitcakupan`
--

CREATE TABLE `unitcakupan` (
  `unit_cakupan_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cakupan_unit` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cakupan_jab` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unitcakupan`
--

INSERT INTO `unitcakupan` (`unit_cakupan_id`, `unit_cakupan_unit`, `unit_cakupan_jab`) VALUES
('1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE `usr` (
  `usr_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_sandi` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_isaktif` int(11) NOT NULL,
  `usr_registrasi_tgl` date NOT NULL,
  `usr_registrasi_status` int(11) NOT NULL,
  `usr_staf` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usr_org` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usr_auth` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usr_ishapus` int(11) NOT NULL,
  `usr_lastmasuk` datetime NOT NULL,
  `usr_prop` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`usr_id`, `usr_nama`, `usr_email`, `usr_sandi`, `usr_isaktif`, `usr_registrasi_tgl`, `usr_registrasi_status`, `usr_staf`, `usr_org`, `usr_auth`, `usr_ishapus`, `usr_lastmasuk`, `usr_prop`) VALUES
('1', 'Asri Ayu', 'asriayu@gmail.com', '0192023a7bbd73250516f069df18b500', 1, '2020-09-01', 1, NULL, NULL, NULL, 0, '2020-09-01 09:00:41', NULL),
('2', 'Drs. Ayudia Ana S.E.', 'ayudiana@gmail.com', '0192023a7bbd73250516f069df18b500', 1, '2020-09-01', 1, NULL, NULL, NULL, 0, '2020-09-01 09:01:19', NULL),
('3', 'Drs. Adam Aditya, S.H.', 'adamaditya@gmail.com', '0192023a7bbd73250516f069df18b500', 1, '2020-09-01', 1, NULL, NULL, NULL, 0, '2020-09-01 09:02:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authsrc`
--
ALTER TABLE `authsrc`
  ADD PRIMARY KEY (`auth_src_id`),
  ADD UNIQUE KEY `authsrc_auth_src_usr_unique` (`auth_src_usr`),
  ADD UNIQUE KEY `authsrc_auth_src_provider_unique` (`auth_src_provider`),
  ADD UNIQUE KEY `authsrc_auth_src_prop_unique` (`auth_src_prop`);

--
-- Indexes for table `jab`
--
ALTER TABLE `jab`
  ADD PRIMARY KEY (`jab_id`),
  ADD UNIQUE KEY `jab_jab_org_unique` (`jab_org`),
  ADD UNIQUE KEY `jab_jab_induk_unique` (`jab_induk`),
  ADD UNIQUE KEY `jab_jab_prop_unique` (`jab_prop`),
  ADD KEY `jab_jab_nama_index` (`jab_nama`),
  ADD KEY `jab_jab_kode_index` (`jab_kode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org`
--
ALTER TABLE `org`
  ADD PRIMARY KEY (`org_id`),
  ADD UNIQUE KEY `org_org_usr_unique` (`org_usr`),
  ADD UNIQUE KEY `org_org_induk_unique` (`org_induk`),
  ADD UNIQUE KEY `org_org_paket_unique` (`org_paket`),
  ADD UNIQUE KEY `org_org_prop_unique` (`org_prop`),
  ADD KEY `org_org_nama_index` (`org_nama`),
  ADD KEY `org_org_kode_index` (`org_kode`),
  ADD KEY `org_org_alamat_index` (`org_alamat`(768));

--
-- Indexes for table `orgadm`
--
ALTER TABLE `orgadm`
  ADD PRIMARY KEY (`org_adm_id`),
  ADD UNIQUE KEY `orgadm_org_adm_user_unique` (`org_adm_user`),
  ADD UNIQUE KEY `orgadm_org_adm_org_unique` (`org_adm_org`),
  ADD UNIQUE KEY `orgadm_org_adm_prop_unique` (`org_adm_prop`);

--
-- Indexes for table `orgrole`
--
ALTER TABLE `orgrole`
  ADD PRIMARY KEY (`org_role_id`),
  ADD UNIQUE KEY `orgrole_org_role_prop_unique` (`org_role_prop`),
  ADD KEY `orgrole_org_role_nama_index` (`org_role_nama`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`paket_id`),
  ADD UNIQUE KEY `paket_paket_prop_unique` (`paket_prop`),
  ADD KEY `paket_paket_nama_index` (`paket_nama`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `payment_payment_user_unique` (`payment_user`),
  ADD UNIQUE KEY `payment_payment_org_unique` (`payment_org`),
  ADD UNIQUE KEY `payment_payment_prop_unique` (`payment_prop`),
  ADD UNIQUE KEY `payment_payment_sublog_unique` (`payment_subslog`),
  ADD KEY `payment_payment_nomor_index` (`payment_nomor`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`profil_id`),
  ADD UNIQUE KEY `profil_profil_staf_unique` (`profil_staf`),
  ADD UNIQUE KEY `profil_profil_unit_unique` (`profil_unit`),
  ADD UNIQUE KEY `profil_profil_jab_unique` (`profil_jab`),
  ADD UNIQUE KEY `profil_profil_prop_unique` (`profil_prop`),
  ADD KEY `profil_profil_staf_nama_index` (`profil_staf_nama`),
  ADD KEY `profil_profil_unit_nama_index` (`profil_unit_nama`),
  ADD KEY `profil_profil_jab_nama_index` (`profil_jab_nama`),
  ADD KEY `profil_profil_buat_tgl_index` (`profil_buat_tgl`);

--
-- Indexes for table `prop`
--
ALTER TABLE `prop`
  ADD PRIMARY KEY (`prop_id`),
  ADD UNIQUE KEY `prop_prop_buat_staf_unique` (`prop_buat_staf`),
  ADD UNIQUE KEY `prop_prop_ubah_staf_unique` (`prop_ubah_staf`),
  ADD UNIQUE KEY `prop_prop_hapus_staf_unique` (`prop_hapus_staf`),
  ADD KEY `prop_prop_buat_tgl_index` (`prop_buat_tgl`),
  ADD KEY `prop_prop_ubah_tgl_index` (`prop_ubah_tgl`),
  ADD KEY `prop_prop_hapus_tgl_index` (`prop_hapus_tgl`),
  ADD KEY `prop_prop_entitas_index` (`prop_entitas`),
  ADD KEY `prop_prop_slug_index` (`prop_slug`);

--
-- Indexes for table `propbuatdata`
--
ALTER TABLE `propbuatdata`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `prophapusdata`
--
ALTER TABLE `prophapusdata`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `propubahdata`
--
ALTER TABLE `propubahdata`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`staf_id`),
  ADD UNIQUE KEY `staf_peran` (`staf_peran`),
  ADD UNIQUE KEY `staf_org` (`staf_org`),
  ADD UNIQUE KEY `staf_unit` (`staf_unit`),
  ADD UNIQUE KEY `staf_jab` (`staf_jab`,`staf_usr`,`staf_profil`,`staf_prop`),
  ADD KEY `staf_nama` (`staf_nama`),
  ADD KEY `staf_kode` (`staf_kode`),
  ADD KEY `staf_usr` (`staf_usr`);

--
-- Indexes for table `subslog`
--
ALTER TABLE `subslog`
  ADD PRIMARY KEY (`subslog_id`),
  ADD UNIQUE KEY `subslog_subslog_org_unique` (`subslog_org`),
  ADD UNIQUE KEY `subslog_subslog_payment_id_unique` (`subslog_payment_id`),
  ADD KEY `subslog_subslog_paket_nama_index` (`subslog_paket_nama`),
  ADD KEY `subslog_subslog_paket_storage_index` (`subslog_paket_storage`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `unit_unit_org_unique` (`unit_org`),
  ADD UNIQUE KEY `unit_unit_induk_unique` (`unit_induk`),
  ADD UNIQUE KEY `unit_unit_manager_unique` (`unit_manager`),
  ADD UNIQUE KEY `unit_unit_prop_unique` (`unit_prop`),
  ADD KEY `unit_unit_nama_index` (`unit_nama`),
  ADD KEY `unit_unit_kode_index` (`unit_kode`),
  ADD KEY `unit_unit_rubrik_index` (`unit_rubrik`);

--
-- Indexes for table `unitcakupan`
--
ALTER TABLE `unitcakupan`
  ADD PRIMARY KEY (`unit_cakupan_id`),
  ADD UNIQUE KEY `unitcakupan_unit_cakupan_unit_unique` (`unit_cakupan_unit`),
  ADD UNIQUE KEY `unitcakupan_unit_cakupan_jab_unique` (`unit_cakupan_jab`);

--
-- Indexes for table `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_usr_prop_unique` (`usr_prop`),
  ADD UNIQUE KEY `usr_usr_staf_unique` (`usr_staf`),
  ADD UNIQUE KEY `usr_usr_org_unique` (`usr_org`),
  ADD UNIQUE KEY `usr_usr_auth_unique` (`usr_auth`),
  ADD KEY `usr_usr_nama_index` (`usr_nama`),
  ADD KEY `usr_usr_email_index` (`usr_email`),
  ADD KEY `usr_usr_registrasi_tgl_index` (`usr_registrasi_tgl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authsrc`
--
ALTER TABLE `authsrc`
  ADD CONSTRAINT `authsrc_ibfk_1` FOREIGN KEY (`auth_src_usr`) REFERENCES `usr` (`usr_id`);

--
-- Constraints for table `jab`
--
ALTER TABLE `jab`
  ADD CONSTRAINT `jab_ibfk_1` FOREIGN KEY (`jab_org`) REFERENCES `org` (`org_id`);

--
-- Constraints for table `org`
--
ALTER TABLE `org`
  ADD CONSTRAINT `org_ibfk_2` FOREIGN KEY (`org_paket`) REFERENCES `paket` (`paket_id`),
  ADD CONSTRAINT `org_ibfk_3` FOREIGN KEY (`org_usr`) REFERENCES `usr` (`usr_id`);

--
-- Constraints for table `orgadm`
--
ALTER TABLE `orgadm`
  ADD CONSTRAINT `orgadm_ibfk_2` FOREIGN KEY (`org_adm_org`) REFERENCES `org` (`org_id`),
  ADD CONSTRAINT `orgadm_ibfk_3` FOREIGN KEY (`org_adm_user`) REFERENCES `usr` (`usr_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`payment_org`) REFERENCES `org` (`org_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`payment_subslog`) REFERENCES `subslog` (`subslog_id`);

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`profil_jab`) REFERENCES `jab` (`jab_id`),
  ADD CONSTRAINT `profil_ibfk_2` FOREIGN KEY (`profil_unit`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `profil_ibfk_3` FOREIGN KEY (`profil_staf`) REFERENCES `staf` (`staf_id`);

--
-- Constraints for table `prop`
--
ALTER TABLE `prop`
  ADD CONSTRAINT `prop_ibfk_1` FOREIGN KEY (`prop_buat_staf`) REFERENCES `propbuatdata` (`prop_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prop_ibfk_2` FOREIGN KEY (`prop_ubah_staf`) REFERENCES `propubahdata` (`prop_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prop_ibfk_3` FOREIGN KEY (`prop_hapus_staf`) REFERENCES `prophapusdata` (`prop_id`) ON DELETE CASCADE;

--
-- Constraints for table `staf`
--
ALTER TABLE `staf`
  ADD CONSTRAINT `staf_ibfk_1` FOREIGN KEY (`staf_unit`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `staf_ibfk_2` FOREIGN KEY (`staf_jab`) REFERENCES `jab` (`jab_id`),
  ADD CONSTRAINT `staf_ibfk_3` FOREIGN KEY (`staf_usr`) REFERENCES `usr` (`usr_id`),
  ADD CONSTRAINT `staf_ibfk_4` FOREIGN KEY (`staf_org`) REFERENCES `org` (`org_id`);

--
-- Constraints for table `subslog`
--
ALTER TABLE `subslog`
  ADD CONSTRAINT `subslog_ibfk_1` FOREIGN KEY (`subslog_payment_id`) REFERENCES `payment` (`payment_id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`unit_org`) REFERENCES `org` (`org_id`);

--
-- Constraints for table `unitcakupan`
--
ALTER TABLE `unitcakupan`
  ADD CONSTRAINT `unitcakupan_ibfk_1` FOREIGN KEY (`unit_cakupan_unit`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `unitcakupan_ibfk_2` FOREIGN KEY (`unit_cakupan_jab`) REFERENCES `jab` (`jab_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
