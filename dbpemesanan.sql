-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2026 at 03:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpemesanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_belanja` int NOT NULL,
  `metode_pembayaran` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tanggal_pemesanan`, `total_belanja`, `metode_pembayaran`) VALUES
(108, '2025-07-07', 125000, 'QRIS');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_produk`
--

CREATE TABLE `pemesanan_produk` (
  `id_pemesanan_produk` int NOT NULL,
  `id_pemesanan` int NOT NULL,
  `id_menu` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan_produk`
--

INSERT INTO `pemesanan_produk` (`id_pemesanan_produk`, `id_pemesanan`, `id_menu`, `jumlah`) VALUES
(7, 32, '9', 1),
(8, 32, '11', 1),
(9, 33, '16', 1),
(10, 33, '6', 1),
(11, 34, '13', 1),
(12, 34, '8', 1),
(13, 34, '9', 1),
(14, 34, '17', 1),
(15, 35, '9', 2),
(16, 35, '14', 1),
(17, 36, '8', 1),
(18, 37, '13', 1),
(19, 37, '16', 1),
(20, 38, '8', 1),
(21, 39, '9', 1),
(22, 39, '16', 1),
(23, 40, '10', 1),
(24, 40, '14', 1),
(25, 41, '17', 1),
(26, 41, '10', 1),
(27, 41, '9', 2),
(28, 42, '9', 1),
(29, 42, '14', 1),
(30, 42, '7', 1),
(31, 42, '17', 1),
(32, 43, '14', 1),
(33, 44, '8', 1),
(34, 45, '7', 1),
(35, 46, '7', 1),
(36, 47, '8', 1),
(37, 47, '7', 1),
(38, 48, '7', 2),
(39, 49, '6', 1),
(40, 50, '6', 1),
(41, 51, '6', 1),
(42, 52, '8', 1),
(43, 53, '23', 1),
(44, 54, '7', 1),
(45, 55, '21', 1),
(46, 56, '8', 1),
(47, 57, '8', 1),
(48, 58, '21', 1),
(49, 59, '8', 1),
(50, 60, '7', 1),
(51, 61, '22', 1),
(52, 62, '25', 1),
(53, 63, '7', 1),
(54, 64, '21', 1),
(55, 65, '6', 1),
(56, 66, '26', 1),
(57, 67, '8', 1),
(58, 67, '24', 1),
(59, 68, '7', 1),
(60, 69, '8', 1),
(61, 70, '6', 1),
(62, 71, '7', 1),
(63, 72, '22', 1),
(64, 73, '6', 1),
(65, 74, '6', 1),
(66, 75, '7', 1),
(67, 76, '25', 1),
(68, 77, '7', 1),
(69, 78, '23', 1),
(70, 79, '6', 1),
(71, 80, '24', 1),
(72, 81, '22', 1),
(73, 82, '32', 1),
(74, 83, '6', 1),
(75, 83, '21', 1),
(76, 83, '32', 1),
(77, 84, '8', 1),
(78, 85, '6', 1),
(79, 86, '7', 1),
(80, 87, '7', 1),
(81, 88, '6', 1),
(82, 89, '6', 1),
(83, 90, '7', 1),
(84, 91, '8', 1),
(85, 91, '7', 1),
(86, 92, '6', 1),
(87, 93, '6', 1),
(88, 94, '6', 1),
(89, 95, '21', 1),
(90, 96, '7', 1),
(91, 97, '23', 1),
(92, 98, '23', 1),
(93, 98, '7', 1),
(94, 99, '7', 1),
(95, 100, '7', 1),
(96, 101, '25', 1),
(97, 102, '40', 1),
(98, 103, '38', 1),
(99, 104, '22', 1),
(100, 105, '22', 1),
(101, 106, '22', 1),
(102, 106, '23', 1),
(103, 107, '7', 1),
(104, 108, '36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_menu` int NOT NULL,
  `nama_menu` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_menu` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_menu`, `nama_menu`, `jenis_menu`, `harga`, `gambar`) VALUES
