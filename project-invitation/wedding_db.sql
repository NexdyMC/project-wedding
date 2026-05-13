-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2026 at 10:46 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `rsvp`
--

CREATE TABLE `rsvp` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `attendance` enum('Present','Not Present','Still in doubt') NOT NULL,
  `greeting` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rsvp`
--

INSERT INTO `rsvp` (`id`, `name`, `address`, `attendance`, `greeting`, `created_at`) VALUES
(1, 'Fahri JMK48', 'Jl. JKM48, Ngawi, Jatim', 'Present', 'Ambarawaaaaaaaa', '2026-05-10 10:10:29'),
(2, 'Fahri JMK48', 'Jl. JKM48, Ngawi, Jatim', 'Present', 'Ambarawaaaaaaaa', '2026-05-10 10:10:45'),
(3, 'Zjzj', 'Zhz', 'Still in doubt', 'Bzbbz', '2026-05-10 10:14:07'),
(4, 'AditJMK48', 'Jl. Ngawi, Bogor', 'Present', 'Abarawaaaaaaaaa', '2026-05-10 12:25:20'),
(5, 'Ambarawa', 'Jlaznka', 'Present', 'Abarawaaaaaaaaa', '2026-05-10 12:26:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rsvp`
--
ALTER TABLE `rsvp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rsvp`
--
ALTER TABLE `rsvp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
