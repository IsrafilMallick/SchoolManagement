-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 04:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rycsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL COMMENT 'Primary Key Auto Increment',
  `userName` varchar(2000) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobileNo` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `registeredDevice` varchar(2000) NOT NULL,
  `sessionId` varchar(200) NOT NULL,
  `lastLoginTime` datetime NOT NULL,
  `stat` int(11) NOT NULL COMMENT '0=> Active\r\n1=>Deactive\r\n2=> Deleted\r\n3=> Block',
  `ip` varchar(200) NOT NULL,
  `userLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `userName`, `password`, `name`, `mobileNo`, `email`, `registeredDevice`, `sessionId`, `lastLoginTime`, `stat`, `ip`, `userLevel`) VALUES
(1, 'samaun', '123', 'Samaun', '9800069790', 'samaunhoque80@gmail.com', '', 'xwqoqZ0cR07RruLp4bZBZCZm4lbfP9/iYBKj/udmwVAfoRNF61jDVu0LNsA2gpkqil8PQUdFOejpIhWxWCeooQ==', '2022-01-26 10:01:01', 0, '::1', -1),
(2, 'israfil', 'a', 'Israfil Mallick', '9800069296', 'israfilda3@gmail.com', '', '9gqE8wDpIfl2Kw2TzeaFNbiW9k05esbAH6wA8PoxJU7lp66hstXDMrb/otgY2dRJL5WDj+UEGY2wJAu9Kjm6yA==', '2022-01-25 18:46:58', 0, '::1', -1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseName` varchar(200) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `courseEligibility` varchar(200) NOT NULL,
  `courseCurriculum` text NOT NULL,
  `entryDate` date NOT NULL,
  `entryDateTime` varchar(100) NOT NULL,
  `enteredBy` varchar(100) NOT NULL,
  `modifyDate` date NOT NULL,
  `modifyDateTime` varchar(100) NOT NULL,
  `modifiedBy` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseName`, `courseCode`, `courseEligibility`, `courseCurriculum`, `entryDate`, `entryDateTime`, `enteredBy`, `modifyDate`, `modifyDateTime`, `modifiedBy`, `status`) VALUES
