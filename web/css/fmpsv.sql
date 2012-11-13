-- MySQL dump 10.13  Distrib 5.5.17, for Linux (i686)
--
-- Host: localhost    Database: fmpsv
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
-- Table structure for table `advertise`
--

DROP TABLE IF EXISTS `advertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertiser_name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertise`
--

LOCK TABLES `advertise` WRITE;
/*!40000 ALTER TABLE `advertise` DISABLE KEYS */;
INSERT INTO `advertise` VALUES (54,'Jaime Jacob','Internet Marketing Company','jesseholden116@gmail.com','','What would a huge increase in relevant traffic mean for your business?  If I could greatly increase the amount of customers who are interested in your products and services, wouldn\'t you be interested','2011-10-17 03:41:25'),(55,'Janice Jacobsen','','jimguthrie13@gmail.com','','I\'ve helped hundreds of companies increase their traffic and I\'d love to show you what my service can do for you. I don\'t promise the world, I\'m straight forward and to the point ... I deliver rankings. My rates are completely affordable and I don\'t want to oversell you either, I start small and have my clients begging for more. I won\'t take on your site unless I know I can deliver rankings. Reply to this e-mail if you have the slightest interest ... you\'ll never see rankings the same way again.','2011-10-21 02:12:28'),(56,'Larina sara','Internet Marketing Company','lisaalderman.123@gmail.com','','We offer quality Search Engine Optimization / SEO Services and Internet Marketing Solutions. Our dedicated team of SEO Professionals ensures Top 10 search engine rankings. Our SEO Processes are designed in view of the SEO guidelines, and white hat SEO techniques are strictly followed to ensure that our clients from world over get the best SEO services. Please reply to this email so we can send you more details.','2011-10-28 01:51:40');
/*!40000 ALTER TABLE `advertise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `visibility` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album_FI_1` (`user_id`),
  CONSTRAINT `album_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,'admin album','',1,1,'0000-00-00 00:00:00'),(36,'bookstore\'s album','',0,18,'2009-08-11 00:44:35'),(37,'nature','These pictures are not taken by me. I collected them from web.',0,19,NULL),(38,'LA Zoo','',0,6,'2009-09-01 20:57:12'),(39,'lovely\'s album','',0,20,'2009-09-02 01:01:28'),(41,'shervgi\'s album','',0,22,'2009-09-03 16:21:37'),(42,'Jeyhun\'s album','',0,23,'2009-09-08 15:16:15'),(44,'hesret\'s album','',0,25,'2009-09-22 12:39:20'),(45,'frestopresto\'s album','',0,26,'2009-09-24 15:54:42'),(46,'elya\'s album','',0,27,'2009-09-24 22:24:01'),(47,'cavanshir\'s album','',0,28,NULL),(48,'alterego\'s album','',0,29,'2009-09-25 04:12:13'),(49,'ruslanfm\'s album','',0,30,'2009-09-25 05:48:27'),(50,'KapitaN\'s album','',0,31,'2009-09-25 07:07:43'),(51,'mathew\'s album','',0,32,'2009-09-30 21:29:16'),(52,'gece_kabusu\'s album','',0,33,'2009-10-03 17:19:28'),(53,'Crocodile','These pictures are not taken by me. I collected them from web.',0,19,NULL),(54,'animals','These pictures are not taken by me. I collected them from web.',0,19,NULL),(55,'cars','',0,6,'2009-10-05 00:06:43'),(56,'Polad Hajiyev\'s album','',0,34,'2009-10-05 13:21:43'),(57,'mojtaba\'s album','',0,35,'2009-10-06 04:25:52'),(58,'my photos','',1,6,'2009-10-16 12:58:55'),(59,'Mila\'s album','',0,36,'2009-10-19 12:20:54'),(60,'zaur\'s album','',0,37,'2009-10-19 12:39:26'),(61,'photo76\'s album','',0,38,'2009-11-01 05:48:09'),(62,'armintell\'s album','',0,39,'2010-01-20 03:25:48'),(63,'amina\'s album','',0,40,'2010-06-02 11:06:52'),(64,'Camelia\'s album','',0,41,'2010-06-17 17:24:54'),(65,'Gispesefruice\'s album','',0,42,'2011-01-19 02:21:20'),(66,'ViagraCANADA\'s album','',0,43,'2011-02-01 19:09:13'),(67,'Wolekiiosacs\'s album','',0,44,'2011-02-02 00:22:00'),(68,'ObLinguib\'s album','',0,45,'2011-02-11 07:47:43'),(69,'sammygez\'s album','',0,46,'2011-03-06 08:40:26'),(70,'Insipssot\'s album','',0,47,'2011-03-27 01:59:21'),(71,'Nandabidya\'s album','',0,48,'2011-03-31 13:06:34'),(72,'RhywozyTozy\'s album','',0,49,'2011-04-01 00:23:25'),(73,'imitobakakiff\'s album','',0,50,'2011-04-03 06:47:25'),(74,'vapLoovarip\'s album','',0,51,'2011-04-07 09:54:15'),(75,'urikick\'s album','',0,52,'2011-04-13 17:25:09'),(76,'Enveway\'s album','',0,53,'2011-04-15 17:10:33'),(77,'shoulty\'s album','',0,54,'2011-04-19 19:15:07'),(78,'ThomasNG\'s album','',0,55,'2011-04-25 04:36:17'),(79,'ggmsmtt\'s album','',0,56,'2011-05-03 07:11:15'),(80,'sippenimels\'s album','',0,57,'2011-05-09 04:17:46'),(81,'astewNeabtype\'s album','',0,58,'2011-05-11 20:48:24'),(82,'snaduanyDaf\'s album','',0,59,'2011-05-15 08:44:39'),(83,'CoattTraica\'s album','',0,60,'2011-05-20 23:11:16'),(84,'finnausashy\'s album','',0,61,'2011-05-28 03:23:41'),(85,'artimaVet\'s album','',0,62,'2011-05-30 07:44:59'),(86,'diorioure\'s album','',0,63,'2011-06-21 07:45:41'),(87,'rigiollihoofs\'s album','',0,64,'2011-07-10 01:55:02'),(88,'Thittee\'s album','',0,65,'2011-07-30 21:03:56'),(89,'Soarorguepodo\'s album','',0,66,'2011-08-18 19:14:43'),(90,'Vulgeft\'s album','',0,67,'2011-08-20 02:42:46'),(91,'Speatly\'s album','',0,68,'2011-08-22 09:14:06'),(92,'feavips\'s album','',0,69,'2011-09-03 22:06:22'),(93,'Kedlign\'s album','',0,70,'2011-09-28 20:56:43');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auction_categories`
--

DROP TABLE IF EXISTS `auction_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auction_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auction_categories`
--

LOCK TABLES `auction_categories` WRITE;
/*!40000 ALTER TABLE `auction_categories` DISABLE KEYS */;
INSERT INTO `auction_categories` VALUES (1,'Antiques'),(2,'Art'),(3,'Baby'),(4,'Books'),(5,'Business'),(6,'Cameras & Photo'),(7,'Cell Phones & PDAs'),(8,'Clothing'),(9,'Coins'),(10,'Collectibles'),(11,'Computers '),(12,'Crafts'),(14,'DVDs'),(15,'Electronics'),(16,'Cars'),(17,'Music'),(18,'Musical Instruments'),(19,'Travel'),(20,'Video Games'),(21,'Boats, Vehicles & Parts'),(22,'Entertainment '),(23,'Gift Certificates'),(24,'Health & Beauty'),(25,'Home & Garden'),(26,'Jewelry '),(27,'Pottery & Glass'),(28,'Real Estate'),(29,'Specialty Services'),(30,'Sporting Goods'),(32,'Stamps'),(33,'Tickets'),(34,'Toys'),(35,'Other'),(36,'Watches');
/*!40000 ALTER TABLE `auction_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auction_subcategories`
--

DROP TABLE IF EXISTS `auction_subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auction_subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_categories_id` int(11) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auction_subcategories_FI_1` (`auction_categories_id`),
  CONSTRAINT `auction_subcategories_FK_1` FOREIGN KEY (`auction_categories_id`) REFERENCES `auction_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auction_subcategories`
--

LOCK TABLES `auction_subcategories` WRITE;
/*!40000 ALTER TABLE `auction_subcategories` DISABLE KEYS */;
INSERT INTO `auction_subcategories` VALUES (4,16,'Ford'),(5,4,'Arts & Photography'),(6,4,'Audiobooks'),(7,4,'Biographies & Memoirs'),(8,4,'Business & Investing'),(9,4,'Children\'s Books'),(10,4,'Comics & Graphic Novels'),(11,4,'Computers & Internet'),(12,4,'Cooking, Food & Wine'),(13,4,'Crafts & Hobbies'),(14,4,'Health, Mind & Body'),(15,4,'History'),(16,4,'Home & Garden'),(17,4,'Law'),(18,4,'Literature & Fiction'),(19,4,'Medical'),(20,4,'Mystery & Thrillers'),(21,4,'Nonfiction'),(22,4,'Politics'),(23,4,'Religion & Spirituality'),(24,4,'Romance'),(25,4,'Science'),(26,4,'Science Fiction'),(27,4,'Sports'),(28,4,'Travel'),(29,1,'The Americas'),(30,1,'Byzantine'),(31,1,'Celtic'),(32,1,'Egyptian'),(33,1,'Far Eastern'),(34,1,'Greek'),(35,1,'Holy Land'),(36,1,'Islamic'),(37,1,'Near Eastern'),(38,1,'Neolithic & Paleolithic'),(39,1,'Roman'),(40,1,'South Italian'),(41,1,'Viking'),(42,1,'Reproductions'),(43,1,'Other'),(44,5,'Tractors & Equipment'),(45,5,'Farm Implements & Attachments'),(46,5,'Forestry Equipment & Supplies'),(47,5,'GPS & Guidance Equipment'),(48,5,'Livestock Supplies'),(49,5,'Stationary Engines'),(50,5,'Tractor Manuals & Books'),(51,5,'Tractor Parts'),(52,5,'Other'),(53,5,'Wholesale Lots'),(54,6,'Binoculars'),(55,6,'Monoculars'),(56,6,'Telescopes'),(57,6,'Telescope Accessories'),(58,6,'Other'),(59,6,'Aiptek'),(60,6,'Canon'),(61,6,'JVC'),(62,6,'Panasonic');
/*!40000 ALTER TABLE `auction_subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bid`
--

DROP TABLE IF EXISTS `bid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bid_FI_1` (`item_id`),
  KEY `bid_FI_2` (`user_id`),
  CONSTRAINT `bid_FK_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bid_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bid`
--

LOCK TABLES `bid` WRITE;
/*!40000 ALTER TABLE `bid` DISABLE KEYS */;
INSERT INTO `bid` VALUES (1,1,5,19);
/*!40000 ALTER TABLE `bid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canadastates`
--

DROP TABLE IF EXISTS `canadastates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canadastates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canadastates`
--

LOCK TABLES `canadastates` WRITE;
/*!40000 ALTER TABLE `canadastates` DISABLE KEYS */;
INSERT INTO `canadastates` VALUES (1,'AB','Alberta'),(2,'BC','British Columbia'),(3,'MB','Manitoba'),(4,'NB','New Brunswick'),(5,'NF','Newfoundland'),(6,'NT','Northwest Territories'),(7,'NS','Nova Scotia'),(8,'NU','Nunavut'),(9,'ON','Ontario'),(10,'PE','Prince Edward Island'),(11,'QC','Quebec'),(12,'SK','Saskatchewan'),(13,'YT','Yukon');
/*!40000 ALTER TABLE `canadastates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(64) NOT NULL DEFAULT '',
  `iso_code_2` char(2) NOT NULL DEFAULT '',
  `iso_code_3` char(3) NOT NULL DEFAULT '',
  `address_format_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Afghanistan','AF','AFG',1),(2,'Albania','AL','ALB',1),(3,'Algeria','DZ','DZA',1),(4,'American Samoa','AS','ASM',1),(5,'Andorra','AD','AND',1),(6,'Angola','AO','AGO',1),(7,'Anguilla','AI','AIA',1),(8,'Antarctica','AQ','ATA',1),(9,'Antigua and Barbuda','AG','ATG',1),(10,'Argentina','AR','ARG',1),(11,'Armenia','AM','ARM',1),(12,'Aruba','AW','ABW',1),(13,'Australia','AU','AUS',1),(14,'Austria','AT','AUT',5),(15,'Azerbaijan','AZ','AZE',1),(16,'Bahamas','BS','BHS',1),(17,'Bahrain','BH','BHR',1),(18,'Bangladesh','BD','BGD',1),(19,'Barbados','BB','BRB',1),(20,'Belarus','BY','BLR',1),(21,'Belgium','BE','BEL',1),(22,'Belize','BZ','BLZ',1),(23,'Benin','BJ','BEN',1),(24,'Bermuda','BM','BMU',1),(25,'Bhutan','BT','BTN',1),(26,'Bolivia','BO','BOL',1),(27,'Bosnia and Herzegowina','BA','BIH',1),(28,'Botswana','BW','BWA',1),(29,'Bouvet Island','BV','BVT',1),(30,'Brazil','BR','BRA',1),(31,'British Indian Ocean Territory','IO','IOT',1),(32,'Brunei Darussalam','BN','BRN',1),(33,'Bulgaria','BG','BGR',1),(34,'Burkina Faso','BF','BFA',1),(35,'Burundi','BI','BDI',1),(36,'Cambodia','KH','KHM',1),(37,'Cameroon','CM','CMR',1),(38,'Canada','CA','CAN',1),(39,'Cape Verde','CV','CPV',1),(40,'Cayman Islands','KY','CYM',1),(41,'Central African Republic','CF','CAF',1),(42,'Chad','TD','TCD',1),(43,'Chile','CL','CHL',1),(44,'China','CN','CHN',1),(45,'Christmas Island','CX','CXR',1),(46,'Cocos (Keeling) Islands','CC','CCK',1),(47,'Colombia','CO','COL',1),(48,'Comoros','KM','COM',1),(49,'Congo','CG','COG',1),(50,'Cook Islands','CK','COK',1),(51,'Costa Rica','CR','CRI',1),(52,'Cote D\'Ivoire','CI','CIV',1),(53,'Croatia','HR','HRV',1),(54,'Cuba','CU','CUB',1),(55,'Cyprus','CY','CYP',1),(56,'Czech Republic','CZ','CZE',1),(57,'Denmark','DK','DNK',1),(58,'Djibouti','DJ','DJI',1),(59,'Dominica','DM','DMA',1),(60,'Dominican Republic','DO','DOM',1),(61,'East Timor','TP','TMP',1),(62,'Ecuador','EC','ECU',1),(63,'Egypt','EG','EGY',1),(64,'El Salvador','SV','SLV',1),(65,'Equatorial Guinea','GQ','GNQ',1),(66,'Eritrea','ER','ERI',1),(67,'Estonia','EE','EST',1),(68,'Ethiopia','ET','ETH',1),(69,'Falkland Islands (Malvinas)','FK','FLK',1),(70,'Faroe Islands','FO','FRO',1),(71,'Fiji','FJ','FJI',1),(72,'Finland','FI','FIN',1),(73,'France','FR','FRA',1),(74,'France, Metropolitan','FX','FXX',1),(75,'French Guiana','GF','GUF',1),(76,'French Polynesia','PF','PYF',1),(77,'French Southern Territories','TF','ATF',1),(78,'Gabon','GA','GAB',1),(79,'Gambia','GM','GMB',1),(80,'Georgia','GE','GEO',1),(81,'Germany','DE','DEU',5),(82,'Ghana','GH','GHA',1),(83,'Gibraltar','GI','GIB',1),(84,'Greece','GR','GRC',1),(85,'Greenland','GL','GRL',1),(86,'Grenada','GD','GRD',1),(87,'Guadeloupe','GP','GLP',1),(88,'Guam','GU','GUM',1),(89,'Guatemala','GT','GTM',1),(90,'Guinea','GN','GIN',1),(91,'Guinea-bissau','GW','GNB',1),(92,'Guyana','GY','GUY',1),(93,'Haiti','HT','HTI',1),(94,'Heard and Mc Donald Islands','HM','HMD',1),(95,'Honduras','HN','HND',1),(96,'Hong Kong','HK','HKG',1),(97,'Hungary','HU','HUN',1),(98,'Iceland','IS','ISL',1),(99,'India','IN','IND',1),(100,'Indonesia','ID','IDN',1),(101,'Iran (Islamic Republic of)','IR','IRN',1),(102,'Iraq','IQ','IRQ',1),(103,'Ireland','IE','IRL',1),(104,'Israel','IL','ISR',1),(105,'Italy','IT','ITA',1),(106,'Jamaica','JM','JAM',1),(107,'Japan','JP','JPN',1),(108,'Jordan','JO','JOR',1),(109,'Kazakhstan','KZ','KAZ',1),(110,'Kenya','KE','KEN',1),(111,'Kiribati','KI','KIR',1),(112,'Korea DPR','KP','PRK',1),(113,'Korea, Republic of','KR','KOR',1),(114,'Kuwait','KW','KWT',1),(115,'Kyrgyzstan','KG','KGZ',1),(116,'Lao DPR','LA','LAO',1),(117,'Latvia','LV','LVA',1),(118,'Lebanon','LB','LBN',1),(119,'Lesotho','LS','LSO',1),(120,'Liberia','LR','LBR',1),(121,'Libyan Arab Jamahiriya','LY','LBY',1),(122,'Liechtenstein','LI','LIE',1),(123,'Lithuania','LT','LTU',1),(124,'Luxembourg','LU','LUX',1),(125,'Macau','MO','MAC',1),(126,'Macedonia','MK','MKD',1),(127,'Madagascar','MG','MDG',1),(128,'Malawi','MW','MWI',1),(129,'Malaysia','MY','MYS',1),(130,'Maldives','MV','MDV',1),(131,'Mali','ML','MLI',1),(132,'Malta','MT','MLT',1),(133,'Marshall Islands','MH','MHL',1),(134,'Martinique','MQ','MTQ',1),(135,'Mauritania','MR','MRT',1),(136,'Mauritius','MU','MUS',1),(137,'Mayotte','YT','MYT',1),(138,'Mexico','MX','MEX',1),(139,'Micronesia FS','FM','FSM',1),(140,'Moldova, Republic of','MD','MDA',1),(141,'Monaco','MC','MCO',1),(142,'Mongolia','MN','MNG',1),(143,'Montserrat','MS','MSR',1),(144,'Morocco','MA','MAR',1),(145,'Mozambique','MZ','MOZ',1),(146,'Myanmar','MM','MMR',1),(147,'Namibia','NA','NAM',1),(148,'Nauru','NR','NRU',1),(149,'Nepal','NP','NPL',1),(150,'Netherlands','NL','NLD',1),(151,'Netherlands Antilles','AN','ANT',1),(152,'New Caledonia','NC','NCL',1),(153,'New Zealand','NZ','NZL',1),(154,'Nicaragua','NI','NIC',1),(155,'Niger','NE','NER',1),(156,'Nigeria','NG','NGA',1),(157,'Niue','NU','NIU',1),(158,'Norfolk Island','NF','NFK',1),(159,'Northern Mariana Islands','MP','MNP',1),(160,'Norway','NO','NOR',1),(161,'Oman','OM','OMN',1),(162,'Pakistan','PK','PAK',1),(163,'Palau','PW','PLW',1),(164,'Panama','PA','PAN',1),(165,'Papua New Guinea','PG','PNG',1),(166,'Paraguay','PY','PRY',1),(167,'Peru','PE','PER',1),(168,'Philippines','PH','PHL',1),(169,'Pitcairn','PN','PCN',1),(170,'Poland','PL','POL',1),(171,'Portugal','PT','PRT',1),(172,'Puerto Rico','PR','PRI',1),(173,'Qatar','QA','QAT',1),(174,'Reunion','RE','REU',1),(175,'Romania','RO','ROM',1),(176,'Russian Federation','RU','RUS',1),(177,'Rwanda','RW','RWA',1),(178,'Saint Kitts and Nevis','KN','KNA',1),(179,'Saint Lucia','LC','LCA',1),(180,'Saint Vincent&Grenadines','VC','VCT',1),(181,'Samoa','WS','WSM',1),(182,'San Marino','SM','SMR',1),(183,'Sao Tome and Principe','ST','STP',1),(184,'Saudi Arabia','SA','SAU',1),(185,'Senegal','SN','SEN',1),(186,'Seychelles','SC','SYC',1),(187,'Sierra Leone','SL','SLE',1),(188,'Singapore','SG','SGP',4),(189,'Slovakia (Slovak Republic)','SK','SVK',1),(190,'Slovenia','SI','SVN',1),(191,'Solomon Islands','SB','SLB',1),(192,'Somalia','SO','SOM',1),(193,'South Africa','ZA','ZAF',1),(194,'South Georgia&Sandwich Isles','GS','SGS',1),(195,'Spain','ES','ESP',3),(196,'Sri Lanka','LK','LKA',1),(197,'St. Helena','SH','SHN',1),(198,'St. Pierre and Miquelon','PM','SPM',1),(199,'Sudan','SD','SDN',1),(200,'Suriname','SR','SUR',1),(201,'Svalbard7Jan Mayen Isles','SJ','SJM',1),(202,'Swaziland','SZ','SWZ',1),(203,'Sweden','SE','SWE',1),(204,'Switzerland','CH','CHE',1),(205,'Syrian Arab Republic','SY','SYR',1),(206,'Taiwan','TW','TWN',1),(207,'Tajikistan','TJ','TJK',1),(208,'Tanzania, United Republic of','TZ','TZA',1),(209,'Thailand','TH','THA',1),(210,'Togo','TG','TGO',1),(211,'Tokelau','TK','TKL',1),(212,'Tonga','TO','TON',1),(213,'Trinidad and Tobago','TT','TTO',1),(214,'Tunisia','TN','TUN',1),(215,'Turkey','TR','TUR',1),(216,'Turkmenistan','TM','TKM',1),(217,'Turks and Caicos Islands','TC','TCA',1),(218,'Tuvalu','TV','TUV',1),(219,'Uganda','UG','UGA',1),(220,'Ukraine','UA','UKR',1),(221,'United Arab Emirates','AE','ARE',1),(222,'United Kingdom','GB','GBR',1),(223,'United States','US','USA',2),(224,'US Minor Outlying Islands','UM','UMI',1),(225,'Uruguay','UY','URY',1),(226,'Uzbekistan','UZ','UZB',1),(227,'Vanuatu','VU','VUT',1),(228,'Vatican City State (Holy See)','VA','VAT',1),(229,'Venezuela','VE','VEN',1),(230,'Viet Nam','VN','VNM',1),(231,'Virgin Islands (British)','VG','VGB',1),(232,'Virgin Islands (U.S.)','VI','VIR',1),(233,'Wallis and Futuna Islands','WF','WLF',1),(234,'Western Sahara','EH','ESH',1),(235,'Yemen','YE','YEM',1),(236,'Yugoslavia','YU','YUG',1),(237,'Zaire','ZR','ZAR',1),(238,'Zambia','ZM','ZMB',1),(239,'Zimbabwe','ZW','ZWE',1);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `approved` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `friends_FI_1` (`user_id`),
  CONSTRAINT `friend_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend`
--

LOCK TABLES `friend` WRITE;
/*!40000 ALTER TABLE `friend` DISABLE KEYS */;
INSERT INTO `friend` VALUES (12,6,20,1),(14,6,19,1),(22,6,27,1),(23,19,20,1),(24,19,27,1),(25,6,31,1),(31,6,23,1),(34,18,30,0),(35,18,31,0),(36,18,29,0),(38,19,33,1),(39,6,33,1),(42,6,34,1),(45,19,23,1),(46,19,31,0),(48,32,19,1),(50,6,35,0),(53,32,29,0),(54,6,29,0),(55,6,36,1),(56,6,37,0),(60,6,28,1),(61,6,1,1);
/*!40000 ALTER TABLE `friend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hit_stats`
--

DROP TABLE IF EXISTS `hit_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hit_stats` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `search_phrase` varchar(255) NOT NULL,
  `sdate` bigint(20) NOT NULL,
  `referer` text NOT NULL,
  `browser` varchar(255) NOT NULL,
  `os` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `hit_stats_FI_1` (`photo_id`),
  CONSTRAINT `hit_stats_FK_1` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hit_stats`
--

LOCK TABLES `hit_stats` WRITE;
/*!40000 ALTER TABLE `hit_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `hit_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `auction_subcategories_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `startingprice` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` mediumtext,
  `dateends` datetime DEFAULT NULL,
  `endnotified` tinyint(4) DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `cond` varchar(20) DEFAULT NULL,
  `sale_type` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `payment` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `item_FI_1` (`user_id`),
  KEY `item_FI_2` (`auction_subcategories_id`),
  CONSTRAINT `item_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `item_FK_2` FOREIGN KEY (`auction_subcategories_id`) REFERENCES `auction_subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,18,25,'Bioinformatics The machine learning approach',30,NULL,'Second edition by P. Baldi and S. Brunak','2009-12-20 00:00:00',NULL,10,'Used',0,1,'info@beautyskincarerx.com','2009-08-11 04:47:45'),(2,18,24,'How to pick up girls',NULL,15,'How to pick up girls by Eric Weber','2010-01-01 00:00:00',NULL,5,'Used',1,1,'info@beautyskincarerx.com','2009-09-30 03:07:46'),(3,6,4,'Mustang',NULL,20000,'Mustang 2008, 15000 miles','2011-01-01 00:00:00',NULL,1000,'Used',1,1,'info@beautyskincarerx.com','2009-09-30 03:08:07'),(4,18,24,'The art of seduction',NULL,20,'By Robert Greene','2011-01-01 00:00:00',NULL,5,'Used',1,1,'info@beautyskincarerx.com','2009-10-08 05:02:44');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_image`
--

DROP TABLE IF EXISTS `item_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auction_images_FI_1` (`item_id`),
  CONSTRAINT `item_image_FK_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_image`
--

LOCK TABLES `item_image` WRITE;
/*!40000 ALTER TABLE `item_image` DISABLE KEYS */;
INSERT INTO `item_image` VALUES (2,3,'2224075741fdb8fbdade187ac98c1bf3.jpg'),(3,3,'8361b9f17bc0874b0ce0d18cec54ce42.jpg'),(4,3,'6d3a71989c4bc608138cb45fd86c3a0b.jpg');
/*!40000 ALTER TABLE `item_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `from_userid` int(11) DEFAULT NULL,
  `to_userid` int(11) DEFAULT NULL,
  `from_deltype` tinyint(4) DEFAULT '0',
  `to_deltype` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `msgtext` text NOT NULL,
  `read_unread` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `message_FI_1` (`from_userid`),
  KEY `message_FI_2` (`to_userid`),
  CONSTRAINT `message_FK_1` FOREIGN KEY (`from_userid`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `message_FK_2` FOREIGN KEY (`to_userid`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (3,'salamlar',20,6,0,0,'2009-09-07 04:19:36','salam i cto ya ne tak uj ponila neynemek lazimdir burda?',1),(11,'salamlar',6,20,0,0,'2009-09-08 23:24:44','Salam ay lovely,\r\n\r\nhavayi musiqi eshitmakdan otari, http://fmpsv.com/music\r\nkedirsan va orda istadiyin muganniyi axtaririsan.\r\nAgar tapsan onda play edib gulag asirsan va xoshuna kalsa add \r\nduymasinin basib oz playlistina daxil edirsan ki, sonradan kalib yena da       qulag asasan. Va yaxud manim playlistimdan xoshuna kalan musigini da oz \r\nplaylistina daxil eda bilarsan. Manim bir playlistim burdadi\r\n\r\nhttp://fmpsv.com/editPlaylist/show/playlist_id/65\r\n\r\n\r\nYaz korum na xosuna kalir bu saytda va na alava etsak lap yaxshi olar.\r\n\r\nHelelik.\r\nIskandar.\r\n\r\n\r\n-----Original Text-----\r\nFrom:lovely\r\nDate:2009-09-07 04:19:36\r\n\r\nsalam i cto ya ne tak uj ponila neynemek lazimdir burda?',0),(12,'ok',20,6,0,0,'2009-09-09 07:50:45','aha basa dusdunm cox saq ol info ucun tsk edirem\r\nxosuma geldi maraqlidir\r\nmen enrique beyenirem;)james b,..\r\n',1),(13,'ok',6,20,0,0,'2009-09-09 17:08:57','maraqlidir o james b kimdi?\r\n\r\nBir azdan music videos da olacaq searchda.\r\n\r\nbas photos section da xoshuna kaldimi?  \r\n\r\n-----Original Text-----\r\nFrom:lovely\r\nDate:2009-09-09 07:50:45\r\n\r\naha basa dusdunm cox saq ol info ucun tsk edirem\r\nxosuma geldi maraqlidir\r\nmen enrique beyenirem;)james b,..\r\n',1),(14,'aleykume salam',20,6,0,0,'2009-09-10 02:39:15','\r\nhe cox maraqlidir \r\nJames Blund;)',1),(15,'aleykume salam',6,20,0,0,'2009-09-11 23:35:57','\r\nOldu. Bir azdan music page inin design dayishacayik. Onda sana bildiracam.\r\nSan niya hamisha ayri message yazirsan, reply etmirsan? Dedim balka reply duymasi korunmur.\r\n\r\nBir da dedin buralara kalmak istayirsan. Na vaxt kalirsan?\r\n\r\n-----Original Text-----\r\nFrom:lovely\r\nDate:2009-09-10 02:39:15\r\n\r\n\r\nhe cox maraqlidir \r\nJames Blund;)',0),(16,'aleykume salam',6,20,0,0,'2009-09-17 21:40:09','\r\nNa oldu senden hec bir ses chixmadi.\r\n\r\n-----Original Text-----\r\nFrom:lovely\r\nDate:2009-09-10 02:39:15\r\n\r\n\r\nhe cox maraqlidir \r\nJames Blund;)',1),(17,'slm',20,6,0,0,'2009-09-18 04:39:44','sen dediyin kimi reply eledim bes sene catmayib yazdiqim?\r\n\r\nhmmm\r\nok lap yaxsi\r\noralara gelmek isterdim yeni ile))amma esas invitation letter olmalidir ki mene rahat olsun eyer yollaya bilsen gelerem)Dekabirda tetilim olacaq indiden bileti bron elesem daha ucuz basa gelir amma esas bilmeliyem ki kimse men edevetname yollayir max 10gun qalacam cox yox bele turist kimi gelmek mene serf etmir\r\ngondersen memnun olaram\r\namma tanishlar var qalmaqa sen hansi statda idin?\r\n',1),(18,'slm',6,20,0,0,'2009-09-18 10:23:28','men bu saytda oxuyandan sonra reply duymasi onu nezaerded tuturdum. Yani men devetname kodarsem sen hansi viza ila kalcan. Safirliyin saitina baxdim orda turist ve visitor vizasalari var. Amma vizitor vizasi businesmenlar ucundu deyasen. Bir de men californiya dayam.\r\n\r\nHelelik.\r\nIskandar\r\n\r\n-----Original Text-----\r\nFrom:lovely\r\nDate:2009-09-18 04:39:44\r\n\r\nsen dediyin kimi reply eledim bes sene catmayib yazdiqim?\r\n\r\nhmmm\r\nok lap yaxsi\r\noralara gelmek isterdim yeni ile))amma esas invitation letter olmalidir ki mene rahat olsun eyer yollaya bilsen gelerem)Dekabirda tetilim olacaq indiden bileti bron elesem daha ucuz basa gelir amma esas bilmeliyem ki kimse men edevetname yollayir max 10gun qalacam cox yox bele turist kimi gelmek mene serf etmir\r\ngondersen memnun olaram\r\namma tanishlar var qalmaqa sen hansi statda idin?\r\n',0),(19,'you account is activated',1,26,0,0,'2009-09-24 17:02:10','Hello,\r\n\r\nThanks for joining fmpsv.com. Your account is activated. Please let me know about any suggestion or feedback you may have.\r\n\r\nThanks and enjoy fmpsv.\r\nadmin.',0),(20,'you account is activated',1,27,0,0,'2009-09-24 22:28:41','Hello,\r\n\r\nThanks for joining fmpsv.com. Your account is activated. Please let me know about any suggestion or feedback you may have.\r\n\r\nThanks and enjoy fmpsv.\r\nadmin',0),(21,'listen to my playlist',28,27,0,0,'2009-09-29 13:58:05','Hey,\r\n\r\nListen to my playlists.',1),(22,'welcome',1,33,0,0,'2009-10-04 15:19:37','Hello,\r\n\r\nWelcome to our website. We will be adding new features and you are welcome to let us know about your suggestions and comments.\r\n\r\nThanks in advance.\r\nAdmin.',0),(23,'videos in fmpsv.com',1,20,0,0,'2009-10-31 23:31:11','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin.',0),(24,'videos in fmpsv.com',1,37,0,0,'2009-10-31 23:32:07','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin',0),(25,'videos in fmpsv.com',1,36,0,0,'2009-10-31 23:32:55','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin',0),(26,'videos in fmpsv.com',1,35,0,0,'2009-10-31 23:33:26','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin',0),(27,'videos in fmpsv.com',1,34,0,0,'2009-10-31 23:34:01','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin',0),(28,'videos in fmpsv.com',1,33,0,0,'2009-10-31 23:34:47','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin',0),(29,'videos in fmpsv.com',1,27,0,0,'2009-10-31 23:35:42','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin',0),(30,'videos in fmpsv.com',1,31,0,0,'2009-10-31 23:36:28','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin',0),(31,'videos in fmpsv.com',1,6,0,0,'2009-10-31 23:36:58','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin',1),(32,'videos in fmpsv.com',1,26,0,0,'2009-10-31 23:51:04','Hello,\r\n\r\nWe have added a lot of videos to videos section of our website. Now you can watch recently featured and most viewed videos and make search for videos in http://fmpsv.com/videos .\r\n\r\nHope you will enjoy this feature.\r\nAnd please let us know if you have any comments or suggestions.\r\n\r\nThanks.\r\nadmin ',0),(33,'nlkdnalnfv',28,28,0,0,'2009-11-16 19:27:28','lalkdnsfalnv',0);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `music`
--

DROP TABLE IF EXISTS `music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'null',
  `title` varchar(255) DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT '0',
  `raw_ip` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `music_FI_2` (`user_id`),
  CONSTRAINT `music_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `music`
--

LOCK TABLES `music` WRITE;
/*!40000 ALTER TABLE `music` DISABLE KEYS */;
INSERT INTO `music` VALUES (4,'http://www.supermp3turkce.com/sdfsd8ha/tarkan/shikidim%20pis.mp3','shikidim','tarkan',NULL,NULL,1,'2009-10-06 20:19:35'),(6,'http://www.supermp3turkce.com/sdfsd8ha/erol_evgin/yabanci.mp3','yagmur','yabanchi',NULL,NULL,1,'2009-10-06 20:19:35'),(9,'http://www.advpubl.org/music/Sean%20Kingston%20-%20Take%20You%20There.mp3','Take You There','Sean Kingston',NULL,NULL,1,'2009-10-06 20:19:35'),(10,'http://supermp3turkce.com/sdfsd8ha/tarkan/dudu.mp3','dudu','tarkan',NULL,NULL,1,'2009-10-06 20:19:35'),(18,'http://supermp3turkce.com/sdfsd8ha/demet_akalin/of.mp3','of','Demet Akalin',0,NULL,1,'2009-09-30 03:24:21'),(19,'http://supermp3turkce.com/sdfsd8ha/demet_akalin/affedersin.mp3','Afedersin','Demet Akalin',0,NULL,1,'2009-09-30 03:24:21'),(22,'http://supermp3turkce.com/sdfsd8ha/tarkan/dudu.mp3','Kadinim','Hakan Peker',0,NULL,1,'2009-04-11 19:45:45'),(23,'ede751dcd52ac35a78215d69cd2e45e2.mp3','amber','amber',0,NULL,1,'2009-04-11 19:54:31'),(24,'http://supermp3turkce.com/sdfsd8ha/umut_kuzey/kar.mp3','Koroglu','Umut Kuzey',0,NULL,1,'2009-05-11 03:19:54'),(25,'http://supermp3turkce.com/sdfsd8ha/demet_sagiroglu/ukde.mp3','Aaa','Demet Sagiroglu',0,NULL,1,'2009-08-04 23:30:03'),(26,'http://bulk.nicemice.net:65080/amc/music/songs/madonna/la-isla-bonita/clip.mp3','La Isla Bonita','Madonna',0,NULL,1,'2009-08-07 17:49:14'),(27,'http://dj.dwilde.free.fr/Erotica.mp3','Like a Prayer','Madonna',0,NULL,1,'2009-08-10 17:49:34'),(28,'http://alma.pacheco.googlepages.com/14carrieunderwood-insideyourheaven.mp3','Inside Your Heaven','Carrie Underwood',0,NULL,1,'2009-08-13 18:09:10'),(29,'http://supermp3turkce.com/sdfsd8ha/gokhan_tepe/oldu.mp3','Padisah','Musa Eroglu',0,NULL,1,'2009-08-13 18:36:54'),(30,'http://supermp3turkce.com/sdfsd8ha/teoman/saat%20.mp3','06-SAAT 03.mp3','??Teoman',0,NULL,1,'2009-08-13 18:37:37'),(31,'http://supermp3turkce.com/sdfsd8ha/demet_sagiroglu/cok.mp3','��Sen','Demet Sagiroglu',0,NULL,1,'2009-08-13 21:07:04'),(32,'http://supermp3turkce.com/sdfsd8ha/erol_evgin/yabanci.mp3','A','Turkipa   A_Y_R_I_L_I_K',0,NULL,1,'2009-08-13 22:00:23'),(33,'http://www.umb.kit.net/what_it_feels_like_for_a_girl_remix.mp3','Feels like for a girl','Madonna',0,NULL,1,'2009-11-18 04:21:13'),(34,'http://www.gakgos.com/mp3/gulumse_kaderine_r2.mp3','Gülümse kaderine r2','Tarkan',0,NULL,1,'2009-08-28 02:12:37'),(35,'http://www.freewebs.com/maxusgames/dreams.mp3','Dreams','Dj Arash',0,NULL,1,'2009-08-28 02:18:03'),(36,'http://www.hotlinkfiles.com/files/942336_f04xs/dht-listentoyourheart457.mp3]dht-listentoyourheart457.mp3','Represent','DHT',0,NULL,1,'2009-08-28 02:21:27'),(38,'http://diamondsmiles.anywebcam.com/beautiful.mp3','beautiful','Christina Aguilera',0,NULL,1,'2009-11-18 04:35:36'),(39,'http://www.hotlinkfiles.com/files/2673804_wpxpo/love__robert_burian_dub_mix_.mp3','Takin Back My Love (Robert Burian Dub Mix)',' Enrique Iglesias   ',0,NULL,1,'2009-09-07 02:15:41'),(40,'http://www.hotlinkfiles.com/files/1873112_1w0sp/elockdownwww.hiphopearly.com.mp3','Love Lockdown','Single ',0,NULL,1,'2009-09-23 01:23:57'),(41,'http://www.hotlinkfiles.com/files/1266232_5nkv2/tiesto.mp3','Forever Today','Ti�sto',0,NULL,1,'2009-09-23 01:36:37'),(42,'http://supermp3turkce.com/sdfsd8ha/tarkan/uzak.mp3','Acilar','Tarkan',0,NULL,1,'2009-11-17 18:03:20'),(43,'http://lexluthor.home.insightbb.com/loveontherocks.mp3','Love On The Rocks','Neil Diamond',0,NULL,1,'2009-09-24 20:15:35'),(44,'http://www.hotlinkfiles.com/files/2291706_4qscn/beyonce-halo.mp3','Halo','Mp3Pk.Com',0,NULL,1,'2009-09-25 00:07:33'),(45,'http://www.raihana-jackson.co.uk/carry%20you%20home.mp3','Carry You Home','James Blunt',0,NULL,1,'2009-09-27 04:10:02'),(46,'http://www.hotlinkfiles.com/files/2082289_ni50j/jamesblunt-lovelovelove.mp3','James Blunt','Fearless',0,NULL,1,'2009-09-27 04:12:22'),(47,'http://www.hotlinkfiles.com/files/1248963_nxs2m/tarkan-g__l__msekaderine.mp3','Gülümse kaderine','Tarkan',0,NULL,1,'2009-11-18 04:31:11'),(48,'http://dl.pleera.net/6/672/nelly_furtado_-_say_it_right.mp3','Say It Right','Nelly Furtado',0,NULL,1,'2009-09-29 04:40:25'),(50,'dc1e87776a4c5cd443727559ce1bce6a.mp3','yari sende, yari mende','Agadadash Agayev',1,'209.131.61.1',28,'2009-09-30 03:24:21'),(51,'72e39a15b32087b05e3c9210ae815b00.mp3','Mene deniz verin','Eyyub Yaqubov',1,'209.131.61.1',28,'2009-09-30 03:24:21'),(52,'b17eac4ebb30826b8dede36ee302bdd3.mp3','Baki','Eyyub Yaqubov',1,'209.131.61.1',28,'2009-09-30 03:24:21'),(53,'6e5bb468d38c0063db8571698a117bb9.mp3','Qelbimdeki xatireler','Agadadash Agayev',1,'209.131.61.1',28,'2009-09-30 03:24:21'),(54,'1e2e877cb664e9c3559d2914fdf99136.mp3','Sende qalibdir gozum','Agadadash Agayev',1,'209.131.61.1',28,'2009-09-30 03:24:21'),(55,'ab91e7cf40dfa8b2cb74127b0c6e7a33.mp3','Ey, menim dunyam','Aygun Kazimova',1,'209.131.61.1',28,'2009-09-30 03:24:21'),(56,'9aee519a25a7776d3512825b9e376727.mp3','Sevdim','Aygun Kazimova',1,'209.131.61.1',28,'2009-09-30 03:24:21'),(57,'41a60d6a4d7c47a7bc22dc8a29dc33a7.mp3','Azerbaijan','Vaqif Shixeliyev',1,'98.151.18.118',28,'2009-10-01 03:41:10'),(58,'50eff6d890f3f52c4b288a4a20d277d1.mp3','Yar gelmedi','Vaqif Shixeliyev',1,'98.151.18.118',28,'2009-10-01 03:43:33'),(59,'b474bc9adcceb501ce5901c07214fe0b.mp3','Sevirem seni','Vaqif Shixeliyev',1,'98.151.18.118',28,'2009-10-01 03:49:12'),(60,'cca06cca4c8e4a44c1f99308a8b91e6b.mp3','Fantaziya','Vaqif Mustafazade',1,'98.151.18.118',28,'2009-10-01 04:22:02'),(61,'34e3acf3947d89f209e06b64027fd7a6.mp3','Baki geceleri','Vaqif Mustafazade',1,'98.151.18.118',28,'2009-10-01 04:42:10'),(62,'5e045ad437457a8240b9a22e7e201e82.mp3','Aziza','Vaqif Mustafazade',1,'98.151.18.118',28,'2009-10-01 06:24:13'),(63,'871d886b4ce9ee954565ed40324304e6.mp3','Cenab leytenant','Shemistan Elizamanli',1,'98.151.18.118',28,'2009-10-01 06:34:32'),(64,'d5fbb5921ae84ffb712ab3a7e53bf38f.mp3','Xezerin sahilinde','Yuxu',1,'209.131.61.1',28,'2009-10-06 15:40:39'),(65,'4f8f8bd6721ef57d8d688e09e74906a7.mp3','Ulu tanrim','Yuxu',1,'209.131.61.1',28,'2009-10-06 15:42:11'),(66,'cabcbb09d284c126372edd594acbf718.mp3','Bu gece','Roya',1,'209.131.61.1',28,'2009-10-06 16:12:14'),(67,'d72ad4332f11bd4694fbbbb963f1327c.mp3','Sevgilim','Roya',1,'209.131.61.1',28,'2009-10-06 16:19:48'),(68,'http://bulk.nicemice.net:65080/amc/music/songs/madonna/cherish/clip.mp3','Cherish','Madonna',0,NULL,1,'2011-04-07 23:20:55');
/*!40000 ALTER TABLE `music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `vote` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `approved` char(5) DEFAULT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT '0',
  `best_model` varchar(5) DEFAULT NULL,
  `raw_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_FI_1` (`album_id`),
  KEY `photo_FK_2` (`user_id`),
  CONSTRAINT `photo_FK_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `photo_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (28,38,6,'767fe53579abc36dcde97a71ac9b211e.JPG',NULL,'2009-09-01 21:05:30',NULL,1,'','1',0,'0','98.151.18.118'),(35,37,19,'9766d896ac8bcb6abcfa57ba0fbae76b.jpg',NULL,'2009-09-25 20:04:53',NULL,1,'','1',0,'0','98.151.18.118'),(36,37,19,'5d2c23b5135a6ba10af7f4d93d62af28.jpg',NULL,'2009-09-25 20:06:51',NULL,2,'','1',0,'0','98.151.18.118'),(37,38,6,'d51d0cfa7b1192a6e5dcff16138fbd16.JPG',NULL,'2009-09-25 20:08:52',NULL,1,'','1',0,'0','98.151.18.118'),(38,38,6,'7845e29c5f3cbd2915a7178d39699e0d.JPG',NULL,'2009-09-25 20:10:11',NULL,1,'','1',0,'0','98.151.18.118'),(39,38,6,'57a8c3ab1ca70e3187403398d73f5d73.JPG',NULL,'2009-09-25 20:11:28',NULL,1,'','1',0,'0','98.151.18.118'),(40,38,6,'fb8aab05ed7b4a0b893b680b1e713a02.JPG',NULL,'2009-09-25 20:12:27',NULL,1,'','1',0,'0','98.151.18.118'),(41,38,6,'7622281c01908af0fed94fe29b5d9d5f.JPG',NULL,'2009-09-25 20:13:30',NULL,1,'','1',0,'0','98.151.18.118'),(42,38,6,'7f57a498b6ea0b21aba154f19d97c2e4.JPG',NULL,'2009-09-25 20:14:55',NULL,1,'','1',0,'0','98.151.18.118'),(44,37,19,'f0622cef1a727846cb02f3aa4a1f389a.jpg',NULL,'2009-09-28 13:22:24',NULL,1,'','1',0,'0','209.131.61.1'),(45,37,19,'ead1c11febc8ba1f97bac2c4bc54ad11.jpg',NULL,'2009-09-28 13:23:03',NULL,1,'','1',0,'0','209.131.61.1'),(46,37,19,'62ce70c7a5ed33db0615c06651590be6.jpg',NULL,'2009-09-28 13:23:38',NULL,1,'','1',0,'0','209.131.61.1'),(47,37,19,'3a9423fa595ea74845ca60ee27142f88.jpg',NULL,'2009-09-28 13:24:09',NULL,1,'','1',0,'0','209.131.61.1'),(48,37,19,'55e3dc6cf40d41bcf1d756bb38d0887a.jpg',NULL,'2009-09-28 13:24:34',NULL,1,'','1',0,'0','209.131.61.1'),(49,37,19,'1da458849ca6e2a81fff235407675ab9.jpg',NULL,'2009-09-28 13:25:12',NULL,1,'','1',0,'0','209.131.61.1'),(50,37,19,'ed8d9fe719bd179a37f8b8e158f514a2.jpg',NULL,'2009-09-28 13:25:42',NULL,1,'','1',0,'0','209.131.61.1'),(51,37,19,'d55d8a29da8adc994b8ad6b38aaa620d.jpg',NULL,'2009-09-28 13:27:15',NULL,1,'','1',0,'0','209.131.61.1'),(52,37,19,'657566db8986ca724f800ec3e06e8b8a.jpg',NULL,'2009-09-28 13:27:51',NULL,1,'','1',0,'0','209.131.61.1'),(53,37,19,'d0023de70006d8d2458d37c85088fde1.jpg',NULL,'2009-09-28 13:28:21',NULL,1,'','1',0,'0','209.131.61.1'),(54,37,19,'573c8d3c6ab6ff190fbb4c0c0b42a19a.jpg',NULL,'2009-09-28 13:28:51',NULL,1,'','1',0,'0','209.131.61.1'),(55,37,19,'b26f4f9a6cb4b0e691a9862d5dddb261.jpg',NULL,'2009-09-28 13:29:23',NULL,1,NULL,'1',0,NULL,'209.131.61.1'),(56,37,19,'ab4ea86d4767686d0ab8a22dd5cb3d29.jpg',NULL,'2009-09-28 13:29:41',NULL,1,NULL,'1',0,NULL,'209.131.61.1'),(57,37,19,'3ff6a24b650e4f19e6e892c6d8193328.jpg',NULL,'2009-09-28 13:38:51',NULL,1,NULL,'1',0,NULL,'209.131.61.1'),(58,37,19,'811ee6f042df72d1552219dd2d52e741.jpg',NULL,'2009-09-28 13:39:27',NULL,2,'lightning','1',0,'0','209.131.61.1'),(59,37,19,'f97220ba131120d3368705638337e096.jpg',NULL,'2009-09-28 13:40:08',NULL,1,'','1',0,'0','209.131.61.1'),(60,54,19,'8f40edc6acb0e20b8d385f537932b774.jpg',NULL,'2009-09-28 16:18:09',NULL,1,'','1',0,'0','209.131.61.1'),(61,54,19,'a06bcd2d49de74247f08ac49414a6cfe.jpg',NULL,'2009-09-28 16:18:35',NULL,1,'gray fox','1',0,'0','209.131.61.1'),(62,54,19,'07c34e87378257354738f7653cf0b7df.jpg',NULL,'2009-09-28 16:19:12',NULL,3,'bears','1',0,'0','209.131.61.1'),(63,54,19,'d0d0159f5358a9b4ae1dc14242a44c92.jpg',NULL,'2009-09-28 16:19:44',NULL,1,'horse','1',0,'0','209.131.61.1'),(64,37,19,'9ecaae7f771efecc3f84789616f030d6.jpg',NULL,'2009-09-30 13:47:20',NULL,5,'whale','1',0,'0','209.131.61.1'),(65,54,19,'0f144064ed5959493e5a439bc4dec88b.jpg',NULL,'2009-10-01 11:51:37',NULL,1,'polar bear','1',0,'0','209.131.61.1'),(66,37,19,'dedea1f2ca2179284641540ce6d363ac.jpg',NULL,'2009-10-01 11:53:13',NULL,1,'Santa Monica Shore','1',0,'0','209.131.61.1'),(67,37,19,'334f1f9f4ff91ede4142dded72d5a8e0.jpg',NULL,'2009-10-01 12:03:30',NULL,1,'Lightning, Superstition Mountains','1',0,'0','209.131.61.1'),(68,37,19,'80adcc08cc7d49378cda763d038499a9.jpg',NULL,'2009-10-01 12:20:09',NULL,1,'Puu Oo Vent on Mount Kilauea','1',0,'0','209.131.61.1'),(69,37,19,'7c62b46f32b5e64b76e4667cda6f710c.jpg',NULL,'2009-10-01 12:47:07',NULL,1,'Lightning Behind Chimney Rock, Colorado, 1989','1',0,'0','209.131.61.1'),(70,54,19,'acf4ad438202a573b582350cd8916bb9.jpg',NULL,'2009-10-01 22:45:00',NULL,1,'African Lioness Grooming Cubs','1',0,'0','98.151.18.118'),(71,54,19,'a1127a25006ce319593407067db9c16f.jpg',NULL,'2009-10-02 21:48:26',NULL,3,'Siberian Tigers in the Snow','1',0,'0','98.151.18.118'),(72,53,19,'a52b76aad245f276b05ccd07b0c358f4.jpg',NULL,'2009-10-02 21:51:51',NULL,1,'Nile Crocodile','1',0,'0','98.151.18.118'),(73,53,19,'10033fdc7437655a12014bf1bb156742.jpg',NULL,'2009-10-02 21:57:12',NULL,1,'Alligator Basking on a Riverbank','1',0,'0','98.151.18.118'),(74,53,19,'4e019f3f8c0f11f2371b6b6b8a7f8b21.jpg',NULL,'2009-10-02 21:59:35',NULL,1,'Saltwater Crocodile','1',0,'0','98.151.18.118'),(75,55,6,'89eafc82194ef9d7d53f091de38a4eef.jpg',NULL,'2009-10-05 00:06:20',NULL,2,'mustang','1',0,'0','98.151.18.118'),(76,55,6,'c3d8b9b4e99cb53f4f70a9e8735513a8.jpg',NULL,'2009-10-05 00:07:51',NULL,1,'mustang','1',0,'0','98.151.18.118'),(77,54,19,'1cb0e40ca85b46a4e6da8f948d6dadbe.jpg',NULL,'2009-10-05 19:50:30',NULL,2,'Play-Fighting Bengal Tigers','1',0,'0','98.151.18.118'),(78,54,19,'d14c3272398d2eea5b93c038fe0d492b.jpg',NULL,'2009-10-05 19:52:02',NULL,2,'Siberian Tiger Grooming','1',0,'0','98.151.18.118'),(79,54,19,'d6b783917a016a01a7238fac5d8b2b77.jpg',NULL,'2009-10-05 19:55:31',NULL,1,'African Lion','1',0,'0','98.151.18.118'),(80,54,19,'f659216861da27ee3ffa175ccbc5290c.jpg',NULL,'2009-10-06 21:18:07',NULL,1,'African Lioness Snarling in a Tree','1',0,'0','98.151.18.118'),(81,54,19,'1601ec194ec0fa59adc7e7b3cb1afe8b.jpg',NULL,'2009-10-07 22:05:33',NULL,1,'A Female Lion Snarling','1',0,'0','98.151.18.118'),(82,54,19,'5b613a7fcc2f444b91f9ee8d8f9d39fb.jpg',NULL,'2009-10-07 22:06:17',NULL,4,'Leopard in a Treetop Perch','1',0,'0','98.151.18.118'),(83,54,19,'a57629724c09b89dcb862be2dd32a04a.jpg',NULL,'2009-10-07 22:08:42',NULL,2,'Rare Snow Leopard','1',0,'0','98.151.18.118'),(84,54,19,'7d039673d8d6146c62b3e0a13a1260f1.jpg',NULL,'2009-10-07 22:10:38',NULL,1,'Mountain Lion Surveying Its Territory','1',0,'0','98.151.18.118'),(85,54,19,'419ff3836fc70ede9b2c26e17f47f2c5.jpg',NULL,'2009-10-07 22:12:02',NULL,1,'Young Female Jaguar','1',0,'0','98.151.18.118'),(86,54,19,'b8bbad5c17221b7e2213ba3dc0c7129b.jpg',NULL,'2009-10-09 00:44:36',NULL,1,'Walrus ','1',0,'0','98.151.18.118'),(87,54,19,'97882cbb6b4fbd94d65330aaef6a15f3.jpg',NULL,'2009-10-09 00:46:07',NULL,1,'New Zealand Fur Seal and Her Pup','1',0,'0','98.151.18.118'),(88,37,19,'243331abd8f9960b5fbccc44d8dbb8db.jpg',NULL,'2009-10-15 19:32:06',NULL,2,'Grand Canyon','1',0,'0','209.131.61.1'),(90,58,6,'6b72907724cb3c6dcd5ce959b605e12d.jpg',NULL,'2009-10-17 20:46:43',NULL,1,'in kodak theatre','1',1,'0','98.151.18.118');
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_categories`
--

DROP TABLE IF EXISTS `photo_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'null',
  `description` text NOT NULL,
  `pos` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `thumb` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_categories_FI_1` (`user_id`),
  CONSTRAINT `photo_categories_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_categories`
--

LOCK TABLES `photo_categories` WRITE;
/*!40000 ALTER TABLE `photo_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `photo_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_comment`
--

DROP TABLE IF EXISTS `photo_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_comment` (
  `photo_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text,
  `created_at` datetime DEFAULT NULL,
  `raw_ip` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_comment_FI_1` (`photo_id`),
  KEY `photo_comment_FI_2` (`user_id`),
  CONSTRAINT `photo_comment_FK_1` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photo_comment_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_comment`
--

LOCK TABLES `photo_comment` WRITE;
/*!40000 ALTER TABLE `photo_comment` DISABLE KEYS */;
INSERT INTO `photo_comment` VALUES (73,1,'such a nasty animal','2009-10-22 14:20:28',NULL,6);
/*!40000 ALTER TABLE `photo_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_fav`
--

DROP TABLE IF EXISTS `photo_fav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_fav` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`photo_id`,`user_id`),
  KEY `photo_fav_FI_1` (`photo_id`),
  KEY `photo_fav_FI_2` (`user_id`),
  CONSTRAINT `photo_fav_FK_1` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photo_fav_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_fav`
--

LOCK TABLES `photo_fav` WRITE;
/*!40000 ALTER TABLE `photo_fav` DISABLE KEYS */;
INSERT INTO `photo_fav` VALUES (48,1,'2009-09-28 14:47:56'),(58,28,'2009-11-14 15:22:04'),(60,28,'2009-11-14 15:21:30'),(62,6,'2009-10-12 20:09:26'),(62,19,'2009-10-23 16:24:18'),(64,6,'2009-10-03 22:57:52'),(64,22,'2009-11-02 23:08:49'),(75,19,'2009-10-05 19:57:43'),(77,22,'2009-11-02 23:09:01'),(78,28,'2009-11-14 15:21:45'),(82,6,'2009-10-08 22:50:22'),(82,18,'2009-10-08 01:00:15'),(82,32,'2009-11-20 12:51:59'),(83,18,'2009-10-08 01:00:27'),(83,32,'2009-11-20 12:51:12'),(88,22,'2009-11-02 23:09:19');
/*!40000 ALTER TABLE `photo_fav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_tag`
--

DROP TABLE IF EXISTS `photo_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_tag` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `normalized_tag` varchar(100) NOT NULL,
  PRIMARY KEY (`photo_id`,`normalized_tag`),
  KEY `photo_tag_I_1` (`normalized_tag`),
  KEY `photo_tag_FI_2` (`user_id`),
  CONSTRAINT `photo_tag_FK_1` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photo_tag_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_tag`
--

LOCK TABLES `photo_tag` WRITE;
/*!40000 ALTER TABLE `photo_tag` DISABLE KEYS */;
INSERT INTO `photo_tag` VALUES (57,19,'2009-10-01 22:50:47','swans','swans'),(60,19,'2009-10-04 01:34:39','bear','bear'),(70,19,'2009-10-07 23:43:59','lion','lion'),(70,19,'2009-10-21 22:09:44','lions','lions'),(71,19,'2009-10-07 23:47:05','Tiger','tiger'),(77,19,'2009-10-07 23:46:43','Tiger','tiger'),(79,19,'2009-10-21 22:10:47','lions','lions'),(80,19,'2009-10-06 21:18:57','lion','lion'),(80,19,'2009-10-21 22:11:16','lions','lions'),(81,19,'2009-10-07 23:43:15','lion','lion'),(81,19,'2009-10-21 22:10:17','lions','lions'),(84,19,'2009-10-21 22:10:29','lion','lion'),(84,19,'2009-10-21 22:10:33','lions','lions'),(88,19,'2010-12-06 14:36:04','nature','nature');
/*!40000 ALTER TABLE `photo_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_vote`
--

DROP TABLE IF EXISTS `photo_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_vote` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`photo_id`,`user_id`),
  KEY `photo_vote_FI_2` (`user_id`),
  CONSTRAINT `photo_vote_FK_1` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photo_vote_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_vote`
--

LOCK TABLES `photo_vote` WRITE;
/*!40000 ALTER TABLE `photo_vote` DISABLE KEYS */;
INSERT INTO `photo_vote` VALUES (28,6,'2009-09-01 21:06:03'),(35,19,'2009-09-25 20:05:49'),(36,6,'2009-09-26 21:47:28'),(36,19,'2009-10-04 02:06:55'),(37,6,'2009-09-25 20:09:03'),(38,6,'2009-09-25 20:17:03'),(39,6,'2009-09-25 20:17:04'),(40,6,'2009-09-25 20:17:06'),(41,6,'2009-09-25 20:17:08'),(42,6,'2009-09-25 20:17:09'),(44,19,'2009-09-28 13:41:02'),(45,19,'2009-09-28 13:41:00'),(46,19,'2009-09-28 13:40:58'),(47,19,'2009-09-28 13:40:56'),(48,19,'2009-09-28 13:40:54'),(49,19,'2009-09-28 13:40:46'),(50,19,'2009-09-28 13:40:44'),(51,19,'2009-09-28 13:40:42'),(52,19,'2009-09-28 13:40:40'),(53,19,'2009-09-28 13:40:39'),(54,19,'2009-09-28 13:40:37'),(55,19,'2009-09-28 13:40:36'),(56,19,'2009-09-28 13:40:34'),(57,19,'2009-09-28 13:40:32'),(58,6,'2009-09-29 18:07:30'),(58,19,'2009-09-28 13:40:31'),(59,19,'2009-09-28 13:40:30'),(60,19,'2009-09-28 16:20:20'),(61,19,'2009-09-28 16:20:18'),(62,6,'2009-11-03 22:14:34'),(62,19,'2009-09-28 16:19:32'),(62,28,'2009-10-06 12:48:49'),(63,19,'2009-09-28 16:20:16'),(64,1,'2009-10-06 10:59:07'),(64,6,'2009-09-30 20:58:06'),(64,19,'2009-09-30 13:47:43'),(64,22,'2009-11-02 23:08:51'),(64,28,'2009-10-06 12:39:15'),(65,19,'2009-10-01 11:51:59'),(66,19,'2009-10-01 12:43:36'),(67,19,'2009-10-01 12:04:03'),(68,19,'2009-10-01 12:21:19'),(69,19,'2009-10-01 12:47:22'),(70,19,'2009-10-01 22:45:15'),(71,1,'2009-10-06 10:59:18'),(71,19,'2009-10-02 21:50:26'),(71,28,'2009-10-06 12:39:11'),(72,19,'2009-10-02 21:52:21'),(73,19,'2009-10-02 21:57:29'),(74,19,'2009-10-02 21:59:58'),(75,6,'2009-10-05 00:06:56'),(75,19,'2009-10-07 22:19:54'),(76,6,'2009-10-05 00:08:42'),(77,19,'2009-10-05 19:50:45'),(77,22,'2009-11-02 23:09:02'),(78,19,'2009-10-05 19:52:18'),(78,28,'2009-11-14 15:21:48'),(79,19,'2009-10-05 19:55:45'),(80,19,'2009-10-06 21:19:08'),(81,19,'2009-10-07 22:09:11'),(82,6,'2009-10-08 22:50:24'),(82,19,'2009-10-07 22:06:39'),(82,22,'2009-11-02 01:01:15'),(82,32,'2009-11-20 12:51:57'),(83,18,'2009-10-08 01:00:28'),(83,19,'2009-10-07 22:08:52'),(84,19,'2009-10-07 22:16:12'),(85,19,'2009-10-07 22:12:20'),(86,19,'2009-10-09 00:45:01'),(87,19,'2009-10-09 00:47:36'),(88,19,'2009-10-15 19:32:25'),(88,22,'2009-11-02 23:09:18'),(90,6,'2009-10-17 20:47:39');
/*!40000 ALTER TABLE `photo_vote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `playlist_FI_1` (`user_id`),
  CONSTRAINT `playlist_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist`
--

LOCK TABLES `playlist` WRITE;
/*!40000 ALTER TABLE `playlist` DISABLE KEYS */;
INSERT INTO `playlist` VALUES (47,'admin\'s playlist',1,'2009-04-11 22:14:31'),(62,'madonna',6,'2009-08-07 13:49:11'),(63,'bookstore\'s playlist',18,'2009-08-11 00:44:35'),(64,'carrie underwood',6,'2009-08-13 14:09:07'),(65,'arash',6,'2009-08-27 22:17:59'),(67,'photographer\'s playlist',19,'2009-08-29 22:13:18'),(68,'lovely\'s playlist',20,'2009-09-02 01:01:28'),(71,'christina aguilera',6,'2009-09-04 17:03:27'),(72,'turkish songs',22,'2009-09-06 20:54:26'),(74,'Jeyhun\'s playlist',23,'2009-09-08 15:16:15'),(76,'hesret\'s playlist',25,'2009-09-22 12:39:20'),(77,'general',6,'2009-09-22 21:18:57'),(78,'frestopresto\'s playlist',26,'2009-09-24 15:54:42'),(79,'elya\'s playlist',27,'2009-09-24 22:24:01'),(81,'alterego\'s playlist',29,'2009-09-25 04:12:13'),(82,'ruslanfm\'s playlist',30,'2009-09-25 05:48:27'),(83,'KapitaN\'s playlist',31,'2009-09-25 07:07:43'),(84,'Eyyub Yaqubov',28,'2009-09-29 12:56:43'),(85,'Agadadash Agayev',28,'2009-09-29 13:04:09'),(86,'Aygun Kazimova',28,'2009-09-29 13:40:56'),(87,'mathew\'s playlist',32,'2009-09-30 21:29:16'),(88,'Vaqif Shixeliyev',28,'2009-09-30 23:41:08'),(89,'Vaqif Mustafazade',28,'2009-10-01 00:22:00'),(90,'Shemistan Elizamanli',28,'2009-10-01 02:34:28'),(91,'gece_kabusu\'s playlist',33,'2009-10-03 17:19:28'),(92,'Polad Hajiyev\'s playlist',34,'2009-10-05 13:21:43'),(93,'mojtaba\'s playlist',35,'2009-10-06 04:25:52'),(94,'yuxu',28,'2009-10-06 11:40:22'),(95,'Roya',28,'2009-10-06 12:11:58'),(96,'Mila\'s playlist',36,'2009-10-19 12:20:54'),(97,'zaur\'s playlist',37,'2009-10-19 12:39:26'),(98,'photo76\'s playlist',38,'2009-11-01 05:48:09'),(99,'my playlist',22,NULL),(100,'armintell\'s playlist',39,'2010-01-20 03:25:48'),(101,'amina\'s playlist',40,'2010-06-02 11:06:52'),(102,'Camelia\'s playlist',41,'2010-06-17 17:24:54'),(103,'Gispesefruice\'s playlist',42,'2011-01-19 02:21:20'),(104,'ViagraCANADA\'s playlist',43,'2011-02-01 19:09:13'),(105,'Wolekiiosacs\'s playlist',44,'2011-02-02 00:22:00'),(106,'ObLinguib\'s playlist',45,'2011-02-11 07:47:43'),(107,'sammygez\'s playlist',46,'2011-03-06 08:40:26'),(108,'Insipssot\'s playlist',47,'2011-03-27 01:59:21'),(109,'Nandabidya\'s playlist',48,'2011-03-31 13:06:34'),(110,'RhywozyTozy\'s playlist',49,'2011-04-01 00:23:25'),(111,'imitobakakiff\'s playlist',50,'2011-04-03 06:47:25'),(112,'vapLoovarip\'s playlist',51,'2011-04-07 09:54:15'),(113,'urikick\'s playlist',52,'2011-04-13 17:25:09'),(114,'Enveway\'s playlist',53,'2011-04-15 17:10:33'),(115,'shoulty\'s playlist',54,'2011-04-19 19:15:07'),(116,'ThomasNG\'s playlist',55,'2011-04-25 04:36:17'),(117,'ggmsmtt\'s playlist',56,'2011-05-03 07:11:15'),(118,'sippenimels\'s playlist',57,'2011-05-09 04:17:46'),(119,'astewNeabtype\'s playlist',58,'2011-05-11 20:48:24'),(120,'snaduanyDaf\'s playlist',59,'2011-05-15 08:44:39'),(121,'CoattTraica\'s playlist',60,'2011-05-20 23:11:16'),(122,'finnausashy\'s playlist',61,'2011-05-28 03:23:41'),(123,'artimaVet\'s playlist',62,'2011-05-30 07:44:59'),(124,'diorioure\'s playlist',63,'2011-06-21 07:45:41'),(125,'rigiollihoofs\'s playlist',64,'2011-07-10 01:55:02'),(126,'Thittee\'s playlist',65,'2011-07-30 21:03:56'),(127,'Soarorguepodo\'s playlist',66,'2011-08-18 19:14:43'),(128,'Vulgeft\'s playlist',67,'2011-08-20 02:42:46'),(129,'Speatly\'s playlist',68,'2011-08-22 09:14:06'),(130,'feavips\'s playlist',69,'2011-09-03 22:06:22'),(131,'Kedlign\'s playlist',70,'2011-09-28 20:56:44');
/*!40000 ALTER TABLE `playlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlist_comment`
--

DROP TABLE IF EXISTS `playlist_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlist_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playlist_id` int(11) NOT NULL,
  `body` mediumtext,
  `created_at` datetime DEFAULT NULL,
  `raw_ip` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `playlist_comment_FI_1` (`playlist_id`),
  KEY `playlist_comment_FI_2` (`user_id`),
  CONSTRAINT `playlist_comment_FK_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE CASCADE,
  CONSTRAINT `playlist_comment_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist_comment`
--

LOCK TABLES `playlist_comment` WRITE;
/*!40000 ALTER TABLE `playlist_comment` DISABLE KEYS */;
INSERT INTO `playlist_comment` VALUES (1,65,'hmm, I have never heard about this mix.','2009-09-09 00:16:20',NULL,22),(2,79,'bes agadadas agayev?','2009-09-30 23:20:33',NULL,27),(4,79,'yari senden yari menden mahnisi','2009-10-01 00:10:26',NULL,27),(5,79,'yari senden yari menden mahnisi','2009-10-01 00:10:30',NULL,27),(6,79,'birde mahnisi var e deir. ay balim shekerim nazinin cekerim canimnan kecerim yaar','2009-10-01 00:11:09',NULL,27),(7,79,'gulum o gunden beri sen dilimin ezberi yoxmus xeberin dilberim','2009-10-01 00:11:50',NULL,27),(8,79,'bes nye Yar Gelmedi add elemey isteirem olmur? byas','2009-10-01 00:13:27',NULL,27),(9,79,'agadadashi menim playlistimnen add eda bilersen\n\nhttp://fmpsv.com/editPlaylist/show/playlist_id/85','2009-10-01 00:52:13',NULL,28);
/*!40000 ALTER TABLE `playlist_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlist_fav`
--

DROP TABLE IF EXISTS `playlist_fav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlist_fav` (
  `playlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`playlist_id`,`user_id`),
  KEY `playlist_fav_FI_1` (`playlist_id`),
  KEY `playlist_fav_FI_2` (`user_id`),
  CONSTRAINT `playlist_fav_FK_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE CASCADE,
  CONSTRAINT `playlist_fav_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist_fav`
--

LOCK TABLES `playlist_fav` WRITE;
/*!40000 ALTER TABLE `playlist_fav` DISABLE KEYS */;
INSERT INTO `playlist_fav` VALUES (74,23,'2009-09-24 20:08:12'),(77,23,'2009-11-16 21:38:39');
/*!40000 ALTER TABLE `playlist_fav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlist_music`
--

DROP TABLE IF EXISTS `playlist_music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlist_music` (
  `playlist_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`playlist_id`,`music_id`),
  KEY `playlist_music_FI_2` (`music_id`),
  CONSTRAINT `playlist_music_FK_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `playlist_music_FK_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist_music`
--

LOCK TABLES `playlist_music` WRITE;
/*!40000 ALTER TABLE `playlist_music` DISABLE KEYS */;
INSERT INTO `playlist_music` VALUES (72,19),(72,25),(62,26),(64,28),(77,28),(99,28),(72,30),(72,31),(72,32),(62,33),(77,33),(72,34),(65,35),(77,35),(71,38),(77,38),(77,40),(77,41),(77,42),(77,43),(74,44),(77,45),(77,46),(77,47),(77,48),(87,48),(99,48),(85,50),(79,51),(84,51),(84,52),(77,53),(85,53),(85,54),(86,55),(86,56),(79,57),(88,57),(79,58),(88,58),(79,59),(88,59),(89,60),(89,61),(89,62),(90,63),(94,64),(94,65),(95,66),(95,67),(99,68);
/*!40000 ALTER TABLE `playlist_music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search`
--

DROP TABLE IF EXISTS `search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1170 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search`
--

LOCK TABLES `search` WRITE;
/*!40000 ALTER TABLE `search` DISABLE KEYS */;
INSERT INTO `search` VALUES (1168,'madonna'),(1169,'madonna');
/*!40000 ALTER TABLE `search` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group`
--

DROP TABLE IF EXISTS `sf_guard_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_group_U_1` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group`
--

LOCK TABLES `sf_guard_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group_permission`
--

DROP TABLE IF EXISTS `sf_guard_group_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_FI_2` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_FK_1` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group_permission`
--

LOCK TABLES `sf_guard_group_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_group_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_permission`
--

DROP TABLE IF EXISTS `sf_guard_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_permission_U_1` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_permission`
--

LOCK TABLES `sf_guard_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_remember_key`
--

DROP TABLE IF EXISTS `sf_guard_remember_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_remember_key` (
  `user_id` int(11) NOT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`ip_address`),
  CONSTRAINT `sf_guard_remember_key_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_remember_key`
--

LOCK TABLES `sf_guard_remember_key` WRITE;
/*!40000 ALTER TABLE `sf_guard_remember_key` DISABLE KEYS */;
INSERT INTO `sf_guard_remember_key` VALUES (65,'60c4478a645a2f93ab9ce92f454b3563','109.173.36.109','2011-08-08 13:42:57');
/*!40000 ALTER TABLE `sf_guard_remember_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user`
--

DROP TABLE IF EXISTS `sf_guard_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '0',
  `is_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_user_U_1` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user`
--

LOCK TABLES `sf_guard_user` WRITE;
/*!40000 ALTER TABLE `sf_guard_user` DISABLE KEYS */;
INSERT INTO `sf_guard_user` VALUES (1,'admin','sha1','1fa64196603983ec71e14e15db7a459c','af53eeaac6b1c55fc8b761424fd2e2eb2565bd53','info@fmpsv.com','2008-12-06 01:19:35','2010-11-28 21:06:41',1,1),(6,'alxkn','sha1','aa58862852468f55e3984633f747d63e','244157ba14b6377482ef79269df1e8429d4ea8d0','alxsss29@yahoo.com','2009-07-16 14:01:55','2011-01-04 20:25:43',1,0),(18,'bookstore','sha1','a4763f5e5e3573702478a88d4703e781','fc2ba443f127dc7ec30b2d16c97055ce85a0b0ee','shervgis@yahoo.com','2009-08-11 00:44:35','2009-10-08 00:59:40',1,0),(19,'photographer','sha1','6d6f4651472b6c9a26a36fceff4328ff','0e04cb37ce8f69a0ec0249a5f9219f1c336d7457','alxsss@aim.com','2009-08-29 22:13:18','2011-04-12 17:55:21',1,0),(20,'lovely','sha1','2c4911300878e18f34a03ed37415f24e','30f752af099d905aba72db66b73db4dec008063c','a_ayten23@mail.ru','2009-09-02 01:01:27',NULL,1,0),(22,'shervgi','sha1','0208817f51a79e8cb0e8c876773bf075','68a2935a42b24d80be614d41c04c2a8796670bbe','shervgi5@yahoo.com','2009-09-03 16:21:36','2011-04-07 19:17:07',1,0),(23,'Jeyhun','sha1','79fc0c393f131452a714b3b2714908f6','3d683a2073ff60093246b44aa289e23549ad72d2','s_ceyhun76@yahoo.com','2009-09-08 15:16:15','2009-11-16 21:38:31',1,0),(25,'hesret','sha1','e890d42e1c75f84bba24b1eb50273562','f743782444016515b93b515d0252d0805bcfda2d','iskn29@yahoo.com','2009-09-22 12:39:19','2009-10-06 11:39:11',1,0),(26,'frestopresto','sha1','03f3f00b69e512f6a10b7b300fdf1cd2','0117e44b8ce9dacdde4d5d4a2e2204baf580b052','fshaheen@usc.edu','2009-09-24 15:54:42',NULL,1,0),(27,'elya','sha1','ec499d5a20fd4a55b146f775b3a8defd','f163d0750a6a52a1c63f3d5b24616581968539cf','elnarita3@hotmail.com','2009-09-24 22:24:01','2009-10-06 22:54:47',1,0),(28,'cavanshir','sha1','1f942e7d60b6d75460fdfb19faa031c8','1032af440cb6a5dfd30be6ddc2879fb4ea56dc20','cavanshirav@gmail.com','2009-09-24 23:43:42','2010-02-10 07:37:13',1,0),(29,'alterego','sha1','ba01f2968503968c09bf0350f39e1cc7','cb12f56d8b61548f3f837e3ca5896c889deb1383','alter_ego728@mail.ru','2009-09-25 04:12:13','2009-10-06 05:10:30',1,0),(30,'ruslanfm','sha1','9e609acf6666f3fc78f26eb447a8af9f','677bf2d42d37797ca0d3f1ec30ab57784ae22d26','ruslanfm@walla.com','2009-09-25 05:48:26',NULL,1,0),(31,'KapitaN','sha1','234753a397fa2ebf0f3f30f42192e753','d4f847be426cd227efa6d9c10676ebaf58dcb1a5','KapitaN89@gmail.com','2009-09-25 07:07:43',NULL,1,0),(32,'matthew','sha1','345715c8dec3954b86cd88c5f2b8dd81','a1e304cba26e31cf44516aa88480bbe7f3660b48','alxsss29@yahoo.com','2009-09-30 21:29:15','2009-11-20 12:47:58',1,0),(33,'gece_kabusu','sha1','28412068deb07e7d09ebb84334f6cdc7','a10004882038700dd4a8cddf17261f661009903e','s.salahov@mail.ru','2009-10-03 17:19:28','2009-10-04 14:58:04',1,0),(34,'Polad Hajiyev','sha1','f16ff4991490266594832391268720d4','93a999cf49ef18af7fb19ee0ecf5c77e589b9e0d','polad_ps@hotmail.com','2009-10-05 13:21:42','2009-10-06 03:01:48',1,0),(35,'mojtaba','sha1','4f29edc0b50757fad09cb21fc41b6f9b','6f84f66188c96bb180b1f7fa6b031065140bb384','mojtaba_afshar@yahoo.com','2009-10-06 04:25:52','2009-10-11 09:25:24',1,0),(36,'Mila','sha1','04adb974ecf2d85b1a05c66a5fa5981f','e68aef18fb49f3b741d2de6eb2911d6c14fabab1','mila_kerim@yahoo.com','2009-10-19 12:20:54','2009-10-19 12:21:59',1,0),(37,'zaur','sha1','1bb20cceff47707bdf4564851a673916','8af78b2853dfa1776c1abfd8a47ed9c504330094','fez091@box.az','2009-10-19 12:39:25','2009-10-19 12:39:42',1,0),(38,'photo76','sha1','ddd52bbaf6bb673933a485502b25751a','9c83c511fa630606e8e6e31d17130bfafd96b424','umutalkacir@yahoo.com','2009-11-01 05:48:08','2009-11-01 05:48:29',1,0),(39,'armintell','sha1','8f2965152a457a46e13ed30f0e2295e0','74d0ffd897d164160632c49fcb4b04c945005f52','armintell@gmail.com','2010-01-20 03:25:47','2010-01-20 03:27:40',1,0),(40,'amina','sha1','433c6facbce13b919dd72115e48f6af2','a8ecff320771488c81def61e7fa6a7933455e955','aminashahv@yahoo.com','2010-06-02 11:06:51','2010-07-18 15:17:49',1,0),(41,'Camelia','sha1','253e4154b4571c63a2d76c70b87b15ec','3c707b8b10db387eed0afc744651822dcb1fb3a6','aliyeva_h@box.az','2010-06-17 17:24:53','2010-06-17 17:25:11',1,0),(42,'Gispesefruice','sha1','27edfddf537cc10b8cb8fda615a86c9d','618c20ab4b67804cf38d240563fe75ee962ab5a4','clothes@morko.info','2011-01-19 02:21:18',NULL,1,0),(43,'ViagraCANADA','sha1','435561d54aa3baa4c5fe89aa98228f08','578877283dc3fcd513d29bb13cc882273387c84d','viagrapric07@torgoviy-dom.com','2011-02-01 19:09:12',NULL,1,0),(44,'Wolekiiosacs','sha1','ce201a5c127cfc7b7c8ca358654095dc','a2822b9b440dd2511391362de232dadd707a0e85','leonc696@gmail.com','2011-02-02 00:21:59',NULL,1,0),(45,'ObLinguib','sha1','059b0adaee7bbc48606d26178f0aee27','93fb054b93d5acd5338d7a3d53ce1a6d43737d34','mashagsatgas@mail.ru','2011-02-11 07:47:41',NULL,1,0),(46,'sammygez','sha1','90e09fd6740885d73a050bc9a29f2763','901c8bc729b9c67eb3f89703e2894dad2f717cbc','yrmpxgwju@1vipmail.net','2011-03-06 08:40:25',NULL,1,0),(47,'Insipssot','sha1','4178e7d345c4d05d714d9d66f4c0ad09','f71f90969ba71505d561e655227c33df1516b0b6','tobiahmackdeq@gmail.com','2011-03-27 01:59:17',NULL,1,0),(48,'Nandabidya','sha1','ba9a819263586b14bdf745e4f6179c31','d1966318fa2eaa99121f4471cbdceacb7dff5ada','creemxg5548@yahoo.co.uk','2011-03-31 13:06:33',NULL,1,0),(49,'RhywozyTozy','sha1','c7ec10e23171ceeb4c5ec5d6bd008f1e','2bde1f79762cf00d756f9ff07571a877f207fb9e','guadalupe.mathews57@gmail.com','2011-04-01 00:23:24',NULL,1,0),(50,'imitobakakiff','sha1','989d283206f900964d33172496b57502','52db8ae257124c36f7c5ac6ac63d5931d52c6dfb','celize.walsh@gmail.com','2011-04-03 06:47:25',NULL,1,0),(51,'vapLoovarip','sha1','8c86be59f3fca007fbd8743203baa7ac','1c9170f589f2cdbb5817d5e067a9d0cf764e9f3e','i.ndianblogtrick@gmail.com','2011-04-07 09:54:14',NULL,1,0),(52,'urikick','sha1','cf5d381c2f45e4960bcd874ba612001d','2f4774fb7451b7c477967b42149af4b577d4163c','haywespled@gmail.com','2011-04-13 17:25:08',NULL,1,0),(53,'Enveway','sha1','a0c9f44be2bb584912c2badd32b03879','45de44b20e29b078e9d6272eb37884606cc68c1d','kremleva7@gmail.com','2011-04-15 17:10:32',NULL,1,0),(54,'shoulty','sha1','dc4e3bb18f2da29b91eea57713b524b4','f3725dccabf7f8144b7a3a544fd3d098e30dd1d2','werasinal@gmail.com','2011-04-19 19:15:05','2011-04-22 19:36:11',1,0),(55,'ThomasNG','sha1','b209e2c86a80d62ff8467639e1fed548','5543975ca7c643860d6e61a665387b0fd7af7149','wesdesq@gmail.com','2011-04-25 04:36:14',NULL,1,0),(56,'ggmsmtt','sha1','19ad7c5a735e342220cf4c55432cabb0','d166672e3a17cc50d41472bd23c9ea80314a0fab','xaaobjp@gmail.com','2011-05-03 07:11:15',NULL,1,0),(57,'sippenimels','sha1','77f9d75f80c61a032b133306892ca25c','4d5a07c8824f420430bb26989f2715fb8f1ac676','uphowtheome@mail.ru','2011-05-09 04:17:45',NULL,1,0),(58,'astewNeabtype','sha1','204cf5af9133c3618dc1255db7415a21','150e10a340dce452be49ab2aacc5dbc9cb519bea','b.o.rizzzy@gmail.com','2011-05-11 20:48:21',NULL,1,0),(59,'snaduanyDaf','sha1','86cff1bb44585707d7eaf489e29063d1','453afb861d2fb0d4c847adbb948790b9978011e0','stediaimpedge@mail.ru','2011-05-15 08:44:33',NULL,1,0),(60,'CoattTraica','sha1','664f91915df449dc09f37f456c8356e9','f70431abca141f43c433c3f8532a0f1681880d89','armandafilantbhg@hotmail.com','2011-05-20 23:11:14',NULL,1,0),(61,'finnausashy','sha1','91dc29a31af2dbd459b22901b80a7492','fffd416ecc5b289e8b685f0f8c78b75e94decd00','finnausashy@livejournali.com','2011-05-28 03:23:38',NULL,1,0),(62,'artimaVet','sha1','fd1293ebe76ab21e47f7542f77f98281','8a97a803f1680383bfa402987a4b18e9955a9ce0','seeneikelry@mail.ru','2011-05-30 07:44:58',NULL,1,0),(63,'diorioure','sha1','88a4f57f29a9406e614c1c4ce3e789f6','edff0549e927e05b0a7c59903e12236d4ac63719','rassadasgriadki@gmail.com','2011-06-21 07:45:38',NULL,1,0),(64,'rigiollihoofs','sha1','7482cbc256c4b21ab9405f0e5eeb4719','b4f143e2c79616358379ef842babbd02bebcb951','anton@pichosti.info','2011-07-10 01:54:57',NULL,1,0),(65,'Thittee','sha1','31ea4e9393f0a334a36b7f891458154f','692ce6a3e3f2a6b35a3d289554fca012f4ba7848','escalevagifil@gmail.com','2011-07-30 21:03:52','2011-08-08 13:42:57',1,0),(66,'Soarorguepodo','sha1','9902a8e4d7bde5d5568c3357f57fbb46','9b28c8f2b7fb5bd2bd8f9d1f8306bbdde8573d84','malvinabarzoz@gmail.com','2011-08-18 19:14:38',NULL,1,0),(67,'Vulgeft','sha1','c594baf1cec24882057f2bc595d0559b','0d36b8d97db736e4bcbc37a85a8952a102cf7fcf','adah6labadpe@gmail.com','2011-08-20 02:42:42',NULL,1,0),(68,'Speatly','sha1','2084bb415c5240ffb686593b8a4a339f','24dc2eee992849b2890ac68b24605f22d6404488','korbin8hegmvnn@gmail.com','2011-08-22 09:14:05',NULL,1,0),(69,'feavips','sha1','d0081fb9632ed22939a5ee6118753d21','c372c3f409ba0dedc3a65b24d1a048265456d576','xhpjiggfxvsvs@gmail.com','2011-09-03 22:06:19',NULL,1,0),(70,'Kedlign','sha1','ba39d44bfb7cf8f77bb894587e963f71','013cb1478b2b761544d676e358f73e13e78f9ec9','binnellsh.y.qu.c@gmail.com','2011-09-28 20:56:35',NULL,1,0);
/*!40000 ALTER TABLE `sf_guard_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_group`
--

DROP TABLE IF EXISTS `sf_guard_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_FI_2` (`group_id`),
  CONSTRAINT `sf_guard_user_group_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_FK_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_group`
--

LOCK TABLES `sf_guard_user_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_permission`
--

DROP TABLE IF EXISTS `sf_guard_user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_FI_2` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_permission`
--

LOCK TABLES `sf_guard_user_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_profile`
--

DROP TABLE IF EXISTS `sf_guard_user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `lookingfor` mediumtext,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `countries_id` int(11) DEFAULT NULL,
  `website` mediumtext,
  `activities` mediumtext,
  `books` mediumtext,
  `music` mediumtext,
  `movies` mediumtext,
  `tvshows` mediumtext,
  `aboutme` mediumtext,
  `college` mediumtext,
  `major` mediumtext,
  `tab` tinyint(4) DEFAULT '1',
  `validate` varchar(17) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sf_guard_user_profile_FI_1` (`user_id`),
  CONSTRAINT `sf_guard_user_profile_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_profile`
--

LOCK TABLES `sf_guard_user_profile` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_profile` DISABLE KEYS */;
INSERT INTO `sf_guard_user_profile` VALUES (2,1,'Jonathan','Tibbett','1984-06-08',NULL,1,1,'','New York','New York','',223,'','','','','','','','','',1,''),(21,6,'Alexander','Kingson','1979-05-20','',1,NULL,'friendship, networking','Los Angeles','ca','',223,'fmpsv.com/user/alxkn','software developer','cinematography, unlimited power, NLP','carrie underwood','freedom or death','','','lacc, Cinematography','physics',3,''),(33,18,NULL,NULL,'1989-05-21',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(34,19,'','','1988-06-08',NULL,1,NULL,'friendship','','','',223,'','amateur photographer','','','','','','','',3,''),(35,20,NULL,NULL,'1985-03-28',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'n3272efaa0facc803'),(37,22,'Shervgi','Shahverdiyev','1979-05-20',NULL,1,NULL,'','Los Angeles','CA','',223,'http://fmpsv.com/user/shervgi','Filmmaker, Software developer','','','','','','LACC','',2,''),(38,23,NULL,NULL,'1976-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(40,25,'Hesret','Huseynov','1990-01-01',NULL,1,NULL,'','','','',15,'','','','','','','','','',1,''),(41,26,NULL,NULL,'1984-09-27',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'nb33e1f9abc2f346a'),(42,27,'Elnara','Sofiyeva','1940-05-25','52c67c874fd7acf3890e0a7f8c8cf4ac41f7164f.jpg',1,NULL,'Azerbaijan','Los Angeles','CA','90007',223,'','','','','','','','','',2,''),(43,28,'Cavanshir','Aliyev','1979-01-20',NULL,1,NULL,'','Baku','','',15,'','','','','','','','','',2,''),(44,29,NULL,NULL,'1987-03-20',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(45,30,NULL,NULL,'1986-10-19',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(46,31,NULL,NULL,'1989-06-08',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(47,32,'','','1973-01-01',NULL,1,NULL,'','','','',223,'','','','','','','','','',3,''),(48,33,NULL,NULL,'1989-03-02',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(49,34,NULL,NULL,'1989-06-17',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(50,35,NULL,NULL,'1972-08-11',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(51,36,NULL,NULL,'1988-03-18',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(52,37,NULL,NULL,'1991-12-10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(53,38,NULL,NULL,'1959-02-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(54,39,NULL,NULL,'1980-01-30',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(55,40,NULL,NULL,'1986-04-26',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(56,41,NULL,NULL,'1977-03-03',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(57,42,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(58,43,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(59,44,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(60,45,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(61,46,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(62,47,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(63,48,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(64,49,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(65,50,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(66,51,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(67,52,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(68,53,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(69,54,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(70,55,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(71,56,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(72,57,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(73,58,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(74,59,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(75,60,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(76,61,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(77,62,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(78,63,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(79,64,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(80,65,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(81,66,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(82,67,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(83,68,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(84,69,NULL,NULL,'1931-01-01',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(85,70,NULL,NULL,'1931-01-01',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `sf_guard_user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_status`
--

DROP TABLE IF EXISTS `sf_guard_user_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status_name` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sf_guard_user_status_FI_1` (`user_id`),
  CONSTRAINT `sf_guard_user_status_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_status`
--

LOCK TABLES `sf_guard_user_status` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_status` DISABLE KEYS */;
INSERT INTO `sf_guard_user_status` VALUES (2,22,'trying to create a playlist','2009-11-02 23:02:26'),(3,1,'we will add more videos next week','2009-10-07 17:01:40'),(5,19,'trying to find good photos of nature and animals','2009-09-25 14:18:13'),(6,18,'good place to sell stuff','2009-09-30 21:17:50'),(7,28,'burda havayi musiqiye  qulaq asiram','2009-10-06 12:26:25'),(8,34,'hi my firends','2009-10-05 13:23:53'),(10,27,'Mende sigar iki cahan, men bu cahana sigmazam','2009-10-05 23:52:26');
/*!40000 ALTER TABLE `sf_guard_user_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_status_comment`
--

DROP TABLE IF EXISTS `sf_guard_user_status_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_status_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sf_guard_user_status_comment_FI_1` (`user_id`),
  KEY `sf_guard_user_status_comment_FI_2` (`status_id`),
  CONSTRAINT `sf_guard_user_status_comment_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_status_comment_FK_2` FOREIGN KEY (`status_id`) REFERENCES `sf_guard_user_status` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_status_comment`
--

LOCK TABLES `sf_guard_user_status_comment` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_status_comment` DISABLE KEYS */;
INSERT INTO `sf_guard_user_status_comment` VALUES (9,19,10,'What does that mean?','2009-11-12 16:19:26'),(11,6,8,'hi','2009-11-16 19:30:27');
/*!40000 ALTER TABLE `sf_guard_user_status_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_simple_forum_category`
--

DROP TABLE IF EXISTS `sf_simple_forum_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_simple_forum_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `stripped_name` varchar(255) DEFAULT NULL,
  `description` text,
  `rank` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_simple_forum_category`
--

LOCK TABLES `sf_simple_forum_category` WRITE;
/*!40000 ALTER TABLE `sf_simple_forum_category` DISABLE KEYS */;
INSERT INTO `sf_simple_forum_category` VALUES (1,'suggestions',NULL,'suggestions of users to improve fmpsv',0,'2009-03-29 18:22:16'),(2,'friends',NULL,'discussion of issues related to friends section',1,'2009-04-09 12:47:24'),(3,'music',NULL,'discussion of issues related to music section',2,'2009-04-09 12:47:58'),(4,'photos',NULL,'discussion of issues related to photos section',3,'2009-04-09 12:48:43'),(5,'shopping',NULL,'discussion of issues related to shopping section',4,'2009-04-09 12:49:05'),(6,'videos',NULL,'discussion of issues related to videos section',5,'2009-04-09 12:49:23');
/*!40000 ALTER TABLE `sf_simple_forum_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_simple_forum_forum`
--

DROP TABLE IF EXISTS `sf_simple_forum_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_simple_forum_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `rank` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `stripped_name` varchar(255) DEFAULT NULL,
  `latest_post_id` int(11) DEFAULT NULL,
  `nb_posts` bigint(20) DEFAULT NULL,
  `nb_topics` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_simple_forum_forum_U_1` (`stripped_name`),
  KEY `sf_simple_forum_forum_FI_1` (`category_id`),
  KEY `sf_simple_forum_forum_FI_2` (`latest_post_id`),
  CONSTRAINT `sf_simple_forum_forum_FK_1` FOREIGN KEY (`category_id`) REFERENCES `sf_simple_forum_category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_simple_forum_forum_FK_2` FOREIGN KEY (`latest_post_id`) REFERENCES `sf_simple_forum_post` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_simple_forum_forum`
--

LOCK TABLES `sf_simple_forum_forum` WRITE;
/*!40000 ALTER TABLE `sf_simple_forum_forum` DISABLE KEYS */;
INSERT INTO `sf_simple_forum_forum` VALUES (2,'friends','discussion of issues related to friends section',1,2,'2009-04-09 12:51:03','2009-11-01 00:27:02','friends',NULL,0,0),(3,'music','discussion of issues related to music section',2,3,'2009-04-09 12:52:06','2009-10-06 00:15:46','music',4,1,1),(4,'photos','discussion of issues related to photos section',3,4,'2009-04-09 12:52:48','2009-04-09 12:52:48','photos',NULL,NULL,NULL),(5,'shopping','discussion of issues related to shopping section',4,5,'2009-04-09 12:53:10','2009-08-10 22:48:17','shopping',NULL,0,0),(6,'videos','discussion of issues related to videos section',5,6,'2009-04-09 12:53:35','2009-04-09 12:53:35','videos',NULL,NULL,NULL),(7,'general discussions','general discussions, user suggestions and etc',6,1,'2009-04-09 12:56:17','2011-08-08 13:43:02','general discussions',5,1,1);
/*!40000 ALTER TABLE `sf_simple_forum_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_simple_forum_post`
--

DROP TABLE IF EXISTS `sf_simple_forum_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_simple_forum_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `topic_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sf_simple_forum_post_FI_1` (`topic_id`),
  KEY `sf_simple_forum_post_FI_2` (`user_id`),
  KEY `sf_simple_forum_post_FI_3` (`forum_id`),
  CONSTRAINT `sf_simple_forum_post_FK_1` FOREIGN KEY (`topic_id`) REFERENCES `sf_simple_forum_topic` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_simple_forum_post_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_simple_forum_post_FK_3` FOREIGN KEY (`forum_id`) REFERENCES `sf_simple_forum_forum` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_simple_forum_post`
--

LOCK TABLES `sf_simple_forum_post` WRITE;
/*!40000 ALTER TABLE `sf_simple_forum_post` DISABLE KEYS */;
INSERT INTO `sf_simple_forum_post` VALUES (4,'Updates to music section','Our search engine updates its records every Monday. Users also can uploas mp3\'s. When you upload an mp3 there is an option to make it available to all users. Please choose it if you have rights to the song.',3,1,'2009-10-06 00:15:46',3,'admin'),(5,'???????? ????? ? ???????? ??????? ','???????? ????? ???????? comedy club ??????? ?? ???????? ?????? ?? ????????? ????????? ??????????? ???????? ????? ??????? ????? ?????? ???????? punisher ????????? ??????????? ?? ????? ???????? ? ?????? ?????????? ???????? ?????? nirvana ???????? ?? ??????? ? ????????? ???????? behemoth ??????? l ????? ? ?????????? ? ??????? ?????? ??? ????????????? ?? ???????? ??? ?????? ????? ?? ???????? ????? ???????? ? ?????????? ??????? ??????????? ????????? ?????????? ?? ?????? ????????   \r\n  \r\n?????? ????? ? ???????? java  <a href=http://enhanta.futbolka-tebe.ru/9/pechat-na-paketah-i-futbolkah-biznes-stil.html>?????? ?? ??????? ? ????????? ?????? ?????</a>  ???????? ??????  <a href=http://biotribun.futbolka-tebe.ru/10-2011/zakazat-mayki.html>???????? ?????</a>  ??????? ???????? ???????  <a href=http://lebisupp.futbolka-tebe.ru/4/25.html>??????? ?????? ???????</a>  ???????? straight edge ???????  <a href=http://orcode.futbolka-tebe.ru/futbolki-so-svastikoy/22-09-2011.html>??????? ????? ?? ?????</a>  ?????????? ?????? ?????? ????????  <a href=http://tiogiconf.futbolka-tebe.ru/04-07-2011/80.html>????? ? ????????? ?????</a>    \r\n  \r\n??????? ?????? ???????? ???? ????? ???? ??????? 4 ??? ????? ?????????? ?? ???????? ???????? ? ????????-????????? ?? ??????? ????? ???????? ? ?????? ????? ? ????? c?medy club ?? ????? motorhead ???????? ??? ???????? ???????? ???? ????????? ??????? ?? ???????? ???????? ?????????? ???? ??????    \r\n  \r\n????? ???????? ? ???????? ????????  <a href=http://clineerrai.futbolka-tebe.ru/map33.html>???????? ? ???????????????? ?????????</a>  ????? ?????? ????????  <a href=http://nconcasdo.futbolka-tebe.ru/88/49.html>www ???????? ru ????????????</a>  ???????? ?????????????? ??????  <a href=http://lebisupp.futbolka-tebe.ru/prikolnie-nadpisi-na-futbolkah-kiev/58.html>????? ???????? ? ??????</a>  ???????? ? ?????????? ???????? ?????????  <a href=http://glidfastma.futbolka-tebe.ru/9/01-2011.html>?????????? ????? ?? ?????</a>  ????????? ???????? ????? ???????? ?????? ????? ?????????  <a href=http://clineerrai.futbolka-tebe.ru/zakazat-futbolku-nanesenie-na-futbolki/14-06-2011.html>???????? ?????????? ??? ?????? action</a>    \r\n  \r\n????? ? ???????? ??????? ????? ? ?????? ???????? ?????? ???????? ???????? ? ???????? ?????? ?????? ?? ????????? ?? 10 ?? ',4,65,'2011-08-08 13:43:02',7,'Thittee');
/*!40000 ALTER TABLE `sf_simple_forum_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_simple_forum_topic`
--

DROP TABLE IF EXISTS `sf_simple_forum_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_simple_forum_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `is_sticked` tinyint(4) DEFAULT '0',
  `is_locked` tinyint(4) DEFAULT '0',
  `forum_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `latest_post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `stripped_title` varchar(255) DEFAULT NULL,
  `nb_posts` bigint(20) DEFAULT '0',
  `nb_views` bigint(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sf_simple_forum_topic_FI_1` (`forum_id`),
  KEY `sf_simple_forum_topic_FI_2` (`latest_post_id`),
  KEY `sf_simple_forum_topic_FI_3` (`user_id`),
  CONSTRAINT `sf_simple_forum_topic_FK_1` FOREIGN KEY (`forum_id`) REFERENCES `sf_simple_forum_forum` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_simple_forum_topic_FK_2` FOREIGN KEY (`latest_post_id`) REFERENCES `sf_simple_forum_post` (`id`) ON DELETE SET NULL,
  CONSTRAINT `sf_simple_forum_topic_FK_3` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_simple_forum_topic`
--

LOCK TABLES `sf_simple_forum_topic` WRITE;
/*!40000 ALTER TABLE `sf_simple_forum_topic` DISABLE KEYS */;
INSERT INTO `sf_simple_forum_topic` VALUES (3,'Updates to music section',0,0,3,'2009-10-06 00:15:46','2009-10-06 00:15:46',4,1,'updates-to-music-section',1,294),(4,'???????? ????? ? ???????? ??????? ',0,0,7,'2011-08-08 13:43:01','2011-08-08 13:43:02',5,65,'',1,0);
/*!40000 ALTER TABLE `sf_simple_forum_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_simple_forum_topic_view`
--

DROP TABLE IF EXISTS `sf_simple_forum_topic_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_simple_forum_topic_view` (
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`topic_id`),
  KEY `sf_simple_forum_topic_view_FI_2` (`topic_id`),
  CONSTRAINT `sf_simple_forum_topic_view_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_simple_forum_topic_view_FK_2` FOREIGN KEY (`topic_id`) REFERENCES `sf_simple_forum_topic` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_simple_forum_topic_view`
--

LOCK TABLES `sf_simple_forum_topic_view` WRITE;
/*!40000 ALTER TABLE `sf_simple_forum_topic_view` DISABLE KEYS */;
INSERT INTO `sf_simple_forum_topic_view` VALUES (1,3,'2009-10-06 00:15:47'),(23,3,'2009-11-01 16:09:14'),(54,3,'2011-04-22 19:36:16');
/*!40000 ALTER TABLE `sf_simple_forum_topic_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_address`
--

DROP TABLE IF EXISTS `shipping_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(80) CHARACTER SET latin1 DEFAULT '',
  `apt` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(30) CHARACTER SET latin1 DEFAULT '',
  `state` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `zip` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(20) CHARACTER SET latin1 DEFAULT '',
  `phone` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shipping_address_FI_1` (`user_id`),
  CONSTRAINT `shipping_address_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_address`
--

LOCK TABLES `shipping_address` WRITE;
/*!40000 ALTER TABLE `shipping_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'AL','Alabama'),(2,'AK','Alaska'),(3,'AZ','Arizona'),(4,'AR','Arkansas'),(5,'CA','California'),(6,'CO','Colorado'),(7,'CT','Connecticut'),(8,'DE','Delaware'),(9,'DC','District of Columbia'),(10,'FL','Florida'),(11,'GA','Georgia'),(12,'HI','Hawaii'),(13,'ID','Idaho'),(14,'IL','Illinois'),(15,'IN','Indiana'),(16,'IA','Iowa'),(17,'KS','Kansas'),(18,'KY','Kentucky'),(19,'LA','Louisiana'),(20,'ME','Maine'),(21,'MD','Maryland'),(22,'MA','Massachusetts'),(23,'MI','Michigan'),(24,'MN','Minnesota'),(25,'MS','Mississippi'),(26,'MO','Missouri'),(27,'MT','Montana'),(28,'NE','Nebraska'),(29,'NV','Nevada'),(30,'NH','New Hampshire'),(31,'NJ','New Jersey'),(32,'NM','New Mexico'),(33,'NY','New York'),(34,'NC','North Carolina'),(35,'ND','North Dakota'),(36,'OH','Ohio'),(37,'OK','Oklahoma'),(38,'OR','Oregon'),(39,'PA','Pennsylvania'),(40,'RI','Rhode Island'),(41,'SC','South Carolina'),(42,'SD','South Dakota'),(43,'TN','Tennessee'),(44,'TX','Texas'),(45,'UT','Utah'),(46,'VT','Vermont'),(47,'VA','Virginia'),(48,'WA','Washington'),(49,'WV','West Virginia'),(50,'WI','Wisconsin'),(51,'WY','Wyoming');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `hits` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `approved` char(5) NOT NULL,
  `raw_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_FI_1` (`user_id`),
  CONSTRAINT `video_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (2,'ingbasterds.flv',1,'2009-08-20 18:59:00',1,1,1,'Inglourious Basterds','1',''),(3,'allaboutsteve.flv',1,'2009-09-01 18:25:27',1,1,1,'All About Steve','1',''),(4,'extract.flv',1,'2009-09-01 18:33:25',1,1,1,'Extract','1','');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_categories`
--

DROP TABLE IF EXISTS `video_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pos` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `thumb` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `video_categories_FI_1` (`user_id`),
  CONSTRAINT `video_categories_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_categories`
--

LOCK TABLES `video_categories` WRITE;
/*!40000 ALTER TABLE `video_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_comment`
--

DROP TABLE IF EXISTS `video_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `body` text,
  `created_at` datetime DEFAULT NULL,
  `raw_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_id` (`video_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `video_comment_FK_1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `video_comment_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_comment`
--

LOCK TABLES `video_comment` WRITE;
/*!40000 ALTER TABLE `video_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_fav`
--

DROP TABLE IF EXISTS `video_fav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_fav` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`,`user_id`),
  KEY `video_fav_FI_1` (`video_id`),
  KEY `video_fav_FI_2` (`user_id`),
  CONSTRAINT `video_fav_FK_1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE,
  CONSTRAINT `video_fav_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_fav`
--

LOCK TABLES `video_fav` WRITE;
/*!40000 ALTER TABLE `video_fav` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_fav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_tag`
--

DROP TABLE IF EXISTS `video_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_tag` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `normalized_tag` varchar(100) NOT NULL,
  PRIMARY KEY (`video_id`,`normalized_tag`),
  KEY `video_tag_I_1` (`normalized_tag`),
  KEY `video_tag_FI_2` (`user_id`),
  CONSTRAINT `video_tag_FK_1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `video_tag_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_tag`
--

LOCK TABLES `video_tag` WRITE;
/*!40000 ALTER TABLE `video_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_vote`
--

DROP TABLE IF EXISTS `video_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_vote` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`,`user_id`),
  KEY `video_vote_FI_1` (`video_id`),
  KEY `video_vote_FI_2` (`user_id`),
  CONSTRAINT `video_vote_FK_1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE,
  CONSTRAINT `video_vote_FK_2` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_vote`
--

LOCK TABLES `video_vote` WRITE;
/*!40000 ALTER TABLE `video_vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_vote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videolist`
--

DROP TABLE IF EXISTS `videolist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videolist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videolist_FI_1` (`user_id`),
  CONSTRAINT `videolist_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videolist`
--

LOCK TABLES `videolist` WRITE;
/*!40000 ALTER TABLE `videolist` DISABLE KEYS */;
INSERT INTO `videolist` VALUES (2,'celine dion',6,'2009-10-30 23:41:03'),(3,'casino',22,'2009-11-02 22:48:49'),(4,'good fellas',22,'2009-11-02 22:51:20'),(5,'roya',40,'2010-06-02 11:07:55'),(6,'xatire',40,'2010-07-18 12:44:35'),(7,'terane',40,'2010-07-18 15:18:15'),(8,'test',19,'2011-04-07 17:27:07'),(9,'test1',19,'2011-04-07 17:27:18');
/*!40000 ALTER TABLE `videolist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videolist_ytvideo`
--

DROP TABLE IF EXISTS `videolist_ytvideo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videolist_ytvideo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `videolist_id` int(11) NOT NULL,
  `ytvideo_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `videolist_ytvideo_FI_1` (`videolist_id`),
  CONSTRAINT `videolist_ytvideo_FK_1` FOREIGN KEY (`videolist_id`) REFERENCES `videolist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videolist_ytvideo`
--

LOCK TABLES `videolist_ytvideo` WRITE;
/*!40000 ALTER TABLE `videolist_ytvideo` DISABLE KEYS */;
INSERT INTO `videolist_ytvideo` VALUES (3,2,'DHyJTpDFgc8'),(6,3,'1m7WbQa_qDE'),(7,4,'o_ff46b58Hk'),(8,3,'jaqrAeYaUJc'),(9,5,'txc6OJX-njo'),(10,5,'WpDzBJiWLF0'),(11,6,'awdhDLP0Y6U'),(12,7,'BZfRJ8XOhxM'),(13,9,'GqRBN9P-DPE');
/*!40000 ALTER TABLE `videolist_ytvideo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote_stats`
--

DROP TABLE IF EXISTS `vote_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vote_stats` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` varchar(100) NOT NULL,
  `rating` smallint(6) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `referer` text NOT NULL,
  `browser` varchar(255) NOT NULL,
  `os` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `vote_stats_FI_1` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote_stats`
--

LOCK TABLES `vote_stats` WRITE;
/*!40000 ALTER TABLE `vote_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `vote_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ytvideo_fav`
--

DROP TABLE IF EXISTS `ytvideo_fav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ytvideo_fav` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `video_id` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ytvideo_fav_FI_1` (`user_id`),
  CONSTRAINT `ytvideo_fav_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ytvideo_fav`
--

LOCK TABLES `ytvideo_fav` WRITE;
/*!40000 ALTER TABLE `ytvideo_fav` DISABLE KEYS */;
INSERT INTO `ytvideo_fav` VALUES (1,'XcAX1gEpEr8',6,'2009-10-30 23:37:19');
/*!40000 ALTER TABLE `ytvideo_fav` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-10 20:36:22
