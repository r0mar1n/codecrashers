-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 07:24 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `fid` varchar(10) NOT NULL,
  `catid` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qnty` int(5) NOT NULL,
  `amnt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `user`, `fid`, `catid`, `name`, `qnty`, `amnt`) VALUES
(1, '123', '1', '1', 'Idli Sambar', 2, 120);

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
('3', 'Chinese', '', '00:00:00.000000', 'chinese.jpg'),
('4', 'Beverages', '', '00:00:00.000000', 'beverages.jpg'),
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
('123', '81dc9bdb52d04dc20036dbd8313ed055', 'Shruti', 'Shirdhankar', 'harib82329@momoshe.com'),
('1234', '81dc9bdb52d04dc20036dbd8313ed055', 'adw', 'dsadw', 'harib82329@momoshe.com');

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
('1', '4', 'Coca Cola', 10, 'cocacola.jpg'),
('2', '1', 'Dosa', 60, 'dosa.jpg'),
('2', '2', 'Pav Bhaji', 120, 'pavbhaji.jpg'),
('2', '4', 'Coffee', 15, 'coffee.jpg'),
('3', '1', 'Medu Vada', 70, 'vada.jpg'),
('3', '2', 'Misal Pav', 80, 'misal pav.jpg'),
('3', '4', 'Tea', 10, 'tea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `fid` varchar(5) NOT NULL,
  `catid` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`fid`, `catid`, `name`, `img`) VALUES
('3', '2', 'Misal Pav', 'misalpav.jpg');

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
(23, '123', 3, 320, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `fid` varchar(5) NOT NULL,
  `catid` varchar(5) NOT NULL,
  `name` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`fid`, `catid`, `name`, `img`) VALUES
('1', '2', 'Veg Thali', 'veg-thali.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

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
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`fid`,`catid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`fid`,`catid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
