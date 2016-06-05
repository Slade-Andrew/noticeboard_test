-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2016 at 11:39 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `noticeboard_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `Board_ID` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '6',
  `Board_Type_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`Board_ID`, `user_id`, `Board_Type_ID`) VALUES
(1, 6, 1),
(2, 6, 2),
(3, 6, 3),
(4, 6, 4),
(5, 6, 5),
(6, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `board_type_lu`
--

CREATE TABLE `board_type_lu` (
  `Board_Type_ID` int(11) NOT NULL DEFAULT '0',
  `Board_Type_Name` varchar(255) NOT NULL,
  `Board_Type_Desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board_type_lu`
--

INSERT INTO `board_type_lu` (`Board_Type_ID`, `Board_Type_Name`, `Board_Type_Desc`) VALUES
(1, 'Lost and found', 'Displays lost and found notices'),
(2, 'Work Wanted', 'Displays work wanted notices'),
(3, 'Looking for work', 'Displays looking for work notices'),
(4, 'For sale', 'Displays for sale notices'),
(5, 'Wanted items', 'Displays wanted items notices'),
(6, 'Giveaways', 'Displays giveaway notices');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL,
  `comment` text NOT NULL,
  `notice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `notice_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Better try adding a comment', 1, 2, 1430997632, NULL),
(2, 'This is a comment from John, a different user', 1, 3, 1431339405, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` int(11) NOT NULL DEFAULT '0',
  `Street_Number` int(11) NOT NULL,
  `Street_Name` varchar(255) NOT NULL,
  `Suburb` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Postcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_ID`, `Street_Number`, `Street_Name`, `Suburb`, `City`, `Postcode`) VALUES
(1, 45, 'Gladstone road', 'Richmond', 'Nelson', '7020'),
(2, 342, 'Hardy Street', '', 'Nelson', '7010'),
(3, 43, 'Archer Street', 'Albany', 'Auckland', '4330'),
(4, 16, 'Hands street', '', 'Christchurch', '8780'),
(5, 867, 'Borris street', '', 'Timaru', '8730');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('app', 'default', '001_create_notices'),
('app', 'default', '002_create_comments'),
('app', 'default', '003_create_users');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) unsigned NOT NULL,
  `nb_title` varchar(255) NOT NULL,
  `nb_message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `nb_title`, `nb_message`, `user_id`, `created_at`, `updated_at`, `size_id`) VALUES
(1, 'A post by user', 'This is a post to see if the correct variables are passed', 0, 1430985301, 1430985301, 1),
(2, 'A post by another user', 'Second attempt to get user id connected with the notice', 0, 1430985415, 1430985415, 1),
(3, 'try again', 'how about now', 2, 1430991811, 1430991811, 1),
(4, 'just seeing', 'seeing if removing a line of codes stops it working', 2, 1430991915, 1430991915, 1),
(5, 'Lost my cat', 'Lost, one ginger cat, answers to the name Linux', 4, 1431684641, 1431684641, 1),
(6, 'For Sale', 'One broken Mac Book for sale, screen has massive crack in it, still works like charm.', 4, 1431684695, 1431684695, 1),
(7, 'Countdown Animal cards needed', 'Looking for animal cards from countdown, please contact asap', 5, 1431842135, 1431842135, 1),
(8, 'Nicks first post', 'Showing Nick how it all works', 6, 1431943436, 1431943436, 1),
(9, 'A Post by a non logged in user', 'This was testing adding a post using fancybox', 0, 1431943746, 1431943746, 1),
(10, 'Testing adding a Notice', 'This is adding a notice after checking user is logged in', 2, 1432432086, 1432432086, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notice_status`
--

CREATE TABLE `notice_status` (
  `Board_ID` int(11) NOT NULL,
  `notice_id` int(11) NOT NULL,
  `Notice_Status_ID` int(11) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice_status`
--

INSERT INTO `notice_status` (`Board_ID`, `notice_id`, `Notice_Status_ID`, `Start_Date`, `End_Date`) VALUES
(1, 2, 1, '2014-03-03', '2014-03-16'),
(1, 3, 1, '2014-02-26', '2014-03-03'),
(1, 3, 3, '2014-03-03', '2014-03-09'),
(4, 1, 1, '2014-03-03', '2014-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `n_size`
--

CREATE TABLE `n_size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(15) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `n_size`
--

INSERT INTO `n_size` (`size_id`, `size_name`, `height`, `width`) VALUES
(1, 'Normal', 150, 246),
(2, 'Poster', 450, 492),
(3, 'Side by Side', 150, 492),
(4, 'Quad', 300, 492),
(5, 'Under Over', 300, 246);

-- --------------------------------------------------------

--
-- Table structure for table `status_type_lu`
--

CREATE TABLE `status_type_lu` (
  `Notice_Status_ID` int(11) NOT NULL DEFAULT '0',
  `Status_Type_Name` varchar(255) NOT NULL,
  `Status_Type_Desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_type_lu`
--

INSERT INTO `status_type_lu` (`Notice_Status_ID`, `Status_Type_Name`, `Status_Type_Desc`) VALUES
(1, 'Active', ''),
(2, 'Inactive', ''),
(3, 'Completed', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group`, `email`, `last_login`, `login_hash`, `profile_fields`, `created_at`, `updated_at`) VALUES
(2, 'Slade', 't13gpeq5UvAxlKijNPNkEIYxMDkWjPjUkEWJLmPcN8I=', 1, 'slade.andrew75@gmail.com', '1432435711', 'd26b14e718dbbd70669dc508ce4744ff13c49b5e', 'a:0:{}', 1430904101, NULL),
(3, 'John', 't13gpeq5UvAxlKijNPNkEIYxMDkWjPjUkEWJLmPcN8I=', 1, 'john@john.com', '1431339354', 'b11bdeca32831e5b0c6b1c374f2bbf94397c43ed', 'a:0:{}', 1431339354, NULL),
(4, 'Suzy', 'P7p7ficM+nN35sHg0me7VUO5TpN9yOUXsy9TX0LZ8z4=', 1, 'blah@blah.com', '1431724276', '16679f4036f379000ac64172e6c2de25dcc1cca0', 'a:0:{}', 1431683991, NULL),
(5, 'Cindy', 'fXuctqqIMZGXr7Q7HMSPk6hLHApsuBmR7ok14nCZDaw=', 1, 'mouse@mickeymouse.co.nz', '1431842069', '966fc676655cecc8f2193c339e9143e9d5e564d1', 'a:0:{}', 1431842069, NULL),
(6, 'Nick', '/3Wv5+saLbsd98tchJr32lyz7G1hyMaybKV4rPfk6kQ=', 1, 'nick@ncikshome.com', '1431943340', '135d43a629ca57a99eb464801eca6c9b06daa8ba', 'a:0:{}', 1431943339, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

CREATE TABLE `user_location` (
  `user_id` int(11) NOT NULL,
  `Location_ID` int(11) NOT NULL,
  `Contact_Name` varchar(255) NOT NULL,
  `Preferred_Contact_Number` varchar(255) NOT NULL,
  `Alt_Contact_Number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_location`
--

INSERT INTO `user_location` (`user_id`, `Location_ID`, `Contact_Name`, `Preferred_Contact_Number`, `Alt_Contact_Number`) VALUES
(1, 1, 'Alistair Thomas', '(03) 544 2341', ''),
(2, 2, 'Wayne Heme', '(03) 543 8567', ''),
(3, 3, 'Josh Hope', '(09) 976 5498', ''),
(4, 4, 'Helen Hunter', '022 546 6081', ''),
(5, 5, 'Jake Runter', '021 972 4332', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `n_size`
--
ALTER TABLE `n_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_location`
--
ALTER TABLE `user_location`
  ADD PRIMARY KEY (`Location_ID`),
  ADD UNIQUE KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;