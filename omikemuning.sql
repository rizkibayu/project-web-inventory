-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 09:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omikemuning`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbound`
--

CREATE TABLE `inbound` (
  `id_inbound` int(11) NOT NULL,
  `po_inbound` varchar(40) NOT NULL,
  `id_permintaan` varchar(10) NOT NULL,
  `id_item` varchar(10) NOT NULL,
  `in_kuantitas` varchar(10) NOT NULL,
  `in_tanggal` date NOT NULL,
  `in_keterangan` varchar(225) NOT NULL,
  `kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbound`
--

INSERT INTO `inbound` (`id_inbound`, `po_inbound`, `id_permintaan`, `id_item`, `in_kuantitas`, `in_tanggal`, `in_keterangan`, `kategori`) VALUES
(183, 'PO-PRDK-OMI20220819145052', '85', 'PDK001', '9', '2022-08-20', 'barang dari owner', 'Produk'),
(184, 'PO-PRDK-OMI20220819145052', '86', 'PDK002', '20', '2022-08-20', 'barang dari owner', 'Produk'),
(185, 'PO-PRDK-OMI20220819145052', '87', 'PDK004', '30', '2022-08-20', 'barang dari owner', 'Produk'),
(186, 'PO-BRNG-OMI20220819145445', '88', 'BRG001', '0', '2022-08-20', 'barang dari owner', 'Barang Keperluan Toko'),
(187, 'PO-BRNG-OMI20220819145445', '89', 'BRG002', '20', '2022-08-20', 'barang dari owner', 'Barang Keperluan Toko'),
(188, 'PO-BRNG-OMI20220819145445', '90', 'BRG003', '30', '2022-08-20', 'barang dari owner', 'Barang Keperluan Toko'),
(189, 'PO-BRNG-OMI20220819145445', '91', 'BRG004', '40', '2022-08-20', 'barang dari owner', 'Barang Keperluan Toko'),
(190, 'IN-PDK-OMI20220819145939', '', 'PDK001', '10', '2022-08-18', 'PT MAJU MAKMUR', 'Produk'),
(191, 'IN-PDK-OMI20220819145939', '', 'PDK002', '5', '2022-08-18', 'PT MAJU MAKMUR', 'Produk'),
(192, 'IN-PDK-OMI20220819145939', '', 'PDK004', '10', '2022-08-18', 'PT MAJU MAKMUR', 'Produk'),
(193, 'IN-BRG-OMI20220819150229', '', 'BRG001', '100', '2022-08-24', 'MITRA JAYA', 'Barang Keperluan Toko'),
(194, 'IN-BRG-OMI20220819150229', '', 'BRG002', '200', '2022-08-24', 'MITRA JAYA', 'Barang Keperluan Toko'),
(195, 'IN-BRG-OMI20220819150229', '', 'BRG003', '300', '2022-08-24', 'MITRA JAYA', 'Barang Keperluan Toko'),
(196, 'IN-BRG-OMI20220819150229', '', 'BRG004', '400', '2022-08-24', 'MITRA JAYA', 'Barang Keperluan Toko');

--
-- Triggers `inbound`
--
DELIMITER $$
CREATE TRIGGER `delete_in` AFTER DELETE ON `inbound` FOR EACH ROW UPDATE produk SET produk.stok = produk.stok - old.in_kuantitas WHERE produk.id_produk = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_in_1` AFTER DELETE ON `inbound` FOR EACH ROW UPDATE keperluan_toko SET keperluan_toko.stok = keperluan_toko.stok - old.in_kuantitas WHERE keperluan_toko.id_barang = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_in` AFTER UPDATE ON `inbound` FOR EACH ROW UPDATE produk SET produk.stok = produk.stok - old.in_kuantitas + new.in_kuantitas WHERE produk.id_produk = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_in_1` AFTER UPDATE ON `inbound` FOR EACH ROW UPDATE keperluan_toko SET keperluan_toko.stok = keperluan_toko.stok - old.in_kuantitas + new.in_kuantitas WHERE keperluan_toko.id_barang = old.id_item
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `keperluan_toko`
--

CREATE TABLE `keperluan_toko` (
  `id_barang` varchar(12) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `stok` varchar(225) NOT NULL,
  `foto_barang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keperluan_toko`
--

INSERT INTO `keperluan_toko` (`id_barang`, `nama_barang`, `keterangan`, `stok`, `foto_barang`) VALUES
('BRG001', 'SAPU', 'DUS', '100', '20220726101027download.jfif'),
('BRG002', 'STRUK KASIR', 'ROLL', '0', 'tinta printer atas.jpg'),
('BRG003', 'SAPU xxxx', 'PCS', '390', '20220803180330HUKI DOT M.jfif'),
('BRG004', 'TETETETETSSSSSSSS', 'PCS', '440', '20220812232711HUKI DOT L.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `outbound`
--

CREATE TABLE `outbound` (
  `id_outbound` int(11) NOT NULL,
  `po_outbound` varchar(40) NOT NULL,
  `id_item` varchar(10) NOT NULL,
  `out_kuantitas` varchar(10) NOT NULL,
  `out_tanggal` date NOT NULL,
  `out_keterangan` varchar(225) NOT NULL,
  `kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outbound`
--

INSERT INTO `outbound` (`id_outbound`, `po_outbound`, `id_item`, `out_kuantitas`, `out_tanggal`, `out_keterangan`, `kategori`) VALUES
(29, 'OUT-PDK-OMI20220819150533', 'PDK002', '24', '2022-08-17', 'EFEFD', 'Produk'),
(30, 'OUT-PDK-OMI20220819150602', 'PDK004', '39', '2022-08-04', 'MMM', 'Produk'),
(31, 'OUT-BRG-OMI20220819150642', 'BRG003', '40', '2022-08-17', 'DIJUAL', 'Barang Keperluan Toko'),
(32, 'OUT-BRG-OMI20220819150702', 'BRG002', '200', '2022-08-26', 'SDSDS', 'Barang Keperluan Toko');

--
-- Triggers `outbound`
--
DELIMITER $$
CREATE TRIGGER `out_delete` AFTER DELETE ON `outbound` FOR EACH ROW UPDATE produk SET produk.stok = produk.stok + old.out_kuantitas WHERE produk.id_produk = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `out_delete_1` AFTER DELETE ON `outbound` FOR EACH ROW UPDATE keperluan_toko SET keperluan_toko.stok = keperluan_toko.stok + old.out_kuantitas WHERE keperluan_toko.id_barang = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `out_update` AFTER UPDATE ON `outbound` FOR EACH ROW UPDATE produk SET produk.stok = produk.stok + old.out_kuantitas WHERE produk.id_produk = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `out_update_1` AFTER UPDATE ON `outbound` FOR EACH ROW UPDATE keperluan_toko SET keperluan_toko.stok = keperluan_toko.stok + old.out_kuantitas WHERE keperluan_toko.id_barang = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `out_update_2` BEFORE UPDATE ON `outbound` FOR EACH ROW UPDATE produk SET produk.stok = produk.stok - new.out_kuantitas WHERE produk.id_produk = new.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `out_update_2_1` BEFORE UPDATE ON `outbound` FOR EACH ROW UPDATE keperluan_toko SET keperluan_toko.stok = keperluan_toko.stok - new.out_kuantitas WHERE keperluan_toko.id_barang = new.id_item
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(20) NOT NULL,
  `po_item` varchar(50) NOT NULL,
  `id_item` varchar(25) NOT NULL,
  `kuantitas` varchar(10) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `po_item`, `id_item`, `kuantitas`, `tanggal_permintaan`, `status`) VALUES
(85, 'PO-PRDK-OMI20220819145052', 'PDK001', '10', '2022-08-20', 'Received'),
(86, 'PO-PRDK-OMI20220819145052', 'PDK002', '20', '2022-08-20', 'Received'),
(87, 'PO-PRDK-OMI20220819145052', 'PDK004', '30', '2022-08-20', 'Received'),
(88, 'PO-BRNG-OMI20220819145445', 'BRG001', '5', '2022-08-20', 'Received'),
(89, 'PO-BRNG-OMI20220819145445', 'BRG002', '20', '2022-08-20', 'Received'),
(90, 'PO-BRNG-OMI20220819145445', 'BRG003', '30', '2022-08-20', 'Received'),
(91, 'PO-BRNG-OMI20220819145445', 'BRG004', '40', '2022-08-20', 'Received'),
(92, 'PO-PRDK-OMI20220819152112', 'PDK001', '20', '2022-08-20', 'On Delivery'),
(93, 'PO-PRDK-OMI20220819152140', 'PDK002', '30', '2022-08-20', 'On Delivery'),
(94, 'PO-PRDK-OMI20220819152159', 'PDK001', '10', '2022-08-13', 'Canceled'),
(95, 'PO-PRDK-OMI20220819152359', 'PDK001', '60', '2022-08-20', 'Waiting For Approval'),
(96, 'PO-BRNG-OMI20220819160704', 'BRG001', '1', '2022-08-20', 'On Delivery'),
(97, 'PO-BRNG-OMI20220819160720', 'BRG001', '2', '2022-08-20', 'Canceled'),
(98, 'PO-BRNG-OMI20220819160738', 'BRG001', '80', '2022-08-13', 'Waiting For Approval');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(12) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `stok` varchar(225) NOT NULL,
  `foto_produk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `keterangan`, `stok`, `foto_produk`) VALUES
