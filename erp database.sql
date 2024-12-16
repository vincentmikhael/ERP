-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 16, 2024 at 05:56 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_lem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bom`
--

CREATE TABLE `tb_bom` (
  `kode_bom` varchar(100) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `total_harga` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_bom`
--

INSERT INTO `tb_bom` (`kode_bom`, `kode_produk`, `tanggal`, `total_harga`) VALUES
('BOM-1', 'AP-1', '2024/12/12', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bom_list`
--

CREATE TABLE `tb_bom_list` (
  `kode_bom_list` int NOT NULL,
  `kode_bom` varchar(100) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `quantity` int NOT NULL,
  `satuan` varchar(10) NOT NULL DEFAULT 'etc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_bom_list`
--

INSERT INTO `tb_bom_list` (`kode_bom_list`, `kode_bom`, `kode_produk`, `quantity`, `satuan`) VALUES
(27, 'BOM-1', 'DG', 20, 'etc'),
(29, 'BOM-1', 'TP-1', 10, 'etc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mo`
--

CREATE TABLE `tb_mo` (
  `kode_mo` varchar(20) NOT NULL,
  `kode_bom` varchar(20) NOT NULL,
  `quantity` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_mo`
--

INSERT INTO `tb_mo` (`kode_mo`, `kode_bom`, `quantity`, `status`) VALUES
('122', 'BOM-1', 100, 3),
('MO-1', 'BOM-1', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `kuantitas` int NOT NULL,
  `harga` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`kode_produk`, `nama_produk`, `deskripsi_produk`, `gambar`, `kuantitas`, `harga`, `status`) VALUES
('AP-1', 'Dimsum ayam', 'Dimsum dengan daging ayam', '1734027225_photo.jpg', 9, 2000, 1),
('AP-2', 'Lumpia Udang', 'Dimsum udang dengan kulit kering', '1734027298_large_resep_92_lumpia udang mayonaise.jpg', 0, 2500, 1),
('DG', 'Daging Ayam', 'Daging ayam', 'placeholder.png', 1200, 300, 2),
('TP-1', 'Tepung', 'tepung', 'placeholder.png', 900, 200, 2),
('UD', 'Udang', 'Udang', 'placeholder.png', 0, 350, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rfq`
--

CREATE TABLE `tb_rfq` (
  `kode_rfq` varchar(200) NOT NULL,
  `kode_vendor` int NOT NULL,
  `tanggal_transaksi` varchar(20) NOT NULL,
  `status` int NOT NULL,
  `total_harga` double NOT NULL,
  `metode_pembayaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_rfq`
--

INSERT INTO `tb_rfq` (`kode_rfq`, `kode_vendor`, `tanggal_transaksi`, `status`, `total_harga`, `metode_pembayaran`) VALUES
('123940', 6, '2024/12/12', 3, 300000, 1),
('RF-1', 6, '2024/12/12', 3, 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rfq_list`
--

CREATE TABLE `tb_rfq_list` (
  `kode_rfq_list` int NOT NULL,
  `kode_rfq` varchar(200) NOT NULL,
  `kode_produk` varchar(200) NOT NULL,
  `quantity` int NOT NULL,
  `satuan` varchar(50) NOT NULL DEFAULT 'etc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_rfq_list`
--

INSERT INTO `tb_rfq_list` (`kode_rfq_list`, `kode_rfq`, `kode_produk`, `quantity`, `satuan`) VALUES
(20, 'RF-1', 'TP-1', 1000, 'etc'),
(21, '123940', 'DG', 1000, 'etc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sales`
--

CREATE TABLE `tb_sales` (
  `kode_sales` varchar(200) NOT NULL,
  `kode_customer` int NOT NULL,
  `tanggal_transaksi` varchar(20) NOT NULL,
  `status` int NOT NULL,
  `total_harga` double NOT NULL,
  `metode_pembayaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sales`
--

INSERT INTO `tb_sales` (`kode_sales`, `kode_customer`, `tanggal_transaksi`, `status`, `total_harga`, `metode_pembayaran`) VALUES
('RF-2', 4, '2024/12/12', 3, 2000, 2),
('SL-1', 4, '2024/12/12', 1, 25000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sales_list`
--

CREATE TABLE `tb_sales_list` (
  `kode_sales_list` int NOT NULL,
  `kode_sales` varchar(200) NOT NULL,
  `kode_produk` varchar(200) NOT NULL,
  `quantity` int NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sales_list`
--

INSERT INTO `tb_sales_list` (`kode_sales_list`, `kode_sales`, `kode_produk`, `quantity`, `satuan`) VALUES
(19, 'SL-1', 'AP-2', 10, 'etc'),
(20, 'RF-2', 'AP-1', 1, 'etc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stakeholder`
--

CREATE TABLE `tb_stakeholder` (
  `kode` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_stakeholder`
--

INSERT INTO `tb_stakeholder` (`kode`, `nama`, `telpon`, `alamat`, `level`) VALUES
(3, 'Minji', '081230234595', 'Korea', 1),
(4, 'Ahmad Zulfan Najib', '081230234595', 'Jl. Diponegoro I Bululawang', 2),
(5, 'Vincent', '08982339050', 'Jl. Jalan', 1),
(6, 'PT. Food', '0888383838', 'Jl, Jalan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_produce`
--

CREATE TABLE `temp_produce` (
  `id` int NOT NULL,
  `kode_bom_list` int NOT NULL,
  `quantity_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bom`
--
ALTER TABLE `tb_bom`
  ADD PRIMARY KEY (`kode_bom`);

--
-- Indexes for table `tb_bom_list`
--
ALTER TABLE `tb_bom_list`
  ADD PRIMARY KEY (`kode_bom_list`);

--
-- Indexes for table `tb_mo`
--
ALTER TABLE `tb_mo`
  ADD PRIMARY KEY (`kode_mo`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `tb_rfq`
--
ALTER TABLE `tb_rfq`
  ADD PRIMARY KEY (`kode_rfq`);

--
-- Indexes for table `tb_rfq_list`
--
ALTER TABLE `tb_rfq_list`
  ADD PRIMARY KEY (`kode_rfq_list`);

--
-- Indexes for table `tb_sales`
--
ALTER TABLE `tb_sales`
  ADD PRIMARY KEY (`kode_sales`);

--
-- Indexes for table `tb_sales_list`
--
ALTER TABLE `tb_sales_list`
  ADD PRIMARY KEY (`kode_sales_list`);

--
-- Indexes for table `tb_stakeholder`
--
ALTER TABLE `tb_stakeholder`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `temp_produce`
--
ALTER TABLE `temp_produce`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bom_list`
--
ALTER TABLE `tb_bom_list`
  MODIFY `kode_bom_list` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_rfq_list`
--
ALTER TABLE `tb_rfq_list`
  MODIFY `kode_rfq_list` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_sales_list`
--
ALTER TABLE `tb_sales_list`
  MODIFY `kode_sales_list` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_stakeholder`
--
ALTER TABLE `tb_stakeholder`
  MODIFY `kode` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `temp_produce`
--
ALTER TABLE `temp_produce`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
