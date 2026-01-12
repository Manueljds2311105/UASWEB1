-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 11:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah_hari_terlambat` int(11) NOT NULL,
  `tarif_denda_perhari` decimal(10,2) NOT NULL,
  `total_denda` decimal(10,2) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `kode_kendaraan` varchar(20) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL,
  `jenis` enum('mobil','motor','truk','bus') NOT NULL,
  `merk` varchar(50) NOT NULL,
  `tahun_produksi` year(4) NOT NULL,
  `plat_nomor` varchar(20) NOT NULL,
  `warna` varchar(30) DEFAULT NULL,
  `harga_sewa_perhari` decimal(10,2) NOT NULL,
  `status` enum('tersedia','disewa','maintenance') DEFAULT 'tersedia',
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `kode_kendaraan`, `nama_kendaraan`, `jenis`, `merk`, `tahun_produksi`, `plat_nomor`, `warna`, `harga_sewa_perhari`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'KND001', 'Toyota Avanza', 'mobil', 'Toyota', '2022', 'B 1234 XYZ', 'Putih', 350000.00, 'tersedia', NULL, '2026-01-07 10:19:34', '2026-01-07 10:19:34'),
(2, 'KND002', 'Honda Jazz', 'mobil', 'Honda', '2021', 'B 5678 ABC', 'Hitam', 400000.00, 'disewa', NULL, '2026-01-07 10:19:34', '2026-01-07 13:36:29'),
(3, 'KND003', 'Yamaha NMAX', 'motor', 'Yamaha', '2023', 'B 9012 DEF', 'Merah', 150000.00, 'tersedia', NULL, '2026-01-07 10:19:34', '2026-01-07 10:19:34'),
(4, 'KND004', 'Honda PCX', 'motor', 'Honda', '2022', 'B 3456 GHI', 'Biru', 175000.00, 'tersedia', NULL, '2026-01-07 10:19:34', '2026-01-07 10:19:34'),
(5, 'KND005', 'Mitsubishi Xpander', 'mobil', 'Mitsubishi', '2023', 'B 7890 JKL', 'Silver', 450000.00, 'tersedia', NULL, '2026-01-07 10:19:34', '2026-01-07 10:19:34'),
(6, 'KND006', 'Toyota Fortuner GR', 'mobil', 'Toyota', '2023', 'B 1999 RFS', 'Hitam', 800000.00, 'tersedia', NULL, '2026-01-08 10:10:23', '2026-01-08 10:10:23'),
(7, 'KND007', 'Isuzu Elf Long', 'bus', 'Isuzu', '2020', 'D 7777 AB', 'Putih', 1200000.00, 'maintenance', NULL, '2026-01-08 10:10:23', '2026-01-08 10:10:23'),
(8, 'KND008', 'Vespa Sprint S', 'motor', 'Piaggio', '2024', 'B 6666 VSP', 'Kuning', 250000.00, 'disewa', NULL, '2026-01-08 10:10:23', '2026-01-08 10:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `nama_lengkap`, `nik`, `alamat`, `no_telepon`, `email`, `created_at`, `updated_at`) VALUES
(1, 'PLG001', 'Budi Santoso', '3201012345678901', 'Jl. Merdeka No. 10, Jakarta', '081234567890', 'budi@email.com', '2026-01-07 10:19:34', '2026-01-07 10:19:34'),
(2, 'PLG002', 'Siti Nurhaliza', '3201012345678902', 'Jl. Sudirman No. 25, Bekasi', '082345678901', 'siti@email.com', '2026-01-07 10:19:34', '2026-01-07 10:19:34'),
(3, 'PLG003', 'Ahmad Fauzi', '3201012345678903', 'Jl. Gatot Subroto No. 15, Depok', '083456789012', 'ahmad@email.com', '2026-01-07 10:19:34', '2026-01-07 10:19:34'),
(4, 'PLG004', 'Manuel Johansen Dolok Saribu', '3124567894536748', 'perumahan, Jl. Telaga Pesona jl abarsyah 2 Cikarang No.8 blok L 19, Telagamurni, Kec. Cikarang Bar., Kabupaten Bekasi, Jawa Barat', '0896312521493', 'manueljohansen@gmail.com', '2026-01-07 13:42:00', '2026-01-07 13:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sewa`
--

