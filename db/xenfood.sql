-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 08:20 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xenfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_by` varchar(191) NOT NULL DEFAULT 'sazzad',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_by`, `created_at`) VALUES
(1, 'Burger', 'sazzad', '2019-07-04 19:14:44'),
(2, 'Pizza', 'sazzad', '2019-07-04 19:14:48'),
(3, 'Soup', 'sazzad', '2019-07-04 19:14:57'),
(4, 'Drinks', 'sazzad', '2019-07-04 19:16:56'),
(5, 'Set Menu A', 'sazzad', '2019-07-04 19:17:20'),
(6, 'Pasta', 'sazzad', '2019-07-04 19:18:20'),
(8, 'Salads', 'sazzad', '2019-07-22 17:58:13'),
(9, 'Wraps', 'sazzad', '2019-07-22 17:59:07'),
(10, 'Fries', 'sazzad', '2019-07-22 17:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_title` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` varchar(191) NOT NULL,
  `qty` int(10) NOT NULL,
  `table_no` int(3) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(191) NOT NULL DEFAULT 'sazzad'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pro_id`, `pro_title`, `user_id`, `total`, `qty`, `table_no`, `status`, `created_at`, `created_by`) VALUES
(1, 8, 'Item Six', 2, '100tk', 1, 5, 0, '2019-07-22 18:05:13', 'sazzad');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(191) NOT NULL DEFAULT 'sazzad'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `details` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `thumb` varchar(191) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `featured` int(11) NOT NULL DEFAULT '0',
  `created_by` varchar(191) NOT NULL DEFAULT 'sazzad',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `details`, `price`, `thumb`, `category`, `status`, `featured`, `created_by`, `created_at`) VALUES
(1, 'MIni Burger', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '60', '5d24c94b00828.jpg', 1, 0, 0, 'sazzad', '2019-07-04 19:41:12'),
(2, 'Pasta ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '350', '5d35f7809fca1.jpg', 3, 0, 0, 'sazzad', '2019-07-05 06:01:49'),
(4, 'item one', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '156', '5d35f54ca0907.jpg', 1, 0, 0, 'sazzad', '2019-07-22 17:36:07'),
(5, 'item Two', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '500', '5d35f53c5bcb3.jpg', 1, 0, 0, 'sazzad', '2019-07-22 17:36:28'),
(6, 'Item Three', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '280', '5d35f52f95f47.jpg', 4, 0, 0, 'sazzad', '2019-07-22 17:36:41'),
(7, 'Item Five', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '325', '5d35f51f69a07.jpg', 6, 0, 0, 'sazzad', '2019-07-22 17:37:02'),
(8, 'Item Six', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '100', '5d35f50d6e6ed.jpg', 2, 0, 0, 'sazzad', '2019-07-22 17:37:29'),
(9, 'item Seven', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '50', '5d35f5018198a.jpg', 3, 0, 0, 'sazzad', '2019-07-22 17:37:44'),
(10, 'item Eight', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '340', '5d35f4e3b84f2.jpg', 3, 0, 0, 'sazzad', '2019-07-22 17:38:05'),
(11, 'item None', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '180', '5d35f4a2a67db.jpg', 5, 0, 0, 'sazzad', '2019-07-22 17:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `points` int(11) DEFAULT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(191) NOT NULL DEFAULT 'sazzad'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `status`, `points`, `type`, `created_at`, `created_by`) VALUES
(1, 'Super Admin', 'superadmin', '01675716053', 'superadmin', 1, NULL, 'admin', '2019-07-22 16:56:28', 'sazzad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
