-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 10:22 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `id_karyawan` bigint(13) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `tgl_cuti` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` enum('Disetujui','Ditolak') DEFAULT NULL,
  `lama_cuti` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `id_karyawan`, `tgl_pengajuan`, `tgl_cuti`, `tgl_selesai`, `keterangan`, `status`, `lama_cuti`) VALUES
(3, 23, '2021-12-05', '2021-12-06', '2021-12-08', 'test', 'Ditolak', 0),
(22, 23, '2021-12-13', '2021-12-05', '2021-12-13', ' test cuti', 'Disetujui', 8),
(26, 23, '2021-12-18', '2021-12-18', '2021-12-25', ' tes', 'Disetujui', 7),
(27, 23, '2021-12-25', '2021-12-25', '2021-12-27', ' Natal', NULL, 2),
(28, 24, '2021-12-25', '2021-12-25', '2021-12-27', ' Natal', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id` int(11) NOT NULL,
  `id_karyawan` bigint(13) DEFAULT NULL,
  `tgl_izin` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `surat` varchar(50) DEFAULT NULL,
  `status` enum('Disetujui','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id`, `id_karyawan`, `tgl_izin`, `tgl_selesai`, `keterangan`, `surat`, `status`) VALUES
(1, 24, '2021-11-29 01:56:00', '2021-11-29 04:56:00', 'test', NULL, 'Disetujui'),
(2, 23, '2021-11-29 01:57:00', '2021-11-29 04:57:00', 'test', NULL, 'Ditolak'),
(3, 24, '2021-11-29 09:41:00', '2021-11-29 12:42:00', 'pergi', NULL, 'Disetujui'),
(4, 25, '2021-12-26 14:59:00', '2021-12-26 17:59:00', ' Test', 'logo_baru_umb.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nomor_pegawai` bigint(13) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('karyawan','manager','admin','') NOT NULL,
  `kuota_cuti` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nomor_pegawai`, `nama`, `no_hp`, `alamat`, `jenis_kelamin`, `password`, `status`, `kuota_cuti`) VALUES
(23, 'zakki', '0888', 'Jl.Dahlia', 'Pria', '57e0f81f2932f6a4d34c4487d9262c5f', 'admin', 5),
(24, 'test', '087', 'Jl. Jalan', 'Wanita', '57e0f81f2932f6a4d34c4487d9262c5f', 'karyawan', 5),
(25, 'Hana', '085', 'Jl. Masyarakat', 'Wanita', '57e0f81f2932f6a4d34c4487d9262c5f', 'manager', 5);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `id_karyawan` bigint(13) DEFAULT NULL,
  `tanggal_masuk` datetime DEFAULT NULL,
  `tanggal_keluar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `id_karyawan`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(4, 23, '2021-11-29 02:12:00', '0000-00-00 00:00:00'),
(5, 24, '0000-00-00 00:00:00', '2021-11-29 02:13:00'),
(6, 24, '2021-11-29 09:43:00', '0000-00-00 00:00:00'),
(9, 23, '2021-12-05 10:38:35', '0000-00-00 00:00:00'),
(14, 23, '2021-12-05 17:03:40', '2021-12-05 17:07:00'),
(15, 23, '2021-12-06 03:31:36', '2021-12-06 09:37:03'),
(16, 23, '2021-12-20 14:47:09', NULL),
(17, 23, '2021-12-20 14:48:09', '2021-12-25 22:31:05'),
(18, 23, '2021-12-25 22:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_karyawan` bigint(13) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('admin','karyawan','manager') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_karyawan`, `username`, `password`, `status`) VALUES
(1, 23, 'zakki', '57e0f81f2932f6a4d34c4487d9262c5f', 'admin'),
(2, 24, 'zak', '57e0f81f2932f6a4d34c4487d9262c5f', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nomor_pegawai`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`nomor_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
