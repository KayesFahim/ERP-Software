-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 12:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+06:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `packagequatation`
--

CREATE TABLE `packagequatation` (
  `id` int(11) NOT NULL,
  `sqNo` varchar(100) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` varchar(100) NOT NULL,
  `clientName` varchar(100) NOT NULL,
  `csrId` varchar(100) NOT NULL,
  `totalPax` int(100) NOT NULL,
  `paxNo` varchar(100) NOT NULL,
  `PaxName` varchar(100) NOT NULL,
  `service` varchar(250) NOT NULL,
  `airticket` varchar(100) NOT NULL,
  `visa` varchar(100) NOT NULL,
  `travel` varchar(200) NOT NULL,
  `covid` varchar(250) NOT NULL,
  `transport` varchar(100) NOT NULL,
  `document` varchar(100) NOT NULL,
  `cost` int(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packagequatation`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `packagequatation`
--
ALTER TABLE `packagequatation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `packagequatation`
--
ALTER TABLE `packagequatation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
