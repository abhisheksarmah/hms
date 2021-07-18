-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 11:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `Aname` varchar(255) NOT NULL,
  `Aemail` varchar(255) NOT NULL,
  `Apass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `Aname`, `Aemail`, `Apass`) VALUES
(9, 'ADMIN', 'Admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_table`
--

CREATE TABLE `reservation_table` (
  `Rev_id` int(11) NOT NULL,
  `Acid` int(11) NOT NULL,
  `Rev_name` varchar(255) NOT NULL,
  `Rev_email` varchar(255) NOT NULL,
  `Rev_phone` int(11) NOT NULL,
  `Rev_IdnPan` varchar(11) NOT NULL,
  `Rev_Add` varchar(255) NOT NULL,
  `Rev_Sdate` date NOT NULL,
  `Rev_Edate` date NOT NULL,
  `rev_adults` int(11) NOT NULL,
  `rev_child` int(11) NOT NULL DEFAULT 0,
  `rev_totalguest` int(11) NOT NULL,
  `Rev_roomno` int(11) NOT NULL,
  `Rev_roomtype` varchar(255) NOT NULL,
  `Room_total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_table`
--

CREATE TABLE `room_table` (
  `Roomid` int(8) UNSIGNED NOT NULL,
  `RoomNo` mediumint(9) DEFAULT NULL,
  `RoomType` text DEFAULT NULL,
  `RoomPrice` text DEFAULT NULL,
  `Room_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_table`
--

INSERT INTO `room_table` (`Roomid`, `RoomNo`, `RoomType`, `RoomPrice`, `Room_status`) VALUES
(327, 101, 'Single Bed', '500', 1),
(328, 202, 'Double Bed', '1000', 1),
(329, 303, 'King Size Bed', '2000', 1),
(330, 102, 'Single Bed', '100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_position` varchar(255) NOT NULL,
  `s_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `s_name`, `s_position`, `s_contact`) VALUES
(6, 'test', 'Housekeeping Manager', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_table`
--
ALTER TABLE `reservation_table`
  ADD PRIMARY KEY (`Rev_id`);

--
-- Indexes for table `room_table`
--
ALTER TABLE `room_table`
  ADD PRIMARY KEY (`Roomid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservation_table`
--
ALTER TABLE `reservation_table`
  MODIFY `Rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `room_table`
--
ALTER TABLE `room_table`
  MODIFY `Roomid` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
