-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 11:19 AM
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
  `lokasi` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `id_tarian` int(11) NOT NULL,
  `stok` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `hari`, `tanggal`, `lokasi`, `harga`, `id_tarian`, `stok`) VALUES
(1, 'Grebeg Suro', 'Jum\'at', '2024-05-03', 'Alun-Alun Kota Ponorogo, Ponorogo', 100.00, 3, 987),
(24, 'Gs', 'Jumat', '2024-05-31', 'Ponorogo', 20.00, 3, 141),
(25, 'Hari Jadi Kota Surabaya', 'Sabtu', '2024-05-25', 'Balai Kota Surabaya', 50.00, 2, 495),
(26, 'HarJadNas Malang', 'kamis', '2024-05-30', 'Malang', 25.00, 1, 491),
(27, 'Hari Jadi Kota Jombang', 'Sabtu', '2024-06-08', 'Alun-Alun Jombang', 25.00, 2, 991);

-- --------------------------------------------------------

--
-- Table structure for table `masukan`
--

CREATE TABLE `masukan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masukan`
--

INSERT INTO `masukan` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'Bima', 'bima@gmail.com', 'Sangat jelek\r\n', '2024-05-23 09:52:28'),
(3, 'lala', 'biama@gmail.com', 'Jelek', '2024-05-23 09:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `tarian`
--

CREATE TABLE `tarian` (
  `id_tarian` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_tarian` varchar(255) NOT NULL,
  `deskripsi_tarian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarian`
--

INSERT INTO `tarian` (`id_tarian`, `foto`, `nama_tarian`, `deskripsi_tarian`) VALUES
(1, 'gtau.jpeg', 'Tari Topeng Malangan', 'kesenian tradisional yang berasal dari Kabupaten Malang, Jawa Timur, Indonesia. Kabupaten Malang menjadi salah satu pusat persebaran seni topeng di Jawa.'),
(2, 'tari remo.jpeg', 'Tari Remo', 'Berasal dari Kabupaten Jombang, Jawa Timur. Tarian ini diciptakan oleh seniman Jombang yang dikenal dengan Cak Mo yang pernah menjadi Gemblak dari sebuah Grup Reog di Ponorogo.'),
(3, 'reog.jpeg', 'Reog Ponorogo', 'tarian tradisional dari Ponorogo, Jawa Timur dalam arena yang berfungsi sebagai\r\n         hiburan rakyat, mengandung unsur magis, penari utama adalah orang berkepala singa dengan hiasan bulu merak, dengan berat topeng mencapai 50-60 kg'),
(4, 'anyep.jpeg', 'Tari Gandrung Sewu', 'Tari Gandrung merupakan tari tradisional yang khas dari Banyuwangi, Jawa Timur dan telah dipentaskan sejak ratusan tahun yang lalu. Tari Gandrung mulanya berasal dari kebudayaan Suku Osing dan menjadi wujud dari rasa syukur atas hasil panen'),
(5, 'thengul.jpeg', 'Tari Thengul', 'Tari Thengul merupakan tari yang diciptakan oleh seniman Bojonegoro pada tahun 1992 yaitu Joko\r\n            Santoso dan dibantu penata iringan Ibnu Sutawa (alm) selaku pihak P dan K kabupaten Bojonegoro.'),
(6, 'muang.jpeg', 'Tari Muang Sangkal', 'Tari Muang Sangkal lahir dilatar belakangi oleh kepedulian seorang seniman Sumenep bernama Taufiqurrachman terhadap kekayaan yang dimiliki Pulau Madura. Sejak munculnya tari Muang Sangkal hingga sekarang, sudah melekat sebagai salah satu ikon budaya '),
(7, 'tiban.jpeg', 'Tari Tiban', 'Tarian tiban adalah sebuah permintaan permohonan kepada yang maha kuasa berharap untuk diturunkanya hujan. Ada makna dalam dibalik ritual tarian tiban yaitu sebuah harapan sebuah pesan yang luhur demi lestarinya alam.'),
(8, 'ambarang.jpg', 'Tari Ambarang', 'Tari Ambarang adalah tarian Jawa Timur yang berasal dari Tulungagung. Tarian ini bercerita tentang pengamen jalanan di kota tersebut. Ada tiga kelompok penari dalam tarian ini yaitu penari pentul, jaranan, dan barong.');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_pembelian` char(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_tarian` int(11) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_details` varchar(255) DEFAULT NULL,
  `status` enum('pending','paid') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_pembayaran`, `jumlah_pembelian`, `total`, `id_user`, `id_event`, `id_tarian`, `payment_method`, `payment_details`, `status`) VALUES
(7, '2024-05-20 12:09:59', '4', 400.00, 1278, 1, 1, 'credit_card', 'hcnusukQ,CNGE', 'paid'),
(8, '2024-05-20 12:11:33', '5', 500.00, 1267, 1, 1, NULL, NULL, 'pending'),
(20, '2024-05-31 17:00:00', '8', 122222.00, 1276, 1, 1, NULL, NULL, 'pending'),
(21, '2024-05-14 17:00:00', '2', 100.00, 1276, 1, 1, NULL, NULL, 'pending'),
(32, '2024-05-23 08:15:56', '4', 80.00, 1257, 24, 3, 'credit_card', 'dfs', 'paid'),
(34, '2024-05-24 08:57:16', '4', 400.00, 1257, 1, 3, NULL, NULL, 'pending'),
(35, '2024-05-24 08:59:56', '5', 125.00, 1278, 27, 2, 'ewallet', 'GoPay', 'paid'),
(36, '2024-05-24 11:21:49', '5', 125.00, 1267, 26, 1, NULL, NULL, 'pending'),
(37, '2024-05-24 14:19:38', '4', 100.00, 1257, 27, 2, NULL, NULL, 'pending');

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
(1266, 'bo', 'bi', 'bi', 'User', 'hedjhw@gmail.com'),
(1267, '', 'biama', 'biama', 'User', 'biama@gmail.com'),
(1268, 'bubub', 'bubub', 'bubub', 'User', 'bubub@gmail.com'),
(1269, 'dima', 'dima', 'dima', 'User', 'dima@gmail.com'),
(1276, 'bima', 'bima', 'bima', 'User', 'bimaa@gmail.com'),
(1277, '', 'bima', '', '', 'bima_hakim_ts6_23@student.smktelkom-sda.sch.id'),
(1278, 'japip', 'japip', 'japip', 'User', 'japip@gmail.com'),
(1279, '', 'alo', '', '', ''),
(1280, 'tai', 'tai', 'tai', 'User', 'taiiiii@gmail.com'),
(1281, 'lilipa', 'lilipa', 'lilipa', 'Admin', 'lilipa@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `fk_id_tarian` (`id_tarian`);

--
-- Indexes for table `masukan`
--
ALTER TABLE `masukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarian`
--
ALTER TABLE `tarian`
  ADD PRIMARY KEY (`id_tarian`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tarian` (`id_tarian`),
  ADD KEY `transaksi_ibfk_2` (`id_event`);

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
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `masukan`
--
ALTER TABLE `masukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tarian`
--
ALTER TABLE `tarian`
  MODIFY `id_tarian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1282;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_id_tarian` FOREIGN KEY (`id_tarian`) REFERENCES `tarian` (`id_tarian`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_tarian`) REFERENCES `tarian` (`id_tarian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