(1, 'Diploma in Computer Application', 'DCA', 'HS', 'Test', '2022-01-25', '2022-01-25 13:40:05pm', 'samaun', '0000-00-00', '', '', 0),
(2, 'Diploma in Computer IT', 'DCIT', 'HS', 'test 2', '2022-01-25', '2022-01-25 13:44:19pm', 'samaun', '0000-00-00', '', '', 0),
(3, 'Diploma in Computer Management', 'DMA', 'HS', 'Title', '2022-01-25', '2022-01-25 13:51:48pm', 'samaun', '0000-00-00', '', '', 0),
(4, 'Diploma in Computer ApplicationA', 'DCAA', 'HS', 'yest', '2022-01-25', '2022-01-25 13:52:28pm', 'samaun', '0000-00-00', '', '', 0),
(5, 'Diploma in Computer Application', 'DCAdsf', 'HS', 'sdffsd', '2022-01-25', '2022-01-25 13:53:20pm', 'samaun', '0000-00-00', '', '', 0),
(6, 'Diploma in Computer Application', 'DCAdf', 'HS', 'sdfsdf', '2022-01-25', '2022-01-25 13:55:53pm', 'samaun', '0000-00-00', '', '', 0),
(7, 'Diploma in Computer Application', 'DCAasd', 'HS', 'asdas', '2022-01-25', '2022-01-25 14:03:20pm', 'samaun', '0000-00-00', '', '', 0),
(8, 'sdafsdf##222', 'DCITrf', 'HS', 'sdfsdf', '2022-01-25', '2022-01-25 14:03:34pm', 'samaun', '0000-00-00', '', '', 0),
(9, 'qwewq', 'wqeqw', 'wqeqw', 'qweeqw', '2022-01-25', '2022-01-25 21:25:25pm', 'samaun', '0000-00-00', '', '', 0),
(10, 'dsfsdf', 'sdfsdf', 'sdfsd', 'sdfsdf', '2022-01-26', '2022-01-26 11:30:53am', 'samaun', '0000-00-00', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coursesetup`
--

CREATE TABLE `coursesetup` (
  `id` int(11) NOT NULL,
  `courseSession` int(11) NOT NULL,
  `courseName` int(11) NOT NULL,
  `courseDuration` int(11) NOT NULL,
  `entryDate` date NOT NULL,
  `entryDateTime` varchar(100) NOT NULL,
  `enteredBy` varchar(100) NOT NULL,
  `modifyDate` date NOT NULL,
  `modifyDateTime` varchar(100) NOT NULL,
  `modifiedBy` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursesetup`
--

INSERT INTO `coursesetup` (`id`, `courseSession`, `courseName`, `courseDuration`, `entryDate`, `entryDateTime`, `enteredBy`, `modifyDate`, `modifyDateTime`, `modifiedBy`, `status`) VALUES
(1, 2022, 1, 2, '2022-01-25', '2022-01-25 21:31:38pm', 'samaun', '0000-00-00', '', '', 0),
(2, 2022, 2, 1, '2022-01-25', '2022-01-25 21:32:14pm', 'samaun', '0000-00-00', '', '', 0),
(3, 2022, 5, 4, '2022-01-25', '2022-01-25 21:32:39pm', 'samaun', '0000-00-00', '', '', 0),
(4, 2022, 8, 54, '2022-01-26', '2022-01-26 11:49:03am', 'samaun', '0000-00-00', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` double NOT NULL,
  `pageName` varchar(200) NOT NULL,
  `assignedUser` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `menuTpye` int(11) NOT NULL COMMENT '0-> Root Menu\r\n1-> Sub Menu\r\n2-> Sub_Sub_Menu',
  `rootMenuId` int(11) NOT NULL,
  `menuHeading` varchar(200) NOT NULL,
  `menuOrder` int(11) NOT NULL,
  `menuClass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `pageName`, `assignedUser`, `status`, `menuTpye`, `rootMenuId`, `menuHeading`, `menuOrder`, `menuClass`) VALUES
(1, 'index', 'samaun,israfil', 0, 0, 0, 'Dashboard', 1, ''),
(2, '#', 'samaun,israfil', 0, 0, 0, 'Admission', 4, 'fa fa-th-large'),
(3, 'studEntry', 'samaun,israfil', 0, 1, 2, 'Student Entry', 1, 'fa fa-edit'),
(4, '#', 'samaun,israfil', 0, 0, 0, 'Setup', 3, 'fa fa-cog fa-lg'),
(5, 'courseEntry', 'samaun,israfil', 0, 1, 6, 'Course Entry', 1, 'fa fa-edit'),
(6, '#', 'samaun,israfil', 0, 0, 0, 'Entry', 2, 'fa fa-edit fa-lg'),
(7, 'courseSetup', 'samaun,israfil', 0, 1, 4, 'Course Setup', 1, 'fa fa-cog'),
(8, 'batchSetup', 'samaun,israfil', 0, 1, 4, 'Batch Setup', 2, 'fa fa-cog');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `id` double NOT NULL,
  `ApplicationNo` varchar(50) DEFAULT NULL,
  `AdmissionSession` int(11) NOT NULL,
  `AdmissionDate` date NOT NULL,
  `AdmissionCourse` int(11) NOT NULL,
  `PromotionDate` date NOT NULL,
  `CurrentSession` int(11) NOT NULL,
  `CurrentCourse` int(11) NOT NULL,
  `CurrentSemester` int(11) NOT NULL,
  `BatchName` int(11) NOT NULL,
  `StudentID` varchar(50) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` int(11) NOT NULL,
  `Caste` int(11) NOT NULL,
  `Religion` int(11) NOT NULL,
  `EduactionalQualification` varchar(100) NOT NULL,
  `StudentOccupation` varchar(100) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `EpicNo` varchar(50) NOT NULL,
  `AadhaarNo` varchar(20) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `FatherOccupation` varchar(100) NOT NULL,
  `FatherMobile` varchar(100) NOT NULL,
  `MotherName` varchar(100) NOT NULL,
  `MotherOccupation` varchar(100) NOT NULL,
  `MotherMobile` varchar(100) NOT NULL,
  `VillageName` varchar(100) NOT NULL,
  `PostOffice` varchar(100) NOT NULL,
  `PoliceStation` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `PinCode` varchar(10) NOT NULL,
  `BankName` varchar(100) NOT NULL,
  `BranchName` varchar(100) NOT NULL,
  `IfsCode` varchar(20) NOT NULL,
  `AccountNo` varchar(100) NOT NULL,
  `EntryDate` date NOT NULL,
  `EntryDateTime` varchar(100) NOT NULL,
  `EnteredBy` varchar(100) NOT NULL,
  `ModifyDate` date NOT NULL,
  `ModifyDateTime` varchar(100) NOT NULL,
  `MidifiedBy` varchar(100) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`id`, `ApplicationNo`, `AdmissionSession`, `AdmissionDate`, `AdmissionCourse`, `PromotionDate`, `CurrentSession`, `CurrentCourse`, `CurrentSemester`, `BatchName`, `StudentID`, `StudentName`, `DateOfBirth`, `Gender`, `Caste`, `Religion`, `EduactionalQualification`, `StudentOccupation`, `MobileNo`, `EmailID`, `EpicNo`, `AadhaarNo`, `FatherName`, `FatherOccupation`, `FatherMobile`, `MotherName`, `MotherOccupation`, `MotherMobile`, `VillageName`, `PostOffice`, `PoliceStation`, `District`, `State`, `PinCode`, `BankName`, `BranchName`, `IfsCode`, `AccountNo`, `EntryDate`, `EntryDateTime`, `EnteredBy`, `ModifyDate`, `ModifyDateTime`, `MidifiedBy`, `Status`) VALUES
(1, 'erewre', 2022, '0000-00-00', 0, '0000-00-00', 0, 0, 0, 0, '', '', '0000-00-00', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursesetup`
--
ALTER TABLE `coursesetup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key Auto Increment', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coursesetup`
--
ALTER TABLE `coursesetup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studentdata`
--
ALTER TABLE `studentdata`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
