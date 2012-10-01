<?php

// change here basepath
$base_path="http://www.imath.kiev.ua/~maks/mathmed/";
#$base_path="http://localhost/shop/mathmed/";
//================================
$lib_path="classes/";
//===========================================//
$host="localhost";
$user_name="eumls";
$user_passwd="eumlsdbpass";
$db_name="eumls";
$partic_table_name="mathmed_participants";
$seminar_table_name="mathmed_seminars";
//===========================================//

require("{$lib_path}/database.php");
require("{$lib_path}/edit_form.php");
require_once("table_object.php");

$connData = new ConnectionData($host, $user_name, $user_passwd);
$db = new Database($db_name, $connData);
$db->debug_on();
$db->connect();
$db->open();

// participants of the seminar
$sem_part = array();
$sem_part["id"] = new myFieldParams("ID", "int(10) NOT NULL auto_increment", "", "numeric", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::HIDDEN, mc::ENABLED);
$sem_part["name_ua"] = new myFieldParams("Name (ukr)", "VARCHAR(30)", "Please enter the name in ukrainian", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::CHECKED, mc::MANDATORY, mc::VISIBLE);
$sem_part["surname_ua"] = new myFieldParams("Surname (ukr)", "VARCHAR(30)", "Please enter the surname in ukrainian", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::CHECKED, mc::MANDATORY, mc::VISIBLE);
$sem_part["name_en"] = new myFieldParams("Name (eng)", "VARCHAR(30)", "Please enter the name in english", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::MANDATORY, mc::VISIBLE);
$sem_part["surname_en"] = new myFieldParams("Surname (eng)", "VARCHAR(30)", "Please enter the surname in english", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::MANDATORY, mc::VISIBLE);
$sem_part["sex"] = new myFieldParams("Sex", "INT(1)", "", "select", array("values" => array(0=>"Female", 1=>"Male"), "default_key" => 0, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$sem_part["email"] = new myFieldParams("Email", "VARCHAR(30)", "Please enter your email", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::CHECKED, mc::UNNECESSARY, mc::VISIBLE);
$sem_part["homepage"] = new myFieldParams("Homepage", "VARCHAR(80)", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$sem_part["org1_ua"] = new myFieldParams("Organization1 (ukr)",  "VARCHAR(80)", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$sem_part["org1_en"] = new myFieldParams("Organization1 (eng)",  "VARCHAR(80)", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$sem_part["org1_url"] = new myFieldParams("Organization1 url",  "VARCHAR(80)", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$sem_part["org2_ua"] = new myFieldParams("Organization2 (ukr)",  "VARCHAR(80)", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$sem_part["org2_en"] = new myFieldParams("Organization2 (eng)",  "VARCHAR(80)", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$sem_part["org2_url"] = new myFieldParams("Organization2 url",  "VARCHAR(80)", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$sem_part["position"] = new myFieldParams("Position", "VARCHAR(80)", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);

$my_part = new MyTableObject($db, $partic_table_name, $sem_part, "id", SortDir::ASC, "id");
$my_part->eForm->set_classes('FIELDSET', 'LEGEND', 'CAPTION', 'WARNING');
$my_part->sForm->set_classes('FIELDSET', 'LEGEND', 'CAPTION');
$my_part->db->init_tables_list();



// create speakers list
$values = array();
$def_key=0;
$values[$def_key] = "";

$query = "select id, concat(surname_ua, ' ', name_ua) as nn from {$partic_table_name} order by nn;";
$res = $db->run_query($query);
while( ($row=mysql_fetch_row($res)) != false )
{
	$values[$row[0]] = $row[1];
};
// list of seminars

$seminars = array();
$seminars["id"] = new myFieldParams("ID", "int(10) NOT NULL auto_increment", "", "numeric", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::HIDDEN, mc::ENABLED);
$seminars["speaker1"] = new myFieldParams("Доповідач 1", "INT(10)", "Please enter the speaker", "select", array("values" => $values, "default_key" => $def_key, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY);
$seminars["speaker2"] = new myFieldParams("Доповідач 2", "INT(10)", "", "select", array("values" => $values, "default_key" => $def_key, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$seminars["speaker3"] = new myFieldParams("Доповідач 3", "INT(10)", "", "select", array("values" => $values, "default_key" => $def_key, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$seminars["speaker4"] = new myFieldParams("Доповідач 4", "INT(10)", "", "select", array("values" => $values, "default_key" => $def_key, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY, mc::VISIBLE);
$seminars["title_ua"] = new myFieldParams("Назва доповіді (ukr)", "VARCHAR(200)", "Please enter the title", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY);
$seminars["title_en"] = new myFieldParams("Назва доповіді (eng)", "VARCHAR(200)", "Please enter the title", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY);
$seminars["date"] = new myFieldParams("Дата", "DATE", "Please enter the date", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY);
$seminars["time"] = new myFieldParams("Час", "TIME", "Please enter the time", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY);
$seminars["abstract_ua"] = new myFieldParams("Анотація (ukr)", "TEXT", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY);
$seminars["abstract_en"] = new myFieldParams("Анотація (eng)", "TEXT", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY);
$seminars["file"] = new myFieldParams("Файл", "VARCHAR(100)", "", "text", array("value" => "", "size" => 30, "class" => "INPUTETEXT"), "", mc::UNCHECKED, mc::UNNECESSARY);

$my_sem = new MyTableObject($db, $seminar_table_name, $seminars, "id", SortDir::ASC, "id");
$my_sem->eForm->set_classes('FIELDSET', 'LEGEND', 'CAPTION', 'WARNING');
$my_sem->sForm->set_classes('FIELDSET', 'LEGEND', 'CAPTION');
$my_sem->db->init_tables_list();

// choose language
if ( isset($_REQUEST["en"]) ) { $lang="en";}
else { $lang="ua";};


//echo "Language = $lang<br>";

function phrase($uaPhrase, $enPhrase, $lang)
{
	if ($lang=="en") {return $enPhrase;}
	else {return $uaPhrase;};
};


if ( !isset($page_title) ) 
{
	$page_title = phrase("Семінар 'Математика та медицина'",
	                     "Seminar 'Mathematics and medicine'", $lang);
};

if ( !isset($page_keywords) )
{
	$page_keywords = phrase("математика, медицина, гемодинаміка",
	                        "mathematics, medicine", $lang);
};

if ( !isset($page_description) )
{
	$page_description = phrase("Семінар 'Математика та медицина'",
	                           "Seminar 'Mathematics and medicine'", $lang);
};


?>
