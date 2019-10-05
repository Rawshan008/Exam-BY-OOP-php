-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2019 at 06:45 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `adminuser` varchar(50) NOT NULL,
  `adminpass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `adminuser`, `adminpass`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesno` int(11) NOT NULL,
  `rigntans` int(11) NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesno`, `rigntans`, `ans`) VALUES
(1, 1, 0, 'Scripting Language'),
(2, 1, 1, 'Markup Language'),
(3, 1, 0, 'Programming Language'),
(4, 1, 0, 'Network Protocol'),
(5, 2, 0, 'User defined tags'),
(6, 2, 0, 'Pre-specified tags'),
(7, 2, 1, 'Fixed tags defined by the language'),
(8, 2, 0, 'Tags only for linking'),
(9, 3, 1, '1990'),
(10, 3, 0, '1980'),
(11, 3, 0, '2000'),
(12, 3, 0, '1995'),
(17, 4, 0, 'picture'),
(18, 4, 0, 'image'),
(19, 4, 1, 'img'),
(20, 4, 0, 'src'),
(21, 5, 1, 'Microsofts Bing'),
(22, 5, 0, 'Netscape Navigator'),
(23, 5, 0, 'Mozilla Firefox'),
(24, 5, 0, 'Opera');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesno` int(11) NOT NULL,
  `ques` text NOT NULL,
  `delid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesno`, `ques`, `delid`) VALUES
(1, 1, 'HTML is what type of language ?', 1),
(2, 2, 'HTML uses', 2),
(3, 3, 'The year in which HTML was first proposed _______.', 3),
(5, 4, 'What tag is used to display a picture in a HTML page?', 4),
(6, 5, 'Which of the following is not a browser ?', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `status`) VALUES
(2, 'Mijanur Rahman', 'minaj008', '202cb962ac59075b964b07152d234b70', 'mijanur@mi.com', 0),
(3, 'Kobir Rahman', 'kobir008', '202cb962ac59075b964b07152d234b70', 'kobir@ko.co', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
