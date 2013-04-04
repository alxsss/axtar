-- MySQL dump 10.13  Distrib 5.5.17, for Linux (i686)
--
-- Host: localhost    Database: wist
-- ------------------------------------------------------
-- Server version	5.5.17

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
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) NOT NULL DEFAULT '',
  `pass` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','01a85e70b179c3d73b5b742f0fb6c6b7');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_articles`
--

DROP TABLE IF EXISTS `blog_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_articles`
--

LOCK TABLES `blog_articles` WRITE;
/*!40000 ALTER TABLE `blog_articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_article_id` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL DEFAULT '',
  `body` mediumtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_comments`
--

LOCK TABLES `blog_comments` WRITE;
/*!40000 ALTER TABLE `blog_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `type` enum('grids','regions') NOT NULL DEFAULT 'grids',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`type`,`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `code` varchar(16) NOT NULL,
  `valid` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`code`),
  KEY `valid` (`valid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_key` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `parameters` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_key` (`email_key`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_templates`
--

LOCK TABLES `email_templates` WRITE;
/*!40000 ALTER TABLE `email_templates` DISABLE KEYS */;
INSERT INTO `email_templates` VALUES (1,'email_purchase_active','Purchase Confirmation (Active)','[site_name], [confirmation_number], [update_url], [email]'),(2,'email_purchase_pending','Purchase Confirmation (Pending)','[site_name], [confirmation_number], [update_url], [email]'),(3,'signup_confirm','Account Signup Confirmation','[site_name], [confirm_url], [first_name], [last_name]'),(4,'tell_a_friend','Tell a Friend','[site_name], [site_url], [from_name]'),(5,'retrieve_password','Retrieve Password','[site_name], [login_url], [email], [password]'),(6,'region_approval_notification','(Admin) Region Approval Notification','[site_name], [region_id], [region_url], [payment_method], [payment_id], [payment_url], [user_id], [user_url]'),(7,'cc_split_digits','(Admin) Credit Card Split Digits','[site_name], [payment_id], [payment_url], [cc_digits]'),(8,'renewal_reminder','Renewal Reminder','[site_name],[url],[update_url],[expires_at],[purge_at],[email]'),(10,'confirmation_free_pending','Confirmation for free customers (Pending) ','[site_url],[banner_url],[site_name],[confirmation_number],[update_url]'),(11,'confirmation_customers_active','Confirmation for free customers (Active) ','[site_url],[banner_url],[site_name],[confirmation_number],[update_url]');
/*!40000 ALTER TABLE `email_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grids`
--

DROP TABLE IF EXISTS `grids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `display_order` int(11) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `grid_color` varchar(32) NOT NULL DEFAULT '',
  `grid_transparency` int(11) NOT NULL DEFAULT '0',
  `background_color` varchar(32) NOT NULL DEFAULT '',
  `background_image` longblob,
  `background_thumbnail_image` longblob,
  `pixel_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `map` mediumtext NOT NULL,
  `pixels_used` int(11) NOT NULL DEFAULT '0',
  `is_dirty` tinyint(1) NOT NULL DEFAULT '0',
  `region_max_width` int(11) NOT NULL DEFAULT '0',
  `region_max_height` int(11) NOT NULL DEFAULT '0',
  `expire_days` int(11) NOT NULL DEFAULT '0',
  `reminder_days` int(11) NOT NULL DEFAULT '0',
  `purge_days` int(11) NOT NULL DEFAULT '0',
  `allow_free_paid` enum('true','false') NOT NULL DEFAULT 'false',
  `free_square` int(11) NOT NULL DEFAULT '0',
  `selectable_square_size` int(11) NOT NULL DEFAULT '10',
  `images_gallery` enum('0','1') NOT NULL DEFAULT '1',
  `region_min_width` smallint(6) NOT NULL DEFAULT '0',
  `region_min_height` smallint(6) NOT NULL DEFAULT '0',
  `back_links` enum('0','1') NOT NULL DEFAULT '0',
  `multi_get` enum('0','1') NOT NULL DEFAULT '0',
  `back_link` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `back_links` (`back_links`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grids`
--

LOCK TABLES `grids` WRITE;
/*!40000 ALTER TABLE `grids` DISABLE KEYS */;
INSERT INTO `grids` VALUES (1,'main',1,1000,1000,'E0E0E0',0,'F0F0F0','','',50.00,'',0,0,0,0,0,0,0,'false',0,10,'1',0,0,'0','0','<a href=\"whatisstringtheory.com\">whatisstringtheory.com</a>',NULL);
/*!40000 ALTER TABLE `grids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_texts`
--

DROP TABLE IF EXISTS `language_texts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language_texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `digest` varchar(32) NOT NULL DEFAULT '',
  `language_text` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `language_id` (`language_id`,`digest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_texts`
--

LOCK TABLES `language_texts` WRITE;
/*!40000 ALTER TABLE `language_texts` DISABLE KEYS */;
/*!40000 ALTER TABLE `language_texts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(8) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `decimal_point` varchar(8) NOT NULL DEFAULT '',
  `thousands_separator` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'en','English','.',',');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link_banners`
--

DROP TABLE IF EXISTS `link_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `html` text NOT NULL,
  `image` longblob,
  `mime_type` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link_banners`
--

LOCK TABLES `link_banners` WRITE;
/*!40000 ALTER TABLE `link_banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `link_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link_links`
--

DROP TABLE IF EXISTS `link_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `html` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link_links`
--

LOCK TABLES `link_links` WRITE;
/*!40000 ALTER TABLE `link_links` DISABLE KEYS */;
INSERT INTO `link_links` VALUES (1,'<a href=\"[site_url]\" target=\"_blank\">[site_name]</a>');
/*!40000 ALTER TABLE `link_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletters`
--

LOCK TABLES `newsletters` WRITE;
/*!40000 ALTER TABLE `newsletters` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `group` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `value` blob NOT NULL,
  PRIMARY KEY (`group`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES ('categories','grids','0'),('categories','regions','0'),('categories','regions_grid_filter','0'),('discounts','enabled','0'),('discounts','percent',''),('get_pixels','cancel','0'),('grids','approval_required','0'),('grids','approval_user_update','0'),('meta_tags','author','AK'),('meta_tags','copyright','whatisstringtheory.com'),('meta_tags','description','Documentary on Advanced Branch of Physics'),('meta_tags','keywords','String Theory, Physics, Documentary'),('meta_tags','robots','index, follow'),('regions','description','0'),('regions','region_page','0'),('regions','tooltip_image','0'),('regions','user_delete','0'),('region_page','link','0'),('server','timezone','America/Los_Angeles'),('users','user_page','0');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_configs`
--

DROP TABLE IF EXISTS `payment_configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_configs` (
  `configuration_id` int(11) NOT NULL AUTO_INCREMENT,
  `configuration_key` varchar(64) NOT NULL DEFAULT '',
  `configuration_value` varchar(255) NOT NULL DEFAULT '',
  `module_key` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`configuration_id`),
  UNIQUE KEY `configuration_key` (`configuration_key`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_configs`
--

LOCK TABLES `payment_configs` WRITE;
/*!40000 ALTER TABLE `payment_configs` DISABLE KEYS */;
INSERT INTO `payment_configs` VALUES (13,'MODULE_PAYMENT_2CHECKOUT_LOGIN','99999','pm2checkout'),(14,'MODULE_PAYMENT_2CHECKOUT_TESTMODE','0','pm2checkout'),(15,'MODULE_PAYMENT_2CHECKOUT_URL','https://www.2checkout.com/2co/buyer/purchase','pm2checkout'),(16,'MODULE_PAYMENT_2CHECKOUT_C_PROD','1','pm2checkout'),(17,'MODULE_PAYMENT_2CHECKOUT_ID_TYPE','2','pm2checkout'),(18,'MODULE_PAYMENT_2CHECKOUT_SECRET_WORD','','pm2checkout'),(61,'MODULE_PAYMENT_PAYPAL_ID','info@whatisstringtheory.com','paypal'),(62,'MODULE_PAYMENT_PAYPAL_URL','https://www.paypal.com/cgi-bin/webscr','paypal'),(63,'MODULE_PAYMENT_PAYPAL_USE_IPN','1','paypal'),(64,'MODULE_PAYMENT_PAYPAL_TEST_IPN','1','paypal'),(65,'MODULE_PAYMENT_PAYPAL_VERIFY_URL','https://www.paypal.com/cgi-bin/webscr','paypal'),(66,'MODULE_PAYMENT_PAYPAL_CURRENCY','USD','paypal');
/*!40000 ALTER TABLE `payment_configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_ids`
--

DROP TABLE IF EXISTS `payment_ids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_ids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_ids`
--

LOCK TABLES `payment_ids` WRITE;
/*!40000 ALTER TABLE `payment_ids` DISABLE KEYS */;
INSERT INTO `payment_ids` VALUES (1,1);
/*!40000 ALTER TABLE `payment_ids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_modules`
--

DROP TABLE IF EXISTS `payment_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `module_key` varchar(255) NOT NULL DEFAULT '',
  `class_file` varchar(255) NOT NULL DEFAULT '',
  `formfile` varchar(255) NOT NULL DEFAULT '',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `display_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_modules`
--

LOCK TABLES `payment_modules` WRITE;
/*!40000 ALTER TABLE `payment_modules` DISABLE KEYS */;
INSERT INTO `payment_modules` VALUES (1,'Credit Card','cc','cc.php','frmcc.tpl',0,0),(2,'PayPal','paypal','paypal.php','frmpaypal.tpl',1,0),(3,'Authorize.Net','authorizenet','authorizenet.php','frmauthorizenet.tpl',0,0),(4,'NOCHEX','nochex','nochex.php','frmnochex.tpl',0,0),(5,'PSiGate','psigate','psigate.php','frmpsigate.tpl',0,0),(6,'ipayment.de','ipayment','ipayment.php','frmipayment.tpl',0,0),(7,'SECPay','secpay','secpay.php','frmsecpay.tpl',0,0),(8,'2Checkout','pm2checkout','pm2checkout.php','frmpm2checkout.tpl',0,0),(9,'E-Gold','egold','egold.php','frmegold.tpl',0,0),(10,'Offline Payment','offline','offline.php','frmoffline.tpl',0,0);
/*!40000 ALTER TABLE `payment_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text,
  `region_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(100) NOT NULL DEFAULT '',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `verified_vars` text NOT NULL,
  `is_error` tinyint(1) NOT NULL DEFAULT '0',
  `txn_id` varchar(100) NOT NULL DEFAULT '',
  `notes` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grid_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `x` int(11) NOT NULL DEFAULT '0',
  `y` int(11) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `image` longblob,
  `url` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alt` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `notes` mediumtext NOT NULL,
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `expires_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reminder_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `purge_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `original_image` longblob,
  `description` text,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schema_version`
--

DROP TABLE IF EXISTS `schema_version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schema_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schema_version` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schema_version`
--

LOCK TABLES `schema_version` WRITE;
/*!40000 ALTER TABLE `schema_version` DISABLE KEYS */;
INSERT INTO `schema_version` VALUES (1,29);
/*!40000 ALTER TABLE `schema_version` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) DEFAULT '',
  `site_description` mediumtext,
  `currency_symbol` varchar(8) DEFAULT '',
  `user_accounts` tinyint(1) DEFAULT '0',
  `approval_required` tinyint(1) DEFAULT '0',
  `admin_email` varchar(255) DEFAULT '',
  `html_email` tinyint(1) DEFAULT '0',
  `use_fckeditor` tinyint(1) DEFAULT '0',
  `secret` varchar(100) DEFAULT '',
  `interlaced_images` tinyint(1) DEFAULT '0',
  `palette_images` tinyint(1) DEFAULT '0',
  `site_down` tinyint(1) DEFAULT '0',
  `blog_comments` tinyint(1) DEFAULT '0',
  `expires_check_at` datetime DEFAULT '0000-00-00 00:00:00',
  `multiple_grid_pages` tinyint(1) DEFAULT '0',
  `grid_columns` int(11) DEFAULT '1',
  `rss_latest_pixels` int(11) DEFAULT '10',
  `rss_top_pixels` int(11) DEFAULT '10',
  `rss_blog_articles` int(11) DEFAULT '10',
  `pixel_list_by_clicks` tinyint(1) DEFAULT '1',
  `seo_status` enum('standard','optimized','high_optimized') NOT NULL DEFAULT 'standard',
  `link_to_us_enabled` tinyint(1) DEFAULT '0',
  `upload_images` enum('true','false') DEFAULT 'true',
  `order_image_galleries` enum('ksort#SORT_REGULAR','ksort#SORT_NUMERIC','ksort#SORT_STRING','krsort#SORT_REGULAR','krsort#SORT_NUMERIC','krsort#SORT_STRING') NOT NULL DEFAULT 'ksort#SORT_REGULAR',
  `pixel_list_enable_images` enum('0','1') DEFAULT '0',
  `grids_as_options` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'whatisstringtheory.com','','$',0,0,'info@whatisstringtheory.com',0,1,'ltnoa5',0,0,NULL,1,'2100-01-01 00:00:00',0,1,10,10,10,1,'standard',NULL,'true','ksort#SORT_REGULAR','0','0');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snippets`
--

DROP TABLE IF EXISTS `snippets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snippets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `snippet_key` varchar(100) NOT NULL DEFAULT '',
  `snippet_seq` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '0',
  `snippet_text` mediumtext NOT NULL,
  `is_internal` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `snippet_key` (`snippet_key`,`snippet_seq`,`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snippets`
--

LOCK TABLES `snippets` WRITE;
/*!40000 ALTER TABLE `snippets` DISABLE KEYS */;
INSERT INTO `snippets` VALUES (1,'grid_title',1,1,'Pixels',0),(2,'grid_button_name',1,1,'Buy Pixels Now',1),(3,'grid_description',1,1,'Click below to purchase pixels.',0),(4,'email_purchase_active_subject',0,1,'Thank You for Your Pixel Purchase',1),(5,'email_purchase_active_body',0,1,'Dear Customer\r\n\r\nThank you for your purchase; your pixels are active now.\r\n\r\nYour confirmation number is [confirmation_number].\r\n\r\nYou may use the following link to update your pixels:\r\n[update_url]\r\n\r\n(You will need to provide your e-mail address, [email], when using this link, to confirm your identity.)\r\n\r\nSincerely,\r\n[site_name] Administrator',1),(6,'email_purchase_pending_subject',0,1,'Thank You for Your Pixel Purchase',1),(7,'email_purchase_pending_body',0,1,'Dear Customer,\r\n\r\nThank you for your purchase; your pixels will be activiated shortly.\r\n\r\nYour confirmation number is [confirmation_number].\r\n\r\nYou may use the following link to update your pixels:\r\n[update_url]\r\n\r\n(You will need to provide your e-mail address, [email], when using this link, to confirm your identity.)\r\n\r\nSincerely,\r\n[site_name] Administrator',1),(8,'signup_confirm_subject',0,1,'Activate Your [site_name] Account',1),(9,'signup_confirm_body',0,1,'Dear [first_name] [last_name],\r\n\r\nThank you for creating an account at [site_name].\r\nIn order to activate your account, you must confirm your ownership of this E-Mail address by visiting this link:\r\n[confirm_url]\r\n\r\nSincerely,\r\n[site_name] Administrator',1),(10,'tell_a_friend_subject',0,1,'Check Out [site_name]',1),(11,'tell_a_friend_body',0,1,'I thought you might be interested in this new site:\r\n\r\n[site_name]\r\n\r\nYou can find it at [site_url]\r\n\r\nSincerely,\r\n[from_name]',1),(12,'retrieve_password_subject',0,1,'Your Password for [site_name]',1),(13,'retrieve_password_body',0,1,'Here are your login details for [site_name]:\r\n\r\nE-Mail Address: [email]\r\nPassword: [password]\r\n\r\nYou may log in at [login_url]\r\n\r\nSincerely,\r\n[site_name] Administrator',1),(14,'region_approval_notification_subject',0,1,'[site_name] Region Approval Required',1),(15,'region_approval_notification_body',0,1,'A region has been purchased on [site_name].\r\nThe pixels are in \"pending\" status awaiting your approval.\r\n\r\nRegion ID:      [region_id]\r\nRegion URL:     [region_url]\r\nPayment Method: [payment_method]\r\nPayment ID:     [payment_id]\r\nPayment URL:    [payment_url]\r\nUser ID:        [user_id]\r\nUser URL:       [user_url]',1),(16,'cc_split_digits_subject',0,1,'[site_name] Credit Card Split Digits',1),(17,'cc_split_digits_body',0,1,'A credit card payment has been made on [site_name].\r\nFor security purposes, only part of the credit card number has been\r\nstored in the database. This email provides the missing digits.\r\n\r\nPayment ID:  [payment_id]\r\nPayment URL: [payment_url]\r\nCC Digits:   [cc_digits]',1),(18,'renewal_reminder_subject',0,1,'Your Pixels at [site_name] will expire soon',1),(19,'renewal_reminder_body',0,1,'Dear Customer\r\n\r\nYour Pixels for [url] at [site_name] will expire at [expires_at]\r\n\r\nPlease use the following link to renew your pixels now:\r\n[update_url]\r\n\r\n(You will need to provide your e-mail address, [email], when using this link, to confirm your identity.)\r\n\r\nYou must renew your pixels before [purge_at], or they will be permanently removed.\r\n\r\nSincerely,\r\n[site_name] Administrator',1),(61,'confirmation_customers_active_subject',0,1,'your pixels are activated',0),(62,'confirmation_customers_active_body',0,1,'Dear Customer,\r\n \r\nThank you for using our services,  your pixels are active now.\r\n \r\nPlease keep placing our code on your site:\r\n<a href=\"[site_url]\" target=\"_blank\"><img src=\"[banner_url]\" border=\"0\" alt=\"[site_name]\" /></a>\r\n \r\nYour confirmation number is [confirmation_number].\r\nYou may use the following link to update your pixels: [update_url]\r\n \r\n(You will need to provide your e-mail address, [email], when using this link, to confirm your identity.)\r\n \r\nSincerely,\r\n[site_name] Administrator',0),(63,'confirmation_free_pending_subject',0,1,'Confirmation',0),(64,'confirmation_free_pending_body',0,1,'Dear Customer\r\n \r\nThank you for using our services. Your pixels will be activated shortly. Please place our code on your site:\r\n<a href=\"[site_url]\" target=\"_blank\"><img src=\"[banner_url]\" border=\"0\" alt=\"[site_name]\" /></a>\r\n \r\nYour confirmation number is [confirmation_number].\r\nYou may use the following link to update your pixels: [update_url]\r\n \r\n(You will need to provide your e-mail address, [email], when using this link, to confirm your identity.)\r\n \r\nSincerely,\r\n[site_name] Administrator',0),(65,'grid_buy_button',1,1,'Buy Pixels',0);
/*!40000 ALTER TABLE `snippets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `pass` varchar(100) NOT NULL DEFAULT '',
  `first_name` varchar(100) NOT NULL DEFAULT '',
  `last_name` varchar(100) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `digest` varchar(32) NOT NULL DEFAULT '',
  `user_page` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-10 20:35:46
