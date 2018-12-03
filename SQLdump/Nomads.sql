-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2018 at 03:49 PM
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
-- Table structure for table `galactic_market_buy_table`
--

CREATE TABLE `galactic_market_buy_table` (
  `listing_id` int(255) NOT NULL,
  `listing_model` int(255) NOT NULL,
  `listing_table` varchar(100) NOT NULL,
  `listing_value` int(255) NOT NULL,
  `listing_currency` varchar(100) NOT NULL,
  `listing_limit` int(255) NOT NULL,
  `listing_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galactic_market_buy_table`
--

INSERT INTO `galactic_market_buy_table` (`listing_id`, `listing_model`, `listing_table`, `listing_value`, `listing_currency`, `listing_limit`, `listing_active`) VALUES
(1, 1, 'unit', 100, 'workers', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_settings`
--

CREATE TABLE `game_settings` (
  `game_setting_ID` int(255) NOT NULL,
  `game_setting_name` varchar(1000) NOT NULL,
  `game_setting_value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_settings`
--

INSERT INTO `game_settings` (`game_setting_ID`, `game_setting_name`, `game_setting_value`) VALUES
(1, 'user_session_validity_minutes', '60');

-- --------------------------------------------------------

--
-- Table structure for table `map_default`
--

CREATE TABLE `map_default` (
  `map_id` int(255) NOT NULL,
  `map_name` varchar(100) NOT NULL,
  `map_X` int(255) NOT NULL,
  `map_Y` int(255) NOT NULL,
  `map_star` int(255) NOT NULL DEFAULT '0',
  `map_image` varchar(500) NOT NULL,
  `map_tile` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_default`
--

INSERT INTO `map_default` (`map_id`, `map_name`, `map_X`, `map_Y`, `map_star`, `map_image`, `map_tile`) VALUES
(1, 'Solar System', 0, 0, 1, '0', 'solarsystem_1');

-- --------------------------------------------------------

--
-- Table structure for table `map_generated`
--

CREATE TABLE `map_generated` (
  `mapGen_id` int(255) NOT NULL,
  `mapGen_name` varchar(1000) NOT NULL,
  `mapGen_X` int(255) NOT NULL,
  `mapGen_Y` int(255) NOT NULL,
  `mapGen_star` int(255) NOT NULL,
  `mapGen_tile` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `star_default`
--

CREATE TABLE `star_default` (
  `star_id` int(255) NOT NULL,
  `star_name` varchar(100) NOT NULL,
  `star_diameter` int(255) NOT NULL,
  `star_heat` int(255) NOT NULL,
  `star_gravity` int(255) NOT NULL,
  `star_map` int(255) NOT NULL,
  `star_model` int(255) NOT NULL,
  `star_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `star_default`
--

INSERT INTO `star_default` (`star_id`, `star_name`, `star_diameter`, `star_heat`, `star_gravity`, `star_map`, `star_model`, `star_image`) VALUES
(1, 'Sun', 1300000, 5500, 130, 1, 1, 'default_sun');

-- --------------------------------------------------------

--
-- Table structure for table `star_generated`
--

CREATE TABLE `star_generated` (
  `starGen_ID` int(255) NOT NULL,
  `starGen_name` varchar(500) NOT NULL,
  `starGen_diameter` int(255) NOT NULL,
  `starGen_heat` int(255) NOT NULL,
  `starGeb_gravity` int(255) NOT NULL,
  `starGen_map` int(255) NOT NULL,
  `starGen_model` int(255) NOT NULL,
  `starGen_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `star_model`
--

CREATE TABLE `star_model` (
  `model_id` int(255) NOT NULL,
  `model_name` varchar(1500) NOT NULL,
  `model_diameter_range` varchar(1500) NOT NULL,
  `model_heat_range` varchar(1500) NOT NULL,
  `model_gravity_range` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `star_model`
--

INSERT INTO `star_model` (`model_id`, `model_name`, `model_diameter_range`, `model_heat_range`, `model_gravity_range`) VALUES
(1, 'Red Giant', '1000000;1500000', '5000;6000', '100;150');

-- --------------------------------------------------------

--
-- Table structure for table `unit_model_table`
--

CREATE TABLE `unit_model_table` (
  `model_id` int(255) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `model_type` varchar(100) NOT NULL,
  `model_description` varchar(500) NOT NULL,
  `model_speed` int(255) DEFAULT NULL,
  `model_hitpoints` int(255) DEFAULT NULL,
  `model_attack` int(255) DEFAULT NULL,
  `model_cargo` int(255) DEFAULT NULL,
  `model_require_workers` int(255) NOT NULL DEFAULT '0',
  `model_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_model_table`
--

INSERT INTO `unit_model_table` (`model_id`, `model_name`, `model_type`, `model_description`, `model_speed`, `model_hitpoints`, `model_attack`, `model_cargo`, `model_require_workers`, `model_active`) VALUES
(1, 'Mother Ship', 'ship', 'description_ship_1', 1, 1000000, 0, 15000, 100, 1),
(2, 'Explorer Probe', 'ship', 'description_ship_2', 100, 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_table`
--

CREATE TABLE `unit_table` (
  `unit_id` int(255) NOT NULL,
  `unit_model` int(255) NOT NULL,
  `unit_owner` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `unit_posX` int(255) NOT NULL DEFAULT '0',
  `unit_posY` int(255) NOT NULL DEFAULT '0',
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
  `createdAt` datetime DEFAULT NULL,
  `lastAction` datetime DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `workers` int(255) NOT NULL DEFAULT '100',
  `gold` int(255) NOT NULL DEFAULT '0',
  `location_ship` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `session_id` int(255) NOT NULL,
  `session_userID` int(255) NOT NULL,
  `session_timestamp` int(255) NOT NULL,
  `session_ip` varchar(500) NOT NULL
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
-- Indexes for table `galactic_market_buy_table`
--
ALTER TABLE `galactic_market_buy_table`
  ADD PRIMARY KEY (`listing_id`);

--
-- Indexes for table `game_settings`
--
ALTER TABLE `game_settings`
  ADD PRIMARY KEY (`game_setting_ID`),
  ADD UNIQUE KEY `game_setting_name` (`game_setting_name`);

--
-- Indexes for table `map_default`
--
ALTER TABLE `map_default`
  ADD PRIMARY KEY (`map_id`);

--
-- Indexes for table `map_generated`
--
ALTER TABLE `map_generated`
  ADD PRIMARY KEY (`mapGen_id`);

--
-- Indexes for table `star_default`
--
ALTER TABLE `star_default`
  ADD PRIMARY KEY (`star_id`);

--
-- Indexes for table `star_generated`
--
ALTER TABLE `star_generated`
  ADD PRIMARY KEY (`starGen_ID`);

--
-- Indexes for table `star_model`
--
ALTER TABLE `star_model`
  ADD PRIMARY KEY (`model_id`);

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
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`session_id`);

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
-- AUTO_INCREMENT for table `galactic_market_buy_table`
--
ALTER TABLE `galactic_market_buy_table`
  MODIFY `listing_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `game_settings`
--
ALTER TABLE `game_settings`
  MODIFY `game_setting_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `map_default`
--
ALTER TABLE `map_default`
  MODIFY `map_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `map_generated`
--
ALTER TABLE `map_generated`
  MODIFY `mapGen_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `star_default`
--
ALTER TABLE `star_default`
  MODIFY `star_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `star_generated`
--
ALTER TABLE `star_generated`
  MODIFY `starGen_ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `star_model`
--
ALTER TABLE `star_model`
  MODIFY `model_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unit_model_table`
--
ALTER TABLE `unit_model_table`
  MODIFY `model_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `session_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
