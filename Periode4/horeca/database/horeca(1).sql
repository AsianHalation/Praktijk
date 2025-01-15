-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 15, 2025 at 11:15 AM
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
-- Database: `horeca`
--
CREATE DATABASE IF NOT EXISTS `horeca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `horeca`;

-- --------------------------------------------------------

--
-- Table structure for table `diner`
--

CREATE TABLE `diner` (
  `dinerID` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `starttijd` time NOT NULL,
  `eindtijd` time NOT NULL,
  `locatie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diner`
--

INSERT INTO `diner` (`dinerID`, `titel`, `omschrijving`, `datum`, `starttijd`, `eindtijd`, `locatie`) VALUES
(10, 'Jesse', 'Tweaking', '2025-01-23', '14:00:00', '15:00:00', 'Monkeytown'),
(11, 'Beunis', 'bloons', '2025-02-12', '15:30:00', '16:30:00', 'bloons'),
(12, 'Jesse', 'bloons poppings met jesse', '2025-12-14', '14:30:00', '15:30:00', 'popping');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `inlognaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `inlognaam`, `wachtwoord`) VALUES
(1, 'Jesse', 'Tweaking');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diner`
--
ALTER TABLE `diner`
  ADD PRIMARY KEY (`dinerID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diner`
--
ALTER TABLE `diner`
  MODIFY `dinerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
