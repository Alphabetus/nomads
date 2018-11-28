
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
