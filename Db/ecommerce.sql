-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 12:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Levis'),
(2, 'H&M');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `c_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`c_id`, `product_id`, `ip_address`, `quantity`) VALUES
(7, 5, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Mini Dress'),
(4, 'Off shoulder'),
(5, 'Miniskirt');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(3, 'Product 1', 'Product 1 is sduibdiesnfoncieuihdwd', 'Product1, product, prod, producs', 1, 0, 'Gallery-2.jpg', 'Gallery-2.jpg', 'Gallery-2.jpg', '280', '2022-06-19 13:37:46', 'true'),
(4, 'Product 2', 'Product 2 is the blalanasobdxaskxn', 'Produ2, product2, prod2', 1, 1, 'Product-12.jpg', 'Product-12.jpg', 'Product-12.jpg', '280', '2022-06-19 13:41:44', 'true'),
(5, 'Product 3', 'Product 3 is the ssdasdahsduinlam', 'Product3, product3, prod3, produc, prod, prods', 1, 2, 'Product-10.jpg', 'Product-10.jpg', 'Product-10.jpg', '280', '2022-06-19 13:43:19', 'true'),
(6, 'product 4', 'asl;djhasbidjnmkl', 'dohbkwl', 1, 0, 'Category-3.jpg', 'Category-3.jpg', 'Category-3.jpg', '250', '2022-06-19 14:01:45', 'true'),
(7, 'Product 5', 'INDSDABDASUINDAS', 'Product5', 4, 1, 'Product-4.jpg', 'Product-4.jpg', 'Product-4.jpg', '150', '2022-06-19 14:40:44', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'Yves', 'Yves', 'yvesrey1', 'EARIST_Logo.png', '::1', 'Sampaloc, Manila', '9393312954'),
(2, 'Test1', 'Test1', 'test123456', 'Avatar-PNG-High-Quality-Image.png', '::1', 'Sampaloc, Manila', '09393312954'),
(3, 'Dawin', 'Dawin', '$2y$10$/fSd8kLNgDRJbPUVxhsuPenJMozX5seTlFJRC7X0hmMy5f7dPSDW.', 'pisces.png', '::1', 'Tondo, Manila', '0935678659'),
(4, 'Customer 1', 'Customer 1', '$2y$10$v0yvvGwCrmu1L1OjeMjUIu7CCsSNyzhxqkXcp8DNFUOZYXU.Wl5Ya', 'Avatar-PNG-High-Quality-Image.png', '::1', 'Sampaloc, Manila', '09356586'),
(5, 'Yvesrey', 'Yvesrey', '$2y$10$jNXk8UoQ4lNIJ3btmXdBceYIUvZ6IfwAgWbM78Q8ZN.kgZMdkIwQy', 'admin.png', '::1', 'Sampaloc, Manila', '09365858556'),
(6, 'Yves', 'Yves', '$2y$10$l187dKmIvo/f4sfLtMCtZu/l2BnOsZ3xBH23VXRldTxCgcNqaAoZS', 'EARIST_Logo.png', '::1', 'Sampaloc, Manila', '05286256'),
(7, 'Darwin', 'Darwin', '$2y$10$.beiGMmI2D4X4RbgeJ9kBOu4I5n/beYIz3YMVokqCe.roTKwL.Gye', 'Avatar-PNG-High-Quality-Image.png', '::1', 'Tondo, Manila', '0936488625'),
(8, 'yvesreybadan', 'yvesreybadan', '$2y$10$aFgbDtWP1eYznfj5IG.Zie3aH.XXl5UQxAQwdfkRiPdz2C3lBNxIK', 'aluminum.jpg', '::1', 'Sampaloc, Manila', '0935689246');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 280, 1046916838, 1, '2022-06-20 21:10:20', 'pending'),
(2, 1, 280, 1353795928, 1, '2022-06-20 21:18:02', 'pending'),
(3, 1, 280, 1271610455, 1, '2022-06-20 22:01:26', 'pending'),
(4, 1, 280, 1423607070, 1, '2022-06-20 22:02:48', 'pending'),
(5, 1, 280, 269476355, 1, '2022-06-20 22:04:28', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
