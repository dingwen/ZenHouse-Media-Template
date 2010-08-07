-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2010 at 12:57 PM
-- Server version: 5.1.44
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `fairview`
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

INSERT INTO `abouts` VALUES(1, 'Drug testing is now part of CFL, players'' new collective agreement', '', 'live', '<p>The Canadian Football League and the league''s players'' association have agreed on a new four-year collective bargaining agreement that will include year-round testing for performance enhancing drugs.<br />The terms of the agreement were revealed Tuesday at a joint news conference hosted by representatives of the CFL and the Canadian Football League Players'' Association.<br />"This CBA represents a major step forward for our league, and it is a testament to the spirit of partnership that exists between the CFL and the CFLPA, a partnership that flows out of a shared passion for our game and commitment to our fans," said Mark Cohon, commissioner of the CFL.<br />CFLPA President Stu Laird said the agreement represents progress for both sides and a renewed spirit of co-operation.<br />"We''re moving forward together under an agreement that helps our players and helps our league," Laird said.<br />For the first time, the Canadian Football League has a drug testing policy, with the first step introducing an education program for all players in 2010.<br />Random testing begins in 2011, with 25 per cent of all players tested that year, and 35 per cent to be tested in 2012 and 2013.<br />Upon a first offence, a player will automatically be subjected to mandatory testing and an assessment, followed by counselling.<br />A second offence triggers a three-game suspension, a third offence a one-year suspension, and a fourth offence a lifetime ban.<br />The agreement replaces the provision that had required the league to devote at least 56 per cent of defined gross revenue to players'' salaries with negotiated minimum team salary and annual increases in the salary cap.</p>', '', '', '', 'Drug-testing-is-now-part-of-CFL--players--new-collective-agreement', 0);
INSERT INTO `abouts` VALUES(2, 'Testing 1', '', 'live', '<p>Some content</p>', '', '', '', 'Testing-1', 5);
INSERT INTO `abouts` VALUES(3, 'Testing 2', '', 'live', '<p>Some content</p>', '', '', '', 'Testing-2', 10);
INSERT INTO `abouts` VALUES(4, 'Testing 3', '', 'live', '<p>Some content</p>', '', '', '', 'Testing-3', 15);

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

INSERT INTO `artists` VALUES(1, 'Ding Wen', 'Chen', '["a@b.com","a@b.com",""]', 'Vancouver-2010-Robson-Square.jpg', 'Creates an opening form tag with a base URL built from your config preferences. It will optionally let you add form attributes and hidden input fields.<br><br>The main benefit of using this tag rather than hard coding your own HTML is that it permits your site to be more portable in the event your URLs ever change.', '12345', '4500 Kingsway', 'Burnaby', 'BC', 'Canada', 'V5A 5G5', '[["cell","6041234567"],["fax",""],["phone","6041234567"]]', 'Some Title', 'Creates an opening form tag with a base URL built from your config preferences. It will optionally let you add form attributes and hidden input fields.<br><br>The main benefit of using this tag rather than hard coding your own HTML is that it permits your site to be more portable in the event your URLs ever change.', '', '', '');

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

INSERT INTO `categories` VALUES(16, 1, 'cate 7', -100);
INSERT INTO `categories` VALUES(15, 2, 'cate 6', -100);
INSERT INTO `categories` VALUES(3, 0, 'news', -100);
INSERT INTO `categories` VALUES(12, 2, 'cate 3', -100);
INSERT INTO `categories` VALUES(10, 1, 'cate 1', 5);
INSERT INTO `categories` VALUES(2, 0, 'events', -100);
INSERT INTO `categories` VALUES(14, 1, 'cate 5', -100);
INSERT INTO `categories` VALUES(11, 1, 'cate 2', -100);
INSERT INTO `categories` VALUES(1, 0, 'about', -100);
INSERT INTO `categories` VALUES(17, 1, 'cate 8', 10);
INSERT INTO `categories` VALUES(18, 1, 'cate 9', -100);
INSERT INTO `categories` VALUES(19, 1, 'cate 10', -100);
INSERT INTO `categories` VALUES(20, 3, 'cate 11', -100);
INSERT INTO `categories` VALUES(21, 3, 'cate 12', -100);
INSERT INTO `categories` VALUES(22, 1, 'cate 13', -100);
INSERT INTO `categories` VALUES(23, 1, 'some cate 14', 0);
INSERT INTO `categories` VALUES(25, 2, 'cate 16', -100);
INSERT INTO `categories` VALUES(26, 1, 'cate 17', -100);
INSERT INTO `categories` VALUES(27, 1, 'cate 18', -100);
INSERT INTO `categories` VALUES(28, 2, 'new cate 12', -100);
INSERT INTO `categories` VALUES(29, 2, 'cate 1', -100);

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

INSERT INTO `contact` VALUES(1, '12345', '4000 Kingsway', 'Burnaby', 'BC', 'Canada', 'V5A 5G5', '["1231234567","adsfasd","1231234567"]', '', '["a@b.com","","a@b.com"]');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `description` text,
  `status` varchar(5) NOT NULL DEFAULT 'draft',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_keywords` varchar(250) NOT NULL DEFAULT '',
  `meta_title` varchar(250) NOT NULL DEFAULT '',
  `meta_description` varchar(250) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '-100',
  `slug` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` VALUES(10, 'Testing One', 'Some testing and make it over 20 characters.', 'live', '2010-07-17 22:08:36', '', '', '', -100, 'Testing-One');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `image_name` varchar(250) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL DEFAULT '',
  `specs` varchar(250) NOT NULL DEFAULT '',
  `sort` int(11) DEFAULT '-100',
  `gallery_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` VALUES(14, 'Beans', 'Sushi_conv_4 copy.jpg', 'Some beans', '', -100, 10);
