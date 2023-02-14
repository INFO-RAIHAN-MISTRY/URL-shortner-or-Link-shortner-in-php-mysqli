-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 06:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urlshortner`
--

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `main_link` varchar(250) NOT NULL,
  `short` varchar(250) NOT NULL,
  `text` varchar(250) NOT NULL,
  `hit_count` int(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `email`, `main_link`, `short`, `text`, `hit_count`, `status`, `date`) VALUES
(5, 'admin@gmail.com', 'https://mdbootstrap.com/learn/mdb-foundations/basics/introduction/', 'mdb', 'mdbootstrap', 2, 1, '2023-02-12'),
(6, 'admin@gmail.com', 'https://github.com/sponsors/INFO-RAIHAN-MISTRY/dashboard', 'git', 'Git Hub', 2, 1, '2023-02-12'),
(8, 'admin@gmail.com', 'https://getbootstrap.com/docs/5.3/getting-started/introduction/', 'bt', 'bootstrap', 2, 1, '2023-02-12'),
(10, 'raihanmistry420@gmail.com', 'https://www.w3schools.com/php/php_date.asp', 'w3', 'w3 school', 1, 1, '2023-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `cpassword`, `date`, `role`) VALUES
(3, 'Admin', 'admin@gmail.com', 'upload/261444959_388816942930974_7153423286831662760_n.jpg', '$2y$10$p/dq5pQtYlqwzxX3Kz8Y6OvLItsgbPM6EzFE.wlTiRKhjASQgkJN2', '$2y$10$FqdQIYOTUa6qGTc3Dqdg1.PleyOox6OZEThkrMDECpu4bq4RKRjyu', '2023-02-13 00:43:50', 'admin'),
(4, 'Raihan Mistry', 'raihanmistry420@gmail.com', 'upload/pexels-cesar-perez-733745.jpg', '$2y$10$TdXCMrSGaw.ceBjWGKFv1uOX2PQDUEEV8WCX1nxGOgZmSERFwNveC', '$2y$10$9PqqxDmqZHQPMuz.R0Sbm.hk1/MKw/V4qOpMgtz5Pr3KPcELMW6JO', '2023-02-13 14:33:09', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
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
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
