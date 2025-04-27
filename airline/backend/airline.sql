-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 11:27 AM
-- Server version: 10.1.38-MariaDB
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
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `source` varchar(1000) COLLATE ascii_bin NOT NULL,
  `destination` varchar(10000) COLLATE ascii_bin NOT NULL,
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `airline` varchar(1000) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`source`, `destination`, `id`, `date`, `airline`) VALUES
('DEL', 'MUM', 1, '2025-04-19', 'Air India'),
('MUM', 'DEL', 2, '2025-04-20', 'Air india'),
('DEL', 'HYD', 3, '2025-04-19', 'Air india'),
('HYD', 'DEL', 4, '2025-04-20', 'Air india');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
