-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 12:17 AM
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
-- Database: `laporan-spb-pulau-bunyu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data-kapal`
--

CREATE TABLE `data-kapal` (
  `NO` int(100) NOT NULL,
  `NAMA KAPAL` varchar(20) NOT NULL,
  `GT` int(255) NOT NULL,
  `BENDERA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data-kapal`
--

INSERT INTO `data-kapal` (`NO`, `NAMA KAPAL`, `GT`, `BENDERA`) VALUES
(1, 'SB. HARAPANKU', 15, 'INDONESIA'),
(2, 'SB. HARAPANKU EXPRES', 20, 'INDONESIA'),
(3, 'SB. MINSEN', 14, 'INDONESIA'),
(4, 'SB. RAHAYU', 16, 'INDONESIA'),
(5, 'SB BALAKU', 89, 'PERU');

-- --------------------------------------------------------

--
-- Table structure for table `spb`
--

CREATE TABLE `spb` (
  `NO` bigint(255) NOT NULL,
  `HARI` date NOT NULL,
  `NO CETAK SPB` bigint(255) NOT NULL,
  `NAMA KAPAL` varchar(20) NOT NULL,
  `NAMA PANGGIL` varchar(20) NOT NULL,
  `GT` int(255) NOT NULL,
  `BENDERA` varchar(20) NOT NULL,
  `TANGGAL TIBA` date NOT NULL,
  `PELABUHAN ASAL` varchar(20) NOT NULL,
  `NO SPB TIBA` varchar(20) NOT NULL,
  `TANGGAL TOLAK` date NOT NULL,
  `PELABUHAN TUJUAN` varchar(20) NOT NULL,
  `NO SPB TOLAK` varchar(20) NOT NULL,
  `ETA` varchar(20) NOT NULL,
  `TIBA DEWASA` int(100) NOT NULL,
  `TIBA ANAK` int(100) NOT NULL,
  `TOLAK DEWASA` int(100) NOT NULL,
  `TOLAK ANAK` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spb`
--

INSERT INTO `spb` (`NO`, `HARI`, `NO CETAK SPB`, `NAMA KAPAL`, `NAMA PANGGIL`, `GT`, `BENDERA`, `TANGGAL TIBA`, `PELABUHAN ASAL`, `NO SPB TIBA`, `TANGGAL TOLAK`, `PELABUHAN TUJUAN`, `NO SPB TOLAK`, `ETA`, `TIBA DEWASA`, `TIBA ANAK`, `TOLAK DEWASA`, `TOLAK ANAK`) VALUES
(1, '2024-07-01', 0, 'SB. HARAPANKU EXPRES', '-', 20, 'INDONESIA', '2024-06-03', 'TAWONG', '009', '2024-06-09', 'h', '88', '14:22', 1, 1, 1, 1),
(2, '2024-07-04', 23818172, 'SB. RAHAYU', 'ww', 16, 'INDONESIA', '2024-07-10', 'PALU', '2212', '2024-07-20', 'KUPANG', '22123', '12:41', 2, 2, 2, 7),
(3, '2024-07-05', 75171, 'SB BALAKU', 'CUY', 89, 'PERU', '2024-07-10', 'MESPOTAMIA', '8162', '2024-07-05', 'PLUTO', '8726', '1 JAM 20 MENIT', 20, 20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`) VALUES
(1, 'admin1', 'admin1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data-kapal`
--
ALTER TABLE `data-kapal`
  ADD PRIMARY KEY (`NAMA KAPAL`,`GT`,`BENDERA`),
  ADD KEY `NO` (`NO`);

--
-- Indexes for table `spb`
--
ALTER TABLE `spb`
  ADD KEY `NAMA KAPAL` (`NAMA KAPAL`,`GT`,`BENDERA`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spb`
--
ALTER TABLE `spb`
  ADD CONSTRAINT `spb_ibfk_1` FOREIGN KEY (`NAMA KAPAL`,`GT`,`BENDERA`) REFERENCES `data-kapal` (`NAMA KAPAL`, `GT`, `BENDERA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
