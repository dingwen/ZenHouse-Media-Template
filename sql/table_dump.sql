-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2010 at 10:49 AM
-- Server version: 5.1.44
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `zhm`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES(16, 1, 'cate 7');
INSERT INTO `categories` VALUES(15, 2, 'cate 6');
INSERT INTO `categories` VALUES(13, 2, 'cate 4');
INSERT INTO `categories` VALUES(12, 2, 'cate 3');
INSERT INTO `categories` VALUES(10, 1, 'cate 1');
INSERT INTO `categories` VALUES(2, 0, 'events');
INSERT INTO `categories` VALUES(14, 1, 'cate 5');
INSERT INTO `categories` VALUES(11, 1, 'cate 2');
INSERT INTO `categories` VALUES(1, 0, 'about');
INSERT INTO `categories` VALUES(17, 1, 'cate 8');
INSERT INTO `categories` VALUES(18, 1, 'cate 9');
INSERT INTO `categories` VALUES(19, 1, 'cate 10');
INSERT INTO `categories` VALUES(20, 1, 'cate 11');
INSERT INTO `categories` VALUES(21, 1, 'cate 12');
INSERT INTO `categories` VALUES(22, 1, 'cate 13');
INSERT INTO `categories` VALUES(23, 1, 'some cate 14');
INSERT INTO `categories` VALUES(25, 1, 'cate 16');
INSERT INTO `categories` VALUES(26, 1, 'cate 17');
INSERT INTO `categories` VALUES(27, 1, 'cate 18');
INSERT INTO `categories` VALUES(28, 2, 'new cate 12');
INSERT INTO `categories` VALUES(29, 2, 'cate 1');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_no` varchar(6) NOT NULL DEFAULT '',
  `address` varchar(250) NOT NULL DEFAULT '',
  `city` varchar(45) NOT NULL DEFAULT '',
  `region` varchar(45) NOT NULL DEFAULT '',
  `country` varchar(45) NOT NULL DEFAULT '',
  `postcode` varchar(8) NOT NULL DEFAULT '',
  `phones` varchar(250) NOT NULL DEFAULT '{"","",""}',
  `subject` varchar(250) NOT NULL DEFAULT '',
  `emails` varchar(250) NOT NULL DEFAULT '{"","",""}',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` VALUES(1, '12345', '4000 Kingsway', 'Burnaby', 'BC', 'Canada', 'V5A 5G5', '["1231234567","","1231234567"]', '', '["a@b.com","","a@b.com"]');

-- --------------------------------------------------------

--
-- Table structure for table `web_profile`
--

DROP TABLE IF EXISTS `web_profile`;
CREATE TABLE IF NOT EXISTS `web_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  `tagline` varchar(250) NOT NULL DEFAULT '',
  `welcome_title` varchar(250) NOT NULL DEFAULT '',
  `welcome_message` text,
  `contact_email` varchar(250) NOT NULL DEFAULT '',
  `homepage_file` varchar(250) NOT NULL DEFAULT 'homepage.png',
  `meta_keywords` varchar(250) NOT NULL DEFAULT '',
  `meta_title` varchar(250) NOT NULL DEFAULT '',
  `meta_description` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_profile`
--

INSERT INTO `web_profile` VALUES(1, 'Ding-Wen Chen', 'This is my template system', 'What the heck!', 'CodeIgniter provides a comprehensive form validation and data prepping class that helps minimize the amount of code you''ll write.', 'dingwen@zenhousemedia.com', 'Vancouver-2010-Robson-Square.jpg', 'first second', 'Template site', 'CodeIgniter provides a comprehensive form validation and data prepping class that helps minimize the amount of code you''ll write.');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

DROP TABLE IF EXISTS `web_settings`;
CREATE TABLE IF NOT EXISTS `web_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_enable` tinyint(1) DEFAULT '0',
  `sharethis` text,
  `sharethis_enable` tinyint(1) DEFAULT '0',
  `google_analytics` varchar(20) DEFAULT '',
  `google_analytics_enable` tinyint(1) DEFAULT '0',
  `google_api_key` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` VALUES(1, 1, '', 1, 'UA-16845399-1', 0, '');
