
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
