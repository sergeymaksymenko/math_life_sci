<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");
require_once("class.MLSParticipant.php");

require_once("info.Organizations.php");


function makePart($engName, $engMiddleName, $engSurName, 
                  $ukrName, $ukrMiddleName, $ukrSurName,
                  $rusName, $rusMiddleName, $rusSurName,
                  $sex, $email, $homepage, $organization)
{
	return new MLSParticipant( new LangStr($engName, $ukrName, $rusName), 
	                           new LangStr($engMiddleName, $ukrMiddleName, $rusMiddleName), 
	                           new LangStr($engSurName, $ukrSurName, $rusSurName), 
	                           $sex, $email, $homepage, $organization);
};


$part=array();

$part['Antoniouk_AV'] = makePart(
	'Alexandra', 'Viktorivna', 'Antoniouk',
	'Олександра', 'Вікторівна', 'Антонюк',
	'Александра', 'Викторовна', 'Антонюк',
	0, array('antoniouk@imath.kiev.ua', 'antoniouk.a@gmail.com'), '', $orgs['imath'] );

$part['Burylko_O'] = makePart(
	'Olexandr','Andriyovych','Burylko',
	'Олександр','Андрійович','Бурилко',
	'Александр','Андреевич','Бурилко',
	1,'burilko@imath.kiev.ua', '', $orgs['imath'] );

$part['Gerasymenko_V'] = makePart(
	'Viktor','Ivanovych','Gerasymenko',
	'Віктор','Іванович','Герасименко',
	'Виктор','Иванович','Герасименко',
	1,'gerasym@imath.kiev.ua', '', $orgs['imath'] );


$part['Goriunov_A'] = makePart(
	'Andrii','Ivanovych','Goriunov',
	'Андрій','','Горюнов',
	'Андрей','','Горюнов',
	1,'goriunov@imath.kiev.ua', '', $orgs['imath'] );


$part['Grushka_Ya'] = makePart(
	'Yaroslaw','','Grushka',
	'','','',
	'','','',
	1,'grushka@imath.kiev.ua', '', $orgs['imath'] );





$part['Maksymenko_S'] = makePart(
	'Sergiy', 'Ivanovysch', 'Maksymenko',
	'Сергій', 'Іванович', 'Максименко',
	'Сергей', 'Иванович', 'Максименко',
	1, 'maks@imath.kiev.ua', 'http://imath.kiev.ua/~maks', $orgs['imath'] );
            
$part['Novytskiy_V'] = makePart(
	'Viktor', 'Volodymyrovych','Novytskiy',
	'Віктор','Володимирович','Новицький',
	'Виктор','Владимирович','Новицкий',
	1,'novyc@imath.kiev.ua', 'http://novytskyy.org.ua', $orgs['imath'] );


$part['Zelinskiy_Y'] = makePart(
	'Yuriy','Borysovych','Zelinskiy',
	'Юрій','Борисович','Зелінський',
	'Юрий','Борисович','Зелинский',
	1, 'zel@imath.kiev.ua', '', $orgs['imath'] );



$part['Shevchenko_G'] = makePart(
	'G.','','Shevchenko',
	'Г.','','Шевченко',
	'Г.','','Шевченко',
	1, '', '', $orgs['shevch_knu'] );




            
$part['Romanenko_T'] = makePart(
                     'Tatyana','','Romanenko', 'Тетяна','','Романенко', 'Татьяна','','Романенко', 0,
                     '',  '', $orgs['immsp'] );
                     
$part['Vishnevskiy_V'] = makePart(
                     'Vitaliy','','Vishnevskiy',  'Віталій','','Вишневський', 'Виталий','','Вишневский',
                     1, '',  '', $orgs['immsp'] );

$part['Kalmykov_V'] = makePart(
                     'Vladimir','','Kalmykov', 'Володимир','','Калмиков', 'Владимир','','Калмыков',
                     1,'vl.kalmykov@gmail.com',  '', $orgs['immsp'] );

$part['Lushchyk_U'] = makePart(
                     'Ulyana','Bogdanivna','Lushchyk', 'Уляна','Богданівна','Лущик', 'Ульяна','Богдановна','Лущик',
                     0,array('u.lushchyk@gmail.com','inna_istyna@mail.ru'), '', $orgs['feofaniya'] );


$part['Kyselyova_O'] = makePart(
                     'Olga','','Kyselyova', 'Ольга','','Кисельова', 'Ольга','','Киселёва',
                     0,'olga.mmif@gmail.com', '', $orgs['kpi'] );


