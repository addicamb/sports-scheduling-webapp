-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 03:49 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`, `created_on`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '2019-09-18 18:00:00'),
(2, 'guest', '35675e68f4b5af7b995d9205ad0fc43842f16450', 'guest', '2019-09-22 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `match_id` varchar(15) NOT NULL,
  `sport` varchar(10) NOT NULL,
  `team1` varchar(30) NOT NULL,
  `team2` varchar(30) NOT NULL,
  `place` varchar(50) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `match_id`, `sport`, `team1`, `team2`, `place`, `time`, `date`) VALUES
(1, '1001', 'Cricket', 'it', 'comps', 'dyp', '12:00', '2021-04-05'),
(2, '1002', 'Cricket', 'extc', 'instru', 'uni', '11:30', '2021-04-03'),
(27, '1003', 'Football', 'dentistry', 'ayurveda', 'dyp', '11:00', '2021-04-02'),
(4, '1004', 'Football', 'it ', 'suc', 'uni', '18:00', '2021-04-05'),
(5, '1005', 'Football', 'tpc', 'comps', 'uni', '12:00', '2019-09-17'),
(28, '1006', 'Cricket', 'instru', 'it', 'dyp', '19:00', '2021-04-05'),
(7, '1007', 'Cricket', 'suc', 'motif', 'Nerul Gymkhana', '12:30', '2021-04-05'),
(8, '1008', 'Basketball', 'extc', 'alumni', 'uni', '10:00', '2021-04-05'),
(9, '1009', 'Badminton', 'tpc', 'staff', 'dyp', '14:30', '2019-10-29'),
(26, '1010', 'Badminton', 'medical ', 'rait', 'uni', '14:00', '2019-10-29'),
(31, '1020', 'Kho-Kho', 'kj', 'rait', 'dyp', '16:00', '2019-10-30'),
(30, '2002', 'Basketball', 'rait ', 'med', 'army', '08:00', '2021-04-03'),
(32, '3002', 'Kho-Kho', 'mbbs', 'law', 'uni', '12:00', '2021-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `match_id` varchar(15) NOT NULL,
  `winner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `match_id`, `winner`) VALUES
(1, '1001', 'comps'),
(2, '1002', 'instru'),
(3, '1003', 'dentistry'),
(4, '1004', 'suc'),
(5, '1005', 'comps'),
(6, '1009', 'tpc'),
(7, '1010', 'rait'),
(8, '2002', 'rait '),
(9, '3002', 'law');

-- --------------------------------------------------------

--
-- Table structure for table `trials`
--

CREATE TABLE `trials` (
  `id` int(11) NOT NULL,
  `trial_id` varchar(10) NOT NULL,
  `sport` varchar(20) NOT NULL,
  `datentime` datetime NOT NULL,
  `place` varchar(20) NOT NULL,
  `fees` int(10) NOT NULL,
  `link` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trials`
--

INSERT INTO `trials` (`id`, `trial_id`, `sport`, `datentime`, `place`, `fees`, `link`, `description`) VALUES
(1, '1001', 'Cricket', '2020-03-14 16:30:00', '', 40, 'raitsports.com', 'Sports shoes compulsory.'),
(3, '1002', 'Football', '2020-03-15 17:00:00', '', 50, 'rait.com', 'studs only.'),
(5, '1003', 'Badminton', '2020-04-09 18:00:00', '', 0, 'raitsports.com', ''),
(6, '1004', 'Basketball', '2020-04-09 18:00:00', '', 0, 'raitsports.com', ''),
(7, '1005', 'Kho-Kho', '2020-04-09 18:00:00', '', 0, 'raitsports.com', 'track pants.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`match_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `trials`
--
ALTER TABLE `trials`
  ADD PRIMARY KEY (`trial_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trials`
--
ALTER TABLE `trials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `FK_MATCHID` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
