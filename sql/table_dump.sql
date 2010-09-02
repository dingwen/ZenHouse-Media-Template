-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2010 at 09:51 AM
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
  `link_name` varchar(250) NOT NULL DEFAULT '',
  `category` varchar(45) NOT NULL DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT 'draft',
  `content` text,
  `meta_keywords` varchar(250) NOT NULL DEFAULT '',
  `meta_title` varchar(250) NOT NULL DEFAULT '',
  `meta_description` varchar(250) NOT NULL DEFAULT '',
  `slug` varchar(250) NOT NULL DEFAULT '',
  `weight` int(11) NOT NULL DEFAULT '-100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `link_name`, `category`, `status`, `content`, `meta_keywords`, `meta_title`, `meta_description`, `slug`, `weight`) VALUES
(1, 'Create unique, organic textures with Kroma Crackle', 'Home', '17', 'live', '<p class="MsoNormal" style="text-align: justify;">&nbsp;</p>\n<p class="MsoNormal" style="text-align: justify;"><img style="vertical-align: text-bottom;" src="http://crackle.zenhousemedia.com/application/uploads/assets/IMG_6628_2.jpg" alt="" width="200" height="201" />&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<img style="vertical-align: text-bottom; float: left;" src="http://crackle.zenhousemedia.com/application/uploads/assets/IMG_6667.jpg" alt="" width="200" height="201" />&nbsp;&nbsp;&nbsp;&nbsp;<img style="vertical-align: text-bottom; float: left;" src="http://crackle.zenhousemedia.com/application/uploads/assets/IMG_6637.jpg" alt="" width="200" height="200" /></p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>KROMA Crackle is a versatile, professional quality material suitable for all kinds of fine art applications and craft projects. It is a semi-opaque gel&nbsp;that develops fine cracking patterns as it dries. It can be applied to both rigid and flexible surfaces and once dry and sealed is both durable and highly flexible. KROMA crackle can be coloured by adding small amounts of acrylic paint before application or by painting over the crackle once it has dried. Experimenting with application methods can influence the texture of the crackle to achieve different looks with limitless creative possibilities.&nbsp;</p>\n<!--EndFragment-->', '', 'Kroma Crackle | Create unique, organic textures with Kroma Crackle', 'Kroma Crackle | Create unique, organic textures with Kroma Crackle', 'Create-unique--organic-textures-with-Kroma-Crackle', 0),
(2, 'Sample Textures', 'Gallery', '17', 'live', '<p><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6630_2.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6629_2.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6631_2.jpg" alt="" width="200" height="200" /></p>\n<p><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6632_2.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6633_2.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6635.jpg" alt="" width="200" height="200" /></p>\n<p><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6636.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6637.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6638.jpg" alt="" width="200" height="200" /></p>\n<p><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6639.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6640.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6641.jpg" alt="" width="200" height="200" /></p>\n<p><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6642.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6643.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6644.jpg" alt="" width="200" height="200" /></p>\n<p><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6651.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6662.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6663.jpg" alt="" width="200" height="200" /></p>\n<p><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6664.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6665.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6666.jpg" alt="" width="200" height="200" /></p>\n<p><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6667.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6668.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6669.jpg" alt="" width="200" height="200" /></p>\n<p><img src="http://www.kromacrackle.com/application/uploads/assets/sdfgdfg.jpg" alt="" width="200" height="200" /><img src="http://www.kromacrackle.com/application/uploads/assets/IMG_6947.JPG" alt="" width="200" height="200" /></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>', '', 'Kroma Crackle Medium | Sample Textures', 'kroma crackle sample textures', 'Sample-Textures', 10),
(3, 'Frequently Asked Questions', 'FAQ', '17', 'live', '<!--StartFragment-->\n<p class="MsoNormal"><!--StartFragment--></p>\n<p class="MsoNormal">Q: How thick should I apply KROMA crackle?</p>\n<p class="MsoNormal">A: KROMA crackle should be applied between 2mm and 5mm thick. While very thick application will create wider cracks, KROMA crackle is best used for subtler effects with cracks that will range between one millimeter to three millimeters.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q:<span style="mso-spacerun: yes;">&nbsp; </span>How do I apply KROMA crackle to a surface?</p>\n<p class="MsoNormal">A:<span style="mso-spacerun: yes;">&nbsp; </span>If the layer of crackle gel is too thin very little cracking will occur or the cracks will be hardly visible. To ensure a thick enough layer is applied we recommend using a palette knife or similar tool to spread the crackle gel. Using a brush tends to make it more difficult to achieve a layer of adequate thickness for effective cracking to occur.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: How do I clean up KROMA Crackle?</p>\n<p class="MsoNormal">A: KROMA crackle is water based and cleans up easily using soap and water.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: How long does it take to dry? Can I speed up the drying time?</p>\n<p class="MsoNormal">A: KROMA crackle can take between one and three days to dry. This will depend on the surface it is drying on, the thickness of its application, and the environment in which it is drying. More absorbent surfaces seem to take longer to dry, while well-sealed surfaces have shorter drying times. Thicker application will take considerably more time to dry than thinner application. Speeding up the drying time is not recommended as it may interfere with the cracking process.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: Can I add colour to KROMA crackle?</p>\n<p class="MsoNormal">A: Yes! Adding colour to KROMA crackle creates very interesting possibilities. By adding small amounts of acrylic paint - up to 10% or just enough to colour the gel, Working with<span style="mso-spacerun: yes;">&nbsp; </span>light/dark or contrasting colour combinations can emphasize the appearance of the cracks. Metallic colours can be particularly effective. You can create unusual&ldquo;marble&rdquo; type effects by swirling together portions of differently coloured crackle gel. Alternatively colour effects can be achieved by using the crackle gel straight from the tube, allowing it to dry fully and then applying colour using any combination of washes, stains, or dry brush techniques.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: Is it easy to use?</p>\n<p class="MsoNormal">A: KROMA crackle is fun and easy to use! We recommend experimenting to get used to its unique properties. Effects can be achieved that emulate unusual textures such as lizardskin or simulate the effects of aged paint or glaze. KROMA crackle can be used to add textural interest to abstract paintings, mixed media collages, image transfers, or elaborate scrapbook pages. The possibilities are endless.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: Can I use any brand of paint with KROMA crackle?</p>\n<p class="MsoNormal">A: Any brand of acrylic paint can be used with KROMA crackle, though we recommend using a high quality grade of acrylic paint. In fact once it is completely dry and sealed, other kinds of paint can be used to colour the cracked surface including watercolours, inks or oil paints.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: Is it archival quality?</p>\n<p class="MsoNormal">A: Once fully dry and sealed with acrylic fluid medium, the result will be both archival quality and flexible.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: If I apply KROMA crackle over my painting, will it &ldquo;crack&rdquo; the paint?</p>\n<p class="MsoNormal">A: No. To gain this effect you must apply KROMA crackle to the canvas before you set out to paint. Allowing this layer of crackle to dry completely before sealing, and beginning to paint. A dry brush painting technique will allow the paint to sit on the surface of the upper, cracked layer. Washes can be used to colour the underlayer, flooding in between the cracks, and can be rubbed off the cracked upper surface before the colour dries.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: What is the difference between the effects of KROMA crackle and other brands of crackle medium?</p>\n<p class="MsoNormal">A: Unlike other crackle products KROMA crackle is not a heavy paste but a semi opaque gel. Because it can be used on flexible surfaces and remains flexible once dry and sealed it is very versatile and suitable for all kinds of projects. Other crackle pastes are designed for use only on rigid surfaces and form a pattern of cracks that are less subtle and more widely spaced, with an absorbent, dull surface.</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: What sizes are available? How much do they cost?</p>\n<p class="MsoNormal">A: KROMA crackle is available in 3 sizes:</p>\n<p class="MsoNormal"><span style="mso-spacerun: yes;">&nbsp;</span>150ml tube - $ 7.50 Cdn</p>\n<p class="MsoNormal"><span style="mso-spacerun: yes;">&nbsp;</span>250ml tube - $ 9.00 Cdn</p>\n<p class="MsoNormal"><span style="mso-spacerun: yes;">&nbsp;</span>500ml jar - $15.00 Cdn</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Q: Where is KROMA crackle made?</p>\n<p class="MsoNormal">A: KROMA crackle is made in Vancouver, B.C. Canada by Kroma Industries.&nbsp;</p>\n<!--EndFragment-->\n<p>&nbsp;</p>\n<!--EndFragment-->', '', 'Kroma Crackle Medium | Questions', 'Kroma Crackle, Frequently asked questions', 'Frequently-Asked-Questions', 20),
(4, 'About Us', 'About Us', '10', 'live', '<!--StartFragment-->\n<p class="MsoNormal">Kroma Crackle is made by hand in small batches in our workshop on Granville Island in Vancouver, B.C. Canada. Kevin Head, owner of KROMA Industries, developed the medium in 2008 as a tool for artists to expand their acrylic toolbox. It is a high quality, archival material suitable for fine art and craft purposes.</p>\n<!--EndFragment-->', '', 'Kroma Crackle Medium |  About Us', '', 'About-Us', 25),
(5, 'To Order or Contact Us with Questions:', 'Contact Us', '10', 'live', '<!--StartFragment-->\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Call Toll free: 1 888 669 4030</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Email:<span style="mso-spacerun: yes;">&nbsp;&nbsp; </span>info@kromaacrylics.com</p>\n<p class="MsoNormal">&nbsp;</p>\n<p class="MsoNormal">Mail:</p>\n<p class="MsoNormal">KROMA Industries</p>\n<p class="MsoNormal">1649 Duranleau Street</p>\n<p class="MsoNormal">Granville Island</p>\n<p class="MsoNormal">Vancouver, B.C.</p>\n<p class="MsoNormal">V6H 3S3</p>\n<!--EndFragment-->', '', 'Kroma Crackle - Contact Us', 'kroma crackle contact us', 'To-Order-or-Contact-Us-with-Questions-', 30),
(6, 'Artists Using Crackle', 'Artists Using Crackle', '10', 'draft', '<p>&nbsp;</p>\n<div>\n<p style="text-align: left;">&nbsp;&nbsp;Coming Soon...</p>\n</div>', '', 'Kroma Crackle Medium | Artists Using Crackle', 'Samples of work by artists using Kroma Crackle medium', 'Artists-Using-Crackle', 15),
(7, 'Testing 6', '', '23', 'draft', '<p>Some content</p>', '', '', '', 'Testing-6', 40),
(8, 'Testing 7', '', '23', 'draft', '<p>Some content</p>', '', '', '', 'Testing-7', 35),
(10, 'How to Use KROMA Crackle', 'How to Use', '', 'live', '<!--StartFragment-->\n<p class="MsoListParagraphCxSpFirst" style="text-indent: -18.0pt; mso-list: l0 level1 lfo1;"><!--StartFragment--></p>\n<p><span style="font: 7.0pt &quot;Times New Roman&quot;;">&nbsp;&nbsp; &nbsp;<img id="Kroma Crackle | How-To" longdesc="Kroma Crackle | How-To" src="http://crackle.zenhousemedia.com/application/uploads/assets/instructions.jpg" alt="" /></span></p>\n<!--EndFragment-->\n<p>&nbsp;</p>\n<!--EndFragment-->', '', 'Kroma Crackle Medium | How To Use Kroma Crackle', 'Kroma Crackle How To Guide', 'How-to-Use-KROMA-Crackle', 5);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `first_name`, `last_name`, `emails`, `photo`, `bio`, `unit_no`, `address`, `city`, `region`, `country`, `postcode`, `phones`, `addtional_title`, `addtional_content`, `meta_keywords`, `meta_title`, `meta_description`) VALUES
(1, 'Ding Wen', 'Chen', '["a@b.com","a@b.com",""]', 'Vancouver-2010-Robson-Square.jpg', 'Creates an opening form tag with a base URL built from your config preferences. It will optionally let you add form attributes and hidden input fields.<br><br>The main benefit of using this tag rather than hard coding your own HTML is that it permits your site to be more portable in the event your URLs ever change.', '12345', '4500 Kingsway', 'Burnaby', 'BC', 'Canada', 'V5A 5G5', '[["cell","6041234567"],["fax",""],["phone","6041234567"]]', 'Some Title', 'Creates an opening form tag with a base URL built from your config preferences. It will optionally let you add form attributes and hidden input fields.<br><br>The main benefit of using this tag rather than hard coding your own HTML is that it permits your site to be more portable in the event your URLs ever change.', '', '', ''),
(3, 'Buster', 'Dummy', '["dummy@abc.com","dummy@abc.com","dummy@abc.com"]', 'Little+League+World+Series+oaX3e3Q3CMql1.jpg', '<p>From mythbusters, buster is the best testing buddy in the world</p>', '', '4500 Kingsway', 'Burnaby', 'BC', 'Canada', 'V5H 2A6', '[["phone","6044565678"],["phone","7782343456"],["cell",""]]', 'Purchase information', '<p>Please contace me witht the phone number provided in the contact section for purchase information.</p>', '', '', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `weight`) VALUES
(16, 1, 'cate 7', -100),
(15, 2, 'cate 6', -100),
(3, 0, 'news', -100),
(12, 2, 'cate 3', -100),
(10, 1, 'cate 1', 5),
(2, 0, 'events', -100),
(14, 1, 'cate 5', -100),
(11, 1, 'cate 2', -100),
(1, 0, 'about', -100),
(17, 1, 'cate 8', 10),
(18, 1, 'cate 9', -100),
(19, 1, 'cate 10', -100),
(20, 3, 'cate 11', -100),
(21, 3, 'cate 12', -100),
(22, 1, 'cate 13', -100),
(23, 1, 'some cate 14', 0),
(25, 2, 'cate 16', -100),
(26, 1, 'cate 17', -100),
(27, 1, 'cate 18', -100),
(28, 2, 'new cate 12', -100),
(29, 2, 'cate 1', -100),
(4, 0, 'gallery', -100),
(30, 4, 'gallery 1', 5),
(31, 4, 'gallery 2', 0);

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
(1, '104', '7188 Progress Way', 'Delta', 'BC', 'Canada', 'V4G 1M6', '["(604) 940-4211","",""]', 'Message from Fairview Conveyor website', '["info@fairviewconveyor.com","",""]');

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
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `category` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text,
  `status` varchar(5) NOT NULL DEFAULT 'draft',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_keywords` varchar(250) NOT NULL DEFAULT '',
  `meta_title` varchar(250) NOT NULL DEFAULT '',
  `meta_description` varchar(250) NOT NULL DEFAULT '',
  `weight` int(11) NOT NULL DEFAULT '-100',
  `slug` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `category`, `description`, `status`, `timestamp`, `meta_keywords`, `meta_title`, `meta_description`, `weight`, `slug`) VALUES
(1, 'Bucket Elevator', 30, '<p>To vertically move product such as powder, peas, spices, grains etc.</p>', 'live', '2010-08-31 02:44:22', '', '', '', 0, 'Bucket-Elevator'),
(2, 'Sushi Conveyor', 0, 'For self-serve restaurant use.', 'live', '2010-08-31 02:44:22', '', '', '', 25, 'Sushi-Conveyor'),
(4, 'Modular Conveyor Belting', 0, 'Maintenance free, positive tracking.', 'draft', '2010-07-20 19:20:56', '', '', '', -100, 'Modular-Conveyor-Belting'),
(5, 'Rotary Accumulation Conveyor', 0, 'Used as a holding station prior to feeding product to a filler.<br><br><input id="gwProxy" type="hidden"><!--Session data--><input onclick="jsCall();" id="jsProxy" type="hidden"><div id="refHTML"></div>', 'live', '2010-08-31 02:44:22', '', '', '', 0, 'Rotary-Accumulation-Conveyor'),
(6, 'Top Tail Carrot Cutter', 0, 'chop, chop, chop', 'live', '2010-08-31 02:44:22', '', '', '', 5, 'Top-Tail-Carrot-Cutter'),
(8, 'Positive Drive Conveyor Belts', 31, '<p>Thermal plastic seamless belting, ideal for the high sanitation<br />requirements in the food industry.<br /><br /><input id="gwProxy" type="hidden" /></p>\n<!--Session data-->\n<p><input id="jsProxy" onclick="jsCall();" type="hidden" /></p>', 'live', '2010-08-31 02:45:47', '', '', '', 0, 'Positive-Drive-Conveyor-Belts'),
(9, 'Roller Conveyor', 31, '<p>For easily moving cartons/boxes.</p>', 'live', '2010-08-31 02:45:47', '', '', '', 5, 'Roller-Conveyor'),
(10, 'Stainless Steel Processing Tables', 0, 'Food processing tables, any size, any shape, wheels/no wheels, whatever.', 'live', '2010-08-31 02:44:22', '', '', '', 10, 'Stainless-Steel-Processing-Tables'),
(11, 'Tomatoes Inspection Conveyor', 0, 'Self-explanatory', 'live', '2010-08-31 02:44:22', '', '', '', 15, 'Tomatoes-Inspection-Conveyor'),
(12, 'Fruit Conveyor', 0, 'Used for processing any kind of fruit.', 'live', '2010-08-31 02:44:22', '', '', '', 20, 'Fruit-Conveyor'),
(13, 'Lidding Machine', 0, '', 'draft', '2010-07-20 19:21:50', '', '', '', -100, 'Lidding-Machine');

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
  `weight` int(11) DEFAULT '-100',
  `gallery_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `image_name`, `description`, `specs`, `weight`, `gallery_id`) VALUES
