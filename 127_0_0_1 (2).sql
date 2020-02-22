-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 02:36 PM
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
  `tanggal_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `jumlah_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `diskon` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `diskon`, `quantity`, `deskripsi`, `foto`) VALUES
('5e3966d192f5f', 'Lenovo S340', 200000, 90, 90, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti iusto, odio quasi ratione atque ad ipsa omnis natus minus facilis porro repellat aliquam suscipit dolorum cumque tempore vero eum Recusandae, nam distinctio! Voluptas fuga voluptatibus esse dignissimos nam? Natus magnam commodi impedit, quasi est placeat aliquam pariatur vitae explicabo rem nesciunt, dolorem porro ratione accusantium soluta modi omnis velit.Ut ducimus est officia minima dolor, architecto repellat ratione. Quasi nobis, quo voluptatem architecto necessitatibus in illum et molestiae distinctio doloribus. Perferendis, doloremque reiciendis! Omnis esse voluptate porro perspiciatis sit! Enim tempora suscipit unde error fugit quis eum doloremque quisquam impedit! Eos maxime dicta laboriosam molestias ut doloremque eligendi qui quis soluta veniam, quod sunt consequuntur, inventore iure totam magnam.', '2135873045.jpg'),
('5e3c0992207a4', 'SSD Crucial 240gb', 420000, 0, 20, 'SSD Crucial dengan sata 6gbps dan kecepatan r/w hingga 500mb', '832254966.jpg');

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
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `display`, `no_telpon`, `email`, `foto`) VALUES
('5e3927fb8dd13', 'admin', 'admin', 'admin', 'Admin', '0895412946783', 'arfankurnianto29@gmail.com', 'default.png'),
('5e3bc9c867086', 'user', 'user', 'user', 'user', '089775342186', 'ikbal249@gmail.com', 'default.png');

--
-- Indexes for dumped tables
--

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
