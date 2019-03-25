-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2019 at 10:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newtest`
--

--
-- Table structure for table `blancuri`
--
CREATE TABLE `blancuri` (
  `id` int(11) NOT NULL,
  `data_insert` date NOT NULL,
  `modelul` varchar(50) NOT NULL,
  `cabinet` varchar(10) NOT NULL,
  `numarul` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cabinet` varchar(10) NOT NULL,
  `percentage` int(11) NOT NULL,
  `data_insert` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `cabinet`, `percentage`, `data_insert`) VALUES
(1, 'usg', '214', 75, '2019-01-28'),
(2, 'usg', '215', 75, '2019-01-28'),
(3, 'usg', '216', 75, '2019-01-28'),
(4, 'usg', '220', 75, '2019-01-28'),
(5, 'usg', '222', 75, '2019-01-28'),
(6, 'df', '312', 75, '2019-01-28'),
(8, 'df', '323', 75, '2019-01-28'),
(12, 'df', '316', 75, '2019-01-28'),
(13, 'df', '324', 75, '2019-01-28'),
(14, 'esvm', '617', 75, '2019-01-28'),
(15, 'esvm', '618', 75, '2019-01-28'),
(16, 'esvm', '624', 75, '2019-01-28'),
(18, 'esvm', '619', 75, '2019-01-28'),
(19, 'lcd', '11', 75, '2019-01-28'),
(20, 'lcd', '20', 75, '2019-01-28'),
(21, 'lmn', '002', 75, '2019-01-28'),
(22, 'lmn', '011', 75, '2019-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploads`
--

CREATE TABLE `tbl_uploads` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`id`, `first_name`, `last_name`, `file`, `type`, `size`) VALUES
(1, '...', '129', '25139-1801.06323.pdf', 'application/pdf', 907185),
(2, '192.168.25.222', '325', '60373-jpg2pdf.pdf', 'application/pdf', 89937),
(3, '192.168.255.22', '323', '2582-windows-8_notice_eng.pdf', 'application/pdf', 77424),
(4, '192.168.1.195', 'IT', '71623-desktop-0jor69g.html', 'text/html', 90294);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`) VALUES
(2, 'nicu@crdm.md', 'test', 'niculita', 'nicolae');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
