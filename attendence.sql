-- phpMyAdmin SQL Dump
-- version 4.2.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2014 at 05:27 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendence`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendence`
--

CREATE TABLE IF NOT EXISTS `Attendence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkin` datetime NOT NULL,
  `checkout` datetime DEFAULT NULL,
  `location_checkin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_checkout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plus` int(11) DEFAULT NULL,
  `minus` int(11) DEFAULT NULL,
  `no_of_hrs` int(11) DEFAULT NULL,
  `notes` longtext COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ADDC9916A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `Attendence`
--

INSERT INTO `Attendence` (`id`, `checkin`, `checkout`, `location_checkin`, `location_checkout`, `plus`, `minus`, `no_of_hrs`, `notes`, `user_id`, `total`) VALUES
(1, '2009-01-01 00:00:00', '2009-01-01 00:00:00', 'Objects Head Quarter', 'Home', 2, 3, 4, 'Kadab', 2, 0),
(2, '2009-01-01 04:00:00', '2009-01-02 04:03:00', 'Objects', 'Home', 2, 2, 5, 'noteees', 2, 0),
(3, '2009-01-01 01:00:00', '2009-01-01 04:00:00', 'Objects', 'Home', 3, 3, 4, 'noteees', 7, 0),
(4, '2009-01-01 00:00:00', '2009-01-02 04:00:00', 'Objects', 'Home', 3, 3, 4, 'noootes', 7, 0),
(5, '2009-01-01 08:00:00', '2009-01-01 01:01:00', 'Objects', 'Objects', 0, 0, 60, 'dsa', 7, 0),
(6, '2009-01-07 08:00:00', '2009-01-07 13:13:00', 'Objects', 'Home', 0, 0, 300, 'wqewqe', 7, 0),
(7, '2009-01-01 06:00:00', '2009-01-01 19:00:00', '0', '0', 0, 0, 180, '0', 3, 0),
(8, '2009-01-01 03:02:00', '2009-01-01 20:04:00', 'dsa', 'das', 0, 0, 1020, 'dsadsa', 3, 0),
(9, '2009-01-01 09:00:00', '2009-01-01 20:00:00', 'Objects', 'Home', 0, 0, 660, 'notttes', 7, 0),
(10, '2009-01-01 09:09:00', '2009-01-01 20:00:00', 'Objects', 'Home', 0, 0, 600, 'notttes', 7, 0),
(11, '2009-01-01 12:00:00', '2009-01-01 20:00:00', 'Objects', 'Home', 0, 0, 0, 'dasdas', 7, 0),
(12, '2009-01-01 12:00:00', '2009-01-01 20:00:00', 'Objects', 'Home', 0, 0, 480, 'dsa', 7, 0),
(13, '2009-01-01 12:00:00', '2009-01-01 20:00:00', 'Objects', 'Home', 0, 1380, 480, 'dasdas', 7, 0),
(14, '2009-01-01 12:00:00', '2009-01-01 20:00:00', 'Objects', 'Home', 0, 0, 480, 'dsa', 7, 0),
(15, '2009-01-01 12:00:00', '2009-01-01 20:00:00', 'Objects', 'Home', 0, 23, 480, 'dsadsa', 7, 0),
(16, '2009-01-01 12:00:00', '2009-01-01 20:00:00', 'dsa', 'dsa', 0, 60, 480, 'dsa', 7, 0),
(17, '2009-01-01 11:00:00', '2009-01-01 20:00:00', 'das', 'dsa', 0, 0, 540, 'dsa', 7, 0),
(18, '2009-01-01 12:00:00', '2009-01-01 20:00:00', 'Objects', 'Objects', 0, 60, 480, 'dasdas', 7, 0),
(19, '2009-01-01 10:00:00', '2009-01-01 20:00:00', 'Objects', 'Home', 0, 0, 600, '123', 7, 0),
(20, '2009-02-01 00:00:00', '2009-02-01 04:00:00', 'dsa', 'dsa', 0, 60, 240, 'sada', 7, 0),
(21, '2009-07-01 00:00:00', '2009-01-01 06:00:00', 'dsa', 'dsa', 0, 60, 1080, 'dsa', 7, 0),
(22, '2014-07-01 04:00:00', '2014-07-01 07:00:00', 'dsa', 'dsa', 0, 60, 240, 'dsa', 7, 4),
(23, '2014-07-09 12:28:00', '2014-07-09 15:28:00', 'dsa', 'dsa', 0, 88, 180, 'dsa', 7, 92),
(34, '2014-07-10 17:14:06', '2014-07-10 17:14:09', 'Ahmed Zoayl Sq., Bab Sharqi WA Wabour Al Meyah, Qesm Bab Sharqi, Alexandria Governorate, Egypt', 'Ahmed Zoayl Sq., Bab Sharqi WA Wabour Al Meyah, Qesm Bab Sharqi, Alexandria Governorate, Egypt', 0, 374, 0, NULL, 7, -374);

