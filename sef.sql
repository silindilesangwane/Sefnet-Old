-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 09:21 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sef`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_url` varchar(250) NOT NULL,
  `writer` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `id` int(11) NOT NULL,
  `interest_name` varchar(100) NOT NULL,
  `interest_description` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `interest_name`, `interest_description`, `date_created`) VALUES
(1, 'Science', 'This will bring you all the updated news on Science', '2018-06-08 00:00:00'),
(2, 'Business', 'Your bridge to business World', '2018-06-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sefstable`
--

CREATE TABLE `sefstable` (
  `id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `sef_title` varchar(100) NOT NULL,
  `sef_content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sefstable`
--

INSERT INTO `sefstable` (`id`, `interest_id`, `writer_id`, `sef_title`, `sef_content`, `date_created`, `date_modified`) VALUES
(4, 1, 14, 'This is test', 'Test body', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 14, 'Second post', 'This is second Sef post', '2018-06-13 00:00:00', '2018-06-14 00:00:00'),
(24, 2, 14, 'dced', '<p>dce</p>\r\n', '2018-06-24 04:25:43', '2018-06-24 04:25:43'),
(25, 2, 14, 'Test with Fk', '<p><strong><span style=\"color:#d35400\">This is the test</span></strong></p>\r\n', '2018-06-24 04:27:17', '2018-06-24 04:27:17'),
(26, 2, 14, 'test 2', '<p>Tester</p>\r\n', '2018-06-24 04:28:41', '2018-06-24 04:28:41'),
(27, 2, 14, 'jnjnj', '<p>mmnknmkmn</p>\r\n', '2018-06-24 05:05:14', '2018-06-24 05:05:14'),
(28, 2, 17, 'Hi', '<p>Hey</p>\r\n', '2018-06-24 05:42:40', '2018-06-24 05:42:40'),
(30, 2, 17, 'nbjnjnjnj', '<p>jbnjnnbjnnj</p>\r\n', '2018-06-24 05:44:31', '2018-06-24 05:44:31'),
(31, 2, 17, 'lol hey', '<p>Hello business world</p>\r\n', '2018-06-24 05:45:36', '2018-06-24 05:45:36'),
(32, 2, 17, 'dew', '<p>ccvdcvd</p>\r\n', '2018-06-24 05:46:09', '2018-06-24 05:46:09'),
(33, 2, 17, 'Hello World', '<p>Hey Worl</p>\r\n', '2018-06-24 05:46:39', '2018-06-24 05:46:39'),
(34, 2, 17, 'hello', '<p>lol</p>\r\n', '2018-06-24 05:49:57', '2018-06-24 05:49:57'),
(35, 2, 17, 'Anohtg post', '<p><span style=\"color:#2ecc71\">Hey</span> this is the post lo<span style=\"color:#c0392b\">l post&nbsp;</span></p>\r\n', '2018-06-24 05:52:00', '2018-06-24 05:52:00'),
(36, 2, 20, 'SA startup to compete with us giants', '<p>this is a title</p>\r\n\r\n<p><span style=\"color:#3498db\">fsajfha</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>hgadskgkdgk</strong></p>\r\n', '2018-06-24 09:38:16', '2018-06-24 09:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `dob` date NOT NULL,
  `status` enum('active','removed') NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `country` varchar(100) NOT NULL,
  `role` enum('w','r') NOT NULL,
  `user_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_email`, `user_firstname`, `user_lastname`, `gender`, `dob`, `status`, `date_created`, `date_modified`, `country`, `role`, `user_pass`) VALUES
(11, 'ghghgh@dfgfv.com', 'bvhv', 'ggfhg', 'm', '2018-01-01', 'active', '2018-06-23 11:54:02', '2018-06-23 11:54:02', 'Argentina', 'w', '$2y$10$bXiWCbWJBAmiCkfVf034M.FAluXnqHt2Aco/wnjYLuuEoOacK9Go2'),
(12, 'p@p.p', 'Fez', 'Plaatyi1', 'f', '1995-05-10', 'active', '2018-06-23 12:18:18', '2018-06-23 12:18:18', 'Cameroon', 'w', '$2y$10$enRe.bgI0C2CC.5j9zwK0uw9hpaF0oxAqw1OWaSBV1RERja8WFQqS'),
(13, 'fezekileplaatyi@wsu.ac.za', 'FezekielP', 'Plaatyi', 'm', '2018-01-01', 'active', '2018-06-23 12:31:57', '2018-06-23 14:36:12', 'Argentina', 'w', '$2y$10$zxBObeM7nu8jiXRRoo7uY.lNA1MGG5tOCw1KBgRnhZ9zzHp6/u3Hy'),
(14, 'u@wsu.ac.za', 'Umi', 'Vinqishe', 'm', '2017-01-01', 'active', '2018-06-24 10:12:51', '2018-06-24 10:12:51', 'Argentina', 'w', '$2y$10$d7XCwTOQAei36uIvieHW3ePMKeEgydgumUdLsGiZ3CjKMsOxr6eLW'),
(15, 'n@w.com', 'Nasiphi', 'Vinqishe', 'm', '2015-01-01', 'active', '2018-06-24 14:25:24', '2018-06-24 14:25:24', 'Argentina', 'w', '$2y$10$Px4u9EBxjSu4lWKGcVM8x.fXVbRv3i.a9Xxw16VCoYYgw8D8xdMES'),
(16, 'test@web.com', 'test', 'test', 'm', '2018-01-01', 'active', '2018-06-24 14:27:08', '2018-06-24 14:27:08', 'Argentina', 'w', '$2y$10$uiCpXHfQN7xuBs8GU6oULesVv0xVbMZpWPuSOg31X7qbS.3AlN5A6'),
(17, 'v@v.com', 'Verns', 'Ndabeni', 'm', '2018-01-01', 'active', '2018-06-24 17:31:50', '2018-06-24 17:38:39', 'Brazil', 'w', '$2y$10$bWWyEUUTfMqQUZu8eXykO.e6YNnUup/AKixuXs5Fk5V.cvfuuaqpm'),
(18, 'g@g.com', 'jhjh', 'jhjhj', 'm', '2018-01-01', 'active', '2018-06-24 17:57:03', '2018-06-24 17:57:03', 'Argentina', 'w', '$2y$10$wc9iuoIUwzovLGabyNgZr.sqbrznN/klaYqi8DZ2oepOIHeSfsal6'),
(19, 'smaverns@gmail.com', 'Simamkele', 'Ndabeni', 'm', '1995-06-02', 'active', '2018-06-24 18:34:06', '2018-06-24 18:34:06', 'South Africa', 'r', '$2y$10$DtagKUa4ohP6FBu.5nLdveVIalqhOivSsQ8XyEpoGsG8i1uAEIMau'),
(20, 'mpumeejayzungu@gmail.com', 'Mpumelelo', 'Zungu', 'm', '1998-12-01', 'active', '2018-06-24 21:31:44', '2018-06-24 21:31:44', 'South Africa', 'w', '$2y$10$RpD6iTAdj1SBjnOdgF9N9elpSKCtw3zOJDc9iNRJSNB6nY3IKGnf2'),
(21, 'sbongile123eunice@gmail.com', 'Honey', 'Madlala', 'f', '1997-04-01', 'active', '2018-06-25 16:19:59', '2018-06-25 16:19:59', 'ZAF', 'r', '$2y$10$KQzz4OyXCUtlTa9KQOpEvO0gph/vIJY1MK0VkR5aVWhcObuxgglLC');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `user_id` int(11) NOT NULL,
  `bio` text NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `occupation` text NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`user_id`, `bio`, `profile_pic`, `occupation`, `date_modified`) VALUES
(13, 'I like programing', '', 'PHP Fan', '2018-06-23 14:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_interests`
--

INSERT INTO `user_interests` (`id`, `interest_id`, `user_id`) VALUES
(1, 1, 14),
(7, 1, 18),
(8, 2, 18),
(9, 1, 19),
(10, 2, 19),
(11, 1, 20),
(12, 2, 20),
(13, 1, 21),
(14, 2, 21),
(15, 1, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sefstable`
--
ALTER TABLE `sefstable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_id` (`interest_id`),
  ADD KEY `writer_id` (`writer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_id` (`interest_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sefstable`
--
ALTER TABLE `sefstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sefstable`
--
ALTER TABLE `sefstable`
  ADD CONSTRAINT `sefstable_ibfk_2` FOREIGN KEY (`writer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sefstable_ibfk_3` FOREIGN KEY (`interest_id`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_details`
--
ALTER TABLE `users_details`
  ADD CONSTRAINT `users_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD CONSTRAINT `user_interests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_interests_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
