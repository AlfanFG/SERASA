-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 02:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_serasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` varchar(5) NOT NULL,
  `id_menu` varchar(5) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_menu`, `namaBarang`, `qty`) VALUES
('001', '001', 'Kopi Wenak', 5),
('002', '001', 'Kopi Susu Murni', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpesanan`
--

CREATE TABLE `tbl_detailpesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(5) NOT NULL,
  `id_menu` varchar(5) NOT NULL,
  `Qty` int(11) NOT NULL,
  `subTotal` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailpesanan`
--

INSERT INTO `tbl_detailpesanan` (`id`, `id_pesanan`, `id_menu`, `Qty`, `subTotal`) VALUES
(18, 'P0002', 'M0001', 2, 46000),
(19, 'P0003', 'M0001', 1, 23000),
(20, 'P0003', 'M0003', 1, 23000),
(21, 'P0004', 'M0002', 1, 23000),
(22, 'P0005', 'M0003', 1, 23000),
(23, 'P0005', 'M0002', 1, 23000),
(24, 'P0006', 'M0003', 1, 23000),
(25, 'P0007', 'M0002', 1, 23000),
(26, 'P0007', 'M0003', 1, 23000),
(27, 'P0008', 'M0003', 1, 23000),
(28, 'P0009', 'M0003', 1, 23000),
(29, 'P0009', 'M0002', 1, 23000),
(31, 'P0011', 'M0001', 1, 23000),
(34, 'P0013', 'M0002', 1, 23000),
(35, 'P0013', 'M0001', 1, 23000),
(36, 'P0014', 'M0001', 1, 23000),
(37, 'P0015', 'M0001', 1, 23000),
(38, 'P0016', 'M0009', 1, 24000),
(39, 'P0017', 'M0001', 1, 23000),
(40, 'P0018', 'M0001', 3, 69000),
(41, 'P0018', 'M0004', 1, 19000),
(42, 'P0018', 'M0006', 1, 19000),
(43, 'P0019', 'M0004', 1, 19000),
(44, 'P0019', 'M0003', 1, 23000),
(45, 'P0019', 'M0001', 1, 23000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `Nama_Jabatan` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `Nama_Jabatan`) VALUES
(1, 'Manager'),
(2, 'Barista');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategorimenu`
--

CREATE TABLE `tbl_kategorimenu` (
  `id_kategoriMenu` varchar(5) NOT NULL,
  `namaKategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategorimenu`
--

INSERT INTO `tbl_kategorimenu` (`id_kategoriMenu`, `namaKategori`) VALUES
('K0001', 'Milk Based'),
('K0002', 'Non Coffee'),
('K0003', 'Coffe Flavour'),
('K0004', 'Dimsum Goreng'),
('K0005', 'Dimsum Kukus'),
('K0006', 'Espresso Based'),
('K0007', 'Manual Brew'),
('K0008', 'Meal'),
('K0009', 'Rice Box'),
('K0010', 'Non Coffee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_user` int(11) NOT NULL,
  `id_pegawai` varchar(5) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id_user`, `id_pegawai`, `username`, `password`) VALUES
(1, 'M0001', 'admin', 'admin'),
(2, 'B0001', 'barista', 'barista'),
(4, 'M0002', 'manajer123', 'manajer123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` varchar(10) NOT NULL,
  `id_kategoriMenu` varchar(5) NOT NULL,
  `namaMenu` varchar(50) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `ketersediaan` enum('Tersedia','Tidak Tersedia') NOT NULL,
  `Deskripsi` varchar(500) NOT NULL,
  `fotoMenu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `id_kategoriMenu`, `namaMenu`, `harga`, `ketersediaan`, `Deskripsi`, `fotoMenu`) VALUES
('M0001', 'K0003', 'Kurasa Caramel', 23000, 'Tersedia', 'Ice/hot kurasa caramel\r\nKopi karamel dengan rasa khas dari Kurasa Coffe and Meal', 'kurasacaramel.jpg'),
('M0003', 'K0003', 'Kurasa Popcorn', 23000, 'Tersedia', 'Ice/hot kurasa popcorn\r\nKopi popcorn dengan rasa khas dari Kurasa Coffe and Meal', 'kurasapopcorn.jpg'),
('M0004', 'K0003', 'Tropical Caramel', 19000, 'Tersedia', 'Ice/hot tropical caramel coffee', 'tropicalcaramelcoffe.jpg'),
('M0005', 'K0003', 'Tropical Vanilla', 19000, 'Tersedia', 'Ice/hot tropical vanilla coffee', 'tropicalvanilla.jpg'),
('M0006', 'K0003', 'Coffee Beer', 19000, 'Tersedia', 'Ice/hot Coffee beer', 'coffeebeer.jpg'),
('M0007', 'K0003', 'Choco Espro', 23000, 'Tersedia', 'Ice/hot choco espro', 'chocoespro.jpg'),
('M0008', 'K0003', 'Hazelnut Latte', 24000, 'Tersedia', 'Ice/hot hazelnut lattee', 'hazelnutlatte.jpg'),
('M0009', 'K0003', 'Caramel Latte', 24000, 'Tersedia', 'Ice/hot caramel latte', 'caramellatte.jpg'),
('M0010', 'K0003', 'Vanilla Latte', 24000, 'Tersedia', 'Ice/hot vanilla latte', 'vanillalatte.jpg'),
('M0011', 'K0004', 'Sparing Roll Ayam 14', 14000, 'Tersedia', 'Spring Roll Ayam adalah makanan yang berupa ayam yang digulung dengan lumpia yang rasanya sangat enak dan gurih kriuk sangat nikmat apabila dicocol de', 'sparingrollayam.jpg'),
('M0012', 'K0004', 'Spring Roll Udang', 14000, 'Tersedia', 'Spring Roll Udang adalah makanan yang berupa udang yang digulung dengan lumpia yang rasanya sangat enak dan gurih kriuk sangat nikmat apabila dicocol dengan saus sambal', 'sparingrolludang.jpg'),
('M0013', 'K0004', 'Dumpling Ayam Udang', 14000, 'Tersedia', 'Dampling Ayam Udang adalah makanan yang berupa isian ayam dan udang yang rasanya sangat enak dan gurih kriuk sangat nikmat apabila dicocol dengan saus sambal', 'dumplingayamudang.jpg'),
('M0014', 'K0004', 'Kulit Tahu Ayam', 15000, 'Tersedia', 'Kulit Tahu Ayam adalah makanan yang berupa ayam yang digulung dengan kulit tahu yang rasanya sangat enak dan gurih kriuk sangat nikmat apabila dicocol dengan saus sambal', 'kulittahuayam.jpg'),
('M0015', 'K0004', 'Kulit Tahu Udang', 15000, 'Tersedia', 'Kulit Tahu Udang adalah makanan yang berupa udang yang digulung dengan kulit tahu yang rasanya sangat enak dan gurih kriuk sangat nikmat apabila dicocol dengan saus sambal', 'kulittahuudang.jpg'),
('M0016', 'K0005', 'Dimsum Hakau', 16000, 'Tersedia', 'Hakau adalah dimsum dengan kulitnya yang transparan dan bentuknya yang mungil serta diisi dengan udang rasanya enak banget.', 'hakau.jpg'),
('M0017', 'K0005', 'Dimsum Kulit Tahu Ayam', 15000, 'Tersedia', 'Dimsum Kulit Tahu Ayam adalah suatu dimsum yang dibalut oleh kulit tahu yang berisi racikan ayam yang dihalurskan dengan bumbu khas.', 'kulit.jpg'),
('M0018', 'K0005', 'Dimsum Mozarella', 16000, 'Tersedia', 'Dimsum mozarella adalah isian dimsum ayam yang diberi topping keju mozarella yang melted sekali.', 'moza.jfif'),
('M0019', 'K0005', 'Dimsum Ayam', 15000, 'Tersedia', 'Dimsum Ayam suatu racikan dari ayam yang dihaluskan secara kasar dengan bumbu dimsum dan bisa dinikmati denga chilli oil.', 'ayam.jpg'),
('M0020', 'K0005', 'Dumpling Ayam Udang', 14000, 'Tersedia', 'Dumpling jenis dimsum yang berisi ayam dan udang tentunya beda dengan dimsum ayam biasa, rasanya enak.', 'dumpling.jpg'),
('M0021', 'K0005', 'Dimsum Nori', 15000, 'Tersedia', 'Dimsum nori adalah paduan dari dimsum ayam yang diberi topping nori yang gurih.', 'nori.jpg'),
('M0022', 'K0006', 'Americano', 17000, 'Tersedia', 'Ice/hot americano', 'americano.jpeg'),
('M0023', 'K0007', 'Tubruk', 21000, 'Tersedia', 'Ice/hot tubruk coffee\r\nDibuat dengan metode immersion', 'manualbrewtubruk.jpg'),
('M0025', 'K0007', 'V60', 23000, 'Tersedia', 'Ice/hot V60 coffee\r\nPenyeduhan dengan metode pour over', NULL),
('M0026', 'K0007', 'Aeropress', 23000, 'Tersedia', 'Ice/hot aeropress coffee\r\nDiseduh dengan proses ekstrasi melalui perendaman dengan alat press pot', 'manualbrewaeropress.jpg'),
('M0027', 'K0007', 'Flat Bottom', 23000, 'Tersedia', 'Ice/hot flat bottom coffee\r\nDiseduh menggunakan flat-bottom yang dilapisi filter paper', NULL),
('M0028', 'K0007', 'Japanese', 23000, 'Tersedia', 'Ice/hot japanese coffee\r\nDiseduh menggunakan teknik brewing khas ala jepang', NULL),
('M0029', 'K0007', 'Kalita Wave', 23000, 'Tersedia', 'Ice/hot kalita wave coffee\r\nDiseduh menggunakan teknik manual brewing pur over', NULL),
('M0030', 'K0008', 'Spring Roll', 18000, 'Tersedia', 'Spring roll berisi sayuran segar dan kulitnya bening transparan dengan tekstur yang lebih kenyal.', NULL),
('M0031', 'K0008', 'Snackbucket ', 28000, 'Tersedia', 'Snackbucket disini berbagai macam makanan seperti kentang sosis cireng makanan cemilan yang dijadikan satu.', NULL),
('M0032', 'K0008', 'Tahu Lada Garam', 18000, 'Tersedia', 'Tahu Lada Garam makanan yang enak buat ngemil dimana tahu dibalut dan dimasak dengan bumbu lada garam yang lezat.', NULL),
('M0033', 'K0008', 'French Fries', 16000, 'Tersedia', 'Fench Fries yang best seller dengan kelezatan yang maksimal.', NULL),
('M0034', 'K0002', 'Kurasa Vanillawe', 120000, 'Tersedia', 'wfw3f3f23', 'WhatsApp_Image_2021-05-27_at_09_59_22.jpeg'),
('M0035', 'K0004', 'Kulit Tahu Ayam', 120000, 'Tersedia', 'wefwef', 'WhatsApp_Image_2021-05-27_at_09_59_226.jpeg'),
('M0036', 'K0002', 'Kulit Tahu Ayam', 120000, 'Tersedia', 'fewfw', 'Pengajuan_Peminjaman_forbidden.png'),
('M0037', 'K0002', 'Kulit Tahu Ayam', 120000, 'Tersedia', 'qwfwef', 'WhatsApp_Image_2021-05-21_at_15_04_29.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` varchar(5) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `namaPegawai` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `namaPegawai`, `tgl_lahir`, `alamat`, `no_telp`, `foto`) VALUES
('B0001', 2, 'Bagas', '2000-06-28', 'Purwakarta', '08770712132', 'icons8-user-male-5123.png'),
('B0002', 2, 'Cendana', '2021-03-28', 'Garut', '08732121354', 'icons8-user-male-5125.png'),
('B0003', 2, 'Alfan Faturahman', '2021-04-28', 'Cianjur', '0871231232', 'WhatsApp_Image_2021-05-27_at_09_59_223.jpeg'),
('M0001', 1, 'Alfan Faturahman', '2021-05-12', 'Cianjur', '0871231232', 'icons8-user-male-5128.png'),
('M0002', 1, 'Putri', '2021-05-03', 'Bekasi ', '0871231232', 'WhatsApp_Image_2021-05-27_at_09_59_224.jpeg'),
('M0004', 1, 'Alfan Faturahman', '2021-05-10', 'Cianjur', '0871231232', 'WhatsApp_Image_2021-05-27_at_09_59_221.jpeg'),
('M0005', 1, 'Alfan Faturahman', '2021-05-11', 'Cianjur', '0871231232', 'icons8-ledger-524.png'),
('M0006', 1, 'Cendana', '2021-01-11', 'Cianjur', '0871231232', 'icons8-ledger-525.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` varchar(5) NOT NULL,
  `id_pegawai` varchar(5) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `nama_Customer` varchar(25) NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_pegawai`, `tgl_pesan`, `nama_Customer`, `bayar`, `total`) VALUES
('P0002', 'B0001', '2021-05-28 19:02:00', 'Alfan', 50000, 46000),
('P0003', 'B0001', '2021-05-28 19:02:00', 'alfan', 50000, 46000),
('P0004', 'B0001', '2021-05-28 19:02:00', 'Bagas', 30000, 23000),
('P0005', 'B0001', '2021-05-28 19:04:00', 'alfan', 50000, 46000),
('P0006', 'B0001', '2021-05-28 19:04:00', 'alfan', 30000, 23000),
('P0007', 'B0001', '2021-05-28 19:04:00', 'Bagas', 50000, 46000),
('P0008', 'B0001', '2021-05-28 19:04:00', 'Alfan', 30000, 23000),
('P0009', 'B0001', '2021-05-28 19:04:00', 'Alfan', 50000, 46000),
('P0011', 'B0001', '2021-05-28 19:45:00', 'Alfan', 30000, 23000),
('P0013', 'B0001', '2021-05-28 21:30:00', 'Alfan', 50000, 46000),
('P0014', 'B0001', '2021-05-29 00:11:00', 'Alfan', 50000, 23000),
('P0015', 'B0001', '2021-05-29 00:15:00', 'Alfan', 200000, 23000),
('P0016', 'B0001', '2021-05-29 16:03:00', 'awwefawf', 50000, 24000),
('P0017', 'B0001', '2021-05-29 16:03:00', 'Alfan', 30000, 23000),
('P0018', 'B0001', '2021-05-29 20:13:00', 'Alfan', 110000, 107000),
('P0019', 'B0001', '2021-05-29 20:24:00', 'Bagas', 70000, 65000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(12) NOT NULL,
  `id_pesanan` varchar(20) DEFAULT NULL,
  `id_menu` varchar(5) NOT NULL,
  `id_pegawai` varchar(5) NOT NULL,
  `namaCustomer` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jml_pesan` int(11) NOT NULL,
  `totalHarga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pesanan`, `id_menu`, `id_pegawai`, `namaCustomer`, `tgl_pesan`, `jml_pesan`, `totalHarga`) VALUES
(72, 'P0001', 'M0011', 'B0001', 'Hana', '2021-04-07', 3, 30000),
(73, 'P0002', 'M0011', 'B0002', 'Hanafun', '2021-05-07', 3, 30000),
(74, 'P0003', 'M0001', 'M0001', 'Hanafun', '2021-05-07', 3, 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_detailpesanan`
--
ALTER TABLE `tbl_detailpesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`,`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_kategorimenu`
--
ALTER TABLE `tbl_kategorimenu`
  ADD PRIMARY KEY (`id_kategoriMenu`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detailpesanan`
--
ALTER TABLE `tbl_detailpesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `tbl_pesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
