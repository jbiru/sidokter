-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 08:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidokter`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_document`
--

CREATE TABLE `activity_document` (
  `id_activity_document` int(11) NOT NULL,
  `judul_dokumen` text NOT NULL,
  `jenis_dokumen` varchar(20) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_edit` datetime NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `file` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bidang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_document`
--

INSERT INTO `activity_document` (`id_activity_document`, `judul_dokumen`, `jenis_dokumen`, `tgl_terbit`, `sumber`, `tgl_upload`, `status`, `tgl_edit`, `nama_user`, `file`, `id_user`, `bidang`) VALUES
(20, 'SK Kontrak Pegawai RSUD Ngimbang - Agung Wahyudi', 'SK Perawat', '0000-00-00', '', '2024-06-11 11:02:07', 1, '0000-00-00 00:00:00', 'Admin', 'SALINAN_PERDA_10_TAHUN_2023_PAJAK_DAERAH_DAN_RETRIBUSI_DAERAH_PDRD_LAMONGAN-124-158.pdf', 1, 'Program');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`, `created_at`) VALUES
(1, 'Program', '2024-05-27 03:26:15'),
(3, 'Penunjang', '2024-05-30 01:23:51'),
(10, 'Pelayanan', '2024-05-30 01:24:00'),
(11, 'Keuangan', '2024-05-30 01:24:11'),
(13, 'Umum', '2024-05-30 01:25:50'),
(14, 'Casemix', '2024-05-30 01:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_jenis_dokumen` int(11) NOT NULL,
  `nama_jenis_dokumen` varchar(20) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_jenis_dokumen`, `nama_jenis_dokumen`, `kode`) VALUES
(1, 'SK Perawat', 'SKP'),
(2, 'Undangan Resmi', '');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`) VALUES
(1, 'Super User', '2024-06-11 06:48:09'),
(2, 'Admin', '2024-06-11 06:48:18'),
(5, 'User Biasa', '2024-06-11 07:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` bigint(14) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `id_bidang`, `id_level`, `alamat`, `no_telp`, `foto`) VALUES
(1, 'Admin', 'admin', '123', 1, 1, 'Lamongan', 858346617171, ''),
(2, 'Agung Wahyudi Kedua', 'agung', '123', 1, 2, 'Ngimbang', 858346617171, ''),
(4, 'User Biasa', 'user', '123', 11, 5, '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_document`
--
ALTER TABLE `activity_document`
  ADD PRIMARY KEY (`id_activity_document`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_jenis_dokumen`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`id_level`),
  ADD KEY `bidang` (`id_bidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_document`
--
ALTER TABLE `activity_document`
  MODIFY `id_activity_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_jenis_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `bidang` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`),
  ADD CONSTRAINT `level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
