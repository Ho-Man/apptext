-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 01:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` varchar(30) NOT NULL,
  `BrandName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `BrandName`) VALUES
('Asus', 'Asus'),
('Dell', 'Dell'),
('HP', 'HP'),
('Le', 'Lenovo'),
('Mac', 'MacBook');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Tel` int(11) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `UserName`, `Password`, `CustomerName`, `Tel`, `Email`, `Address`, `State`) VALUES
(5, 'Hao', 'fcea920f7412b5da7be0cf42b8c93759', 'Tran Phuoc Hao', 346370328, 'ht0164676@gmail.com', 'cwef', 1),
(7, 'Hao1', '25d55ad283aa400af464c76d713c07ad', 'sdsdsadsa', 346370328, 'ht01646213112@gmail.com', 'cwef', 0),
(8, 'Tran Phu', 'fcea920f7412b5da7be0cf42b8c93759', 'Tran Phuoc Hao', 2147483647, 'ht0164faffa@gmail.com', 'cwef', 0),
(9, 'Haogdf', 'e10adc3949ba59abbe56e057f20f883e', 'Tran Phuoc Hao', 346370328, 'ht01646df@gmail.com', 'cwef', 1),
(10, 'HaoHao', '25d55ad283aa400af464c76d713c07ad', 'HH', 2147483647, 'ht016465ewr@gmail.com', 'cwef', 0),
(11, 'Hao11', 'e10adc3949ba59abbe56e057f20f883e', 'Tran Phuoc Haoe', 2147483647, 'ht016446@gmail.com', 'cwef', 0),
(12, 'Hao111', 'fcea920f7412b5da7be0cf42b8c93759', 'Tran Phuoc Haoe', 346370328, 'ht0164645@gmail.com', 'cwef', 0),
(13, 'Hao22', 'e10adc3949ba59abbe56e057f20f883e', 'Tran Phuoc Haop', 2147483647, 'ht01646743@gmail.com', 'cwef', 0),
(14, 'Hao1t', 'fcea920f7412b5da7be0cf42b8c93759', 'sdsdsadsa', 346370328, 'ht01646776@gmail.com', 'cwef', 0),
(15, 'Haoj', '4058cc160130ea51b65fcd1fab2c2eb9', 'g', 2147483647, 'ht0164hgigh6@gmail.com', 'cwef', 0),
(16, 'TheBest', 'e10adc3949ba59abbe56e057f20f883e', 'Tran Van An', 346370322, 'ht0164621@gmail.com', 'Can Tho', 0),
(17, 'TheBest0z', 'e10adc3949ba59abbe56e057f20f883e', 'Tran Van An', 346370324, 'ht0164643@gmail.com', 'Can Tho', 0),
(18, 'zolmkoz1u', 'e10adc3949ba59abbe56e057f20f883e', 'ewee', 346370328, 'ht01646d@gmail.com', 'Can Tho', 0),
(19, 'Haouui', 'fcea920f7412b5da7be0cf42b8c93759', 'ewe', 346370328, 'ht0164ftgf@gmail.com', 'cwef', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `CustomerID`, `Subject`, `Content`) VALUES
(2, 5, 't', 'y'),
(3, 5, 'Laptop', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `OrderDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `CustomerID`, `OrderDate`) VALUES
(50, 5, '2021-05-07'),
(51, 5, '2021-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(11) NOT NULL,
  `ProductID` varchar(30) NOT NULL,
  `Quality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `Quality`) VALUES
(50, 'Macminni', 1),
(51, 'Mac11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` varchar(30) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Img` varchar(150) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `BrandID` varchar(30) NOT NULL,
  `DateAdd` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Price`, `Img`, `Stock`, `Description`, `BrandID`, `DateAdd`) VALUES
('Mac1', 'Leot', 1000, 'best_1.jpg', 18, 'You can make a gradient diagonally by specifying both the horizontal and vertical starting positions.\r\n\r\nThe following example shows a linear gradient that starts at top left (and goes to bottom right). It starts red, transitioning to yellow:', 'Le', '2021-05-03'),
('Mac11', 'HK', 1000, 'best_5.jpg', -1, 'Ok', 'Le', '2021-05-04'),
('Macminni', 'MacM', 1000, 'best_5.jpg', 21, 'the main body of a book or other piece of writing, as distinct from other material such as notes, appendices, and illustrations.', 'Mac', '2021-05-04'),
('MacPro', 'KI', 1000, 'bets_8.jpg', 23, 'the main body of a book or other piece of writing, as distinct from other material such as notes, appendices, and illustrations.', 'Le', '2021-05-04'),
('TTB', 'TTB', 1020, 'best_3.jpg', 22, 'You can make a gradient diagonally by specifying both the horizontal and vertical starting positions.\r\n\r\nThe following example shows a linear gradient that starts at top left (and goes to bottom right). It starts red, transitioning to yellow:', 'Dell', '2021-05-03'),
('Vi1', 'Vibook', 1000, 'bets_8.jpg', 20, 'Good Laptop', 'Asus', '2021-05-06'),
('Vi2', 'VivobookE', 1000, 'best_4.jpg', 20, 'Best Laptop', 'Asus', '2021-05-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `FK_Feedback` (`CustomerID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FK_Order` (`CustomerID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`),
  ADD KEY `FK_OrderDetails_Product` (`ProductID`),
  ADD KEY `OrderID_2` (`OrderID`,`ProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FK_Product` (`BrandID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_Feedback` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_Order` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_OrderDetail_Order` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`),
  ADD CONSTRAINT `FK_OrderDetails_Product` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`BrandID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
