<?php

include_once("connection_data.php");
include_once("printing.php");


//===================================================================
// connects to server, and returs the object from mysql_connect
// in case of error, returns false
//===================================================================
function connect_to_server(ConnectionData &$conData, $debug=false)
{
	printInfo("Connecting to host '" . $conData->host . "'", $debug);
	// try to connect to server
	try { $con=mysql_connect($conData->host, $conData->user, $conData->password); }
	catch (Exception $e)
	{
		printError("Caught exception: {$e->getMessage()}", true);
		printError("Could not connect: " . mysql_error(), true);
		return false;
	};

	if (!$con)
	{
		printError("Could not connect: " . mysql_error(), true);
	}
	
	run_query("set names 'utf8'", $con, "Set names OK", "Error setting names",  $debug);	
	return $con;
};


//===================================================================
function select_database($db_name, $con, $debug=false)
{
	printInfo("Selecting database '{$db_name}'", $debug);
	try { $res = mysql_select_db($db_name, $con); }
	catch (Exception $e)
	{
		printError("Caught exception: {$e->getMessage()}", true);
		printError("Error selecting database '{$db_name}' : " . mysql_error(), true);
		return false;
	};

	if ($res) { printInfo("Database '{$db_name}' selected", $debug); }
	else      { printError("Error selecting database '{$db_name}' : " . mysql_error(), true);};	
	return $res;
};


//===================================================================
function run_query($query, $con, $successString="Success", $errorString="Error", $debug=false)
{
	printQuery($query,  $debug);
	try { $res =  mysql_query($query, $con); }
	catch (Exception $e)
	{
		printError("Caught exception: {$e->getMessage()}", true);
		printError("{$errorString} :" . mysql_error(), true);
		return false;
	};
	if ($res != false) {
		printSuccess($successString, $debug);
		if ($res!=true) printSuccess("Number of records: " . mysql_num_rows($res), $debug);
	}
	else      {	printError("{$errorString} :" . mysql_error(), true); };
	return $res;
};

//===================================================================
function close_connection($con, $debug=false)
{
	printInfo("Closing connection", $debug);
	try { $res=mysql_close($con); }
	catch (Exception $e)
	{
		printError("Caught exception: {$e->getMessage()}", true);
		printError("{$errorString} :" . mysql_error(), true);
		return false;
	};
	return $res;
};
//===================================================================





//=====================================================================
// Queries
//=====================================================================

function query_table_fields_list($tbl)
{
	return   "SELECT COLUMN_NAME FROM information_schema.COLUMNS " .
	         "WHERE TABLE_SCHEMA = DATABASE() " .
	         "AND TABLE_NAME = '{$tbl}' ORDER BY ORDINAL_POSITION;";
}

function query_select_all($tbl)
{
    return "SELECT * FROM " . mysql_real_escape_string($tbl) . ";";
}


function query_create_db($db)
{
	return "CREATE DATABASE IF NOT EXISTS " . mysql_real_escape_string($db) . " DEFAULT CHARACTER SET utf8;";
}

function query_drop_db($db)
{
	return "DROP DATABASE " . mysql_real_escape_string($db) . ";";
}

function query_create_table($tbl, $struc)
{
	return "CREATE TABLE IF NOT EXISTS " . mysql_real_escape_string($tbl) .
	 " (" . $struc . ") ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;";
};

function query_clear_table($tbl)
{
	return "DELETE FROM " . mysql_real_escape_string($tbl) . ";";
};

function query_drop_table($tbl)
{
	return "DROP TABLE " . mysql_real_escape_string($tbl) . ";";
}

function query_lock_table($tbl)
{
    return "LOCK TABLES " . mysql_real_escape_string($tbl) . " WRITE;";
}


function query_insert_values($tbl, &$values)
{
	$query = "INSERT INTO " . mysql_real_escape_string($tbl) . " VALUES (";
	for ($i=0; $i<count($values)-1; $i++)
	{
		$query = $query . "'" . mysql_real_escape_string($values[$i]) . "', ";
	};
	$query = $query . "'" . mysql_real_escape_string($values[count($values)-1]) . "');";
	return $query;
};


function query_insert_values_set($tbl, &$values)
{
	$col_list="";
	$val_list="";
	$prev=false;
	foreach($values as $key=>$v)
	{
		if ($prev)
		{
			$col_list = $col_list . ", ";
			$val_list = $val_list . ", ";
		};
		$col_list = $col_list . "{$key}";
		$val_list = $val_list . "'{$v}'";
		$prev=true;
	};
	return "INSERT INTO " . mysql_real_escape_string($tbl) . " ({$col_list}) VALUES ({$val_list});"; 
};

function query_unlock_table()
{
    return "UNLOCK TABLES;";
}


function query_create_user($db, $user_name, $user_password)
{
	return "GRANT ALL ON " . mysql_real_escape_string($db) . 
	       ".* TO '" . mysql_real_escape_string($user_name) .
	       "'@'%' IDENTIFIED BY '" . mysql_real_escape_string($user_password) . "';";
}


function query_grant_all_to_user($user_name)
{
	return "GRANT ALL ON *.* TO '" . mysql_real_escape_string($user_name) . "'";
}


