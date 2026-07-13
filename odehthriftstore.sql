-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2026 at 07:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odehthriftstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `allmachendise`
--

CREATE TABLE `allmachendise` (
  `ID` int(200) NOT NULL,
  `SIZE` varchar(11) NOT NULL,
  `TYPE` varchar(200) NOT NULL,
  `BRAND` varchar(200) NOT NULL,
  `MATERIAL` varchar(200) NOT NULL,
  `IMAGE_LINK` varchar(200) NOT NULL,
  `TIME_STAMP` date NOT NULL,
  `ITEM_NO` varchar(36) NOT NULL,
  `PRICE` varchar(200) NOT NULL,
  `DESCRIPTION` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allmachendise`
--

INSERT INTO `allmachendise` (`ID`, `SIZE`, `TYPE`, `BRAND`, `MATERIAL`, `IMAGE_LINK`, `TIME_STAMP`, `ITEM_NO`, `PRICE`, `DESCRIPTION`) VALUES
(1, '20 Medium ', 'Short Jeans', 'Levis Jeans Shorts', 'Rubber Polyesterine', 'images/c1.jpg', '2026-01-05', '09c2ca29-3250-11f1-8ea8-74e5f9ae9420', 'N 2000', 'SHOT NICKERS'),
(2, '30 Large', 'Short Jeans', 'Ecko', 'Pure Cotton', 'images/c2.jpg', '2026-01-05', '19be8756-3250-11f1-8ea8-74e5f9ae9420', 'N 3000', 'SHORT NICKERS'),
(3, '25 Medium', 'Jean Short', 'Polo', 'Polyester', 'images/c3.jpg', '2026-01-05', '36261004-3250-11f1-8ea8-74e5f9ae9420', 'N 5000', 'SHORT NICKERS'),
(4, '40 Medium', 'Jean Short', 'Philllps_Wears', 'Polyester', 'images/c4.jpg', '2026-02-24', '51ca7051-3250-11f1-8ea8-74e5f9ae9420', 'N 3500', 'SHORT NICKERS'),
(5, '40 Medium', 'Hoodies', 'Makoy', 'Polyester', 'images/c5.jpg', '2026-02-24', '64033ceb-3250-11f1-8ea8-74e5f9ae9420', 'N 4500', 'SHORT NICKERS'),
(6, '40 Medium', 'Jean Short', 'Ankers', 'Polyester', 'images/c6.jpg', '2026-01-06', '739c1b85-3250-11f1-8ea8-74e5f9ae9420', 'N 4000', 'SHORT NICKERS'),
(7, '40 Medium', 'Jean Short', 'Ankers', 'Polyester', 'images/c7.jpg', '2026-01-06', '8384793c-3250-11f1-8ea8-74e5f9ae9420', 'N 4000', 'SHORT NICKERS'),
(8, '30 Large', 'Short Jeans', 'Ecko', 'Pure Cotton', 'images/c8.jpg', '2026-01-06', '9e7d33c0-3250-11f1-8ea8-74e5f9ae9420', 'N 3000', 'SHORT NICKERS'),
(9, '23', 'Red Female Cloth', 'Polo', 'cotton', 'images/c9.jpg', '2026-03-12', 'ee268c83-3250-11f1-8ea8-74e5f9ae9420', 'N6000', 'potable cloth');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_items`
--

CREATE TABLE `carousel_items` (
  `id` int(11) NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `caption2` varchar(255) NOT NULL,
  `indicator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel_items`
--

INSERT INTO `carousel_items` (`id`, `image_link`, `caption`, `caption2`, `indicator`) VALUES
(1, '\'images/slider_img1.jpg\'', 'Our Machendise Are From the Best Sources', 'You trust us as your main plug for quality', 1),
(2, '\'images/slider_img2.jpg\'', 'We have Customers from all parts of Nigeria giving us great Reviews', 'we are second to non in this industry', 2),
(3, '\'images/slider_img3.jpg\'', 'You are free to check out our array of products we offer', 'Come one come all our store fits every budget we have your back', 3),
(4, '\'images/slider_img4.jpg\'', 'We Know that your first impression is very important', 'That is why we work night and day to make sure we give you what you deserve', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `SN` int(200) NOT NULL,
  `Item_Image` varchar(255) NOT NULL,
  `Item_Price` varchar(200) NOT NULL,
  `Quantity` varchar(200) NOT NULL,
  `Status` varchar(200) NOT NULL DEFAULT 'pending',
  `ITEM_NO` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_owner`
--

CREATE TABLE `store_owner` (
  `id` enum('Owner') NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Second_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `USER_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_owner`
--

INSERT INTO `store_owner` (`id`, `First_Name`, `Second_Name`, `Email`, `Phone_Number`, `PASSWORD`, `USER_ID`) VALUES
('Owner', 'Philip', 'Odeh', 'philip12odeh@gmail', '08162620931', '$2y$10$/hSWhxQ6rmvTYKIt.eTO0.sITsSGU4SuPjdiklOnWwyq7gPdosJlu', 'Odeh&#039;sthrift_Store');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allmachendise`
--
ALTER TABLE `allmachendise`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `carousel_items`
--
ALTER TABLE `carousel_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `store_owner`
--
ALTER TABLE `store_owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allmachendise`
--
ALTER TABLE `allmachendise`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carousel_items`
--
ALTER TABLE `carousel_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `SN` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