-- --------------------------------------------------------

--
-- Table structure for table `Banner`
--

CREATE TABLE IF NOT EXISTS `Banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` longtext COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `numberOfClicks` int(11) NOT NULL,
  `numberOfViews` int(11) NOT NULL,
  `fileName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Block`
--

CREATE TABLE IF NOT EXISTS `Block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_42DAB8265E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE IF NOT EXISTS `Department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`id`, `name`) VALUES
(1, 'PHP Developers'),
(2, 'test kdaa');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hour_rate` int(11) NOT NULL,
  `casual_vac` double NOT NULL,
  `unexpected_vac` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A4E917F7A76ED395` (`user_id`),
  KEY `IDX_A4E917F7814AA86C` (`dep_id`),
  KEY `IDX_A4E917F741085FAE` (`pos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`id`, `user_id`, `dep_id`, `pos_id`, `telephone`, `mobile`, `address`, `photo`, `hour_rate`, `casual_vac`, `unexpected_vac`) VALUES
(1, 7, 1, 1, '123', '123', 'alex', 'httmsa7', 3, 1, -19),
(2, 6, 2, 1, '132', '123', 'das', 'das', 5, 432, -4);

-- --------------------------------------------------------

--
-- Table structure for table `Page`
--

CREATE TABLE IF NOT EXISTS `Page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metaTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metaDescription` longtext COLLATE utf8_unicode_ci,
  `metaKeywords` longtext COLLATE utf8_unicode_ci,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B438191E989D9B62` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Permission`
--

CREATE TABLE IF NOT EXISTS `Permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkin` datetime NOT NULL,
  `checkout` datetime NOT NULL,
  `no_of_hrs` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AF14917AA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Position`
--

CREATE TABLE IF NOT EXISTS `Position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Position`
--

INSERT INTO `Position` (`id`, `name`) VALUES
(1, 'Junior');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE IF NOT EXISTS `Role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F75B25545E237E06` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `name`, `description`) VALUES
(1, 'ROLE_ADMIN', NULL),
(2, 'ROLE_NOTACTIVE', NULL),
(3, 'ROLE_USER', NULL),
(4, 'ROLE_UPDATABLE_USERNAME', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SocialAccounts`
--

CREATE TABLE IF NOT EXISTS `SocialAccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `oauth_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_token_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_oauth_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_oauth_token_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitterId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedInId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postToLinkedIn` tinyint(1) NOT NULL,
  `screenName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postToTwitter` tinyint(1) NOT NULL,
  `facebookId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_tkn_expire_date` date DEFAULT NULL,
  `postToFB` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5E9B0C2A76ED395` (`user_id`),
  UNIQUE KEY `UNIQ_5E9B0C25FF5F412` (`twitterId`),
  UNIQUE KEY `UNIQ_5E9B0C26FFBFE15` (`linkedInId`),
  UNIQUE KEY `UNIQ_5E9B0C2D8F47C2` (`screenName`),
  UNIQUE KEY `UNIQ_5E9B0C2E17C91E8` (`facebookId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmationCode` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `lastSeen` datetime NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8_unicode_ci,
  `gender` tinyint(1) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suggested_language` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2DA17977CD283FF8` (`loginName`),
  UNIQUE KEY `UNIQ_2DA17977E7927C74` (`email`),
  UNIQUE KEY `UNIQ_2DA1797744CA4C68` (`googleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `loginName`, `email`, `password`, `confirmationCode`, `createdAt`, `lastSeen`, `firstName`, `lastName`, `about`, `gender`, `dateOfBirth`, `url`, `country_code`, `suggested_language`, `googleId`, `locked`, `enabled`, `salt`, `image`) VALUES
