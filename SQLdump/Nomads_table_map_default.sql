
-- --------------------------------------------------------

--
-- Table structure for table `map_default`
--

CREATE TABLE `map_default` (
  `map_id` int(255) NOT NULL,
  `map_name` varchar(100) NOT NULL,
  `map_X` int(255) NOT NULL,
  `map_Y` int(255) NOT NULL,
  `map_star` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_default`
--

INSERT INTO `map_default` (`map_id`, `map_name`, `map_X`, `map_Y`, `map_star`) VALUES
(1, 'Solar System', 0, 0, 0);
