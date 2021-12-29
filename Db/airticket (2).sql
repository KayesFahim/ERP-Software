-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 03:02 PM
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
-- Table structure for table `airticket`
--

CREATE TABLE `airticket` (
  `id` int(10) NOT NULL,
  `invNo` varchar(100) NOT NULL,
  `sqNo` varchar(100) NOT NULL,
  `csrId` varchar(100) NOT NULL,
  `PaxName1` varchar(100) NOT NULL,
  `PNR1` varchar(100) NOT NULL,
  `TicketNo1` varchar(100) NOT NULL,
  `Airlines1` varchar(100) NOT NULL,
  `placeTo1` varchar(100) NOT NULL,
  `placeFrom1` varchar(100) NOT NULL,
  `cost1` int(100) NOT NULL,
  `vendor1` varchar(100) NOT NULL,
  `vPrice1` int(100) NOT NULL,
  `way1` varchar(100) NOT NULL,
  `ticketType1` varchar(100) NOT NULL,
  `flight1` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airticket`
--

--

--
-- Indexes for table `airticket`
--
ALTER TABLE `airticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airticket`
--
ALTER TABLE `airticket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
