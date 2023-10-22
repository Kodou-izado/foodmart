-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 01:52 AM
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
(1, '96abef16-0cd4-11ee-aca4-088fc30176f9', 'FoodMart', 'Male', 'foodmartadmin', 'foodmart@gmail.com', '', '$2y$10$BtQfQZdG3h3ob8lHICeJLeQvhhMcFpFUKsvS/IXdxXLocIbT7gNOe', '699dd7be-0c4b-11ee-a71c-088fc30176f9', 'Verified', '2023-06-17 14:02:49', '2023-06-21 18:44:19'),
(13, '42132d44-0e46-11ee-8923-088fc30176f9', 'Arthur Nery', 'Male', 'arthurnery', 'arthurnery@gmail.com', 'Grade 8 - Mapagmahal', '$2y$10$JWTvXaIXyQICSPcPGkZHwu4wCGhzppA5ZMcdErQgR/XnLO090iJ76', '73ca4984-0c4b-11ee-a71c-088fc30176f9', 'Verified', '2023-06-19 10:09:01', '2023-06-21 18:44:53'),
(14, '89dce3fe-0e46-11ee-8923-088fc30176f9', 'Zach Tabuldo', 'Male', 'zachtabuldo', 'zachtabuldo@gmail.com', 'Grade 7 - Masipag', '$2y$10$UWbGBjVMIxJ/NjPQH1a7BOYh4ssFRhVw2X1bznxUYa1aJtSq.1Y1y', '73ca4984-0c4b-11ee-a71c-088fc30176f9', 'Verified', '2023-06-19 10:11:01', '2023-06-19 10:11:01'),
(17, 'd02210b8-101c-11ee-a28c-088fc30176f9', 'Raymond Reblando', 'Male', 'sensei', 'raymondreblando@gmail.com', 'Grade 7 - Masunurin', '$2y$10$on.4wlJ6OuoWmX1lVjkqc.BO1R9L02RCtkbwyhCUweDB3vh9Gvx8u', '73ca4984-0c4b-11ee-a71c-088fc30176f9', 'Verified', '2023-06-21 18:17:16', '2023-06-21 18:17:16'),
(18, '6875ecd4-3d96-11ee-9e6a-088fc30176f9', 'Goergie Mansanido', 'Female', 'Georgie', 'georgie@gmail.com', 'Grade 8 - Mapagmahal', '$2y$10$a1WbQMb1K4i1.3woJGZXju/6/YNbmoCrOOKen8JFogCdfExGVpenC', '73ca4984-0c4b-11ee-a71c-088fc30176f9', 'Verified', '2023-08-18 15:11:10', '2023-08-18 15:11:10');

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

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `menu_name`, `menu_price`, `category_id`, `menu_tag`, `menu_stock`, `date_created`, `date_updated`) VALUES
(3, '6e326382-0d6a-11ee-9327-088fc30176f9', 'Burger Overload', 50, 'a4cafdef-0d0b-11ee-b4d4-088fc30176f9', 'New', 30, '2023-06-18 07:55:26', '2023-06-21 09:15:13'),
(5, '97775c03-0e39-11ee-8923-088fc30176f9', '6pcs Chicken Bucket', 220, '5b220ada-0d0b-11ee-b4d4-088fc30176f9', 'New', 10, '2023-06-19 08:38:21', '2023-06-21 09:09:10'),
(10, 'd93b63b1-0e44-11ee-8923-088fc30176f9', 'Sprite Canned', 25, '82bbb277-0d0b-11ee-b4d4-088fc30176f9', 'New', 50, '2023-06-19 09:58:56', '2023-06-21 09:09:44'),
(11, 'e4eadb66-0e44-11ee-8923-088fc30176f9', 'Oishi Oheya', 8, '82bbde92-0d0b-11ee-b4d4-088fc30176f9', 'New', 100, '2023-06-19 09:59:15', '2023-06-21 09:05:59'),
(13, '7a0a5478-0fcc-11ee-a28c-088fc30176f9', 'Doritos Chips', 20, '82bbde92-0d0b-11ee-b4d4-088fc30176f9', 'New', 20, '2023-06-21 08:42:19', '2023-06-21 09:05:04'),
(15, '06284d76-0fcd-11ee-a28c-088fc30176f9', 'Roasted Fried Chicken', 40, '5b220ada-0d0b-11ee-b4d4-088fc30176f9', 'New', 30, '2023-06-21 08:46:14', '2023-06-21 09:05:26'),
(16, '1fc424a7-0fcf-11ee-a28c-088fc30176f9', 'Coca Cola Classic', 25, '82bbb277-0d0b-11ee-b4d4-088fc30176f9', 'New', 50, '2023-06-21 09:01:16', '2023-06-21 09:05:43'),
(17, '87c59ef9-0fd1-11ee-a28c-088fc30176f9', 'Suzano Report Premium', 180, 'b11c3b64-0d0b-11ee-b4d4-088fc30176f9', 'New', 45, '2023-06-21 09:18:29', '2023-06-21 11:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
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
(1, 'Foodmart', '09322550101', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
