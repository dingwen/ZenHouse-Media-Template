-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2010 at 12:16 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `zhm`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `category` varchar(45) NOT NULL DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT 'draft',
  `content` text,
  `meta_keywords` varchar(250) NOT NULL DEFAULT '',
  `meta_title` varchar(250) NOT NULL DEFAULT '',
  `meta_description` varchar(250) NOT NULL DEFAULT '',
  `slug` varchar(250) NOT NULL DEFAULT '',
  `weight` int(11) NOT NULL DEFAULT '-100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `category`, `status`, `content`, `meta_keywords`, `meta_title`, `meta_description`, `slug`, `weight`) VALUES
(1, 'Drug testing is now part of CFL, players'' new collective agreement', '17', 'live', '<p>The Canadian Football League and the league''s players'' association have agreed on a new four-year collective bargaining agreement that will include year-round testing for performance enhancing drugs.<br />The terms of the agreement were revealed Tuesday at a joint news conference hosted by representatives of the CFL and the Canadian Football League Players'' Association.<br />"This CBA represents a major step forward for our league, and it is a testament to the spirit of partnership that exists between the CFL and the CFLPA, a partnership that flows out of a shared passion for our game and commitment to our fans," said Mark Cohon, commissioner of the CFL.<br />CFLPA President Stu Laird said the agreement represents progress for both sides and a renewed spirit of co-operation.<br />"We''re moving forward together under an agreement that helps our players and helps our league," Laird said.<br />For the first time, the Canadian Football League has a drug testing policy, with the first step introducing an education program for all players in 2010.<br />Random testing begins in 2011, with 25 per cent of all players tested that year, and 35 per cent to be tested in 2012 and 2013.<br />Upon a first offence, a player will automatically be subjected to mandatory testing and an assessment, followed by counselling.<br />A second offence triggers a three-game suspension, a third offence a one-year suspension, and a fourth offence a lifetime ban.<br />The agreement replaces the provision that had required the league to devote at least 56 per cent of defined gross revenue to players'' salaries with negotiated minimum team salary and annual increases in the salary cap.</p>', '', '', '', 'Drug-testing-is-now-part-of-CFL--players--new-collective-agreement', -100),
(2, 'Testing 1', '17', 'live', '<p>Some content</p>', '', '', '', 'Testing-1', -100),
(3, 'Testing 2', '17', 'live', '<p>Some content</p>', '', '', '', 'Testing-2', -100),
(4, 'Testing 3', '10', 'live', '<p>Some content</p>', '', '', '', 'Testing-3', -100),
(5, 'Testing 4', '10', 'live', '<p>Some content</p>', '', '', '', 'Testing-4', -100),
(6, 'Testing 5', '10', 'live', '<p>Some content</p>', '', '', '', 'Testing-5', -100),
(7, 'Testing 6', '23', 'live', '<p>Some content</p>', '', '', '', 'Testing-6', -100),
(8, 'Testing 7', '23', 'live', '<p>Some content</p>', '', '', '', 'Testing-7', -100),
(9, 'Testing 8', '23', 'live', '<p>Some content</p>', '', '', '', 'Testing-8', -100);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `emails` varchar(250) NOT NULL DEFAULT '["","",""]',
  `photo` varchar(250) NOT NULL DEFAULT '',
  `bio` text,
  `unit_no` varchar(6) NOT NULL DEFAULT '',
  `address` varchar(250) NOT NULL DEFAULT '',
  `city` varchar(45) NOT NULL DEFAULT '',
  `region` varchar(45) NOT NULL DEFAULT '',
  `country` varchar(45) NOT NULL DEFAULT '',
  `postcode` varchar(10) NOT NULL DEFAULT '',
  `phones` varchar(250) NOT NULL DEFAULT '[["",""],["",""],["",""]]',
  `addtional_title` varchar(250) NOT NULL DEFAULT '',
  `addtional_content` text,
  `meta_keywords` varchar(250) NOT NULL DEFAULT '',
  `meta_title` varchar(250) NOT NULL DEFAULT '',
  `meta_description` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `first_name`, `last_name`, `emails`, `photo`, `bio`, `unit_no`, `address`, `city`, `region`, `country`, `postcode`, `phones`, `addtional_title`, `addtional_content`, `meta_keywords`, `meta_title`, `meta_description`) VALUES
