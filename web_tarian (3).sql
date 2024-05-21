-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 12:14 PM
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
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `hari`, `tanggal`, `lokasi`, `harga`) VALUES
(1, 'Grebeg Suro', 'Jum\'at', '2024-05-03', 'Alun-Alun Kota Ponorogo, Ponorogo', 100.00),
(2, 'JATRA ', 'Kamis', '2024-05-09', 'Sidoarjo', 0.00),
(8, 'lololo', 'kamis', '2024-06-13', 'Ponorogo', 0.00),
(9, 'MIMi', 'Senin', '2024-06-10', 'Sidoarjo', 100.00),
(10, 'HarJadNas', 'Senin', '2024-06-03', 'Sidoarjo', 150.00),
(12, 'munu', 'Jumat', '2024-05-31', 'Sidoarjo', 50.00),
(13, 'dami', 'kamis', '2024-05-30', 'Sidoarjo', 100000.00),
(14, 'j,vb shF', 'Jumat', '2024-05-25', 'Tanggulangin, Sidoarjo', 50.00),
(15, ' ,.ab gavk', 'Jumat', '2024-06-07', 'skdbv ', 50.00),
(16, 'momomom', 'kamis', '2024-06-06', 'Ponorogo', 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_details` varchar(255) DEFAULT NULL,
  `status` enum('pending','paid') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_pembayaran`, `jumlah_pembelian`, `total`, `id`, `id_event`, `payment_method`, `payment_details`, `status`) VALUES
(4, '2024-05-14 12:33:03', '10', 0.00, 1257, 10, NULL, NULL, 'pending'),
(5, '2024-05-14 12:37:06', '3', 0.00, 1259, 9, NULL, NULL, 'pending'),
(6, '2024-05-14 12:42:59', '4', 400000.00, 1244, 1, NULL, NULL, 'pending'),
(38, '2024-05-15 11:54:34', '4', 0.00, 1267, 8, NULL, NULL, 'pending'),
(42, '2024-05-15 12:10:35', '6', 300.00, 1268, 12, NULL, NULL, 'pending'),
(43, '2024-05-16 00:05:01', '6', 600000.00, 1269, 13, 'bank_transfer', 'tv5yv4uibxjy', 'paid');

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
(1271, '', 'luis', '', '', 'luis@gmail.com'),
(1272, '', 'biama', '', '', 'diama@gmail.com'),
(1273, '', 'loo', '', '', 'loo@gmail.com'),
(1274, '', 'momomom', '', '', 'momomo@gmail.com'),
(1275, '', 'qwerty', '', '', 'koko2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
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
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_event` (`id_event`);

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
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tarian`
--
ALTER TABLE `tarian`
  MODIFY `id_tarian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1276;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
