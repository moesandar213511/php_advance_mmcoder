-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Jul 23, 2021 at 04:31 AM
-- Server version: 10.1.37-MariaDB
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
-- Database: `php_basic_mmcoder`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `content`) VALUES
(1, 1, 'About Backend'),
(2, 1, 'About Backend'),
(3, 2, 'About frontend');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'backend'),
(2, 'frontend'),
(3, 'Fullstack');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `image`) VALUES
(14, 'php', '60e114ec3cd24_mm3.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `pcategory`
--

CREATE TABLE `pcategory` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pcategory`
--

INSERT INTO `pcategory` (`id`, `slug`, `name`) VALUES
(1, '60e9b60b88f12-Shirt', 'Shirt'),
(2, '60e9b60b90be4-Electronic', 'Electronic'),
(3, '60e9b60ba22d0-Drink', 'Drink'),
(4, '60ea47bb27a4a-Beauty-123', 'Beauty 123');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `total_quantity` varchar(200) NOT NULL,
  `sell_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `slug`, `name`, `image`, `description`, `total_quantity`, `sell_price`) VALUES
(1, 1, '60e9b60bd3b1a-some', 'a', 'image', 'desc', '2', 100),
(2, 1, '60e9b60bd3b2c-some', 'a', 'image', 'desc', '2', 100),
(3, 2, '60e9b60bd3b30-some', 'some B', 'image', 'desc', '1', 100),
(4, 2, '60e9b60bd3b33-some', 'some A', 'image', 'desc', '2', 100),
(5, 3, '60e9b60bd3b37-some', 'some c molay', 'image', 'desc', '28', 100),
(6, 1, '60ebc4b3722ee-mmmmm', 'mmmmm', '60ebc4b372300-pexels-tuáº¥n-kiá»‡t-jr-1386604.jpg', 'e wrwrwer', '7', 100),
(7, 3, '60ebd158815c3-sfsfsf', 'sfsfsf', '60ebd158815d7-6000.png', 'fsfsfsf', '226', 1111),
(8, 4, '60ebd1702e8bd-fsedfsfs', 'fsedfsfs 123', '60ebe6eb40546-pexels-tuáº¥n-kiá»‡t-jr-1386604.jpg', 'erwrw 123', '339', 3435123);

-- --------------------------------------------------------

--
-- Table structure for table `product_buy`
--

CREATE TABLE `product_buy` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buy_price` double NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `buy_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_buy`
--

INSERT INTO `product_buy` (`id`, `product_id`, `buy_price`, `total_quantity`, `buy_date`) VALUES
(1, 1, 12, 10, '2021-07-10'),
(2, 6, 90, 10, '2021-07-12'),
(3, 7, 33, 232, '2021-07-14'),
(4, 8, 4, 343, '2021-07-14'),
(6, 5, 90, 6, '2021-07-14'),
(10, 5, 200, 23, '2021-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `product_sale`
--

CREATE TABLE `product_sale` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sell_price` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_sale`
--

INSERT INTO `product_sale` (`id`, `product_id`, `sell_price`, `date`) VALUES
(1, 1, 100, '2021-07-12'),
(2, 1, 200, '2021-07-12'),
(3, 8, 3435123, '2021-07-13'),
(4, 7, 1111, '2021-07-13'),
(5, 7, 1111, '2021-07-13'),
(6, 8, 3435123, '2021-07-13'),
(7, 7, 1111, '2021-07-13'),
(8, 6, 100, '2021-07-13'),
(9, 5, 100, '2021-07-13'),
(10, 5, 100, '2021-07-13'),
(11, 5, 100, '2021-07-13'),
(12, 3, 100, '2021-07-13'),
(13, 7, 1111, '2021-07-13'),
(14, 7, 1111, '2021-07-14'),
(15, 7, 1111, '2021-07-14'),
(20, 6, 100, '2021-07-14'),
(21, 6, 100, '2021-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`) VALUES
(1, 'My Own Shop123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `slug`, `name`, `email`, `password`) VALUES
(1, 'slug', 'user one 11', 'userone@gmail.com', '$2y$10$ITp2jMIlfYxb5gAUIoGiXupyMrfVp5YKBdv6pRsr2snQS.5Gj5PN.'),
(2, 'slug', 'user two', 'usertwo123@gmail.com', '$2y$10$aZUPGKydKDSIf8NbMZpTZOeNt5FTBVFpKlsdqjSY6xmxb58CIKvXu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `location`) VALUES
(1, 'MOE SANDAR', 30, 'yangon'),
(2, 'MOE SANDAR', 30, 'yangon'),
(6, 'moe oe', 45, 'ser rwer'),
(7, 'moe moelay', 35, 'mandalay'),
(9, 'moe', 24, 'yangon'),
(10, 'soe', 30, 'mandalay'),
(11, 'soe', 30, 'mandalay'),
(12, 'soe', 30, 'mandalay'),
(13, 'soe', 30, 'mandalay'),
(14, 'soe', 30, 'mandalay'),
(15, 'soe', 30, 'mandalay'),
(16, 'soe', 30, 'mandalay'),
(17, 'soe', 30, 'mandalay'),
(18, 'moe phyo', 26, 'Pyi'),
(19, 'aung aung', 25, 'Pyin Oo Lwin'),
(20, 'mg mg', 25, 'Sagaing'),
(21, 'mg mg', 25, 'Sagaing'),
(22, 'mg mg', 25, 'Sagaing'),
(23, 'mg mg', 25, 'Sagaing'),
(24, 'mg mg', 25, 'Sagaing'),
(25, 'mg mg', 25, 'Sagaing');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `about` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `about`) VALUES
(1, 1, 'NRC - 213456'),
(2, 2, 'NRC - 233434');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcategory`
--
ALTER TABLE `pcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_buy`
--
ALTER TABLE `product_buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pcategory`
--
ALTER TABLE `pcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_buy`
--
ALTER TABLE `product_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_sale`
--
ALTER TABLE `product_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
