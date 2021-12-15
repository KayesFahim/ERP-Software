-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 06:35 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

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

CREATE TABLE `airticket` (
  `id` int(10) NOT NULL,
  `invNo` varchar(100) NOT NULL,
  `sqNo` varchar(100) NOT NULL,
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
  `vPrice5` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airticket`
--

INSERT INTO `airticket` (`id`, `invNo`, `sqNo`, `PaxName1`, `PNR1`, `TicketNo1`, `Airlines1`, `placeTo1`, `placeFrom1`, `cost1`, `vendor1`, `vPrice1`, `PaxName2`, `PNR2`, `TicketNo2`, `Airlines2`, `placeTo2`, `placeFrom2`, `cost2`, `vendor2`, `vPrice2`, `PaxName3`, `PNR3`, `TicketNo3`, `Airlines3`, `placeTo3`, `placeFrom3`, `cost3`, `vendor3`, `vPrice3`, `PaxName4`, `PNR4`, `TicketNo4`, `Airlines4`, `placeTo4`, `placeFrom4`, `cost4`, `vendor4`, `vPrice4`, `PaxName5`, `PNR5`, `TicketNo5`, `Airlines5`, `placeTo5`, `placeFrom5`, `cost5`, `vendor5`, `vPrice5`) VALUES
(14, 'INV-1000', '', 'fahim', 'fvdfg', 'dfgdfg', 'EK', 'DHK', 'DBH', 45654, 'fdgdfgg', 3000, 'ponir', 'gdfgdf', 'fddfggf', 'BS', 'FGH', 'FGF', 54665, 'fdgdfgg', 5000, 'ashik', 'gfgdg', 'gdg', 'MS', 'DFS', 'DFF', 20000, 'yfgjhfghjhfg', 10000, 'sakil', 'fdg', 'fdgdfg', 'MS', 'DDD', 'FGG', 10000, 'fdgdfgg', 5000, 'muqarram', 'fgd', 'dgdf', 'FZ', 'GGG', 'DGD', 50000, 'fdgdfgg', 45656),
(15, 'INV-1001', '', 'YSTRYRTY', 'RTSYRTSY', 'SRY', 'MS', 'YTRSY', 'TRY', 546, 'yfgjhfghjhfg', 6456, '', '', '', '', '', '', 0, '', 0, '', '', '', '', '', '', 0, '', 0, '', '', '', '', '', '', 0, '', 0, '', '', '', '', '', '', 0, '', 0);

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
  `TxType` varchar(100) NOT NULL,
  `credit` int(100) NOT NULL,
  `creditDate` date NOT NULL DEFAULT current_timestamp(),
  `creditComment` varchar(255) NOT NULL,
  `debit` int(100) NOT NULL,
  `debitDate` date NOT NULL DEFAULT current_timestamp(),
  `debitComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bankId`, `bankname`, `branchname`, `bankaccno`, `TxType`, `credit`, `creditDate`, `creditComment`, `debit`, `debitDate`, `debitComment`) VALUES
(1, 'BNK-001', 'City Bank Limited', 'Jamuna Future Park', '1502553140001\n', '', 0, '2021-11-21', 'ok', 0, '0000-00-00', ''),
(2, 'BNK-002', 'Brac Bank Limited', 'Bashundhora Branch', '1521204262962001', '', 0, '0000-00-00', 'ok', 0, '2021-11-14', 'Ok'),
(3, 'BNK-003', 'Islami Bank', 'Baridhara Branch', '20503420100141709', '', 0, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(4, 'BNK-004', 'Sonali Bank', 'Baridhara Branch', '0108102000695', '', 0, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(5, 'BNK-005', 'Dutch Bangla Bank', 'Baridhara Branch', '147.110.16468\n', '', 0, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(6, 'BNK-006', 'Commercial Bank ', 'Progati Sharani SME Branch ', '1813001751', '', 0, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(7, 'BNK-007', 'NCC Bank', 'Bashundhora Branch', '00960210002554', '', 0, '0000-00-00', 'Ok', 0, '0000-00-00', ''),
(8, 'BNK-008', 'Modhumoti Bank', 'Sheikh Kamal Sarani Branch', '112011100000223', '', 0, '0000-00-00', '', 0, '0000-00-00', ''),
(18, 'BNK-001', 'City Bank Limited', '', '', 'RCP-1', 5000, '2021-12-02', 'dfghsdfhdfbg', 0, '2021-12-02', ''),
(19, 'BNK-001', 'City Bank Limited', '', '', 'BN-1002', 0, '2021-12-05', '', 2000, '2021-12-05', 'jgnvnnvnvn'),
(21, 'BNK-001', 'City Bank Limited', '', '', 'EXP-1002', 0, '2021-12-13', '', 67567, '2021-12-13', 'jhgjjgjgj'),
(22, 'BNK-001', 'City Bank Limited', '', '', 'EXP-1003', 0, '2021-12-13', '', 500, '2021-12-13', 'Shoes For Office Stuff'),
(23, '', '', '', '', '', 0, '0000-00-00', 'Bn-91231212', 0, '2021-12-15', '');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `billNo` varchar(20) NOT NULL,
  `vendorId` varchar(30) NOT NULL,
  `issueDate` date NOT NULL DEFAULT current_timestamp(),
  `amount` int(100) NOT NULL,
  `TxId` varchar(100) NOT NULL,
  `paymentway` varchar(100) NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `checkedBy` varchar(100) NOT NULL,
  `approvedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `billNo`, `vendorId`, `issueDate`, `amount`, `TxId`, `paymentway`, `paymentMethod`, `purpose`, `createdBy`, `checkedBy`, `approvedBy`) VALUES
