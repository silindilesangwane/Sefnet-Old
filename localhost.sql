-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2018 at 11:54 AM
-- Server version: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sefnesyn_sefnet`
--
CREATE DATABASE IF NOT EXISTS `sefnesyn_sefnet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sefnesyn_sefnet`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_url` varchar(250) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `writer` varchar(100) NOT NULL,
  `privacy_status` enum('private','protected','public') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_comments`
--

CREATE TABLE `book_comments` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_dislikes`
--

CREATE TABLE `book_dislikes` (
  `id` int(11) NOT NULL,
  `marker_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_likes`
--

CREATE TABLE `book_likes` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `marker_id` int(11) NOT NULL,
  `date_now` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_reviews`
--

CREATE TABLE `book_reviews` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `review_content` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_views`
--

CREATE TABLE `book_views` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `viewer_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `id` int(11) NOT NULL,
  `interest_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `interest_name`, `date_created`) VALUES
(1, 'Technology', '2018-07-09 19:00:00'),
(2, 'Business', '2018-07-09 19:01:00'),
(3, 'Entertainment', '2018-08-09 12:19:00'),
(4, 'Life Style', '2018-08-09 13:00:00'),
(5, 'Politics', '2018-08-09 07:00:00'),
(6, 'Education', '2018-08-09 08:30:00'),
(7, 'Sport', '2018-08-09 10:00:00'),
(8, 'Social Issues', '2018-08-09 10:00:00'),
(9, 'Arts & Culture', '2018-08-09 12:00:00'),
(10, 'Nature', '2018-08-09 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `staus` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saved_sefs`
--

CREATE TABLE `saved_sefs` (
  `id` int(11) NOT NULL,
  `saver_id` int(11) NOT NULL,
  `sef_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_sefs`
--

INSERT INTO `saved_sefs` (`id`, `saver_id`, `sef_id`, `date_created`) VALUES
(2, 24, 40, '2018-07-21 06:56:46'),
(3, 24, 40, '2018-07-21 06:57:01'),
(8, 32, 41, '2018-08-24 01:59:50'),
(9, 34, 41, '2018-08-24 02:28:18'),
(11, 35, 51, '2018-08-29 12:51:09');

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
(38, 1, 23, 'Sefnet is Online', '<p><strong><span style=\"color:#e74c3c\">Wow Guys please check up Sefnet and enjoy this new social platform !</span></strong></p>\r\n', '2018-07-10 09:15:43', '2018-07-10 09:15:43'),
(39, 1, 24, 'Sefnet', '<p>Hey guys lets try to make this work, It is good for our society</p>\r\n', '2018-07-11 08:53:42', '2018-07-11 08:53:42'),
(40, 1, 23, 'Third Test', '<p>European Union laws require you to give European Union visitors information about cookies used and data collected on your blog. In many cases, these laws also require you to obtain consent.&nbsp;<br />\r\n<br />\r\nAs a courtesy, we have added a notice on your blog to explain Google&#39;s use of certain Blogger and Google cookies, including use of Google Analytics and AdSense cookies, and other data collected by Google.&nbsp;<br />\r\n<br />\r\nYou are responsible for confirming this notice actually works for your blog, and that it displays. If you employ other cookies, for example by adding third party features, this notice may not work for you. If you include functionality from other providers there may be extra information collected from your users.&nbsp;<br />\r\n<br />\r\n<a href=\"https://www.blogger.com/go/cookiechoices\" target=\"_blank\">Learn more&nbsp;</a>about this notice and your responsibilities.</p>\r\n\r\n<p><img alt=\"Dismiss this notification\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAABBklEQVQ4y+2UzwqCQBCH94GiS+Ah6A8EXXoQ74IKipqgEvQMvUd0rk6lHSSDgqJT7xC0/UbGS7eVqA4dPoYZxs/dnVUhpRTvRvyln5Hatk1sgG5ZlvA8T0RRVEbKUR+DOfWpSEkowR6S1ot0gPoZPKhPRaqDK4kh2UGmsXSI/MAvzKlPdftdcDRNU0KWJkkyQywoR30LNNXtl2BVPdd115BJROn7PsUF6lrVU0cqwjCcktQwjFIaBIHBw6onBSOsLCUpQVLHcZao9+tKR+DCZ7qM43iCmPGZ5pVYRUr38MbTX0HW5Ol3kGc8/RP1qUjn/OAGksbLPW2jXoA79X33i/r/+n5P+gR0TaBkFfIs6wAAAABJRU5ErkJggg==\" /></p>\r\n\r\n<p>Your language preference for Blogger can be&nbsp;</p>\r\n', '2018-07-18 04:28:28', '2018-07-18 04:28:28'),
(41, 1, 30, 'New Members ', '<p>New members&#39; corner isn&#39;t ready yet pretty <strong>ladies </strong>are most welcome to join me in my room so we can trade knowledge and <em>familiarize with the riches and treasures unknown to men of feminism. </em><span style=\"color:#f1c40f\">I would very much like to be acquainted with prettiness of such substance.</span></p>\r\n', '2018-07-29 07:56:03', '2018-07-29 07:56:03'),
(42, 1, 24, 'Innet', '<p><a href=\"http://www.innet.co.za\">www.innet.co.za</a></p>\r\n', '2018-07-29 05:42:04', '2018-07-29 05:42:04'),
(43, 1, 24, 'Innet ', '<p>This is <a href=\"http://www.innet.co.za\">Innet</a></p>\r\n', '2018-07-29 05:43:23', '2018-07-29 05:43:23'),
(44, 1, 24, 'Test', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<caption>Test</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\">Haha</th>\r\n			<th scope=\"col\">haha</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Hayahs</td>\r\n			<td>hshsh</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sgsgh</td>\r\n			<td>shhsu</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Shsubs</td>\r\n			<td>bsjisi</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '2018-08-02 03:40:04', '2018-08-02 03:40:04'),
(45, 1, 23, 'Third Test', '<ul>\r\n	<li><span style=\"color:#f39c12\">Testing</span> the appearance of the body.</li>\r\n	<li>How does it look?</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>How does it look on numbers?</li>\r\n</ol>\r\n\r\n<p>ðŸ˜ðŸ‘‹ðŸ‘‹</p>\r\n', '2018-08-02 06:18:40', '2018-08-02 06:18:40'),
(46, 1, 32, 'This is required', '<p><span style=\"font-size:72px\">Hey Buddy. Im testing how to text in big font in my <span style=\"color:#ecf0f1\"><span style=\"background-color:#2c3e50\">phone</span></span>.</span></p>\r\n', '2018-08-15 11:32:16', '2018-08-15 11:32:16'),
(47, 1, 32, 'What ever', '<p>New</p>\r\n', '2018-08-22 12:43:52', '2018-08-22 12:43:52'),
(48, 2, 27, 'My text', 'Text', '2018-08-23 10:46:21', '2018-08-23 10:46:21'),
(49, 1, 38, 'Something\'s weird!', '<p>Hey guys, my account is accoiacis acting up!</p>\r\n\r\n<p>Can you please help me with the problem. I couldn&#39;t even receive any content when I was signing up!</p>\r\n\r\n<p>What is this??? Please help. Don&#39;t forget I have options!</p>\r\n\r\n<p><span style=\"color:#f1c40f\"><strong>Twitter, Facebook, Tumblr and Instagram are not doing this!</strong></span></p>\r\n\r\n<p><strong><span style=\"color:#c0392b\">Work on it... Otherwise, I&#39;m out!</span></strong></p>\r\n', '2018-08-25 09:47:04', '2018-08-25 09:47:04'),
(50, 3, 37, 'Laravel for PHP', '<p>Are you a PHP developer writing code from scratch? Do you enjoy having to write the same piece of code again and again?</p>\r\n\r\n<p>Laravel is a PHP framework that solves all your problems so that you can focus on the most important things in your development phase. It gives the boilerplate for everything basic functionality.&nbsp;</p>\r\n', '2018-08-25 09:56:12', '2018-08-25 09:56:12'),
(51, 1, 37, 'Testing ', '<p>Hello world ðŸ˜€</p>\r\n\r\n<p>This is my first post!&nbsp;</p>\r\n', '2018-08-25 10:14:19', '2018-08-25 10:14:19'),
(52, 9, 35, 'Mozilla Firefox Browser', '<p><span style=\"display:none\">&nbsp;</span><strong><span style=\"color:#f1c40f\">Testing with Mozilla Firefox.</span></strong></p>\r\n\r\n<p>How does this look on Mozilla?</p>\r\n\r\n<p><a href=\"http://www.innet.co.za\">Innet Holdings</a></p>\r\n\r\n<ul>\r\n	<li>Is the parent company of Sefnet.</li>\r\n	<li>That&#39;s the company website.</li>\r\n</ul>\r\n\r\n<p><strong>I hope this looks cool.</strong></p>\r\n', '2018-09-04 05:39:46', '2018-09-04 05:39:46'),
(53, 8, 40, 'Introduction', '<p>John Doe here...</p>\r\n', '2018-09-08 09:39:57', '2018-09-08 09:39:57'),
(54, 1, 40, 'Testing the change', '<p>Landing page after posting a sef...</p>\r\n', '2018-09-08 09:56:52', '2018-09-08 09:56:52'),
(55, 1, 31, 'hash functions', '<p>hashing function&nbsp;</p>\r\n', '2018-09-08 11:58:51', '2018-09-08 11:58:51'),
(56, 1, 40, 'New trends', '<p>Whatever is new...</p>\r\n', '2018-09-10 06:28:50', '2018-09-10 06:28:50'),
(57, 7, 35, 'Ronaldo just scored his first two goals in Juventus', '<p>Amazing!&nbsp;</p>\r\n\r\n<p>After 3 matches Ronaldo struggling to put a ball in the net; he finally did it in his recent 4th match with the team.</p>\r\n\r\n<p><u><em><span style=\"color:#9b59b6\">Whats really so nice about this is knowing that this is just the beginning...</span></em></u></p>\r\n\r\n<p><strong>Much more and more is yet to come.</strong></p>\r\n', '2018-09-18 10:58:25', '2018-09-18 10:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `sef_comments`
--

CREATE TABLE `sef_comments` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sef_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sef_comments`
--

INSERT INTO `sef_comments` (`id`, `sender_id`, `sef_id`, `comment_content`, `date_created`, `date_modified`) VALUES
(96, 23, 38, 'So do we pay for using for this app, What are the other features of it?', '2018-07-10 09:44:01', '2018-07-10 09:44:01'),
(97, 24, 38, 'No we shouldn\'t pay for something nice like this', '2018-07-10 11:35:59', '2018-07-10 11:35:59'),
(98, 24, 38, '', '2018-07-10 11:36:40', '2018-07-10 11:36:40'),
(99, 24, 38, 'Ow now it is working this part of comment', '2018-07-10 11:50:05', '2018-07-10 11:50:05'),
(100, 23, 38, 'This is beautiful work.\r\n\r\nBut hey, i do not see a back button from this page.', '2018-07-10 12:12:04', '2018-07-10 12:12:04'),
(101, 24, 38, 'There\'s no need for it... Since it hass the navigation bar', '2018-07-11 08:55:33', '2018-07-11 08:55:33'),
(102, 23, 39, 'Agreed!!!\r\nThis is phenomenal creation.ðŸ˜ƒ\r\n\r\nMan... Its about the people. Our people.\r\nPeople need this product... Let\'s make it work once and for all.', '2018-07-12 07:52:45', '2018-07-12 07:52:45'),
(103, 23, 39, 'Heeee I just keep getting impressed by this.\r\n\r\n\r\nLol, I see loads of potential. Ideas are flooding my mind right now.', '2018-07-12 08:17:24', '2018-07-12 08:17:24'),
(104, 23, 39, 'This is a comment', '2018-07-17 04:34:40', '2018-07-17 04:34:40'),
(105, 24, 40, 'This page looks amazing', '2018-07-21 06:55:21', '2018-07-21 06:55:21'),
(106, 24, 40, 'But still the comments take their own time', '2018-07-21 06:55:42', '2018-07-21 06:55:42'),
(107, 24, 40, '', '2018-07-21 06:55:47', '2018-07-21 06:55:47'),
(108, 24, 40, 'Actually they are not even showing now', '2018-07-21 06:56:07', '2018-07-21 06:56:07'),
(109, 23, 40, 'Jha hey, we need to look into it. And also, some stuff are acting up sometimes. Stuff like, saving, yay and nay.', '2018-07-27 05:22:23', '2018-07-27 05:22:23'),
(110, 30, 41, 'Uthini na fethu?', '2018-07-29 03:27:56', '2018-07-29 03:27:56'),
(111, 30, 41, 'Ola', '2018-07-29 04:03:21', '2018-07-29 04:03:21'),
(112, 23, 41, 'How does this look?', '2018-07-29 04:06:12', '2018-07-29 04:06:12'),
(113, 23, 41, 'How does this look?', '2018-07-29 04:08:24', '2018-07-29 04:08:24'),
(114, 23, 43, 'ðŸ‘ðŸ‘ŒâœŒâœŒ', '2018-07-30 10:32:09', '2018-07-30 10:32:09'),
(115, 23, 43, 'ðŸ‘ðŸ‘ŒâœŒâœŒ', '2018-07-30 10:32:25', '2018-07-30 10:32:25'),
(116, 24, 43, '', '2018-08-02 06:08:36', '2018-08-02 06:08:36'),
(117, 32, 40, 'New user commenting', '2018-08-08 12:13:09', '2018-08-08 12:13:09'),
(118, 35, 40, '', '2018-08-24 10:30:20', '2018-08-24 10:30:20'),
(119, 35, 40, '', '2018-08-24 10:30:35', '2018-08-24 10:30:35'),
(120, 38, 49, 'Ow sorry you experienced such inconvenience...\r\nOur engineers are hard at work fixing the problem.', '2018-08-25 10:02:25', '2018-08-25 10:02:25'),
(121, 38, 49, 'Ow sorry you experienced such inconvenience...\r\nOur engineers are hard at work fixing the problem.', '2018-08-25 10:02:40', '2018-08-25 10:02:40'),
(122, 35, 51, 'Welcome to Sefnet sir!ðŸ™‹\r\n\r\nIf you can make it here... You can make it ANYWHERE!ðŸ‘¦ðŸ˜‚', '2018-08-25 10:24:55', '2018-08-25 10:24:55'),
(123, 35, 52, 'I think it\'s pretty cool.\r\nWe can work with it.', '2018-09-04 05:49:42', '2018-09-04 05:49:42'),
(124, 40, 50, 'Please tell me more about laravel', '2018-09-08 09:25:44', '2018-09-08 09:25:44'),
(125, 40, 54, 'Seems to be landing on the right page (Y)\r\n', '2018-09-08 10:36:16', '2018-09-08 10:36:16'),
(126, 35, 56, 'Whassup?', '2018-09-18 10:50:26', '2018-09-18 10:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `sef_dislikes`
--

CREATE TABLE `sef_dislikes` (
  `id` int(11) NOT NULL,
  `sef_id` int(11) NOT NULL,
  `marker_id` int(11) NOT NULL,
  `date_now` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sef_dislikes`
--

INSERT INTO `sef_dislikes` (`id`, `sef_id`, `marker_id`, `date_now`) VALUES
(15, 38, 23, '2018-07-10 09:25:11'),
(16, 40, 24, '2018-07-21 06:56:22'),
(17, 40, 24, '2018-07-21 06:56:52'),
(18, 40, 23, '2018-07-25 05:15:21'),
(20, 45, 23, '2018-08-02 06:19:02'),
(21, 45, 24, '2018-08-02 06:51:20'),
(22, 44, 24, '2018-08-02 06:51:27'),
(23, 44, 24, '2018-08-02 06:51:29'),
(24, 42, 24, '2018-08-02 06:51:33'),
(26, 44, 24, '2018-08-02 06:52:39'),
(27, 41, 32, '2018-08-15 10:32:10'),
(28, 46, 32, '2018-08-22 11:40:47'),
(29, 39, 23, '2018-08-22 10:55:14'),
(30, 51, 35, '2018-08-30 04:10:39'),
(31, 50, 35, '2018-09-03 01:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `sef_likes`
--

CREATE TABLE `sef_likes` (
  `id` int(11) NOT NULL,
  `sef_id` int(11) NOT NULL,
  `marker_id` int(11) NOT NULL,
  `date_now` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sef_likes`
--

INSERT INTO `sef_likes` (`id`, `sef_id`, `marker_id`, `date_now`) VALUES
(21, 38, 23, '0000-00-00 00:00:00'),
(22, 40, 24, '0000-00-00 00:00:00'),
(23, 40, 24, '0000-00-00 00:00:00'),
(24, 40, 24, '0000-00-00 00:00:00'),
(25, 40, 24, '0000-00-00 00:00:00'),
(26, 38, 24, '0000-00-00 00:00:00'),
(27, 40, 23, '0000-00-00 00:00:00'),
(28, 40, 23, '0000-00-00 00:00:00'),
(29, 40, 23, '0000-00-00 00:00:00'),
(30, 40, 23, '0000-00-00 00:00:00'),
(31, 40, 30, '0000-00-00 00:00:00'),
(32, 40, 30, '0000-00-00 00:00:00'),
(33, 41, 23, '0000-00-00 00:00:00'),
(34, 41, 23, '0000-00-00 00:00:00'),
(39, 41, 30, '0000-00-00 00:00:00'),
(40, 42, 24, '0000-00-00 00:00:00'),
(41, 41, 24, '0000-00-00 00:00:00'),
(42, 39, 24, '0000-00-00 00:00:00'),
(43, 43, 24, '2018-08-02 10:48:00'),
(44, 43, 24, '2018-08-02 10:48:02'),
(45, 43, 24, '2018-08-02 10:48:04'),
(46, 45, 23, '2018-08-02 06:18:57'),
(47, 45, 24, '2018-08-02 06:51:23'),
(48, 45, 24, '2018-08-02 06:51:25'),
(50, 44, 32, '2018-08-09 06:14:12'),
(51, 41, 32, '2018-08-09 06:14:17'),
(52, 39, 32, '2018-08-09 06:14:28'),
(53, 45, 32, '2018-08-15 10:32:13'),
(54, 46, 32, '2018-08-22 12:39:10'),
(55, 48, 32, '2018-08-24 09:51:40'),
(56, 40, 32, '2018-08-24 10:30:30'),
(57, 41, 35, '2018-08-24 12:42:57'),
(58, 41, 34, '2018-08-24 02:27:24'),
(59, 40, 34, '2018-08-24 02:53:44'),
(60, 40, 32, '2018-08-24 02:54:17'),
(61, 40, 35, '2018-08-24 03:50:30'),
(62, 51, 37, '2018-08-25 10:21:40'),
(63, 49, 37, '2018-08-25 10:21:49'),
(64, 51, 38, '2018-08-25 10:22:05'),
(65, 49, 38, '2018-08-25 10:22:11'),
(66, 50, 35, '2018-08-25 01:39:54'),
(68, 51, 35, '2018-08-30 04:10:51'),
(69, 47, 35, '2018-08-30 04:13:19'),
(70, 52, 40, '2018-09-08 09:23:30'),
(71, 51, 40, '2018-09-08 09:24:08'),
(72, 53, 40, '2018-09-08 09:45:22'),
(73, 54, 40, '2018-09-08 10:35:11'),
(74, 55, 40, '2018-09-10 06:27:50'),
(75, 56, 35, '2018-09-18 10:50:40'),
(76, 55, 35, '2018-09-18 10:50:45');

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
(22, 'fplaatyi@wsu.ac.za', 'Fezekile', 'Plaatyi', 'm', '1985-02-01', 'active', '2018-07-10 09:07:01', '2018-07-10 10:03:52', 'ZAF', 'w', '$2y$10$xegDgJIdNdO2rb06Nuqqu.r77/MFUXYJvWMnknzEKAFbRk6gJXtBy'),
(23, 'sngwane6.13@gmail.com', 'Silindile', 'Ngwane', 'm', '1996-02-01', 'active', '2018-07-10 09:07:24', '2018-07-10 09:07:24', 'ZAF', 'w', '$2y$10$TAWZJYrNamwbVWpn4zsMFOQ8/WSmAPkVgqBSX34nwTkhkU3Q.uWka'),
(24, 'smaverns@gmail.com', 'Simamkele', 'Ndabeni', 'm', '1995-06-01', 'active', '2018-07-10 11:33:39', '2018-07-10 11:33:39', 'ZAF', 'w', '$2y$10$JQMPDIze6H4d9sgP6p.7rOi2W4XH.NO7c7eCgKCJ.0rmQrsbtkZVW'),
(25, 'ssndlangs22@gmail.com', 'Senzo', 'Ndlangamandla', 'm', '1988-11-01', 'active', '2018-07-10 13:48:23', '2018-07-10 13:48:23', 'ZAF', 'r', '$2y$10$7wYGXest/sLKizeuLTQMR.nqb/O1RlJDmJByA5mwv2wnAXM0hm4nG'),
(26, 'mpenyelele@gmail.com', 'Mlungisi', 'Mhlwazi', 'm', '1997-02-01', 'active', '2018-07-10 13:54:37', '2018-07-10 13:54:37', 'ZAF', 'r', '$2y$10$QadVTpStZktUeNyfyAoZTe2feNWa2dvFmF5YHDMMfT6LI4hCtfbM2'),
(27, 'uhtomeek.music@gmail.com', 'Masibulele', 'Mgoqi', 'm', '1997-10-01', 'active', '2018-07-10 21:16:15', '2018-07-10 21:16:15', 'ALB', 'w', '$2y$10$8ydnfAhhc2pw/EZ3jaqGnuFMeBB73dx8lX95qUweTaihOnBok/MV2'),
(28, 'hi@hi.com', 'Hello', 'Hi', 'm', '1994-02-01', 'active', '2018-07-15 11:44:54', '2018-07-15 11:44:54', 'ZAF', 'w', '$2y$10$aJqBtn5sr6OUCHWVjRbYves5aLlfOLIFfe6R7r94HoBdBhu6qhKsa'),
(29, 'fplaatyi@wsu.ac.zaa', 'fez', 'pla', 'm', '1990-11-02', 'active', '2018-07-28 20:12:51', '2018-07-28 20:12:51', 'ABW', 'w', '$2y$10$m3Z5c0M6.ypbtFutmAFtyeDbF2/rRzOrbtmnLquSLmbD.OANWyFT.'),
(30, 'mpumeejayzungu@gmail.com', 'Mpumelelo', 'Zungu', 'm', '1998-12-02', 'active', '2018-07-29 07:31:04', '2018-07-29 07:31:04', 'ZAF', 'w', '$2y$10$PthPbP1V9IAbLG3H./cLa.H544J653GFswnaB5Rypnr9Wq7HoiahW'),
(31, 'sngwane2016@outlook.com', 'Sibulele', 'Ngwane', 'm', '1996-02-01', 'active', '2018-08-07 08:07:25', '2018-08-07 08:07:25', 'ZAF', 'w', '$2y$10$X2vhz3pCtcPWRqp0n4bWs.cib87RtHQoEMSZJ4MPI7k6LFz4RFTVC'),
(32, 'qaqambagcamgcam96@gmail.com', 'Qaqamba', 'Gcam-Gcam', 'f', '1996-04-01', 'active', '2018-08-08 12:10:34', '2018-08-08 12:10:34', 'ZAF', 'w', '$2y$10$/m6037Cg3uL5BcIN4ncre.Ajefi5TYib2Vop9w/T/pLel0sBa07sG'),
(33, 'masibulelemgoqi@gmaill.com', 'Masibulele', 'Mgoqi', 'm', '1998-10-01', 'active', '2018-08-19 19:37:14', '2018-08-19 19:37:14', 'ZAF', 'w', '$2y$10$8DEmFqv0NY.Pull2Djrno.EAFt8lBASYQCvd4d4Vg8yjYjqHPji3.'),
(34, 'vernon@gmail.com', 'Verns', 'Ndabeni', 'm', '1995-06-01', 'active', '2018-08-22 11:02:15', '2018-08-22 11:02:15', 'ZAF', 'w', '$2y$10$bg8NZEouQPWSSCwjTqi8ve5XGZOZCuWEmC8VO17KxfmW5O/WTVGii'),
(35, 'S@ngwane.com', 'Sibulele', 'Ngwane', 'm', '2003-02-01', 'active', '2018-08-24 09:49:31', '2018-08-24 09:49:31', 'DZA', 'w', '$2y$10$wMal82B2PogZgOS903sJ3OGpvBcNlkzso5rbnZhqqlz5MHurEVi2e'),
(36, 'Winky@gmail.com', 'Winky', 'Ngwane', 'f', '2002-02-01', 'active', '2018-08-25 09:34:44', '2018-08-25 09:34:44', 'ALB', 'r', '$2y$10$Lga2lKCMyIzlmZLh3ZhWBOKAcv6Wu7rI1TvmuhqibqTNFEZkuThzK'),
(37, 'bmlindelwa@gmail.com', 'Bulelani ', 'Mlindelwa ', 'm', '1992-02-01', 'active', '2018-08-25 09:38:35', '2018-08-25 09:38:35', 'ZAF', 'r', '$2y$10$kNbdWKdYZGiJMKbLcFi9E.BbqGbTNP27euptfkZlsVwAWNd3qtM2K'),
(38, 'bulelanimlindelwa@gmail.com', 'Bulelani', 'Mlindelwa', 'm', '2000-02-01', 'active', '2018-08-25 09:40:41', '2018-08-25 09:40:41', 'ZAF', 'r', '$2y$10$yD6BIMX4jj.eCqg834RIyOQW5vI1rMDrUgMWKa5iMVT8ESkjhUTAK'),
(39, 'shoosherkayla@gmail.com', 'Kayla', 'Shoosher', 'f', '1996-10-01', 'active', '2018-09-03 10:28:57', '2018-09-03 10:28:57', 'ZAF', 'r', '$2y$10$OlFaA.It79JI.Sz8cOydd.YKti31M8.MHLXFb1E0PKfz7eI1oIS5m'),
(40, 'johndoe@gmail.com', 'John', 'Doe', 'm', '1995-03-01', 'active', '2018-09-08 09:22:49', '2018-09-08 09:22:49', 'QAT', 'r', '$2y$10$Jf7qT5KP2MNDJvS4k..coOpd30imiHh6hvzhprHXxOlciRZJTgUAC');

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
(59, 2, 23),
(60, 1, 23),
(61, 2, 23),
(62, 1, 24),
(63, 2, 24),
(64, 1, 25),
(65, 2, 25),
(66, 1, 26),
(67, 2, 26),
(68, 2, 27),
(69, 2, 28),
(70, 1, 23),
(71, 1, 29),
(72, 2, 29),
(73, 1, 30),
(74, 2, 30),
(75, 1, 31),
(76, 2, 31),
(77, 1, 32),
(78, 2, 32),
(79, 1, 31),
(80, 1, 32),
(81, 4, 32),
(82, 7, 32),
(83, 9, 32),
(84, 1, 33),
(85, 2, 33),
(86, 3, 33),
(87, 4, 33),
(88, 5, 33),
(89, 6, 33),
(90, 7, 33),
(91, 8, 33),
(92, 9, 33),
(93, 10, 33),
(94, 2, 34),
(95, 3, 34),
(96, 8, 34),
(97, 10, 34),
(98, 1, 34),
(99, 2, 34),
(100, 1, 32),
(101, 2, 32),
(102, 3, 32),
(103, 4, 32),
(104, 5, 32),
(105, 6, 32),
(106, 7, 32),
(107, 8, 32),
(108, 10, 32),
(109, 1, 35),
(110, 2, 35),
(111, 3, 35),
(112, 3, 31),
(113, 5, 35),
(114, 7, 35),
(115, 8, 35),
(116, 9, 35),
(117, 10, 35),
(118, 5, 35),
(119, 7, 35),
(120, 9, 35),
(121, 1, 37),
(122, 2, 37),
(123, 4, 37),
(124, 6, 37),
(125, 8, 37),
(126, 1, 38),
(127, 2, 38),
(128, 3, 38),
(129, 4, 38),
(130, 5, 38),
(131, 6, 38),
(132, 7, 38),
(133, 8, 38),
(134, 9, 38),
(135, 10, 38),
(136, 1, 37),
(137, 1, 30),
(138, 3, 30),
(139, 4, 30),
(140, 5, 30),
(141, 6, 30),
(142, 7, 30),
(143, 3, 39),
(144, 4, 39),
(145, 8, 39),
(146, 10, 39),
(147, 1, 40),
(148, 2, 40),
(149, 3, 40),
(150, 5, 40),
(151, 6, 40),
(152, 7, 40),
(153, 8, 40),
(154, 9, 40),
(155, 10, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_+id` (`sender_id`);

--
-- Indexes for table `book_comments`
--
ALTER TABLE `book_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_dislikes`
--
ALTER TABLE `book_dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marker_id` (`marker_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_likes`
--
ALTER TABLE `book_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `marker_id` (`marker_id`);

--
-- Indexes for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_views`
--
ALTER TABLE `book_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `viewer_id` (`viewer_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_sefs`
--
ALTER TABLE `saved_sefs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saver_id` (`saver_id`),
  ADD KEY `sef_id` (`sef_id`);

--
-- Indexes for table `sefstable`
--
ALTER TABLE `sefstable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_id` (`interest_id`),
  ADD KEY `writer_id` (`writer_id`);

--
-- Indexes for table `sef_comments`
--
ALTER TABLE `sef_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `sef_id` (`sef_id`);

--
-- Indexes for table `sef_dislikes`
--
ALTER TABLE `sef_dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marker_id` (`marker_id`),
  ADD KEY `sef_id` (`sef_id`);

--
-- Indexes for table `sef_likes`
--
ALTER TABLE `sef_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sef_id` (`sef_id`),
  ADD KEY `marker_id` (`marker_id`);

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
-- AUTO_INCREMENT for table `book_comments`
--
ALTER TABLE `book_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_dislikes`
--
ALTER TABLE `book_dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_likes`
--
ALTER TABLE `book_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_reviews`
--
ALTER TABLE `book_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_views`
--
ALTER TABLE `book_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_sefs`
--
ALTER TABLE `saved_sefs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sefstable`
--
ALTER TABLE `sefstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sef_comments`
--
ALTER TABLE `sef_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `sef_dislikes`
--
ALTER TABLE `sef_dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sef_likes`
--
ALTER TABLE `sef_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `book_comments`
--
ALTER TABLE `book_comments`
  ADD CONSTRAINT `book_comments_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_comments_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `book_dislikes`
--
ALTER TABLE `book_dislikes`
  ADD CONSTRAINT `book_dislikes_ibfk_1` FOREIGN KEY (`marker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_dislikes_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `book_likes`
--
ALTER TABLE `book_likes`
  ADD CONSTRAINT `book_likes_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_likes_ibfk_2` FOREIGN KEY (`marker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD CONSTRAINT `book_reviews_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `book_views`
--
ALTER TABLE `book_views`
  ADD CONSTRAINT `book_views_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_views_ibfk_2` FOREIGN KEY (`viewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `saved_sefs`
--
ALTER TABLE `saved_sefs`
  ADD CONSTRAINT `saved_sefs_ibfk_1` FOREIGN KEY (`sef_id`) REFERENCES `sefstable` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `saved_sefs_ibfk_2` FOREIGN KEY (`saver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sefstable`
--
ALTER TABLE `sefstable`
  ADD CONSTRAINT `sefstable_ibfk_2` FOREIGN KEY (`writer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sefstable_ibfk_3` FOREIGN KEY (`interest_id`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sef_comments`
--
ALTER TABLE `sef_comments`
  ADD CONSTRAINT `sef_comments_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sef_comments_ibfk_2` FOREIGN KEY (`sef_id`) REFERENCES `sefstable` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sef_dislikes`
--
ALTER TABLE `sef_dislikes`
  ADD CONSTRAINT `sef_dislikes_ibfk_1` FOREIGN KEY (`marker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sef_dislikes_ibfk_2` FOREIGN KEY (`sef_id`) REFERENCES `sefstable` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sef_likes`
--
ALTER TABLE `sef_likes`
  ADD CONSTRAINT `sef_likes_ibfk_1` FOREIGN KEY (`sef_id`) REFERENCES `sefstable` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sef_likes_ibfk_2` FOREIGN KEY (`marker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
