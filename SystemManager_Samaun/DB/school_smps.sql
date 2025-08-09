-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 04:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_smps`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_class`
--

CREATE TABLE `main_class` (
  `sl` int(11) NOT NULL,
  `ClassName` varchar(50) DEFAULT NULL COMMENT 'Name of the Class',
  `edt` date NOT NULL COMMENT 'Entry Date',
  `edttm` varchar(50) DEFAULT NULL COMMENT 'Entry Date & Time',
  `eby` varchar(100) DEFAULT NULL COMMENT 'Entered By',
  `udt` date NOT NULL COMMENT 'Date of Modification',
  `udttm` varchar(50) DEFAULT NULL COMMENT 'Modification Date & Time',
  `uby` varchar(100) DEFAULT NULL COMMENT 'Updated By',
  `stat` int(11) NOT NULL DEFAULT 0 COMMENT 'Status of the Record'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_class`
--

INSERT INTO `main_class` (`sl`, `ClassName`, `edt`, `edttm`, `eby`, `udt`, `udttm`, `uby`, `stat`) VALUES
(1, 'Play Group', '2023-02-21', '21-02-2023 09:14:04 AM', 'Israfil', '2023-02-21', '21-02-2023 09:15:55 AM', 'Israfil', 0),
(2, 'Nursery', '2023-02-21', '21-02-2023 09:20:26 AM', 'Israfil', '0000-00-00', NULL, NULL, 0),
(3, 'Jr. KG', '2023-02-21', '21-02-2023 09:20:37 AM', 'Israfil', '0000-00-00', NULL, NULL, 0),
(4, 'Sr. KG', '2023-02-21', '21-02-2023 09:20:43 AM', 'Israfil', '0000-00-00', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_cname`
--

CREATE TABLE `main_cname` (
  `sl` int(11) NOT NULL,
  `cname` varchar(50) DEFAULT NULL COMMENT 'Centre Name',
  `ctag` varchar(100) DEFAULT NULL COMMENT 'Centre Tag Line',
  `caddr` varchar(100) DEFAULT NULL COMMENT 'Centre Address',
  `mob` varchar(50) DEFAULT NULL COMMENT 'Centre Mob',
  `email` varchar(50) DEFAULT NULL COMMENT 'Centre Email ID',
  `url` varchar(50) DEFAULT NULL COMMENT 'Centre Website',
  `edt` date NOT NULL,
  `edttm` varchar(50) DEFAULT NULL,
  `eby` varchar(50) DEFAULT NULL,
  `udt` date NOT NULL,
  `udttm` varchar(50) DEFAULT NULL,
  `uby` varchar(50) DEFAULT NULL,
  `stat` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `main_cname`
--

INSERT INTO `main_cname` (`sl`, `cname`, `ctag`, `caddr`, `mob`, `email`, `url`, `edt`, `edttm`, `eby`, `udt`, `udttm`, `uby`, `stat`) VALUES
(1, 'National Council of Technical Education (NCTE)', 'An IAF Accredited ISO 9001 : 2015 Certified Organization', 'Bamanpukur (Ballaldighi More), <br>Sree Mayapur, Nabadwip, Nadia - 741313', '7501637384', 'mayapurncte2022@gmail.com', 'http://sreemayapurncte.com', '2022-02-10', '10-05-2018 08:00 PM', 'Israfil Mallick', '0000-00-00', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_drcr`
--

CREATE TABLE `main_drcr` (
  `sl` int(11) NOT NULL,
  `sesn` int(11) NOT NULL DEFAULT 0,
  `mnth` int(11) NOT NULL DEFAULT 0 COMMENT 'Month Digit',
  `sid` varchar(50) DEFAULT NULL COMMENT 'Student ID',
  `cid` varchar(50) DEFAULT NULL COMMENT 'Customer ID',
  `refno` varchar(50) DEFAULT NULL,
  `vno` varchar(50) DEFAULT NULL COMMENT 'Voucher No.',
  `billno` varchar(50) DEFAULT NULL COMMENT 'Bill No.',
  `fdt` date NOT NULL,
  `tdt` date NOT NULL,
  `paydt` date NOT NULL COMMENT 'Payment Date',
  `paymode` int(11) NOT NULL DEFAULT 0,
  `paydesc` varchar(300) DEFAULT NULL,
  `paytyp` int(11) NOT NULL DEFAULT 0 COMMENT '1=Booking Amount, 5=Fees Generate, 6=Fees Collection, 7=Other Fees Collection, 10=Opening Balance, 11=Receive Entry, 22=Pament Entry, 33=Contra Entry, 44=Journal Entry',
  `fldgr` int(11) NOT NULL DEFAULT 0 COMMENT 'Fees Ledger',
  `drldgr` int(11) NOT NULL DEFAULT 0,
  `crldgr` int(11) NOT NULL DEFAULT 0,
  `amnt` double NOT NULL DEFAULT 0,
  `ctyp` int(11) NOT NULL COMMENT 'Course Type',
  `course` int(11) NOT NULL COMMENT 'Course',
  `sem` int(11) NOT NULL COMMENT 'Semester',
  `banknm` varchar(50) DEFAULT NULL,
  `branchnm` varchar(50) DEFAULT NULL,
  `cheqno` int(11) NOT NULL DEFAULT 0,
  `cheqdt` date NOT NULL,
  `trnsno` varchar(50) DEFAULT NULL,
  `trnsdt` date NOT NULL,
  `bdt` date NOT NULL,
  `edt` date DEFAULT NULL,
  `edttm` varchar(50) DEFAULT NULL,
  `eby` varchar(50) DEFAULT NULL,
  `udt` date NOT NULL,
  `udttm` varchar(50) DEFAULT NULL,
  `uby` varchar(50) DEFAULT NULL,
  `stat` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `main_edt_log`
--

CREATE TABLE `main_edt_log` (
  `sl` double NOT NULL,
  `tblnm` varchar(75) NOT NULL,
  `tblsl` varchar(100) NOT NULL COMMENT 'Table Sl',
  `ufnm` varchar(100) NOT NULL COMMENT 'Unique field Name',
  `fldnm` varchar(50) NOT NULL,
  `old_val` varchar(300) NOT NULL,
  `new_val` varchar(300) NOT NULL,
  `rdt` date NOT NULL COMMENT 'Request Date',
  `rdttm` varchar(30) NOT NULL COMMENT 'Request dttm',
  `rby` varchar(50) NOT NULL COMMENT 'Request By',
  `edt` date NOT NULL,
  `edttm` varchar(30) NOT NULL,
  `eby` varchar(50) NOT NULL,
  `stat` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `main_edt_log`
--

INSERT INTO `main_edt_log` (`sl`, `tblnm`, `tblsl`, `ufnm`, `fldnm`, `old_val`, `new_val`, `rdt`, `rdttm`, `rby`, `edt`, `edttm`, `eby`, `stat`) VALUES
(1, 'main_class', '1', 'sl', 'ClassName', 'dasds', 'Play Group', '2023-02-21', '21-02-2023 09:15:55 AM', 'Israfil', '2023-02-21', '21-02-2023 09:15:55 AM', 'Israfil', 0);

-- --------------------------------------------------------

--
-- Table structure for table `net_signup`
--

CREATE TABLE `net_signup` (
  `sl` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `mob` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `brncd` int(11) NOT NULL DEFAULT 0,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `userlevel` int(11) NOT NULL DEFAULT 0,
  `lastlogin` varchar(50) DEFAULT NULL,
  `lastloginfail` varchar(50) DEFAULT '',
  `numloginfail` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(50) DEFAULT '',
  `edt` date NOT NULL,
  `edttm` varchar(50) DEFAULT NULL,
  `eby` varchar(50) DEFAULT NULL,
  `udt` date NOT NULL,
  `udttm` varchar(50) DEFAULT NULL,
  `uby` varchar(50) DEFAULT NULL,
  `stat` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `net_signup`
--

INSERT INTO `net_signup` (`sl`, `name`, `addr`, `mob`, `email`, `brncd`, `username`, `password`, `userlevel`, `lastlogin`, `lastloginfail`, `numloginfail`, `ip`, `edt`, `edttm`, `eby`, `udt`, `udttm`, `uby`, `stat`) VALUES
(1, 'Super Admin (Israfil)', 'Dhubulia, Nadia', '9800069296', NULL, 0, 'Israfil', 'a', -5, '21-02-2023 08:47:45 AM', '13-03-2022 09:23:34 PM', 0, '::1', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, 0),
(2, 'Safikul Sk', 'Mollapara, Sree Mayapur, Nabadwip, Nadia - 741313', '7501637384', 'safikul.sk2013@gmail.com', 1, 'SafikulSk', 'Safikul@1234', 0, '18-03-2022 11:15:11 PM', '23-02-2022 12:43:54 PM', 0, '47.11.89.104', '0000-00-00', NULL, NULL, '0000-00-00', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_class`
--
ALTER TABLE `main_class`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_cname`
--
ALTER TABLE `main_cname`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_drcr`
--
ALTER TABLE `main_drcr`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_edt_log`
--
ALTER TABLE `main_edt_log`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `net_signup`
--
ALTER TABLE `net_signup`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_class`
--
ALTER TABLE `main_class`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_cname`
--
ALTER TABLE `main_cname`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_drcr`
--
ALTER TABLE `main_drcr`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_edt_log`
--
ALTER TABLE `main_edt_log`
  MODIFY `sl` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `net_signup`
--
ALTER TABLE `net_signup`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