(1, 'Ding Wen', 'Chen', '["a@b.com","a@b.com",""]', 'Vancouver-2010-Robson-Square.jpg', 'Creates an opening form tag with a base URL built from your config preferences. It will optionally let you add form attributes and hidden input fields.<br><br>The main benefit of using this tag rather than hard coding your own HTML is that it permits your site to be more portable in the event your URLs ever change.', '12345', '4500 Kingsway', 'Burnaby', 'BC', 'Canada', 'V5A 5G5', '[["cell","6041234567"],["fax",""],["phone","6041234567"]]', 'Some Title', 'Creates an opening form tag with a base URL built from your config preferences. It will optionally let you add form attributes and hidden input fields.<br><br>The main benefit of using this tag rather than hard coding your own HTML is that it permits your site to be more portable in the event your URLs ever change.', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '-100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `weight`) VALUES
(16, 1, 'cate 7', -100),
(15, 2, 'cate 6', -100),
(3, 0, 'news', -100),
(12, 2, 'cate 3', -100),
(10, 1, 'cate 1', -100),
(2, 0, 'events', -100),
(14, 1, 'cate 5', -100),
(11, 1, 'cate 2', -100),
(1, 0, 'about', -100),
(17, 1, 'cate 8', -100),
(18, 1, 'cate 9', -100),
(19, 1, 'cate 10', -100),
(20, 3, 'cate 11', -100),
(21, 3, 'cate 12', -100),
(22, 1, 'cate 13', -100),
(23, 1, 'some cate 14', -100),
(25, 2, 'cate 16', -100),
(26, 1, 'cate 17', -100),
(27, 1, 'cate 18', -100),
(28, 2, 'new cate 12', -100),
(29, 2, 'cate 1', -100);

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

INSERT INTO `contact` (`id`, `unit_no`, `address`, `city`, `region`, `country`, `postcode`, `phones`, `subject`, `emails`) VALUES
(1, '12345', '4000 Kingsway', 'Burnaby', 'BC', 'Canada', 'V5A 5G5', '["1231234567","adsfasd","1231234567"]', '', '["a@b.com","","a@b.com"]');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `subtitle` varchar(250) NOT NULL DEFAULT '',
  `category` varchar(45) NOT NULL DEFAULT '',
  `description` text,
  `start_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(250) NOT NULL DEFAULT '',
  `ticket_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `where_to_purchase` varchar(250) NOT NULL DEFAULT '',
  `where` varchar(250) NOT NULL DEFAULT '',
  `unit_no` varchar(6) NOT NULL DEFAULT '',
  `address` varchar(250) NOT NULL DEFAULT '',
  `city` varchar(45) NOT NULL DEFAULT '',
  `region` varchar(45) NOT NULL DEFAULT '',
  `country` varchar(45) NOT NULL DEFAULT '',
  `postcode` varchar(8) NOT NULL DEFAULT '',
  `phones` varchar(250) NOT NULL DEFAULT '{"","",""}',
  `status` varchar(10) NOT NULL DEFAULT 'draft',
  `meta_keywords` varchar(250) NOT NULL DEFAULT '',
  `meta_title` varchar(250) NOT NULL DEFAULT '',
  `meta_description` varchar(250) NOT NULL DEFAULT '',
  `slug` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `events`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `category` varchar(20) NOT NULL DEFAULT '',
  `content` text,
  `publish_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(5) NOT NULL DEFAULT 'draft',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_keywords` varchar(250) NOT NULL DEFAULT '',
  `meta_title` varchar(250) NOT NULL DEFAULT '',
  `meta_description` varchar(250) NOT NULL DEFAULT '',
  `slug` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `category`, `content`, `publish_date`, `status`, `timestamp`, `meta_keywords`, `meta_title`, `meta_description`, `slug`) VALUES
