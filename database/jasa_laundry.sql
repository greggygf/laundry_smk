-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2019 at 12:03 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasa_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `KodeBarang` varchar(5) NOT NULL,
  `NmBarang` varchar(50) NOT NULL,
  `Stok` int(11) NOT NULL,
  `TglUpdateStok` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`KodeBarang`, `NmBarang`, `Stok`, `TglUpdateStok`) VALUES
('item1', 'Arcana', 14, '2016-09-14'),
('item2', 'Immortal', 10, '2016-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_laundry`
--

CREATE TABLE `jenis_laundry` (
  `IDJenisLaundry` varchar(5) NOT NULL,
  `NmJenisLaundry` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_laundry`
--

INSERT INTO `jenis_laundry` (`IDJenisLaundry`, `NmJenisLaundry`) VALUES
('c', 'Cuci'),
('ck', 'Cuci Kering'),
('cks', 'Cuci Kering Setrika');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `NIK` varchar(20) NOT NULL,
  `NmKaryawan` varchar(50) NOT NULL,
  `AlmtKaryawan` varchar(50) NOT NULL,
  `TelpKaryawan` varchar(13) NOT NULL,
  `GenderKaryawan` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`NIK`, `NmKaryawan`, `AlmtKaryawan`, `TelpKaryawan`, `GenderKaryawan`) VALUES
('9383829292', 'Siswo Aji', 'Malang', '0818837392920', 'L'),
('admin', 'Greggy Gianini F.', 'Malang', '087759659653', 'L'),
('kyw02', 'Acha Hisyam', 'Jl.Kenangan', '085444333155', 'P'),
('kyw03', 'Gilang Putra', 'Jl.Polehan Gg.4 No.30', '085444993201', 'L'),
('mmg111', 'Misael Farhan', 'Jl.Gempol Bisa Malang Bisa Sidoarjo', '0888575757575', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `KodeKonsumen` varchar(5) NOT NULL,
  `NmKonsumen` varchar(50) NOT NULL,
  `AlmtKonsumen` varchar(50) NOT NULL,
  `TelpKonsumen` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`KodeKonsumen`, `NmKonsumen`, `AlmtKonsumen`, `TelpKonsumen`) VALUES
('kmz87', 'mau tahu aja', 'jl pelan-pelan banyak anak kecil yoooowh', '083876543219'),
('ksm03', 'Kucing Arab', 'Jl.Ciliwung 94', '081555998955'),
('mmb22', 'Robertus', 'Jl.Kenangan', '191919199191'),
('mmb3', 'Kelinci ', 'rumah', '09938488484'),
('mmb4', 'Muhammad Kurniawan', 'Jl.turun dituntun', '303030303030');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `TypeUser` varchar(10) NOT NULL,
  `NIK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `TypeUser`, `NIK`) VALUES
('achahisyam', 'okebos', 'user', 'kyw02'),
('admin', 'admin', 'admin', 'admin'),
('gilang_p', 'satuduatig', 'operator', 'kyw03');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian_barang`
--

CREATE TABLE `pemakaian_barang` (
  `KodePengeluaran` varchar(5) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `KodeBarang` varchar(5) NOT NULL,
  `NIK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakaian_barang`
--

INSERT INTO `pemakaian_barang` (`KodePengeluaran`, `Jumlah`, `KodeBarang`, `NIK`) VALUES
('kode1', 50, 'item1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `NoPembelian` varchar(5) NOT NULL,
  `TglPembelian` date NOT NULL,
  `TotalBiaya` int(11) NOT NULL,
  `IDSupplier` varchar(5) NOT NULL,
  `NIK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`NoPembelian`, `TglPembelian`, `TotalBiaya`, `IDSupplier`, `NIK`) VALUES
('beli2', '2016-08-06', 90000, 'sup02', 'kyw03');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pembelian`
--

CREATE TABLE `rincian_pembelian` (
  `NoRincian` varchar(50) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `NoPembelian` varchar(5) NOT NULL,
  `KodeBarang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian_pembelian`
--

INSERT INTO `rincian_pembelian` (`NoRincian`, `Jumlah`, `NoPembelian`, `KodeBarang`) VALUES
('rincian01', 10, 'beli2', 'item2');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_transaksi`
--

