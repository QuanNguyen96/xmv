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
-- Table structure for table `tbl_chinhtinh`
--

CREATE TABLE `tbl_chinhtinh` (
  `id` int(11) NOT NULL,
  `name_sao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_sao` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `id_cung` int(11) NOT NULL,
  `cung` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_chinhtinh`
--

INSERT INTO `tbl_chinhtinh` (`id`, `name_sao`, `id_sao`, `position`, `id_cung`, `cung`, `content`) VALUES
(1, 'Tham lang', 176, 5, 5, 'Quan lộc', '<p>bbbbbbbb</p>\r\n'),
(2, 'Phá Quân', 171, 2, 2, 'Phụ mẫu', '<p>ccccccccccc</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chinhtinh`
--
ALTER TABLE `tbl_chinhtinh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chinhtinh`
--
ALTER TABLE `tbl_chinhtinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
