
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