(1000, 'BN-1000', 'VDR-1000', '2021-11-18', 50000, 'ghfgbfbf', 'bank', 'City Bank', '5 Ticket', 'Ashik', 'Ponir', 'kayes');

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` int(50) NOT NULL,
  `TxType` varchar(100) NOT NULL,
  `cashIn` int(100) NOT NULL,
  `cashInTxId` varchar(100) NOT NULL,
  `cashIndescription` varchar(500) NOT NULL,
  `cashOut` int(50) NOT NULL,
  `cashOutTxId` int(100) NOT NULL,
  `cashOutDate` date NOT NULL DEFAULT current_timestamp(),
  `createdBy` date NOT NULL DEFAULT current_timestamp(),
  `cashInDate` date NOT NULL DEFAULT current_timestamp(),
  `cashOutdescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id`, `TxType`, `cashIn`, `cashInTxId`, `cashIndescription`, `cashOut`, `cashOutTxId`, `cashOutDate`, `createdBy`, `cashInDate`, `cashOutdescription`) VALUES
(3, 'BN-1002', 0, '', '', 67567, 0, '2021-12-05', '2021-12-05', '2021-12-05', ''),
(4, 'BN-1002', 0, '', '', 62344, 0, '2021-12-05', '2021-12-05', '2021-12-05', ''),
(5, 'EXP-1005', 0, '', '', 30000, 0, '2021-12-13', '2021-12-13', '2021-12-13', 'Md Kayes Fahim ');

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
  `address` varchar(100) NOT NULL,
  `balance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `CustomerId`, `name`, `phone`, `email`, `address`, `balance`) VALUES
(3, 'CSR-003', 'Universal Tours & Travel', '01698749423', 'universaltt@gmail.com', 'ShahazadPur', 0),
(4, 'CSR-001', 'Adventure Oversis', '', 'adventure@gmail.com', 'Uttra', 0);

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
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `id` int(250) NOT NULL,
  `EMP_Id` varchar(100) NOT NULL,
  `issueDate` date NOT NULL,
  `deductionDay` int(100) NOT NULL,
  `absentAmount` int(100) NOT NULL,
  `lunchMeal` int(100) NOT NULL,
  `timesheetmiss` int(100) NOT NULL,
  `advanceSalary` int(100) NOT NULL,
  `lossOfService` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`id`, `EMP_Id`, `issueDate`, `deductionDay`, `absentAmount`, `lunchMeal`, `timesheetmiss`, `advanceSalary`, `lossOfService`) VALUES
