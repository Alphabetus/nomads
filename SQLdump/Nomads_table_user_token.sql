
-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `token_id` int(11) NOT NULL,
  `token_username` varchar(100) NOT NULL,
  `token_token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
