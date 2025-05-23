-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 12:30 PM
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
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `id_barang` int(10) NOT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(10) NOT NULL DEFAULT 0,
  `satuan_barang` varchar(20) NOT NULL,
  `harga_beli` double(20,2) NOT NULL DEFAULT 0.00,
  `status_barang` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah_barang`, `satuan_barang`, `harga_beli`, `status_barang`) VALUES
(1, 'BRG001', 'Laptop', 10, 'pcs', 5000000.00, 1),
(2, 'BRG002', 'Mouse', 50, 'pcs', 50000.00, 1),
(3, 'BRG003', 'Monitor', 15, 'pcs', 1500000.00, 1),
(4, 'BRG004', 'Keyboard', 40, 'pcs', 100000.00, 1),
(5, 'BRG005', 'RAM 8GB', 30, 'pcs', 400000.00, 1),
(6, 'BRG006', 'SSD 256GB', 25, 'pcs', 600000.00, 1),
(7, 'BRG007', 'Harddisk 1TB', 20, 'pcs', 500000.00, 1),
(8, 'BRG008', 'Printer', 5, 'pcs', 2000000.00, 1),
(9, 'BRG009', 'Tinta Printer Hitam', 10, 'pcs', 75000.00, 1),
(10, 'BRG010', 'Kertas A4', 100, 'rim', 40000.00, 1),
(11, 'BRG011', 'Proyektor', 3, 'pcs', 3500000.00, 1),
(12, 'BRG012', 'Speaker', 12, 'pcs', 300000.00, 1),
(13, 'BRG013', 'Kabel LAN', 50, 'meter', 5000.00, 1),
(14, 'BRG014', 'Obeng Set', 20, 'set', 150000.00, 1),
(15, 'BRG015', 'Tang Kombinasi', 35, 'pcs', 60000.00, 1),
(16, 'BRG016', 'Helm Proyek', 10, 'pcs', 75000.00, 1),
(17, 'BRG017', 'Sarung Tangan Kerja', 50, 'pasang', 25000.00, 1),
(18, 'BRG018', 'Meteran 5m', 25, 'pcs', 40000.00, 1),
(19, 'BRG019', 'Cangkul', 15, 'pcs', 90000.00, 1),
(20, 'BRG020', 'Sapu Lidi', 40, 'pcs', 15000.00, 1),
(21, 'BRG021', 'Ember Plastik', 30, 'pcs', 20000.00, 1),
(22, 'BRG022', 'Selang Air 10m', 20, 'meter', 35000.00, 1),
(23, 'BRG023', 'Pupuk Kompos 1kg', 50, 'kg', 12000.00, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
