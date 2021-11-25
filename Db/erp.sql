-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 06:20 PM
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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) NOT NULL,
  `bankId` varchar(20) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `branchname` varchar(200) NOT NULL,
  `bankaccno` varchar(100) NOT NULL,
  `credit` int(100) NOT NULL,
  `creditDate` date NOT NULL,
  `creditComment` varchar(255) NOT NULL,
  `debit` int(100) NOT NULL,
  `debitDate` date NOT NULL,
  `debitComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bankId`, `bankname`, `branchname`, `bankaccno`, `credit`, `creditDate`, `creditComment`, `debit`, `debitDate`, `debitComment`) VALUES
(1, 'BNK-001', 'City Bank Limited', 'Jamuna Future Park', '1502553140001\n', 500000, '2021-11-21', 'Get from 5 customer', 0, '0000-00-00', ''),
(2, 'BNK-002', 'Brac Bank ', 'Bashundhora Branch', '1521204262962001', 0, '0000-00-00', '', 200000, '2021-11-14', 'Portal Transfer'),
(3, 'BNK-003', 'Islami Bank', 'Baridhara Branch', '20503420100141709', 1000000000, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(4, 'BNK-004', 'Sonali Bank', 'Baridhara Branch', '0108102000695', 10000000, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(5, 'BNK-005', 'Dutch Bangla Bank', 'Baridhara Branch', '147.110.16468\n', 10000000, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(6, 'BNK-006', 'Commercial Bank ', 'Progati Sharani SME Branch ', '1813001751', 10000000, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(7, 'BNK-007', 'NCC Bank', 'Bashundhora Branch', '00960210002554', 10000000, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(8, 'BNK-008', 'Modhumoti Bank', 'Sheikh Kamal Sarani Branch', '112011100000223', 0, '0000-00-00', '', 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` int(50) NOT NULL,
  `InvoiceId` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `createdDate` date NOT NULL,
  `customerId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id`, `InvoiceId`, `Amount`, `createdBy`, `createdDate`, `customerId`) VALUES
(1, 'INV-1001', 60000, 'Ashik', '2021-11-22', 'CSR-001'),
(2, 'INV-1002', 50000, 'Fahim', '2021-11-22', 'CSR-002');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(50) NOT NULL,
  `CustomerId` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `CustomerId`, `name`, `phone`, `email`, `address`) VALUES
(1, 'CSR-001', 'Xyz', '0187349283', 'abc@gmail.com', 'Basundhara'),
(2, 'CSR-002', 'Abc', '0121728934', 'abc@gmail.com', 'Jamuna');

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
-- Table structure for table `mobile_banking`
--

CREATE TABLE `mobile_banking` (
  `id` int(10) NOT NULL,
  `MB_ID` varchar(50) NOT NULL,
  `mb_operator` varchar(100) NOT NULL,
  `mb_number` varchar(100) NOT NULL,
  `cashIn` int(100) NOT NULL,
  `cashInDate` date NOT NULL,
  `cashInTxId` varchar(100) NOT NULL,
  `cashOut` int(100) NOT NULL,
  `cashOutDate` date NOT NULL,
  `cashOutTxId` varchar(100) NOT NULL,
  `cashInComment` varchar(255) NOT NULL,
  `cashOutComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `moneyreciept`
--

CREATE TABLE `moneyreciept` (
  `id` int(50) NOT NULL,
  `recieptNo` varchar(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `customerId` varchar(100) NOT NULL,
  `issueDate` date NOT NULL,
  `TxId` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `paymentId` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moneyreciept`
--

INSERT INTO `moneyreciept` (`id`, `recieptNo`, `createdBy`, `customerId`, `issueDate`, `TxId`, `amount`, `paymentMethod`, `paymentId`, `comment`) VALUES
(1, 'RCP-1001', 'Ashik Rahman', 'CSR-001', '2021-11-22', 'Texfidgvv', 30000, 'Bank', '1', '2 Dhaka To Dubai AIr Tiocket'),
(2, 'RCP-1002', 'Fahim', 'CSR-002', '2021-11-22', 'fyhsfguyws', 40000, 'Mobile Banking', '1', '1 Air Ticket');

-- --------------------------------------------------------

--
-- Table structure for table `portal_balance`
--

CREATE TABLE `portal_balance` (
  `id` int(10) NOT NULL,
  `portal_Id` varchar(100) NOT NULL,
  `portalname` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cashIn` int(100) NOT NULL,
  `cashIndate` date NOT NULL,
  `cashInTxId` varchar(100) NOT NULL,
  `cashInComment` varchar(255) NOT NULL,
  `cashOut` int(100) NOT NULL,
  `cashOutDate` date NOT NULL,
  `cashOutTxId` varchar(100) NOT NULL,
  `cashOutComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ssl_commerce`
--

CREATE TABLE `ssl_commerce` (
  `id` int(50) NOT NULL,
  `sslId` varchar(30) NOT NULL,
  `invoiceId` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `createdDate` date NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `customerId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(100) NOT NULL,
  `vendorId` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `company` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `conPername` varchar(100) NOT NULL,
  `conPerPhone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_academicinfo`
--
ALTER TABLE `employee_academicinfo`
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
-- Indexes for table `mobile_banking`
--
ALTER TABLE `mobile_banking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moneyreciept`
--
ALTER TABLE `moneyreciept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portal_balance`
--
ALTER TABLE `portal_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ssl_commerce`
--
ALTER TABLE `ssl_commerce`
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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `employee_academicinfo`
--
ALTER TABLE `employee_academicinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_jobinfo`
--
ALTER TABLE `emp_jobinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mobile_banking`
--
ALTER TABLE `mobile_banking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moneyreciept`
--
ALTER TABLE `moneyreciept`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portal_balance`
--
ALTER TABLE `portal_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ssl_commerce`
--
ALTER TABLE `ssl_commerce`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
