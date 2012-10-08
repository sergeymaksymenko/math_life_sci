BEGIN TRANSACTION;
CREATE TABLE MLSSOrganizations (
  id int(10) PRIMARY KEY,
  title_ukr VARCHAR(100),
  title_rus VARCHAR(100),
  title_eng VARCHAR(100),
  address VARCHAR(100),
  url VARCHAR(100)
);
INSERT INTO MLSSOrganizations VALUES(1,'Інститут математики НАН України','Институт математики НАН Украины','Institute of Mathematics of NAS of Ukraine','','http://www.imath.kiev.ua');
INSERT INTO MLSSOrganizations VALUES(2,'Інститут проблем математичних машин та систем','Институт проблем математических машин и систем','Institute of Mathematical Machines and System Problems','','http://www.immsp.kiev.ua');
INSERT INTO MLSSOrganizations VALUES(3,'Клінічна лікарня ''Феофанія''','Клиническая больница ''Феофания''','Clinical Hospital ''Feofaniya''','','http://www.feofaniya.org');
INSERT INTO MLSSOrganizations VALUES(4,'Національний Технічний Університет України (КПІ) ','Национальный Технический Университет Украины (КПИ) ','National Technical University of Ukraine ''Kyiv Polytechnic Institute''','','http://kpi.ua');
INSERT INTO MLSSOrganizations VALUES(5,'Національний інститут серцево-судинної хірургії імені М.М. Амосова НАМН','Национальный институт сердечно-сосудистой хирургии имени М.М. Амосова НАМН','Amosov National Institute of Cardiovascular Surgery','','http://amosovinstitute.org.ua');
INSERT INTO MLSSOrganizations VALUES(6,'Центр ультразвукової діагностики та інтервенційної сонографії клінічної лікарні ''Феофанія''','Центр ультразвуковой диагностики и интервенционной сонографии клинической больницы ''Феофания''','Center for ultrasound diagnosis and interventional sonography of Clinical Hospital ''Feofaniya''','','http://www.feofaniya.org/department/diagnostichni/tsentr-ultrazvukovoyi-diagnostiki-ta-interventsiynoyi-sonografiyi.html');
INSERT INTO MLSSOrganizations VALUES(7,'Наукове державне підприємство ''Дельта''','Научное государственное предприятие ''Дельта''','Scientific State Enterprise ''Delta''','','');
INSERT INTO MLSSOrganizations VALUES(8,'Київський національний університет ім. Тараса Шевченка','Киевский национальный университет им. Тараса Шевченко','T. Shevchenko National University of Kyiv','','');
INSERT INTO MLSSOrganizations VALUES(9,'Національний медичний університет імені О. О. Богомольця','Национальный медицинский университет им. О. О. Богомольца','Bogomolets National Medical University','','http://www.nmu.edu.ua');
INSERT INTO MLSSOrganizations VALUES(10,'','','Bogolyubov Institute for Theoretical Physics','','');
INSERT INTO MLSSOrganizations VALUES(11,'','','State Organization ''Research-practical center of endovascular neuroradiosurgery AMS of Ukraine''','','');
INSERT INTO MLSSOrganizations VALUES(12,'','','Kiev Trade and Economic University','','');
INSERT INTO MLSSOrganizations VALUES(13,'','','Semenenko Institute of Geochemistry, Mineralogy and Ore Formation NASU','','');
INSERT INTO MLSSOrganizations VALUES(14,'','','Institute of Hydromechanics NAS of Ukraine','','');
INSERT INTO MLSSOrganizations VALUES(15,'','','Ukrainian Radiation Protection Institute','','');
INSERT INTO MLSSOrganizations VALUES(16,'','','Research Center for Radiation Medicine of Academy of Medical Sciences of Ukraine','','');
INSERT INTO MLSSOrganizations VALUES(17,'','','Scientific Center of Radiation Medicine, AMS of Ukraine','','');
INSERT INTO MLSSOrganizations VALUES(18,'','','P.L.Shupik National Medical Academy of Post-Graduate Education','','');
CREATE TABLE MLSSParticipantEmails (
  part_id int(10),
  email VARCHAR(50)
);
INSERT INTO MLSSParticipantEmails VALUES(1,'antoniouk@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(1,'antoniouk.a@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(2,'burilko@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(3,'gerasym@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(4,'goriunov@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(5,'grushka@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(6,'maks@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(7,'novyc@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(8,'zel@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(9,'');
INSERT INTO MLSSParticipantEmails VALUES(10,'');
INSERT INTO MLSSParticipantEmails VALUES(11,'');
INSERT INTO MLSSParticipantEmails VALUES(12,'vl.kalmykov@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(13,'u.lushchyk@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(13,'inna_istyna@mail.ru');
INSERT INTO MLSSParticipantEmails VALUES(14,'olga.mmif@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(15,'nastenko@yahoo.com');
INSERT INTO MLSSParticipantEmails VALUES(15,'nastenko@inbox.ru');
INSERT INTO MLSSParticipantEmails VALUES(16,'rostyslavbubnov@mail.ru');
INSERT INTO MLSSParticipantEmails VALUES(17,'mlev@bk.ru');
INSERT INTO MLSSParticipantEmails VALUES(18,'');
INSERT INTO MLSSParticipantEmails VALUES(19,'');
INSERT INTO MLSSParticipantEmails VALUES(20,'');
INSERT INTO MLSSParticipantEmails VALUES(21,'');
INSERT INTO MLSSParticipantEmails VALUES(22,'anch@bitp.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(23,'svit.bannikova@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(24,'berezovchuk@yahoo.com');
INSERT INTO MLSSParticipantEmails VALUES(25,'ndudchenko@igmof.gov.ua');
INSERT INTO MLSSParticipantEmails VALUES(26,'kolomithyk@rambler.ru');
INSERT INTO MLSSParticipantEmails VALUES(27,'t.krasnopolskaya@tue.nl');
INSERT INTO MLSSParticipantEmails VALUES(28,'krishtal@biph.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(29,'galyna.kriukova@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(30,'eugene.kryachko@ulg.ac.be');
INSERT INTO MLSSParticipantEmails VALUES(30,'e_kryachko@yahoo.com');
INSERT INTO MLSSParticipantEmails VALUES(31,'alexander_kukush@univ.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(32,'mre@univ.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(33,'masja1979@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(34,'melnyk@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(35,'mikhailets@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(36,'vol.molyboga@yandex.ua');
INSERT INTO MLSSParticipantEmails VALUES(37,'murach@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(38,'inesteruk@yahoo.com');
INSERT INTO MLSSParticipantEmails VALUES(39,'otm82@mail.ru');
INSERT INTO MLSSParticipantEmails VALUES(40,'ovsiyenko.sergiy@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(41,'popov256@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(42,'anatoly.prysyazh@mail.ru');
INSERT INTO MLSSParticipantEmails VALUES(43,'vyrtum@bigmir.net');
INSERT INTO MLSSParticipantEmails VALUES(44,'sadovyj@univ.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(45,'lms@univ.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(46,'isamoil@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(47,'shklyar@mail.univ.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(48,'vidybida@bitp.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(49,'vit.vizual@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(50,'vladkhom@hotmail.com');
INSERT INTO MLSSParticipantEmails VALUES(51,'bazyka@yahoo.com');
INSERT INTO MLSSParticipantEmails VALUES(52,'snvolkov@bitp.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(53,'dudkin@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(54,'kinet@biochem.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(54,'s_koster@voliacable.com');
INSERT INTO MLSSParticipantEmails VALUES(55,'model@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(56,'novot@ukr.net');
INSERT INTO MLSSParticipantEmails VALUES(57,'apilip@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(58,'selesov@yandex.ru');
INSERT INTO MLSSParticipantEmails VALUES(59,'o.a.sivak@gmail.com');
INSERT INTO MLSSParticipantEmails VALUES(60,'saa@grid.org.ua');
INSERT INTO MLSSParticipantEmails VALUES(61,'sulikr@mail.ru');
INSERT INTO MLSSParticipantEmails VALUES(62,'teplinsky@imath.kiev.ua');
INSERT INTO MLSSParticipantEmails VALUES(63,'torbin7@googlemail.com');
INSERT INTO MLSSParticipantEmails VALUES(64,'fenchenko@ukr.net');
INSERT INTO MLSSParticipantEmails VALUES(65,'khruslov@ilt.kharkov.ua');
CREATE TABLE MLSSParticipantOrganizations (
  part_id int(10),
  org_id int(10)
);
INSERT INTO MLSSParticipantOrganizations VALUES(1,1);
INSERT INTO MLSSParticipantOrganizations VALUES(2,1);
INSERT INTO MLSSParticipantOrganizations VALUES(3,1);
INSERT INTO MLSSParticipantOrganizations VALUES(4,1);
INSERT INTO MLSSParticipantOrganizations VALUES(5,1);
INSERT INTO MLSSParticipantOrganizations VALUES(6,1);
INSERT INTO MLSSParticipantOrganizations VALUES(7,1);
INSERT INTO MLSSParticipantOrganizations VALUES(8,1);
INSERT INTO MLSSParticipantOrganizations VALUES(9,8);
INSERT INTO MLSSParticipantOrganizations VALUES(10,2);
INSERT INTO MLSSParticipantOrganizations VALUES(11,2);
INSERT INTO MLSSParticipantOrganizations VALUES(12,2);
INSERT INTO MLSSParticipantOrganizations VALUES(13,3);
INSERT INTO MLSSParticipantOrganizations VALUES(14,4);
INSERT INTO MLSSParticipantOrganizations VALUES(15,5);
INSERT INTO MLSSParticipantOrganizations VALUES(15,4);
INSERT INTO MLSSParticipantOrganizations VALUES(16,6);
INSERT INTO MLSSParticipantOrganizations VALUES(17,7);
INSERT INTO MLSSParticipantOrganizations VALUES(18,9);
INSERT INTO MLSSParticipantOrganizations VALUES(19,4);
INSERT INTO MLSSParticipantOrganizations VALUES(20,9);
INSERT INTO MLSSParticipantOrganizations VALUES(21,4);
INSERT INTO MLSSParticipantOrganizations VALUES(22,10);
INSERT INTO MLSSParticipantOrganizations VALUES(23,12);
INSERT INTO MLSSParticipantOrganizations VALUES(24,11);
INSERT INTO MLSSParticipantOrganizations VALUES(25,13);
INSERT INTO MLSSParticipantOrganizations VALUES(26,1);
INSERT INTO MLSSParticipantOrganizations VALUES(27,14);
INSERT INTO MLSSParticipantOrganizations VALUES(29,8);
INSERT INTO MLSSParticipantOrganizations VALUES(31,8);
INSERT INTO MLSSParticipantOrganizations VALUES(32,8);
INSERT INTO MLSSParticipantOrganizations VALUES(33,15);
INSERT INTO MLSSParticipantOrganizations VALUES(34,1);
INSERT INTO MLSSParticipantOrganizations VALUES(35,1);
INSERT INTO MLSSParticipantOrganizations VALUES(36,1);
INSERT INTO MLSSParticipantOrganizations VALUES(37,1);
INSERT INTO MLSSParticipantOrganizations VALUES(38,14);
INSERT INTO MLSSParticipantOrganizations VALUES(39,1);
INSERT INTO MLSSParticipantOrganizations VALUES(40,8);
INSERT INTO MLSSParticipantOrganizations VALUES(41,8);
INSERT INTO MLSSParticipantOrganizations VALUES(42,16);
INSERT INTO MLSSParticipantOrganizations VALUES(43,1);
INSERT INTO MLSSParticipantOrganizations VALUES(44,8);
INSERT INTO MLSSParticipantOrganizations VALUES(45,8);
INSERT INTO MLSSParticipantOrganizations VALUES(46,1);
INSERT INTO MLSSParticipantOrganizations VALUES(51,17);
INSERT INTO MLSSParticipantOrganizations VALUES(55,1);
INSERT INTO MLSSParticipantOrganizations VALUES(56,1);
INSERT INTO MLSSParticipantOrganizations VALUES(57,1);
INSERT INTO MLSSParticipantOrganizations VALUES(59,8);
INSERT INTO MLSSParticipantOrganizations VALUES(60,8);
INSERT INTO MLSSParticipantOrganizations VALUES(61,18);
INSERT INTO MLSSParticipantOrganizations VALUES(62,1);
INSERT INTO MLSSParticipantOrganizations VALUES(63,1);
CREATE TABLE MLSSParticipants (
  id int(10) PRIMARY KEY,
  name_ukr VARCHAR(50),
  name_rus VARCHAR(50),
  name_eng VARCHAR(50),
  middlename_ukr VARCHAR(50),
  middlename_rus VARCHAR(50),
  middlename_eng VARCHAR(50),
  surname_ukr VARCHAR(50),
  surname_rus VARCHAR(50),
  surname_eng VARCHAR(50),
  sex int(1)
);
INSERT INTO MLSSParticipants VALUES(1,'Олександра','Александра','Alexandra','Вікторівна','Викторовна','Viktorivna','Антонюк','Антонюк','Antoniouk',0);
INSERT INTO MLSSParticipants VALUES(2,'Олександр','Александр','Olexandr','Андрійович','Андреевич','Andriyovych','Бурилко','Бурилко','Burylko',1);
INSERT INTO MLSSParticipants VALUES(3,'Віктор','Виктор','Viktor','Іванович','Иванович','Ivanovych','Герасименко','Герасименко','Gerasymenko',1);
INSERT INTO MLSSParticipants VALUES(4,'Андрій','Андрей','Andrii','','','Ivanovych','Горюнов','Горюнов','Goriunov',1);
INSERT INTO MLSSParticipants VALUES(5,'','','Yaroslaw','','','','','','Grushka',1);
INSERT INTO MLSSParticipants VALUES(6,'Сергій','Сергей','Sergiy','Іванович','Иванович','Ivanovysch','Максименко','Максименко','Maksymenko',1);
INSERT INTO MLSSParticipants VALUES(7,'Віктор','Виктор','Viktor','Володимирович','Владимирович','Volodymyrovych','Новицький','Новицкий','Novytskiy',1);
INSERT INTO MLSSParticipants VALUES(8,'Юрій','Юрий','Yuriy','Борисович','Борисович','Borysovych','Зелінський','Зелинский','Zelinskiy',1);
INSERT INTO MLSSParticipants VALUES(9,'Г.','Г.','G.','','','','Шевченко','Шевченко','Shevchenko',1);
INSERT INTO MLSSParticipants VALUES(10,'Тетяна','Татьяна','Tatyana','','','','Романенко','Романенко','Romanenko',0);
INSERT INTO MLSSParticipants VALUES(11,'Віталій','Виталий','Vitaliy','','','','Вишневський','Вишневский','Vishnevskiy',1);
INSERT INTO MLSSParticipants VALUES(12,'Володимир','Владимир','Vladimir','','','','Калмиков','Калмыков','Kalmykov',1);
INSERT INTO MLSSParticipants VALUES(13,'Уляна','Ульяна','Ulyana','Богданівна','Богдановна','Bogdanivna','Лущик','Лущик','Lushchyk',0);
INSERT INTO MLSSParticipants VALUES(14,'Ольга','Ольга','Olga','','','','Кисельова','Киселёва','Kyselyova',0);
INSERT INTO MLSSParticipants VALUES(15,'Євген','Евгений','Eugene','Арнольдович','Арнольдович','Arnoldovich','Настенко','Настенко','Nastenko',1);
INSERT INTO MLSSParticipants VALUES(16,'Ростислав','Ростислав','Rostyslav','','','','Бубнов','Бубнов','Bubnov',1);
INSERT INTO MLSSParticipants VALUES(17,'В.','В.','V.','','','','Семенов','Семенов','Semenov',1);
INSERT INTO MLSSParticipants VALUES(18,'В.','В.','V.','О.','О.','O.','Маланчук','Маланчук','Malanchuk',1);
INSERT INTO MLSSParticipants VALUES(19,'М.','М.','M.','Г.','Г.','G.','Крищук','Крищук','Kryshchuk',1);
INSERT INTO MLSSParticipants VALUES(20,'А.','А.','A.','В.','В.','V.','Копчак','Копчак','Kopchak',1);
INSERT INTO MLSSParticipants VALUES(21,'В.','В.','V.','О.','О.','O.','Єщенко','Ещенко','Eshchenko',1);
INSERT INTO MLSSParticipants VALUES(22,'Дмитро','Дмитрий','Dmitry','Владленович','Владленович','Vladlenovich','Анчишкін','Анчишкин','Anchishkin',1);
INSERT INTO MLSSParticipants VALUES(23,'Світлана','Светлана','Svitlana','','','','Баннікова','Банникова','Bannikova',0);
INSERT INTO MLSSParticipants VALUES(24,'','','Lyudmyla','','','','','','Berezovchuk',0);
INSERT INTO MLSSParticipants VALUES(25,'','','Nataliia','','','','','','Dudchenko',0);
INSERT INTO MLSSParticipants VALUES(26,'','','Oleg','','','','','','Kolomiychuk',1);
INSERT INTO MLSSParticipants VALUES(27,'','','Tatyana','','Сигизмундовна','','','','Krasnopolskaya',0);
INSERT INTO MLSSParticipants VALUES(28,'','','Oleg','','','','','','Krishtal',1);
INSERT INTO MLSSParticipants VALUES(29,'','','Galyna','','','V.','','','Kriukova',0);
INSERT INTO MLSSParticipants VALUES(30,'','','Eugene','','','V.','','','Kryachko',1);
INSERT INTO MLSSParticipants VALUES(31,'','','Alexander','','','','','','Kukush',1);
INSERT INTO MLSSParticipants VALUES(32,'','','Rostyslav','','','','','','Maiboroda',1);
INSERT INTO MLSSParticipants VALUES(33,'','','Sergii','','','','','','Masiuk',1);
INSERT INTO MLSSParticipants VALUES(34,'','','Taras','','','','','','Melnik',1);
INSERT INTO MLSSParticipants VALUES(35,'','','Vladimir','','','','','','Mikhailets',1);
INSERT INTO MLSSParticipants VALUES(36,'','','Vladimir','','','','','','Molyboga',1);
INSERT INTO MLSSParticipants VALUES(37,'','','Aleksandr','','','','','','Murach',1);
INSERT INTO MLSSParticipants VALUES(38,'','','Igor','','','','','','Nesteruk',1);
INSERT INTO MLSSParticipants VALUES(39,'','','Tatiana','','','','','','Osipchuk',0);
INSERT INTO MLSSParticipants VALUES(40,'','','Sergei','','','','','','Ovsienko',1);
INSERT INTO MLSSParticipants VALUES(41,'','','Andrey','','','','','','Popov',1);
INSERT INTO MLSSParticipants VALUES(42,'','','Anatoly','','','','','','Prysyazhnyuk',1);
INSERT INTO MLSSParticipants VALUES(43,'','','Tatiana','','','','','','Ryabukha',0);
INSERT INTO MLSSParticipants VALUES(44,'','','Dmytro','','','','','','Sadovyj',1);
INSERT INTO MLSSParticipants VALUES(45,'','','Lyudmyla','','','','','','Sakhno',0);
INSERT INTO MLSSParticipants VALUES(46,'','','Igor','','','','','','Samoilenko',1);
INSERT INTO MLSSParticipants VALUES(47,'','Сергей','Sergiy','','','','','Шкляр','Shklyar',1);
INSERT INTO MLSSParticipants VALUES(48,'','Александр','Oleksandr','','Контантинович','Kostiantynovych','','Выдыбида','Vidybida',1);
INSERT INTO MLSSParticipants VALUES(49,'','','Vitaliy','','','','','','Vishnevskey',1);
INSERT INTO MLSSParticipants VALUES(50,'','','Vladimir','','','','','','Khomenko',1);
INSERT INTO MLSSParticipants VALUES(51,'','Дмитрий','','','Анатольевич','','','Базыка','',1);
INSERT INTO MLSSParticipants VALUES(52,'','Сергей','','','Наумович','','','Волков','',1);
INSERT INTO MLSSParticipants VALUES(53,'','Николай','','','','','','Дудкин','',1);
INSERT INTO MLSSParticipants VALUES(54,'','Сергей','','','Алексеевич','','','Костерин','',1);
INSERT INTO MLSSParticipants VALUES(55,'','Борис','','','Борисович','','','Нестеренко','',1);
INSERT INTO MLSSParticipants VALUES(56,'','Михаил','','','Анатольевич','','','Новотарский','',1);
INSERT INTO MLSSParticipants VALUES(57,'','Андрей','','','','','','Пилипенко','',1);
INSERT INTO MLSSParticipants VALUES(58,'','Игорь','','','Тимофеевич','','','Селезов','',1);
INSERT INTO MLSSParticipants VALUES(59,'','Елена','','','','','','Сивак','',0);
INSERT INTO MLSSParticipants VALUES(60,'','Александр','','','','','','Судаков','',1);
INSERT INTO MLSSParticipants VALUES(61,'','Роман','','','Владимирович','','','Сулик','',1);
INSERT INTO MLSSParticipants VALUES(62,'Олексій','','','','','','Теплінський','','',1);
INSERT INTO MLSSParticipants VALUES(63,'','Григорий','','','','','','Торбин','',1);
INSERT INTO MLSSParticipants VALUES(64,'','Владимир','','','Н.','','','Фенченко','',1);
INSERT INTO MLSSParticipants VALUES(65,'','Евгений','','','Яковлевич','','','Хруслов','',1);
CREATE TABLE MLSSTalkFiles (
  talk_id int(10),
  file VARCHAR(100),
  description VARCHAR(300)
);
INSERT INTO MLSSTalkFiles VALUES(1,'abstracts/file_2011_02_18_Semenov.pdf','abstract');
INSERT INTO MLSSTalkFiles VALUES(2,'abstracts/file_2011_03_11_LushchikNovitskiy.pdf','abstract');
INSERT INTO MLSSTalkFiles VALUES(3,'abstracts/file_2011_03_25_Gerasymenko.pdf','abstract');
INSERT INTO MLSSTalkFiles VALUES(5,'abstracts/file_2011_04_29_Burylko.pdf','abstract');
INSERT INTO MLSSTalkFiles VALUES(6,'abstracts/file_2011_05_20_Bubnov.pdf','abstract');
INSERT INTO MLSSTalkFiles VALUES(7,'abstracts/file_2011_09_16_Nastenko.pdf','abstract');
INSERT INTO MLSSTalkFiles VALUES(11,'abstracts/file_2012_02_17_Novitskiy_Lushchik.pdf','abstract');
CREATE TABLE MLSSTalkSpeakers (
  talk_id int(10),
  part_id int(10)
);
INSERT INTO MLSSTalkSpeakers VALUES(1,17);
INSERT INTO MLSSTalkSpeakers VALUES(2,13);
INSERT INTO MLSSTalkSpeakers VALUES(2,7);
INSERT INTO MLSSTalkSpeakers VALUES(3,3);
INSERT INTO MLSSTalkSpeakers VALUES(4,15);
INSERT INTO MLSSTalkSpeakers VALUES(5,2);
INSERT INTO MLSSTalkSpeakers VALUES(6,16);
INSERT INTO MLSSTalkSpeakers VALUES(7,15);
INSERT INTO MLSSTalkSpeakers VALUES(8,12);
INSERT INTO MLSSTalkSpeakers VALUES(9,8);
INSERT INTO MLSSTalkSpeakers VALUES(10,14);
INSERT INTO MLSSTalkSpeakers VALUES(11,13);
INSERT INTO MLSSTalkSpeakers VALUES(11,7);
INSERT INTO MLSSTalkSpeakers VALUES(12,12);
INSERT INTO MLSSTalkSpeakers VALUES(12,10);
INSERT INTO MLSSTalkSpeakers VALUES(12,11);
INSERT INTO MLSSTalkSpeakers VALUES(13,18);
INSERT INTO MLSSTalkSpeakers VALUES(13,19);
INSERT INTO MLSSTalkSpeakers VALUES(13,20);
INSERT INTO MLSSTalkSpeakers VALUES(13,21);
INSERT INTO MLSSTalkSpeakers VALUES(14,13);
INSERT INTO MLSSTalkSpeakers VALUES(15,9);
CREATE TABLE MLSSTalks (
  id int(10) PRIMARY KEY,
  title_ukr VARCHAR(250),
  title_rus VARCHAR(250),
  title_eng VARCHAR(250),
  date DATETIME,
  org_place_id int(10),
  room int(3)
);
INSERT INTO MLSSTalks VALUES(1,'Автоматичне розпізнавання сухих хрипів за допомогою автокореляційної функції','Автоматическое распознавание сухих хрипов с помощью автокорреляционной функции','Automatical recognitions of dry wheezes via autocorrelation function','2011-02-18 16:30:00',1,208);
INSERT INTO MLSSTalks VALUES(2,'Математичні підходи до прикладної гемодинаміки','Математические подходы к прикладной гемодинамике','Mathematical approaches to applied hemodynamics','2011-03-11 16:30:00',1,208);
INSERT INTO MLSSTalks VALUES(3,'Гiдродинамiчна границя нелiнiйних кiнетичних рiвнянь','Гидродинамическая граница нелинейных кинетичских уравнений','Hydrodynamic limit of nonlinear kinetic equations','2011-03-25 16:30:00',1,208);
INSERT INTO MLSSTalks VALUES(4,'Проблемні питання моделювання нелінійних аспектів гемодинаміки','Проблемные вопросы моделирования нелинейных аспектов гемодинамики','Modelling problems of nonlinear aspects of hemodynamics','2011-04-15 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(5,'Нейронна модель Ходжкіна-Хакслі (Hodgkin-Huxley). Наслідки та застосування','Нейронная модель Ходжкина-Хаксли (Hodgkin-Huxley). Следствия и применения','Hodgkin-Huxley neuron model. Consequences and applications','2011-04-29 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(6,'Можливості фрактального аналізу медичних діагностичних зображень. Первинний клінічний досвід','Возможности фрактального анализа медицинских диагностических изображений. Первоначальный клинический опыт','Abilities of fractal analysis of medical diagnostic images. Primary clinical experience','2011-05-20 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(7,'Біомедицинські застосування теорії самоогранізованої критичності','Биомедицинские применения теории самоогранизованной критичности','Biomedical application of selforganized criticity theory','2011-09-16 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(8,'Відрізок прямої та дуга кривої в цифрових зображеннях. . Математичні та нейрофізіологічні аспекти','Отрезок прямой и дуга кривой в цифровых изображениях. Математические и нейрофизиологические аспекты','A segment of a line and an arc of a curve in digital images. Mathematical and neurophisical aspects','2011-10-14 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(9,'Деякі питання інтегральної геометрії в комплексному просторі','Некоторые вопросы интегральной геометри в комплексном пространстве','Certain problems of integral geometry in complex spaces','2011-11-11 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(10,'Програмний комплекс оцінки кровообігу людини','Программный комплекс оценки кровооборота человека','Programming complex for blood circulation study','2012-02-03 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(11,'Моделі аналітичної механіки у дослідженні судинної системи','Модели аналитической механики в исследовании сосудистой системы','Analytical mechanics models in the study of Circulatory system','2012-02-17 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(12,'Апроксимація експериментальних даних параметричено заданими кривими','Аппроксимация экспериментальных данных параметрически заданными кривыми','Approximation of experimental data with parametrized curves','2012-03-02 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(13,'Імітаційне комп''ютерне моделювання в щелепно-лицевій хірургії','Иммитационное и компьютерное моделирование в челюстно-лицевой хирургии','Immitational and computer modelling in dental and maxillofacial surgery','2012-04-20 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(14,'ЕЕГ як метод оцінки якості роботи мозку: моделювання, діагностика та лікування','ЭЭГ как метод ощенки качества работы мозга: моделирование, диагностика и лечение','EEG as a method of estimations of brain processes: modelling, diagnostic and cure','2012-05-25 16:00:00',1,208);
INSERT INTO MLSSTalks VALUES(15,'Дробні та мультидробні процеси в природознавстві','Дробные и мультидробные процессы в естествознании','Fractional and multifractions processes in natural sciences','2012-10-05 16:30:00',1,208);
COMMIT;