(7, 'Mulyo Agung Mini Soccer', 'Minisoccer', 1300000, 'lapagan4.jpg'),
(22, 'Grand Central Sport Center 1', 'Basket', 1000000, 'baskett.jpeg'),
(23, 'Derby Mini Soccer', 'Minisoccer', 1300000, 'lapangan3.jpg'),
(24, 'Panenka Soccer', 'Minisoccer', 1500000, 'relone.jpg'),
(25, 'Galaxy Sports Center', 'Minisoccer', 1300000, 'samin.jpg'),
(36, 'My Futsal', 'Futsal', 125000, 'fautsallll.jpeg'),
(38, 'Ramon Futsal', 'Futsal', 125000, 'futsal.jpeg'),
(39, 'YPK Wijaya Basketball Court', 'Basket', 150000, 'baskettt.jpeg'),
(40, 'Buls Arena', 'Basket', 170000, 'basketttr.jpeg'),
(43, 'Shine Badminton', 'Badminton', 50000, 'bultanggg.jpeg'),
(44, 'Supreme Arena Badminton', 'Badminton', 65000, 'bultang.jpeg'),
(45, 'Lapangan Bulu Tangkis Patra', 'Badminton', 40000, 'bulss.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `hp` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('admin','user','','') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `hp`, `status`) VALUES
(3, 'admin', 'admin', 'Alfirdaus Muhammad Farhan', 'Laki-Laki', '1998-05-19', 'Tanjung Piayu', '089123614882', 'admin'),
(4, 'user', 'user', 'Rinaldo', 'Laki-Laki', '1998-10-22', 'Tanjung Uma', '089560328673', 'user'),
(7, 'syauki', 'syauki', 'syauki', 'Laki-Laki', '2004-11-23', 'Jakarta Timur', '085774151916', 'user'),
(8, 'daus', 'daus', 'dausss', 'Perempuan', '2132-03-21', 'Tanggrang', '08577415191632', 'user'),
(11, 'wahyu', 'wahyu123', 'wahyu Samin', 'Laki-Laki', '2025-07-24', 'Tanggrang', '0857741512121', 'user'),
(12, 'upi', 'upi123', 'luthfi', 'Laki-Laki', '2025-08-01', 'JL Babelan', '085772131231', 'user'),
(13, 'Rey', '123', 'rey', 'Laki-Laki', '2025-07-31', 'Jakarta  utara', '0918', 'user'),
(14, 'pompom', '123', 'pompom', 'Laki-Laki', '2025-07-08', 'jl', '098', 'user');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwuser`
-- (See below for the actual view)
--
CREATE TABLE `vwuser` (
`Alamat` varchar(25)
,`id_user` int
,`Jenis_Kelamin` varchar(25)
,`Nama_Lengkap` longtext
,`NO HP` varchar(10)
,`Status` enum('admin','user','','')
,`Tanggal Lahir` varchar(11)
,`Username` varchar(25)
);

-- --------------------------------------------------------

--
-- Structure for view `vwuser`
--
DROP TABLE IF EXISTS `vwuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwuser`  AS SELECT `user`.`id_user` AS `id_user`, `user`.`username` AS `Username`, concat(left(`user`.`nama_lengkap`,3),repeat('*',(length(`user`.`nama_lengkap`) - 3))) AS `Nama_Lengkap`, `user`.`jenis_kelamin` AS `Jenis_Kelamin`, concat(year(`user`.`tanggal_lahir`),'-**-**') AS `Tanggal Lahir`, `user`.`alamat` AS `Alamat`, concat('*******',right(`user`.`hp`,3)) AS `NO HP`, `user`.`status` AS `Status` FROM `user``user`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD PRIMARY KEY (`id_pemesanan_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  MODIFY `id_pemesanan_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
