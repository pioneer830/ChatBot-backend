-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 07:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prospect_pal_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--
--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `plan_option`, `amount`, `plan_description`, `plan_interval`, `plan_intervalCount`, `plan_logo`, `trial_period_days`, `created_at`, `updated_at`) VALUES
(1, 'Free', 'For 4000 queries monthly', 0.00, '<p><strong>Everything in Starter, plus:</strong></p><p><br></p><ul><li>Consectetur adipiscing elit</li><li>Consectetur adipiscing elit</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li></ul>', 'month', '3', NULL, '10', '2023-05-02 01:03:27', '2023-05-02 07:50:37'),
(2, 'Starter', 'For unlimited Queries a month.', 15.00, '<p id=\"isPasted\"><strong>Everything in Business, plus:</strong></p><p><br></p><ul><li>Consectetur adipiscing elit</li><li>Consectetur adipiscing elit</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li></ul>', 'month', '5', NULL, '7', '2023-05-02 06:40:38', '2023-05-02 07:51:04'),
(3, 'Pro', 'For unlimited Queries a month.', 30.00, '<p id=\"isPasted\"><strong>Everything in Pro, plus:</strong></p><p><br></p><ul><li>Consectetur adipiscing elit</li><li>Consectetur adipiscing elit</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li></ul>', 'month', '5', NULL, '7', '2023-05-02 06:41:13', '2023-05-02 07:51:11'),
(4, 'Free', 'For 4000 queries monthly', 0.00, '<p id=\"isPasted\"><strong>Everything in Starter, plus:</strong></p><p><br></p><ul><li>Consectetur adipiscing elit</li><li>Consectetur adipiscing elit</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li></ul>', 'year', '1', NULL, '7', '2023-05-02 06:41:45', '2023-05-02 07:51:21'),
(5, 'Starter', 'For unlimited Queries a year.', 170.00, '<p id=\"isPasted\"><strong>Everything in Starter, plus:</strong></p><p><br></p><ul><li>Consectetur adipiscing elit</li><li>Consectetur adipiscing elit</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li></ul>', 'year', '1', NULL, '7', '2023-05-02 06:42:28', '2023-05-02 07:51:38'),
(6, 'Pro', 'For unlimited Queries a year.', 350.00, '<p id=\"isPasted\"><strong>Everything in Starter, plus:</strong></p><p><br></p><ul><li>Consectetur adipiscing elit</li><li>Consectetur adipiscing elit</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li><li>Excepteur sint occaecat cupidatat</li><li>Officia deserunt mollit anim</li></ul>', 'year', '5', NULL, '7', '2023-05-02 06:42:50', '2023-05-02 07:51:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
