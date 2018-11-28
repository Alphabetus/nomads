
--
-- Indexes for dumped tables
--

--
-- Indexes for table `galactic_market_buy_table`
--
ALTER TABLE `galactic_market_buy_table`
  ADD PRIMARY KEY (`listing_id`);

--
-- Indexes for table `map_default`
--
ALTER TABLE `map_default`
  ADD PRIMARY KEY (`map_id`);

--
-- Indexes for table `star_default`
--
ALTER TABLE `star_default`
  ADD PRIMARY KEY (`star_id`);

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
-- AUTO_INCREMENT for table `map_default`
--
ALTER TABLE `map_default`
  MODIFY `map_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `star_default`
--
ALTER TABLE `star_default`
  MODIFY `star_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;