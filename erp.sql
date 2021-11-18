-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 03:30 PM
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
-- Table structure for table `academicinfo`
--

CREATE TABLE `academicinfo` (
  `id` int(10) NOT NULL,
  `EMP_ID` varchar(20) NOT NULL,
  `schoolname` varchar(100) NOT NULL,
  `sscresult` varchar(50) NOT NULL,
  `sscpassingyear` varchar(50) NOT NULL,
  `collegename` varchar(300) NOT NULL,
  `hscresult` varchar(50) NOT NULL,
  `hscpassingyear` varchar(50) NOT NULL,
  `universityname` varchar(100) NOT NULL,
  `cgpa` varchar(50) NOT NULL,
  `uvpassingyear` varchar(50) NOT NULL,
  `pastcompanyname` varchar(10) NOT NULL,
  `workduration` varchar(100) NOT NULL,
  `resigncause` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academicinfo`
--

INSERT INTO `academicinfo` (`id`, `EMP_ID`, `schoolname`, `sscresult`, `sscpassingyear`, `collegename`, `hscresult`, `hscpassingyear`, `universityname`, `cgpa`, `uvpassingyear`, `pastcompanyname`, `workduration`, `resigncause`) VALUES
(1, 'FFI-1000', 'Charsindhur M.L High School', '4.81', '2014', 'Milestone College', '4.83', '2016', 'North Sout', '2.86', '2021', 'Multiply D', '2 year', 'Long Dista');

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
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `EMP_ID`, `email`, `name`, `phone`, `department`) VALUES
(1000, 'FFI-1000', 'fahim@flyfarint.com', 'Kayes Hossan Fuad', '01322903298', 'Fly Far Tech'),
(1001, 'FFI-1001', 'ali@flyfarint.com', 'Ahmed Ali', '01755572096', 'Creative'),
(1002, 'FFI-1002', 'ashik@flyfarint.com', 'Ashik Rahman', '01755572098', 'Creative');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `id` int(10) NOT NULL,
  `EMP_ID` varchar(20) NOT NULL,
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
  `pfaccno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `EMP_ID`, `fatherName`, `motherName`, `dateOfBirth`, `telephone`, `temporaryaddress`, `parmanentaddress`, `maritalstatus`, `bloodgroup`, `religion`, `nid`, `passportno`, `insuranceno`, `birthid`, `bankname`, `bankacc`, `branchname`, `pfaccno`) VALUES
(1, 'FFI-1000', 'Md. Kamrul Hossan Kazal', 'Fatema Begum', '1998-01-11', '01717881734', '210/Ka, Kuril , Vatara, Dhaka 1229', 'House No-12, Word: 1, P.O: Charsindhur, Palash, Narsingdhi', 'Single', 'O+', 'Islam (Sunny)', '8254502555', 'BN7472078', '98579485', '19980111825350255', 'Agrani Bank Ltd', '12345678', 'Ramna Corporate Branch', '200983423874'),
(2, 'FFI-1001', 'Ali Akbar', 'Rahima Begum', '1995-08-15', '', 'Uttor Kuril,Vatara,Dhaka 1229', 'Islam Nagor,P.O:Irta, Upzilla: Singair,Manikgonj', 'Single', 'A+', 'Islam (Sunny)', '2853966295', 'None', '', 'None', 'IFIC', '0190109721851', 'Mirpur-6', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `emp_jobinfo`
--

CREATE TABLE `emp_jobinfo` (
  `id` int(10) NOT NULL,
  `EMP_ID` varchar(20) NOT NULL,
  `jobType` varchar(30) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `salary` int(30) NOT NULL,
  `joindate` date NOT NULL,
  `resigndate` date NOT NULL,
  `confirmationdate` date NOT NULL,
  `incrementdate` date NOT NULL,
  `registrationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_jobinfo`
--

INSERT INTO `emp_jobinfo` (`id`, `EMP_ID`, `jobType`, `designation`, `salary`, `joindate`, `resigndate`, `confirmationdate`, `incrementdate`, `registrationdate`) VALUES
(1, 'FFI-1000', 'Parmanent', 'Chief Technical Officer', 35000, '2021-11-10', '0000-00-00', '2021-11-10', '0000-00-00', '2021-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `authoity` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `debit` int(255) NOT NULL,
  `credit` int(255) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `address`, `phone`, `authoity`, `email`, `debit`, `credit`, `balance`) VALUES
(1, 'Travelzoo Bangladesh Ltd.', 'Happy Arcade Shopping Mall, 2nd FLR, Suite 33, Holding 3 Rd No. 3, Dhaka 1205', '01678-569291', 'Mr. Murshed', 'service@zooholiday.com', 0, 0, 0),
(2, '', '', '', '', '', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_jobinfo`
--
ALTER TABLE `emp_jobinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_jobinfo`
--
ALTER TABLE `emp_jobinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
