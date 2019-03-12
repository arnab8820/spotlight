-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql305.byetcluster.com
-- Generation Time: Mar 12, 2019 at 10:16 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_22038220_database1`
--

-- --------------------------------------------------------

--
-- Table structure for table `language_list`
--

CREATE TABLE IF NOT EXISTS `language_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `language` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `search_log`
--

CREATE TABLE IF NOT EXISTS `search_log` (
  `keyword` varchar(200) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

-- --------------------------------------------------------

--
-- Table structure for table `signup_request`
--

CREATE TABLE IF NOT EXISTS `signup_request` (
  `email_id` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`email_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic_list`
--

CREATE TABLE IF NOT EXISTS `topic_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `first_name` text,
  `middle_name` text,
  `last_name` text,
  `gender` text,
  `photo_filename` varchar(20) DEFAULT NULL,
  `youtube_url` varchar(100) DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL,
  `access_restricted` int(1) NOT NULL DEFAULT '0',
  `upload_restricted` int(1) NOT NULL DEFAULT '0',
  `detail_given` int(1) NOT NULL DEFAULT '0',
  `session_id` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_detail`
--

CREATE TABLE IF NOT EXISTS `video_detail` (
  `id` varchar(20) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `author_url` varchar(100) DEFAULT NULL,
  `uploader` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `thumbnail_url` varchar(100) DEFAULT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `audio_language` varchar(30) NOT NULL,
  `views` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
