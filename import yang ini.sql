-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 02:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lomba`
--
CREATE DATABASE IF NOT EXISTS `lomba` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lomba`;

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_produk` varchar(255) NOT NULL,
  `nama_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `jumlah_pembelian` int(11) NOT NULL,
  `jasa_kurir` varchar(255) NOT NULL,
  `tujuan_pengiriman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_user` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_produk`, `id_user`, `komentar`) VALUES
('5e44a1da4df1f', '5e43b1673c5fb', '5e3bc9c867086', 'rasa ice cream');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `diskon`, `quantity`, `deskripsi`, `foto`) VALUES
('5e3fc6f4a0677', 'Blue Sky', 100000, 9, 2, 'Dengan desain warna biru yang menarik', '5e3fc6f4a0677.jpg'),
('5e3fc9471132c', 'Retro', 150000, 78, 0, 'Keyboard unik dengan warna layaknya buah jeruk', '5e3fc9471132c.jpg'),
('5e43902f27823', 'Red Dragon', 340000, 3, 30, 'Ini adalah produk keyboard terkeren dan terkece yg ada di Jorg Keyboard!', '5e43902f27823.jpg'),
('5e43906ee695b', 'Midnight', 290000, 0, 11, 'keyboard hitam memang keren, tapi keyboard hitam gelap dan terdapat lampu outlinenya disetiap tombolnya', '5e43906ee695b.jpg'),
('5e4391dd54940', 'Cherry Blossom', 1300000, 30, 8, 'keyboard keren yang bertemakan seperti Cherry', '5e4391dd54940.jpg'),
('5e4394197a5a6', 'Clevy', 50000, 10, 5, 'Keyboard Clevy yang artinya bingung', '5e4394197a5a6.jpg'),
('5e439450b5795', 'Vortex', 100000, 0, 20, 'Keyboard berisik tapi dengan suara keyboard yang keren', '5e439450b5795.jpg'),
('5e43af2869d05', 'Golden', 5999000, 2, 19997, 'Golden keyboard, agar terlihat keren seperti sultan', '5e43af2869d05.jpg'),
('5e43b1673c5fb', 'Ice Cream', 80000, 80, 89, 'Keyboard yang bertemakan layaknya seperti Ice Cream', '5e43b1673c5fb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  `no_telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `wallet` int(11) NOT NULL,
  `foto_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `display`, `no_telpon`, `email`, `wallet`, `foto_user`) VALUES
('5e3bc9c867086', 'user', 'user', 'user', 'user', '089775342186', 'example@mail.com', 1000000, '14888874.jpg'),
('5e4247b837c69', 'admin', 'admin', 'admin', 'coba', '089775342186', 'example@mail.com', 1000000, '1794129246.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
