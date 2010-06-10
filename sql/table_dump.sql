CREATE DATABASE  IF NOT EXISTS `zhm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `zhm`;
-- MySQL dump 10.13  Distrib 5.1.40, for Win32 (ia32)
--
-- Host: localhost    Database: zhm
-- ------------------------------------------------------
-- Server version	5.1.33-community

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (16,1,'cate 7'),(15,2,'cate 6'),(13,2,'cate 4'),(12,2,'cate 3'),(10,1,'cate 1'),(2,0,'events'),(14,1,'cate 5'),(11,1,'cate 2'),(1,0,'about'),(17,1,'cate 8'),(18,1,'cate 9'),(19,1,'cate 10'),(20,1,'cate 11'),(21,1,'cate 12'),(22,1,'cate 13'),(23,1,'some cate 14'),(25,1,'cate 16'),(26,1,'cate 17'),(27,1,'cate 18'),(28,2,'new cate 12'),(29,2,'cate 1');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web_settings`
--

DROP TABLE IF EXISTS `web_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_enable` tinyint(1) DEFAULT '0',
  `sharethis` text,
  `sharethis_enable` tinyint(1) DEFAULT '0',
  `google_analytics` varchar(20) DEFAULT '',
  `google_analytics_enable` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_settings`
--

LOCK TABLES `web_settings` WRITE;
/*!40000 ALTER TABLE `web_settings` DISABLE KEYS */;
INSERT INTO `web_settings` VALUES (1,1,'<script type=\"text/javascript\" src=\"http://w.sharethis.com/button/sharethis.js#publisher=b86c897d-fff1-4bb6-9981-82d9351341bd&amp;type=website&amp;post_services=email%2Cfacebook%2Ctwitter%2Cgbuzz%2Cmyspace%2Cdigg%2Csms%2Cwindows_live%2Cdelicious%2Cstumbleupon%2Creddit%2Cgoogle_bmarks%2Clinkedin%2Cbebo%2Cybuzz%2Cblogger%2Cyahoo_bmarks%2Cmixx%2Ctechnorati%2Cfriendfeed%2Cpropeller%2Cwordpress%2Cnewsvine\"></script>',0,'UA-16845399-1',1);
/*!40000 ALTER TABLE `web_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web_profile`
--

DROP TABLE IF EXISTS `web_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web_profile` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_profile`
--

LOCK TABLES `web_profile` WRITE;
/*!40000 ALTER TABLE `web_profile` DISABLE KEYS */;
INSERT INTO `web_profile` VALUES (1,'Ding-Wen Chen Template Site','Wow! Watch Out!','Haha I am the man!','CodeIgniter provides a comprehensive form validation and data prepping class that helps minimize the amount of code you\'ll write.','dingwen@zenhousemedia.com','Vancouver-2010-Robson-Square.jpg','first second','Template site','CodeIgniter provides a comprehensive form validation and data prepping class that helps minimize the amount of code you\'ll write.');
/*!40000 ALTER TABLE `web_profile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-06-09 20:24:42
