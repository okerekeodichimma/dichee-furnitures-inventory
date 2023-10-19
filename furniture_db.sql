-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2023 at 11:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tb`
--

CREATE TABLE `inventory_tb` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `quantity_instock` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_tb`
--

INSERT INTO `inventory_tb` (`id`, `product_name`, `quantity_instock`, `unit_price`) VALUES
(1, 'wooden stool', 500, 5000),
(2, 'leather couch', 300, 100000),
(3, 'wooden tables', 1000, 10000),
(4, 'glass tables', 2000, 50000),
(5, 'full dinning set', 400, 150000),
(6, 'leather sitting room couch set', 300, 200000),
(7, 'bedroom wardrobe', 1000, 50000),
(8, 'kitchen drawer set', 1000, 50000),
(9, 'bed frame', 2000, 30000),
(10, 'shoe rack', 500, 10000),
(13, 'outdoor relaxing chairs', 1500, 15000),
(14, 'indoor relaxing chairs', 2000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tb`
--

CREATE TABLE `invoice_tb` (
  `id` int(11) NOT NULL,
  `customer_name` int(11) NOT NULL,
  `product_name` int(11) NOT NULL,
  `quantity_purchased` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_tb`
--

CREATE TABLE `login_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tb`
--

INSERT INTO `login_tb` (`id`, `username`, `password`) VALUES
(1, 'odichi', 'odi123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_tb`
--
ALTER TABLE `invoice_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tb`
--
ALTER TABLE `login_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice_tb`
--
ALTER TABLE `invoice_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_tb`
--
ALTER TABLE `login_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
