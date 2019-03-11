-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 07:35 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(1, 'Apple'),
(2, 'Samsuung'),
(3, 'HP'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Nokia'),
(7, 'China');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'อุปกรณ์ อิเล็กทรอนิกส์'),
(2, 'เครื่องประดับ'),
(3, 'แฟชั่นผู้ชาย'),
(4, 'เสื้อผ้าเด็ก'),
(5, 'เฟอร์นิเจอร์'),
(6, 'เครื่องตกเเต่งบ้าน'),
(7, 'อุปกรณ์ตกเเต่งบ้าน'),
(8, 'แฟชั่นผู้หญิง');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_price` int(120) NOT NULL,
  `product_desc` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 2, 'เสื้อฮู้ดไหมพรม ทรงหลวม สไตล์หนุ่มเกาหลี', 250, 'เสื้อฮู้ดไหมพรม ทรงหลวม สไตล์หนุ่มเกาหลี', 'asset/products_img/06300fd8c70c731b.jpg', 'เสื้อผ้า ชาย'),
(2, 1, 2, 'เสื้อฮู้ดไหมพรม ทรงหลวม สไตล์หนุ่มเกาหลี', 280, 'เสื้อฮู้ดไหมพรม ทรงหลวม สไตล์หนุ่มเกาหลี', 'asset/products_img/7449c5d92d568c1.jpg', 'เสื้อผ้า ชาย'),
(3, 1, 2, '⚡️สินค้าขายดี2019⚡️ถูกที่สุดในshopee เสื้อฮาวาย ลายเกาหลี?CODE ลด : NEWMEW?', 250, 'เสื้อฮู้ดไหมพรม ทรงหลวม สไตล์หนุ่มเกาหลี', 'asset/products_img/8a6875b4e696c485.jpg', 'เสื้อผ้า ชาย'),
(4, 1, 2, 'โปรโมชั่น!!!?กางเกงกระบอกเล็ก เรามี Code ลด 100฿!!!!', 100, 'โปรโมชั่น!!!?กางเกงกระบอกเล็ก เรามี Code ลด 100฿!!!!', 'asset/products_img/Stylish-Girls.jpg', 'เสื้อผ้า หญิง');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `lname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `adress1` varchar(300) NOT NULL,
  `adress2` varchar(200) NOT NULL,
  `Userlevel` varchar(1) NOT NULL,
  `born` date NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `fname`, `lname`, `email`, `password`, `phone`, `adress1`, `adress2`, `Userlevel`, `born`, `gender`) VALUES
(7, 'Kenichi', 'Wijitpana', 'bluebox009@gmail.com', '1234567', '', '', '', 'M', '2541-08-08', 'male'),
(8, 'Kenichi', 'Wijitpana', 'bluebox07@gmail.com', '1234567', '', '', '', 'A', '2541-08-01', 'male'),
(9, 'วชิรเวช', 'นักตะลุง', 'wachi@gmail.com', '123456', '', '', '', 'A', '2562-02-21', 'male'),
(11, 'คณิต', 'วิจิตรปัญญา', 'sadasd@gmail.com', '12345678', '', '', '', 'M', '2541-08-08', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
