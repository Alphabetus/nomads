
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
