-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 01:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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

CREATE TABLE `airticketreiisue` (
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
  `PaxName2` varchar(100) NOT NULL,
  `PNR2` varchar(100) NOT NULL,
  `TicketNo2` varchar(100) NOT NULL,
  `Airlines2` varchar(100) NOT NULL,
  `placeTo2` varchar(100) NOT NULL,
  `placeFrom2` varchar(100) NOT NULL,
  `cost2` int(100) NOT NULL,
  `vendor2` varchar(100) NOT NULL,
  `vPrice2` int(100) NOT NULL,
  `PaxName3` varchar(100) NOT NULL,
  `PNR3` varchar(100) NOT NULL,
  `TicketNo3` varchar(100) NOT NULL,
  `Airlines3` varchar(100) NOT NULL,
  `placeTo3` varchar(100) NOT NULL,
  `placeFrom3` varchar(100) NOT NULL,
  `cost3` int(100) NOT NULL,
  `vendor3` varchar(100) NOT NULL,
  `vPrice3` int(100) NOT NULL,
  `PaxName4` varchar(100) NOT NULL,
  `PNR4` varchar(100) NOT NULL,
  `TicketNo4` varchar(100) NOT NULL,
  `Airlines4` varchar(100) NOT NULL,
  `placeTo4` varchar(100) NOT NULL,
  `placeFrom4` varchar(100) NOT NULL,
  `cost4` int(100) NOT NULL,
  `vendor4` varchar(100) NOT NULL,
  `vPrice4` int(100) NOT NULL,
  `PaxName5` varchar(100) NOT NULL,
  `PNR5` varchar(100) NOT NULL,
  `TicketNo5` varchar(100) NOT NULL,
  `Airlines5` varchar(100) NOT NULL,
  `placeTo5` varchar(100) NOT NULL,
  `placeFrom5` varchar(100) NOT NULL,
  `cost5` int(100) NOT NULL,
  `vendor5` varchar(100) NOT NULL,
  `vPrice5` int(100) NOT NULL,
  `way1` varchar(100) NOT NULL,
  `way2` varchar(100) NOT NULL,
  `way3` varchar(100) NOT NULL,
  `way4` varchar(100) NOT NULL,
  `way5` varchar(100) NOT NULL,
  `ticketType1` varchar(100) NOT NULL,
  `ticketType2` varchar(100) NOT NULL,
  `ticketType3` varchar(100) NOT NULL,
  `ticketType4` varchar(100) NOT NULL,
  `ticketType5` varchar(100) NOT NULL,
  `flight1` datetime NOT NULL,
  `flight2` datetime NOT NULL,
  `flight3` datetime NOT NULL,
  `flight4` datetime NOT NULL,
  `flight5` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