('PDK001', 'KAPAS WAJAH', 'PCS', '2', '20220803172607struk.jfif'),
('PDK002', 'LEM UHU', 'RENCENG', '0', '20220803172619HUKI DOT L.jfif'),
('PDK004', 'SODA KUE', 'LITER', '1', '20220804125542download.jfif'),
('PDK005', 'ghgh', 'PCS', '0', '20220819152319HUKI DOT M.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `id_retur` int(11) NOT NULL,
  `po_retur` varchar(40) NOT NULL,
  `id_item` varchar(10) NOT NULL,
  `stok_before_retur` varchar(10) NOT NULL,
  `retur_kuantitas` varchar(10) NOT NULL,
  `retur_tanggal` date NOT NULL,
  `retur_keterangan` varchar(225) NOT NULL,
  `kategori` varchar(40) NOT NULL,
  `status_retur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`id_retur`, `po_retur`, `id_item`, `stok_before_retur`, `retur_kuantitas`, `retur_tanggal`, `retur_keterangan`, `kategori`, `status_retur`) VALUES
(41, 'RETUR-PDK-OMI20220821213158', 'PDK001', '20', '1', '2022-08-27', 'expired', 'Produk', 'Approve'),
(42, 'RETUR-PDK-OMI20220821213612', 'PDK001', '18', '8', '2022-08-25', 'dfdfd', 'Produk', 'Canceled'),
(43, 'RETUR-PDK-OMI20220821213646', 'PDK001', '18', '10', '2022-08-26', 'jhjhjhj', 'Produk', 'Approve'),
(44, 'RETUR-PDK-OMI20220821214032', 'PDK001', '8', '8', '2022-08-24', 'DFDFD', 'Produk', 'Canceled'),
(45, 'RETUR-PDK-OMI20220821214054', 'PDK001', '8', '8', '2022-08-26', 'SWDSDS', 'Produk', 'Approve'),
(46, 'RETUR-PDK-OMI20220821214537', 'PDK001', '8', '8', '2022-08-25', 'ddgd', 'Produk', 'Approve'),
(48, 'RETUR-BRG-OMI20220821215539', 'BRG002', '20', '10', '2022-08-25', 'sfdfd', 'Barang Keperluan Toko', 'Canceled'),
(49, 'RETUR-BRG-OMI20220821215600', 'BRG002', '20', '10', '2022-08-26', 'dgfgf', 'Barang Keperluan Toko', 'Approve'),
(50, 'RETUR-BRG-OMI20220821215953', 'BRG002', '20', '20', '2022-08-25', 'sdd', 'Barang Keperluan Toko', 'Approve'),
(51, 'RETUR-BRG-OMI20220821220021', 'BRG002', '20', '20', '2022-08-18', 'eere', 'Barang Keperluan Toko', 'Canceled'),
(52, 'RETUR-PDK-OMI20220821221201', 'PDK001', '2', '2', '2022-08-24', 'eerer', 'Produk', 'Waiting For Approval'),
(53, 'RETUR-BRG-OMI20220821221256', 'BRG004', '440', '40', '2022-08-17', 'sdsds', 'Barang Keperluan Toko', 'Waiting For Approval');

--
-- Triggers `retur`
--
DELIMITER $$
CREATE TRIGGER `retur_delete` AFTER DELETE ON `retur` FOR EACH ROW UPDATE produk SET produk.stok = produk.stok + old.retur_kuantitas WHERE produk.id_produk = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `retur_delete_1` AFTER DELETE ON `retur` FOR EACH ROW UPDATE keperluan_toko SET keperluan_toko.stok = keperluan_toko.stok + old.retur_kuantitas WHERE keperluan_toko.id_barang = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `retur_update` AFTER UPDATE ON `retur` FOR EACH ROW UPDATE produk SET produk.stok = produk.stok + old.retur_kuantitas WHERE produk.id_produk = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `retur_update_1` AFTER UPDATE ON `retur` FOR EACH ROW UPDATE keperluan_toko SET keperluan_toko.stok = keperluan_toko.stok + old.retur_kuantitas WHERE keperluan_toko.id_barang = old.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `retur_update_2` BEFORE UPDATE ON `retur` FOR EACH ROW UPDATE produk SET produk.stok = produk.stok - new.retur_kuantitas WHERE produk.id_produk = new.id_item
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `retur_update_2_1` BEFORE UPDATE ON `retur` FOR EACH ROW UPDATE keperluan_toko SET keperluan_toko.stok = keperluan_toko.stok - new.retur_kuantitas WHERE keperluan_toko.id_barang = new.id_item
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `level`) VALUES
(18, 'head', 'head@gmail.com', '1', 'Kepala toko'),
(19, 'owner', 'owner@gmail.com', '1', 'Owner'),
(23, 'spv', 'spv@gmail.com', '1', 'Supervisor toko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbound`
--
ALTER TABLE `inbound`
  ADD PRIMARY KEY (`id_inbound`);

--
-- Indexes for table `keperluan_toko`
--
ALTER TABLE `keperluan_toko`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `outbound`
--
ALTER TABLE `outbound`
  ADD PRIMARY KEY (`id_outbound`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbound`
--
ALTER TABLE `inbound`
  MODIFY `id_inbound` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `outbound`
--
ALTER TABLE `outbound`
  MODIFY `id_outbound` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `id_retur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
