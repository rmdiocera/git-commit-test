-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 08:40 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(14, 23, 3, '2018-10-12 05:35:35', '2018-10-12 05:35:35'),
(15, 23, 4, '2018-10-12 05:37:14', '2018-10-12 05:37:14'),
(17, 23, 1, '2018-10-12 06:33:29', '2018-10-12 06:33:29'),
(18, 23, 2, '2018-10-12 06:33:32', '2018-10-12 06:33:32'),
(19, 23, 3, '2018-10-12 06:33:35', '2018-10-12 06:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shoes', '2018-10-01 02:33:53', '2018-10-03 01:26:26'),
(2, 'Accessories', '2018-10-01 02:33:53', '2018-10-03 01:26:35'),
(3, 'Apparels', '2018-10-01 02:34:29', '2018-10-03 01:26:44'),
(4, 'Services', '2018-10-01 02:34:29', '2018-10-03 01:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `password`, `image_name`, `created_at`, `updated_at`) VALUES
(17, 'regi', 'regi@gmail.com', '123', '', '2018-10-11 07:16:27', '2018-10-11 07:16:27'),
(23, 'Reginald M. Diocera', 'rmdiocera@gmail.com', '123', 'rmdpic.jpg', '2018-10-11 08:42:20', '2018-10-11 14:01:55'),
(24, 'Sample Name', 'sample@gmail.com', '123', '', '2018-10-11 08:43:10', '2018-10-11 08:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `quantity`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nike Kyrie 4 \"80s\"', 5900.00, 22, 'nike-kyrie-4-80s.jpg', '2018-10-12 02:47:53', '2018-10-12 06:33:29'),
(2, 1, 'adidas Harden Vol. 2 \"Pioneer\"', 6550.00, 22, 'adi-harden-vol2-mm.jpg', '2018-10-12 02:48:27', '2018-10-12 06:33:32'),
(3, 1, 'Nike KDX \"Oreo\"', 7200.00, 22, 'nike-kd-10-oreo.jpg', '2018-10-12 02:49:33', '2018-10-12 06:33:35'),
(4, 1, 'Nike Lebron XV \"Graffiti\"', 7550.00, 24, 'nike-lebron-15-graffiti.jpg', '2018-10-12 02:50:04', '2018-10-12 05:37:14'),
(5, 1, 'adidas Dame IV \"Black Panther\"', 6299.00, 25, 'adi-dame-4-black-panther.jpg', '2018-10-12 02:50:38', '2018-10-12 04:54:57'),
(6, 2, 'uwu whats this', 9999.00, 24, 'jikjo.jpg', '2018-10-12 02:51:06', '2018-10-12 05:37:24'),
(7, 2, 'sadboi', 25000.00, 25, 'pepehands.png', '2018-10-12 02:51:25', '2018-10-12 04:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image_name`, `created_at`, `updated_at`) VALUES
(13, 'Salehi Takhashomi', 'kuroky_ti7@gmail.com', '123', '', '2018-10-01 06:40:10', '2018-10-01 07:48:25'),
(14, 'Artour Babaev', 'rageteezy@yahoo.com', '123', 'eg_rtz.jpg', '2018-10-01 06:40:10', '2018-10-09 16:58:59'),
(16, 'Anatham Pham', 'ogana@gmail.com', '123', '', '2018-10-01 16:35:30', '2018-10-01 16:35:30'),
(17, 'Danil Ishutin', 'ti1@tests.com', '123', 'navi_dendi.jpg', '2018-10-01 16:35:30', '2018-10-08 17:33:40'),
(18, 'Regi diwocera', 'rad007@test.com', '123', '', '2018-10-02 05:52:14', '2018-10-02 05:52:14'),
(19, 'sam', 'iamsam@lugaw.com', '123', '', '2018-10-02 05:54:33', '2018-10-02 05:54:33'),
(20, 'sam', 'sam@yahoo.com', '123', '', '2018-10-03 01:21:20', '2018-10-03 01:21:20'),
(22, 'Janne Stefanovski', 'mrchild@gmail.com', '123', 'gorgc.png', '2018-10-09 16:11:31', '2018-10-09 16:11:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
