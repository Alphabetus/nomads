
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
  `workers` int(255) NOT NULL DEFAULT '100',
  `gold` int(255) NOT NULL DEFAULT '0',
  `location_ship` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
