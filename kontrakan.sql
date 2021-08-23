-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 12:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kontrakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'adminadmin'),
('admin', 'adminadmin');

-- --------------------------------------------------------

--
-- Table structure for table `prm_karyawan`
--

CREATE TABLE `prm_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nm_karyawan` varchar(35) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_handphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prm_karyawan`
--

INSERT INTO `prm_karyawan` (`id_karyawan`, `nm_karyawan`, `alamat`, `no_handphone`) VALUES
(0, 'wakjdwkaj', 'kajwdkjw', '92831983'),
(3, 'Indahy', 'Jakarta', '018292'),
(4, 'kilo', 'jaktim', '0192992'),
(5, 'jkawdjkawj', 'khdwklawhli', '0812098192'),
(6, 'koawokda', 'jdklawjdklj', '128918'),
(7, 'vavava', 'jkadwjkajwd', '27318927389'),
(9, 'jkdajkw', 'jkwjdkawj', '02302'),
(10, 'kawodiawod', 'kodkaowdk', '8293891'),
(15, 'mancay', 'dawdasdaw', '1231'),
(61, 'awdaw', 'awdawd', '697897'),
(123, 'awdawd', 'sdaw', '414'),
(231, 'idadaw', 'kawkdal', '0991'),
(929, 'awkdakw', 'kdkakwd', '8912891'),
(31013, 'dawdka', 'kawdkawk', '028939719'),
(209102, 'jiawjdkwaj', 'jawidjij', '892891'),
(802381, 'kadjkawjdk', 'jdkajwdaiwdh', '9023018');

-- --------------------------------------------------------

--
-- Table structure for table `prm_kontrakan`
--

CREATE TABLE `prm_kontrakan` (
  `id` int(11) NOT NULL,
  `nm_kontrakan` varchar(30) NOT NULL,
  `pemilik` varchar(30) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prm_kontrakan`
--

INSERT INTO `prm_kontrakan` (`id`, `nm_kontrakan`, `pemilik`, `no_handphone`, `alamat`, `harga`, `gambar`, `lat`, `long`, `status`) VALUES
(1, 'Indah', 'Riza', '0829191', 'Jakarta            ', 10990090, '59674370.png', '-6.208760', '106.845599', 'tidak tersedia'),
(13, 'Ahmad Riza Noer Ismunandar', 'Riza', '213131', 'Jakarta timur', 10990090, '93545614.png', '-6.9032739', '107.5731163', 'tidak tersedia'),
(14, 'TESTER', 'Riza', '1212', 'Jakarta timur', 10990090, '71321466.png', '', '', 'tidak tersedia'),
(15, 'TESTER', 'adawd', '213131', 'Jakarta timur', 10990090, '19448650.png', '', '', 'tidak tersedia'),
(123, 'Ahmad Riza Noer Ismunandar', 'Riza', '213131', 'kawkdal', 100000, '33172028.png', '', '', 'tidak tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `prm_pelanggan`
--

CREATE TABLE `prm_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nm_pelanggan` varchar(25) NOT NULL,
  `no_handphone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prm_pelanggan`
--

INSERT INTO `prm_pelanggan` (`id_pelanggan`, `nm_pelanggan`, `no_handphone`) VALUES
(0, 'Ahmad Riza Noer Ismunanda', '12512'),
(1, 'TESTER', '11'),
(13, 'gea', '141');

-- --------------------------------------------------------

--
-- Table structure for table `trx_kontrakan`
--

CREATE TABLE `trx_kontrakan` (
  `id_transaksi` int(11) NOT NULL,
  `id_kontrakan` varchar(5) NOT NULL,
  `id_pelanggan` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` int(2) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_kontrakan`
--

INSERT INTO `trx_kontrakan` (`id_transaksi`, `id_kontrakan`, `id_pelanggan`, `harga`, `tanggal`, `waktu`, `total`) VALUES
(1, '1', '0', 10990090, '2021-08-15', 2, 21980180),
(2, '13', '0', 10990090, '2021-08-19', 2, 21980180),
(3, '15', '0', 10990090, '2021-08-19', 2, 21980180),
(4, '14', '0', 10990090, '2021-08-19', 2, 21980180),
(5, '123', '1', 100000, '2021-08-19', 2, 200000),
(6, '1', '1', 10990090, '2021-08-19', 2, 21980180),
(7, '1', '0', 10990090, '2021-08-19', 2, 21980180),
(8, '13', '0', 10990090, '2021-08-19', 2, 21980180),
(9, '14', '0', 10990090, '2021-08-19', 2, 21980180),
(10, '13', '0', 10990090, '2021-08-19', 2, 21980180),
(11, '13', '0', 10990090, '2021-08-19', 2, 21980180),
(12, '1', '0', 10990090, '2021-08-19', 2, 21980180),
(13, '1', '1', 10990090, '2021-08-19', 2, 21980180),
(14, '13', '1', 10990090, '2021-08-19', 2, 21980180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prm_karyawan`
--
ALTER TABLE `prm_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `prm_kontrakan`
--
ALTER TABLE `prm_kontrakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prm_pelanggan`
--
ALTER TABLE `prm_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `trx_kontrakan`
--
ALTER TABLE `trx_kontrakan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trx_kontrakan`
--
ALTER TABLE `trx_kontrakan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
