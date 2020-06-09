-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: liveevents
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `ISO` varchar(2) NOT NULL,
  `LABEL` varchar(60) NOT NULL,
  PRIMARY KEY (`ISO`),
  UNIQUE KEY `ISOCODE_UNIQUE` (`ISO`),
  UNIQUE KEY `label_UNIQUE` (`LABEL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES ('AF','AFGHANISTAN'),('AL','ALBANIA'),('DZ','ALGERIA'),('AS','AMERICAN SAMOA'),('AD','ANDORRA'),('AO','ANGOLA'),('AI','ANGUILLA'),('AQ','ANTARCTICA'),('AG','ANTIGUA AND BARBUDA'),('AR','ARGENTINA'),('AM','ARMENIA'),('AW','ARUBA'),('AU','AUSTRALIA'),('AT','AUSTRIA'),('AZ','AZERBAIJAN'),('BS','BAHAMAS'),('BH','BAHRAIN'),('BD','BANGLADESH'),('BB','BARBADOS'),('BY','BELARUS'),('BE','BELGIUM'),('BZ','BELIZE'),('BJ','BENIN'),('BM','BERMUDA'),('BT','BHUTAN'),('BO','BOLIVIA'),('BA','BOSNIA AND HERZEGOVINA'),('BW','BOTSWANA'),('BV','BOUVET ISLAND'),('BR','BRAZIL'),('IO','BRITISH INDIAN OCEAN TERRITORY'),('BN','BRUNEI DARUSSALAM'),('BG','BULGARIA'),('BF','BURKINA FASO'),('BI','BURUNDI'),('KH','CAMBODIA'),('CM','CAMEROON'),('CA','CANADA'),('CV','CAPE VERDE'),('KY','CAYMAN ISLANDS'),('CF','CENTRAL AFRICAN REPUBLIC'),('TD','CHAD'),('CL','CHILE'),('CN','CHINA'),('CX','CHRISTMAS ISLAND'),('CC','COCOS (KEELING) ISLANDS'),('CO','COLOMBIA'),('KM','COMOROS'),('CG','CONGO'),('CD','CONGO, THE DEMOCRATIC REPUBLIC OF THE'),('CK','COOK ISLANDS'),('CR','COSTA RICA'),('CI','COTE D\'IVOIRE'),('HR','CROATIA'),('CU','CUBA'),('CY','CYPRUS'),('CZ','CZECH REPUBLIC'),('DK','DENMARK'),('DJ','DJIBOUTI'),('DM','DOMINICA'),('DO','DOMINICAN REPUBLIC'),('EC','ECUADOR'),('EG','EGYPT'),('SV','EL SALVADOR'),('GQ','EQUATORIAL GUINEA'),('ER','ERITREA'),('EE','ESTONIA'),('ET','ETHIOPIA'),('FK','FALKLAND ISLANDS (MALVINAS)'),('FO','FAROE ISLANDS'),('FJ','FIJI'),('FI','FINLAND'),('FR','FRANCE'),('GF','FRENCH GUIANA'),('PF','FRENCH POLYNESIA'),('TF','FRENCH SOUTHERN TERRITORIES'),('GA','GABON'),('GM','GAMBIA'),('GE','GEORGIA'),('DE','GERMANY'),('GH','GHANA'),('GI','GIBRALTAR'),('GR','GREECE'),('GL','GREENLAND'),('GD','GRENADA'),('GP','GUADELOUPE'),('GU','GUAM'),('GT','GUATEMALA'),('GN','GUINEA'),('GW','GUINEA-BISSAU'),('GY','GUYANA'),('HT','HAITI'),('HM','HEARD ISLAND AND MCDONALD ISLANDS'),('VA','HOLY SEE (VATICAN CITY STATE)'),('HN','HONDURAS'),('HK','HONG KONG'),('HU','HUNGARY'),('IS','ICELAND'),('IN','INDIA'),('ID','INDONESIA'),('IR','IRAN, ISLAMIC REPUBLIC OF'),('IQ','IRAQ'),('IE','IRELAND'),('IL','ISRAEL'),('IT','ITALY'),('JM','JAMAICA'),('JP','JAPAN'),('JO','JORDAN'),('KZ','KAZAKHSTAN'),('KE','KENYA'),('KI','KIRIBATI'),('KP','KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF'),('KR','KOREA, REPUBLIC OF'),('KW','KUWAIT'),('KG','KYRGYZSTAN'),('LA','LAO PEOPLE\'S DEMOCRATIC REPUBLIC'),('LV','LATVIA'),('LB','LEBANON'),('LS','LESOTHO'),('LR','LIBERIA'),('LY','LIBYAN ARAB JAMAHIRIYA'),('LI','LIECHTENSTEIN'),('LT','LITHUANIA'),('LU','LUXEMBOURG'),('MO','MACAO'),('MK','MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF'),('MG','MADAGASCAR'),('MW','MALAWI'),('MY','MALAYSIA'),('MV','MALDIVES'),('ML','MALI'),('MT','MALTA'),('MH','MARSHALL ISLANDS'),('MQ','MARTINIQUE'),('MR','MAURITANIA'),('MU','MAURITIUS'),('YT','MAYOTTE'),('MX','MEXICO'),('FM','MICRONESIA, FEDERATED STATES OF'),('MD','MOLDOVA, REPUBLIC OF'),('MC','MONACO'),('MN','MONGOLIA'),('MS','MONTSERRAT'),('MA','MOROCCO'),('MZ','MOZAMBIQUE'),('MM','MYANMAR'),('NA','NAMIBIA'),('NR','NAURU'),('NP','NEPAL'),('NL','NETHERLANDS'),('AN','NETHERLANDS ANTILLES'),('NC','NEW CALEDONIA'),('NZ','NEW ZEALAND'),('NI','NICARAGUA'),('NE','NIGER'),('NG','NIGERIA'),('NU','NIUE'),('NF','NORFOLK ISLAND'),('MP','NORTHERN MARIANA ISLANDS'),('NO','NORWAY'),('OM','OMAN'),('PK','PAKISTAN'),('PW','PALAU'),('PS','PALESTINIAN TERRITORY, OCCUPIED'),('PA','PANAMA'),('PG','PAPUA NEW GUINEA'),('PY','PARAGUAY'),('PE','PERU'),('PH','PHILIPPINES'),('PN','PITCAIRN'),('PL','POLAND'),('PT','PORTUGAL'),('PR','PUERTO RICO'),('QA','QATAR'),('RE','REUNION'),('RO','ROMANIA'),('RU','RUSSIAN FEDERATION'),('RW','RWANDA'),('SH','SAINT HELENA'),('KN','SAINT KITTS AND NEVIS'),('LC','SAINT LUCIA'),('PM','SAINT PIERRE AND MIQUELON'),('VC','SAINT VINCENT AND THE GRENADINES'),('WS','SAMOA'),('SM','SAN MARINO'),('ST','SAO TOME AND PRINCIPE'),('SA','SAUDI ARABIA'),('SN','SENEGAL'),('CS','SERBIA AND MONTENEGRO'),('SC','SEYCHELLES'),('SL','SIERRA LEONE'),('SG','SINGAPORE'),('SK','SLOVAKIA'),('SI','SLOVENIA'),('SB','SOLOMON ISLANDS'),('SO','SOMALIA'),('ZA','SOUTH AFRICA'),('GS','SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'),('ES','SPAIN'),('LK','SRI LANKA'),('SD','SUDAN'),('SR','SURINAME'),('SJ','SVALBARD AND JAN MAYEN'),('SZ','SWAZILAND'),('SE','SWEDEN'),('CH','SWITZERLAND'),('SY','SYRIAN ARAB REPUBLIC'),('TW','TAIWAN, PROVINCE OF CHINA'),('TJ','TAJIKISTAN'),('TZ','TANZANIA, UNITED REPUBLIC OF'),('TH','THAILAND'),('TL','TIMOR-LESTE'),('TG','TOGO'),('TK','TOKELAU'),('TO','TONGA'),('TT','TRINIDAD AND TOBAGO'),('TN','TUNISIA'),('TR','TURKEY'),('TM','TURKMENISTAN'),('TC','TURKS AND CAICOS ISLANDS'),('TV','TUVALU'),('UG','UGANDA'),('UA','UKRAINE'),('AE','UNITED ARAB EMIRATES'),('GB','UNITED KINGDOM'),('US','UNITED STATES'),('UM','UNITED STATES MINOR OUTLYING ISLANDS'),('UY','URUGUAY'),('UZ','UZBEKISTAN'),('VU','VANUATU'),('VE','VENEZUELA'),('VN','VIET NAM'),('VG','VIRGIN ISLANDS, BRITISH'),('VI','VIRGIN ISLANDS, U.S.'),('WF','WALLIS AND FUTUNA'),('EH','WESTERN SAHARA'),('YE','YEMEN'),('ZM','ZAMBIA'),('ZW','ZIMBABWE');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_states`
--

DROP TABLE IF EXISTS `event_states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_states` (
  `CODE` int NOT NULL,
  `LABEL` varchar(20) NOT NULL,
  PRIMARY KEY (`CODE`),
  UNIQUE KEY `CODE_UNIQUE` (`CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_states`
--

LOCK TABLES `event_states` WRITE;
/*!40000 ALTER TABLE `event_states` DISABLE KEYS */;
INSERT INTO `event_states` VALUES (0,'Past'),(1,'In Progress'),(2,'Not Started Yet');
/*!40000 ALTER TABLE `event_states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(300) NOT NULL,
  `START_DATETIME` datetime NOT NULL,
  `END_DATETIME` datetime DEFAULT NULL,
  `IS_VISIBLE` tinyint NOT NULL DEFAULT '1',
  `Users_NICKNAME` varchar(30) NOT NULL,
  `Countries_ISO` varchar(2) NOT NULL,
  `Event_States_CODE` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`ID`,`Users_NICKNAME`),
  UNIQUE KEY `idEvent_UNIQUE` (`ID`),
  KEY `fk_Events_Users1_idx` (`Users_NICKNAME`),
  KEY `fk_Events_Countries1_idx` (`Countries_ISO`),
  KEY `fk_Events_Event_States1_idx` (`Event_States_CODE`),
  CONSTRAINT `fk_Events_Countries1` FOREIGN KEY (`Countries_ISO`) REFERENCES `countries` (`ISO`),
  CONSTRAINT `fk_Events_Event_States1` FOREIGN KEY (`Event_States_CODE`) REFERENCES `event_states` (`CODE`),
  CONSTRAINT `fk_Events_Users1` FOREIGN KEY (`Users_NICKNAME`) REFERENCES `users` (`NICKNAME`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (49,'Titre1','wdaowdb','2019-05-08 10:30:00','2019-05-08 11:30:00',1,'lou.dvl','FR',0),(51,'Titre3','wdaowdb','2020-07-08 10:30:00',NULL,1,'lou.dvl','GB',2),(52,'Titre4','wdaowdb','2019-02-08 10:30:00','2019-02-08 11:30:00',1,'lou.dvl','CH',0),(53,'Titre5','wdaowdb','2019-10-08 10:30:00','2019-10-08 11:30:00',0,'lou.dvl','GB',0),(54,'Titre6','wdaowdb','2020-03-08 10:30:00','2020-06-09 07:16:10',1,'lou.dvl','FR',0),(58,'New test event','Evénement test','2020-11-05 14:30:00',NULL,1,'lou.dvl','US',1),(59,'My test event','Evénement test','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',1),(61,'New test event','Created test event','2020-10-08 12:30:00','2020-06-08 16:24:38',1,'lou.dvl','GB',0),(63,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',1),(69,'New test event','Created test event','2020-10-08 12:30:00','2020-06-08 16:33:54',0,'lou.dvl','GB',0),(71,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(73,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(75,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(77,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(79,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(81,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(85,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(87,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(89,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(91,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(93,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(97,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(101,'New created event','A new event','2020-07-17 20:30:00',NULL,1,'lou.dvl','AF',2),(102,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(104,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(106,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(108,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(110,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(112,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(114,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(116,'My new test event','My new test event desc','2020-06-20 11:45:00',NULL,0,'lou.dvl','BS',2),(117,'Another new event to the list','Trying to add an event to the db','2020-06-20 10:30:00',NULL,1,'lou.dvl','BA',2),(118,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(120,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(122,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(124,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(126,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(128,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(130,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(132,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(134,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(136,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(138,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(140,'New test event','Created test event','2020-10-08 12:30:00','2020-06-09 01:31:20',1,'lou.dvl','GB',0),(142,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(144,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(146,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(148,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(150,'My event for Bot','bot desc','2020-06-14 20:20:00',NULL,1,'BotTest','AO',2),(151,'dwadada','ffafasfasfw','2020-06-09 20:30:00',NULL,1,'lou.dvl','AI',1),(153,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(155,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(157,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(159,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(161,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(163,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(165,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(167,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(169,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(171,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(173,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2),(175,'New test event','Created test event','2020-10-08 12:30:00',NULL,1,'lou.dvl','GB',2);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `TEXT` varchar(254) NOT NULL,
  `POSTING_DATE` datetime NOT NULL,
  `Events_ID` int NOT NULL,
  PRIMARY KEY (`Events_ID`,`POSTING_DATE`),
  KEY `fk_Messages_Events1_idx` (`Events_ID`),
  CONSTRAINT `fk_Messages_Events1` FOREIGN KEY (`Events_ID`) REFERENCES `events` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES ('A new message for this event','2020-06-07 16:18:44',59),('Another one','2020-06-07 16:21:17',59),('Hey','2020-06-07 16:22:22',59),('Test message','2020-06-07 16:23:12',59),('Added message','2020-06-07 20:23:12',59),('Hello','2020-06-07 23:08:48',59),('this message','2020-06-07 23:23:12',59),('Text message','2020-06-07 23:28:12',59),('dwadWda','2020-06-07 23:34:19',59),('New text message','2020-06-07 23:40:12',59),('fyefasfefaf','2020-06-07 23:44:26',59),('wdawdafafsfrs sef','2020-06-07 23:44:45',59),('dadudnidan wadmoia awdl aawdwda','2020-06-07 23:45:51',59),('Adding message','2020-06-07 23:47:42',59),('Adding another message','2020-06-07 23:48:05',59),('And another one','2020-06-07 23:49:46',59),('Too much messages ? No ?','2020-06-07 23:51:09',59),('vdcvy w  dawdaw wdawd ','2020-06-07 23:53:19',59),('dwadawd w adawff aw ','2020-06-07 23:53:52',59),('grd gdgs Efg  f eg sg ','2020-06-08 00:01:53',59),('dwad  sf esfadf w','2020-06-08 00:04:44',59),('DW AD AWD AW DA','2020-06-08 00:04:51',59),('New timer test message','2020-06-08 00:18:43',59),('Timer test','2020-06-08 00:20:54',59),('dawdaw a dwad','2020-06-08 00:23:39',59),('grdgrdgdrg','2020-06-08 00:24:59',59),('hello hey yo','2020-06-08 00:30:00',59),('Again','2020-06-08 00:31:32',59),('!!!!!!!!!!!!!!!!','2020-06-08 00:32:06',59),('Update list','2020-06-08 00:36:20',59),('dbawdzb awuzdhuzaw','2020-06-08 00:38:07',59),('f esf esfefawwaawd','2020-06-08 00:38:34',59),('My message','2020-06-08 00:40:57',59),('My other message','2020-06-08 00:41:18',59),('Tick','2020-06-08 00:50:15',59),('fsefefse','2020-06-08 00:51:31',59),(' wdawd','2020-06-08 00:52:42',59),('dsSQs','2020-06-08 00:53:31',59),('Event message','2020-06-08 00:55:05',59),('Message','2020-06-08 00:55:36',59),('Loaded messages','2020-06-08 00:56:37',59),('Another loaded message','2020-06-08 00:56:50',59),('Test','2020-06-08 00:59:18',59),('Test test','2020-06-08 01:04:39',59),('123456','2020-06-08 01:06:02',59),('dwad wad aw','2020-06-08 01:06:35',59),('New event message','2020-06-08 01:11:18',59),('Event message','2020-06-08 01:11:45',59),('.-.-.-.-.-','2020-06-08 09:07:52',59),('New message added','2020-06-08 10:42:15',59),('New message','2020-06-08 10:42:40',59),('Messageeeeee','2020-06-08 10:43:07',59),('Adding new message','2020-06-08 10:47:26',59),('new message','2020-06-08 10:48:07',59),('Again new message','2020-06-08 10:52:32',59),('Newwww message','2020-06-08 10:52:46',59),('Message','2020-06-08 11:16:15',59),('Message 23','2020-06-08 11:19:03',59),('Pushed message','2020-06-08 11:25:35',59),('Updated message','2020-06-08 11:38:39',59),('Adding message','2020-06-08 11:56:27',59),('Message 2','2020-06-08 11:58:16',59),('Message 3','2020-06-08 11:58:34',59),('Message 4','2020-06-08 12:01:15',59),('Message 5','2020-06-08 12:01:28',59),('Message 6','2020-06-08 12:03:47',59),('Message 7','2020-06-08 12:05:46',59),('Message 8','2020-06-08 12:06:58',59),('Message 9','2020-06-08 12:10:56',59),('Message 10','2020-06-08 12:11:03',59),('Message 11','2020-06-08 12:13:03',59),('Message 12','2020-06-08 12:13:24',59),('Message 13','2020-06-08 12:15:44',59),('Message 14','2020-06-08 12:21:12',59),('Message 15','2020-06-08 15:59:11',59),('Message 16','2020-06-08 15:59:47',59),('Message 17','2020-06-08 16:00:34',59),('Message 18','2020-06-08 16:03:24',59),('Message 19','2020-06-08 19:26:12',59),('Message 20','2020-06-08 22:19:51',59),('Message for the tests','2020-06-09 07:04:24',59),('Hello','2020-06-08 16:24:13',61),('New message','2020-06-08 16:24:18',61),('Adding one again','2020-06-08 16:24:25',61),('My new message','2020-06-09 01:14:49',140),('Hello everyone !','2020-06-09 01:15:36',140),('Pushing a message','2020-06-09 01:31:17',140);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `NICKNAME` varchar(30) NOT NULL,
  `EMAIL` varchar(254) NOT NULL,
  `PASSWD` varchar(64) NOT NULL,
  `STATE` tinyint(1) NOT NULL DEFAULT '0',
  `VALIDATION_TOKEN` varchar(32) NOT NULL,
  `VALIDATION_TOKEN_EXPIRATION` datetime NOT NULL,
  PRIMARY KEY (`NICKNAME`),
  UNIQUE KEY `nickname_UNIQUE` (`NICKNAME`),
  UNIQUE KEY `VALIDATION_TOKEN_UNIQUE` (`VALIDATION_TOKEN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('BotTest','lou.dvl@eduge.ch','8185c8ac4656219f4aa5541915079f7b3743e1b5f48bacfcc3386af016b55320',1,'35ad6371e9a71361fab1abba83e9829b','2020-06-10 04:22:13'),('davilal','lou.dvl@eduge.ch','8185c8ac4656219f4aa5541915079f7b3743e1b5f48bacfcc3386af016b55320',1,'c36f4e8695710a296c1785a645075e60','2020-06-10 04:08:52'),('lou.dvl','lou.dvl@eduge.ch','8185c8ac4656219f4aa5541915079f7b3743e1b5f48bacfcc3386af016b55320',1,'5f9f3c81bda7e9b880db03cff68cf3f1','2020-06-10 04:08:52'),('loudvl','lou.dvl@eduge.ch','8185c8ac4656219f4aa5541915079f7b3743e1b5f48bacfcc3386af016b55320',1,'56af4167b5a3bbe844e72e63b513485f','2020-05-31 17:53:03'),('TestUser','lou.dvl@eduge.ch','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4',1,'abec5667f6647ef392037c0a5bf2296c','2020-06-10 05:38:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'liveevents'
--

--
-- Dumping routines for database 'liveevents'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-09 13:37:21
