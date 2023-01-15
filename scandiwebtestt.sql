-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 04:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiwebtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `SKU` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `price_$` int(11) DEFAULT NULL,
  `weight_kg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `SKU`, `name`, `price_$`, `weight_kg`) VALUES
(9, '123', 'Chair', 25, 234);

-- --------------------------------------------------------

--
-- Table structure for table `chair`
--

CREATE TABLE `chair` (
  `id` int(11) NOT NULL,
  `SKU` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `price_$` int(11) DEFAULT NULL,
  `height_cm` int(11) DEFAULT NULL,
  `width_cm` int(11) DEFAULT NULL,
  `length_cm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chair`
--

INSERT INTO `chair` (`id`, `SKU`, `name`, `price_$`, `height_cm`, `width_cm`, `length_cm`) VALUES
(121, '', '', 0, 0, 0, 0),
(122, '1', 's', 2, 23, 23, 2),
(123, '1235', 'Chair', 25, 1, 23, 10),
(124, '124w55', 'Chair', 25, 23, 23, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dvd_disc`
--

CREATE TABLE `dvd_disc` (
  `id` int(11) NOT NULL,
  `SKU` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `price_$` int(11) DEFAULT NULL,
  `size_mb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dvd_disc`
--

INSERT INTO `dvd_disc` (`id`, `SKU`, `name`, `price_$`, `size_mb`) VALUES
(12, '12', 'Dvd Disc', 245, 12456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SKU` (`SKU`);

--
-- Indexes for table `chair`
--
ALTER TABLE `chair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvd_disc`
--
ALTER TABLE `dvd_disc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SKU` (`SKU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chair`
--
ALTER TABLE `chair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `dvd_disc`
--
ALTER TABLE `dvd_disc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
