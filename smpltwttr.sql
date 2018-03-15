-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 08:22 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smpltwttr`
--

-- --------------------------------------------------------

--
-- Table structure for table `isfollowing`
--

CREATE TABLE IF NOT EXISTS `isfollowing` (
  `id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `isFollowing` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isfollowing`
--

INSERT INTO `isfollowing` (`id`, `follower`, `isFollowing`) VALUES
(3, 4, 8),
(4, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `id` int(11) NOT NULL,
  `tweet` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `tweet`, `user_id`, `datetime`) VALUES
(1, 'Oh yeahhh!', 4, '2018-03-15 13:36:32'),
(2, 'Who would tell', 8, '2018-03-15 10:36:32'),
(3, 'This will work', 4, '2018-03-13 15:37:02'),
(4, 'This will work!', 4, '2018-03-15 18:03:04'),
(5, 'New post incoming', 4, '2018-03-15 18:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'nik@nik.com', '123'),
(2, 'niko@nik.com', '1234'),
(3, 'nika@nik.com', '1234'),
(4, 'niku@nik.com', '664a93755b5ce1cf54f99ae0f5ee7cf4'),
(5, 'ron@ron.com', '966139eb6406e69379e768072e279f73'),
(6, 'room@room.com', '5c4f63fd435b140009a36318de5d9ec9'),
(7, 'we@we.com', '6f2bbb6b510d9aece665cedefe6ad78f'),
(8, 'w2@w2.com', '116524f545f1b1fee7aafd75514779b9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `isfollowing`
--
ALTER TABLE `isfollowing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
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
-- AUTO_INCREMENT for table `isfollowing`
--
ALTER TABLE `isfollowing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