$part['Nastenko_E'] = makePart(
	'Eugene','Arnoldovich','Nastenko',
	'Євген','Арнольдович','Настенко',
	'Евгений','Арнольдович','Настенко',
	1,array('nastenko@yahoo.com','nastenko@inbox.ru'), '', array($orgs['amosov'], $orgs['kpi']));
                     
$part['Bubnov_R'] = makePart('Rostyslav','','Bubnov','Ростислав','','Бубнов', 'Ростислав','','Бубнов',
                      1,'rostyslavbubnov@mail.ru', '', $orgs['feofaniya_sonogr']);



$part['Semenov_V'] = makePart('V.','','Semenov', 'В.','','Семенов', 'В.','','Семенов', 1, 'mlev@bk.ru', '', $orgs['delta'] );


$part['Malanchuk_VO']  = makePart('V.','O.', 'Malanchuk', 'В.','О.', 'Маланчук',  'В.','О.', 'Маланчук', 1, '','', $orgs['bogomolets_nmu']);
$part['Kryshchuk_MG']  = makePart('M.','G.', 'Kryshchuk', 'М.','Г.', 'Крищук',  'М.','Г.', 'Крищук',1, '','', $orgs['kpi']);
$part['Kopchak_AV']    = makePart('A.','V.', 'Kopchak', 'А.','В.', 'Копчак',  'А.','В.', 'Копчак',1, '','', $orgs['bogomolets_nmu']);
$part['Eshchenko_VO']  = makePart('V.','O.', 'Eshchenko', 'В.','О.', 'Єщенко',  'В.','О.', 'Ещенко',1, '','', $orgs['kpi']);




$part['Anchishkin_DV']  = makePart(
   'Dmitry','Vladlenovich', 'Anchishkin', 
   'Дмитро','Владленович', 'Анчишкін',
   'Дмитрий','Владленович', 'Анчишкин', 1, 'anch@bitp.kiev.ua','', $orgs['bitph']);
   


$part['Bannikova_S'] = makePart(
	'Svitlana','','Bannikova',
	'Світлана','','Баннікова',
	'Светлана','','Банникова',
	0,'svit.bannikova@gmail.com', '', $orgs['kteu']);


$part['Berezovchuk_L'] = makePart(
	'Lyudmyla','','Berezovchuk',
	'','','',
	'','','',
	0,'berezovchuk@yahoo.com', '', $orgs['rpcon_amsu'] );


$part['Dudchenko_N'] = makePart(
	'Nataliia','','Dudchenko',
	'','','',
	'','','',
	0,'ndudchenko@igmof.gov.ua', '', $orgs['inst_geoch'] );
 

//itp@bitp.kiev.ua

$part['Kolomiychuk_O'] = makePart(
	'Oleg','','Kolomiychuk',
	'','','',
	'','','',
	1,'kolomithyk@rambler.ru', '', $orgs['imath'] );
 
 

$part['Krasnopolskaya_T'] = makePart(
	'Tatyana','','Krasnopolskaya',
	'','','',
	'','Сигизмундовна','',
	0,'t.krasnopolskaya@tue.nl', '', $orgs['inst_hydro'] );
 
$part['Krishtal_O'] = makePart(
	'Oleg','','Krishtal',
	'','','',
	'','','',
	1,'krishtal@biph.kiev.ua', '', array() );
 
 
$part['Kriukova_G'] = makePart(
	'Galyna','V.','Kriukova',
	'','','',
	'','','',
	0,'galyna.kriukova@gmail.com', '', $orgs['shevch_knu']);
 
  
 
$part['Kryachko_E'] = makePart(
	'Eugene','V.','Kryachko',
	'','','',
	'','','',
	1,array('eugene.kryachko@ulg.ac.be', 'e_kryachko@yahoo.com'), '', array());
 


$part['Kukush_A'] = makePart(
	'Alexander','','Kukush',
	'','','',
	'','','',
	1,'alexander_kukush@univ.kiev.ua', '', $orgs['shevch_knu']);


$part['Maiboroda_R'] = makePart(
	'Rostyslav','','Maiboroda',
	'','','',
	'','','',
	1,'mre@univ.kiev.ua', '', $orgs['shevch_knu']);


$part['Masiuk_S'] = makePart(
	'Sergii','','Masiuk',
	'','','',
	'','','',
	1,'masja1979@gmail.com', '', $orgs['urpi']);



$part['Melnik_T'] = makePart(
	'Taras','','Melnik',
	'','','',
	'','','',
	1,'melnyk@imath.kiev.ua', '', $orgs['imath']);



