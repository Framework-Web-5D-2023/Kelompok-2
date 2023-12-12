-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 05:27 AM
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
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2b0f7be6c040897c864135cabb986bb9', '2023-12-09 08:05:17'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'fc4d13d46229fee7c030bb5758222aeb', '2023-12-09 08:27:34'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'fc4d13d46229fee7c030bb5758222aeb', '2023-12-09 08:27:42'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'fc4d13d46229fee7c030bb5758222aeb', '2023-12-09 08:27:50'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '6187b3dac598ecd72626514a5d2bf05f', '2023-12-11 02:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'administrator situs'),
(2, 'user', 'pengguna biasa'),
(3, 'membership_user', 'membership user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 7),
(2, 8),
(3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'dzikei', 1, '2023-12-09 06:54:58', 0),
(2, '::1', 'dzikri3344', 4, '2023-12-09 07:14:35', 0),
(3, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 07:32:48', 0),
(4, '::1', 'dzikri3344', 7, '2023-12-09 08:03:49', 0),
(5, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 08:05:29', 1),
(6, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 08:18:19', 1),
(7, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 08:19:31', 1),
(8, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 08:20:58', 1),
(9, '::1', 'radioactiv51305@gmail.com', 8, '2023-12-09 08:29:51', 1),
(10, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 08:42:13', 1),
(11, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 08:46:29', 1),
(12, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 08:50:47', 1),
(13, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:01:35', 1),
(14, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:11:22', 1),
(15, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:13:01', 1),
(16, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:15:41', 1),
(17, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:37:29', 1),
(18, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:38:41', 1),
(19, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:39:45', 1),
(20, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:40:58', 1),
(21, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:44:31', 1),
(22, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:46:28', 1),
(23, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:53:04', 1),
(24, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 09:58:01', 1),
(25, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 10:00:51', 1),
(26, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 10:04:17', 1),
(27, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 12:16:41', 1),
(28, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 12:18:00', 1),
(29, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-09 12:59:42', 1),
(31, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-10 02:22:34', 1),
(32, '::1', 'dzikri334', NULL, '2023-12-10 03:56:47', 0),
(33, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-10 04:00:07', 1),
(34, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-10 12:33:13', 1),
(35, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-10 12:34:36', 1),
(36, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-10 12:36:08', 1),
(37, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-10 12:37:12', 1),
(38, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-10 13:35:25', 1),
(39, '::1', 'dzikri1781945', 9, '2023-12-11 02:55:31', 0),
(40, '::1', '2210631170117@student.unsika.ac.id', 9, '2023-12-11 02:55:40', 1),
(41, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-11 04:20:29', 1),
(42, '::1', '2210631170117@student.unsika.ac.id', 9, '2023-12-11 05:32:22', 1),
(43, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-11 05:32:32', 1),
(44, '::1', '2210631170117@student.unsika.ac.id', 9, '2023-12-11 06:01:03', 1),
(45, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-11 06:02:45', 1),
(46, '::1', 'dzikrimaulana1781945@gmail.com', 7, '2023-12-11 06:18:24', 1),
(47, '::1', '2210631170117@student.unsika.ac.id', 9, '2023-12-11 07:31:33', 1),
(48, '::1', '2210631170117@student.unsika.ac.id', 9, '2023-12-11 07:40:16', 1),
(49, '::1', '2210631170117@student.unsika.ac.id', 9, '2023-12-11 07:40:57', 1),
(50, '::1', '2210631170117@student.unsika.ac.id', 9, '2023-12-11 08:00:48', 1),
(51, '::1', '2210631170117@student.unsika.ac.id', 9, '2023-12-11 08:13:01', 1),
(52, '::1', '2210631170117@student.unsika.ac.id', 9, '2023-12-12 01:19:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'crud', 'melakukan crud pada buku'),
(2, 'general', 'akses paling dasar'),
(3, 'baca_premium', 'khusus membership');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `path` text NOT NULL,
  `status_premium` tinyint(1) NOT NULL,
  `sampul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `sinopsis`, `path`, `status_premium`, `sampul`) VALUES
(1, 'Tuhan dan Ilmu Pengetahuan', 'John Doe', 'Penerbit A', 2020, 'Sebuah eksplorasi tentang hubungan antara Tuhan dan ilmu pengetahuan.', '1702079830_8a08474e54ccddc987e0.pdf', 1, 'tuhan_dan_ilmu_pengetahuan.jpg'),
(2, 'Semesta Fisika', 'Jane Smith', 'Penerbit B', 2018, 'Penjelajahan tentang rahasia semesta melalui lensa fisika modern.', '1702079830_8a08474e54ccddc987e0.pdf', 0, 'semesta_fisika.jpg'),
(3, 'Matematika dan Filsafat', 'Alan Turing', 'Penerbit C', 1950, 'Pertautan antara matematika dan filsafat dalam pemikiran seorang ahli komputer terkemuka.', '1702079830_8a08474e54ccddc987e0.pdf', 1, 'matematika_dan_filsafat.jpg'),
(4, 'Marrye', 'Emily Bronte', 'Penerbit D', 1847, 'Kisah cinta yang rumit dan penuh intrik di tengah masyarakat Inggris abad ke-19.', '1702079830_8a08474e54ccddc987e0.pdf', 0, 'marrye.jpg'),
(5, 'Once Upon a Time', 'Fairy Tale Author', 'Wonderland Press', 1900, 'A collection of timeless fairy tales that transport readers to magical realms.', '1702079830_8a08474e54ccddc987e0.pdf', 1, 'once_upon_a_time.jpg'),
(6, 'The Knight', 'Sir Lancelot', 'Camelot Publishing', 1100, 'The legendary tale of a noble knight and his quest for honor and justice.', '1702079830_8a08474e54ccddc987e0.pdf', 1, 'the_knight.jpg'),
(7, 'Lore of Herre', 'Fantasy Author', 'Realm Books', 2005, 'A fantasy epic set in the mythical world of Herre, filled with magic, adventure, and ancient lore.', '1702079830_8a08474e54ccddc987e0.pdf', 0, 'lore_of_herre.jpg'),
(8, 'King of Dragon', 'Dragonologist', 'Dragon Press', 2015, 'The tale of a courageous hero who must confront the mighty King of Dragons to save the realm.', '1702079830_8a08474e54ccddc987e0.pdf', 1, 'king_of_dragon.jpg'),
(9, 'Cara Menikahi Waifu', 'Otaku Author', 'Anime Publications', 2022, 'A humorous guide on how to navigate the challenges of marrying your beloved waifu from the world of anime.', '1702079830_8a08474e54anime987e0.pdf', 1, 'cara_menikahi_waifu.jpg'),
(10, 'Two Daughters', 'Family Saga Writer', 'Generations Publishing', 2010, 'A family saga that unfolds over generations, exploring the intricate relationships between two sisters.', '1702079830_8a08474e54ccddc987e0.pdf', 1, 'two_daughters.jpg'),
(11, 'My First and Last Love', 'Modern Love Author', 'Contemporary Press', 2019, 'A contemporary tale of love, marriage, and self-discovery in the fast-paced world of today.', '1702079830_8a08474e54ccddc987e0.pdf', 1, 'now_i_am_a_wife.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1702099753, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_membership` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'dzikrimaulana1781945@gmail.com', 'dzikri3344', '$2y$10$zda3ypOkoF/1o5mCpA5mxe06XqaIL70Dze45IQPiGK.I8vMKvy7qe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-12-09 07:29:52', '2023-12-09 08:05:17', NULL),
(8, 'radioactiv51305@gmail.com', 'dzikri4433', '$2y$10$P6YoP7qiSeou1wrn.XSJmOE6O.DJh7oVjnZd1mE8V6J0JuqKTq60K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-12-09 08:27:14', '2023-12-09 08:27:34', NULL),
(9, '2210631170117@student.unsika.ac.id', 'dzikri1781945', '$2y$10$mzXimDfKeNF9HCz66oUHROEb.F0wuW4rW5rYBqYStCH2R..p8U/9y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-12-11 02:55:00', '2023-12-11 02:55:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
