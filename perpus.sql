-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 07:40 AM
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
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `patch` text NOT NULL,
  `status_premium` tinyint(1) NOT NULL,
  `sampul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `sinopsis`, `patch`, `status_premium`, `sampul`) VALUES
(1, 'Tuhan dan Ilmu Pengetahuan', 'John Doe', 'Penerbit A', 2020, 'Sebuah eksplorasi tentang hubungan antara Tuhan dan ilmu pengetahuan.', '/books/tuhan_dan_ilmu_pengetahuan.pdf', 1, '/covers/tuhan_dan_ilmu_pengetahuan.jpg'),
(2, 'Semesta Fisika', 'Jane Smith', 'Penerbit B', 2018, 'Penjelajahan tentang rahasia semesta melalui lensa fisika modern.', '/books/semesta_fisika.pdf', 0, '/covers/semesta_fisika.jpg'),
(3, 'Matematika dan Filsafat', 'Alan Turing', 'Penerbit C', 1950, 'Pertautan antara matematika dan filsafat dalam pemikiran seorang ahli komputer terkemuka.', '/books/matematika_dan_filsafat.pdf', 1, '/covers/matematika_dan_filsafat.jpg'),
(4, 'Marrye', 'Emily Bronte', 'Penerbit D', 1847, 'Kisah cinta yang rumit dan penuh intrik di tengah masyarakat Inggris abad ke-19.', '/books/marrye.pdf', 0, '/covers/marrye.jpg'),
(5, 'Once Upon a Time', 'Fairy Tale Author', 'Wonderland Press', 1900, 'A collection of timeless fairy tales that transport readers to magical realms.', '/books/once_upon_a_time.pdf', 1, '/covers/once_upon_a_time.jpg'),
(6, 'The Knight', 'Sir Lancelot', 'Camelot Publishing', 1100, 'The legendary tale of a noble knight and his quest for honor and justice.', '/books/the_knight.pdf', 1, '/covers/the_knight.jpg'),
(7, 'Lore of Herre', 'Fantasy Author', 'Realm Books', 2005, 'A fantasy epic set in the mythical world of Herre, filled with magic, adventure, and ancient lore.', '/books/lore_of_herre.pdf', 0, '/covers/lore_of_herre.jpg'),
(8, 'King of Dragon', 'Dragonologist', 'Dragon Press', 2015, 'The tale of a courageous hero who must confront the mighty King of Dragons to save the realm.', '/books/king_of_dragon.pdf', 1, '/covers/king_of_dragon.jpg'),
(9, 'Cara Menikahi Waifu', 'Otaku Author', 'Anime Publications', 2022, 'A humorous guide on how to navigate the challenges of marrying your beloved waifu from the world of anime.', '/books/cara_menikahi_waifu.pdf', 0, '/covers/cara_menikahi_waifu.jpg'),
(10, 'Two Daughters', 'Family Saga Writer', 'Generations Publishing', 2010, 'A family saga that unfolds over generations, exploring the intricate relationships between two sisters.', '/books/two_daughters.pdf', 1, '/covers/two_daughters.jpg'),
(11, 'Now I Am a Wife', 'Modern Love Author', 'Contemporary Press', 2019, 'A contemporary tale of love, marriage, and self-discovery in the fast-paced world of today.', '/books/now_i_am_a_wife.pdf', 1, '/covers/now_i_am_a_wife.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id_membership` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('User','Admin') NOT NULL,
  `status_membership` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_membership` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id_membership`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id_membership` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