(1, 'Objects', 'objects@objects.ws', 'pRbfYV2PuYFYA/YXrX8tkaKx5QD6csAxr6wdSdyslySwX2S/0QFVST6F/+vqeR08lr64pGsZM77BPgmx1O0KUA==', '948259b2aa29143faf1ca87bc3131d76', '2014-07-06', '2014-07-06 15:22:04', 'Objects', NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 0, 1, '3fc3c022c33c91442d0b746c0bb5117e', NULL),
(2, 'mahmoud', 'mahmoud@objects.ws', '1mky2ON4c1vZuL6pOMousfpPny1BOWTmBXEh6JDLqbebXCyTxFpdMwOdNqgyn64dCsg/Y1InlS+7yZlFa5tL5A==', '469a29585582076db8a5906a5d10233b', '2014-07-06', '2014-07-06 15:22:04', 'mahmoud', NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 0, 1, '3fc3c022c33c91442d0b746c0bb5117e', NULL),
(3, 'Ahmed', 'ahmed@objects.ws', '1mky2ON4c1vZuL6pOMousfpPny1BOWTmBXEh6JDLqbebXCyTxFpdMwOdNqgyn64dCsg/Y1InlS+7yZlFa5tL5A==', 'fdcb056ebb20d52e210b1cf2c151cf8f', '2014-07-06', '2014-07-06 15:22:04', 'Ahmed', NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 0, 1, '3fc3c022c33c91442d0b746c0bb5117e', NULL),
(4, 'mirehan', 'mirehan@objects.ws', '1mky2ON4c1vZuL6pOMousfpPny1BOWTmBXEh6JDLqbebXCyTxFpdMwOdNqgyn64dCsg/Y1InlS+7yZlFa5tL5A==', 'e0a4f75749362de5e8cce21fa3d93d72', '2014-07-06', '2014-07-06 15:22:04', 'mirehan', NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 0, 1, '3fc3c022c33c91442d0b746c0bb5117e', NULL),
(5, 'notactive', 'notactive@objects.ws', '1mky2ON4c1vZuL6pOMousfpPny1BOWTmBXEh6JDLqbebXCyTxFpdMwOdNqgyn64dCsg/Y1InlS+7yZlFa5tL5A==', '81f446a98afb5e7fc3adda9c01600e2b', '2014-07-06', '2014-07-06 15:22:04', 'notactive', NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 0, 1, '3fc3c022c33c91442d0b746c0bb5117e', NULL),
(6, 'omar', 'omar@yahoo.com', '0ugn10ISNMDKi/kUjXXR6hvaJ0sG7dkgx+qYWErW/8T+24BhBRVYDj2O7JG3J6imZsyZY+FqjcDQOKW+tzTXfw==', '0ce2ae3b4e6b138fa159e6fc10219548', '2014-07-07', '2014-07-07 14:29:10', 'omar', 'elsayed', NULL, 1, NULL, NULL, NULL, 'en', NULL, 0, 1, '99063910e8276641deb3a052d34414cf', '53ba94ee184d2.jpeg'),
(7, 'intake34', 'ashraf@yahoo.com', '1iKi8mUJeCienIftXYEfKBjsEiqW+sDRpz2mIxMkeIjAmIhUnpobXcTzpGy2ba7AeJOCT0tprhI3FcDILFI8Lw==', '3ccc6d13a058013c9d627f1d84987c95', '2014-07-08', '2014-07-08 09:46:45', 'Ashraf', NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 0, 1, 'd1853e1e96689c947814a39feba6f639', NULL),
(8, 'admin', 'admin@yahoo.com', '8JJu9QFhlqLq/7iVuE/S/ADBLwInKQdF05rr5hzUT+qYJT3awTSGGjeZa1HcZvrxWVcp8wqmDbQa84Nw7LKpLA==', '1a454fef407857a9ab1e9784f8b44c55', '2014-07-08', '2014-07-08 09:49:33', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 0, 1, '1a0c74cfbaceb9e35efe328940b314a3', NULL),
(9, 'user', 'user@yahoo.com', 'cyxFoKyIQPMuMLCejHvhxekuFWfb+74Dv1ar8oUng4noEe2V1XcyC7ELuQJCN5Rn71UYrJzjc/6ObOBJkLIMPA==', 'c559af6255c0e51b13c11af144d9a8ce', '2014-07-08', '2014-07-08 09:49:54', 'User', NULL, NULL, NULL, NULL, NULL, NULL, 'en', NULL, 0, 1, 'c9483d9c621a24952160eb3767417312', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `UserVacation`
--

CREATE TABLE IF NOT EXISTS `UserVacation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `vacation_id` int(11) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2ED899ACA76ED395` (`user_id`),
  KEY `IDX_2ED899AC54DD8D72` (`vacation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `UserVacation`
--

INSERT INTO `UserVacation` (`id`, `user_id`, `vacation_id`, `start_date`, `end_date`, `notes`, `total`) VALUES
(1, 7, 1, '2009-02-01 00:00:00', '2009-02-03 00:00:00', 'dsa', 0),
(2, 7, 1, '2014-07-05 00:00:00', '2014-07-07 00:00:00', 'dsa', 3),
(3, 7, 1, '2014-07-02 00:00:00', '2014-07-19 00:00:00', 'sxzx', 0),
(4, 7, 1, '2009-01-02 00:00:00', '2009-01-01 00:00:00', 'czxc', 1),
(5, 7, 1, '2009-01-02 00:00:00', '2009-01-16 00:00:00', 'dsadasds', 0),
(6, 7, 1, '2014-07-06 00:00:00', '2014-07-05 00:00:00', 'dsadsa', 2),
(7, 7, 1, '2014-07-06 00:00:00', '2014-07-05 00:00:00', 'dsadsa', 2),
(8, 7, 1, '2014-07-01 00:00:00', '2014-07-10 00:00:00', 'dsadsa', 0),
(9, 7, 1, '2014-07-01 00:00:00', '2014-07-10 00:00:00', 'dsadsa', 0),
(10, 7, 1, '2014-07-11 00:00:00', '2014-07-10 00:00:00', 'dsadsa', 7),
(11, 7, 1, '2014-07-11 00:00:00', '2014-07-10 00:00:00', 'dsadsa', 7),
(12, NULL, 1, '2014-07-11 00:00:00', '2014-07-10 00:00:00', 'dsadas', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_2DE8C6A3A76ED395` (`user_id`),
  KEY `IDX_2DE8C6A3D60322AC` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 3),
(4, 3),
(4, 4),
(5, 2),
(6, 3),
(7, 3),
(8, 1),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Vacation`
--

CREATE TABLE IF NOT EXISTS `Vacation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vacation_cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1AACBD2345299698` (`vacation_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Vacation`
--

INSERT INTO `Vacation` (`id`, `name`, `vacation_cat_id`) VALUES
(1, 'Unexpected', 1),
(2, 'Casual', 1);

-- --------------------------------------------------------

--
-- Table structure for table `VacationCat`
--

CREATE TABLE IF NOT EXISTS `VacationCat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `VacationCat`
--

INSERT INTO `VacationCat` (`id`, `name`) VALUES
(1, 'Public');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Attendence`
--
ALTER TABLE `Attendence`
  ADD CONSTRAINT `FK_ADDC9916A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Employee`
--
ALTER TABLE `Employee`
  ADD CONSTRAINT `FK_A4E917F741085FAE` FOREIGN KEY (`pos_id`) REFERENCES `Position` (`id`),
  ADD CONSTRAINT `FK_A4E917F7814AA86C` FOREIGN KEY (`dep_id`) REFERENCES `Department` (`id`),
  ADD CONSTRAINT `FK_A4E917F7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Permission`
--
ALTER TABLE `Permission`
  ADD CONSTRAINT `FK_AF14917AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `SocialAccounts`
--
ALTER TABLE `SocialAccounts`
  ADD CONSTRAINT `FK_5E9B0C2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `UserVacation`
--
ALTER TABLE `UserVacation`
  ADD CONSTRAINT `FK_2ED899AC54DD8D72` FOREIGN KEY (`vacation_id`) REFERENCES `Vacation` (`id`),
  ADD CONSTRAINT `FK_2ED899ACA76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `FK_2DE8C6A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2DE8C6A3D60322AC` FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Vacation`
--
ALTER TABLE `Vacation`
  ADD CONSTRAINT `FK_1AACBD2345299698` FOREIGN KEY (`vacation_cat_id`) REFERENCES `VacationCat` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