$part['Mikhailets_V'] = makePart(
	'Vladimir','','Mikhailets',
	'','','',
	'','','',
	1,'mikhailets@imath.kiev.ua', '', $orgs['imath']);

$part['Molyboga_V'] = makePart(
	'Vladimir','','Molyboga',
	'','','',
	'','','',
	1,'vol.molyboga@yandex.ua', '', $orgs['imath']);


$part['Murach_A'] = makePart(
	'Aleksandr','','Murach',
	'','','',
	'','','',
	1,'murach@imath.kiev.ua', '', $orgs['imath']);


$part['Nesteruk_I'] = makePart(
	'Igor','','Nesteruk',
	'','','',
	'','','',
	1,'inesteruk@yahoo.com', '', $orgs['inst_hydro']);



$part['Osipchuk_T'] = makePart(
	'Tatiana','','Osipchuk',
	'','','',
	'','','',
	0,'otm82@mail.ru', '', $orgs['imath']);




$part['Ovsienko_S'] = makePart(
	'Sergei','','Ovsienko',
	'','','',
	'','','',
	1,'ovsiyenko.sergiy@gmail.com', '', $orgs['shevch_knu']);




$part['Popov_A'] = makePart(
	'Andrey','','Popov',
	'','','',
	'','','',
	1,'popov256@gmail.com', '', $orgs['shevch_knu']);




$part['Prysyazhnyuk_A'] = makePart(
	'Anatoly','','Prysyazhnyuk',
	'','','',
	'','','',
	1,'anatoly.prysyazh@mail.ru', '', $orgs['rcrm_amcu']);


$part['Ryabukha_T'] = makePart(
	'Tatiana','','Ryabukha',
	'','','',
	'','','',
	0,'vyrtum@bigmir.net', '', $orgs['imath']);


$part['Sadovyj_D'] = makePart(
	'Dmytro','','Sadovyj',
	'','','',
	'','','',
	1,'sadovyj@univ.kiev.ua', '', $orgs['shevch_knu']);


$part['Sakhno_L'] = makePart(
	'Lyudmyla','','Sakhno',
	'','','',
	'','','',
	0,'lms@univ.kiev.ua', '', $orgs['shevch_knu']);


$part['Samoilenko_I'] = makePart(
	'Igor','','Samoilenko',
	'','','',
	'','','',
	1,'isamoil@imath.kiev.ua', '', $orgs['imath']);



$part['Shklyar_S'] = makePart(
	'Sergiy','','Shklyar',
	'','','',
	'Сергей','','Шкляр',
	1,'shklyar@mail.univ.kiev.ua', '', array());




$part['Vidybida_OK'] = makePart(
	'Oleksandr','Kostiantynovych','Vidybida',
	'','','',
	'Александр','Контантинович','Выдыбида',
	1,'vidybida@bitp.kiev.ua', 'http://www.bitp.kiev.ua/pers/vidybida', array());



$part['Vishnevskey_V'] = makePart(
	'Vitaliy','','Vishnevskey',
	'','','',
	'','','',
	1,'vit.vizual@gmail.com', '', array());


$part['khomenko_v'] = makePart(
	'Vladimir','','Khomenko',
	'','','',
	'','','',
	1,'vladkhom@hotmail.com', '', array());


$part['Bazyka_DA'] = makePart(
	'','','',
	'','','',
	'Дмитрий','Анатольевич','Базыка',
	1,'bazyka@yahoo.com', '', $orgs['scrm_amcu']);




$part['Volkov_SN'] = makePart(
	'','','',
	'','','',
	'Сергей','Наумович','Волков',
	1,'snvolkov@bitp.kiev.ua', '', array());


$part['Dudkin_N'] = makePart(
	'','','',
	'','','',
	'Николай','','Дудкин',
	1,'dudkin@imath.kiev.ua', '', array());


$part['Kosterin_SA'] = makePart(
	'','','',
	'','','',
	'Сергей','Алексеевич','Костерин',
	1,array('kinet@biochem.kiev.ua', 's_koster@voliacable.com'), '', array());




$part['Nesterenko_BB'] = makePart(
	'','','',
	'','','',
	'Борис','Борисович','Нестеренко',
	1,'model@imath.kiev.ua', '', $orgs['imath']);


$part['Novotarskiy_MA'] = makePart(
	'','','',
	'','','',
	'Михаил','Анатольевич','Новотарский',
	1,'novot@ukr.net', '', $orgs['imath']);




$part['Pilipenko_A'] = makePart(
	'','','',
	'','','',
	'Андрей','','Пилипенко',
	1,'apilip@imath.kiev.ua', '', $orgs['imath']);

