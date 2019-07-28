-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 07:01 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `companydb`
--

CREATE TABLE `companydb` (
  `id` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `cgst` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companydb`
--

INSERT INTO `companydb` (`id`, `cname`, `cid`, `cgst`) VALUES
(2, 'GTA', 'GTA-57-65', '151525478945351'),
(4, 'GTA', 'GTA-57-67', '151525478945351');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `pname` text NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `pcolor` text NOT NULL,
  `ptype` varchar(100) NOT NULL,
  `pfor` text NOT NULL,
  `adderid` bigint(10) NOT NULL,
  `cid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `pname`, `pcode`, `pcolor`, `ptype`, `pfor`, `adderid`, `cid`) VALUES
(77, 'cable', '713146', 'blue', 'RJ-45', '1231213132312132', 1111111111, 'GTA-57-65');

-- --------------------------------------------------------

--
-- Table structure for table `finaldata`
--

CREATE TABLE `finaldata` (
  `id` int(11) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `pname` text NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `pcolor` text NOT NULL,
  `ptype` varchar(100) NOT NULL,
  `pfor` text NOT NULL,
  `adderid` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finaldata`
--

INSERT INTO `finaldata` (`id`, `cid`, `pname`, `pcode`, `pcolor`, `ptype`, `pfor`, `adderid`) VALUES
(23, 'GTA-57-65', 'cable', '713146', 'blue', 'RJ-45', 'ELECTRONICS', 7063022596);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` bigint(10) NOT NULL,
  `uid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `number`, `uid`) VALUES
(21, 'Subham Bhattacharya', 7063022596, 1234),
(32, 'Sukanta Bhattacharya', 9732220299, 1111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companydb`
--
ALTER TABLE `companydb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finaldata`
--
ALTER TABLE `finaldata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companydb`
--
ALTER TABLE `companydb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `finaldata`
--
ALTER TABLE `finaldata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