(1, 'FFI-1000', '2021-11-10', 500, 100, 500, 200, 0, 0),
(2, 'FFI-1001', '2021-11-10', 34, 400, 500, 100, 300, 0),
(3, 'FFI-1000', '2021-12-10', 0, 0, 0, 0, 0, 0);

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
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(50) NOT NULL,
  `expNo` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `paymentway` varchar(100) NOT NULL,
  `amount` int(30) NOT NULL,
  `purpose` varchar(300) NOT NULL,
  `issueDate` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `payeedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `expNo`, `category`, `paymentMethod`, `paymentway`, `amount`, `purpose`, `issueDate`, `payeedate`) VALUES
(6, 'EXP-1002', 'Office EXpense', 'bank', 'city', 67567, 'jhgjjgjgj', '2021-12-13 18:50:33', '2021-12-16'),
(7, 'EXP-1003', 'Office EXpense', 'bank', 'city', 500, 'Shoes For Office Stuff', '2021-12-13 19:09:15', '2021-12-15'),
(8, 'EXP-1004', 'Vendor Bill', 'mobile_banking', 'BK-01755543447', 1, 'Shoes For Office Stuff', '2021-12-13 19:17:31', '2021-12-18'),
(9, 'EXP-1005', 'Salary', 'cash', 'cash', 30000, 'Md Kayes Fahim ', '2021-12-13 19:21:14', '2021-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `invNo` varchar(100) NOT NULL,
  `sqNo` varchar(100) NOT NULL,
  `createdtime` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `clientName` varchar(100) NOT NULL,
  `vendorId` varchar(100) NOT NULL,
  `pax` int(100) NOT NULL,
  `system` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `ticketType` varchar(100) NOT NULL,
  `recofficer` varchar(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invNo`, `sqNo`, `createdtime`, `clientName`, `vendorId`, `pax`, `system`, `class`, `ticketType`, `recofficer`, `createdBy`) VALUES
