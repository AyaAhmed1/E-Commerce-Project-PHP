-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2018 at 11:49 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Samsung'),
(2, 'LG'),
(3, 'Apple'),
(4, 'Nokie');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `photo`, `created_at`, `category_id`) VALUES
(1, 'Samsung Galaxy Edge8+ Dual Sim', 13250, 'Samsung Galaxy S8 Plus features a large 6.2inch, boundaryless display. This Samsung Galaxy 4G mobile loads every app quicker with its 4GB RAM The Samsung Galaxy S8 Plus is a highly innovative, smart, and genius creation.', '/upload/1517944634.png', '2018-02-06 19:17:14', 1),
(2, 'Apple iPhone 6S Plus', 12400, '\r\n \r\n12,400.00 EGP \r\nAll prices include VAT  Details\r\nFREE Shipping\r\nColor\r\nGold 3 more\r\nStorage Capacity\r\n32 GB 2 more\r\nDescription:\r\nEnjoy incredible performance, fantastic features, and flawless multimedia with the Apple iPhone 6s Plus', '/upload/16.jpg', '2018-01-29 22:58:40', 3),
(3, 'Nokia 5 Dual Sim', 3250, 'Nokia 5 Dual SIM features 4G connectivity for enhanced network conditions. Nokia Android smartphone packs in a host of features such as the fingerprint sensor. Nokia 5 Dual sim', '/upload/18.jpg', '2018-01-29 23:25:05', 4),
(4, 'Samsung Galaxy J1 Ace\r\n', 3000, 'If you are seeking an ergonomically designed smartphone, the Samsung Galaxy J1 Ace makes an excellent choice. A sharp 4.3inch TFT capacitive touchscreen renders content that is easy to view and interact with. A Dual Core processor  this smartphone', '/upload/14.jpg', '2018-01-29 23:00:04', 1),
(5, 'Apple iPhone 6 with FaceTime', 18000, '32GB, 4G LTE, Space Gray,The Apple iPhone 6 is the new player on the block and outshines all the other smartphones with its state of the art technology, streamlined design and latest features that are to die for. The phone uses the advanced iOS 8, ', '/upload/15.jpg', '2018-01-29 22:50:25', 3),
(8, 'Nokia 3 Dual Sim ', 2990, 'Nokia 3 smartphone is loaded with a host of features. Nokia smartphone incorporates 8MP for both rear and front cameras. The Nokia 3 smartphone features a 5.0inch HD IPS LCD with a 2.5D sculpted Corning Gorilla Glass material to ensure protection', '/upload/20.jpg', '2018-01-29 23:25:05', 4),
(9, 'LG K10 Dual Sim', 91500, '16GB, 2GB RAM, 4G LTE, Black/BlueThe LG K10 Dual SIM smartphone is ideal for those who are looking to upgrade to an easy to use mobile that is packed with multimedia functions. The dual SIM phone is light in weight and easily fits into a pocket or bag. ', '/upload/21.jpg', '2018-01-29 23:25:05', 2),
(10, 'Samsung Galaxy S7 Edge Dual Sim', 91500, '32GB, 4GB RAM, 4G LTE, Gold The makers of Samsung Galaxy S7 Edge Dual SIM smartphone have pulled out all the stops in designing and creating it. It has a first ever curved edge 5.5inch screen ', '/upload/13.jpg', '2018-01-29 23:25:05', 1),
(11, 'Apple iPhone 5s', 13000, 'The Apple iPhone 6S features vast improvements over its predecessor, the iPhone 6. This silver, all metal phone comes loaded with iOS 9,32GB, 4G LTE, Silverhandy built in apps, and much more', '/upload/16.jpg', '2018-01-29 23:40:29', 3),
(12, 'Samsung Galaxy S8+ Dual Sim ', 14000, '64GB, 4G LTE, Maple Gold,Samsung Galaxy S8 Plus features 12MP dual pixel sensor for shake free and lifelike shots. This Samsung Galaxy 4G mobile is available in a deluxe gold finish. The Samsung Galaxy S8 Plus is different in all sense of the word', '/upload/12.jpg', '2018-02-06 19:24:55', 1),
(13, 'LG Stylus 2 K520DY Dual Sim', 7260, 'The LG Stylus 2 K520DY Dual SIM smartphone is an impressive device that is powered by the Android Marshmallow operating system v6.0, which has a beautiful user interface along with improved memory management.', '/upload/22.jpg', '2018-01-29 23:40:43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `phone`, `photo`) VALUES
(1, 'Aya Ahmed', 'ayaahmed9424@gmail.com', 'AyaAhmed', '1234', '010101010', '/upload/1517948764.png'),
(3, '', 'mai@gmail.com', 'Mai_Ahmed', '1234', '', '/upload/1517952417.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
