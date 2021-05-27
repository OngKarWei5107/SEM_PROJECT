-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 03:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `psw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `psw`) VALUES
(1, 'RANI', '29102381411');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` text NOT NULL,
  `psw` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(250) NOT NULL,
  `order_id` int(11) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `password` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `username`, `email`, `psw`, `phone`, `address`, `order_id`, `hash`, `active`, `password`, `token`) VALUES
(1, 'RANI', '', '29102381411', 189927736, 'no1181, Taman Mutiara', 1, '', 0, '', 'g5vx0zqf8l'),
(2, 'RESSI', '', '1231230490', 274847663, 'Taman Kempas', 2, '', 0, '', 'g5vx0zqf8l'),
(3, 'WAKKA', '', '239182039709', 1628376678, 'Laguna Merbok', 3, '', 0, '', 'g5vx0zqf8l'),
(10, 'ADAM', '123@gmail.com', '123123', 135158829, 'testing', 0, '', 0, '', ''),
(18, 'KARMA', 'ongkarwei05107@gmail.com', '789456123', 174541334, 'Lorong 3/10, Taman Kempas', 0, 'f2217062e9a397a1dca429e7d70bc6ca', 1, '', '3w4kozugqp');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodid` int(11) NOT NULL,
  `foodName` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `price` int(250) NOT NULL,
  `descp` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodid`, `foodName`, `quantity`, `price`, `descp`, `photo`) VALUES
(1, 'LayS', 100, 5, 'Potato Chips yummy', 'ptc1.jpg'),
(2, 'Chipsmore', 100, 4, 'Cookies', 'chipsmore.jpg'),
(3, 'Nabati', 100, 3, 'Wafer', 'nabati.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicineid` int(11) NOT NULL,
  `medicineName` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `descp` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicineid`, `medicineName`, `quantity`, `price`, `descp`, `photo`) VALUES
(1, 'Ibuprofen', '15', 20, ' anti-inflammatory drugs', 'ibuprofen.jpg'),
(2, 'Loratadine', '60', 15, 'treat allergies', 'loratadine.jpg'),
(3, 'Climdamycin', '14', 50, 'bacterial infections treatment', 'Climdamycin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petitem`
--

CREATE TABLE `petitem` (
  `petItemid` int(11) NOT NULL,
  `petItemName` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `price` int(250) NOT NULL,
  `descp` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petitem`
--

INSERT INTO `petitem` (`petItemid`, `petItemName`, `quantity`, `price`, `descp`, `photo`) VALUES
(1, 'nail clipper', 15, 20, 'just a clippers ', 'nc1.png'),
(2, 'scrub brush', 60, 15, 'a normal brush', 'sb1.png'),
(3, 'neutralizer', 14, 60, 'nice product', 'od1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `runner`
--

CREATE TABLE `runner` (
  `runnerid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `runner`
--

INSERT INTO `runner` (`runnerid`, `username`, `psw`, `phone`) VALUES
(1, 'SAM21', '670421027789', 189927736),
(2, 'wer93', '239012839101', 274847663);

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `serviceProviderid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `approved` int(10) NOT NULL,
  `phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`serviceProviderid`, `username`, `psw`, `approved`, `phone`) VALUES
(1, 'BAMI', '780222027104', 1, 189927736),
(2, 'SAYEK', '12097102989', 0, 274847663),
(3, 'WEH SING', '31204918290', 0, 1628376678),
(5, 'ONG123', '123123123', 0, 174541334),
(12, 'ONG', '123123123', 1, 174541334);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicineid`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petitem`
--
ALTER TABLE `petitem`
  ADD PRIMARY KEY (`petItemid`);

--
-- Indexes for table `runner`
--
ALTER TABLE `runner`
  ADD PRIMARY KEY (`runnerid`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`serviceProviderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petitem`
--
ALTER TABLE `petitem`
  MODIFY `petItemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `runner`
--
ALTER TABLE `runner`
  MODIFY `runnerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `serviceProviderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