CREATE TABLE `rincian_transaksi` (
  `IDRincian` varchar(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `NoTransaksi` varchar(5) NOT NULL,
  `IDJenisPakaian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian_transaksi`
--

INSERT INTO `rincian_transaksi` (`IDRincian`, `Jumlah`, `NoTransaksi`, `IDJenisPakaian`) VALUES
('rincian_t1', 100, 't0002', 'c_sajadah');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `IDSupplier` varchar(5) NOT NULL,
  `NmSupplier` varchar(50) NOT NULL,
  `AlmtSupplier` varchar(50) NOT NULL,
  `TelpSupplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`IDSupplier`, `NmSupplier`, `AlmtSupplier`, `TelpSupplier`) VALUES
('sup01', 'Express', 'Jl.Bend.Sutarmi No.9E', '0341558029'),
('sup02', 'Laundryplasa', 'Jl. Sulfat Agung, Indah II no 31A', '0341495805'),
('sup03', 'Irul 48', 'Jl.Letjend Soetoyo IV No.34 Malang', '03417562123');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `IDJenisPakaian` varchar(10) NOT NULL,
  `NmPakaian` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL,
  `IDJenisLaundry` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`IDJenisPakaian`, `NmPakaian`, `tarif`, `IDJenisLaundry`) VALUES
('ck_sajadah', 'Sajadah', 15000, 'ck'),
('c_sajadah', 'Sajadah', 12000, 'c'),
('c_slayer', 'Slayer', 10000, 'ck');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `NoTransaksi` varchar(5) NOT NULL,
  `TglTransaksi` date NOT NULL,
  `TglAmbil` date NOT NULL,
  `Diskon` int(11) NOT NULL,
  `KodeKonsumen` varchar(5) NOT NULL,
  `NIK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`NoTransaksi`, `TglTransaksi`, `TglAmbil`, `Diskon`, `KodeKonsumen`, `NIK`) VALUES
('t0002', '2016-08-06', '2016-08-25', 8000, 'mmb3', 'kyw02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`KodeBarang`);

--
-- Indexes for table `jenis_laundry`
--
ALTER TABLE `jenis_laundry`
  ADD PRIMARY KEY (`IDJenisLaundry`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`KodeKonsumen`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `pemakaian_barang`
--
ALTER TABLE `pemakaian_barang`
  ADD PRIMARY KEY (`KodePengeluaran`),
  ADD KEY `pemakaian_barang_ibfk_1` (`KodeBarang`),
  ADD KEY `pemakaian_barang_ibfk_2` (`NIK`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`NoPembelian`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `IDSupplier` (`IDSupplier`);

--
-- Indexes for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD PRIMARY KEY (`NoRincian`),
  ADD KEY `NoPembelian` (`NoPembelian`),
  ADD KEY `KodeBarang` (`KodeBarang`);

--
-- Indexes for table `rincian_transaksi`
--
ALTER TABLE `rincian_transaksi`
  ADD PRIMARY KEY (`IDRincian`),
  ADD KEY `NoTransaksi` (`NoTransaksi`),
  ADD KEY `IDJenisPakaian` (`IDJenisPakaian`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IDSupplier`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`IDJenisPakaian`),
  ADD KEY `IDJenisLaundry` (`IDJenisLaundry`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`NoTransaksi`),
  ADD KEY `KodeKonsumen` (`KodeKonsumen`),
  ADD KEY `NIK` (`NIK`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemakaian_barang`
--
ALTER TABLE `pemakaian_barang`
  ADD CONSTRAINT `pemakaian_barang_ibfk_1` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pemakaian_barang_ibfk_2` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`IDSupplier`) REFERENCES `supplier` (`IDSupplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD CONSTRAINT `rincian_pembelian_ibfk_1` FOREIGN KEY (`NoPembelian`) REFERENCES `pembelian` (`NoPembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_pembelian_ibfk_2` FOREIGN KEY (`KodeBarang`) REFERENCES `barang` (`KodeBarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_transaksi`
--
ALTER TABLE `rincian_transaksi`
  ADD CONSTRAINT `rincian_transaksi_ibfk_1` FOREIGN KEY (`NoTransaksi`) REFERENCES `transaksi` (`NoTransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_transaksi_ibfk_2` FOREIGN KEY (`IDJenisPakaian`) REFERENCES `tarif` (`IDJenisPakaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `tarif_ibfk_1` FOREIGN KEY (`IDJenisLaundry`) REFERENCES `jenis_laundry` (`IDJenisLaundry`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`KodeKonsumen`) REFERENCES `konsumen` (`KodeKonsumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
