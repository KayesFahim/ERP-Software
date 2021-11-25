-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 10:38 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
