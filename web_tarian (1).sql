-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 02:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_tarian`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `hari`, `tanggal`, `lokasi`) VALUES
(1, 'Grebeg Suro', 'Jum\'at', '2024-05-03', 'Alun-Alun Kota Ponorogo, Ponorogo'),
(2, 'JATRA ', 'Kamis', '2024-05-09', 'Sidoarjo'),
(3, 'JATIM Fest', 'Sabtu', '2024-05-11', 'Jiexpo Convetion Exhibition, Surabaya'),
(4, 'wkwkwk', 'kamis', '2024-10-11', 'manut');

-- --------------------------------------------------------

--
-- Table structure for table `tarian`
--

CREATE TABLE `tarian` (
  `jenis_tari` varchar(50) NOT NULL,
  `nama_tari` varchar(50) NOT NULL,
  `sejarah_tari` varchar(100) NOT NULL,
  `asal_daerah` varchar(50) NOT NULL,
  `kostum` varchar(50) NOT NULL,
  `id_tarian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `jumlah_tersedia` int(11) NOT NULL,
  `no_tempat_duduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jumlah_pembelian` char(255) NOT NULL,
  `total` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `email`) VALUES
(1239, 'timot', 'timot', '1234', 'user', 'koko@gmail.com'),
(1242, 'bia', 'bia', '123', 'admin', 'koko@gmail.com'),
(1244, 'ko', 'ko', 'ko', 'user', 'dono@gmail.com'),
(1257, 'li', 'li', 'li', 'Admin', 'bimaaji0904@gmail.com'),
(1258, 'la', 'la', 'd0efe00ae6ce01bba5490277d1f6cf54', '', 'koko@gmail.com'),
(1259, 'pppp', 'pppp', '2504f8314b1ec75a3f00b3d9d0595193', 'user', 'bima@gmail.com'),
(1260, 'lala', 'lala', '2e3817293fc275dbee74bd71ce6eb056', 'admin', 'lala@gmail.com'),
(1261, 'lili', 'lili', '54264c9bb72a51ce14ad7822abc7a41e', 'User', 'koko@gmail.com'),
(1263, 'lo', 'lo', 'd6581d542c7eaf801284f084478b5fcc', 'User', 'kiki@gmail.com'),
(1264, 'le', 'le', 'ppp', '', 'lekku@gmail.com'),
(1265, 'bo', 'bo', 'bol', 'User', 'JCBADL@gmail.com'),
(1266, 'bo', 'bi', 'bi', 'User', 'hedjhw@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tarian`
--
ALTER TABLE `tarian`
  ADD PRIMARY KEY (`id_tarian`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1267;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
