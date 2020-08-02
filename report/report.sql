-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 07:03 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Identity` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `ReportedBy` varchar(200) NOT NULL,
  `ContactUs` varchar(10) NOT NULL,
  `CityId` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Confirm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`Identity`, `Type`, `Date`, `ReportedBy`, `ContactUs`, `CityId`, `Description`, `Confirm`) VALUES
(1, 'calamities', '2020-08-02', 'Naman', '9876543210', 8, '			rtyguhitvybn			', 'No'),
(2, 'calamities', '2020-08-02', 'Vikram', '9876543210', 8, '			rtyguhitvybn			', 'Yes'),
(3, 'strike', '2020-08-02', 'Ridham Goyal', '9780624350', 12, 'Political strike happens				', 'No'),
(4, 'strike', '2020-08-02', 'Amitoj Singh', '9780807522', 135, 'H		', 'Yes'),
(5, 'calamities', '2020-08-02', 'Anikit Kumar', '9876543210', 7, 'Floods 			', 'No'),
(6, 'strike', '2020-08-02', 'Ankit', '9876513065', 243, 'tyfyguhrctvyb drftgyhrtytfuy ytuyiuh', 'No'),
(7, 'strike', '2020-08-02', 'rtyu', '8451248512', 0, '451vbhnj						', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Identity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `Identity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
