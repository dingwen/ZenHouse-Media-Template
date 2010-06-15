-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2010 at 06:32 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `zhm`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`) VALUES
(16, 1, 'cate 7'),
(15, 2, 'cate 6'),
(12, 2, 'cate 3'),
(10, 1, 'cate 1'),
(2, 0, 'events'),
(14, 1, 'cate 5'),
(11, 1, 'cate 2'),
(1, 0, 'about'),
(17, 1, 'cate 8'),
(18, 1, 'cate 9'),
(19, 1, 'cate 10'),
(20, 1, 'cate 11'),
(21, 1, 'cate 12'),
(22, 1, 'cate 13'),
(23, 1, 'some cate 14'),
(25, 1, 'cate 16'),
(26, 1, 'cate 17'),
(27, 1, 'cate 18'),
(28, 2, 'new cate 12'),
(29, 2, 'cate 1');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

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

INSERT INTO `contact` (`id`, `unit_no`, `address`, `city`, `region`, `country`, `postcode`, `phones`, `subject`, `emails`) VALUES
(1, '12345', '4000 Kingsway', 'Burnaby', 'BC', 'Canada', 'V5A 5G5', '["1231234567","","1231234567"]', '', '["a@b.com","","a@b.com"]');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

CREATE TABLE IF NOT EXISTS `social_media_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(250) NOT NULL DEFAULT 'Socail Media',
  `type` varchar(20) NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `social_media_links`
--

INSERT INTO `social_media_links` (`id`, `text`, `type`, `url`) VALUES
(2, 'Ding-Wen Chen Twitter', 'facebook', 'http://twitter.com/dwchen'),
(4, 'DW Chen Twitter', 'youtube', 'http://twitter.com/dwchen'),
(5, 'DW Chen Twitter', 'twitter', 'http://twitter.com/dwchen'),
(6, 'DW Chen Twitter', 'myspace', 'http://twitter.com/dwchen'),
(7, 'DW YouTube Chanel', 'youtube', 'http://youtube.ca');

-- --------------------------------------------------------

--
-- Table structure for table `web_profile`
--

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

INSERT INTO `web_profile` (`id`, `name`, `tagline`, `welcome_title`, `welcome_message`, `contact_email`, `homepage_file`, `meta_keywords`, `meta_title`, `meta_description`) VALUES
(1, 'Ding-Wen Chen', 'This is my template system', 'What the heck!', 'CodeIgniter provides a comprehensive form validation and data prepping class that helps minimize the amount of code you''ll write.', 'dingwen@zenhousemedia.com', 'Vancouver-2010-Robson-Square.jpg', 'first second', 'Template site', 'CodeIgniter provides a comprehensive form validation and data prepping class that helps minimize the amount of code you''ll write.');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

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

INSERT INTO `web_settings` (`id`, `categories_enable`, `sharethis`, `sharethis_enable`, `google_analytics`, `google_analytics_enable`, `google_api_key`) VALUES
(1, 1, '', 1, 'UA-16845399-1', 0, '');
