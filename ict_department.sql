-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 10:20 PM
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
-- Database: `ict department`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(3, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(12) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `CreationDate`, `UpdationDate`) VALUES
(1, '2017-18', 12, '2023-06-03  16:11:34', NULL),
(2, '2018-19', 13, '2023-06-03  16:22:17', NULL),
(3, '2019-20', 14, '2023-06-03  16:22:35', NULL),
(4, '2020-21', 15, '2023-06-03  16:22:49', NULL),
(5, '2021-22', 16, '2023-06-03  16:23:26', NULL),
(6, '2022-23', 17, '2023-06-03  16:23:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `id` int(11) NOT NULL,
  `noticeTitle` varchar(255) DEFAULT NULL,
  `noticeDetails` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`id`, `noticeTitle`, `noticeDetails`, `postingDate`) VALUES
(2, 'The 7th semester result of ICT 2017-18 has been published', 'checking', '2023-06-03 09:49:18'),
(3, 'The 7th semester result of ICT 2018-19 will publish soon', 'checking', '2023-06-03 09:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(32) DEFAULT NULL,
  `ClassId` int(32) DEFAULT NULL,
  `SubjectId` varchar(100) DEFAULT NULL,
  `marks` int(32) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(1, 1, 2, 1, 60, '2023-05-01 10:30:57', NULL),
(2, 1, 2, 2, 100, '2023-05-01 10:30:57', NULL),
(3, 1, 2, 3, 80, '2023-05-01 10:30:57', NULL),
(4, 1, 2, 4, 78, '2023-05-01 10:30:57', NULL),
(5, 1, 2, 6, 60, '2023-05-01 10:30:57', NULL),
(6, 2, 2, 3, 90, '2023-05-01 10:30:57', NULL),
(7, 2, 2, 2, 75, '2023-05-01 10:30:57', NULL),
(8, 2, 2, 1, 56, '2023-05-01 10:30:57', NULL),
(9, 3, 2, 5, 80, '2023-05-01 10:30:57', NULL),
(10, 3, 2,9, 54, '2023-05-01 10:30:57', NULL),
(11, 4, 2, 3, 85, '2023-05-01 10:30:57', NULL),
(12, 4, 2, 8, 55, '2023-05-01 10:30:57', NULL),
(13, 4, 2, 9, 65, '2023-05-01 10:30:57', NULL),
(14, 5, 2, 8, 75, '2023-05-01 10:30:57', NULL),
(15, 5, 2, 9, 56, '2023-05-01 10:30:57', NULL),
(16, 5, 2, 2, 52, '2023-05-01 10:30:57', NULL),
(17, 5, 2, 3, 80, '2023-05-01 10:30:57', NULL),
(18, 5, 2, 4, 80, '2023-05-01 10:30:57', NULL),
(19, 4, 2, 9, 70, '2023-05-01 10:30:57', NULL),
(20, 6, 2, 2, 90, '2023-05-01 10:30:57', NULL),
(21, 6, 2, 1, 60, '2023-05-01 10:30:57', NULL),
(22, 5, 2, 4, 90, '2023-05-16 12:50:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) DEFAULT NULL,
  `RollId` varchar(100) DEFAULT NULL,
  `StudentEmail` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DOB` varchar(100) DEFAULT NULL,
  `ClassId` int(32) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `StudentEmail`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(1, 'Imtiaj Aurpon', '11909002', 'imtiaj@gmail.com', 'Male', '2000-07-26', 2, '2023-05-16 12:39:23', NULL, 1),
(2, 'Md Rakibul Islam', '11909005', 'rakibulislam@gmail.com', 'Male', '1999-12-23', 2, '2023-03-13 10:30:57', NULL, 1),
(3, 'Israth Jahan', '11909006', 'israth@gmail.com', 'Female', '1999-05-23', 2, '2023-03-13 10:30:57', NULL, 0),
(4, 'Gargi Roy Tushi', '11909016', 'roytushi@gmail.com', 'Female', '1999-07-22', 2, '2023-03-13 15:19:40', NULL, 1),
(5, 'Tamanna Akter', '11909020', 'tamannalima@gmail.com', 'Female', '1999-11-14', 2, '2023-03-13 10:30:57', NULL, 1),
(6, 'Meheniger Alam', '11909035', 'mehenigeralam@gmail.com', 'Female', '1999-10-18', 2, '2023-03-13 10:30:57', NULL, 1),
(7, 'Sahriar Parvez', '11909038', 'shahriarparvez@gmail.com', 'Male', '1999-01-28', 2, '2023-03-13 01:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(32) DEFAULT NULL,
  `SubjectId` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(1, 2,  1, 1, '2023-06-03  17:00:54', NULL),
(2, 2,  1, 1, '2023-06-03  17:40:12', NULL),
(3, 2,  2, 1, '2023-06-03   17:40:12', NULL),
(4, 2,  2, 1, '2023-06-03   17:40:12', NULL),
(5, 2,  3, 1, '2023-06-03   17:40:12', NULL),
(6, 2,3 , 1, '2023-06-03    17:40:12', NULL),
(7, 2,  9, 1, '2023-06-03   17:40:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Wireless Communication', 'ICT-701', '2023-01-04  10:30:57', NULL),
(2, 'Wireless Communication Lab', 'ICT-702', '2023-01-04  10:30:57', NULL),
(3, 'Optical Fiber Communication', 'ICT-703', '2023-01-04  10:30:57', NULL),
(4, 'Optical Fiber Communication Lab', 'ICT-704', '2023-01-04  10:30:57', NULL),
(5, 'Web Technology & Programming', 'ICT-705', '2023-01-04  10:30:57', NULL),
(6, 'Web Technology & Programming Lab', 'ICT-706', '2023-01-04  00:00:00', NULL),
(7, 'Image Processing', 'ICT-707', '2023-01-04  10:30:57', NULL),
(8, 'Image Processing Lab', 'ICT-708', '2023-01-04  10:30:57', NULL),
(9, 'Microwave Communication', 'ICT-709', '2023-01-04  10:30:57', NULL),
(10, 'Microwave Communication Lab', 'ICT-710', '2023-01-04  10:30:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