$part['Selezov_IT'] = makePart(
	'','','',
	'','','',
	'Игорь','Тимофеевич','Селезов',
	1,'selesov@yandex.ru', '', array());


$part['Sivak_E'] = makePart(
	'','','',
	'','','',
	'Елена','','Сивак',
	0,'o.a.sivak@gmail.com', '', $orgs['shevch_knu']);



$part['Sudakov_A'] = makePart(
	'','','',
	'','','',
	'Александр','','Судаков',
	1,'saa@grid.org.ua', '', $orgs['shevch_knu']);

$part['Sulik_RV'] = makePart(
	'','','',
	'','','',
	'Роман','Владимирович','Сулик',
	1,'sulikr@mail.ru', '', $orgs['shupic_nma']);


$part['Teplinskiy_O'] = makePart(
	'','','',
	'Олексій','','Теплінський',
	'','','',
	1,'teplinsky@imath.kiev.ua', '', $orgs['imath']);



$part['Torbin_G'] = makePart(
	'','','',
	'','','',
	'Григорий','','Торбин',
	1,'torbin7@googlemail.com', '', $orgs['imath']);



$part['Fenchenko_VN'] = makePart(
	'','','',
	'','','',
	'Владимир','Н.','Фенченко',
	1,'fenchenko@ukr.net', '', array());



$part['Hruskov_E'] = makePart(
	'','','',
	'','','',
	'Евгений','Яковлевич','Хруслов',
	1,'khruslov@ilt.kharkov.ua', '', array());


$part['Yacenko_V'] = makePart(
	'','','',
	'','','',
	'Валентин','Порфириевич','Яценко',
	1,'valentinyatsenko@mail.ru', '', $orgs['kpi']);









   //~ д.т.н., член-корр АМН України Маланчук В.О. (мед. університет ім. О.О.Богомольця)
   //~ д.т.н., проф. Крищук М.Г. (НТУУ "КПІ")
   //~ к.м.н., доц. Копчак А.В.  (мед. університет ім. О.О.Богомольця)
   //~ магістр Єщенко В.О. (НТУУ "КПІ")



//~ From: maks@imath.kiev.ua To: antoniouk@imath.kiev.ua, 
//~ svit.bannikova@gmail.com, berezovchuk@yahoo.com, 
//~ rostyslavbubnov@mail.ru, gerasym@imath.kiev.ua, 
//~ goriunov@imath.kiev.ua, grushka@imath.kiev.ua, kolomithyk@rambler.ru,
//~ galyna.kriukova@gmail.com, alexander_kukush@univ.kiev.ua, 
//~ olga.mmif@gmail.com, u.lushchyk@gmail.com, inna_istyna@mail.ru, 
//~ ulyana64@mail.ru, mre@univ.kiev.ua, maks@imath.kiev.ua, 
//~ melnyk@imath.kiev.ua, mikhailets@imath.kiev.ua, 
//~ vol.molyboga@yandex.ua, murach@imath.kiev.ua, nastenko@yahoo.com, 
//~ novyc@imath.kiev.ua, otm82@mail.ru, ovsiyenko.sergiy@gmail.com, 
//~ popov256@gmail.com, anatoly.prysyazh@mail.ru, vyrtum@bigmir.net, 
//~ sadovyj@univ.kiev.ua, lms@univ.kiev.ua, vladkhom@hotmail.com, 
//~ bazyka@yahoo.com, burilko@imath.kiev.ua, zel@imath.kiev.ua, 
//~ model@imath.kiev.ua, novot@ukr.net, apilip@imath.kiev.ua, mlev@bk.ru,
//~ o.a.sivak@gmail.com, saa@grid.org.ua, sulikr@mail.ru, 
//~ teplinsky@imath.kiev.ua, torbin7@googlemail.com, 
//~ valentinyatsenko@mail.ru, ndudchenko@igmof.gov.ua, 
//~ eugene.kryachko@ulg.ac.be, itp@bitp.kiev.ua, isamoil@imath.kiev.ua, 
//~ selesov@yandex.ru, dudkin@imath.kiev.ua, anch@bitp.kiev.ua, 
//~ khruslov@ilt.kharkov.ua, fenchenko@ukr.net, krishtal@biph.kiev.ua, 
//~ vit.vizual@gmail.com, vl.kalmykov@gmail.com, krys@ukr.net Subject: 
//~ семінар "Математика та науки про життя"  05.10.2012 Date: Wed, 26 
//~ Sep 2012 16:02:50 +0300 X-Mailer: Claws Mail 3.8.0 (GTK+ 2.24.10; 
//~ x86_64-pc-linux-gnu)


print_r($part);




?>
