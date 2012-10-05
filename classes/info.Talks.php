<?php


require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");
require_once("class.MLSParticipant.php");
require_once("class.MLSTalk.php");

require_once("info.Organizations.php");
require_once("info.Participants.php");


function makeTalk($speakers, $ukrTitle, $rusTitle, $engTitle, $date, $files, $room, $place)
{
	return new MLSTalk($speakers, new LangStr($engTitle, $ukrTitle, $rusTitle), $date, $place, $room, new MLSTalkFile($files, 'abstract'));	
};





$talks=array();


$talks[] = makeTalk( $part['Semenov_V'],
                   'Автоматичне розпізнавання сухих хрипів за допомогою автокореляційної функції',
                   'Автоматическое распознавание сухих хрипов с помощью автокорреляционной функции',
                   'Automatical recognitions of dry wheezes via autocorrelation function',
                   '2011-02-18 16:30:00', 'abstracts/file_2011_02_18_Semenov.pdf', 208, $orgs['imath']);

$talks[] = makeTalk( array($part['Lushchyk_U'], $part['Novytskiy_V']),
                   'Математичні підходи до прикладної гемодинаміки',
                   'Математические подходы к прикладной гемодинамике',
                   'Mathematical approaches to applied hemodynamics',
                   '2011-03-11 16:30:00', 'abstracts/file_2011_03_11_LushchikNovitskiy.pdf', 208, $orgs['imath']);

$talks[] = makeTalk( $part['Gerasymenko_V'],
                   'Гiдродинамiчна границя нелiнiйних кiнетичних рiвнянь',
                   'Гидродинамическая граница нелинейных кинетичских уравнений',
                   'Hydrodynamic limit of nonlinear kinetic equations',
                   '2011-03-25 16:30:00', 'abstracts/file_2011_03_25_Gerasymenko.pdf', 208, $orgs['imath']);
                   
$talks[] = makeTalk( $part['Nastenko_E'],
                   'Проблемні питання моделювання нелінійних аспектів гемодинаміки',
                   'Проблемные вопросы моделирования нелинейных аспектов гемодинамики',
                   'Hydrodynamic limit of nonlinear kinetic equations',
                   '2011-04-15 16:00:00', '', 208, $orgs['imath']);
                   
                   
$talks[] = makeTalk( $part['Burylko_O'],
                   'Нейронна модель Ходжкіна-Хакслі (Hodgkin-Huxley). Наслідки та застосування',
                   'Нейронная модель Ходжкина-Хаксли (Hodgkin-Huxley). Следствия и применения',
                   'Modelling problems of nonlinear aspects of hemodynamics',
                   '2011-04-29 16:00:00', 'abstracts/file_2011_04_29_Burylko.pdf', 208, $orgs['imath']);
                   
$talks[] = makeTalk( $part['Bubnov_R'],
                   'Можливості фрактального аналізу медичних діагностичних зображень. Первинний клінічний досвід',
                   'Возможности фрактального анализа медицинских диагностических изображений. Первоначальный клинический опыт',
                   'Abilities of fractal analysis of medical diagnostic images. Primary clinical experience',
                   '2011-05-20 16:00:00', 'abstracts/file_2011_05_20_Bubnov.pdf', 208, $orgs['imath']);
                   
$talks[] = makeTalk( $part['Nastenko_E'],
                   'Біомедицинські застосування теорії самоогранізованої критичності',
                   'Биомедицинские применения теории самоогранизованной критичности',
                   'Biomedical application of selforganized criticity theory',
                   '2011-09-16 16:00:00', 'abstracts/file_2011_09_16_Nastenko.pdf', 208, $orgs['imath']);
                   
$talks[] = makeTalk( $part['Kalmykov_V'],                   
                   'Відрізок прямої та дуга кривої в цифрових зображеннях. . Математичні та нейрофізіологічні аспекти',
                   'Отрезок прямой и дуга кривой в цифровых изображениях. Математические и нейрофизиологические аспекты',
                   'A segment of a line and an arc of a curve in digital images. Mathematical and neurophisical aspects',
                   '2011-10-14 16:00:00', '', 208, $orgs['imath']);
                   //'Рассматриваются предложенные определения отрезка цифровой прямой и дуги цифровой кривой. Приводятся известные данные, исследования и гипотезы в области нейрофизиологии, с которыми согласуются предложенные определения. '

$talks[] = makeTalk( $part['Zelinskiy_Y'],
                   'Деякі питання інтегральної геометрії в комплексному просторі',
                   'Некоторые вопросы интегральной геометри в комплексном пространстве',
                   'Certain problems of integral geometry in complex spaces',
                   '2011-11-11 16:00:00', '', 208, $orgs['imath']);


$talks[] = makeTalk( $part['Kyselyova_O'],
                   'Програмний комплекс оцінки кровообігу людини',
                   'Программный комплекс оценки кровооборота человека',
                   'Programming complex for blood circulation study',
                   '2012-02-03 16:00:00', '', 208, $orgs['imath']);
            

$talks[] = makeTalk( array($part['Lushchyk_U'], $part['Novytskiy_V']),
                   'Моделі аналітичної механіки у дослідженні судинної системи',
                   'Модели аналитической механики в исследовании сосудистой системы',
                   'Analytical mechanics models in the study of Circulatory system',
                   '2012-02-17 16:00:00', 'abstracts/file_2012_02_17_Novitskiy_Lushchik.pdf', 208, $orgs['imath']);


$talks[] = makeTalk( array($part['Kalmykov_V'], $part['Romanenko_T'],$part['Vishnevskiy_V']),
                   'Апроксимація експериментальних даних параметричено заданими кривими',
                   'Аппроксимация экспериментальных данных параметрически заданными кривыми',
                   'Approximation of experimental data with parametrized curves',
                   '2012-03-02 16:00:00', '', 208, $orgs['imath']);

$talks[] = makeTalk( array($part['Malanchuk_VO'], $part['Kryshchuk_MG'], $part['Kopchak_AV'], $part['Eshchenko_VO']),
                   'Імітаційне комп\'ютерне моделювання в щелепно-лицевій хірургії',
                   'Иммитационное и компьютерное моделирование в челюстно-лицевой хирургии',
                   'Immitational and computer modelling in dental and maxillofacial surgery',
                   '2012-04-20 16:00:00', '', 208, $orgs['imath']);


$talks[] = makeTalk( $part['Lushchyk_U'],
                   'ЕЕГ як метод оцінки якості роботи мозку: моделювання, діагностика та лікування',
                   'ЭЭГ как метод ощенки качества работы мозга: моделирование, диагностика и лечение',
                   'EEG as a method of estimations of brain processes: modelling, diagnostic and cure', 
                   '2012-05-25 16:00:00', '', 208, $orgs['imath']);


$talks[] = makeTalk( $part['Shevchenko_G'],
                   'Дробні та мультидробні процеси в природознавстві',
                   'Дробные и мультидробные процессы в естествознании',
                   'Fractional and multifractions processes in natural sciences', 
                   '2012-10-05 16:30:00', '', 208, $orgs['imath']);



//print_r($talks);
//print $talks[0]->listAll();


//~ 
?>
