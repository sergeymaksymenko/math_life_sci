<?php

require_once("classes/class.MLSTalk.php");
require_once("classes/database.php");


require_once("classes/class.CurrentSeminar.php");

$connData = new ConnectionData('localhost', 'eumls', 'eumlsdbpass');
$db_name="MLSSeminar";
//$table_name ="MLSSeminar";

$db = new Database($db_name, $connData);
$db->connect();
//$db->create("eumls");  // create database
$db->open(); // open database


// change here basepath
//$base_path="http://www.imath.kiev.ua/~maks/mathmed/";
$base_path="http://localhost/eumls/new_classes/";
//================================
$lib_path="classes/";
//===========================================//
$host="localhost";
$user_name="eumls";
$user_passwd="eumlsdbpass";
$db_name="MLSSeminar";


$connData = new ConnectionData($host, $user_name, $user_passwd);
$db = new Database($db_name, $connData);
$db->debug_on();
$db->connect();
$db->open();


// list of languages
$languages=array("en", "ua", "ru");

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
		"Семінар 'Математика та науки про життя'",
		"Семинар 'Математика и науки о жизни'",
		"Seminar 'Mathematics life sciences'");
};

// set page keywords
if ( !isset($page_keywords) )
{
	$page_keywords = new LangStr(
		"математика, медицина, гемодинаміка",
		"математика, медицина, гемодинамика",
		"mathematics, medicine, hemodynamics");
};

// set page description
if ( !isset($page_description) )
{
	$page_description = new LangStr(
		"Семінар 'Математика та науки про життя'",
		"Семинар 'Математика и науки о жизни'",
		"Seminar 'Mathematics life sciences'");
};


//~ print_r($lang);
//~ print_r($page_title);
//~ print_r($page_keywords);
//~ print_r($page_description);



?>
