<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
<title>Edit organizations</title>
<body>
<?php

class Action
{
	const SHOW = 0;
	const ADD = 1;
	const EDIT = 2;
	const INSERT = 3;
	const UPDATE = 4;
	const DELETE = 5;
}

$dir="classes";
require_once("../func.php");



// fix action value
$cur_action = ( isset($_GET["action"]) ) ? intval($_GET["action"]) : Action::SHOW;
$cur_action = min(max($cur_action,0),5);

//~ echo $cur_action . "<br>\n";
//~ echo $_GET["id"] . "<br>\n";

if ( ($cur_action == Action::EDIT) && !isset($_GET["id"]) ) $cur_action = Action::SHOW;

//$cur_action = Action::ADD;


$tableName=TablesNames::Talks;

// get fields list
$query = "show columns from {$tableName};";
$res = $db->run_query($query);
$colInfo=array();
//~ $autoFileds=array();
if (mysql_num_rows($res) > 0)
{
	while( $row = mysql_fetch_assoc($res) )
	{ 
		$colInfo[$row["Field"]] = $row;
	}
}	

//echo "colInfo: " . print_r($colInfo, true) . "<br>\n";


switch($cur_action)
{
	case Action::SHOW :
		$query = "select * from {$tableName};";
		$res = $db->run_query($query);
		echo "<form name='add_form' action='{$_SERVER['PHP_SELF']}' method='GET'>\n";
		echo "<input type='hidden' name='action' value='" . Action::ADD . "'>\n";		
		echo "<input type='submit' value='Add record'>\n";		
		echo"</form>\n";
		
		echo "<form name='edit_form' action='{$_SERVER['PHP_SELF']}' method='GET'>\n";
		echo "<input type='submit' value='Edit record'>\n";
		echo "<input type='text' name='id' value=''>\n";
		echo "<input type='hidden' name='action' value='" . Action::EDIT . "'>\n";		
		echo"</form>\n";

		echo "<form name='delete_form' action='{$_SERVER['PHP_SELF']}' method='GET'>\n";
		echo "<input type='submit' value='Delete record'>\n";
		echo "<input type='text' name='id' value=''>\n";
		echo "<input type='hidden' name='action' value='" . Action::DELETE . "'>\n";		
		echo"</form>\n";
		
		print_query_res($res);
		break;
		
	case Action::ADD :
		echo "<form name='edit_form' action='{$_SERVER['PHP_SELF']}' method='GET'>\n";
		echo "<table>\n";
		foreach($colInfo as $f)
		{
			if ($f['Extra']=='auto_increment') continue;
			echo "<tr><td>{$f['Field']}</td>" .
			     "<td><input type='text' name='{$f['Field']}' value='' size='100'></td></tr>\n";
		};
		echo"</table>\n";
		echo "<input type='hidden' name='action' value='" . Action::INSERT . "'>\n";		
		echo "<input type='submit' value='Save'>\n";		
		echo"</form>\n";
		break;
		
	case Action::EDIT :
		$id = $_GET["id"];
		$query = "select * from {$tableName} where id={$id};";
		print $query;
		$res = $db->run_query($query);
		if ($res==false) break;
		
		echo "<form name='edit_form' action='{$_SERVER['PHP_SELF']}' method='GET'>\n";
		echo "<table>\n";
		$row = mysql_fetch_array($res, MYSQL_ASSOC);
		foreach($row as $key=>$val)
		{
			echo "<tr><td>{$key}</td>" .
			     "<td><input type='text' name='{$key}' value='{$val}' size='100' " .
			      //( ($colInfo[$key]['Extra']=='auto_increment') ? "disabled" : "" ) .
			     "></td></tr>\n";
		};
		echo"</table>\n";
		echo "<input type='hidden' name='action' value='" . Action::UPDATE . "'>\n";		
		//echo "<input type='hidden' name='id' value='{$id}'>\n";		
		echo "<input type='submit' value='Update'>\n";		
		echo"</form>\n";
		break;
		
	case Action::UPDATE :
		$id = $_GET["id"];
		$record = array();
		foreach($colInfo as $key=>$c)
		{
			$record[$key] = (isset($_GET[$key])) ? $_GET[$key] : "null";
		};
		echo "record: " . print_r($record,true) . "<br>";
		$query = "update {$tableName} set ";
		$firstRecord=true;
		foreach($record as $key=>$val)
		{
			if ($key=="id") continue;
			if ($firstRecord) {$firstRecord=false;} else {$query .= ", ";};
			$query .= "{$key} = \"" . addslashes($val) . "\"";
		}
		$query .= " where id={$record['id']};";
		print $query . "<br>\n";
		$res = $db->run_query($query);
		if ($res==false)
		{
			echo "Error updating record<br>\n";
		}
		else
		{
			echo "The record is updated<br>\n";	
		}
		echo "<form name='edit_form' action='{$_SERVER['PHP_SELF']}' method='GET'>\n";
		echo "<input type='hidden' name='action' value='" . Action::SHOW . "'>\n";		
		echo "<input type='submit' value='Show all records'>\n";		
		echo"</form>\n";
		break;

	case Action::INSERT :
		$id = $_GET["id"];
		$record = array();
		foreach($colInfo as $key=>$c)
		{
			$record[$key] = (isset($_GET[$key])) ? $_GET[$key] : "null";
		};
		echo "record: " . print_r($record,true) . "<br>";
		$query = "insert {$tableName} set ";
		$firstRecord=true;
		foreach($record as $key=>$val)
		{
			if ($key=="id") continue;
			if ($firstRecord) {$firstRecord=false;} else {$query .= ", ";};
			$query .= "{$key} = \"" . addslashes($val) . "\"";
		}
		$query .= ";";
		print $query . "<br>\n";
		$res = $db->run_query($query);
		if ($res==false)
		{
			echo "Error inserting record<br>\n";
		}
		else
		{
			echo "The record is inserted<br>\n";	
		}
		echo "<form name='edit_form' action='{$_SERVER['PHP_SELF']}' method='GET'>\n";
		echo "<input type='hidden' name='action' value='" . Action::SHOW . "'>\n";		
		echo "<input type='submit' value='Show all records'>\n";		
		echo"</form>\n";
		break;

	case Action::DELETE :
		$id = $_GET["id"];
		$query = "delete from {$tableName} where id={$id};";
		print $query . "<br>\n";
		$res = $db->run_query($query);
		if ($res==false)
		{
			echo "Error deleting record<br>\n";
		}
		else
		{
			echo "The record is deleted<br>\n";	
		}
		echo "<form name='edit_form' action='{$_SERVER['PHP_SELF']}' method='GET'>\n";
		echo "<input type='hidden' name='action' value='" . Action::SHOW . "'>\n";		
		echo "<input type='submit' value='Show all records'>\n";		
		echo"</form>\n";
		break;		
}
?>


</body>
</html>
