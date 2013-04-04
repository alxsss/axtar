-- MySQL dump 10.13  Distrib 5.5.17, for Linux (i686)
--
-- Host: localhost    Database: axtar
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
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertise`
--

LOCK TABLES `advertise` WRITE;
/*!40000 ALTER TABLE `advertise` DISABLE KEYS */;
/*!40000 ALTER TABLE `advertise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search`
--

DROP TABLE IF EXISTS `search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query` varchar(256) DEFAULT NULL,
  `raw_ip` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1403 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search`
--

LOCK TABLES `search` WRITE;
/*!40000 ALTER TABLE `search` DISABLE KEYS */;
INSERT INTO `search` VALUES (1128,'swrwcw','217.64.18.6','2011-11-04 01:03:22'),(1129,'sürücü','217.64.18.6','2011-11-04 01:03:39'),(1130,'sürücülük xidməti haqqinda','217.64.18.6','2011-11-04 01:05:12'),(1131,'sürücülük xidməti haqqinda','217.64.18.6','2011-11-04 01:05:13'),(1132,'Sahibkarlıq və maliyyə  maliyyə mexanizmi','85.132.122.138','2011-11-04 01:05:15'),(1133,'Sahibkarlıqda maliyyə mexanizmi','85.132.122.138','2011-11-04 01:06:33'),(1134,'bakinin gen plani','217.64.18.6','2011-11-04 01:07:23'),(1135,'Sahibkarlığın maliyyə mexanizmi','85.132.122.138','2011-11-04 01:08:36'),(1136,'baki beç ildən sonra','217.64.18.6','2011-11-04 01:08:56'),(1137,'baki beç ildən sonra fotosu','217.64.18.6','2011-11-04 01:10:13'),(1138,'baki beç ildən sonra görüntüsü','217.64.18.6','2011-11-04 01:12:31'),(1139,'baki beç ildən sonra görüntüsü','217.64.18.6','2011-11-04 01:25:31'),(1140,'Tor','92.42.55.178','2011-11-04 02:08:22'),(1141,'penis','85.132.8.8','2011-11-04 04:19:27'),(1142,'gökhan türkmen','78.191.166.148','2011-11-04 05:53:37'),(1143,'gökhan türkmen','78.191.166.148','2011-11-04 05:53:37'),(1144,'azeri seks video','217.168.176.4','2011-11-04 07:00:37'),(1145,'azeri seks video','217.168.176.4','2011-11-04 07:01:45'),(1146,'azeri xxx video','217.168.176.4','2011-11-04 07:05:13'),(1147,'bioxen','94.20.116.196','2011-11-04 07:16:17'),(1148,'bioxen','94.20.116.196','2011-11-04 07:16:17'),(1149,'bioxenin satisi','94.20.116.196','2011-11-04 07:16:34'),(1150,'bioxenin satisi','94.20.116.196','2011-11-04 07:16:50'),(1151,'bioxen sampuanin satisi','94.20.116.196','2011-11-04 07:17:29'),(1152,'bioxenin sifarisi','94.20.116.196','2011-11-04 07:17:47'),(1153,'danisan quzu','178.237.73.52','2011-11-04 08:47:18'),(1154,'danisan quzğun','178.237.73.52','2011-11-04 08:51:46'),(1155,'danişan quzğun','178.237.73.52','2011-11-04 08:53:05'),(1171,'Amciq','82.145.209.132','2011-11-04 11:41:32'),(1172,'Timurtas','82.145.211.59','2011-11-04 13:07:58'),(1173,'Timurtas','82.145.211.59','2011-11-04 13:08:21'),(1174,'Timurtas','82.145.211.59','2011-11-04 13:08:30'),(1175,'Timurtas','82.145.211.59','2011-11-04 13:08:54'),(1176,'ebru yaşar','78.160.80.86','2011-11-04 14:46:39'),(1177,'rafet leyla','178.237.73.51','2011-11-04 22:24:58'),(1178,'boyrek aliram','46.22.229.132','2011-11-05 03:31:25'),(1179,'boyrek satiram','46.22.229.132','2011-11-05 03:33:04'),(1180,'boyrek aliram','46.22.229.132','2011-11-05 03:34:54'),(1181,'boyrek donoru','46.22.229.132','2011-11-05 03:35:52'),(1182,'boyrek donoru  +2','46.22.229.132','2011-11-05 03:46:16'),(1183,'boyrek','46.22.229.132','2011-11-05 03:52:55'),(1184,'elde var hayat filminin muziyi','178.237.70.87','2011-11-05 05:28:17'),(1185,'İnformatika dqmk','188.253.184.80','2011-11-05 06:36:51'),(1186,'İnformatika testləri','188.253.184.80','2011-11-05 06:45:40'),(1187,'qaraqan sen yoxsan','188.253.246.243','2011-11-05 08:03:32'),(1188,'murselavara','178.237.77.252','2011-11-05 08:57:16'),(1189,'facebook.com','178.237.79.26','2011-11-05 10:59:31'),(1190,'masin','178.237.79.26','2011-11-05 11:00:03'),(1191,'Opera proqrami azerice','176.28.81.1','2011-11-05 11:17:34'),(1192,'Opera proqrami azerice','176.28.81.1','2011-11-05 11:17:41'),(1193,'Opera proqrami azerice','176.28.81.1','2011-11-05 11:18:10'),(1194,'demirbank','188.253.224.12','2011-11-05 13:42:16'),(1195,'timurtas','217.168.176.4','2011-11-05 13:47:49'),(1196,'musavat','188.253.224.12','2011-11-05 13:50:56'),(1197,'sikismek','188.253.224.12','2011-11-05 14:22:11'),(1198,'kitab','193.140.194.101','2011-11-05 14:57:08'),(1199,'lüğət','193.140.194.101','2011-11-05 14:57:51'),(1200,'ostur','188.253.204.33','2011-11-05 14:58:32'),(1201,'azerbaycan','188.253.204.33','2011-11-05 14:59:13'),(1202,'heyvanlarin sikismeyi','188.253.224.12','2011-11-05 14:59:23'),(1203,'ghj','109.127.17.29','2011-11-05 15:02:38'),(1204,'sekis','188.253.204.33','2011-11-05 15:19:10'),(1205,'weboxu','188.253.204.33','2011-11-05 15:20:04'),(1206,'ejdaha','46.228.178.21','2011-11-05 16:00:47'),(1207,'valeh','46.228.178.21','2011-11-05 16:01:05'),(1208,'sevismek sikismek','217.168.176.3','2011-11-05 19:19:18'),(1209,'erkek kiz sevismeleri opusmeleri','217.168.176.3','2011-11-05 19:29:32'),(1210,'yatakta sevismeler','217.168.176.3','2011-11-05 19:49:55'),(1211,'sikismek yalama','217.168.176.3','2011-11-05 19:55:05'),(1212,'sikismek sevismek atesli opusme','217.168.176.3','2011-11-05 19:56:58'),(1213,'gotden sikisme atesli sevismeler','217.168.176.3','2011-11-05 20:01:50'),(1214,'azerifire','217.168.176.3','2011-11-05 23:01:16'),(1215,'Садыхджан','91.76.21.243','2011-11-05 23:06:20'),(1216,'xiyar','59.5.61.98','2011-11-05 23:34:40'),(1217,'bilikli','82.145.211.123','2011-11-06 00:08:51'),(1218,'şevval sam','178.233.83.185','2011-11-06 01:02:36'),(1219,'bakı','85.108.82.200','2011-11-06 01:19:06'),(1220,'gijdıllax','93.184.226.241','2011-11-06 02:02:26'),(1221,'www.open.az','109.127.13.144','2011-11-06 04:24:14'),(1222,'www.open.az','109.127.13.144','2011-11-06 04:24:23'),(1223,'avtomobil jolari','109.168.212.175','2011-11-06 06:23:09'),(1224,'avtomobil yolari','109.168.212.175','2011-11-06 06:24:11'),(1225,'avtomobil harite','109.168.212.175','2011-11-06 06:25:09'),(1226,'avtomobil harite','109.168.212.175','2011-11-06 06:25:20'),(1227,'avtomobil yollari','109.168.212.175','2011-11-06 06:26:28'),(1228,'Taksi','217.168.176.3','2011-11-06 06:43:40'),(1229,'simge','88.242.160.192','2011-11-06 06:44:32'),(1230,'Taksi','217.168.176.3','2011-11-06 06:45:32'),(1231,'Gta','217.168.176.3','2011-11-06 06:45:57'),(1232,'antivirus','109.205.215.167','2011-11-06 07:37:47'),(1233,'astroxondroz','78.111.53.46','2011-11-06 08:18:26'),(1234,'azerifire','85.158.148.48','2011-11-06 09:09:22'),(1235,'neftci xezer lenkeran','78.111.57.30','2011-11-06 10:17:15'),(1236,'neftci xezer lenkeran 06.11.2011','78.111.57.30','2011-11-06 10:17:33'),(1237,'ffwef','109.205.160.3','2011-11-06 10:38:48'),(1238,'Messi vidyosu','82.145.209.5','2011-11-06 14:51:58'),(1239,'chat','85.108.51.164','2011-11-06 14:53:30'),(1240,'en hit cat','85.108.51.164','2011-11-06 14:55:03'),(1241,'en hit chat','85.108.51.164','2011-11-06 14:55:05'),(1242,'chat','85.108.51.164','2011-11-06 14:58:35'),(1243,'Sekil','176.28.81.1','2011-11-06 20:18:01'),(1244,'gt 9500','109.239.19.74','2011-11-06 22:15:19'),(1245,'geforce gt9500','109.239.19.74','2011-11-06 22:16:14'),(1246,'google','91.135.249.164','2011-11-06 23:06:43'),(1247,'google','91.135.249.164','2011-11-06 23:06:49'),(1248,'Enrike Nurmemmedov','91.135.249.164','2011-11-06 23:07:37'),(1249,'bakinin xeritesi','91.191.199.73','2011-11-07 01:28:41'),(1250,'eli veliyev kucesi','91.191.199.73','2011-11-07 01:29:38'),(1251,'abdullayev isa sadiq oglu','91.191.199.73','2011-11-07 02:30:07'),(1252,'salam','91.191.198.43','2011-11-07 02:35:19'),(1253,'tirpkolic','88.251.98.169','2011-11-07 04:10:01'),(1254,'qanunvericilik testlərdə','188.253.158.219','2011-11-07 05:29:44'),(1255,'qanunvericilik testləri','188.253.158.219','2011-11-07 05:31:04'),(1256,'söz ver','88.251.12.246','2011-11-07 06:31:00'),(1257,'söz ver','88.251.12.246','2011-11-07 06:31:00'),(1258,'Timurtas','82.145.208.180','2011-11-07 07:06:11'),(1259,'Timurtas video','82.145.208.180','2011-11-07 07:06:37'),(1260,'gülünc','82.145.209.113','2011-11-07 09:14:54'),(1261,'qotur','82.145.209.113','2011-11-07 09:15:22'),(1262,'xaricidil.net','82.145.209.113','2011-11-07 09:15:53'),(1263,'sahnaz beyler qizi','188.253.133.141','2011-11-07 09:31:36'),(1264,'Timurtas','82.145.210.41','2011-11-07 10:58:46'),(1265,'Timurtas','82.145.217.81','2011-11-07 11:02:39'),(1275,'Fudbol temaları','82.145.211.71','2011-11-07 12:41:23'),(1276,'bmw','89.147.231.119','2011-11-07 12:52:14'),(1277,'yandex','89.147.231.119','2011-11-07 12:52:41'),(1278,'jek','188.253.203.214','2011-11-07 14:22:20'),(1279,'jek sabail rayonu','188.253.203.214','2011-11-07 14:22:39'),(1280,'jek sabail rayonu mudur','188.253.203.214','2011-11-07 14:24:21'),(1281,'jek sabail rayonu bas','188.253.203.214','2011-11-07 14:24:33'),(1282,'abuzer','188.253.203.214','2011-11-07 14:24:58'),(1283,'abuzer huseynov','188.253.203.214','2011-11-07 14:25:05'),(1284,'abuzer huseynov jek','188.253.203.214','2011-11-07 14:25:25'),(1285,'Timurtas','82.145.209.106','2011-11-07 18:29:57'),(1286,'Mömünə xatun türübəsi','85.132.16.7','2011-11-07 23:48:23'),(1287,'Mömünə xatun türbəsi','85.132.16.7','2011-11-08 00:06:04'),(1288,'Mömünə xatun türbəsi haqqında','85.132.16.7','2011-11-08 00:06:51'),(1289,'Mömünə xatun türbəsi haqqında','85.132.16.7','2011-11-08 00:07:19'),(1290,'neftci 5 - 0 xezer lenkeran','94.20.39.11','2011-11-08 01:22:50'),(1291,'Music turk','77.244.116.47','2011-11-08 05:35:46'),(1292,'Music turk','77.244.116.47','2011-11-08 05:36:16'),(1293,'Music turk','77.244.116.47','2011-11-08 05:36:21'),(1294,'Music turk','77.244.116.47','2011-11-08 05:38:07'),(1295,'eskiz','109.127.18.129','2011-11-08 06:04:33'),(1296,'dizayn','109.127.18.129','2011-11-08 06:05:05'),(1297,'alirza  vakil','217.168.176.3','2011-11-08 07:19:05'),(1298,'MƏrcimək','188.253.251.215','2011-11-08 07:21:45'),(1299,'alirza  vakil','217.168.176.3','2011-11-08 07:22:34'),(1300,'DIN  mahkama','217.168.176.3','2011-11-08 07:23:45'),(1301,'MƏrci','188.253.251.215','2011-11-08 07:23:48'),(1302,'kurtlar vadisi pusu 135 bolum','188.253.222.134','2011-11-08 07:35:34'),(1303,'Tavuk çorbası (Sebzeli)','188.253.217.39','2011-11-08 08:53:19'),(1304,'cnb[b j k.,db','77.52.14.116','2011-11-08 11:06:25'),(1305,'стихи о любви','77.52.14.116','2011-11-08 11:06:37'),(1306,'Октай Каримов','77.52.14.116','2011-11-08 11:07:18'),(1307,'Октай Каримов полковник МВД','77.52.14.116','2011-11-08 11:08:02'),(1308,'Октай Каримов полковник МВД','77.52.14.116','2011-11-08 11:09:13'),(1309,'Октай Каримов полковник МВД','77.52.14.116','2011-11-08 11:09:15'),(1310,'Октай Каримов работник  МВД','77.52.14.116','2011-11-08 11:09:24'),(1311,'Октай Каримов','77.52.14.116','2011-11-08 11:16:52'),(1316,'Pitbull - Rain Over Me ft. Marc Anthony','178.237.78.194','2011-11-08 11:57:16'),(1317,'xocavend','149.126.118.40','2011-11-08 11:58:06'),(1318,'sabahat akkiraz','95.10.62.58','2011-11-08 11:59:26'),(1322,'kəkik','188.253.250.102','2011-11-08 23:21:13'),(1323,'Sevval sam','176.28.81.1','2011-11-08 23:32:46'),(1324,'Sevval sam','176.28.81.1','2011-11-08 23:33:57'),(1325,'Sevval sam','176.28.81.1','2011-11-08 23:34:23'),(1326,'təbrizin xomeyni adına mərkəzi xəstəxana tel.','81.21.87.40','2011-11-09 00:12:44'),(1327,'azal','81.21.87.40','2011-11-09 00:15:10'),(1328,'avyakassa','81.21.87.40','2011-11-09 00:16:39'),(1329,'aviakassa.az','81.21.87.40','2011-11-09 00:18:14'),(1330,'avyablet təbriz-bakı','81.21.87.40','2011-11-09 00:22:58'),(1331,'təyyarə bleti təbriz-bakı','81.21.87.40','2011-11-09 00:24:33'),(1332,'xaberler','109.168.212.175','2011-11-09 07:32:26'),(1333,'gazetler','109.168.212.175','2011-11-09 07:34:18'),(1334,'gazetler az','109.168.212.175','2011-11-09 07:34:55'),(1335,'Funda Arar Sen ve Ben','91.191.195.153','2011-11-09 09:28:16'),(1336,'Funda Arar sen ve ben mp3 yukle','91.191.195.153','2011-11-09 09:31:52'),(1337,'Funda arar yak gel mp3 yukle','91.191.195.153','2011-11-09 09:39:38'),(1338,'Аврам руссо','217.168.176.4','2011-11-09 10:26:10'),(1339,'Аврам руссо','217.168.176.4','2011-11-09 10:33:29'),(1340,'Аврам руссо','217.168.176.4','2011-11-09 10:33:31'),(1341,'Аврам руссо','217.168.176.4','2011-11-09 10:33:49'),(1342,'Аврам руссо','217.168.176.4','2011-11-09 10:35:12'),(1349,'sikismek sevismek','217.168.176.3','2011-11-09 11:49:54'),(1350,'tets','188.253.202.9','2011-11-09 11:50:06'),(1351,'Tanishliq.net','176.28.81.1','2011-11-09 20:33:50'),(1352,'Tanishliq.net','176.28.81.1','2011-11-09 20:35:40'),(1353,'kimya','217.212.230.21','2011-11-10 03:42:01'),(1354,'btz','217.212.230.21','2011-11-10 03:42:36'),(1355,'sex video','217.168.176.4','2011-11-10 05:24:52'),(1356,'xxx video','217.168.176.4','2011-11-10 05:29:12'),(1357,'levent','188.119.6.191','2011-11-10 05:29:30'),(1358,'xxx seks video','217.168.176.4','2011-11-10 05:31:02'),(1359,'naxçıvan','94.20.89.187','2011-11-10 06:04:12'),(1360,'Funda arar sen ve ben mp3 yukle','109.237.118.188','2011-11-10 06:38:07'),(1361,'Funda arar sen ve ben mp3','109.237.118.188','2011-11-10 06:39:02'),(1362,'Funda Arar sen ve ben mp3 yukle','109.237.118.188','2011-11-10 06:49:55'),(1363,'Funda Arar sen ve ben video yukle','109.237.118.188','2011-11-10 06:55:38'),(1364,'webpark.az','82.194.4.150','2011-11-10 07:03:00'),(1365,'kamal kmk','82.194.4.150','2011-11-10 07:03:33'),(1366,'Kamal Mansimli','82.194.4.150','2011-11-10 07:03:57'),(1367,'unutma beni','109.237.118.188','2011-11-10 07:06:32'),(1368,'unutma beni mp3 yukle','109.237.118.188','2011-11-10 07:07:01'),(1369,'dinle sevgili mp3 yukle','109.237.118.188','2011-11-10 07:09:15'),(1370,'BANU ALKAN','94.20.89.93','2011-11-10 07:37:46'),(1371,'ŞƏKİLLƏR','94.20.89.93','2011-11-10 07:43:30'),(1372,'SİBEL CAN','94.20.89.93','2011-11-10 07:47:58'),(1373,'rafik əliyev','80.69.57.18','2011-11-10 07:53:03'),(1374,'Uzeyir mp3yukleme','217.168.176.3','2011-11-10 08:12:43'),(1375,'abdulla Əlixanov','194.47.215.28','2011-11-10 08:20:41'),(1376,'Əlixanov abdulla','194.47.215.28','2011-11-10 08:20:56'),(1377,'Əlixanov abdulla','194.47.215.28','2011-11-10 08:21:02'),(1378,'Əlixanov Abdulla','194.47.215.28','2011-11-10 08:21:06'),(1379,'Əlixanov Abdulla','194.47.215.28','2011-11-10 08:21:56'),(1380,'Əlixanov Abdulla','194.47.215.28','2011-11-10 08:22:17'),(1381,'Kuzey guney','217.168.176.3','2011-11-10 09:36:07'),(1382,'musavat qezeti','209.131.61.1','2011-11-10 10:16:15'),(1383,'http://www.raliev.com','209.131.61.1','2011-11-10 11:14:56'),(1384,'raliev.com','209.131.61.1','2011-11-10 11:15:23'),(1393,'aktualliq','178.237.70.239','2011-11-10 11:20:58'),(1395,'aktualliq beynelxalq teskilatlar','178.237.70.239','2011-11-10 11:21:22'),(1396,'facebook','178.237.70.239','2011-11-10 11:22:27'),(1397,'porno','188.253.166.191','2011-11-10 13:00:42'),(1401,'chat programlari','88.241.97.42','2011-11-10 15:51:01'),(1402,'yahoo messenger','88.241.97.42','2011-11-10 15:51:21');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_remember_key`
--

LOCK TABLES `sf_guard_remember_key` WRITE;
/*!40000 ALTER TABLE `sf_guard_remember_key` DISABLE KEYS */;
INSERT INTO `sf_guard_remember_key` VALUES (2,'34ee4af7831d87bf03cabd22a4b9a98c','209.131.61.1','2011-11-09 14:23:51');
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
  `created_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_user_U_1` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user`
