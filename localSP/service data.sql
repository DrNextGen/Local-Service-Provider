-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 10:22 PM
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
-- Database: `service data`
--

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Sno` int(4) NOT NULL,
  `fname` text NOT NULL,
  `uname` varchar(12) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `mpno` text NOT NULL,
  `sname` text NOT NULL,
  `detail` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Sno`, `fname`, `uname`, `pass`, `mpno`, `sname`, `detail`, `dt`) VALUES
(1, 'bola', 'bola1', '$2y$10$kzMG48KAPvgBSEKvI8juHOw1dxM89VtaHs6lZD3p2XwlXsqSHLUOC', '1212', 'Electricians', 'I have worked as electrician for 4 years', '2024-05-05 17:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Sno` int(4) NOT NULL,
  `fname` text NOT NULL,
  `uname` varchar(12) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `email` text NOT NULL,
  `mpno` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Sno`, `fname`, `uname`, `pass`, `email`, `mpno`, `dt`) VALUES
(1, 'decesh', 'dev', 'abcd', 'zx@zx', '9999999999', '2024-04-28 21:56:04'),
(2, '44', '4645', '$2y$10$V.dPXHS1zSr.JCmVILBnQ.ydT8XhP6kjkV1nOoxzH.kWn8TDZ2rTW', 'rter', 'ert4334', '2024-04-28 22:44:23'),
(3, 'asdf', 'we', '$2y$10$71YKGdfp1S1hTD2Pf1q0DOtkzXExTepJQHpVds/.O2tM7ismyZHoa', 'wert', '3124141', '2024-04-28 22:51:08'),
(4, 'asdf', 'we1', '$2y$10$N7LoXbJTuAOxU1QsvJl1bu2M0MyS.K4ezCYl.yPpIInml7I0F/moi', 'wert', '3124141', '2024-04-28 22:53:23'),
(5, 'asdf', 'asdf1', '$2y$10$QeyNA1zs1AYsYeokg6KVsuZ3RVQnqjBBvGWCjCbihQN12pqiad09K', 'zxy', '989898988', '2024-04-28 23:06:44'),
(6, 'qw', 'qwe', '$2y$10$H.gQ/UAkVpPPbepoWDRgE.d/CvxyGPqXAhaVVLediyxua3stUY98S', 'zxy', '98989898', '2024-05-05 14:44:48'),
(7, 'Harry', 'harry', '$2y$10$t2NSBL7NbnEjOIu/WdjDA.U5Mrkb6gMangWR9M30.MiIvwHgnu/rm', 'harry@gmail.com', '98607013451', '2024-05-07 07:53:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Sno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Sno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
