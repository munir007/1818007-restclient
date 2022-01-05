-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 07:33 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wildrift`
--

-- --------------------------------------------------------

--
-- Table structure for table `champions`
--

CREATE TABLE `champions` (
  `id_champion` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `lane` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `difficulty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `champions`
--

INSERT INTO `champions` (`id_champion`, `nama`, `role`, `lane`, `region`, `gender`, `difficulty`) VALUES
(1, 'AHRI', 'MAGE/ASSASSIN', 'MID/SUPPORT', 'IONIA', 'FEMALE', 'MODERATE'),
(2, 'AKALI', 'ASSASSIN', 'MID/TOP', 'IONIA', 'FEMALE', 'HIGH'),
(3, 'AKSHAN', 'MARKSMAN/ASSASSIN', 'MID/TOP/BOT', 'SHURIMA', 'MALE', 'HIGH'),
(4, 'ALISTAR', 'TANK/SUPPORT', 'SUPPORT', 'RUNETERRA', 'MALE', 'LOW'),
(5, 'AMUMU', 'TANK', 'JUNGLE/SUPPORT', 'SHURIMA', 'MALE', 'LOW'),
(6, 'ANNIE', 'MAGE/SUPPORT', 'MID/SUPPORT', 'RUNETERRA', 'FEMALE', 'LOW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `champions`
--
ALTER TABLE `champions`
  ADD PRIMARY KEY (`id_champion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `champions`
--
ALTER TABLE `champions`
  MODIFY `id_champion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