--

LOCK TABLES `sf_guard_user` WRITE;
/*!40000 ALTER TABLE `sf_guard_user` DISABLE KEYS */;
INSERT INTO `sf_guard_user` VALUES (2,'admin','sha1','4f8c5a11590615c34254c41cea2f0abe','c659ed88b5c68df9f8ebb4d0807602fad342f649','2011-03-07 04:55:28','2011-11-10 17:06:31',1,1);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_permission`
--

LOCK TABLES `sf_guard_user_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  `description` text,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `comment` text,
  `payment` tinyint(4) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor`
--

LOCK TABLES `sponsor` WRITE;
/*!40000 ALTER TABLE `sponsor` DISABLE KEYS */;
INSERT INTO `sponsor` VALUES (1,'http://hemsinif.az','hemsinif','2011-05-01 04:00:00','2011-06-01 04:00:00','info@hemsinif.az','323-682-2862','hemsinif',0,'2011-04-06 13:56:08');
/*!40000 ALTER TABLE `sponsor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url`
--

LOCK TABLES `url` WRITE;
/*!40000 ALTER TABLE `url` DISABLE KEYS */;
INSERT INTO `url` VALUES (59,'http://167wap.net','2011-10-27 04:44:52'),(60,'http://www.167wap.net','2011-10-27 04:45:38'),(61,'http://www.3dmax.wen.ru','2011-11-01 03:10:34'),(62,'http://oxucu.info','2011-11-01 07:28:26'),(63,'http://ismayilli.info','2011-11-01 11:59:21'),(64,'http://user-cs.org','2011-11-01 19:46:34'),(65,'http://qaynar.info','2011-11-08 12:18:49'),(66,'http://wap.tanishliq.net','2011-11-09 20:35:06');
/*!40000 ALTER TABLE `url` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-10 20:34:24
