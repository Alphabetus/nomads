
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
  `star_model` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `star_default`
--

INSERT INTO `star_default` (`star_id`, `star_name`, `star_diameter`, `star_heat`, `star_gravity`, `star_map`, `star_model`) VALUES
(1, 'Sun', 1300000, 5500, 130, 1, 1);