function query_drop_user($user_name)
{
	return "DROP USER " . mysql_real_escape_string($user_name) . ";";
}



//=====================================================================

// create user '$username' by root
function create_admin_user($db, $username, $userpasswd, $con, $debug=false)
{
    printAction("Creating user {$username}");
	run_query(query_create_user($db, $username, $userpasswd),
	          $con, 
	          "User '{$username}' created",
	          "Error creating user '{$username}'",
	          $debug);
};



// create user '$username' by root
function delete_user($username, $con, $debug=false)
{
    printAction("Deleting user {$username}");
	$query = query_drop_user($username);
	printQuery($query, $debug);
	
	mysql_query($query, $con) or 
	  die("<font color='red'>Error deleting user '{$username}' : " . mysql_error() . "</font><br>\n");
	
	printSuccess("User '{$username}' deleted", $debug);
};



// create database by user $username
function create_database($db, $con, $debug=false)
{
    printAction("Creating database '{$db}'", $debug);
	run_query(query_create_db($db),
	          $con, 
	          "Database '{$db}' created",
	          "Error creating database '{$db}'",
	          $debug);
};


// drop database by user $username
function drop_database($db, $con, $debug=false)
{
    printAction("Deleting database '{$db}'", $debug);
	run_query(query_drop_db($db),
	          $con, 
              "Database '{$db}' dropped",
              "Error dropping database '{$db}'",
              $debug);
};


// create table $tbl with $tblStructure
function create_table($tbl, $tblStructure, $con, $debug=false)
{
	printInfo("Creating table '{$tbl}'", $debug);
	return run_query(query_create_table($tbl, $tblStructure),
	                 $con, 
	                 "Table '{$tbl}' created",
	                 "Error creating table: '{$tbl}'",
	                 $debug);
};


// delete table $tbl in database $db using $tblStructurey
function delete_table($tbl, $con, $debug=false)
{
	printInfo("Deleting table '{$tbl}'", $debug);
	return run_query(query_drop_table($tbl),
	                 $con, 
	                 "Table '{$tbl}' deleted",
	                 "Error deleting table: '{$tbl}'",
	                 $debug);
};


// clear table $tbl in database $db using $tblStructurey
function clear_table($tbl, $con, $debug=false)
{
	printInfo("Clearing table '{$tbl}'", $debug);
	return run_query(query_clear_table($tbl),
	                 $con, 
	                 "Table '{$tbl}' deleted",
	                 "Error deleting table: '{$tbl}'",
	                 $debug);
};


function lock_table($tbl, $con, $debug=false)
{
	printInfo("Locking table {$tbl}", $debug);
	return run_query(query_lock_table($tbl), $con, "Table '{$tbl}' locked", "Error locking table '{$tbl}'", $debug);
};



function insert_record($tbl, &$values, $con, $debug=false)
{
	printInfo("Inserting record in to the table '{$tbl}'", $debug);
	run_query(query_insert_values($tbl, $values), $con, "", "Error inserting record", $debug);
};


function insert_record_set($tbl, &$values, $con, $debug=false)
{
	printInfo("Inserting record in to the table '{$tbl}'", $debug);
	run_query(query_insert_values_set($tbl, $values), $con, "", "Error inserting record", $debug);
};


function unlock_table($con, $debug=false)
{
	printInfo("Unlocking tables", $debug);
	run_query(query_unlock_table(), $con, "Tables unlocked", "Error unlocking tables", $debug);
};


function insert_one_record($tbl, &$values, $con, $debug=false)
{
	printInfo("Inserting one record in to the table '{$tbl}'", $debug);
	lock_table($tbl, $con, $debug);
	insert_record($tbl, $values, $con, $debug);
	unlock_table($con, $debug);
};

function insert_one_record_set($tbl, &$values, $con, $debug=false)
{
	printInfo("Inserting one record in to the table '{$tbl}'", $debug);
	lock_table($tbl, $con, $debug);
	insert_record_set($tbl, $values, $con, $debug);
	unlock_table($con, $debug);
};



function get_max_field_value($tbl, $field, $con, $debug=false)
{
	// get maximal value of group uid:
	$query = "select max({$field}) from {$tbl};";
	printQuery($query, $debug);
	if ($res=run_query($query, $con, "Success","Error", true)) {
		if ($row = mysql_fetch_array($res, MYSQL_NUM) ) {
			return $row[0];
		} else {
			return 1;
		};
	} else {
		return -1;
	};
};



function concat_conditions(&$condList, $oper)
{
	if (count($condList)==0) return "";
	$isStarted=false;
	for($i=0;$i<count($condList);$i++)
	{
		if (strlen($condList[$i]) == 0) continue;
		if ($isStarted) $res = $res . " {$oper} ";
		$res = $res . $condList[$i];
		$isStarted=true;
	};
	return $res;
}

function where_list($field, $values, $oper)
{
	$condList=array();
	for ($i=0; $i<count($values); $i++)
	{
		$condList[] = "{$field}={$values[$i]}";
	};
	return concat_conditions($condList, $oper);
};


?>
