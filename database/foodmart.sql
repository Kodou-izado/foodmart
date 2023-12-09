-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 02:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `year_section` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role_id` varchar(100) NOT NULL,
  `account_status` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `fullname`, `gender`, `username`, `email`, `year_section`, `password`, `role_id`, `account_status`, `date_created`, `date_updated`) VALUES
(1, '96abef16-0cd4-11ee-aca4-088fc30176f9', 'FoodMart', 'Male', 'foodmartadmin', 'foodmart@gmail.com', '', '$2y$10$BtQfQZdG3h3ob8lHICeJLeQvhhMcFpFUKsvS/IXdxXLocIbT7gNOe', '699dd7be-0c4b-11ee-a71c-088fc30176f9', 'Verified', '2023-06-17 14:02:49', '2023-06-21 18:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `menu_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_id`, `category_name`, `category_description`, `date_created`) VALUES
(1, '5b220ada-0d0b-11ee-b4d4-088fc30176f9', 'Dish', 'Flavor fiesta on your plate.', '2023-06-17 14:31:30'),
(2, '82bbb277-0d0b-11ee-b4d4-088fc30176f9', 'Beverage', 'Sip satisfaction, liquid bliss unveiled.', '2023-06-17 14:34:58'),
(3, '82bbde92-0d0b-11ee-b4d4-088fc30176f9', 'Junk Food', 'Crunchy cravings, guilty pleasure indulgence.', '2023-06-17 14:34:58'),
(4, 'a4caefa2-0d0b-11ee-b4d4-088fc30176f9', 'Biscuit', 'Buttery bites, heavenly biscuit bliss.', '2023-06-17 14:36:01'),
(5, 'a4cafdef-0d0b-11ee-b4d4-088fc30176f9', 'Bread', 'Golden crust, soft dough embrace.', '2023-06-17 14:36:01'),
(6, 'b11c3b64-0d0b-11ee-b4d4-088fc30176f9', 'School Supply', 'Tools for success, knowledge\'s companions.', '2023-06-17 14:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(100) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `menu_tag` varchar(30) NOT NULL,
  `menu_stock` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_id` varchar(200) NOT NULL,
  `sender_id` varchar(200) NOT NULL,
  `receiver_id` varchar(200) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `message_status` varchar(50) NOT NULL DEFAULT 'Unread',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `origin_id` varchar(200) NOT NULL,
  `origin_type` varchar(50) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `notif_status` varchar(30) NOT NULL DEFAULT 'Unread',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `order_no` varchar(30) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_item_id` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `menu_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_id` varchar(100) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `role_name`, `date_created`) VALUES
(1, '699dd7be-0c4b-11ee-a71c-088fc30176f9', 'Admin', '2023-06-16 15:40:37'),
(2, '73ca4984-0c4b-11ee-a71c-088fc30176f9', 'Customer', '2023-06-16 15:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `gcash_acc_name` varchar(100) NOT NULL,
  `gcash_acc_no` varchar(11) NOT NULL,
  `is_delivery_available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `gcash_acc_name`, `gcash_acc_no`, `is_delivery_available`) VALUES
(1, 'Foodmart', '09322550101', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
