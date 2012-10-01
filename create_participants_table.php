
<?php
// conference database

include("classes/database.php");
$connData = new ConnectionData('localhost', 'eumls', 'eumlsdbpass');
$db_name="eumls";
$table_name ="mathmed_participants";

$db = new Database($db_name, $connData);
$db->connect();
$db->create("eumls");  // create database

$db->open(); // open database

// create table with participants
$table_struc ="
id int(10) NOT NULL auto_increment,
name VARCHAR(30),
middlename VARCHAR(30),
surname VARCHAR(30),
name_en VARCHAR(30),
middlename_en VARCHAR(30),
surname_en VARCHAR(30),
sex INT(1),
email VARCHAR(30),
homepage VARCHAR(80),
institution1 VARCHAR(100),
institution2 VARCHAR(100),
institution3 VARCHAR(100),
birthday DATE,
zipcode VARCHAR(10),
country VARCHAR(20),
city VARCHAR(30),
street VARCHAR(35),
PRIMARY KEY (id),
UNIQUE ID (id)
";

$db->create_table($table_name, $table_struc);



// create table with participants
$table_name1="mathmed_seminars";
$table_struc1 ="
id int(10) NOT NULL auto_increment,
speaker1 int(10),
speaker2 int(10),
speaker3 int(10),
speaker4 int(10),
title VARCHAR(100),
date DATE,
time TIME,
abstract TEXT,
file VARCHAR(100),
PRIMARY KEY (id),
UNIQUE ID (id)
";

$db->create_table($table_name1, $table_struc1);



//$db->drop();  // delete database
//$db->delete_table($table_name);  // delete database
//$db->drop();  // delete database
$db->close(); // close  database


?>
