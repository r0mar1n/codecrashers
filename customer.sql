-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 07:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cater`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` varchar(5) NOT NULL,
  `catname` varchar(50) NOT NULL,
  `descr` varchar(250) NOT NULL,
  `time` time(6) NOT NULL,
  `img` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`, `descr`, `time`, `img`) VALUES
('1', 'Breakfast', 'Available from 7:30 am to 11:00 am', '11:00:00.000000', 'breakfast.jpg'),
('2', 'Lunch', 'Starts from 1:00pm', '00:00:00.000000', 'lunch.jpg'),
('3', 'Chinese', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, odit. Tempora eum nost', '00:00:00.000000', 'chinese.jpg'),
('4', 'Beverages', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, odit. Tempora eum nost', '00:00:00.000000', 'beverages.jpg'),
('5', 'Desserts', '', '00:00:00.000000', 'dessert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `roll` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`roll`, `password`, `fname`, `lname`, `email`) VALUES
('1', '202cb962ac59075b964b07152d234b70', 'Shruti', 'Shirdhankar', 'codecrash@GMAIL.COM'),
('123', '81dc9bdb52d04dc20036dbd8313ed055', 'Shruti', 'Shirdhankar', 'harib82329@momoshe.com');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fid` varchar(5) NOT NULL,
  `catid` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fid`, `catid`, `name`, `price`, `img`) VALUES
('1', '1', 'Idli Sambar', 60, 'idli.jpg'),
('1', '2', 'Veg Thali', 100, 'veg-thali.jpg'),
('1', '3', 'Veg Fried Rice', 120, 'veg-fried-rice.jpg'),
('2', '1', 'Dosa', 60, 'dosa.jpg'),
('2', '2', 'Pav Bhaji', 120, 'pavbhaji.jpg'),
('3', '1', 'Medu Vada', 70, 'vada.jpg'),
('3', '2', 'Misal Pav', 80, 'misal pav.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(5) NOT NULL,
  `user` varchar(10) NOT NULL,
  `items` int(5) NOT NULL,
  `cost` float NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `user`, `items`, `cost`, `status`) VALUES
(1, '1', 1, 70, 'Preparing'),
(23, '12', 3, 320, 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`(2));

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`,`catid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
