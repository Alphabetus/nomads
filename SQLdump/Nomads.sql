-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2018 at 08:06 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Nomads`
--

-- --------------------------------------------------------

--
-- Table structure for table `unit_model_table`
--

CREATE TABLE `unit_model_table` (
  `model_id` int(255) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `model_type` varchar(100) NOT NULL,
  `model_hitpoints` int(255) DEFAULT NULL,
  `model_attack` int(255) DEFAULT NULL,
  `model_cargo` int(255) DEFAULT NULL,
  `model_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_model_table`
--

INSERT INTO `unit_model_table` (`model_id`, `model_name`, `model_type`, `model_hitpoints`, `model_attack`, `model_cargo`, `model_active`) VALUES
(1, 'Mother Ship', 'ship', 1000000, 1, 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_table`
--

CREATE TABLE `unit_table` (
  `unit_id` int(255) NOT NULL,
  `unit_model` int(255) NOT NULL,
  `unit_owner` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `unit_busy` int(1) NOT NULL DEFAULT '0',
  `unit_destroyed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `password` varchar(40) NOT NULL,
  `workers` int(255) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `token_id` int(11) NOT NULL,
  `token_username` varchar(100) NOT NULL,
  `token_token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `unit_model_table`
--
ALTER TABLE `unit_model_table`
  ADD PRIMARY KEY (`model_id`),
  ADD UNIQUE KEY `model_name` (`model_name`);

--
-- Indexes for table `unit_table`
--
ALTER TABLE `unit_table`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`token_id`),
  ADD UNIQUE KEY `token_username` (`token_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `unit_model_table`
--
ALTER TABLE `unit_model_table`
  MODIFY `model_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unit_table`
--
ALTER TABLE `unit_table`
  MODIFY `unit_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
