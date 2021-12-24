-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 12:08 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xvmnet_mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phutinh`
--

CREATE TABLE `tbl_phutinh` (
  `id` int(11) NOT NULL,
  `name_sao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_sao` int(11) NOT NULL,
  `cung` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_cung` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_phutinh`
--

INSERT INTO `tbl_phutinh` (`id`, `name_sao`, `id_sao`, `cung`, `id_cung`, `content`) VALUES
(1, 'Địa không', 78, 'Phúc đức', 3, '<p>cccccccccccc</p>\r\n'),
(2, 'Văn khúc', 75, 'Tật ách', 8, '<p>aaaaaaaa</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_phutinh`
--
ALTER TABLE `tbl_phutinh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_phutinh`
--
ALTER TABLE `tbl_phutinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