(1023, 'INV-1000', '', '2021-12-14 17:31:07', 'Abc', '', 5, 'Gallileo pee (GDS', 'First Class', 'Refund Adjusted', 'KAYES', ''),
(1024, 'INV-1001', '', '2021-12-14 17:44:42', 'TRYRTY', '', 54, 'Saber (GDS)', 'Business', 'Non Refundable', 'TYRYHRTSY', '');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_banking`
--

CREATE TABLE `mobile_banking` (
  `id` int(10) NOT NULL,
  `MB_ID` varchar(50) NOT NULL,
  `TxType` varchar(100) NOT NULL,
  `mb_operator` varchar(100) NOT NULL,
  `mb_number` varchar(100) NOT NULL,
  `cashIn` int(100) NOT NULL,
  `cashInDate` date NOT NULL DEFAULT current_timestamp(),
  `cashInTxId` varchar(100) NOT NULL,
  `cashOut` int(100) NOT NULL,
  `cashOutDate` date NOT NULL DEFAULT current_timestamp(),
  `cashOutTxId` varchar(100) NOT NULL,
  `cashInComment` varchar(255) NOT NULL,
  `cashOutComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobile_banking`
--

INSERT INTO `mobile_banking` (`id`, `MB_ID`, `TxType`, `mb_operator`, `mb_number`, `cashIn`, `cashInDate`, `cashInTxId`, `cashOut`, `cashOutDate`, `cashOutTxId`, `cashInComment`, `cashOutComment`) VALUES
(1, 'BK-01755543447', 'RCP-1002', 'Bkash', '01755543447', 5000, '0000-00-00', 'hrthgvaskavcbd', 0, '0000-00-00', '', '2 Airtickt:', ''),
(2, 'BK-01755543447', 'BN-1001', 'BKASH', '01755543447', 0, '2021-12-05', '', 5000, '2021-12-05', 'dfghsdfhdfbg', '', '2 air ticket'),
(3, 'BK-01755543447', 'EXP-1004', 'BKASH', '01755543447', 0, '2021-12-13', '', 1, '2021-12-13', '', '', 'Shoes For Office Stuff');

-- --------------------------------------------------------

--
-- Table structure for table `moneyreciept`
--

CREATE TABLE `moneyreciept` (
  `id` int(50) NOT NULL,
  `recieptNo` varchar(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `customerId` varchar(100) NOT NULL,
  `issueDate` date NOT NULL DEFAULT current_timestamp(),
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
(23, 'RCP-1000', '', 'CSR-002', '2021-12-02', 'dfghsdfhdfbg', 5000, 'bank', 'city', '2 air ticket');

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
-- Table structure for table `salesqutation`
--

CREATE TABLE `salesqutation` (
  `id` int(11) NOT NULL,
  `sqNo` varchar(100) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` varchar(100) NOT NULL,
  `clientName` varchar(100) NOT NULL,
  `pax` int(100) NOT NULL,
  `PaxName1` varchar(100) NOT NULL,
  `Airlines1` varchar(250) NOT NULL,
  `from1` varchar(100) NOT NULL,
  `to1` varchar(100) NOT NULL,
  `type1` varchar(200) NOT NULL,
  `cost1` int(100) NOT NULL,
  `PaxName2` varchar(100) NOT NULL,
  `Airlines2` varchar(250) NOT NULL,
  `from2` varchar(100) NOT NULL,
  `to2` varchar(100) NOT NULL,
  `type2` varchar(250) NOT NULL,
  `cost2` int(100) NOT NULL,
  `PaxName3` varchar(100) NOT NULL,
  `Airlines3` varchar(250) NOT NULL,
  `from3` varchar(100) NOT NULL,
  `to3` varchar(100) NOT NULL,
  `type3` varchar(255) NOT NULL,
  `cost3` int(100) NOT NULL,
  `PaxName4` varchar(100) NOT NULL,
  `Airlines4` varchar(255) NOT NULL,
  `from4` varchar(100) NOT NULL,
  `to4` varchar(100) NOT NULL,
  `type4` varchar(255) NOT NULL,
  `cost4` int(100) NOT NULL,
  `PaxName5` varchar(100) NOT NULL,
  `Airlines5` varchar(250) NOT NULL,
  `from5` varchar(100) NOT NULL,
  `to5` varchar(100) NOT NULL,
  `type5` varchar(255) NOT NULL,
  `cost5` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesqutation`
--

INSERT INTO `salesqutation` (`id`, `sqNo`, `createdDate`, `createdBy`, `clientName`, `pax`, `PaxName1`, `Airlines1`, `from1`, `to1`, `type1`, `cost1`, `PaxName2`, `Airlines2`, `from2`, `to2`, `type2`, `cost2`, `PaxName3`, `Airlines3`, `from3`, `to3`, `type3`, `cost3`, `PaxName4`, `Airlines4`, `from4`, `to4`, `type4`, `cost4`, `PaxName5`, `Airlines5`, `from5`, `to5`, `type5`, `cost5`) VALUES
(1, 'SQT-1000', '2021-12-11 16:12:56', 'fahim@flyfarint.com', 'ghfghdfhh', 6, 'hfhfh7567', '', 'gfdg', '', '', 5654, 'fghfghf', '', 'ghfg', '', '', 6546, 'fghfdgh', '', 'fghfgh', '', '', 4564, ' dfseagfdg', '', ' fsdfsdf', '', '', 5000, 'bfdbh', '', 'hbdfghfddb', '', '', 4564),
(24, 'SQT-1001', '2021-12-15 01:58:02', 'fahim', 'Universal Tours & Travel', 3, 'Rahim', 'EK', 'DAC', 'DXB', '', 60000, 'karim', 'EK', 'DAC', 'JFK', '', 40000, 'zabbar', 'EK', 'DAC', 'SIN', '', 20000, '', '', '', '', '', 0, '', '', '', '', '', 0),
(25, 'SQT-1002', '2021-12-15 02:15:01', 'fahim', 'Adventure Oversis', 3, 'Kayes', 'BG', 'DAC', 'DXB', 'Refund Adjusted', 50000, 'fahim', 'AI', 'DAC', 'SIN', 'Refund Adjusted', 30000, 'Fuad', 'EK', 'DAC', 'JFP', 'Refundable', 20000, '', '', '', '', '', 0, '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ssl_commerce`
--

