-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 09:12 AM
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
-- Table structure for table `vendor_ledger`
--

CREATE TABLE `unsettle_vendor_leadger` (
  `id` int(10) NOT NULL,
  `txType` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `VDR_ID` varchar(250) NOT NULL,
  `pax` varchar(250) NOT NULL,
  `pnr` varchar(250) NOT NULL,
  `ticket` varchar(250) NOT NULL,
  `serviceType` varchar(500) NOT NULL,
  `details` varchar(500) NOT NULL,
  `cost` int(100) NOT NULL,
  `deposit` int(100) NOT NULL,
  `balance` int(100) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_ledger`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `vendor_ledger`
--
ALTER TABLE `unsettle_vendor_leadger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vendor_ledger`
--
ALTER TABLE `unsettle_vendor_leadger`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
