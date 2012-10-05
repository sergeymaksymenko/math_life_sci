-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: eumls
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `MLSSOrganizations`
--

DROP TABLE IF EXISTS `MLSSOrganizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MLSSOrganizations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title_ukr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_rus` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_eng` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MLSSOrganizations`
--

LOCK TABLES `MLSSOrganizations` WRITE;
/*!40000 ALTER TABLE `MLSSOrganizations` DISABLE KEYS */;
INSERT INTO `MLSSOrganizations` VALUES (1,'Інститут математики НАН України','Институт математики НАН Украины','Institute of Mathematics of NAS of Ukraine','','http://www.imath.kiev.ua'),(2,'Інститут проблем математичних машин та систем','Институт проблем математических машин и систем','Institute of Mathematical Machines and System Problems','','http://www.immsp.kiev.ua'),(3,'Клінічна лікарня \'Феофанія\'','Клиническая больница \'Феофания\'','Clinical Hospital \'Feofaniya\'','','http://www.feofaniya.org'),(4,'Національний Технічний Університет України (КПІ) ','Национальный Технический Университет Украины (КПИ) ','National Technical University of Ukraine \'Kyiv Polytechnic Institute\'','','http://kpi.ua'),(5,'Національний інститут серцево-судинної хірургії імені М.М. Амосова НАМН','Национальный институт сердечно-сосудистой хирургии имени М.М. Амосова НАМН','Amosov National Institute of Cardiovascular Surgery','','http://amosovinstitute.org.ua'),(6,'Центр ультразвукової діагностики та інтервенційної сонографії клінічної лікарні \'Феофанія\'','Центр ультразвуковой диагностики и интервенционной сонографии клинической больницы \'Феофания\'','Center for ultrasound diagnosis and interventional sonography of Clinical Hospital \'Feofaniya\'','','http://www.feofaniya.org/department/diagnostichni/tsentr-ultrazvukovoyi-diagnostiki-ta-interventsiyn'),(7,'Наукове державне підприємство \'Дельта\'','Научное государственное предприятие \'Дельта\'','Scientific State Enterprise \'Delta\'','',''),(8,'Київський національний університет ім. Тараса Шевченка','Киевский национальный университет им. Тараса Шевченко','T. Shevchenko National University of Kyiv','',''),(9,'Національний медичний університет імені О. О. Богомольця','Национальный медицинский университет им. О. О. Богомольца','Bogomolets National Medical University','','http://www.nmu.edu.ua'),(10,'','','Bogolyubov Institute for Theoretical Physics','',''),(11,'','','State Organization \'Research-practical center of endovascular neuroradiosurgery AMS of Ukraine\'','',''),(12,'','','Kiev Trade and Economic University','',''),(13,'','','Semenenko Institute of Geochemistry, Mineralogy and Ore Formation NASU','',''),(14,'','','Institute of Hydromechanics NAS of Ukraine','',''),(15,'','','Ukrainian Radiation Protection Institute','',''),(16,'','','Research Center for Radiation Medicine of Academy of Medical Sciences of Ukraine','',''),(17,'','','Scientific Center of Radiation Medicine, AMS of Ukraine','',''),(18,'','','P.L.Shupik National Medical Academy of Post-Graduate Education','','');
/*!40000 ALTER TABLE `MLSSOrganizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MLSSParticipantEmails`
--

DROP TABLE IF EXISTS `MLSSParticipantEmails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MLSSParticipantEmails` (
  `part_id` int(10) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MLSSParticipantEmails`
--

LOCK TABLES `MLSSParticipantEmails` WRITE;
/*!40000 ALTER TABLE `MLSSParticipantEmails` DISABLE KEYS */;
INSERT INTO `MLSSParticipantEmails` VALUES (1,'antoniouk@imath.kiev.ua'),(1,'antoniouk.a@gmail.com'),(2,'burilko@imath.kiev.ua'),(3,'gerasym@imath.kiev.ua'),(4,'goriunov@imath.kiev.ua'),(5,'grushka@imath.kiev.ua'),(6,'maks@imath.kiev.ua'),(7,'novyc@imath.kiev.ua'),(8,'zel@imath.kiev.ua'),(9,''),(10,''),(11,''),(12,'vl.kalmykov@gmail.com'),(13,'u.lushchyk@gmail.com'),(13,'inna_istyna@mail.ru'),(14,'olga.mmif@gmail.com'),(15,'nastenko@yahoo.com'),(15,'nastenko@inbox.ru'),(16,'rostyslavbubnov@mail.ru'),(17,'mlev@bk.ru'),(18,''),(19,''),(20,''),(21,''),(22,'anch@bitp.kiev.ua'),(23,'svit.bannikova@gmail.com'),(24,'berezovchuk@yahoo.com'),(25,'ndudchenko@igmof.gov.ua'),(26,'kolomithyk@rambler.ru'),(27,'t.krasnopolskaya@tue.nl'),(28,'krishtal@biph.kiev.ua'),(29,'galyna.kriukova@gmail.com'),(30,'eugene.kryachko@ulg.ac.be'),(30,'e_kryachko@yahoo.com'),(31,'alexander_kukush@univ.kiev.ua'),(32,'mre@univ.kiev.ua'),(33,'masja1979@gmail.com'),(34,'melnyk@imath.kiev.ua'),(35,'mikhailets@imath.kiev.ua'),(36,'vol.molyboga@yandex.ua'),(37,'murach@imath.kiev.ua'),(38,'inesteruk@yahoo.com'),(39,'otm82@mail.ru'),(40,'ovsiyenko.sergiy@gmail.com'),(41,'popov256@gmail.com'),(42,'anatoly.prysyazh@mail.ru'),(43,'vyrtum@bigmir.net'),(44,'sadovyj@univ.kiev.ua'),(45,'lms@univ.kiev.ua'),(46,'isamoil@imath.kiev.ua'),(47,'shklyar@mail.univ.kiev.ua'),(48,'vidybida@bitp.kiev.ua'),(49,'vit.vizual@gmail.com'),(50,'vladkhom@hotmail.com'),(51,'bazyka@yahoo.com'),(52,'snvolkov@bitp.kiev.ua'),(53,'dudkin@imath.kiev.ua'),(54,'kinet@biochem.kiev.ua'),(54,'s_koster@voliacable.com'),(55,'model@imath.kiev.ua'),(56,'novot@ukr.net'),(57,'apilip@imath.kiev.ua'),(58,'selesov@yandex.ru'),(59,'o.a.sivak@gmail.com'),(60,'saa@grid.org.ua'),(61,'sulikr@mail.ru'),(62,'teplinsky@imath.kiev.ua'),(63,'torbin7@googlemail.com'),(64,'fenchenko@ukr.net'),(65,'khruslov@ilt.kharkov.ua');
/*!40000 ALTER TABLE `MLSSParticipantEmails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MLSSParticipantOrganizations`
--

DROP TABLE IF EXISTS `MLSSParticipantOrganizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MLSSParticipantOrganizations` (
  `part_id` int(10) DEFAULT NULL,
  `org_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MLSSParticipantOrganizations`
--

LOCK TABLES `MLSSParticipantOrganizations` WRITE;
/*!40000 ALTER TABLE `MLSSParticipantOrganizations` DISABLE KEYS */;
INSERT INTO `MLSSParticipantOrganizations` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,8),(10,2),(11,2),(12,2),(13,3),(14,4),(15,5),(15,4),(16,6),(17,7),(18,9),(19,4),(20,9),(21,4),(22,10),(23,12),(24,11),(25,13),(26,1),(27,14),(29,8),(31,8),(32,8),(33,15),(34,1),(35,1),(36,1),(37,1),(38,14),(39,1),(40,8),(41,8),(42,16),(43,1),(44,8),(45,8),(46,1),(51,17),(55,1),(56,1),(57,1),(59,8),(60,8),(61,18),(62,1),(63,1);
/*!40000 ALTER TABLE `MLSSParticipantOrganizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MLSSParticipants`
--

DROP TABLE IF EXISTS `MLSSParticipants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MLSSParticipants` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ukr` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_rus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_eng` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename_ukr` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename_rus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename_eng` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname_ukr` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname_rus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname_eng` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MLSSParticipants`
--

LOCK TABLES `MLSSParticipants` WRITE;
/*!40000 ALTER TABLE `MLSSParticipants` DISABLE KEYS */;
INSERT INTO `MLSSParticipants` VALUES (1,'Олександра','Александра','Alexandra','Вікторівна','Викторовна','Viktorivna','Антонюк','Антонюк','Antoniouk',0),(2,'Олександр','Александр','Olexandr','Андрійович','Андреевич','Andriyovych','Бурилко','Бурилко','Burylko',1),(3,'Віктор','Виктор','Viktor','Іванович','Иванович','Ivanovych','Герасименко','Герасименко','Gerasymenko',1),(4,'Андрій','Андрей','Andrii','','','Ivanovych','Горюнов','Горюнов','Goriunov',1),(5,'','','Yaroslaw','','','','','','Grushka',1),(6,'Сергій','Сергей','Sergiy','Іванович','Иванович','Ivanovysch','Максименко','Максименко','Maksymenko',1),(7,'Віктор','Виктор','Viktor','Володимирович','Владимирович','Volodymyrovych','Новицький','Новицкий','Novytskiy',1),(8,'Юрій','Юрий','Yuriy','Борисович','Борисович','Borysovych','Зелінський','Зелинский','Zelinskiy',1),(9,'Г.','Г.','G.','','','','Шевченко','Шевченко','Shevchenko',1),(10,'Тетяна','Татьяна','Tatyana','','','','Романенко','Романенко','Romanenko',0),(11,'Віталій','Виталий','Vitaliy','','','','Вишневський','Вишневский','Vishnevskiy',1),(12,'Володимир','Владимир','Vladimir','','','','Калмиков','Калмыков','Kalmykov',1),(13,'Уляна','Ульяна','Ulyana','Богданівна','Богдановна','Bogdanivna','Лущик','Лущик','Lushchyk',0),(14,'Ольга','Ольга','Olga','','','','Кисельова','Киселёва','Kyselyova',0),(15,'Євген','Евгений','Eugene','Арнольдович','Арнольдович','Arnoldovich','Настенко','Настенко','Nastenko',1),(16,'Ростислав','Ростислав','Rostyslav','','','','Бубнов','Бубнов','Bubnov',1),(17,'В.','В.','V.','','','','Семенов','Семенов','Semenov',1),(18,'В.','В.','V.','О.','О.','O.','Маланчук','Маланчук','Malanchuk',1),(19,'М.','М.','M.','Г.','Г.','G.','Крищук','Крищук','Kryshchuk',1),(20,'А.','А.','A.','В.','В.','V.','Копчак','Копчак','Kopchak',1),(21,'В.','В.','V.','О.','О.','O.','Єщенко','Ещенко','Eshchenko',1),(22,'Дмитро','Дмитрий','Dmitry','Владленович','Владленович','Vladlenovich','Анчишкін','Анчишкин','Anchishkin',1),(23,'Світлана','Светлана','Svitlana','','','','Баннікова','Банникова','Bannikova',0),(24,'','','Lyudmyla','','','','','','Berezovchuk',0),(25,'','','Nataliia','','','','','','Dudchenko',0),(26,'','','Oleg','','','','','','Kolomiychuk',1),(27,'','','Tatyana','','Сигизмундовна','','','','Krasnopolskaya',0),(28,'','','Oleg','','','','','','Krishtal',1),(29,'','','Galyna','','','V.','','','Kriukova',0),(30,'','','Eugene','','','V.','','','Kryachko',1),(31,'','','Alexander','','','','','','Kukush',1),(32,'','','Rostyslav','','','','','','Maiboroda',1),(33,'','','Sergii','','','','','','Masiuk',1),(34,'','','Taras','','','','','','Melnik',1),(35,'','','Vladimir','','','','','','Mikhailets',1),(36,'','','Vladimir','','','','','','Molyboga',1),(37,'','','Aleksandr','','','','','','Murach',1),(38,'','','Igor','','','','','','Nesteruk',1),(39,'','','Tatiana','','','','','','Osipchuk',0),(40,'','','Sergei','','','','','','Ovsienko',1),(41,'','','Andrey','','','','','','Popov',1),(42,'','','Anatoly','','','','','','Prysyazhnyuk',1),(43,'','','Tatiana','','','','','','Ryabukha',0),(44,'','','Dmytro','','','','','','Sadovyj',1),(45,'','','Lyudmyla','','','','','','Sakhno',0),(46,'','','Igor','','','','','','Samoilenko',1),(47,'','Сергей','Sergiy','','','','','Шкляр','Shklyar',1),(48,'','Александр','Oleksandr','','Контантинович','Kostiantynovych','','Выдыбида','Vidybida',1),(49,'','','Vitaliy','','','','','','Vishnevskey',1),(50,'','','Vladimir','','','','','','Khomenko',1),(51,'','Дмитрий','','','Анатольевич','','','Базыка','',1),(52,'','Сергей','','','Наумович','','','Волков','',1),(53,'','Николай','','','','','','Дудкин','',1),(54,'','Сергей','','','Алексеевич','','','Костерин','',1),(55,'','Борис','','','Борисович','','','Нестеренко','',1),(56,'','Михаил','','','Анатольевич','','','Новотарский','',1),(57,'','Андрей','','','','','','Пилипенко','',1),(58,'','Игорь','','','Тимофеевич','','','Селезов','',1),(59,'','Елена','','','','','','Сивак','',0),(60,'','Александр','','','','','','Судаков','',1),(61,'','Роман','','','Владимирович','','','Сулик','',1),(62,'Олексій','','','','','','Теплінський','','',1),(63,'','Григорий','','','','','','Торбин','',1),(64,'','Владимир','','','Н.','','','Фенченко','',1),(65,'','Евгений','','','Яковлевич','','','Хруслов','',1);
/*!40000 ALTER TABLE `MLSSParticipants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MLSSTalkFiles`
--

DROP TABLE IF EXISTS `MLSSTalkFiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MLSSTalkFiles` (
  `talk_id` int(10) DEFAULT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MLSSTalkFiles`
--

LOCK TABLES `MLSSTalkFiles` WRITE;
/*!40000 ALTER TABLE `MLSSTalkFiles` DISABLE KEYS */;
INSERT INTO `MLSSTalkFiles` VALUES (1,'abstracts/file_2011_02_18_Semenov.pdf','abstract'),(2,'abstracts/file_2011_03_11_LushchikNovitskiy.pdf','abstract'),(3,'abstracts/file_2011_03_25_Gerasymenko.pdf','abstract'),(5,'abstracts/file_2011_04_29_Burylko.pdf','abstract'),(6,'abstracts/file_2011_05_20_Bubnov.pdf','abstract'),(7,'abstracts/file_2011_09_16_Nastenko.pdf','abstract'),(11,'abstracts/file_2012_02_17_Novitskiy_Lushchik.pdf','abstract');
/*!40000 ALTER TABLE `MLSSTalkFiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MLSSTalkSpeakers`
--

DROP TABLE IF EXISTS `MLSSTalkSpeakers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MLSSTalkSpeakers` (
  `talk_id` int(10) DEFAULT NULL,
  `part_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MLSSTalkSpeakers`
--

LOCK TABLES `MLSSTalkSpeakers` WRITE;
/*!40000 ALTER TABLE `MLSSTalkSpeakers` DISABLE KEYS */;
INSERT INTO `MLSSTalkSpeakers` VALUES (1,17),(2,13),(2,7),(3,3),(4,15),(5,2),(6,16),(7,15),(8,12),(9,8),(10,14),(11,13),(11,7),(12,12),(12,10),(12,11),(13,18),(13,19),(13,20),(13,21),(14,13),(15,9);
/*!40000 ALTER TABLE `MLSSTalkSpeakers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MLSSTalks`
--

DROP TABLE IF EXISTS `MLSSTalks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MLSSTalks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title_ukr` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_rus` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_eng` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `org_place_id` int(10) DEFAULT NULL,
  `room` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MLSSTalks`
--

LOCK TABLES `MLSSTalks` WRITE;
/*!40000 ALTER TABLE `MLSSTalks` DISABLE KEYS */;
INSERT INTO `MLSSTalks` VALUES (1,'Автоматичне розпізнавання сухих хрипів за допомогою автокореляційної функції','Автоматическое распознавание сухих хрипов с помощью автокорреляционной функции','Automatical recognitions of dry wheezes via autocorrelation function','2011-02-18 16:30:00',1,208),(2,'Математичні підходи до прикладної гемодинаміки','Математические подходы к прикладной гемодинамике','Mathematical approaches to applied hemodynamics','2011-03-11 16:30:00',1,208),(3,'Гiдродинамiчна границя нелiнiйних кiнетичних рiвнянь','Гидродинамическая граница нелинейных кинетичских уравнений','Hydrodynamic limit of nonlinear kinetic equations','2011-03-25 16:30:00',1,208),(4,'Проблемні питання моделювання нелінійних аспектів гемодинаміки','Проблемные вопросы моделирования нелинейных аспектов гемодинамики','Hydrodynamic limit of nonlinear kinetic equations','2011-04-15 16:00:00',1,208),(5,'Нейронна модель Ходжкіна-Хакслі (Hodgkin-Huxley). Наслідки та застосування','Нейронная модель Ходжкина-Хаксли (Hodgkin-Huxley). Следствия и применения','Modelling problems of nonlinear aspects of hemodynamics','2011-04-29 16:00:00',1,208),(6,'Можливості фрактального аналізу медичних діагностичних зображень. Первинний клінічний досвід','Возможности фрактального анализа медицинских диагностических изображений. Первоначальный клинический опыт','Abilities of fractal analysis of medical diagnostic images. Primary clinical experience','2011-05-20 16:00:00',1,208),(7,'Біомедицинські застосування теорії самоогранізованої критичності','Биомедицинские применения теории самоогранизованной критичности','Biomedical application of selforganized criticity theory','2011-09-16 16:00:00',1,208),(8,'Відрізок прямої та дуга кривої в цифрових зображеннях. . Математичні та нейрофізіологічні аспекти','Отрезок прямой и дуга кривой в цифровых изображениях. Математические и нейрофизиологические аспекты','A segment of a line and an arc of a curve in digital images. Mathematical and neurophisical aspects','2011-10-14 16:00:00',1,208),(9,'Деякі питання інтегральної геометрії в комплексному просторі','Некоторые вопросы интегральной геометри в комплексном пространстве','Certain problems of integral geometry in complex spaces','2011-11-11 16:00:00',1,208),(10,'Програмний комплекс оцінки кровообігу людини','Программный комплекс оценки кровооборота человека','Programming complex for blood circulation study','2012-02-03 16:00:00',1,208),(11,'Моделі аналітичної механіки у дослідженні судинної системи','Модели аналитической механики в исследовании сосудистой системы','Analytical mechanics models in the study of Circulatory system','2012-02-17 16:00:00',1,208),(12,'Апроксимація експериментальних даних параметричено заданими кривими','Аппроксимация экспериментальных данных параметрически заданными кривыми','Approximation of experimental data with parametrized curves','2012-03-02 16:00:00',1,208),(13,'Імітаційне комп\'ютерне моделювання в щелепно-лицевій хірургії','Иммитационное и компьютерное моделирование в челюстно-лицевой хирургии','Immitational and computer modelling in dental and maxillofacial surgery','2012-04-20 16:00:00',1,208),(14,'ЕЕГ як метод оцінки якості роботи мозку: моделювання, діагностика та лікування','ЭЭГ как метод ощенки качества работы мозга: моделирование, диагностика и лечение','EEG as a method of estimations of brain processes: modelling, diagnostic and cure','2012-05-25 16:00:00',1,208),(15,'Дробні та мультидробні процеси в природознавстві','Дробные и мультидробные процессы в естествознании','Fractional and multifractions processes in natural sciences','2012-10-05 16:30:00',1,208);
/*!40000 ALTER TABLE `MLSSTalks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-06  0:36:25