INSERT INTO `images` VALUES(11, 'Sushi', 'Sushi_conv_6.jpg', 'Ya Sushi', '', -100, 10);
INSERT INTO `images` VALUES(12, 'Fish', 'Sushi_conv_5.jpg', 'Oh~~ Fish', '', -100, 10);
INSERT INTO `images` VALUES(13, 'Conveyor overview', 'Sushi_c2 copy.jpg', 'conveyor overview', '', -100, 10);
INSERT INTO `images` VALUES(15, 'Desert', 'Sushi_conv_3 copy.jpg', 'Yes, need some of these.', '', -100, 10);
INSERT INTO `images` VALUES(16, 'Tunnel', 'DSC_9585.jpg', 'Move to tunnel', '', -100, 10);

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

INSERT INTO `news` VALUES(1, 'Server-side processing', '', '<p>There are times when reading data from the DOM is simply to slow or unwieldy, particularly when dealing with data sets of a thousand rows or more. To address this DataTables'' server-side processing feature provides a method to let all the "heavy lifting" be done by a database engine on the server-side (they are after-all highly optimised for exactly this kind of thing), and then have that information drawn in the user''s web-browser. As such you can display tables consisting of millions of rows with ease.</p>', '2010-06-15 11:54:00', 'live', '2010-06-28 17:09:31', '', '', '', 'Server-side-processing');
INSERT INTO `news` VALUES(2, 'erver-side processing', '', '<p>There are times when reading data from the DOM is simply to slow or unwieldy, particularly when dealing with data sets of a thousand rows or more. To address this DataTables'' server-side processing feature provides a method to let all the "heavy lifting" be done by a database engine on the server-side (they are after-all highly optimised for exactly this kind of thing), and then have that information drawn in the user''s web-browser. As such you can display tables consisting of millions of rows with ease.</p>', '2009-06-15 11:54:00', 'live', '2010-06-28 17:56:30', '', '', '', 'erver-side-processing');
INSERT INTO `news` VALUES(3, 'Server''s Side Processing', '', '<p>There are times when reading data from the DOM is simply to slow or unwieldy, particularly when dealing with data sets of a thousand rows or more. To address this DataTables'' server-side processing feature provides a method to let all the "heavy lifting" be done by a database engine on the server-side (they are after-all highly optimised for exactly this kind of thing), and then have that information drawn in the user''s web-browser. As such you can display tables consisting of millions of rows with ease.</p>', '2010-06-15 11:54:00', 'draft', '2010-06-28 17:10:27', '', '', '', 'Server-s-Side-Processing');
INSERT INTO `news` VALUES(40, 'processing', '20', '', '2010-06-28 17:32:27', 'live', '2010-06-28 17:32:27', '', '', '', 'processing');
INSERT INTO `news` VALUES(41, 'Testing', '20', '', '2010-06-28 17:37:31', 'live', '2010-06-28 17:37:31', '', '', '', 'Testing');
INSERT INTO `news` VALUES(39, 'Problem with Uploadify', '20', '<p><img src="application/uploads/assets/Some Kinda Pasta.JPG" alt="" />We''ve been hearing about OnLive''s cloud-based service for more than a year now. The company claims it can offer the latest games on demand, without a need for meaty hardware requirements on the client end. Could this really be the end of high-end PCs?</p>', '2010-06-26 21:44:38', 'live', '2010-07-06 15:40:55', '', '', '', 'Problem-with-Uploadify');

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

INSERT INTO `social_media_links` VALUES(2, 'Ding-Wen Chen Twitter', 'facebook', 'http://twitter.com/dwchen', 'contact');
INSERT INTO `social_media_links` VALUES(4, 'DW Chen Twitter', 'youtube', 'http://twitter.com/dwchen', 'contact');
INSERT INTO `social_media_links` VALUES(5, 'DW Chen Twitter', 'twitter', 'http://twitter.com/dwchen', 'contact');
INSERT INTO `social_media_links` VALUES(6, 'DW Chen Twitter', 'myspace', 'http://twitter.com/dwchen', 'contact');
INSERT INTO `social_media_links` VALUES(7, 'DW YouTube Chanel', 'youtube', 'http://youtube.ca', 'contact');
INSERT INTO `social_media_links` VALUES(9, 'asdf Facebook club', 'facebook', 'http://www.facebook.com/dingwen.chen', 'contact');
INSERT INTO `social_media_links` VALUES(10, 'DW Chen', 'twitter', 'http://www.facebook.com/dingwen.chen', 'single_artist');

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

INSERT INTO `type` VALUES(1, 'image', '0000-00-00 00:00:00');
INSERT INTO `type` VALUES(2, 'media', '0000-00-00 00:00:00');
INSERT INTO `type` VALUES(3, 'file', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL DEFAULT '',
  `last_name` varchar(45) NOT NULL DEFAULT '',
  `title` varchar(45) NOT NULL DEFAULT 'staff',
  `role` varchar(5) NOT NULL DEFAULT 'user',
  `password` varchar(40) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(5, 'Ding-Wen', 'Chen', 'Developer', 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 'admin');

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

INSERT INTO `web_settings` VALUES(1, '', 1, 'UA-16845399-1', 0, '');
