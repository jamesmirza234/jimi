-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 07:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_polis`
--

CREATE TABLE `tbl_polis` (
  `nomorpolis` varchar(50) NOT NULL DEFAULT '',
  `namadebitur` varchar(150) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `jeniskelamin` varchar(20) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `nilaipertanggungan` int(50) DEFAULT NULL,
  `premi` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `tbl_polis`
--

INSERT INTO `tbl_polis` (`nomorpolis`, `namadebitur`, `pekerjaan`, `jeniskelamin`, `alamat`, `nilaipertanggungan`, `premi`) VALUES
('2', NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
