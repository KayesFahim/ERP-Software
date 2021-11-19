-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 05:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `employee_academicinfo`
--

CREATE TABLE `employee_academicinfo` (
  `id` int(10) NOT NULL,
  `EMP_ID` varchar(10) NOT NULL,
  `schoolname` varchar(100) NOT NULL,
  `sscresult` varchar(100) NOT NULL,
  `sscpassingyear` varchar(100) NOT NULL,
  `sscsessionyear` varchar(100) NOT NULL,
  `collegename` varchar(100) NOT NULL,
  `hscresult` varchar(100) NOT NULL,
  `hscpassingyear` varchar(100) NOT NULL,
  `hscsessionyear` varchar(100) NOT NULL,
  `universityname` varchar(100) NOT NULL,
  `cgpa` varchar(100) NOT NULL,
  `uvpassingyear` varchar(100) NOT NULL,
  `uvsessionyear` varchar(100) NOT NULL,
  `pastcompanyname` varchar(100) NOT NULL,
  `workduration` varchar(100) NOT NULL,
  `resigncause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_academicinfo`
--

INSERT INTO `employee_academicinfo` (`id`, `EMP_ID`, `schoolname`, `sscresult`, `sscpassingyear`, `sscsessionyear`, `collegename`, `hscresult`, `hscpassingyear`, `hscsessionyear`, `universityname`, `cgpa`, `uvpassingyear`, `uvsessionyear`, `pastcompanyname`, `workduration`, `resigncause`) VALUES
(1, 'FFI-1000', 'Charsindhur M.L High School', '4.81', '2014', '20122014', 'Milestone College ,Uttara Dhaka', '4.83', '2016', '2014-2016', 'North South University', '2.86', '2021', '2017-2021', 'Multiply Digital', '2 Year', 'To Far');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_academicinfo`
--
ALTER TABLE `employee_academicinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_academicinfo`
--
ALTER TABLE `employee_academicinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
