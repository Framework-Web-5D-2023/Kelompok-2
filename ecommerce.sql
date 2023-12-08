-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 09:32 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` float NOT NULL,
  `merek` varchar(50) NOT NULL,
  `imageurl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `nama`, `harga`, `merek`, `imageurl`) VALUES
(4, 'Kursi Kayu', 1500000, 'Mebel Jaya', 'kursi_kayu.png'),
(5, 'Meja Makan', 2500000, 'Mebel Utama', 'meja_makan.png'),
(6, 'Lemari Pakaian', 3500000, 'Furniture Berkah', 'lemari_pakaian.png'),
(7, 'Sofa Empuk', 4500000, 'Mebel Sejahtera', 'sofa_empuk.png'),
(8, 'Rak Buku', 750000, 'Furniture Berkah', 'rak_buku.png'),
(9, 'Meja Kecil', 1200000, 'Mebel Jaya', 'meja_kecil.png'),
(11, 'sofa_mewah', 2000000, 'Mebel Jaya', 'sofa_mewah.png'),
(12, 'kursi_tiktalk', 1500000, 'Mebel Utama', 'kursi_tiktalk.png'),
(13, 'kursi_set_tamu', 1800000, 'Furniture Berkah', 'kursi_set_tamu.png'),
(14, 'kursi_set_minimalis', 1700000, 'Mebel Sejahtera', 'kursi_set_minimalis.png'),
(15, 'meja_rias', 2500000, 'Mebel Jaya', 'meja_rias.png'),
(16, 'kursi_solo', 1200000, 'Mebel Utama', 'kursi_solo.png'),
(17, 'sofa_arabic', 2200000, 'Furniture Berkah', 'sofa_arabic.png'),
(18, 'sofa_putih_a20', 1900000, 'Mebel Sejahtera', 'sofa_putih_a20.png'),
(19, 'sofa_hijau_classic', 2100000, 'Mebel Jaya', 'sofa_hijau_classic.png'),
(20, 'sofa_mewah', 2000000, 'Mebel Jaya', 'sofa_mewah.png'),
(21, 'kursi_tiktalk', 1500000, 'Mebel Utama', 'kursi_tiktalk.png'),
(22, 'kursi_set_tamu', 1800000, 'Furniture Berkah', 'kursi_set_tamu.png'),
(23, 'kursi_set_minimalis', 1700000, 'Mebel Sejahtera', 'kursi_set_minimalis.png'),
(24, 'meja_rias', 2500000, 'Mebel Jaya', 'meja_rias.png'),
(25, 'kursi_solo', 1200000, 'Mebel Utama', 'kursi_solo.png'),
(26, 'sofa_arabic', 2200000, 'Furniture Berkah', 'sofa_arabic.png'),
(27, 'sofa_putih_a20', 1900000, 'Mebel Sejahtera', 'sofa_putih_a20.png'),
(28, 'sofa_hijau_classic', 2100000, 'Mebel Jaya', 'sofa_hijau_classic.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kodepos` int(7) NOT NULL,
  `kecamatan` char(255) NOT NULL,
  `kabupaten` char(255) NOT NULL,
  `provinsi` char(255) NOT NULL,
  `alamat` text NOT NULL,
  `jumlahbayar` float NOT NULL,
  `bukti_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_product`, `nama`, `penerima`, `jumlah`, `kodepos`, `kecamatan`, `kabupaten`, `provinsi`, `alamat`, `jumlahbayar`, `bukti_pembayaran`) VALUES
(65, 5, 'Meja Makan', 'Jamal', 2, 35454, 'Jambi Timur', 'Batanghari', 'Jambi', 'Jl. Praniaga', 5000000, '1700986820_4473fccb912a6920d908.png'),
(66, 6, 'Lemari Pakaian', 'Abdul Muafiq Mursyidin', 10, 56656, 'Purwokerto', 'Banyumas', 'Jawa Tengah', 'Rt. 03/05', 35000000, ''),
(67, 4, 'Kursi Kayu', 'Akmal', 4, 45454, 'Lembang', 'Bandung', 'Jawa Barat', 'Rumah No.77, Jl. Parayana', 6000000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_detail` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_detail` FOREIGN KEY (`id_product`) REFERENCES `detail` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
