-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 01:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `statenames`
--

CREATE TABLE `statenames` (
  `Identity` int(11) NOT NULL,
  `StateName` text NOT NULL,
  `StateCode` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statenames`
--

INSERT INTO `statenames` (`Identity`, `StateName`, `StateCode`) VALUES
(1, 'Andaman and Nicobar Islands', 'AN'),
(2, 'Andhra Pradesh', 'AP'),
(3, 'Arunachal Pradesh', 'AR'),
(4, 'Assam', 'AS'),
(5, 'Bihar', 'BR'),
(6, 'Chandigarh', 'CH'),
(7, 'Chhattisgarh', 'CG'),
(8, 'Dadra & Nagar Haveli and Daman and Diu', 'DD'),
(9, 'Delhi', 'DL'),
(10, 'Goa', 'GA'),
(11, 'Gujarat', 'GJ'),
(12, 'Haryana', 'HR'),
(13, 'Himachal Pradesh', 'HP'),
(14, 'Jammu and Kashmir', 'JK'),
(15, 'Jharkhand', 'JH'),
(16, 'Karnataka', 'KA'),
(17, 'Kerala', 'KL'),
(18, 'Madhya Pradesh', 'MP'),
(19, 'Maharashtra', 'MH'),
(20, 'Manipur', 'MN'),
(21, 'Meghalaya', 'ML'),
(22, 'Mizoram', 'MZ'),
(23, 'Nagaland', 'NL'),
(24, 'Odisha', 'OD'),
(25, 'Puducherry', 'PY'),
(26, 'Punjab', 'PB'),
(27, 'Rajasthan', 'RJ'),
(28, 'Sikkim', 'SK'),
(29, 'Tamil Nadu', 'TN'),
(30, 'Telangana', 'TS'),
(31, 'Tripura', 'TR'),
(32, 'Uttar Pradesh', 'UP'),
(33, 'Uttarakhand', 'UK'),
(34, 'West Bengal', 'WB'),
(35, 'Nepal', 'NP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `statenames`
--
ALTER TABLE `statenames`
  ADD PRIMARY KEY (`Identity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `statenames`
--
ALTER TABLE `statenames`
  MODIFY `Identity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