CREATE TABLE `ssl_commerce` (
  `id` int(50) NOT NULL,
  `TxId` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `createdDate` date NOT NULL DEFAULT current_timestamp(),
  `TxType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ssl_commerce`
--

INSERT INTO `ssl_commerce` (`id`, `TxId`, `amount`, `createdDate`, `TxType`) VALUES
(1, 'thfgh', 500, '2021-12-13', 'Exp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `EMP_ID` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `EMP_ID`, `username`, `email`, `password`, `role`) VALUES
(1, 'FFI-1000', 'fahim', 'fahim@flyfarint.com', '1234', 'developer'),
(2, 'admin', 'admin', 'admin@flyfarint.com', 'admin', 'admin'),
(3, 'reservation', 'reservation', 'reservation@flyfarint.com', '123456', 'reservation'),
(4, 'accounts', 'accounts', 'accounts@flyfarint.com', '123456', 'accounts');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(100) NOT NULL,
  `vendorId` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `company` varchar(100) NOT NULL,
  `balance` int(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `conPername` varchar(100) NOT NULL,
  `conPerPhone` varchar(30) NOT NULL,
  `createdDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendorId`, `email`, `name`, `phone`, `company`, `balance`, `address`, `conPername`, `conPerPhone`, `createdDate`) VALUES
(1019, 'VDR-1000', 'service@zooholiday.com', 'Travel Zoo', '0244612178', 'Travelzoo Bangladesh Ltd', 0, 'Happy Arcade Shopping Mall, 2nd Floor, Suit:34, Road: 3, Holding 3, Dhanmondi, Dhaka 1205.', 'Morshed Alam Gazi', '01678569298', '2021-12-14'),
(1020, 'VDR-1001', 'flywaydac@gmail.com', 'Flyway Travel', '8801722270001', 'Flyway Travel', 0, 'Ka-9/1 , Bashundhara , Jagannathpur , Dhaka-1229', 'MAK Yeasin', '8801722270001', '2021-12-14'),
(1021, 'VDR-1002', 'famousaviation@test.com', 'Famous Aviation', '8801717660818', 'Famous Aviation', 0, '33,anjuman mofidul islam road Dhaka, 1000', 'Mazhar', '8801714070563', '2021-12-14'),
(1022, 'VDR-1003', 'support@uthaotrip.com', 'Uthaotrip', '8801707818281', 'Uthaotrip', 0, '1625, Kosba House ( Gr. Floor) CDA Avenue Nasirabad, GEC,Chittagong', 'Kadir', '01977771553', '2021-12-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airticket`
--
ALTER TABLE `airticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
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
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_jobinfo`
--
ALTER TABLE `emp_jobinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
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
-- Indexes for table `salesqutation`
--
ALTER TABLE `salesqutation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ssl_commerce`
--
ALTER TABLE `ssl_commerce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `airticket`
--
ALTER TABLE `airticket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_jobinfo`
--
ALTER TABLE `emp_jobinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT for table `mobile_banking`
--
ALTER TABLE `mobile_banking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `moneyreciept`
--
ALTER TABLE `moneyreciept`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `portal_balance`
--
ALTER TABLE `portal_balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesqutation`
--
ALTER TABLE `salesqutation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ssl_commerce`
--
ALTER TABLE `ssl_commerce`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
