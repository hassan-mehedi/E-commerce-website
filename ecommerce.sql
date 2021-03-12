-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 05:30 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_rating` int(1) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`product_id`, `product_name`, `product_image`, `product_rating`, `product_price`, `product_stock`, `product_type`) VALUES
(10, 'Polo t-shirt', 't-shirt.jpg', 4, '450 Tk', 4, 'T-shirt'),
(13, 'Formal Shirt', 'Formal shirt.jpg', 3, '1600 Tk', 50, 'Shirt'),
(14, 'Folded shirt', 'Folded shirt.jpg', 4, '1400 Tk', 35, 'Shirt'),
(15, 'Patterned Shirt', 'Stylish shirt.jpg', 5, '2100 Tk', 10, 'Shirt'),
(16, 'Full pant (Artisan)', 'Artisan pant.jpg', 5, '1800 Tk', 7, 'Pants'),
(17, 'Full pant silk (Antok)', 'Antok pant.jpeg', 4, '2100 Tk', 11, 'Pants'),
(18, 'Full pant office (Cats eye)', 'Cats eye pant.jpg', 5, '2300 Tk', 5, 'Pants'),
(19, 'Casio (White)', 'Casio white.jpeg', 5, '4500 Tk', 1, 'Watch'),
(20, 'Casio (Dark)', 'Casio dark.jpeg', 4, '5000 TK', 2, 'Watch'),
(21, 'Casio (Pink)', 'Casio pink.webp', 4, '4000 Tk', 6, 'Watch'),
(23, 'Wedding jewellery', 'Wedding Jwellery.jpg', 5, '120000 TK', 1, 'Jewellery'),
(24, 'Wedding set', 'Necklace and earrings set.jpg', 5, '400000 Tk', 1, 'Jewellery'),
(25, 'Necklace', 'Necklace.jpg', 5, '100000 Tk', 3, 'Jewellery'),
(26, 'Nike shoe', 'NIke shoe.jpg', 4, '4000 Tk', 4, 'Shoes'),
(27, 'Adidas shoe (Black)', 'Adidas shoe Black.jpg', 5, '7000 Tk', 2, 'Shoes'),
(28, 'Adidas shoe (Sport)', 'Adidas sport shoe.jpg', 5, '9000 Tk', 5, 'Shoes'),
(29, 'T-shirt (Red)', 'tShirt 1.jpg', 4, '750 Tk', 20, 'T-shirt'),
(30, 'T-shirt (Blue)', 'tShirt 2.jpg', 4, '750 Tk', 50, 'T-shirt'),
(31, 'T-shirt (Yellow)', 'tShirt 3.jpg', 3, '700 Tk', 30, 'T-shirt'),
(32, 'Mask', 'mask.jpg', 2, '100 Tk', 5, 'Jewellery'),
(33, 'Diamond Ring', 'ring.jpg', 3, '75000 TK', 3, 'Jewellery'),
(35, 'Scent', 'scent.jpg', 2, '450 Tk', 10, 'Jewellery'),
(36, 'Desktop Computer', 'pc.jpg', 4, '70000 TK', 1, 'Jewellery'),
(37, 'Casio watch', 'watch_new.jpg', 4, '16650 TK', 1, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `bank_balance`
--

CREATE TABLE `bank_balance` (
  `user_id` varchar(20) NOT NULL,
  `acc_number` int(10) NOT NULL,
  `acc_balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_balance`
--

INSERT INTO `bank_balance` (`user_id`, `acc_number`, `acc_balance`) VALUES
('9722d9ba0d48dbf4f7b7', 2147483647, 36000),
('bacbcdd543c2a8a38c98', 1545865565, 45044),
('cad3ea6cce94ae049a8c', 236545156, 35148);

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `buyer_email` varchar(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `product_state` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`buyer_email`, `product_id`, `product_name`, `product_quantity`, `product_price`, `total`, `product_state`) VALUES
('mehedi', 1, 'Folded Shirt', 5, '450 TK', '2250', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `name`, `email`, `password`, `number`, `address`, `image`) VALUES
('9722d9ba0d48dbf4f7b7', 'Mehedi Hassan', 'mehedi@gmail.com', '123', 1674420630, 'Gulshan, Dhaka-1212', 'B612_20170218_114412.jpg'),
('bacbcdd543c2a8a38c98', 'Aminul Islam', 'aminul@gmail.com', '123', 1854216632, 'Badda, Dhaka-1212', 'aminul.jpg'),
('cad3ea6cce94ae049a8c', 'Ashraful Islam', 'ashraful@gmail.com', '123', 1425456963, 'Nurerchala, Dhaka-1212', 'asha.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `bank_balance`
--
ALTER TABLE `bank_balance`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
