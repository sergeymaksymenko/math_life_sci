<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");
require_once("class.MLSParticipant.php");

require_once("info.Organizations.php");


function makePart($engName, $engSurName, 
                  $ukrName, $ukrSurName,
                  $rusName, $rusSurName,
                  $email, $homepage, $organization)
{
	return new MLSParticipant( new LangStr($engName, $ukrName, $rusName), 
	                           new LangStr($engSurName, $ukrSurName, $rusSurName), 
	                           $email, $homepage, $organization);
};


$part=array();

$part['Maksymenko_S'] = makePart(
                     'Sergiy', 'Maksymenko',  'Сергій', 'Максименко', 'Сергей', 'Максименко', 
                     'maks@imath.kiev.ua',  'http://imath.kiev.ua/~maks', $orgs['imath'] );

$part['Romanenko_T'] = makePart(
                     'Tatyana','Romanenko', 'Тетяна','Романенко', 'Татьяна','Романенко',
                     '',  '', $orgs['immsp'] );
                     
$part['Vishnevskiy_V'] = makePart(
                     'Vitaliy','Vishnevskiy',  'Віталій','Вишневський', 'Виталий','Вишневский',
                     '',  '', $orgs['immsp'] );

$part['Kalmykov_V'] = makePart(
                     'Vladimir','Kalmykov', 'Володимир','Калмиков', 'Владимир','Калмыков',
                     'vl.kalmykov@gmail.com',  '', $orgs['immsp'] );

$part['Lushchyk_U'] = makePart(
                     'Ulyana','Lushchyk', 'Уляна','Лущик', 'Ульяна','Лущик',
                     'u.lushchyk@gmail.com', '', $orgs['feofaniya'] );

$part['Novytskiy_V'] = makePart(
                     'Volodymyr','Novytskiy', 'Володимир','Новицький','Владимир','Новицкий',
                     'novyc@imath.kiev.ua', '', $orgs['imath'] );
                     

$part['Kyselyova_O'] = makePart(
                     'Olga','Kyselyova', 'Ольга','Кисельова', 'Ольга','Киселёва',
                     '', '', $orgs['kpi'] );

$part['Zelinskiy_Y'] = makePart('Yuriy','Zelinskiy', 'Юрій','Зелінський', 'Юрий','Зелинский',
                     'zel@imath.kiev.ua', '', $orgs['imath'] );

$part['Nastenko_E'] = makePart('Eugene','Nastenko', 'Євген','Настенко', 'Евгений','Настенко',
                     'nastenko@yahoo.com', '', array($orgs['amosov'], $orgs['kpi']));
                     
$part['Bubnov_R'] = makePart('Ростислав','Бубнов','Rostyslav','Bubnov',1,'rostyslavbubnov@mail.ru');

$part['Burylko_O'] = makePart('Olexandr','Burylko', 'Олександр','Бурилко', 'Александр','Бурилко',
                    'burilko@imath.kiev.ua', '', $orgs['imath'] );

$part['Gerasymenko_V'] = makePart('Viktor','Gerasymenko','Віктор','Герасименко','Виктор','Герасименко',
                    'gerasym@imath.kiev.ua', '', $orgs['imath'] );

$part['Semenov_V'] = makePart('V.','Semenov', 'В.','Семенов', 'В.','Семенов', '', '', $orgs['delta'] );


$part['Malanchuk_VO']  = makePart('V.O.', 'Malanchuk', 'В.О.', 'Маланчук',  'В.О.', 'Маланчук', '','', $orgs['bogomolets_nmu']);
$part['Kryshchuk_MG']  = makePart('M.G.', 'Kryshchuk', 'М.Г.', 'Крищук',  'М.Г.', 'Крищук', '','', $orgs['kpi']);
$part['Kopchak_AV']  = makePart('A.V.', 'Kopchak', 'А.В.', 'Копчак',  'А.В.', 'Копчак', '','', $orgs['bogomolets_nmu']);
$part['Eshchenko_VO']  = makePart('V.O.', 'Eshchenko', 'В.О.', 'Єщенко',  'В.О.', 'Ещенко', '','', $orgs['kpi']);






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
