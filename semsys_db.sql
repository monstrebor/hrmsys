-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2026 at 10:57 AM
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
-- Database: `semsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isNew` tinyint(1) DEFAULT 0,
  `isAdmin` tinyint(1) DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isNew`, `isAdmin`, `isActive`, `created_at`, `reset_token`, `reset_expires`) VALUES
(4, 'Robert Janssen T. Campos', 'r@gmail.com', '$2y$10$fMGCg6aurb7c8TVxMgr1TOv9tNoPJsIxENWzyqbehO.ailZVilk.m', 1, 1, 1, '2026-01-03 10:31:11', NULL, NULL),
(23, 'WHAT Janssen T. Campos', 'monstreborvinsmoke025@gmail.com', '$2y$10$./VwBMBVY8U8/kxdbFawaOXCc7SBJbBHRVFc2i.0ZRQ1u5tv8ghq2', 0, 1, 1, '2026-01-10 12:26:26', NULL, NULL),
(28, 'Adolf Hitler', 'itoayakingpangalan@gmail.com', '$2y$10$25PxzP6/wmHu1pRhJBSwq.rbI4atMsH2nzywSJIugT8HkHF1YejQe', 0, 1, 1, '2026-01-14 02:23:09', NULL, NULL),
(34, 'Robert Janssen T. Campos', 'rohoh59030@mustaer.com', '$2y$10$umcNH/Mmh2341qnS6tK4bOGexcLpxEmiG1INT/9xucHXAvJ/rlBIi', 0, 0, 1, '2026-01-19 14:54:11', NULL, NULL),
(36, 'Franz Kafka ssssss', 'slypoyrporjzfglpbw@xfavaj.com', '$2y$10$ZLR8CXbMDIkebITmEEmjN.xgNkoUr18dpxNgYgbZDzR7QZ7bjOipa', 0, 0, 1, '2026-02-01 09:45:11', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
