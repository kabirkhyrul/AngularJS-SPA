CREATE TABLE `room_info` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `book` date NOT NULL,
  `checkout` date NOT NULL,
  `nid` int(11) NOT NULL,
  `room` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

