-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 02:47 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'dadang', '$2y$10$Cfc5Ui3SMZziEElNS0gDK.5SjXgMWUkE7xfshK7/X4QSGZ19BevK2', 1),
(2, 'kiki', '$2y$10$Lsu5gSXiH5/CK7n0TznFFO80nrHm7yS.JOM7s4F8UY6JhAIXbdy66', 0),
(3, 'badai', '$2y$10$Qkba2kok2W34RGBp2yKtfOWE/kuiJ4QKJQukNyhgrhmXZh6DPI9KG', 0),
(4, 'kawin', '$2y$10$OMoSBlhBJslLvYfDQUFL4OPx3WcABNrRrGhKhQnFeOCR0kL2D3BOC', 0),
(5, 'uang', '$2y$10$RgXIFmMqF0J6KncUFd6bteFAc5pstvt07eqn5jdCwArLUBrODmk2y', 0),
(6, 'abang', '$2y$10$zcN0PcVOzq5fUYKMuvN05Od9V8JV0VfLKsWPgUsJQhYNsc5Gpr2fK', 0),
(7, 'zakki', '$2y$10$hJ0Arcul/iGjzCNsU6.wXuBzT/rZ2ByY7qBOxGiNd7LW8Si4qS5.C', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
