<?php


require_once("class.CurrentSeminar.php");

$connData = new ConnectionData('localhost', 'eumls', 'eumlsdbpass');
$db_name="MLSSeminar";
//$table_name ="MLSSeminar";

$db = new Database($db_name, $connData);
$db->connect();
//$db->create("eumls");  // create database
$db->open(); // open database



$org = CurrentSeminar::getOrganizationById($db, 1);
print_r($org);

$p = CurrentSeminar::getParticipantById($db, 1);
print_r($p);

$t = CurrentSeminar::getTalkById($db, 7);
print_r($t);


?>
