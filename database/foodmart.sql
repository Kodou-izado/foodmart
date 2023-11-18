-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 04:16 AM
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
(18, '6875ecd4-3d96-11ee-9e6a-088fc30176f9', 'Goergie Mansanido', 'Female', 'Georgie', 'georgie@gmail.com', 'Grade 8 - Mapagmahal', '$2y$10$a1WbQMb1K4i1.3woJGZXju/6/YNbmoCrOOKen8JFogCdfExGVpenC', '73ca4984-0c4b-11ee-a71c-088fc30176f9', 'Verified', '2023-08-18 15:11:10', '2023-08-18 15:11:10'),
(19, 'f8250461-841e-11ee-be43-43c40ffcc5e3', 'Reggie Reblando', 'Male', 'Sleepyhead', 'raymondreblando00@gmail.com', 'Grade 8 - Mapagmahal', '$2y$10$tTM9veK88C3Ho/j7pp5bK.4esjVVYjEBvPhPO88F8wi6l/e3..DOu', '73ca4984-0c4b-11ee-a71c-088fc30176f9', 'Unverified', '2023-11-16 09:25:04', '2023-11-16 09:25:04'),
(20, 'cc1e6b69-841f-11ee-be43-43c40ffcc5e3', 'Alesha Monastero', 'Female', 'Alesha', 'alesha@gmail.com', '', '$2y$10$tsVyRYlf8ZrLNGz/kt9bzOca5xdRSrDj61fc8q.9FpUhc53ynR.bK', '73ca4984-0c4b-11ee-a71c-088fc30176f9', 'Unverified', '2023-11-16 09:30:59', '2023-11-16 09:30:59');

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
(5, '97775c03-0e39-11ee-8923-088fc30176f9', '6pcs Chicken Bucket', 220, '5b220ada-0d0b-11ee-b4d4-088fc30176f9', 'New', 0, '2023-06-19 08:38:21', '2023-06-21 09:09:10'),
(10, 'd93b63b1-0e44-11ee-8923-088fc30176f9', 'Sprite Canned', 25, '82bbb277-0d0b-11ee-b4d4-088fc30176f9', 'New', 50, '2023-06-19 09:58:56', '2023-06-21 09:09:44'),
(11, 'e4eadb66-0e44-11ee-8923-088fc30176f9', 'Oishi Oheya', 8, '82bbde92-0d0b-11ee-b4d4-088fc30176f9', 'New', 100, '2023-06-19 09:59:15', '2023-06-21 09:05:59'),
(13, '7a0a5478-0fcc-11ee-a28c-088fc30176f9', 'Doritos Chips', 20, '82bbde92-0d0b-11ee-b4d4-088fc30176f9', 'New', 11, '2023-06-21 08:42:19', '2023-06-21 09:05:04'),
(15, '06284d76-0fcd-11ee-a28c-088fc30176f9', 'Roasted Fried Chicken', 40, '5b220ada-0d0b-11ee-b4d4-088fc30176f9', 'New', 30, '2023-06-21 08:46:14', '2023-06-21 09:05:26'),
(16, '1fc424a7-0fcf-11ee-a28c-088fc30176f9', 'Coca Cola Classic', 25, '82bbb277-0d0b-11ee-b4d4-088fc30176f9', 'New', 5, '2023-06-21 09:01:16', '2023-06-21 09:05:43'),
(17, '87c59ef9-0fd1-11ee-a28c-088fc30176f9', 'Suzano Report Premium', 180, 'b11c3b64-0d0b-11ee-b4d4-088fc30176f9', 'New', 45, '2023-06-21 09:18:29', '2023-06-21 11:58:57');

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_id`, `sender_id`, `receiver_id`, `message`, `message_status`, `date_created`) VALUES
(1, 'd268ddcf-85bb-11ee-ba1c-a5d9520f526f', '42132d44-0e46-11ee-8923-088fc30176f9', '96abef16-0cd4-11ee-aca4-088fc30176f9', 'Hello, Goodmorning po', 'Read', '2023-11-18 10:40:23'),
(2, 'e4e40cb0-85bd-11ee-ba1c-a5d9520f526f', '42132d44-0e46-11ee-8923-088fc30176f9', '96abef16-0cd4-11ee-aca4-088fc30176f9', 'Ask ko lang po kung naideliver na po yung order ko na pinag order kopo kanina, if hindi pa po padeliver na lang po dito sa classroom. Thankyou po', 'Read', '2023-11-18 10:55:13'),
(3, '43881256-85bf-11ee-ba1c-a5d9520f526f', '96abef16-0cd4-11ee-aca4-088fc30176f9', '42132d44-0e46-11ee-8923-088fc30176f9', 'Hello, Goodmorning po.\r\nAs of now, piniprepare na po yung order nyo, pawait na lang po. Thankyou', 'Read', '2023-11-18 11:05:01'),
(4, '714505b9-85bf-11ee-ba1c-a5d9520f526f', '89dce3fe-0e46-11ee-8923-088fc30176f9', '96abef16-0cd4-11ee-aca4-088fc30176f9', 'Hello, Goodmorning. Libre po ba ang pagpadeliver sa inyo? Thankyou', 'Read', '2023-11-18 11:06:18'),
(5, '5e43a836-85c0-11ee-ba1c-a5d9520f526f', '96abef16-0cd4-11ee-aca4-088fc30176f9', '89dce3fe-0e46-11ee-8923-088fc30176f9', 'Hello, Goodmorning. Free lang po ang delivery', 'Read', '2023-11-18 11:12:55');

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

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `origin_id`, `origin_type`, `user_id`, `notif_status`, `date_created`) VALUES
(5, '97775c03-0e39-11ee-8923-088fc30176f9', 'Stock', '', 'Read', '2023-11-15 10:44:49'),
(6, '42132d44-0e46-11ee-8923-088fc30176f9', 'New Order', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-15 10:44:49'),
(7, '42132d44-0e46-11ee-8923-088fc30176f9', 'New Order', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-15 18:49:28'),
(8, '42132d44-0e46-11ee-8923-088fc30176f9', 'New Order', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-15 18:54:02'),
(9, '42132d44-0e46-11ee-8923-088fc30176f9', 'New Order', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-15 18:54:15'),
(10, '53a73220-83a5-11ee-aeeb-61df3c8d0fa1', 'Admin Cancelled', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-16 09:01:13'),
(11, '42132d44-0e46-11ee-8923-088fc30176f9', 'Customer Cancel', '', 'Read', '2023-11-16 09:03:06'),
(12, '42132d44-0e46-11ee-8923-088fc30176f9', 'New Order', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-16 09:07:27'),
(13, '42132d44-0e46-11ee-8923-088fc30176f9', 'Customer Cancel', '', 'Read', '2023-11-16 09:13:04'),
(14, '42132d44-0e46-11ee-8923-088fc30176f9', 'New Order', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-16 09:13:46'),
(15, '42132d44-0e46-11ee-8923-088fc30176f9', 'Customer Cancel', '', 'Read', '2023-11-16 09:15:25'),
(16, 'f8250461-841e-11ee-be43-43c40ffcc5e3', 'New User', '', 'Read', '2023-11-16 09:25:04'),
(17, 'cc1e6b69-841f-11ee-be43-43c40ffcc5e3', 'New User', '', 'Read', '2023-11-16 09:31:00'),
(18, 'd268ddcf-85bb-11ee-ba1c-a5d9520f526f', 'New Message', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-18 10:40:23'),
(19, 'e4e40cb0-85bd-11ee-ba1c-a5d9520f526f', 'New Message', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-18 10:55:13'),
(20, '43881256-85bf-11ee-ba1c-a5d9520f526f', 'Message Reply', '42132d44-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-18 11:05:01'),
(21, '714505b9-85bf-11ee-ba1c-a5d9520f526f', 'New Message', '89dce3fe-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-18 11:06:18'),
(22, '5e43a836-85c0-11ee-ba1c-a5d9520f526f', 'Message Reply', '89dce3fe-0e46-11ee-8923-088fc30176f9', 'Read', '2023-11-18 11:12:55');

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `order_no`, `user_id`, `order_type`, `payment_method`, `delivery_address`, `status`, `date_added`) VALUES
(1, '4c16558b-83a5-11ee-aeeb-61df3c8d0fa1', '11001', '42132d44-0e46-11ee-8923-088fc30176f9', 'Pick Up', 'Over the Counter', '', 'Cancelled', '2023-11-15 18:54:02'),
(2, '53a73220-83a5-11ee-aeeb-61df3c8d0fa1', '11002', '42132d44-0e46-11ee-8923-088fc30176f9', 'Pick Up', 'Over the Counter', '', 'Cancelled', '2023-11-15 18:54:14'),
(3, '823ce1b4-841c-11ee-be43-43c40ffcc5e3', '11003', '42132d44-0e46-11ee-8923-088fc30176f9', 'Pick Up', 'Over the Counter', '', 'Cancelled', '2023-11-16 09:07:27'),
(4, '6413eaf9-841d-11ee-be43-43c40ffcc5e3', '11004', '42132d44-0e46-11ee-8923-088fc30176f9', 'Pick Up', 'Over the Counter', '', 'Cancelled', '2023-11-16 09:13:46');

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

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_item_id`, `order_id`, `menu_id`, `quantity`, `date_added`) VALUES
(1, '4c17f402-83a5-11ee-aeeb-61df3c8d0fa1', '4c16558b-83a5-11ee-aeeb-61df3c8d0fa1', '7a0a5478-0fcc-11ee-a28c-088fc30176f9', 4, '2023-11-15 18:54:02'),
(2, '53a94b76-83a5-11ee-aeeb-61df3c8d0fa1', '53a73220-83a5-11ee-aeeb-61df3c8d0fa1', '1fc424a7-0fcf-11ee-a28c-088fc30176f9', 10, '2023-11-15 18:54:15'),
(3, '823d6600-841c-11ee-be43-43c40ffcc5e3', '823ce1b4-841c-11ee-be43-43c40ffcc5e3', '1fc424a7-0fcf-11ee-a28c-088fc30176f9', 5, '2023-11-16 09:07:27'),
(4, '6415e6a9-841d-11ee-be43-43c40ffcc5e3', '6413eaf9-841d-11ee-be43-43c40ffcc5e3', '06284d76-0fcd-11ee-a28c-088fc30176f9', 5, '2023-11-16 09:13:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
