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
-- Table structure for table `mathmed_seminars`
--

DROP TABLE IF EXISTS `mathmed_seminars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mathmed_seminars` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `speaker1` int(10) DEFAULT NULL,
  `speaker2` int(10) DEFAULT NULL,
  `speaker3` int(10) DEFAULT NULL,
  `speaker4` int(10) DEFAULT NULL,
  `title_ua` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `abstract_ua` text COLLATE utf8_unicode_ci,
  `abstract_en` text COLLATE utf8_unicode_ci,
  `file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mathmed_seminars`
--

LOCK TABLES `mathmed_seminars` WRITE;
/*!40000 ALTER TABLE `mathmed_seminars` DISABLE KEYS */;
INSERT INTO `mathmed_seminars` VALUES (1,20,19,18,0,'Аппроксимация экспериментальных данных параметрически заданными кривыми','Approximation of experimental data with parametrized curves','2012-03-02','16:00:00','','',''),(2,21,22,0,0,'Моделі аналітичної механіки у дослідженні судинної системи','Analytical mechanics models in the study of Circulatory system','2012-02-17','16:00:00','','',''),(3,23,0,0,0,'Програмний комплекс оцінки кровообігу людини',' Programming complex for blood circulation study','2012-02-03','16:00:00','','',''),(4,24,0,0,0,'Деякі питання інтегральної геометрії в комплексному просторі','Certain problems of integral geometry in complex spaces','2011-11-11','16:00:00','','',''),(5,20,0,0,0,'Отрезок прямой и дуга кривой в цифровых изображениях. Математические и нейрофизиологические аспекты','A segment of a line and an arc of a curve in digital images. Mathematical and neurophisical aspects','2011-10-14','16:00:00','Рассматриваются предложенные определения отрезка цифровой прямой и дуги цифровой кривой. Приводятся известные данные, исследования и гипотезы в области нейрофизиологии, с которыми согласуются предложенные определения. ','',''),(6,25,0,0,0,'Биомедицинские применения теории самоогранизованной критичности','Biomedical application of selforganized criticity theory','2011-09-16','16:00:00','','',''),(7,26,0,0,0,'Можливості фрактального аналізу медичних діагностичних зображень. Первинний клінічний досвід','Hodgkin-Huxley neuron model. Consequences and applications','2011-05-20','16:00:00','','',''),(8,27,0,0,0,'Нейронна модель Ходжкіна-Хакслі (Hodgkin-Huxley). Наслідки та застосування','Modelling problems of nonlinear aspects of hemodynamics','2011-04-29','16:00:00','','',''),(9,25,0,0,0,'Проблемные вопросы моделирования нелинейных аспектов гемодинамики','Hydrodynamic limit of nonlinear kinetic equations','2011-04-15','16:00:00','','',''),(10,28,0,0,0,'Гiдродинамiчна границя нелiнiйних кiнетичних рiвнянь','Hydrodynamic limit of nonlinear kinetic equations','2011-03-25','16:30:00','','',''),(11,21,22,0,0,'Математичні підходи до прикладної гемодинаміки','Mathematical approaches to applied hemodynamics','2011-03-11','16:30:00','','',''),(12,29,0,0,0,'Автоматичне розпізнавання сухих хрипів за допомогою автокореляційної функції',' Automatical recognitions of dry wheezes via autocorrelation function','2011-02-18','16:30:00','','','');
/*!40000 ALTER TABLE `mathmed_seminars` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-30 17:41:48
