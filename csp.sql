-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 11:33 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `username`, `password`, `creation_date`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-02-20 23:21:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Microcars', 'Microcars straddle the boundary between car and motorbike, and are often covered by separate regulations to normal cars, resulting in relaxed requirements for registration and licensing. Engine size is often 700 cc (43 cu in) or less, and microcars have three or four wheels.', '2022-02-20 17:50:41', NULL),
(2, 'Compact', 'The largest category of small cars is called C-segment or small family car in Europe, and compact car in the United States.\r\n\r\nThe size of a compact car is defined by the United States Environmental Protection Agency (EPA), as having a combined interior and cargo volume of 100–109 cu ft (2.8–3.1 m3).', '2022-02-20 17:51:26', NULL),
(3, 'Mid-size', 'In Europe, the second-largest category for passenger cars is E-segment / executive car, which are usually luxury cars.\r\n\r\nIn other countries, the equivalent terms are full-size car or large car, which are also used for relatively affordable large cars that are not considered luxury cars.', '2022-02-20 17:52:14', NULL),
(4, ' Luxury saloon', 'The largest size of a luxury car is known as a luxury saloon in the United Kingdom and a full-size luxury car in the United States. These cars are classified as F-segment cars in the European car classification.', '2022-02-20 17:52:54', NULL),
(5, 'Sports car', 'Sports cars are designed to emphasize handling, performance, or the thrill of driving. Sports cars originated in Europe in the early 1900s, with one of the first recorded usages of the term \"sports car\" being in The Times newspaper in the United Kingdom in 1919', '2022-02-20 17:53:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(50) NOT NULL,
  `user_id_sender` int(50) NOT NULL,
  `user_id_receiver` int(50) NOT NULL,
  `user_msg` longtext NOT NULL,
  `msg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sale_status` varchar(50) DEFAULT NULL,
  `updationDate` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productCompany`, `productPrice`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `category`, `subCategory`, `userId`, `productAvailability`, `postingDate`, `sale_status`, `updationDate`, `status`) VALUES
(1, 'Door Lock Assembly â€ Bmw 4 Series 2016', 'BMW 4 Series', 25, 'This listing is for the pictured Door Lock Assembly removed from a 2016 Bmw 4 Series . Please make sure the part is correct for your vehicle before buying.\r\n\r\nThe unit is in full working order and comes with a 90 day guarantee', '1f75857d-e444-46b2-8317-e7b65e078a0f.jpeg', '5d3ae8f0-a233-4b5b-af07-28124d54aa2c.jpeg', 'Door Lock Assembly.jpeg', 2, 13, 5, 'In Stock', '2022-02-22 09:38:35', NULL, NULL, 'active'),
(2, 'Throttle Body', 'Toyota', 50, 'Year	2013\r\nMake	Toyota\r\nModel	4 Series\r\nTrim Level	435i M Sport\r\nApprox. Mileage	31608\r\nFuel type	Petrol\r\nEngine Capacity	2979 cc\r\nTransmission	Automatic', '922068.jpg', '922069.jpg', '922070.jpg', 3, 3, 5, 'In Stock', '2022-02-22 10:21:26', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Toyota', '2022-02-20 17:55:56', NULL),
(2, 2, 'Toyota', '2022-02-20 17:56:04', NULL),
(3, 3, 'Toyota', '2022-02-20 17:56:25', '20-02-2022 05:56:49 PM'),
(4, 4, 'Toyota', '2022-02-20 17:56:59', NULL),
(5, 5, 'Toyota', '2022-02-20 17:57:06', NULL),
(6, 1, 'Honda', '2022-02-20 17:57:32', NULL),
(7, 2, 'Honda', '2022-02-20 17:57:40', NULL),
(8, 3, 'Honda', '2022-02-20 17:57:46', NULL),
(9, 4, 'Honda', '2022-02-20 17:57:53', NULL),
(10, 5, 'Honda', '2022-02-20 17:57:59', NULL),
(11, 2, 'Tesla', '2022-02-20 18:01:32', NULL),
(12, 1, 'Volkswagen', '2022-02-20 18:01:50', NULL),
(13, 2, 'BMW', '2022-02-20 18:02:08', NULL),
(14, 2, 'Ferrari', '2022-02-20 18:02:23', NULL),
(15, 3, 'Ford', '2022-02-20 18:02:32', NULL),
(16, 2, 'Nissan', '2022-02-20 18:02:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(50) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `user_name`, `user_password`, `user_email`, `user_phone`, `user_type`, `reg_date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '0301234564', 'admin', '2022-02-20 23:51:10'),
(2, 'Test', 'f925916e2754e5e03f75dd58a5733251', 'test@gmail.com', '01234567', 'user', '2022-02-20 23:51:10'),
(3, 'Test1', '5a105e8b9d40e1329780d62ea2265d8a', 'test1@gmail.com', '12345678', 'user', '2022-02-20 23:51:10'),
(5, 'Simon ', 'b30bd351371c686298d32281b337e8e9', 'simon@gmail.com', '0123451234', 'user', '2022-02-20 20:51:24'),
(6, 'Micheal', 'b78d7cd4555821042a70d9ec034b0dea', 'micheal@gmail.com', '0312345678', 'user', '2022-02-20 21:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(50) NOT NULL,
  `userId` int(50) DEFAULT NULL,
  `productId` int(50) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_id_sender` (`user_id_sender`),
  ADD KEY `user_id_receiver` (`user_id_receiver`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`user_id_receiver`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`user_id_sender`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
