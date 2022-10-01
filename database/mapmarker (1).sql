-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 10:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapmarker`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(176, 'วัดบ้านด่านkmkmfv', '47/5 ตำบลหนองไฮหลำ', 15.028857, 103.065834, 'มหาวิทยาลัย'),
(177, 'วงเวียนช้าง', '45/8 ต.ในเมือง อ.เมืองบุรีรัมย์', 14.986576, 103.104630, 'มหาวิทยาลัย');

-- --------------------------------------------------------

--
-- Table structure for table `type_place`
--

CREATE TABLE `type_place` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_place`
--

INSERT INTO `type_place` (`id`, `type_name`) VALUES
(1, 'โรงพยาบาล'),
(3, 'ร้านอาหาร'),
(4, 'โรงเเรม'),
(5, 'มหาวิทยาลัย'),
(6, 'โรงเรียน'),
(7, 'ห้างสรรพสินค้า'),
(8, 'ปั้มนำมัน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_place`
--
ALTER TABLE `type_place`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_place`
--
ALTER TABLE `type_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
