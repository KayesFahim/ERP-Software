-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 10:42 AM
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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `EMP_ID` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fatherName` varchar(30) NOT NULL,
  `motherName` varchar(30) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `temporaryaddress` varchar(255) NOT NULL,
  `parmanentaddress` varchar(255) NOT NULL,
  `maritalstatus` varchar(30) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `nid` varchar(30) NOT NULL,
  `passportno` varchar(30) NOT NULL,
  `insuranceno` varchar(50) NOT NULL,
  `birthid` varchar(30) NOT NULL,
  `bankname` varchar(30) NOT NULL,
  `bankacc` varchar(30) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `pfaccno` varchar(50) NOT NULL,
  `jobType` varchar(30) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `salary` int(30) NOT NULL,
  `joindate` date NOT NULL,
  `resigndate` date NOT NULL,
  `confirmationdate` date NOT NULL,
  `incrementdate` date NOT NULL,
  `registrationdate` date NOT NULL,
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
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `EMP_ID`, `email`, `name`, `phone`, `department`, `password`) VALUES
(1000, 'FFI-1000', 'fahim@flyfarint.com', 'Kayes Hossan Fuad', '01322903298', 'Fly Far Tech', ''),
(1001, 'FFI-1001', 'ali@flyfarint.com', 'Ahmed Ali', '01755572096', 'Creative', '123456'),
(1002, 'FFI-1002', 'ashik@flyfarint.com', 'Ashik Rahman', '01755572098', 'Creative', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
