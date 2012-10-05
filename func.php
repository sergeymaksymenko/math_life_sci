<?php

require_once("classes/class.MLSTalk.php");
require_once("classes/database.php");
require_once("classes/class.SeminarInfo.php");

// change here basepath
//$base_path="http://www.imath.kiev.ua/~maks/mathmed/";
$base_path=""; //"http://localhost/eumls/new_classes/";
//================================
$lib_path="classes/";
//===========================================//
$host="localhost";
$user_name="eumls";
$user_passwd="eumlsdbpass";
$db_name="eumls";


$connData = new ConnectionData($host, $user_name, $user_passwd);
$db = new Database($db_name, $connData);
$db->debug_on();
$db->connect();
$db->open();


// list of languages
$languages=array("en", "ua", "ru");
//$languages=array("en", "ua");

// choose language of the page
if ( isset($_REQUEST["lang"]) )
{
	$lang = ( in_array($_REQUEST["lang"], $languages) ) ?  $_REQUEST["lang"] : $languages[0];
}
else
{
	$lang=$languages[0];
};




// set page title
if ( !isset($page_title) ) 
{
	$page_title = new LangStr(
		"Seminar 'Mathematics and life sciences'",
		"Семінар 'Математика та науки про життя'",
		"Семинар 'Математика и науки о жизни'");
};

// set page keywords
if ( !isset($page_keywords) )
{
	$page_keywords = new LangStr(
		"mathematics, medicine, hemodynamics",
		"математика, медицина, гемодинаміка",
		"математика, медицина, гемодинамика");
};

// set page description
if ( !isset($page_description) )
{
	$page_description = new LangStr(
		"Seminar 'Mathematics and life sciences'",
		"Семінар 'Математика та науки про життя'",
		"Семинар 'Математика и науки о жизни'");
};


//~ print_r($lang);
//~ print_r($page_title);
//~ print_r($page_keywords);
//~ print_r($page_description);

$cur_script = $_SERVER['PHP_SELF'];


$talks=array();
$action=SeminarInfo::CUR_TALK;
if ( isset($_REQUEST["y"]) && isset($_REQUEST["m"]) )
{ 
	$action=SeminarInfo::YEAR_MONTH;
	$talks = SeminarInfo::getTalksByMonth($db, $_REQUEST["y"], $_REQUEST["m"]);
}
elseif ( isset($_REQUEST["y"]) )
{
	$action=SeminarInfo::YEAR_ONLY;
	//$talks = SeminarInfo::getTalksByYear($db, $_REQUEST["y"]);	
	$talks = SeminarInfo::getLastTalk($db);
};

if ( count($talks) == 0 )
{
	$action=SeminarInfo::CUR_TALK;
	$talks = SeminarInfo::getLastTalk($db);
};

$years = SeminarInfo::getYears($db);

$MonthNamesEng=array('January', 'February', 'March', 'April', 'May', 'June', 'July',
'August', 'September', 'October', 'November', 'December');
$MonthNamesUkr=array('Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень',
'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень');

$MonthNamesRus=array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август',
'Сентябрь','Октябрь','Ноябрь','Декабрь');

$MonthsNames=array();
for($i=0; $i<12;$i++)
{
	$MonthsNames[] = new LangStr($MonthNamesEng[$i], $MonthNamesUkr[$i], $MonthNamesRus[$i]);
};

$Categories = new LangStr("Categories", "Категорії", "Категории");
$Archive = new LangStr("Archive", "Архів", "Архив");
$CurSeminar = new LangStr("Current seminar", "Поточний семінар", "Текущий семинар");
$Place = new LangStr("Place", "Місце проведення", "Место проведения");
$Address = new LangStr(
	"Institute of Mathematics of NAS of Ukraine, Tereshchenkivs'ka str., 3, Kyiv, Ukraine",
	"Інститут математики НАН України, вул. Терещенківська, 3, Kиїв, Україна",
	"Институт математики НАН Украины, ул. Терещенковская, 3, Kиев, Украина");
$Room = new LangStr("room", "кімната", "комната");


$cnt_file_name="counter.txt";
$visits_ip_file_name="visits_ip.txt";


$handle = fopen($cnt_file_name, 'r');
if ($handle != false) {
	//	echo "File {$cnt_file_name} is correctly opened! <br>";
	// read at most 265 symbols from the file
    if ( ($buffer = fgets($handle, 256) ) !== false ) {
//		echo "The line from file is read:<br>{$buffer}<br>";
        $cnt = intval($buffer)+1;
    } else
    {
//		echo "Error reading line from file<br>";
		$cnt=1;
	};
    fclose($handle);
}
else
{
//	echo "Error opening file {$cnt_file_name} for reading <br>";
	$cnt=1;
};
// save counter to the file
$handle = fopen($cnt_file_name, 'w');
if ($handle != false) {
	fwrite($handle, "{$cnt}");
	fclose($handle);
};


function get_ip_address() {
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    return $ip;
                }
            }
        }
    }
}

// save counter to the file
$handle = fopen($visits_ip_file_name, 'a+');
if ($handle != false) {
	fwrite($handle, "{$cnt}:\tip: ".get_ip_address(). "\tdate: ". date('Y-m-d G:i:s'). PHP_EOL);
	fclose($handle);
};

?>