(1, 'Server-side processing', '', '<p>There are times when reading data from the DOM is simply to slow or unwieldy, particularly when dealing with data sets of a thousand rows or more. To address this DataTables'' server-side processing feature provides a method to let all the "heavy lifting" be done by a database engine on the server-side (they are after-all highly optimised for exactly this kind of thing), and then have that information drawn in the user''s web-browser. As such you can display tables consisting of millions of rows with ease.</p>', '2010-06-15 11:54:00', 'live', '2010-06-28 17:09:31', '', '', '', 'Server-side-processing'),
(2, 'erver-side processing', '', '<p>There are times when reading data from the DOM is simply to slow or unwieldy, particularly when dealing with data sets of a thousand rows or more. To address this DataTables'' server-side processing feature provides a method to let all the "heavy lifting" be done by a database engine on the server-side (they are after-all highly optimised for exactly this kind of thing), and then have that information drawn in the user''s web-browser. As such you can display tables consisting of millions of rows with ease.</p>', '2009-06-15 11:54:00', 'live', '2010-06-28 17:56:30', '', '', '', 'erver-side-processing'),
(3, 'Server''s Side Processing', '', '<p>There are times when reading data from the DOM is simply to slow or unwieldy, particularly when dealing with data sets of a thousand rows or more. To address this DataTables'' server-side processing feature provides a method to let all the "heavy lifting" be done by a database engine on the server-side (they are after-all highly optimised for exactly this kind of thing), and then have that information drawn in the user''s web-browser. As such you can display tables consisting of millions of rows with ease.</p>', '2010-06-15 11:54:00', 'draft', '2010-06-28 17:10:27', '', '', '', 'Server-s-Side-Processing'),
(40, 'processing', '20', '', '2010-06-28 17:32:27', 'live', '2010-06-28 17:32:27', '', '', '', 'processing'),
(41, 'Testing', '20', '', '2010-06-28 17:37:31', 'live', '2010-06-28 17:37:31', '', '', '', 'Testing'),
(39, 'Problem with Uploadify', '20', '<p><img style="float: left; margin: 10px;" src="application/uploads/assets/Some Kinda Pasta.JPG" alt="" width="200" height="267" />We''ve been hearing about OnLive''s cloud-based service for more than a year now. The company claims it can offer the latest games on demand, without a need for meaty hardware requirements on the client end. Could this really be the end of high-end PCs?</p>', '2010-06-26 21:44:38', 'live', '2010-06-26 22:11:06', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

DROP TABLE IF EXISTS `social_media_links`;
CREATE TABLE IF NOT EXISTS `social_media_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(250) NOT NULL DEFAULT 'Socail Media',
  `type` varchar(20) NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `parent` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `social_media_links`
--

INSERT INTO `social_media_links` (`id`, `text`, `type`, `url`, `parent`) VALUES
(2, 'Ding-Wen Chen Twitter', 'facebook', 'http://twitter.com/dwchen', 'contact'),
(4, 'DW Chen Twitter', 'youtube', 'http://twitter.com/dwchen', 'contact'),
(5, 'DW Chen Twitter', 'twitter', 'http://twitter.com/dwchen', 'contact'),
(6, 'DW Chen Twitter', 'myspace', 'http://twitter.com/dwchen', 'contact'),
(7, 'DW YouTube Chanel', 'youtube', 'http://youtube.ca', 'contact'),
(9, 'asdf Facebook club', 'facebook', 'http://www.facebook.com/dingwen.chen', 'contact'),
(10, 'DW Chen', 'twitter', 'http://www.facebook.com/dingwen.chen', 'single_artist');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `dateadded`) VALUES
(1, 'image', '0000-00-00 00:00:00'),
(2, 'media', '0000-00-00 00:00:00'),
(3, 'file', '0000-00-00 00:00:00');

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

INSERT INTO `web_profile` (`id`, `name`, `tagline`, `welcome_title`, `welcome_message`, `contact_email`, `homepage_file`, `meta_keywords`, `meta_title`, `meta_description`) VALUES
(1, 'Ding-Wen Chen', 'This is my template system', 'What the heck!', 'CodeIgniter provides a comprehensive form validation and data prepping class that helps minimize the amount of code you''ll write.', 'dingwen@zenhousemedia.com', 'Vancouver-2010-Robson-Square.jpg', 'first second', 'Template site', 'CodeIgniter provides a comprehensive form validation and data prepping class that helps minimize the amount of code you''ll write.');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

DROP TABLE IF EXISTS `web_settings`;
CREATE TABLE IF NOT EXISTS `web_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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

INSERT INTO `web_settings` (`id`, `sharethis`, `sharethis_enable`, `google_analytics`, `google_analytics_enable`, `google_api_key`) VALUES
(1, '', 1, 'UA-16845399-1', 0, '');
