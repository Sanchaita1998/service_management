-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 04:18 PM
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
-- Database: `service_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `duration` enum('1 month','3 months','6 months','1 year') NOT NULL DEFAULT '1 month',
  `notes` text DEFAULT NULL,
  `renewed_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_type`, `service_name`, `duration`, `notes`, `renewed_date`, `created_at`, `updated_at`) VALUES
(1, 'Domain', 'Example Domain 1', '1 month', 'First domain for testing', '2024-12-01', '2024-11-16 23:33:14', '2024-11-16 23:33:14'),
(2, 'Server', 'Web Server 1', '3 months', 'Main server for website hosting', '2025-02-01', '2024-11-16 23:33:14', '2024-11-16 23:33:14'),
(3, 'Other', 'Custom Service 1', '6 months', 'Custom service for API integration', '2025-05-01', '2024-11-16 23:33:14', '2024-11-16 23:33:14'),
(4, 'Domain', 'Example Domain 2', '1 month', 'Second domain for testing', '2024-12-15', '2024-11-16 23:33:14', '2024-11-16 23:33:14'),
(5, 'Server', 'Web Server 2', '1 year', 'Backup server for website hosting', '2025-11-01', '2024-11-16 23:33:14', '2024-11-16 23:33:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
