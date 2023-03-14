-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 09:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2020-07-07 09:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `clockinclockout`
--

CREATE TABLE `clockinclockout` (
  `id` int(11) NOT NULL,
  `empId` mediumtext NOT NULL,
  `clockinDate` date NOT NULL,
  `clockinTime` time NOT NULL,
  `clockoutTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(1, 'Human Resource', 'HR', 'HR001', '2017-11-01 07:16:25'),
(2, 'Information Technology', 'IT', 'IT001', '2017-11-01 07:19:37'),
(3, 'Operations', 'OP', 'OP1', '2017-12-02 21:28:56'),
(5, 'Maintenance', 'Cleaner', '79', '2022-06-14 23:00:00'),
(6, 'Maintenance', 'Cleaner', '24', '2022-06-14 23:00:00'),
(7, 'kwlrfas', 'iadfjosdksa', '24', '2022-06-14 23:00:00'),
(8, 'kwlrfas', 'iadfjosdksa', '58', '2022-06-14 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Position` varchar(500) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Country` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `access_control` int(11) NOT NULL,
  `loginStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Position`, `Department`, `Address`, `City`, `Country`, `Phonenumber`, `Status`, `RegDate`, `access_control`, `loginStatus`) VALUES
(1, '101', 'Ese', 'James', 'jamese@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', '3 February, 1999', 'Software Developer', 'Information Technology', 'Rivers', 'PH', 'nigeria', '0901275724', 1, '2020-07-07 11:29:59', 2, 0),
(3, '107', 'Oghenemudiakevwe', 'Okpako', 'esemudia@gmail.com', '9f03268e82461f179f372e61621f42d9', 'Male', '11 May, 2022', 'HR', 'Operations', 'plot 8', 'port harcourt', 'nigeria', '0908878667', 1, '2022-05-10 20:30:14', 1, 0),
(4, '95', 'ese', 'dfaf', 'aghogho.o@gmail.com', 'a190ec2f03bde8b3cda3c79edca3a8a2', '', '1994-07-08', '', 'Other Staff', 'plaot 8 friday', 'port', '', '09010904241', 1, '2022-06-01 23:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `ToDate`, `FromDate`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `empid`) VALUES
(1, 'Medical Leave test', '15/09/2021', '09/09/2021', 'nbl.kmbh,j,jmnb,khnbcvhklvbcvd.vx', '2022-05-12 12:16:51', 'this', '2022-05-12 17:48:37 ', 1, 1, 1),
(2, 'Medical Leave test', '2022-06-05', '2022-06-01', 'mhcvfukgvjmnjblikh,mjvbkbv vb/jb;olklhjv  I', '2022-05-30 12:47:19', NULL, NULL, 2, 0, 1),
(3, 'Casual Leave', '2022-06-25', '2022-06-20', 'thanskpajaisdkhnápoojvnx ócACC\r\nCUCLUACHCAD\r\nAJFKFACJADFIAHSFBBAS\r\nCJNAJDASD\r\nBCSAJDOA\r\n', '2022-05-31 09:53:50', NULL, NULL, 0, 0, 1),
(5, 'Restricted Holiday(RH)', '2022-06-09', '2022-06-06', 'THDFAHF', '2022-06-01 08:44:42', NULL, NULL, 2, 0, 1),
(6, 'Restricted Holiday(RH)', '2022-06-09', '2022-06-06', 'THDFAHF', '2022-06-01 08:46:16', NULL, NULL, 2, 0, 1),
(7, 'Casual Leave', '2022-06-10', '2022-06-08', 'hhrhrthrt', '2022-06-01 08:46:49', NULL, NULL, 0, 0, 1),
(8, 'Restricted Holiday(RH)', '2022-06-21', '2022-06-17', '\\][poiuytre', '2022-06-01 09:01:59', NULL, NULL, 2, 0, 1),
(11, 'Restricted Holiday(RH)', '2022-06-21', '2022-06-14', 'Burial', '2022-06-13 13:10:38', NULL, NULL, 2, 0, 1),
(12, 'Casual Leave', '2022-06-23', '2022-06-22', 'i have a family emergency', '2022-06-15 10:30:57', NULL, NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `CreationDate`) VALUES
(1, 'Casual Leave', 'Casual Leave ', '2017-11-01 12:07:56'),
(2, 'Medical Leave test', 'Medical Leave  test', '2017-11-06 13:16:09'),
(3, 'Restricted Holiday(RH)', 'Restricted Holiday(RH)', '2017-11-06 13:16:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
