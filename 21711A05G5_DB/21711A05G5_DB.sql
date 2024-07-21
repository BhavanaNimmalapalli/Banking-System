-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 07:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `account_holder` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_holder`, `account_number`, `mobile_number`, `bank_name`, `balance`) VALUES
(3, 'bhavana', '1234567890', '9182576944', 'union', 300.00),
(6, 'Harika', '9876543210', '9182576945', 'SBI', 500.00),
(7, 'Sameera', '1234567899', '9182576946', 'union', 0.00),
(8, 'priya', '9876543211', '7999999999', 'SBI', 0.00),
(11, 'Abhi', '1234512345', '9876543210', 'Axis', 1300.00);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `transaction_type` enum('deposit','withdraw') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_number`, `transaction_type`, `amount`, `transaction_date`) VALUES
(1, '1234567890', 'deposit', 100.00, '2024-06-19 16:34:02'),
(2, '1234567890', 'deposit', 100.00, '2024-06-19 16:35:06'),
(3, '1234567890', 'deposit', 100.00, '2024-06-19 16:35:10'),
(4, '9876543210', 'deposit', 200.00, '2024-06-19 16:44:59'),
(5, '9876543210', 'deposit', 200.00, '2024-06-19 16:45:06'),
(6, '9876543210', 'deposit', 100.00, '2024-06-19 16:45:16'),
(7, '9876543210', 'deposit', 100.00, '2024-06-19 16:45:44'),
(8, '9876543210', '', 100.00, '2024-06-19 16:46:24'),
(9, '9876543210', '', 100.00, '2024-06-19 16:47:33'),
(10, '9876543210', '', 100.00, '2024-06-19 16:47:37'),
(11, '9876543210', 'deposit', 200.00, '2024-06-19 16:47:45'),
(12, '1234512345', 'deposit', 1300.00, '2024-06-20 20:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Bhavana', 'Nimmalapalli', 'nimmalapallibhavana@gmail.com', '5a019bd689a966fe3624899271bf9a42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