(21, 'Bucket Elevator II', 'Bucket_Elevator_7 copy.jpg', 'Pink is a practical choice...', '', 5, 1),
(22, '', 'Bucket_Elevator_4 copy.jpg', '', '', 10, 1),
(20, '', 'Bucket_Elevtor_1 copy.jpg', '', '', 15, 1),
(19, '', 'Bucket_Elevtor_3 copy.jpg', '', '', 20, 1),
(18, '', 'Bucket_elevator_5 copy.jpg', '', '', 30, 1),
(17, '', 'Bucket_Elevator_6 copy.jpg', '', '', 35, 1),
(29, '', 'Bucket_Elevator_9 copy.jpg', '', '', 70, 1),
(31, 'Bucket Elevator II', 'Bucket_Elevtor_2 copy1.jpg', 'This is the Bucket Elevator. Why pink? Why not!', '', 0, 1),
(34, '', 'DSC_9585.jpg', '', '', 25, 2),
(59, '', 'Carrot_pealer_2 copy.jpg', '', '', -100, 6),
(36, '', 'Sushi_c2 copy.jpg', '', '', 10, 2),
(58, '', 'Carrot Pealer copy.jpg', '', '', -100, 6),
(39, '', 'Sushi_conv_1 copy.jpg', '', '', 0, 2),
(41, '', 'Sushi_conv_2 copy.jpg', '', '', 15, 2),
(56, '', 'Chef_Ann_1 copy.jpg', '', '', -100, 5),
(57, '', 'Chef_Ann_2 copy.jpg', '', '', -100, 5),
(44, '', 'Sushi_conv_3 copy.jpg', '', '', 20, 2),
(55, '', 'Chef_Ann copy.jpg', '', '', -100, 5),
(46, '', 'Sushi_conv_4 copy_1.jpg', '', '', 5, 2),
(54, '', 'Chef Ann copy.jpg', '', '', -100, 5),
(48, '', 'Sushi_conv_5_1.jpg', '', '', 30, 2),
(50, '', 'Sushi_conv_6_1.jpg', '', '', 35, 2),
(51, '', 'Sushi_conv_model.jpg', '', '', 40, 2),
(53, '', 'Chef _ann_belt_cropped copy.jpg', '', '', -100, 5),
(79, '', 'Positive Drive 15.jpg', '', '', -100, 8),
(78, '', 'Positive Drive 16.jpg', '', '', -100, 8),
(77, '', 'Positive Drive 4.jpg', '', '', -100, 8),
(76, '', 'Positive Drive 10.jpg', '', '', -100, 8),
(75, '', 'Positive Drive 12.jpg', '', '', -100, 8),
(74, '', 'Positive Drive 3.jpg', '', '', -100, 8),
(73, '', 'Positive Drive 8.jpg', '', '', -100, 8),
(72, '', 'Positive Drive 2.jpg', '', '', -100, 8),
(71, '', 'Positive Drive 5.jpg', '', '', -100, 8),
(70, '', 'Positive Drive 1.jpg', '', '', -100, 8),
(80, '', 'Positive Drive 21.jpg', '', '', -100, 8),
(81, '', 'Positive Drive 18.jpg', '', '', -100, 8),
(82, '', 'Positive Drive 19.jpg', '', '', -100, 8),
(83, '', 'Positive Drive 20.jpg', '', '', -100, 8),
(84, '', 'Positive Drive 23.jpg', '', '', -100, 8),
(85, '', 'Positive Drive 17.jpg', '', '', -100, 8),
(86, '', 'Conveyor_3 copy.jpg', '', '', -100, 9),
(87, '', 'Conveyor_4 copy.jpg', '', '', -100, 9),
(88, '', 'Rollers copy.jpg', '', '', -100, 9),
(89, '', 'Conveyor_8 copy.jpg', '', '', -100, 9),
(90, '', 'Conveyor_5 copy.jpg', '', '', -100, 9),
(91, '', 'Fruit_lidding copy.jpg', '', '', -100, 10),
(92, '', 'Fruit_weight copy.jpg', '', '', -100, 10),
(93, '', 'Tomatoes_cropped copy.jpg', '', '', -100, 11),
(94, '', 'Tomatoes_cropped2 copy.jpg', '', '', -100, 11),
(95, '', 'Tomatoes copy.jpg', '', '', -100, 11),
(100, '', 'DSC_9952 copy.jpg', '', '', -100, 12),
(99, '', 'Fruit_Conveyor copy.jpg', '', '', -100, 12),
(101, '', 'Fruit_Conveyor_models copy.jpg', '', '', -100, 12),
(102, '', 'Fruit_model copy.jpg', '', '', -100, 12),
(103, '', 'Fruit_Conveyor_model2 copy.jpg', '', '', -100, 12),
(104, '', 'Conveyor_6 copy.jpg', '', '', -100, 13),
(105, '', 'Pressurized Lid copy.jpg', '', '', -100, 13),
(106, '', 'Fruit_lidding copy.jpg', '', '', -100, 13),
(107, '', 'Conveyors copy.jpg', '', '', -100, 13),
(108, '', 'Lidding_machine copy.jpg', '', '', -100, 13);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `category`, `content`, `publish_date`, `status`, `timestamp`, `meta_keywords`, `meta_title`, `meta_description`, `slug`) VALUES
(45, 'Coming Soon...', '', '<p>Coming Soon...</p>', '2010-07-19 18:19:56', 'live', '2010-07-19 18:19:56', '', '', '', 'Coming-Soon---');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `title`, `role`, `password`, `username`) VALUES
(1, 'Ding-Wen', 'Chen', 'Developer', 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 'admin');

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
(1, 'Fairview Conveyor Services Inc.', 'If you can imagine it, we can make it happen!', 'Welcome to Fairview Conveyor Services Inc., Manufacturers of Stainless Steel Food Processing Equipment, Vancouver Delta BC Canada', '<font size="4">We are here to help YOU. We specialize in stainless steel for the food industry and manufacture conveyor systems for product transfer, filling, bottling and packing.</font><br>Our plant is fully equipped with state of the art tools and we build from raw material to ensure quality at every step of the way. We have simplified conveyor design without compromising quality and function. Our machinery is simple to operate and easy to clean and maintain. In particular, we are recognized and appreciated for our problem-solving solutions, quality production values, excellent service and professionalism.', 'info@fairviewconveyor.com', 'Vancouver-2010-Robson-Square.jpg', 'manufacturing stainless steel food processing equipment belt conveyor machinery packaging industry Vancouver Delta BC Canada', 'Fairview Conveyor | Manufacturers of Stainless Steel Food Processing Equipment', 'Specializing in stainless steel machinery for the food industry, Fairview Conveyor manufactures conveyor systems for product transfer, filling, bottling and packing.');

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
(1, '<script type="text/javascript" src="http://w.sharethis.com/button/sharethis.js#publisher=19f15056-22f5-4ab6-a198-283918b57886&amp;type=website&amp;post_services=email%2Cfacebook%2Ctwitter%2Cgbuzz%2Cmyspace%2Cdigg%2Csms%2Cwindows_live%2Cdelicious%2Cstumbleupon%2Creddit%2Cgoogle_bmarks%2Clinkedin%2Cbebo%2Cybuzz%2Cblogger%2Cyahoo_bmarks%2Cmixx%2Ctechnorati%2Cfriendfeed%2Cpropeller%2Cwordpress%2Cnewsvine"></script>', 1, 'UA-17762579', 1, 'ABQIAAAAywNA3q2Ephbx2QS5Y76f7BQHAfomOshrEkiQSmmI94GCS4b2chRANGWsakr-SxzENaYKTLcGx6ne_w');
