-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 05:16 AM
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
-- Table structure for table `main_section`
--

CREATE TABLE `main_section` (
  `sl` int(11) NOT NULL,
  `Session` int(11) NOT NULL COMMENT 'Academic Session',
  `Class` int(11) NOT NULL COMMENT 'Sl No. of Class',
  `SectionName` varchar(50) DEFAULT NULL COMMENT 'Section Name',
  `edt` date NOT NULL COMMENT 'Entry Date',
  `edttm` varchar(50) DEFAULT NULL COMMENT 'Entry Date & Time',
  `eby` varchar(100) DEFAULT NULL COMMENT 'Entered By',
  `udt` date NOT NULL COMMENT 'Date of Modification',
  `udttm` varchar(50) DEFAULT NULL COMMENT 'Modification Date & Time',
  `uby` varchar(100) DEFAULT NULL COMMENT 'Updated By',
  `stat` int(11) NOT NULL DEFAULT 0 COMMENT 'Status of the Record'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_section`
--

INSERT INTO `main_section` (`sl`, `Session`, `Class`, `SectionName`, `edt`, `edttm`, `eby`, `udt`, `udttm`, `uby`, `stat`) VALUES
(1, 2023, 1, 'X', '2023-02-22', '22-02-2023 09:33:58 AM', 'Israfil', '2023-02-22', '22-02-2023 09:44:13 AM', 'Israfil', 0),
(2, 2023, 1, 'B', '2023-02-22', '22-02-2023 09:34:20 AM', 'Israfil', '0000-00-00', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_section`
--
ALTER TABLE `main_section`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_section`
--
ALTER TABLE `main_section`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