CREATE TABLE `transaksi_sewa` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(30) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali_rencana` date NOT NULL,
  `tanggal_kembali_aktual` date DEFAULT NULL,
  `lama_sewa` int(11) NOT NULL,
  `total_biaya` decimal(12,2) NOT NULL,
  `denda` decimal(10,2) DEFAULT 0.00,
  `status` enum('aktif','selesai','batal') DEFAULT 'aktif',
  `catatan` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_sewa`
--

INSERT INTO `transaksi_sewa` (`id`, `kode_transaksi`, `id_pelanggan`, `id_kendaraan`, `tanggal_sewa`, `tanggal_kembali_rencana`, `tanggal_kembali_aktual`, `lama_sewa`, `total_biaya`, `denda`, `status`, `catatan`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'TRX20250101001', 1, 1, '2025-01-01', '2025-01-04', NULL, 3, 1050000.00, 0.00, 'selesai', NULL, 1, '2026-01-07 10:19:34', '2026-01-07 10:19:34'),
(2, 'TRX20250103001', 2, 3, '2025-01-03', '2025-01-06', NULL, 3, 450000.00, 0.00, 'selesai', NULL, 1, '2026-01-07 10:19:34', '2026-01-07 10:19:34'),
(3, 'TRX20260107001', 1, 2, '2026-01-07', '2026-01-09', NULL, 2, 800000.00, 0.00, 'aktif', '', 2, '2026-01-07 13:36:29', '2026-01-07 13:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `email`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$324xuswV1mmyvdG6NQ2lN.a8SMjb/rBGsTcUcuxK2ZzahohhFoeYa', 'Administrator', 'admin@rental.com', 'admin', '2026-01-07 10:19:34'),
(2, 'user1', '$2y$10$GdAWJVg5LlwWdnwDWicQiuP8fDv29SVE4tc3llFgNRYwTvUbeym3C', 'User Demo', 'user@rental.com', 'user', '2026-01-07 10:19:34');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_aktif`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi_aktif` (
`kode_transaksi` varchar(30)
,`nama_pelanggan` varchar(100)
,`no_telepon` varchar(15)
,`nama_kendaraan` varchar(100)
,`plat_nomor` varchar(20)
,`tanggal_sewa` date
,`tanggal_kembali_rencana` date
,`lama_sewa` int(11)
,`total_biaya` decimal(12,2)
,`hari_terlambat` int(7)
);

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_aktif`
--
DROP TABLE IF EXISTS `view_transaksi_aktif`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_aktif`  AS SELECT `t`.`kode_transaksi` AS `kode_transaksi`, `p`.`nama_lengkap` AS `nama_pelanggan`, `p`.`no_telepon` AS `no_telepon`, `k`.`nama_kendaraan` AS `nama_kendaraan`, `k`.`plat_nomor` AS `plat_nomor`, `t`.`tanggal_sewa` AS `tanggal_sewa`, `t`.`tanggal_kembali_rencana` AS `tanggal_kembali_rencana`, `t`.`lama_sewa` AS `lama_sewa`, `t`.`total_biaya` AS `total_biaya`, to_days(curdate()) - to_days(`t`.`tanggal_kembali_rencana`) AS `hari_terlambat` FROM ((`transaksi_sewa` `t` join `pelanggan` `p` on(`t`.`id_pelanggan` = `p`.`id`)) join `kendaraan` `k` on(`t`.`id_kendaraan` = `k`.`id`)) WHERE `t`.`status` = 'aktif' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kendaraan` (`kode_kendaraan`),
  ADD UNIQUE KEY `plat_nomor` (`plat_nomor`),
  ADD KEY `idx_kendaraan_status` (`status`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pelanggan` (`kode_pelanggan`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `idx_pelanggan_nama` (`nama_lengkap`);

--
-- Indexes for table `transaksi_sewa`
--
ALTER TABLE `transaksi_sewa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `idx_transaksi_status` (`status`),
  ADD KEY `idx_transaksi_tanggal` (`tanggal_sewa`,`tanggal_kembali_rencana`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_sewa`
--
ALTER TABLE `transaksi_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_sewa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_sewa`
--
ALTER TABLE `transaksi_sewa`
  ADD CONSTRAINT `transaksi_sewa_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `transaksi_sewa_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id`),
  ADD CONSTRAINT `transaksi_sewa_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
