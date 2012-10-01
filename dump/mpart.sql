-- MySQL dump 10.13  Distrib 5.1.62, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: eumls
-- ------------------------------------------------------
-- Server version	5.1.62-0ubuntu0.11.10.1

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
-- Table structure for table `mathmed_participants`
--

DROP TABLE IF EXISTS `mathmed_participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mathmed_participants` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ua` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname_ua` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname_en` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `homepage` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org1_ua` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org1_en` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org1_url` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org2_ua` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org2_en` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org2_url` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mathmed_participants`
--

LOCK TABLES `mathmed_participants` WRITE;
/*!40000 ALTER TABLE `mathmed_participants` DISABLE KEYS */;
INSERT INTO `mathmed_participants` VALUES (30,'Сергій','Максименко','Sergiy','Maksymenko',1,'maks@imath.kiev.ua','http://www.imath.kiev.ua/~maks','Інститут математики НАН України','Institute of Mathematics of NAS of Ukraine','http://imath.kiev.ua','','','',''),(18,'Татьяна','Романенко','Tatyana','Romanenko',0,'','','Институт проблем математических машин и систем','Institute of Mathematical Machines and System Problems','http://www.immsp.kiev.ua/','','','',''),(19,'Виталий','Вишневский','Vitaliy','Vishnevskiy',1,'?','','Институт проблем математических машин и систем','Institute of Mathematical Machines and System Problems','http://www.immsp.kiev.ua/','','','',''),(20,'Владимир','Калмыков','Vladimir','Kalmykov',1,'vl.kalmykov@gmail.com','','Институт проблем математических машин и систем','Institute of Mathematical Machines and System Problems','http://www.immsp.kiev.ua/','','','',''),(21,'Уляна','Лущик','Ulyana','Lushchyk',0,'u.lushchyk@gmail.com','','Клінічна лікарня \'Феофанія\'','Clinical Hospital \'Feofaniya\'','http://www.feofaniya.org/','','','',''),(22,'Володимир','Новицький','Volodymyr','Novytskiy',1,'novyc@imath.kiev.ua','','Інститут математики НАН України','Institute of Mathematics of NAS of Ukraine','http://imath.kiev.ua','','','',''),(23,'Ольга','Кисельова','Olga','Kyselyova',0,'?','National Technical University of Ukraine \'Kyiv Polytechnic Institute\'','Національний Технічний Університет України (КПІ) ','National Technical University of Ukraine \'Kyiv Polytechnic Institute\'','http://kpi.ua/','','','',''),(24,'Юрій','Зелінський','Yuriy','Zelinskiy',1,'zel@imath.kiev.ua','','Інститут математики НАН України','Institute of Mathematics of NAS of Ukraine','http://imath.kiev.ua','','','',''),(25,'Евгений','Настенко','Eugene','Nastenko',1,'?','','Національний Технічний Університет України (КПІ)','National Technical University of Ukraine \'Kyiv Polytechnic Institute\'','http://kpi.ua/','Національний інститут серцево-судинної хірургії імені М.М. Амосова НАМН','Amosov National Institute of Cardiovascular Surgery','http://amosovinstitute.org.ua/',''),(26,'Ростислав','Бубнов','Rostyslav','Bubnov',1,'rostyslavbubnov@mail.ru','','Центр ультразвукової діагностики та інтервенційної сонографії клінічної лікарні ','The Center ultrasound diagnostics and interventional sonography Clinical hospita','http://www.rostbubnov.narod.ru/','','','',''),(27,'Олександр','Бурилко','Olexandr','Burylko',1,'burilko@imath.kiev.ua','','Інститут математики НАН України','Institute of Mathematics of NAS of Ukraine','http://imath.kiev.ua','','','',''),(28,'Віктор','Герасименко','Viktor','Gerasymenko',1,'gerasym@imath.kiev.ua','','Інститут математики НАН України','Institute of Mathematics of NAS of Ukraine','http://imath.kiev.ua','','','',''),(29,'В.','Семенов','V.','Semenov',1,'?','','Наукове державне підприємство ','Scientific State Enterprise \"Delta\"','','','','','к.ф.-м.н.');
/*!40000 ALTER TABLE `mathmed_participants` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-30 17:41:32
